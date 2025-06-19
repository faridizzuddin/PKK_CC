<?php

class Permohonan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Permohonan_model');
        $this->load->library('session');
        $this->load->library('m_pdf');

        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }

        if (isset($_SESSION["access_mohon"]) == "luar") {
            $_SESSION["UID_mohon"] = $_SESSION["UID_mohon"];
        } else {
            $_SESSION["UID_mohon"] = $_SESSION["UID"];
        }

        $role = $this->Permohonan_model->get_roles($_SESSION["UID_mohon"]);

        if (isset($role->T12_SEKSYEN)) {
            if ($role->T12_SEKSYEN == "Seksyen Protokol dan Pengurusan Majlis") {
                $_SESSION["role"] = "admin_ppm";
            } elseif ($role->T12_SEKSYEN == "Seksyen Media Kreatif") {
                $_SESSION["role"] = "admin_mk";
            } elseif ($role->T12_SEKSYEN == "Seksyen Perhubungan Korporat dan Media") {
                $_SESSION["role"] = "admin_pkm";
            } elseif ($role->T12_SEKSYEN == "Seksyen Promosi dan Citra") {
                $_SESSION["role"] = "admin_pc";
            } elseif ($role->T12_SEKSYEN == "Seksyen Pentadbiran dan Kewangan") {
                $_SESSION["role"] = "admin_pk";
            } elseif ($role->T12_SEKSYEN == "Lain - Lain") {
                $_SESSION["role"] = "admin_other";
            } elseif ($role->T12_SEKSYEN == "Super Admin") {
                $_SESSION["role"] = "super_admin";
            }
        } else {
            $_SESSION["role"] = "guest";
        }



        // var_dump($_SESSION);

        //https://pita.umt.edu.my/mainpage/main - Main Link

    }
    public function index()
    {

        $this->template->title("Mainpage");
        $data_program = $this->Permohonan_model->view_all_permohonan();

        $prog_belum_sah = 0;
        $prog_dijalankan = 0;
        $count_mohon = 0;

        //CHECK PROGRAM DAH MOHON PERKHIDMATAN ATAU TIDAK 
        foreach ($data_program as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan

                //SET PERKHIDMATAN DAH DISAHKAN OLEH PENGARAH ATAU BELUM
                foreach ($view_perkhidmatan as $data) {
                    if ($data->T05_PENGARAH == null) {
                        $list->belum_sah = 1; //Indicate program tu belum disahkan
                    }
                }
                //COUNT PERKHIDMATAN YG BELUM SAH
                if (isset($list->belum_sah) && $list->belum_sah == 1) {
                    $prog_belum_sah++;
                }
                //CHECK PROGRAM BELUM DILAKSANAKAN
                if ($list->T02_TARIKH_TAMAT < date('Y-m-d')) {
                    $prog_dijalankan++; //Indicate program tu dijalankan
                }
            } else {
                $list->perkhidmatan = 0;
            }
        }

        //COUNT PROGRAM YG DAH MOHON PERKHIDMATAN
        foreach ($data_program as $list) {
            if ($list->perkhidmatan == 1) {
                $count_mohon++; //Count program yang dah mohon perkhidmatan
            }
        }

        $data_permohonan = $this->Permohonan_model->get_all_permohonan();

        //UNTUK STATISTIK PENGGUNAAN PERKHIDMATAN
        $statistik_perkhidmatan = $this->Permohonan_model->get_service_stat();
        $warga_luar = $this->Permohonan_model->get_warga_luar();

        // var_dump($warga_luar);


        $this->template->set("data_program", $count_mohon);
        $this->template->set("prog_belum_sah", $prog_belum_sah);
        $this->template->set("prog_dijalankan", $prog_dijalankan);
        $this->template->set("data_permohonan", $data_permohonan);
        $this->template->set("statistik_perkhidmatan", $statistik_perkhidmatan);
        $this->template->set("warga_luar", $warga_luar);

        $this->template->render();

    }

    public function try()
    {
        $this->template->render();
    }

    public function form_program()
    {

        $this->template->title("Permohonan Baru");
        $user = $this->Permohonan_model->get_user_by_id($_SESSION["UID_mohon"]);
        $this->template->set("user", $user);
        // var_dump($user);
        $this->template->render();

    }
    public function tambah()
    {
        $status = 0;
        $userid = $_SESSION["UID_mohon"]; // Ensure the session contains UID

        $nama_program = $this->input->post('nama_program');
        $tempat_program = $this->input->post('tempat_program');
        $tarikh_mula = $this->input->post('tarikh_mula');
        $tarikh_tamat = $this->input->post('tarikh_tamat');
        $bil_peserta = $this->input->post('bil_peserta');

        // Upload file
        $config['upload_path'] = './upload/tentatif'; // Ensure this folder exists
        $config['allowed_types'] = 'jpeg|png|jpg|pdf';
        $config['max_size'] = 10240; // 10MB limit (in KB)

        // Load the Upload Library with configurations
        $this->load->library('upload', $config);

        // Attempt to upload the file
        if (!$this->upload->do_upload("tentatif")) {
            $error = $this->upload->display_errors(); // Capture error messages
            log_message('error', "File Upload Error: " . $error); // Log the error
            $this->session->set_flashdata('error', $error);
        } else {
            $uploadData = $this->upload->data(); // Get file data
            $fileName = $uploadData["file_name"];

            // Prepare program data for insertion
            $data_program = [
                "T01_ID" => $userid,
                "T02_NAMA_PROGRAM" => $nama_program,
                "T02_TEMPAT_PROGRAM" => $tempat_program,
                "T02_TARIKH_MULA" => $tarikh_mula,
                "T02_TARIKH_TAMAT" => $tarikh_tamat,
                "T02_BIL_PESERTA" => $bil_peserta,
                "T02_TENTATIF" => $fileName, // Store only the file name
                "T02_CREATE_BY" => $userid,
            ];

            // Insert program data
            $status = $this->Permohonan_model->tambah_program($data_program);
        }

        $id_program = $status->ID;
        $this->session->set_userdata('id_prog_to_perkhidmatan', $id_program);

        if (isset($status) && $status > 0) {
            redirect(module_url("permohonan/perkhidmatan"));
        } else {
            echo 'ERROR';
        }
    }
    public function upload_file()
    {
        $status = 0;
        $id = $this->input->post("id"); // Retrieving ID (if needed)

        // Configure file upload settings
        $config['upload_path'] = './upload/'; // Ensure this folder exists
        $config['allowed_types'] = 'jpeg|png|jpg|pdf';
        $config['max_size'] = 10240; // 10MB limit (in KB)

        // Load the Upload Library with configurations
        $this->load->library('upload', $config);

        // Attempt to upload the file
        if (!$this->upload->do_upload("userfile")) {
            $error = $this->upload->display_errors(); // Capture error messages
            log_message('error', "File Upload Error: " . $error); // Log the error
            $this->session->set_flashdata('error', $error);
        } else {
            $uploadData = $this->upload->data(); // Get file data
            $fileName = $uploadData["file_name"];

            // Insert file name into database
            $status = $this->Permohonan_model->insertFile(["PATH" => $fileName]);

            $this->session->set_flashdata('success', 'File uploaded successfully.');
        }

        if ($status > 0) {
            redirect(module_url('permohonan/'));
        } else {
            echo 'ERROR';
        }
    }
    public function tambah1()
    {
        $userid = $_SESSION["UID_mohon"];
        $nama_program = $this->input->post('nama_program');
        $tempat_program = $this->input->post('tempat_program');
        $tarikh_mula = $this->input->post('tarikh_mula');
        $tarikh_tamat = $this->input->post('tarikh_tamat');
        $bil_peserta = $this->input->post('bil_peserta');

        //file configuration
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = 2048; //2 MB max size
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $file_path = null;

        // Check if file is uploaded
        if (!empty($_FILES['tentatif']['name'])) {
            if ($this->upload->do_upload('tentatif')) {
                $file_data = $this->upload->data();
                $file_path = 'uploads/' . $file_data['file_name'];
            } else {
                // Handle file upload error
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(module_url('permohonan/tambah'));
                return;
            }
        }

        // Prepare program data with optional file path
        $data_program = [
            "T01_ID" => $userid,
            "T02_NAMA_PROGRAM" => $nama_program,
            "T02_TEMPAT_PROGRAM" => $tempat_program,
            "T02_TARIKH_MULA" => $tarikh_mula,
            "T02_TARIKH_TAMAT" => $tarikh_tamat,
            "T02_BIL_PESERTA" => $bil_peserta,
            "T02_TENTATIF" => $file_path, // Include file path
            "T02_CREATE_BY" => $userid
        ];


        //Tambah program
        $status = $this->Permohonan_model->tambah_program($data_program);


        if ($status > 0) {
            //echo 'Berjaya';
            redirect(module_url("permohonan/view_program"));
        }
    }

    public function view_program()
    {
        $id_user = $_SESSION["UID_mohon"];
        $this->template->title("Senarai Permohonan");
        $list_permohonan = $this->Permohonan_model->view_program_by_id($id_user);

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($list_permohonan as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($program_id); //check perkhidmatan dah dibuat atau belum
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0; //kalau program tak permah request assign 0
            }

        }
        $this->template->set("user_id", $id_user);
        $this->template->set("list_permohonan", $list_permohonan);
        $this->template->render();

    }

    public function delete_program()
    {
        $id = $this->input->post('id_program');
        $user_id = $_SESSION["UID_mohon"];
        $status = $this->Permohonan_model->delete_selected_program($id);
        if ($status > 0) {
            //echo 'Berjaya';
            redirect(module_url("permohonan/view_program"));
        }
    }

    public function edit_program()
    {
        $id = $this->input->post('id_program');
        $data_to_edit = $this->Permohonan_model->edit_selected_program($id);
        $this->template->title("Kemaskini Permohonan");
        $user = $this->Permohonan_model->get_user_by_id($_SESSION["UID_mohon"]);
        $this->template->set("user", $user);

        $this->template->set("data_edit", $data_to_edit);
        $this->template->render();

    }

    public function update_program()
    {
        $status = 0;

        $userid = $_SESSION["UID_mohon"];
        $program_id = $this->input->post('id');
        $nama_program = $this->input->post('nama_program');
        $tempat_program = $this->input->post('tempat_program');
        $tarikh_mula = $this->input->post('tarikh_mula');
        $tarikh_tamat = $this->input->post('tarikh_tamat');
        $bil_peserta = $this->input->post('bil_peserta');
        $old_tentatif = $this->input->post('old_tentatif');
        $fileName = $old_tentatif;

        // Check if a new file is being uploaded
        if (!empty($_FILES['tentatif']['name'])) {
            // Upload file
            $config['upload_path'] = './upload/tentatif'; // Ensure this folder exists
            $config['allowed_types'] = 'jpeg|png|jpg|pdf';
            $config['max_size'] = 10240; // 10MB limit (in KB)

            // Load the Upload Library with configurations
            $this->load->library('upload', $config);

            // Attempt to upload the file
            if ($this->upload->do_upload("tentatif")) {
                $uploadData = $this->upload->data(); // Get file data
                $fileName = $uploadData["file_name"];
            } else {
                $error = $this->upload->display_errors(); // Capture error messages
                log_message('error', "File Upload Error: " . $error); // Log the error
                $this->session->set_flashdata('error', $error);
                redirect(module_url("permohonan/edit_program/$program_id"));
                return;
            }
        }

        // Prepare program data for insertion
        $data_program = [
            "T01_ID" => $userid,
            "T02_NAMA_PROGRAM" => $nama_program,
            "T02_TEMPAT_PROGRAM" => $tempat_program,
            "T02_TARIKH_MULA" => $tarikh_mula,
            "T02_TARIKH_TAMAT" => $tarikh_tamat,
            "T02_BIL_PESERTA" => $bil_peserta,
            "T02_TENTATIF" => $fileName, // Use the uploaded file name or the old file name
            "T02_CREATE_BY" => $userid,
        ];

        // Update program data
        $status = $this->Permohonan_model->update_program($data_program, $program_id);

        if ($status > 0) {
            redirect(module_url("permohonan/view_program"));
        } else {
            echo 'ERROR';
        }
    }

    public function mohon_perkhidmatan()
    {
        $id_program = $this->input->post("id_program");
        $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($id_program);
        if ($view_perkhidmatan == null) {
            redirect(module_url("permohonan/form_perkhidmatan/$id_program"));
            //$this->form_perkhidmatan($id_program);
        } else {
            redirect(module_url("permohonan/perkhidmatan/$id_program"));
            //$this->perkhidmatan($id_program); //return 1 kalau program pernah request perkhidmatan
        }
    }
    public function form_perkhidmatan($id_program)
    {
        $this->template->title("Permohonan Baru");
        $perkhidmatan = $this->Permohonan_model->view_all_perkhidmatan();

        $this->template->set("id_program", $id_program);
        $this->template->set("perkhidmatan", $perkhidmatan);
        $this->template->render();
    }

    public function perkhidmatan()
    {
        $id_program = $this->input->post("id_program");
        if (isset($id_program)) {
            $id_program = $this->input->post("id_program");
        } else {
            $id_program = $this->session->userdata('id_prog_to_perkhidmatan');
        }

        $this->template->title("Permohonan Baru");
        $data = $this->Permohonan_model->view_request_perkhidmatan($id_program);
        $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($id_program);
        $data_program = $this->Permohonan_model->view_selected_program($id_program);
        $view_cenderamata = $this->Permohonan_model->check_cenderamata($id_program);
        $data_cenderamata = $this->Permohonan_model->view_request_cenderamata($id_program);

        if (!empty($view_perkhidmatan)) {
            $check_perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
        } else {
            $check_perkhidmatan = 0;
        }

        if (!empty($view_cenderamata)) {
            $check_cenderamata = 1; //return 1 kalau program pernah request cenderamata
        } else {
            $check_cenderamata = 0;

        }

        $this->template->set("check_perkhidmatan", $check_perkhidmatan);
        $this->template->set("check_cenderamata", $check_cenderamata);
        $this->template->set("data_cenderamata", $data_cenderamata);
        $this->template->set("id_program", $id_program);
        $this->template->set("data", $data);
        $this->template->set("data_program", $data_program);
        $this->template->render();
    }

    public function test()
    {
        //$this->template->title("Test");

        $id_program = 221;
        $data = $this->Permohonan_model->view_request_perkhidmatan($id_program);
        $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($id_program);
        $data_program = $this->Permohonan_model->view_selected_program($id_program);
        $view_cenderamata = $this->Permohonan_model->check_cenderamata($id_program);
        $data_cenderamata = $this->Permohonan_model->view_request_cenderamata($id_program);

        var_dump($data, $view_perkhidmatan, $data_program, $view_cenderamata, $data_cenderamata);
        //$this->template->render();

    }

    public function perkhidmatan1()
    {
        $id_program = $this->input->post("id_program");
        $this->template->title("Permohonan Baru");
        $data = $this->Permohonan_model->view_request_perkhidmatan($id_program);
        $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($id_program);
        $data_program = $this->Permohonan_model->view_selected_program($id_program);


        if (!empty($view_perkhidmatan)) {
            $check_perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
        } else {
            $check_perkhidmatan = 0;
        }

        $this->template->set("check_perkhidmatan", $check_perkhidmatan);
        $this->template->set("id_program", $id_program);
        $this->template->set("data", $data);
        $this->template->set("data_program", $data_program);
        $this->template->render();
    }

    public function email_admin()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pkkdemo@gmail.com',
            'smtp_pass' => 'blwwcmnankgnkvqu', // App password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'crlf' => "\r\n",
            'wordwrap' => TRUE,
            'smtp_timeout' => 30,
            'validate' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->clear(TRUE); // <-- Clear everything just in case

        $this->email->from('pkkdemo@gmail.com', 'PKK');
        $this->email->to('mfdin1903@gmail.com');
        $this->email->subject('Permohonan Baru');
        $this->email->message('Permohonan baru telah diterima. Maklumat permohonan:');

        if ($this->email->send()) {
            redirect(module_url("permohonan/perkhidmatan"));
            //echo "Email sent successfully!";
        } else {
            echo $this->email->print_debugger(['headers']);
        }
    }

    public function hantar_perkhidmatan()
    {

        $id_program = $this->input->post('id_program');

        // Upload file
        $config['upload_path'] = './upload/file_mohon/'; // Ensure this folder exists
        $config['allowed_types'] = 'jpeg|png|jpg|pdf';
        $config['max_size'] = 10240; // 10MB limit (in KB)
        $this->load->library('upload', $config);

        if (isset($_POST['perkhidmatan'])) {
            $perkhidmatan = $_POST['perkhidmatan'];
            // $test = $_FILES['reka_bentuk_grafik_file'];
            // var_dump($test);


            foreach ($perkhidmatan as $list) {
                if (isset($_POST['status_bahasa'][$list])) {
                    $bahasa = $_POST['status_bahasa'][$list];
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $bahasa,
                        "T05_CREATE_BY" => $_SESSION["UID_mohon"]
                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);

                } else if (isset($_FILES['reka_bentuk_grafik_file']) && $_FILES['reka_bentuk_grafik_file']['name'] !== '' && isset($_POST['rbg_key'][$list])) {
                    // Attempt to upload the file
                    if (!$this->upload->do_upload('reka_bentuk_grafik_file')) {
                        $error = $this->upload->display_errors(); // Capture error messages
                        log_message('error', "File Upload Error: " . $error); // Log the error
                        $this->session->set_flashdata('error', $error);
                    } else {
                        $uploadData = $this->upload->data(); // Get file data
                        $fileName = $uploadData["file_name"];

                        $data_to_insert = [
                            "T02_ID" => $id_program,
                            "T03_ID" => $list,
                            "T05_FILE" => $fileName,
                            "T05_CREATE_BY" => $_SESSION["UID_mohon"]
                        ];
                        $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                    }

                } else if (isset($_FILES['montaj_file']) && $_FILES['montaj_file']['name'] !== '' && isset($_POST['montaj_key'][$list])) {

                    // Attempt to upload the file
                    if (!$this->upload->do_upload('montaj_file')) {
                        $error = $this->upload->display_errors();
                        log_message('error', "File Upload Error: " . $error);
                        $this->session->set_flashdata('error', $error);
                    } else {
                        $uploadData = $this->upload->data(); // Get file data
                        $fileName = $uploadData["file_name"];

                        $data_to_insert = [
                            "T02_ID" => $id_program,
                            "T03_ID" => $list,
                            "T05_FILE" => $fileName,
                            "T05_CREATE_BY" => $_SESSION["UID_mohon"]

                        ];
                        $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                    }

                } else if (isset($_FILES['PKecil_file']) && $_FILES['PKecil_file']['name'] !== '' && isset($_POST['PKecil_key'][$list])) {

                    // Attempt to upload the file
                    if (!$this->upload->do_upload('PKecil_file')) {
                        $error = $this->upload->display_errors();
                        log_message('error', "File Upload Error: " . $error);
                        $this->session->set_flashdata('error', $error);
                    } else {
                        $uploadData = $this->upload->data(); // Get file data
                        $fileName = $uploadData["file_name"];

                        $data_to_insert = [
                            "T02_ID" => $id_program,
                            "T03_ID" => $list,
                            "T05_FILE" => $fileName,
                            "T05_CREATE_BY" => $_SESSION["UID_mohon"]

                        ];
                        $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                    }

                } else if (isset($_FILES['PBesar_file']) && $_FILES['PBesar_file']['name'] !== '' && isset($_POST['PBesar_key'][$list])) {

                    // Attempt to upload the file
                    if (!$this->upload->do_upload('PBesar_file')) {
                        $error = $this->upload->display_errors();
                        log_message('error', "File Upload Error: " . $error);
                        $this->session->set_flashdata('error', $error);
                    } else {
                        $uploadData = $this->upload->data(); // Get file data
                        $fileName = $uploadData["file_name"];

                        $data_to_insert = [
                            "T02_ID" => $id_program,
                            "T03_ID" => $list,
                            "T05_FILE" => $fileName,
                            "T05_CREATE_BY" => $_SESSION["UID_mohon"]

                        ];
                        $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                    }

                } else if (isset($_POST['lain_lain'][$list])) {
                    $lain = $_POST['lain_lain'][$list];
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $lain,
                        "T05_CREATE_BY" => $_SESSION["UID_mohon"]

                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                } else {
                    $param = '';
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $param,
                        "T05_CREATE_BY" => $_SESSION["UID_mohon"]

                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                }
            }
        } else {
            echo "No services selected.";
        }
        $this->session->set_userdata('id_prog_to_perkhidmatan', $id_program);
        if ($status > 0) {
            redirect(module_url("permohonan/email_admin"));
            // redirect(module_url("permohonan/perkhidmatan"));
        }

    }

    public function edit_perkhidmatan($id_program)
    {
        $this->template->title("Edit Perkhidmatan");

        //semua perkhidmatan
        $perkhidmatan = $this->Permohonan_model->view_all_perkhidmatan();

        $this->template->set("id_program", $id_program);
        $this->template->set("perkhidmatan", $perkhidmatan);

        //perkhidmatan yang dah dipilih
        $data = $this->Permohonan_model->view_request_perkhidmatan($id_program);

        $this->template->set("data", $data);
        $this->template->render();
    }

    public function delete_perkhidmatan($id_perkhidmatan, $id_program)
    {
        $status = $this->Permohonan_model->delete_perkhidmatan($id_perkhidmatan);
        $this->session->set_userdata('id_prog_to_perkhidmatan', $id_program);
        if ($status > 0) {
            redirect(module_url("permohonan/perkhidmatan"));
        }
    }

    public function kemaskini_perkhidmatan()
    {

        $id_program = $this->input->post('id_program');

        // Upload file
        $config['upload_path'] = './upload/file_mohon/'; // Ensure this folder exists
        $config['allowed_types'] = 'jpeg|png|jpg|pdf';
        $config['max_size'] = 10240; // 10MB limit (in KB)
        $this->load->library('upload', $config);

        if (isset($_POST['perkhidmatan'])) {
            $perkhidmatan = $_POST['perkhidmatan'];
            // $test = $_FILES['reka_bentuk_grafik_file'];
            // var_dump($test);


            foreach ($perkhidmatan as $list) {
                if (isset($_POST['status_bahasa'][$list])) {
                    $bahasa = $_POST['status_bahasa'][$list];
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $bahasa
                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);

                } else if (isset($_FILES['reka_bentuk_grafik_file']) && $_FILES['reka_bentuk_grafik_file']['name'] !== '' && isset($_POST['rbg_key'][$list])) {
                    // Attempt to upload the file
                    if (!$this->upload->do_upload('reka_bentuk_grafik_file')) {
                        $error = $this->upload->display_errors(); // Capture error messages
                        log_message('error', "File Upload Error: " . $error); // Log the error
                        $this->session->set_flashdata('error', $error);
                    } else {
                        $uploadData = $this->upload->data(); // Get file data
                        $fileName = $uploadData["file_name"];

                        $data_to_insert = [
                            "T02_ID" => $id_program,
                            "T03_ID" => $list,
                            "T05_FILE" => $fileName
                        ];
                        $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                    }

                } else if (isset($_FILES['montaj_file']) && $_FILES['montaj_file']['name'] !== '' && isset($_POST['montaj_key'][$list])) {

                    // Attempt to upload the file
                    if (!$this->upload->do_upload('montaj_file')) {
                        $error = $this->upload->display_errors();
                        log_message('error', "File Upload Error: " . $error);
                        $this->session->set_flashdata('error', $error);
                    } else {
                        $uploadData = $this->upload->data(); // Get file data
                        $fileName = $uploadData["file_name"];

                        $data_to_insert = [
                            "T02_ID" => $id_program,
                            "T03_ID" => $list,
                            "T05_FILE" => $fileName
                        ];
                        $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                    }

                } else if (isset($_POST['lain_lain'][$list])) {
                    $lain = $_POST['lain_lain'][$list];
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $lain
                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                } else {
                    $param = '';
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $param
                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);
                }
            }
        } else {
            echo "No services selected.";
        }
        $this->session->set_userdata('id_prog_to_perkhidmatan', $id_program);
        if ($status > 0) {
            redirect(module_url("permohonan/email_admin"));
            // redirect(module_url("permohonan/perkhidmatan"));
        }


    }

    public function view_report()
    {
        // Load the mPDF library
        $this->load->library('m_pdf');

        // Set up the PDF content
        $html = '<h1 style="text-align: center;">Hello World</h1>';

        // Set PDF configurations
        // $this->m_pdf->pdf->SetHeader('<div style="text-align: center; font-size:14px"><b>Hello World PDF</b></div><div style="text-align: right;">' . date('d F Y, H:i') . '</div>');
        $this->m_pdf->pdf->SetFooter('Page {PAGENO} of {nb}');
        $this->m_pdf->pdf->SetMargins(10, 10, 20);
        $this->m_pdf->pdf->AddPage('P', 'A4'); // Portrait orientation, A4 size

        // Write the HTML content to the PDF
        $this->m_pdf->pdf->WriteHTML($html);

        // Output the PDF
        $pdfFilePath = "hello_world.pdf";
        $this->m_pdf->pdf->Output($pdfFilePath, "I"); // 'I' for inline viewing in the browser
    }
    public function report_perkhidmatan()
    {
        $id_program = $this->input->post('id_program');
        $data_perkhidmatan = $this->Permohonan_model->view_request_perkhidmatan($id_program);
        $data_program = $this->Permohonan_model->view_selected_program($id_program);
        $data_cenderamata = $this->Permohonan_model->view_request_cenderamata($id_program);
        $pemohon = $this->Permohonan_model->get_user_by_id($data_program->T02_CREATE_BY);


        $date_mula = new DateTime($data_program->T02_TARIKH_MULA);
        $date_tamat = new DateTime($data_program->T02_TARIKH_TAMAT);

        // var_dump($data_perkhidmatan);

        $data = [
            'title' => 'Laporan Permohonan',
            'nama_program' => $data_program->T02_NAMA_PROGRAM,
            'tempat' => $data_program->T02_TEMPAT_PROGRAM,
            'bil_peserta' => $data_program->T02_BIL_PESERTA,
            'pemohon' => $pemohon->T01_NAMA,
            'ptj' => $pemohon->T01_JABATAN,
            'tarikh_mohon' => DateTime::createFromFormat('d-M-y h.i.s.u A', $data_program->T02_CREATE_ON, new DateTimeZone('UTC')),
            'tarikh' => $date_mula->format('j F Y') . ' - ' . $date_tamat->format('j F Y'),
            'perkhidmatan' => $data_perkhidmatan,
            'cenderamata' => $data_cenderamata,
        ];

        // var_dump($data_cenderamata);

        $html = $this->load->view('permohonan/report_perkhidmatan', $data, TRUE);

        // $this->m_pdf->pdf->SetFooter('Page {PAGENO} of {nb}');
        $this->m_pdf->pdf->SetFooter('<div style="text-align: center;margin-top: 5px; font-size: 10px; color: #888;">Halaman {PAGENO} daripada {nbpg}</div>');
        $this->m_pdf->pdf->SetMargins(10, 10, 20);
        $this->m_pdf->pdf->AddPage('P', 'A4');

        $this->m_pdf->pdf->WriteHTML($html);

        // Output the PDF
        $pdfFilePath = "report.pdf";
        $this->m_pdf->pdf->Output($pdfFilePath, "I");
    }

    /*************  ✨ Windsurf Command 🌟  *************/
    public function report_program()
    {

        $bulan = $this->input->post('month');

        if (isset($bulan)) {

        }

        //UNTUK STATISTIK PENGGUNAAN PERKHIDMATAN
        $statistik_perkhidmatan = $this->Permohonan_model->get_service_stat();
        $statistik_cenderamata = $this->Permohonan_model->get_souvenir_stat();




        $data = [
            'title' => 'Laporan Statistik Permohonan',
            'statistik_perkhidmatan' => $statistik_perkhidmatan,
            'statistik_cenderamata' => $statistik_cenderamata
        ];

        // var_dump($statistik_cenderamata);


        $html = $this->load->view('permohonan/report_program', $data, TRUE);

        // $this->m_pdf->pdf->SetFooter('Page {PAGENO} of {nb}');
        $this->m_pdf->pdf->SetFooter('<div style="text-align: center;margin-top: 5px; font-size: 10px; color: #888;">Halaman {PAGENO} daripada {nbpg}</div>');
        $this->m_pdf->pdf->SetMargins(10, 10, 20);
        $this->m_pdf->pdf->AddPage('P', 'A4');

        $this->m_pdf->pdf->WriteHTML($html);

        // Output the PDF
        $pdfFilePath = "report.pdf";
        // $this->m_pdf->pdf->Output($pdfFilePath, "D"); // PDF GENERATED IN DW
        $this->m_pdf->pdf->Output($pdfFilePath, "I"); //PDF GENERATED IN BROWSER
    }
    /*******  968943a7-8f59-47f1-a317-6c9441ef1c7d  *******/

    public function cenderamata()
    {
        $this->template->title("Permohonan Cenderamata");
        $id_program = $this->input->post("id_program");

        $check_cend = $this->Permohonan_model->check_cenderamata($id_program);
        $this->session->set_userdata('id_prog_cend', $id_program);

        if ($check_cend == null) {
            redirect(module_url("permohonan/form_cenderamata"));
        } else {
            redirect(module_url("permohonan/view_cenderamata"));
        }
    }

    public function form_cenderamata()
    {
        $this->template->title("Permohonan Cenderamata");
        $data_cend = $this->Permohonan_model->view_all_cenderamata();
        $this->template->set("data_cend", $data_cend);
        // var_dump($data_cend);
        $this->template->render();
    }

    public function form_cenderamata1()
    {
        $id_program = $this->input->post('id_program');
        $this->session->set_userdata('id_prog', $id_program);

        $this->template->title("Permohonan Cenderamata");
        $data_cend = $this->Permohonan_model->view_all_cenderamata();
        $this->template->set("data_cend", $data_cend);
        $this->template->render();
    }

    public function view_cenderamata()
    {
        $this->template->title("Permohonan Cenderamata");
        $this->template->render();
    }

    public function error()
    {
        $this->template->title("Error");
        $this->template->render();
    }

    public function detail_program()
    {
        $id_user = $_SESSION["UID_mohon"];
        $this->template->title("Senarai Permohonan");
        $list_permohonan = $this->Permohonan_model->view_program_by_id($id_user);

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($list_permohonan as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($program_id); //check perkhidmatan dah dibuat atau belum
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0; //kalau program tak permah request assign 0
            }

        }
        $this->template->set("user_id", $id_user);
        $this->template->set("list_permohonan", $list_permohonan);
        $this->template->render();

    }

    public function register()
    {
        $this->load->view('permohonan/register');
    }

    public function daftar()
    {
        $nama = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $no_tel = $this->input->post('no_tel');
        $jawatan = "Try Jawatan";
        $jabatan = "User Luar";


        $data = [
            'T09_NAMA' => $nama,
            'T09_EMEL' => $email,
            'T09_PASSWORD' => password_hash($password, PASSWORD_DEFAULT),
            'T09_NO_TEL' => $no_tel,
            'T09_JAWATAN' => $jawatan,
            'T09_JABATAN' => $jabatan,
        ];

        $status = $this->Permohonan_model->register($data);
        if ($status > 0) {
            $this->session->set_flashdata('success', 'Registration successful!');
            redirect(module_url('permohonan/login'));
        } else {
            $this->session->set_flashdata('error', 'Registration failed! Please try again.');
            redirect(module_url('permohonan/register'));
        }

    }

    public function login()
    {
        $this->load->view('permohonan/login');
    }

    public function login_user()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Permohonan_model->get_user_by_email($email);


        if (password_verify($password, $user->T09_PASSWORD)) {
            // Set session data
            $_SESSION = array();
            $_SESSION["icno"] = $user->T09_ID;
            $_SESSION["UID_mohon"] = $user->T09_ID;
            $_SESSION["user_id"] = $user->T09_ID;
            $_SESSION["STAFF"] = $user->T09_NAMA;
            $_SESSION["email"] = $user->T09_EMEL;
            redirect(module_url('permohonan/login_success'));
        } else {
            // redirect(module_url('permohonan/login'));
            echo "Login failed! Please check your credentials.";
        }

        // if ($password == $user->T09_PASSWORD) {
        //     // Set session data
        //     $_SESSION["UID_mohon"] = $user->T09_ID;
        //     $_SESSION["user_id"] = $user->T09_ID;
        //     $_SESSION["name"] = $user->T09_NAMA;
        //     $_SESSION["email"] = $user->T09_EMEL;
        //     redirect(module_url('permohonan/login_success'));
        // } else {
        //     // redirect(module_url('permohonan/login'));
        //     echo "Login failed! Please check your credentials.";

        // }
    }

    public function login_success()
    {
        $this->template->title("Login Success");
        $this->template->render();
    }

    //Debug function pr()
    public function pr_card()
    {
        $this->template->render();

    }

    //MODULE CENDERAMATA
    public function add_cenderamata()
    {
        $products = $this->input->post('products');
        $cart_items = $this->session->userdata('cart_items');

        foreach ($products as $product) {
            if (!empty($product['qty']) && $product['qty'] > 0) {
                $item_id = $product['id'];
                // Check if the item is already in the cart
                if (isset($cart_items[$item_id])) {
                    // If it exists, update the quantity
                    $cart_items[$item_id]['qty'] += $product['qty'];
                } else {
                    // If it doesn't exist, add it to the cart
                    $cart_items[$item_id] = array(
                        'id' => $item_id,
                        'qty' => $product['qty'],
                        'price' => $product['price'],
                        'name' => $product['name'],
                    );
                }
            }
        }

        $this->session->set_userdata('cart_items', $cart_items);
        redirect(module_url('permohonan/pr_card'));
    }

    public function update_cart()
    {
        $cart_info = $this->input->post();
        $cart_items = $this->session->userdata('cart_items');

        foreach ($cart_info as $product_id => $data) {
            if (isset($cart_items[$product_id]) && isset($data['qty'])) {
                if ($data['qty'] > 0) {
                    $cart_items[$product_id]['qty'] = $data['qty'];
                } else {
                    // If quantity is 0 or less, remove the item from the cart
                    unset($cart_items[$product_id]);
                }
            }
        }

        $this->session->set_userdata('cart_items', $cart_items);
        redirect(module_url('permohonan/pr_card'));
    }
    public function remove_item()
    {
        $item_id = $this->input->post('item_id');
        $cart_items = $this->session->userdata('cart_items');

        if (isset($cart_items[$item_id])) {
            unset($cart_items[$item_id]);
            $this->session->set_userdata('cart_items', $cart_items);
            echo 'success'; // Send a success message back to the AJAX call
        } else {
            echo 'error'; // Send an error message back to the AJAX call
        }
    }

    public function mohon_cenderamata()
    {
        $cart_contents = $this->session->userdata('cart_items');
        $id_program = $this->session->userdata('id_prog');
        $status = 0;
        $this->session->set_userdata('id_prog_to_perkhidmatan', $id_program);

        if (isset($cart_contents) && !empty($cart_contents)) {
            foreach ($cart_contents as $item) {
                //Check item tu dah ada dalam database atau takk
                $exist_cenderamata = $this->Permohonan_model->check_cenderamata_by_id($item['id']);
                if ($exist_cenderamata->T04_ID == $item['id']) {
                    $data_cenderamata = [
                        "T02_ID" => $id_program,
                        "T04_ID" => $item['id'],
                        "T07_BIL" => $exist_cenderamata->T07_BIL + $item['qty'],
                        "T07_HARGA" => $item['price'],
                        "T07_CREATE_BY" => $_SESSION["UID_mohon"],
                    ];
                    $status = $this->Permohonan_model->update_cenderamata($data_cenderamata, $exist_cenderamata->T07_ID);
                } else {
                    if ($item['qty'] > 0) {
                        $data_cenderamata = [
                            "T02_ID" => $id_program,
                            "T04_ID" => $item['id'],
                            "T07_BIL" => $item['qty'],
                            "T07_HARGA" => $item['price'],
                            "T07_CREATE_BY" => $_SESSION["UID_mohon"],
                        ];
                        $status = $this->Permohonan_model->mohon_cenderamata($data_cenderamata);
                    }
                }
            }
        }

        if ($status > 0) {
            // Clear the cart in the session
            $this->session->unset_userdata('cart_items');
            redirect(module_url("permohonan/perkhidmatan"));
        } else {
            echo 'ERROR';
        }
    }

    public function delete_cenderamata()
    {
        $status = 0;
        $id_cenderamata = $this->input->post('id_cenderamata');
        $id_program = $this->input->post('id_program');
        $this->session->set_userdata('id_prog_to_perkhidmatan', $id_program);

        $status = $this->Permohonan_model->delete_cenderamata($id_cenderamata);
        if ($status > 0) {
            // echo 'Berjaya';
            redirect(module_url("permohonan/perkhidmatan"));
        } else {
            echo 'ERROR';
        }
    }
    public function update_cenderamata()
    {
        $id_mohon_cend = $this->input->post('T07_ID');
        $id_program = $this->input->post('T02_ID');
        $bil = $this->input->post('T07_BIL');
        $status = 0;
        $this->session->set_userdata('id_prog_to_perkhidmatan', $id_program);

        $data_cenderamata = [
            "T07_BIL" => $bil,
            "T07_CREATE_BY" => $_SESSION["UID_mohon"],
        ];

        $status = $this->Permohonan_model->update_cenderamata($data_cenderamata, $id_mohon_cend);
        if ($status > 0) {
            // echo 'Berjaya';
            redirect(module_url("permohonan/perkhidmatan"));
        } else {
            echo 'ERROR';
        }
    }

    public function sde()
    {
        $id_cenderamata = $this->Permohonan_model->check_cenderamata_by_id(41);
        $id_program = $this->input->post('id_program');


        var_dump($id_cenderamata);
    }

    public function form_billboard()
    {
        $this->template->title("Permohonan Papan Iklan");
        $this->template->render();
    }

    public function tambah_billboard()
    {
        $catatan = $this->input->post('catatan');
    }


    public function role()
    {
        $id = "S00003";
        $data = $this->Permohonan_model->get_roles($id);
        var_dump($data);
    }





}
<?php

class Permohonan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Permohonan_model');
        //Create a dummy user id = 1
        $user_id = 1;
        $this->session->set_userdata('user_id', $user_id);

        //To use session
        // $user_id = $this->session->userdata('user_id');
    }

    public function form_program()
    {
        $this->template->title("Permohonan Baru");
        $this->template->render();

    }

    public function tambah()
    {
        $userid = 1; //Nanti tukar
        $nama_program = $this->input->post('nama_program');
        $tempat_program = $this->input->post('tempat_program');
        $tarikh_mula = $this->input->post('tarikh_mula');
        $tarikh_tamat = $this->input->post('tarikh_tamat');
        $bil_peserta = $this->input->post('bil_peserta');

        $data_program = [

            "T01_ID" => $userid,
            "T02_NAMA_PROGRAM" => $nama_program,
            "T02_TEMPAT_PROGRAM" => $tempat_program,
            "T02_TARIKH_MULA" => $tarikh_mula,
            "T02_TARIKH_TAMAT" => $tarikh_tamat,
            "T02_BIL_PESERTA" => $bil_peserta

        ];

        $status = $this->Permohonan_model->tambah_program($data_program);
        if ($status > 0) {
            //echo 'Berjaya';
            redirect(module_url("permohonan/view_program/$userid"));
        }
    }

    // public function view_program()
    // {
    //     $this->template->title("Senarai Permohonan");

    //     $list_permohonan = $this->Permohonan_model->view_all_permohonan();

    //     //check kalau program tu dah mohon perkhiodmatan atau tak
    //     foreach ($list_permohonan as $list) {
    //         $program_id = $list->T01_ID;
    //         $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($program_id);
    //         if (!empty($view_perkhidmatan)) {
    //             $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
    //         } else {
    //             $list->perkhidmatan = 0;
    //         }

    //     }

    //     $this->template->set("list_permohonan", $list_permohonan);
    //     $this->template->render();

    // }


    public function view_program()
    {
        $this->template->title("Pengesahan Permohonan");
        $list_permohonan = $this->Permohonan_model->view_all_permohonan();

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($list_permohonan as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0;
            }

        }
        $this->template->set("list_permohonan", $list_permohonan);
        $this->template->render();

    }

    public function view_programV2()
    {
        $this->template->title("Senarai Permohonan");
        $list_permohonan = $this->Permohonan_model->view_all_permohonan();

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($list_permohonan as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Permohonan_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0;
            }

        }
        $this->template->set("list_permohonan", $list_permohonan);
        $this->template->render();

    }

    public function delete_program($id)
    {
        //$id = $this->input->post('id');
        $user_id = $this->session->userdata('user_id');
        $status = $this->Permohonan_model->delete_selected_program($id);
        if ($status > 0) {
            //echo 'Berjaya';
            redirect(module_url("permohonan/view_program/$user_id"));
        }
    }

    public function edit_program($id)
    {
        //$id = $this->input->post('id');
        $data_to_edit = $this->Permohonan_model->edit_selected_program($id);
        $this->template->title("Kemaskini Permohonan");

        $this->template->set("data_edit", $data_to_edit);
        $this->template->render();

    }

    public function update_program()
    {
        $userid = $this->session->userdata('user_id');
        $program_id = $this->input->post('id');
        $nama_program = $this->input->post('nama_program');
        $tempat_program = $this->input->post('tempat_program');
        $tarikh_mula = $this->input->post('tarikh_mula');
        $tarikh_tamat = $this->input->post('tarikh_tamat');
        $bil_peserta = $this->input->post('bil_peserta');

        $data_program = [

            //"T01_USERID" => $userid,
            "T02_NAMA_PROGRAM" => $nama_program,
            "T02_TEMPAT_PROGRAM" => $tempat_program,
            "T02_TARIKH_MULA" => $tarikh_mula,
            "T02_TARIKH_TAMAT" => $tarikh_tamat,
            "T02_BIL_PESERTA" => $bil_peserta

        ];

        $status = $this->Permohonan_model->update_program($data_program, $program_id);
        if ($status > 0) {
            redirect(module_url("permohonan/view_program/$userid"));
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
            $id_program = $this->session->userdata('id_program');
        }
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

    public function index()
    {
        $this->template->title("Dashboard");

        $data_permohonan = $this->Permohonan_model->view_all_permohonan();

        $prog_belum_sah = 0;
        $prog_dijalankan = 0;

        foreach ($data_permohonan as $list) {
            $id_program = $list->T02_ID;
            $view_data_prog = $this->Permohonan_model->view_request_perkhidmatan($id_program);
            // var_dump($view_data_prog);
            foreach ($view_data_prog as $data) {
                if ($data->T05_PENGARAH == null) {
                    $list->belum_sah = 1; //Indicate program tu belum disahkan
                }
            }

            if (isset($list->belum_sah) && $list->belum_sah == 1) {
                $prog_belum_sah++;
            }

            if ($list->T02_TARIKH_TAMAT < date('Y-m-d')) {
                $prog_dijalankan++; //Indicate program tu dijalankan
            }
        }

        // var_dump($data_permohonan);
        $this->template->set("data_permohonan", $data_permohonan);
        $this->template->set("data_program", $view_data_prog);
        $this->template->set("prog_belum_sah", $prog_belum_sah);
        $this->template->set("prog_dijalankan", $prog_dijalankan);
        $this->template->render();

    }


    public function hantar_perkhidmatan($id_program)
    {
        if (isset($_POST['perkhidmatan'])) {
            $perkhidmatan = $_POST['perkhidmatan'];
            foreach ($perkhidmatan as $list) {

                if (isset($_POST['status_bahasa'][$list])) {
                    $bahasa = $_POST['status_bahasa'][$list];
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $bahasa
                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);

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
        if ($status > 0) {
            $user_id = $this->session->userdata('user_id');
            redirect(module_url("permohonan/view_program/$user_id"));
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
        if ($status > 0) {
            redirect(module_url("permohonan/perkhidmatan/$id_program"));
        }
    }

    public function kemaskini_perkhidmatan($id_program)
    {
        if (isset($_POST['perkhidmatan'])) {
            $perkhidmatan = $_POST['perkhidmatan'];
            foreach ($perkhidmatan as $list) {

                if (isset($_POST['status_bahasa'][$list])) {
                    $bahasa = $_POST['status_bahasa'][$list];
                    $data_to_insert = [
                        "T02_ID" => $id_program,
                        "T03_ID" => $list,
                        "T05_DETAIL" => $bahasa
                    ];
                    $status = $this->Permohonan_model->hantar_perkhidmatan($data_to_insert);

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
        if ($status > 0) {
            $user_id = $this->session->userdata('user_id');
            redirect(module_url("permohonan/view_program/$user_id"));
        }

    }

    public function test()
    {
        $this->template->title("Test");
        $this->template->render();

    }
    public function lulus_pengarah()
    {
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_program = $this->input->post('id_program');
        // $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');
        $status_perkhidmatan = 1; //Diluluskan
        $status = $this->Permohonan_model->lulus_pengarah($id_perkhidmatan, $status_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            // $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('permohonan/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            // $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('permohonan/perkhidmatan'));
        }
    }


    public function batal_pengarah()
    {
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_program = $this->input->post('id_program');
        // $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');

        $status_perkhidmatan = 0;
        $status = $this->Permohonan_model->batal_pengarah($id_perkhidmatan, $status_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            // $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('permohonan/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            // $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('permohonan/perkhidmatan'));
        }
    }



    public function tambah_komen()
    {
        $id_program = $this->input->post('id_program');
        $komen = $this->input->post('komen');
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $status = $this->Permohonan_model->tambah_komen($id_perkhidmatan, $komen);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            redirect(module_url('permohonan/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            redirect(module_url('permohonan/perkhidmatan'));
        }
    }

    public function kemaskini_komen()
    {
        $id_program = $this->input->post('id_program');
        $komen = $this->input->post('komen');
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $status = $this->Permohonan_model->kemaskini_komen($id_perkhidmatan, $komen);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            redirect(module_url('permohonan/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            redirect(module_url('permohonan/perkhidmatan'));
        }
    }

    public function delete_komen_pengarah()
    {
        $id_program = $this->input->post('id_program');
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $status = $this->Permohonan_model->delete_komen($id_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            redirect(module_url('permohonan/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            redirect(module_url('permohonan/perkhidmatan'));
        }
    }


}
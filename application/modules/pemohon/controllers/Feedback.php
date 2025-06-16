<?php

class Feedback extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Feedback_model');
    }

    // public function maklum_balas()
    // {
    //     $id_program = $this->input->post('id_program');
    //     $this->session->set_userdata('id_program', $id_program);

    //     //Buat kalau user x dak feedback gi je form kalau dah ada gi ke view
    //     $data_feedback = $this->Feedback_model->get_feedback_by_program($id_program);
    //     if ($data_feedback == null) {
    //         redirect(module_url('feedback/form_feedback'));
    //         //$this->form_feedback($id_program);// redirect to create feedback 
    //     } else {
    //         redirect(module_url('feedback/view_feedback'));
    //         //$this->view_feedback($id_program);// redirect to view feedback
    //     }
    // }

    public function maklum_balas()
    {
        $id_program = $this->input->post('id_program');
        $this->session->set_userdata('id_program', $id_program);

        redirect(module_url('feedback/view_feedback'));

    }
    public function form_feedback()
    {
        $this->template->title('Maklum Balas Program');
        $id_program = $this->session->userdata('id_program');
        $maklumat_program = $this->Feedback_model->get_maklumat_program($id_program);
        $this->template->set('program', $maklumat_program);
        $this->template->render();
    }

    public function hantar_feedback()
    {
        $status = 0;
        $id_program = $this->session->userdata('id_program');
        $maklum_balas = $this->input->post('maklum_balas');
        $penambahbaikan = $this->input->post('penambahbaikan');
        $user_id = $_SESSION["UID"];

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpeg|png|jpg|pdf';
        $config['max_size'] = 10240;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("gambar_program")) {
            $error = $this->upload->display_errors();
            log_message('error', "File Upload Error: " . $error);
            $this->session->set_flashdata('error', $error);
        } else {
            $uploadData = $this->upload->data();
            $fileName = $uploadData["file_name"];

            $data_feedback = [

                "T02_ID" => $id_program,
                "T06_FEEDBACK_GAMBAR" => $fileName,
                "T06_CREATE_BY" => $user_id,
                "T06_FEEDBACK" => $maklum_balas,
                "T06_PENAMBAHBAIKAN" => $penambahbaikan
            ];

            // Insert program data
            $status = $this->Feedback_model->tambah_feedback($data_feedback);

        }

        if ($status > 0) {
            redirect(module_url("permohonan/view_program"));
        } else {
            echo 'ERROR';
        }
    }
    public function view_feedback()
    {
        $this->template->title('Maklum Balas Program');
        $id_program = $this->session->userdata('id_program');
        $maklumat_program = $this->Feedback_model->get_maklumat_program($id_program);
        $maklumat_feedback = $this->Feedback_model->get_maklumat_feedback($id_program);

        $this->template->set('feedback', $maklumat_feedback);
        $this->template->set('program', $maklumat_program);
        //var_dump($maklumat_feedback);
        $this->template->render();
    }

    public function try()
    {
        $this->template->render();
    }
}

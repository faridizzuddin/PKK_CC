<?php
class Feedback extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Feedback_model');
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

    public function maklum_balas()
    {
        $id_program = $this->input->post('id_program');
        $this->session->set_userdata('id_program', $id_program);

        //Buat kalau user x dak feedback gi je form kalau dah ada gi ke view
        $data_feedback = $this->Feedback_model->get_feedback_by_program($id_program);
        if ($data_feedback == null) {
            redirect(module_url('feedback/form_feedback'));
            //$this->form_feedback($id_program);// redirect to create feedback 
        } else {
            redirect(module_url('feedback/view_feedback'));
            //$this->view_feedback($id_program);// redirect to view feedback
        }
    }
}
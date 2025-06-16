<?php

class Register extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
    }


    public function index()
    {
        $this->load->view('register/login');
    }

    public function register()
    {
        $this->load->view('register/register');
    }

    public function login_user()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Register_model->get_user_by_email($email);


        if (password_verify($password, $user->T09_PASSWORD)) {

            // $_SESSION["icno_luar"] = $user->T09_ID;
            $_SESSION["UID_mohon"] = $user->T09_ID;
            $_SESSION["user_id_mohon"] = $user->T09_ID;
            $_SESSION["STAFF_mohon"] = $user->T09_NAMA;
            $_SESSION["email_mohon"] = $user->T09_EMEL;
            $_SESSION["access_mohon"] = "luar";

            redirect(base_url('pemohon/permohonan/'));
        } else {
            // redirect(module_url('permohonan/login'));
            echo "Login failed! Please check your credentials.";
        }

    }

}
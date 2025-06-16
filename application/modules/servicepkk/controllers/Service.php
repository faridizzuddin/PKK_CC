<?php

class Service extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('service_model');
    }

    public function index()
    {
        $this->template->title("Permohonan Baru");
        $perkhidmatan = $this->service_model->view_all_perkhidmatan();

        $this->template->set("perkhidmatan", $perkhidmatan);
        $this->template->render();
    }
}
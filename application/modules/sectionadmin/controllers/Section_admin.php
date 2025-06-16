<?php
class Section_Admin extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Section_admin_model');
    }

    public function index()
    {

    }

    public function section_ppm()
    {
        $this->template->title('Seksyen Protokol dan Pengurusan Majlis');

        $data_ppm = $this->Section_admin_model->view_ppm_permohonan();

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($data_ppm as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Section_admin_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0;
            }

        }
        //$this->template->set("list_permohonan", $data_ppm);
        $this->template->set('data', $data_ppm);
        $this->template->render();
    }

    public function section_mk()
    {
        $this->template->title('Seksyen Media Kreatif');

        $data_mk = $this->Section_admin_model->view_mk_permohonan();

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($data_mk as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Section_admin_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0;
            }

        }
        $this->template->set('data', $data_mk);
        $this->template->render();
    }
    public function section_pkm()
    {
        $this->template->title('Seksyen Perhubungan Korporat dan Media');

        $data_pkm = $this->Section_admin_model->view_pkm_permohonan();

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($data_pkm as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Section_admin_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0;
            }

        }
        $this->template->set('data', $data_pkm);
        $this->template->render();
    }
    public function section_pc()
    {
        $this->template->title('Seksyen Promosi dan Citra');
        $data_pc = $this->Section_admin_model->view_pc_permohonan();

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($data_pc as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Section_admin_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0;
            }

        }
        $this->template->set('data', $data_pc);
        $this->template->render();
    }
    public function section_pk()
    {
        $this->template->title('Seksyen Pentadbiran dan Kewangan');
        $data_pk = $this->Section_admin_model->view_pk_permohonan();

        //check kalau program tu dah mohon perkhidmatan atau tak
        foreach ($data_pk as $list) {
            $program_id = $list->T02_ID;
            $view_perkhidmatan = $this->Section_admin_model->check_request_perkhidmatan($program_id);
            if (!empty($view_perkhidmatan)) {
                $list->perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
            } else {
                $list->perkhidmatan = 0;
            }

        }
        //$this->template->set("list_permohonan", $data_pk);
        $this->template->set('data', $data_pk);
        $this->template->render();
    }

    //SECTION LAIN LAIN DICONTROL OLEH SUPER ADMIN

    public function perkhidmatan()
    {

        $id_program = !empty($this->input->post('id_program')) ? $this->input->post('id_program') : $this->session->userdata('id_program');
        $id_seksyen = !empty($this->input->post('id_seksyen')) ? $this->input->post('id_seksyen') : $this->session->userdata('id_seksyen');
        $title = !empty($this->input->post('title')) ? $this->input->post('title') : $this->session->userdata('title');

        $this->template->title($title);
        $data = $this->Section_admin_model->view_request_perkhidmatan($id_program, $id_seksyen);
        $view_perkhidmatan = $this->Section_admin_model->check_request_perkhidmatan($id_program);
        $data_program = $this->Section_admin_model->view_selected_program($id_program);


        if (!empty($view_perkhidmatan)) {
            $check_perkhidmatan = 1; //return 1 kalau program pernah request perkhidmatan
        } else {
            $check_perkhidmatan = 0;
        }

        $this->template->set("check_perkhidmatan", $check_perkhidmatan);
        $this->template->set("id_program", $id_program);
        $this->template->set("data", $data);
        $this->template->set("data_program", $data_program);
        $this->template->set("id_seksyen", $id_seksyen);
        $this->template->set("title", $title);
        $this->template->render();
    }

    public function lulus_perkhidmatan()
    {
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_program = $this->input->post('id_program');
        $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');
        $status_perkhidmatan = 1; //Diluluskan
        $status = $this->Section_admin_model->lulus_perkhidmatan($id_perkhidmatan, $status_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        }
    }

    public function lulus_pengarah()
    {
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_program = $this->input->post('id_program');
        $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');
        $status_perkhidmatan = 1; //Diluluskan
        $status = $this->Section_admin_model->lulus_pengarah($id_perkhidmatan, $status_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        }
    }


    public function batal_perkhidmatan()
    {
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_program = $this->input->post('id_program');
        $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');

        $status_perkhidmatan = 0;
        $status = $this->Section_admin_model->batal_perkhidmatan($id_perkhidmatan, $status_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        }
    }

    public function batal_pengarah()
    {
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_program = $this->input->post('id_program');
        $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');

        $status_perkhidmatan = 0;
        $status = $this->Section_admin_model->batal_perkhidmatan($id_perkhidmatan, $status_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        }
    }

    public function tambah_komen()
    {
        $id_program = $this->input->post('id_program');
        $komen = $this->input->post('komen');
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');
        $status = $this->Section_admin_model->tambah_komen($id_perkhidmatan, $komen);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        }
    }

    public function kemaskini_komen()
    {
        $id_program = $this->input->post('id_program');
        $komen = $this->input->post('komen');
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');
        $status = $this->Section_admin_model->kemaskini_komen($id_perkhidmatan, $komen);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        }
    }

    public function delete_komen()
    {
        $id_program = $this->input->post('id_program');
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $id_seksyen = $this->input->post('id_seksyen');
        $title = $this->input->post('title');
        $status = $this->Section_admin_model->delete_komen($id_perkhidmatan);

        if ($status > 0) {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        } else {
            $this->session->set_userdata('id_program', $id_program);
            $this->session->set_userdata('id_seksyen', $id_seksyen);
            $this->session->set_userdata('title', $title);
            redirect(module_url('section_admin/perkhidmatan'));
        }
    }



}

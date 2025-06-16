<?php

class Kenderaan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kenderaan_model');

    }
    public function listkend()
    {
        $listkenderaan = $this->kenderaan_model->get_all_kenderaan();

        $this->template->title('Senarai Kenderaan'); //Tukar page title
        $this->template->set("listkenderaan", $listkenderaan);
        $this->template->render();
    }


    public function delete($id_kenderaan)
    {


        $this->kenderaan_model->delete_kenderaan($id_kenderaan);
        redirect(module_url('kenderaan/listkend'));
    }

    public function add()
    {
        $this->template->title('Tambah Kenderaan');

        $no_kenderaan = $this->input->post('nokenderaan');
        $jenis_kereta = $this->input->post('jeniskereta');
        $nama_pemilik = $this->input->post('pemilik');
        $pekerjaan = $this->input->post('pekerjaan');

        $data_to_insert = [
            "T01_NOMBOR_KENDERAAN" => $no_kenderaan,
            "T01_JENAMA" => $jenis_kereta,
            "T01_NAMA_PEMILIK_" => $nama_pemilik,
            "T01_PANGKAT" => $pekerjaan
        ];

        $this->db->insert('EV_T01_KENDERAAN', $data_to_insert);
        redirect(module_url('kenderaan/listkend'));

        //$this->template->render();
    }

    public function form_add()
    {
        $this->template->title('Tambah Kenderaan');
        $this->template->render();
    }

    public function form_edit($id_kenderaan)
    {
        $kenderaan = $this->db->where('T01_ID', $id_kenderaan)->get('EV_T01_KENDERAAN')->row();
        $this->template->set('kenderaan', $kenderaan);
        $this->template->title('Edit Kenderaan');
        $this->template->render();
    }

    public function update()
    {

        $id_kenderaan = $this->input->post('id_kenderaan');
        $no_kenderaan = $this->input->post('nokenderaan');
        $jenis_kereta = $this->input->post('jeniskereta');
        $nama_pemilik = $this->input->post('pemilik');
        $pekerjaan = $this->input->post('pekerjaan');

        $data_to_insert = [
            "T01_NOMBOR_KENDERAAN" => $no_kenderaan,
            "T01_JENAMA" => $jenis_kereta,
            "T01_NAMA_PEMILIK_" => $nama_pemilik,
            "T01_PANGKAT" => $pekerjaan
        ];

        //$this->db->insert('EV_T01_KENDERAAN', $data_to_insert);
        $this->db->where('T01_ID', $id_kenderaan)->update('EV_T01_KENDERAAN', $data_to_insert);
        redirect(module_url('kenderaan/listkend'));
    }
}
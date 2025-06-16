<?php

class Cenderamata extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cenderamata_model');
    }

    public function index()
    {
        $this->template->title("Cenderamata");
        $this->template->render();
    }

    public function senarai_cenderamata()
    {
        $this->template->title("Senarai Cenderamata");
        $data = $this->Cenderamata_model->senarai_cenderamata();
        $this->template->set("data_cenderamata", $data);
        $this->template->render();
    }

    public function form_cenderamata()
    {
        $this->template->title("Tambah Cenderamata");
        $this->template->render();
    }

    public function tambah_cenderamata()
    {

        $nama = $this->input->post("nama_cenderamata");
        $harga_warga = $this->input->post("harga_warga");
        $kuantiti = $this->input->post("kuantiti");

        $config['upload_path'] = './upload/cenderamata/';
        $config['allowed_types'] = 'jpeg|png|jpg|pdf';
        $config['max_size'] = 10240;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("gambar_cend")) {
            $error = $this->upload->display_errors();
            log_message('error', "File Upload Error: " . $error);
            $this->session->set_flashdata('error', $error);
        } else {
            $uploadData = $this->upload->data();
            $fileName = $uploadData["file_name"];

            $data = [
                'T04_CNAMA' => $nama,
                'T04_CHARGA' => $harga_warga,
                'T04_KUANTITI' => $kuantiti,
                'T04_GAMBAR' => $fileName,
                'T04_CREATE_BY' => $_SESSION["UID"],
            ];

            $status = $this->Cenderamata_model->tambah_cenderamata($data);
        }


        if ($status) {
            redirect("adminpkk/cenderamata/form_cenderamata");
            echo "Berjaya";
        } else {
            echo "Gagal";
        }
    }

    public function delete_cenderamata()
    {
        $id = $this->input->post('id_cenderamata');
        $status = $this->Cenderamata_model->delete_selected_cenderamata($id);
        if ($status > 0) {
            redirect('adminpkk/cenderamata/senarai_cenderamata');
        } else {
            echo "Gagal padam";
        }
    }
}
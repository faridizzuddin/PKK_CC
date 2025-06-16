<?php

class Perkhidmatan extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perkhidmatan_model');
    }

    public function try()
    {
        echo $this->input->post('T03_ID');
    }

    public function form_perkhidmatan()
    {
        $this->template->title("Tambah Perkhidmatan");
        $this->template->render();
    }

    public function tambah_perkhidmatan()
    {
        $user = $_SESSION["UID"];
        $nama_perkhidmatan = $this->input->post('nama_perkhidmatan');
        $harga = $this->input->post('harga_warga');
        $harga_bw = $this->input->post('harga_bukan_warga');
        $seksyen = $this->input->post('seksyen');
        $status_perkhidmatan = isset($_POST['status_perkhidmatan']) ? 1 : 0;
        $detail = $this->input->post('detail');

        switch ($seksyen) {
            case 'Seksyen Protokol dan Pengurusan Majlis':
                $seksyen = 1;
                break;
            case 'Seksyen Media Kreatif':
                $seksyen = 2;
                break;
            case 'Seksyen Perhubungan Korporat dan Media':
                $seksyen = 3;
                break;
            case 'Seksyen Promosi dan Citra':
                $seksyen = 4;
                break;
            case 'Seksyen Pentadbiran dan Kewangan':
                $seksyen = 5;
                break;
            case 'Lain - Lain':
                $seksyen = 6;
                break;
            default:
                $seksyen = 6;
                break;
        }


        $data_perkhidmatan = [
            'T03_NAMA_PERKHIDMATAN' => $nama_perkhidmatan,
            'T03_STATUS_PERKHIDMATAN' => $status_perkhidmatan,
            'T03_HARGA_WARGA' => $harga,
            'T12_ID' => $seksyen,
            'T03_HARGA_LUAR' => $harga_bw,
            'T03_DETAIL' => $detail,
            'T03_CREATE_BY' => $user,
        ];

        $status = $this->Perkhidmatan_model->tambah_perkhidmatan($data_perkhidmatan);
        if ($status > 0) {
            redirect(module_url('perkhidmatan/form_perkhidmatan'));
        } else {
            echo "Gagal";
        }
    }

    public function senarai_perkhidmatan()
    {

        $this->template->title('Senarai Perkhidmatan');
        $data = $this->Perkhidmatan_model->view_all_perkhidmatan();
        $this->template->set('perkhidmatan', $data);
        $this->template->render();
    }
    public function senarai_perkhidmatanV2()
    {

        $this->template->title('Senarai Perkhidmatan');
        $data = $this->Perkhidmatan_model->view_all_perkhidmatan();
        $this->template->set('perkhidmatan', $data);
        $this->template->render();
    }

    public function edit_perkhidmatan()
    {
        $id_perkhidmatan = $this->input->post('T03_ID');

        $data = $this->Perkhidmatan_model->view_selected_perkhidmatan($id_perkhidmatan);

        switch ($data->T12_ID) {
            case 1:
                $data->T12_ID = 'Seksyen Protokol dan Pengurusan Majlis';
                break;
            case 2:
                $data->T12_ID = 'Seksyen Media Kreatif';
                break;
            case 3:
                $data->T12_ID = 'Seksyen Perhubungan Korporat dan Media';
                break;
            case 4:
                $data->T12_ID = 'Seksyen Promosi dan Citra';
                break;
            case 5:
                $data->T12_ID = 'Seksyen Pentadbiran dan Kewangan';
                break;
            case 6:
            default:
                $data->T12_ID = 'Lain - Lain';
                break;
        }

        $this->template->set('perkhidmatan', $data);
        $this->template->render();
    }

    public function kemaskini_perkhidmatan()
    {
        $id_perkhidmatan = $this->input->post('id_perkhidmatan');
        $user = $_SESSION["UID"];
        $nama_perkhidmatan = $this->input->post('nama_perkhidmatan');
        $harga = $this->input->post('harga_warga');
        $harga_bw = $this->input->post('harga_bukan_warga');
        $seksyen = $this->input->post('seksyen');
        $status_perkhidmatan = isset($_POST['status_perkhidmatan']) ? 1 : 0;
        $detail = $this->input->post('detail');

        switch ($seksyen) {
            case 'Seksyen Protokol dan Pengurusan Majlis':
                $seksyen = 1;
                break;
            case 'Seksyen Media Kreatif':
                $seksyen = 2;
                break;
            case 'Seksyen Perhubungan Korporat dan Media':
                $seksyen = 3;
                break;
            case 'Seksyen Promosi dan Citra':
                $seksyen = 4;
                break;
            case 'Seksyen Pentadbiran dan Kewangan':
                $seksyen = 5;
                break;
            case 'Lain - Lain':
                $seksyen = 6;
                break;
            default:
                $seksyen = 6;
                break;
        }

        $data_to_update = [
            'T03_NAMA_PERKHIDMATAN' => $nama_perkhidmatan,
            'T03_STATUS_PERKHIDMATAN' => $status_perkhidmatan,
            'T03_HARGA_WARGA' => $harga,
            'T12_ID' => $seksyen,
            'T03_HARGA_LUAR' => $harga_bw,
            'T03_DETAIL' => $detail,
            'T03_CREATE_BY' => $user,
        ];

        $status = $this->Perkhidmatan_model->kemaskini_perkhidmatan($id_perkhidmatan, $data_to_update);
        if ($status > 0) {
            redirect(module_url('perkhidmatan/senarai_perkhidmatan'));
        } else {
            echo "Gagal Kemaskini";
        }
    }
    public function delete_perkhidmatan()
    {
        $id_perkhidmatan = $this->input->post('T03_ID');


        $status = $this->Perkhidmatan_model->delete_perkhidmatan($id_perkhidmatan);
        if ($status > 0) {
            redirect(module_url('perkhidmatan/senarai_perkhidmatan'));
        } else {
            echo "Gagal Kemaskini";
        }
    }

}
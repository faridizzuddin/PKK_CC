<?php

class Section_admin_model extends CI_Model
{

    // $sql = "SELECT T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, 
    //        T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF
    //         FROM PKK_T02_PROGRAM T2
    //         JOIN PKK_T05_PERMOHONAN T5 ON T5.T02_ID = T2.T02_ID
    //         JOIN PKK_T03_PERKHIDMATAN T3 ON T3.T03_ID = T5.T03_ID
    //         WHERE T3.T12_ID = 1
    //         GROUP BY T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, 
    //         T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF";

    // $data_ppm = $this->db->query($sql)->result();
    function view_ppm_permohonan()
    {
        $data_ppm = $this->db->select('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->from('PKK_T02_PROGRAM T2')
            ->join('PKK_T05_PERMOHONAN T5', 'T5.T02_ID = T2.T02_ID')
            ->join('PKK_T03_PERKHIDMATAN T3', 'T3.T03_ID = T5.T03_ID')
            ->where('T3.T12_ID', 1) //UNTUK SENSYEN PPM
            ->group_by('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->get()
            ->result();
        return $data_ppm;
    }

    function view_pk_permohonan()
    {
        $data_ppm = $this->db->select('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->from('PKK_T02_PROGRAM T2')
            ->join('PKK_T05_PERMOHONAN T5', 'T5.T02_ID = T2.T02_ID')
            ->join('PKK_T03_PERKHIDMATAN T3', 'T3.T03_ID = T5.T03_ID')
            ->where('T3.T12_ID', 5) //UNTUK SEKSYEN 
            ->group_by('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->get()
            ->result();
        return $data_ppm;
    }
    function view_pc_permohonan()
    {
        $data_ppm = $this->db->select('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->from('PKK_T02_PROGRAM T2')
            ->join('PKK_T05_PERMOHONAN T5', 'T5.T02_ID = T2.T02_ID')
            ->join('PKK_T03_PERKHIDMATAN T3', 'T3.T03_ID = T5.T03_ID')
            ->where('T3.T12_ID', 4) //UNTUK SEKSYEN
            ->group_by('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->get()
            ->result();
        return $data_ppm;
    }

    function view_pkm_permohonan()
    {
        $data_ppm = $this->db->select('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->from('PKK_T02_PROGRAM T2')
            ->join('PKK_T05_PERMOHONAN T5', 'T5.T02_ID = T2.T02_ID')
            ->join('PKK_T03_PERKHIDMATAN T3', 'T3.T03_ID = T5.T03_ID')
            ->where('T3.T12_ID', 3) //UNTUK SEKSYEN 
            ->group_by('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->get()
            ->result();
        return $data_ppm;
    }

    function view_mk_permohonan()
    {
        $data_ppm = $this->db->select('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->from('PKK_T02_PROGRAM T2')
            ->join('PKK_T05_PERMOHONAN T5', 'T5.T02_ID = T2.T02_ID')
            ->join('PKK_T03_PERKHIDMATAN T3', 'T3.T03_ID = T5.T03_ID')
            ->where('T3.T12_ID', 2) //UNTUK SEKSYEN MK
            ->group_by('T2.T02_ID, T2.T02_NAMA_PROGRAM, T2.T02_TEMPAT_PROGRAM, T2.T02_TARIKH_MULA, T2.T02_TARIKH_TAMAT, T2.T02_BIL_PESERTA, T2.T02_TENTATIF')
            ->get()
            ->result();
        return $data_ppm;
    }

    function view_all_permohonan()
    {
        $list_permohonan = $this->db->get('PKK_T02_PROGRAM')->result();
        return $list_permohonan;
    }

    function check_request_perkhidmatan($id_program)
    {
        $data_request_perkhidmatan = $this->db->where('T02_ID', $id_program)->get('PKK_T05_PERMOHONAN')->result();
        return $data_request_perkhidmatan;
    }

    function view_request_perkhidmatan($id_program, $id_seksyen)
    {
        //check perkhidmatan kalau dah booked by the program
        $data = $this->db->join('PKK_T03_PERKHIDMATAN', 'PKK_T03_PERKHIDMATAN.T03_ID = PKK_T05_PERMOHONAN.T03_ID')->where('PKK_T05_PERMOHONAN.T02_ID', $id_program)->where('PKK_T03_PERKHIDMATAN.T12_ID', $id_seksyen)->get('PKK_T05_PERMOHONAN')->result();
        //$data = $this->db->join('PKK_T06_PERKHIDMATAN', 'PKK_T06_PERKHIDMATAN.T06_ID = PKK_T03_MOHON_SERVIS2.T06_ID')->where('PKK_T03_MOHON_SERVIS2.T01_ID', $id_program)->get('PKK_T03_MOHON_SERVIS2')->result();
        return $data;
    }

    function view_selected_program($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T02_PROGRAM')->row();
        return $data;
    }

    function lulus_perkhidmatan($id_perkhidmatan, $status_perkhidmatan)
    {

        $status = $this->db->set('T05_SEKSYEN_ADMIN', $status_perkhidmatan)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function lulus_pengarah($id_perkhidmatan, $status_perkhidmatan)
    {

        $status = $this->db->set('T05_PENGARAH', $status_perkhidmatan)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function batal_perkhidmatan($id_perkhidmatan, $status_perkhidmatan)
    {

        $status = $this->db->set('T05_SEKSYEN_ADMIN', $status_perkhidmatan)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function batal_pengarah($id_perkhidmatan, $status_perkhidmatan)
    {

        $status = $this->db->set('T05_PENGARAH', $status_perkhidmatan)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function tambah_komen($id_perkhidmatan, $komen)
    {
        $status = $this->db->set('T05_KOMEN_SEKSYEN', $komen)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function kemaskini_komen($id_perkhidmatan, $komen)
    {
        $status = $this->db->set('T05_KOMEN_SEKSYEN', $komen)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function delete_komen($id_perkhidmatan)
    {
        $status = $this->db->set('T05_KOMEN_SEKSYEN', '')->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

}
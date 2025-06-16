<?php

class Permohonan_model extends CI_Model
{

    function tambah_program($data_program)
    {
        $status = $this->db->insert('PKK_T02_PROGRAM', $data_program);
        return $status;

    }

    function view_all_permohonan()
    {
        $list_permohonan = $this->db->get('PKK_T02_PROGRAM')->result();
        return $list_permohonan;
    }

    function view_program_by_id($id_user)
    {
        $data = $this->db->where('T01_ID', $id_user)->get('PKK_T02_PROGRAM')->result();
        return $data;
    }

    function delete_selected_program($id_program)
    {
        $status = $this->db->where('T02_ID', $id_program)->delete('PKK_T02_PROGRAM');
        return $status;
    }

    function edit_selected_program($id_program)
    {
        $data_to_edit = $this->db->where('T02_ID', $id_program)->get('PKK_T02_PROGRAM')->row();
        return $data_to_edit;

    }

    function update_program($data_program, $id_program)
    {
        $status = $this->db->where('T02_ID', $id_program)->update('PKK_T02_PROGRAM', $data_program);
        return $status;
    }

    function view_all_perkhidmatan()
    {
        $list_perkhidmatan = $this->db->order_by('T03_ID', 'ASC')->get('PKK_T03_PERKHIDMATAN')->result();
        return $list_perkhidmatan;
    }

    function check_request_perkhidmatan($id_program)
    {
        $data_request_perkhidmatan = $this->db->where('T02_ID', $id_program)->get('PKK_T05_PERMOHONAN')->result();
        return $data_request_perkhidmatan;
    }


    function hantar_perkhidmatan($data_to_insert)
    {
        $status = $this->db->insert('PKK_T05_PERMOHONAN', $data_to_insert);
        return $status;
    }

    function view_request_perkhidmatan($id_program)
    {
        //check perkhidmatan kalau dah booked by the program
        $data = $this->db->join('PKK_T03_PERKHIDMATAN', 'PKK_T03_PERKHIDMATAN.T03_ID = PKK_T05_PERMOHONAN.T03_ID')->where('PKK_T05_PERMOHONAN.T02_ID', $id_program)->get('PKK_T05_PERMOHONAN')->result();
        //$data = $this->db->join('PKK_T06_PERKHIDMATAN', 'PKK_T06_PERKHIDMATAN.T06_ID = PKK_T03_MOHON_SERVIS2.T06_ID')->where('PKK_T03_MOHON_SERVIS2.T01_ID', $id_program)->get('PKK_T03_MOHON_SERVIS2')->result();
        return $data;
    }

    function view_req_perkhidmatan_id($id_program)
    {
        $data = $this->db->select('T06_ID')->where('T01_ID', $id_program)->get('PKK_T03_MOHON_SERVIS2')->result();
        return $data;
    }

    function delete_perkhidmatan($id_perkhidmatan)
    {
        $status = $this->db->where('T05_ID', $id_perkhidmatan)->delete('PKK_T05_PERMOHONAN');
        return $status;
    }

    function view_selected_program($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T02_PROGRAM')->row();
        return $data;
    }

    function lulus_pengarah($id_perkhidmatan, $status_perkhidmatan)
    {

        $status = $this->db->set('T05_PENGARAH', $status_perkhidmatan)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function batal_pengarah($id_perkhidmatan, $status_perkhidmatan)
    {

        $status = $this->db->set('T05_PENGARAH', $status_perkhidmatan)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function check_cenderamata($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T07_MOHON_CENDERAMATA')->result();
        return $data;
    }


    function view_request_cenderamata($id_program)
    {
        //check perkhidmatan kalau dah booked by the program
        $data = $this->db->join('PKK_T04_CENDERAMATA', 'PKK_T04_CENDERAMATA.T04_ID = PKK_T07_MOHON_CENDERAMATA.T04_ID')->where('PKK_T07_MOHON_CENDERAMATA.T02_ID', $id_program)->get('PKK_T07_MOHON_CENDERAMATA')->result();
        return $data;
    }

    function tambah_komen($id_perkhidmatan, $komen)
    {
        $status = $this->db->set('T05_KOMEN_PENGARAH', $komen)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function kemaskini_komen($id_perkhidmatan, $komen)
    {
        $status = $this->db->set('T05_KOMEN_PENGARAH', $komen)->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }

    function delete_komen($id_perkhidmatan)
    {
        $status = $this->db->set('T05_KOMEN_PENGARAH', '')->where('T05_ID', $id_perkhidmatan)->update('PKK_T05_PERMOHONAN');
        return $status;
    }



}
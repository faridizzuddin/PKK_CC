<?php

class Feedback_model extends CI_Model
{

    function get_feedback_by_program($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T06_FEEDBACK')->result();
        return $data;
    }

    function get_maklumat_program($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T02_PROGRAM')->row();
        return $data;
    }

    function tambah_feedback($data)
    {
        $status = $this->db->insert('PKK_T06_FEEDBACK', $data);
        return $status;
    }

    function get_maklumat_feedback($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T06_FEEDBACK')->row();
        return $data;

    }

}
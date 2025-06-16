<?php

class Perkhidmatan_model extends CI_Model
{

    public function tambah_perkhidmatan($data_perkhidmatan)
    {
        $status = $this->db->insert('PKK_T03_PERKHIDMATAN', $data_perkhidmatan);
        return $status;
    }

    public function view_all_perkhidmatan()
    {
        $perkhidmatan = $this->db->get('PKK_T03_PERKHIDMATAN')->result();
        return $perkhidmatan;
    }

    public function view_selected_perkhidmatan($id_perkhidmatan)
    {
        $perkhidmatan = $this->db->where('T03_ID', $id_perkhidmatan)->get('PKK_T03_PERKHIDMATAN')->row();
        return $perkhidmatan;
    }

    public function kemaskini_perkhidmatan($id_perkhidmatan, $data_perkhidmatan)
    {
        $status = $this->db->where('T03_ID', $id_perkhidmatan)->update('PKK_T03_PERKHIDMATAN', $data_perkhidmatan);
        return $status;
    }

    public function delete_perkhidmatan($id_perkhidmatan)
    {
        $status = $this->db->where('T03_ID', $id_perkhidmatan)->delete('PKK_T03_PERKHIDMATAN');
        return $status;
    }

}
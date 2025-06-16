<?php
class kenderaan_model extends CI_Model
{

    function get_all_kenderaan()
    {
        $listkenderaan = $this->db->get('EV_T01_KENDERAAN')->result();
        return $listkenderaan;
    }

    function delete_kenderaan($id_kenderaan)
    {
        $delete = $this->db->where('T01_ID', $id_kenderaan)->delete('EV_T01_KENDERAAN');
    }
}
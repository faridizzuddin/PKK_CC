<?php

class service_model extends CI_Model
{
    function view_all_perkhidmatan()
    {
        $list_perkhidmatan = $this->db->get('PKK_T06_PERKHIDMATAN')->result();
        return $list_perkhidmatan;
    }

}
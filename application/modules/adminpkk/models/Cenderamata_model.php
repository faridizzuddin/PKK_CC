<?php

class Cenderamata_model extends CI_Model
{

    function tambah_cenderamata($data_cenderamata)
    {
        $status = $this->db->insert('PKK_T04_CENDERAMATA', $data_cenderamata);
        return $status;
    }
    function view_all_cenderamata()
    {
        $list_cenderamata = $this->db->order_by('T04_ID', 'ASC')->get('PKK_T04_CENDERAMATA')->result();
        return $list_cenderamata;
    }

    function senarai_cenderamata()
    {
        $list_cenderamata = $this->db->get('PKK_T04_CENDERAMATA')->result();
        return $list_cenderamata;
    }

    function delete_selected_cenderamata($id_cenderamata)
    {
        $status = $this->db->where('T04_ID', $id_cenderamata)->delete('PKK_T04_CENDERAMATA');
        return $status;
    }


}
<?php

class Permohonan_model extends CI_Model
{

    function tambah_program($data_program)
    {
        $this->db->insert('PKK_T02_PROGRAM', $data_program);

        $sql = "SELECT PKK_T02_PROGRAM_SEQ3.CURRVAL AS id FROM dual";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function insertFile($data)
    {
        $status = $this->db->insert('TRY', $data);
        return $status;
    }

    function get_user_data($uid)
    {
        //$detail_user = $this->db->where('T01_ID', $uid)->get('PKK_T01_USER')->row();
        //buat masa sekarang just tambah database warga umt dalam database fyp sebab x tau mcam mna nak connect dua database dalam satu masa
        $detail_user = $this->db->where('ID_WARGA', $uid)->get('WARGA_UMT')->row(); //kena ubah balik kalau dah integrate dengan view yang sebenar
        return $detail_user;
    }

    function view_all_permohonan()
    {
        $list_permohonan = $this->db->get('PKK_T02_PROGRAM')->result();
        return $list_permohonan;
    }

    function view_done_mohon()
    {
        $list_permohonan = $this->db->join('PKK_T02_PROGRAM', 'PKK_T05_PERMOHONAN.T02_ID = PKK_T02_PROGRAM.T02_ID')
            ->get('PKK_T05_PERMOHONAN')
            ->result();

        return $list_permohonan;
    }

    function view_program_by_id($id_user)
    {
        $data = $this->db->where('UPPER(T01_ID)', strtoupper($id_user))->order_by('T02_ID', 'DESC')->get('PKK_T02_PROGRAM')->result();
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
        $data = $this->db->select('T06_ID')->where('UPPER(T01_ID)', strtoupper($id_program))->get('PKK_T03_MOHON_SERVIS2')->result();
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

    function check_cenderamata($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T07_MOHON_CENDERAMATA')->result();
        return $data;
    }

    function check_cenderamata_by_id($id_cenderamata)
    {
        $data = $this->db->where('T04_ID', $id_cenderamata)->get('PKK_T07_MOHON_CENDERAMATA')->row();
        return $data;
    }


    function view_request_cenderamata($id_program)
    {
        $data = $this->db->join('PKK_T04_CENDERAMATA', 'PKK_T04_CENDERAMATA.T04_ID = PKK_T07_MOHON_CENDERAMATA.T04_ID')->where('PKK_T07_MOHON_CENDERAMATA.T02_ID', $id_program)->get('PKK_T07_MOHON_CENDERAMATA')->result();

        return $data;
    }

    // function view_request_cenderamata1($id_program)
    // {
    //     $data = $this->db
    //         ->select('
    //             MAX(PKK_T04_CENDERAMATA.T04_ID) AS T04_ID,
    //             MAX(PKK_T04_CENDERAMATA.T04_CNAMA) AS T04_CNAMA,
    //             MAX(PKK_T07_MOHON_CENDERAMATA.T07_STATUS) AS T07_STATUS,
    //             MAX(PKK_T07_MOHON_CENDERAMATA.T07_HARGA) AS T07_HARGA,
    //             MAX(PKK_T07_MOHON_CENDERAMATA.T07_ID) AS T07_ID,
    //             SUM(PKK_T07_MOHON_CENDERAMATA.T07_BIL) AS T07_BIL
    //         ')
    //         ->join('PKK_T04_CENDERAMATA', 'PKK_T04_CENDERAMATA.T04_ID = PKK_T07_MOHON_CENDERAMATA.T04_ID')
    //         ->where('PKK_T07_MOHON_CENDERAMATA.T02_ID', $id_program)
    //         ->group_by('PKK_T04_CENDERAMATA.T04_ID')
    //         ->get('PKK_T07_MOHON_CENDERAMATA')
    //         ->result();


    //     return $data;
    // }


    function view_all_cenderamata()
    {
        $data = $this->db->get('PKK_T04_CENDERAMATA')->result();
        return $data;
    }

    function get_data_permohonan($id)
    {
        $this->db->where('UPPER(T01_ID)', strtoupper($id));
        $count = $this->db->count_all_results('PKK_T02_PROGRAM');
        return $count;
    }

    function register($data)
    {
        $status = $this->db->insert('PKK_T09_WARGA_LUAR', $data);
        return $status;
    }
    function get_user_by_email($email)
    {
        $query = $this->db->where('T09_EMEL', $email)->get('PKK_T09_WARGA_LUAR')->row();
        return $query;
    }

    function mohon_cenderamata($data_cenderamata)
    {
        $status = $this->db->insert('PKK_T07_MOHON_CENDERAMATA', $data_cenderamata);
        return $status;
    }

    function delete_cenderamata($id_cenderamata)
    {
        $status = $this->db->where('T04_ID', $id_cenderamata)->delete('PKK_T07_MOHON_CENDERAMATA');
        // $status = $this->db->query('delete from PKK_T07_MOHON_CENDERAMATA where T04_ID = ' . $id_cenderamata);
        return $status;
    }

    function update_cenderamata($data_cenderamata, $id_cenderamata)
    {
        $status = $this->db->where('T07_ID', $id_cenderamata)->update('PKK_T07_MOHON_CENDERAMATA', $data_cenderamata);
        return $status;
    }
    function get_user_by_id($uid)
    {
        $data = $this->db->where('UPPER(T01_ID)', strtoupper($uid))->get('PKK_T01_USER')->row();

        return $data;
    }

    function get_quotation($id_program)
    {
        $data = $this->db->where('T02_ID', $id_program)->get('PKK_T08_QUOTATION')->row();
        return $data;
    }

    function get_roles($uid)
    {
        // $result = $this->db
        //     ->select('PKK_T12_SEKSYEN.T12_SEKSYEN')
        //     ->join('PKK_T12_SEKSYEN', 'PKK_T12_SEKSYEN.T12_ID = PKK_T11_ADMIN.T12_ID', 'inner') // 'inner' is optional, as it's the default for join()
        //     ->where('T01_ID', $uid) // CodeIgniter automatically escapes the value
        //     ->get('PKK_T11_ADMIN')
        //     ->row(); // Use ->row() if you expect only one result, or ->result() for multiple

        // $result = $this->db->query("SELECT PKK_T12_SEKSYEN.T12_SEKSYEN FROM PKK_T11_ADMIN JOIN PKK_T12_SEKSYEN ON PKK_T12_SEKSYEN.T12_ID = PKK_T11_ADMIN.T12_ID WHERE T01_ID = '" . $uid . "'")->row();

        $result = $this->db->select('PKK_T12_SEKSYEN.T12_SEKSYEN, PKK_T12_SEKSYEN.T12_ID')
            ->from('PKK_T11_ADMIN')
            ->join('PKK_T12_SEKSYEN', 'PKK_T12_SEKSYEN.T12_ID = PKK_T11_ADMIN.T12_ID')
            ->where('UPPER(T01_ID)', strtoupper($uid))
            ->get()
            ->row();



        // var_dump($result);



        return $result;

    }

    function get_all_permohonan()
    {
        $data = $this->db->get('PKK_T05_PERMOHONAN')->result();
        return $data;
    }

    function get_service_stat()
    {
        $data = $this->db->select('m.T03_NAMA_PERKHIDMATAN, COUNT(*) as total')
            ->from('PKK_T05_PERMOHONAN p')
            ->join('PKK_T03_PERKHIDMATAN m', 'm.T03_ID = p.T03_ID')
            ->group_by(['p.T03_ID', 'm.T03_NAMA_PERKHIDMATAN'])
            ->get()
            ->result();
        return $data;
    }

    function get_warga_luar()
    {
        $data = $this->db->select('COUNT(*) as total')->from('PKK_T09_WARGA_LUAR')->get()->row();
        return $data;
    }

}
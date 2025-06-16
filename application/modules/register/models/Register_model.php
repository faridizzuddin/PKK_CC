<?php

class Register_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
    }

    public function register_user($data)
    {
        return $this->db->insert('users', $data);
    }

    // public function get_user_by_email($email)
    // {
    //     $this->db->where('T09_EMEL', $email);
    //     return $this->db->get('users')->row();
    // }

    function get_user_by_email($email)
    {
        $query = $this->db->where('T09_EMEL', $email)->get('PKK_T09_WARGA_LUAR')->row();
        return $query;
    }
}
<?php

class Login extends CI_Model{
    public function get_user($where,$table){
        return $this->db->get_where($table,$where);

    }
    public function daftar($data,$table){
        return $this->db->insert($table,$data);

    }
}
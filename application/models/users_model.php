<?php

Class Users_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $data = $this->db->get('users');
        return $data->result_array();
    }

    public function find($id) {
        $this->db->where('id', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $data = $this->db->get('users');
        return $data->row_array();
    }

    public function login($uname, $paswd) {
        $this->db->where('username', $uname);
        $this->db->where('password', md5($paswd));
        $data = $this->db->get('users');
        return $data->row_array();
    }

    public function create($data = array()) {
        $this->db->insert("users", $data);
    }

    public function update($id, $data = array()) {
        $this->db->where('id', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->update("users", $data);
    }

    public function delete($id, $data = array()) {
        $this->db->where('id', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->delete("users");
    }

}
<?php

Class Pelanggan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $data = $this->db->get('pelanggan');
        return $data->result_array();
    }

    public function find($id) {
        $this->db->where('id_pelanggan', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $data = $this->db->get('pelanggan');
        return $data->row_array();
    }

    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $data = $this->db->get('pelanggan');
        return $data->row_array();
    }

    public function where($data = array()) {

        foreach ($data as $k => $v) {
            $this->db->where($k, $v);
        }

        $data = $this->db->get('pelanggan');
        return $data->result_array();
    }

    public function create($data = array()) {
        $this->db->insert('pelanggan', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array()) {
        $this->db->where('id_pelanggan', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->update('pelanggan', $data);
    }

    public function delete($id) {
        $this->db->where('id_pelanggan', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->delete('pelanggan');
    }

}
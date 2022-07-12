<?php

Class Pengaturan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function find() {
        $this->db->where('id', 1);
        $data = $this->db->get('pengaturan');
        return $data->row_array();
    }

    public function update($data = array()) {
        $this->db->where('id', 1);
        $this->db->update('pengaturan', $data);
    }

}
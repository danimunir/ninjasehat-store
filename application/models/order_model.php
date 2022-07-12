<?php

Class Order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $this->db->join('pelanggan', 'id_pelanggan=pembeli_id');
        $data = $this->db->get('order');
        return $data->result_array();
    }

    public function find($id) {
        $this->db->where('id_order', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->join('pelanggan', 'id_pelanggan=pembeli_id');
        $data = $this->db->get('order');
        return $data->row_array();
    }

    public function find_by_resi($resi) {
        $this->db->where('resi', $resi);
        $data = $this->db->get('order');
        return $data->row_array();
    }

    public function where($data = array()) {

        foreach ($data as $k => $v) {
            $this->db->where($k, $v);
        }

        $data = $this->db->get('order');
        return $data->result_array();
    }

    public function getToFinishOrder($id) {
        $this->db->limit(1);
        $this->db->order_by('id_order', 'DESC');
        $this->db->where('pembeli_id', $id);
        $this->db->join('pelanggan', 'id_pelanggan=pembeli_id');
        $data = $this->db->get('order');
        return $data->row_array();
    }

    public function count_unread() {
        $this->db->where('status', '0');
        $data = $this->db->get('order');
        return $data->num_rows();
    }

    public function create($data = array()) {
        $this->db->insert('order', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array()) {
        $this->db->where('id_order', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->update('order', $data);
    }

    public function delete($id) {
        $this->db->where('id_order', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->delete('order');
    }

}
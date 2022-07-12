<?php

Class Orderkonfirm_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $data = $this->db->get('orderkonfirm');
        return $data->result_array();
    }

    public function find($id) {
        $this->db->where('id_orkonfirm', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->join('order', 'order_id=id_order');
        $this->db->join('pelanggan', 'pembeli_id=id_pelanggan');
        $data = $this->db->get('orderkonfirm');
        return $data->row_array();
    }

    public function count_unread() {
        $this->db->where('terbaca', '0');
        $data = $this->db->get('orderkonfirm');
        return $data->num_rows();
    }

    public function create($data = array()) {
        $this->db->insert('orderkonfirm', $data);
    }

    public function update($id, $data = array()) {
        $this->db->where('id_orkonfirm', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->update('orderkonfirm', $data);
    }

    public function delete($id) {
        $this->db->where('id_orkonfirm', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->delete('orderkonfirm');
    }

}
<?php

Class Orderdetail_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $this->db->join('order', 'id_order=order_id');
        $data = $this->db->get('orderdetail');
        return $data->result_array();
    }

    public function find($id) {
        $this->db->where('id_ordetail', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $data = $this->db->get('orderdetail');
        return $data->row_array();
    }

    public function where($data_where = array()) {

        foreach ($data_where as $k => $v) {
            $this->db->where($k, $v);
        }

        $this->db->join('produk', 'id_produk=produk_id');
        $data = $this->db->get('orderdetail');
        return $data->result_array();
    }

    public function create($data = array()) {
        $this->db->insert('orderdetail', $data);
    }

    public function update($id, $data = array()) {
        $this->db->where('id_ordetail', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->update('orderdetail', $data);
    }

    public function delete($id) {
        $this->db->where('id_ordetail', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->delete('orderdetail');
    }

}
<?php

Class Produk_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $this->db->join('katalog', 'id_katalog=katalog_id');
        $data = $this->db->get('produk');
        return $data->result_array();
    }

    public function find($id) {
        $this->db->where('id_produk', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->join('katalog', 'id_katalog=katalog_id');
        $data = $this->db->get('produk');
        return $data->row_array();
    }

    public function find_where($permalink) {
        $data = $this->db->query("SELECT * FROM produk WHERE permalink='$permalink'");
        return $data->row_array();
    }

    public function where($data = array()) {

        foreach ($data as $k => $v) {
            $this->db->where($k, $v);
        }

        $this->db->join('katalog', 'id_katalog=katalog_id');
        $data = $this->db->get('produk');
        return $data->result_array();
    }

    public function get_by_katalog($katalog) {
        $data = $this->db->query("SELECT * FROM produk, katalog WHERE id_katalog=katalog_id AND katalog_id='$katalog' ORDER BY id_produk DESC LIMIT 9");
        return $data->result_array();
    }

    public function where_limit($data, $int) {

        foreach ($data as $k => $v) {
            $this->db->where($k, $v);
        }

        $this->db->limit($int);
        $this->db->order_by('id_produk', 'DESC');
        $this->db->join('katalog', 'id_katalog=katalog_id');
        $data = $this->db->get('produk');
        return $data->result_array();
    }

    public function limit($int) {
        $this->db->limit($int);
        $this->db->order_by('id_produk', 'DESC');
        $this->db->join('katalog', 'id_katalog=katalog_id');
        $data = $this->db->get('produk');
        return $data->result_array();
    }

    public function create($data = array()) {
        $this->db->insert('produk', $data);
    }

    public function update($id, $data = array()) {
        $this->db->where('id_produk', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->update('produk', $data);
    }

    public function delete($id) {
        $this->db->where('id_produk', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->delete('produk');
    }

}
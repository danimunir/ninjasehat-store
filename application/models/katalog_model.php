<?php

Class Katalog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $data = $this->db->get('katalog');
        return $data->result_array();
    }

    public function find($id) {
        $this->db->where('id_katalog', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $data = $this->db->get('katalog');
        return $data->row_array();
    }

    public function where($data_where = array()) {

        foreach ($data_where as $k => $v) {
            $this->db->where($k, $v);
        }

        $data = $this->db->get('katalog');
        return $data->row_array();
    }

    public function create($data = array()) {
        $this->db->insert("katalog", $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array()) {
        $this->db->where('id_katalog', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->update("katalog", $data);
    }

    public function delete($id, $data = array()) {
        $this->db->where('id_katalog', 
            $this->encrypt->decode(
                urldecode(
                    str_replace('_', '%', $id)
                )
            ));
        $this->db->delete("katalog");
    }

}
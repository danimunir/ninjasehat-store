<?php

Class Katalog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        if (isset($_POST['simpan'])) {
            $this->action_to_create();
        }

        $data = array(
            "title" => "Katalog",
            "navigation_active" => "katalog",
            "container" => "/administrator/katalog/index"
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_create() {
        $action = 1;
        $nama_katalog = $this->input->post('nama_katalog');
        $slug = $this->input->post('slug');
        $deskripsi = $this->input->post('deskripsi');

        if (empty($nama_katalog)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Nama Katalog haris diisi!!');
            redirect('/administrator/katalog');
        }

        if (empty($slug)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Slug haris diisi!!');
            redirect('/administrator/katalog');
        }

        if ($action) {
            $data_array = array(
                'nama_katalog' => $nama_katalog,
                'slug' => $slug,
                'deskripsi' => $deskripsi
            );
            $id = $this->katalog_model->create($data_array);
            $this->session->set_flashdata('success', 'Berhasil tambah data katalog.');
            redirect('/administrator/katalog/edit/'.str_replace('%', '_', urlencode($this->encrypt->encode($id))));
        }
    }

    public function edit($id) {
        if (isset($_POST['simpan'])) {
            $this->action_to_update($id);
        }

        $data = array(
            "title" => "Katalog",
            "navigation_active" => "katalog",
            "container" => "/administrator/katalog/edit",
            "find" => $this->katalog_model->find($id)
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_update($id) {
        $action = 1;
        $nama_katalog = $this->input->post('nama_katalog');
        $slug = $this->input->post('slug');
        $deskripsi = $this->input->post('deskripsi');

        if (empty($nama_katalog)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Nama Katalog haris diisi!!');
            redirect('/administrator/katalog/edit/' . $id);
        }

        if (empty($slug)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Slug haris diisi!!');
            redirect('/administrator/katalog/edit/' . $id);
        }

        if ($action) {
            $data_array = array(
                'nama_katalog' => $nama_katalog,
                'slug' => $slug,
                'deskripsi' => $deskripsi
            );
            $this->katalog_model->update($id, $data_array);
            $this->session->set_flashdata('success', 'Berhasil ubah data katalog.');
            redirect('/administrator/katalog/edit/' . $id);
        }
    }

    public function delete($id) {
        $this->katalog_model->delete($id);
        $this->session->set_flashdata('success', 'Berhasil hapus data katalog.');
        redirect('/administrator/katalog');       
    }

}
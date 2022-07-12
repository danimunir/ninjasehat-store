<?php

Class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        $data = array(
            "title" => "Users",
            "navigation_active" => "users",
            "container" => "/administrator/users/index",
            "data_users" => $this->users_model->all()
        );
        $this->load->view("/administrator/app", $data);
    }

    public function add() {
        if (isset($_POST['simpan'])) {
            $this->action_to_create();
        }

        $data = array(
            "title" => "Add | Users",
            "navigation_active" => "users",
            "container" => "/administrator/users/add"
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_create() {
        $action = 1;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $created_at = date('Y-m-d H:i:s');

        if (empty($username)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Username harus diisi!!');
            redirect('/administrator/users/add');
        }

        if (empty($password)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Password harus diisi!!');
            redirect('/administrator/users/add');
        }

        if (empty($nama)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Nama Lengkap harus diisi!!');
            redirect('/administrator/users/add');
        }

        if (empty($email)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Email harus diisi!!');
            redirect('/administrator/users/add');
        }

        if (empty($phone)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Phone harus diisi!!');
            redirect('/administrator/users/add');
        }

        if ($action) {
            $data_array = array(
                'username' => $username,
                'password' => md5($password),
                'nama' => $nama,
                'email' => $email,
                'phone' => $phone,
                'created_at' => $created_at,
            );

            $this->users_model->create($data_array);
            $this->session->set_flashdata('success', 'Berhasil menambahkan data Users!!');
            redirect('/administrator/users');   
        }

    }

    public function edit($id) {
        if (isset($_POST['simpan'])) {
            $this->action_to_update($id);
        }

        $data = array(
            "title" => "Edit | Users",
            "navigation_active" => "users",
            "container" => "/administrator/users/edit",
            "val" => $this->users_model->find($id)
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_update($id) {
        $action = 1;
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $created_at = date('Y-m-d H:i:s');

        if (empty($username)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Username harus diisi!!');
            redirect('/administrator/users/edit/'.$id);
        }

        if (empty($nama)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Nama Lengkap harus diisi!!');
            redirect('/administrator/users/edit/'.$id);
        }

        if (empty($email)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Email harus diisi!!');
            redirect('/administrator/users/edit/'.$id);
        }

        if (empty($phone)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Phone harus diisi!!');
            redirect('/administrator/users/edit/'.$id);
        }

        if ($action) {
            $data_array = array(
                'username' => $username,
                'nama' => $nama,
                'email' => $email,
                'phone' => $phone,
                'created_at' => $created_at,
            );

            $this->users_model->update($id, $data_array);
            $this->session->set_flashdata('success', 'Berhasil mengubah data Users!!');
            redirect('/administrator/users');   
        }        
    }

    public function delete($id) {
        $this->users_model->delete($id);
        $this->session->set_flashdata('success', 'Berhasil hapus data users');
        redirect('/administrator/users');
    }

}
<?php

Class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('administrator')['is_login']) {
            redirect('/administrator/index');
        }
    }

    public function index() {
        if (isset($_POST['login'])) {
            $this->action_to_login();
        }
        $this->load->view("/administrator/login");       
    }

    public function action_to_login() {
        $uname = $this->input->post('username');
        $paswd = $this->input->post('password');
        $data = $this->users_model->login($uname, $paswd);

        if ($data) {
            $data_session = array(
                "administrator" => array(
                    "id" => $this->encrypt->encode($data['id']),
                    "username" => $data['username'],
                    "nama" => $data['nama'],
                    "email" => $data['email'],
                    "phone" => $data['phone'],
                    "is_login" => true
                )
            );
            $this->session->set_userdata($data_session);
            redirect('/administrator/index');
        } else {
            $this->session->set_flashdata('failed', 'Username atau Password Salah');
            redirect('/administrator/login');
        }
    }

}
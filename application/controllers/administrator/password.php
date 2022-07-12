<?php

Class Password extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        if (isset($_POST['simpan'])) {
            $this->action_to_save();
        }
        $data = array(
            "title" => "Password",
            "navigation_active" => "password",
            "container" => "/administrator/password/index"
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_save() {
        $action = 1;
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $konfirm_password = $this->input->post('konfirm_password');

        $getUserSession = $this->users_model->find(str_replace("%", "_", urlencode($this->session->userdata('administrator')['id'])));
        
        if (empty($old_password)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Password Lama harus diisi');
            redirect('/administrator/password');    
        }

        if (empty($new_password)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Password Baru harus diisi');
            redirect('/administrator/password');    
        }

        if (empty($konfirm_password)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'KOnfirmasi Password harus diisi');
            redirect('/administrator/password');    
        }

        if ($getUserSession['password'] != md5($old_password)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Password Lama tidak sesuai dengan password anda');
            redirect('/administrator/password');    
        }

        if ($new_password == $old_password) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Password Lama dengan Baru tidak boleh sama');
            redirect('/administrator/password');    
        }

        if ($new_password != $konfirm_password) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Konfirmasi password tidak sesuai');
            redirect('/administrator/password');    
        }

        if ($action) {
            $this->users_model->update(str_replace("%", "_", urlencode($this->session->userdata('administrator')['id'])), ['password' => md5($new_password)]);
            $this->session->set_flashdata('success', 'Password Berhasil diubah');
            redirect('/administrator/password');
        }
    }

}
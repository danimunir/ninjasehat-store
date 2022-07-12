<?php

Class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data_session = array(
            "administrator" => [
                'is_login' => false
            ]
        );
        $this->session->set_userdata($data_session);
        redirect('/administrator/login');
    }

}
<?php

Class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        $data = array(
            "title" => "Dashboard",
            "navigation_active" => "dashboard",
            "container" => "/administrator/dashboard/index"
        );
        $this->load->view("/administrator/app", $data);
    }

}
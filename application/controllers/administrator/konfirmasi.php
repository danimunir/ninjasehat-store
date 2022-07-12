<?php

Class Konfirmasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        $data = array(
            "title" => "Konfirmasi",
            "navigation_active" => "konfirmasi",
            "container" => "/administrator/konfirmasi/index"
        );
        $this->load->view("/administrator/app", $data);
    }

    public function show($id) {
        $this->action_to_update_terbaca($id);
        $data = array(
            "title" => "Order",
            "navigation_active" => "order",
            "container" => "/administrator/konfirmasi/show",
            "show" => $this->orderkonfirm_model->find($id)
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_update_terbaca($id) {
        $this->orderkonfirm_model->update($id, ['terbaca' => '1']);
    }

    public function delete($id) {
        $this->orderkonfirm_model->delete($id);
        $this->session->set_flashdata('success', 'berhasil menghapus data konrimasi order');
        redirect('/administrator/konfirmasi');
    }

}
<?php

Class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        $data = array(
            "title" => "Order",
            "navigation_active" => "order",
            "container" => "/administrator/order/index"
        );
        $this->load->view("/administrator/app", $data);
    }

    public function show($id) {
        $data_find = $this->order_model->find($id);
        if ($data_find['status'] == '0') {
            $this->action_to_update_status($id, 1);
        }
        $data = array(
            "title" => "Order",
            "navigation_active" => "order",
            "container" => "/administrator/order/show",
            "show" => $data_find
        );
        $this->load->view("/administrator/app", $data);
    }

    public function send_produk($id) {
        $this->action_to_update_status($id, 2);
        $this->session->set_flashdata('success', "Berhasil mengubah staus data order terkirim!!!");
        redirect('/administrator/order');
    }

    public function action_to_update_status($id, $status) {
        $this->order_model->update($id, ['status' => "$status"]);
    }

    public function delete($id) {
        $this->order_model->delete($id);
        $this->session->set_flashdata('success', "Berhasil menghapus data Order!!!");
        redirect('/administrator/order');
    }

}
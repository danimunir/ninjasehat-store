<?php

Class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        $data = array(
            "title" => "Produk",
            "navigation_active" => "produk",
            "container" => "/administrator/produk/index"
        );
        $this->load->view("/administrator/app", $data);
    }

    public function show($id) {
        $data = array(
            "title" => "Produk",
            "navigation_active" => "produk",
            "container" => "/administrator/produk/show",
            "data" => $this->produk_model->find($id)
        );
        $this->load->view("/administrator/app", $data);
    }

    public function add() {
        if (isset($_POST['simpan'])) {
            $this->action_to_create();
        }
        $data = array(
            "title" => "Produk",
            "navigation_active" => "produk",
            "container" => "/administrator/produk/add"
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_create() {
        $action = 1;
        $nama_produk = $this->input->post('nama_produk');
        $katalog_id = $this->input->post('katalog_id');
        $stok = $this->input->post('stok');
        $gambar = basename($_FILES["gambar"]["name"]);
        $harga_jual = $this->input->post('harga_jual');
        $harga_coret = $this->input->post('harga_coret');
        $deksripsi = $this->input->post('deskripsi');

        $permalink = strtolower(str_replace(" ", "-", $nama_produk));

        $file_rename = strtolower(str_replace(" ", "_", $nama_produk)) . "_" . time() . ".jpg";
        
        $target_dir = "./assets/uploads/produk/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

        $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if (empty($nama_produk)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Nama Produk harus diisi');
            redirect('/administrator/produk/add');
        }

        if (empty($katalog_id)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Katalog harus dipilih');
            redirect('/administrator/produk/add');
        }

        if (empty($stok)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Stok harus diisi');
            redirect('/administrator/produk/add');
        }

        if (empty($gambar)) {
            $action = 2;   
        } else {
            
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
                $action = 0;
                $this->session->set_flashdata('failed', 'Tipe File Gambar : jpg / png / jpeg / gif');
                redirect('/administrator/produk/add');
            }
        }

        if (empty($harga_jual)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Harga Jual harus diisi');
            redirect('/administrator/produk/add');
        }

        if ($action == 1) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                rename($target_file, $target_dir . $file_rename);
                
                $data_array = array(
                    'katalog_id' => $katalog_id,
                    'nama_produk' => $nama_produk,
                    'permalink' => $permalink,
                    'stok' => $stok,
                    'harga_jual' => $harga_jual,
                    'harga_coret' => $harga_coret,
                    'gambar' => $file_rename,
                    'deskripsi' => $deksripsi,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $this->produk_model->create($data_array);
                $this->session->set_flashdata('success', 'Berhasil menambah data produk.');
                redirect('/administrator/produk');
            }
        } else if ($action == 2) {    
            $data_array = array(
                'katalog_id' => $katalog_id,
                'nama_produk' => $nama_produk,
                'permalink' => $permalink,
                'stok' => $stok,
                'harga_jual' => $harga_jual,
                'harga_coret' => $harga_coret,
                'gambar' => 'img_product.jpg',
                'deskripsi' => $deksripsi,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );
            $this->produk_model->create($data_array);
            $this->session->set_flashdata('success', 'Berhasil menambah data produk.');
            redirect('/administrator/produk');
        }
    }

    public function edit($id) {
        if (isset($_POST['simpan'])) {
            $this->action_to_update($id);
        }
        $data = array(
            "title" => "Produk",
            "navigation_active" => "produk",
            "container" => "/administrator/produk/edit",
            "show" => $this->produk_model->find($id)
        );
        $this->load->view("/administrator/app", $data);
    }

    public function action_to_update($id) {
        $action = 1;
        $nama_produk = $this->input->post('nama_produk');
        $katalog_id = $this->input->post('katalog_id');
        $stok = $this->input->post('stok');
        $gambar = basename($_FILES["gambar"]["name"]);
        $harga_jual = $this->input->post('harga_jual');
        $harga_coret = $this->input->post('harga_coret');
        $deksripsi = $this->input->post('deskripsi');

        $permalink = strtolower(str_replace(" ", "-", $nama_produk));

        $file_rename = strtolower(str_replace(" ", "_", $nama_produk)) . "_" . time() . ".jpg";
        
        $target_dir = "./assets/uploads/produk/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

        $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if (empty($nama_produk)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Nama Produk harus diisi');
            redirect('/administrator/produk/add');
        }

        if (empty($katalog_id)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Katalog harus dipilih');
            redirect('/administrator/produk/add');
        }

        if (empty($stok)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Stok harus diisi');
            redirect('/administrator/produk/add');
        }

        if (empty($gambar)) {
            $action = 2;   
        } else {
            
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
                $action = 0;
                $this->session->set_flashdata('failed', 'Tipe File Gambar : jpg / png / jpeg / gif');
                redirect('/administrator/produk/add');
            }
        }

        if (empty($harga_jual)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Harga Jual harus diisi');
            redirect('/administrator/produk/add');
        }

        if ($action == 1) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                rename($target_file, $target_dir . $file_rename);
                
                $data_array = array(
                    'katalog_id' => $katalog_id,
                    'nama_produk' => $nama_produk,
                    'permalink' => $permalink,
                    'stok' => $stok,
                    'harga_jual' => $harga_jual,
                    'harga_coret' => $harga_coret,
                    'gambar' => $file_rename,
                    'deskripsi' => $deksripsi,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $this->produk_model->update($id, $data_array);
                $this->session->set_flashdata('success', 'Berhasil mengubah data produk.');
                redirect('/administrator/produk');
            }
        } else if ($action == 2) {    
            $data_array = array(
                'katalog_id' => $katalog_id,
                'nama_produk' => $nama_produk,
                'permalink' => $permalink,
                'stok' => $stok,
                'harga_jual' => $harga_jual,
                'harga_coret' => $harga_coret,
                'deskripsi' => $deksripsi,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );
            $this->produk_model->update($id, $data_array);
            $this->session->set_flashdata('success', 'Berhasil mengubah data produk.');
            redirect('/administrator/produk');
        }
    }

    public function delete($id) {
        $this->produk_model->delete($id);
        $this->session->set_flashdata('success', 'Berhasil menghapus data produk.');
        redirect('/administrator/produk');
    }

}
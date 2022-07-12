<?php

Class Pengaturan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('administrator')['is_login']) {
            redirect("/administrator/login");
        }
    }

    public function index() {
        if (isset($_POST['simpan']) ? $_POST['simpan'] : '') {
            $this->action_to_update();
        }

        $data = array(
            "title" => "Pengaturan",
            "navigation_active" => "pengaturan",
            "container" => "/administrator/pengaturan/index",
            "val" => $this->pengaturan_model->find()
        );
        $this->load->view("/administrator/app", $data);
    }    

    public function action_to_update() {
        $action = 1;
        $ttle = $this->input->post('title');
        $tags = $this->input->post('meta_tag');
        $desc = $this->input->post('meta_deskripsi');
        $logo = $this->input->post('logo');
        $icon = $this->input->post('favicon');

        $target_dir = "./assets/uploads/";
        $target_file_logo = $target_dir . basename($_FILES["logo"]["name"]);
        $target_file_favicon = $target_dir . basename($_FILES["favicon"]["name"]);

        $fileTypeLogo = pathinfo($target_file_logo,PATHINFO_EXTENSION);
        $fileTypeIcon = pathinfo($target_file_favicon,PATHINFO_EXTENSION);
        
        if (empty($ttle)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'Title harus diisi');
            redirect('/administrator/pengaturan');
        }

        if (empty($logo)) {
            $action = 2;   
        } else {
            
            if (file_exists($target_file_logo)) {
                unlink($target_file_logo);
            }

            if($fileTypeLogo != "jpg" && $fileTypeLogo != "png" && $fileTypeLogo != "jpeg" && $fileTypeLogo != "gif" ) {
                $action = 0;
                $this->session->set_flashdata('failed', 'Tipe File Logo : jpg / png / jpeg / gif');
                redirect('/administrator/pengaturan');
            }
        }

        if (empty($icon)) {
            $action = 2;   
        } else {
            if (file_exists($target_file_favicon)) {
                unlink($target_file_favicon);   
            }
        }

        if ($action == 1) {
            if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file_logo)) {
                rename($target_file_logo, $target_dir . 'logo.jpg');
                
                if (move_uploaded_file($_FILES["favicon"]["tmp_name"], $target_file_favicon)) {
                    rename($target_file_favicon, $target_dir . 'favicon.ico');

                    $data_array = array(
                        'namasitus' => $ttle,
                        'metatag' => $tags,
                        'metadeskripsi' => $desc
                    );
                    $this->pengaturan_model->update($data_array);
                    $this->session->set_flashdata('success', 'Berhasil mengubah data pengaturan.');
                    redirect('/administrator/pengaturan');
                }
            }
        } else if ($action == 2) {
            $data_array = array(
                'namasitus' => $ttle,
                'metatag' => $tags,
                'metadeskripsi' => $desc
            );
            $this->pengaturan_model->update($data_array);
            $this->session->set_flashdata('success', 'Berhasil mengubah data pengaturan.');
            redirect('/administrator/pengaturan');
        }

    }

}
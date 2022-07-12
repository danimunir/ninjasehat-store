<?php

Class App extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cart->remove(8);
    }

    public function index() {
        $data = array(
            "title" => "Home | Website E-Commerce",
            "container" => "pages/index"
        );
        $this->load->view('layouts/app', $data);
    }

    public function categories($katalog) {
        $data = array(
            "title" => $katalog,
            "container" => "pages/categories",
            "find_katalog" => $this->katalog_model->where(['slug' => $katalog])
        );
        $this->load->view('layouts/app', $data);
    }

    public function product($katalog, $produk) {
        $data = array(
            "title" => $produk,
            "container" => "pages/product",
            "find_produk" => $this->produk_model->find_where($produk)
        );
        $this->load->view('layouts/app', $data);
    }

    public function login() {
        if ($this->session->userdata('is_login_customer')) {
            redirect('/detail_akun');
        }

        if (isset($_POST['login'])) {
            $this->action_to_login('/detail_akun');
        }

        $data = array(
            "title" => "Login",
            "container" => "pages/login"
        );
        $this->load->view('layouts/app', $data);
    }

    public function action_to_login($url) {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = $this->pelanggan_model->login($email, $password);
        if ($data) {
            $data_session = array(
                'id' => $data['id_pelanggan'],
                'nama_pelanggan' => $data['nama_pelanggan'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'alamat' => $data['alamat'],
                'kota' => $data['kota'],
                'profinsi' => $data['profinsi'],
                'kodepos' => $data['kodepos'],
                'password' => $data['password'],
                'is_login_customer' => true,
            );
            $this->session->set_userdata($data_session);
            redirect($url);
        } else {
            $this->session->set_flashdata('email', $email);
            $this->session->set_flashdata('failed', 'Email atau Password tidak sesuai');
            redirect('/login');
        }
    }

    public function register() {
        if ($this->session->userdata('is_login_customer')) {
            redirect('/detail_akun');
        }

        if (isset($_POST['register'])) {
            $this->action_to_register();
        }

        $data = array(
            "title" => "Register",
            "container" => "pages/register"
        );
        $this->load->view('layouts/app', $data);
    }

    public function action_to_register() {
        $action = 1;
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $profinsi = $this->input->post('profinsi');
        $kodepos = $this->input->post('kodepos');
        $password = $this->input->post('password');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        if (empty($nama_pelanggan)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'NAMA PELANGGAN tidak boleh kosong');
            redirect('/daftar');
        }

        if (empty($email)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'EMAIL tidak boleh kosong');
            redirect('/daftar');
        }

        if (empty($phone)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'HP / TELEPON tidak boleh kosong');
            redirect('/daftar');
        }

        if (empty($alamat)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'ALAMAT tidak boleh kosong');
            redirect('/daftar');
        }

        if (empty($kota)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'KOTA tidak boleh kosong');
            redirect('/daftar');
        }

        if (empty($profinsi)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'PROFINSI tidak boleh kosong');
            redirect('/daftar');
        }

        if (empty($kodepos)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'KODE POS tidak boleh kosong');
            redirect('/daftar');
        }

        if (empty($password)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'PASSWORD tidak boleh kosong');
            redirect('/daftar');
        }

        if ($action) {
            $data_array = array(
                'nama_pelanggan' => $nama_pelanggan,
                'email' => $email,
                'phone' => $phone,
                'alamat' => $alamat,
                'kota' => $kota,
                'profinsi' => $profinsi,
                'kodepos' => $kodepos,
                'password' => md5($password),
                'created_at' => $created_at,
                'updated_at' => $updated_at
            );
            $id = $this->pelanggan_model->create($data_array);
            $this->session->set_flashdata('success', "BERHASIL!! Anda telah menjadi member, Silahkan <a href='" . base_url('/login') . "'>Login</a>");

            $data_session = array(
                'id' => $id,
                'nama_pelanggan' => $nama_pelanggan,
                'email' => $email,
                'phone' => $phone,
                'alamat' => $alamat,
                'kota' => $kota,
                'profinsi' => $profinsi,
                'kodepos' => $kodepos,
                'password' => md5($password),
                'is_login_customer' => true,
            );
            $this->session->set_userdata($data_session);

            if ($this->cart->total_items() > 0) {
                redirect('/checkout/detail_pembeli');
            } else {
                redirect('/detail_akun');
            }
        }
    }

    public function shopping_cart() {
        $data = array(
            "title" => "Shopping Cart",
            "container" => "pages/shopping_cart"
        );
        $this->load->view('layouts/app', $data);
    }

    public function add_to_cart($id) {
        $data = $this->produk_model->find($id);
        $data_array = array(
            'id' => $data['id_produk'],
            'qty' => 1,
            'stok' => $data['stok'] - 1,
            'price' => $data['harga_jual'] - ($data['harga_jual'] * ($data['harga_coret'] / 100)),
            'name' => $data['nama_produk'],
            'image' => $data['gambar'],
            'link' => $data['slug'] . "/" . $data['permalink'] . ".html"
        );
        $this->cart->insert($data_array);
    }

    public function remove_item_cart($id) {
        $this->cart->remove($id);
    }

    public function update_item_cart($id) {
        $data_cart = array(
            'rowid' => $id,
            'qty' => $this->input->get('qty'),
            'stok' => $data['stok'] - $this->input->get('qty')
        );
        $this->cart->update($data_cart);
    }

    public function checkout() {
        if ($this->session->userdata('is_login_customer')) {
            redirect('/checkout/detail_pengiriman');
        }

        if (isset($_POST['login'])) {
            $this->action_to_login("/checkout/detail_pengiriman");
        }

        $data = array(
            "title" => "Checkout",
            "container" => "pages/checkout"
        );
        $this->load->view('layouts/app', $data);
    }

    public function checkout_delivery_details() {

        if ($this->cart->total_items() == 0) {
            redirect('/keranjang_belanja');
        }

        if (!$this->session->userdata('is_login_customer')) {
            redirect('/checkout');
        }

        if (isset($_POST['next-step-3'])) {
            $this->action_checkout_delivery_details();
        }

        $data = array(
            "title" => "Checkout",
            "container" => "pages/checkout_delivery_details"
        );
        $this->load->view('layouts/app', $data);
    }

    public function action_checkout_delivery_details() {
        $data_session = array(
            "customer_checkout" => array(
                'id' => $this->session->userdata('id'),
                'kirim_ke' => strtoupper($this->input->post('alamat')) .
                ", KOTA : " . strtoupper($this->input->post('kota')) .
                ", PROFINSI : " . strtoupper($this->input->post('profinsi')) .
                ", KODEPOS : " . strtoupper($this->input->post('kodepos'))
            )
        );
        $this->session->set_userdata($data_session);
        redirect('/checkout/detail_pesanan');
    }

    public function checkout_order_details() {
        if (!$this->session->userdata('is_login_customer')) {
            redirect('/checkout');
        }

        if ($this->cart->total_items() == 0) {
            redirect('/keranjang_belanja');
        }

        if (!$this->session->userdata('customer_checkout')) {
            redirect('/checkout/detail_pengiriman');
        }

        if (isset($_POST['finised_shopping'])) {
            $this->action_checkout_order();
        }

        $data = array(
            "title" => "Checkout",
            "container" => "pages/checkout_order_details"
        );
        $this->load->view('layouts/app', $data);
    }

    public function action_checkout_order() {
        $resi = time();
        $strln = strlen($resi) - 3;
        $substr = substr($resi, $strln, 3);
        $totel_harga = $this->cart->total() + (int)$substr;
        $data_order = array(
            'resi' => $resi,
            'pembeli_id' => $this->session->userdata('customer_checkout')['id'],
            'total_harga' => $totel_harga,
            'status' => '0',
            'kirim_ke' => $this->session->userdata('customer_checkout')['kirim_ke'],
            'terbaca' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $order_id = $this->order_model->create($data_order);

        if ($order_id) {
            foreach ($this->cart->contents() as $saveItem) {
                $data_order_detail = array(
                    'order_id' => $order_id,
                    'produk_id' => $saveItem['id'],
                    'produk_harga' => $saveItem['price'],
                    'qty' => $saveItem['qty'],
                    'subtotal' => $saveItem['subtotal'],
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->orderdetail_model->create($data_order_detail);
                $this->produk_model->update(str_replace("%", "_", urlencode($this->encrypt->encode($saveItem['id']))), ['stok' => $saveItem['stok']]);
            }
        }
        $this->cart->destroy();
        $this->session->unset_userdata('customer_checkout');
        redirect('/checkout/selesai');
    }

    public function checkout_order_selesai() {
        if ($this->session->userdata('customer_checkout')) {
            redirect('/checkout/detail_pesanan');
        }

        $data = array(
            "title" => "Checkout",
            "container" => "pages/checkout_order_selesai"
        );
        $this->load->view('layouts/app', $data);
    }

    public function my_account() {
        if (!$this->session->userdata('is_login_customer')) {
            redirect('/login');
        }
        
        $data = array(
            "title" => "My Account",
            "container" => "pages/my_account"
        );
        $this->load->view('layouts/app', $data);
    }

    public function order_list() {
        if (!$this->session->userdata('is_login_customer')) {
            redirect('/login');
        }
        $data = array(
            "title" => "Order List",
            "container" => "pages/order_list"
        );
        $this->load->view('layouts/app', $data);
    }

    public function payments_confirmation() {
        if (!$this->session->userdata('is_login_customer')) {
            redirect('/login');
        }
        
        if (!isset($_GET['resi'])) {
            redirect('/detail_akun');
        }

        if (isset($_POST['konfirmasi'])) {
            $this->action_payments_confirmation();
        }
        $data = array(
            "title" => "Order List",
            "container" => "pages/payments_confirmation"
        );
        $this->load->view('layouts/app', $data);
    }

    public function action_payments_confirmation() {
        $action = 1;
        $resi = $this->input->post('resi');
        $tujuan = $this->input->post('tujuan');
        $atasnama = $this->input->post('atasnama');
        $dari = $this->input->post('dari');
        $rekening = $this->input->post('rekening');
        $tanggal_transfer = $this->input->post('tanggal_transfer');

        $dataOrder = $this->order_model->find_by_resi($resi);

        if (empty($resi)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'NOMOR RESI harus diisi');
            redirect('/konfirmasi_pembayaran');
        }

        if (empty($tujuan)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'TUJUAN BANK TRANSFER harus diisi');
            redirect('/konfirmasi_pembayaran');
        }

        if (empty($atasnama)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'ATAS NAMA harus diisi');
            redirect('/konfirmasi_pembayaran');
        }

        if (empty($dari)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'ASAL BANK TRANSFER harus diisi');
            redirect('/konfirmasi_pembayaran');
        }

        if (empty($rekening)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'REKENING harus diisi');
            redirect('/konfirmasi_pembayaran');
        }

        if (empty($tanggal_transfer)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'TANGGAL TRANSFER harus diisi');
            redirect('/konfirmasi_pembayaran');
        }

        if ($dataOrder == null) {
            $action = 0;
            $this->session->set_flashdata('failed', "ORDER dengan nomer resi $resi kosong");
            redirect('/konfirmasi_pembayaran');
        }

        if ($action) {
            $data_array = array(
                'order_id' => $dataOrder['id_order'],
                'resi' => $resi,
                'tujuan' => $tujuan,
                'atasnama' => $atasnama,
                'dari' => $dari,
                'rekening' => $rekening,
                'tanggal_transfer' => $tanggal_transfer,
                'terbaca' => '0',
                'created_at' => date('Y-m-d H:i:s')
            );

            $getOrderData = $this->order_model->find_by_resi($resi);
            $this->order_model->update(str_replace("%", "_", urlencode($this->encrypt->encode($getOrderData['id_order']))), ['status' => '2']);

            $this->orderkonfirm_model->create($data_array);
            $this->session->set_flashdata('success', 'Berhasil mengirim konfirmasi pembayaran');
            redirect('/konfirmasi_pembayaran');
        }
    }

    public function edit_account() {
        if (!$this->session->userdata('is_login_customer')) {
            redirect('/login');
        }

        if (isset($_POST['register'])) {
            $this->action_to_edit_account();
        }

        $data = array(
            "title" => "Edit Account",
            "container" => "pages/edit_account"
        );
        $this->load->view('layouts/app', $data);
    }

    public function action_to_edit_account() {
        $action = 1;
        $id = $this->session->userdata('id');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $profinsi = $this->input->post('profinsi');
        $kodepos = $this->input->post('kodepos');
        $updated_at = date("Y-m-d H:i:s");

        if (empty($nama_pelanggan)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'NAMA PELANGGAN tidak boleh kosong');
            redirect('/ubah_akun');
        }

        if (empty($email)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'EMAIL tidak boleh kosong');
            redirect('/ubah_akun');
        }

        if (empty($phone)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'HP / TELEPON tidak boleh kosong');
            redirect('/ubah_akun');
        }

        if (empty($alamat)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'ALAMAT tidak boleh kosong');
            redirect('/ubah_akun');
        }

        if (empty($kota)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'KOTA tidak boleh kosong');
            redirect('/ubah_akun');
        }

        if (empty($profinsi)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'PROFINSI tidak boleh kosong');
            redirect('/ubah_akun');
        }

        if (empty($kodepos)) {
            $action = 0;
            $this->session->set_flashdata('failed', 'KODE POS tidak boleh kosong');
            redirect('/ubah_akun');
        }

        if ($action) {
            $data_array = array(
                'nama_pelanggan' => $nama_pelanggan,
                'email' => $email,
                'phone' => $phone,
                'alamat' => $alamat,
                'kota' => $kota,
                'profinsi' => $profinsi,
                'kodepos' => $kodepos,
                'updated_at' => $updated_at
            );
            $this->pelanggan_model->update(str_replace("%", "_", urlencode($this->encrypt->encode($id))), $data_array);
            $this->session->set_flashdata('success', "BERHASIL!! Anda telah mengubah data member");

            $data_session = array(
                'id' => $id,
                'nama_pelanggan' => $nama_pelanggan,
                'email' => $email,
                'phone' => $phone,
                'alamat' => $alamat,
                'kota' => $kota,
                'profinsi' => $profinsi,
                'kodepos' => $kodepos,
                'is_login_customer' => true,
            );
            $this->session->set_userdata($data_session);

            redirect('/ubah_akun');
        }
    }

    public function change_password() {
        if (!$this->session->userdata('is_login_customer')) {
            redirect('/login');
        }

        if (isset($_POST['change_password'])) {
            $this->action_to_change_password();
        }

        $data = array(
            "title" => "Change Password",
            "container" => "pages/change_password"
        );
        $this->load->view('layouts/app', $data);
    }

    public function action_to_change_password() {
        $action = 1;
        $id = $this->session->userdata('id');
        $old_password = $this->input->post('password_lama');
        $new_password = $this->input->post('password_baru');
        $kon_password = $this->input->post('password_konfirmasi');

        if (empty($old_password)) {
            $action = 0;
            $this->session->set_flashdata('failed', "Password Lama harus diisi");
            redirect('/ubah_password');
        }

        if (empty($new_password)) {
            $action = 0;
            $this->session->set_flashdata('failed', "Password Baru harus diisi");
            redirect('/ubah_password');
        }

        if (empty($kon_password)) {
            $action = 0;
            $this->session->set_flashdata('failed', "Password konfirmasi harus diisi");
            redirect('/ubah_password');
        }

        if ($old_password == $new_password) {
            $action = 0;
            $this->session->set_flashdata('failed', "Password Lama dan Password Baru tidak boleh sama");
            redirect('/ubah_password');
        }

        if (md5($old_password) != $this->session->userdata('password')) {
            $action = 0;
            $this->session->set_flashdata('failed', "Password Lama Anda tidak sesuai dengan password Anda");
            redirect('/ubah_password');
        }

        if ($new_password != $kon_password) {
            $action = 0;
            $this->session->set_flashdata('failed', "Password Konfirmasi Anda tidak sesuai dengan password Baru");
            redirect('/ubah_password');
        }

        if ($action) {
            $data_array = array(
                "password" => md5($new_password)
            );
            $this->pelanggan_model->update(str_replace("%", "_", urlencode($this->encrypt->encode($id))), $data_array);
            $this->session->set_flashdata('success', "Password Berhasil diubah");
            $this->session->set_userdata($data_array);

            redirect('/ubah_password');
        }
    }

    public function logout() {
        if (!$this->session->userdata('is_login_customer')) {
            redirect('/login');
        }

        $this->session->set_userdata(['is_login_customer' => false]);
        redirect("/login");
    }

}

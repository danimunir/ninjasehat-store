<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'app';
$route['404_override'] = 'app';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = "/app/login";
$route['daftar'] = "/app/register";
$route['keranjang_belanja'] = "/app/shopping_cart";
$route['add_to_cart/(:any)'] = "/app/add_to_cart/$1";
$route['remove_item_cart/(:any)'] = "/app/remove_item_cart/$1";
$route['update_item_cart/(:any)'] = "/app/update_item_cart/$1";

$route['checkout'] = "/app/checkout";
$route['checkout/detail_pembeli'] = "app/checkout_billing_details";
$route['checkout/detail_pengiriman'] = "app/checkout_delivery_details";
$route['checkout/detail_pesanan'] = "app/checkout_order_details";
$route['checkout/selesai'] = "app/checkout_order_selesai";

$route['detail_akun'] = "/app/my_account";
$route['daftar_pemesanan'] = "app/order_list";
$route['konfirmasi_pembayaran'] = "app/payments_confirmation";
$route['ubah_akun'] = "/app/edit_account";
$route['ubah_password'] = "app/change_password";
$route['logout'] = "/app/logout";

$route['administrator'] = "/administrator/dashboard";
$route['administrator/index'] = "/administrator/dashboard";
$route['administrator/dashboard'] = "/administrator/dashboard";
$route['administrator/katalog'] = "/administrator/katalog";
$route['administrator/produk'] = "/administrator/produk";
$route['administrator/order'] = "/administrator/order";
$route['administrator/konfirmasi'] = "/administrator/konfirmasi";
$route['administrator/pelanggan'] = "/administrator/pelanggan";
$route['administrator/users'] = "/administrator/users";
$route['administrator/pengaturan'] = "/administrator/pengaturan";
$route['administrator/password'] = "/administrator/password";


$route['administrator/login'] = "/administrator/login";
$route['administrator/logout'] = "/administrator/logout";

$route['(:any)'] = "/app/categories/$1";
$route['(:any)/(:any)'] = "/app/product/$1/$2";
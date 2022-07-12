<div id="maincontainer">
    <section id="product">
        <div class="container">
            <div class="row">
                <!-- My Account-->
                <div class="span9">
                    <h1 class="heading1">
                        <span class="maintext">BERANDA</span>
                    </h1>
                    <?php foreach ($this->order_model->where([
                            'pembeli_id' => $this->session->userdata('id'), 
                            'status !=' => '2'
                        ]) as $order_beranda) { ?>

                        <div class="checkoutsteptitle">
                            PESAN PADA : <?= $this->dateid->date_encode($order_beranda['created_at']) ?> (TOTAL : Rp<?= $this->cart->format_number(isset($order_beranda['total_harga']) ? $order_beranda['total_harga'] : ''); ?>,-)
                            <a class="modify">
                                RESI : <?= $order_beranda['resi'] ?>
                            </a>
                        </div>
                        <div class="checkoutstep">
                            <div class="cart-info">
                                <a href="<?= base_url('/konfirmasi_pembayaran?resi=' . $order_beranda['resi']) ?>" class="btn btn-orange pull-right">
                                    KONFIRMASI PEMBAYARAN
                                </a>
                                <br /><br />
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th class="image">GAMBAR</th>
                                        <th class="name">PRODAK NAMA</th>
                                        <th class="quantity">QTY</th>
                                        <th class="price">HARGA</th>
                                        <th class="total">TOTAL</th>
                                    </tr>
                                    <?php foreach ($this->orderdetail_model->where(["order_id" => $order_beranda['id_order']]) as $itemOrder) { ?>
                                        <tr>
                                            <td class="image">
                                                <img title="<?= $itemOrder['nama_produk'] ?>" alt="<?= $itemOrder['nama_produk'] ?>" src="<?= base_url('/assets/uploads/produk/' . $itemOrder['gambar']) ?>" height="50" width="50">
                                            </td>
                                            <td  class="name"><?= $itemOrder['nama_produk'] ?></td>
                                            <td class="quantity"><?= $itemOrder['qty'] ?></td>
                                            <td class="price">Rp<?= $this->cart->format_number(isset($itemOrder['produk_harga']) ? $itemOrder['produk_harga'] : ''); ?></td>
                                            <td class="total">Rp<?= $this->cart->format_number(isset($order_beranda['total_harga']) ? $order_beranda['total_harga'] : ''); ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <hr />

                    <?php } ?>
                </div>

                <!-- Sidebar Start-->
                <aside class="span3">
                    <?php $this->load->view('/pages/partials/navigation_akun_partials'); ?>
                </aside>
                <!-- Sidebar End-->
            </div>
        </div>
    </section>
</div>
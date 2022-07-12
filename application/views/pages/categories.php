<div id="maincontainer">
    <section id="product">
        <div class="container">
            <div class="row">        
                <!-- Sidebar Start-->
                <aside class="span3">
                    <!-- Katalog-->  
                    <?php $this->load->view('/pages/partials/katalog_partials'); ?>

                    <!--  Best Seller -->  
                    <?php $this->load->view('/pages/partials/produk_baru_partials'); ?>
                </aside>
                <!-- Sidebar End-->
                <!-- Category-->
                <div class="span9">          
                    <!-- Category Products-->
                    <section id="category">
                        <div class="row">
                            <div class="span9">
                                <!-- Sorting-->
                                <div class="sorting well">
                                    <h4>KATALOG : <?= strtoupper(isset($find_katalog['nama_katalog']) ? $find_katalog['nama_katalog'] : ''); ?></h4>
                                </div>
                                <!-- Category-->
                                <section id="categorygrid">
                                    <ul class="thumbnails grid">
                                        <?php foreach ($this->produk_model->get_by_katalog(isset($find_katalog['id_katalog']) ? $find_katalog['id_katalog'] : '') as $produk_katalog) { ?>
                                            <li class="span3">
                                                <a class="prdocutname" href="<?= base_url($produk_katalog['slug'] . "/" . $produk_katalog['permalink'] . ".html") ?>"><?= strtoupper(isset($produk_katalog['nama_produk']) ? $produk_katalog['nama_produk'] : ''); ?></a>
                                                <div class="thumbnail">
                                                    <a href="#"><img alt="" src="<?= base_url('/assets/uploads/produk/' . $produk_katalog['gambar']) ?>"></a>
                                                    <div class="shortlinks">
                                                        <a class="details" href="<?= base_url($produk_katalog['slug'] . "/" . $produk_katalog['permalink'] . ".html") ?>">LIHAT DETAIL</a>
                                                    </div>
                                                    <div class="pricetag">
                                                        <span class="spiral"></span>
                                                        <?php if ($produk_katalog['stok'] > 0) { ?>
                                                            <a href="" onclick="add_to_cart('<?= base_url('add_to_cart/' . str_replace("%", "_", urlencode($this->encrypt->encode($produk_katalog['id_produk'])))) ?>')" name="add_to_cart" class="productcart">ADD TO CART</a>
                                                        <?php } else { ?>
                                                            <a href="#" style="background:#999;text-align:center;padding:8px 17.5px;float:right;font-size:13px;color:#FFF">OUT OF STOCK</a>
                                                        <?php } ?>
                                                        <div class="price">
                                                            <div class="pricenew">Rp<?= $produk_katalog['harga_jual'] - ($produk_katalog['harga_jual'] * ($produk_katalog['harga_coret'] / 100)) ?></div>
                                                            <div class="priceold">Rp<?= $produk_katalog['harga_jual'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function add_to_cart(url) {
        $.get(url, function (data) {
            window.reload();
        });
    }
</script>
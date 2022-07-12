<div id="maincontainer">
    <div class="container">
        <div class="row">
            <div class="span9">
                <!-- Slider Start-->
                <section class="slider">
                    <div id="sliderindex5">
                       
                        <div>
                            <img src="<?= base_url('/assets/theme/') ?>img/bannerqw.jpg"  alt="" title=""/>
                        </div>
                        
                    </div>
                </section>
                <!-- Slider End-->

                <!-- Featured Product-->
                <section id="featured" class="row mt60">
                    <ul class="thumbnails">
                        <?php foreach ($this->produk_model->limit(3) as $produk_home) { ?>
                            <li class="span3">
                                <a class="prdocutname" href="<?= base_url($produk_home['slug'] . "/" . $produk_home['permalink'] . ".html") ?>"><?= strtoupper($produk_home['nama_produk']) ?></a>
                                <div class="thumbnail">
                                    <a href=""><img alt="" src="<?= base_url('/assets/uploads/produk/' . $produk_home['gambar']) ?>"></a>
                                    <div class="shortlinks">
                                        <a class="details" href="<?= base_url($produk_home['slug'] . "/" . $produk_home['permalink'] . ".html") ?>">LIHAT DETAIL</a>
                                    </div>
                                    <div class="pricetag">
                                    
                                        <span class="spiral"></span>
                                        <?php if ($produk_home['stok'] > 0) { ?>
                                            <a href="" onclick="add_to_cart('<?= base_url('add_to_cart/' . str_replace("%", "_", urlencode($this->encrypt->encode($produk_home['id_produk'])))) ?>')" name="add_to_cart" class="productcart">ADD TO CART</a>
                                        <?php } else { ?>
                                            <a href="#" style="background:#999;text-align:center;padding:8px 17.5px;float:right;font-size:13px;color:#FFF">OUT OF STOCK</a>
                                        <?php } ?>

                                        <div class="price">
                                            <div class="pricenew">Rp<?= $produk_home['harga_jual'] - ($produk_home['harga_jual'] * ($produk_home['harga_coret'] / 100)) ?></div>
                                            <div class="priceold">Rp<?= $produk_home['harga_jual'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </div>
            <aside class="span3">
                <!-- Katalog-->
                <?php $this->load->view('/pages/partials/katalog_partials'); ?>

                <!-- Produk Terbaru-->
                <?php $this->load->view('/pages/partials/produk_baru_partials'); ?>
            </aside>
        </div>
    </div>
</div>

<script type="text/javascript">
    function add_to_cart(url) {
        $.get(url, function (data) {
            window.reload();
        });
    }
</script>
        <div class="sidewidt">
          <h2 class="heading2"><span>PRODUK TERBARU</span></h2>
          <ul class="bestseller">
            <?php foreach ($this->produk_model->limit(5) as $produk_baru) { ?>
            <li>
              <img width="50" height="50" src="<?=base_url('/assets/uploads/produk/'.$produk_baru['gambar'])?>" alt="<?=$produk_baru['nama_produk']?>" title="<?=$produk_baru['nama_produk']?>">
              <a class="productname" href="<?=base_url($produk_baru['slug']."/".$produk_baru['permalink'].".html")?>"> <?=strtoupper(isset($produk_baru['nama_produk']) ? $produk_baru['nama_produk'] : '');?></a>
              <span class="procategory"><?=$produk_baru['nama_katalog']?></span>
              <span class="price">Rp<?=$produk_baru['harga_jual'] - ($produk_baru['harga_jual'] * ($produk_baru['harga_coret'] / 100))?>,-</span>
            </li>
            <?php } ?>
          </ul>
        </div>
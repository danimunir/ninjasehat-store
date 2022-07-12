<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <!-- Account Login-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">CHECKOUT</span></h1>
                    
          <div class="checkoutsteptitle">TAHAP 3 : DETAIL PEMESANAN<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="cart-info">
              <table class="table table-striped table-bordered">
                <tr>
                  <th class="image">GAMBAR</th>
                  <th class="name">NAMA PRODUK</th>
                  <th class="quantity">QTY</th>
                    <th class="total">ACTION</th>
                  <th class="price">HARGA</th>
                
                </tr>
                <?php foreach ($this->cart->contents() as $itemCart) { ?>
                <tr>
                  <td class="image">
                    <a href="<?=base_url($itemCart['link'])?>">
                      <img title="product" alt="product" src="<?=base_url('/assets/uploads/produk/'.$itemCart['image'])?>" height="50" width="50">
                    </a>
                  </td>
                  <td  class="name">
                    <a href="<?=base_url($itemCart['link'])?>"><?=strtoupper($itemCart['name'])?></a></td>
                  <td class="quantity">
                    <input type="text" value="<?=$itemCart['qty']?>" name="qty-<?=$itemCart['rowid']?>" id="qty-<?=$itemCart['rowid']?>" class="span1">
                  </td>
                  <td class="total">
                    <a href="" onclick="update_item_cart('<?=$itemCart['rowid']?>', '<?=base_url('update_item_cart/'.$itemCart['rowid'])?>')">
                      <img class="tooltip-test" data-original-title="Update" src="<?=base_url('/assets/theme/')?>img/update.png" alt="Update">
                    </a>
                    <a href="" onclick="remove_item_cart('<?=base_url('remove_item_cart/'.$itemCart['rowid'])?>')">
                      <img class="tooltip-test" data-original-title="Remove"  src="<?=base_url('/assets/theme/')?>img/remove.png" alt="Remove">
                    </a>
                  </td>
                  <td class="price">Rp<?=$this->cart->format_number($itemCart['price'])?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
            
            <div class="row">
              <div class="pull-right">
                <div class="span4 pull-right">
                  <table class="table table-striped table-bordered ">
                    <tr>
                      <td><span class="extra bold totalamout">TOTAL :</span></td>
                      <td><span class="bold totalamout">Rp<?=$this->cart->format_number($this->cart->total())?></span></td>
                    </tr>
                  </table>
                  <div class="sapn12" style="text-align:right">
                    <form action="" method="post">
                      <button type="submit" name="finised_shopping" class="btn btn-orange">
                        SELESAI BELANJA
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar Start-->
        <div class="span3">
          <?php $this->load->view('/pages/partials/checkout_partials'); ?>
        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>
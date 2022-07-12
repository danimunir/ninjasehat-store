<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <!-- Account Login-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">CHECKOUT</span></h1>
                    
          <div class="checkoutsteptitle">TAHAP 4 : SELESAI<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="cart-info">
            <form action="" method="post" class="form-horizontal">
                <?php $orderFinish = $this->order_model->getToFinishOrder($this->session->userdata('id')); ?>
              <div class="row">
                <div class="control-group">
                    <label class="control-label">RESI :</label>
                    <div class="controls">
                        <h5 style="margin:5px 0"><?=$orderFinish['resi']?></h5>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">NAMA PEMBELI :</label>
                    <div class="controls">
                        <h5 style="margin:5px 0"><?=strtoupper(isset($orderFinish['nama_pelanggan']) ? $orderFinish['nama_pelanggan'] : '');?></h5>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">TELP / HP :</label>
                    <div class="controls">
                        <h5 style="margin:5px 0"><?=strtoupper(isset($orderFinish['phone']) ? $orderFinish['phone'] : '')?></h5>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ALAMAT PENGIRIMAN :</label>
                    <div class="controls">
                        <h5 style="margin:5px 0"><?=strtoupper(isset($orderFinish['kirim_ke']) ? $orderFinish['kirim_ke'] : '');?></h5>
                    </div>
                </div>
              </div>
            </form>
              <hr />
              <table class="table table-striped table-bordered">
                          <tr>
                            <th class="image">GAMBAR</th>
                            <th class="name">PRODAK NAMA</th>
                            <th class="quantity">QTY</th>
                            <th class="price">HARGA</th>
                          </tr>
                          <?php foreach ($this->orderdetail_model->where(["order_id" => $orderFinish['id_order']]) as $itemOrder) { ?>
                            <tr>
                              <td class="image">
                                <img title="<?=$itemOrder['nama_produk']?>" alt="<?=$itemOrder['nama_produk']?>" src="<?=base_url('/assets/uploads/produk/'.$itemOrder['gambar'])?>" height="50" width="50">
                              </td>
                              <td  class="name"><?=$itemOrder['nama_produk']?></td>
                              <td class="quantity"><?=$itemOrder['qty']?></td>
                              <td class="price">Rp<?=$this->cart->format_number(isset($itemOrder['produk_harga']) ? $itemOrder['produk_harga'] : '');?></td>
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
                      <td><span class="bold totalamout">Rp<?=$this->cart->format_number(isset($orderFinish['total_harga']) ? $orderFinish['total_harga'] : '');?></span></td>
                    </tr>
                  </table>
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
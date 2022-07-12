<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <!-- Account Login-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">CHECKOUT</span></h1>
          
          <div class="checkoutsteptitle">TAHAP 2 : DETAIL PENGIRIMAN<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <form action="" method="post" class="form-horizontal">
              <div class="row">
                <h3 class="heading3">DETAIL PERSONAL PENGIRIMAN</h3>
                <div class="registerbox">
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label"><span class="red">*</span> NAMA PELANGGAN :</label>
                      <div class="controls">
                        <input type="text" value="<?=$this->session->userdata('nama_pelanggan')?>" name="nama_pelanggan" class="input-xlarge">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label"><span class="red">*</span> EMAIL :</label>
                      <div class="controls">
                        <input type="text" value="<?=$this->session->userdata('email')?>" name="email" class="input-xlarge">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label"><span class="red">*</span> HP / TELEPON :</label>
                      <div class="controls">
                        <input type="text" value="<?=$this->session->userdata('phone')?>" name="phone" class="input-xlarge">
                      </div>
                    </div>
                  </fieldset>
                </div>
                <h3 class="heading3">DETAIL ALAMAT PENGIRIMAN</h3>
                <div class="registerbox">
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label"><span class="red">*</span> ALAMAT :</label>
                      <div class="controls">
                        <input type="text" value="<?=$this->session->userdata('alamat')?>" name="alamat" class="input-xlarge">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label"><span class="red">*</span> KOTA :</label>
                      <div class="controls">
                        <input type="text" value="<?=$this->session->userdata('kota')?>" name="kota" class="input-xlarge">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label"><span class="red">*</span> PROFINSI :</label>
                      <div class="controls">
                        <input type="text" value="<?=$this->session->userdata('profinsi')?>" name="profinsi" class="input-xlarge">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label"><span class="red">*</span> KODE POS :</label>
                      <div class="controls">
                        <input type="text" value="<?=$this->session->userdata('kodepos')?>" name="kodepos" class="input-xlarge">
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div> 
              <button type="submit" name="next-step-3" class="btn btn-orange pull-right">LANJUT TAHAP 3</button>
            </form>
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
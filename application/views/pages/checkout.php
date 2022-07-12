<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <!-- Account Login-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">CHECKOUT</span></h1>
          
          <div class="checkoutsteptitle">TAHAP 1: MASUK / DAFTAR<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep ">
            <section class="newcustomer">
            <h2 class="heading2">PELANGGAN BARU </h2>
            <div class="loginbox">
              <h4 class="heading4"> DAFTAR MEMBER</h4>
              <p>Apakah Anda ingin belanja di Toko Online kami? Tepat Sekali.. Kami menyediakan berbagai macam produk berkualitas dengan harga terjangkau.</p>
              <br>
              <p>Untuk bisa berbelanja di Toko Online kami, silahkan daftarkan diri Anda. Buruan!! banyak produk yang menunggu Anda untuk membelinya.</p>
              <br>
              <br>
              <a href="<?=base_url('daftar.html')?>" class="btn btn-orange">DAFTAR</a>
            </div>
          </section>
          <section class="returncustomer">
            <h2 class="heading2">LOGIN PELANGGAN </h2>
            <div class="loginbox">
              <h4 class="heading4">SUDAH MENJADI MEMBER</h4>
              <?php if ($this->session->flashdata('failed')) { ?>
                <span style="color:red"><?=$this->session->flashdata('failed')?></span>
              <?php } ?>
              <form method="post" action="" class="form-vertical">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">E-MAIL :</label>
                    <div class="controls">
                      <input type="text" <?php if ($this->session->flashdata('email')) { ?> value="<?=$this->session->flashdata('email')?>" <?php } ?> class="span3" name="email" id="email">
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">PASSWORD :</label>
                    <div class="controls">
                      <input type="password" name="password" class="span3">
                    </div>
                  </div>
                  <br>
                  <button type="submit" name="login" class="btn btn-orange">LOGIN</button>
                </fieldset>
              </form>
            </div>
          </section>
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
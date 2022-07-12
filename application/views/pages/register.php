<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <div class="span9">
          <h1 class="heading1"><span class="maintext">DAFTAR MEMBER</span></h1>
          <?php if ($this->session->flashdata('failed')) { ?>
            <span style="color:red"><?=$this->session->flashdata('failed')?></span>
          <?php } ?>
          <?php if ($this->session->flashdata('success')) { ?>
            <span style="color:green"><?=$this->session->flashdata('success')?></span>
          <?php } ?>
          <form action="" method="post" class="form-horizontal">
            <h3 class="heading3">DETAIL PERSONAL MEMBER</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> NAMA PELANGGAN :</label>
                  <div class="controls">
                    <input type="text" name="nama_pelanggan" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> EMAIL :</label>
                  <div class="controls">
                    <input type="text" name="email" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> HP / TELEPON :</label>
                  <div class="controls">
                    <input type="text" name="phone" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">DETAIL ALAMAT MEMBER</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> ALAMAT :</label>
                  <div class="controls">
                    <input type="text" name="alamat" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> KOTA :</label>
                  <div class="controls">
                    <input type="text" name="kota" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> PROFINSI :</label>
                  <div class="controls">
                    <input type="text" name="profinsi" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> KODE POS :</label>
                  <div class="controls">
                    <input type="text" name="kodepos" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">DETAIL PASSWORD MEMBER</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> PASSWORD:</label>
                  <div class="controls">
                    <input type="password" name="password" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="span5">
              <input type="submit" name="register" class="btn btn-orange pull-right" value="DAFTAR MEMBER">
            </div>
          </form>
          <div class="clearfix"></div>
          <br>
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
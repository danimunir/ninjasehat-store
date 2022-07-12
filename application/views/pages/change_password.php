<div id="maincontainer">
  <section id="product">
    <div class="container">
     <div class="row">        
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">UBAH PASSWORD</span></h1>
          <?php if ($this->session->flashdata('failed')) { ?>
            <span style="color:red"><?=$this->session->flashdata('failed')?></span>
          <?php } ?>
          <?php if ($this->session->flashdata('success')) { ?>
            <span style="color:green"><?=$this->session->flashdata('success')?></span>
          <?php } ?>
          <form action="" method="post" class="form-horizontal">
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password Lama:</label>
                  <div class="controls">
                    <input type="password" name="password_lama" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password Baru:</label>
                  <div class="controls">
                    <input type="password" name="password_baru" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password Konfirmasi:</label>
                  <div class="controls">
                    <input type="password" name="password_konfirmasi" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <hr />
            <div class="pull-right">
              <input type="Submit" name="change_password" class="btn btn-orange" value="UBAH PASSWORD">
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
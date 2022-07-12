<div id="maincontainer">
    <section id="product">
        <div class="container">
            <div class="row">        
                <div class="span9">
                    <h1 class="heading1"><span class="maintext">KONFIRMASI PEMBAYARAN</span></h1>
                    <?php if ($this->session->flashdata('failed')) { ?>
                        <span style="color:red"><?= $this->session->flashdata('failed') ?></span>
                    <?php } ?>
                    <?php if ($this->session->flashdata('success')) { ?>
                        <span style="color:green"><?= $this->session->flashdata('success') ?></span>
                    <?php } ?>
                    <form action="" method="post" class="form-horizontal">
                        <div class="registerbox">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label"><span class="red">*</span> RESI PESANAN :</label>
                                    <div class="controls">
                                        <b>#</b><input type="text" name="resishow" value="<?=substr($_GET['resi'], 7, 3)?>" class="input-xlarge">
                                        <input type="hidden" name="resi" value="<?=$_GET['resi']?>" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><span class="red">*</span> TUJUAN BANK TRANSFER :</label>
                                    <div class="controls">
                                        <input type="text" name="tujuan" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><span class="red">*</span> ATAS NAMA :</label>
                                    <div class="controls">
                                        <input type="text" name="atasnama" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><span class="red">*</span> ASAL BANK TRANSFER :</label>
                                    <div class="controls">
                                        <input type="text" name="dari" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><span class="red">*</span> REKENING :</label>
                                    <div class="controls">
                                        <input type="text" name="rekening" class="input-xlarge">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><span class="red">*</span> TANGGAL TRANSFER :
                                        <span style="font-size:.8em">(YYYY-MM-DD)</span></label> 
                                    <div class="controls">
                                        <input type="text" name="tanggal_transfer" value="<?=date('Y-m-d')?>" class="input-xlarge">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="span5">
                            <input type="submit" name="konfirmasi" class="btn btn-orange pull-right" value="KONFIRMASI">
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
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url('/administrator')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Ubah Password</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-key"></i>
                    Ubah Password
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<form action="" method="post" role="form">
						<div class="panel-heading">
							<i class="fa fa-key"></i>
							FORM PASSWORD
						</div>
						<div class="panel-body">
							<?php if ($this->session->flashdata('success')) { ?>
	                            <div class="alert bg-success" role="alert">
	                                <?=$this->session->flashdata('success')?>
	                                <a href="" class="pull-right">
	                                    <span class="glyphicon glyphicon-remove"></span>
	                                </a>
	                            </div>
	                        <?php } ?>

	                        <?php if ($this->session->flashdata('failed')) { ?>
	                            <div class="alert bg-danger" role="alert">
	                                <?=$this->session->flashdata('failed')?>
	                                <a href="" class="pull-right">
	                                    <span class="glyphicon glyphicon-remove"></span>
	                                </a>
	                            </div>
	                        <?php } ?>

							<div class="form-group">
								<label>PASSWORD LAMA</label>
								<input type="password" name="old_password" class="form-control" />
							</div>
                            <div class="form-group">
								<label>PASSWORD BARU</label>
								<input type="password" name="new_password" class="form-control" />
							</div>
							<div class="form-group">
								<label>KONFIRMASI PASSWORD</label>
								<input type="password" name="konfirm_password" class="form-control" />
							</div>
						</div>
						<div class="panel-footer text-right">
							<button type="reset" class="btn btn-default">
								<i class="fa fa-refresh"></i>&nbsp; RESET
							</button>

							<button type="submit" name="simpan" class="btn btn-primary">
								<i class="fa fa-save"></i>&nbsp; SIMPAN
							</button>
						</div>
					</form>
				</div>
			</div>
		</div><!--/.row-->
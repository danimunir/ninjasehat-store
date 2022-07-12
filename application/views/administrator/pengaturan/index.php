        <div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url('/administrator')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Pengaturan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-cogs"></i>
                    Pengaturan
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<form action="" method="post" role="form" enctype="multipart/form-data">
						<div class="panel-heading">
							<i class="fa fa-cogs"></i>
							FORM PENGATURAN
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
								<label>NAMA SITUS / TITLE</label>
								<input type="text" value="<?=$val['namasitus']?>" name="title" class="form-control" placeholder="..." />
							</div>
                            <div class="form-group">
								<label>META TAG</label>
								<textarea name="meta_tag" class="form-control"><?=$val['metatag']?></textarea>
							</div>
							<div class="form-group">
								<label>META DESKRIPSI</label>
								<textarea name="meta_deskripsi" class="form-control" rows="5"><?=$val['metadeskripsi']?></textarea>
							</div>
							<div class="form-group">
								<label>LOGO</label>
								<input type="file" name="logo" class="form-control" placeholder="..." />
								<br />
								<?php if (file_exists("./assets/uploads/".$val['logo'])) { ?>
									<img src="<?=base_url('/assets/uploads/'.$val['logo'])?>" alt="logo" width="80px" />
								<?php } ?>
							</div>
							<div class="form-group">
								<label>FAVICON</label>
								<input type="file" name="favicon" class="form-control" placeholder="..." />
								<?php if (file_exists("./assets/uploads/".$val['favicon'])) { ?>
									<img src="<?=base_url('/assets/uploads/'.$val['favicon'])?>" alt="logo" width="80px" />
								<?php } ?>
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
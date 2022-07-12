        <div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url('/administrator')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="<?=base_url('/administrator/users.html')?>">Users</a></li>
				<li class="active">Add</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-cubes"></i>
                    Edit | Daftar Users
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<form action="" method="post" role="form" enctype="multipart/form-data">
						<div class="panel-heading">
							<i class="fa fa-edit"></i>
							FORM USERS
						</div>
						<div class="panel-body">
							<?php if ($this->session->flashdata('failed')) { ?>
								<div class="alert bg-danger" role="alert">
									<?=$this->session->flashdata('failed')?>
									<a href="" class="pull-right">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</div>
							<?php } ?>
							<div class="form-group">
								<label>USERNAME</label>
								<input type="text" value="<?=$val['username']?>" name="username" class="form-control" placeholder="..." />
							</div>
                            <div class="form-group">
								<label>NAMA LENGKAP</label>
								<input type="text" value="<?=$val['nama']?>" name="nama" class="form-control" placeholder="..." />
							</div>
                            <div class="form-group">
								<label>E-MAIL</label>
								<input type="email" value="<?=$val['email']?>" name="email" class="form-control" placeholder="..." />
							</div>
                            <div class="form-group">
								<label>PHONE</label>
								<input type="text" value="<?=$val['phone']?>" name="phone" class="form-control" placeholder="..." />
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
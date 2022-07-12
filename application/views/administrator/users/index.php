        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Users</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-user"></i>
                    Daftar Users
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-table"></i>
                        TABEL USERS

                        <!--<a href="<?=base_url('/administrator/users/add.html')?>" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i> TAMBAH
                        </a>-->
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

						<table id="table-data" class="display table-stripped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>REGISTER PADA</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NAMA</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>REGISTER PADA</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($data_users as $val) { ?>
                                <tr>
                                    <td><?=strtoupper($val['nama'])?></td>
                                    <td><?=strtoupper($val['username'])?></td>
                                    <td><?=strtoupper($val['email'])?></td>
                                    <td><?=$this->dateid->datetime_encode($val['created_at'])?></td>
                                    <td class="text-center">
                                        <?php if ($val['id'] == 1) { ?>
                                        <a href="<?=base_url('/administrator/users/edit/'.str_replace('%', '_', urlencode($this->encrypt->encode($val['id']))))?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php } else { ?>
                                        <a href="<?=base_url('/administrator/users/edit/'.str_replace('%', '_', urlencode($this->encrypt->encode($val['id']))))?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?=base_url('/administrator/users/delete/'.str_replace('%', '_', urlencode($this->encrypt->encode($val['id']))))?>" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
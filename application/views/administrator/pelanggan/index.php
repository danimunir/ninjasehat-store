        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Pelanggan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-users"></i>
                    Daftar Pelanggan
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-table"></i>
                        TABEL PELANGGAN
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
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>TELP</th>
                                    <th>REGISTER PADA</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>TELP</th>
                                    <th>REGISTER PADA</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($this->pelanggan_model->all() as $val) { ?>
                                <tr>
                                    <td>#<?=$val['id_pelanggan']?></td>
                                    <td><?=strtoupper($val['nama_pelanggan'])?></td>
                                    <td><?=strtoupper($val['email'])?></td>
                                    <td><?=$val['phone']?></td>
                                    <td><?=$this->dateid->datetime_encode($val['created_at'])?></td>
                                    <td class="text-center">
                                        <a href="<?=base_url('/administrator/pelanggan/show/'.str_replace("%", "_", urlencode($this->encrypt->encode($val['id_pelanggan']))))?>" class="btn btn-xs btn-default">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="<?=base_url('/administrator/pelanggan/delete/'.str_replace("%", "_", urlencode($this->encrypt->encode($val['id_pelanggan']))))?>" class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
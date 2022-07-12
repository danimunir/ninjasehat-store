        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Konfirmasi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-envelope"></i>
                    Konfirmasi Order
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-table"></i>
                        TABEL KONFIRMASI
                    </div>
					<div class="panel-body">
						<table id="table-data" class="display table-stripped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>RESI</th>
                                    <th>TUJUAN</th>
                                    <th>REKENING</th>
                                    <th>ATAS NAMA</th>
                                    <th>TANGGAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>RESI</th>
                                    <th>TUJUAN</th>
                                    <th>REKENING</th>
                                    <th>ATAS NAMA</th>
                                    <th>TANGGAL</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($this->orderkonfirm_model->all() as $data) { ?>
                                <tr>
                                    <td class="text-center">#<?=$data['resi']?></td>
                                    <td><?=strtoupper($data['tujuan'])?></td>
                                    <td class="text-center"><?=strtoupper($data['rekening'])?></td>
                                    <td><?=strtoupper($data['atasnama'])?></td>
                                    <td class="text-center"><?=$this->dateid->date_encode($data['tanggal_transfer'])?></td>
                                    <td class="text-center">
                                        <a href="<?=base_url('/administrator/konfirmasi/show/'.str_replace('%', '_', urlencode($this->encrypt->encode($data['id_orkonfirm']))).'.html')?>" class="btn btn-xs btn-default">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="<?=base_url('/administrator/konfirmasi/delete/'.str_replace('%', '_', urlencode($this->encrypt->encode($data['id_orkonfirm']))).'.html')?>" class="btn btn-xs btn-danger">
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
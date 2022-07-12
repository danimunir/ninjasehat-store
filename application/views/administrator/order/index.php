        <div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Order</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-shopping-cart"></i>
                    Daftar Order
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-table"></i>
                        TABEL ORDER
                    </div>
					<div class="panel-body">
						<table id="table-data" class="display table-stripped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>RESI</th>
                                    <th>PEMBELI</th>
                                    <th>TELP</th>
                                    <th>TOTAL HARGA</th>
                                    <th>STATUS</th>
                                    <th>TANGGAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>RESI</th>
                                    <th>PEMBELI</th>
                                    <th>TELP</th>
                                    <th>TOTAL HARGA</th>
                                    <th>STATUS</th>
                                    <th>TANGGAL</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($this->order_model->all() as $data) { ?>
                                <tr>
                                    <td class="text-center">#<?=$data['resi']?></td>
                                    <td><?=strtoupper($data['nama_pelanggan'])?></td>
                                    <td class="text-center"><?=$data['phone']?></td>
                                    <td class="text-right"><?=$data['total_harga']?></td>
                                    <td class="text-center">
                                        <?php if ($data['status'] == 0) { ?>
                                            <span class="label label-warning">Baru</span>
                                        <?php } else if ($data['status'] == 1) { ?>
                                            <span class="label label-info">Payout</span>
                                        <?php } else { ?>
                                            <span class="label label-success">Terkirim</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center"><?=$this->dateid->date_encode($data['created_at'])?></td>
                                    <td class="text-center">
                                        <a title="UPDATE TERKIRIM" href="<?=base_url('/administrator/order/send_produk/'.str_replace('%', '_', urlencode($this->encrypt->encode($data['id_order']))).'.html')?>" class="btn btn-xs btn-info">
                                            <i class="fa fa-upload"></i>
                                        </a>
                                        <a href="<?=base_url('/administrator/order/show/'.str_replace('%', '_', urlencode($this->encrypt->encode($data['id_order']))).'.html')?>" class="btn btn-xs btn-default">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="<?=base_url('/administrator/order/delete/'.str_replace('%', '_', urlencode($this->encrypt->encode($data['id_order']))).'.html')?>" class="btn btn-xs btn-danger">
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
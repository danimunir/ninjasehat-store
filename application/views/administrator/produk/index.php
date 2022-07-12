        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Produk</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-cubes"></i>
                    Produk 
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-table"></i>
                        TABEL PRODUK

                        <a href="<?=base_url('/administrator/produk/add')?>" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i> TAMBAH
                        </a>
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

                        <table id="table-data" class="display table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="80px">GAMBAR</th>
                                    <th>PRODUK</th>
                                    <th>KATALOG</th>
                                    <th>HARGA</th>
                                    <th>STATUS</th>
                                    <th>DIPERBARUI PADA</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>GAMBAR</th>
                                    <th>PRODUK</th>
                                    <th>KATALOG</th>
                                    <th>HARGA</th>
                                    <th>STATUS</th>
                                    <th>DIPERBARUI PADA</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($this->produk_model->all() as $val) { ?>
                                <tr>
                                    <td>
                                        <img src="<?=base_url('/assets/uploads/produk/'.$val['gambar'])?>" width="80px" /></td>
                                    <td><?=strtoupper($val['nama_produk'])?></td>
                                    <td><?=strtoupper($val['nama_katalog'])?></td>
                                    <td>Rp<?=$val['harga_jual']?>,-</td>
                                    <td class="text-center">
                                        <?php if ($val['stok'] > 0) { ?>
                                            <span class="label label-success">OnStock</span>    
                                        <?php } else { ?>
                                            <span class="label label-danger">Habis</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center"><?=$this->dateid->datetime_encode($val['created_at'])?></td>
                                    <td class="text-center">
                                        <a href="<?=base_url('/administrator/produk/show/'.str_replace('%', '_', urlencode($this->encrypt->encode($val['id_produk']))))?>" class="btn btn-xs btn-primary">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="<?=base_url('/administrator/produk/edit/'.str_replace('%', '_', urlencode($this->encrypt->encode($val['id_produk']))))?>" class="btn btn-xs btn-default">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?=base_url('/administrator/produk/delete/'.str_replace('%', '_', urlencode($this->encrypt->encode($val['id_produk']))))?>" class="btn btn-xs btn-danger">
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
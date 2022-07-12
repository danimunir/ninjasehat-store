        <div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="<?=base_url('/administrator/produk.html')?>">Produk</a></li>
				<li class="active">Show</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-cubes"></i>
                    DETAIL | DATA PRODUK
                </h1>
			</div>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-cubes"></i>
                        PRODUK #<?=$data['nama_produk']?>
                    </div>
					<div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <td class="text-right" width="20%"><b>GAMBAR</b></td>
                                <td width="1%"><b>:</b></td><td><img src="<?=base_url('/assets/uploads/produk/'.$data['gambar'])?>" width="80px"</td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>KATALOG</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper($data['nama_katalog'])?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>STOK</b></td>
                                <td width="1%"><b>:</b></td><td><?=$data['stok']?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>HARGA JUAL</b></td>
                                <td width="1%"><b>:</b></td><td>Rp<?=$data['harga_jual']?>,-</td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>HARGA CORET</b></td>
                                <td width="1%"><b>:</b></td><td>Rp<?=$data['harga_coret']?>,-</td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>DESKRIPSI</b></td>
                                <td width="1%"><b>:</b></td><td><?=$data['deskripsi']?></td>
                            </tr>
                            <tr><td></td><td></td><td></td></tr>
                        </table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
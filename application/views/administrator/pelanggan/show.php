        <div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="<?=base_url('/administrator/konfirmasi.html')?>">Konfirmasi</a></li>
				<li class="active">Show</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-envelope"></i>
                    Show | Konfirmasi Order
                </h1>
			</div>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-desktop"></i>
                        DETAIL KONFIRMASI
                    </div>
					<div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <td class="text-right" width="20%"><b>ID</b></td>
                                <td width="1%"><b>:</b></td><td>#<?=$val['id_pelanggan']?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>NAMA</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper($val['nama_pelanggan'])?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>TELP</b></td>
                                <td width="1%"><b>:</b></td><td><?=$val['phone']?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>EMAIL</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper($val['email'])?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>ALAMAT</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper($val['alamat'])?>,<br />KOTA <?=strtoupper($val['kota'])?>,<br />PROFINSI <?=strtoupper($val['profinsi'])?>, <br />KODE POS <?=strtoupper($val['kodepos'])?></td>
                            </tr>
                            <tr><td></td><td></td><td></td></tr>
                        </table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
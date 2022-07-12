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

                        <button type="button" onclick="printPages('print-frames')" class="btn btn-primary pull-right">
                            <i class="fa fa-print"></i> CETAK
                        </button>
                    </div>
					<div class="panel-body" id="print-frames">
						<table class="table table-striped">
                            <tr>
                                <td class="text-right" width="30%"><b>NO RESI</b></td>
                                <td width="1%"><b>:</b></td><td>#<?=isset($show['resi']) ? $show['resi'] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="30%"><b>PEMBELI</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper(isset($show['nama_pelanggan']) ? $show['nama_pelanggan'] : '');?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="30%"><b>TELP</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper(isset($show['phone']) ? $show['phone'] : '');?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="30%"><b>BANK TUJUAN</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper(isset($show['tujuan']) ? $show['tujuan'] : '');?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="30%"><b>REKENING PENGIRIM</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper(isset($show['rekening']) ? $show['rekening'] : '');?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="30%"><b>ATAS NAMA</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper(isset($show['atasnama']) ? $show['atasnama'] : '');?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="30%"><b>WAKTU PEMBAYARAN</b></td>
                                <td width="1%"><b>:</b></td><td><?=$this->dateid->datetime_encode(isset($show['created_at']) ? $show['created_at'] : '');?></td>
                            </tr>
                        </table>
					</div>
				</div>
			</div>
		</div><!--/.row-->

        <textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
        <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
        <script>
            
            function printPages(elementId) {
                var a = document.getElementById('printing-css').value;
                var b = document.getElementById(elementId).innerHTML;
                window.frames["print_frame"].document.title = document.title;
                window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
                window.frames["print_frame"].window.focus();
                window.frames["print_frame"].window.print();
            }

        </script>
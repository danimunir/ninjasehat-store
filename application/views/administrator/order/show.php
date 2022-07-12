        <div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="<?=base_url('/administrator/order.html')?>">Order</a></li>
				<li class="active">Show</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-shopping-cart"></i>
                    Show | Daftar Order
                </h1>
			</div>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-desktop"></i>
                        DETAIL ORDER
                        <button type="button" onclick="printPages('print-frames')" class="btn btn-primary pull-right">
                            <i class="fa fa-print"></i> CETAK
                        </button>
                    </div>
					<div class="panel-body" id="print-frames">
						<table class="table table-striped">
                            <tr>
                                <td class="text-right" width="20%"><b>NO RESI</b></td>
                                <td width="1%"><b>:</b></td><td>#<?=$show['resi']?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>PEMBELI</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper($show['nama_pelanggan'])?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>TELP</b></td>
                                <td width="1%"><b>:</b></td><td><?=$show['phone']?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>ALAMAT</b></td>
                                <td width="1%"><b>:</b></td><td><?=strtoupper($show['alamat'])?>,<br />KOTA <?=strtoupper($show['kota'])?>,<br />PROFINSI <?=strtoupper($show['profinsi'])?>, <br />KODE POS <?=strtoupper($show['kodepos'])?></td>
                            </tr>
                            <tr>
                                <td class="text-right" width="20%"><b>KIRIM KE</b></td>
                                <td width="1%"><b>:</b></td><td><?=$show['kirim_ke']?></td>
                            </tr>
                            <tr><td></td><td></td><td></td></tr>
                        </table>
                        
                        <hr style="padding:0; margin: 0" />
                        
                        <h4>DAFTAR PRODUK</h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>KODE</th>
                                    <th>PRODUK</th>
                                    <th>QTY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->orderdetail_model->where(['order_id' => $show['id_order']]) as $list) { ?>
                                <tr>
                                    <td>#<?=$list['id_produk']?></td>
                                    <td><?=strtoupper($list['nama_produk'])?></td>
                                    <td><?=$list['qty']?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
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
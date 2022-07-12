        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?=base_url('/administrator/katalog.html')?>">Katalog</a></li>
				<li class="active">Edit</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    <i class="fa fa-tags"></i>
                    Edit | Katalog
                </h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
            <div class="col-lg-6">
				<form role="form" action="" method="POST">
					<div class="form-group">
						<label>NAMA KATALOG</label>
						<input value="<?=$find['nama_katalog']?>" class="form-control" placeholder="Ex. Baju Kemeja" name="nama_katalog" id="nama_katalog">
					</div>
					<div class="form-group">
						<label>SLUG</label>
						<input value="<?=$find['slug']?>" class="form-control" placeholder="Ex. baju-kemeja" name="slug" id="slug">
					</div>
					<div class="form-group">
						<label>DESKRIPSI</label>
						<textarea class="form-control" rows="5" name="deskripsi" id="deskripsi"><?=$find['deskripsi']?></textarea>
					</div>
					<button type="submit" name="simpan" class="btn btn-primary">
						<i class="fa fa-save"></i> SIMPAN
					</button>
				</form>
            </div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <i class="fa fa-table"></i>
                        TABEL KATALOG
                    </div>
					<div class="panel-body">
						<table id="table-data" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>KATALOG</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>KATALOG</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($this->katalog_model->all() as $data) { ?>
                            	<tr>
                                    <td><?=strtoupper($data['nama_katalog'])?></td>
									<td class="text-center">
										<a href="<?=base_url('/administrator/katalog/edit/'.str_replace('%', '_', urlencode($this->encrypt->encode($data['id_katalog']))))?>" class="btn btn-xs btn-default">
											<i class="fa fa-edit"></i>
										</a>
										<a href="<?=base_url('/administrator/katalog/delete/'.str_replace('%', '_', urlencode($this->encrypt->encode($data['id_katalog']))))?>" class="btn btn-xs btn-danger">
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
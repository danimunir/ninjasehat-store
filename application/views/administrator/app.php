<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$title?></title>

<link href="<?=base_url('/assets/admin/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/plugins/datatables/css/jquery.dataTables.min.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/admin/css/datepicker3.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/admin/css/styles.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">

<!--Icons-->
<script src="<?=base_url('/assets/admin/')?>js/lumino.glyphs.js"></script>

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>ADMIN</span>APP</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href=""><i class="fa fa-user"></i>&nbsp; <?=strtoupper($this->session->userdata('administrator')['nama'])?></a>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li <?php if ($navigation_active == "dashboard") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/index.html')?>">
					<i class="fa fa-dashboard"></i>&nbsp; DASHBOARD
				</a>
			</li>

			<li <?php if ($navigation_active == "katalog") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/katalog.html')?>">
					<i class="fa fa-tags"></i>&nbsp; KATALOG
				</a>
			</li>

			<li <?php if ($navigation_active == "produk") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/produk.html')?>">
					<i class="fa fa-cubes"></i>&nbsp; PRODUK
				</a>
			</li>

			<li <?php if ($navigation_active == "order") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/order.html')?>">
					<i class="fa fa-shopping-cart"></i>&nbsp; DAFTAR ORDER 
					<span class="badge pull-right"><?=$this->order_model->count_unread()?></span>
				</a>
			</li>

			<li <?php if ($navigation_active == "konfirmasi") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/konfirmasi.html')?>">
					<i class="fa fa-envelope"></i>&nbsp; KONFIRMASI ORDER
					<span class="badge pull-right"><?=$this->orderkonfirm_model->count_unread()?></span>
				</a>
			</li>

			<li <?php if ($navigation_active == "pelanggan") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/pelanggan.html')?>">
					<i class="fa fa-users"></i>&nbsp; PELANGGAN
				</a>
			</li>

			<li <?php if ($navigation_active == "users") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/users.html')?>">
					<i class="fa fa-user"></i>&nbsp; USERS
				</a>
			</li>

			
			
			<li role="presentation" class="divider"></li>
			<li <?php if ($navigation_active == "password") { echo 'class="active"'; } ?>>
				<a href="<?=base_url('/administrator/password.html')?>">
					<i class="fa fa-key"></i>&nbsp; UBAH PASSWORD
				</a>
			</li>
			<li>
				<a href="<?=base_url('/administrator/logout.html')?>">
					<i class="fa fa-sign-out"></i>&nbsp; LOGOUT
				</a>
			</li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
		<?php $this->load->view($container); ?>
	</div>	<!--/.main-->

	<script src="<?=base_url('/assets/admin/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/jquery-1.12.4.js')?>"></script>
	<script src="<?=base_url('/assets/plugins/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/chart.min.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/chart-data.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/easypiechart.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/easypiechart-data.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/bootstrap-datepicker.js')?>"></script>
	<script>
		$('#calendar').datepicker({});
		$('#table-data').DataTable({});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>

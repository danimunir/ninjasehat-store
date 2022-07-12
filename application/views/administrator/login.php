<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="<?=base_url('/assets/admin/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/admin/css/datepicker3.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/admin/css/styles.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">

<!--Icons-->
<script src="<?=base_url('/assets/admin/')?>js/lumino.glyphs.js"></script>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading text-center">LOGIN</div>
					<div class="panel-body">
						<?php if ($this->session->flashdata('failed')) { ?>
							<div class="alert bg-danger" role="alert">
								<?=$this->session->flashdata('failed')?>
								<a href="" class="pull-right">
									<span class="glyphicon glyphicon-remove"></span>
								</a>
							</div>
						<?php } ?>
						<form role="form" action="" method="POST">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password">
								</div>
								<hr />
								<button type="submit" name="login" class="btn btn-primary btn-block">
									<i class="fa fa-sign-in"></i>&nbsp; LOGIN
								</button>
							</fieldset>
							<br><center><p>Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a></p></center>
							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div>
	
	<script src="<?=base_url('/assets/admin/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('/assets/admin/js/chart.min.js')?>"></script>
	<script src="<?=base_url('/assets/admin/')?>js/chart-data.js"></script>
	<script src="<?=base_url('/assets/admin/')?>js/easypiechart.js"></script>
	<script src="<?=base_url('/assets/admin/')?>js/easypiechart-data.js"></script>
	<script src="<?=base_url('/assets/admin/')?>js/bootstrap-datepicker.js"></script>
	<script>
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

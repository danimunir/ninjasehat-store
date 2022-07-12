<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?=$title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="<?=base_url('/assets/theme/css/bootstrap.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/theme/css/bootstrap-responsive.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/theme/css/style.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/theme/css/flexslider.css')?>" type="text/css" media="screen" rel="stylesheet"  />
<link href="<?=base_url('/assets/theme/css/jquery.fancybox.css')?>" rel="stylesheet">
<link href="<?=base_url('/assets/theme/css/cloud-zoom.css')?>" rel="stylesheet">
<link rel="shortcut icon" href="<?=base_url('/assets/theme/')?>assets/ico/favicon.html">

</head>
<body>

<!-- Header Start -->
<header>
  <div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          <a href="<?=base_url()?>" class="logo pull-left"><img src="<?=base_url('/assets/theme/')?>img/logo1.jpg" alt="Ninja Sehat" title="Ninja Sehat"></a>
          <!-- Top Nav Start -->
          <div class="pull-left">
            <div class="navbar" id="topnav">
              <div class="navbar-inner">
                <ul class="nav" >
                  <li><a class="home active" href="<?=base_url()?>">Home</a>
                  </li>
                  <li><a class="myaccount" href="<?=base_url('detail_akun.html')?>">Masuk Akun</a>
                  </li>
                  <li><a class="shoppingcart" href="<?=base_url('keranjang_belanja.html')?>">Keranjang Belanja</a>
                  </li>
                  <li><a class="checkout" href="<?=base_url('checkout.html')?>">Checkout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Top Nav End -->
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="headerdetails">
      <div class="pull-right">
        <ul class="nav topcart pull-left">
          <li class="dropdown hover carticon ">
            <a href="#" class="dropdown-toggle" > Keranjang Obat <span class="label label-orange font14"><?=$this->cart->total_items()?> Pesan</span> - Rp<?=$this->cart->format_number($this->cart->total())?> <b class="caret"></b></a>
            <ul class="dropdown-menu topcartopen ">
              <li>
                <table>
                  <tbody>
                    <?php foreach ($this->cart->contents() as $itemHomeCart) { ?>

                    <tr>
                      <td class="name" style="text-align:justify">
                        <a href="<?=base_url($itemHomeCart['link'])?>">
                        <?=(strlen($itemHomeCart['name']) > 12) ? substr(strtoupper($itemHomeCart['name']), 0, 12) . "..." : strtoupper($itemHomeCart['name'])?></a>
                      </td>
                      <td class="quantity">x&nbsp;<?=$itemHomeCart['qty']?></td>
                      <td class="total">Rp<?=$this->cart->format_number($itemHomeCart['price'])?></td>
                      <td class="remove">
                          <a href="" onclick="remove_item_cart('<?=base_url('remove_item_cart/'.md5($itemHomeCart['id']))?>')" title="Hapus"><i class="icon-remove"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <table>
                  <tbody>
                    <tr>
                      <td class="textright"><b>TOTAL :</b></td>
                      <td class="textright">Rp<?=$this->cart->format_number($this->cart->total())?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="well pull-right buttonwrap">
                  <a class="btn btn-orange" href="<?=base_url('keranjang_belanja.html')?>">Daftar Belanja</a>
                  <a class="btn btn-orange" href="<?=base_url('checkout.html')?>">Checkout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Header End -->

<hr />

<?php $this->load->view($container); ?>

<!-- Footer -->
<footer id="footer">
  <section class="copyrightbottom">
    <div class="container">
      <div class="row">
       
        <div class="span6 textright"> Copyright @ <?=date('Y')?> </div>
      </div>
    </div>
  </section>
</footer>

<script type="text/javascript">
  function remove_item_cart(url) {
    $.get(url, function(data) {
      window.reload();
    });
  }
</script>

<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=base_url('/assets/theme/js/jquery.js')?>"></script>
<script src="<?=base_url('/assets/theme/js/bootstrap.js')?>"></script>
<script src="<?=base_url('/assets/theme/js/respond.min.js')?>"></script>
<script src="<?=base_url('/assets/theme/js/application.js')?>"></script>
<script src="<?=base_url('/assets/theme/js/bootstrap-tooltip.js')?>"></script>

<script defer src="<?=base_url('/assets/theme/js/jquery.fancybox.js')?>"></script>
<script defer src="<?=base_url('/assets/theme/js/jquery.flexslider.js')?>"></script>

<script type="text/javascript" src="<?=base_url('/assets/theme/js/jquery.tweet.js')?>"></script>
<script src="<?=base_url('/assets/theme/js/cloud-zoom.1.0.2.js')?>"></script>

<script type="text/javascript" src="<?=base_url('/assets/theme/js/jquery.validate.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/assets/theme/js/jquery.carouFredSel-6.1.0-packed.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/assets/theme/js/jquery.mousewheel.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/assets/theme/js/jquery.touchSwipe.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/assets/theme/js/jquery.ba-throttle-debounce.min.js')?>"></script>

<script defer src="<?=base_url('/assets/theme/js/custom.js')?>"></script>

</body>
</html>
<?php
	$styles = Kohana::$config->load('design')->styles;
	$scripts = Kohana::$config->load('design')->scripts;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="style/images/favicon.png">
	<title></title>
	<!-- Load site css -->
	<?php foreach ($styles as $style) : ?>
	<link rel="stylesheet" href="<?=URL::base(); ?>media/css/<?php echo $style; ?>.css" type="text/css" media="screen" />
	<?php endforeach; ?>
	<link href="<?=URL::site()?>media/css/master.css" rel="stylesheet">

	<!-- SWITCHER -->
	<link rel="stylesheet" id="switcher-css" type="text/css" href="<?=url::site()?>media/assets/switcher/css/switcher.css" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="<?=url::site()?>media/assets/switcher/css/color1.css" title="color1" media="all" data-default-color="true" />
	<link rel="alternate stylesheet" type="text/css" href="<?=url::site()?>media/assets/switcher/css/color2.css" title="color2" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="<?=url::site()?>media/assets/switcher/css/color3.css" title="color3" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="<?=url::site()?>media/assets/switcher/css/color4.css" title="color4" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="<?=url::site()?>media/assets/switcher/css/color5.css" title="color5" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="<?=url::site()?>media/assets/switcher/css/color6.css" title="color6" media="all" />

	<!--[if lt IE 9]>
	<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

	<?=$content?>

	<!-- Load site js -->
	<?php foreach ($scripts as $script) : ?>
	<script src="<?php echo URL::base(); ?>media/js/<?php echo $script; ?>.js" ></script>
	<?php endforeach; ?>
	<!-- /.Load site js -->
	<script src="<?=url::site()?>media/js/jquery-1.11.3.min.js"></script>
	<script src="<?=url::site()?>media/js/jquery-ui.min.js"></script>
	<script src="<?=url::site()?>media/js/bootstrap.min.js"></script>
	<script src="<?=url::site()?>media/js/modernizr.custom.js"></script>

	<script src="<?=url::site()?>media/assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
	<script src="<?=url::site()?>media/js/waypoints.min.js"></script>
	<script src="<?=url::site()?>media/js/jquery.easypiechart.min.js"></script>
	<script src="<?=url::site()?>media/js/classie.js"></script>

	<!--Switcher-->
	<script src="<?=url::site()?>media/assets/switcher/js/switcher.js"></script>
	<!--Owl Carousel-->
	<script src="<?=url::site()?>media/assets/owl-carousel/owl.carousel.min.js"></script>
	<!--bxSlider-->
	<script src="<?=url::site()?>media/assets/bxslider/jquery.bxslider.js"></script>
	<!-- jQuery UI Slider -->
	<script src="<?=url::site()?>media/assets/slider/jquery.ui-slider.js"></script>

	<!--Theme-->
	<script src="<?=url::site()?>media/js/jquery.smooth-scroll.js"></script>
	<script src="<?=url::site()?>media/js/wow.min.js"></script>
	<script src="<?=url::site()?>media/js/jquery.placeholder.min.js"></script>
	<script src="<?=url::site()?>media/js/theme.js"></script>
</body>
</html>
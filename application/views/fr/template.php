<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=@$title?> | <?=Kohana::$config->load('design')->app_name?></title>

  <link rel="icon" type="image/png" href="img/favicon.png">
  <link href="<?=URL::base()?>media/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=URL::base()?>media/css/plugins/select_option1.css">
  <link rel="stylesheet" href="<?=URL::base()?>media/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=URL::base()?>media/css/plugins/flexslider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?=URL::base()?>media/css/plugins/fullcalendar.min.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,400italic,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?=URL::base()?>media/options/optionswitch.css">
  <link rel="stylesheet" href="<?=URL::base()?>media/css/plugins/animate.css">
  <link rel="stylesheet" href="<?=URL::base()?>media/css/plugins/magnific-popup.css">
  <link rel="stylesheet" href="<?=URL::base()?>media/css/style.css">
  <link rel="stylesheet" href="<?=URL::base()?>media/css/colors/default.css" id="option_color">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <div class="main_wrapper">

    <!-- Navigation -->
    <?=View::factory('fr/nav')?>


    <!-- Content -->
    <?=@$content?>

    <!-- Footer -->
    <?=View::factory('fr/footer')?>

  </div>

  <!-- JQUERY SCRIPTS -->
  <script src="<?=URL::base()?>media/js/jquery.min.js"></script>
  <script src="<?=URL::base()?>media/js/bootstrap/bootstrap.min.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/jquery.flexslider.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/jquery.selectbox-0.1.3.min.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/jquery.magnific-popup.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/waypoints.min.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/jquery.counterup.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/wow.min.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/navbar.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/moment.min.js"></script>
  <script src="<?=URL::base()?>media/js/plugins/fullcalendar.min.js"></script>
  <script src="<?=URL::base()?>media/options/optionswitcher.js"></script>
  <script src="<?=URL::base()?>media/js/custom.js"></script>

  </body>
</html>
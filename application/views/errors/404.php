<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Error Page | <?=Kohana::$config->load('design')->app_name?></title>

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

  <div class="main-wrapper">

    <!-- Navigation -->
    <?=View::factory('en/nav')?>

    <!-- ERROR CONTENT -->
    <div class="mainContent error-content clearfix">
      <div class="container">
        <div class="error-content-top">
          <h1>404</h1>
          <h3>Error</h3>
        </div>
        <h3>Oops!</h3>
        <p>The Page you're looking for could not be found</p>
        <p><a href="<?=URL::site('about')?>">Go back</a> ? or <a href="<?=URL::site('contact')?>">Contact us</a> About a problem</p>
      </div>
    </div>

     <!-- Footer -->
    <?=View::factory('en/footer')?>

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


<!-- Mirrored from themes.iamabdus.com/royal/1.2/404-error.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Sep 2016 15:57:12 GMT -->
</html>
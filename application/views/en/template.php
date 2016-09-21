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

  <!--=== option Switcher ===-->
  <i class="option-switcher-btn fa fa-gear hidden-xs"></i>
  <div class="option-switcher animated fadeInRight">
    <div class="option-swticher-header">
      <div class="option-switcher-heading">Template Options</div>            
      <div class="theme-close"><i class="fa fa-close"></i></div>
    </div>
    <div class="option-swticher-body">
      <!-- Theme Colors -->
      <ul class="list-unstyled">
        <li class="theme-default theme-active" data-color="default" data-logo="default-logo"></li>
        <li class="theme-grayGreen" data-color="gray-green" data-logo="grayGreen"></li>
        <li class="theme-blueOrange" data-color="blue-orange" data-logo="blueOrange"></li>
        <li class="theme-grayBlue last" data-color="gray-blue" data-logo="grayBlue"></li>
      </ul>
      <!-- Layout Styles -->
      <div class="row no-col-space layoutStyle">
        <div class="col-xs-6">
          <a href="javascript:void(0);" class="btn-u  btn-block active-switcher-btn wide-layout-btn">Wide</a>                
        </div>
        <div class="col-xs-6">
          <a href="javascript:void(0);" class="btn-u btn-block boxed-layout-btn">Boxed</a>
        </div>                
      </div> 
      <!-- Header Styles -->
      <div class="row no-col-space headerStyle">
        <div class="col-xs-6">
          <a href="javascript:void(0);" class="btn-u btn-block active-switcher-btn fixed-header-btn">Fixed Top</a>               
        </div>
        <div class="col-xs-6">
          <a href="javascript:void(0);" class="btn-u  btn-block static-header-btn">Static Top</a>
        </div>               
      </div>              
    </div>
  </div>
  <!--/option-switcher-->

  <div class="main_wrapper">

    <!-- Navigation -->
    <?=View::factory('en/nav')?>


    <!-- Content -->
    <?=@$content?>

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
</html>
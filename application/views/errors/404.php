<?php
/**
* Builds Zongoservice app which is a marketing company
*
* PHP Version 5 and Kohana 3.3.4 HMVC Framework
*
* These project is subjected to a private license
*
* License: Creative Commons Attribution 3.0 Unported
*
* License URL: http://creativecommons.org/licenses/by/3.0/
*
* @author     Mbiarrambang Alain
* @copyright  2016 ShadoNet Design
* @license    http://www.opensource.org/licenses/mit-license.html
*
* Error 404 page for platform
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=isset($title) ? $title : "Homepage";?> | ZongoSoft Inc.</title>
    
    <!-- core CSS -->
    <link href="<?=URL::site()?>media/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=URL::site()?>media/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=URL::site()?>media/css/animate.min.css" rel="stylesheet">
    <link href="<?=URL::site()?>media/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=URL::site()?>media/css/main.css" rel="stylesheet">
    <link href="<?=URL::site()?>media/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?=URL::site()?>media/js/html5shiv.js"></script>
    <script src="<?=URL::site()?>media/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?=URL::site()?>media/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <!-- platform navigation -->
          <?=view::factory('en/nav')?>
        <!-- //.platform navigation -->
        
    </header><!--/header-->

    <section id="error" class="container text-center">
        <h1>404, Page not found</h1>
        <p>The Page you are looking for doesn't exist or an other error occurred.</p>
        <a class="btn btn-primary" href="index.html">GO BACK TO THE HOMEPAGE</a>
    </section><!--/#error-->

    <!-- platform footer -->
    <?=view::factory('en/footer')?>
    <!-- //.platform footer -->

    <script src="<?=URL::site()?>media/js/jquery.js"></script>
    <script src="<?=URL::site()?>media/js/bootstrap.min.js"></script>
    <script src="<?=URL::site()?>media/js/jquery.prettyPhoto.js"></script>
    <script src="<?=URL::site()?>media/js/jquery.isotope.min.js"></script>
    <script src="<?=URL::site()?>media/js/main.js"></script>
    <script src="<?=URL::site()?>media/js/wow.min.js"></script>
</body>
</html>
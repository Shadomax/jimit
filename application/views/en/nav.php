<?php
	//$action = Request::current()->action();
	//$nude = Request::current()->controller();
/**			if($node=="about" && $action=="pages"){
				$about="true";
			}
            if($action=="contact"){
				$contact="true";
			}
            if($action=="who_we_are"){
				$about="true";
			}
			if($node=="services" || $action=="showServices" ){
				$service="true";
			}
			if($node == "projects" || $action=="showClients" ){
				$projects="true";
			}

			if($node=="gallery"){
				$gallery="true";
			}
		  if($action=="portfolio" || $action=="showPortfolio"){
				$portfolio="true";
			}
			if($node=="news" || $action=="article"){
				$news="true";
			}
            if($node=="home"){
				$home="true";
			} */
?>

<div class="topbar clearfix">
      <div class="container">
        <ul class="topbar-left">
          <li class="phoneNo"><i class="fa fa-phone"></i>0123 45678910</li>
          <li class="email-id hidden-xs hidden-sm"><i class="fa fa-envelope"></i>
            <a href="mailto:info@yourdomain.com">info@yourdomain.com</a>
          </li>
        </ul>
        <ul class="topbar-right">
          <li class="hidden-xs"><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li class="hidden-xs"><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li class="hidden-xs"><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li class="hidden-xs"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
          <li class="hidden-xs"><a href="#"><i class="fa fa-rss"></i></a></li>
          <li class="dropdown language">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-globe"></i>EN
            <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="active">
                    <a href="#">English </a> 
              </li>
              <li><a href="<?=URL::site('fr/home')?>">French</a></li>
              <!--<li><a href="#">Russian</a></li>
              <li><a href="#">German</a></li>-->
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="header clearfix">
      <nav class="navbar navbar-main navbar-default">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="header_inner">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand logo clearfix" href="<?=URL::site()?>"><img src="<?=URL::base()?>media/img/logo.png" alt="<?=Kohana::$config->load('design')->app_name?>" class="img-responsive" /></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-nav">
                  <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="<?=URL::site()?>">Home</a></li>
                  <li >
                    <a href="<?=URL::site('programs')?>" role="button">Programs</a>
                  </li>
                  <li>
                    <a href="<?=URL::site('articles')?>" role="button">BLOG</a>
                  </li>
                  <li>
                    <a href="<?=URL::site('events')?>" role="button">Events</a>
                  </li>
                  <li><a href="<?=URL::site('gallery')?>">Gallery</a></li>
                  <li><a href="<?=URL::site('about')?>">About US</a></li>
                  <li><a href="<?=URL::site('contact')?>">Contact Us</a></li>
                  </ul>
                </div><!-- navbar-collapse -->
              </div>
            </div>
          </div>
        </div><!-- /.container -->
      </nav><!-- navbar -->
    </div>
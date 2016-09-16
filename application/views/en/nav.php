<?php
	$action = Request::current()->action();
	$nude = Request::current()->controller();
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

<!-- Collect the nav links, forms, and other content for toggling -->
          <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?=url::base()?>media/upload/logo.png" alt="logo"></a>
                </div>
        
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?=url::site()?>">Home</a></li>
              <li class="dropdown">
                <a href="<?=url::site('services')?>" data-target="<?=url::site('services')?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                <?php $service = ORM::factory('service')->where('status','=',1)->order_by('id','asc')->find_all();
                  foreach ($service as $key => $s) : ?>
                    <li><a href="<?=url::site('services/service/'.$s->id.'/'.url::title($s->title,'_'))?>"><?=$s->shortName?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us <i class="fa fa-angle-down"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?=url::site('why-choose-us')?>">Why Choose Us</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="<?=url::site('meet-the-team')?>">Our Team</a></li>
                  <li><a href="<?=url::site('client-support')?>">Client Support</a></li>
                </ul>
              </li>
              <li class="hvr-bounce-to-bottom"><a href="<?=url::site('blog')?>">Blog</a></li>
        <li class="hvr-bounce-to-bottom"><a href="<?=url::site('contact-us')?>">Contact Us</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
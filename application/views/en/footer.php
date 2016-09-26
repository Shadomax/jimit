<div class="menuFooter clearfix">
      <div class="container">
        <div class="row clearfix">

          <div class="col-sm-3 col-xs-6">
            <ul class="menuLink clearfix">
              <li><a href="<?=URL::site('about')?>">About <?=Kohana::$config->load('design')->app_name?></a></li>
              <li><a href="<?=URL::site('articles')?>">Blog</a></li>
              <li><a href="<?=URL::site('events')?>">Events</a></li>
            </ul>
          </div><!-- col-sm-3 col-xs-6 -->

          <div class="col-sm-3 col-xs-6 borderLeft clearfix">
            <ul class="menuLink clearfix">
              <li><a href="<?=URL::site('programs')?>">All Programs</a></li>
              <li><a href="<?=URL::site('gallery')?>">Photo Gallery</a></li>
            </ul>
          </div><!-- col-sm-3 col-xs-6 -->

          <div class="col-sm-3 col-xs-6 borderLeft clearfix">
            <div class="footer-address">
              <h5>Location:</h5>
              <address>
                Royal College<br>
                1727 Lombard St.<br>
                San Francisco
              </address>
              <a href="contact-us.html"><span class="place"><i class="fa fa-map-marker"></i>Main Campus</span></a>
            </div>
          </div><!-- col-sm-3 col-xs-6 -->

          <div class="col-sm-3 col-xs-6 borderLeft clearfix">
            <div class="socialArea clearfix">
              <h5>Find us on:</h5>
              <ul class="list-inline ">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
              <li><a href="#"><i class="fa fa-flickr"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
              </ul>
            </div><!-- social -->
            <div class="contactNo clearfix">
              <h5>Call us on:</h5>
              <h3>012-3434-456768</h3>
            </div><!-- contactNo -->
          </div><!-- col-sm-3 col-xs-6 -->

        </div><!-- row clearfix -->
      </div><!-- container -->
    </div><!-- menuFooter -->

    <div class="footer clearfix">
      <div class="container">
        <div class="row clearfix">
          <div class="col-sm-6 col-xs-12 copyRight">
            <p>© <?=date('Y')?> Copyright <?=Kohana::$config->load('design')->app_name?> Design by <a href="<?=Kohana::$config->load('design')->address?>" target="_blank"><?=Kohana::$config->load('design')->designer?></a></p>
          </div><!-- col-sm-6 col-xs-12 -->
          <div class="col-sm-6 col-xs-12 privacy_policy">
            <a href="<?=URL::site('contact')?>">Contact us</a>
          </div><!-- col-sm-6 col-xs-12 -->
        </div><!-- row clearfix -->
      </div><!-- container -->
    </div><!-- footer -->
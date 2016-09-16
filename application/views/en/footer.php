<section style="background-color: #040F45; color: #fff;">
<div class="container wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
    <div class="row">
            <div class="text-center">
                <h2 style="color: #fff; font-size: 2em;">SIGN UP FOR OUR e-NEWSLETTER</h2>
                </div>
                <div class="col-md-6 col-lg-5">
                <p>Subscribe to our weekly Newsletter and stay tuned with exclusive deals, webinars, marketing tips, announcements and more.</p>
                </div>
                <div class="col-md-7">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label for="email">Enter Your Email:</label>
                            <input type="email" class="form-control input-lg" id="email" placeholder="Enter email">   
                        </div>
                        <button type="submit" class="btn-info btn-lg">SIGNUP</button>
                        <p class="form-control-static" style="padding-left: 120px;">* No spam. You can unsubscribe at any time.</p>
                    </form>
        </div>    
    </div>
</div>
</section>
    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="<?=url::site('why-choose-us')?>">Why Choose ZongoSoft</a></li>
                            <li><a href="#">We are hiring</a></li>
                            <li><a href="<?=url::site('meet-the-team')?>">Meet the team</a></li>
                            <li><a href="#">Copyright</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="<?=url::site('contact-us')?>">Contact us</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="#">Faq</a></li>
                            <li><a href="<?=url::site('blog')?>">Blog</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="<?=url::site('client-support')?>">Client Support</a></li>
                            <li><a href="#">Ticket system</a></li>
                            <li><a href="#">Billing system</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Services</h3>
                        <ul>
                            <?php $service = ORM::factory('service')->where('status','=',1)->order_by('id','asc')->find_all();
                  foreach ($service as $key => $s) : ?>
                    <li><a href="<?=url::site('services/service/'.$s->id.'/'.url::title($s->title,'_'))?>"><?=$s->shortName?></a></li>
                  <?php endforeach; ?>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Our Partners</h3>
                        <ul>
                            <li><a href="#">Adipisicing Elit</a></li>
                            <li><a href="#">Eiusmod</a></li>
                            <li><a href="#">Tempor</a></li>
                            <li><a href="#">Veniam</a></li>
                            <li><a href="#">Exercitation</a></li>
                            <li><a href="#">Ullamco</a></li>
                            <li><a href="#">Laboris</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

<!-- footer -->
	<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="#" title="Marketing Company">ZongoSoft Inc</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
<!-- //footer -->

    <!--Begin Comm100 Live Chat Code-->
<!--<div id="comm100-button-90"></div>
<script type="text/javascript">
    var Comm100API = Comm100API || new Object;
    Comm100API.chat_buttons = Comm100API.chat_buttons || [];
    var comm100_chatButton = new Object;
    comm100_chatButton.code_plan = 90;
    comm100_chatButton.div_id = 'comm100-button-90';
    Comm100API.chat_buttons.push(comm100_chatButton);
    Comm100API.site_id = 218582;
    Comm100API.main_code_plan = 90;

    var comm100_lc = document.createElement('script');
    comm100_lc.type = 'text/javascript';
    comm100_lc.async = true;
    comm100_lc.src = 'https://chatserver.comm100.com/livechat.ashx?siteId=' + Comm100API.site_id;
    var comm100_s = document.getElementsByTagName('script')[0];
    comm100_s.parentNode.insertBefore(comm100_lc, comm100_s);

    setTimeout(function() {
        if (!Comm100API.loaded) {
            var lc = document.createElement('script');
            lc.type = 'text/javascript';
            lc.async = true;
            lc.src = 'https://hostedmax.comm100.com/chatserver/livechat.ashx?siteId=' + Comm100API.site_id;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(lc, s);
        }
    }, 5000)
</script> -->
<!--End Comm100 Live Chat Code-->
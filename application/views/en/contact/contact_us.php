<section id="contact-info">
        <div class="center">                
            <h2>How to Reach Us?</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Head Office</h5>
                                    <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                    <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                                </address>

                                <address>
                                    <h5>Zonal Office</h5>
                                    <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>                                
                                    <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                                </address>
                            </li>


                            <li class="col-sm-6">
                                <address>
                                    <h5>Zone#2 Office</h5>
                                    <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                    <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                                </address>

                                <address>
                                    <h5>Zone#3 Office</h5>
                                    <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                    <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Drop Your Message</h2>
                <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="" class="contact-form" name="contact-form" method="post">
                <?php if (!empty($errors)): ?>
                    <p class="message">Some errors were encountered, please check the details you entered.</p>
                    <ul class="errors">
                    <?php foreach ($errors as $message): ?>
                        <li><?php echo $message ?></li>
                    <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="name" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company-name" class="form-control">
                        </div>                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="subject">Subject <span class="text-danger">*</span></label>
                            <input type="text" id="subject" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span class="text-danger">*</span></label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->

	<div class="clearfix">&nbsp;</div>

	<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h3>Other ways to contact us</h3>
			<div class="clearfix">&nbsp;</div>
			<p><span>Phone:</span> <a href="tel:(518) 743-9424">(518) 743-9424</a> <span>Fax:</span> <a href="tel:(518) 743-0337">(518) 743-0337</a><br />
			<span>Sales:</span><a href="mailto:something@domain.com"> something@domain.com</a><br />
			<span>Edits & On Call Support:</span> <a href="mailto:support@domain.com"> support@domain.com</a> 
			</p>
			<address>
				
			</address>
		</div>
		<div class="col-lg-3" style="border-left: 1px solid #E2E2E2;">
			<h3>Our Office</h3>
			<div class="clearfix">&nbsp;</div>
			<address>
				11 Broad Street<br> 
				Third Floor<br>
				Glens Falls, NY 12801<br>
				USA
			</address>
			<a class="btn btn-primary" type="button" href="http://maps.google.com/maps?ll=43.308527,-73.648398&z=16&t=m&hl=en-US&gl=US&mapclient=embed&iwloc=lyrftr:m,14522397799330713531">View on Google Maps</a>
		</div>
		<div class="col-lg-5">
			<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m5!3m3!1m2!1s0x89dfd1e13abf6f65%3A0xc989ebdb04058fbb!2s11+Broad+Street%2C+3rd+Floor+%E2%80%A2+Glens+Falls%2C+New+York+12801!5e0!3m2!1sen!2sus!4v1387843034398" frameborder="0" width="487.5" height="194.65"></iframe>
		</div>
	</div>
	</div>
	<div class="clearfix">&nbsp;</div>
<!-- //contact -->
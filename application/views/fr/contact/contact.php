<div class="custom_content custom">
            <div class="container large">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 custom_right">
                        <div class="single_content_left">
                            <?=$page?>
                            <div class="contact_form">
                                <form method="post">
                                <?php if (!empty($message)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> Your message has been sent successfully.
                                    </div>
                                <?php endif;?>
                                    <?php if (!empty($errors)) :?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Warning!</strong> Some errors were encountered. please review the form below.
                                    </div>
                                <?php endif;?>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-7">
                                            <div class="form-group">
                                                <label>Name <span class="error">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control" name="name">
                                                <label for="name"><span class="error"><?=Arr::get($errors, 'name')?></span></label>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-7">
                                            <div class="form-group">
                                                <label>Email <span class="error">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control" name="email">
                                                <label for="email"><span class="error"><?=Arr::get($errors, 'name')?></span></label>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-11">
                                            <div class="form-group">
                                                <label>Message <span class="error">*</span></label>
                                                <textarea name="comment" id="comment" class="form-control" cols="10" rows="9"></textarea>
                                                <label for="comment"><span class="error"><?=Arr::get($errors, 'name')?></span></label>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                    <input type="submit" value="Send Message" class="commonBtn">
                                </form>
                            </div>  
                        </div><!--end single content left-->
                    </div>
                    
                    <div class="col-xs-12 col-sm-4 custom_left">
                        <div class="sidebar">
                            <div class="list_block sidebar_item">
                                <h3>Contacts</h3>
                                <ul class="contact_info">
                                    <li><i class="fa fa-home"></i> Lorem ipsum dolor sit amet, consectetur</li>
                                    <li><i class="fa fa-envelope"></i> <a href="mailto:info@example.com">info@example.com</a></li>
                                    <li><i class="fa fa-phone"></i> 012-3434-456768</li>
                                    <li><i class="fa fa-globe"></i> <a href="#">http://www.example.com</a></li>
                                </ul>
                            </div>
                            <div class="list_block">
                                <h3>Business Hours</h3>
                                <ul class="contact_info">
                                    <li><strong>Monday-Friday:</strong> 10am to 8pm</li>
                                    <li><strong>Saturday:</strong> 11am to 3pm</li>
                                    <li><strong>Sunday:</strong> Closed</li>
                                </ul>
                            </div><!--end sidebar item-->
                            <div class="list_block">
                                <div class="newsletter">
                                    <h3>Newsletter</h3>
                                    <form method="post" action="#">
                                        <div class="form-group">
                                          <input type="text" placeholder="Email" id="exampleInputEmail1" class="form-control">
                                        </div>
                                        <button class="btn btn-default btn-block commonBtn" type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div><!--end sidebar-->
                    </div>
                </div><!--end row-->
            </div>
        </div><!--end custom content-->

        <div class="contact_map">
            
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6996633.738164338!2d-104.57070294113542!3d31.10069597439005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864070360b823249%3A0x16eb1c8f1808de3c!2sTexas%2C+USA!5e0!3m2!1sen!2sbd!4v1460121293489" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div><!--end contact map-->
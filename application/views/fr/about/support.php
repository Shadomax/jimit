<section id="contact-page">
        <div class="container">
            <div class="">        
                <h1 style="font-size: 3.1em; font-weight: 300;font-family: 'proxima-nova',sans-serif;color: #223c55; margin: .3em 0 .5em; line-height: 1.1em;">Client Support</h1>
                <p class="lead">ZongoSoft Marketing’s Swat Team is dedicated to helping you keep your website up-to-date by performing quick website edits and answering email, website hosting, and website maintenance questions.</p>
                <p class="lead">
                    If you or your company’s website is hosted by ZongoSoft Marketing, Inc. and you’d like our Swat Team to assist with your edits, answer questions about your email, hosting, or website management, then please send your request through the form below.

                </p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <h2 class="" style="letter-spacing: normal !important; margin: 1em 1em; font-weight: 700; font-size: 1.3em; font-family: 'proxima-nova',sans-serif; color: #223c55; padding-left: 100px;">Support Request</h2>
                <form id="" class="contact-form " name="contact-form" method="post" enctype="multipart/form-data">
                <?php if (!empty($errors)): ?>
                    <p class="message">Some errors were encountered, please check the details you entered.</p>
                    <ul class="errors">
                    <?php foreach ($errors as $message): ?>
                        <li><?php echo $message ?></li>
                    <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                    <?=isset($success) ? $success : "";?>
                    <div class="col-sm-8 col-sm-offset-1">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input style="background: #f3f3f3;" type="text" id="name" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input style="background: #f3f3f3;" type="email" id="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input style="background: #f3f3f3;" type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name <span class="text-danger">*</span></label>
                            <input id="company_name" name="company_name" style="background: #f3f3f3;" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="website">Website <span class="text-danger">*</span></label>
                            <input style="background: #f3f3f3;" type="url" name="website" id="website" class="form-control">
                        </div>                         
                        <div class="form-group">
                            <label for="subject">Subject <span class="text-danger">*</span></label>
                            <input style="background: #f3f3f3;" id="subject" type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label id="message">How can we help you? <span class="text-danger">*</span></label>
                            <textarea style="background: #f3f3f3;" name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>
                         <div class="checkbox">
                            <label for="client"><input id="client" name="client" value="yes" type="checkbox"> I am a client of ZongoSoft Marketing, Inc.</label>
                         </div>  
                         <div class="form-group">
                            <label for="file"><strong>Attach a file</strong></label>
                            <input style="background: #f3f3f3;" id="file" type="file" name="file" class="form-control input-lg" required="required">
                        </div> 
                        <p><span class="text-danger">* </span>If you're sending in website edits, please attach a file with the text copy, images, or PDF documents you'd like us to add to your website, along with instructions for where this new content should be placed on your website.</p>                    
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success btn-lg" required="required">Submit Request</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
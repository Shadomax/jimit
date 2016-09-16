<section id="blog" class="container">
        <!--<div class="center">
            <h2>Blogs</h2>
            <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
        </div>-->

        <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" src="<?=$service->getPicture()?>" width="100%" alt="" /></a>
                                <h2><a href="#"><?=$service->title?></a></h2>
                                <h3><?=$service->content?></h3>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                </div><!--/.col-md-8-->

                <aside class="col-md-4">
                    <div class="widget search">
                    <h3>Let's Chat</h3>
                    <?php 
                        if (isset($errors)) : ?>
                            <p>Some errors had occured</p>
                          <?php foreach ($errors as $key => $e) : ?>
                                <li><?=$e?></li>
                            <?php endforeach;?>
                        <?php endif;?>
                       <form role="form" method="post">
                <div class="form-group">
                    <label for="name" class="control-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example: johndoe@somedomain.com">
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="(000) 000-000000" />
                </div>
                <div class="form-group">
                    <label for="website" class="control-label">Website <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="website" id="website" placeholder="http://www.yourdomain.com" />
                </div>
                <div class="form-group">
                    <label for="option">How can we help you? <span class="text-danger">*</span> </label>
                    <div class="col-sm-offset-1 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="web" id="web" type="checkbox">Website Design and Development
                                <span class="help-block">When you want the best: a SEO friendly, responsive website.</span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="seo" id="seo" type="checkbox">SEO and Digital Marketing
                                <span class="help-block">Get found in search engines.</span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="adverb" type="checkbox" id="adverb">Local Online Advertising
                                <span class="help-block">Get found on one of the Mannix Marketing Local Guides, i.e. LakeGeorge.com, Albany.com, Saratoga.com</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Comments</label>
                    <textarea name="message" id="message" class="form-control" cols="20" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
                    </div><!--/.search-->

                    <div class="widget tags">
                        <h3>Other Services</h3>
                        <ul class="tag-cloud">
                            <?php $services = ORM::factory('service')->where('status', '=', 1)->order_by('sort','asc')->find_all();
                                foreach ($services as $key => $v) : ?>
                            <li><a class="btn btn-xs btn-primary" href="<?=url::site('services/service/').$v->id.'/'.url::title($v->title, '_')?>"><?=$v->shortName?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div><!--/.tags-->
                    
                </aside>  
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
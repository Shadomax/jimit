<section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Our Services</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="features">
                    <?php
                foreach ($services as $service => $s) : ?>
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i><img src="<?=$s->getThumb()?>" class="" alt=""></i>
                            <h2><?=$s->shortName?></h2>
                            <h3><?=Text::limit_words($s->content, 8)?></h3>
                            <a class="btn btn-primary readmore" href="<?=URL::site('services/service/'.$s->id.'/'.url::title($s->title,'_'))?>">Read More </a>
                        </div>
                    </div><!--/.col-md-4-->
                <?php endforeach;?>
                </div><!--/.services-->
            </div><!--/.row--> 


            <div class="get-started center wow fadeInDown">
                <h2>Ready to get started</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore  magna aliqua. <br>  Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                <div class="request">
                    <h4><a href="#">Request a free Quote</a></h4>
                </div>
            </div><!--/.get-started-->

            <div class="clients-area center wow fadeInDown">
                <h2>What our client says</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <?php foreach ($clients as $key => $c) : ?>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="<?=$c->getThumb()?>" class="img-circle" alt="">
                        <h3><?=Text::limit_words($c->content, 20)?></h3>
                        <h4><span>-<?=$c->title?> /</span>  Director of <?=$c->website?></h4>
                    </div>
                </div>
            <?php endforeach;?>
           </div>

        </div><!--/.container-->
    </section><!--/#feature-->
<div class="post_section clearfix">
      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-sm-8 post_left">
            <div class="upcoming_events event-col">
              <div class="row clearfix">
              <?php foreach ($events as $event) : 
              $timestamp = strtotime($event->date);
              ?>
                <div class="col-xs-6 col-sm-6">
                  <div class="related_post_sec single_post">
                    <span class="date-wrapper">
                      <span class="date"><span><?=strip_tags(date('d', @$timestamp))?></span><?=strip_tags(date('M', $timestamp))?></span>
                    </span>
                    <div class="rel_right">
                      <h4><a href="<?=URL::site('fr/events/event'.'/'.$event->id.'/'.URL::title($event->title, '_'))?>"><?=strip_tags($event->title)?></a></h4>
                      <div class="meta">
                        <span class="place"><i class="fa fa-map-marker"></i><?=@strip_tags(@$event->location)?></span>
                        <span class="event-time"><i class="fa fa-clock-o"></i><?=strip_tags(@$event->time)?></span>
                      </div>
                      <p>
                        <?=Text::limit_words(strip_tags($event->content), 25)?>
                      </p>
                      <a href="<?=URL::site('fr/events/event'.'/'.$event->id.'/'.URL::title($event->title, '_'))?>" class="btn btn-default commonBtn">voir les détails</a>
                    </div>
                  </div>
                </div>
              <?php endforeach;?>
              </div><!-- row clearfix -->
              <ul class="pagination">
                <?=$pagination?>
              </ul>
            </div>
          </div><!--end post_left-->

          <div class="col-xs-12 col-sm-4 post_right">
            <div class="post_right_inner">
              <div class="related_post_sec">
                <div class="list_block">
                  <h3>Dernières nouvelles</h3>
                  <ul>
                    <li>
                     <?php if (count($articles) == 0) :?>
                      <div class="alert alert-info" role="alert">
                        <strong>La tête haute!</strong> Pas le dernier article à afficher.
                      </div>
                    <?php endif;?>
                    </li>
                  <?php foreach ($articles as $article) :?>
                    <li>
                      <span class="rel_thumb">
                        <img src="<?=@$article->getPicture()?>" style="width:100px; height:67px" alt="<?=strip_tags($article->title)?>" />
                      </span><!--end rel_thumb-->
                      <div class="rel_right">
                        <a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"><h4><?=strip_tags($article->title)?></h4></a>
                        <span class="date">Posted: <a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"><?=date('F', $article->datetime)?> <?=date('d', $article->datetime)?>, <?=date('Y', $article->datetime)?></a></span>
                      </div><!--end rel right-->
                    </li>
                  <?php endforeach;?>
                  </ul>
                  <a href="<?=URL::site('fr/articles')?>" class="more_post">Plus</a>
                </div>
                <div class="list_block">
                  <div class="formTitle news">
                    <h3 class="extraPadding">"Entrer dans ..." Guides Université</h3>
                    <p class="reduceMargin">Offered in small class sizes with great emphasis on the demands of the specification and exam technique.</p>
                    <div class="getImage clearfix">
                      <img alt="" src="<?=URL::base()?>media/img/home/get_image_1.png" />
                    </div><!-- getImage -->
                    <a class="btn btn-default btn-block commonBtn" href="#" download="" type="button">obtenir maintenant</a>
                  </div>
                </div>
                <div class="list_block">
                  <div class="newsletter">
                    <h3>Bulletin</h3>
                    <form action="#" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <button type="submit" class="btn btn-default btn-block commonBtn">Souscrire</button>
                      </form>
                    </div>
                </div><!-- formArea -->
              </div><!--end related_post_sec-->
            </div><!--end post right inner-->
          </div><!--end post_right-->

        </div><!-- row -->

      </div><!-- container -->
    </div><!-- post_section -->
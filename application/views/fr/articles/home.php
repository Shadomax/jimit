<div class="post_section clearfix">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-sm-8 post_left">
                            <div class="post_left_section post_left_border">
                                <?php if (count($articles) == 0) :?>
                                    <div class="alert alert-info" role="alert">
                                        <strong>La tête haute!</strong> Pas le dernier article à afficher.
                                    </div>
                                <?php endif;?>
                                <?php foreach ($articles as $article) :?>
                                <div class="post">
                                    <div class="post_thumb">
                                        <img src="<?=@$article->getPicture()?>" alt="" />
                                    </div><!--end post thumb-->
                                    <div class="meta">
                                        <span class="author">Par: <a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"> <?=strip_tags($article->posted_by)?></a></span>
                                        <span class="category"> <a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"><?=strip_tags($article->category->name)?></a></span>
                                        <span class="date">Publié: <a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"><?=date('F', $article->datetime)?> <?=date('d', $article->datetime)?>, <?=date('Y', $article->datetime)?></a></span>
                                    </div><!--end meta-->
                                    <h1><a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"><?=strip_tags($article->title)?></a></h1>
                                    <div class="post_desc">
                                        <p>
                                            <?=Text::limit_words(strip_tags($article->content), 40)?>
                                        </p>
                                    </div><!--end post desc-->
                                    <!--<div class="post_bottom">
                                        <ul>
                                            <li class="like">
                                                <a href="#">
                                                    <img src="img/news/like_icon.png" alt="" />
                                                    <span>12</span>
                                                </a>
                                            </li>
                                            <li class="share">
                                                <a href="#">
                                                    <img src="img/news/share_icon.png" alt="" />
                                                    <span>12</span>
                                                </a>
                                            </li>
                                            <li class="favorite">
                                                <a href="#">
                                                    <img src="img/news/favorite_icon.png" alt="" />
                                                    <span>12</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>--><!--end post bottom-->
                                </div><!--end post-->
                            <?php endforeach;?>

                               <ul class="pagination">
                                <?=$pagination?>
                               </ul><!--end pagination section-->
                                
                            </div><!--end post left section-->
                        </div><!--end post_left-->

                        <div class="col-xs-12 col-sm-4 post_right">
                            <div class="post_right_inner">

                                <div class="related_post_sec">
                                    <div class="list_block">
                                        <div class="upcoming_events">
                                        <h3>évènements à venir</h3>
                                        <ul>
                                            <li>
                                            <?php if (count($events) == 0) :?>
                                              <div class="alert alert-info" role="alert">
                                                <strong>La tête haute!</strong> Aucune dernière nouvelle à afficher.
                                              </div>
                                            <?php endif;?>
                                            </li>
                                          <?php foreach ($events as $event) :
                                            $timestamp = strtotime($event->date);
                                          ?>
                                          <li class="related_post_sec single_post">
                                            <span class="date-wrapper">
                                              <span class="date"><span><?=strip_tags(date('d', @$timestamp))?></span><?=strip_tags(date('M', $timestamp))?></span>
                                            </span>
                                            <div class="rel_right">
                                              <h4><a href="<?=URL::site('fr/events/event'.'/'.$event->id.'/'.URL::title($event->title, '_'))?>"><?=strip_tags($event->title)?></a></h4>
                                              <div class="meta">
                                                <span class="place"><i class="fa fa-map-marker"></i><?=@strip_tags(@$event->location)?></span>
                                                <span class="event-time"><i class="fa fa-clock-o"></i><?=strip_tags(@$event->time)?></span>
                                              </div>
                                            </div>
                                          </li>
                                      <?php endforeach; ?>
                                        </ul>
                                        <a href="<?=URL::site('fr/events')?>" class="btn btn-default btn-block commonBtn">Plus d'événements</a>
                                      </div>
                                    </div>

                                    <div class="list_block">
                                        <div class="formTitle news">
                                            <h3 class="extraPadding">"Entrer dans ..." Guides Université</h3>
                                            <p class="reduceMargin">Offered in small class sizes with great emphasis on the demands of the specification and exam technique.</p>
                                            <div class="getImage clearfix">
                                              <img alt="" src="<?=URL::base()?>media/img/home/get_image_1.png" />
                                            </div><!-- getImage -->
                                            <a href="" download="" class="btn btn-default btn-block commonBtn" type="button">obtenir maintenant</a>
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

                    </div>
                </div>
            </div><!--end post section-->
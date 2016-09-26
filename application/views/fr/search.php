<div class="post_section clearfix">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-sm-8 post_left">
                            <div class="post_left_section post_left_border">
                                <?php if (count($programs) == 0) :?>
                                    <div class="alert alert-info" role="alert">
                                        <strong>La tête haute!</strong> Aucun résultat de recherche trouvé.
                                    </div>
                                <?php endif;?>
                                <h5>Résultats de la recherche: <?=$total_program?> Programmes Trouvé</h5><br />
                                <?php foreach ($programs as $program) :?>
                                <div class="post">
                                    <div class="meta">
                                        <span class="author">Cours: <?=$program->tution_fee?></span>
                                        <span class="category"> </span>
                                        <span class="date">Durée des études: <?=$program->certificate->length?></span>
                                    </div><!--end meta-->
                                    <h1><a href="<?=URL::site('fr/programs/program'.'/'.$program->id.'/'.URL::title($program->title, '_'))?>"><?=strip_tags($program->title)?></a></h1>
                                    <div class="post_desc">
                                        <p>
                                            <?=Text::limit_words(strip_tags($program->explore), 20)?>
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
                                        <h3>Programmes populaires</h3>
                                        <ul>
                                            <li>
                                            <?php if (count($popular) == 0) :?>
                                              <div class="alert alert-info" role="alert">
                                                <strong>La tête haute!</strong> Aucune dernière nouvelle à afficher.
                                              </div>
                                            <?php endif;?>
                                            </li>
                                          <?php foreach ($popular as $program) :?>
                                          <li class="related_post_sec single_post">
                                            <span class="date-wrapper">
                                              <span class="date" ><span style="font-size:17px;"><?=$program->certificate->name?></span></span>
                                            </span>
                                            <div class="rel_right">
                                              <h4><a href="<?=URL::site('fr/programs/program'.'/'.$program->id.'/'.URL::title($program->title, '_'))?>"><?=strip_tags($program->title)?></a></h4>
                                              <div class="meta">
                                                <span class="place"><i class="fa fa-map-marker"></i><?=@strip_tags(@$program->location)?></span>
                                                <span class="event-time"><i class="fa fa-clock-o"></i><?=strip_tags(@$program->options)?></span>
                                              </div>
                                            </div>
                                          </li>
                                      <?php endforeach; ?>
                                        </ul>
                                        <a href="<?=URL::site('fr/programs')?>" class="btn btn-default btn-block commonBtn">Plus proframmes</a>
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
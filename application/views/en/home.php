<?=View::factory('en/slider')?>

<div class="aboutArea">
      <div class="container">
        <div class="row clearfix">
          <div class="col-xs-12">
            <div class="aboutTitle">
              <h2>Our Popular Programs</h2>
            </div><!-- aboutTitle -->
          </div><!-- col-sm-3 col-xs-12 -->
        </div><!-- row clearfix -->

        <div class="about_inner clearfix">
          <div class="row">
            
            <?php foreach ($programs as $program) :?>
            <div class="col-xs-6 col-sm-3">
              <div class="aboutImage">
                <a href="<?=URL::site('programs/program'.'/'.$program->id.'/'.URL::title($program->title, '_'))?>"> 
                  <img src="<?=@$program->getPicture()?>" alt="<?=$program->title?>" class="img-responsive" />
                  <div class="overlay">
                    <p>
                    	<?=Text::limit_words(strip_tags($program->explore), 25)?>
                    </p>
                  </div>
                  <span class="captionLink"><?=strip_tags($program->title)?><span></span></span>
                </a>
              </div><!-- aboutImage -->
            </div>
        <?php endforeach;?>

          </div><!-- row -->
        </div><!-- about_inner -->

      </div><!-- container -->
    </div><!-- aboutArea -->

    <div class="mainContent clearfix">
      <div class="container">
        <div class="row clearfix">

          <div class="col-sm-8 col-xs-12">
            <div class="videoNine clearfix">

              <div class="videoArea clearfix">
                <?=$page->content?>
              </div><!-- videoArea -->

              <div class="related_post_sec single_post">
                <h3>Recent News</h3>
                <ul>
                  <?php foreach ($articles as $article) :?>
                  <li>
                    <span class="rel_thumb">
                      <a href="<?=URL::site('articles/article').'/'.$article->id.'/'.URL::title($article->title, '_')?>"><img src="<?=@$article->getPicture()?>" alt="<?=$article->title?>"></a>
                    </span><!--end rel_thumb-->
                    <div class="rel_right">
                      <h4 class="text-capitalize"><a href="<?=URL::site('articles/article').'/'.$article->id.'/'.URL::title($article->title, '_')?>"><?=strip_tags($article->title)?></a></h4>
                      <div class="meta">
                        <span class="author">Posted in: <a href="<?=URL::site('articles/article').'/'.$article->id.'/'.URL::title($article->title, '_')?>">Update</a></span>
                        <span class="date">on: <a href="<?=URL::site('articles/article').'/'.$article->id.'/'.URL::title($article->title, '_')?>"><?=date('F', $article->datetime)?> <?=date('d', $article->datetime)?>, <?=date('Y', $article->datetime)?></a></span>
                      </div>
                      <p>
                      	<?=Text::limit_words(strip_tags($article->content), 25)?>
                      </p>
                    </div><!--end rel right-->
                  </li>
              <?php endforeach;?>
                </ul>
              </div><!--related_post_sec-->

          </div><!--videoNine-->
          </div><!-- col-sm-8 col-xs-12 -->

          <div class="col-sm-4 col-xs-12">
            <div class="formArea clearfix">
              <div class="formTitle">
                <h3>Find a Program</h3>
                <p>Offered in small class sizes with great emphasis on the demands of the specification and exam technique.</p>
              </div><!-- formTitle -->
            <form action="<?=URL::site('home/search')?>" method="get">
                <div class="selectBox clearfix">
                  <select name="level" id="guiest_id2">
                    <option value="0">Select Level</option>
                    <?php foreach ($certificates as $key) :?>
                      <option value="<?=$key->name?>"><?=$key->name?></option>
                    <?php endforeach;?>            
                  </select>
                </div><!-- selectBox -->
                <div class="form-group">
                  <input type="text" class="form-control" id="program" name="program" placeholder="Program Name">
                </div>
                <button type="submit" class="btn btn-default btn-block commonBtn">Search</button>
              </form>
            </div><!-- formArea -->
            <div class="list_block related_post_sec">
              <div class="upcoming_events">
                <h3>Upcoming Events</h3>
                <ul>
                  <?php foreach ($events as $event) :
                  	$timestamp = strtotime($event->date);
                  ?>
                  <li class="related_post_sec single_post">
                    <span class="date-wrapper">
                      <span class="date"><span><?=strip_tags(date('d', @$timestamp))?></span><?=strip_tags(date('M', $timestamp))?></span>
                    </span>
                    <div class="rel_right">
                      <h4><a href="<?=URL::site('events/event'.'/'.$event->id.'/'.URL::title($event->title, '_'))?>"><?=strip_tags($event->title)?></a></h4>
                      <div class="meta">
                        <span class="place"><i class="fa fa-map-marker"></i><?=@strip_tags(@$event->location)?></span>
                        <span class="event-time"><i class="fa fa-clock-o"></i><?=strip_tags(@$event->time)?></span>
                      </div>
                    </div>
                  </li>
              <?php endforeach; ?>
                </ul>
                <a href="<?=URL::site('events')?>" class="btn btn-default btn-block commonBtn">More Events</a>
              </div>
            </div><!-- end list_block -->
          </div><!-- col-sm-4 col-xs-12 -->
          
        </div><!-- row clearfix -->
      </div><!-- container -->
    </div><!-- mainContent -->

    <div class="testimonial-section clearfix"> 
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="testimonial">
              <div class="carousal_content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
              </div>
              <div class="carousal_bottom">
                <div class="thumb">
                  <img src="<?=URL::base()?>media/img/about/SARA-LISBON_Art-Student.jpg" alt="" draggable="false">
                </div>                    
                <div class="thumb_title">
                  <span class="author_name">Sara Lisbon</span>
                  <span class="author_designation">Student<a href="#"> English Literature</a></span>
                </div>
              </div>
            </div><!-- testimonial -->
          </div><!-- col-xs-12 -->
          <div class="col-xs-12 col-sm-6">
            <div class="features">
              <h3>Why Choose Us?</h3>
              <ul>
                <li><i class="fa fa-check-circle-o"></i>It’s a complete solution for your college website</li>
                <li><i class="fa fa-check-circle-o"></i>PSD file included to help you customize the design better</li>
                <li><i class="fa fa-check-circle-o"></i>SASS file included for unlimited hasel free style customization</li>
                <li><i class="fa fa-check-circle-o"></i>Theme option switcher for live cusomization preview</li>
                <li><i class="fa fa-check-circle-o"></i>24/7 Support</li>
              </ul>
            </div>
          </div><!-- col-xs-12 -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- testimonial-section -->

    <div class="brand-section clearfix">
      <div class="container">
        <div class="brand-slider flexslider">
          <ul class="slides">
          <?php foreach ($partners as $partner) :?>
            <li>
              <a href="#"><img src="<?=$partner->getPicture()?>" /></a>
            </li>
      		<?php endforeach;?>
          </ul>
        </div>
      </div>
    </div><!-- brand-section -->
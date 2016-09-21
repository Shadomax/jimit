<?php
  $slides = ORM::factory('Slider')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
?>
<div class="banner carousel slide" id="recommended-item-carousel" data-ride="carousel">
      <div class="slides carousel-inner">
        <?php $i = 0;
          foreach ($slides as $slide) :?>
        <div class="item <?=($i == 0) ? 'active' : '' ?>">
          <img src="<?=@$slide->getPicture()?>" alt="<?=@$slide->header?>" />
          <div class="banner_caption">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="caption_inner animated fadeInUp">
                    <h1><?=strip_tags($slide->header)?></h1>
                    <p>
                      <?=@Text::limit_words(strip_tags($slide->content), 25)?>
                    </p>
                    <a href="<?=$slide->link?>" target="_blank">Learn More</a>
                  </div><!--end caption_inner-->
                </div>
              </div><!--end row-->
            </div><!--end container-->
          </div><!--end banner_caption-->
        </div>
        <?php $i++; endforeach; ?>
      </div>
      <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <img src="<?=URL::base()?>media/img/home/slider/prev.png">
        </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <img src="<?=URL::base()?>media/img/home/slider/next.png">
      </a>    
    </div><!--end banner-->
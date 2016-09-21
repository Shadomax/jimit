<div class="mainContent clearfix">
      <div class="container">
        <div class="course-grid">
          <div class="about_inner clearfix">
            <div class="row">
            <?php foreach ($programs as $program) :?>
              <div class="col-xs-6 col-sm-3">
                <div class="aboutImage">
                  <a href="<?=URL::site('programs/program/'.$program->id.'/'.URL::title($program->title, '_'))?>"> 
                    <img src="<?=$program->getPicture()?>" alt="" class="img-responsive" />
                    <div class="overlay">
                      <p>
                        <?=Text::limit_words(strip_tags($program->explore), 15)?>
                      </p>
                    </div>
                    <span class="captionLink">View Details<span></span></span>
                  </a>
                </div><!-- aboutImage -->
                <h3>
                  <a href="<?=URL::site('programs/program/'.$program->id.'/'.URL::title($program->title, '_'))?>"><?=strip_tags($program->title)?></a>
                </h3>
              </div>
            <?php endforeach;?>

            </div><!-- row -->

            <ul class="pagination">
              <li>
                <a aria-label="Previous" href="#">
                <span aria-hidden="true">Previous</span>
                </a>
              </li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">6</a></li>
              <li><a href="#">...</a></li>
              <li><a href="#">38</a></li>
              <li>
                <a aria-label="Next" href="#">
                <span aria-hidden="true">Next</span>
                </a>
              </li>
            </ul>

          </div><!-- about_inner -->
        </div><!-- course-grid -->
      </div><!-- container -->
    </div><!-- mainContent -->
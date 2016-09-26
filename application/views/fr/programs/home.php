<div class="mainContent clearfix">
      <div class="container">
        <div class="course-grid">
          <div class="about_inner clearfix">
            <div class="row">
            <?php foreach ($programs as $program) :?>
              <div class="col-xs-6 col-sm-3">
                <div class="aboutImage">
                  <a href="<?=URL::site('fr/programs/program/'.$program->id.'/'.URL::title($program->title, '_'))?>"> 
                    <img src="<?=$program->getPicture()?>" alt="" class="img-responsive" />
                    <div class="overlay">
                      <p>
                        <?=Text::limit_words(strip_tags($program->explore), 15)?>
                      </p>
                    </div>
                    <span class="captionLink">Voir les détails<span></span></span>
                  </a>
                </div><!-- aboutImage -->
                <h3>
                  <a href="<?=URL::site('fr/programs/program/'.$program->id.'/'.URL::title($program->title, '_'))?>"><?=strip_tags($program->title)?></a>
                </h3>
              </div>
            <?php endforeach;?>

            </div><!-- row -->

            <ul class="pagination">
              <?=$pagination?>
            </ul>

          </div><!-- about_inner -->
        </div><!-- course-grid -->
      </div><!-- container -->
    </div><!-- mainContent -->
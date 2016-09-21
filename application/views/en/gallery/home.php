<div class="custom_content custom clearfix">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="photo_gallery custom">
              <?php if (count($galleries) == 0) :?>
              <div class="alert alert-info" role="alert">
                <strong>Heads up!</strong> No Gallery to display
              </div>
            <?php endif;?>
              <ul class="gallery popup-gallery">
              <?php foreach ($galleries as $gallery) :?>
                <li>
                  <a href="<?=$gallery->getPicture()?>" title="<?=$gallery->title?>">
                    <img src="<?=$gallery->getPicture()?>" alt="<?=$gallery->title?>"/>
                    <div class="overlay">
                      <span class="zoom">
                        <i class="fa fa-search"></i>
                      </span>
                    </div>
                  </a>
                </li>
              <?php endforeach;?>
              </ul>
            </div><!--end photo gallery-->
          </div>
        </div><!--end row-->
      </div>
    </div><!--end custom content-->
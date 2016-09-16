<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Team
            <small>Use these section to edit a team member.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/teams')?>">Team Members</a></li>
            <li class="active">Edit Team Member</li>
          </ol>
        </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Team Member Edit Form</h3>
                </div><!-- /.box-header -->
                <?php if (!empty($errors)): ?>
                        <div class="alert alert-warning fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
                        </div>
                    <?php endif ?>
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                      <label for="name" class="text-warning"><?=Arr::get($errors, 'name'); ?></label>
                        <input type="text" class="form-control" value="<?=$team->name?>" id="name" placeholder="Team Member Name" name="name">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="position" class="col-sm-2 control-label">Position</label>
                      <div class="col-sm-10">
                      <label for="position" class="text-warning"><?=Arr::get($errors, 'position'); ?></label>
                        <input type="text" class="form-control" value="<?=$team->position?>" id="position" placeholder="Team Member Position" name="position">
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="bio" class="col-sm-2 control-label">Bio</label>
                  	<div class="col-sm-10">
                    <label for="bio" class="text-warning"><?=Arr::get($errors, 'bio'); ?></label>
                  		<div class="box">
			                <div class="box-header">
			                  <div class="pull-right box-tools">
			                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			                  </div><!-- /. tools -->
			                </div><!-- /.box-header -->
			                <div class="box-body pad">
			                    <textarea class="wysiwygtextarea" name="bio" placeholder="Place your team bio here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$team->bio?></textarea>
			                </div>
			              </div>
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                      <label for="twitter_link" class="col-sm-2 control-label">Twitter Link</label>
                      <div class="col-sm-10">
                      <label for="twitter_link" class="text-warning"><?=Arr::get($errors, 'twitter_link'); ?></label>
                        <input type="text" class="form-control" value="<?=$team->twitter_link?>" id="twitter_link" placeholder="Team Member Twitter Link" name="twitter_link">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="facebook_link" class="col-sm-2 control-label">Facebook Link</label>
                      <div class="col-sm-10">
                      <label for="facebook_link" class="text-warning"><?=Arr::get($errors, 'facebook_link'); ?></label>
                        <input type="text" class="form-control" value="<?=$team->facebook_link?>" id="facebook_link" placeholder="Team Member Facebook Link" name="facebook_link">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="linkedIn_link" class="col-sm-2 control-label">LinkedIn Link</label>
                      <div class="col-sm-10">
                      <label for="linkedIn_link" class="text-warning"><?=Arr::get($errors, 'linkedIn_link'); ?></label>
                        <input type="text" class="form-control" value="<?=$team->linkedIn_link?>" id="linkedIn_link" placeholder="Team Member LinkedIn Link" name="linkedIn_link">
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="file" class="col-sm-2 control-label">Picture</label>
                  	<div class="col-sm-10">
                    <label for="file" class="text-warning"><?=Arr::get($errors, 'file'); ?></label>
                    <img src="<?=$team->getThumb()?>" alt="" class="img-thumbnail" style="width: 120px; height: 100px" />
                  		<p class="help-block">Change:</p>
                  		<input class="form-control" type="file" value="<?=$team->photo?>" id="file" name="file">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_title" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Title</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_title" name="seo_title" value="<?=$team->seo_title?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_description" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Description</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_description" name="seo_description" value="<?=$team->seo_description?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_keywords" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Keywords</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_keywords" name="seo_keywords" value="<?=$team->seo_keywords?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="sort" class="col-sm-2 control-label">Sort Order</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="number" id="sort" name="sort" value="<?=$team->sort?>">
                  	</div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/teams')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
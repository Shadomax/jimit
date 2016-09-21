<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Program
            <small>Use this section to edit program for french display.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/programs')?>">Programs</a></li>
            <li class="active">Edit Program</li>
          </ol>
        </section>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Programs Edit Form</h3>
                </div><!-- /.box-header -->
                <?php if (!empty($message)) :?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?=$message?>
                  </div>
                <?php endif;?>
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-warning fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
                        </div>
                    <?php endif ?>
                    <center><p class="help-block">Edit the form below. Fields with <span class="text-danger">*</span> are required.</p></center>
                    <div class="form-group">
                      <label for="certificate" class="col-sm-2 control-label">Certificate <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control select2" id="certificate" name="certificate" style="width: 100%;">
                          <option value="" selected="selected">Select the certicate obtained</option>
                          <?php foreach ($certificates as $key) :?>
                          <option value="<?=$key->id?>" <?=($key->id == $program->certificate_id) ? 'selected' : ''?>><?=$key->name?></option>
                        <?php endforeach;?>
                        </select>
                        <label for="certificate" class="text-warning"><?=Arr::get($errors, 'certificate'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="title" class="col-sm-2 control-label">Title <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$program->title?>" id="title" placeholder="Program Title" name="title">
                        <label for="title" class="text-warning"><?=Arr::get($errors, 'title'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="code" class="col-sm-2 control-label">Code</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$program->code?>" id="code" placeholder="Program Code" name="code">
                        <label for="code" class="text-warning"><?=Arr::get($errors, 'code'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="fee" class="col-sm-2 control-label">Tution Fee <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$program->tution_fee?>" id="fee" placeholder="Program Tution Fee" name="fee">
                        <label for="title" class="text-warning"><?=Arr::get($errors, 'fee'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="option" class="col-sm-2 control-label">Options <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$program->options?>" id="option" placeholder="Program Study options (e.g Full Time)" name="option">
                        <label for="option" class="text-warning"><?=Arr::get($errors, 'option'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="location" class="col-sm-2 control-label">Location <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$program->location?>" id="location" placeholder="Campus Location (e.g Campus B Malingo)" name="location">
                        <label for="location" class="text-warning"><?=Arr::get($errors, 'location'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="explore" class="col-sm-2 control-label">Explore <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="box">
                      <div class="box-header">
                        Place content of what student will explore here
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body pad">
                          <textarea class="wysiwygtextarea" name="explore" placeholder="Place content of what student will explore here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$program->explore?></textarea>
                      </div>
                    </div>
                      <label for="explore" class="text-warning"><?=Arr::get($errors, 'explore'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="learn" class="col-sm-2 control-label">Outline <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="box">
                      <div class="box-header">
                        Place content of the programs outline here
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body pad">
                          <textarea class="wysiwygtextarea" name="learn" placeholder="Place content of program outline here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$program->learn?></textarea>
                      </div>
                    </div>
                      <label for="learn" class="text-warning"><?=Arr::get($errors, 'learn'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="cost" class="col-sm-2 control-label">Cost <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="box">
                      <div class="box-header">
                        Place content of program cost here
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body pad">
                          <textarea class="wysiwygtextarea" name="cost" placeholder="Place content of program cost here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$program->cost?></textarea>
                      </div>
                    </div>
                      <label for="cost" class="text-warning"><?=Arr::get($errors, 'cost'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="requirement" class="col-sm-2 control-label">Requirements <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="box">
                      <div class="box-header">
                        Place content of program requirements here
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body pad">
                          <textarea class="wysiwygtextarea" name="requirement" placeholder="Place content of program requirements here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$program->requirement?></textarea>
                      </div>
                    </div>
                      <label for="requirement" class="text-warning"><?=Arr::get($errors, 'requirement'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="seo_title" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="seo_title" name="seo_title" value="<?=$program->seo_title?>">
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="seo_description" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Description</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="seo_description" name="seo_description" value="<?=$program->seo_description?>">
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="seo_keywords" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Keywords</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="seo_keywords" name="seo_keywords" value="<?=$program->seo_keywords?>">
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="sort" class="col-sm-2 control-label">Sort <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" id="sort" name="sort" value="<?=$program->sort?>">
                      <label for="sort" class="text-warning"><?=Arr::get($errors, 'sort'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?=URL::site('admin/programs')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
    </div>
  </div>
</section>
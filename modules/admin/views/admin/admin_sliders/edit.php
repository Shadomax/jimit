<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Slide
            <small>Use this section to edit slide.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/sliders')?>">Sliders</a></li>
            <li class="active">Edit Slide</li>
          </ol>
        </section>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Slide Edit Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <center><p class="help-block">Edit the form below. Fields with <span class="text-danger">*</span> are required.</p></center>
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-warning fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                      <label for="header" class="col-sm-2 control-label">Header <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="header" value="<?=$slider->header?>" id="header" placeholder="Slide Header">
                        <label for="header" class="text-warning"><?= Arr::get($errors, 'header'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Content <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="box">
                      <div class="box-header">
                        <div class="pull-right box-tools">
                          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                      <div class="box-body pad">
                          <textarea class="wysiwygtextarea" name="content" placeholder="Place your slider content here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$slider->content?></textarea>
                      </div>
                    </div>
                      <label for="content" class="text-warning"><?= Arr::get($errors, 'content'); ?></label>
                    </div>
                  </div> <!-- /.form-group -->
                  <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Link</label>
                    <div class="col-sm-10">
                      <input type="link" class="form-control" name="location" value="<?=$slider->link?>" id="location" placeholder="Slide read more button (e.g www.jimit.dev/en/about)">
                      <label for="location" class="text-warning"><?= Arr::get($errors, 'location'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="file" class="col-sm-2 control-label">Picture <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <img src="<?=$slider->getPicture()?>" class="img-thumbnail" alt="<?=$slider->header?>" style="width:100px; height:50px">
                        <p class="help-block">Change:</p>
                      <input class="form-control" type="file" id="file" name="file" />
                      <label for="file" class="text-warning"><?= Arr::get($errors, 'file'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="sort" class="col-sm-2 control-label">Sort <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" id="sort" name="sort" value="<?=$slider->sort?>">
                      <label for="sort" class="text-warning"><?= Arr::get($errors, 'sort'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?=URL::site('admin/sliders')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
    </div>
  </div>
</section>
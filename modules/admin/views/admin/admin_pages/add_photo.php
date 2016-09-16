<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add Photo
            <small>Use these section to add photos to your page.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/pages')?>">Pages</a></li>
            <li><a href="<?=url::site('admin/pages/photos')?>">Photos</a></li>
            <li class="active">Add Photo</li>
          </ol>
        </section>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Photo Add Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                  <?php if (!empty($errors)) : ?>
            <div class="alert alert-warning">
              <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
              <strong>Warning! </strong>Form Errors! Check the input fileds below.
            </div>
          <?php endif;?>
                    <div class="form-group">
                      <label for="alt_text" class="col-sm-2 control-label">Photo Name</label>
                      <div class="col-sm-10">
                      <label for="alt_text" class="text-warning"><?=Arr::get($errors, 'alt_text')?></label>
                        <input type="text" name="alt_text" class="form-control" value="<?=Arr::get($values, 'alt_text')?>" id="alt_text" placeholder="Page Name">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="feature" class="col-sm-2 control-label">Feature</label>
                      <div class="col-sm-10">
                      <label for="feature" class="text-warning"><?=Arr::get($errors, 'feature'); ?></label>
                        <input type="text" name="feature" class="form-control" value="<?=Arr::get($values, 'feature')?>" id="feature" placeholder="Feature on page">
                        </select>
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                    <label for="content" class="text-warning"><?=Arr::get($errors, 'content')?></label>
                      <div class="box">
                      <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body pad">
                          <textarea class="wysiwygtextarea" name="content" placeholder="Place your service content here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=Arr::get($values, 'content')?></textarea>
                      </div>
                    </div>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="file" class="col-sm-2 control-label">Picture</label>
                    <div class="col-sm-10">
                    <label for="photo" class="text-warning"><?=Arr::get($errors, 'photo'); ?></label>
                      <input class="form-control" type="file" value="" id="photo" name="photo">
                    </div>
                  </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?=URL::site('admin/pages/photos')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
    </div>
  </div>
</section>

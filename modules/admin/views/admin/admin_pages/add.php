<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add Page
            <small>Use this section to add page content.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/pages')?>">Pages</a></li>
            <li class="active">Add Page</li>
          </ol>
        </section>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Page Add Form</h3>
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
                      <label for="title" class="col-sm-2 control-label">Page Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="<?=Arr::get($values, 'title')?>" id="title" placeholder="Page Title (e.g Home)">
                        <label for="title" class="text-warning"><?=Arr::get($errors, 'title')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="location" class="col-sm-2 control-label">Video Link</label>
                      <div class="col-sm-10">
                        <input type="text" name="location" class="form-control" value="<?=Arr::get($values, 'location')?>" id="location" placeholder="Youtube video link if any" />
                        <label for="location" class="text-warning"><?=Arr::get($errors, 'location'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
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
                      <label for="content" class="text-warning"><?=Arr::get($errors, 'content')?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="file" class="col-sm-2 control-label">Picture</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" value="<?=Arr::get($values, 'file'); ?>" id="file" name="file">
                      <label for="file" class="text-warning"><?=Arr::get($errors, 'file'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="seo_title" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="seo_title" name="seo_title" value="<?=Arr::get($values, 'seo_title')?>">
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="seo_description" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Description</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="seo_description" name="seo_description" value="<?=Arr::get($values, 'seo_description')?>">
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="seo_keywords" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Keywords</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="seo_keywords" name="seo_keywords" value="<?=Arr::get($values, 'seo_keywords')?>">
                    </div>
                  </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?=URL::site('admin/pages')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
    </div>
  </div>
</section>

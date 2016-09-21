<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add Partner
            <small>Use this section to add partner content.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/partners')?>">Partners</a></li>
            <li class="active">Add Partner</li>
          </ol>
        </section>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Partner Add Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                  <center><p class="help-block">Fill the form below. Fields with <span class="text-danger">*</span> are required.</p></center>
                  <?php if (!empty($errors)) : ?>
                    <div class="alert alert-warning">
                      <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
                      <strong>Warning! </strong>Form Errors! Check the input fileds below.
                    </div>
                  <?php endif;?>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="<?=Arr::get($values, 'name')?>" id="name" placeholder="Partner Name (e.g MTN)">
                        <label for="name" class="text-warning"><?=Arr::get($errors, 'name')?></label>
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
                    <label for="file" class="col-sm-2 control-label">Logo <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="file" name="file">
                      <label for="file" class="text-warning"><?=Arr::get($errors, 'file'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="sort" class="col-sm-2 control-label">Sort <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" id="sort" name="sort" value="<?=Arr::get($values, 'sort')?>">
                      <label for="sort" class="text-warning"><?=Arr::get($errors, 'sort'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?=URL::site('admin/partners')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
    </div>
  </div>
</section>

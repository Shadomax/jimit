<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add Slider
            <small>Use these section to manage your slider content.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/sliders')?>">Sliders</a></li>
            <li class="active">Add Slider</li>
          </ol>
        </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Slider Add Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title" class="col-sm-2 control-label">Slider Name</label>
                      <div class="col-sm-10">
                      <label for="title" class="text-warning"><?= Arr::get($errors, 'title'); ?></label>
                        <input type="text" class="form-control" name="title" value="<?=@Arr::get($values, 'title')?>" id="title" placeholder="Slider Name">
                      </div>
                    </div><!-- /.form-group -->
                  <!--<div class="form-group">
                  	<label for="content" class="col-sm-2 control-label">Content</label>
                  	<div class="col-sm-10">
                    <label for="content" class="text-warning"><?= Arr::get($errors, 'content'); ?></label>
                  		<div class="box">
			                <div class="box-header">
			                  <div class="pull-right box-tools">
			                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			                  </div>
			                </div>
			                <div class="box-body pad">
			                    <textarea class="wysiwygtextarea" name="content" placeholder="Place your slider content here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=@Arr::get($values, 'content')?></textarea>
			                </div>
			              </div>
                  	</div>
                  </div> /.form-group -->
                  <div class="form-group">
                  	<label for="file" class="col-sm-2 control-label">Picture</label>
                  	<div class="col-sm-10">
                    <label for="file" class="text-warning"><?= Arr::get($errors, 'file'); ?></label>
                  		<input class="form-control" type="file" id="file" name="file" />
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="sort" class="col-sm-2 control-label">Sort Order</label>
                  	<div class="col-sm-10">
                    <label for="sort" class="text-warning"><?= Arr::get($errors, 'sort'); ?></label>
                  		<input class="form-control" type="number" id="sort" name="sort" value="<?=@Arr::get($values, 'sort')?>">
                  	</div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/sliders')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
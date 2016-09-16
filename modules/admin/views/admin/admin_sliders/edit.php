<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Slider
            <small>Use these section to manage your slider content.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/sliders')?>">Sliders</a></li>
            <li class="active">Edit Slider</li>
          </ol>
        </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info" method="post">
                <div class="box-header with-border">
                  <h3 class="box-title">Slider Edit Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title" class="col-sm-2 control-label">Slider Name</label>
                      <div class="col-sm-10">
                      <label for="title" class="text-warning"><?=Arr::get($errors, 'title')?></label>
                        <input type="text" class="form-control" name="title" value="<?=@$slider->title?>" id="title" placeholder="Slider Name">
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="file" class="col-sm-2 control-label">Picture</label>
                  	<div class="col-sm-10">
                    <label for="file" class="text-warning"><?=Arr::get($errors, 'file')?></label>
                  		<img src="<?=@$slider->getPicture()?>" alt="" class="img-thumbnail" style="width: 100px; height: 100px" />
                  		<p class="help-block">Change:</p>
                  		<input class="form-control" type="file" id="file" name="file" />
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="sort" class="col-sm-2 control-label">Sort Order</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="sort" name="sort" value="<?=@$slider->sort?>">
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
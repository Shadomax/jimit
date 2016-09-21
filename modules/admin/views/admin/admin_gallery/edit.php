<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Gallery
            <small>Use this section to edit photo.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/gallery')?>">Gallery</a></li>
            <li class="active">Edit Photo</li>
          </ol>
    </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Photo Edit Form</h3>
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
                      <label for="name" class="col-sm-2 control-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=strip_tags($gallery->title)?>" id="title" name="name" placeholder="Photo Title">
                        <label for="name" class="text-warning"><?=Arr::get($errors, 'name')?></label>
                      </div>
                    </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="file" class="col-sm-2 control-label">Picture</label>
                  	<div class="col-sm-10">
                  		<img src="<?=$gallery->getPicture()?>" alt="" class="img-thumbnail" style="width:100px; height:100px" />
                  		<p class="help-block">Change:</p>
                  		<input class="form-control" type="file" id="file" name="file">
                      <label for="file" class="text-warning"><?=Arr::get($errors, 'file')?></label>
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="sort" class="col-sm-2 control-label">Sort</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="sort" name="sort" value="<?=@strip_tags($gallery->sort)?>">
                  	</div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/gallery')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
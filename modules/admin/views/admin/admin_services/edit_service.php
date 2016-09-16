<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Service
            <small>Use these section to manage your service content.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/services')?>">Services</a></li>
            <li class="active">Edit Service</li>
          </ol>
    </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Service Edit Form</h3>
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
                      <label for="title" class="col-sm-2 control-label">Service Name</label>
                      <div class="col-sm-10">
                      <label for="title" class="text-warning"><?=Arr::get($errors, 'title')?></label>
                        <input type="text" class="form-control" value="<?=HTML::chars($service->title)?>" id="title" name="title" placeholder="Service Name">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                    <label for="shortName" class="col-sm-2 control-label">Feature</label>
                    <div class="col-sm-10">
                    	<select class="form-control select2" style="width: 100%;">
	                      <option value="<?=@$service->feature?>" selected="selected"><?=@$service->feature?></option>
	                      <option value="no">no</option>
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
			                    <textarea class="wysiwygtextarea" name="content" placeholder="Place your service content here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=@$service->content?></textarea>
			                </div>
			              </div>
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="file" class="col-sm-2 control-label">Picture</label>
                  	<div class="col-sm-10">
                    <label for="file" class="text-warning"><?=Arr::get($errors, 'file')?></label>
                  		<img src="<?=@$service->getPicture()?>" alt="" class="img-thumbnail" style="width:100px; height:100px;" />
                  		<p class="help-block">Change:</p>
                  		<input class="form-control" type="file" id="file" name="file">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_title" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Title</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_title" name="seo_title" value="<?=@strip_tags($service->seo_title)?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_description" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Description</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_description" name="seo_description" value="<?=@strip_tags($service->seo_description)?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_keywords" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Keywords</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_keywords" name="seo_keywords" value="<?=@strip_tags($service->seo_keyword)?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="sort" class="col-sm-2 control-label">Sort Order</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="sort" name="sort" value="<?=@strip_tags($service->sort)?>">
                  	</div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/services')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
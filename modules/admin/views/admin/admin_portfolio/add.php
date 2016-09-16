<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add Portfolio
            <small>Use these section to add new portfolio content.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/portfolio')?>">Portfolio</a></li>
            <li class="active">Add Portfolio</li>
          </ol>
        </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Portfolio Add Form</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/portfolio/category_add')?>">Add Portfolio Category</a>
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
                      <label for="title" class="col-sm-2 control-label">Portfolio Name</label>
                      <div class="col-sm-10">
                      <label for="title" class="text-warning"><?=Arr::get($errors, 'title'); ?></label>
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'title'); ?>" id="title" placeholder="Portfolio Name" name="title">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                    <label for="category_id" class="col-sm-2 control-label">Portfolio Category</label>
                    <div class="col-sm-10">
                    <?php
                      $pcat = ORM::factory('portfoliocategory')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
                    ?>
                    <label for="category_id" class="text-warning"><?=Arr::get($errors, 'category_id'); ?></label>
                    	<select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
	                      <?php foreach ($pcat as $key => $pc) : ?>
                          <option value="<?=$pc->id?>" <?=($pc->id == 1) ? 'selected="selected"' : '' ;?> ><?=$pc->title?></option>
                        <?php endforeach; ?>
	                    </select>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="content" class="col-sm-2 control-label">Content</label>
                  	<div class="col-sm-10">
                    <label for="content" class="text-warning"><?=Arr::get($errors, 'content'); ?></label>
                  		<div class="box">
			                <div class="box-header">
			                  <div class="pull-right box-tools">
			                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			                  </div><!-- /. tools -->
			                </div><!-- /.box-header -->
			                <div class="box-body pad">
			                    <textarea class="wysiwygtextarea" name="content" placeholder="Place your service content here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=Arr::get($values, 'content'); ?></textarea>
			                </div>
			              </div>
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="file" class="col-sm-2 control-label">Picture</label>
                  	<div class="col-sm-10">
                    <label for="file" class="text-warning"><?=Arr::get($errors, 'file'); ?></label>
                  		<input class="form-control" type="file" value="<?=Arr::get($values, 'file'); ?>" id="file" name="file">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_title" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Title</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_title" name="seo_title" value="<?=Arr::get($values, 'seo_title'); ?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_description" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Description</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_description" name="seo_description" value="<?=Arr::get($values, 'seo_description'); ?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="seo_keywords" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Keywords</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="seo_keywords" name="seo_keywords" value="<?=Arr::get($values, 'seo_keywords'); ?>">
                  	</div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                  	<label for="sort" class="col-sm-2 control-label">Sort Order</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="number" id="sort" name="sort" value="<?=Arr::get($values, 'sort'); ?>">
                  	</div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/portfolio')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
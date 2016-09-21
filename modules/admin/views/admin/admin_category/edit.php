<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Category
            <small>Use this section to edit category.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/category')?>">Category</a></li>
            <li class="active">Edit Category</li>
          </ol>
        </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Category Edit Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-warning fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$category->name?>" id="name" placeholder="Category Name" name="name">
                        <label for="name" class="text-warning"><?=Arr::get($errors, 'name'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="content" class="col-sm-2 control-label">Description <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="content" name="content" value="<?=$category->content?>" placeholder="Enter category description">
                        <label for="content" class="text-warning"><?=Arr::get($errors, 'content'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="sort" class="col-sm-2 control-label">Sort <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input class="form-control" type="number" id="sort" name="sort" value="<?=$category->sort?>">
                        <label for="sort" class="text-warning"><?=Arr::get($errors, 'sort'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/category')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
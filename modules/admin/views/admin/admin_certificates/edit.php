<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit Certificate
            <small>Use this section to edit certificate.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/certificates')?>">Certificates</a></li>
            <li class="active">Edit Certificate</li>
          </ol>
        </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Certificate Edit Form</h3>
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
                      <label for="name" class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$certificate->name?>" id="name" placeholder="Category Name" name="name">
                        <label for="name" class="text-warning"><?=Arr::get($errors, 'name'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="content" class="col-sm-2 control-label">Description <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="content" name="content" value="<?=$certificate->description?>" placeholder="Enter certificate description">
                        <label for="content" class="text-warning"><?=Arr::get($errors, 'content'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="length" class="col-sm-2 control-label">Length <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="length" name="length" value="<?=$certificate->length?>" placeholder="Enter the number of years to obtain the certificate">
                        <label for="length" class="text-warning"><?=Arr::get($errors, 'length'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/certificates')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin User Password
            <small>Use these section to change user password.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/users')?>">Users</a></li>
            <li class="active">Change User Password</li>
          </ol>
    </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">User Password Form</h3>
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
                    <center><p class="help-block">Fill the form below. Fields with <span class="text-danger">*</span> are required.</p></center>
                    <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'password')?>" id="password" name="password" placeholder="Password">
                        <label for="password" class="text-warning"><?=Arr::get($errors, 'password')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="password-comfirm" class="col-sm-2 control-label">Confirm Password <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'password_confirm')?>" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                        <label for="password_confirm" class="text-warning"><?=Arr::get($errors, 'password_confirm')?></label>
                      </div>
                    </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/users')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update Password</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
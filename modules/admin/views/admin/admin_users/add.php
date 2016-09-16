<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add User
            <small>Use these section to manage your users.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/users')?>">Users</a></li>
            <li class="active">Add User</li>
          </ol>
    </section>
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">User Add Form</h3>
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
                      <label for="username" class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                      <label for="username" class="text-warning"><?=Arr::get($errors, 'username')?></label>
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'username')?>" id="username" name="username" placeholder="Username">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                      <label for="email" class="text-warning"><?=Arr::get($errors, 'email')?></label>
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'email')?>" id="email" name="email" placeholder="Email">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                      <label for="password" class="text-warning"><?=Arr::get($errors, 'password')?></label>
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'password')?>" id="password" name="password" placeholder="Password">
                      </div>
                    </div><!-- /.form-group -->
                   <!-- <div class="form-group">
                      <label for="firstname" class="col-sm-2 control-label">First Name</label>
                      <div class="col-sm-10">
                      <label for="firstname" class="text-warning"><?=Arr::get($errors, 'firstname')?></label>
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'firstname')?>" id="firstname" name="firstname" placeholder="First Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                      <div class="col-sm-10">
                      <label for="lastname" class="text-warning"><?=Arr::get($errors, 'lastname')?></label>
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'lastname')?>" id="lastname" name="lastname" placeholder="Last Name">
                      </div>
                    </div>
                  <div class="form-group">
                  	<label for="bio" class="col-sm-2 control-label">Bio</label>
                  	<div class="col-sm-10">
                    <label for="bio" class="text-warning"><?=Arr::get($errors, 'bio')?></label>
                  		<div class="box">
			                <div class="box-header">
			                  
			                  <div class="pull-right box-tools">
			                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			                  </div>
			                </div>
			                <div class="box-body pad">
			                    <textarea class="wysiwygtextarea" name="bio" placeholder="Place user bio here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=Arr::get($values, 'bio')?></textarea>
			                </div>
			              </div>
                  	</div>
                  </div>
                  <div class="form-group">
                  	<label for="file" class="col-sm-2 control-label">Picture</label>
                  	<div class="col-sm-10">
                    <label for="file" class="text-warning"><?=Arr::get($errors, 'file')?></label>
                  		<input class="form-control" type="file" value="<?=Arr::get($values, 'file')?>" id="file" name="file">
                  	</div>
                  </div>
                  <div class="form-group">
                  	<label for="dob" class="col-sm-2 control-label"><abbr title="Date Of Birth">DOB</abbr></label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="date" id="dob" name="dob" value="<?=Arr::get($values, 'dob')?>">
                  	</div>
                  </div>
                  <div class="form-group">
                  	<label for="phone" class="col-sm-2 control-label">Phone</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="number" id="phone" name="phone" value="<?=Arr::get($values, 'phone')?>">
                  	</div>
                  </div>
                  <div class="form-group">
                  	<label for="street" class="col-sm-2 control-label">Street</label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="street" name="street" value="<?=Arr::get($values, 'street')?>">
                  	</div>
                  </div>
                  <div class="form-group">
                  	<label for="city" class="col-sm-2 control-label">City </label>
                  	<div class="col-sm-10">
                  		<input class="form-control" type="text" id="city" name="city" value="<?=Arr::get($values, 'city')?>">
                  	</div>
                  </div>
                  <div class="form-group">
                    <label for="region" class="col-sm-2 control-label">Region </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="region" name="region" value="<?=Arr::get($values, 'region')?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="country" class="col-sm-2 control-label">Country </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="country" name="country" value="<?=Arr::get($values, 'country')?>">
                    </div>
                  </div> -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/user')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
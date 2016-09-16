<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Member Type Aministration 
            <small>Use these section to add member type.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/members')?>">Members</a></li>
            <li><a href="<?=url::site('admin/types')?>">Types</a></li>
            <li class="active">Add Type</li>
          </ol>
    </section>
<section class="content type-form">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Type Form</h3>
                </div><!-- /.box-header -->
                <div class="messages" style="">
                 
                </div>
                <!-- form start -->
                <form class="form-horizontal" method="post" data-name="add-form" action="<?=URL::site('admin/types/add')?>" id="form-type" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'name')?>" id="name" name="name" placeholder="Enter Name">
                        <label for="name" class="text-warning"><?=Arr::get($errors, 'name')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="description" class="col-sm-2 control-label">Description <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'description')?>" id="description" name="description" placeholder="Enter Description">
                        <label for="description" class="text-warning"><?=Arr::get($errors, 'description')?></label>
                      </div>
                    </div><!-- /.form-group -->
                   </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/types')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right save" data-name="form-type">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
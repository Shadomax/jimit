<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit French Event
            <small>Use this section to edit event for french display.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/events')?>">Events</a></li>
            <li class="active">Edit Event</li>
          </ol>
        </section>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Event Edit Form</h3>
                </div><!-- /.box-header -->
                <?php if (!empty($errors)): ?>
                  <div class="alert alert-warning fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
                  </div>
                <?php endif ?>
                <?php if (!empty($message)): ?>
                  <div class="alert alert-info fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?=@$message?>
                  </div>
                <?php endif ?>
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <center><p class="help-block">Edit the form below. Fields with <span class="text-danger">*</span> are required.</p></center>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=@$event->title?>" id="name" placeholder="Event Name" name="name" >
                        <label for="name" class="text-warning"><?=Arr::get($errors, 'name'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="locaton" class="col-sm-2 control-label">Location <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=@$event->location?>" id="location" placeholder="Event Location" name="location" >
                        <label for="location" class="text-warning"><?=Arr::get($errors, 'location'); ?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Date <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" value="<?=@$event->date?>" id="date" placeholder="Event Date (format: mm/dd/yy)" name="date">
                      <label for="date" class="text-warning"><?=Arr::get($errors, 'date'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="time" class="col-sm-2 control-label">Time <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" value="<?=@$event->time?>" id="time" placeholder="Event Time (format: 01:20 AM)" name="time" >
                      <label for="time" class="text-warning"><?=Arr::get($errors, 'time'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Content <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="box">
                      <div class="box-header">
                        <div class="pull-right box-tools">
                          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body pad">
                          <textarea class="wysiwygtextarea" name="content" placeholder="Place your event content here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=@$event->content?></textarea>
                      </div>
                    </div>
                      <label for="content" class="text-warning"><?=Arr::get($errors, 'content'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label for="sort" class="col-sm-2 control-label">sort <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" value="<?=@$event->sort?>" id="sort" placeholder="Event Sort" name="sort" >
                      <label for="sort" class="text-warning"><?=Arr::get($errors, 'sort'); ?></label>
                    </div>
                  </div><!-- /.form-group -->
                 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?=URL::site('admin/events')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
    </div>
  </div>
</section>
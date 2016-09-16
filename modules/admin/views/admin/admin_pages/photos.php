<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Pages Photos
            <small>Use the page section to manage your website pages photos.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/pages')?>">Pages</a></li>
            <li class="active">Pages Photos</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Page Photo Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/pages/addPhoto')?>">Add</a> <?php if ($count == 0) :?>
              <span class="text-danger">No Pages to display</span>
            <?php endif; ?> 
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <!--<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>-->
                      <?php if($count != 0) :?> <a href="<?=URL::site('admin/pages/photos')?>" class="btn btn-info btn-xs" type="button">Manage Page Photos</a> <?php endif; ?>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Title</th>
                      <th>Page On</th>
                      <th>Photo</th>
                      <th>Content</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      foreach ($photos as $key => $p) : ?>
                    <tr>
                      <td><?=$p->alt_text?></td>
                      <td><?=$p->feature?></td>
                      <td><img src="<?=URL::site()?>media/images/pages/<?=$p->photo?>" class="img-thumbnail" style="width:80px; height:40px;" alt="<?=$p->alt_text?>"></td>
                      <td><?=Text::limit_words($p->content,5)?></td>
                      <td>
                        <a class="btn btn-primary" type="button" href="<?=URL::site('admin/pages/editPhoto').'/'.$p->id.'/'.URL::title($p->alt_text,'_')?>">Edit</a> | <a class="btn btn-danger del_page" data-id="<?=$p->id?>" type="button" href="" data-toggle="modal">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach;?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
      </section><!-- /.content -->

          <div class="example-modal">
            <div id="delete" class="modal fade in modal-danger" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Page Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the Page?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="" type="button" id="confirm" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
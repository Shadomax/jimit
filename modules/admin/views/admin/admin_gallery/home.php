<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Gallery
            <small>Use this section to manage photos in gallery.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Gallery</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Gallery Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/gallery/add')?>">Add Photo</a> <?php if ($count == 0) :?>
              <span class="text-danger">No Photos to display</span>
            <?php endif;?>
                </div><!-- /.box-header -->
                <?php if (!empty($message)) :?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?=$message?>
                  </div>
                <?php endif;?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($galleries as $gallery) : ?>
                      <tr>
                        <td><?=strip_tags($gallery->sort)?></td>
                        <td>
                          <?=strip_tags($gallery->title)?>
                        </td>
                        <td><img src="<?=$gallery->getPicture()?>" class="img-thumbnail" style="width:100px; height:50px;" alt=""></td>
                        <td>
                          <a class="btn btn-primary" type="button" href="<?=URL::site('admin/gallery/edit').'/'.$gallery->id.'/'.URL::title(strip_tags($gallery->title),'_')?>">Edit</a> | <a class="btn btn-danger delete_item" type="button" href="<?=URL::site('admin/gallery/delete').'/'.$gallery->id?>" data-toggle="modal">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
  </section><!-- /.content -->

          <div  class="example-modal">
            <div id="delete" class="modal fade in modal-danger" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Gallery Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the Gallery?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="" type="button" id="confirm-delete" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
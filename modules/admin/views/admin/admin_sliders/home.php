<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Slider
            <small>Use this section to manage slides.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Sliders</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Slider Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/sliders/add')?>">Add</a> <?php if ($count == 0) :?>
              <span class="text-danger">No slides to display</span>
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
                        <th>Header</th>
                        <th>Slide</th>
                        <th>Content</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($sliders as $slide) : ?>
                    <tr>
                      <td><?=$slide->sort?></td>
                      <td><?=$slide->header?></td>
                      <td><img src="<?=$slide->getPicture()?>" class="img-thumbnail" style="width:100px; height:50px;" alt="<?=$slide->header?>"></td>
                      <td><?=Text::limit_words(strip_tags($slide->content), 5)?></td>
                      <td>
                        <a class="btn btn-primary" type="button" href="<?=URL::site('admin/sliders/edit').'/'.$slide->id.'/'.URL::title($slide->header,'_')?>">Edit</a> | <a class="btn btn-primary" type="button" href="<?=URL::site('admin/sliders/fr_edit').'/'.$slide->id.'/'.URL::title($slide->header,'_')?>">Edit Fr</a> | <a class="btn btn-danger delete_item" href="<?=URL::site('admin/sliders/delete').'/'.$slide->id?>" type="button" data-toggle="modal">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Slide</th>
                        <th>Content</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
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
                    <h4 class="modal-title">Slider Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the Slider?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="" type="button" id="confirm-delete" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Deleted Program
            <small>Use this section to manage deleted Program.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/articles')?>"> Programs</a></li>
            <li class="active">Deleted Program</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Deleted Programs Management</h3> <?php if ($count == 0) :?>
              <span class="text-danger">No Deleted Programs to display</span>
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
                        <th>Certificate</th>
                        <th>Tution Fee</th>
                        <th>Code</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <tbody>
                        <?php
                          foreach ($programs as $program) : ?>
                        <tr>
                          <td><?=$program->sort?></td>
                          <td><?=$program->title?></td>
                          <td><?=$program->certificate->name?></td>
                          <td><?=strip_tags($program->tution_fee)?></td>
                          <td><?=$program->code?></td>
                          <td>
                            <a class="btn btn-primary restore_item" type="button" href="<?=URL::site('admin/programs/restore').'/'.$program->id?>">Restore</a> | <a class="btn btn-danger delete_permenant" href="<?=URL::site('admin/programs/permenantDelete').'/'.$program->id?>" type="button" data-toggle="modal">Permenant Delete</a>
                          </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Certificate</th>
                        <th>Tution Fee</th>
                        <th>Code</th>
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
                    <h4 class="modal-title">Permenant Delete Program Confrimation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to permenantly delete the Program?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a type="button" id="confirm-delete" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->

<div  class="example-modal">
            <div id="restore" class="modal fade in modal-info" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Restore Program Confrimation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to restore the Program?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a type="button" id="confirm-restore" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Member Type Administration
            <small>Use this section to manage deleted members type.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li ><a href="<?=url::site('admin/members')?>"> Members</a></li>
            <li><a href="<?=url::site('admin/types')?>"> Types</a></li>
            <li class="active">Deleted Types</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Deleted Type Management</h3> <!--<a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/users/add')?>">Add</a> --> <?php if ($count == 0) :?>
              <span class="text-info">No Deleted Type to display</span>
              <?php endif;?>
                  <div class="messages" style="">
                   
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <!--<th>Email</th>-->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($types as $key => $type) : ?>
                      <tr>
                        <td><?=@$type->id?></td>
                        <td><?=@$type->name?></td>
                        <td>
                          <?=@Text::limit_words(strip_tags($type->description), 10)?>
                        </td>
                        <td>
                          <a class="btn btn-primary restore_item" type="button" href="<?=URL::site('admin/types/restore').'/'.$type->id?>">Restore</a> | <a class="btn btn-danger del_permenant" href="<?=URL::site('admin/types/permenantDelete').'/'.$type->id?>" data-id="<?=$type->id?>" type="button" data-toggle="modal">Permenant Delete</a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <!--<th>Email</th>-->
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
</section><!-- /.content -->

<!-- Delete Modal -->
 <div  class="example-modal">
            <div id="delete" class="modal fade in modal-danger" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Type Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete this member type permenantly? </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <button type="button" id="confirm" class="btn btn-outline">Yes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->

<!-- Restore Modal -->
 <div  class="example-modal">
            <div id="restore" class="modal fade in modal-info" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Type Restore Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to restore this member type? </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <button type="button" id="confirm-restore" class="btn btn-outline">Yes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
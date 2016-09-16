<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administration Users
            <small>Use these users section to manage your admin users.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Users</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Users Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/users/add')?>">Add</a> <?php if ($count == 0) :?>
              <span class="text-info">No Users to display</span>
            <?php endif;?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($users as $key => $u) : ?>
                      <tr>
                        <td><?=$u->username?></td>
                        <td><?=Date('D-M',$u->last_login)?></td>
                        <td><span class="label <?=$u->status == 1 ? 'label-success' : 'label-warning';?>"><?php if ($u->status == 1) {
                          echo "Active";
                        } else{echo "Deactivated";} ?></span></td>
                        <td><?=$u->email?></td>
                        <td>
                          <a class="btn <?=($u->status == 1) ? 'btn-warning' : 'btn-success' ;?>" type="button" href="<?=($u->status == 1) ? URL::site('admin/users/deactivate').'/'.$u->id : URL::site('admin/users/activate').'/'.$u->id ;?>"><?=($u->status == 1) ? 'Deactivate' : 'Activate' ;?></a>
                          <a class="btn btn-primary" type="button" href="<?=URL::site('admin/users/edit').'/'.$u->id.'/'.URL::title($u->username,'_')?>">Edit</a> | <a class="btn btn-danger del_user" data-id="<?=$u->id?>" type="button" data-toggle="modal">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
           <div  class="example-modal">
            <div id="delete" class="modal fade in modal-danger" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">User Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the user account? </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <button type="button" id="confirm" class="btn btn-outline">Yes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
</section><!-- /.content -->
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Member Administration
            <small>Use this section to manage your members.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Members</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Member Management</h3> <!--<a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/users/add')?>">Add</a> --> <?php if ($count == 0) :?>
              <span class="text-danger">No Members to display</span>
            <?php endif;?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cell</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($members as $key => $member) : ?>
                      <tr>
                        <td><?=$member->id?></td>
                        <td><?=$member->full_name?></td>
                        <td>
                          <?=$member->cell->find()->name?>
                        </td>
                        <td><?=$member->status?></td>
                        <td><?=$member->member_role->getRole($member->cell_id, $member->id)?></td>
                        <td>
                          <a class="btn btn-success" type="button" href="<?=URL::site('admin/members/profile').'/'.$member->id.'/'.URL::title($member->full_name,'_')?>">View Profile</a>
                          <a class="btn btn-primary" type="button" href="<?=URL::site('admin/members/edit').'/'.$member->id.'/'.URL::title($member->full_name,'_')?>">Edit</a> | <a class="btn btn-danger del_member" data-id="<?=$member->id?>" type="button" data-toggle="modal">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cell</th>
                        <th>Status</th>
                        <th>Role</th>
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
                    <h4 class="modal-title">Member Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the Member? </p>
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
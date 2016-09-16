<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administration Clients
            <small>Use these client section to manage your website client.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Clients</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Clients Management</h3> <?php if ($count == 0) :?>
              <span class="text-danger">No Clients to display</span>
            <?php endif;?>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Content</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      foreach ($clients as $key => $c) : ?>
                    <tr>
                      <td><?=$c->title?></td>
                      <td><?=Date('D-M',$c->date_added)?></td>
                      <td><span class="label <?=$s->status == 1 ? 'label-success' : 'label-warning';?>"><?php if ($c->status == 1) {
                        echo "Active";
                      } else{echo "Deactivated";} ?></span></td>
                      <td><?=Text::limit_words($c->content,10)?></td>
                      <td>
                        <a class="btn btn-primary" type="button" href="<?=URL::site('admin/clients/edit').'/'.$c->id.'/'.URL::title($c->title,'_')?>">Edit</a> | <a class="btn btn-danger" id="del" type="button" href="javascript:delete_confirm(<?=$c->id?>,'<?=$c->title?>')" data-toggle="modal" data-target="javascript:delete_confirm(<?=$c->id?>,'<?=$c->title?>')">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach;?>
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
                    <h4 class="modal-title">Service Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the service  "<script type="text/javascript">name</script>" ? &hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
</section><!-- /.content -->
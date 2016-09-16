<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Pages
            <small>Use the page section to manage your website pages.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Pages</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <h3 class="box-title">Page Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/pages/add')?>">Add</a> <?php if ($count == 0) :?>
              <span class="text-danger">No Pages to display</span>
            <?php endif; ?> 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Content</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($pages as $key => $p) : ?>
                    <tr>
                      <td><?=$p->title?></td>
                      <td><?=Date('D-M',$p->date_added)?></td>
                      <td><?=Text::limit_words($p->content,10)?></td>
                      <td>
                        <a class="btn btn-primary" type="button" href="<?=URL::site('admin/pages/edit').'/'.$p->id.'/'.URL::title($p->title,'_')?>">Edit En</a> | <a class="btn btn-success" type="button" href="<?=URL::site('admin/pages/fr_edit').'/'.$p->id.'/'.URL::title($p->title,'_')?>">Edit Fr</a> | <a class="btn btn-info" type="button" href="<?=URL::site('admin/pages/es_edit').'/'.$p->id.'/'.URL::title($p->title,'_')?>">Edit Es</a> | <a class="btn btn-danger del_page" data-id="<?=$p->id?>" type="button" href="" data-toggle="modal">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Title</th>
                        <th>Date</th>
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
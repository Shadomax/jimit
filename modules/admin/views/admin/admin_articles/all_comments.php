<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Comments
            <small>Use this section to manage article comments.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/articles')?>"> Articles</a></li>
            <li class="active">All Comments</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Article Comment Management</h3> <?php if ($count == 0) :?>
              <span class="text-danger">No comments to display</span>
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
                        <th>Article</th>
                        <th>Posted By</th>
                        <th>Date/time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <tbody>
                        <?php
                          foreach ($comments as $comment) : ?>
                        <tr>
                          <td><?=$comment->id?></td>
                          <td><?=$comment->article->title?></td>
                          <td><?=$comment->name?></td>
                          <td><?=date("Y-M-D", $comment->datetime)?></td>
                          <td>
                            <a class="btn btn-success" type="button" href="<?=URL::site('admin/articles/comments').'/'.$comment->id.'/'.URL::title($comment->name,'_')?>">View Comment</a> | <a class="btn btn-danger delete_item" href="<?=URL::site('admin/articles/deleteComment').'/'.$comment->id?>" type="button" data-toggle="modal">Delete</a>
                          </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Article</th>
                        <th>Posted By</th>
                        <th>Date/time</th>
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
                    <h4 class="modal-title">Comment Delete Confrimation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the Comment?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a type="button" id="confirm-delete" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
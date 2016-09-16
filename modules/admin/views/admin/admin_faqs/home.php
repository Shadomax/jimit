<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin FAQ
            <small>Use these section to manage your website <abbr title="Frequently Asked Questions">FAQ</abbr>.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">FAQ</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">FAQ Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/faqs/add')?>">Add</a> <?php if ($count == 0) :?>
              <span class="text-danger">No FAQ to display</span>
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
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      foreach ($faqs as $key => $q) : ?>
                    <tr>
                      <td><?=Text::limit_words($q->question, 10)?></td>
                      <td><?=Text::limit_words($q->answer, 10)?></td>
                      <td><?=Date('D-M',$q->date_added)?></td>
                      <td>
                       <a class="btn btn-primary" type="button" href="<?=URL::site('admin/faqs/edit').'/'.$q->id.'/'.URL::title(HTML::chars($q->question),'_')?>">Edit</a> | <a class="btn btn-danger del_faqs" data-id="<?=$q->id?>" type="button" data-toggle="modal">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach;?>
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
                    <h4 class="modal-title">FAQ Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the faq?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="" type="button" id="confirm" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
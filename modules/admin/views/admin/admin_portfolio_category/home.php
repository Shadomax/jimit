<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Portfolio Categories
            <small>Use these portfolio categories section to manage your portfolio category.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Portfolio Category</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Portfolio Category Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/portfolio/category_add')?>">Add</a> <?php if ($count == 0) :?>
              <span class="text-danger">No Portfolio Category to display</span>
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
                      <th>Content</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      foreach ($portfolio_category as $key => $pc) : ?>
                    <tr>
                      <td><?=HTML::chars($pc->title)?></td>
                      <td><?=Date('D-M',$pc->date_added)?></td>
                      <td><?=Text::limit_words(Html::chars($pc->content),10)?></td>
                      <td>
                        <a class="btn btn-primary" type="button" href="<?=URL::site('admin/portfolio/category_edit').'/'.$pc->id.'/'.URL::title(Html::chars($pc->title),'_')?>">Edit</a> | <a class="btn btn-danger del_portfolio_category" data-id="<?=$pc->id?>" type="button" data-toggle="modal">Delete</a>
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
                    <h4 class="modal-title">Portfolio Category Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the Portfolio Category?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="" type="button" id="confirm" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
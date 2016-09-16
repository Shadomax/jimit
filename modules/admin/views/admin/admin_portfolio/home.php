<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Portfolio
            <small>Use these portfolio section to manage your portfolio.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Portfolio</li>
          </ol>
        </section>

<!-- Your Page Content Here -->
<section class="content">
	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Portfolio Management</h3> <a class="btn btn-primary btn-xs" type="button" href="<?=URL::site('admin/portfolio/add')?>">Add</a> <?php if ($count == 0) :?>
              <span class="text-danger">No Portfolio to display</span>
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
                      <th>Category</th>
                      <th>Date</th>
                      <th>Content</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      foreach ($portfolio as $key => $p) : ?>
                    <tr>
                      <td><?=HTML::chars($p->title)?></td>
                      <td>
                        <?php 
                          $pcat = ORM::factory('portfoliocategory')->where('id', '=', $p->portfolio_category_ID)->find();
                          echo $pcat->title;
                        ?>
                      </td>
                      <td><?=Date('D-M',$p->date_added)?></td>
                      <td><?=Text::limit_words(Html::chars($p->content),10)?></td>
                      <td>
                        <a class="btn btn-primary" type="button" href="<?=URL::site('admin/portfolio/edit').'/'.$p->id.'/'.URL::title(Html::chars($p->title),'_')?>">Edit</a> | <a class="btn btn-danger del_portfolio_category" data-id="<?=$p->id?>" type="button" data-toggle="modal">Delete</a>
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
                    <h4 class="modal-title">Portfolio Delete Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the Portfolio?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="" type="button" id="confirm" class="btn btn-outline">Yes</a>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
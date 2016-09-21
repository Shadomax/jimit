<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Edit English Article 
            <small>Use this section to edit article for english display.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?=url::site('admin/articles')?>">Articles</a></li>
            <li class="active">Edit Article</li>
          </ol>
    </section>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Article Edit Form</h3>
                </div><!-- /.box-header -->
                <?php if (!empty($message)) :?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?=$message?>
                  </div>
                <?php endif;?>
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <center><p class="help-block">Edit the form below for english display. Fields with <span class="text-danger">*</span> are required.</p></center>
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-warning fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning! </strong>Some errors were encountered, please check the details you entered.
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                      <label for="category" class="col-sm-2 control-label">Category <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="category">
                          <option value="">Select article category</option>
                        <?php foreach ($category as $val) : ?>
                          <option value="<?=@$val->id?>" <?=($val->id == $article->category_id) ? 'selected' : ''?>><?=@$val->name?></option>
                        <?php endforeach; ?>
                        </select>
                        <label for="category" class="text-warning"><?=Arr::get($errors, 'category')?></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-sm-2 control-label">Title <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$article->title?>" id="title" name="title" placeholder="Article Title" >
                        <label for="title" class="text-warning"><?=Arr::get($errors, 'title')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="post_by" class="col-sm-2 control-label">Posted By</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=$article->posted_by?>" id="post_by" name="post_by" placeholder="Article Posted By" >
                        <label for="post_by" class="text-warning"><?=Arr::get($errors, 'post_by')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="content" class="col-sm-2 control-label">Content <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <div class="box">
                        <div class="box-header">
                          <div class="pull-right box-tools">
                            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body pad">
                            <textarea class="wysiwygtextarea" name="content" placeholder="Place article here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$article->content?></textarea>
                        </div> 
                      </div>
                        <label for="content" class="text-warning"><?=Arr::get($errors, 'content')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="file" class="col-sm-2 control-label">Photo <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <img src="<?=$article->getPicture()?>" class="img-thumbnail" alt="<?=$article->title?>" style="width:100px; height:50px">
                        <p class="help-block">Change:</p>
                        <input type="file" class="form-control" id="file" name="file">
                        <label for="file" class="text-warning"><?=Arr::get($errors, 'file')?></label>
                      </div>
                    </div><!-- /.form-group --> 
                    <div class="form-group">
                      <label for="seo_title" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Title</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="seo_title" name="seo_title" value="<?=$article->seo_title?>">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="seo_description" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Description</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="seo_description" name="seo_description" value="<?=$article->seo_description?>">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="seo_keywords" class="col-sm-2 control-label"><abbr title="Search Engine Optimization">SEO</abbr> Keywords</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="seo_keywords" name="seo_keywords" value="<?=$article->seo_keywords?>">
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="sort" class="col-sm-2 control-label">Sort <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input class="form-control" type="number" id="sort" name="sort" value="<?=$article->sort?>">
                        <label for="sort" class="text-warning"><?=Arr::get($errors, 'sort')?></label>
                      </div>
                    </div><!-- /.form-group -->

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?=URL::site('admin/articles')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
    </div>
  </div>
</section>
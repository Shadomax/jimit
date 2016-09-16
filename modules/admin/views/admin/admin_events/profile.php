        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?=$cell->name?> Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?=url::site('admin/cells')?>">Cells</a></li>
            <li class="active"><?=$cell->name?> profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?=$cell->leaders->photos->getGravatar()?>" alt="Leader profile picture">
                  <h3 class="profile-username text-center"><?=$cell->name?></h3>
                  <p class="text-muted text-center"><?=$leader->member->full_name?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Members</b> <a class="pull-right"><?=$count?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Partners</b> <a class="pull-right"><?=$partner_count?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Attendance</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Generate Report</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Cell</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Type</strong>
                  <p class="text-muted">
                    <?=$cell->type?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted"><?=$cell->venue?></p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Category</strong>
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Cell Leader's Status</strong>
                  <p><?=@Text::limit_words(strip_tags($leader->member->bio), 10)?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                  <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li><a href="#partners" data-toggle="tab">Partners</a></li>
                  <li><a href="#goals" data-toggle="tab">Goals</a></li>
                  <li><a href="#challenges" data-toggle="tab">Challenges</a></li>
                  <li><a href="#attendance" data-toggle="tab">Attendance</a></li>
                  <li><a href="#offerings" data-toggle="tab">Offering</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Reports -->
                    <?php
                      foreach ($reports as $key => $report) :?>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class='username'>
                          <a href="#"><?=@$report->submited_By?></a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                        <span class='description'><?=Date::fuzzy_span($report->date_submitted)?></span>
                      </div><!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <ul class="list-inline">
                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Review</a></li>
                        <li>
                          <?=($report->liker == 'no') ? '<a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>' : '<a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Liked</a>' ;?>
                        </li>
                        <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
                      </ul>

                      <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div><!-- /.post -->
                  <?php endforeach;?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <div class="box box-solid">
                            <div class="box-header with-border">
                              <h3 class="box-title">Cell Monthly Timeline</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              <p><code>ROR</code></p>
                              <div class="progress active">
                                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                  <span class="sr-only">40% Complete (success)</span>
                                </div>
                              </div>
                              <p><code>ICM</code></p>
                              <div class="progress active">
                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                  <span class="sr-only">20% Complete</span>
                                </div>
                              </div>
                              <p><code>IMM</code></p>
                              <div class="progress active">
                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                              <p><code>LoveWorld Sat</code></p>
                              <div class="progress active">
                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                    </ul>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="partners">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Cell Partners</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Arm(s)</th>
                              <th>Total Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Trident</td>
                              <td>Internet
                                Explorer 4.0</td>
                              <td>Win 95+</td>
                              <td> 4</td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Arm(s)</th>
                              <th>Total Amount</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="goals">
                    <!-- TO DO List -->
                    <div class="box box-primary">
                      <div class="box-header">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">To Do List</h3>
                        <div class="box-tools pull-right">
                          <ul class="pagination pagination-sm inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                          </ul>
                        </div>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <ul class="todo-list">
                          <li>
                            <!-- drag handle -->
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Design a nice theme</span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                        </ul>
                      </div><!-- /.box-body -->
                      <div class="box-footer clearfix no-border">
                        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                      </div>
                    </div><!-- /.box -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="challenges">
                    <!-- TO DO List -->
                    <div class="box box-primary">
                      <div class="box-header">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">Challenges</h3>
                        <div class="box-tools pull-right">
                          <ul class="pagination pagination-sm inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                          </ul>
                        </div>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <ul class="todo-list">
                          <li>
                            <!-- drag handle -->
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Design a nice theme</span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                              <i class="fa fa-edit"></i>
                              <i class="fa fa-trash-o"></i>
                            </div>
                          </li>
                        </ul>
                      </div><!-- /.box-body -->
                      <div class="box-footer clearfix no-border">
                        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                      </div>
                    </div><!-- /.box -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="attendence">
                    
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="offerrings">
                    
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Member Administration
    <small>Use this section to add your members.</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=url::site('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Admin</a></li>
      <li><a href="<?=url::site('admin/members')?>"> Members</a></li>
      <li class="active">Add Member</li>
  </ol>
</section>
<section class="content member-form">
	<div class="row">
		<div class="col-lg-12">
			<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Member Add Form</h3>
                </div><!-- /.box-header -->
                <div class="messages" style="">
                 
                </div>
                <!-- form start -->
                <form class="form-horizontal" action="<?=URL::site('admin/members/add')?>" id="form-member" data-name="add-form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="cell_id" class="col-sm-2 control-label">Cell <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="cell_id">
                          <option value="">Select the cell to which the Member belong</option>
                        <?php foreach ($types as $key => $val) : ?>
                          <option value="<?=@$val->id?>"><?=@$val->name?></option>
                        <?php endforeach; ?>
                        </select>
                        <label for="cell_id" class="text-warning"><?=Arr::get($errors, 'cell_id')?></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="first_name" class="col-sm-2 control-label">First Name <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="first_name" name="first_name" placeholder="Enter First Name" >
                        <label for="first_name" class="text-warning"><?=Arr::get($errors, 'first_name')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="middle_name" class="col-sm-2 control-label">Middle Name <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="middle_name" name="middle_name" placeholder="Enter Middle Name" >
                        <label for="middle_name" class="text-warning"><?=Arr::get($errors, 'middle_name')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="last_name" class="col-sm-2 control-label">Last Name </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'last_name')?>" id="last_name" name="last_name" placeholder="Enter Last Name">
                       <label for="last_name" class="text-warning"><?=Arr::get($errors, 'last_name')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'email')?>" id="email" name="email" placeholder="Enter Email">
                        <label for="email" class="text-warning"><?=Arr::get($errors, 'email')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="dob" class="col-sm-2 control-label">DOB</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" value="<?=Arr::get($values, 'dob')?>" id="dob" name="dob" placeholder="Enter Date of Birth">
                        <label for="dob" class="text-warning"><?=Arr::get($errors, 'dob')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="gender" class="col-sm-2 control-label">Gender <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender">
                          <option value="">Select a Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="others">Others</option>
                        </select>
                        <label for="gender" class="text-warning"><?=Arr::get($errors, 'gender')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                    	<label for="bio" class="col-sm-2 control-label">Bio</label>
                    	<div class="col-sm-10">
                    		<div class="box">
  			                <div class="box-header">
  			                  <div class="pull-right box-tools">
  			                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
  			                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
  			                  </div>
  			                </div>
  			                <div class="box-body pad">
  			                    <textarea class="wysiwygtextarea" name="bio" placeholder="Place member biography here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
  			                </div> 
  			              </div>
                        <label for="bio" class="text-warning"><?=Arr::get($errors, 'bio')?></label>
                    	</div>
                    </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  	<a href="<?=URL::site('admin/members')?>" class="btn btn-default" role="button">Cancel</a>
                    <button type="submit" id="add-member" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>

                <!-- Start contact Form -->
                <form class="form-horizontal" style="display:none" action="" id="form-member-contact" data-name="add-contact-form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="postal_code" class="col-sm-2 control-label">Country Code <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="postal_code">
                          <option value="">Select a country code</option>
                          <?php
                            foreach ($country as $key => $code) : ?>
                          <option value="<?=$code->telephone_code?>"><?=$code->common_name." (".$code->telephone_code." )"?></option>
                           <?php endforeach;?>
                        </select>
                        <label for="postal_code" class="text-warning"><?=Arr::get($errors, 'postal_code')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="home_phone" class="col-sm-2 control-label">Home Phone </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="home_phone" name="home_phone" placeholder="Enter Home Phone Number" >
                        <label for="home_phone" class="text-warning"><?=Arr::get($errors, 'home_phone')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="work_phone" class="col-sm-2 control-label">Work Phone </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="work_phone" name="work_phone" placeholder="Enter Work Phone Number" >
                        <label for="work_phone" class="text-warning"><?=Arr::get($errors, 'work_phone')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="cell_phone" class="col-sm-2 control-label">Cell Phone <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?=Arr::get($values, 'cell_phone')?>" id="cell_phone" name="cell_phone" placeholder="Enter Cell Phone Number (Mobile Number)" required>
                       <label for="cell_phone" class="text-warning"><?=Arr::get($errors, 'cell_phone')?></label>
                      </div>
                    </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!--<a href="<?=URL::site('admin/members')?>" class="btn btn-default" role="button">Cancel</a>-->
                    <button type="submit" id="add-contact" class="btn btn-info pull-right">Next</button>
                  </div><!-- /.box-footer -->
                </form>

                <!-- Start address Form -->
                <form class="form-horizontal" style="display:none" action="" id="form-member-address" data-name="add-address-form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="country" class="col-sm-2 control-label">Country <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="country">
                          <option value="">Select Country of Residence</option>
                          <?php
                            foreach ($country as $key => $code) : ?>
                          <option value="<?=$code->country_code_2?>"><?=$code->common_name?></option>
                           <?php endforeach;?>
                        </select>
                        <label for="country" class="text-warning"><?=Arr::get($errors, 'country')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="region" class="col-sm-2 control-label">Region </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="region" name="region" placeholder="Enter Region (e.g South West)" >
                        <label for="region" class="text-warning"><?=Arr::get($errors, 'region')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="city" class="col-sm-2 control-label">City </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="city" name="city" placeholder="Enter City (e.g Buea)" >
                        <label for="city" class="text-warning"><?=Arr::get($errors, 'city')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="address1" class="col-sm-2 control-label">Address 1 <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="address1" name="address1" placeholder="Enter Address 1 (e.g Malingo)" required>
                       <label for="address1" class="text-warning"><?=Arr::get($errors, 'address1')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="address2" class="col-sm-2 control-label">Address 2 </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="address2" name="address2" placeholder="Enter Address 1 (e.g Holy South)">
                       <label for="address2" class="text-warning"><?=Arr::get($errors, 'address2')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="nationality" class="col-sm-2 control-label">Nationality <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                       <select class="form-control" name="nationality">
                          <option value="">Select Country of Nationality</option>
                          <?php
                            foreach ($country as $key => $code) : ?>
                          <option value="<?=$code->country_code_2?>"><?=$code->common_name?></option>
                           <?php endforeach;?>
                        </select>
                       <label for="nationality" class="text-warning"><?=Arr::get($errors, 'nationality')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="home_town" class="col-sm-2 control-label">Home Town </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="home_town" name="home_town" placeholder="Enter Home Town (e.g Mamfe)">
                       <label for="home_town" class="text-warning"><?=Arr::get($errors, 'home_town')?></label>
                      </div>
                    </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!--<a href="<?=URL::site('admin/members')?>" class="btn btn-default" role="button">Cancel</a>-->
                    <button type="submit" id="add-address" class="btn btn-info pull-right">Next</button>
                  </div><!-- /.box-footer -->
                </form>

                <!-- Start baptism Form -->
                <form class="form-horizontal" style="display:none" action="" id="form-member-baptism" data-name="add-baptism-form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="baptism" class="col-sm-2 control-label">Baptized <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="baptism">
                          <option value="">Select Baptismal Status</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                          <option value="ongoing">On Going</option>
                        </select>
                        <label for="baptism" class="text-warning"><?=Arr::get($errors, 'baptism')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="teacher" class="col-sm-2 control-label">Teacher </label>
                      <div class="col-sm-10">
                        <select class="form-control" name="teacher">
                          <option value="">Select Baptism Teacher</option>
                          <?php foreach ($teachers as $key => $teacher) :?>
                          <option value="<?=$teacher->member_id?>"><?=$teacher->member->full_name?></option>
                          <?php endforeach; ?>
                        </select>
                        <label for="teacher" class="text-warning"><?=Arr::get($errors, 'teacher')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="date" class="col-sm-2 control-label">Date Baptized </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="date" name="date" placeholder="Enter Date Baptized (e.g 02/04/2013)" >
                        <label for="date" class="text-warning"><?=Arr::get($errors, 'date')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="handled_by" class="col-sm-2 control-label">Handled By <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="handled_by" name="handled_by" placeholder="Baptized By (e.g Pastor Sally)" required>
                       <label for="handled_by" class="text-warning"><?=Arr::get($errors, 'handled_by')?></label>
                      </div>
                    </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!--<a href="<?=URL::site('admin/members')?>" class="btn btn-default" role="button">Cancel</a>-->
                    <button type="submit" id="add-baptism" class="btn btn-info pull-right">Next</button>
                  </div><!-- /.box-footer -->
                </form>

                <!-- Start foundation school Form -->
                <form class="form-horizontal" style="display:none" action="" id="form-member-foundation" data-name="add-foundation-form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="foundation" class="col-sm-2 control-label"><<abbr title="Foundation School">FS</abbr> <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="foundation">
                          <option value="">Select Foundation School Status</option>
                          <option value="finished">Finished</option>
                          <option value="graduated">Graduated</option>
                          <option value="ongoing">On Going</option>
                          <option value="nostarted">Not Started</option>
                        </select>
                        <label for="foundation" class="text-warning"><?=Arr::get($errors, 'foundation')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="teacher" class="col-sm-2 control-label">Teacher </label>
                      <div class="col-sm-10">
                        <select class="form-control" name="teacher">
                          <option value="">Select Foundation School Teacher</option>
                          <?php foreach ($teachers as $key => $teacher) :?>
                          <option value="<?=$teacher->member_id?>"><?=$teacher->member->full_name?></option>
                          <?php endforeach; ?>
                        </select>
                        <label for="teacher" class="text-warning"><?=Arr::get($errors, 'teacher')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="date_start" class="col-sm-2 control-label">Date Begin </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="date_start" name="date_start" placeholder="Enter Date Start (e.g 02/04/2013)" >
                        <label for="date_start" class="text-warning"><?=Arr::get($errors, 'date_start')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="date_end" class="col-sm-2 control-label">Date Finished </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="date_end" name="date_end" placeholder="Enter Date Finished (e.g 02/04/2013)" >
                        <label for="date_end" class="text-warning"><?=Arr::get($errors, 'date_end')?></label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="remark" class="col-sm-2 control-label">Remark <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <select class="form-control" name="remark">
                          <option value="other">Select Student Foundation School Remark</option>
                          <option value="excellent">Excellent</option>
                          <option value="verygood">Very Good</option>
                          <option value="good">Good</option>
                          <option value="fair">Fair</option>
                          <option value="poor">Poor</option>
                        </select>
                       <label for="remark" class="text-warning"><?=Arr::get($errors, 'remark')?></label>
                      </div>
                    </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!--<a href="<?=URL::site('admin/members')?>" class="btn btn-default" role="button">Cancel</a>-->
                    <button type="submit" id="add-foundation" class="btn btn-info pull-right">Next</button>
                  </div><!-- /.box-footer -->
                </form>

                <!-- Start Photo Form -->
                <form class="form-horizontal" style="display:none" action="" id="form-member-photo" data-name="add-photo-form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="photo" class="col-sm-2 control-label">Photo </label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" value="" id="photo" name="photo">
                        <label for="photo" class="text-warning"><?=Arr::get($errors, 'photo')?></label>
                      </div>
                    </div><!-- /.form-group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!--<a href="<?=URL::site('admin/members')?>" class="btn btn-default" role="button">Cancel</a>-->
                    <button type="submit" id="add-photo" class="btn btn-info pull-right">Complete Process</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
		</div>
	</div>
</section>
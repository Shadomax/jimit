<?php 
  $nude = Request::current()->controller();
  $action = Request::current()->action();
  if ($nude == 'Dashboard') {
    $dashboard = 'true';
  }
  if ($nude == 'Program') {
    $programs = 'true';
  }
  if ($nude == 'Type') {
    $member = 'true';
  }
  if ($nude == 'Event') {
    $event = 'true';
  }
  if ($nude == 'Page') {
    $pages = 'true';
  }
  if ($nude == 'Gallery') {
    $gallery = 'true';
  }
  if ($nude == 'Partner') {
    $partners = 'true';
  }
  if ($nude == 'Services') {
    $services = 'true';
  }
  if ($nude == 'Slider') {
    $sliders = 'true';
  }
  if ($nude == 'User') {
    $users = 'true';
  }
  if ($nude == 'Category') {
    $articles = 'true';
  }
  if ($nude == 'Article') {
    $articles = 'true';
  }
  if ($nude == 'Certificate') {
    $programs = 'true';
  }
  if ($nude == 'Team') {
    $teams = 'true';
  }
?>
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=URL::site('admin/user/profile')?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=URL::site('admin/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?=(isset($dashboard)) ? 'active' : '' ;?>">
          <a href="<?=URL::site('admin/dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i><span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=(isset($user)) ? 'active' : '' ;?>"><a href="<?=URL::site('admin/users')?>"><i class="fa fa-circle-o"></i> List Users</a></li>
            <li><a href="<?=URL::site('admin/users/add')?>"><i class="fa fa-circle-o"></i> Add User</a></li>
            <li><a href="<?=URL::site('admin/users/viewDeleted')?>"><i class="fa fa-circle-o"></i> View Deleted</a></li>
          </ul>
        </li>
        <li class="treeview <?=(isset($sliders)) ? 'active' : '' ;?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/sliders')?>"><i class="fa fa-circle-o"></i> List Sliders</a></li>
            <li><a href="<?=URL::site('admin/sliders/add')?>"><i class="fa fa-circle-o"></i> Add Slider</a></li>
            <li><a href="<?=URL::site('admin/sliders/viewDeleted')?>"><i class="fa fa-circle-o"></i> View Deleted</a></li>
          </ul>
        </li>
        <li class="treeview <?=(isset($programs)) ? 'active' : '' ;?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Programs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/certificates')?>"><i class="fa fa-circle-o"></i> List Certificates</a></li>
            <li><a href="<?=URL::site('admin/certificates/add')?>"><i class="fa fa-circle-o"></i> Add Certificate</a></li>
            <li><a href="<?=URL::site('admin/certificates/viewDeleted')?>"><i class="fa fa-circle-o"></i> Deleted Certificates</a></li>
            <li><a href="<?=URL::site('admin/programs')?>"><i class="fa fa-circle-o"></i> List Programs</a></li>
            <li><a href="<?=URL::site('admin/programs/add')?>"><i class="fa fa-circle-o"></i> Add Program</a></li>
            <li><a href="<?=URL::site('admin/programs/viewDeleted')?>"><i class="fa fa-circle-o"></i> Deleted Programs</a></li>
          </ul>
        </li>
        <li class="treeview <?=(isset($articles)) ? 'active' : ''?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> 
            <li><a href="<?=URL::site('admin/category')?>"><i class="fa fa-circle-o"></i> List Category</a></li>
            <li><a href="<?=URL::site('admin/category/add')?>"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="<?=URL::site('admin/category/viewDeleted')?>"><i class="fa fa-circle-o"></i> Deleted Category</a></li>
            <li class="<?=(isset($member_list)) ? 'active' : '' ;?>"><a href="<?=URL::site('admin/articles')?>"><i class="fa fa-circle-o"></i> List Articles</a></li>
            <li class="<?=(isset($member_add)) ? 'active' : ''?>"><a href="<?=URL::site('admin/articles/add')?>"><i class="fa fa-circle-o"></i> Add Article </a>
            </li>
            <li><a href="<?=URL::site('admin/articles/viewDeleted')?>"><i class="fa fa-circle-o"></i> Deleted Articles</a></li>
          </ul>
        </li>
        <li class="treeview <?=(isset($event)) ? 'active' : '' ;?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/events')?>"><i class="fa fa-circle-o"></i> List Events</a></li>
            <li><a href="<?=URL::site('admin/events/add')?>"><i class="fa fa-circle-o"></i> Add Events</a></li>
            <li><a href="<?=URL::site('admin/events/viewDeleted')?>"><i class="fa fa-circle-o"></i> View Deleted</a></li>
            <li><a href="<?=URL::site('admin/events/all_comments')?>"><i class="fa fa-circle-o"></i> All Comments</a></li>
            <li><a href="<?=URL::site('admin/events/deletedComments')?>"><i class="fa fa-circle-o"></i> Deleted Comments</a></li>
          </ul>
        </li>
        <li class="treeview <?=(isset($gallery)) ? 'active' : '' ;?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/gallery')?>"><i class="fa fa-circle-o"></i> List Gallery</a></li>
            <li><a href="<?=URL::site('admin/gallery/add')?>"><i class="fa fa-circle-o"></i> Add Photo</a></li>
            <li><a href="<?=URL::site('admin/gallery/viewDeleted')?>"><i class="fa fa-circle-o"></i> View Deleted</a></li>
          </ul>
        </li>
        <li class="treeview <?=(isset($pages)) ? 'active' : '' ;?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/pages')?>"><i class="fa fa-circle-o"></i> List Pages</a></li>
            <li><a href="<?=URL::site('admin/pages/add')?>"><i class="fa fa-circle-o"></i> Add Page</a></li>
            <li><a href="<?=URL::site('admin/pages/viewDeleted')?>"><i class="fa fa-circle-o"></i> View Deleted</a></li>
          </ul>
        </li>
        <li class="treeview <?=(isset($partners)) ? 'active' : '' ;?>">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Partners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/partners')?>"><i class="fa fa-circle-o"></i> List Partners</a></li>
            <li><a href="<?=URL::site('admin/partners/add')?>"><i class="fa fa-circle-o"></i> Add Partner</a></li>
            <li><a href="<?=URL::site('admin/partners/viewDeleted')?>"><i class="fa fa-circle-o"></i> View Deleted</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Teams</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/teams')?>"><i class="fa fa-circle-o"></i> List Teams</a></li>
            <li><a href="<?=URL::site('admin/teams/add')?>"><i class="fa fa-circle-o"></i> Add Team Member</a></li>
            <li><a href="<?=URL::site('admin/teams/viewDeleted')?>"><i class="fa fa-circle-o"></i> View Deleted</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
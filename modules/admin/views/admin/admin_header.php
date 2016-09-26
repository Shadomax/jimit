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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$user->getAvatar()?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$user->username?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=$user->getAvatar()?>" class="img-circle" alt="User Image">

                <p>
                  <?=$user->username?>
                  <small><?=$user->email?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="<?=URL::site('admin/user/profile')?>" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="<?=URL::site('admin/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
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
          <img src="<?=$user->getAvatar()?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$user->username?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?=(isset($dashboard)) ? 'active' : '' ;?>">
          <a href="<?=URL::site('admin/dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?=(isset($users)) ? 'active' : '' ;?>">
          <a href="#">
            <i class="fa fa-files-o"></i><span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL::site('admin/users')?>"><i class="fa fa-circle-o"></i> List Users</a></li>
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
        <!--<li class="treeview">
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
        </li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
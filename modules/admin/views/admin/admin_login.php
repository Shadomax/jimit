  <body class="hold-transition login-page" style="position: relative;">
    <div class="login-box" style="display:flex;justify-content:center;/*align-items: center;*/flex-flow: column;">
      <div class="login-logo">
        <a href="<?=URL::site()?>"><?=Kohana::$config->load('admin')->app_name?> <b>Admin</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
        if(isset($error)) :?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?=$error?>
            </div>
      <?php endif; 
        if (!empty($message)) :?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?=$message?>
          </div>
      <?php endif; 
        if (!empty($warning)) :?>
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?=$warning?>
          </div>
      <?php endif;?>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= Arr::get($values, 'username'); ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <label for="username" class="error"><?= Arr::get($errors, 'username'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" value="<?= Arr::get($values, 'password'); ?>" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <label for="password" class="error"><?= Arr::get($errors, 'password'); ?>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!--<div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>--><!-- /.social-auth-links -->

        <a href="<?=URL::site('admin/forgot')?>">I forgot my password</a><br>
        <a href="<?=URL::site('admin/register')?>" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <div class="container navbar-fixed-bottom">
      <!-- Main Footer -->
          <footer class="main-foote">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
              Design by <a href="<?=Kohana::$config->load('admin')->address?>" target="_blank"><?=Kohana::$config->load('admin')->designer?></a>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?=Date('Y', time())?> <a href="<?=URL::site()?>"><?=Kohana::$config->load('admin')->app_name?></a>.</strong> All rights reserved.
          </footer><!-- ./main-footer -->
    </div>


   
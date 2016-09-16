
  <body class="hold-transition register-page">
    <div class="register-box" style="display:flex;justify-content:center;/*align-items: center;*/flex-flow: column;">
      <div class="register-logo">
        <a href="<?=URL::site()?>"><?=Kohana::$config->load('admin')->app_name?> <b>Admin</b></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <!-- <?php
          if (!empty($errors)) : ?>
            <div class="alert alert-warning">
              <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
              <strong>Warning! </strong><?php foreach ($errors as $key => $value) : ?>
                <?=var_dump($value)?>
              <?php endforeach; ?>
            </div>
          <?php endif;?> <?=@var_dump($test)?> -->
        <form  method="post" accept-charset="utf-8">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" value="<?=Arr::get($values, 'username'); ?>" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <label for="username" class="error"><?= Arr::get($errors, 'username'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="<?= Arr::get($values, 'email'); ?>" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <label for="username" class="error"><?= Arr::get($errors, 'email'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" value="<?= Arr::get($values, 'password'); ?>" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <label for="password" class="error"><?= Arr::get($errors, 'password'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password_confirm" value="<?= Arr::path($values, 'password_confirm'); ?>" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <label for="password_confirm" class="error"><?= Arr::path($errors, 'password_confirm'); ?>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!--<div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>-->

        <a href="<?=URL::site('admin/login')?>" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
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

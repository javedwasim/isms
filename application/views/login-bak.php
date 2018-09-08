<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login | ISMS</title>
  <?php $this->load->view('parts/header'); ?>
<body class="hold-transition login-page">
  <!-- /.login-logo -->
  <div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>"><b>Integrated School Management System</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url(); ?>dashboard/login" method="post">
        <div class="row">
          <div class="col-md-1">
          <span class="login-env" style="font-size: 20px;position: relative; top: 3px;">
            <i class="fa fa-envelope"></i>
          </span>
          </div>
          <div class="col-md-11">
          <input type="email" class="form-control" placeholder="Email" name="email" />
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-md-1">
            <span class="login-lock" style="font-size: 27px; position: relative;">
              <i class="fa fa-lock"></i>
            </span>
          </div>
          <div class="col-md-11">
          <input type="password" class="form-control" placeholder="Password" name="password" />
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
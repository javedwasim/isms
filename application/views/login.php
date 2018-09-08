<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login | ISMS</title>
  <?php $this->load->view('parts/header'); ?>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/plugins/login/images/01.jpg');">
      <div class="wrap-login100" id="login-form">
        <form action="<?php echo base_url(); ?>dashboard/login" method="post" class="login100-form validate-form" autocomplete="off" >
          <span class="login100-form-logo">
            <img src="<?php echo base_url(); ?>assets/plugins/login/images/company-logo.png" class="img-responsive" alt="Cinque Terre">
          </span>
          <div class="row">
            <div class="col-md-12">
              <?php if($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('error'); ?> </div>
                <?php } ?>
                <?php if($this->session->flashdata('success')) { ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?> </div>
                  <?php } ?>
                </div>
              </div>
          <span class="login100-form-title p-b-34 p-t-27">
            Integrated School Management System
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="email" placeholder="Username" autocomplete="off">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="contact100-form-checkbox">
            <label class="label-checkbox" for="ckb1">
              Remember me
            </label>
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-30">
            <a class="txt1" href="#">
              Forgot Password?
            </a>
          </div>
          <div class="text-center p-t-30">
            <p class="login-text">Design and Developed by
            <a class="txt1" href="https://www.thetechsol.com">
              TechSol
            </a>
            </p> 
          </div>
        </form>
      </div>
    </div>
  </div>
  

    <div id="dropDownSelect1"></div>
<!--=========================login script==========================-->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/login/vendor/animsition/js/animsition.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/login/vendor/animsition/js/animsition.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/login/js/main.js"></script>
</body>
</html>
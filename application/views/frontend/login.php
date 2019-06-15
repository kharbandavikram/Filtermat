<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php echo admin_assets_url(); ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo admin_assets_url(); ?>dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo admin_assets_url(); ?>plugins/iCheck/square/blue.css">
</head>
<style>
span.field_error p {
    color: red;
}
span.field_error{
	color: red;
    position: relative;
    top: 5px;
    font-size: 15px;}
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <!--<div class="login-logo"> <a href="<?php echo admin_url().'index'; ?>"><img src="<?php echo admin_assets_url(); ?>dist/img/logo.png" /></a> </div>-->
  <!-- /.login-logo -->
  <div class="login-box-body-form">
 
	
	<div class="col-md-6 login_pic">
	<img src="http://freesocialtips.com/filtermat/filtermat_assets/assets/images/login_img.jpg" class="login_img">
	</div>
	
	<div class="col-md-6 login_form">
  
  
    <p class="login-box-msg"><img src="http://freesocialtips.com/filtermat/filtermat_assets/assets/images/user-silhouette.png" class="sign_user">SIGN IN
   
    <?php 
				///if($this->session->flashdata('login_error')){
				?>
    <!--<div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <b>Alert!</b><?php echo $this->session->flashdata('login_error');?> </div>-->
    <?php
				//}
				?>
    </p>
    <?php  echo form_open(base_url().'login');?>
    <div class="form-group has-feedback">
	
      <input type="email" class="form-control" placeholder="Email" name="username">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	<span class="field_error"><?php echo form_error('username'); ?></span> 
	  </div>
    <div class="form-group has-feedback">
	
      <input type="password" class="form-control" placeholder="Password" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	<span class="field_error"><?php echo form_error('password'); ?></span> 	
	<?php 
				if($this->session->flashdata('login_error')){
				?>
				<span class="field_error"><?php echo $this->session->flashdata('login_error');?> </span> 	
			<?php
				}
				?>
	  </div>
			
				
      <div class="col-xs-4 form_button">
        <button type="submit" class="btn btn-warning btn-block btn-flat btn-login">Sign In</button>
      </div>
      <!-- /.col --> 
    </div>
    <?php echo form_close();?> 
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 2.1.4 --> 
<script src="<?php echo admin_assets_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script> 
<!-- Bootstrap 3.3.5 --> 
<script src="<?php echo admin_assets_url(); ?>bootstrap/js/bootstrap.min.js"></script> 
<!-- iCheck --> 
<script src="<?php echo admin_assets_url(); ?>plugins/iCheck/icheck.min.js"></script> 
<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
<style>
.login-logo img {
  width: 30%;
}
</style>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>plugins/iCheck/flat/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>plugins/morris/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Date Picker -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>plugins/datepicker/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
<link rel="stylesheet" type="text/css" href="<?php echo admin_assets_url(); ?>plugins/datatables/dataTables.bootstrap.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="<?php echo admin_url().'dashboard'; ?>" class="logo"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><b>S</b>On</span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><b>Filtermat </b></span> </a> 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation"> 
      <!-- Sidebar toggle button--> 
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class=" messages-menu">
                <a href="<?php echo admin_url(); ?>" target="_blank" title="Home">
                  <i class="fa fa-home"></i>
                  
                </a>
                </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo admin_assets_url(); ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> <span class="hidden-xs">Admin</span> </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> <img src="<?php echo admin_assets_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p> Admin </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"> <a href="<?php echo admin_url(); ?>" class="btn btn-default btn-flat">Home</a> </div>
                <div class="pull-right"> <a href="<?php echo admin_url().'logout'; ?>" class="btn btn-default btn-flat">Sign out</a> </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <style >
  .field_error{
	  color:#F00;
  }
  </style>
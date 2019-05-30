
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Change Password </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Change Password </li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
  <div class="row">
    <div class="col-xs-8 ">
      <div class="box box-info"> 
        <!--<div class="box-header with-border">
          <h3 class="box-title"> Change Password </h3>
        </div>--> 
        <!-- /.box-header --> 
        <!-- form start -->
        
        <?php
			if($this->session->flashdata('done_changepassword')){
		?>
        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <b>Alert!</b> <?php echo $this->session->flashdata('done_changepassword');?> </div>
        <?php } ?>
        <?php 
			   $attributes = array('class' => 'form-horizontal','id' => 'defaultForm');
			   echo form_open_multipart(admin_url().'changepassword', $attributes);
			   ?>
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-3 control-label">Current Password :</label>
            <div class="col-sm-9">
              <input type="password" class="form-control"  placeholder="Password" name="current_password" autocomplete="off">
              <span class="field_error"><?php echo form_error('current_password');?><?php echo strip_tags($this->session->flashdata('old_password_error'));?></span> </div>
          </div>
       
        <div class="form-group">
          <label  class="col-sm-3 control-label">New Password :</label>
          <div class="col-sm-9">
            <input type="password" class="form-control"  placeholder="New Password" name="new_password" autocomplete="off">
            <span class="field_error"><?php echo form_error('new_password');?></span> </div>
        </div>
      
      <div class="form-group">
        <label  class="col-sm-3 control-label">Confirm New Password :</label>
        <div class="col-sm-9">
          <input type="password" class="form-control"  placeholder="Confirm New Password" name="confirm_password" autocomplete="off">
          <span class="field_error"><?php echo form_error('confirm_password');?></span> </div>
      </div>
    </div>
  
  <!-- /.box-body -->
  <div class="box-footer">
    <input type="submit" name="Submit" class="btn btn-primary " value="Submit">
    <!-- <button type="submit" name="submit" class="btn btn-info pull-right">Sign in</button>--> 
  </div>
  <!-- /.box-footer --> 
  
  <!-- /.box-footer --> 
  <?php echo form_close();?> </div>

<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<?php $this->load->view('admin/includes/footer');?>

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 

<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        fields: {
            current_password: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Current Password.'
                    }
                }
            },
           new_password: {
                validators: {
                    notEmpty: {
						 message: 'Please Enter New Password.'
						},
                    different: {
                        field: 'current_password',
                        message: 'The password cannot be the same as Current Password'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
						 message: 'Please Enter Confirm New Password.'
						},
                    identical: {
                        field: 'new_password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});
</script>
</body></html>
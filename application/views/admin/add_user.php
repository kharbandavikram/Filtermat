<?php
$button = @$this->uri->segment(2) == "editcategory" ? "Update" : "Submit";
$add = @$this->uri->segment(2) == "edit" ? "Edit" : "Add";

?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> User Management </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="<?php echo admin_url() . 'category'; ?>">User Management</a></li>
            <li class="active"><?php echo $add; ?> User </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-8 ">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $add; ?> User </h3>
                    </div>
                    <!-- /.box-header --> 
                    <!-- form start --> 

                    <?php
                    if ($this->session->flashdata('add_user')) {
                        ?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('add_user'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('edit_user')) {
                        ?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('edit_user'); ?> </div>
                        <?php
                    }
                    ?>
                
                    <?php
					
				
                    $attributes = array('class' => 'form-horizontal', 'id' => 'defaultForm' ,'enctype'=>'multipart/form-data');

                    if ($add == 'Add') {
                        echo form_open_multipart(admin_url() . 'add/user', $attributes);
                    } else if ($add == 'Edit') {
                        echo form_open_multipart(admin_url() . 'edit/user/' . $get_user_data[0]['id'], $attributes);
                    }
                    ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="first_name" placeholder="Enter First Name" value="<?php
                                if (!empty($get_user_data[0]['first_name'])) {
                                    echo $get_user_data[0]['first_name'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('first_name'); ?></span> </div>
                        </div>
                      
					   <div class="form-group">
                            <label class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="last_name" placeholder="Enter Last Name" value="<?php
                                if (!empty($get_user_data[0]['last_name'])) {
                                    echo $get_user_data[0]['last_name'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('last_name'); ?></span> </div>
                        </div>
						 <div class="form-group">
                            <label class="col-sm-3 control-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="company_name" placeholder="Enter Company Name" value="<?php
                                if (!empty($get_user_data[0]['company_name'])) {
                                    echo $get_user_data[0]['company_name'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('companyname'); ?></span> </div>
                        </div>	

						<div class="form-group">
                            <label class="col-sm-3 control-label">Company Address</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="company_address" placeholder="Enter Company Address" value="<?php
                                if (!empty($get_user_data[0]['company_address'])) {
                                    echo $get_user_data[0]['company_address'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('companyname'); ?></span> </div>
                        </div>
						
						
						<div class="form-group">
                            <label class="col-sm-3 control-label">VAT Number</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="vat_number" placeholder="Enter Company Address" value="<?php
                                if (!empty($get_user_data[0]['vat_number'])) {
                                    echo $get_user_data[0]['vat_number'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('companyname'); ?></span> </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label">Email ID</label>
                            <div class="col-sm-9">
								<?php
                                if (!empty($get_user_data[0]['email_id'])) { ?>
									<input type="hidden" name="emailID" value="<?php  echo $get_user_data[0]['email_id']; ?>"/>
                                   
                              <?php  }
                                ?>
                                <input type="text"  class="form-control" name="email_id" placeholder="Enter Email Address" value="<?php
                                if (!empty($get_user_data[0]['email_id'])) {
                                    echo $get_user_data[0]['email_id'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('email_id'); ?></span> 
								
							  <?php
                    if ($this->session->flashdata('logginerrr')) {
                        ?>
						<span class="field_error"><?php echo $this->session->flashdata('logginerrr'); ?></span> 
                        <?php
                    }
                    ?>	
								</div>
                        </div>
						
						
						<div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password"  class="form-control" name="password" placeholder="Enter Password" value="" >
                                <span class="field_error"><?php echo form_error('password'); ?></span> </div>
                        </div>
                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <center>
                            <input type="submit" name="Submit" class="btn btn-primary" value="<?php echo $button; ?>"></center>
                    </div>
                    <!-- /.box-footer --> 
                    <?php echo form_close(); ?> </div>
            </div>

            <!-- /.col --> 
        </div>
        <!-- /.row --> 
    </section>
    <!-- /.content --> 
</div>
<?php $this->load->view('admin/includes/footer'); ?>
<link href="<?php echo admin_assets_url(); ?>dist/css/bootstrap-chosen.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo admin_assets_url(); ?>dist/js/bootstrap-chosen.js"></script>
<script type="text/javascript">
    $(function() {

    $('#tags_id').chosen();
    });</script>

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 

<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 

</body></html>

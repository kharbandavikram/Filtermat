<?php
$button = @$this->uri->segment(2) == "editcategory" ? "Update" : "Submit";
$add = @$this->uri->segment(2) == "editcategory" ? "Edit" : "Add";
?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Category Management </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="<?php echo admin_url() . 'category'; ?>">Category Managmenet</a></li>
            <li class="active"><?php echo $add; ?> Category </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-8 ">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $add; ?> Category </h3>
                    </div>
                    <!-- /.box-header --> 
                    <!-- form start --> 

                    <?php
                    if ($this->session->flashdata('category_add')) {
                        ?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('category_add'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('category_edit')) {
                        ?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('category_edit'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('category_img_error')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('category_img_error'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('category_banner_img_error')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('category_banner_img_error'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('category_logo_img_img_error')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('category_logo_img_img_error'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
					
				
                    $attributes = array('class' => 'form-horizontal', 'id' => 'defaultForm' ,'enctype'=>'multipart/form-data');

                    if ($add == 'Add') {
                        echo form_open_multipart(admin_url() . 'addcategory', $attributes);
                    } else if ($add == 'Edit') {
                        echo form_open_multipart(admin_url() . 'editcategory/' . $category_data[0]['id'], $attributes);
                    }
                    ?>
                    <div class="box-body">
                      
             
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="category" placeholder="Enter Category Name" value="<?php
                                if (!empty($category_data[0]['category'])) {
                                    echo $category_data[0]['category'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('category'); ?></span> </div>
                        </div>
                      
                       


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
                                    <option value=1 <?php
                                    if (@$category_data[0]['status'] == '1') {
                                        echo 'selected="selected"';
                                    }
                                    ?> >Active</option>
                                    <option value=0 <?php
                                    if (@$category_data[0]['status'] == '0') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>Inactive</option>
                                </select>
                                <span class="field_error"><?php echo form_error('status'); ?></span> </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label">Navigation</label>
                            <div class="col-sm-9">
							<div class="radio">
							<label><input type="radio" name="navigation"  value="yes" <?php 
							if(isset($category_data[0]['navigation'])) { if($category_data[0]['navigation']=='yes') { echo"checked";} } ?>>Yes</label>
							</div>
							<div class="radio">
							<label><input type="radio" name="navigation" value="no" <?php if(isset($category_data[0]['navigation'])) {  if($category_data[0]['navigation']=='no') { echo"checked";} }?>>No</label>
							</div>
                                <span class="field_error"><?php echo form_error('navigation'); ?></span> </div>
                        </div>
						
						
						  <div class="form-group data_pdf">
                            <label class="col-sm-3 control-label">Upload Image</label>
                            <div class="col-sm-9">
                                <input type="file"  class="form-control" name="image_name" >
								<input type="hidden"  class="form-control" name="old_img"  value="<?php if(isset($category_data[0]['image'])) { echo $category_data[0]['image'];}?>">
                                <span class="field_error"><?php echo form_error('category'); ?></span> </div>
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

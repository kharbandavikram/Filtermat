<?php
	$button = @$this->uri->segment(2) == "editpage" ? "Update" : "Submit";
	$add = @$this->uri->segment(2) == "editpage" ? "Edit" : "Add";
?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Page Management </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo admin_url().'category'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="<?php echo admin_url() . 'products'; ?>">Page Managmenet</a></li>
            <li class="active"><?php echo $add; ?> Page </li>
		</ol>
	</section>
	
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $add; ?> Page</h3>
					</div>
                    <!-- /.box-header --> 
                    <!-- form start --> 
					
                    <?php
						// debug($product_data);
						if ($this->session->flashdata('product_add')) {
						?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<b>Alert!</b> <?php echo $this->session->flashdata('product_add'); ?> </div>
                        <?php
						}
					?>
                    <?php
						if ($this->session->flashdata('page_edit')) {
						?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<b>Alert!</b> <?php echo $this->session->flashdata('page_edit'); ?> </div>
                        <?php
						}
					?>
                    
                    <?php
						
						
						$attributes = array('class' => 'form-horizontal', 'id' => 'defaultForm','enctype'=>'multipart/form-data');
						
						if ($add == 'Add') {
							echo form_open_multipart(admin_url() . 'addpage', $attributes);
							} else if ($add == 'Edit') {
							echo form_open_multipart(admin_url() . 'editpage/' . $page_data[0]['id'], $attributes);
						}
						
						// debug($page_data);
					?>
                    <div class="box-body">
                        <div class="box-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">Language</label>
								<div class="col-sm-9">
								<input class="form-control" type="text" readonly name="language" id ="language_id" value="<?php if(isset($page_data[0]['language_id'])) {  if($page_data[0]['language_id']=='en') { echo "English";}elseif($page_data[0]['language_id']=='fr'){ echo "French"; }elseif($page_data[0]['language_id']=='de'){ echo "Dutch"; } } ?>"/>
								
								<input type="hidden" name="language_id" value="<?php if(isset($page_data[0]['language_id'])) {  if($page_data[0]['language_id']=='en') { echo "en";}elseif($page_data[0]['language_id']=='fr'){ echo "fr"; }elseif($page_data[0]['language_id']=='de'){ echo "de"; } } ?>">
								
								
								
								
									<!--<select name="language_id" id ="language_id" class="form-control">
										<option value="en" <?php if(isset($page_data[0]['language_id'])) {  if($page_data[0]['language_id']=='en') { echo"selected";} } ?>>English</option>
										<option value="fr" <?php if(isset($page_data[0]['language_id'])) { if($page_data[0]['language_id']=='fr') { echo"selected";} } ?>>French</option>
										<option value="de" <?php  if(isset($page_data[0]['language_id'])) { if($page_data[0]['language_id']=='de') { echo"selected";} }?>>Dutch</option>
										
									</select>--->
								<!--<span class="field_error"><?php echo form_error('language_id');?></span>--> </div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Title</label>
								<div class="col-sm-9">
									<input type="text"  class="form-control" name="page_title" placeholder="Enter Title" value="<?php
										if (!empty($page_data[0]['page_title'])) {
											echo $page_data[0]['page_title'];
										}
									?>" >
								<span class="field_error"><?php echo form_error('page_title'); ?></span> </div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-9">
									<select name="status" class="form-control">
										<option value=1 <?php
											if (@$page_data[0]['status'] == '1') {
												echo 'selected="selected"';
											}
										?> >Active</option>
										<option value=0 <?php
											if (@$page_data[0]['status'] == '0') {
												echo 'selected="selected"';
											}
										?>>Inactive</option>
									</select>
								<span class="field_error"><?php echo form_error('status'); ?></span> </div>
							</div>
						<?php if(!empty($page_data[0]['page_slug']) && $page_data[0]['page_slug']=='home_page') { ?>	
						<div class="form-group data_des"   >
                            <label class="col-sm-3 control-label">About Section</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="page_about_desc" id="page_about_desc"><?php  if (!empty($page_data[0]['page_about_desc'])) {
                                    echo htmlspecialchars($page_data[0]['page_about_desc']);
								}?></textarea>
							<span class="field_error"><?php echo form_error('page_about_desc'); ?></span> </div>
						</div>
						
						<div class="form-group">
								<label class="col-sm-3 control-label">Search For Filters</label>
								<div class="col-sm-9">
									<input type="text"  class="form-control" name="page_search_for_filters" placeholder="Enter Search For Filters" value="<?php
										if (!empty($page_data[0]['page_search_for_filters'])) {
											echo $page_data[0]['page_search_for_filters'];
										}
									?>" >
								<span class="field_error"><?php echo form_error('page_search_for_filters'); ?></span> </div>
							</div>
							
							<div class="form-group data_des">
                            <label class="col-sm-3 control-label">Realisations Section</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="page_realisations" id="page_realisations"><?php  if (!empty($page_data[0]['page_realisations'])) {
                                    echo htmlspecialchars($page_data[0]['page_realisations']);
								}?></textarea>
							<span class="field_error"><?php echo form_error('page_realisations'); ?></span> </div>
						</div>
						<?php } else if(!empty($page_data[0]['page_slug']) && $page_data[0]['page_slug']=='call_back') { ?>
						<div class="form-group">
								<label class="col-sm-3 control-label">REQUEST A CALL BACK </label>
								<div class="col-sm-9">
									<input type="text"  class="form-control" name="page_request_a_call_back" placeholder="Enter Request A Call Back" value="<?php
										if (!empty($page_data[0]['page_request_a_call_back'])) {
											echo $page_data[0]['page_request_a_call_back'];
										}
									?>" >
								<span class="field_error"><?php echo form_error('page_request_a_call_back'); ?></span> </div>
							</div>
						<?php } else if(!empty($page_data[0]['page_slug']) && $page_data[0]['page_slug']=='footer') { ?>
						<div class="form-group data_des">
                            <label class="col-sm-3 control-label">Footer Section</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="page_footer" id="page_footer"><?php  if (!empty($page_data[0]['page_footer'])) {
                                    echo htmlspecialchars($page_data[0]['page_footer']);
								}?></textarea>
							<span class="field_error"><?php echo form_error('page_footer'); ?></span> </div>
						</div>
						<?php } else { ?>
						<div class="form-group data_des">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="description"><?php  if (!empty($page_data[0]['description'])) {
                                    echo htmlspecialchars($page_data[0]['description']);
								}?></textarea>
							<span class="field_error"><?php echo form_error('description'); ?></span> </div>
						</div>
						<?php } ?>
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

<script src="<?php echo admin_assets_url(); ?>ckeditor/ckeditor.js"></script>
<?php if(!empty($page_data[0]['page_slug']) && $page_data[0]['page_slug']=='home_page') { ?>
<script type="text/javascript"> 
CKEDITOR.config.allowedContent = true;
CKEDITOR.replace( 'page_about_desc' ); 
CKEDITOR.replace( 'page_realisations' ); 
</script> 
<?php } else if(!empty($page_data[0]['page_slug']) && $page_data[0]['page_slug']=='footer') { ?>
<script type="text/javascript"> 
CKEDITOR.config.allowedContent = true;
CKEDITOR.replace( 'page_footer' ); 
</script> 

<?php } else { ?>
<script type="text/javascript"> 
CKEDITOR.config.allowedContent = true;
CKEDITOR.replace( 'description' ); 
</script> 
<?php } ?>

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 

<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 

</body></html>

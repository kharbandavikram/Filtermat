<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Upload Image</h1>
	</section>
	
    <!-- Main content -->
    <section class="content">

<?php
if($image_name != ''){ echo '<div class="alert alert-success">'.$image_name.'</div>'; }
elseif($error != ""){
echo '<div class="alert alert-error">'.$error.'</div>';
}
 ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
				<form action="<?php echo admin_url(); ?>uploads" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="box-body">
							<div class="form-group data_pdf" style="" >
								<label class="col-sm-3 control-label">Upload Image</label>
								<div class="col-sm-9">
									<input type="file" name="image" >
									<span class="field_error"><?php echo form_error('product_data'); ?></span> 
								</div>
							</div>
						
						</div>
						<!-- /.box-body -->
					
						<div class="box-footer">
							<center>
							<input type="submit" name="Submit" class="btn btn-primary" value="Upload"></center>
						</div>
                    <!-- /.box-footer --> 
					</div>
				</form>
			</div>
			
            <!-- /.col --> 
		</div>
        <!-- /.row --> 
	</section>
    <!-- /.content --> 
</div>
<?php $this->load->view('admin/includes/footer'); ?>
<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 
<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 

</body></html>

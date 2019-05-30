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
	
	    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Upload Images</h3>
            </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Image Url</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
				$i=1;
				foreach($all_images as $all_images_data){
				?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $all_images_data['image_path'];?></td>
                  <td><img src="<?php echo $all_images_data['image_path'];?>" width="50px" height="50px"></td>
                  <td><a href="<?php echo admin_url();?>deleteupload/<?php echo $all_images_data['id'];?>" title="Delete" onclick="return confirm('Are You Sure!');"><i class="fa  fa-trash-o btn_action"></i></a></td>
                </tr>
                <?php
				}
				?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </section>
    <!-- /.content --> 
</div>
<?php $this->load->view('admin/includes/footer'); ?>
<!-- AdminLTE App --> 
<!-- DataTables --> 
<script src="<?php echo admin_assets_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo admin_assets_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script> 

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<script>
      $(function () {
        $("#example1").DataTable(); 
       
      });
</script> 
</body></html>

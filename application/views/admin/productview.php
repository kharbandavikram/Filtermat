<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Product Management </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'category';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product Managmenet</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header"  style="display:none">
            <h3 class="box-title">View Product</h3>
            <a href="<?php echo admin_url().'addproduct';?>">
            <button class="btn btn-success" style="float:right;">Add Product</button>
            </a> </div>
          <!-- /.box-header -->
          <div class="box-body">
           
				<?php
					// debug($product_data);
					echo ($product_data[0]['product_data']);
				
				?>
			
			
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
<?php $this->load->view('admin/includes/footer');?>
<!-- DataTables --> 

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 

</body></html>
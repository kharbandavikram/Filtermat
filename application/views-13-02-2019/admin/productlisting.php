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
          <div class="box-header">
            <h3 class="box-title">All Products</h3>
            <a href="<?php echo admin_url().'addproduct';?>">
            <button class="btn btn-success" style="float:right;">Add Product</button>
            </a> </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <!--<th>Product ID</th>-->
                  <th>Product Name</th>
                   <!--<th>Franch Product Name</th>
                  <th>Dutch Product Name</th>-->
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Inner Category</th>
				  <th>Status</th>
				  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
				$i=1;
				
					foreach($products_data as $product){
				?>
                <tr>
                  <td><?php echo $i++;?></td>
                 <!-- <td><?php echo $product->id;?></td>-->
                  <td><?php echo $product->product_name;?></td>
                   <!--<td><?php //echo $product->fr_product_name;?></td>
                  <td><?php //echo $product->dut_product_name;?></td>-->
				  
                  <td><?php echo $category[$product->category_id];?></td>
                  <td><?php echo $sub_category[$product->subcategory_id];?></td>
                  <td><?php if(!empty($product->innercategory_id)){ echo $inner_category[$product->innercategory_id];}else{ echo 'N.A'; }?></td>
                                 
                  <td><?php if($product->status == '1'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Deactive this!');if(a){ deactive(<?= $product->id; ?>);}else{return false;}" title="Deactive"><i class="fa  fa-check-circle btn_action"></i></a>&nbsp;
                    <?php } if($product->status == '0'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Active this!');if(a){ active(<?= $product->id; ?>);}else{return false;}" title="active"><i class="fa  fa-minus-circle btn_action"></i></a>&nbsp;
                    <?php } ?></td>
					
					<?php if(!empty($product->productimage)) { ?>
					<td><img width="100" height="70" src="<?php echo assets_url().'product/'.$product->productimage;?>"></td>
					<?php } else {?>
					<td><img width="100" height="70" src="<?php echo assets_url().'category/no-image.jpg';?>"></td>
					<?php } ?>
                  <td>
				  <a href="<?php echo admin_url();?>editproduct/<?php echo $product->id;?>" title="Edit Product"><i class="fa  fa-edit btn_action"></i></a> 
				  <a href="<?php echo admin_url();?>viewproduct/<?php echo $product->id;?>" title="View Product"><i class="fa fa-eye btn_action"></i></a> 
				  <a href="<?php echo admin_url();?>deleteproduct/<?php echo $product->id;?>" title="Delete" onclick="return confirm('Are You Sure!');"><i class="fa  fa-trash-o btn_action"></i></a>
				  </td>
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
<?php $this->load->view('admin/includes/footer');?>
<!-- DataTables --> 
<script src="<?php echo admin_assets_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo admin_assets_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script> 

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 
<script>
      $(function () {
        $("#example1").DataTable(); 
      });
</script> 
<script type="text/javascript">
 function active(x)
 {
	var id11=x;
	$.ajax({
		type:"POST",     
        url:'<?PHP echo base_url();?>admin/active_product',
        data:{"id":id11},  
        success: function(data){
			// alert(data);
			location.reload();
		}
      });
 }
function deactive(r)
 {
	var id11=r;
	 $.ajax({
		type:"POST",     
        url:'<?PHP echo base_url();?>admin/deactive_product',
        data:{"id":id11}, 
        success: function(data){
			// alert(data);
			location.reload();
		}
      });
 }
</script>
</body></html>
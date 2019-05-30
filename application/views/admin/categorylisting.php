<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Category Management </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'category';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Category Managmenet</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Category</h3>
            <a href="<?php echo admin_url().'addcategory';?>">
            <button class="btn btn-success" style="float:right;">Add Category</button>
            </a> </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Category</th>
					<th>Status</th>
				  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
				$i=1;
				foreach($category_data_array as $category_data){
				?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $category_data->category;?></td>
                 <td><?php if($category_data->status == '1'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Deactive this!');if(a){ deactive(<?= $category_data->id; ?>);}else{return false;}" title="Deactive"><i class="fa  fa-check-circle btn_action"></i></a>&nbsp;
                    <?php } if($category_data->status == '0'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Active this!');if(a){ active(<?= $category_data->id; ?>);}else{return false;}" title="active"><i class="fa  fa-minus-circle btn_action"></i></a>&nbsp;
                    <?php } ?></td>
					<?php if(!empty($category_data->image)) { ?>
					<td><img width="100" height="70" src="<?php echo assets_url().'category/'.$category_data->image;?>"></td>
					<?php } else {?>
					<td><img width="100" height="70" src="<?php echo assets_url().'category/no-image.jpg';?>"></td>
					<?php } ?>
                  <td><a href="<?php echo admin_url();?>editcategory/<?php echo $category_data->id;?>" title="Edit Category"><i class="fa  fa-edit btn_action"></i></a> <a href="<?php echo admin_url();?>deletecategory/<?php echo $category_data->id;?>" title="Delete" onclick="return confirm('Are You Sure!');"><i class="fa  fa-trash-o btn_action"></i></a></td>
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
        url:'<?PHP echo base_url();?>admin/active_category',
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
        url:'<?PHP echo base_url();?>admin/deactive_category',
        data:{"id":id11}, 
        success: function(data){
			// alert(data);
			location.reload();
		}
      });
 }
</script>
</body></html>
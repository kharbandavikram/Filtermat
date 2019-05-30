<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Universal Category Management</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Universal Category Management</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Universal Category</h3>
            <a href="<?php echo admin_url().'adduniversalcategory';?>"><button class="btn btn-success" style="float:right;">Add</button>
            </a> </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Store</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
				$i=1;
				
					foreach($universal_data_array as $universal_data){
				?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $universal_data->univ_category;?></td>
                  <td><?php if($universal_data->universal_img!=''){
													 
													 ?>
                    <img src="<?php echo base_url();?>/public/uploads/category/<?php echo $universal_data->universal_img;?>" height="30px"  width="70px"    style="background-color: #EF821A;"/>
                    <?php
													 
													 }?></td>
                  <td><?php if($universal_data->status == '1'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Deactive this!');if(a){ deactive(<?= $universal_data->id; ?>);}else{return false;}" title="Deactive"><i class="fa  fa-check-circle btn_action"></i></a>&nbsp;
                    <?php } if($universal_data->status == '0'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Active this!');if(a){ active(<?= $universal_data->id; ?>);}else{return false;}" title="active"><i class="fa  fa-minus-circle btn_action"></i></a>&nbsp;
                    <?php } ?></td>
                  <td><a href="<?php echo admin_url();?>edituniversalcategory/<?php echo $universal_data->id;?>" title="Edit Category"><i class="fa  fa-edit btn_action"></i></a> <a href="<?php echo admin_url();?>deleteuniversalcategory/<?php echo $universal_data->id;?>" title="Delete" onclick="return confirm('Are You Sure!');"><i class="fa  fa-trash-o btn_action"></i></a></td>
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
        url:'<?PHP echo base_url();?>admin/active_universalcategory',
        data:{"id":id11},  
        success: function(data){
			
			location.reload();
			}
      });
 }
function deactive(r)
 {
	var id11=r;
	 $.ajax({
		type:"POST",     
        url:'<?PHP echo base_url();?>admin/deactive_universalcategory',
        data:{"id":id11}, 
        success: function(data){
			
			location.reload();
		}
      });
 }
</script>
</body></html>
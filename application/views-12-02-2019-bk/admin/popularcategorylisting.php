<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Popularcategory Management </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'category';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Popularcategory Managmenet</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Popularcategory</h3>
            <a href="<?php echo admin_url().'addpopularcategory';?>">
            <button class="btn btn-success" style="float:right;">Add Popularcategory</button>
            </a> </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Category</th>
                  <th>Orderby</th>
                  
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
				$i=1;
				
					foreach($popularcategory_data_array as $popularcategory_data){
						 $status=$popularcategory_data['status'];
						
							
				?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo @$this->db->where('id',$popularcategory_data	['category_id'])->get('tbl_category')->row()->category;?></td>
                   <td><?php echo $popularcategory_data['order_by'];?></td>
                
				
                  <td><?php if($popularcategory_data['status'] == '1'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Deactive this!');if(a){ deactive(<?= $popularcategory_data['id']; ?>);}else{return false;}" title="Deactive"><i class="fa  fa-check-circle btn_action"></i></a>&nbsp;
                    <?php } 
					
					
					
					if($popularcategory_data['status'] == '0'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Active this!');if(a){ active(<?= $popularcategory_data['id']; ?>);}else{return false;}" title="active"><i class="fa  fa-minus-circle btn_action"></i></a>&nbsp;
                    <?php } ?></td>
                  <td><a href="<?php echo admin_url();?>editpopularcategorylisting/<?php echo $popularcategory_data['id'];?>" title="Edit Category"><i class="fa  fa-edit btn_action"></i></a> <a href="<?php echo admin_url();?>deletepopularcategory/<?php echo $popularcategory_data['id'];?>" title="Delete" onclick="return confirm('Are You Sure!');"><i class="fa  fa-trash-o btn_action"></i></a></td>
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
        url:'<?PHP echo base_url();?>admin/active_popularcategory',
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
        url:'<?PHP echo base_url();?>admin/deactive_popularcategory',
        data:{"id":id11}, 
        success: function(data){
			
			location.reload();
		}
      });
 }
</script>
</body></html>
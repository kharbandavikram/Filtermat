<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Page Management </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'pages';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Page Managmenet</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
		  <div class="col-sm-8">
            <h3 class="box-title">All Pages</h3>
			</div>
			
			<div class="col-sm-4">
			<div class="col-sm-5">
			<label style="color:red;">Select Language</label>
			</div>
		<div class="col-sm-7">
			<form  method="post" id="form_id_page" action="<?php echo admin_url().'pages';?>">
			<select name="language_id" id ="language_id" class="form-control">
			<option value="en" <?php if(!empty($this->input->post('language_id')) && $this->input->post('language_id')=='en'){ echo "selected";}?>>English</option>
			<option value="fr"  <?php if(!empty($this->input->post('language_id')) && $this->input->post('language_id')=='fr'){ echo "selected";}?>>French</option>
			<option value="de"  <?php if(!empty($this->input->post('language_id')) && $this->input->post('language_id')=='de'){ echo "selected";}?> >Dutch</option>
             </select>
			</form>
			</div>
			
			</diV>
             </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Language</th>
                  <th>Title</th>
                  <th>Slug</th>
				  
				   <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
				$i=1;
				foreach($allpages as $allpages_data){
				?>
                <tr>
                  <td><?php echo $i++;?></td>
                  
                  <td><?php if($allpages_data->language_id=='en'){
					  echo "English";
				  }else if( $allpages_data->language_id=='fr'){
					   echo "French";
				  }else{
					   echo "Dutch";
				  }?></td>
				  <td><?php echo $allpages_data->page_title;?></td>
				  <td><?php if(!empty($allpages_data->page_slug) && $allpages_data->page_slug=='home_page') {
					  echo "Home";
				  }
				  else if(!empty($allpages_data->page_slug) && $allpages_data->page_slug=='call_back') {
					  echo "REQUEST A CALL BACK";
				  } 
				   else if(!empty($allpages_data->page_slug) && $allpages_data->page_slug=='footer') {
					    echo "Footer";
				   }else if(!empty($allpages_data->page_slug) && $allpages_data->page_slug=='price-list') {
					    echo "Page List";
				   }else{}?></td>
                 <?php /* <td><?php if($allpages_data->status == '1'){?>
					 <a href="#" onClick="var a=confirm('Are you sure to Deactive this!');if(a){ deactive(<?= $allpages_data->id; ?>);}else{return false;}" title="Deactive"><i class="fa  fa-check-circle btn_action"></i></a>&nbsp;
                    <?php } if($allpages_data->status == '0'){?>
                    <a href="#" onClick="var a=confirm('Are you sure to Active this!');if(a){ active(<?= $allpages_data->id; ?>);}else{return false;}" title="active"><i class="fa  fa-minus-circle btn_action"></i></a>&nbsp;
                    <?php } ?></td>
					
					*/
					?>
				
					<td><a href="<?php echo admin_url();?>editpage/<?php echo $allpages_data->id;?>" title="Edit Page"><i class="fa  fa-edit btn_action"></i></a> 
					<?php if(!empty($allpages_data->page_slug) && ($allpages_data->page_slug=='home_page' || $allpages_data->page_slug=='call_back'  || $allpages_data->page_slug=='footer') ) {}else {?>
					<a href="<?php echo admin_url();?>deletepage/<?php echo $allpages_data->id;?>" title="Delete" onclick="return confirm('Are You Sure!');"><i class="fa  fa-trash-o btn_action"></i></a><?php } ?>
					
					
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
        url:'<?PHP echo base_url();?>admin/active_page',
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
        url:'<?PHP echo base_url();?>admin/deactive_page',
        data:{"id":id11}, 
        success: function(data){
			// alert(data);
			location.reload();
		}
      });
 }
 $('#language_id').change(function(){
	var lang_id = $(this).val();
	$('#form_id_page').submit();
 });
</script>
</body></html>
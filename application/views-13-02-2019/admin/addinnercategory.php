<?php
  $button=@$this->uri->segment(2)=="editinnercategory"? "Update": "Submit";
  $add=@$this->uri->segment(2)=="editinnercategory"? "Edit": "Add";
 ?>

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Innercategory Management </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'category';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li ><a href="<?php echo admin_url().'innercategory';?>">Innercategory Managmenet</a></li>
      <li class="active"><?php echo $add;?> Innercategory </li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-8 ">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $add;?> Innercategory </h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start --> 
         
          <?php //debug($innercategory_data);
								if($this->session->flashdata('innercategory_add')){
								?>
          <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> <?php echo $this->session->flashdata('innercategory_add');?> </div>
          <?php
								}
								?>
          <?php
        if($this->session->flashdata('innercategory_edit')){
        ?>
          <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> <?php echo $this->session->flashdata('innercategory_edit');?> </div>
          <?php
        }
        ?>
         
          <?php 
			   $attributes = array('class' => 'form-horizontal','id' => 'defaultForm','enctype'=>'multipart/form-data');
			  
			   if($add=='Add'){
			   echo form_open_multipart(admin_url().'addinnercategory', $attributes);
			   }else  if($add=='Edit'){
			   echo form_open_multipart(admin_url().'editinnercategory/'.$innercategory_data[0]['id'], $attributes);
			   }
			   ?>
          <div class="box-body">
            <input type="hidden" name="old_img" value="<?php if(!empty($innercategory_data[0]['innercat_img'])){ echo $innercategory_data[0]['innercat_img']; } ?>" />
             <?php
			  $category=$this->db->order_by("category", "asc")->where('status',1)->get('tbl_category')->result();
			 ?>
            <div class="form-group">
              <label class="col-sm-3 control-label">Category</label>
              <div class="col-sm-9">
                <select name="category_id" id ="category_id" class="form-control" onChange="category_change(this.value);">
               <option value="">Select Category</option>
                <?php 
               
                foreach($category as $cate)
                { 
					if($cate->id == @$innercategory_data[0]['category_id']){
						echo "<option value=".$cate->id." selected >".$cate->category."</option>";
					}else {
                ?>
               <option value=<?php echo $cate->id;?>  ><?php echo $cate->category;?></option>
                <?php
                } }
                ?>
               </select>
                <span class="field_error"><?php echo form_error('category_id');?></span> </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Subcategory</label>
              <div class="col-sm-9">
                <select name="subcategory_id" class="form-control" id="subcategory_id">
                 <option value="">Select</option>
                <?php 
				$subcategory=$this->db->order_by("subcategory", "asc")->where('status',1)->get('tbl_subcategory')->result_array();
                foreach($subcategory as $subcate)
                {
					if($innercategory_data[0]['subcategory_id']==$subcate['id']){
						echo "<option value=".$subcate['id']." selected >".$subcate['subcategory']."</option>";
					}else {
						echo "<option value=".$subcate['id']."  >".$subcate['subcategory']."</option>";
						}
               
                }
                ?>
               </select>
                <span class="field_error"><?php echo form_error('subcategory_id');?></span> </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">English Innercategory</label>
              <div class="col-sm-9">
                <input type="text"  class="form-control" name="innercategory" placeholder="Enter Innercategory Name" value="<?php if(!empty($innercategory_data[0]['innercategory'])){ echo $innercategory_data[0]['innercategory']; } ?>" >
                <span class="field_error"><?php echo form_error('innercategory');?></span> </div>
            </div>
         
  
				<div class="form-group">
					<label class="col-sm-3 control-label">Franch Innercategory</label>
					<div class="col-sm-9">
						<input type="text"  class="form-control" name="fr_innercategory" placeholder="Enter Franch Innercategory  Name" value="<?php
						if (!empty($subcategory_data[0]['fr_innercategory'])) {
							echo $subcategory_data[0]['fr_innercategory'];
						}
						?>" >
						<span class="field_error"><?php echo form_error('fr_innercategory'); ?></span> </div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Dutch Innercategory </label>
				<div class="col-sm-9">
					<input type="text"  class="form-control" name="dut_innercategory" placeholder="Enter Dutch Innercategory Name" value="<?php
					if (!empty($subcategory_data[0]['dut_innercategory'])) {
						echo $subcategory_data[0]['dut_innercategory'];
					}
					?>" >
					<span class="field_error"><?php echo form_error('dut_innercategory'); ?></span> </div>
			</div>
		  
		  
          <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
              <select name="status" class="form-control">
                <option value=1 <?php if(@$innercategory_data[0]['status']=='1'){ echo 'selected="selected"'; }?> >Active</option>
                <option value=0 <?php if(@$innercategory_data[0]['status']=='0'){ echo 'selected="selected"'; }?>>Inactive</option>
              </select>
              <span class="field_error"><?php echo form_error('status');?></span> </div>
          </div>
		  
		   <div class="form-group data_pdf">
                            <label class="col-sm-3 control-label">Upload Image</label>
                            <div class="col-sm-9">
                                <input type="file"  class="form-control" name="image_name" >
								<input type="hidden"  class="form-control" name="old_img"  value="<?php if(isset($innercategory_data[0]['innercatimage'])) { echo $innercategory_data[0]['innercatimage'];}?>">
                                <span class="field_error"><?php echo form_error('category'); ?></span> </div>
                        </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
          <center>
            <input type="submit" name="Submit" class="btn btn-primary" value="<?php echo $button;?>"></center>
          </div>
          <!-- /.box-footer --> 
          <?php echo form_close();?> </div>
      </div>
      
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<?php $this->load->view('admin/includes/footer');?>

<link href="<?php echo admin_assets_url(); ?>dist/css/bootstrap-chosen.css" type="text/css" rel="stylesheet"/>
 <script src="<?php echo admin_assets_url(); ?>dist/js/bootstrap-chosen.js"></script>
 <script type="text/javascript">
      $(function() {
       
		$('#tags_id').chosen();
		
      });
	  
    </script>
<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 
<script type="text/javascript">
function category_change(id)
   {
	 $.ajax({type:'post',
		    url:'<?PHP echo base_url()?>sabsetting/ajax_category_change',
		    data:{categoryid:id},
		    success:function(res){
			    // alert(res);
			  $('#subcategory_id').html(res);
			 }
	      });
   }
   </script> 
   <script type="text/javascript">
function uni_category_change(id){
	 $.ajax({type:'post',
		    url:'<?PHP echo base_url()?>sabsetting/ajax_uni_category_change',
		    data:{categoryid:id},
		    success:function(res){
			 // alert(res);
			  $('#category_id').html(res);
			 }
	 });
 }
   </script> 
<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 

</body></html>
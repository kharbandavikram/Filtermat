<?php
// $button = @$this->uri->segment(2) == "editproduct" ? "Update" : "Submit";
// $add = @$this->uri->segment(2) == "editproduct" ? "Edit" : "Add";
// debug($this->uri->segment(2));
?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Search </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo admin_url().'category'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="<?php echo admin_url() . 'products'; ?>">Search </a></li>
            <li class="active"> Search </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-10 ">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Search </h3>
                    </div>
                    
                   
                    
                    <?php
					
				
                    $attributes = array('class' => 'form-horizontal', 'id' => 'defaultForm');

                    echo form_open_multipart(admin_url() . 'search', $attributes);
                    
                    ?>
                    <div class="box-body">
                        <div class="box-body">
            
             <?php
			  $category=$this->db->order_by("category", "asc")->where('status',1)->get('tbl_category')->result();
			 ?>
				<div class="form-group">
				  <label class="col-sm-3 control-label">Category</label>
				  <div class="col-sm-9">
					<select name="category_id" id ="category_id" class="form-control" onChange="category_change(this.value);">
				   <option value="">Select Category</option>
					<?php 
				   
					foreach($category as $cate) {  ?>
					<option value=<?php echo $cate->id;?>  ><?php echo $cate->category;?></option>
					<?php } ?>
				   </select>
				</div>
				</div>
				
				<div class="form-group subCatClass" style="display:none;">
				  <label class="col-sm-3 control-label">Subcategory</label>
				  <div class="col-sm-9">
					<select name="subcategory_id" class="form-control" id="subcategory_id"  onChange="subcategory_change(this.value);">
					 <option value="">Select</option>
				   </select>
					<span class="field_error"><?php echo form_error('subcategory_id');?></span> </div>
				</div>
				
				<div class="form-group innerCatClass" style="display:none;">
				  <label class="col-sm-3 control-label">Inner Category / Products</label>
				  <div class="col-sm-9">
					<select name="innercategory_id" class="form-control" id="innercategory_id" onChange="inrcategory_change(this.value);">
					 <option value="">Select</option>
				   </select></div>
				  <!-- <div><button type="button" class="btn btn-info InnerCatProduct">Info</button> </div>-->
				</div>
				
				<div class="form-group productClass" style="display:none;">
				  <label class="col-sm-3 control-label">Products</label>
				  <div class="col-sm-9">
					<select name="product_id" class="form-control" id="product_id" onChange="SetProduct(this.value);">
					 <option value="">Select</option>
				   </select></div>
				</div>
             
                      
                       
					<input type="hidden" id="productID" value=""/>

					<div class="form-group viewProduct" style="display:none;">
				  <center>
                           <button type="button" class="btn btn-info" onclick="viewProduct()">View Product</button> </center>
				</div>	
						
					
						
                    </div>
                    <!-- /.box-body -->
                   
                    <div class="box-footer" class="" style="display:none">
                        
					</div>
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
<script type="text/javascript">
function category_change(id){
	   $('.innerCatClass').fadeOut();
	   $('.productClass').fadeOut();
	   $('#subcategory_id').val('');
	   $('#innercategory_id').val('');
	   $('#products').val('');
	   $('.viewProduct').fadeOut();
		$.ajax({type:'post',
		    url:'<?PHP echo base_url()?>sabsetting/ajax_category_change',
		    data:{categoryid:id},
		    success:function(res){
			  $('#subcategory_id').html(res);
			  $('.subCatClass').fadeIn();
			  
			 }
	      });
   }
   
   

function subcategory_change(id){
	$('.innerCatClass').fadeOut();
	$('.productClass').fadeOut();
	$('#innercategory_id').val('');
	$('#products').val('');
	$('.viewProduct').fadeOut();
	 $.ajax({type:'post',
		url:'<?PHP echo base_url()?>sabsetting/ajax_subcategory_search_change',
		data:{subcategoryid:id},
		success:function(res){
		 // alert(res);
		  $('#innercategory_id').html(res);
		  $('.innerCatClass').fadeIn();
		  
		 }
	 });
 }
function inrcategory_change(id){
	$('.viewProduct').fadeOut();
	var type = id.toString().split('_').pop();
	var id = id.toString().split('_'+type)[0];
	
	if(type=='2'){
		SetProduct(id);
	}else{
		$('#product_id').val('');
		 $.ajax({type:'post',
			url:'<?PHP echo base_url()?>sabsetting/ajax_innercategory_change',
			data:{innercategoryid:id},
			success:function(res){
			  if(id!=''){
				$('#product_id').html(res);
			  }else{
				$('#product_id').html('<option value="">Select</option>');
			  }
			  $('.productClass').fadeIn();
			 }
		 });
	}
	
 }
 
 function SetProduct(productID){
	$("#productID").val(productID);
	$('.viewProduct').fadeIn();
 } 
 function viewProduct(){
	var productID = $("#productID").val();
	if(productID!=''){
		url = '<?php echo admin_url().'viewproduct/'; ?>'+productID;
		window.location.href = url;
	}
	
 }
   </script> 

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 

<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 

</body></html>

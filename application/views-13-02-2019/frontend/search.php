<?php $lang = $this->session->userdata('lang');?>
<div class="content-wrapper"> 
    <!-- Main content -->
    <section class="service-section">
	<div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="section-title filter_part">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
					<h3 class="box-title">Search for <span>Filters</span></h3>
					<?php } 
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
					<h3 class="box-title">Rechercher <span>Les filtres</span></h3>
					<?php }else{?>
					<h3 class="box-title">Zoeken <span>Filters</span></h3>
					<?php 
					} ?>
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
				  
				  <div class="col-sm-8 col-sm-offset-2">
				  <!--<label class="input_heading">Category</label>-->
					<select name="category_id" id ="category_id" class="form-control form_1" onChange="category_change(this.value);">
				   <option value="">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Select Category"; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Choisir une catégorie"; }
					else{ echo "selecteer categorie"; }
					?>
				   </option>
					<?php 
					foreach($category as $cate) {  ?>
						<option value=<?php echo $cate->id;?>>
							<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $cate->category; }
							else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $cate->fr_category; }
							else{ echo $cate->dut_category; }
							?>
					</option>
					<?php } ?>
				   </select>
				</div>
				</div>
				
				<div class="form-group subCatClass" style="display:none;">
				 <!-- <label class="col-sm-3 control-label">Subcategory</label>-->
				  <div class="col-sm-8 col-sm-offset-2">
					<select name="subcategory_id" class="form-control form_1" id="subcategory_id"  onChange="subcategory_change(this.value);">
					 <option value="">
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Select Subcategory"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Sélectionnez une sous-catégorie"; }
						else{ echo "Selecteer Subcategorie"; }
						?>
					 </option>
				   </select>
					<span class="field_error"><?php echo form_error('subcategory_id');?></span> </div>
				</div>
				
				<div class="form-group innerCatClass" style="display:none;">
				 <!-- <label class="col-sm-3 control-label">Inner Category / Products</label>-->
				  <div class="col-sm-8 col-sm-offset-2">
					<select name="innercategory_id" class="form-control form_1" id="innercategory_id" onChange="inrcategory_change(this.value);">
					 <option value="">
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Select Inner Category / Products"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Sélectionnez la catégorie intérieure / produits"; }
						else{ echo "Selecteer binnencategorie / producten"; }
						?>
					 </option>
				   </select></div>
				  <!-- <div><button type="button" class="btn btn-info InnerCatProduct">Info</button> </div>-->
				</div>
				
				<div class="form-group productClass" style="display:none;">
				 <!-- <label class="col-sm-3 control-label">Products</label>-->
				  <div class="col-sm-8 col-sm-offset-2">
					<select name="product_id" class="form-control form_1" id="product_id" onChange="SetProduct(this.value);">
					 <option value="">
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Select Products"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Sélectionnez des produits"; }
						else{ echo "Selecteer producten"; }
						?>
					 </option> 
				   </select></div>
				</div>
             <input type="hidden" id="productID" value=""/>
			<div class="form-group viewProduct" style="display:none;">
				  <center><button type="button" class="btn btn-info" onclick="viewProduct()">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Product"; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir le produit"; }
					else{ echo "Bekijk product"; }
					?>
				  </button>
					<a href="<?php echo base_url().'category/';?>"><button type="button" class="btn btn-info">
					
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Advanced Search"; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Recherche Avancée"; }
					else{ echo "geavanceerd zoeken"; }
					?>
					</button><a/>						   
				</center>
						   
						   
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
        </div>
        <!-- /.row --> 
    </section>
    <!-- /.content --> 
</div>


    <!--About Section-->
    <?php //$this->load->view('frontend/about'); ?>
    <!--End About Section-->

    <!--Service Section-->
   <?php //$this->load->view('frontend/service'); ?>
    <!--End Service Section-->


    <!--Testimonials Section-->
   <?php //$this->load->view('frontend/testimonial'); ?>
    <!--End Testimonials Section-->


    <!--Blog Section-->
   <?php //$this->load->view('frontend/blog'); ?>
    <!--End Blog Section-->


    <!--footer Section-->
	<?php 
	
	if($this->uri->segment(1)=='search'){
		 $this->load->view('frontend/footer');
	}
   ?>
    <!--End footer Section-->


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
		// if(id!=){
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
		// }
	}
	
 }
 
 function SetProduct(productID){
	$("#productID").val(productID);
	$('.viewProduct').fadeIn();
 } 
 function viewProduct(){
	var productID = $("#productID").val();
	if(productID!=''){
		url = '<?php echo base_url().'viewproduct/'; ?>'+productID;
		window.location.href = url;
	}
 }
   </script> 


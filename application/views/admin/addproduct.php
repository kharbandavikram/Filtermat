<?php
	$button = @$this->uri->segment(2) == "editproduct" ? "Update" : "Submit";
	$add = @$this->uri->segment(2) == "editproduct" ? "Edit" : "Add";
?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Product Management </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo admin_url().'category'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="<?php echo admin_url() . 'products'; ?>">Product Managmenet</a></li>
            <li class="active"><?php echo $add; ?> Product </li>
		</ol>
	</section>
	
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $add; ?> Product </h3>
					</div>
                    <!-- /.box-header --> 
                    <!-- form start --> 
					
                    <?php
						// debug($product_data);
						if ($this->session->flashdata('product_add')) {
						?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<b>Alert!</b> <?php echo $this->session->flashdata('product_add'); ?> </div>
                        <?php
						}
					?>
                    <?php
						if ($this->session->flashdata('product_edit')) {
						?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<b>Alert!</b> <?php echo $this->session->flashdata('product_edit'); ?> </div>
                        <?php
						}
					?>
                    
                    <?php
						
						
						$attributes = array('class' => 'form-horizontal', 'id' => 'defaultForm','enctype'=>'multipart/form-data');
						
						if ($add == 'Add') {
							echo form_open_multipart(admin_url() . 'addproduct', $attributes);
							} else if ($add == 'Edit') {
							echo form_open_multipart(admin_url() . 'editproduct/' . $product_data[0]['id'], $attributes);
						}
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
											
											foreach($category as $cate)
											{ 
												if($cate->id == @$product_data[0]['category_id']){
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
							<?php if ($add == 'Add') { ?>
								<div class="form-group">
									<label class="col-sm-3 control-label">Sub category</label>
									<div class="col-sm-9">
										<select name="subcategory_id" class="form-control" id="subcategory_id"  onChange="subcategory_change(this.value);">
											<option value="">Select</option>
										</select>
									<span class="field_error"><?php echo form_error('subcategory_id');?></span> </div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Inner Category</label>
									<div class="col-sm-9">
										<select name="innercategory_id" class="form-control" id="innercategory_id">
											<option value="">Select</option>
											
										</select>
									<span class="field_error"><?php echo form_error('innercategory_id');?></span></div>
								</div>
								<?php } else if ($add == 'Edit') { ?>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">Sub category</label>
									<div class="col-sm-9">
										<select name="subcategory_id" class="form-control" id="subcategory_id"  onChange="subcategory_change(this.value);">
											<option value="">Select</option>
											<?php
												foreach($all_Sub as $subCat){
													echo "<option value='".$subCat['id']."'";
													if($subCat['id']==$product_data[0]['subcategory_id']){ echo "selected"; }
													echo ">".$subCat['subcategory']."</option>";
												}
											?>
										</select>
									<span class="field_error"><?php echo form_error('subcategory_id');?></span> </div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Inner Category</label>
									<div class="col-sm-9">
										<select name="innercategory_id" class="form-control" id="innercategory_id">
											<option value="">Select</option>
											<?php
												foreach($all_inner as $inner){
													echo "<option value='".$inner['id']."'";
													if($inner['id']==$product_data[0]['innercategory_id']){ echo "selected"; }
													echo ">".$inner['innercategory']."</option>";
												}
											?>
											
										</select>
									<span class="field_error"><?php echo form_error('innercategory_id');?></span></div>
								</div>
								
								
								
							<?php } ?>
							<div class="form-group">
							<label class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<h4>Above section is common for English,French,Dutch language</h4>
								</div>
							</div>
							
							<div class="form-group" style="border-top: 1px solid #eee; margin-bottom:30px;margin-top:30px;">
							
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Product Name (English)</label>
								<div class="col-sm-9">
									<input type="text"  class="form-control" name="product_name" placeholder="Enter English Product Name" value="<?php
										if (!empty($product_data[0]['product_name'])) {
											echo $product_data[0]['product_name'];
										}
									?>" >
								<span class="field_error"><?php echo form_error('product_name'); ?></span> </div>
							</div>
							
						<div class="form-group">
							<label class="col-sm-3 control-label">Product Name (French)</label>
							<div class="col-sm-9">
								<input type="text"  class="form-control" name="fr_product_name" placeholder="Enter French Product  Name" value="<?php
								if (!empty($product_data[0]['fr_product_name'])) {
									echo $product_data[0]['fr_product_name'];
								}
								?>" >
								<span class="field_error"><?php echo form_error('fr_product_name'); ?></span> </div>
						</div>
						<div class="form-group">
						<label class="col-sm-3 control-label">Product Name (Dutch)</label>
						<div class="col-sm-9">
							<input type="text"  class="form-control" name="dut_product_name" placeholder="Enter Dutch Product Name" value="<?php
							if (!empty($product_data[0]['dut_product_name'])) {
								echo $product_data[0]['dut_product_name'];
							}
							?>" >
							<span class="field_error"><?php echo form_error('dut_product_name'); ?></span> </div>
						</div>
							
							
							<div class="form-group"  style="display:none">
								<label class="col-sm-3 control-label">Short Description</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="product_desc" placeholder="Enter Product Description" rows="3"> <?php
										if (!empty($product_data[0]['product_desc'])) {
											echo $product_data[0]['product_desc'];
										}
									?></textarea>
								<span class="field_error"><?php echo form_error('product_desc'); ?></span> </div>
							</div>
							
							
							
							
						
							
							
							<div class="form-group"">
                            <label class="col-sm-3 control-label">What You Want To Add</label>
                            <div class="col-sm-9">
                                <input type="radio" name="data_type" class="radio_button" value="1" <?php if(@$product_data[0]['data_type'] == 1){ echo 'checked';}?> checked> PDF 
                                <input type="radio" name="data_type" class="radio_button" value="2" <?php if(@$product_data[0]['data_type'] == 2){ echo 'checked';}?> > Description
								
							<span class="field_error"><?php echo form_error('product_data'); ?></span> </div>
						</div>
						<div class="form-group data_pdf" style="display:<?php if( @$product_data[0]['data_type'] == 1){ echo'block';}else{ echo 'none';}?>" >
                            <label class="col-sm-3 control-label">Upload PDF</label>
                            <div class="col-sm-9">
								<input type="file" name="pdf" >
								<input type="hidden" name="old_pdf" value="<?php echo @$product_data[0]['pdf'];?>">
                                <span class="field_error"><?php echo form_error('product_data'); ?></span> 
                                <span class="field_error1">(Common PDF file will display in all Languages)</span> 
							</div>
						</div>
                        <div class="form-group data_des"  style="display:<?php if( @$product_data[0]['data_type'] == 2){ echo'block';}else{ echo 'none';}?>" >
                            <label class="col-sm-3 control-label">Product Data</label>
                            <div class="col-sm-9">
							<?php  if (!empty($product_data[0]['product_data'])) {
                                $product_datas=$product_data[0]['product_data'];
								}else{
									 $product_datas='';
								}?>
                                <textarea class="form-control" name="product_data" id="product_data"></textarea>
							<span class="field_error"><?php echo form_error('product_data'); ?></span> </div>
						</div>
						
						
						<div class="form-group data_des"  style="display:<?php if( @$product_data[0]['data_type'] == 2){ echo'block';}else{ echo 'none';}?>" >
                            <label class="col-sm-3 control-label"> French Product Data</label>
                            <div class="col-sm-9">
							<?php  if (!empty($product_data[0]['fr_product_data'])) {
                                    $fr_product_data=$product_data[0]['fr_product_data'];
								}else{
									 $fr_product_data='';
								}
								?>
                                <textarea class="form-control" name="fr_product_data" id="fr_product_data"></textarea>
							<span class="field_error"><?php echo form_error('fr_product_data'); ?></span> </div>
						</div>
						
						<div class="form-group data_des"  style="display:<?php if( @$product_data[0]['data_type'] == 2){ echo'block';}else{ echo 'none';}?>" >
                            <label class="col-sm-3 control-label"> Dutch Product Data</label>
                            <div class="col-sm-9">
							<?php  if (!empty($product_data[0]['dut_product_data'])) {
                                   $dut_product_data=$product_data[0]['dut_product_data'];
								}else{
									 $dut_product_data='';
								}?>
                                <textarea class="form-control" name="dut_product_data" id="dut_product_data"></textarea>
							<span class="field_error"><?php echo form_error('dut_product_data'); ?></span> </div>
						</div>
						
						  <div class="form-group ">
                            <label class="col-sm-3 control-label">Upload Image</label>
                            <div class="col-sm-9">
                                <input type="file"  class="form-control" name="image_name" >
								<input type="hidden"  class="form-control" name="old_img"  value="<?php if(isset($product_data[0]['productimage'])) { echo $product_data[0]['productimage'];}?>">
                                <span class="field_error"><?php echo form_error('category'); ?></span> </div>
                        </div>
						
						<div class="form-group">
								<label class="col-sm-3 control-label">Product Button Link</label>
								<div class="col-sm-9">
									<input type="text"  class="form-control" id="product_text_button"  name="product_text_button" placeholder="Enter Product Button" value="<?php
										if (!empty($product_data[0]['product_text_button'])) {
											echo $product_data[0]['product_text_button'];
										}
									?>" >
								<span class="field_error"><?php echo form_error('product_text_button'); ?></span> </div>
						</div>
						
						<div class="form-group" style="display:none;">
								<label class="col-sm-3 control-label">Product Short Description</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="short_desc"><?php
										if (!empty($product_data[0]['short_desc'])) {
											echo $product_data[0]['short_desc'];
										}
									?></textarea>
								<span class="field_error"><?php echo form_error('short_desc'); ?></span> </div>
						</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-9">
									<select name="status" class="form-control">
										<option value=1 <?php
											if (@$product_data[0]['status'] == '1') {
												echo 'selected="selected"';
											}
										?> >Active</option>
										<option value=0 <?php
											if (@$product_data[0]['status'] == '0') {
												echo 'selected="selected"';
											}
										?>>Inactive</option>
									</select>
								<span class="field_error"><?php echo form_error('status'); ?></span> </div>
							</div>
							
						<div class="form-group">
								<label class="col-sm-3 control-label">Price List Tag</label>
								<div class="col-sm-9">
								<input type="checkbox" name="pricelist_tag_status" value="<?php if(@$product_data[0]['pricelist_tag_status']!=''){ echo $product_data[0]['pricelist_tag_status']; }else{ echo '0';} ?>" class="price_list_type" onclick="price_list_types(this);" <?php if(@$product_data[0]['pricelist_tag_status']=='1'){ echo 'checked';}?>/>
								<span class="field_error"><?php echo form_error('price_list_type'); ?></span> 
								</div>
						</div>
						 <?php if(@$product_data[0]['pricelist_tag_status']=='1'){ 
						$style='style="display:block;"'; 
						 }else{ 
						$style='style="display:none;"'; 
						} ?>
						
						<div class="form-group price_list_desc_div" <?php echo $style; ?> >
								<label class="col-sm-3 control-label">Price List Status</label>
								<div class="col-sm-9 price_radio">
							<input type="radio" name="price_list_status" value="0"<?php if(@$product_data[0]['price_list_status']=='0'){ echo 'checked';}?>><span>Public</span>
							<input type="radio" name="price_list_status" value="1"<?php if(@$product_data[0]['price_list_status']=='1'){ echo 'checked';}?>><span>Private</span>
								<span class="field_error"><?php echo form_error('eng_price_list_desc'); ?></span> 
								</div>
						</div>	
						
						
						<div class="form-group price_list_desc_div" <?php echo $style; ?> >
								<label class="col-sm-3 control-label">English Price List Description </label>
								<div class="col-sm-9">
								<?php
										if (!empty(@$product_data[0]['eng_price_list_desc'])) {
										$eng_price_list_desc=$product_data[0]['eng_price_list_desc'];
										}else{
											$eng_price_list_desc='';
										}
									?>
								
								<textarea class="form-control" name="eng_price_list_desc"> </textarea>
								<span class="field_error"><?php echo form_error('eng_price_list_desc'); ?></span> 
								</div>
						</div>	
						
						<div class="form-group price_list_desc_div" <?php echo $style; ?> >
								<label class="col-sm-3 control-label">French Price List Description </label>
								<div class="col-sm-9">
								<?php
										if (!empty(@$product_data[0]['fr_price_list_desc'])) {
											$fr_price_list_desc=$product_data[0]['fr_price_list_desc'];
										}else{
											$fr_price_list_desc='';
										}
									?>
								<textarea class="form-control" name="fr_price_list_desc"></textarea>
								<span class="field_error"><?php echo form_error('fr_price_list_desc'); ?></span> 
								</div>
						</div>	

						<div class="form-group price_list_desc_div" <?php echo $style; ?> >
								<label class="col-sm-3 control-label"> Dutch Price List Description</label>
								<div class="col-sm-9">
									<?php
										if (!empty(@$product_data[0]['dut_price_list_desc'])) {
											$dut_price_list_desc=$product_data[0]['dut_price_list_desc'];
										}else{
											$dut_price_list_desc='';
										}
									?>
								<textarea class="form-control" name="dut_price_list_desc"></textarea>
								<span class="field_error"><?php echo form_error('dut_price_list_desc'); ?></span> 
								</div>
						</div>	
							
					</div>
                    <!-- /.box-body -->
					
                    <div class="box-footer">
                        <center>
						<input type="submit" name="Submit" class="btn btn-primary" value="<?php echo $button; ?>"></center>
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
<!--<link href="<?php echo admin_assets_url(); ?>dist/css/bootstrap-chosen.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo admin_assets_url(); ?>dist/js/bootstrap-chosen.js"></script>-->
<script src="<?php echo admin_assets_url(); ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
function price_list_types(elm){
 if ($(elm).prop("checked")) {
        // checked
		
		$('.price_list_desc_div').show();
		$('.price_list_type').val('1');
        return;
    }else{
    // not checked	
	$('.price_list_desc_div').hide();
	$('.price_list_type').val('0');
	}
}


	function category_change(id)
	{
		$("#subcategory_id").val('')
		$("#innercategory_id").val('')
		$.ajax({type:'post',
		    url:'<?PHP echo base_url()?>sabsetting/ajax_category_change',
		    data:{categoryid:id},
		    success:function(res){
			    // alert(res);
				$('#subcategory_id').html(res);
			}
		});
	}
	
    
	// CKEDITOR.replace( 'product_data' );
	// CKEDITOR.replace( 'fr_product_data' );
	// CKEDITOR.replace( 'dut_product_data' );

	

	CKEDITOR.plugins.addExternal('forms','<?php echo base_url();?>filtermat_assets/admin_asset/ckeditor/plugins/forms/', 'plugin.js' );
	CKEDITOR.plugins.addExternal('div','<?php echo base_url();?>filtermat_assets/admin_asset/ckeditor/plugins/div/', 'plugin.js' );

	CKEDITOR.replace( 'product_data', {
		extraPlugins: 'forms,div'
	} );
	
	CKEDITOR.replace( 'fr_product_data', {
			extraPlugins: 'forms,div'
		} );
	
	CKEDITOR.replace( 'dut_product_data', {
			extraPlugins: 'forms,div'
		} );



	
	CKEDITOR.replace( 'eng_price_list_desc', {
		extraPlugins: 'forms,div'
	} );

CKEDITOR.replace( 'dut_price_list_desc', {
		extraPlugins: 'forms,div',
	} );
	
CKEDITOR.replace( 'fr_price_list_desc', {
		extraPlugins: 'forms,div'
	} );
	
CKEDITOR.instances.eng_price_list_desc.setData(`<?php echo $eng_price_list_desc; ?>`);	
CKEDITOR.instances.dut_price_list_desc.setData(`<?php echo $dut_price_list_desc; ?>`);	
CKEDITOR.instances.fr_price_list_desc.setData(`<?php echo $fr_price_list_desc; ?>`);

	
CKEDITOR.instances.product_data.setData(`<?php echo $product_datas; ?>`);	
CKEDITOR.instances.fr_product_data.setData(`<?php echo $fr_product_data; ?>`);	
CKEDITOR.instances.dut_product_data.setData(`<?php echo $dut_product_data; ?>`);	

	// CKEDITOR.replace( 'dut_price_list_desc' );
	// CKEDITOR.replace( 'fr_price_list_desc' );
</script> 
<script type="text/javascript">

	function subcategory_change(id){
		
		$("#innercategory_id").val('')
		$.ajax({type:'post',
			url:'<?PHP echo base_url()?>sabsetting/ajax_subcategory_change',
			data:{subcategoryid:id},
			success:function(res){
				// alert(res);
				$('#innercategory_id').html(res);
			}
		});
	}
	$('.radio_button').click(function(){
		if($(this).val() == 1){
			$('.data_des').hide();
			$('.data_pdf').show();
			}else{
			$('.data_des').show();
			$('.data_pdf').hide();
		}
	});
	
	
</script> 
<?php if(@$product_data[0]['data_type'] == 2){
	?>
	<script>
	$('.data_pdf').hide();
	</script>
	<?php 
}else{ ?>
<script>
	$('.data_pdf').show();
	</script>
<?php 
	
}
	?>

	
	
	
	
<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 

<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 

</body></html>

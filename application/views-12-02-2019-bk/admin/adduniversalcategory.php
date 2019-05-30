<?php
//echo "<pre>"; print_r($authors);die;
//echo "<pre>"; print_r($univ_category_data[0]['multiple_innercate']); exit;
  $button=@$this->uri->segment(2)=="edituniversalcategory"? "Update": "Submit";
  $add=@$this->uri->segment(2)=="edituniversalcategory"? "Edit": "Add";
?>
<link href="<?php echo admin_assets_url(); ?>dist/css/bootstrap-multiselect.css" type="text/css" rel="stylesheet">
<style type="text/css">
ul.multiselect-container.dropdown-menu {
    overflow-y: auto;
    height: 350px;
}
</style>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Universal Category Management </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li ><a href="<?php echo admin_url().'universalcategory';?>">Universal Category Management</a></li>
      <li class="active"><?php echo $add;?> Universal Category</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-8 ">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $add;?> Universal Category</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start --> 
         
          <?php if($this->session->flashdata('univcategory_add')){
								?>
          <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> <?php echo $this->session->flashdata('univcategory_add');?> </div>
          <?php
								}
								?>
          <?php
        if($this->session->flashdata('univcategory_edit')){
        ?>
          <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> <?php echo $this->session->flashdata('univcategory_edit');?> </div>
          <?php
        }
        ?>
          <?php
								if($this->session->flashdata('universal_img_error')){
								?>
          <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> <?php echo $this->session->flashdata('universal_img_error');?> </div>
          <?php
								}
								?>
          <?php 
			   $attributes = array('class' => 'form-horizontal','id' => 'defaultForm');
			  
			   if($add=='Add'){
			   echo form_open_multipart(admin_url().'adduniversalcategory', $attributes);
			   }else  if($add=='Edit'){
			   echo form_open_multipart(admin_url().'edituniversalcategory/'.$univ_category_data[0]['id'], $attributes);
			   }
			   ?>
          <div class="box-body">
            <input type="hidden" name="old_img" value="<?php if(!empty($univ_category_data[0]['universal_img'])){ echo $univ_category_data[0]['universal_img']; } ?>" />
            <div class="form-group">
              <label class="col-sm-3 control-label">Universal Category</label>
              <div class="col-sm-9">
                <input type="text"  class="form-control" name="univ_category" placeholder="Enter Universal Category Name" value="<?php if(!empty($univ_category_data[0]['univ_category'])){ echo $univ_category_data[0]['univ_category']; } ?>" >
                <span class="field_error"><?php echo form_error('univ_category');?></span> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"> Image</label>
              <div class="col-sm-9">
                <input type="file" name="universal_img" />
                <span class="field_error"><?php echo form_error('universal_img');?></span>
                 <?php if(!empty($univ_category_data[0]['universal_img'])){?>
              <img src="<?php echo base_url();?>/public/uploads/category/<?php echo $univ_category_data[0]['universal_img'];?>" height="80px"  width="150px" />
              <?php } ?>
                 </div>
             
            </div>
        
          <div class="form-group">
        <label class="col-sm-3 control-label">Category</label>
			<div class="col-sm-9">
            <select class="form-control" name="multiple_cat[]" id="multiple_cat" multiple>
            
               <?php 
                $category=$this->db->order_by("category", "asc")->where('status',1)->get('tbl_category')->result();
				@$ustr=explode(",",$univ_category_data[0]['multiple_cate']);
				 unset($ustr[0]);
                foreach($category as $cate)
                {
				
				
				if(array_search($cate->id , $ustr)){
				 $selected = array_search($cate->id, $ustr) ? 'selected ' : '';
						
							
				?>
                 <option value="<?php echo $cate->id;?>" <?php echo $selected; ?> ><?php echo $cate->category;?></option>
                <?php
					
					
					
					
					}else{	
                ?>
               <option value="<?php echo $cate->id;?>"  ><?php echo $cate->category;?></option>
                <?php
                 }}
                ?>
            </select>
        </div>
    </div>

	 <div class="form-group">
        <label class="col-sm-3 control-label">Sub Category</label>
        <div class="col-sm-9">
            <select class="form-control" name="multiple_subcat[]" id="multiple_subcat" multiple>
            
               <?php 
			   @$ustrsub=explode(",",$univ_category_data[0]['multiple_subcate']);
			    unset($ustrsub[0]);
                $subcategory=$this->db->order_by("subcategory", "asc")->where('status',1)->get('tbl_subcategory')->result();
                foreach($subcategory as $subcate)
                {
				
				
				if(in_array($subcate->id , $ustrsub)){
				 $selected1 = in_array($subcate->id, $ustrsub) ? 'selected ' : '';
						
							
				?>
                 <option value="<?php echo $subcate->id;?>" <?php echo $selected1; ?> ><?php echo $subcate->subcategory;?></option>
                <?php
					
					
					
					
					}else{	
                ?>
               <option value="<?php echo $subcate->id;?>"  ><?php echo $subcate->subcategory;?></option>
                <?php
                 }}
                ?>
            </select>
        </div>
    </div>
	<?php //echo "<pre>"; print_r($univ_category_data[0]['multiple_innercate']); exit;?>
         <div class="form-group">
              <label class="col-sm-3 control-label">Innercategory</label>
              <div class="col-sm-9">
                <select name="multiple_innercate[]"  id="multiple_innercate" data-placeholder="Select Innercategory" class="form-control chosen-select" multiple>
                  <option value="">Select</option>
                  <?php 
				 
				@$multi_inner_id=explode(",",$univ_category_data[0]['multiple_innercate']);
		         unset($multi_inner_id[0]);
		         //$multi_inner_id=strint_view($multi_inner_id);
				//echo "<pre>"; print_($)
				$sql_subcategory="select * from tbl_innercategory where  status=1  order by innercategory asc";
				 $innercategory=$this->db->query($sql_subcategory)->result_array();
				 
				
                foreach($innercategory as $innercate)
                {
					
					
					 
					  if(in_array($innercate['id'] , $multi_inner_id)){
							 
				          $selected = in_array($innercate['id'], $multi_inner_id) ? 'selected ' : '';
					
					
						echo "<option value=".$innercate['id']." ".$selected.">".$innercate['innercategory']."</option>";
					}else {
						echo "<option value=".$innercate['id']."  >".$innercate['innercategory']."</option>";
						}
               
                }
                ?>
                </select>
              </div>
            </div>  
		  <div class="form-group">
              <label class="col-sm-3 control-label">Website link</label>
              <div class="col-md-9 ">
                <input type="text" class="form-control" name="shop_website"  placeholder="website Link" value="<?php if(!empty($univ_category_data[0]['website'])){ echo $univ_category_data[0]['website']; } ?>" >
              </div>
            </div>
		   <div class="form-group">
              <label class="col-sm-3 control-label">Address*</label>
              <div class="col-md-9 ">
                <textarea  class="form-control" name="shop_address" placeholder="Enter  Address"><?php if(!empty($univ_category_data[0]['address'])){ echo $univ_category_data[0]['address']; } ?>
				</textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">PIN Code</label>
              <div class="col-md-9 ">
                <input type="text" class="form-control" name="shop_zipcode"  placeholder="PIN Code" value="<?php if(!empty($univ_category_data[0]['pincode'])){ echo $univ_category_data[0]['pincode']; } ?>">
              </div>
            </div>
		  
		  
		  
		  
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
              <select name="status" class="form-control">
                <option value=1 <?php if(@$univ_category_data[0]['status']=='1'){ echo 'selected="selected"'; }?> >Active</option>
                <option value=0 <?php if(@$univ_category_data[0]['status']=='0'){ echo 'selected="selected"'; }?>>Inactive</option>
              </select>
              <span class="field_error"><?php echo form_error('status');?></span> </div>
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


<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!--<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrap-multiselect.js"></script> -->
<!-- page script --> 
<link href="<?php echo admin_assets_url(); ?>dist/css/bootstrap-chosen.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo admin_assets_url(); ?>dist/js/bootstrap-chosen.js"></script>
<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 
<script type="text/javascript">
    $(function() {$('#multiple_cat').chosen();
    });
	 $(function() {

    $('#multiple_subcat').chosen();
    });
	 $(function() {

    $('#multiple_innercate').chosen();
    });
</script>
<script type="text/javascript">
 function city_change(id)
   {
	 $.ajax({type:'post',
		    url:'<?PHP echo base_url()?>sabsetting/city_change',
		    data:{stateid:id},
		    success:function(res){
			                      //alert(res);
			  $('#city_id').html(res);
			 }
	      });
   }
 function location_change(id)
   {
	 $.ajax({type:'post',
		    url:'<?PHP echo base_url()?>sabsetting/location_change',
		    data:{locationid:id},
		    success:function(res){
			                      //alert(res);
			  $('#location_id').html(res);
			 }
	      });
   }
  
   </script> 
<script type="text/javascript">
$(document).ready(function() {
	
    $('#defaultForm').formValidation({
		framework: 'bootstrap',
        excluded: ':disabled',
        message: 'This value is not valid',
        fields: {
            // univ_category: {
                // validators: {
                    // notEmpty: {
                        // message: 'Please Enter Store.'
                    // },
					// /*regexp: {
                        // regexp: /^[a-zA-Z/ ]+$/,
                        // message: 'Category Name can only consist of alphabetical.'
                    // },*/
					
					  // <?php if($button=='Submit'){ ?>
					// remote: {
                          // url: '<?PHP echo base_url();?>sabsetting/add_unique_univ_category',
						    // type: 'POST',
                            // message: 'Store Name already exists'
                      // }
					// <?php }else {?>
					// remote: {
                           // url: '<?PHP echo base_url();?>sabsetting/edit_unique_univ_category',
						   // data: function(validator, $field, value) {
                            // return {
                                // univ_cate_id: <?= $univ_category_data[0]['id'];?>
                            // };
                        // },
						 // message: 'Store Name already exists',
                        // type: 'POST'
                           
                      // }
					// <?php }?>
                // }
            // },
			 // author_name: {
                // validators: {
                    // notEmpty: {
                        // message: 'Please Enter Author Name.'
                    // },
				// }
			 // },
			universal_img: {
                validators: {
					file: {
						extension: 'jpeg,jpg,png,gif',
                        type: 'image/jpeg,image/png,image/gif',
						 //maxSize: 250000,   // 2048 * 1024
                       
                        message: 'Please Select maximum  jpg png Image Only .'
                    }
                }
            },	 
			  status: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Status.'
                    }
					
                }
            }
        }
    })

        .find('[name="multiple_cat[]"]')
            .multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                // Re-validate the multiselect field when it is changed
                onChange: function(element, checked) {
                    $('#defaultForm').formValidation('revalidateField', 'multiple_cat[]');
					
                     // console.log($('#multiple_cat').val());
                    adjustByScrollHeight();
                },
                onDropdownShown: function(e) {
                    adjustByScrollHeight();
                },
                onDropdownHidden: function(e) {
                    adjustByHeight();
                }
            })
            .end();

    // You don't need to care about these methods
    function adjustByHeight() {
        var $body   = $('body'),
            $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe when hiding the picker
            $iframe.height($body.height());
        }
    }

    function adjustByScrollHeight() {
        var $body   = $('body'),
            $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe when showing the picker
            $iframe.height($body.get(0).scrollHeight);
        }
    }

});

           
</script>

</body></html>
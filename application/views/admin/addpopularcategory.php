<?php
  $button=@$this->uri->segment(2)=="editpopularcategorylisting"? "Update": "Submit";
  $add=@$this->uri->segment(2)=="editpopularcategorylisting"? "Edit": "Add";
 ?>

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Popularcategory Management </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo admin_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li ><a href="<?php echo admin_url().'popularcategory';?>">Popularcategory Managmenet</a></li>
      <li class="active"><?php echo $add;?> Popularcategory </li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-8 ">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $add;?> Popularcategory </h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start --> 
         
          <?php
								if($this->session->flashdata('addpopularcategory_add')){
								?>
          <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> <?php echo $this->session->flashdata('addpopularcategory_add');?> </div>
          <?php
								}
								?>
          <?php
        if($this->session->flashdata('popularcategorylisting_edit')){
        ?>
          <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> <?php echo $this->session->flashdata('popularcategorylisting_edit');?> </div>
          <?php
        }
        ?>
       
          <?php 
			   $attributes = array('class' => 'form-horizontal','id' => 'defaultForm');
			  
			   if($add=='Add'){
			   echo form_open_multipart(admin_url().'addpopularcategory', $attributes);
			   }else  if($add=='Edit'){
			   echo form_open_multipart(admin_url().'editpopularcategorylisting/'.$popularcategory_data[0]['id'], $attributes);
			   }
			   ?>
          <div class="box-body">
          
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Category</label>
              <div class="col-sm-9">
                <select name="category_id" class="form-control" >
               <option value="">Select Category</option>
                <?php 
                $category=$this->db->order_by("category", "asc")->where('status',1)->get('tbl_category')->result();
                foreach($category as $cate)
                {
					if($cate->id == $popularcategory_data[0]['category_id']){
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
            <label class="col-sm-3 control-label">Order By</label>
            <div class="col-sm-9">
              <input type="text" name="order_by" class="form-control" value="<?php if(!empty($popularcategory_data[0]['order_by'])){ echo $popularcategory_data[0]['order_by']; } ?>" maxlength="4">
               
              </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
              <select name="status" class="form-control">
                <option value=1 <?php if(@$popularcategory_data[0]['status']=='1'){ echo 'selected="selected"'; }?> >Active</option>
                <option value=0 <?php if(@$popularcategory_data[0]['status']=='0'){ echo 'selected="selected"'; }?>>Inactive</option>
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
<!-- page script --> 

<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        fields: {
			category_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Category.'
                    }
					
                }
            },
      	  order_by: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Order By Number.'
                    },
					digits: {
                            message: 'The Order By Number can contain digits only.'
                        },
					<?php if($button=='Submit'){ ?>	
						remote: {
                         url: '<?PHP echo base_url();?>sabsetting/add_unique_popularcategory_orderid',
						   message: 'Order By Number already exists ',
                           type: 'POST'
                           
                      }
					  <?php }else {?>
					  		remote: {
                            url: '<?PHP echo base_url();?>sabsetting/edit_unique_popularcategory_orderid',
						    data: function(validator, $field, value) {
                            return {
                                upopularcategory_id: <?= $popularcategory_data[0]['id'];?>
                            };
                           },
						   message: 'Order By Number already exists ',
                           type: 'POST'
                           
                      }
					  <?php }?>
                }
            },
					 
			  status: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Status.'
                    }/*,
					remote: {
                         url: '<?PHP echo base_url();?>sabsetting/popularcategory_status',
						   message: '8 Category active one time. ',
                           type: 'POST'
                           
                      }*/
					
                }
            }
        }
    });
});
</script>
</body></html>
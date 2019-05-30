<?php
$button = $this->uri->segment(2) == "editsubcategory" ? "Update" : "Submit";
$add = $this->uri->segment(2) == "editsubcategory" ? "Edit" : "Add";


?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Sub category Management </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="<?php echo admin_url() . 'subcategory'; ?>">Sub category Managmenet</a></li>
            <li class="active"><?php echo $add; ?> Subcategory </li>
        </ol>
    </section>
<?php
// debug($add);
// debug($button);


?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-8 ">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $add; ?> Sub category </h3>
                    </div>
                    <!-- /.box-header --> 
                    <!-- form start --> 

                    <?php
                    if ($this->session->flashdata('subcategory_add')) {
                        ?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('subcategory_add'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('subcategory_edit')) {
                        ?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('subcategory_edit'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('subcategory_img_error')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('subcategory_img_error'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->flashdata('subcategorymobile_img_error')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('subcategorymobile_img_error'); ?> </div>
                        <?php
                    }
                    ?>
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'defaultForm','enctype'=>'multipart/form-data');
// debug($add);
                    if ($add == 'Add') {
                        echo form_open_multipart(admin_url() . 'addsubcategory', $attributes);
                    } else if ($add == 'Edit') {
                        echo form_open_multipart(admin_url() . 'editsubcategory/' . $subcategory_data[0]['id'], $attributes);
                    }
                    ?>
                    <div class="box-body">
                    
					 
						
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" id="category_id" class="form-control" >
                                    <option value="">Select Category</option>
                                    <?php
                                    $category = $this->db->order_by("category", "asc")->where('status', 1)->get('tbl_category')->result();
                                    foreach ($category as $cate) {
                                        if ($cate->id == $subcategory_data[0]['category_id']) {
                                            echo "<option value=" . $cate->id . " selected >" . $cate->category . "</option>";
                                        } else {
                                            ?>
                                            <option value=<?php echo $cate->id; ?>  ><?php echo $cate->category; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
								<span class="marked">(Category marked in English will display in this dropdown).</span>
                                <span class="field_error"><?php echo form_error('category_id'); ?></span> </div>
                        </div>
                        <?php
                        // $tagsarray = explode(',', $subcategory_data[0]['tags']);
                        //echo "<pre>"; print_r($subcategory_data); exit;
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sub category (English)</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="subcategory" placeholder="Enter Sub category Name" value="<?php
                                if (!empty($subcategory_data[0]['subcategory'])) {
                                    echo $subcategory_data[0]['subcategory'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('subcategory'); ?></span> </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label">Sub category (French)</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="fr_subcategory" placeholder="Enter French sub category Name" value="<?php
                                if (!empty($subcategory_data[0]['fr_subcategory'])) {
                                    echo $subcategory_data[0]['fr_subcategory'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('fr_subcategory'); ?></span> </div>
                        </div>
						 <div class="form-group">
                            <label class="col-sm-3 control-label">Sub category (Dutch) </label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="dut_subcategory" placeholder="Enter Dutch sub category Name" value="<?php
                                if (!empty($subcategory_data[0]['dut_subcategory'])) {
                                    echo $subcategory_data[0]['dut_subcategory'];
                                }
                                ?>" >
                                <span class="field_error"><?php echo form_error('dut_subcategory'); ?></span> </div>
                        </div>
                  
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
                                    <option value=1 <?php
                                    if (@$subcategory_data[0]['status'] == '1') {
                                        echo 'selected="selected"';
                                    }
                                    ?> >Active</option>
                                    <option value=0 <?php
                                    if (@$subcategory_data[0]['status'] == '0') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>Inactive</option>
                                </select>
                                <span class="field_error"><?php echo form_error('status'); ?></span> </div>
                        </div>
						
						
						 <div class="form-group data_pdf">
                            <label class="col-sm-3 control-label">Upload Image</label>
                            <div class="col-sm-9">
                                <input type="file"  class="form-control" name="image_name" >
								<input type="hidden"  class="form-control" name="old_img"  value="<?php if(isset($subcategory_data[0]['subimage'])) { echo $subcategory_data[0]['subimage'];}?>">
                                <span class="field_error"><?php echo form_error('category'); ?></span> </div>
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
<link href="<?php echo admin_assets_url(); ?>dist/css/bootstrap-chosen.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo admin_assets_url(); ?>dist/js/bootstrap-chosen.js"></script>
<script type="text/javascript">
    $(function() {

    $('#tags_id').chosen();
    });</script>
<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 

<!-- jquery validate js --> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo admin_assets_url(); ?>dist/js/bootstrapValidator.js"></script> 
<script type="text/javascript">
function uni_category_change(id)
   {
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

</body></html>
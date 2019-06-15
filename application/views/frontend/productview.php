<?php $lang = $this->session->userdata('lang');?>
<div class="content-wrapper" style="margin:60px 107px 60px 107px;"> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12"> 
							
				<nav aria-label="breadcrumb" class="product_breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
				<?php if($catname!='') { ?>	
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>subcategory/<?php echo $product_data[0]['category_id']; ?>"><?php echo $catname; ?></a></li>
				<?php } ?>
				<?php if($subcategory!='') { ?>	
				<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>innercategory/<?php echo $product_data[0]['category_id']; ?>/<?php echo $product_data[0]['subcategory_id']; ?>"><?php echo $subcategory; ?></a></li>
				
				<?php } ?>
				
					<li class="breadcrumb-item active" aria-current="page">	
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo (
					$product_data[0]['product_name']); }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { 
					echo ($product_data[0]['fr_product_name']); }
					else{ echo ($product_data[0]['dut_product_name']); }
				?></li>
				  </ol>
				</nav>
			
			
			
				 <div class="box box-info">
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo ($product_data[0]['product_data']); }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo ($product_data[0]['fr_product_data']); }
					else{ echo ($product_data[0]['dut_product_data']); }
				?>
				 
				 </div>
			 </div>
		</div>
	 </section>		
</div>			

    <!--End rev slider wrapper-->


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
   <?php $this->load->view('frontend/footer'); ?>
    <!--End footer Section-->

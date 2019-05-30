<?php $lang = $this->session->userdata('lang');?>
<div class="content-wrapper" style="margin:60px 107px 60px 107px;"> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12"> 
				 <div class="box box-info">
				 <?php //echo ($product_data[0]['product_data']); ?>
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

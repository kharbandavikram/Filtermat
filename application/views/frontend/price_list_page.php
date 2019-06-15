<?php $lang = $this->session->userdata('lang'); ?>
<section class="about-section product_sec">
   <div class="container">
      <div class="row">
         <div class="col-md-2">
		 
		 <?php $this->load->view('frontend/include/sidebar_filter',array(
				'lang'=>$lang,
				'sidebarcategory'=>$sidebarcategory
				)); ?>
         </div>
         <div class="col-md-10">
            <div class="container">
            <div class="row">
			<div class="background-color price_list_table">
			<?php
			if(!empty($get_pricelistpage_data[0]['description'])){
				echo $get_pricelistpage_data[0]['description'];
			}else{
					?>
					<h3 style="text-align:center;">No Data Exist</h3>
					<?php 
					
				}
			?>
             
			</div>
			</div>
			</div>
         </div>
      </div>
   </div>
</section>
<?php $this->load->view('frontend/footer'); ?>
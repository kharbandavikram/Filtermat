<?php $lang = $this->session->userdata('lang');  ?>
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
            <div class="row">
			<div class="background-color">
				<h2>
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { 
						echo  "Customer Price List"; 	
					}else if(!empty($lang['lang']) && $lang['lang']=='fr') {
						echo "Liste de prix client";  
					}else{
						echo "Klant prijslijst";
					}
				?>
				
				
				 </h2> 
			<?php 
			 if(count($get_sub_category) > 0){ 
				foreach($get_sub_category as $subcategory){?>
				<div class="col-md-3">
				<?php if(!empty($subcategory['subimage'])) { ?>
				<img src="<?php echo assets_url().'category/'.$subcategory['subimage'];?>">
				<?php } else {?>
				<img src="<?php echo assets_url().'category/no-image.jpg';?>">
				<?php } ?>
				<h3>
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $subcategory['eng_sub_titles']; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $subcategory['fr_sub_titles']; }
					else{ echo $subcategory['dut_sub_titles']; }
				?>
				</h3>
				<p><a  class="btn btn-sm animated-button" href="<?php echo base_url().'price/list/products/'.$subcategory['subcategory_id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Sub Categories"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir les sous catégories"; }
						else{ echo "Subcategorieën bekijken"; }
					?>
				</a></p>
				</div><?php
				} 
				}else{
					?>
					<h3 style="text-align:center;">No Data Exist</h3>
					<?php 
					
				}
			?>
             
			</div></div>
         </div>
      </div>
   </div>
</section>
<?php $this->load->view('frontend/footer'); ?>
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
            <div class="row">
			<div class="background-color">
			<h2>All Categories</h2>
			<?php 
			
				if(count($sidebarcategory) > 0){ 
				foreach($sidebarcategory as $sidebarcategoryinfo){?>
				<div class="col-md-3">
				<?php if(!empty($sidebarcategoryinfo['image'])) { ?>
				<img src="<?php echo assets_url().'category/'.$sidebarcategoryinfo['image'];?>">
				<?php } else { ?>
				<img src="<?php echo assets_url().'category/no-image.jpg';?>">
				<?php } ?>
				<h3>
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $sidebarcategoryinfo['category']; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $sidebarcategoryinfo['fr_category']; }
					else{ echo $sidebarcategoryinfo['dut_category']; }
					?>
				</h3>
				
				<p><a  class="btn btn-sm animated-button" href="<?php echo base_url().'subcategory/'. $sidebarcategoryinfo['id'];?>">
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Categories"; }
				else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir les catégories"; }
				else{ echo "Categorieën bekijken"; }
				?>
				</a></p>
				</div><?php
				} 
				}
			
			?>
             
			</div></div>
         </div>
      </div>
   </div>
</section>
<?php $this->load->view('frontend/footer'); ?>
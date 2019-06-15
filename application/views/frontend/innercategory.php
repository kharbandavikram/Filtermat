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
						
				<nav aria-label="breadcrumb" class="product_breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>subcategory/<?php if(isset($catname[0]['category'])) {echo $catname[0]['id'];} ?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { 
					if(isset($catname[0]['category'])) {echo $catname[0]['category'];} 

					}
				else if(!empty($lang['lang']) && $lang['lang']=='fr') {
				if(isset($catname[0]['fr_category'])) {echo $catname[0]['fr_category'];} 
				}
				else{ 
				if(isset($catname[0]['dut_category'])) {echo $catname[0]['dut_category'];} 
				}
				?></a></li>
					
					<li class="breadcrumb-item active" aria-current="page">	
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { 
				if(isset($subcatname[0]['subcategory'])) { echo $subcatname[0]['subcategory'];} 

				}
				else if(!empty($lang['lang']) && $lang['lang']=='fr') {
				if(isset($subcatname[0]['fr_subcategory'])) {echo $subcatname[0]['fr_subcategory'];} 
				}
				else{ 
				if(isset($subcatname[0]['dut_subcategory'])) {echo $subcatname[0]['dut_subcategory'];} 
				}
				?></li>
				  </ol>
				</nav>	
			
			<div class="background-color">
			<?php   //if(count($innercategory) > 0){  ?>
			<!--<h2>

				<?php// if(!empty($lang['lang']) && $lang['lang']=='en') { 
			//	if(isset($subcatname[0]['subcategory'])) { echo $subcatname[0]['subcategory'].' (Subcategories)';} 

				//}
				//else if(!empty($lang['lang']) && $lang['lang']=='fr') {
				//if(isset($subcatname[0]['fr_subcategory'])) {echo $subcatname[0]['fr_subcategory'].' (Sous-catégories)';} 
				//}
				//else{ 
				//if(isset($subcatname[0]['dut_subcategory'])) {echo $subcatname[0]['dut_subcategory'].' //(subcategorieën)';} 
				//}
				?>
			</h2>-->  <?php ///} ?>
			<?php 
			   if(count($innercategory) > 0){ 
				foreach($innercategory as $innercategoryinfo){
			if(isset($innercategoryinfo['id']) && $innercategoryinfo['type']=='1') { ?>
				<div class="col-md-3">
				<?php if(!empty($innercategoryinfo['innercatimage'])) { ?>
				<img src="<?php echo assets_url().'category/'.$innercategoryinfo['innercatimage'];?>">
				<?php } else { ?>
				<img src="<?php echo assets_url().'category/no-image.jpg';?>">
				<?php } ?>
				<h3>
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $innercategoryinfo['name']; }
				else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $innercategoryinfo['fr_innercategory']; }
				else{ echo $innercategoryinfo['dut_innercategory']; }
				?>
				</h3>
				
				<p><a class="btn btn-sm animated-button thar-two" href="<?php echo base_url().'product/'. $this->uri->segment(2).'/'. $this->uri->segment(3).'/'.$innercategoryinfo['id'];?>">
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Products"; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir les produits"; }
					else{ echo "Bekijk de producten"; }
				?>
				</a></p>
				
				</div><?php
				}
                }				
				}
				
			?>
             
			</div></div>
			
			
			
			<div class="row">
			<div class="background-color">
			<?php //if(count($innercategoryproduct) > 0){  ?>
			<!--<h2><?php //if(!empty($lang['lang']) && $lang['lang']=='en') { 
				//if(isset($subcatname[0]['subcategory'])) {echo $subcatname[0]['subcategory'].' (Products)';} 
				//}else if(!empty($lang['lang']) && $lang['lang']=='fr'){
					//if(isset($subcatname[0]['fr_subcategory'])) {echo $subcatname[0]['fr_subcategory'].' (Les Produits)';}
				//}else{ 
				//if(isset($subcatname[0]['dut_subcategory'])) {echo $subcatname[0]['dut_subcategory'].' (producten)';}
				//}?></h2>-->
				<?php //} ?>
			<?php 
			   if(count($innercategoryproduct) > 0){ 
				foreach($innercategoryproduct as $innercategoryproduct){
			if(isset($innercategoryproduct['id']) && $innercategoryproduct['type']=='2') { ?>
				<div class="col-md-3">
				<?php if(!empty($innercategoryproduct['productimage'])) { ?>
				<img src="<?php echo assets_url().'category/'.$innercategoryproduct['productimage'];?>">
				
				<?php //innercatimage
				
					} else { ?>
				<img src="<?php echo assets_url().'category/no-image.jpg';?>">
				<?php } ?>
				<h3>
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $innercategoryproduct['name']; }
				else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $innercategoryproduct['fr_product_name']; }
				else{ echo $innercategoryproduct['dut_product_name']; }
				?>
				</h3>
				
				<p><a class="btn btn-sm animated-button thar-two prod-btn" href="<?php echo base_url().'showproduct/'.$innercategoryproduct['id'];?>">
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Read more"; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Savoir Plus"; }
					else{ echo "Lees meer"; }
				?>
				</a>
				<?php if(!empty($innercategoryproduct['product_text_button'])) { ?>
				<a  class="btn btn-sm animated-button thar-two red-color prod-btn"  href="<?php echo $innercategoryproduct['product_text_button'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Buy"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "acheter"; }
						else{ echo "kopen"; }
					?>
				</a>
				<?php } ?>
				
				
				
				</p>
				
				
					
				
				</div><?php
				}
                }				
				}
			?>
             
			</div></div>
         </div>
      </div>
   </div>
</section>
<?php $this->load->view('frontend/footer'); ?>
<?php $lang = $this->session->userdata('lang');?>
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
				  <?php 
						$cat_name1='';
						$sub_cat1='';
						$inner_cat1='';
						$catID='';
						$sub_catID='';
						$inner_catID='';
						if(isset($catname[0]['category'])) {
						$cat_name1=$catname[0]['category'];
						$catID=$catname[0]['id'];
						} 

						if(isset($getsubcategory[0]['subcategory'])) {
						$sub_cat1=$getsubcategory[0]['subcategory'];
						$sub_catID=$getsubcategory[0]['id'];
						} 

						if(isset($innercategory[0]['innercategory'])) {
						$inner_cat1=$innercategory[0]['innercategory'];
						$inner_catID=$innercategory[0]['id'];
						} 
				  
				  if(!empty($lang['lang']) && $lang['lang']=='en') { 
					$cat_name=$cat_name1;
					$sub_cat=$sub_cat1;
					$inner_cat=$inner_cat1;
					}else if(!empty($lang['lang']) && $lang['lang']=='fr') {
					$cat_name=$cat_name1;
					$sub_cat=$sub_cat1;
					$inner_cat=$inner_cat1;
					}
					else{ 
					$cat_name=$cat_name1;
					$sub_cat=$sub_cat1;
					$inner_cat=$inner_cat1;
					}
				?>
				  
				  
				  
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<?php if($cat_name!=''){ ?>
					<li class="breadcrumb-item " aria-current="page"><a href="<?php echo base_url(); ?>subcategory/<?php echo $catID; ?>">
					<?php echo $cat_name; ?></a>
					</li>	
					<?php } ?>
					<?php if($sub_cat!=''){ ?>
					<li class="breadcrumb-item " aria-current="page"><a href="<?php echo base_url(); ?>innercategory/<?php echo $catID.'/'.$sub_catID; ?>">	
					<?php echo $sub_cat; ?></a>
					</li>
					<?php } ?>
					<?php if($inner_cat!=''){ ?>
					<li class="breadcrumb-item Active" aria-current="page">
					<?php echo $inner_cat; ?>
					</li>
					<?php } ?>
				  </ol>
				</nav>
			
			<div class="background-color">
			<!--<h2><?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo 'Products'; }else if(!empty($lang['lang']) && $lang['lang']=='fr'){ echo 'Des produits';}else{ echo 'producten';}?></h2>-->
			<?php
			if(count($getproduct) > 0){ 
				foreach($getproduct as $getproductinfo){?>
				<div class="col-md-3">
				<?php if(!empty($getproductinfo['productimage'])) { ?>
				<img src="<?php echo assets_url().'product/'.$getproductinfo['productimage'];?>">
				<?php } else { ?>
               <img src="<?php echo assets_url().'category/no-image.jpg';?>">
				<?php } ?>
				<h3>
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $getproductinfo['product_name']; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $getproductinfo['fr_product_name']; }
						else{ echo $getproductinfo['dut_product_name']; }
					?>
				</h3>
				<p><a   class="btn btn-sm animated-button prod-btn" target="_blank" href="<?php echo base_url().'showproduct/'.$getproductinfo['id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir le produit"; }
						else{ echo "Bekijk product"; }
					?>
				</a></p>
				<?php if(!empty($getproductinfo['product_text_button'])) { ?>
				<p><a  class="btn btn-sm animated-button prod-btn red-color" target="_blank" href="<?php echo $getproductinfo['product_text_button'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Buy"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Acheter ce produit"; }
						else{ echo "Koop dit product"; }
					?>
				</a></p>
				<?php } ?>
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
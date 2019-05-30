<?php $lang = $this->session->userdata('lang');?>
<section class="about-section product_sec">
   <div class="container">
      <div class="row">
         <div class="col-md-2">
            <ul>
			<li class="main_heading"><a href="<?php echo base_url().'category/';?>">
			<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "All Categories"; }
			else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "toutes catégories"; }
			else{ echo "Alle categorieën"; }
			?>
			</a></li>
			<?php if(count($sidebarcategory) > 0){ 
				foreach($sidebarcategory as $sidebarcategoryinfo){?>
					<li style="<?php if($sidebarcategoryinfo['id']==$this->uri->segment(2)) { echo"background-color:#2991d6;";}?>"><a  style="<?php if($sidebarcategoryinfo['id']==$this->uri->segment(2)) { echo"color:#fff;";}?>"href="<?php echo base_url().'subcategory/'. $sidebarcategoryinfo['id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $sidebarcategoryinfo['category']; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $sidebarcategoryinfo['fr_category']; }
					else{ echo $sidebarcategoryinfo['dut_category']; }
					?>
					
					</a></li><?php 
				}
			}?>
            </ul>
         </div>
         <div class="col-md-10">
            <div class="row">
			<div class="background-color">
			<h2><?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo 'Products'; }else if(!empty($lang['lang']) && $lang['lang']=='fr'){ echo 'Des produits';}else{ echo 'producten';}?></h2>
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
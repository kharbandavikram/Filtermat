<?php $lang = $this->session->userdata('lang');?>
<section class="about-section product_sec">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <ul>
			<li class="main_heading"><a href="<?php echo base_url().'category/';?>">
			<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "All Categories"; }
			else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "toutes catégories"; }
			else{ echo "Alle categorieën"; }
			?>
			</a></li>
			<?php if(count($sidebarcategory) > 0){ 
				foreach($sidebarcategory as $sidebarcategoryinfo){?>
					<li style="<?php if($sidebarcategoryinfo['id']==$this->uri->segment(3)) { echo"background-color:#2991d6;";}?>"><a  style="<?php if($sidebarcategoryinfo['id']==$this->uri->segment(3)) { echo"color:#fff;";}?>"href="<?php echo base_url().'welcome/getsubcategory/'. $sidebarcategoryinfo['id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $sidebarcategoryinfo['category']; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $sidebarcategoryinfo['fr_category']; }
					else{ echo $sidebarcategoryinfo['dut_category']; }
					?>
					
					</a></li><?php 
				}
			}?>
            </ul>
         </div>
         <div class="col-md-9">
            <div class="row">
			<?php 
			if($this->uri->segment(3) && $this->uri->segment(4) && $this->uri->segment(5)){
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
				<p><a  target="_blank" href="<?php echo base_url().'welcome/showproduct/'.$getproductinfo['id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Product"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir le produit"; }
						else{ echo "Bekijk product"; }
					?>
				</a></p>
				<?php if(!empty($getproductinfo['product_text_button'])) { ?>
				<p><a  target="_blank" href="<?php echo $getproductinfo['product_text_button'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Buy This Product"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Acheter ce produit"; }
						else{ echo "Koop dit product"; }
					?>
				</a></p>
				<?php } ?>
				</div><?php
				} 
				}
			}
			
			else if($this->uri->segment(3) && $this->uri->segment(4)){
				
				if(count($innercategory) > 0){ 
				foreach($innercategory as $innercategoryinfo){?>
				<div class="col-md-3">
				<?php if(!empty($innercategoryinfo['innercatimage'])) { ?>
				<img src="<?php echo assets_url().'category/'.$innercategoryinfo['innercatimage'];?>">
				<?php } else { ?>
				<img src="<?php echo assets_url().'category/no-image.jpg';?>">
				<?php } ?>
				<h3>
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $innercategoryinfo['innercategory']; }
				else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $innercategoryinfo['fr_innercategory']; }
				else{ echo $innercategoryinfo['dut_innercategory']; }
				?>
				</h3>
				
				<p><a href="<?php echo base_url().'welcome/getproduct/'. $this->uri->segment(3).'/'. $this->uri->segment(4).'/'.$innercategoryinfo['id'];?>">
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Products"; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir les produits"; }
					else{ echo "Bekijk de producten"; }
				?>
				</a></p>
				</div><?php
				} 
				}
			}
			else if($this->uri->segment(3)){
				if(count($getsubcategory) > 0){ 
				foreach($getsubcategory as $getsubcategoryinfo){?>
				<div class="col-md-3">
				<?php if(!empty($getsubcategoryinfo['subimage'])) { ?>
				<img src="<?php echo assets_url().'category/'.$getsubcategoryinfo['subimage'];?>">
				<?php } else {?>
				<img src="<?php echo assets_url().'category/no-image.jpg';?>">
				<?php } ?>
				<h3>
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $getsubcategoryinfo['subcategory']; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $getsubcategoryinfo['fr_subcategory']; }
					else{ echo $getsubcategoryinfo['dut_subcategory']; }
				?>
				</h3>
				<p><a href="<?php echo base_url().'welcome/innercategory/'. $this->uri->segment(3).'/'.$getsubcategoryinfo['id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Sub Categories"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir les sous catégories"; }
						else{ echo "Subcategorieën bekijken"; }
					?>
				</a></p>
				</div><?php
				} 
				}
				
			}
			else{
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
				
				<p><a href="<?php echo base_url().'welcome/getsubcategory/'. $sidebarcategoryinfo['id'];?>">
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View Categories"; }
				else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir les catégories"; }
				else{ echo "Categorieën bekijken"; }
				?>
				</a></p>
				</div><?php
				} 
				}
			}
			?>
             
			</div>
         </div>
      </div>
   </div>
</section>
<?php $this->load->view('frontend/footer'); ?>
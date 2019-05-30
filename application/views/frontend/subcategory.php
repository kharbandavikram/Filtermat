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
				<h2>
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { 
					if(isset($catname[0]['category'])) {echo $catname[0]['category'];} 

				}
				else if(!empty($lang['lang']) && $lang['lang']=='fr') {
				if(isset($catname[0]['fr_category'])) {echo $catname[0]['fr_category'];} 
				}
				else{ 
				if(isset($catname[0]['dut_category'])) {echo $catname[0]['dut_category'];} 
				}
				?>
				
				
				 </h2> 
			<?php 
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
				<p><a  class="btn btn-sm animated-button" href="<?php echo base_url().'innercategory/'. $this->uri->segment(2).'/'.$getsubcategoryinfo['id'];?>">
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
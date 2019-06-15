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
			<?php if(!empty($lang['lang']) && $lang['lang']=='en') { 
					$customer_pricelist='CUSTOMER PRICE LIST';
					$pricelist='PRICE LIST';
					}else if(!empty($lang['lang']) && $lang['lang']=='fr') {
					$customer_pricelist='LISTE DES PRIX CLIENTS';
					$pricelist='LISTE DE PRIX';
					}
					else{ 
					$customer_pricelist='KLANT PRIJSLIJST';
					$pricelist='PRIJSLIJST';
					}
				?>
	
		<nav aria-label="breadcrumb" class="product_breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">	
						<?php if($getproduct[0]['price_list_status']=='0'){
						echo $pricelist;
						}else{
						echo $customer_pricelist;
						}?>	
					</li>
				  </ol>
				</nav>
				
			<div class="background-color">
			<!--<h2>
			<?php //if(!empty($lang['lang']) && $lang['lang']=='en') { 
			//if(isset($subcatname[0]['subcategory'])) { echo $subcatname[0]['subcategory'].' (Products)';} 
			//}else if(!empty($lang['lang']) && $lang['lang']=='fr'){
			//if(isset($subcatname[0]['fr_subcategory'])) { echo $subcatname[0]['fr_subcategory'].' (Des produits)';} 
			//}else{
			//if(isset($subcatname[0]['dut_subcategory'])) { echo $subcatname[0]['dut_subcategory'].' (producten)';} 
			//}?></h2>-->
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
				<p><a   class="btn btn-sm animated-button prod-btn"  href="<?php echo base_url().'price/list/showproducts/'.$getproductinfo['id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir le produit"; }
						else{ echo "Bekijk product"; }
					?>
				</a></p>
				<?php if(!empty($getproductinfo['product_text_button'])) { ?>
				<p><a  class="btn btn-sm animated-button prod-btn red-color"  href="<?php echo $getproductinfo['product_text_button'];?>">
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
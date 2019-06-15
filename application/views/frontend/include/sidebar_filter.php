<?php $frontlogin_data1 = $this->session->userdata('frontlogin_data1');?>   
   
   <ul>
			<li class="main_heading"><a href="<?php echo base_url().'category/';?>">
			<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "All Categories"; }
			else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "toutes catégories"; }
			else{ echo "Alle categorieën"; }
			?>
			</a></li>
			<?php if(count($sidebarcategory) > 0){ 
				foreach($sidebarcategory as $sidebarcategoryinfo){?>
					<li style="<?php if($sidebarcategoryinfo['id']==$this->uri->segment(2)) { echo"background-color:#2991d6;";}?>"><i class="fa fa-angle-left" aria-hidden="true" style="<?php if($sidebarcategoryinfo['id']==$this->uri->segment(2)) { echo"color:#fff;";}?>"></i><a  style="<?php if($sidebarcategoryinfo['id']==$this->uri->segment(2)) { echo"color:#fff;";}?>"href="<?php echo base_url().'subcategory/'. $sidebarcategoryinfo['id'];?>">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo $sidebarcategoryinfo['category']; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo $sidebarcategoryinfo['fr_category']; }
					else{ echo $sidebarcategoryinfo['dut_category']; }
					?>
					
					</a></li><?php 
				}
			}?>
			<?php 
				if(!empty($lang['lang']) && $lang['lang']=='en') { 
					$customer_login= "Customer Price List"; 
					$price_list= "Price List"; 
					$customer_price_list= "Customer Price List"; 
					$logout= "Logout"; 
					$action= "Action"; 
				}else if(!empty($lang['lang']) && $lang['lang']=='fr') { 
					$customer_login= "Login client"; 
					$price_list= "Liste de prix"; 
					$customer_price_list= "Liste de prix client"; 
					$logout= "Connectez - Out"; 
					$action= "action"; 
				}else{ 
					$customer_login= "Klant login"; 
					$price_list= "Prijslijst"; 
					$customer_price_list= "Klant prijslijst"; 
					$logout= "Uitloggen"; 
					$action= "Actie"; 
				}
				?>
			
			<li class="main_heading customer_logindiv"><a href="javascript:void(0);">
			<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Price"; }
			else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Prix"; }
			else{ echo "Prijs"; }
			?>
			</a></li>
			
			<?php 
			// if(){
				
				
			// }
			
			
			if(!empty($frontlogin_data1)){ ?>
				<li><div class="customer_login"><div class="login_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><a href="<?php echo base_url().'price/list';?>"><?php echo $customer_price_list; ?></a></div></div></li>
				<li><div class="customer_login"><div class="login_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><a href="<?php echo base_url().'price-list'; ?>" ><?php echo $price_list; ?></a></div></div></li>
				
				
				<li class="main_heading customer_logindiv"><a href="javascript:void(0);"><?php echo $action; ?>
				</a></li>	
				
				<li><div class="customer_login"><div class="login_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><a href="<?php echo base_url().'logout/';?>"><?php echo $logout; ?></a></div></div></li>
			<?php }else{ ?>
				<li><div class="customer_login"><div class="login_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><a href="<?php echo base_url().'login/';?>"><?php echo $customer_login; ?></a></div></div></li>
				
				<li><div class="customer_login"><div class="login_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><a href="<?php echo base_url().'price/list'; ?>"><?php echo $price_list; ?></a></div></div></li>
				
			<?php }
				?>
			
		
		
            </ul>
			
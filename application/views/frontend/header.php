<?php $lang = $this->session->userdata('lang');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Filtermat filters</title>

<!-- Stylesheets -->
<link href="<?php echo assets_url(); ?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo assets_url(); ?>css/responsive.css" rel="stylesheet">
<link href="<?php echo assets_url(); ?>css/style.css?v=3" rel="stylesheet">
<link href="<?php echo assets_url(); ?>css/product-css.css?v=3" rel="stylesheet">
<script src="<?php echo assets_url(); ?>js/jquery.js"></script>
<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<style>
.link-logo-btn { float: left;}
.carent_li{
    padding-left: 5px !important;	
}
.main-menu .navigation .carent_li:before{
background:unset !important;	
}


.main-menu .navigation .carent_li ul{
left: -86px !Important;}
</style>

<body>
<div class="page-wrapper"> 	
 	<!-- Preloader -->
    <div class="preloader">
	<div class="lds-facebook"><div></div><div></div><div></div></div>
	</div>
    <!-- Preloader -->
	<!--Header Upper-->
   
    <!--End Header Top-->

       
    <!--Main Header-->
    <header class="main-header sticky-header style-two1">
        <div class="container">
		<div class="row">
            <div class="header-area clearfix">
			<div class="col-md-2 col-xs-2 logo_header">
			  <div class="header_logo">
			<a href="<?php echo base_url();?>"><h1 class="">Filtermat</h1></a>
			 <!--<a href="<?php echo base_url();?>"><img src="http://www.filtermat.be/FMlogo1.gif" name="FMlogo" border="0" alt=""></a>-->
			 
			 
			   <!-- <a href="<?php echo base_url();?>"><img src="<?php echo assets_url(); ?>images/FMlogo2.png" alt=""></a> -->
			  </div></div>
			  <div class="col-md-8  col-xs-8">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->      
                        <button type="button" class="" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>           
                    <div class="navbar-collapse collapse clearfix">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
						<ul class="navigation clearfix">
						
						<li><a href="<?php echo base_url();?>">Home</a></li> 
						
						<!---Desktop------------>
						<li class="product_search">
						<a href="<?php echo base_url();?>category" onmouseover="show_dropdown(this)" >Products </a>
							<ul class="dropdown-content"><?php 
								if(count($menu) > 0){ 
									foreach($menu as $menuinfo){?>
									<li><a href="<?php echo base_url().'subcategory/'. $menuinfo['id'];?>"><?php echo $menuinfo['category']?></a></li><?php 
									}
								 }	?>
							</ul> 
						</li>
						<!---------Desktop End------------>
						
                        <li><a href="<?php echo base_url().'contact' ?>">Contact</a></li>
						</ul>
					  <?php } else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
						   <ul class="navigation clearfix">
							<li><a href="<?php echo base_url();?>">Home</a></li> 
							
							
						<!---Desktop------------>
						<li class="product_search">
						<a href="<?php echo base_url();?>category" onmouseover="show_dropdown(this)" >Des produits </a>
							<ul class="dropdown-content"><?php 
								if(count($menu) > 0){ 
									foreach($menu as $menuinfo){?>
									<li><a href="<?php echo base_url().'subcategory/'. $menuinfo['id'];?>"><?php echo $menuinfo['category']?></a></li><?php 
									}
								 }	?>
							</ul> 
						</li>
						<!---------Desktop End------------>
						
						
							
							<li><a href="<?php echo base_url().'contact' ?>">Contact</a></li>
							</ul>
					  
					  <?php } else { ?>
								  <ul class="navigation clearfix">
										<li><a href="<?php echo base_url();?>">Home</a></li> 	
										
								
						<!---Desktop------------>
						<li class="product_search">
						<a href="<?php echo base_url();?>category" onmouseover="show_dropdown(this)" >producten </a>
							<ul class="dropdown-content"><?php 
								if(count($menu) > 0){ 
									foreach($menu as $menuinfo){?>
									<li><a href="<?php echo base_url().'subcategory/'. $menuinfo['id'];?>"><?php echo $menuinfo['category']?></a></li><?php 
									}
								 }	?>
							</ul> 
						</li>
						<!---------Desktop End------------>
						
						
										
							<li><a href="<?php echo base_url().'contact' ?>">Contact</a></li>
								 </ul>
					  <?php } ?>
					  
					
                    </div>                    
                </nav></div>
				<div class="col-md-2  col-xs-2">
               <div class="link-btn">
                    	   <div id="polyglotLanguageSwitcher" class="">
				   <?php if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
				    <a id="fr" class="current lang-convert" href="#">French</a><span class="trigger" id="trigger-btn"></span>
					  <ul class="dropdown" style="display: none;" id="ul-dropdown">
						 <li><a id="en" href="<?php echo base_url();?>languageswitcher/en">English</a></li>
						 <li><a id="de" href="<?php echo base_url();?>languageswitcher/de">Dutch</a></li>
					 </ul>
				   <?php } 
				   else if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
					  <a id="en" class="current lang-convert1" href="#">English</a><span class="trigger" id="trigger-btn"></span>
					  <ul class="dropdown" style="display: none;" id="ul-dropdown">
						 <li><a id="fr" href="<?php echo base_url();?>languageswitcher/fr">French</a></li>
						 <li><a id="de" href="<?php echo base_url();?>languageswitcher/de">Dutch</a></li>
					 </ul>
				   <?php }else{ ?>
					   <a id="de" class="current lang-convert1" href="#">Dutch</a><span class="trigger" id="trigger-btn"></span>
					  <ul class="dropdown" style="display: none;" id="ul-dropdown">
						 <li><a id="en" href="<?php echo base_url();?>languageswitcher/en">English</a></li>
							 <li><a id="fr" href="<?php echo base_url();?>languageswitcher/fr">French</a></li>
					 </ul> 
				   <?php } ?>
				   </div>
                </div></div>
            </div>
</div>			
        </div>
    </header>
	
<script>
function show_dropdown(){
$('.product_search').addClass('dropdown');
}	
</script>	
    <!--End Main Header -->

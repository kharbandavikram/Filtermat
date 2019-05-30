<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Filtermat filters</title>

<!-- Stylesheets -->
<link href="<?php echo assets_url(); ?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo assets_url(); ?>css/responsive.css" rel="stylesheet">
<link href="<?php echo assets_url(); ?>css/style.css?v=3.3" rel="stylesheet">
<link href="<?php echo assets_url(); ?>css/product-css.css?v=3.14" rel="stylesheet">
<script src="<?php echo assets_url(); ?>js/jquery.js"></script>
<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<style>
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
</style>
<body>
<div class="page-wrapper"> 	
 	

    <!-- Preloader -->
    <div class="preloader"></div>
    <!-- Preloader -->
	
	<!--Header Upper-->
    <section class="header-upper">
        <div class="container clearfix">
            <!--<div class="upper-left clearfix">                
                <div id="polyglotLanguageSwitcher" class="">
                    <form action="#">
                        <select id="polyglot-language-options">
                            <option id="en" value="English" selected>English</option>
                            <option id="fr" value="French">French</option>
                            <option id="de" value="de">Deutsch</option>
                            <option id="it" value="it">Nederlands</option>
                           
                        </select>
                    </form>
                </div>
                <div class="text">
                    <h6>Welcome to Filtermat's website !</h6>
                </div>
            </div>--->
			
			
			
				<div class="upper-left clearfix">
				   <div id="polyglotLanguageSwitcher" class="">
					  <a id="en" class="current lang-convert" href="#" rel="English">English</a><span class="trigger" id="trigger-btn">»</span>
					  <ul class="dropdown" style="display: none;" id="ul-dropdown">
						
						 <li><a id="fr" href="<?php echo base_url();?>" class="lang-convert" rel="French">French</a></li>
						 <li><a id="de" href="<?php echo base_url();?>" class="lang-convert" rel="Dutch">Deutsch</a></li>
						
					  </ul>
				   </div>
				   <div class="text">
					  <h6>Welcome to Filtermat's website !</h6>
				   </div>
				</div>
			
			
			
			
            <div class="upper-right">
                <ul class="social-links">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--Header Upper-->



     <!--Header Top-->
    <section class="header-top">
        <div class="container clearfix">
            <div class="left-side pull-left">
                <div class="logo">
                    <figure>
                        <a href="#"><img src="<?php echo assets_url(); ?>images/logo1.gif" alt=""></a>
                    </figure>
                </div>
            </div>
            <ul class="right-side pull-right clearfix">
                <li class="item">
                    <div class="icon-box">
                        <i class="flaticon-placeholder"></i>
                    </div>
                    <h6>Winninglaan 17, B-9140 Temse  <br>Belgium.</h6>
                </li>
                <li class="item">
                    <div class="icon-box">
                        <i class="flaticon-telephone"></i>
                    </div>
                    <h6>Have a question call now <br>+32-3-711.03.57 or +32-3-710.65.50</h6>
                </li>
                <li class="item">
                    <form method="post" action="">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search..." required >
                            <button type="search"><i class="fa fa-search"></i></button>
                        </fieldset>
                    </form>
                </li>
            </ul>
        </div>
    </section>
    <!--End Header Top-->

       
    <!--Main Header-->
    <header class="main-header sticky-header style-two">
        <div class="container">
            <div class="header-area clearfix">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->      
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>           
                    <div class="navbar-collapse collapse clearfix">
					<?php //echo"<pre>"; print_r($menu);?>
                        <ul class="navigation clearfix">
						<li><a href="<?php echo base_url();?>">Home</a> </li> 
							 <!--<li><a href="#0">About Us</a></li>--> 							
                           
                            <li><a href="#0">Services</a> </li>
                            <!--<li class="product_menu"><a href="javascript:void(0);">Products</a></li>-->
                            <li class="product_search dropdown"><a href="<?php echo base_url().'search' ?>">Products</a>
							 <ul>
								<?php if(count($menu) > 0){ 
								foreach($menu as $menuinfo){?>
								<li><a href="<?php echo base_url().'welcome/getsubcategory/'. $menuinfo['id'];?>"><?php echo $menuinfo['category']?></a></li>
								<?php }
								}								?>
								 <!--<li><a href="<?php echo base_url();?>search">Search my filter</a></li>
                                <li><a href="<?php echo base_url();?>TechnicalInfo/ChemicalResistance.pdf" target="_blank">Technical info</a></li>
								<li><a href="<?php echo base_url();?>products">Product index</a></li>-->
                            </ul> 
							</li>
                                          
                            <li><a href="#0">Contact</a></li>
                        </ul>
						<ul class="nav navbar-nav mega-list">
			<li class="dropdown mega-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Liquid filters <span class="caret"></span></a>				
				<ul class="dropdown-menu mega-dropdown-menu">
					<li class="col-sm-3">
						<ul>
							                          
                            
                           <li><a href="#">Automatic paper band filters</a></li>
                           <li><a href="#">Automatic self cleaning filters</a></li>
                           <li><a href="#"> Bag filters </a></li>
                           <li><a href="#"> Basket filters / Strainers </a></li>
                           <li><a href="#"> Cintropur filters </a></li>
                           <li><a href="#"> Cintropur UV </a></li>
                           <li><a href="#"> Curved barscreen </a></li>
                           <li><a href="#"> Filter cartridges</a></li>
                           <li><a href="#"> Filter elements for EDM</a></li>
                           <li><a href="#"> Retrofit for 3M 740 series</a></li>
                           <li><a href="#"> Rotary drum filters</a></li>
                           <li><a href="#"> Scrape filters</a></li>
                           <li><a href="#"> Tower packings</a></li>
				   
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Cartridge filters</li>
							<li><a href="#">Selfcleaning - Automatic</a></li>
                            <li><a href="#">Selfcleaning - Automatic / Semi-Automatic</a></li>
                            <li><a href="#">Single (small)</a></li>
                            <li><a href="#">Big (40")</a></li>
							
							
							<li class="divider"></li>
							<li class="dropdown-header">Multiple (10" - 40")</li>
                            <li><a href="#">Topcart</a></li>
							<li><a href="#">Google Fonts</a></li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Filter bags</li>
							<li><a href="#">Flat</a></li>
							<li><a href="#">Pleated</a></li>
													
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Rain water filters</li>
                            <li><a href="#">Cintropur</a></li>
							<li><a href="#">Filtermat</a></li>
							<li><a href="#">Suction baskets</a></li>							                     
						</ul>
					</li>
				</ul>				
			</li>
            <li class="dropdown mega-dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Air filters <span class="caret"></span></a>				
				<ul class="dropdown-menu mega-dropdown-menu">
					<li class="col-sm-3">
    					<ul>
							
							<li><a href="#">Absolute filters H11-U15</a></li>
                            <li><a href="#">Panel- & bag filters</a></li>
                            <li><a href="#">Prewashers for HCl and NH</a></li>
							<li><a href="#">Vacuum pump filter elements</a></li>														
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header"> Bad odor filters / Ab - & Adsorption </li>
							<li><a href="javascript:void(0)" class="dull">Cylinders</a></li>
							<li><a href="#">Water treatment</a></li>
							<li><a href="javascript:void(0)" class="dull">Panel filters pleated</a></li>                            
							<li><a href="#">Vapour traps</a></li>							
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Cylinders</li>
                            <li><a href="#">Ecocarb - activated carbon</a></li>
                            
							                         
						</ul>
					</li>
                    <li class="col-sm-3">
    					<ul>
							<li class="dropdown-header">Panel filters pleated</li>                            
                            
                            <li><a href="#">Activated carbon</a></li>
						</ul>
					</li>
				</ul>				
			</li>
            <li class="dropdown mega-dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Coalescers air/liquid  <span class="caret"></span></a>				
				<ul class="dropdown-menu mega-dropdown-menu">
					<li class="col-sm-12">
    					<ul>
							<li class="dropdown-header">Features</li>
							<li><a href="#">Coalescers air/liquid - Demisters</a></li>
                            
						</ul>
					</li>
					
					
                    
				</ul>				
			</li>
		</ul>
                    </div>                    
                </nav>
                <div class="link-btn">
                    <a href="#" class="btn-style-one">Get a Quote</a>
                </div>
            </div>                
        </div>
    </header>
    <!--End Main Header -->
    
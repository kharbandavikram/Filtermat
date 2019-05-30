<?php $lang = $this->session->userdata('lang');?>
    <!--Start rev slider wrapper-->     
    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider"  data-version="5.0">
            <ul>                
                <li data-transition="fade">
                    <img src="<?php echo assets_url(); ?>images/slider/1.jpg" alt="" width="1920" height="870" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
                    
                    <div class="tp-caption  tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="-80" 
                        data-transform_idle="o:1;"         
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                        data-splitin="none" 
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-start="700">
						<div class="slide-content-box">
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
						<h1>Quality, innovation, High Service  <br><span>Affordable Price</span></h1>
						<?php } 
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
						<h1>Qualité, innovation, haut service  <br><span>Prix ​​abordable</span></h1>
						<?php }else {?>
						<h1>Kwaliteit, innovatie, hoge service <br><span>Betaalbare prijs</span></h1>
						<?php 
						} ?>

						</div>
                    </div>
                    <div class="tp-caption  tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="30" 
                        data-transform_idle="o:1;"         
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                        data-splitin="none" 
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-start="700">
                        <div class="slide-content-box">
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
							<p>We help our customers with solving all possible filtration challenges. We manufacture and deliver filter systems<br>for drinking water, waste water, process water, intake and extraction (exhaust) air.</p>
						<?php } 
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
							<p>Nous aidons nos clients à résoudre tous les problèmes de filtration possibles. Nous fabriquons et fournissons des systèmes de filtration<br>pour l'eau potable, les eaux usées, l'eau de process, l'air d'admission et d'extraction (gaz d'échappement).</p>
						<?php }else {?>
							<p>We helpen onze klanten met het oplossen van alle mogelijke filtratie-uitdagingen. Wij produceren en leveren filtersystemen<br>voor drinkwater, afvalwater, proceswater, inlaat- en afzuig- (uitlaat) lucht.</p>
						<?php 
						} ?>
						 
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="120" 
                        data-transform_idle="o:1;"                         
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on"
                        data-start="2300">
                        <div class="slide-content-box">
                            <div class="button">
                                <a href="#" class="btn-style-one">
								<?php 
								if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Learn More"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Apprendre encore plus"; }
								else{ echo "Kom meer te weten"; }
								?>
								</a>     
                            </div>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" 
                        data-x="left" data-hoffset="<?php 
								if(!empty($lang['lang']) && $lang['lang']=='en') { echo "200"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "320"; }
								else{ echo "270"; }
								?>" 
                        data-y="center" data-voffset="120"
                        data-transform_idle="o:1;"                         
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on"
                        data-start="2300">
                        <div class="slide-content-box">
                            <div class="button">
                                <a href="#" class="btn-style-two">
								<?php 
								if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Our Services"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Nos services"; }
								else{ echo "Onze diensten"; }
								?>
								</a>     
                            </div>
                        </div>
                    </div>
                </li>
                <li data-transition="fade">
                    <img src="<?php echo assets_url(); ?>images/slider/2.jpg" alt="" width="1920" height="870" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
                    
                    <div class="tp-caption  tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="-80" 
                        data-transform_idle="o:1;"         
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                        data-splitin="none" 
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-start="700">
                        <div class="slide-content-box">
                           <?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
								<h1>For all air and liquid  <br><span>filtration</span></h1>
							<?php } 
							else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
								<h1>Pour tout air et liquide  <br><span>filtration</span></h1>
							<?php }else {?>
								<h1>Voor alle lucht en vloeistoffen  <br><span>filtration</span></h1>
							<?php 
							} ?>
                        </div>
                    </div>
                    <div class="tp-caption  tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="30" 
                        data-transform_idle="o:1;"         
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                        data-splitin="none" 
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-start="700">
                        <div class="slide-content-box">
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
							 <p>Our goal is to provide clean air and water wherever we go. People's safety and the environment are always our first concern. <br>We are also very much aware of the social responsibility we have as a manufacturer of top-quality filter systems.</p>
						<?php } 
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
							 <p>Notre objectif est de fournir de l'air pur et de l'eau partout où nous allons. La sécurité des personnes et l'environnement sont toujours notre première préoccupation.<br>Nous sommes également très conscients de notre responsabilité sociale en tant que fabricant de systèmes de filtration de haute qualité.</p>
						<?php }else {?>
							 <p>Ons doel is om schone lucht en water te bieden waar we ook gaan. De veiligheid en het milieu van mensen zijn altijd onze eerste zorg.<br>We zijn ons ook erg bewust van de sociale verantwoordelijkheid die we hebben als fabrikant van filtersystemen van topkwaliteit.</p>
						<?php 
						} ?>
						
                           
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" 
                        data-x="left" data-hoffset="0" 
                        data-y="center" data-voffset="120" 
                        data-transform_idle="o:1;"                         
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on"
                        data-start="2300">
                        <div class="slide-content-box">
                            <div class="button">
                                <a href="#" class="btn-style-one">
								<?php 
								if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Learn More"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Apprendre encore plus"; }
								else{ echo "Kom meer te weten"; }
								?>
								</a>     
                            </div>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" 
                        data-x="left" data-hoffset="<?php 
								if(!empty($lang['lang']) && $lang['lang']=='en') { echo "200"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "320"; }
								else{ echo "270"; }
								?>" 
                        data-y="center" data-voffset="120"
                        data-transform_idle="o:1;"                         
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on"
                        data-start="2300">
                        <div class="slide-content-box">
                            <div class="button">
                                <a href="#" class="btn-style-two">
								<?php 
								if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Our Services"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Nos services"; }
								else{ echo "Onze diensten"; }
								?></a>     
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--End rev slider wrapper-->


    <!--About Section-->
    <?php $this->load->view('frontend/about'); ?>
    <!--End About Section-->

    <!--Service Section-->
   <?php //$this->load->view('frontend/service'); ?>
   <?php $this->load->view('frontend/search'); ?>
    <!--End Service Section-->


    <!--Testimonials Section-->
   <?php $this->load->view('frontend/testimonial'); ?>
    <!--End Testimonials Section-->


    <!--Blog Section-->
   <?php $this->load->view('frontend/blog'); ?>
    <!--End Blog Section-->


    <!--footer Section-->
   <?php $this->load->view('frontend/footer'); ?>
    <!--End footer Section-->



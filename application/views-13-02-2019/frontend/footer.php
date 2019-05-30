<?php $lang = $this->session->userdata('lang');?>
<!--Footer Section-->
    <footer class="main-footer">
        <div class="container">
		<div class="footer-top">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-xs-12">
                        <div class="about-widget">
                            <div class="footer-title">
                                <h6>
									<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Filtermat"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Matelas filtrant"; }
									else{ echo "Filtermat"; }
									?>
								</h6>
							</div>
                            <?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
							<p>For over 22 years we are the specialist to go to in the field of air and liquid filtration. Many large and smaller companies have found their way to our products and services. For example: drinking water companies and waste water plants. We help our customers with solving all possible filtration challenges.</p>
                            <p>We help our customers with solving all possible filtration challenges. </p>
							<?php } 
							else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
							<p>Depuis plus de 22 ans, nous sommes le spécialiste dans le domaine de la filtration de l'air et des liquides. De nombreuses petites et grandes entreprises ont trouvé le moyen d’obtenir nos produits et services. Par exemple: les entreprises d’eau potable et les usines de traitement des eaux usées. Nous aidons nos clients à résoudre tous les problèmes de filtration possibles.</p>
                            <p>Nous aidons nos clients à résoudre tous les problèmes de filtration possibles. </p>
							<?php }else{?>
							<p>Al meer dan 22 jaar zijn wij de specialist op het gebied van lucht- en vloeistoffiltratie. Veel grote en kleinere bedrijven hebben hun weg gevonden naar onze producten en diensten. Bijvoorbeeld: drinkwaterbedrijven en afvalwaterinstallaties. We helpen onze klanten met het oplossen van alle mogelijke filtratie-uitdagingen.</p>
                            <p>We helpen onze klanten met het oplossen van alle mogelijke filtratie-uitdagingen. </p>
							<?php 
							} ?>
							
						</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                         <div class="service-widget">
                            <div class="footer-title">
                                <h6>
								<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "services"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "prestations de service"; }
								else{ echo "Diensten"; }
								?>
								</h6>
                            </div>
                            <ul class="menu-link">
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>
									<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Home"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "MAISON"; }
									else{ echo "HUIS"; }
									?>
								</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>
									<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "ABOUT US"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "À PROPOS DE NOUS"; }
									else{ echo "OVER ONS"; }
									?>
								</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>
									<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "SERVICES"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "PRESTATIONS DE SERVICE"; }
									else{ echo "DIENSTEN"; }
									?>
								</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>
									<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "PRODUCTS"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "DES PRODUITS"; }
									else{ echo "PRODUCTEN"; }
									?>
								</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>
								<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "CONTACT"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "CONTACT"; }
									else{ echo "CONTACT"; }
									?>
								</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
					<div class="about-widget">
                            <div class="footer-title">
                                <h6>
								<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Get in Touch"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Entrer en contact"; }
								else{ echo "Neem contact op"; }
								?>
								</h6>
                            </div>
							<ul class="contact-links">
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:	info@filtermat.be">	info@filtermat.be</a></li>
                                <li><i class="fa fa-mobile" aria-hidden="true"></i>+32-3-711.03.57 or +32-3-710.65.50</li>
                                <li><i class="fa fa-fax" aria-hidden="true"></i>	+32-3-711.03.58 or +32-3-710.65.58</li>
								
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>
								<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Winninglaan 17, B-9140 Temse (Belgium)"; }
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Winninglaan 17, B-9140 Temse (Belgique)"; }
								else{ echo "Winninglaan 17, B-9140 Temse (België)"; }
								?>
								</li>
                            </ul>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </footer>
	<div class="footer-bottom text-center">
		<div class="container">
		<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
		<p>Copyrights &copy; 2018 <a href="index.html">Filtermat</a>. All Rights Reserved.</p>
		<?php } 
		else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
		<p>Droits d'auteur &copy; 2018 <a href="index.html">Filtermat</a>. Tous les droits sont réservés.</p>
		<?php }else{?>
		<p>copyrights &copy; 2018 <a href="index.html">Filtermat</a>. Alle rechten voorbehouden.</p>
		<?php 
		} ?>
		
		</div>
	</div>
    <!--End Footer Section-->

				

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top"><span class="icon fa fa-angle-up"></span></div>
<script src="<?php echo assets_url(); ?>js/bootstrap.min.js"></script>
<!-- revolution slider js -->
<script src="<?php echo assets_url(); ?>assets/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/revolution/js/extensions/revolution.extension.video.min.js"></script>

<script src="<?php echo assets_url(); ?>js/isotope.js"></script>
<script src="<?php echo assets_url(); ?>js/owl.carousel.min.js"></script>
<script src="<?php echo assets_url(); ?>js/validate.js"></script>
<script src="<?php echo assets_url(); ?>js/wow.js"></script>
<script src="<?php echo assets_url(); ?>js/jquery.polyglot.language.switcher.js"></script>
<script src="<?php echo assets_url(); ?>js/script.js"></script>
<script>
	$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
	
	$(".product_menu").hover(function(){
		$(".mega-list").show();
		});
		$(".mega-list").mouseleave(function(){
		$(".mega-list").hide();
		});
});
	</script>
		
	<script>
	
	$('#trigger-btn').click(function(){
			$('#ul-dropdown').toggle();
			});
	
	
    </script>
</body>
</html>
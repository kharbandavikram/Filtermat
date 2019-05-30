

    <!--Footer Section-->
    <footer class="main-footer">
        <div class="container">
		<div class="footer-top">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-xs-12">
                        <div class="about-widget">
                            <div class="footer-title">
                                <h6>Filtermat</h6>
								
                            </div>
                            <p>For over 22 years we are the specialist to go to in the field of air and liquid filtration. Many large and smaller companies have found their way to our products and services. For example: drinking water companies and waste water plants. We help our customers with solving all possible filtration challenges.</p>
                            <p>We help our customers with solving all possible filtration challenges. </p>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                         <div class="service-widget">
                            <div class="footer-title">
                                <h6>services</h6>
                            </div>
                            <ul class="menu-link">
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>HOME</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>ABOUT US
</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>SERVICES</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>PRODUCTS
</a></li>
                                <li><a href="#0"><i class="fa fa-angle-right" aria-hidden="true"></i>CONTACT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
					<div class="about-widget">
                            <div class="footer-title">
                                <h6>Get in Touch</h6>
                            </div>
							<ul class="contact-links">
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:	info@filtermat.be">	info@filtermat.be</a></li>
                                <li><i class="fa fa-mobile" aria-hidden="true"></i>+32-3-711.03.57 or +32-3-710.65.50</li>
                                <li><i class="fa fa-fax" aria-hidden="true"></i>	+32-3-711.03.58 or +32-3-710.65.58</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Winninglaan 17, B-9140 Temse (Belgium)</li>
                            </ul>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </footer>
	<div class="footer-bottom text-center">
		<div class="container">
		<p>Copyrights &copy; 2018 <a href="index.html">Filtermat</a>. All Rights Reserved.</p>
		</div>
	</div>
    <!--End Footer Section-->
<div id="google_translate_element" style="display: none">
</div>
				

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
		<script type="text/javascript">
					function googleTranslateElementInit() {
					new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
					}
					</script>
					<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
					type="text/javascript"></script>
	<script>
	
	
	$('#polyglot-language-options').change(function(){
		
		var  lang = $(this).val();
		var $frame = $('.goog-te-menu-frame:first');
            if (!$frame.size()) {
                alert("Error: Could not find Google translate frame.");
                return false;
            }
            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
            return false;
		
	});
	
	$('.lang-convert').click(function(){
		
		var  lang = $(this).attr('rel');
		
		var $frame = $('.goog-te-menu-frame:first');
            if (!$frame.size()) {
                alert("Error: Could not find Google translate frame.");
                return false;
            }
            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
            return false;
		
	});
		$('#trigger-btn').click(function(){
			$('#ul-dropdown').toggle();
			});
	
	
        /*function translateLanguage(lang) {

            var $frame = $('.goog-te-menu-frame:first');
            if (!$frame.size()) {
                alert("Error: Could not find Google translate frame.");
                return false;
            }
            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
            return false;
        }*/
    </script>
</body>
</html>
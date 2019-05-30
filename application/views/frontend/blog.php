 <?php $lang = $this->session->userdata('lang');?>
    <!--Blog Section-->
    <section class="blog-section gray_bg">
        <div class="container">
           <?php if(!empty($about[0]['page_realisations'])){
					echo $about[0]['page_realisations'];
					}?>
<?php /*

		   <div class="section-title">
                <?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
					<h3>Realisations</h3>
				<?php } 
				else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
					<h3>Les réalisations</h3>
				<?php }else { ?>
					<h3>realisaties</h3>
				<?php 
				} ?>
            </div>
            <div class="text">
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
				<p>We help our customers with solving all possible filtration challenges.  On there you will find more information on<br> our products, services and company. Please, also feel free to contact us directly.</p>
				<?php } 
				else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
				<p>Nous aidons nos clients à résoudre tous les problèmes de filtration possibles. Sur ce site, vous trouverez  <br>plus d'informations sur nos produits, services et compagnie. S'il vous plaît, n'hésitez pas à nous contacter directement.</p>
				<?php }else { ?>
				<p>We helpen onze klanten met het oplossen van alle mogelijke filtratie-uitdagingen. Hier vindt u meer informatie over<br>onze producten, diensten en bedrijf. Neemt u alstublieft ook direct contact met ons op.</p>
				<?php 
				} ?>
				<div class="link-btn">
                    <a href="#" class="btn-style-one">
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "View all"; }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Voir tout"; }
					else{ echo "Bekijk alles"; }
					?>
					</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12 blog_pics">
                    <img src="<?php echo assets_url(); ?>images/blog/imgg_1.jpg" alt="">
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 blog_pics">
                    <img src="<?php echo assets_url(); ?>images/blog/imgg_2.jpg" alt="">
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 blog_pics">
                    <img src="<?php echo assets_url(); ?>images/blog/imgg_3.jpg" alt="">
                </div>
				<div class="col-lg-3 col-sm-6 col-xs-12 blog_pics">
                    <img src="<?php echo assets_url(); ?>images/blog/imgg_4.jpg" alt="">
                </div>
            </div>
       
*/
?>

	   </div>
    </section>
    <!--End Blog Section-->

<?php $lang = $this->session->userdata('lang');?>
<section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<div class="section-title">
					<h6>
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Who we are"; }
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Qui nous sommes"; }
						else{ echo "Wie we zijn"; }
						?>
					</h6>
					
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
					   <h3>About <span>Us</span></h3>
					<?php } 
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
					 <h3>Sur <span>Nous</span></h3>
					<?php }else{?>
						<h3>Wat betreft <span>Ons</span></h3>
						<?php 
					} ?>	
               
            </div>
			<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
				<p>Filtermat Belgium has a team of qualified technicians who can assist you with your maintenance or repair of your automatic self-cleaning basket filters. 
				Our experienced technicians can also accompany you how to maintain these filters. Your filtration system is in good hands with us. Below are some of our activities</p>
			<?php } 
			else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
				<p>
				Filtermat Belgium dispose d'une équipe de techniciens qualifiés pouvant vous assister dans l'entretien ou la réparation de vos filtres à panier auto-nettoyants
				Nos techniciens expérimentés peuvent également vous accompagner dans la maintenance de ces filtres. Votre système de filtration est entre de bonnes mains chez nous. Ci-dessous quelques activités</p>
			<?php }else{?>
				<p>Filtermat Belgium beschikt over een team van gekwalificeerde technici die u kunnen helpen bij het onderhoud of de reparatie van uw automatische zelfreinigende basketfilters.
				Onze ervaren technici kunnen u ook begeleiden bij het onderhoud van deze filters. Uw filtersysteem is bij ons in goede handen. Hieronder zijn enkele van onze activiteiten</p>
			<?php 
			} ?>

			
			
</div>
				
				
				<div class="col_custom">
					<img src="<?php echo assets_url(); ?>images/about/pic_1.png" alt="">
				</div>
				<div class="col_custom">
					<img src="<?php echo assets_url(); ?>images/about/pic_2.png" alt="">
				</div>
				<div class="col_custom">
					<img src="<?php echo assets_url(); ?>images/about/pic_3.png" alt="">
				</div>
				<div class="col_custom">
					<img src="<?php echo assets_url(); ?>images/about/pic_4.png" alt="">
				</div>
				<div class="col_custom">
					<img src="<?php echo assets_url(); ?>images/about/pic_5.png" alt="">
				</div>
            </div>
        
        </div>
    </section>
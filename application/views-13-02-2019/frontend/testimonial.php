 <?php $lang = $this->session->userdata('lang');?>
 <section class="testimonials-section call-back">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="fact-counter" style="background: url(<?php echo assets_url(); ?>images/background/3.jpg);">
                        <div class="contact-area">
                        <div class="sec-title">
						<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
						 <h3>Request a call <span>Back</span></h3>
						<?php } 
						else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
						 <h3>Demander un appel <span>Retour</span></h3>
						<?php }else { ?>
						 <h3>Bel om te bellen <span>Terug</span></h3>
							<?php 
						} ?>	
						</div>
                        <form name="contact_form" class="default-form contact-form" action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
									<input type="text" name="name" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "First Name"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Prénom"; }
									else{ echo "Voornaam"; }
									?>" required="">
                                    </div>                           
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
									<input type="text" name="phone" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Last Name"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Nom de famille"; }
									else{ echo "Achternaam"; }
									?>" required="">
                                    </div>                            
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Email"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Email"; }
									else{ echo "E-mail"; }
									?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Phone"; }
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Téléphone"; }
									else{ echo "Telefoon"; }
									?>" required="">
                                    </div>
                                   
                                    <div class="form-group button">
                                        <button type="submit" class="btn-style-one">
										<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "submit now"; }
										else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "soumettre maintenant"; }
										else{ echo "bevestig nu"; }
										?>
										</button>
                                    </div>                            
                                </div>
                            </div>
                        </form>
                    </div> 
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="testimonials-carousel">
                        <div class="single-item-carousel">
                            <div class="item-area text-center">
								<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
									<p>"They exceeded my expectations and did so with professionalism and integrity. They are organized, intelligent, efficient and keep up to date.  a Latin professor at Hampden-Sydney College in Virginia, It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."</p>
								<?php } 
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
									<p>"Ils ont dépassé mes attentes et l'ont fait avec professionnalisme et intégrité. Ils sont organisés, intelligents, efficaces et se tiennent au courant. professeur de latin au Hampden-Sydney College, en Virginie, il est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il examinera sa mise en page."</p>
								<?php }else { ?>
									<p>"Ze overtroffen mijn verwachtingen en deden dit met professionaliteit en integriteit. Ze zijn georganiseerd, intelligent, efficiënt en up-to-date. een Latijnse professor aan het Hampden-Sydney College in Virginia, Het is een bekend feit dat een lezer wordt afgeleid door de leesbare inhoud van een pagina wanneer hij naar de lay-out kijkt."</p>
								<?php 
								} ?>
                               
                                <figure>
                                    <img src="<?php echo assets_url(); ?>images/testimonials/1.png" alt="">
                                </figure>
                                <div class="title-text">
                                    <?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
										<h6>Fiona Lara -<span>Happy Client</span></h6>
									<?php } 
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
										<h6>Fiona Lara -<span>Client heureux</span></h6>
									<?php }else { ?>
										<h6>Fiona Lara -<span>Blije klant</span></h6>
									<?php 
									} ?>
                                </div>
                            </div>
                            <div class="item-area text-center">
							   <?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
									<p>"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', They exceeded my expectations and did so with professionalism and integrity.  "</p>
								<?php } 
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
									<p>"C'est un fait établi de longue date qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il examinera sa mise en page. Lorem Ipsum utilise une distribution de lettres plus ou moins normale, par opposition à "Contenu ici, contenu ici". Ils ont dépassé mes attentes et l'ont fait avec professionnalisme et intégrité.  "</p>
								<?php }else { ?>
									<p>"Het is een bekend feit dat een lezer wordt afgeleid door de leesbare inhoud van een pagina wanneer hij de lay-out bekijkt. Het punt van het gebruik van Lorem Ipsum is dat het een min of meer normale verdeling van letters heeft, in tegenstelling tot het gebruik van 'Inhoud hier, inhoud hier'. Ze overtroffen mijn verwachtingen en deden dit met professionaliteit en integriteit.  "</p>
								<?php 
								} ?>
							
                                
                                <figure>
                                    <img src="<?php echo assets_url(); ?>images/testimonials/1.png" alt="">
                                </figure>
                                <div class="title-text">
									<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
										<h6>Robert John -<span>Happy Client</span></h6>
									<?php } 
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
										<h6>Robert John -<span>Client heureux</span></h6>
									<?php }else { ?>
										<h6>Robert John -<span>Blije klant</span></h6>
									<?php 
									} ?>
                                    
                                </div>
                            </div>
                            <div class="item-area text-center">
							    <?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
									<p>"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. a Latin professor at Hampden-Sydney College in Virginia, It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."</p>
								<?php } 
								else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
									<p>"Contrairement à la croyance populaire, Lorem Ipsum n’est pas simplement un texte aléatoire. Il a ses racines dans un morceau de littérature latine classique datant de 45 ans av. professeur de latin au Hampden-Sydney College, en Virginie, il est un fait établi depuis longtemps qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il examinera sa mise en page."</p>
								<?php }else { ?>
									<p>"In tegenstelling tot wat vaak wordt gedacht, is Lorem Ipsum niet zomaar willekeurige tekst. Het heeft wortels in een stuk van de klassieke Latijnse literatuur van 45 v.Chr., Waardoor het meer dan 2000 jaar oud is. een Latijnse professor aan het Hampden-Sydney College in Virginia, Het is een bekend feit dat een lezer wordt afgeleid door de leesbare inhoud van een pagina wanneer hij naar de lay-out kijkt."</p>
								<?php 
								} ?>
							    
								
                                
                                <figure>
                                    <img src="<?php echo assets_url(); ?>images/testimonials/1.png" alt="">
                                </figure>
                                <div class="title-text">
                                   <?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
										<h6>Adam Kim -<span>Happy Client</span></h6>
									<?php } 
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
										<h6>Adam Kim -<span>Client heureux</span></h6>
									<?php }else { ?>
										<h6>Adam Kim -<span>Blije klant</span></h6>
									<?php 
									} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
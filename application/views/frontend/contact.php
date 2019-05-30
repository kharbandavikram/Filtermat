<?php $lang = $this->session->userdata('lang');?>
<div class="content-wrapper" style="margin:60px 0px 0px 0px;"> 
    <!-- Main content -->
    <section class="content">
		<div class="container">
			<div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="fact-counter">
                        <div class="contact-area">
							<div class="sec-title">
								<?php if(!empty($lang['lang']) && $lang['lang']=='en') { ?>
									<h3>Request a call <span>Back</span></h3>
									<?php } 
									else if(!empty($lang['lang']) && $lang['lang']=='fr') { ?>
									<h3>Demander un appel <span>Retour</span></h3>
									<?php }else { ?>
									<!--<h3>Bel om te bellen <span>Terug</span></h3>-->
									<h3>Wij bellen jou <span>terug</span></h3>
									<?php 
									} ?>	
							</div>
							<form name="contact_form" class="default-form contact-form" action="<?php echo base_url();?>contact" method="post">
								
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
										<input class="f_group" type="text" name="name" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "First Name"; }
											else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Prénom"; }
											else{ echo "Voornaam"; }
										?>" required="">
									</div>                           
								</div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
										<input class="f_group" type="text" name="last_name" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Last Name"; }
											else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Nom de famille"; }
											else{ echo "Achternaam"; }
											?>" required="">
										</div>                            
									</div>
									
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="form-group">
											<input class="f_group" type="email" name="email" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Email"; }
												else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Email"; }
												else{ echo "E-mail"; }
											?>" required="">
										</div></div>
										
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<input class="f_group" type="text" name="phone" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Phone"; }
													else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Téléphone"; }
													else{ echo "Telefoon"; }
												?>" required="">
											</div></div>
											
											
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<textarea style="width: 100%;padding: 8px;height:110px;resize:none;" name="message" placeholder="<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "Message"; }
														else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "Téléphone"; }
														else{ echo "bericht"; }
													?>" required=""></textarea>
												</div></div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<?php echo $this->session->flashdata('msg'); ?>
												</div> 
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group button">
														<button type="submit" class="btn-style-one ">
															<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo "submit now"; }
																else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo "soumettre maintenant"; }
																else{ echo "bevestig nu"; }
															?>
														</button>
													</div>                            
												</div>
												
								</form>
							</div> 
							
							</div>
						</div>
						
				</div>
			</div>
		</div>
		
	</section>		
</div>			



<!--footer Section-->
<?php $this->load->view('frontend/footer'); ?>
<!--End footer Section-->

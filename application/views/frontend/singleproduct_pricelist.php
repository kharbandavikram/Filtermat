<?php $lang = $this->session->userdata('lang');

?>

<div class="content-wrapper" style="margin:60px 107px 60px 107px;"> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12"> 
							
				<nav aria-label="breadcrumb" class="product_breadcrumb">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>price/list">All Filters</a></li>
					
					<li class="breadcrumb-item active" aria-current="page">	
					<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo (
					$product_data[0]['product_name']); }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { 
					echo ($product_data[0]['fr_product_name']); }
					else{ echo ($product_data[0]['dut_product_name']); }
				?></li>
				  </ol>
				</nav>
	
				<div class="box box-info order_form">
				 <?php //echo ($product_data[0]['product_data']); ?>
				<?php if(!empty($lang['lang']) && $lang['lang']=='en') { echo ($product_data[0]['eng_price_list_desc']); }
					else if(!empty($lang['lang']) && $lang['lang']=='fr') { echo ($product_data[0]['fr_price_list_desc']); }
					else{ echo ($product_data[0]['dut_price_list_desc']); }
				?>
				 
				 </div> 

				
	 </section>		
</div>			
 <!---<div class="shortcontainer_content">
				 <?php// if(!empty($lang['lang']) && $lang['lang']=='en') {
						//echo '<p>Need more information or you want to place an order? <a href="'.base_url().'contact">Contact US</a> and we will get in touch with you.</p>';				
						//}else if(!empty($lang['lang']) && $lang['lang']=='fr') { 
						//echo '<p>Besoin d informations supplémentaires ou souhaitez-vous passer une commande?  <a href="'.base_url().'contact">Contactez-nous</a> et nous vous contacterons.</p>';
					// }else{
						//echo '<p>Heeft u meer informatie nodig of wilt u een bestelling plaatsen? <a href="'.base_url().'contact">Neem contact</a> op met US en wij nemen contact met u op.</p>';
					// }
				?>
				 <div>
				
			 </div>
</div>-->

<script>
$(document).ready(function(){
<?php if(!empty($get_user_data)){	?>
 var first_name ="<?php echo $get_user_data[0]['first_name']; ?>";		
 var company_name ="<?php echo $get_user_data[0]['company_name']; ?>";		
 var email_id ="<?php echo $get_user_data[0]['email_id']; ?>";		
$(".order_customer_info input[name=name]").val(first_name);
$(".order_customer_info input[name=company_name]").val(company_name);
$(".order_customer_info input[name=email]").val(email_id);
<?php }?>	


var productid="<?php echo $product_data[0]['id']; ?>";
$('.order_customer_info').append('<input type="hidden" name="productID" value="'+productid+'"/>');	
$('.message').remove();	
// $("<?php echo $this->session->flashdata('success_email'); ?>").insertBefore(".order_form .form-group.button");
// $(".order_customer_info .form-group.button").append("<div class='message'>	<?php echo $this->session->flashdata('success_email'); ?></div>");
// $('.order_customer_info .form-group.button').insert	
});

</script>

<!--<form action="<?php echo base_url();?>email_send" method="POST">
<textarea name="message"></textarea>
<input type="hidden" name="productID" value="<?php $product_data[0]['id']; ?>">
<input type="button" name="submit" value="Submit">
</form>-->
    <!--End rev slider wrapper-->


    <!--About Section-->
    <?php //$this->load->view('frontend/about'); ?>
    <!--End About Section-->

    <!--Service Section-->
   <?php //$this->load->view('frontend/service'); ?>
    <!--End Service Section-->


    <!--Testimonials Section-->
   <?php //$this->load->view('frontend/testimonial'); ?>
    <!--End Testimonials Section-->


    <!--Blog Section-->
   <?php //$this->load->view('frontend/blog'); ?>
    <!--End Blog Section-->


    <!--footer Section-->
   <?php $this->load->view('frontend/footer'); ?>
    <!--End footer Section-->

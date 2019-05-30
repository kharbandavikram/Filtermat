	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/listnav.css">
	<style>
		div#-nav {
    margin: 20px auto 0 auto;
    display: block;
    width: 100%;
}
.ln-letters a {
    border: 1px solid silver;
    border-right: none;
    display: block;
    float: left;
    font-size: 1.0em;
    padding: 8px 16px;
}
ul.product {
    margin: 15px 0 0 0;
}
ul.product li{
    margin:  0 0 4px 0;
}
		
		
		</style>
<div class="content-wrapper"> 
    <!-- Main content -->
    <section class="service-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-info">
						<div class="section-title filter_part">
							<h3 class="box-title">Search Product </h3>
						</div>
						<section id="main_content" class="inner">
							<ul class="product">
							
							<?php foreach($product_data as $data){
								if($data->data_type == 1){?>
							
							<li><a href="<?php echo base_url().'uploads/product/'.$data->pdf;?>" target="_blank"><?php echo $data->product_name;?></a></li>
							<?php }else{?>
							<li><a href="<?php echo base_url().'viewproduct/'.$data->id;?>"><?php echo $data->product_name;?></a></li>
							<?php } }?>
								
							</ul>
						</section>
						<!-- /.box-footer --> 
					</div>
				</div>
				<!-- /.col --> 
			</div>
		</div>
        <!-- /.row --> 
	</section>
    <!-- /.content --> 
</div>
<script src="<?php echo assets_url(); ?>js/jquery-listnav.js?v=0.3"></script>
<script src="<?php echo assets_url(); ?>js/vendor.js"></script>
<script>
$(function(){

		$('.product').listnav({
		initLetter: 'a',
		includeAll: false,
		noMatchText: 'There are no matching entries.'
	});
	$('.product a').click(function(e) {
	//	e.preventDefault();
	});
});
</script>
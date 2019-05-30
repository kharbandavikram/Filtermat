var wish_list = new Array();
jQuery(function(){ 

	jQuery(".wish_list_heading").on("click",function(){
		//alert("hello");
		if(!jQuery(this).hasClass("up")){
			jQuery("#wish_list").css("height","300px");
			jQuery(this).addClass("up");
			jQuery("#wish_list").css("overflow","auto");
			}else{
			jQuery("#wish_list").css("height","30px");
			jQuery(this).removeClass("up");
			jQuery("#wish_list").css("overflow","hidden");
		}
	    
	});

});
function show_message($msg,$product_id){
	// jQuery(".add_wishlist_"+$product_id).hide();
	// jQuery(".added_wishlist_"+$product_id).html($msg);
	// $top = Math.max(0, ((jQuery(window).height() - jQuery("#msg").outerHeight()) / 2) + jQuery(window).scrollTop()) + "px";
    // $left = Math.max(0,((jQuery(window).width() - jQuery("#msg").outerWidth()) / 2) + jQuery(window).scrollLeft()) + "px";
	// jQuery("#msg").css("left",$left);
	// jQuery("#msg").animate({opacity: 0.6,top: $top},10000,function(){
		// jQuery(this).css({'opacity':1});
	// }).show();
	// setTimeout(function(){jQuery("#msg").animate({opacity: 0.6,top: "0px"}, 10000,function(){
		// jQuery(this).hide();
	// });},400);
}
function count_items_in_wishlist_update(){
	jQuery("#listitem").html(wish_list.length);
	if(wish_list.length>1){
		jQuery("#p_label").html("Products");
		}else{
		jQuery("#p_label").html("Product");
	}  
}
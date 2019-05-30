<?php

/******************Assets Url , CSS JS ETC**********************/
if(!function_exists('assets_url')){


		function assets_url(){
		
			$CI=& get_instance();
    			
				return $CI->config->item('assets_url');
		
		}

}
/******************Assets Url , CSS JS ETC**********************/
if(!function_exists('admin_assets_url')){


		function admin_assets_url(){
		
			$CI=& get_instance();
    			
				return $CI->config->item('admin_assets_url');
		
		}

}
/****************** telecaller Url**********************/
if(!function_exists('tele_url')){

		function tele_url(){
		
			$CI=& get_instance();
    			
				return $CI->config->item('tele_url');
		}

}
if(!function_exists('sabon_url')){

		function sabon_url(){
		
			$CI=& get_instance();
    			
				return $CI->config->item('sabon_url');
		
		}

}
if(!function_exists('home_assets_url')){


		function home_assets_url(){
		
			$CI=& get_instance();
    			
				return $CI->config->item('home_assets_url');
		
		}

}

/****************** Admin Url**********************/
if(!function_exists('admin_url')){


		function admin_url(){
		
			$CI=& get_instance();
    			
				return $CI->config->item('admin_url');
		
		
		
		}
	


}
/****************************************/

if(!function_exists('admin_details_data')){

	function admin_details_data($key){
	
		$CI=& get_instance();
		
		$admin_data=$CI->db->where('id',1)->get('tbl_sitemanagement')->result_array();
		
		return $admin_data[0][$key];
	
	
	
	}

}

/****************************/

function strint_view($array){
	$set_in='';
	
	foreach($array as $val){
	
	
	$set_in.='"'.$val.'",'; 
	}
	$set_in=rtrim($set_in,',');
	
	return $set_in;

}


function strint_to_in_view($array){
	$set_in='0,';
	
	foreach($array as $val){
	$set_in.=''.$val.',';
	}
	$set_in=rtrim($set_in,',');
	
	return $set_in;

}

function limit_words($string,$start=0,$word_limit)
{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,$start,$word_limit));
}

function limit_characters($string,$start=0,$character_limit)
{
    
    return substr($string,$start,$character_limit); 
}
function createSalt()
	{
		$text = md5(uniqid(rand(), true));
		return substr($text, 0, 3);
	}


function show_item_img($array){
		$CI=& get_instance();
		$array=trim($array);
		
	$query=$CI->db->where('list_id',$array)->where('main_image',1)->where('gallery_status',1)->get('tbl_list_gallery')->result_array();
		
	
			
			if(!empty($query[0]['FeaturedImg']))
			{ 
			  $img_url= 'uploads/listingimg/'.$query[0]['list_id']."/".$query[0]['FeaturedImg'];
			}
			else {
				$img_url="notavailable.jpg";
				
				}
		return $img_url;
	}
	function show_workingdays($start_day ,$end_day){
		
		
		if(($start_day=='Monday')&&($end_day=='Saturday')){
			 return "<img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayoff.png' class='img-responsive workingdayimg'/>";
			
			}elseif(($start_day=='Sunday')&&($end_day=='Friday')){
			 return "<img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayoff.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/>";
			
			
			}elseif(($start_day=='Monday')&&($end_day=='Friday')){
			 return "<img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayoff.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayoff.png' class='img-responsive workingdayimg'/>";
			
			
			}
			elseif(($start_day=='Tuesday')&&($end_day=='Sunday')){
			 return "<img src='".home_assets_url()."img/dayoff.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/><img src='".home_assets_url()."img/dayon.png' class='img-responsive workingdayimg'/>";
			
			
			}
	  
	}
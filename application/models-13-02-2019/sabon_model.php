<?php 

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sabon_model extends CI_Model 
 {
   function __construct()
    {
        parent::__construct();
		
		
    }

	/*********************************all social media****************************************/
	  public function all_social_media(){
		  
		  $query=$this->db->where('status',1)->get('tbl_socialmedia')->result_array();
		  return $query; 
	  }
	  
	 /*************************************************************************/ 
	 	/*********************************all city****************************************/
	  public function all_active_city(){
		  
		  $query=$this->db->where('status',1)->order_by('city_name','asc')->get('tbl_city')->result_array();
		  return $query; 
	  }
	  
	 /*************************************************************************/ 
	 
	 	/*********************************all home ad****************************************/
	  public function all_home_ad(){
		  
		  $query=$this->db->where('name','home')->get('tbl_advertisement')->result_array();
		  return $query; 
	  }
	  
	 /*************************************************************************/ 
	 	/*********************************all address details****************************************/
	  public function address_details(){
		  
		  $query=$this->db->where('id',1)->get('tbl_sitemanagement')->result_array();
		  return $query; 
	  }
	  
	 /*************************************************************************/ 
	 /*********************************all home_slider****************************************/
	  public function home_slider(){
		  
		  $query=$this->db->where('status',1)->get('tbl_sliderimage')->result_array();
		  return $query; 
	  }
	  
	 /*************************************************************************/
	 
	 
	 	 /******************************** check user Login ****************************************/
	  public function getRows($contactno,$password){
		  
		  //$query=$this->db->where('contactno',$contactno)->db->where('password',$password)->get('tbl_customer')->result_array();
		  $query="select * from tbl_customer where  contactno='".$contactno."' and password='".$password."'";
		  $result=$this->db->query($query)->row();
		 // echo $query;
		 // echo "<pre>"; print_r($result);die;
		  return $result; 
	  }
	  
	 /*************************************************************************/
	 
	 
	 	  /*********************************all universal category****************************************/
	  public function all_univcate(){
		  
		  $query=$this->db->where('status',1)->order_by('univ_category','asc')->get('tbl_universal_category')->result_array();
		  return $query; 
	  }
	  
	  /*************************************************************************/ 
	  	  /*********************************all popular category****************************************/
	  public function all_popular_category(){
		  
		  $query=$this->db->where('status',1)->order_by('order_by','asc')->get('tbl_popular_category')->result_array();
		  return $query; 
	  }
	  
	  /*************************************************************************/ 
	  /*********************************all category****************************************/
	  public function all_category(){
		  
		  $query=$this->db->where('status',1)->order_by('category','asc')->get('tbl_category')->result_array();
		  return $query; 
	  }
	  
	  /*************************************************************************/ 
	  
	  	  /*********************************Featured Blog****************************************/
	  public function featured_blog(){
		  
		  $featured_blog="select * from tbl_blogs where  status=1 ORDER  BY id DESC LIMIT  1";
		  $query=$this->db->query($featured_blog)->row();
		  // echo $featured_blog;
		  // print_r($query); die;
		  return $query; 
	  }
	  
	  /*************************************************************************/ 
	  
	  	  /*********************************latest 6  Blog * ***************************************/
	  public function latest_blog(){
		  
		  $featured_blog="select * from tbl_blogs where  status=1 ORDER  BY id DESC LIMIT  0,5";
		  $query=$this->db->query($featured_blog)->result_array();
		  // echo $featured_blog;
		  // print_r($query); die;
		  return $query; 
	  }
	  
	  /*************************************************************************/ 
	  
	  	  	  /********************************* Blog Comments****************************************/
	  public function get_blogComment($blog_id){
		  
		  $logo_comments="select * from tbl_blogcomments where blog_id='".$blog_id."'";
		  $query=$this->db->query($logo_comments)->result_array();
		 
		  return $query; 
	  }
	  
	  /*************************************************************************/ 
	  
	  
	  	  /*********************************all subcategory according to category*******************************/
	  public function allcate_subcategory($category_id){
		  
		 // echo $category_id; exit;
		  if($category_id==8){
		  $query=$this->db->where('status',1)->where('category_id',$category_id)->order_by('subcategory','desc')->get('tbl_subcategory')->result_array();
		  }else{
			  $query=$this->db->where('status',1)->where('category_id',$category_id)->order_by('subcategory','asc')->get('tbl_subcategory')->result_array();
			  }
		  return $query; 
	  }
	  
	  /*************************************************************************/
	  


	  
	  	  	  /*********************************all subcategory according to category*******************************/
	  public function popular_subcategory($category_id){
		  $query=$this->db->where("status",1)->where("category_id",$category_id)->order_by("subcategory","asc")->limit(8)->get("tbl_subcategory")->result_array();
		  return $query; 
	  }
	  
	  /*************************************************************************/
	  
	 /*********************************all inner according to category*******************************/
	  public function allcate_innercategory($category_id,$subcategory_id){
		  
		  $query=$this->db->where('status',1)->where('category_id',$category_id)->where('subcategory_id',$subcategory_id)->order_by('innercategory','asc')->get('tbl_innercategory')->result_array();
		  return $query; 
	  }
	  
	  /*************************************************************************/
	  
/************************************aboutus*************************************/   
		public function aboutus_data(){
			  $query=$this->db->where('url','aboutus')->get('tbl_content')->result_array();
			  return $query; 
		   }
/*************************************************************************/ 


/************************************storeaboutus*************************************/   
		public function storeaboutus_data($univ_category,$store_name){
			  
			  $url= $store_name."/about-us";
			  $query=$this->db->where('url',$url)->where('store',$univ_category)->get('tbl_content')->result_array();
			 // print_r($query);
			  return $query; 
		   }
/*************************************************************************/ 

/************************************store services*************************************/   
		public function storeservice_data($univ_category,$store_name){
			  
			  $url= $store_name."/our-services";
			  $query=$this->db->where('url',$url)->where('store',$univ_category)->get('tbl_content')->result_array();
			 // print_r($query);
			  return $query; 
		   }
/*************************************************************************/ 


/************************************store policy*************************************/   
		public function storepolicy_data($univ_category,$store_name){
			  
			  $url= $store_name."/privacy-policy";
			  $query=$this->db->where('url',$url)->where('store',$univ_category)->get('tbl_content')->result_array();
			 // print_r($query);
			  return $query; 
		   }
/*************************************************************************/ 


/************************************privacy*************************************/   
		public function privacy_data(){
			  $query=$this->db->where('url','privacypolicy')->get('tbl_content')->result_array();
			 // print_r($query);
			  return $query; 
		   }
/*************************************************************************/ 

/************************************terms*************************************/   
		public function terms_data(){
			  $query=$this->db->where('url','terms')->get('tbl_content')->result_array();
			  return $query; 
		   }
/*************************************************************************/ 	  
	/************************************aboutus*************************************/   
		public function all_team_member(){
		 $query=$this->db->limit(5)->where('status',1)->get('tbl_teammember')->result_array();
			  return $query; 
		   }
/*************************************************************************/   
	  
	  
/************************************Add listing*************************************/   
		public function add_listing_request(){
			
			
					if(@$this->input->post('service_provider')!=''){
			
			$final_cate_id_arr=array();		
		$catename=rtrim($this->input->post('service_provider'),', ');
		$final_cate_name = explode(", ", $catename);
		$final_cat_name=strint_view($final_cate_name);
				
		$sql_category="select * from tbl_category where  status=1 and category IN (".$final_cat_name.")";
		$cae_arr=$this->db->query($sql_category)->result_array();
		foreach($cae_arr as $final_cat_data){$final_cate_id_arr[]=$final_cat_data['id'] ;}
		 $final_cat_id=strint_to_in_view($final_cate_id_arr);
	   }else{
		  $final_cat_id=''; 
	   }
			
			
			
				 $insert_data=array(
			                'first_name'=>$this->input->post('first_name'),
							'last_name'=>$this->input->post('last_name'),
							'contactno'=>$this->input->post('contactno'), 
							'emailid'=>$this->input->post('listemail'),
							'city_id'=>$this->input->post('city_id'),
							'location_id'=>$this->input->post('location_id'),
							'company_address'=>$this->input->post('company_address'),
							'company_name'=>$this->input->post('company_name'),
							'service_provider'=>$final_cat_id,
							'listing_agree'=>$this->input->post('listing_agree'),
							'adddate'=>date('Y-m-d')
						);
						
		          $query=$this->db->insert('tbl_list_request',$insert_data);
		   }
/*************************************************************************/ 		  
/************************************Add listing*************************************/   
		public function add_advertise_request(){
			
			
			
			
				 $insert_data=array(
			                'first_name'=>$this->input->post('first_name'),
							'last_name'=>$this->input->post('last_name'),
							'contactno'=>$this->input->post('contactno'),
							'emailid'=>$this->input->post('listemail'),
							'city_id'=>$this->input->post('city_id'),
							'location_id'=>$this->input->post('location_id'),
							'company_name'=>$this->input->post('company_name'),
							'company_pincode'=>$this->input->post('company_pincode'),
							'adddate'=>date('Y-m-d')
						);	
						
		          $query=$this->db->insert('tbl_advertise_request',$insert_data);
		   }
/*************************************************************************/ 	  
	  
	  
	  
	  

/************************************category*************************************/   
	   public function all_univ_category($univ_cate_id){
		   $univ_cat_arr=$this->admin_model->single_univ_category($univ_cate_id);
		   $univ_cat_id=explode(",",$univ_cat_arr[0]['multiple_cate']);
		   unset($univ_cat_id[0]);
		   $final_univcat_id=strint_view($univ_cat_id);
		   
		  $sql_category="select * from tbl_listing where  status=1 and category_id IN (".$final_univcat_id.")";
		  $query=$this->db->query($sql_category)->result_array();
		 
		  return $query; 
	   }

/*************************************************************************/ 

    public function category_in_arr($category_id){
		
		$cat_id=explode(",",$category_id);
		  unset($cat_id[0]);
		  $final_cat_id=strint_view($cat_id);
		  $sql_category="select * from tbl_category where status=1 and id IN (".$final_cat_id.")";
		  $query=$this->db->query($sql_category)->result_array();
		  return $query; 
	}
	
	
		   /******************************total search list *********************************/
    public function total_search_list(){
		
		
	$city_sql='';
	$location_sql='';
	$uinv_category_query='';
	$uinv_category_sql='';
	$category_sql='';
	$subcategory_sql='';
	$innercategory_sql='';
	$business_name_sql='';
	
		$list_uinv_category_data=$this->session->userdata('list_uinv_category_data');
		$list_srch_skill_data=$this->session->userdata('list_srch_skill_data');
		$list_srch_loc_data=$this->session->userdata('list_srch_loc_data');
		$srch_business_name_data=$this->session->userdata('srch_business_name_data');
		
		
		//echo "<pre>"; print_r($_SESSION); exit;
		if(!empty($list_srch_loc_data['location_id'])){
			
			@$parent_id=$this->db->where("parent_location_id",$list_srch_loc_data['location_id'])->get('tbl_location')->result();
			if(!empty($parent_id)){
			foreach($parent_id as $allparent){
				
				$child[]=$allparent->id;
			}
			$allchild=implode(',',$child);
			
			// id IN (".$allchild.")
			 	$location_sql=" and location_id IN(".$allchild.")";
			}else{
			
			$location_sql=" and location_id='".$list_srch_loc_data['location_id']."'";
			}
			}
		if(!empty($list_srch_loc_data['city_id'])){
			$city_sql=" and city_id='".$list_srch_loc_data['city_id']."'";
			}
			elseif(!empty($_SESSION['city'])){
			$city_sql=" and city_id='".$_SESSION['city']."'";
			}
		
		if(!empty($list_srch_skill_data['category_id'])){
			$var_cate=$list_srch_skill_data['category_id'];
			$category_sql=" and FIND_IN_SET('$var_cate',category_id) ";
			}
		if(!empty($list_srch_skill_data['subcategory_id'])){
			$var_subcate=$list_srch_skill_data['subcategory_id'];
			$subcategory_sql=" and FIND_IN_SET('$var_subcate',subcategory_id) ";
			
			}
		if(!empty($list_srch_skill_data['innercategory_id'])){
			$var_innercategory=$list_srch_skill_data['innercategory_id'];
			$innercategory_sql=" and FIND_IN_SET('$var_innercategory',innercategory_id) ";
			
			}
		if(!empty($list_uinv_category_data['category_id'])){
			
			$univ_cat_arr=$this->admin_model->single_univ_category($list_uinv_category_data['category_id']);
		   $univ_cat_ids=explode(",",$univ_cat_arr[0]['multiple_cate']);
		   unset($univ_cat_ids[0]);
		   $uinv_category_sql=" and (";
		   //$final_univcat_id=strint_view($univ_cat_ids);
		   
			foreach($univ_cat_ids as $univ_cat_id)
              {
				  
			    $uinv_category_query .="  FIND_IN_SET($univ_cat_id,category_id) or";
			  }
			  $uinv_category_sql .=rtrim($uinv_category_query,' or');
			   $uinv_category_sql .=" )";
			}
			
			
			if(!empty($srch_business_name_data['business_name'])){
				$srch_business_name_data1 = mysql_real_escape_string($srch_business_name_data['business_name']);
			$business_name_sql=" and business_name='".$srch_business_name_data1."'";
			}
			
			 $searchsql=$city_sql.$location_sql.$category_sql.$subcategory_sql.$innercategory_sql.$uinv_category_sql.$business_name_sql;
			 if(!empty($searchsql)){
				
				$con="1=1";
				} else{$con="1=0";}
		
		
	    $search_sql="select * from tbl_listing where $con and  status=1 $searchsql ";
		
		  $query=$this->db->query($search_sql)->num_rows();
		// echo "<pre>"; print_r($query); exit;
		  return $query;
	}
         
	   /***************************************************************/
    public function all_search_list($limit, $start){
	$page1 =($start -1) * $limit;	
		
	$city_sql='';
	$location_sql='';
	$uinv_category_query='';
	$uinv_category_sql='';
	$category_sql='';
	$subcategory_sql='';
	$innercategory_sql='';
	$business_name_sql='';
	
		$list_uinv_category_data=$this->session->userdata('list_uinv_category_data');
		$list_srch_skill_data=$this->session->userdata('list_srch_skill_data');
		$list_srch_loc_data=$this->session->userdata('list_srch_loc_data');
		$srch_business_name_data=$this->session->userdata('srch_business_name_data');
		
			
		
		if(!empty($list_srch_loc_data['location_id'])){
			
			@$parent_id=$this->db->where("parent_location_id",$list_srch_loc_data['location_id'])->get('tbl_location')->result();
			if(!empty($parent_id)){
			foreach($parent_id as $allparent){
				
				$child[]=$allparent->id;
			}
			$allchild=implode(',',$child);
			//echo "<pre>"; print_r($allchild); exit;
			// id IN (".$allchild.")
			 	$location_sql=" and location_id IN(".$allchild.")";
			}else{
			
			$location_sql=" and location_id='".$list_srch_loc_data['location_id']."'";
			}
		//	$location_sql=" and location_id='".$list_srch_loc_data['location_id']."'";
			}
		if(!empty($list_srch_loc_data['city_id'])){
			$city_sql=" and city_id='".$list_srch_loc_data['city_id']."'";
			}
elseif(!empty($_SESSION['city'])){
			$city_sql=" and city_id='".$_SESSION['city']."'";
			}			
		
		if(!empty($list_srch_skill_data['category_id'])){
			$var_cate=$list_srch_skill_data['category_id'];
			$category_sql=" and FIND_IN_SET('$var_cate',category_id) ";
			}
		if(!empty($list_srch_skill_data['subcategory_id'])){
			$var_subcate=$list_srch_skill_data['subcategory_id'];
			$subcategory_sql=" and FIND_IN_SET('$var_subcate',subcategory_id) ";
			
			}
		if(!empty($list_srch_skill_data['innercategory_id'])){
			$var_innercategory=$list_srch_skill_data['innercategory_id'];
			$innercategory_sql=" and FIND_IN_SET('$var_innercategory',innercategory_id) ";
			
			}
		if(!empty($list_uinv_category_data['category_id'])){
			
			$univ_cat_arr=$this->admin_model->single_univ_category($list_uinv_category_data['category_id']);
		   $univ_cat_ids=explode(",",$univ_cat_arr[0]['multiple_cate']);
		   unset($univ_cat_ids[0]);
		   $uinv_category_sql=" and (";
		   //$final_univcat_id=strint_view($univ_cat_ids);
		   
			foreach($univ_cat_ids as $univ_cat_id)
              {
				  
			    $uinv_category_query .="  FIND_IN_SET($univ_cat_id,category_id) or";
			  }
			  $uinv_category_sql .=rtrim($uinv_category_query,' or');
			   $uinv_category_sql .=" )";
			}
			
			
			if(!empty($srch_business_name_data['business_name'])){
				//echo "<pre>"; print_r($srch_business_name_data); exit;
				$srch_business_name_data1 = mysql_real_escape_string($srch_business_name_data['business_name']);
			$business_name_sql=" and business_name='".$srch_business_name_data1."'";
			}
			
			 $searchsql=$city_sql.$location_sql.$category_sql.$subcategory_sql.$innercategory_sql.$uinv_category_sql.$business_name_sql;
			if(!empty($searchsql)){
				
				$con="1=1";
				} else{$con="1=0";}
			// $allsimilar=$category_sql.$subcategory_sql.$innercategory_sql.$uinv_category_sql.$business_name_sql;
	//   $search_sql="select * from tbl_listing where $con and  status=1 $searchsql order by id DESC limit $page1, $limit";
	// $allsimilar_sql="select * from tbl_listing where $con and  status=1 $searchsql order by id DESC limit $page1,$limit";
	  $search_sql="select * from tbl_listing where $con and  status=1 $searchsql order by id DESC limit $page1,$limit";
	 // echo $search_sql; exit;
	 // $query_allsimilar_sql=$this->db->query($allsimilar_sql)->result_array();
	  
		  $query=$this->db->query($search_sql)->result_array();
		 //echo "<pre>"; print_r($search_sql); exit;
		  return $query;
	}
	
	
	  public function all_search_list1($limit, $start){
	$page1 =($start -1) * $limit;	
		
	$city_sql='';
	$location_sql='';
	$uinv_category_query='';
	$uinv_category_sql='';
	$category_sql='';
	$subcategory_sql='';
	$innercategory_sql='';
	$business_name_sql='';
	
		$list_uinv_category_data=$this->session->userdata('list_uinv_category_data');
		$list_srch_skill_data=$this->session->userdata('list_srch_skill_data');
		$list_srch_loc_data=$this->session->userdata('list_srch_loc_data');
		$srch_business_name_data=$this->session->userdata('srch_business_name_data');
		
			
		
		if(!empty($list_srch_loc_data['location_id'])){
			
			@$parent_id=$this->db->where("parent_location_id",$list_srch_loc_data['location_id'])->get('tbl_location')->result();
			if(!empty($parent_id)){
			foreach($parent_id as $allparent){
				
				$child[]=$allparent->id;
			}
			$allchild=implode(',',$child);
			//echo "<pre>"; print_r($allchild); exit;
			// id IN (".$allchild.")
			 	$location_sql=" and location_id NOT IN(".$allchild.")";
			}else{
			
			$location_sql=" and location_id !='".$list_srch_loc_data['location_id']."'";
			}
		//	$location_sql=" and location_id='".$list_srch_loc_data['location_id']."'";
			}
		if(!empty($list_srch_loc_data['city_id'])){
			$city_sql=" and city_id !='".$list_srch_loc_data['city_id']."'";
			}
		elseif($_SESSION['city'] !=""){
			$city_sql=" and city_id !='".$_SESSION['city']."'";
			}			
		
		if(!empty($list_srch_skill_data['category_id'])){
			$var_cate=$list_srch_skill_data['category_id'];
			$category_sql=" and FIND_IN_SET('$var_cate',category_id) ";
			}
		if(!empty($list_srch_skill_data['subcategory_id'])){
			
		 $subcatedata=$this->db->where('id',$list_srch_skill_data['subcategory_id'])->get('tbl_subcategory')->row();
			
			//echo "<pre>"; print_r($subcatedata->category_id); exit;
			$var_subcate1=$list_srch_skill_data['subcategory_id'];
			$var_subcate=$subcatedata->category_id;
			$subcategory_sql=" and NOT FIND_IN_SET('$var_subcate1',subcategory_id) ";
			$category_sql=" and FIND_IN_SET('$var_subcate',category_id) ";
			
			}
		if(!empty($list_srch_skill_data['innercategory_id'])){
			
			 $innercatedata=$this->db->where('id',$list_srch_skill_data['innercategory_id'])->get('tbl_innercategory')->row();
			 //echo "<pre>"; print_r($innercatedata); exit;
			$cateid=$innercatedata->category_id;
			$var_innercategory=$list_srch_skill_data['innercategory_id'];
			$category_sql=" and FIND_IN_SET('$cateid',category_id) ";
			$innercategory_sql=" and NOT FIND_IN_SET('$var_innercategory',innercategory_id) ";
			
			}
		if(!empty($list_uinv_category_data['category_id'])){
			
			$univ_cat_arr=$this->admin_model->single_univ_category($list_uinv_category_data['category_id']);
		   $univ_cat_ids=explode(",",$univ_cat_arr[0]['multiple_cate']);
		   unset($univ_cat_ids[0]);
		   $uinv_category_sql=" and (";
		   //$final_univcat_id=strint_view($univ_cat_ids);
		   
			foreach($univ_cat_ids as $univ_cat_id)
              {
				  
			    $uinv_category_query .="  FIND_IN_SET($univ_cat_id,category_id) or";
			  }
			  $uinv_category_sql .=rtrim($uinv_category_query,' or');
			   $uinv_category_sql .=" )";
			}
			
			
			if(!empty($srch_business_name_data['business_name'])){
				//echo "<pre>"; print_r($srch_business_name_data); exit;
				$srch_business_name_data1 = mysql_real_escape_string($srch_business_name_data['business_name']);
			$business_name_sql=" and business_name='".$srch_business_name_data1."'";
			}
			
			 $searchsql=$city_sql.$location_sql.$category_sql.$subcategory_sql.$innercategory_sql.$uinv_category_sql.$business_name_sql;
			if(!empty($searchsql)){
				
				$con="1=1";
				} else{$con="1=0";}
			 $allsimilar=$category_sql.$subcategory_sql.$innercategory_sql.$uinv_category_sql.$business_name_sql;
	//   $search_sql="select * from tbl_listing where $con and  status=1 $searchsql order by id DESC limit $page1, $limit";
	 $allsimilar_sql="select * from tbl_listing where $con and  status=1 $searchsql order by id DESC limit $page1,$limit";
	 // $search_sql="select * from tbl_listing where $con and  status=1 $searchsql order by id DESC limit $page1,$limit";
	 // echo $allsimilar_sql; exit;
	  $query_allsimilar_sql=$this->db->query($allsimilar_sql)->result_array();
	// echo "<pre>"; print_r($query_allsimilar_sql); exit;
		 // $query=$this->db->query($search_sql)->result_array();
		 
		  return $query_allsimilar_sql;
	}
	
/************************************total customer using number*************************************/   
	   public function total_customer_number($customer_contactno){
		  $query=$this->db->where('contactno',$customer_contactno)->get('tbl_customer')->num_rows();
		  return $query; 
	   }
/************************************total customer using email id*************************************/  
	  public function total_customer_email($customer_mailid){
		  $query=$this->db->where('emailid',$customer_mailid)->get('tbl_customer')->num_rows();
		  return $query; 
	   }
/************************************total customer using fb id*************************************/  
 	   public function exiting_fb_customer($fb_id){
		  $query=$this->db->where('facebookid',$fb_id)->get('tbl_customer')->num_rows();
		  return $query; 
	   }
/*************************************************************************/ 

/************************************total customer using gp id*************************************/  
 	   public function exiting_googleplus_customer($gp_id){
		  $query=$this->db->where('googleplusid',$gp_id)->get('tbl_customer')->num_rows();
		  return $query;  
	   }
/*************************************************************************/ 

/************************************single customer details*************************************/   
		public function single_customer_details($customer_contactno){
			  $query=$this->db->where('contactno',$customer_contactno)->get('tbl_customer')->result_array();
			  return $query; 
		   }
/************************************total customer using email id*************************************/  		   
		 public function single_customer_details_email($customer_mailid){
		  $query=$this->db->where('emailid',$customer_mailid)->get('tbl_customer')->result_array();
		  return $query; 
	   }
	   
/************************************total customer using email id*************************************/  		   
		 public function single_customer_details_id($customer_id){
		  $query=$this->db->where('id',$customer_id)->get('tbl_customer')->row();
		  return $query; 
	   }	   
	   
/************************************total customer using fb id*************************************/  		   
		public function single_customer_fb_details($fb_id){
			  $query=$this->db->where('facebookid',$fb_id)->get('tbl_customer')->result_array();
			  return $query; 
		   }
/*****************************************customer_last_login********************************/ 
   public function customer_last_login(){

 
           $update_data=array(
							'last_login_date'=>date('Y-m-d')
						);	
						
		$this->db->where('contactno',$this->input->post('usercontactno'));
		$this->db->update('tbl_customer',$update_data);
   
   
	}	
   /*********************************add faceboo customer ****************************************/	
   public function add_facebookcustomer(){
	   $facebook_data=$this->session->userdata('facebookdata_data');
	  $exitinguser=$this->sabon_model->total_customer_email($facebook_data['email']);
	  
	  if($exitinguser == 0) {
		  
	   $insert_data=array(
							'first_name'=>$facebook_data['first_name'],
							'last_name'=>$facebook_data['last_name'],
							'emailid'=>$facebook_data['email'],
							'facebookid'=>$facebook_data['id'],
							'addDate'=>date('Y-m-d ')
						);	
						
		$query=$this->db->insert('tbl_customer',$insert_data);
	  }
   }
/*************************************************************************/  
      public function add_facebookuser_email(){
	   $facebook_data=$this->session->userdata('facebookdata_data');
	  $exitinguser=$this->bestoffice_model->totalnumber_user($this->input->post('reg_email'));
	  
	  if($exitinguser == 0) {
		  
	   $insert_data=array(
							'first_name'=>$facebook_data['first_name'],
							'last_name'=>$facebook_data['last_name'],
							'emailid'=>$this->input->post('reg_email'),
							'facebookid'=>$facebook_data['id'],
							'addDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_customer',$insert_data);
	  }
   }

/*************************************************************************/  	


/*************************************************************************/  
      public function insert_userdetails($userData){
		  
		$query=$this->db->insert('tbl_customer',$userData);
		//print_r($query);die;
		return $query;
	}

/*************************************************************************/  	


    public function add_registration($verification_code){
		
		  $insert_data=array(
							'contactno'=>$this->input->post('contactno'),
							'verification_code'=>$verification_code,
						);
		
		$query=$this->db->insert('tbl_customer',$insert_data);
		
		/*$customer_details=$this->sabon_model->single_customer_details($this->input->post('contactno'));
		return $customer_details; */
	}

	/*************************************************************************/  	
    public function verify_customer(){ 
	
	 // $multiple_event= strint_to_in_view($this->input->post('interest_event'));
	
	    // $hash_password = hash('sha256',$this->input->post('password'));
		 //$salt = createSalt();
		 $new_password = md5($this->input->post('password')); 
	
	if($this->session->userdata('facebookdata_data')==TRUE){
	$facebookdata_data=$this->session->userdata('facebookdata_data'); 
	
	 $update_data=array(
							'addDate'=>date('Y-m-d'),
							'facebookid'=>@$facebookdata_data['id'],
							'emailid'=>@$facebookdata_data['email'],
							'first_name'=>@$facebookdata_data['first_name'],
							'last_name'=>@$facebookdata_data['last_name'],
							'password'=>$new_password,
							'username'=>$this->input->post('name'),
							//'interest_event'=>$multiple_event,
							//'salt'=>$salt,
							'verify'=>1,
						); 
	
	}else if($this->session->userdata('googleplus_data')==TRUE){
	$googleplus_data=$this->session->userdata('googleplus_data'); 
	
	 $update_data=array(
							'addDate'=>date('Y-m-d'),
							'googleplusid'=>@$googleplus_data['id'],
							'emailid'=>@$googleplus_data['email'],
							'first_name'=>@$googleplus_data['given_name'],
							'last_name'=>@$googleplus_data['family_name'],
							'password'=>$new_password,
							'username'=>$this->input->post('name'),
							//'interest_event'=>$multiple_event,
							'salt'=>$salt,
							'verify'=>1,
						);
	
	}
	else{
		 $update_data=array(
							'addDate'=>date('Y-m-d'),
							'password'=>$new_password,
							//'interest_event'=>$multiple_event,
							'username'=>$this->input->post('name'),
							'salt'=>$salt,
							'verify'=>1,
						);
		
	}
	
		
		
		 
		
		
		$this->db->where('contactno',$this->input->post('usercontactno'));
		$this->db->update('tbl_customer',$update_data);
		$customer_details=$this->sabon_model->single_customer_details($this->input->post('usercontactno'));
		return $customer_details; 
		
	}
/********************************change password*****************************************/ 
   public function change_password(){
	   if($this->session->userdata('customer_login_data')==TRUE){
$customer_login_data=$this->session->userdata('customer_login_data');

	   	 $hash_password = hash('sha256',$this->input->post('new_password'));
		 $salt = createSalt();
		 $new_password = hash('sha256', $salt . $hash_password); 
		 	   $update_data=array(
							'salt'=>$salt,
							'password'=>$new_password,
						);
							
	   	$this->db->where('id',$customer_login_data['customer_id']);
		$this->db->update('tbl_customer',$update_data);
	   }
   }

/************************************change password*************************************/ 
/********************************update profile*****************************************/ 
   public function update_profile(){
	   if($this->session->userdata('customer_login_data')==TRUE){
$customer_login_data=$this->session->userdata('customer_login_data');
$multiple_event= strint_to_in_view($this->input->post('interest_event'));
	   	
		 	   $update_data=array(
							'first_name'=>$this->input->post('first_name'),
							'last_name'=>$this->input->post('last_name'),
							'contactno'=>$this->input->post('contactno'),
							'emailid'=>$this->input->post('emailid'),
							'interest_event'=>$multiple_event,
						);
							
	   	$this->db->where('id',$customer_login_data['customer_id']);
		$this->db->update('tbl_customer',$update_data);
	   }
   }

/************************************update profile*************************************/ 
  public function all_hiring(){
	  
	  		  $query=$this->db->where('status','1')->get('tbl_career')->result_array();
		  return $query; 

  }
  /****************************************************/
  
  
  /************************************update User profile*************************************/ 
    public function update_user_profile($id){
	//echo $config['upload_path'] = base_url().'public/uploads/userimg_'.$id; die;
		 if(isset($_FILES['userimage']['name']) && $_FILES['userimage']['name'] != ''){
			
				$config['upload_path'] = './public/uploads/userimg';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['userimage']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);

								
					if ( ! $this->upload->do_upload('userimage'))
						{
						
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('userimage_img_error',$error);
							redirect(base_url().'profile/');
						
						}
						else
						{
						@unlink('./public/uploads/userimg/'.$id.'/'.$this->input->post('old_img'));
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}	
						 $update_data=array(
							'username' => $this->input->post('name'),
							'emailid' => $this->input->post('email'),
							//'password' => md5($this->input->post('password')),
							'contactno' => $this->input->post('phone'),
							'userimage' =>$file_name,
						);	
						
						$this->db->where('id',$id);
						$this->db->update('tbl_customer',$update_data);
				
				
						
		

  }
  /****************************************************/
  
  
   public function add_apply_job(){
	  
	  		  $insert_data=array(
			                'name'=>$this->input->post('fist_name'),
							'email'=>$this->input->post('jobemail'),
							'contactnumber'=>$this->input->post('jobcontact'),
							'message'=>$this->input->post('message'),
							'CreateDate'=>date('Y-m-d')
							
						);	
						
		$query=$this->db->insert('tbl_hiring',$insert_data); 

  } 
    /***************************update password *************************/
   public function update_password($contactno,$password){
	  
	 $hash_password = hash('sha256',$password);
		 $salt = createSalt();
		 $new_password = hash('sha256', $salt . $hash_password); 
		 	   $update_data=array(
							'salt'=>$salt,
							'password'=>$new_password,
						);
							
	   	$this->db->where('contactno',$contactno);
		$this->db->update('tbl_customer',$update_data);
		

  }

       /*************************************************************************/ 
   public function add_enquiry(){
	   
	   $insert_data=array(
			                'enqueryname'=>$this->input->post('enqueryname'),
							'enqueryemail'=>$this->input->post('enqueryemail'),
							'enquerycontactno'=>$this->input->post('enquerycontactno'),
							'enquerytype'=>$this->input->post('enquerytype'),
							'enquerytypename'=>$this->input->post('enquerytypename'),
							'addDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_enquiry',$insert_data);
   }
/*************************************************************************/ 
   public function add_sendinformation(){
	   
	   $insert_data=array(
			                'customername'=>$this->input->post('customername'),
							'customernumber	'=>$this->input->post('customernumber	'),
							'customeremail'=>$this->input->post('customeremail'),
							'listid'=>$this->input->post('listid'),
							'addDate'=>date('Y-m-d')
						);	 
						
		$query=$this->db->insert('tbl_getinfo_sms',$insert_data);
   }
   /*************************** *************************/
   
   	/*********************edit list*********************************/
	 public function edit_list($list_id){
		 $list_arr=$this->admin_model->single_list($list_id);
		 
		 if($this->input->post('business_name', TRUE)){
			$list_titel= $this->input->post('business_name'); 
		 }
		if($this->input->post('location_id', TRUE)){
			$location_arr=$this->admin_model->single_location($this->input->post('location_id'));
			$list_titel .=" near ".$location_arr[0]['location'];	
			
		  }
		 
		  if($this->input->post('city_id', TRUE)){
			$city_arr=$this->admin_model->single_city($this->input->post('city_id'));
			$list_titel.= " in ".$city_arr[0]['city_name']; 
		  }
		 
		 	$new_url=preg_replace('/[ ,]+/', '-', trim($list_titel));
			$strr=substr(str_shuffle(MD5(microtime())), 0, 5);
			$list_url=$new_url.'-'.$strr;
			$new_list_url=strtolower($list_url);
		 
		 if($this->input->post('category_id', TRUE)){
		$multiple_category= strint_to_in_view($this->input->post('category_id'));
		 }else{
		  $multiple_category='';
		  }
		 
		 
		 if($this->input->post('subcategory_id', TRUE)){
		 $multiple_subcategory= strint_to_in_view($this->input->post('subcategory_id'));
		}else{
		  $multiple_subcategory='';
		  }
		
		if($this->input->post('innercategory_id', TRUE)){
		 $multiple_innercategory= strint_to_in_view($this->input->post('innercategory_id'));
		  }else{
		  $multiple_innercategory='';
		  }
			$update_data=array(
                            'person_name'=>$this->input->post('person_name'),
							'shop_email'=>$this->input->post('shop_email'),
							'mobile_no'=>$this->input->post('mobile_no'),
							'url_key'=>$new_list_url,
							'whatsapp_no'=>$this->input->post('whatsapp_no'),
							'landline_no'=>$this->input->post('landline_no'),
							'business_name'=>$this->input->post('business_name'),
							'category_id'=>@$multiple_category,
							'subcategory_id'=>@$multiple_subcategory,
							'innercategory_id'=>@$multiple_innercategory,
							'state_id'=>$this->input->post('state_id'),
							'city_id'=>$this->input->post('city_id'),
							'location_id'=>$this->input->post('location_id'),
							'shop_address'=>$this->input->post('shop_address'),
							'shop_zipcode'=>$this->input->post('shop_zipcode'),
							'opening_time'=>$this->input->post('opening_time'),
							'closeing_time'=>$this->input->post('closeing_time'),
							'working_day_on'=>$this->input->post('working_day_on'),
							'working_day_off'=>$this->input->post('working_day_off'),
							
							'work_Monday'=>$this->input->post('work_Monday'),
							'work_Tuesday'=>$this->input->post('work_Tuesday'),
							'work_Wednesday'=>$this->input->post('work_Wednesday'),
							'work_Thursday'=>$this->input->post('work_Thursday'),
							'work_Friday'=>$this->input->post('work_Friday'),
							'work_Saturday'=>$this->input->post('work_Saturday'),
							'work_Sunday'=>$this->input->post('work_Sunday'),
							'shop_website'=>$this->input->post('shop_website'),
							'status'=>1,
							
							
					        
				);			
				$this->db->where('id',$list_id);
				$this->db->update('tbl_listing',$update_data);
		 
	 }
	 	/************************************list number registretion 16-7*************************************/ 
	public function add_list_new_customer($contactno,$verification_code){
		
				  $insert_data=array(
							'contactno'=>$contactno,
							'verification_code'=>$verification_code,
						);
		
		          $query=$this->db->insert('tbl_customer',$insert_data);
	}
	
		/*********************All Products*********************************/
		
		public function all_products(){
		
		$all_product="select * from tbl_products ";
		 $product_arr=$this->db->query($all_product)->result_array();  
		
		return $product_arr;
	}
	
		/*********************end*********************************/
		
		
		/*********************Featured Products*********************************/
		
			  public function featured_products(){
	   	
		  $all_featuredproduct="select * from tbl_products where featured_status='1' order by id desc limit 0,3";
		 $featuredproduct_arr=$this->db->query($all_featuredproduct)->result_array();  
		
		return $featuredproduct_arr;
	}
	
	/*********************end*********************************/
	
	
	/*********************Checkout Products*********************************/
	
	
	     public function checkout(){
		
		$all_product="select * from tbl_products";
		$product_arr=$this->db->query($all_product)->result_array();  
		return $product_arr;
	}
	
	
	/*********************end*********************************/
	
	
	
	/*********************Insert customer details in "customer" table in database.*********************************/
   
	public function insert_customer($data)
	{
		//echo "<pre>"; print_r($data);
		$this->db->insert('tbl_customer', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;		
	}
	
	/*********************end*********************************/
	
	
	/*********************Insert order date with customer id in "orders" table in database.*********************************/
  
	public function insert_order($data)
	{
		$this->db->insert('tbl_orders', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	/*********************end*********************************/
	
	
	
        // Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($data)
	{
		$this->db->insert('tbl_order_details', $data);
	}
		public function category_stores($id)
	{
	
		//echo 'SELECT * FROM tbl_universal_category where multiple_cate in("'.$id.'")';die;
		$query = $this->db->query('SELECT * FROM tbl_universal_category WHERE find_in_set("'.$id.'", `multiple_cate`)');
		$store = $query->result_array();
		if(!empty($store))
		{
		return $store;
		}
		else
		{
			$store="NO Products in the store.";
			return $store;
		}
		
	}
	
	 
	  public function subcategory_stores($id)
	{
		//echo 'SELECT * FROM tbl_universal_category where multiple_subcate like("%'.$id.'%")';die;
		$query = $this->db->query('SELECT * FROM tbl_universal_category WHERE find_in_set("'.$id.'", `multiple_subcate`)');
		$store = $query->result_array();
		if(!empty($store))
		{
		return $store;
		}
		else
		{
			$store="NO Products in the store.";
			return $store;
		}
		
	}
	
		  public function innercategory_stores($id)
	{
		//echo 'SELECT * FROM tbl_universal_category where multiple_subcate like("%'.$id.'%")';die;
		$query = $this->db->query('SELECT * FROM tbl_universal_category WHERE find_in_set("'.$id.'", `multiple_innercate`)');
		$store = $query->result_array();
		if(!empty($store))
		{
		return $store;
		}
		else
		{
			$store="NO Products in the store.";
			return $store;
		}
		
	}
	
	 public function products_stores($id)
	{
		//echo 'SELECT * FROM tbl_universal_category where multiple_subcate like("%'.$id.'%")';die;
		$query = $this->db->query('SELECT * FROM tbl_products WHERE find_in_set("'.$id.'", `id`)');
		$store_id = $query->row();
		$storeid=$store_id->store_id;
		$univ = $this->db->query('SELECT * FROM tbl_universal_category WHERE find_in_set("'.$storeid.'", `id`)');
		$store = $univ->result_array();
		if(!empty($store))
		{
		return $store;
		}
		else
		{
			$store="NO Products in the store.";
			return $store;
		}
		
	}
	
			public function store_id($store)
	{
		$universal_cat_id= $this->db->query('SELECT id from tbl_universal_category where univ_category="'.$store.'"')->row();
		return $universal_cat_id;
		
	}
	
	
				public function tbl_cat_id($category_name)
	{
		$cat_id= $this->db->query('SELECT id from tbl_category where category="'.$category_name.'"')->row();
		return $cat_id;
		
	}
	
					public function tbl_innercat_id($innercategory_name)
	{
		$innercat_id= $this->db->query('SELECT id from tbl_innercategory where innercategory="'.$innercategory_name.'"')->row();
		return $innercat_id;
		
	}
					public function tbl_subcat_id($subcategory_name)
	{
		$subcat_id= $this->db->query('SELECT id from tbl_subcategory where subcategory="'.$subcategory_name.'"')->row();
		return $subcat_id;
		
	}
	
	public function store_products($getstoreid,$getcategoryid)
	{
		$store_products= $this->db->query("SELECT * from tbl_products where store_id='".$getstoreid."' and find_in_set('".$getcategoryid."',`category_id`) ")->result_array();
		
		return $store_products;
		//print_r($product_id);
	}
	
		public function store_subproducts($getstoreid,$getsubcategoryid)
	{
		$store_subproducts= $this->db->query("SELECT * from tbl_products where store_id='".$getstoreid."' and find_in_set('".$getsubcategoryid."',`subcategory_id`) ")->result_array();
		
		return $store_subproducts;
		
	}
		
		public function store_innerproducts($getstoreid,$getinnercategoryid)
	{
		$store_innerproduct= $this->db->query("SELECT * from tbl_products where store_id='".$getstoreid."' and find_in_set('".$getinnercategoryid."',`innercategory_id`) ")->result_array();
		
		return $store_innerproduct;
		
	}
	
		public function all_store_products()
	{
		$latest_store_products= $this->db->query("SELECT * from tbl_products order by id desc limit 0,5")->result_array();

		return $latest_store_products;
		
	}
	
	
	/*********************Store Featured products.*********************************/
	
	
	
		public function store_featuredproducts($getstoreid)
	{
		$store_products= $this->db->query("SELECT * from tbl_products where store_id='".$getstoreid."' and featured_status='1' order by id desc limit 0,3")->result_array();
		return $store_products;
		//print_r($product_id);
	}
	
	
	/*********************end*********************************/
	
	
	/*********************Store Brands.*********************************/
	
	
	 	public function brands()
	{
		$brands= $this->db->query("SELECT * from tbl_universal_category")->result_array();
		return $brands;
		//print_r($product_id);
	}
		
		/*********************end*********************************/
		
		
	/*********************get products by id.*********************************/
	
	
	 	public function getproducts_id($product_id)
	{
		$products= $this->db->query("SELECT * from tbl_products where id='".$product_id."'")->row();
		 return $products;
		//print_r($product_id);
	}
		
		/*********************end*********************************/
		
		
	
	/*********************image gallery*********************************/
	
	
	 	public function gallery_list($product_id)
	{
		$products_gallery= $this->db->query("SELECT * from tbl_list_gallery where list_id='".$product_id."'")->result_array();
		 return $products_gallery;
		//print_r($product_id);
	}
		
		/*********************end*********************************/
		
		/*********************All Stores*********************************/
	
	
	 	public function all_stores()
	{
		$query = $this->db->query("SELECT * FROM tbl_universal_category;")->result_array();
		 
		 return $query;
		//print_r($product_id);
	}
		
		/*********************end*********************************/
			/*********************Order Liting*********************************/
	
	
	 	public function order_listing_id($id)
	{
		$sql="select tbl_order_details.*,tbl_orders.*,tbl_customer.* from tbl_order_details  JOIN tbl_orders  ON tbl_order_details.order_id=tbl_orders.id join tbl_customer on tbl_orders.customer_id=tbl_customer.id and tbl_customer.id='".$id."'" ;
		
			$query=$this->db->query($sql)->row();
		//echo "<pre>";print_r($query);die;
			return  $query;
	}
		
		/*********************end*********************************/
		
				/*********************Search  Store*********************************/
	
	
	 	public function search_stores($search_text)
	{
				$search_text=ltrim($search_text);
			$search_text=rtrim($search_text);
			 $this->session->set_userdata('keyword',$search_text);
		if(!empty($search_text))
		{		
				  $data = array();
			 $search_category='select id from tbl_category where category = "'.$search_text.'" ';
		     $cat_search=$this->db->query($search_category)->row();
		      $cat_id=$cat_search->id;
			   $search_category_store='select * from tbl_universal_category where find_in_set("'.$cat_id.'",`multiple_cate`)';
			 
		       $search_store=$this->db->query($search_category_store)->result_array();
			
				 if(!empty($cat_id))
					 {
						 
				redirect(base_url().'category/vendors/'.$cat_search->id); 		 
				
					}
		
			
			// subcategory searching
			
			 $search_subcategory='select id from tbl_subcategory where subcategory = "'.$search_text.'" ';
		     $subcat_search=$this->db->query($search_subcategory)->row();
		   		 $subcat_id=$subcat_search->id;
				 
			   $search_subcategory_store='select * from tbl_universal_category where  find_in_set("'.$subcat_id.'",`multiple_subcate`)';
			   //echo $search_subcategory_store;
		       $subcat_search_store=$this->db->query($search_subcategory_store)->result_array();
				
				//echo "<pre>"; print_r($subcat_search_store);
				
				  if(!empty($subcat_id))
					
					{
						
						redirect(base_url().'subcat/vendors/'.$subcat_search->id); 
				
				  	}
						
					
				
			// Innercategory searching

			$search_innercategory='select id from tbl_innercategory where innercategory = "'.$search_text.'" ';
			$innercat_search=$this->db->query($search_innercategory)->row();
			$innercat_id=$innercat_search->id;
			   $search_innercategory_store='select * from tbl_universal_category where find_in_set("'.$innercat_id.'",`multiple_innercate`)';
			   
		       $innercat_search_store=$this->db->query($search_innercategory_store)->result_array();

			   if(!empty($innercat_id))
			 {
				 	redirect(base_url().'innercat/vendors/'.$innercat_id); 
			
			 }
			
			
	
	         // Product searching

			$search_product='select id from tbl_products where name = "'.$search_text.'" ';
			$product_search=$this->db->query($search_product)->row();
			$id=$product_search->id;
			   // $search_product_store='select * from tbl_universal_category where id="'.$store_id.'"';
		       // $product_search_store=$this->db->query($search_product_store)->result_array();
				 
			if(!empty($id)){
				
			  redirect(base_url().'product/vendors/'.$id);
			}
		
			
	
		}
		
	}
	
	 	public function search_products($getstoreid,$name)
	{
		
		//Product searching
		  // $session_keyword= $this->session->userdata($search_text);
		   
			$search_products='select * from tbl_products where store_id="'.$getstoreid.'" and  name = "'.$name.'" ';
			$products_search=$this->db->query($search_products)->result_array();
			return $products_search;
		
		
	}
		
		/*********************end*********************************/
			public function product_stores($id)
	{
		
		$query = $this->db->query('SELECT * FROM tbl_universal_category WHERE find_in_set("'.$id.'", `id`)');
		$store = $query->result_array();
		return $store;
		
		
		
	}
		
		
 }

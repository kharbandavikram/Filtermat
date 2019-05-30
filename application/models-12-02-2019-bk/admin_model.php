<?php 

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
   function __construct(){
        parent::__construct();		
    }

      /*********Sign In Model*********************/
   public function sign_in($username,$pswd){
		$query=$this->db->where('emailid',$username)->where('password',$pswd)->get('tbl_admin')->result();
		return $query; 
	}
  /*************************************************************************/
  /*********************************single country date****************************************/
  public function single_country($country_id){
	  $query=$this->db->where('id',$country_id)->get('tbl_countries')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
	 /*********add country*********************/
	 public function add_country(){
		$insert_data=array(
							'country_name'=>$this->input->post('country_name'),
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_countries',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
			if(!empty($_FILES['flag_img']['name'])){
				$config['upload_path'] = './public/uploads/flag';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['flag_img']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
									
				if ( ! $this->upload->do_upload('flag_img')){
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('flag_error',$error);
					redirect(admin_url().'addcountry');
				}else{
					$data = $this->upload->data();
					$file_name=$data['file_name'];
		
				}
			}
			$update_data=array('flag_img'=>$file_name);
			$this->db->where('id',$last_id);
			$this->db->update('tbl_countries',$update_data);		
		
		}
	 }
	 
	 /*********add country*********************/
	  /*********************edit country*********************************/
	public function edit_country($country_id){
		if(isset($_FILES['flag_img']['name']) && $_FILES['flag_img']['name'] != ''){
			$config['upload_path'] = './public/uploads/flag';
			$config['allowed_types'] = 'gif|jpg|png';
			$confi['filename']=rand(1,5000)."-".$_FILES['flag_img']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);
								
			if ( ! $this->upload->do_upload('flag_img')){
				@unlink('./public/uploads/flag/'.$this->input->post('old_img'));
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('flag_error',$error);
				redirect(admin_url().'addcountry/');
			
			}else{
				$data = $this->upload->data();
				$file_name=$data['file_name'];
				
			}
		}else{
			$file_name=$this->input->post('old_img');
		}
		$update_data=array(
			'country_name'=>$this->input->post('country_name'),
			'flag_img'=>$file_name,
			'status'=>$this->input->post('status'),
			'ModifyDate'=>date('Y-m-d')
		
		);
		$this->db->where('id',$country_id);
		$this->db->update('tbl_countries',$update_data);
	}
	  /*********************edit country*********************************/
  /***********************************************************************************************************************/
   /*********************************single state data****************************************/
	public function single_state($state_id){
		$query=$this->db->where('id',$state_id)->get('tbl_state')->result_array();
		return $query; 
	}
  
  /*************************************************************************/
	  
	 /*********add state*********************/
	 public function add_state(){
		$insert_data=array(
						'country_id'=>$this->input->post('country_id'),
						'state_name'=>$this->input->post('state_name'),
						'status'=>$this->input->post('status'),
						'CreateDate'=>date('Y-m-d')
					);	
		$query=$this->db->insert('tbl_state',$insert_data);
	 }
	 /*********add state*********************/
	 
	 	 /*********edit state*********************/
	 public function edit_state($state_id){
		 $update_data=array(
			                'country_id'=>$this->input->post('country_id'),
							'state_name'=>$this->input->post('state_name'),
							'status'=>$this->input->post('status'),
							'ModifyDate'=>date('Y-m-d')
						);	
						
		$this->db->where('id',$state_id);
		$this->db->update('tbl_state',$update_data);
	 }
	 /*********edit state*********************/
	 
	 /*********edit Author*********************/
	 public function edit_author($author_id){
		// echo $this->input->post('author_contact'); die;
				//print_r($_POST); die;
				$pswrd=md5($this->input->post('password'));
		 $update_data=array(
			                'username'=>$this->input->post('username'),
			                'password'=>$pswrd,
			                'author_name'=>$this->input->post('author_name'),
							'emailid'=>$this->input->post('author_email'),
							'contactno'=>$this->input->post('author_contact'),
							'status'=>$this->input->post('status'),
							'add_date'=>date('Y-m-d')
						);	
						
		$this->db->where('id',$author_id);
		$this->db->update('tbl_author',$update_data);
	 }
	 /*********edit state*********************/
	 
	 
	 
	 	 /*********Select  Author By Id *********************/
	 public function author_by_id($author_id){
					
		 $query=$this->db->where('id',$author_id)->get('tbl_author')->row();
	     return $query; 
	 }
	 /*********edit state*********************/
	 
	 /*****************Select  All Authors *********************/
	 public function authors(){
					
		  $query=$this->db->order_by('id','desc')->get('tbl_author')->result();
	      return $query;
	 }
	 /*********edit state*********************/
	 
	 
	 
/***********************************************************************************************************************/
   /*********************************single City data****************************************/
  public function single_city($city_id){
	  
	  $query=$this->db->where('id',$city_id)->get('tbl_city')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
	  
	 /*********add state*********************/
	 public function add_city(){
						
			 $insert_data=array(
			                'country_id'=>$this->input->post('country_id'),
							'state_id'=>$this->input->post('state_id'),
							'city_name'=>$this->input->post('city_name'),
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_city',$insert_data);
	 }
	 /*********add state*********************/
	 
	 	 /*********edit state*********************/
	 public function edit_city($city_id){
						
		 $update_data=array(
			                'country_id'=>$this->input->post('country_id'),
							'state_id'=>$this->input->post('state_id'),
							'city_name'=>$this->input->post('city_name'),
							'status'=>$this->input->post('status'),
							'ModifyDate'=>date('Y-m-d')
						);	
						
		$this->db->where('id',$city_id);
		$this->db->update('tbl_city',$update_data);
	 }
	 /*********edit city*********************/
	 
    /*********************************all location****************************************/
  public function all_location(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_location')->result();
	  return $query; 
  }	 
  
     /*********************************all tags****************************************/
  public function all_tags(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_tags')->result();
	  return $query; 
  }	  
  public function all_attributes(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_attributes')->result();
	  return $query; 
  }	 
	    /*********************************single location data****************************************/
  public function single_location($location_id){
	  
	  $query=$this->db->where('id',$location_id)->get('tbl_location')->result_array();
	  return $query; 
  }
   public function single_tags($tags_id){
	  
	  $query=$this->db->where('id',$tags_id)->get('tbl_tags')->result_array();
	  return $query; 
  } 
  public function single_attributes($tags_id){
	  
	  $query=$this->db->where('id',$tags_id)->get('tbl_attributes')->result_array();
	  return $query; 
  }
  /*************************************************************************/
	  
	 /*********add location*********************/
	 public function add_location(){
						
			 $insert_data=array(
			                'country_id'=>$this->input->post('country_id'),
							'state_id'=>$this->input->post('state_id'),
							'city_id'=>$this->input->post('city_id'),
							'location'=>$this->input->post('location'),
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_location',$insert_data);
	 }
	 /*********add location*********************/
	 
	 
	 
	 /*********add store Information*********************/
	 public function add_store_info(){
						
			 $insert_data=array(
			                'store'=>$this->input->post('store'),
							'information'=>$this->input->post('information'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_store_info',$insert_data);
	 }
	 /*********add store Information*********************/
	 
	 
	 
	 	 /*********Get store Information*********************/
	 public function get_store_info(){
						
			  $query=$this->db->query("select * from tbl_store_info where status='1' order by id DESC")->result_array(); 
		       return $query; 
	 }
	 /*********Get store Information*********************/
	 
	 
	 
	  public function add_attributes(){
						
			 $insert_data=array(
			               
							'universal_category_id'=>$this->input->post('universal_category_id'),
							'attributes'=>$this->input->post('attributes'),
							'value'=>$this->input->post('value'),
							'status'=>$this->input->post('status')
						
						);	
						
		$query=$this->db->insert('tbl_attributes',$insert_data);
	 }
	 	 /*********edit location*********************/
	 public function edit_attributes($tags_id){
						
		 $update_data=array(
			               'universal_category_id'=>$this->input->post('universal_category_id'),
							'attributes'=>$this->input->post('attributes'),
							'value'=>$this->input->post('value'),
							'status'=>$this->input->post('status')
							
						);	
						
		$this->db->where('id',$tags_id);
		$this->db->update('tbl_attributes',$update_data);
	 }
	   
	 /*********add tags*********************/
	 public function add_tags(){
						
			 $insert_data=array(
			               
							'tags'=>$this->input->post('tags')
						
						);	
						
		$query=$this->db->insert('tbl_tags',$insert_data);
	 }
	 	 /*********edit location*********************/
	 public function edit_tags($tags_id){
						
		 $update_data=array(
			               
							'tags'=>$this->input->post('tags'),
							
						);	
						
		$this->db->where('id',$tags_id);
		$this->db->update('tbl_tags',$update_data);
	 }
	  public function edit_location($location_id){
						
		 $update_data=array(
			                'country_id'=>$this->input->post('country_id'),
							'state_id'=>$this->input->post('state_id'),
							'city_id'=>$this->input->post('city_id'),
							'location'=>$this->input->post('location'),
							'status'=>$this->input->post('status'),
							'ModifyDate'=>date('Y-m-d')
						);	
						
		$this->db->where('id',$location_id);
		$this->db->update('tbl_location',$update_data);
	 }
	 /*********edit city*********************/

	/***************************************************Site Management**********************************************************/   
	
	/***************************** ****all sliderimg ****************************************/
  public function all_sliderimg(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_sliderimage')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  	/***************************** ****all store info ****************************************/
  public function all_store_info(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_store_info')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  	/***************************** ****all news ****************************************/
  public function all_news(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_news')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  
  
   /*********************************single sliderimg data****************************************/
  public function single_sliderimg($sliderimg_id){
	  
	  $query=$this->db->where('id',$sliderimg_id)->get('tbl_sliderimage')->result_array();
	  return $query; 
  }
  
  
    
   /*********************************single Store Info****************************************/
  public function single_storeinfo($storeid){
	  
	  $query=$this->db->where('id',$storeid)->get('tbl_store_info')->result_array();
	  return $query; 
  }
  
  
     /*********************************single news data****************************************/
  public function single_news($news_id){
	  
	  $query=$this->db->where('id',$news_id)->get('tbl_news')->result_array();
	  return $query; 
  }
  
  
  /************************************add slider img*************************************/
	public function add_sliderimg(){
		
		
						
			 $insert_data=array(
							'order_by'=>$this->input->post('order_by'),
							'banner_title'=>$this->input->post('banner_title'),
							'banner_subtitle'=>$this->input->post('banner_subtitle'),
							'banner_price'=>$this->input->post('banner_price'),
							'status'=>$this->input->post('status'),
							'CreatedOn'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_sliderimage',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if(!empty($_FILES['ImageFile']['name'])){
				$config['upload_path'] = './public/uploads/sliderimg';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['ImageFile']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('ImageFile'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('banner_img_error',$error);
				
								redirect(admin_url().'slidermanagement');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
						$update_data=array(
							'BannerImg'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_sliderimage',$update_data);
						
						}
							
								
		
		}
	 
		
		
	}
	 /************************************end slider img*************************************/
	 
	   /************************************add News Section*************************************/
	public function add_news(){
		
		
						
			 $insert_data=array(
							'title'=>$this->input->post('title'),
							'desc'=>$this->input->post('desc'),
							'status'=>$this->input->post('status'),
							'CreatedOn'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_news',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if(!empty($_FILES['ImageFile']['name'])){
				$config['upload_path'] = './public/uploads/newsimg';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['ImageFile']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('ImageFile'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('banner_img_error',$error);
				
								redirect(admin_url().'news');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
						$update_data=array(
							'news_image	'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_news',$update_data);
						
						}
							
								
		
		}
	 
		
		
	}
	 /************************************edit slider img*************************************/
	 
	 
	 public function edit_sliderimg($sliderimage_id){
		 		 if(isset($_FILES['ImageFile']['name']) && $_FILES['ImageFile']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/sliderimg';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['filename']=rand(1,5000)."-".$_FILES['ImageFile']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('ImageFile'))
						{
						
							@unlink('./public/uploads/sliderimg/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('banner_img_error',$error);
							redirect(admin_url().'slidermanagement');
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
					
				$update_data=array(
				    'BannerImg'=>$file_name,
					'order_by'=>$this->input->post('order_by'),
					'banner_title'=>$this->input->post('banner_title'),
					'banner_subtitle'=>$this->input->post('banner_subtitle'),
					'banner_price'=>$this->input->post('banner_price'),
					'status'=>$this->input->post('status')
					
				
				);
				$this->db->where('id',$sliderimage_id);
				$this->db->update('tbl_sliderimage',$update_data);
		 
	 }
	 
	 
	  /************************************edit Store Info*************************************/
	 
	 
	 public function edit_store_info($storeid){
		 //	echo $this->input->post('store'); die;
				$update_data=array(
				   
					'store'=>$this->input->post('store'),
					'information'=>$this->input->post('information'),
					'status'=>$this->input->post('status'),
					'CreateDate'=>date('Y-m-d')
					
				
				);
				$this->db->where('id',$storeid);
				$this->db->update('tbl_store_info',$update_data);
		 
	 }
	 
	 
	 
	 
	 
	  /************************************edit slider img*************************************/
	 
	 
	 public function edit_news($news_id){
		 		 if(isset($_FILES['ImageFile']['name']) && $_FILES['ImageFile']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/newsimg';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['filename']=rand(1,5000)."-".$_FILES['ImageFile']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('ImageFile'))
						{
						
							@unlink('./public/uploads/newsimg/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('banner_img_error',$error);
							redirect(admin_url().'news');
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
					
				$update_data=array(
				    'news_image	'=>$file_name,
					//'order_by'=>$this->input->post('order_by'),
					'status'=>$this->input->post('status'),
					'title'=>$this->input->post('title'),
					'desc'=>$this->input->post('desc'),
					
				
				);
				$this->db->where('id',$news_id);
				$this->db->update('tbl_news',$update_data);
		 
	 }
	 
	  /*********************************all social link****************************************/
  public function all_social_link(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_socialmedia')->result();
	  return $query; 
  }
  
  /*************************************************************************/
  
   /*********************************single social data****************************************/
  public function single_socialmedia($media_id){
	  
	  $query=$this->db->where('id',$media_id)->get('tbl_socialmedia')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  	 	 /*********edit social*********************/
	 public function edit_socialmedia($media_id){
						
		 $update_data=array(
			                'media_title'=>$this->input->post('media_title'),
							'media_link'=>$this->input->post('media_link'),
							'status'=>$this->input->post('status'),
							'ModifyDate'=>date('Y-m-d')
						);	
						
		$this->db->where('id',$media_id);
		$this->db->update('tbl_socialmedia',$update_data);
	 }
	 /*********edit social*********************/
	 
	 
/*********************************all faq array****************************************/
  public function all_faq_array(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_faq')->result();
	  return $query; 
  }
  
  /*************************************************************************/
     /*********************************single faq data****************************************/
  public function single_faq_array($faq_id){
	  
	  $query=$this->db->where('id',$faq_id)->get('tbl_faq')->result_array();
	  return $query; 
  }
  
	 /*********add faq*********************/
	 public function add_faq(){
						
			 $insert_data=array(
			                'question'=>$this->input->post('question'),
							'answer'=>$this->input->post('answer'),
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_faq',$insert_data);
	 }
	 /*********add faq*********************/
	 
	 	 /*********edit faq*********************/
	 public function edit_faq($faq_id){
						
		 $update_data=array(
			                'question'=>$this->input->post('question'),
							'answer'=>$this->input->post('answer'),
							'status'=>$this->input->post('status'),
							'ModifyDate'=>date('Y-m-d')
						);	
						
		$this->db->where('id',$faq_id);
		$this->db->update('tbl_faq',$update_data);
	 }
	 /*********edit state*********************/  
	 
	 
	 
	 /*********************************all content array****************************************/
  public function all_content(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_content')->result();
	  return $query; 
  }
  
  /*************************************************************************/
     /*********************************single content data****************************************/
  public function single_content_array($content_id){
	  
	  $query=$this->db->where('id',$content_id)->get('tbl_content')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
 	/*********************edit content*********************/
	 public function edit_content($content_id){
						
		 $update_data=array(
			                'content_title'=>$this->input->post('content_title'),
							'content_text'=>$this->input->post('content_text'),
							'store'=>$this->input->post('store')
							
						);	
						
		$this->db->where('id',$content_id);
		$this->db->update('tbl_content',$update_data);
		
		
	 }
	 /*********edit content*********************/   
	/***************************************************Site Management**********************************************************/ 
/***************************************************Manage category**********************************************************/


/*********************************all universal category****************************************/
  public function all_universal_cate(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_universal_category')->result();
	  return $query; 
  }
  
  /*************************************************************************/
     /*********************************single universal category data****************************************/
  public function single_univ_category($univ_category_id){
	  
	  $query=$this->db->where('id',$univ_category_id)->get('tbl_universal_category')->result_array();
	 // echo "<pre>"; print_r($query); exit;
	  return $query; 
  }
  
  /*************************************************************************/
       /*********************************single universal category data by name****************************************/
  public function single_univ_category_name($univ_category_name){
	  
	  $query=$this->db->where('univ_category',$univ_category_name)->get('tbl_universal_category')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  	 /*****************************************add universal category*************************************/
	 public function add_univ_category(){
		 
	$multiple_cate= strint_to_in_view($this->input->post('multiple_cat'));
	$multiple_subcat= strint_to_in_view($this->input->post('multiple_subcate'));
	$multiple_innercate= strint_to_in_view($this->input->post('multiple_innercate'));
						
			 $insert_data=array(
			                'univ_category'=>$this->input->post('univ_category'),
			               	'authorId'=>$this->input->post('author_id'),
			                'city_id'=>$this->input->post('city_id'),
			                'location_id'=>$this->input->post('location_id'),
			                'address'=>$this->input->post('shop_address'),
			                'website'=>$this->input->post('shop_website'),
			                'pincode'=>$this->input->post('shop_zipcode'),
							'multiple_cate'=>$multiple_cate,
							'multiple_subcate'=>$multiple_subcat,
							'multiple_innercate'=>$multiple_innercate,
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_universal_category',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if((isset($_FILES['universal_img']['name']))&&($_FILES['universal_img']['name']!='')){
				$config['upload_path'] = './public/uploads/category';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['universal_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('universal_img'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('universal_img_error',$error);
				
								redirect(admin_url().'addcategory');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							$update_data=array(
							'universal_img'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_universal_category',$update_data);	
						
						}
							
							
		
		}
	 }
	 
	 /*****************************************add universal category*********************/
	  /*********************edit universal category*********************************/
	 public function edit_univ_category($univ_category_id){
		
		 if(isset($_FILES['universal_img']['name']) && $_FILES['universal_img']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/category';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['filename']=rand(1,5000)."-".$_FILES['universal_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('universal_img'))
						{
						
							@unlink('./public/uploads/category/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('universal_img_error',$error);
							redirect(admin_url().'addcategory/');
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
			 $multiple_cate= strint_to_in_view($this->input->post('multiple_cat'));			
			 $multiple_subcat= strint_to_in_view($this->input->post('multiple_subcat'));			
			 $multiple_innercate= strint_to_in_view($this->input->post('multiple_innercate'));			
					
				$update_data=array(
							'univ_category'=>$this->input->post('univ_category'),
							'authorId'=>$this->input->post('author_id'),
			                'city_id'=>$this->input->post('city_id'),
			                'location_id'=>$this->input->post('location_id'),
			                'address'=>$this->input->post('shop_address'),
			                'website'=>$this->input->post('shop_website'),
			                'pincode'=>$this->input->post('shop_zipcode'),
				
				
					//'univ_category'=>$this->input->post('univ_category'),
					'multiple_cate'=>$multiple_cate,
					'multiple_subcate'=>$multiple_subcat,
					'multiple_innercate'=>$multiple_innercate,
					'universal_img'=>$file_name,
					'status'=>$this->input->post('status'),
					'ModifyDate'=>date('Y-m-d')
				
				);
				$this->db->where('id',$univ_category_id);
				$this->db->update('tbl_universal_category',$update_data);
						
		 
	 }
	 /*********************edit universal category*********************************/
	 
/*********************************************Manage event*************************************************************/
	 	 /*********************************all event****************************************/
  public function all_event(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_event')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
     /*********************************single event data****************************************/
  public function single_event($event_id){
	  
	  $query=$this->db->where('id',$event_id)->get('tbl_event')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
       /*********************************single event data by name****************************************/
  public function single_event_name($event_name){
	  
	  $query=$this->db->where('event',$event_name)->get('tbl_event')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  	 /*****************************************add event*************************************/
	 public function add_event(){
						
			 $insert_data=array(
			                'event_name'=>$this->input->post('event_name'),
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_event',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if((isset($_FILES['event_img']['name']))&&($_FILES['event_img']['name']!='')){
				$config['upload_path'] = './public/uploads/event';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['event_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('event_img'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('event_img_error',$error);
				
								redirect(admin_url().'addevent');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							$update_data=array(
							'event_img'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_event',$update_data);	
						
						}
							
							
		
		}
	 }
	 
	 /*****************************************add event*********************/
	  /*********************edit event*********************************/
	 public function edit_event($event_id){
		 
		 if(isset($_FILES['event_img']['name']) && $_FILES['event_img']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/event';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['filename']=rand(1,5000)."-".$_FILES['event_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('event_img'))
						{
						
							@unlink('./public/uploads/event/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('event_img_error',$error);
							redirect(admin_url().'addevent/');
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
					
				$update_data=array(
					'event_name'=>$this->input->post('event_name'),
					'event_img'=>$file_name,
					'status'=>$this->input->post('status'),
					'ModifyDate'=>date('Y-m-d')
				
				);
				$this->db->where('id',$event_id);
				$this->db->update('tbl_event',$update_data);
						
		 
	 }
	 /*********************edit event*********************************/


/*****************************************end Manage event*************************************************/

	 	 /*********************************all category****************************************/
  public function all_category(){
	  $query=$this->db->order_by('id','desc')->get('tbl_category')->result();
	  return $query; 
  }
  
  /*************************************************************************/
     /*********************************single category data****************************************/
  public function single_category($category_id){
	  
	  $query=$this->db->where('id',$category_id)->get('tbl_category')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
   
  
  /*********************************single listing data****************************************/
  public function single_listing($listing_id){
	  
	  $query=$this->db->where('id',$listing_id)->get('tbl_listing')->result_array();
	  return $query; 
  }
  
       /*********************************single category data by name****************************************/
  public function single_category_name($category_name){
	  
	  $query=$this->db->where('category',$category_name)->get('tbl_category')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  	
	  /*********************edit category*********************************/
	 public function edit_category($category_id){
		 
		  if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/category/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/category/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addcategory/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}
		 
		 
		 
		$update_data=array(
			'category'=>$this->input->post('category'),
			'status'=>$this->input->post('status'),
			'navigation'=>$this->input->post('navigation'),
			'image'=>$file_name,
		);
		$this->db->where('id',$category_id);
		$this->db->update('tbl_category',$update_data);
	 }
	 /*********************edit category*********************************/
	 
	 /*********************************all subcategory****************************************/
	  public function all_subcategory(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_subcategory')->result_array();
		  return $query; 
	  }
	  
  /*************************************************************************/ 
  
       /*********************************single subcategory data****************************************/
	  public function single_subcategory($subcategory_id){
		  
		  $query=$this->db->where('id',$subcategory_id)->get('tbl_subcategory')->result_array();
		  return $query; 
	  }
  
  /*************************************************************************/
  
         /*********************************single category data by name****************************************/
  public function single_subcategory_name($subcategory_name){
	  
	  $query=$this->db->where('subcategory',$subcategory_name)->where('status',1)->get('tbl_subcategory')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  	 /*****************************************add subcategory*************************************/
	 public function add_subcategory(){
		 
		 if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/category/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/category/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addcategory/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}
		 
		 
						// debug($this->input->post(),1);
			 $insert_data=array(
			                'category_id'=>$this->input->post('category_id'),
							'subcategory'=>$this->input->post('subcategory'),
							'status'=>$this->input->post('status'),
							'subimage'=>$file_name,
							
						);	
						
		$query_int=$this->db->insert('tbl_subcategory',$insert_data);
		return $this->db->insert_id();
	 }
	 
	 /*****************************************add subcategory*********************/
	  /*********************edit subcategory*********************************/
	 public function edit_subcategory($subcategory_id){	
      
 if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/category/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/category/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addcategory/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}	  
		$update_data=array(
			'category_id'=>$this->input->post('category_id'),
			'subcategory'=>$this->input->post('subcategory'),
			'status'=>$this->input->post('status'),
			'subimage'=>$file_name,
		);
		$this->db->where('id',$subcategory_id);
		$this->db->update('tbl_subcategory',$update_data);
	}
	 /*********************edit subcategory*********************************/
	 /*********************************all innercategory****************************************/
	  public function all_innercategory(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_innercategory')->result_array();
		  return $query; 
	  }
	  
  /*************************************************************************/ 	
  
         /*********************************single innercategory data****************************************/
	  public function single_innercategory($innercategory_id){
		  
		  $query=$this->db->where('id',$innercategory_id)->get('tbl_innercategory')->result_array();
		  return $query; 
	  }
  
  /*************************************************************************/
           /*********************************single innercategory data by name****************************************/
  public function single_innercategory_name($innercategory_name){
	  
	  $query=$this->db->where('innercategory',$innercategory_name)->get('tbl_innercategory')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  	 /*****************************************add subcategory*************************************/
	 public function add_innercategory(){
				
       if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/category/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/category/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addinnercategory/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}

				
			 $insert_data=array(
			                'category_id'=>$this->input->post('category_id'),
							'subcategory_id'=>$this->input->post('subcategory_id'),
							'innercategory'=>$this->input->post('innercategory'),
							'status'=>$this->input->post('status'),
							'innercatimage'=>$file_name,
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_innercategory',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if((isset($_FILES['innercategory_img']['name']))&&($_FILES['innercategory_img']['name']!='')){
				$config['upload_path'] = './public/uploads/innercategory';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['innercategory_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('innercategory_img'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('innercategory_img_error',$error);
				
								redirect(admin_url().'addinnercategory');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
						$update_data=array(
							'innercat_img'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_innercategory',$update_data);	
						
						}
							
	
		
		}
	 }
	 
	 /*****************************************add innercategory*********************/
	  /*********************edit innercategory*********************************/
	 public function edit_innercategory($innercategory_id){
		if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/category/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/category/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addinnercategory/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}
		
		$update_data=array(
			'category_id'=>$this->input->post('category_id'),
			'subcategory_id'=>$this->input->post('subcategory_id'),
			'innercategory'=>$this->input->post('innercategory'),
			// 'innercat_img'=>$file_name,
			'status'=>$this->input->post('status'),
			'innercatimage'=>$file_name,
			// 'ModifyDate'=>date('Y-m-d')
		
		);
		$this->db->where('id',$innercategory_id);
		$this->db->update('tbl_innercategory',$update_data);
	 }
	 /*********************edit innercategory*********************************/
 
	 
/***************************************************end Manage category**********************************************************/	
  /**************************************Profile data***********************************/
   public function profile_data(){
	  $logdata=$this->session->userdata('adminlogin_data');
	  $query=$this->db->where('id',$logdata['adminid'])->get('tbl_admin')->result_array();
	  return $query; 
  }

	 	 /*********edit profile*********************/
	public function edit_profile(){
		$logdata=$this->session->userdata('adminlogin_data');				
		 $update_data=array(
			                'name'=>$this->input->post('name'),
							'emailid'=>$this->input->post('emailid'),
							'contact_number'=>$this->input->post('contact_number')
						
						);	
						
		$this->db->where('id',$logdata['adminid']);
		$this->db->update('tbl_admin',$update_data);
	 }
	 /*********edit profile*********************/ 
	 
      /*********************************all User****************************************/
	   public function all_agent(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_agent')->result_array();
		  return $query; 
	  }	 
	/*************************************************************************/	
			
	/************************************single user details*************************************/   
	   public function single_agent_details($agent_id){
				  $query=$this->db->where('id',$agent_id)->get('tbl_agent')->result_array();
				  return $query; 
			   }
	
	/*************************************************************************/	
	
	/************************************exiting user number*************************************/   
	   public function exiting_agent_details($agent_email){
				  $query=$this->db->where('emailid',$agent_email)->get('tbl_agent')->num_rows();
				  return $query; 
		 }
	
	/*************************************************************************/ 	
	  /************************************ agent email*************************************/   
	   public function single_user_email($agentemail){
		  $query=$this->db->where('emailid',$agentemail)->get('tbl_agent')->result_array();
		  return $query; 
	   }

/*************************************************************************/ 
	 
	 /*********************************addagent ****************************************/	
      public function add_agent(){
	  $exitinguser=$this->admin_model->exiting_agent_details($this->input->post('reg_email'));
	  $agent_arr=$this->admin_model->all_agent();
	  /*************************************************************************/ 
	  $last_agent_id=@$agent_arr[0]['agentid'];
			if(empty($agent_arr)){
			 $agentid='sabuser_0000001';
			}
			else{
			
				$start = $last_agent_id;
				$start++;
				$agentid=$start;
			
             }
			
       /*************************************************************************/ 
	  if($exitinguser <1) {

	   $insert_data=array(
	                        'agentid'=>$agentid,
							'agentname'=>$this->input->post('reg_name'),
							'username'=>$this->input->post('reg_username'),
							'emailid'=>$this->input->post('reg_email'),
							'contactno'=>$this->input->post('contact_number'),
							'password'=>md5($this->input->post('reg_password')),
							'status'=>$this->input->post('status'),
							'addDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_agent',$insert_data);
		
	
	/*************************************************************************/  	
	  }
   }


	 /*********************************addagent ****************************************/	
      public function edit_agent($agent_id){


	   $update_data=array(
							'agentname'=>$this->input->post('reg_name'),
							'username'=>$this->input->post('reg_username'),
							'emailid'=>$this->input->post('reg_email'),
							'contactno'=>$this->input->post('contact_number'),
							'password'=>md5($this->input->post('reg_password')),
							'status'=>$this->input->post('status'),
						);	
						
		
		$this->db->where('id',$agent_id);
		$this->db->update('tbl_agent',$update_data);
		
	
	/*************************************************************************/  	
	  
   }
/*************************************************************************/ 
			

			
			
		/********************************* total user****************************************/
	  public function total_agent(){
		  $query=$this->db->get('tbl_agent')->num_rows();
		  return $query; 
	  }			
		 /***************************************************************************************************/ 
		 	 /*********************************all list number****************************************/
	  public function total_number_list(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_listing')->num_rows();
		  return $query; 
	  } 
	 	 /*********************************all list****************************************/
	  public function all_list(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_listing')->result_array();
		  return $query; 
	  }
	  	 	 /*********************************all list according  to agent ********************************/
	 public function all_agent_total_list($listuserid){
		  $listuserid=$this->session->userdata('listuserid');
		 @$qui_search=$this->session->userdata('quick_search');
		 
		 $person_name=$qui_search['person_name'];
		 $business_name=$qui_search['business_name'];
		 $mobile_no=$qui_search['mobile_no'];
		 $date_to=$qui_search['date_to'];
                  $shop_address=$qui_search['shop_address'];
		 
		 		$person_sql='';
				$business_sql='';
				$mobile_sql='';
				$date_sql='';
                                $shop_address_sql='';
		 
	if($person_name!=''){
		$var=$person_name;
		$person_sql=" and person_name like '%".$person_name."%'";
		//$person_sql=" and FIND_IN_SET('$var',person_name)";
	}
	
	if($business_name!=''){
		$business_sql=" and business_name like '".$business_name."%'";
	}
	if($mobile_no!=''){
		
		$mobile_sql=" and mobile_no='".$mobile_no."'";
	}
	if($date_to!=''){
		
		$date_sql=" and adddate='".$date_to."'";
	}
         if($shop_address!=''){
		
		$shop_address_sql=" and shop_address like '%".$shop_address."%'";
	}
	$searchsql=$person_sql.$business_sql.$mobile_sql.$date_sql.$shop_address_sql;	 
		//echo "select * from tbl_products order by id DESC limit $page1, $limit";exit
		  $query=$this->db->query("select * from tbl_products order by id DESC ")->num_rows(); 
		 // $query=$this->db->query("select * from tbl_listing where 1=1 and agent_id='".$listuserid."'  $searchsql order by id DESC ")->num_rows(); 
		//   echo "<pre>"; print_r($searchsql); exit;    
		  return $query; 
	  }

	/*************************************************************************/		 
			 
	 public function all_agent_list($listuserid,$limit, $start){
		 $page1 =($start -1) * $limit;

		 $listuserid=$this->session->userdata('listuserid');
		 @$qui_search=$this->session->userdata('quick_search');
		 
		 $person_name=$qui_search['person_name'];
		 $business_name=$qui_search['business_name'];
		 $mobile_no=$qui_search['mobile_no'];
		 $date_to=$qui_search['date_to'];
                  $shop_address=$qui_search['shop_address'];
		 
		 		$person_sql='';
				$business_sql='';
				$mobile_sql='';
				$date_sql='';
                                $shop_address_sql='';
		 
	if($person_name!=''){
		$var=$person_name;
		$person_sql=" and person_name like '%".$person_name."%'";
		//$person_sql=" and FIND_IN_SET('$var',person_name)";
	}
	
	if($business_name!=''){
		$business_sql=" and business_name like '".$business_name."%'";
	}
	if($mobile_no!=''){
		
		$mobile_sql=" and mobile_no='".$mobile_no."'";
	}
	if($date_to!=''){
		
		$date_sql=" and adddate='".$date_to."'";
	}
         if($shop_address!=''){
		
		$shop_address_sql=" and shop_address like '%".$shop_address."%'";
	}
	$searchsql=$person_sql.$business_sql.$mobile_sql.$date_sql.$shop_address_sql;	 
		//echo "select * from tbl_products order by id DESC limit $page1, $limit";exit
		  $query=$this->db->query("select * from tbl_products order by id DESC limit $page1, $limit")->result_array(); 
		  // echo "<pre>"; print_r($query);exit;
		  return $query; 
	  }
	  
	  /*  public function all_agent_list($listuserid){
		  
		  $query=$this->db->query("select * from tbl_listing where   agent_id='".$listuserid."'  order by id DESC limit 5000")->result_array(); 
		  
		 // $query=$this->db->order_by('id','desc')->where('agent_id',$listuserid)->where('agent_id',$listuserid)->get('tbl_listing')->result_array();
		  return $query; 
	  }*/
	  			/************************************single user details*************************************/   
	   public function single_list($list_id){
		  $query=$this->db->where('id',$list_id)->get('tbl_products')->result_array();
		  return $query; 
		}
	
	/*************************************************************************/
	/********************************add list******************************************/
	public function add_final_list(){
		
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
			
			
                         if($this->input->post('uni_category_id', TRUE)){
		$multiple_uni_category= strint_to_in_view($this->input->post('uni_category_id'));
		 }else{
		  $multiple_uni_category='';
		  }
                        
                        
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
			
		
		
		
			$insert_data=array(
                            'person_name'=>$this->input->post('person_name'),
							'url_key'=>$new_list_url,
							'shop_email'=>$this->input->post('shop_email'),
							'mobile_no'=>$this->input->post('mobile_no'),
							'whatsapp_no'=>$this->input->post('whatsapp_no'),
							'landline_no'=>$this->input->post('landline_no'),
							'business_name'=>$this->input->post('business_name'),
                            'universal_id'=>$multiple_uni_category,
							'category_id'=>$multiple_category,
							'subcategory_id'=>$multiple_subcategory,
							'innercategory_id'=>$multiple_innercategory,
							'state_id'=>$this->input->post('state_id'),
							'city_id'=>$this->input->post('city_id'),
							'location_id'=>$this->input->post('location_id'),
							'shop_address'=>$this->input->post('shop_address'),
							'shop_zipcode'=>$this->input->post('shop_zipcode'),
							'opening_time'=>$this->input->post('opening_time'),
							'closeing_time'=>$this->input->post('closeing_time'),
							
							'work_Monday'=>$this->input->post('work_Monday'),
							'work_Tuesday'=>$this->input->post('work_Tuesday'),
							'work_Wednesday'=>$this->input->post('work_Wednesday'),
							'work_Thursday'=>$this->input->post('work_Thursday'),
							'work_Friday'=>$this->input->post('work_Friday'),
							'work_Saturday'=>$this->input->post('work_Saturday'),
							'work_Sunday'=>$this->input->post('work_Sunday'),
							
							'shop_website'=>$this->input->post('shop_website'),
							'adddate'=>date('Y-m-d')
					        
				);
				$listquery=$this->db->insert('tbl_listing',$insert_data);	
	            $lastlist_id=$this->db->insert_id();	
				/**********************************************************************************/ 
		      if (!is_dir("./public/uploads/listingimg/".$lastlist_id)) {
                    mkdir("./public/uploads/listingimg/".$lastlist_id, 0755);
                   } 
				   
				 if(!empty($_FILES['attachment1']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment1']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment1'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error1',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							
							
				$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							$insert_img_data=array(
							'FeaturedImg'=>$file_name,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
							
						
						}  
						
				 if(!empty($_FILES['attachment2']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment2']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment2'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
							
	$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$insert_img_data=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
							
						
				} 
		
		}
		
		public function add_product_list(){
		
		//echo "<pre>"; print_r($this->input->post()); exit;
		$multiple_category=implode(',',$this->input->post('category_id'));
		$multiple_subcategory=implode(',',$this->input->post('subcategory_id'));
		$multiple_innercategory=implode(',',$this->input->post('innercategory_id'));
		$related_product=implode(',',$this->input->post('related_product'));
		
						 if(!empty($_FILES['featured_image']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/featuredimg/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']=rand(1,5000)."-".$_FILES['featured_image']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('featured_image'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error1',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
					
					
			$insert_data=array(
                            'name'=>$this->input->post('name'),
							
							'product_short'=>$this->input->post('product_short'),
							'images'=>$file_name,
							'featured_status'=>$this->input->post('featured_status'),
							'sku'=>$this->input->post('sku'),
							'popular_status'=>$this->input->post('popular_status'),
							'product_desc'=>$this->input->post('product_desc'),
							'price'=>$this->input->post('price'),
							'sale_price'=>$this->input->post('sale_price'),
							'inventory'=>$this->input->post('inventory'),
                            'store_id'=>$this->input->post('store_id'),
                            'status'=>$this->input->post('status'),
                            'meta_title'=>$this->input->post('meta_title'),
                            'meta_keyword'=>$this->input->post('meta_keyword'),
                            'meta_desc'=>$this->input->post('meta_desc'),
                            'related_product'=>$related_product,
                            'product_attributes'=>$this->input->post('product_attributes'),
							'category_id'=>$multiple_category,
							'subcategory_id'=>$multiple_subcategory,
							'innercategory_id'=>$multiple_innercategory,
							'quantity'=>$this->input->post('quantity')
						
							//'store_id'=>$this->input->post('store_id')
							//'adddate'=>date('Y-m-d')
					        
				);
				$listquery=$this->db->insert('tbl_products',$insert_data);	
				  $lastlist_id=$this->db->insert_id();
				}
				
	          
				//echo "<pre>"; print_r($this->input->post('color')); exit;
	if(!empty($this->input->post('color')))	{
	$attributes=$this->input->post('color');
	
	  if (!is_dir("./public/uploads/variation_img/")) {
                    mkdir("./public/uploads/variation_img/", 0755);
                   } 
		
					//  echo "hello";exit;
					//echo "<pre>"; print_r($_FILES['color']['name']);
				   	$number_of_files_uploaded = count($_FILES['color']['name']);
					
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded; $i++) {
      $_FILES['userfile']['name']     = $_FILES['color']['name'][$i];
      $_FILES['userfile']['type']     = $_FILES['color']['type'][$i];
      $_FILES['userfile']['tmp_name'] = $_FILES['color']['tmp_name'][$i];
      $_FILES['userfile']['error']    = $_FILES['color']['error'][$i];
      $_FILES['userfile']['size']     = $_FILES['color']['size'][$i];
      $config['upload_path'] = './public/uploads/variation_img/';
	  $config['allowed_types'] = 'gif|jpg|png|jpeg';
	  $config['file_name']=rand(1,5000)."-".$_FILES['color']['name'][$i];
      $this->upload->initialize($config);
	 //  echo $_FILES['color']['name'][$i];
      if ( ! $this->upload->do_upload()) {
        $error = array('error' => $this->upload->display_errors());
		//echo "<pre>"; print_r($error );exit;
        //$this->load->view('upload_form', $error);
	  }
      else {
       $attribute_image[] = $this->upload->data();
		//echo "<pre>"; print_r($final_files_data);exit;
        // Continue processing the uploaded data
	  }
	}

	
		$number_of_files_uploaded1 = count($_FILES['color1']['name']);
					
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded1; $i++) {
      $_FILES['userfile']['name']     = $_FILES['color1']['name'][$i];
      $_FILES['userfile']['type']     = $_FILES['color1']['type'][$i];
      $_FILES['userfile']['tmp_name'] = $_FILES['color1']['tmp_name'][$i];
      $_FILES['userfile']['error']    = $_FILES['color1']['error'][$i];
      $_FILES['userfile']['size']     = $_FILES['color1']['size'][$i];
      $config['upload_path'] = './public/uploads/variation_img/';
	  $config['allowed_types'] = 'gif|jpg|png|jpeg';
	  $config['file_name']=rand(1,5000)."-".$_FILES['color1']['name'][$i];
      $this->upload->initialize($config);
	 //  echo $_FILES['color']['name'][$i];
      if ( ! $this->upload->do_upload()) {
        $error = array('error' => $this->upload->display_errors());
		//echo "<pre>"; print_r($error );exit;
        //$this->load->view('upload_form', $error);
	  }
      else {
       $attribute_image[] = $this->upload->data();
		//echo "<pre>"; print_r($final_files_data);exit;
        // Continue processing the uploaded data
	  }
	}
	
	
		$number_of_files_uploaded2 = count($_FILES['color2']['name']);
					
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded2; $i++) {
      $_FILES['userfile']['name']     = $_FILES['color2']['name'][$i];
      $_FILES['userfile']['type']     = $_FILES['color2']['type'][$i];
      $_FILES['userfile']['tmp_name'] = $_FILES['color2']['tmp_name'][$i];
      $_FILES['userfile']['error']    = $_FILES['color2']['error'][$i];
      $_FILES['userfile']['size']     = $_FILES['color2']['size'][$i];
      $config['upload_path'] = './public/uploads/variation_img/';
	  $config['allowed_types'] = 'gif|jpg|png|jpeg';
	  $config['file_name']=rand(1,5000)."-".$_FILES['color2']['name'][$i];
      $this->upload->initialize($config);
	 //  echo $_FILES['color']['name'][$i];
      if ( ! $this->upload->do_upload()) {
        $error = array('error' => $this->upload->display_errors());
		//echo "<pre>"; print_r($error );exit;
        //$this->load->view('upload_form', $error);
	  }
      else {
       $attribute_image[] = $this->upload->data();
		//echo "<pre>"; print_r($final_files_data);exit;
        // Continue processing the uploaded data
	  }
	}
	
	
	
	
		$number_of_files_uploaded3 = count($_FILES['color']['name']);
					
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded3; $i++) {
      $_FILES['userfile']['name']     = $_FILES['color3']['name'][$i];
      $_FILES['userfile']['type']     = $_FILES['color3']['type'][$i];
      $_FILES['userfile']['tmp_name'] = $_FILES['color3']['tmp_name'][$i];
      $_FILES['userfile']['error']    = $_FILES['color3']['error'][$i];
      $_FILES['userfile']['size']     = $_FILES['color3']['size'][$i];
      $config['upload_path'] = './public/uploads/variation_img/';
	  $config['allowed_types'] = 'gif|jpg|png|jpeg';
	  $config['file_name']=rand(1,5000)."-".$_FILES['color3']['name'][$i];
      $this->upload->initialize($config);
	 //  echo $_FILES['color']['name'][$i];
      if ( ! $this->upload->do_upload()) {
        $error = array('error' => $this->upload->display_errors());
		//echo "<pre>"; print_r($error );exit;
        //$this->load->view('upload_form', $error);
	  }
      else {
       $attribute_image[] = $this->upload->data();
		//echo "<pre>"; print_r($final_files_data);exit;
        // Continue processing the uploaded data
	  }
	}
	
	foreach($attribute_image as $attribute_images)
	{
		$attributes_images[]=$attribute_images['file_name'];
	}
	
	$variation_images=  implode(",",$attributes_images);
	$i=0;
	
	foreach($attributes as $attr){
	$insert_attr_data=array(
                            'product_id'=>$lastlist_id,
							'attribute_id'=>$attr['id'],	
							'option'=>$attr['option'],	
							'qty'=>$attr['qty'],	
							'price'=>$attr['price'],
							'file'=>$variation_images
							//'product_id'=>$lastlist_id	
		);
			$listquery=$this->db->insert('tbl_attributes_options',$insert_attr_data);	
			$i=$i+1;
	} 
	
}	
				/**********************************************************************************/ 
		      if (!is_dir("./public/uploads/listingimg/".$lastlist_id)) {
                    mkdir("./public/uploads/listingimg/".$lastlist_id, 0755);
                   } 
				   
				 if(!empty($_FILES['attachment1']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment1']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment1'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error1',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							
							
				$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							$insert_img_data=array(
							'FeaturedImg'=>$file_name,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
							
						
						}  
						
				 if(!empty($_FILES['attachment2']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment2']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment2'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
							
	$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$insert_img_data=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
							
						
				} 
				
				if(!empty($_FILES['attachment3']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment3']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment3'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
							
	$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$insert_img_data=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
							
						
				} 
		if(!empty($_FILES['attachment4']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment4']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment4'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
							
	$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$insert_img_data=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
							
						
				} 
				
				if(!empty($_FILES['attachment5']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment5']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment5'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
							
	$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$insert_img_data=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
							
						
				} 
		}		
		
		
	/********************************add list******************************************/
	/*********************edit list*********************************/
	 public function edit_listing($list_id){
		// print_r(error_reporting(E_ALL));
		 //echo 'featured_status'=$this->input->post('featured_status');
		// echo "<pre>"; print_r($this->input->post()); exit;
		$multiple_category=implode(',',$this->input->post('category_id'));
		$multiple_subcategory=implode(',',$this->input->post('subcategory_id'));
		$multiple_innercategory=implode(',',$this->input->post('innercategory_id'));
		$related_product=implode(',',$this->input->post('related_product'));
		$old_featured_image=$this->input->post('old_featured_image');
		// $attachment1_oldimg=$this->input->post('attachment1_oldimg');
		// echo $attachment1_oldimg;die;
			 if(!empty($_FILES['featured_image']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/featuredimg/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name']=rand(1,5000)."-".$_FILES['featured_image']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('featured_image'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error1',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$featured_file_name=$data['file_name'];
					
							}
			     }

				else{
						$featured_file_name= $old_featured_image;
				}
				
			$update_data=array(
                            'name'=>$this->input->post('name'),
                            'images'=>$featured_file_name,
							'featured_status'=>$this->input->post('featured_status'),
							'popular_status'=>$this->input->post('popular_status'),
							'sku'=>$this->input->post('sku'),
							'product_short'=>$this->input->post('product_short'),
							'product_desc'=>$this->input->post('product_desc'),
							'price'=>$this->input->post('price'),
							'sale_price'=>$this->input->post('sale_price'),
							'inventory'=>$this->input->post('inventory'),
                            'store_id'=>$this->input->post('store_id'),
                            'status'=>$this->input->post('status'),
                            'meta_title'=>$this->input->post('meta_title'),
                            'meta_keyword'=>$this->input->post('meta_keyword'),
                            'meta_desc'=>$this->input->post('meta_desc'),
                            'related_product'=>$related_product,
                            'product_attributes'=>$this->input->post('product_attributes'),
							'category_id'=>$multiple_category,
							'subcategory_id'=>$multiple_subcategory,
							'innercategory_id'=>$multiple_innercategory,
							
							'quantity'=>$this->input->post('quantity')
						
							//'store_id'=>$this->input->post('store_id')
							//'adddate'=>date('Y-m-d')
					        
				);
				  //echo "<pre>"; print_r($update_data); exit;
					
				$this->db->where('id',$list_id);
				$this->db->update('tbl_products',$update_data);
			 
		
			if(!empty($this->input->post('color')))	{
				$attributes=$this->input->post('color');
				$old_image=$this->input->post('old');
				//echo "<pre>";print_r($old_image);
			

	
	  if (!is_dir("./public/uploads/variation_img/")) {
                    mkdir("./public/uploads/variation_img/", 0755);
                   } 
				   
				  //if(isset($_FILES['color']['name']) && $_FILES['color']['name'] != ''){
					  //echo "<pre>"; print_r($_FILES['color']);
					 // if(!empty($_FILES['color']['name'][0])){
					if (!(in_array(null, $_FILES['color']['name']))){
				   	$number_of_files_uploaded = count($_FILES['color']['name']);
					//echo $number_of_files_uploaded;
					// echo "hello no";exit;
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded; $i++) {
      $_FILES['userfile']['name']     = $_FILES['color']['name'][$i];
      $_FILES['userfile']['type']     = $_FILES['color']['type'][$i];
      $_FILES['userfile']['tmp_name'] = $_FILES['color']['tmp_name'][$i];
      $_FILES['userfile']['error']    = $_FILES['color']['error'][$i];
      $_FILES['userfile']['size']     = $_FILES['color']['size'][$i];
      $config['upload_path'] = './public/uploads/variation_img/';
	  $config['allowed_types'] = 'gif|jpg|png';
	  $config['file_name']=rand(1,5000)."-".$_FILES['color']['name'][$i];
      $this->upload->initialize($config);
	   
      if ( ! $this->upload->do_upload()) {
        $error = array('error' => $this->upload->display_errors());
		//echo "<pre>"; print_r($error );exit;
        //$this->load->view('upload_form', $error);
	  }
      else {
       $file_name[] = $this->upload->data();
		//echo "<pre>"; print_r($file_name);exit;
        // Continue processing the uploaded data
	  }
	}
	   }
		else{

		foreach($old_image as $oldimg){
			
			$file_name[]['file_name'] = $oldimg;
		}
			
			//echo "hello"; 
			//echo "<pre>"; print_r($file_name);exit;
			
				
			
		}
		
		
		
	$i=0;
	 foreach($attributes as $attr){
		
     $update_attr_data=array(
                            'product_id'=>$list_id,
							'attribute_id'=>$attr['id'],	
							'option'=>$attr['option'],	
							'qty'=>$attr['qty'],	
							'price'=>$attr['price'],
							'file'=>$file_name[$i]['file_name']
							//'product_id'=>$lastlist_id	 
		);
		if(!empty($attr['option_id'])){
				$this->db->where('id',$attr['option_id']);
				$this->db->update('tbl_attributes_options',$update_attr_data);
				
				
				
			//$listquery=$this->db->insert('tbl_attributes_options',$insert_attr_data);	
		}else{
			
			$listquery=$this->db->insert('tbl_attributes_options',$update_attr_data);
			
		}
		$i=$i+1;
			
		 }
			}
			
			
			
			/**********************************************************************************/ 
		      if (!is_dir("./public/uploads/listingimg/".$list_id)) {
                    mkdir("./public/uploads/listingimg/".$list_id, 0755);
                   } 
				   
				 if(!empty($_FILES['attachment1']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$list_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment1']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment1'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error1',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
							
								$data = $this->upload->data();
								$file_attachment1=$data['file_name'];
					
							}
				 }
				 else
					 
					 {
						
						
						 $file_attachment1=$this->input->post('attachment1_oldimg');
						
						 
					 }
							
				$total_img=$this->db->where('list_id',$list_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							$update_img_data=array(
							'FeaturedImg'=>$file_attachment1,
							'list_id'=>$list_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
	
				$this->db->where('FeaturedImg',$this->input->post('attachment1_oldimg'));
				$this->db->update('tbl_list_gallery',$update_img_data);
				
				
						
				 if(!empty($_FILES['attachment2']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$list_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment2']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment2'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
				 }
					else
					 
					 {
						 
						 $file_name1=$this->input->post('attachment2_oldimg');
						 
					 }
							
	$total_img=$this->db->where('list_id',$list_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$update_img_data1=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$list_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
					$this->db->where('FeaturedImg',$this->input->post('attachment2_oldimg'));
				$this->db->update('tbl_list_gallery',$update_img_data1);
				//$this->db->insert('tbl_list_gallery',$insert_img_data);
				
				
				
				 if(!empty($_FILES['attachment3']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$list_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment3']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment3'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
				 }
					else
					 
					 {
						 
						 $file_name1=$this->input->post('attachment3_oldimg');
						 
					 }
							
	$total_img=$this->db->where('list_id',$list_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$update_img_data2=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$list_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
					$this->db->where('FeaturedImg',$this->input->post('attachment3_oldimg'));
				$this->db->update('tbl_list_gallery',$update_img_data2);
				//$this->db->insert('tbl_list_gallery',$insert_img_data);
			
			
			 if(!empty($_FILES['attachment4']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$list_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment4']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment4'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
				 }
					else
					 
					 {
						 
						 $file_name1=$this->input->post('attachment4_oldimg');
						 
					 }
							
				$total_img=$this->db->where('list_id',$list_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$update_img_data3=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$list_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
					$this->db->where('FeaturedImg',$this->input->post('attachment4_oldimg'));
				$this->db->update('tbl_list_gallery',$update_img_data3);
				//$this->db->insert('tbl_list_gallery',$insert_img_data);
		
	 if(!empty($_FILES['attachment5']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$list_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment5']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('attachment5'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error2',$error);
								 redirect(admin_url().'managelisting');
							}
							else
							{
								$data = $this->upload->data();
								$file_name1=$data['file_name'];
					
							}
				 }
					else
					 
					 {
						 
						 $file_name1=$this->input->post('attachment5_oldimg');
						 
					 }
							
	$total_img=$this->db->where('list_id',$list_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						
							
							$update_img_data4=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$list_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
					$this->db->where('FeaturedImg',$this->input->post('attachment5_oldimg'));
				$this->db->update('tbl_list_gallery',$update_img_data4);
				//$this->db->insert('tbl_list_gallery',$insert_img_data);
				
				  }	 

	    /*********************************add list Gallery****************************************/
  public function add_listgallery($list_id){
	  
		
		$insert_data=array('GalleryTitle'=>$this->input->post('GalleryTitle'),
							'list_id'=>$list_id,
							'main_image'=>$this->input->post('main_image'),
							'CreatedOn'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_list_gallery',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		 if (!is_dir("./public/uploads/listingimg/".$list_id)) {
                    mkdir("./public/uploads/listingimg/".$list_id, 0777);
                   } 
		
		
		 if(!empty($_FILES['ImageFile']['name'])){
			
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$list_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['ImageFile']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('ImageFile'))
							{
								$error = $this->upload->display_errors();
								$this->session->set_flashdata('list_img_error',$error);
								redirect(admin_url().'listgallery/'.$list_id);
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
						
						}
							
						$update_data=array(
							'FeaturedImg'=>$file_name,
						);
						
						$this->db->where('Gallery_Id',$last_id);
						$this->db->update('tbl_list_gallery',$update_data);		
		
		}
	 
	  
  }
  
  /*************************************************************************/
 /*********************************single list Gallery****************************************/
  public function single_listgallery($galleryid){
	  
	  $query=$this->db->where('Gallery_Id',$galleryid)->get('tbl_list_gallery')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/	
  
      /*********************************edit list Gallery****************************************/
  public function edit_listgallery($galleryid){
	  
	  	$gallery_arr=$this->admin_model->single_listgallery($galleryid);

		 
		 if(isset($_FILES['ImageFile']['name']) && $_FILES['ImageFile']['name'] != ''){
			 
			  if (!is_dir("./public/uploads/listingimg/".$gallery_arr[0]['list_id'])) {
                    mkdir("./public/uploads/listingimg/".$gallery_arr[0]['list_id'], 0777);
                   } 
			 
					
				$config['upload_path'] = './public/uploads/listingimg/'.$gallery_arr[0]['list_id'];
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['ImageFile']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);

								
					if ( ! $this->upload->do_upload('ImageFile'))
						{
						
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('list_img_error',$error);
							redirect(admin_url().'listgallery/'.$gallery_arr[0]['list_id']);
						
						}
						else
						{
						@unlink('./public/uploads/listingimg/'.$gallery_arr[0]['list_id'].'/'.$this->input->post('old_img'));
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
					
				$update_data=array(
                            'GalleryTitle'=>$this->input->post('GalleryTitle'),
							'FeaturedImg'=>$file_name,
							'main_image'=>$this->input->post('main_image')
					        
				);
						$this->db->where('Gallery_Id',$galleryid);
						$this->db->update('tbl_list_gallery',$update_data);
						
		 
	 }
  
  /**************************************end Manage list***********************************/	 
  /**********************************raw list***************************************/ 
  
  
  
  	  	 	 /*********************************all list according  to agent ********************************/
	public function all_agent_total_raw_list($listuserid){
		   $listuserid=$this->session->userdata('listuserid');
		$query=$this->db->order_by('id','desc')->where('agent_id',$listuserid)->get('tbl_extra_listing')->num_rows();
		  return $query; 
	  }

 /*********************************all raw list according  to agent ****************************************/			 
	  public function all_raw_data_list($listuserid){
		  
		  $query=$this->db->order_by('id','desc')->where('agent_id',$listuserid)->get('tbl_extra_listing')->result_array();
		  return $query; 
	  }


	
	/************************************single Agent details*************************************/   
	   public function single_raw_list($list_id){
		  $query=$this->db->where('id',$list_id)->get('tbl_extra_listing')->result_array();
		  return $query; 
		}
	
	/***************************************edit_raw_listing**********************************/
	
		 public function edit_raw_listing($list_id){
			 
	 $list_raw_arr=$this->admin_model->single_raw_list($list_id);	
	 
	 
	 		 if($this->input->post('business_name', TRUE)){
			$list_titel= $this->input->post('business_name'); 
		 }
		if($this->input->post('location_id', TRUE)){
			$list_titel .=" near ".$this->input->post('location_id');	
			
		  }
		 
		  if($this->input->post('city_id', TRUE)){
			$list_titel.= " in ".$this->input->post('city_id'); 
		  }
		 
		 	$new_url=preg_replace('/[ ,]+/', '-', trim($list_titel));
			$strr=substr(str_shuffle(MD5(microtime())), 0, 5);
			$list_url=$new_url.'-'.$strr;
			$new_list_url=strtolower($list_url);	 
			 
		if(@$this->input->post('category_name')!=''){
			
			$final_cate_id_arr=array();		
		$catename=rtrim($this->input->post('category_name'),', ');
		$final_cate_name = explode(", ", $catename);
		$final_cat_name=strint_view($final_cate_name);
				
		$sql_category="select * from tbl_category where  status=1 and category IN (".$final_cat_name.")";
		$cae_arr=$this->db->query($sql_category)->result_array();
		foreach($cae_arr as $final_cat_data){$final_cate_id_arr[]=$final_cat_data['id'] ;}
		 $final_cat_id=strint_view($final_cate_id_arr);
	   }
			if(!empty($final_cat_id)){
			
			  if((@$this->input->post('subcategory_id')!='')&&(!empty($final_cat_id))){
				  
				  $final_subcate_id_arr=array();		
		$sabcategoryname=rtrim($this->input->post('subcategory_id'),', ');
		$subcatname=rtrim($sabcategoryname,', ');
		 $final_subcat_name = explode(", ", $subcatname);
		$final_scat_name=strint_view($final_subcat_name);
		
		
		$sql_subcategory="select * from tbl_subcategory where  status=1 and category_id IN (".$final_cat_id.") and subcategory IN (".$final_scat_name.")";
		$scat_arr=$this->db->query($sql_subcategory)->result_array();
		foreach($scat_arr as $final_scat_data){$final_subcate_id_arr[]=$final_scat_data['id'] ;}
		 $final_scat_id=strint_view($final_subcate_id_arr);

						
						
						if(!empty($final_scat_id)){
					 	$subcategory_id=strint_to_in_view($final_subcate_id_arr);
						} 
						
				}else{
			 $subcategory_id='';
		 }
			
			
				if(@$subcategory_id!=''){
						if((@$this->input->post('innercategory_id')!='')&&(!empty($final_scat_id))){
							
				 $final_innercate_id_arr=array();		
		$innercategoryname=rtrim($this->input->post('innercategory_id'),', ');
		$innercategname=rtrim($innercategoryname,', ');
		 $final_innercat_name = explode(", ", $innercategname);
		$final_innercate_name=strint_view($final_innercat_name);
		
		
		$sql_innercategory="select * from tbl_innercategory where  status=1 and subcategory_id IN (".$final_scat_id.") and innercategory IN (".$final_innercate_name.")";
		$innercategory_arr=$this->db->query($sql_innercategory)->result_array();
		foreach($innercategory_arr as $final_innercategory_data){$final_innercate_id_arr[]=$final_innercategory_data['id'] ;}			
							
							
			
								
								if(!empty($final_innercate_id_arr)){
								 $innercategory_id=strint_to_in_view($final_innercate_id_arr);
								}else{
							$innercategory_id='';
						} 
						
						}else{
							$innercategory_id='';
						}
				}else{
							$innercategory_id='';
						}
			
			}
			
			
	if(@$this->input->post('city_id')!=''){
		 $city_arr=$this->db->where('city_name',$this->input->post('city_id'))->get('tbl_city')->result_array();
		 	 if(@$city_arr[0]['id']!=''){
		  $city_id=@$city_arr[0]['id'];
	          } 
	  }
	 if(@$city_id!=''){
	 
	 if(@$this->input->post('location_id')!=''){
		  $location_arr=$this->db->where('city_id',@$city_arr[0]['id'])->where('location',$this->input->post('location_id'))->get('tbl_location')->result_array();
		  if(@$location_arr[0]['id']!=''){
		  $location_id=@$location_arr[0]['id'];
	 } 
	 } 
		 
	 }	
	        /**********************************************************************************/  
			 
			 			$insert_data=array(
						'url_key'=>$new_list_url,
	                        'agent_id'=>$list_raw_arr[0]['agent_id'],
                            'person_name'=>$this->input->post('person_name'),
							'shop_email'=>$this->input->post('shop_email'),
							'mobile_no'=>$this->input->post('mobile_no'),
							'whatsapp_no'=>$this->input->post('whatsapp_no'),
							'landline_no'=>$this->input->post('landline_no'),
							'business_name'=>$this->input->post('business_name'),
							'category_id'=>strint_to_in_view($final_cate_id_arr),
							'subcategory_id'=>@$subcategory_id,
							'innercategory_id'=>@$innercategory_id,
							'city_id'=>$city_id,
							'location_id'=>$location_id,
							'shop_address'=>$this->input->post('shop_address'),
							'shop_zipcode'=>$this->input->post('shop_zipcode'),
							'opening_time'=>$this->input->post('opening_time'),
							'closeing_time'=>$this->input->post('closeing_time'),
							'work_Monday'=>$this->input->post('work_Monday'),
							'work_Tuesday'=>$this->input->post('work_Tuesday'),
							'work_Wednesday'=>$this->input->post('work_Wednesday'),
							'work_Thursday'=>$this->input->post('work_Thursday'),
							'work_Friday'=>$this->input->post('work_Friday'),
							'work_Saturday'=>$this->input->post('work_Saturday'),
							'work_Sunday'=>$this->input->post('work_Sunday'),
							'shop_website'=>$this->input->post('shop_website'),
							'status'=>0,
							'adddate'=>$list_raw_arr[0]['adddate']
							
					        
				);	
				
				$listquery=$this->db->insert('tbl_listing',$insert_data);
				
			    $lastlist_id=$this->db->insert_id();	
				/**********************************************************************************/ 		
			
			 if (!is_dir("./public/uploads/listingimg/".$lastlist_id)) {
                    mkdir("./public/uploads/listingimg/".$lastlist_id, 0777);
                   } 
				  
		 if(isset($_FILES['attachment1']['name']) && $_FILES['attachment1']['name'] != ''){
			  
				   
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment1']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);   
				  
				   	if ( ! $this->upload->do_upload('attachment1'))
						{
						   $error = $this->upload->display_errors();
							$this->session->set_flashdata('list_img_error',$error);
							redirect(admin_url().'editrawlist/'.$list_raw_arr[0]['agent_id'].'/'.$list_id);
						
						}
						else
						{
						@unlink('./public/uploads/listingimg/'.$this->input->post('old_img1'));
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
						
					$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
				
					$insert_img_data=array(
							'FeaturedImg'=>$file_name,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
					
					}else if(@$this->input->post('old_img1')!='')
					{
						$file_name1=$this->input->post('old_img1');
						$srcfile= './public/uploads/listingimg/rawimgdata/'.$this->input->post('old_img1');
                         $dstfile='./public/uploads/listingimg/'.$lastlist_id.'/'.$this->input->post('old_img1');
                           copy($srcfile, $dstfile);
						   unlink($srcfile);
					
						$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
						   
					$insert_img_data=array(
							'FeaturedImg'=>$file_name1,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);	   
						   
					/*$update_data=array('business_img'=>$list_raw_arr[0]['business_img']);
					$this->db->where('id',$lastlist_id);
				    $this->db->update('tbl_listing',$update_data);*/
						
					}
					
				/**********************************************************************************/ 	
			if(isset($_FILES['attachment2']['name']) && $_FILES['attachment2']['name'] != ''){
			 
				$config['upload_path'] = './public/uploads/listingimg/'.$lastlist_id;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['attachment2']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);   
				   
				   	if ( ! $this->upload->do_upload('attachment2'))
						{
						
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('list_img_error1',$error);
							redirect(admin_url().'editlist/'.$list_raw_arr[0]['agent_id'].'/'.$list_id);
						
						}
						else
						{
						@unlink('./public/uploads/listingimg/'.$this->input->post('old_img2'));
							$data = $this->upload->data();
							$file_name2=$data['file_name'];
							
						}
			$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}
					
					
					$insert_img_data=array(
							'FeaturedImg'=>$file_name2,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);
					
					
					}else if(@$this->input->post('old_img2')!=''){
						
						$file_name2=$this->input->post('old_img2');
						$srcfile2= './public/uploads/listingimg/rawimgdata/'.$this->input->post('old_img2');
                         $dstfile2='./public/uploads/listingimg/'.$lastlist_id.'/'.$this->input->post('old_img2');
                           copy($srcfile2, $dstfile2);
						   unlink($srcfile2);
						   
						   
						  /* $update_data=array('business_img2'=>$list_raw_arr[0]['business_img2']);
					$this->db->where('id',$lastlist_id);
				    $this->db->update('tbl_listing',$update_data);*/
			$total_img=$this->db->where('list_id',$lastlist_id)->get('tbl_list_gallery')->num_rows();	
				if($total_img == 0){
					$active_main_image=1;
				}else{
					$active_main_image=0;
				}


						$insert_img_data=array(
							'FeaturedImg'=>$file_name2,
							'list_id'=>$lastlist_id,
							'main_image'=>$active_main_image,
							'CreatedOn'=>date('Y-m-d')
						);
						
				
				$this->db->insert('tbl_list_gallery',$insert_img_data);   
					}
		
		$this->db->where('id',$list_id);
		$this->db->delete('tbl_extra_listing'); 
		
			
	}
/**********************************************************************************/ 
	/***************************************edit_listingrequest**********************************/
	
		 public function edit_listingrequest($list_id){
			 
	 
	 
	 		 if($this->input->post('business_name', TRUE)){
			$list_titel= $this->input->post('business_name'); 
		 }
		if($this->input->post('location_id', TRUE)){
			$list_titel .=" near ".$this->input->post('location_id');	
			
		  }
		 
		  if($this->input->post('city_id', TRUE)){
			$list_titel.= " in ".$this->input->post('city_id'); 
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
			
			
	if(@$this->input->post('city_id')!=''){
		 $city_arr=$this->db->where('city_name',$this->input->post('city_id'))->get('tbl_city')->result_array();
		 	 if(@$city_arr[0]['id']!=''){
		  $city_id=@$city_arr[0]['id'];
	          } 
	  }
	 if(@$city_id!=''){
	 
	 if(@$this->input->post('location_id')!=''){
		  $location_arr=$this->db->where('city_id',@$city_arr[0]['id'])->where('location',$this->input->post('location_id'))->get('tbl_location')->result_array();
		  if(@$location_arr[0]['id']!=''){
		  $location_id=@$location_arr[0]['id'];
	 } 
	 } 
		 
	 }	
	        /**********************************************************************************/  
			 
			 			$insert_data=array(
						'url_key'=>$new_list_url,
	                       
                            'person_name'=>$this->input->post('person_name'),
							'shop_email'=>$this->input->post('shop_email'),
							'mobile_no'=>$this->input->post('mobile_no'),
							'whatsapp_no'=>$this->input->post('whatsapp_no'),
							'landline_no'=>$this->input->post('landline_no'),
							'business_name'=>$this->input->post('business_name'),
							'category_id'=>@$multiple_category,
							'subcategory_id'=>@$multiple_subcategory,
							'innercategory_id'=>@$multiple_innercategory,
							'city_id'=>$city_id,
							'location_id'=>$location_id,
							'shop_address'=>$this->input->post('shop_address'),
							'shop_zipcode'=>$this->input->post('shop_zipcode'),
							'opening_time'=>$this->input->post('opening_time'),
							'closeing_time'=>$this->input->post('closeing_time'),
						'work_Monday'=>$this->input->post('work_Monday'),
							'work_Tuesday'=>$this->input->post('work_Tuesday'),
							'work_Wednesday'=>$this->input->post('work_Wednesday'),
							'work_Thursday'=>$this->input->post('work_Thursday'),
							'work_Friday'=>$this->input->post('work_Friday'),
							'work_Saturday'=>$this->input->post('work_Saturday'),
							'work_Sunday'=>$this->input->post('work_Sunday'),
							'shop_website'=>$this->input->post('shop_website'),
							'status'=>0,
							'adddate'=>date('Y-m-d')
							
					        
				);	
				
				$listquery=$this->db->insert('tbl_listing',$insert_data);
				
			    	
					 $update_data=array(
			                'addlist'=>1,
							'listaddeddate'=>date('Y-m-d')
							
						);	
						
		           $this->db->where('id',$list_id);
				  $this->db->update('tbl_list_request',$update_data);			
			
			
		
					
			
		
			
	}
/**********************************************************************************/ 


      public function agent_daily_report(){
		  
		 $sql="SELECT count(list.id) as totallist , list.agent_id, list.adddate FROM tbl_listing list LEFT JOIN tbl_agent agent ON list.agent_id = agent.id WHERE list.adddate ='".date('Y-m-d')."' GROUP BY agent_id";
	
		$query=$this->db->query($sql)->result_array();
		 return  $query;
	  }
	 /**********************************************************************************/  
	  public function agent_date_report(){
		  $agent_id=$this->input->post('agent_name');
		 $date_search=$this->input->post('date_to');
		  
		   $sql="SELECT count(list.id) as totallist , list.agent_id, list.adddate FROM tbl_listing list LEFT JOIN tbl_agent agent ON list.agent_id = agent.id WHERE list.adddate ='".$date_search."' and list.agent_id='".$agent_id."' GROUP BY agent_id";
	
		$query=$this->db->query($sql)->result_array();
		 return  $query;
		  
       }
	  	 /**********************************************************************************/  
	  public function agent_raw_date_report(){
		  $agent_id=$this->input->post('agent_name');
		 $date_search=$this->input->post('date_to');
		 
		 if(($agent_id!='')&&($date_search!='')){
		  
		   $sql="SELECT count(list.id) as totallist , list.agent_id, list.adddate FROM tbl_extra_listing list LEFT JOIN tbl_agent agent ON list.agent_id = agent.id WHERE list.adddate ='".$date_search."' and list.agent_id='".$agent_id."' GROUP BY agent_id";
		
		 }else{
			$sql="SELECT count(list.id) as totallist , list.agent_id, list.adddate FROM tbl_extra_listing list LEFT JOIN tbl_agent agent ON list.agent_id = agent.id WHERE list.adddate ='".date('Y-m-d')."' GROUP BY agent_id";
		 }
		 $query=$this->db->query($sql)->result_array();
		 return  $query;
       } 
	   
	 /**************************************all_final_list********************************************/   
	   public function all_final_list(){
		   
		 $sql="SELECT count(list.id) as totallist , list.agent_id, list.adddate FROM tbl_listing list LEFT JOIN tbl_agent agent ON list.agent_id = agent.id  GROUP BY agent_id";
	
		$query=$this->db->query($sql)->result_array();
		 return  $query;
	 
		   
	  }
	  
  	 	 /*********************************all raw list****************************************/
	  public function all_raw_list(){
		  
		 $sql="SELECT count(list.id) as totallist , list.agent_id, list.adddate FROM tbl_extra_listing list LEFT JOIN tbl_agent agent ON list.agent_id = agent.id  GROUP BY agent_id";
	
		$query=$this->db->query($sql)->result_array();
		  
		  
		  return $query; 
	  }
	          /*********************************numbers of customer****************************************/
	   public function total_customer(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_customer')->num_rows();
		  return $query; 
	  }	 
	/*************************************************************************/
        /*********************************all customer****************************************/
	   public function all_customer(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_customer')->result_array();
		  return $query; 
	  }	 
	/*************************************************************************/	
	
	        /*********************************all customer****************************************/
	   public function all_advertiserequest(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_advertise_request')->result_array();
		  return $query; 
	  }	 
	/*************************************************************************/
	
	
	
	
			/************Add Address*************by Shashikant************************************************/
	
	 public function add_addressmanagement(){
						
			 $insert_data=array(
			                'address'=>$this->input->post('address'),
							'emailid'=>$this->input->post('emailid'),
							'contactno'=>$this->input->post('contactno'),
							'tollfreeno'=>$this->input->post('tollfreeno'),
							'status'=>$this->input->post('status'),
							
						);	
						
		$query=$this->db->insert('tbl_sitemanagement',$insert_data);
	 }
	 	 	 /*********edit address*********************/
	 public function edit_addressmanagement($siteid){
						
			 $update_data=array(
			                'address'=>$this->input->post('address'),
							'emailid'=>$this->input->post('emailid'),
							'contactno'=>$this->input->post('contactno'),
							'tollfreeno'=>$this->input->post('tollfreeno'),
							'sendemail'=>$this->input->post('sendemail'),
							'receivedemail'=>$this->input->post('receivedemail'),
						);	
						
		           $this->db->where('id',$siteid);
				  $this->db->update('tbl_sitemanagement',$update_data);
	 }

	 /*********edit state*********************/
	 
	 
	   public function single_addressmanagement($addressmanagement_id){
	  
	  $query=$this->db->where('id',$addressmanagement_id)->get('tbl_sitemanagement')->result_array();
	  return $query; 
  }
  
  
  	 /*********************************all advertisement array****************************************/
  public function all_advertisement(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_advertisement')->result();
	  return $query; 
  }
  
  /*************************************************************************/
     /*********************************single advertisement data****************************************/
  public function single_advertisement_array($advertisement_id){
	  
	  $query=$this->db->where('id',$advertisement_id)->get('tbl_advertisement')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
   /*************************************************************************/
 	/*********************edit advertisement*********************/
	
	
	
  
  
   public function edit_advertisement($advertisement_id){
		 
		
 $update_data=array(
			                'name'=>$this->input->post('name'),
							'position'=>$this->input->post('position'),
							'addsense'=>$this->input->post('addsense'),
							
							
						);	
						
		           $this->db->where('id',$advertisement_id);
				  $this->db->update('tbl_advertisement',$update_data);


						
		 
	 }
  
      /*********************************all listing****************************************/
	   public function all_listingrequest(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_list_request')->result_array();
		  return $query; 
	  }	 
	/*************************************************************************/
	
	  /*********************************single listing date****************************************/
  public function single_listingrequest($list_id){
	  
	  $query=$this->db->where('id',$list_id)->get('tbl_list_request')->result_array();
	  return $query; 
  }
	
  	 /*********************************all popularsubcategory**********added by shashikant******************************/
	  public function all_popularcategory(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_popular_category')->result_array();
		  return $query; 
	  }
	  
  /*************************************************************************/ 

  
    
         /*********************************single category data by name****************************************/
  public function single_popularcategory_data($popularcategory_name){
	  
	  $query=$this->db->where('id',$popularcategory_name)->get('tbl_popular_category')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
   /*****************************************add subcategory*************************************/
	 public function add_popularcategory(){
						
			
 $insert_data=array(
			                'category_id'=>$this->input->post('category_id'),
							'order_by'=>$this->input->post('order_by'),
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_popular_category',$insert_data);
		
		
	 }
	 
	 /*****************************************add subcategory*********************/
	 
	  public function edit_popularsubcategory($popularcategory_id){
						
		 $update_data=array(
			                'category_id'=>$this->input->post('category_id'),
							'order_by'=>$this->input->post('order_by'),
							'status'=>$this->input->post('status'),
							
						);	
						
		$this->db->where('id',$popularcategory_id);
		$this->db->update('tbl_popular_category',$update_data);
	 }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		 /*********************************all popularsubcategory**********added by shashikant******************************/
	  public function all_csvfileupload(){
		  
		  $query=$this->db->order_by('id','desc')->get('addressbook')->result_array();
		  return $query; 
	  }
	  
  /*************************************************************************/ 

  
    
         /*********************************single category data by name****************************************/
  public function single_csvfileupload_data($csvfileupload_name){
	  
	  $query=$this->db->where('id',$csvfileupload_name)->get('addressbook')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
   /*****************************************add subcategory*************************************/
	 public function add_csvfileupload(){
						
			
 $insert_data=array(
			                'firstname'=>$this->input->post('firstname'),
							'lastname'=>$this->input->post('lastname'),
							'phone'=>$this->input->post('phone'),
							'email'=>$this->input->post('email'),
							
						);	
						
		$query=$this->db->insert('addressbook',$insert_data);
		
		
	 }
	 
	 /*****************************************add subcategory*********************/
	 
    function get_addressbook() {     
        $query = $this->db->get('addressbook');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
 
    function insert_csv($data) {
        $this->db->insert('addressbook', $data);
    }
 
        /*********************************all career****************************************/
	   public function all_career(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_career')->result_array();
		  return $query; 
	  }	 
	/*************************************************************************/	
   /*****************************************add event*************************************/
	 public function add_career(){
						
			 $insert_data=array(
			                'title'=>$this->input->post('title'),
							 'description'=>$this->input->post('description'),
							'status'=>$this->input->post('status')
						
						);	
						
		$query_int=$this->db->insert('tbl_career',$insert_data);
		
	
	 }
	    /*********************************single event data****************************************/
  public function single_career($career_id){
	  
	  $query=$this->db->where('id',$career_id)->get('tbl_career')->result_array();
	  return $query; 
  }
  /*********************************single edit data****************************************/
	  public function edit_career($career_id){
				
			 $update_data=array(
			                'title'=>$this->input->post('title'),
							'description'=>$this->input->post('description'),							
							'status'=>$this->input->post('status'),
							
						);	
						
		           $this->db->where('id',$career_id);
				  $this->db->update('tbl_career',$update_data);
	 }
	
	 
	 /*********************************all hiringform****************************************/
	   public function all_hiringform(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_hiring')->result_array();
		  return $query; 
	  }	 
	/*************************************************************************/	
	
	public function all_listenquery(){
		 $query=$this->db->order_by('id','DESC')->get('tbl_enquiry')->result_array();
		  return $query;
	}
	
		 	 /*********************************all team****************************************/
  public function all_teammember(){
	  
	  $query=$this->db->order_by('id','desc')->get('tbl_teammember')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
     /*********************************single member data****************************************/
  public function single_teammember($membe_id){
	  
	  $query=$this->db->where('id',$membe_id)->get('tbl_teammember')->result_array();
	  return $query; 
  }
  
  /*************************************************************************/
  
  	 /*********add team*********************/
	 public function add_teammember(){
						
			 $insert_data=array(
							'membername'=>$this->input->post('membername'),
							'designation'=>$this->input->post('designation'),
							'description'=>$this->input->post('description'),
							'status'=>$this->input->post('status'),
							'CreateDate'=>date('Y-m-d')
						);	
						
		$query_int=$this->db->insert('tbl_teammember',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if(!empty($_FILES['member_img']['name'])){
				$config['upload_path'] = './public/uploads/teamimg';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['member_img']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('member_img'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('team_img_error',$error);
				
								redirect(admin_url().'addteam');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							$update_data=array(
							'member_img'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_teammember',$update_data);	
						}
							
						
							
		
		}
	 }
	 
	 /*********add teammember*********************/
	  /*********************edit teammember*********************************/
	 public function edit_teammember($member_id){
		 
		 if(isset($_FILES['member_img']['name']) && $_FILES['member_img']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/teamimg';
				$config['allowed_types'] = 'gif|jpg|png';
				$confi['filename']=rand(1,5000)."-".$_FILES['member_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('flag_img'))
						{
						
							@unlink('./public/uploads/teamimg/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('team_img_error',$error);
							redirect(admin_url().'editteam/'.$member_id);
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
					
				$update_data=array(
					        'membername'=>$this->input->post('membername'),
							'designation'=>$this->input->post('designation'),
							'description'=>$this->input->post('description'),
							'status'=>$this->input->post('status'),
					'member_img'=>$file_name
					
				
				);
				$this->db->where('id',$member_id);
				$this->db->update('tbl_teammember',$update_data);
						
		 
	 }
	  /*********************edit country*********************************/
    /*********************************all advertise number****************************************/
	  public function total_number_advertise(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_advertise_request')->num_rows();
		  return $query; 
	  } 
	 	 /*************************************************************************/
	  
    /*********************************all listing number****************************************/
	  public function total_number_listing(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_list_request')->num_rows();
		  return $query; 
	  } 
	 	 /*************************************************************************/	
		 
		 
		     /*********************************total_hiring_management****************************************/
	  public function total_hiring_management(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_hiring')->num_rows();
		  return $query; 
	  } 
	 	 /*************************************************************************/  
		 
 /*********************************total_hiring_management****************************************/
	  public function total_business_lead(){
		  
		  $query=$this->db->order_by('id','desc')->get('tbl_enquiry')->num_rows();
		  return $query; 
	  } 
	 	 /*************************************************************************/
		 
		       /*********************************all telecaller****************************************/
	   public function all_telecaller(){
		  
		  $query=$this->db->order_by('id','DESC')->get('tbl_telecaller')->result_array();
		  return $query; 
	  }	 
	/*************************************************************************/	
			
	/************************************single telecaller details*************************************/   
	   public function single_telecaller_details($telecaller_id){
				  $query=$this->db->where('id',$telecaller_id)->get('tbl_telecaller')->result_array();
				  return $query; 
			   }
	
	/*************************************************************************/	
	
 
  	 /******************add  telecaller*********************/
	 public function add_telecaller(){
						
			 $insert_data=array(
			                'username'=>$this->input->post('tele_username'),
							'telecaller_name'=>$this->input->post('telecaller_name'),
							'emailid'=>$this->input->post('tele_email'),
							'contactno'=>$this->input->post('contact_number'),
							'password'=>md5($this->input->post('tele_password')),
							'status'=>$this->input->post('status'),
							'add_date'=>date('Y-m-d'),
							'access'=>'T'
						);	
						
		$query_int=$this->db->insert('tbl_telecaller',$insert_data);
			$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if(!empty($_FILES['telecaller_img']['name'])){
				$config['upload_path'] = './public/uploads/telecaller';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['telecaller_img']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('telecaller_img'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('telecaller_error',$error);
				
								redirect(admin_url().'addtelecaller');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							$update_data=array(
							'telecaller_img'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_telecaller',$update_data);
						
						}
							
								
		
		}
	 }
	 /******************add  telecaller*********************/
	 
		 	 /******************edit telecaller*********************/
	public function edit_telecaller($telecaller_id){
		
	
		
		 if(isset($_FILES['telecaller_img']['name']) && $_FILES['telecaller_img']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/telecaller';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['filename']=rand(1,5000)."-".$_FILES['telecaller_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('telecaller_img'))
						{
						
							@unlink('./public/uploads/telecaller/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('telecaller_error',$error);
							redirect(admin_url().'edittelecaller/'.$telecaller_id);
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
		 $update_data=array(
		                    'username'=>$this->input->post('tele_username'),
							'telecaller_name'=>$this->input->post('telecaller_name'),
							'emailid'=>$this->input->post('tele_email'),
							'contactno'=>$this->input->post('contact_number'),
							'status'=>$this->input->post('status'),
							'telecaller_img'=>$file_name
						);	
			
		$this->db->where('id',$telecaller_id);
		$this->db->update('tbl_telecaller',$update_data);
	 } 

 /*********orders  Listings*********************/
 
		 function orders_listing(){
			
			$sql="select tbl_order_details.*,tbl_orders.*,tbl_customer.* from tbl_order_details  JOIN tbl_orders  ON tbl_order_details.order_id=tbl_orders.id join tbl_customer on tbl_orders.customer_id=tbl_customer.id" ;
		
			$query=$this->db->query($sql)->result_array();
		//echo "<pre>";print_r($query);die;
			return  $query;
		
			
			
		}
 
 
  /******************end*********************/
  
  
   /*********Add  Tax*********************/
 
		 function add_tax($tax_type,$tax){
		$sql = "insert into tbl_tax (tax_type,tax)
			values ('".$tax_type."','".$tax."')";
         $result= $this-> db-> query($sql);
		 return $result;
			
		}
 
 
  /******************end*********************/
  
    
   /*********Add  Author*********************/
 
		 function add_author(){
			 $pswrd=md5($this->input->post('password'));
			 $insert_data=array(
			                'username'=>$this->input->post('username'),
							'author_name'=>$this->input->post('author_name'),
							'emailid'=>$this->input->post('author_email'),
							'password'=>$pswrd,
							'contactno'=>$this->input->post('author_contact'),
							'status'=>$this->input->post('status'),
							'add_date'=>date('Y-m-d')
						);	
						
		$query=$this->db->insert('tbl_author',$insert_data);
		return $query;
			
		}
 
 
  /******************end*********************/
  
   
      /********* Author Listing *********************/
 
		 function authorlist(){
			 
			            $query=$this->db->order_by('id','desc')->get('tbl_author')->result();
	                 return $query; 
			
		}
 
 
  /******************end*********************/
   
   /*********Check tax exists or not  Tax*********************/
 
		 function tax_exists($tax_type){
			$this->db->select("*");
			$this->db->from("tbl_tax");
			$this->db->where('tax_type',$tax_type);
			$query = $this->db->get();
			return $query->num_rows();
				
			
		}
 
 
  /******************end*********************/
  
  
   /********* edit order listing *********************/
 

		 function edit_orders($customer_id,$vendor_order_id){
			$sql="select product_name,	customer_id,	vendor_order_id,color_variation,product_image,quantity,sale_price,total from tbl_order_details where customer_id='".$customer_id."' and  vendor_order_id='".$vendor_order_id."'";
			$query=$this->db->query($sql)->result_array();
	         return  $query;
		
			
			
		}
 
		 function customer_billing_infos($customer_id,$vendor_order_id){
			$sql="select distinct bill_fname,bill_lastname,	billing_address,billing_city,billing_country,billing_zipcode from tbl_order_details where customer_id='".$customer_id."' and  vendor_order_id='".$vendor_order_id."'";
			$query=$this->db->query($sql)->row();
	         return  $query;
		
			
			
		}
 
 
 		 function customer_shipping_infos($customer_id,$vendor_order_id){
			$sql="select distinct  ship_fname,ship_lname,	shipping_address,shipping_city,shipping_country,shipping_zipcode from tbl_order_details where customer_id='".$customer_id."' and  vendor_order_id='".$vendor_order_id."'";
			$query=$this->db->query($sql)->row();
	         return  $query;
		
			
			
		}
 
 
		 function update_orders($customer_id,$orders,$vendor_order_id){
			
			$this->db->where('customer_id',$customer_id);
			$this->db->where('vendor_order_id',$vendor_order_id);
		   $query= $this->db->update('tbl_order_details',$orders);
			
			return  $query;
		
			
			
		}
		function update_order_details($order_id,$orders_details){
			
		   $this->db->where('order_id',$order_id);
		   $query= $this->db->update('tbl_order_details',$orders_details);
			
			return  $query;
		
			
			
		}
  /******************end*********************/
  
   /********* Invoice*********************/
   
  function invoice($order_id)
  {
	
    $sql="select tbl_order_details.*,tbl_orders.* from tbl_orders,tbl_order_details where tbl_orders.id='".$order_id."' and tbl_order_details.order_id='".$order_id."' ";
	$query=$this->db->query($sql)->row();
	
	 $product_info= unserialize($query->product_info);

	// echo "<pre>"; print_r($product_info);
	
	if($query->payment_method==1)
	{
		$payment_method= "Paypal";
	}
	else if($query->payment_method==2)
	{
		$payment_method= "Master Card";
	}
	else if($query->payment_method==3)
	{
		$payment_method= "Check Payment";
	}
	else
	{
		$payment_method= "Other";
	}
	include(FCPATH.'application/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',20);
	$pdf->Ln(10);
	
	/****************** General info *********************/
	
	$general_info=array('Order Id : '=>$query->order_id,'Shipped Date : '=>$query->date_shipped,'Tax Type: '=>$query->tax_type,'Tax : '=>$query->tax,'Total Amount : '=>"$".$query->sale_price,'Customer : '=>$query->customer,
	'Customer Email : '=>$query->customer_email,'Attribute : '=>$query->product_attributes,'Discount : '=>$query->discount."%",'Payment Method : '=>$payment_method);
	$pdf->SetFont('Arial','B',15);
	$pdf->Write(5,'General Information :');  
	$pdf->Ln(8);
	
	foreach($general_info as $key=>$general_infos){
	$pdf->SetFont('arial','',9);	
	$pdf->Write(5,$key);  
	$pdf->Write(5,$general_infos);  
	$pdf->Ln();
	}
	$pdf->Ln(10);
	
	 /******************end*********************/
	 
	 
	 	/****************** Products info *********************/
		$pdf->SetFont('Arial','B',15);
		$pdf->Write(5,'Products Information :');  
		$pdf->Ln(8);
	 	foreach($product_info as $product_infos)
	{
		$name=$product_infos['name'];
		$quantity=$product_infos['quantity'];
		$price=$product_infos['sale_price'];
		$product_code=$product_infos['sku'];
		
		$product_result=array('Product Name : '=>$name,'Quantity : '=>$quantity,'Price : '=>$price,'Product Code: '=>$product_code);
		
		foreach($product_result as $key=>$product_results){
		
	$pdf->SetFont('arial','',9);	
	$pdf->Write(5,$key);  
	$pdf->Write(5,$product_results);  
	$pdf->Ln();
	}
	$pdf->Ln(10);
	}
	// echo "<pre>"; print_r($product_result);
	
	
	
	 /******************end*********************/
	 
	
	
	 /****************** Billing info *********************/
	
	$billing_info=array('Address : '=>$query->billing_address,'City : '=>$query->billing_city,'Country : '=>$query->billing_country,'Zipcode : '=>$query->billing_zipcode);
	$pdf->SetFont('Arial','B',15);
	$pdf->Write(5,'Billing Information :');  
	$pdf->Ln(10);
	
	foreach($billing_info as $key=>$billing_infos){
	$pdf->SetFont('arial','',9);	
	$pdf->Write(5,$key);  
	$pdf->Write(5,$billing_infos);  
	$pdf->Ln();
	}
	$pdf->Ln(10);
	
	 /******************end*********************/
	

	 /****************** Shipping info*********************/
	 
	$billing_info=array('First Name : '=>$query->ship_fname,'Last Name : '=>$query->ship_lname,'Address : '=>$query->shipping_address,'City : '=>$query->shipping_city,'Country : '=>$query->shipping_country,'Zipcode : '=>$query->shipping_zipcode);
	$pdf->SetFont('Arial','B',15);
	$pdf->Write(5,'Shipping Information :');  
	$pdf->Ln(10);
	
	
	foreach($billing_info as $key=>$billing_infos){
	$pdf->SetFont('arial','',9);	
	$pdf->Write(5,$key);  
	$pdf->Write(5,$billing_infos);  
	$pdf->Ln();
	}
	
	$file=FCPATH.'application/orders/'.$query->order_id.'_Orders.pdf';
	$pdf->Output($file,'F');
	$pdf->Output($file,'I');

   }
  
   /******************end*********************/
   
   
   
   	/*********************Import Excel Products *********************************/
	
	
	 	 function import_products()
	{
		  $i=0; 
		//print_r(error_reporting(E_ALL));
		     $filename=$_FILES["file"]["tmp_name"];
				// echo $filename; die;
           
    		 if($_FILES["file"]["size"] > 0)
    		 {
     
    		  	$file = fopen($filename, "r");
    	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
    	         {
					  if($i>0) {
					 
					$multiple_category=implode(',',$emapData[17]);
					$multiple_subcategory=implode(',',$emapData[18]);
					$multiple_innercategory=implode(',',$emapData[19]);
					$related_product=implode(',',$emapData[20]); 
				
				
			
			$insert_data=array(
                            'name'=>$emapData[0],
							'product_short'=>$emapData[1],
							'images'=>$emapData[2],
							'featured_status'=>$emapData[3],
							'sku'=>$emapData[4],
							'popular_status'=>$emapData[5],
							'product_desc'=>$emapData[6],
							'price'=>$emapData[7],
							'sale_price'=>$emapData[8],
							'inventory'=>$emapData[9],
                            'store_id'=>$emapData[10],
                            'status'=>$emapData[11],
                            'meta_title'=>$emapData[12],
                            'meta_keyword'=>$emapData[13],
                            'meta_desc'=>$emapData[14],
                            'related_product'=>$related_product,
                            //'product_attributes'=>$emapData[16],
							'category_id'=>$multiple_category,
							'subcategory_id'=>$multiple_subcategory,
							'innercategory_id'=>$multiple_innercategory,
							'quantity'=>$emapData[21]
						
					        
				);
				$listquery=$this->db->insert('tbl_products',$insert_data);	
				  $lastlist_id=$this->db->insert_id();
			
					
					  }
					  $i++;
    	         }
    	 
    	       
     
		
	}
	}
		/*********************end*********************************/
	 public function all_blogs(){
	  
	  $query=$this->db->order_by('id')->get('tbl_blogs')->result_array();
	  return $query; 
  }  
  public function all_post_category(){
	  
	  $query=$this->db->order_by('id')->get('tbl_postcategory')->result_array();
	  return $query; 
  } 
  public function all_posttags(){
	  
	  $query=$this->db->order_by('id')->get('tbl_posttags')->result_array();
	  return $query; 
  }
  public function all_post(){
	  
	  $query=$this->db->order_by('id')->where('status',1)->get('tbl_blogs')->result_array();
	  return $query; 
  } 
  public function all_post_by_category($category){
	  
	  $auther_id_edit="select * from tbl_blogs where FIND_IN_SET('$category',category) and status=1";
					  
	 $user_name_edit=$this->db->query($auther_id_edit)->result_array();
	  
	//  $query=$this->db->order_by('id')->where('category',1)->get('tbl_postcategory')->result_array();
	return $user_name_edit; 
  }
  public function all_post_by_tags($tags){
	  
	  $auther_id_edit="select * from tbl_blogs where FIND_IN_SET('$tags',category) and status=1";
					  
	 $user_name_edit=$this->db->query($auther_id_edit)->result_array();
	  
	//  $query=$this->db->order_by('id')->where('category',1)->get('tbl_postcategory')->result_array();
	return $user_name_edit; 
  }
  public function all_post_subcategory(){
	  
	  $query=$this->db->order_by('id')->get('tbl_postsubcategory')->result_array();
	  return $query; 
  } 
  public function all_post_tags(){
	  
	  $query=$this->db->order_by('id')->get('tbl_posttags')->result_array();
	  return $query; 
  } 
  public function single_post($id){
	  
	  $query=$this->db->where('id',$id)->get('tbl_blogs')->row();
	  return $query; 
  }
  	  public function single_blog($theme_id){
	  
	  $query=$this->db->where('id',$theme_id)->get('tbl_blogs')->result_array();
	  return $query; 
  }
  
  	 public function edit_blog($member_id){
		 
		 if(isset($_FILES['theme_img']['name']) && $_FILES['theme_img']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/blog_image';
				$config['allowed_types'] = 'gif|jpg|png';
				$confi['filename']=rand(1,5000)."-".$_FILES['theme_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('theme_img'))
						{
						
							@unlink('./public/uploads/theme_image/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('theme_img_error',$error);
							redirect(admin_url().'editblog/'.$member_id);
						
						}
						
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
					
						$category=implode(',',$this->input->post('category'));
						$subcategory=implode(',',$this->input->post('subcategory'));
						$tags=implode(',',$this->input->post('tags'));	
					
				$update_data=array(
					        'author_name'=>$this->input->post('author_name'),
					        'category'=>$category,
					        'subcategory'=>$subcategory,
					        'tags'=>$tags,
					        
							
							'desc'=>$this->input->post('desc'),
							'status'=>$this->input->post('status'),
							'blog_img'=>$file_name
					
				
				);
				$this->db->where('id',$member_id);
				$this->db->update('tbl_blogs',$update_data);
						
		 
	 }
	 
	 public function add_posttag(){
						
			 $insert_data=array(
							'tag_name'=>$this->input->post('tag_name'),
						// 'description'=>$this->input->post('description'),
							'status'=>$this->input->post('status')
							
						);	
						
		$query_int=$this->db->insert('tbl_posttags',$insert_data);
		$last_id=$this->db->insert_id();
	
	 }  
	 public function add_postcate(){
						
			 $insert_data=array(
							'postcate_name'=>$this->input->post('postcate_name'),
						 'description'=>$this->input->post('description'),
							'status'=>$this->input->post('status')
							
						);	
						
		$query_int=$this->db->insert('tbl_postcategory',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if(!empty($_FILES['postcate_img']['name'])){
				$config['upload_path'] = './public/uploads/post_img';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['postcate_img']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('postcate_img'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('theme_img_error',$error);
				
								redirect(admin_url().'addpostcate');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							$update_data=array(
							'postcate_img'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_postcategory',$update_data);	
						}
							
						
							
		
		}
	 }
	 	 public function add_postsubcate(){
					//$postcategory_id=implode(',',$this->input->post('postcategory_id'));	
			 $insert_data=array(
							'postsubcate_name'=>$this->input->post('postsubcate_name'),
						 'description'=>$this->input->post('description'),
						 'postcategory_id'=>$this->input->post('postcategory_id'),
							'status'=>$this->input->post('status')
							
						);	
						
		$query_int=$this->db->insert('tbl_postsubcategory',$insert_data);
		$last_id=$this->db->insert_id();
		if($query_int)	{	
		
		 if(!empty($_FILES['postsubcate_img']['name'])){
				$config['upload_path'] = './public/uploads/post_img';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']=rand(1,5000)."-".$_FILES['postsubcate_img']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
								
						if ( ! $this->upload->do_upload('postsubcate_img'))
							{
								$error = $this->upload->display_errors();
					
								$this->session->set_flashdata('theme_img_error',$error);
				
								redirect(admin_url().'addpostcate');
							}
							else
							{
								$data = $this->upload->data();
								$file_name=$data['file_name'];
					
							}
							$update_data=array(
							'postsubcate_img'=>$file_name,
						);
						
						$this->db->where('id',$last_id);
						$this->db->update('tbl_postsubcategory',$update_data);	
						}
							
						
							
		
		}
	 } 
	   public function single_posttags($cate_id){
	  
	  $query=$this->db->where('id',$cate_id)->get('tbl_posttags')->result_array();
	  return $query; 
  }
  
  	 public function edit_posttag($member_id){
		 
		
					
				$update_data=array(
					        'tag_name'=>$this->input->post('tag_name'),
							
						
							'status'=>$this->input->post('status')
							
					
				
				);
				$this->db->where('id',$member_id);
				$this->db->update('tbl_posttags',$update_data);
				
						
		 
	 } 
	   public function single_postsubcate($cate_id){
	  
	  $query=$this->db->where('id',$cate_id)->get('tbl_postsubcategory')->result_array();
	  return $query; 
  } 
  
  	 public function edit_postsubcate($member_id){
		 
		 if(isset($_FILES['postsubcate_img']['name']) && $_FILES['postsubcate_img']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/post_img';
				$config['allowed_types'] = 'gif|jpg|png';
				$confi['filename']=rand(1,5000)."-".$_FILES['postsubcate_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('postsubcate_img'))
						{
						
							@unlink('./public/uploads/post_img/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('theme_img_error',$error);
							redirect(admin_url().'editpostsubcate/'.$member_id);
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
					//$category_id=implode(",",$this->input->post('postcategory_id'));
				$update_data=array(
					        'postsubcate_name'=>$this->input->post('postsubcate_name'),
							
							'description'=>$this->input->post('description'),
							'postcategory_id'=>$this->input->post('postcategory_id'),
							'status'=>$this->input->post('status'),
							'postsubcate_img'=>$file_name
					
				
				);
				$this->db->where('id',$member_id);
				$this->db->update('tbl_postsubcategory',$update_data);
				
						
		 
	 }
	   public function single_postcate($cate_id){
	  
	  $query=$this->db->where('id',$cate_id)->get('tbl_postcategory')->result_array();
	  return $query; 
  } 
  	  public function edit_postcate($member_id){
		 
		 if(isset($_FILES['postcate_img']['name']) && $_FILES['postcate_img']['name'] != ''){
					
				$config['upload_path'] = './public/uploads/post_img';
				$config['allowed_types'] = 'gif|jpg|png';
				$confi['filename']=rand(1,5000)."-".$_FILES['postcate_img']['name'];
				$this->load->library('upload');
				$this->upload->initialize($config);
								
					if ( ! $this->upload->do_upload('postcate_img'))
						{
						
							@unlink('./public/uploads/post_img/'.$this->input->post('old_img'));
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('theme_img_error',$error);
							redirect(admin_url().'edit_postcate/'.$member_id);
						
						}
						else
						{
							$data = $this->upload->data();
							$file_name=$data['file_name'];
							
						}
					
					}
					else{
					
						$file_name=$this->input->post('old_img');
					
					}
						
					
				$update_data=array(
					        'postcate_name'=>$this->input->post('postcate_name'),
							
							'description'=>$this->input->post('description'),
							'status'=>$this->input->post('status'),
							'postcate_img'=>$file_name
					
				
				);
				$this->db->where('id',$member_id);
				$this->db->update('tbl_postcategory',$update_data);
	 
	 }  
	 
	 
	 /*************************Dated 15 march 2018 changes start**********************************/
		 
		 public function add_category(){
				
         /*image upload ************/
		 
		 
		 if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/category/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/category/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addcategory/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}
		 
		
		 
		/* $allowExt =  array('jpg','png','gif');

				$data['image_name'] = "";
				$data['error'] = "";
				if($_FILES){
					$upload_path = '/filtermat_assets/assets/category/';
					$upload_path1 = 'filtermat_assets/assets/category/';
					$sourcePath = $_FILES['image']['tmp_name'];
					$directory = FCPATH . $upload_path;
					$image_name = $_FILES['image']['name'];
					$temp = explode(".", $image_name);
					$extension = end($temp);
					if(!in_array($extension,$allowExt) ) {
						$data['error'] = "Invalid File Extension";
					}
					else{
						$image_names = $temp[0];
						$filename = $image_names;
						$filenamefull = $filename . '.' . $extension;
						$targetPath = $directory . $filename . '.' . $extension;
						$dir = str_replace("___", "/", $directory);
						if (!file_exists($dir)) {
							mkdir($dir, 0777, true);
						}
						$targetPath = $directory .''. $filename . '.' . $extension;
						if (move_uploaded_file($sourcePath, $targetPath)) {
							$data['image_name'] = 'Image Uploaded Successfully! Here is your path:  &nbsp;&nbsp;<a>'.base_url().$upload_path1.$filename . '.' . $extension.'</a>';
						} else {
							$data['error'] = "Image not uploaded";
						}
					}
				}
				*/
		 
		 /******** end here *************/
           $insert_data=array(
				 //'universal_id'=>$this->input->post('uni_category_id'),
				'category'=>$this->input->post('category'),
				'status'=>$this->input->post('status'),
				'image'=>$file_name,
				'navigation'=>$this->input->post('navigation'),
				'CreateDate'=>date('Y-m-d'));	
							
			$query_int=$this->db->insert('tbl_category',$insert_data);
			return $this->db->insert_id();
		 }
	 
	 
	 /*************************Dated 15 march 2018 changes end**********************************/
	public function all_products(){
		$query=$this->db->order_by('id','desc')->get('tbl_products')->result();
		return $query; 
	} 
	public function add_product($pdf_name = ''){
		
		if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/product/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/product/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addproduct/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}
		
		$insert_data=array(
			'category_id'=>$this->input->post('category_id'),
			'subcategory_id'=>$this->input->post('subcategory_id'),
			'innercategory_id'=>$this->input->post('innercategory_id'),
			'product_name'=>$this->input->post('product_name'),
			'product_desc'=>$this->input->post('product_desc'),
			'product_data'=>$this->input->post('product_data'),
			'data_type'=>$this->input->post('data_type'),
			'pdf'=>$pdf_name,
			'status'=>$this->input->post('status'),
			'productimage'=>$file_name,
			'product_text_button'=>$this->input->post('product_text_button'),
			'short_desc'=>$this->input->post('short_desc')
		);	
		$query_int=$this->db->insert('tbl_products',$insert_data);
		return $this->db->insert_id();
	 }
	  public function edit_product($productID,$pdf_name = ''){
		  
		  if(isset($_FILES['image_name']['name']) && $_FILES['image_name']['name'] != ''){

			$config['upload_path'] = './filtermat_assets/assets/product/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['filename']=rand(1,5000)."-".$_FILES['image_name']['name'];
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('image_name'))
			{

			@unlink('./filtermat_assets/assets/product/'.$this->input->post('old_img'));
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('event_img_error',$error);
			redirect(admin_url().'addproduct/');

			}
			else
			{
			$data = $this->upload->data();
			$file_name=$data['file_name'];

			}

			}
			else{

			$file_name=$this->input->post('old_img');

			}
		  
		$update_data=array(
			'category_id'=>$this->input->post('category_id'),
			'subcategory_id'=>$this->input->post('subcategory_id'),
			'innercategory_id'=>$this->input->post('innercategory_id'),
			'product_name'=>$this->input->post('product_name'),
			'product_desc'=>$this->input->post('product_desc'),
			'product_data'=>$this->input->post('product_data'),
			'data_type'=>$this->input->post('data_type'),
			'pdf'=>$pdf_name,
			'status'=>$this->input->post('status'),
			'productimage'=>$file_name,
			'product_text_button'=>$this->input->post('product_text_button'),
			'short_desc'=>$this->input->post('short_desc')
		);
		$this->db->where('id',$productID);
		$this->db->update('tbl_products',$update_data);
	 }
	public function single_product($productID){
	  $query=$this->db->where('id',$productID)->get('tbl_products')->result_array();
	  return $query; 
	}
	
	 public function all_sub_by_cate($Cat){
	  
	  $query=$this->db->where('category_id',$Cat)->get('tbl_subcategory')->result_array();
	  return $query; 
  }
  
   public function all_innr_by_sub($subCat){
	  
	  $query=$this->db->where('subcategory_id',$subCat)->get('tbl_innercategory')->result_array();
	  return $query; 
  }
   public function all_category_name(){
	  
	  $query=$this->db->select('id,category as name')->order_by('category','asc')->get('tbl_category')->result_array();
	  $result= array();
	  foreach($query as $temp){
		  $result[$temp['id']]=$temp['name'];
	  }
	  return $result; 
  }
   public function all_subcategory_name(){
	  
	 $query=$this->db->select('id,subcategory as name')->order_by('subcategory','asc')->get('tbl_subcategory')->result_array();
	  $result= array();
	  foreach($query as $temp){
		  $result[$temp['id']]=$temp['name'];
	  }
	  return $result;
  }
   public function all_innrcategory_name(){
	  
	 $query=$this->db->select('id,innercategory as name')->order_by('innercategory','asc')->get('tbl_innercategory')->result_array();
	  $result= array();
	  foreach($query as $temp){
		  $result[$temp['id']]=$temp['name'];
	  }
	  return $result; 
  }
  
   public function get_navigation_menu(){
	  $query=$this->db->where('status','1')->where('navigation','yes')->get('tbl_category')->result_array();
	  return $query; 
	}
	
	
	public function sidebarcategory(){
	  $query=$this->db->where('status','1')->get('tbl_category')->result_array();
	  return $query; 
	}
	public function get_sub_category($id){
		$subcategory="select * from tbl_subcategory where category_id='".$id."' and status='1'";
		$query=$this->db->query($subcategory)->result_array();
		return $query;
	}
	public function innercategory($catid,$subcatid){
		$subcategory="select * from tbl_innercategory where category_id='".$catid."' and status='1' and subcategory_id='".$subcatid."'";
		
		$query=$this->db->query($subcategory)->result_array();
		return $query;
	}
	public function getproduct($catid,$subcatid,$innercategory){
		$getproduct="select * from tbl_products where category_id='".$catid."' and status='1' and subcategory_id='".$subcatid."' and innercategory_id='".$innercategory."'";
		
		$query=$this->db->query($getproduct)->result_array();
		return $query;
	}
}

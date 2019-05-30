<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {
	
  
	/********Constructor*******************/
	
	public function __construct(){
	
		parent::__construct();
		
		$this->lang->load('tooltip');
		$this->lang->load('social');
		
	}
	/******************************Authentication************************************/	
	private function authAdLogin(){ 
			
			if($this->session->userdata('adminlogin_data')==FALSE){
				redirect(admin_url());
				exit();
			  }
			  
			
	}	
/*******************************************************************************************************************/	
public function index(){
	
				$this->form_validation->set_rules('username','Username','trim|xss_clean|required');
				$this->form_validation->set_rules('password','Password','trim|xss_clean|required|MD5');
				if($this->form_validation->run()==false){
				
					$this->load->view('admin/index');
				
				}else{
					$username=$this->input->post('username');
					$password=$this->input->post('password');
					$signdata=$this->admin_model->sign_in($username,$password);
					
					if($signdata){
					$adminlogin_data=array(
							'adminid' =>$signdata[0]->id,
							'username'=>$signdata[0]->name
							);
					
					 $this->session->set_userdata('adminlogin_data',$adminlogin_data);
					redirect(admin_url().'dashboard');
				}else{
					$this->session->set_flashdata('login_error','Invalid Login Credentials');
					redirect(admin_url());
				 }
					
			}
				  
		}
	
/*******************************************************************************************************************/

/*********************************************change Password**********************************************************/	
	public function changepassword(){
		$this->authAdLogin();
		$logdata=$this->session->userdata('adminlogin_data');
			
		$this->form_validation->set_rules('current_password','Current Password','required|trim|xss_clean');
		$this->form_validation->set_rules('new_password','Password','required|trim|xss_clean|matches[confirm_password]|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|trim|xss_clean');
		
		if($this->form_validation->run()==false){
		
		    $active['leftbar_active']='changepassword';
		    $this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/changepassword');
		}else if($this->db->where('id',$logdata['adminid'])->where('password',md5($this->input->post('current_password')))->get('tbl_admin')->num_rows()==0){
			
				$this->session->set_flashdata('old_password_error',"Old Password Does Not Match");
				redirect(admin_url().'changepassword');
			
			}
			else if((md5($this->input->post('current_password')))==(md5($this->input->post('new_password')))){
			
				$this->session->set_flashdata('old_password_error',"Old Password And New Password Cannot Be Same.");
				redirect(admin_url().'changepassword');
			
			}
			else{
			
				$this->db->where('id',$logdata['adminid']);
				$this->db->update('tbl_admin',array('password'=>md5($this->input->post('new_password'))));
				$this->session->set_flashdata('done_changepassword','Password Changed Successfully');
				redirect(admin_url().'changepassword');
			
			
			}			
	}
	
	/***********Logout*********************/
	public function logout(){
		$this->session->unset_userdata('adminlogin_data');
		$this->session->sess_destroy();
		redirect(admin_url());
    }	
/************************************/
/**********************Dashboard*****************************/	
	
	public function dashboard(){
		    $this->authAdLogin();
			
			$data['total_list']=$this->admin_model->total_number_list();
			$data['total_agent']=$this->admin_model->total_agent();
			$data['total_customer']=$this->admin_model->total_customer();
			/*$data['today_total_requirement']=$this->admin_model->today_total_requirement();*/
		    $active['leftbar_active']='dashboard';
		    $this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/dashboard',$data);
		  
	}
	
/********************** profile setting*******************************/
     public function profilesetting(){
		 
		    
			$this->authAdLogin();
			$data['profil_data_array']=$this->admin_model->profile_data();
			$this->form_validation->set_rules('emailid',"Email Id","trim|required|xss_clean");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='profilesetting';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/profilesetting',$data);
			}else{
			  $data= $this->admin_model->edit_profile();	
			  $this->session->set_flashdata('profile_edit','Edited Successfully');
			  redirect(admin_url().'profilesetting');	
			 }
			
		}

	
/*******************************************************************************************************************/	

/*************************************************manage Location*****************************************************/	
/**********************country listing*****************************/	  
	public function country(){
		    $this->authAdLogin();
		    $active['leftbar_active']='country';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/country');
			
	}
/**********************country listing*****************************/				 
/**********************Add Country*************************/
	public function addcountry(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('country_name',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='country';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addcountry');
			}else{
						
			$data= $this->admin_model->add_country();			
			$this->session->set_flashdata('country_add','Added Successfully');
			redirect(admin_url().'addcountry');			
				
					
					
					
					}
					
				}
/**********************Add Country*************************/	

/**********************edit Country*************************/
     public function editcountry($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'country');
				}
		else if($this->db->where('id',$id)->get('tbl_countries')->num_rows()==0){
			redirect(admin_url().'country');
				}
		else{
			$data['country_data']=$this->admin_model->single_country($id);
			$this->form_validation->set_rules('country_name',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='country';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addcountry',$data);
			}else{
				
			  $data= $this->admin_model->edit_country($id);	
			  $this->session->set_flashdata('country_edit','Edited Successfully');
			  redirect(admin_url().'editcountry/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit Country*************************/

/**************Delete country****************/
	 public function deletecountry($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'country');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_countries')->num_rows==0){
					redirect(admin_url().'country');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_countries'); 
					redirect(admin_url().'country');
						
			   
			   }
			   
					
	}


     /***********deactivate country********************/
	
	 public function deactive_country()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_countries',$deactive_cntry); 
		
	   }  
	   
	   /***********activate country********************/
	
	 public function active_country()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_countries',$active_cntry);  
		
	   }  
/*******************************************************************************************************************/

/**********************all state*******************************/
     public function state(){
			$this->authAdLogin();
			$active['leftbar_active']='state';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/state');
			
			
			}
/**********************add state*******************************/
	public function addstate(){
					
			 $this->authAdLogin();
			$this->form_validation->set_rules('country_id',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('state_name',"State","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='state';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addstate');
			}else{
						
			$data= $this->admin_model->add_state();			
			$this->session->set_flashdata('state_add','Added Successfully');
			redirect(admin_url().'addstate');			
				
					
					
					
					}
					
				}

/**********************add state*******************************/

/**********************edit state*************************/
     public function editstate($id=''){
		  $this->authAdLogin();
		 if($id==''){
			redirect(admin_url().'state');
				}
		else if($this->db->where('id',$id)->get('tbl_state')->num_rows()==0){
			redirect(admin_url().'state');
				}
		else{
			$data['state_data']=$this->admin_model->single_state($id);
			$this->form_validation->set_rules('country_id',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('state_name',"State","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='state';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addstate',$data);
			}else{
				
			  $data= $this->admin_model->edit_state($id);	
			  $this->session->set_flashdata('state_edit','Edited Successfully');
			  redirect(admin_url().'editstate/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit state*************************/

/**************Delete state****************/
	 public function deletestate($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'state');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_state')->num_rows==0){
					redirect(admin_url().'state');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_state'); 
					redirect(admin_url().'state');
						
			   
			   }
			   
					
	}


     /***********deactivate state********************/
	
	 public function deactive_state()
	   {
	   	$this->authAdLogin();
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_state',$deactive_cntry); 
		
	   }  
	   
	   /***********activate state********************/
	
	 public function active_state()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_state',$active_cntry);  
		
	   }

/*************************************************************************/

/**********************all city*******************************/
     public function city(){
			$this->authAdLogin();
			$active['leftbar_active']='city';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/citylisting');
			
			
			}
/**********************add city*******************************/
	public function addcity(){
					
			$this->authAdLogin();
			$this->form_validation->set_rules('country_id',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('state_id',"State","trim|required|xss_clean");
			$this->form_validation->set_rules('city_name',"City","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='city';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addcity');
			}else{
						
			$data= $this->admin_model->add_city();			
			$this->session->set_flashdata('city_add','Added Successfully');
			redirect(admin_url().'addcity');			
				
					
					
					
					}
					
				}

/**********************add city*******************************/

/**********************edit city*************************/
     public function editcity($id=''){
		 $this->authAdLogin();
		 if($id==''){
			redirect(admin_url().'city');
				}
		else if($this->db->where('id',$id)->get('tbl_city')->num_rows()==0){
			redirect(admin_url().'city');
				}
		else{
			$data['city_data']=$this->admin_model->single_city($id);
			$this->form_validation->set_rules('country_id',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('state_id',"State","trim|required|xss_clean");
			$this->form_validation->set_rules('city_name',"City","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='city';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addcity',$data);
			}else{
				
			  $data= $this->admin_model->edit_city($id);	
			  $this->session->set_flashdata('city_edit','Edited Successfully');
			  redirect(admin_url().'editcity/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit city*************************/

/**************Delete city****************/
	 public function deletecity($id=''){
			   $this->authAdLogin();
			   if($id==''){
					redirect(admin_url().'city');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_city')->num_rows==0){
					redirect(admin_url().'city');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_city'); 
					redirect(admin_url().'city');
						
			   
			   }
			   
					
	}


     /***********deactivate city********************/
	
	 public function deactive_city()
	   {
	   	$this->authAdLogin();
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_city',$deactive_cntry); 
		
	   }  
	   
	   /***********activate city********************/
	
	 public function active_city()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_city',$active_cntry);  
		
	   }

/*******************************************************************************************************************/


/**********************all location*******************************/
     public function location(){
			$this->authAdLogin();
			$data['all_location_data']=$this->admin_model->all_location();
			$active['leftbar_active']='location';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/locationlisting',$data);
			
			
			}
/**********************add location*******************************/
	public function addlocation(){
					
			$this->authAdLogin();
			$this->form_validation->set_rules('country_id',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('state_id',"State","trim|required|xss_clean");
			$this->form_validation->set_rules('city_id',"City","trim|required|xss_clean");
			$this->form_validation->set_rules('location',"Location","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='location';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addlocation');
			}else{
						
			$data= $this->admin_model->add_location();			
			$this->session->set_flashdata('location_add','Added Successfully');
			redirect(admin_url().'addlocation');			
				
					
					
					
					}
					
				}

/**********************add location*******************************/

/**********************edit location*************************/
     public function editlocation($id=''){
		 $this->authAdLogin();
		 if($id==''){
			redirect(admin_url().'location');
				}
		else if($this->db->where('id',$id)->get('tbl_location')->num_rows()==0){
			redirect(admin_url().'location');
				}
		else{
			$data['location_data']=$this->admin_model->single_location($id);
			$this->form_validation->set_rules('country_id',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('state_id',"State","trim|required|xss_clean");
			$this->form_validation->set_rules('city_id',"City","trim|required|xss_clean");
			$this->form_validation->set_rules('location',"Location","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='location';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addlocation',$data);
			}else{
				
			  $data= $this->admin_model->edit_location($id);	
			  $this->session->set_flashdata('location_edit','Edited Successfully');
			  redirect(admin_url().'editlocation/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit location*************************/

/**************Delete location****************/
	 public function deletelocation($id=''){
			   $this->authAdLogin();
			   if($id==''){
					redirect(admin_url().'location');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_location')->num_rows==0){
					redirect(admin_url().'location');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_location'); 
					redirect(admin_url().'location');
						
			   
			   }
			   
					
	}


     /***********deactivate location********************/
	
	 public function deactive_location()
	   {
	   	$this->authAdLogin();
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_location',$deactive_cntry); 
		
	   }  
	   
	   /***********activate location********************/
	
	 public function active_location()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_location',$active_cntry);  
		
	   }


/*************************************************end manage Location*****************************************************/	
/*************************************************Site Management*****************************************************/


		   	/**********************all list Slider*******************************/
     public function slidermanagement(){
		 
			$this->authAdLogin();
		
					 if(($this->input->post('Submit', TRUE))&&($this->input->post('Submit')=='Submit')){
					   
					   	 
								$data= $this->admin_model->add_sliderimg();			
								$this->session->set_flashdata('sliderimg_add','Added Successfully');
								redirect(admin_url().'slidermanagement');			

						 
						
					 }else if(empty($this->input->post)){
						 
						 	 $data['all_sliderimg_array']=$this->admin_model->all_sliderimg();
							 $active['leftbar_active']='slidermanagement';
							 $this->load->view('admin/includes/header');
							 $this->load->view('admin/includes/leftbar',$active);
							 $this->load->view('admin/slidermanagement',$data);	 
					 }

	
					 
			
			
		}	  
	/**********************edit  Slider img*******************************/		
     public function editsliderimg($sliderid=''){
		 $this->authAdLogin();
		 
		 if($sliderid==''){
			redirect(admin_url().'slidermanagement');
				}
		else if($this->db->where('id',$sliderid)->get('tbl_sliderimage')->num_rows()==0){
			redirect(admin_url().'slidermanagement');
				}
		else{
			 $data['all_sliderimg_array']=$this->admin_model->all_sliderimg();
			 $data['sliderimg_data']=$this->admin_model->single_sliderimg($sliderid);
				 if(($this->input->post('Submit', TRUE))&&($this->input->post('Submit')=='Update')){
			  $data= $this->admin_model->edit_sliderimg($sliderid);	
			  $this->session->set_flashdata('sliderimg_edit','Edited Successfully');
			  
			  redirect(admin_url().'slidermanagement');	
				 }else{
					 
			  $active['leftbar_active']='slidermanagement';
			  $this->load->view('admin/includes/header');
			  $this->load->view('admin/includes/leftbar',$active);
			  $this->load->view('admin/slidermanagement',$data);	
				 }
		}

		 
	 }	  
  /**************Slider img list****************/
	 public function deletesliderimg($sliderid=''){
			   $this->authAdLogin();
		
			   if($sliderid==''){
					 redirect(admin_url().'slidermanagement');	
			   }
			   elseif($this->db->where('id',$sliderid)->get('tbl_sliderimage')->num_rows==0){
					 redirect(admin_url().'slidermanagement');	
			   }
			   else{
					$this->db->where('id',$sliderid);
					$this->db->delete('tbl_sliderimage'); 
					 redirect(admin_url().'slidermanagement');		
						
			   
			   }
			   
					
	}

   /***********deactivate Slider img********************/
	
	 public function deactive_sliderimg()
	   {
	   	$this->authAdLogin();
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_sliderimage',$deactive_cntry); 
		
	   }  
	   
	   /***********activate Slider img********************/
	
	 public function active_sliderimg()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_sliderimage',$active_cntry);  
		
	   }

      /**********************all socialmedia*******************************/
     public function socialmedia(){
		 
		    $data['all_social_data']=$this->admin_model->all_social_link();
			$this->authAdLogin();
			$active['leftbar_active']='socialmedia';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/socialmedia',$data);
			
			
			}
/**********************edit socialmedia*************************/
     public function editsocialmedia($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'socialmedia');
				}
		else if($this->db->where('id',$id)->get('tbl_socialmedia')->num_rows()==0){
			redirect(admin_url().'socialmedia');
				}
		else{
			$data['media_data']=$this->admin_model->single_socialmedia($id);
			$this->form_validation->set_rules('media_title',"Media Name","trim|required|xss_clean");
			$this->form_validation->set_rules('media_link',"Link","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='socialmedia';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/editsocialmedia',$data);
			}else{
				
			  $data= $this->admin_model->edit_socialmedia($id);	
			  $this->session->set_flashdata('socialmedia_edit','Edited Successfully');
			  redirect(admin_url().'editsocialmedia/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit socialmedia*************************/


     /***********deactivate socialmedia********************/
	
	 public function deactive_media()
	   {
	   	$this->authAdLogin();
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_socialmedia',$deactive_cntry); 
		
	   }  
	   
	   /***********activate socialmedia********************/
	
	 public function active_media()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_socialmedia',$active_cntry);  
		
	   }			
/*******************************************************************************************************************/	


/**********************all faq*******************************/
     public function faq(){
		 
		    
			$this->authAdLogin();
			$data['all_faq_data']=$this->admin_model->all_faq_array();
			$active['leftbar_active']='faqmanagement';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/faqmanagement',$data);
			
			
			}
/**********************add faq*******************************/
	public function addfaq(){
					
			$this->authAdLogin();
			$this->form_validation->set_rules('question',"Question","trim|required|xss_clean");
			$this->form_validation->set_rules('answer',"Answer","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='faqmanagement';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addfaq');
			}else{
						
			$data= $this->admin_model->add_faq();			
			$this->session->set_flashdata('faq_add','Added Successfully');
			redirect(admin_url().'addfaq');			
				
					
					
					
					}
					
				}

/**********************add faq*******************************/

/**********************edit faq*************************/
     public function editfaq($id=''){
		 $this->authAdLogin();
		 if($id==''){
			redirect(admin_url().'faq');
				}
		else if($this->db->where('id',$id)->get('tbl_faq')->num_rows()==0){
			redirect(admin_url().'faq');
				}
		else{
			$data['faq_data']=$this->admin_model->single_faq_array($id);
			$this->form_validation->set_rules('question',"Question","trim|required|xss_clean");
			$this->form_validation->set_rules('answer',"Answer","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='faqmanagement';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addfaq',$data);
			}else{
				
			  $data= $this->admin_model->edit_faq($id);	
			  $this->session->set_flashdata('faq_edit','Edited Successfully');
			  redirect(admin_url().'editfaq/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit faq*************************/

/**************Delete faq****************/
	 public function deletefaq($id=''){
			   $this->authAdLogin();
			   if($id==''){
					redirect(admin_url().'faq');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_faq')->num_rows==0){
					redirect(admin_url().'faq');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_faq'); 
					redirect(admin_url().'faq');
						
			   
			   }
			   
					
	}


     /***********deactivate faq********************/
	
	 public function deactive_faq()
	   {
	   	$this->authAdLogin();
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_faq',$deactive_cntry); 
		
	   }  
	   
	   /***********activate faq********************/
	
	 public function active_faq()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_faq',$active_cntry);  
		
	   }

/*******************************************************************************************************************/	

/**********************all content*******************************/
     public function content(){
		 
		    
			$this->authAdLogin();
			$data['content_data_array']=$this->admin_model->all_content();
			$active['leftbar_active']='content';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/content',$data);
			
			
			}


/**********************edit content*************************/
     public function editcontent($id=''){
		 $this->authAdLogin();
		 if($id==''){
			redirect(admin_url().'content');
				}
		else if($this->db->where('id',$id)->get('tbl_content')->num_rows()==0){
			redirect(admin_url().'content');
				}
		else{
			$data['content_data']=$this->admin_model->single_content_array($id);
			$this->form_validation->set_rules('content_title',"Content Title","trim|required|xss_clean");
			$this->form_validation->set_rules('content_text',"Content","trim|required|xss_clean");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='content';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/editcontent',$data);
			}else{
				
			  $data= $this->admin_model->edit_content($id);	
			  $this->session->set_flashdata('content_edit','Edited Successfully');
			  redirect(admin_url().'editcontent/'.$id);	
			}
		}
		 
		 
	 }
/*************************************************end Site Management*****************************************************/

/*********************************************Manage event*************************************************************/

/**********************all event*******************************/
     public function event(){
		 
		    
			$this->authAdLogin();
			$data['event_data_array']=$this->admin_model->all_event();
			$active['leftbar_active']='manageevent';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/eventlisting',$data);
			
			
			}
/**********************Add category*************************/
	public function addevent(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('event_name',"Event","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='manageevent';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addevent');
			}else{
						
			$data= $this->admin_model->add_event();			
			$this->session->set_flashdata('event_add','Added Successfully');
			redirect(admin_url().'addevent');			
				
					
					
					
					}
					
				}
/**********************Add event*************************/	

/**********************edit event*************************/
     public function editevent($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'event');
				}
		else if($this->db->where('id',$id)->get('tbl_event')->num_rows()==0){
			redirect(admin_url().'event');
				}
		else{
			$data['event_data']=$this->admin_model->single_event($id);
			$this->form_validation->set_rules('event_name',"event","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='manageevent';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addevent',$data);
			}else{
				
			  $data= $this->admin_model->edit_event($id);	
			  $this->session->set_flashdata('event_edit','Edited Successfully');
			  redirect(admin_url().'editevent/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit event*************************/

/**************Delete event****************/
	 public function deleteevent($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'event');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_event')->num_rows==0){
					redirect(admin_url().'event');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_event'); 
					redirect(admin_url().'event');
						
			   
			   }
			   
					
	}


     /***********deactivate event********************/
	
	 public function deactive_event()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_event',$deactive_cntry); 
		
	   }  
	   
	   /***********activate event********************/
	
	 public function active_event()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_event',$active_cntry);  
		
	   }  
	   


/****************************************************end manage event*********************************************************************/
/***************************************************Manage category**********************************************************/
             /**********************all universal category*******************************/
     public function universalcategory(){
		 
		    
			$this->authAdLogin();
			$data['universal_data_array']=$this->admin_model->all_universal_cate();
			$active['leftbar_active']='universalcategory';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/universalcategory',$data);
			
			
			}
/**********************Add universal category*************************/
	public function adduniversalcategory(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('univ_category',"Universal Category","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='universalcategory';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/adduniversalcategory');
			}else{
						
			$data= $this->admin_model->add_univ_category();			
			$this->session->set_flashdata('univcategory_add','Added Successfully');
			redirect(admin_url().'adduniversalcategory');			
				
					
					
					
					}
					
				}
/**********************Add universal category*************************/	

/**********************edit universal category*************************/
     public function edituniversalcategory($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'universalcategory');
				}
		else if($this->db->where('id',$id)->get('tbl_universal_category')->num_rows()==0){
			redirect(admin_url().'universalcategory');
				}
		else{
			$data['univ_category_data']=$this->admin_model->single_univ_category($id);
			$this->form_validation->set_rules('univ_category',"Universal Category","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='universalcategory';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/adduniversalcategory',$data);
			}else{
				
			  $data= $this->admin_model->edit_univ_category($id);	
			  $this->session->set_flashdata('univcategory_edit','Edited Successfully');
			  redirect(admin_url().'edituniversalcategory/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit universal category*************************/

/**************Delete universal category****************/
	 public function deleteuniversalcategory($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'universalcategory');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_universal_category')->num_rows==0){
					redirect(admin_url().'universalcategory');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_universal_category'); 
					redirect(admin_url().'universalcategory');
						
			   
			   }
			   
					
	}


     /***********deactivate universal category********************/
	
	 public function deactive_universalcategory()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_universal_category',$deactive_cntry); 
		
	   }  
	   
	   /***********activate universal category********************/
	
	 public function active_universalcategory()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_universal_category',$active_cntry);  
		
	   }  



/***************************************************manage universal category******************************************************************/
/**********************all category*******************************/
     public function category(){
		 
		    
			$this->authAdLogin();
			$data['category_data_array']=$this->admin_model->all_category();
			$active['leftbar_active']='category';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/categorylisting',$data);
			
			
			}
/**********************Add category*************************/
	public function addcategory(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('category',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='category';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addcategory');
			}else{
						
			$data= $this->admin_model->add_category();			
			$this->session->set_flashdata('category_add','Added Successfully');
			redirect(admin_url().'addcategory');			
				
					
					
					
					}
					
				}
/**********************Add category*************************/	

/**********************edit category*************************/
     public function editcategory($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'category');
				}
		else if($this->db->where('id',$id)->get('tbl_category')->num_rows()==0){
			redirect(admin_url().'category');
				}
		else{
			$data['category_data']=$this->admin_model->single_category($id);
			$this->form_validation->set_rules('category',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='category';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addcategory',$data);
			}else{
				
			  $data= $this->admin_model->edit_category($id);	
			  $this->session->set_flashdata('category_edit','Edited Successfully');
			  redirect(admin_url().'editcategory/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit category*************************/

/**************Delete category****************/
	 public function deletecategory($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'category');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_category')->num_rows==0){
					redirect(admin_url().'category');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_category'); 
					redirect(admin_url().'category');
						
			   
			   }
			   
					
	}


     /***********deactivate category********************/
	
	 public function deactive_category()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_category',$deactive_cntry); 
		
	   }  
	   
	   /***********activate category********************/
	
	 public function active_category()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_category',$active_cntry);  
		
	   }  
	   
	   
/**********************all subcategory*******************************/
     public function subcategory(){
		 
		    
			$this->authAdLogin();
			$data['subcategory_data_array']=$this->admin_model->all_subcategory();
			$active['leftbar_active']='subcategory';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/subcategorylisting',$data);
			
			
			}	
			
			
			
/**********************Add subcategory*************************/
	public function addsubcategory(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('subcategory',"Subcategory","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='subcategory';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addsubcategory');
			}else{
						
			$data= $this->admin_model->add_subcategory();			
			$this->session->set_flashdata('subcategory_add','Added Successfully');
			redirect(admin_url().'addsubcategory');			
				
					
					
					
					}
					
				}
/**********************Add subcategory*************************/	

/**********************edit subcategory*************************/
     public function editsubcategory($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'subcategory');
				}
		else if($this->db->where('id',$id)->get('tbl_subcategory')->num_rows()==0){
			redirect(admin_url().'subcategory');
				}
		else{
			$data['subcategory_data']=$this->admin_model->single_subcategory($id);
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('subcategory',"Subcategory","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='subcategory';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addsubcategory',$data);
			}else{
				
			  $data= $this->admin_model->edit_subcategory($id);	
			  $this->session->set_flashdata('subcategory_edit','Edited Successfully');
			  redirect(admin_url().'editsubcategory/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit subcategory*************************/

/**************Delete subcategory****************/
	 public function deletesubcategory($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'subcategory');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_subcategory')->num_rows==0){
					redirect(admin_url().'subcategory');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_subcategory'); 
					redirect(admin_url().'subcategory');
						
			   
			   }
			   
					
	}


     /***********deactivate subcategory********************/
	
	 public function deactive_subcategory()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_subcategory',$deactive_cntry); 
		
	   }  
	   
	   /***********activate subcategory********************/
	
	 public function active_subcategory()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_subcategory',$active_cntry);  
		
	   }  
	   
/**********************all innercategory*******************************/
     public function innercategory(){
		 
		    
			$this->authAdLogin();
			$data['innercategory_data_array']=$this->admin_model->all_innercategory();
			$active['leftbar_active']='innercategory';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/innercategorylisting',$data);
			
			
			}	
			
/**********************Add innercategory*************************/
	public function addinnercategory(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('subcategory_id',"Subcategory","trim|required|xss_clean");
			$this->form_validation->set_rules('innercategory',"Innercategory","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='innercategory';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addinnercategory');
			}else{
						
			$data= $this->admin_model->add_innercategory();			
			$this->session->set_flashdata('innercategory_add','Added Successfully');
			redirect(admin_url().'addinnercategory');			
				
					
					
					
					}
					
				}
/**********************Add innercategory*************************/	

/**********************edit innercategory*************************/
     public function editinnercategory($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'innercategory');
				}
		else if($this->db->where('id',$id)->get('tbl_innercategory')->num_rows()==0){
			redirect(admin_url().'innercategory');
				}
		else{
			$data['innercategory_data']=$this->admin_model->single_innercategory($id);
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('subcategory_id',"Subcategory","trim|required|xss_clean");
			$this->form_validation->set_rules('innercategory',"Innercategory","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='innercategory';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addinnercategory',$data);
			}else{
				
			  $data= $this->admin_model->edit_innercategory($id);	
			  $this->session->set_flashdata('innercategory_edit','Edited Successfully');
			  redirect(admin_url().'editinnercategory/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit innercategory*************************/

/**************Delete innercategory****************/
	 public function deleteinnercategory($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'innercategory');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_innercategory')->num_rows==0){
					redirect(admin_url().'innercategory');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_innercategory'); 
					redirect(admin_url().'innercategory');
						
			   
			   }
			   
					
	}


     /***********deactivate subcategory********************/
	
	 public function deactive_innercategory()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_innercategory',$deactive_cntry); 
		
	   }  
	   
	   /***********activate subcategory********************/
	
	 public function active_innercategory()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_innercategory',$active_cntry);  
		
	   }  				   			   
/*****************************end  Managecategory************************************************/



			
/**********************all agent*******************************/
     public function manageagent(){
		 
		    
			$this->authAdLogin();
			$data['agent_data_array']=$this->admin_model->all_agent();
			$active['leftbar_active']='manageagent';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/agentlisting',$data);
			
			
			}
			
	     
		 
		 /**********************Add agent*************************/
	public function addagent(){
			 $this->authAdLogin();		
			
            $this->form_validation->set_rules('reg_email',"Email Id","trim|required|xss_clean");
			
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='manageagent';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addagent');
			}else{
						
			$data= $this->admin_model->add_agent();			
			$this->session->set_flashdata('agent_add','Added Successfully');
			redirect(admin_url().'addagent');			
				
					
					
					
					}
					
				}
/**********************Add agent*************************/

/**********************edit agent*************************/
     public function editagent($id=''){
		 $this->authAdLogin();
		 if($id==''){
			redirect(admin_url().'manageagent');
				}
		else if($this->db->where('id',$id)->get('tbl_location')->num_rows()==0){
			redirect(admin_url().'manageagent');
				}
		else{
			$data['location_data']=$this->admin_model->single_location($id);
			$this->form_validation->set_rules('country_id',"Country","trim|required|xss_clean");
			$this->form_validation->set_rules('state_id',"State","trim|required|xss_clean");

			if($this->form_validation->run()==false){
			$active['leftbar_active']='location';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addagent',$data);
			}else{
				
			  $data= $this->admin_model->edit_location($id);	
			  $this->session->set_flashdata('location_edit','Edited Successfully');
			  redirect(admin_url().'editlocation/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit agent*************************/

	/***********deactivate agent********************/
	 public function deactive_agent()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_agent',$deactive_cntry); 
		
	   }  
	   
	   /***********activate agent********************/
	
	 public function active_agent()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_agent',$active_cntry);  
		
	   }  		
/*****************************end  ************************************************/	
/*****************************  Managefinal  listing************************************************/
     public function managelisting(){
		 
		    
			$this->authAdLogin();
			//$data['agent_listing_array']=$this->admin_model->all_list();
			$data['agent_listing_array']=$this->admin_model->all_final_list();
			$active['leftbar_active']='managelisting';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/managelisting',$data);
			
			
			}
	/*****************************all listing by agent************************************************/		
     public function viewlist($listuserid=''){
		$this->authAdLogin();
		
		 
			
			$data['listing_array']=$this->admin_model->all_agent_list($listuserid);
			$active['leftbar_active']='managelisting';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/manageagentlisting',$data);
		  
			
		}
		
	
	  /**************Delete listing****************/
	 public function deletelist(){
		    $agent_id=$this->uri->segment(3);
			$list_id=$this->uri->segment(4);
			   $this->authAdLogin();
			   
			   if($list_id==''){
					redirect(admin_url().'viewlist/'.$agent_id);		
			   }
			   elseif($this->db->where('id',$list_id)->get('tbl_listing')->num_rows==0){
					redirect(admin_url().'viewlist/'.$agent_id);
			   }
			   else{
					$this->db->where('id',$list_id);
					$this->db->delete('tbl_listing'); 
					redirect(admin_url().'viewlist/'.$agent_id);
			   
			   }
			   
	}


     /***********deactivate listing********************/
	
	 public function deactive_list()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_listing',$deactive_cntry); 
		
	   }  
	   
	   /***********activate listing********************/
	
	 public function active_list()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_listing',$active_cntry);  
		
	   }	
	   /**********************add listing*************************/
	    public function addlist(){
			$this->authAdLogin();
			$this->form_validation->set_rules('person_name',"Name of Owner","trim|required|xss_clean");
			$this->form_validation->set_rules('shop_email',"Email Id","trim|required|xss_clean");
			$this->form_validation->set_rules('mobile_no',"Mobile Number","trim|required|xss_clean");
			
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='managelisting';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addfinaldata');
			}else{
						
			$data= $this->admin_model->add_final_list(); 
						
			$this->session->set_flashdata('list_add','Added Successfully');
			redirect(admin_url().'addlist');			
			}
			
		}
	   /**********************add listing*************************/
	   
	
	   
	   /**********************edit listing*************************/
     public function editlist(){
		$agent_id=$this->uri->segment(4);
		$list_id=$this->uri->segment(3);
		$this->authAdLogin();
		 
	   if($list_id==''){
			redirect(admin_url().'viewlist/'.$agent_id);		
	   }
	   elseif($this->db->where('id',$list_id)->get('tbl_listing')->num_rows==0){
			redirect(admin_url().'viewlist/'.$agent_id);
	   }
		else{
			$data['list_data']=$this->admin_model->single_list($list_id);
			$this->form_validation->set_rules('person_name',"Name of Owner","trim|required|xss_clean");
			$this->form_validation->set_rules('mobile_no',"Mobile Number","trim|required|xss_clean");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='managelisting';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/editfinallist',$data);
			}else{
					
			  $data= $this->admin_model->edit_listing($list_id);	
			  $this->session->set_flashdata('list_edit','Edited Successfully');
			  redirect(admin_url().'editlist/'.$list_id."/".$agent_id);	
			}
		}
		 
		 
	 }
	 
	 
		   	/**********************all list Gallery*******************************/
     public function listgallery(){
		 
			$this->authAdLogin();
			$list_id=$this->uri->segment(3);
			$agent_id=$this->uri->segment(4);
			if($list_id==''){
			redirect(admin_url().'viewlist/'.@$agent_id);
				}
		    else if($this->db->where('id',$list_id)->get('tbl_listing')->num_rows()==0){
			redirect(admin_url().'viewlist/'.@$agent_id);
				}
				else{
					 if(($this->input->post('Submit', TRUE))&&($this->input->post('Submit')=='Submit')){
					   
					   	 
								$data= $this->admin_model->add_listgallery($list_id);			
								$this->session->set_flashdata('listgallery_add','Added Successfully');
								redirect(admin_url().'listgallery/'.$list_id.'/'.$agent_id);			

						 
						
					 }else if(empty($this->input->post)){
						
						 	 //$data['all_propgallery_array']=$this->admin_model->all_propgallery();
							 $active['leftbar_active']='managelisting';
							 $this->load->view('admin/includes/header');
							 $this->load->view('admin/includes/leftbar',$active);
							 $this->load->view('admin/listgallery');	 
					 }

	
					 
			}
			
		}	  
	/**********************edit property Gallery*******************************/		
     public function editgallery(){
		 $galleryid=$this->uri->segment(4);
		 $list_id=$this->uri->segment(3);
		 $agent_id=$this->uri->segment(5);
		 $this->authAdLogin();
		 
		 if($galleryid==''){
			redirect(admin_url().'listgallery/'.$list_id.'/'.$agent_id);
				}
		else if($this->db->where('Gallery_Id',$galleryid)->get('tbl_list_gallery')->num_rows()==0){
			redirect(admin_url().'listgallery/'.$list_id.'/'.$agent_id);
				}
		else{
			 $data['listgallery_data']=$this->admin_model->single_listgallery($galleryid);
				 if(($this->input->post('Submit', TRUE))&&($this->input->post('Submit')=='Update')){
			  $data= $this->admin_model->edit_listgallery($galleryid);	
			  $this->session->set_flashdata('list_edit','Edited Successfully');
			  
			  redirect(admin_url().'listgallery/'.$list_id.'/'.$agent_id);	
				 }else{
			  $active['leftbar_active']='managelisting';
			  $this->load->view('admin/includes/header');
			  $this->load->view('admin/includes/leftbar',$active);
			  $this->load->view('admin/listgallery',$data);	
				 }
		}

		 
	 }	  
  /**************Delete list****************/
	 public function deletegallery(){
			   $this->authAdLogin();
		 $galleryid=$this->uri->segment(4);
		 $list_id=$this->uri->segment(3);
		 $agent_id=$this->uri->segment(5);
			   if($galleryid==''){
					redirect(admin_url().'viewlist/'.@$agent_id);		
			   }
			   elseif($this->db->where('Gallery_Id',$galleryid)->get('tbl_list_gallery')->num_rows==0){
					redirect(admin_url().'listgallery/'.$list_id.'/'.@$agent_id);	
			   }
			   else{
					$this->db->where('Gallery_Id',$galleryid);
					$this->db->delete('tbl_list_gallery'); 
					redirect(admin_url().'listgallery/'.$list_id.'/'.@$agent_id);	
						
			   
			   }
			   
					
	}


     /***********deactivate list********************/
	
	 public function deactive_gallery()
	   {
	   	$this->authAdLogin();
		   
		$galleryid=$this->input->post('id');
		$deactive_cntry=array('gallery_status'=>0);
		$this->db->where('Gallery_Id',$galleryid);
	    $this->db->update('tbl_list_gallery',$deactive_cntry); 
		
	   }  
	   
	   /***********activate list********************/
	
	 public function active_gallery()
	   {
	    $this->authAdLogin();
		$galleryid=$this->input->post('id');
		$active_cntry=array('gallery_status'=>1);
		$this->db->where('Gallery_Id',$galleryid);
	    $this->db->update('tbl_list_gallery',$active_cntry);  
		
	   }
	 
	 /*****************************  Managefinal  listing************************************************/
	/**********************manage raw listing*************************/ 
	
	     public function managerawlisting(){
		 
		    
			$this->authAdLogin();
			$data['agent_raw_listing_array']=$this->admin_model->all_raw_list();
			//$data['agent_data_array']=$this->admin_model->all_agent();
			$active['leftbar_active']='rawlisting';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/managerawlisting',$data);
			
			
			}

	/**********************manage raw listing*************************/ 	
     public function viewrawlist($listuserid=''){
		$this->authAdLogin();
		
		if($listuserid==''){
			redirect(admin_url().'managerawlisting');
				}
		
		 else{   
			
			$data['raw_data_array']=$this->admin_model->all_raw_data_list($listuserid);
			$active['leftbar_active']='rawlisting';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/viewrawlist',$data);
		   }
			
		} 
		
		  /**************Delete listing****************/
	 public function deleterawlist(){
		    $agent_id=$this->uri->segment(3);
			$list_id=$this->uri->segment(4);
			   $this->authAdLogin();
			   
			   if($list_id==''){
					redirect(admin_url().'viewrawlist/'.$agent_id);		
			   }
			   elseif($this->db->where('id',$list_id)->get('tbl_extra_listing')->num_rows==0){
					redirect(admin_url().'viewrawlist/'.$agent_id);
			   }
			   else{
					$this->db->where('id',$list_id);
					$this->db->delete('tbl_extra_listing'); 
					redirect(admin_url().'viewrawlist/'.$agent_id);
			   
			   }
			   
	}		
/**********************edit raw listing*************************/

     public function editrawlist(){
		 $agent_id=$this->uri->segment(3);
		 $list_id=$this->uri->segment(4);
		$this->authAdLogin();
		 
	   if($list_id==''){
			redirect(admin_url().'viewrawlist/'.$agent_id);		
	   }
	   elseif($this->db->where('id',$list_id)->get('tbl_extra_listing')->num_rows==0){
			redirect(admin_url().'viewrawlist/'.$agent_id);
	   }
		else{
			$data['list_raw_data']=$this->admin_model->single_raw_list($list_id);
			$this->form_validation->set_rules('person_name',"Name of Owner","trim|required|xss_clean");
			
			$this->form_validation->set_rules('category_name',"Category Name","trim|required|xss_clean|callback_exists_category");
			if(@$this->input->post('category_name')!=''){
			$cae_arr=$this->admin_model->single_category_name($this->input->post('category_name'));
			
			
			if(@$this->input->post('subcategory_id')!=''){
			$this->form_validation->set_rules('subcategory_id',"Subcategory Name","trim|xss_clean|callback_exists_subcategory[".@$cae_arr[0]['id']."]");
			$subc_arr=$this->db->where('category_id',$cae_arr[0]['id'])->where('subcategory',$this->input->post('subcategory_id'))->get('tbl_subcategory')->result_array();
			if(@$this->input->post('innercategory_id')!=''){
			$this->form_validation->set_rules('innercategory_id',"Innercategory Name","trim|xss_clean|callback_exists_innercategory[".@$subc_arr[0]['id']."]");}
			}
			}
			$this->form_validation->set_rules('city_id',"City","trim|required|xss_clean|callback_exists_city");
			if(@$this->input->post('city_id')!=''){
				$city_arr=$this->db->where('city_name',$this->input->post('city_id'))->get('tbl_city')->result_array();
				$this->form_validation->set_rules('location_id',"Location","trim|required|xss_clean|callback_exists_location[".@$city_arr[0]['id']."]");
			}
			
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='managelisting';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/editrawlist',$data);
			}else{
					
			  $data= $this->admin_model->edit_raw_listing($list_id);	
			  $this->session->set_flashdata('list_edit','Edited Successfully');
			  redirect(admin_url().'editrawlist/'.$agent_id."/".$list_id);	
			}
		}
		 
		 
	 }
/*****************************end  Managelisting************************************************/	
	 /********************************* exiting category****************************************/
 
         public function exists_category($category_name){
			 
			 $total_row=$this->db->where('category',$category_name)->get('tbl_category')->num_rows;
				if($total_row < 1){
				$this->form_validation->set_message('exists_category', 'Category Name currently not available in our system.');
                     return false;
					  
				}else{
					 return true;
				}
           }
		   
		   
	 /********************************* exiting subcategory****************************************/
 
         public function exists_subcategory($subcategory_id,$sno){
			 
			 $total_row=$this->db->where('category_id',$sno)->where('subcategory',strtoupper($subcategory_id))->get('tbl_subcategory')->num_rows();
				if($total_row < 1){
				$this->form_validation->set_message('exists_subcategory', 'Subcategory Name currently not available in our system.');
                     return false;
					  
				}else{
					 return true;
				}
           }	
		   
		  	 /********************************* exiting Innercategory****************************************/
 
         public function exists_innercategory($innercategory_id,$sno){
			 
			 $total_row=$this->db->where('status',1)->where('subcategory_id',$sno)->like('innercategory',strtoupper($innercategory_id))->get('tbl_innercategory')->num_rows();
			 
				if($total_row < 1){
				$this->form_validation->set_message('exists_innercategory', 'Innercategory Name currently not available in our system.');
                     return false;
					  
				}else{
					 return true;
				}
           } 
		  /***********************************************************************************/ 
		  public function exists_city($city_id){
			  
			  $total_row=$this->db->where('status',1)->like('city_name',strtoupper($city_id))->get('tbl_city')->num_rows();
			  if($total_row < 1){
				$this->form_validation->set_message('exists_city', 'City Name currently not available in our system.');
                     return false;
					  
				}else{
					 return true;
				}
			  
		  }
			  /***********************************************************************************/ 
		  public function exists_location($location_id,$sno){
			  
			  $total_row=$this->db->where('status',1)->where('city_id',$sno)->like('location',strtoupper($location_id))->get('tbl_location')->num_rows();
			  if($total_row < 1){
				$this->form_validation->set_message('exists_location', 'Location Name currently not available in our system.');
                     return false;
					  
				}else{
					 return true;
				}
			  
		  }	
		  
		  
		   /*****************************************end rawlisting******************************************/ 
		  
		  /*************************************report**********************************************/ 
		  public function agentdailyreport(){
			 $data['agent_daily_report']=$this->admin_model->agent_daily_report(); 
			 $active['leftbar_active']='agentdailyreport';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/agentdailyreport',$data);
			  
		  }
		  
		  
		  public function agentreports(){
			  
			$data['agent_daily_report']=$this->admin_model->agent_date_report(); 
			$active['leftbar_active']='agentdailyreport';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/agentdailyreport',$data);
			  
		  }
  
       	 public function rawlistreport(){
			  
			$data['agent_daily_report']=$this->admin_model->agent_raw_date_report(); 
			$active['leftbar_active']='agentrawlistreport';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/rawlistreport',$data);
			  
		  }
  /**********************all customer*******************************/
     public function managecustomer(){
		 
		    
			$this->authAdLogin();
			$data['customer_data_array']=$this->admin_model->all_customer();
			$active['leftbar_active']='managecustomer';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/managecustomer',$data);
			
			
			}
  	/***********deactivate customer********************/
	 public function deactive_customer()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_customer',$deactive_cntry); 
		
	   }  
	   
	   /***********activate customer********************/
	
	 public function active_customer()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_customer',$active_cntry);  
		
	   }  		
/*****************************end  ************************************************/	

  /**********************all advertiserequest*******************************/
     public function advertiserequest(){
		 
		    
			$this->authAdLogin();
			$data['advertise_data_array']=$this->admin_model->all_advertiserequest();
			$active['leftbar_active']='advertiserequest';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/advertiserequest',$data);
			
			
			}
				/**********************Add address*******BY Shashikant******************/
	public function addressmanagement(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('address',"Address","trim|required|xss_clean");
			$this->form_validation->set_rules('emailid',"Emailid","trim|required|xss_clean");
			$this->form_validation->set_rules('contactno',"Contactno","trim|required|xss_clean");
			$this->form_validation->set_rules('tollfreeno',"Tollfreeno","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='addressmanagement';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addressmanagement');
			}else{
						
			$data= $this->admin_model->add_addressmanagement();			
			$this->session->set_flashdata('addressmanagement_add','Added Successfully');
			redirect(admin_url().'addressmanagement');			
				
					
					
					
					}
					
				}
/**********************edit address*************************/	
    public function editaddress($id=''){
		  $this->authAdLogin();
		 if($this->db->where('id',$id)->get('tbl_sitemanagement')->num_rows()==0){
			redirect(admin_url().'editaddress/1');
				}
		else{
			$data['address_data']=$this->admin_model->single_addressmanagement($id);
			$this->form_validation->set_rules('address',"Address","trim|required|xss_clean");

			if($this->form_validation->run()==false){
			$active['leftbar_active']='addressmanagement';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addressmanagement',$data);
			}else{
				
			  $data= $this->admin_model->edit_addressmanagement($id);	
			  $this->session->set_flashdata('addressmanagement_edit','Edited Successfully');
			  redirect(admin_url().'editaddress/'.$id);	
			}
		}	 
	 }
	 
	 /*******************************************************************************************************************/	

/**********************all Advertisement********BY Shashikant******************/
     public function advertisement(){
		 
		    
			$this->authAdLogin();
			$data['advertisement_data_array']=$this->admin_model->all_advertisement();
			$active['leftbar_active']='advertisement';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/advertisement',$data);
			
			
			}

		
			
			
/**********************end all advertisement*************************/


/**********************edit advertisement*************************/

/*************************************************end advertisement Management*****************************************************/


     public function editadvertisement($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'advertisement');
				}
		else if($this->db->where('id',$id)->get('tbl_advertisement')->num_rows()==0){
			redirect(admin_url().'advertisement');
				}
		else{
			$data['advertisement_data']=$this->admin_model->single_advertisement_array($id);
			$this->form_validation->set_rules('name'," Name ","trim|required|xss_clean");
			$this->form_validation->set_rules('position'," Position ","trim|required|xss_clean");
					
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='advertisement';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/editadvertisement',$data);
			}else{
				
			  $data= $this->admin_model->edit_advertisement($id);	
			  $this->session->set_flashdata('advertisement_edit','Edited Successfully');
			  redirect(admin_url().'editadvertisement/'.$id);	
			}
		}		 
		 
	 }
	
				/**********************all popular category*****added by ashashikant**************************/
     public function popularcategorylisting(){
		 
		    
			$this->authAdLogin();
			$data['popularcategory_data_array']=$this->admin_model->all_popularcategory();
			$data['count_status']=$this->admin_model->count_status();
			$active['leftbar_active']='popularcategorylisting';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/popularcategorylisting',$data);
			
			
			}
			
			
			
			
			
			
			/**********************Add subcategory*************************/
	public function addpopularcategory(){
			 $this->authAdLogin();		
			
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('order_by',"Orderby","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			
			if($this->form_validation->run()==false){
			$active['leftbar_active']='popularcategorylisting';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addpopularcategory');
			}else{
						
			$data= $this->admin_model->add_popularcategory();			
			$this->session->set_flashdata('addpopularcategory_add','Added Successfully');
			redirect(admin_url().'addpopularcategory');			
				
					
					
					
					}
					
				}
/**********************Add subcategory*************************/
			
/**********************edit popularcategory*************************/
     public function editpopularcategorylisting($id=''){
		  $this->authAdLogin();
		 
		 if($id==''){
			redirect(admin_url().'popularcategorylisting');
				}
		else if($this->db->where('id',$id)->get('tbl_popular_category')->num_rows()==0){
			redirect(admin_url().'popularcategorylisting');
				}
		else{
			$data['popularcategory_data']=$this->admin_model->single_popularcategory_data($id);
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('order_by',"Order","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			if($this->form_validation->run()==false){
			$active['leftbar_active']='popularcategorylisting';
		 	$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
            $this->load->view('admin/addpopularcategory',$data);
			}else{
				
			  $data= $this->admin_model->edit_popularsubcategory($id);	
			  $this->session->set_flashdata('popularcategorylisting_edit','Edited Successfully');
			  redirect(admin_url().'editpopularcategorylisting/'.$id);	
			}
		}
		 
		 
	 }
/**********************edit subcategory*************************/

/**************Delete subcategory****************/
	 public function deletepopularcategory($id=''){
			   $this->authAdLogin();
			   
			   if($id==''){
					redirect(admin_url().'popularcategorylisting');		
			   }
			   elseif($this->db->where('id',$id)->get('tbl_popular_category')->num_rows==0){
					redirect(admin_url().'popularcategorylisting');
			   }
			   else{
					$this->db->where('id',$id);
					$this->db->delete('tbl_popular_category'); 
					redirect(admin_url().'popularcategorylisting');
						
			   
			   }
			   
					
	}


     /***********deactivate subcategory********************/
	
	 public function deactive_popularcategory()
	   {
	   	$this->authAdLogin();
		   
		$id=$this->input->post('id');
		$deactive_cntry=array('status'=>0);
		$this->db->where('id',$id);
	    $this->db->update('tbl_popular_category',$deactive_cntry); 
		
	   }  
	   
	   /***********activate subcategory********************/
	
	 public function active_popularcategory()
	   {
	    $this->authAdLogin();
		$id=$this->input->post('id');
		$active_cntry=array('status'=>1);
		$this->db->where('id',$id);
	    $this->db->update('tbl_popular_category',$active_cntry);  
		
	   }  
	   


}
<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	
	class Admin extends CI_Controller {
		
		
		/********Constructor*******************/
		
		public function __construct(){
			parent::__construct();
		}
		
		
		
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
					redirect(admin_url().'category');
					}else{
					$this->session->set_flashdata('login_error','Invalid Login Credentials');
					redirect(admin_url());
				}
				
			}
		}
		
		
		
		private function authAdLogin(){ 
			if($this->session->userdata('adminlogin_data')==FALSE){
				redirect(admin_url());
				exit();
			}
		}	
		
		
		
		
		
		public function category(){
			$this->authAdLogin();
			$data['category_data_array']=$this->admin_model->all_category();
			$active['leftbar_active']='category';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/categorylisting',$data);
		}
		
		
		
		
		public function addcategory(){
			$this->authAdLogin();		
			
			$this->form_validation->set_rules('category',"English Category","trim|required|xss_clean");
			$this->form_validation->set_rules('fr_category',"Franch Category","trim|required|xss_clean");
			$this->form_validation->set_rules('dut_category',"Dutch Category","trim|required|xss_clean");
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
		
		
		public function subcategory(){
			$this->authAdLogin();
			$data['subcategory_data_array']=$this->admin_model->all_subcategory();
			$active['leftbar_active']='subcategory';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/subcategorylisting',$data);
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
		
		
		public function addsubcategory(){
			$this->authAdLogin();		
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('subcategory',"Subcategory","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			$this->form_validation->set_rules('fr_subcategory',"Franch subcategory","trim|required|xss_clean");
			$this->form_validation->set_rules('dut_subcategory',"Dutch subcategory","trim|required|xss_clean");
			
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
		
		public function editsubcategory($id=''){
			$this->authAdLogin();
			
			if($id==''){
				redirect(admin_url().'subcategory');
				}else if($this->db->where('id',$id)->get('tbl_subcategory')->num_rows()==0){
				redirect(admin_url().'subcategory');
				}else{
				$data['subcategory_data']=$this->admin_model->single_subcategory($id);
				$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
				$this->form_validation->set_rules('subcategory',"Subcategory","trim|required|xss_clean");
				$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
				$this->form_validation->set_rules('fr_subcategory',"Franch subcategory","trim|required|xss_clean");
			    $this->form_validation->set_rules('dut_subcategory',"Dutch subcategory","trim|required|xss_clean");
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
		
		
		public function active_category(){
			$this->authAdLogin();
			$id=$this->input->post('id');
			$active_cntry=array('status'=>1);
			$this->db->where('id',$id);
			$this->db->update('tbl_category',$active_cntry);  
		}  
		
		
		
		public function editcategory($id=''){
			$this->authAdLogin();
			
			if($id==''){
				redirect(admin_url().'category');
				}else if($this->db->where('id',$id)->get('tbl_category')->num_rows()==0){
				redirect(admin_url().'category');
				}else{
				$data['category_data']=$this->admin_model->single_category($id);
				$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
				$this->form_validation->set_rules('category',"category","trim|xss_clean|required");
				$this->form_validation->set_rules('fr_category',"Franch Category","trim|xss_clean|required");
				$this->form_validation->set_rules('dut_category',"Dutch Category","trim|xss_clean|required");
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
		
		public function deactive_category(){
			$this->authAdLogin();
			$id=$this->input->post('id');
			$deactive_cntry=array('status'=>0);
			$this->db->where('id',$id);
			$this->db->update('tbl_category',$deactive_cntry); 
		}
		
		public function deletecategory($id=''){
			$this->authAdLogin();
			if($id==''){
				redirect(admin_url().'category');		
				}elseif($this->db->where('id',$id)->get('tbl_category')->num_rows==0){
				redirect(admin_url().'category');
				}else{
				$this->db->where('id',$id);
				$this->db->delete('tbl_category'); 
				redirect(admin_url().'category');
			}
		}
		
		
		public function deletesubcategory($id=''){
			$this->authAdLogin();
			if($id==''){
				redirect(admin_url().'subcategory');		
				}elseif($this->db->where('id',$id)->get('tbl_subcategory')->num_rows==0){
				redirect(admin_url().'subcategory');
				}else{
				$this->db->where('id',$id);
				$this->db->delete('tbl_subcategory'); 
				redirect(admin_url().'subcategory');
			}
		}
		
		
		public function innercategory(){
			$this->authAdLogin();
			$data['innercategory_data_array']=$this->admin_model->all_innercategory();
			$active['leftbar_active']='innercategory';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/innercategorylisting',$data);
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
		
		/**************Delete innercategory****************/
		public function deleteinnercategory($id=''){
			$this->authAdLogin();
			if($id==''){
				redirect(admin_url().'innercategory');		
				}elseif($this->db->where('id',$id)->get('tbl_innercategory')->num_rows==0){
				redirect(admin_url().'innercategory');
				}else{
				$this->db->where('id',$id);
				$this->db->delete('tbl_innercategory'); 
				redirect(admin_url().'innercategory');
			}
		}
		public function editinnercategory($id=''){
			$this->authAdLogin();
			if($id==''){
				redirect(admin_url().'innercategory');
				}else if($this->db->where('id',$id)->get('tbl_innercategory')->num_rows()==0){
				redirect(admin_url().'innercategory');
				}else{
				$data['innercategory_data']=$this->admin_model->single_innercategory($id);
				$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
				$this->form_validation->set_rules('subcategory_id',"Subcategory","trim|required|xss_clean");
				$this->form_validation->set_rules('innercategory',"Innercategory","trim|required|xss_clean");
				$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
				$this->form_validation->set_rules('fr_innercategory',"Franch innercategory","trim|xss_clean|required");
				$this->form_validation->set_rules('dut_innercategory',"Dutch innercategory","trim|xss_clean|required");
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
		
		
		
		/**********************Add innercategory*************************/
		public function addinnercategory(){
			$this->authAdLogin();		
			
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('subcategory_id',"Subcategory","trim|required|xss_clean");
			$this->form_validation->set_rules('innercategory',"Innercategory","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			$this->form_validation->set_rules('fr_innercategory',"Franch innercategory","trim|xss_clean|required");
			$this->form_validation->set_rules('dut_innercategory',"Dutch innercategory","trim|xss_clean|required");
			
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
		
		
		
		public function logout(){
			$this->session->unset_userdata('adminlogin_data');
			$this->session->sess_destroy();
			redirect(admin_url());
		}	
		
		
		
		public function products(){
			$this->authAdLogin();
			$data['products_data']=$this->admin_model->all_products();
			$data['category']=$this->admin_model->all_category_name();
			$data['sub_category']=$this->admin_model->all_subcategory_name();
			$data['inner_category']=$this->admin_model->all_innrcategory_name();
			$active['leftbar_active']='products';
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/leftbar',$active);
			$this->load->view('admin/productlisting',$data);
		}
		
		
		/***********deactivate products********************/
		
		public function deactive_product()
		{
			$this->authAdLogin();
			$id=$this->input->post('id');
			$deactive_cntry=array('status'=>0);
			$this->db->where('id',$id);
			$this->db->update('tbl_products',$deactive_cntry); 
			
		}  
		
		/***********activate products********************/
		
		public function active_product()
		{
			$this->authAdLogin();
			$id=$this->input->post('id');
			$active_cntry=array('status'=>1);
			$this->db->where('id',$id);
			$this->db->update('tbl_products',$active_cntry);  
			
		} 
		public function deleteproduct($id=''){
			$this->authAdLogin();
			if($id==''){
				redirect(admin_url().'products');		
				}elseif($this->db->where('id',$id)->get('tbl_products')->num_rows==0){
				redirect(admin_url().'products');
				}else{
				$this->db->where('id',$id);
				$this->db->delete('tbl_products'); 
				redirect(admin_url().'products');
			}
		}
		
		public function addproduct(){
			$this->authAdLogin();		
			
			$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
			$this->form_validation->set_rules('subcategory_id',"Sub category","trim|required|xss_clean");
			$this->form_validation->set_rules('product_name',"Product Name","trim|required|xss_clean");
			// $this->form_validation->set_rules('product_data',"Product Data","trim|required|xss_clean");
			// $this->form_validation->set_rules('product_desc',"Product Description","trim|required|xss_clean");
			$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
			$this->form_validation->set_rules('fr_product_name',"Franch Product Name","trim|required|xss_clean");
			$this->form_validation->set_rules('dut_product_name',"Dutch Product Name","trim|required|xss_clean");
			
			
			if($this->form_validation->run()==false){
				$active['leftbar_active']='products';
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/leftbar',$active);
				$this->load->view('admin/addproduct');
				}else{
				$pdf_name = $this->update_pdf();
				$data= $this->admin_model->add_product($pdf_name);			
				$this->session->set_flashdata('product_add','Added Successfully');
				redirect(admin_url().'addproduct');			
			}
		}
		function update_pdf(){
			$allowExt =  array('pdf');
			if($_FILES['pdf']['name'] != ''){
				$upload_path = '/uploads/product/';
				$sourcePath = $_FILES['pdf']['tmp_name'];
				$directory = FCPATH . $upload_path;
				$image_name = $_FILES['pdf']['name'];
				$temp = explode(".", $image_name);
				$extension = end($temp);
				
				if(in_array($extension,$allowExt) ) {
					/*	$this->session->set_flashdata('error', '<div class="alert alert-danger display-hide" style="display: block;"><button class="close" data-close="alert"></button><span>Please upload valid format files!</span></div> ');
					redirect($this->agent->referrer());*/ 
					return 'error';
				}
				
				$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
				$b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
				$image_names = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), str_replace($a, $b, $temp[0])));
				$filename = $image_names . time();
				$targetPath = $directory . $filename . '.' . $extension;
				$dir = str_replace("___", "/", $directory);
				if (!file_exists($dir)) {
					mkdir($dir, 0777, true);
				}
				$targetPath = $directory .''. $filename . '.' . $extension;
				if (move_uploaded_file($sourcePath, $targetPath)) {
					return $image_name = $filename . '.' . $extension;
					} else {
					return false;
				}
				}else{
				return $image_name = $this->input->post('old_pdf');	
			}
		}
		public function editproduct($id=''){
			$this->authAdLogin();
			// debug('test',1);
			if($id==''){
				redirect(admin_url().'products');
				}else if($this->db->where('id',$id)->get('tbl_products')->num_rows()==0){
				redirect(admin_url().'products');
				}else{
				$data['product_data']=$this->admin_model->single_product($id);
				
				
				// debug($data['product_data']);exit;
				$Cat = $data['product_data'][0]['category_id'];
				$SubCat = $data['product_data'][0]['subcategory_id'];
				
				$data['all_Sub']=$this->admin_model->all_sub_by_cate($Cat);
				$data['all_inner']=$this->admin_model->all_innr_by_sub($SubCat);
				// debug($data);exit;
				
				$this->form_validation->set_rules('category_id',"Category","trim|required|xss_clean");
				$this->form_validation->set_rules('subcategory_id',"Sub category","trim|required|xss_clean");
				$this->form_validation->set_rules('product_name',"Product Name","trim|required|xss_clean");
				// $this->form_validation->set_rules('product_data',"Product Data","trim|required|xss_clean");
				// $this->form_validation->set_rules('product_desc',"Product Description","trim|required|xss_clean");
				$this->form_validation->set_rules('status',"Status","trim|xss_clean|required");
				$this->form_validation->set_rules('fr_product_name',"Franch Product Name","trim|required|xss_clean");
				$this->form_validation->set_rules('dut_product_name',"Dutch Product Name","trim|required|xss_clean");
				
				if($this->form_validation->run()==false){
					$active['leftbar_active']='products';
					$this->load->view('admin/includes/header');
					$this->load->view('admin/includes/leftbar',$active);
					$this->load->view('admin/addproduct',$data);
					}else{
					$pdf_name = $this->update_pdf();
					$data= $this->admin_model->edit_product($id,$pdf_name);	
					$this->session->set_flashdata('product_edit','Edited Successfully');
					redirect(admin_url().'editproduct/'.$id);	
				}
			}
			}
			
			public function viewproduct($id=''){
				$this->authAdLogin();
				if($id==''){
					redirect(admin_url().'products');
					}else if($this->db->where('id',$id)->get('tbl_products')->num_rows()==0){
					redirect(admin_url().'products');
					}else{
					$data['product_data']=$this->admin_model->single_product($id);
					$active['leftbar_active']='';
					$this->load->view('admin/includes/header');
					$this->load->view('admin/includes/leftbar',$active);
					$this->load->view('admin/productview',$data);
				}
			}
			public function search(){
				$this->authAdLogin();
				$active['leftbar_active']='search';
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/leftbar',$active);
				$this->load->view('admin/search');
			}
			
			public function uploads(){
				$this->authAdLogin();
				$allowExt =  array('jpg','png','gif');

				$data['image_name'] = "";
				$data['error'] = "";
				if($_FILES){
					$upload_path = '/filtermat_assets/assets/images/';
					$upload_path1 = 'filtermat_assets/assets/images/';
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
				$active['leftbar_active']='uploads';
				$this->load->view('admin/includes/header');
				$this->load->view('admin/includes/leftbar',$active);
				$this->load->view('admin/upload_image',$data);


			}
			
			public function upload_image(){
				
				$this->uploads();
			}

		}				
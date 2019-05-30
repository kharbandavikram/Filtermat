<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Welcome extends CI_Controller {
		
		/**
			* Index Page for this controller.
			*
			* Maps to the following URL
			* 		http://example.com/index.php/welcome
			*	- or -
			* 		http://example.com/index.php/welcome/index
			*	- or -
			* Since this controller is set as the default controller in
			* config/routes.php, it's displayed at http://example.com/
			*
			* So any other public methods not prefixed with an underscore will
			* map to /index.php/welcome/<method_name>
			* @see https://codeigniter.com/user_guide/general/urls.html
		*/
		public function index()
		{	
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			
			if(!empty($lang['lang'])){
				$lang =array('lang'=> $lang['lang']);
				}else{
				$lang =array('lang'=> 'en');
				$this->session->set_userdata('lang',$lang);
			}
			
			
			$this->load->model('admin_model');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['about']=$this->admin_model->get_home_data($lang['lang']);
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/index');
		}
		
		public function languageswitcher($langswitch)
		{	
			$this->load->library('session'); 
			$lang =array('lang'=> $langswitch);
			$this->session->set_userdata('lang',$lang);
			$redirecturl = $_SERVER['HTTP_REFERER'];
			redirect($redirecturl);
			//$this->load->model('admin_model');
			//$data['menu']=$this->admin_model->get_navigation_menu();
			//$this->load->view('frontend/header',$data);
			//$this->load->view('frontend/index',$data);
		}
		
		public function viewproduct($id=''){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$this->load->model('admin_model');
			if($id==''){
				redirect('/');
				}else if($this->db->where('id',$id)->get('tbl_products')->num_rows()==0){
				redirect('/');
				}else{
				$data['menu']=$this->admin_model->get_navigation_menu();
				$data['footer']=$this->admin_model->get_footer($lang['lang']);
				$data['product_data']=$this->admin_model->single_product($id);
				if($data['product_data'][0]['data_type'] == 1){
					redirect('/uploads/product/'.$data['product_data'][0]['pdf']);
				}
				$this->load->view('frontend/header',$data);
				$this->load->view('frontend/productview',$data);
			}
		}
		public function search(){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/search');
		}
		
		public function product_filter(){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');	
			$this->load->model('admin_model');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$this->load->view('frontend/header',$data);
			$data['product_data']=$this->admin_model->all_products();
			$this->load->view('frontend/products_filter',$data);
			$this->load->view('frontend/footer');
		}
		public function category()
		{
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');	
			$this->load->model('admin_model');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$data['sidebarcategory']=$this->admin_model->sidebarcategory();
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/category');
		}
		public function getsubcategory($id)
		{	
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$this->load->model('admin_model');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$data['sidebarcategory']=$this->admin_model->sidebarcategory($id);
			$data['getsubcategory']=$this->admin_model->get_sub_category($id);
			$data['catname']=$this->admin_model->catname($id);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/subcategory');
		}
		public function innercategory($catid,$subcatid)
		{
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');		
			$this->load->model('admin_model');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$data['sidebarcategory']=$this->admin_model->sidebarcategory($catid);
			$data['innercategory']=$this->admin_model->innercategory($catid,$subcatid);
			// debug($data['innercategory']);
			
			$data['catname']=$this->admin_model->catname($catid);
			$data['innercategoryproduct']=$this->admin_model->innercategoryproduct($catid,$subcatid);
			
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/innercategory');
		}
		
		public function getproduct($catid,$subcatid,$innercategory){
			
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$this->load->model('admin_model');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$data['sidebarcategory']=$this->admin_model->sidebarcategory($catid);
			$data['getproduct']=$this->admin_model->getproduct($catid,$subcatid,$innercategory);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/productlist');
			
		}
		public function showproduct($pid){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$this->load->model('admin_model');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$data['product_data']=$this->admin_model->single_product($pid);
			if($data['product_data'][0]['data_type'] == 1){
				redirect('/uploads/product/'.$data['product_data'][0]['pdf']);
			}
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/productview',$data);
			
		}
		public function contact(){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			if(isset($_POST['email'])){
				$this->send_email($_POST['name'],$_POST['email'],$_POST['last_name'],$_POST['phone'],$_POST['message']);
			}
			
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/contact');
		}
		
		function send_email($name,$customer_email,$last_name,$phone,$message){
			
			$to ='ds723460@gmail.com';
			$subject ='FilterMat Contact Us';
			// the message
			$message  = "<table>
			<tr><td>Customer Name :</td><td>".$name.$last_name."</td></tr>
			<tr><td>Customer Email :</td><td><b>".$customer_email."</b></td></tr>
			<tr><td>Customer Phone :</td><td><b>".$phone."</b></td></tr>
			<tr><td>Customer Message :</td><td>".$message."</td></tr>
			</table>";
			// send email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "Reply-To:$$name <$customer_email>\r\n"; 
			$headers .= "Return-Path:$name <$customer_email>\r\n";
			$headers .= "From:'$name' <$customer_email>\r\n";   
			// $headers = 'From: webmaster@example.com' . "\r\n" .
			// 'Reply-To: webmaster@example.com' . "\r\n" .
			// 'X-Mailer: PHP/' . phpversion();
			
			
			if(mail($to,$subject,$message,$headers,"-f your@email.here")){
				$this->session->set_flashdata('msg', "<div class='alert alert-success'>Send Email Successfully !</div>");
				redirect('contact');
			}
		}
	}

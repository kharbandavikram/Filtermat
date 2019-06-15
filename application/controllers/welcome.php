<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Welcome extends CI_Controller {
		
		 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
				$this->load->library('session'); 
        }
		
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
		
				//get name 
				$category=$this->admin_model->single_category($data['product_data'][0]['category_id']);	
				$subcategory=$this->admin_model->single_subcategory($data['product_data'][0]['subcategory_id']);
				$innercategory=$this->admin_model->single_innercategory($data['product_data'][0]['innercategory_id']);
				$data['catname']=$category[0]['category'];
				$data['subcategory']=$subcategory[0]['subcategory'];
				if($innercategory){
				$data['innercategory']=$innercategory[0]['innercategory'];
				}else{
				$data['innercategory']='';	
				}
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
			$data['subcatname']=$this->admin_model->single_subcategory($subcatid);
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
			$data['getsubcategory']=$this->admin_model->subcategory_name($subcatid);
			// debug($data['getsubcategory']);
			$data['catname']=$this->admin_model->catname($catid);
			$data['innercategory']=$this->admin_model->single_innercategory($innercategory);
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
			// debug($data['product_data']);
			//get name 
			$category=$this->admin_model->single_category($data['product_data'][0]['category_id']);	
			$subcategory=$this->admin_model->single_subcategory($data['product_data'][0]['subcategory_id']);
			$innercategory=$this->admin_model->single_innercategory($data['product_data'][0]['innercategory_id']);
			$data['catname']=$category[0]['category'];
			$data['subcategory']=$subcategory[0]['subcategory'];
			if($innercategory){
			$data['innercategory']=$innercategory[0]['innercategory'];
			}else{
			$data['innercategory']='';	
			}
				
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
			
			$to ='info@filtermat.be,gaurav.webspin@gmail.com';
			$subject ='FilterMat Contact Us';
			// the message
			$message = "<div>
			<h3>Hello Admin User,</h3>
			<p>You have received a new request from Filtermat Interface. Below are user details.</p>
			<br/>
			<table>
			<tr><td>Name :</td><td>".$name.$last_name."</td></tr>
			<tr><td>Email :</td><td><b>".$customer_email."</b></td></tr>
			<tr><td>Mobile :</td><td><b>".$phone."</b></td></tr>
			<tr><td>Message :</td><td>".$message."</td></tr>
			</table>
			</div>";
			// debug($message); die;
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
		
		public function general_product(){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$data['get_general_product']=$this->admin_model->get_general_product();			
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/general_product');	
		}
		
		public function login(){
			$this->form_validation->set_rules('username','Email ID','trim|xss_clean|required');
			$this->form_validation->set_rules('password','Password','trim|xss_clean|required|MD5');
			if($this->form_validation->run()==false){
				$this->load->view('frontend/login');
				}else{
				$emailID=$this->input->post('username');
				$password=$this->input->post('password');
				$signdata=$this->admin_model->frontend_login($emailID,$password);
			
				if($signdata){
					$frontlogin_data1=array(
					'userid' =>$signdata[0]->id,
					'emailaddress'=>$signdata[0]->email_id
					);
					
					$this->session->set_userdata('frontlogin_data1',$frontlogin_data1);
					redirect(base_url().'price/list/');
					}else{
					$this->session->set_flashdata('login_error','Invalid Login Credentials');
					redirect(base_url().'login/');
				}
				
			}
		}
		
		// function get_price_list(){
			// $this->load->library('session'); 
			// $lang = $this->session->userdata('lang');
			// $this->load->model('admin_model');		
			// $data['menu']=$this->admin_model->get_navigation_menu();
			// $data['footer']=$this->admin_model->get_footer($lang['lang']);
			// $sql="select t2.id as subcategory_id,t2.subcategory as eng_sub_titles,t2.status,t2.subimage,t2.fr_subcategory as fr_sub_titles,t2.dut_subcategory as dut_sub_titles from tbl_products as t1 left join tbl_subcategory as t2 ON t1.subcategory_id = t2.id where t1.status='1' and t2.status='1' and t1.pricelist_tag_status='1'";
			// $query = $this->db->query($sql);
			// $data['get_sub_category']=$query->result_array();
			// $data['sidebarcategory']=$this->admin_model->sidebarcategory();
			// $this->load->view('frontend/header',$data);
			// $this->load->view('frontend/price_list_view');		
		// }
		
		function price_list_product($id=null){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$data['getproduct']=$this->admin_model->getpricelistactiveproduct();
			$data['sidebarcategory']=$this->admin_model->sidebarcategory();
			$data['subcatname']=$this->admin_model->single_subcategory($id);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/price_list_product');		
		}	
		function pricelistshowproducts($id=null){
			$this->load->library('session'); 
			$lang = $this->session->userdata('lang');
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$data['product_data']=$this->admin_model->single_product($id);
			$data['sidebarcategory']=$this->admin_model->sidebarcategory();
			$frontlogin_data1 = $this->session->userdata('frontlogin_data1');
			if(!empty($frontlogin_data1)){
			$data['get_user_data']=$this->admin_model->get_user_data($frontlogin_data1['userid']);
			}
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/singleproduct_pricelist');		
		}
		
		function logout(){
			$this->session->unset_userdata('frontlogin_data1');
			redirect(base_url());
		}
		
		
		public function price_list_page()
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
			$data['get_pricelistpage_data']=$this->admin_model->get_pricelistpage_data($lang['lang']);
			$data['sidebarcategory']=$this->admin_model->sidebarcategory();
			$data['footer']=$this->admin_model->get_footer($lang['lang']);
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/price_list_page');
		}
		
		
		function send_message(){
			$productIDS=$_POST['productID'];
			$customer_name=$_POST['name'];
			$company_name=$_POST['company_name'];
			$customer_email=$_POST['email'];
			$msg=$_POST['message'];
			$data=$_POST;
			unset($data['name']);
			unset($data['email']);	
			unset($data['message']);
			unset($data['productID']);
			unset($data['company_name']);
			$message ='<div class="container">';
			$message .='<h2>Hello Admin,</h2>';
			$message .='<p>You have received a new Order Request. Below are the order Details:</p>';
			if(!empty($data)){
			$message .='<table border="0" cellpadding="0" cellspacing="0" style="width:501px">';	
			$counter=1;
			foreach($data as $key=>$value){
				
				if($value!=''){
				$message .='<tr>';
				$message .='<td style="border: 1px solid #ddd;padding: 10px;">'.$counter.'</td>';
				$message .='<td style="border: 1px solid #ddd;padding: 10px;">'.$key.'</td>';
				$message .='<td td style="border: 1px solid #ddd;padding: 10px;" >'.$value.'</td>';
				$message .='</tr>';	
				}
			$counter++; }
			$message .='</table>';
			}
			$message .='<p>User Details are as follows:</p>';
			$message .='<p>First Name: '.$customer_name.'</p>';
			$message .='<p>Company Name: '.$company_name.'</p>';
			$message .='<p>Email Id: '.$customer_email.'</p>';
			$message .='<p>Message: '.$msg.'</p>';
			$message .='</div>';
			$to ='gaurav.webspin@gmail.com,ds723460@gmail.com';
			$subject ='New Order Request';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "Reply-To:$$customer_name <$customer_email>\r\n"; 
			$headers .= "Return-Path:$customer_name <$customer_email>\r\n";
			$headers .= "From:'$customer_name' <$customer_email>\r\n";   
			
			if(mail($to,$subject,$message,$headers,"-f your@email.here")){
				// $this->session->set_flashdata('success_email', "<div class='alert alert-success send_success'>Send Email Successfully !</div>");
				redirect("price/list/showproducts/$productIDS");
				
			}
		}
		
	}

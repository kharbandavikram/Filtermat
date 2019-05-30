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
		$this->load->model('admin_model');
		$data['menu']=$this->admin_model->get_navigation_menu();
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/index');
	}
	
	public function viewproduct($id=''){
		$this->load->model('admin_model');
		if($id==''){
			redirect('/');
		}else if($this->db->where('id',$id)->get('tbl_products')->num_rows()==0){
			redirect('/');
		}else{
			$data['menu']=$this->admin_model->get_navigation_menu();
			$data['product_data']=$this->admin_model->single_product($id);
			if($data['product_data'][0]['data_type'] == 1){
			redirect('/uploads/product/'.$data['product_data'][0]['pdf']);
			}
			$this->load->view('frontend/header',$data);
			$this->load->view('frontend/productview',$data);
		}
	}
	public function search(){
		$data['menu']=$this->admin_model->get_navigation_menu();
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/search');
	}
	
	public function product_filter(){
	$this->load->model('admin_model');
	$data['menu']=$this->admin_model->get_navigation_menu();
		$this->load->view('frontend/header',$data);
		$data['product_data']=$this->admin_model->all_products();
		$this->load->view('frontend/products_filter',$data);
		$this->load->view('frontend/footer');
	}
	public function category()
	{	
		$this->load->model('admin_model');
		$data['menu']=$this->admin_model->get_navigation_menu();
		$data['sidebarcategory']=$this->admin_model->sidebarcategory();
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/category');
	}
	public function getsubcategory($id)
	{	
		$this->load->model('admin_model');
		$data['menu']=$this->admin_model->get_navigation_menu();
		$data['sidebarcategory']=$this->admin_model->sidebarcategory($id);
		$data['getsubcategory']=$this->admin_model->get_sub_category($id);
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/category');
	}
	public function innercategory($catid,$subcatid)
	{	
		$this->load->model('admin_model');
		$data['menu']=$this->admin_model->get_navigation_menu();
		$data['sidebarcategory']=$this->admin_model->sidebarcategory($catid);
		$data['innercategory']=$this->admin_model->innercategory($catid,$subcatid);
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/category');
	}
	
	public function getproduct($catid,$subcatid,$innercategory){
		$this->load->model('admin_model');
		$data['menu']=$this->admin_model->get_navigation_menu();
		$data['sidebarcategory']=$this->admin_model->sidebarcategory($catid);
		$data['getproduct']=$this->admin_model->getproduct($catid,$subcatid,$innercategory);
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/category');
		
	}
	public function showproduct($pid){
		$this->load->model('admin_model');
		$data['menu']=$this->admin_model->get_navigation_menu();
		$data['product_data']=$this->admin_model->single_product($pid);
		if($data['product_data'][0]['data_type'] == 1){
		redirect('/uploads/product/'.$data['product_data'][0]['pdf']);
		}
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/productview',$data);
		
	}
}

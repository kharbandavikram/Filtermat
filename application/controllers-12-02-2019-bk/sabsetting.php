<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
	function cmp($a, $b){
		return strcmp($a["name"], $b["name"]);
	}
class Sabsetting extends CI_Controller {

	
	
	/********Constructor*******************/
	
	public function __construct(){
	
	
		parent::__construct();
		
			$this->load->model('sabon_model');
					 $this->load->library('session');

	}
	
	
	  public function add_unique_category()
	  {  
	   
	$total_row=$this->db->where('category',$this->input->post('category'))->get('tbl_category')->num_rows;
	if($total_row > 0){
		 $valid = false;
           exit();
	}else{
		 $valid = true;
	}
	
	echo json_encode(array(
    'valid' => $valid,
     ));
}	


  public function edit_unique_category()
	  {  
	   
	$total_row=$this->db->where('category',$this->input->post('category'))->where('id !=',$this->input->post('ucate_id'))->get('tbl_category')->num_rows;
	if($total_row > 0){
		 $valid = false;
           exit();
	}else{
		 $valid = true;
	}
	
	echo json_encode(array(
    'valid' => $valid,
     ));
}


  public function add_unique_subcategory()
	  {  
	   
	$total_row=$this->db->where('subcategory',$this->input->post('subcategory'))->where('category_id',$this->input->post('ucategory_id'))->get('tbl_subcategory')->num_rows;
	if($total_row > 0){
		 $valid = false;
           exit();
	}else{
		 $valid = true;
	}
	
	echo json_encode(array(
    'valid' => $valid,
     ));
}	



  public function edit_unique_subcategory()
	  {  
	   
	$total_row=$this->db->where('subcategory',$this->input->post('subcategory'))->where('category_id',$this->input->post('ucategory_id'))->where('id !=',$this->input->post('usubcate_id'))->get('tbl_subcategory')->num_rows;
	if($total_row > 0){
		 $valid = false;
           exit();
	}else{
		 $valid = true;
	}
	
	echo json_encode(array(
    'valid' => $valid,
     ));
}


 /**********************ajax to change subcategory accord category********************/

   public function ajax_category_change()
	  { 
	 
	  	$str='<option value="">Select Subcategory</option>';  
		$categoryid=$this->input->post('categoryid');
		//$final_cat_id=strint_view($categoryid);
		 $res_query="select * from tbl_subcategory where  status=1 and category_id ='".$categoryid."' order by subcategory asc";
		$res=$this->db->query($res_query)->result();
		foreach($res as $key)
		{
			$str.='<option value="'.$key->id.'">'.$key->subcategory.'</option>';
		}
        
	    echo $str;
	  }
   public function ajax_subcategory_change()
	  { 
	 
	  	$str='<option value="">Select Inner Category / Products</option>';  
		$subcategoryid=$this->input->post('subcategoryid');
		 $res_query="select * from tbl_innercategory where  status=1 and subcategory_id ='".$subcategoryid."' order by innercategory asc";
		$res=$this->db->query($res_query)->result();
		foreach($res as $key)
		{
			$str.='<option value="'.$key->id.'">'.$key->innercategory.'</option>';
		}
        
	    echo $str;
	  }
	


	  
	  
   public function ajax_subcategory_search_change(){ 
		$subcategoryid=$this->input->post('subcategoryid');
		$res_query="select id,innercategory as name,1 as type from tbl_innercategory where  status=1 and subcategory_id ='".$subcategoryid."' order by innercategory asc";
		$innerCat=$this->db->query($res_query)->result_array();
		
		$res_query="select id,product_name as name,2 as type from tbl_products where  status=1 and subcategory_id ='".$subcategoryid."' AND innercategory_id = 0 order by product_name asc";
		$product=$this->db->query($res_query)->result_array();
		
		
		$Tempresult = array_merge($innerCat,$product);
		foreach($Tempresult as $temp){
			$result[] = $temp;
		}
		
		usort($result, "cmp");
				
		$str='<option value="">Select Inner Category / Products </option>';  
		foreach($result as $key)
		{
			$str.='<option value="'.$key['id'].'_'.$key['type'].'">'.$key['name'].'</option>';
		}
        
	    echo $str;
	  }
	  public function ajax_innercategory_change()
	  { 
	 
	  	$str='<option value="">Select Products</option>';  
		$innercategoryid=$this->input->post('innercategoryid');
		
		$res_query="select id,product_name as name,2 as type from tbl_products where  status=1 and innercategory_id ='".$innercategoryid."' order by product_name asc";
		$product=$this->db->query($res_query)->result();
		foreach($product as $key)
		{
			$str.='<option value="'.$key->id.'">'.$key->name.'</option>';
		}
        
	    echo $str;
	  }
 public function ajax_uni_category_change()
	  { 
	 
	  	$str='<option value="">Select </option>';  
		$categoryid=$this->input->post('categoryid');
		//$final_cat_id=strint_view($categoryid);
		 $res_query="select multiple_cate from tbl_universal_category where status=1 and id ='".$categoryid."' ";
		 
		$res=$this->db->query($res_query)->row();
		//echo "<pre>"; print_r($res);die;
		
		
		$cate_query="select * from tbl_category where status=1 and id IN ($res->multiple_cate)";
		 $res_cate=$this->db->query($cate_query)->result();
		//echo "<pre>"; print_r($res_cate); exit;
		foreach($res_cate as $key)
		{
			$str.='<option value="'.$key->id.'">'.$key->category.'</option>';
		}
        
	    echo $str;
	  }
 public function uni_category_change()
	  { 
	 
	  	$str='<option value="">Select </option>';  
		$unicategoryid=$this->input->post('unicategoryid');
		 $final_uni_cat_id=strint_view($unicategoryid);
                 //  echo "<pre>"; print_r($unicategoryid); exit; 
		//die;
		 $res_query="select * from tbl_category where  status=1 and universal_id IN (".$unicategoryid.") order by category asc";
		$res=$this->db->query($res_query)->result();
		 
                foreach($res as $key)
		{
			$str.='<option value="'.$key->id.'">'.$key->category.'</option>';
		}
        
	    echo $str;
	  }	


  public function category_change()
	  { 
	 
	  	$str='<option value="">Select </option>';  
		$categoryid=$this->input->post('categoryid');
		 $final_cat_id=strint_view($categoryid);
		//die;
		 $res_query="select * from tbl_subcategory where  status=1 and category_id IN (".$final_cat_id.") order by subcategory asc";
		$res=$this->db->query($res_query)->result();
		foreach($res as $key)
		{
			$str.='<option value="'.$key->id.'">'.$key->subcategory.'</option>';
		}
        
	    echo $str;
	  }	
  public function category_change1()
	  { 
	 
	  	$str='<option value="">Select </option>';  
		$uni_category_id=$this->input->post('uni_category_id');
		//$final_cat_id=strint_view($categoryid);
		 $res_query="select multiple_subcate from tbl_universal_category where status=1 and id ='".$uni_category_id."' ";
		 
		$res=$this->db->query($res_query)->row();
		//echo "<pre>"; print_r($res);die;
		
		
		$cate_query="select * from tbl_subcategory where status=1 and id IN ($res->multiple_subcate)";
		 $res_subcate=$this->db->query($cate_query)->result();
		//echo "<pre>"; print_r($res_cate); exit;
		foreach($res_subcate as $key)
		{
			$str.='<option value="'.$key->id.'">'.$key->subcategory.'</option>';
		}
        
	    echo $str;
	  }

/*************************************************************************/
}


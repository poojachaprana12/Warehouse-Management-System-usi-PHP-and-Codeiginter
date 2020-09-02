<?php
class Client_login extends CI_Model {

        public function __construct()
        {
			parent::__construct();
                $this->load->database();
        }


	//--------------------------------------------------------
	//---------------------PRODUCT FUNCTIONS----------------
	
	function product_list_view()
    {
		
		$query   = $this->db->query("select * from products order by product_id asc");
		return $query;
	        
    }
	
	
	function product_view_id($id)
    {
        //$sql   = "select * from products where id='$id'";
        $query = $this->db->query("select * from products where product_id='$id'");
        return $query;
        
    }
	
	//--------------------------------------------------------
	//---------------------CATEGORY FUNCTIONS----------------
	 
	
	function category_view_id()
	{
		$query   = $this->db->query("select * from productcategory order by cat_id asc");
		return $query;
	        
        
    }
	

	
	
}

?>
<?php
class Client extends CI_Controller {

	function __construct()
    {
        
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Client_login');
		$this->load->database();
        $this->load->library('Form_validation');
		$this->load->helper('url', 'form');
		
    }
	
	//----------------------CLIENT MANAGEMENT------------------ 
	public function index()
    {
        $this->load->view('Client_header');
		$this->load->view('Clientpage');
		$this->load->view('Client_footer');
	}
	
	

	
	//---------------------------------------------------------
	//--------------------PRODUCT MANAGEMENT-------------------

	
	
	public function product_list_view()
    {
       //if ($this->session->userdata('clientID') != "") 
		//{
            $data['product_list_view'] = $this->Client_login->product_list_view();
			//$this->session->set_flashdata('item', array('message' => 'All Product List','class' => 'error'));
			$this->load->view('Client_header');
            $this->load->view('Client_product_listview', $data);
            $this->load->view('Client_footer');
        
    }
	
	public function product_view()
    {
        
			$id  = $_GET['id'];
            $data['product_view_id'] = $this->Client_login->product_view_id($id);
			$data['category']  = $this->Client_login->category_view_id();
			$this->load->view('Client_header');
            $this->load->view('Client_productdetail_view', $data);
            $this->load->view('Client_footer');
       
    }
	
	//--------------------------------------------------------
	//---------------------CATEGORY MANAGEMENT----------------
	
	
	public function categoryview()
    {
        $data['category']  = $this->Client_login->category_view_id();
			
		    $this->load->view('Client_header');
            $this->load->view('Client_category_view',$data);
            $this->load->view('Client_footer');
			
        
    }
	
	
	   
}
?>
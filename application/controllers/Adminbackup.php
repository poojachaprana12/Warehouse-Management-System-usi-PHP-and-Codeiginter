<?php
class Admin extends CI_Controller {

	function __construct()
    {
        
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Model_login');
		$this->load->library('Session');
		$this->load->helper('html');
        $this->load->database();
        $this->load->library('Form_validation');
		$this->load->helper('url', 'form');
		$this->load->library('Upload');
    }
	
	//----------------------LOGIN MANAGEMENT------------------ 
	
	public function index()
    {
        $this->load->view('Admin_header');
		$this->load->view('Adminpage');
		$this->load->view('Admin_footer');
	}
	
	
	public function login()
	{
		
		$username = $this->input->post('username');		
 			$password = $this->input->post('password');
				
				$user = $this->Model_login->login_user($username, $password);
			//print_r $user;
			//die();
				if(!empty($user))
				{
					//echo "kkk";
					
					if($user['role'] == 1)
					{	
				//echo "lll";
				//die();
						
						$this->session->unset_userdata('adminID');
						$this->session->unset_userdata('adminName');
						
						$this->session->set_userdata('adminID' , $user['id']);	
						$this->session->set_userdata('adminName' , $user['username']);
                        $this->session->set_userdata('adminRole' , $user['role']);
						$this->load->view('Admin_header',$user);
						$this->load->view('Adminpage');
						$this->load->view('Admin_footer');
                                               // redirect('admin/customers' ,'refresh');

					}
					elseif($user['role']  == 2)
					{
						$this->session->set_flashdata('item', array('message' => 'Client View','class' => 'error'));
				
						$this->load->view('Client_header');
						$this->load->view('Clientpage');
						$this->load->view('Client_footer');
					}
				}
				else
				{
				
					$this->session->set_flashdata('item', array('message' => 'Incorrect Username or Password!','class' => 'error'));
				
					$this->load->view('Headerview');
					$this->load->view('Loginview');
					$this->load->view('Footerview');  
				}
			
		
		  
 	}
	
	/*public function login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
		if ($this->input->post('submit')) 
		{
		
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$result = $this->Model_login->login_user($username, $password);
			//print_r($result);
			//die();
			//echo mysqli_error();
			if($result > 0) 
            {
                //echo "hello";
                //Session value
				$sessiondata = array('username' => $username,'loginuser' => TRUE);
                $this->session->set_userdata('logged_in', $sessiondata);
				
				$result = $this->Model_login->login_user($username, $password);
				
				print_r $sessiondata;
				
				//$data['login_user'] = $this->Model_login->login_user($username, $password);
				
				print_r($result);
				if(!empty($result)){ 
				echo "hello";
				echo $result->role ;}
				
				die();
				$this->load->view('Admin_header',$result);
				$this->load->view('Adminpage');
				$this->load->view('Admin_footer');
       		}
			else
			{
				//echo "aaaaaaaa";
				//die();
				$error['loginerror'] = "Wrong username and password!";
				echo $error['loginerror'];
				$this->session->set_flashdata('msg', 'Incorrect Username or Password!');
				$this->load->view('Headerview');
				$this->load->view('Loginview');
				$this->load->view('Footerview');
			}
		}
		else 
		{
                
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');  
                
        }
		
	}*/
	
	public function logout()
    {
        
		$this->session->unset_userdata('logged_in');
		//session_destroy();
        $this->load->view('Headerview');
		$this->load->view('Loginview');
		$this->load->view('Footerview');  
        
    }
	//---------------------------------------------------------
	//----------------------USER MANAGEMENT------------------
	public function user_list_view()
    {
        if ($this->session->userdata('logged_in') != "") 
		{ 
            $data['user_list_view1'] = $this->Model_login->user_list_view1();
			$this->session->set_flashdata('item', array('message' => 'All Users List','class' => 'error'));
			$this->load->view('Admin_header');
            $this->load->view('User_list', $data);
            $this->load->view('Admin_footer');
        } 
		else 
		{
            //echo "aaaaaaaa";
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');
            
        }
    }
	public function user_view()
    {
        
        if ($this->session->userdata('logged_in') != "") 
		{
            
            $id  = $_GET['id'];
            $data['user_view_id'] = $this->Model_login->user_view_id($id);
			$this->session->set_flashdata('item', array('message' => 'User Details','class' => 'error'));
            $this->load->view('Admin_header');
            $this->load->view('User_list_view', $data);
            $this->load->view('Admin_footer');
            
        } 
		else 
		{
            
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');
            
        }
    }
	
	public function addnewuser()
    {
        if ($this->session->userdata('logged_in') != "") 
		{
			
		    $this->session->set_flashdata('item', array('message' => 'Add New User','class' => 'error'));
           	$this->load->view('Admin_header');
            $this->load->view('Adduser');
            $this->load->view('Admin_footer');
        } 
		else 
		{
            
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');
        }
    }
	
	
	public function addnewuserdetail()
    {
        if ($this->session->userdata('logged_in') != "") {
			$config['upload_path']   = './userimage/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '10024';
            $config['max_width']  = '6000';
			$config['max_height']  = '6000';
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
			@$image = $_FILES['userfile']['name'];
			
            if (!$this->upload->do_upload()) 
			{
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('item', array('message' => 'Error','class' => 'error'));
				//print_r($error);
                $this->load->view('Admin_header.php');
				$this->load->view('Adduser', $error);
				$this->load->view('Admin_footer');
            } 
			else 
			{
			$image = $_FILES['userfile']['name'];
			$name=$this->input->post('name');
			$username=$this->input->post('user');
			$pass=$this->input->post('password');
			$date=date('Y-m-d H:i:s');
			//die();	
                $data = array(
								'name' => $this->input->post('name'),
								'username' => $this->input->post('user'),
								'image' => $image,
								'password' => $this->input->post('password'),
								//'role' => $this->input->post('role'),
								'role' => '2',
								'roleauthentication' => '1',
								'status' => $this->input->post('status'),
								'created_on' =>$date
							);
                //print_r($data);
               $add=$this->Model_login->add_user($data);
                $last_insert_id=$add; 
				//print_r error();
				//die();
				if($add!=="")
				{
					$data['user_list_view1'] = $this->Model_login->user_list_view1();
					$this->session->set_flashdata('item', array('message' => 'Users Added Successfully','class' => 'error'));
					$this->load->view('Admin_header');
					$this->load->view('User_list', $data);
					$this->load->view('Admin_footer');
				}	
				else
				{	
				    $this->session->set_flashdata('item', array('message' => 'User Not Added','class' => 'error'));
				    $this->load->view('Admin_header');
					$this->load->view('Adduser');
					$this->load->view('Admin_footer');
													
				}
				
			}
		}
		else 
		{
		
		$this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');  
                
		
		}
       
    }
	
	
	
	
	public function edit_userdetails()
    {
        if ($this->session->userdata('logged_in') != "") {
            $config['upload_path']   = './userimage/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '10024';
            $config['max_width']  = '6000';
			$config['max_height']  = '6000';
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $image_path = $this->upload->data();
            
            if (empty($_FILES['userfile']['name'])) 
			{
                $image = $this->input->post('image');
				// $error = array('error' => $this->upload->display_errors());
				//print_r($error);
            } 
			else 
			{
                $image = $image_path['file_name'];
				
            }
           
		    $image;
			$name=$this->input->post('name');
			$username=$this->input->post('user');
			$pass=$this->input->post('password');
			$status=$this->input->post('status');
			$date=date('Y-m-d H:i:s');
            $id   = $this->input->post('did');
            $data = array(
							'name' => $this->input->post('name'),
							'username' => $this->input->post('user'),
							'password' => $this->input->post('password'),
							'role' => $this->input->post('role'),
							'roleauthentication' => '1',
							'image' => $image,
							'status' =>  $this->input->post('status'),
							'created_on' => $date
						);
           //print_r($data);
			//die();
            $add=$this->Model_login->update_users($id, $data);
			if($add!=='')
					{ 
					
						$this->session->set_flashdata('item', array('message' => 'Profile updated successfully..','class' => 'error'));
							 redirect('Admin/User_list_view');
					}
           
        } 
		else 
		{
            
        ?>	
			<script type="text/javascript">
				var back = document.referrer;
				window.location.replace(back);
			</script>  
        <?php
        }
        
    }
	
	public function deleteuser()
    {
        if ($this->session->userdata('logged_in') != "") 
		{
            $id  = $_GET['id'];
            $del['query'] = $this->Model_login->deleteuser($id);
            if ($del) 
			{
					$data['user_list_view1'] = $this->Model_login->user_list_view1();
					$this->session->set_flashdata('item', array('message' => 'Users Deleted Successfully','class' => 'error'));
					$this->load->view('Admin_header');
					$this->load->view('User_list', $data);
					$this->load->view('Admin_footer');
            }
        } 
		else 
		{
					$data['user_list_view1'] = $this->Model_login->user_list_view1();
					$this->session->set_flashdata('item', array('message' => 'Try Again','class' => 'error'));
					$this->load->view('Admin_header');
					$this->load->view('User_list', $data);
					$this->load->view('Admin_footer');
            
        }
    }
	
	//---------------------------------------------------------
	//--------------------PRODUCT MANAGEMENT-------------------
	public function addnewproduct()
    {
        if ($this->session->userdata('logged_in') != "") 
		{
			
		    $this->session->set_flashdata('item', array('message' => 'Add New Product','class' => 'error'));
			
			
			$data['category']  = $this->Model_login->category_view_id();
			$this->load->view('Admin_header');
            $this->load->view('Addnewproduct',$data);
            $this->load->view('Admin_footer');
        } 
		else 
		{
            $this->session->set_flashdata('item', array('message' => 'Product Not Added','class' => 'error'));
			
            $this->load->view('Headerview');
			$this->load->view('Addnewproduct');
			$this->load->view('Footerview');
        }
    }
	
	
	public function product_list_view()
    {
        if ($this->session->userdata('logged_in') != "") 
		{ 
            $data['product_list_view'] = $this->Model_login->product_list_view();
			$this->session->set_flashdata('item', array('message' => 'All Product List','class' => 'error'));
			$this->load->view('Admin_header');
            $this->load->view('Product_list', $data);
            $this->load->view('Admin_footer');
        } 
		else 
		{
            //echo "aaaaaaaa";
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');
            
        }
    }
	
	public function product_view()
    {
        
        if ($this->session->userdata('logged_in') != "") 
		{
            
            $id  = $_GET['id'];
            $data['product_view_id'] = $this->Model_login->product_view_id($id);
			$data['category']  = $this->Model_login->category_view_id();
			$this->session->set_flashdata('item', array('message' => 'Details of Product','class' => 'error'));
            $this->load->view('Admin_header');
            $this->load->view('Product_list_view', $data);
            $this->load->view('Admin_footer');
            
        } 
		else 
		{
            
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');
            
        }
    }
	
	public function addnewproductdetail()
    {
        if ($this->session->userdata('logged_in') != "") {
			
			$date=date('Y-m-d H:i:s');
				
                $data = array(
								'product_name' => $this->input->post('pname'),
								'cat_id' => $this->input->post('pcategory'),
								'description' => $this->input->post('description'),
								'price' => $this->input->post('price'),
								'quantity' => $this->input->post('pquantity'),
								'stock' => $this->input->post('pquantity'),
								'updatedon' =>$date
							);
                
                $add=$this->Model_login->add_new_product($data);
                $last_insert_id=$add;
				//print_r($add);die();				
				if($add!=="")
				{
					 
				
					$data['product_list_view'] = $this->Model_login->product_list_view();
			
					$this->session->set_flashdata('item', array('message' => 'Product Added Successfully ','class' => 'error'));
				    $this->load->view('Admin_header');
					$this->load->view('Product_list',$data);
					$this->load->view('Admin_footer');
				}	
				else
				{	
			
				   $this->session->set_flashdata('item', array('message' => 'Product Not Added ','class' => 'error'));
				    $this->load->view('Admin_header');
					$this->load->view('Addnewproduct');
					$this->load->view('Admin_footer');
													
				}
				
			}
		
		else 
		{
		$this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');  
                
		
		}
       
    }
	
	public function edit_productdetails()
    {
        if ($this->session->userdata('logged_in') != "") {
            
            $id   = $this->input->post('did');
           $date=date('Y-m-d H:i:s');
				
                $data = array(
								'product_name' => $this->input->post('pname'),
								'cat_id' => $this->input->post('pcategory'),
								'description' => $this->input->post('description'),
								'price' => $this->input->post('price'),
								'quantity' => $this->input->post('pquantity'),
								'stock' => $this->input->post('pquantity'),
								'updatedon' =>$date
							);
           //print_r($data);
			//die();
            $add=$this->Model_login->update_product($id, $data);
			if($add!=='')
					{ 
						$data['product_list_view'] = $this->Model_login->product_list_view();
						$this->session->set_flashdata('item', array('message' => 'Product Updated Successfully ','class' => 'error'));
						$this->load->view('Admin_header');
						$this->load->view('Product_list',$data);
						$this->load->view('Admin_footer');
					}
           
        } 
		else 
		{
            
        ?>	
			<script type="text/javascript">
				var back = document.referrer;
				window.location.replace(back);
			</script>  
        <?php
        }
        
    }
	
	
	public function deleteproduct()
    {
        if ($this->session->userdata('logged_in') != "") 
		{
            $id  = $_GET['id'];
            $del['query'] = $this->Model_login->deleteproduct($id);
            if ($del) 
			{
						$data['product_list_view'] = $this->Model_login->product_list_view();
						$this->session->set_flashdata('item', array('message' => 'Product Deleted Successfully ','class' => 'error'));
						$this->load->view('Admin_header');
						$this->load->view('Product_list',$data);
						$this->load->view('Admin_footer');
            }
        } 
		else 
		{
						$data['product_list_view'] = $this->Model_login->product_list_view();
						$this->session->set_flashdata('item', array('message' => 'Product Not Deleted ','class' => 'error'));
						$this->load->view('Admin_header');
						$this->load->view('Product_list',$data);
						$this->load->view('Admin_footer');
            
        }
    }
	
	
	//--------------------------------------------------------
	//---------------------CATEGORY MANAGEMENT----------------
	
	
	public function addnewcategory()
    {
        if ($this->session->userdata('logged_in') != "") 
		{
			
		    //$this->session->set_flashdata('item', array('message' => 'Add New Category','class' => 'error'));
			$data['category']  = $this->Model_login->category_view_id();
			
		    $this->load->view('Admin_header');
            $this->load->view('Addnewcategory',$data);
            $this->load->view('Admin_footer');
        } 
		else 
		{
            
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');
        }
    }
	
	
	
	

	public function addnewcategorydetail()
    {
        if ($this->session->userdata('logged_in') != "") {
			
			$date=date('Y-m-d H:i:s');
			//die();	
                $data = array(
								'cat_name' => $this->input->post('cname'),
								'cat_time' =>$date
							);
                //print_r($data);
                $add=$this->Model_login->add_category($data);
                $last_insert_id=$add; 
				//print_r error();
				//die();
				if($add!=="")
				{
					 $this->session->set_flashdata('item', array('message' => 'Category Added Successfully','class' => 'error'));
				    $data['category']  = $this->Model_login->category_view_id();
					$this->load->view('Admin_header');
					$this->load->view('Addnewcategory',$data);
					$this->load->view('Admin_footer');
				}	
				else
				{	
				    $this->session->set_flashdata('item', array('message' => 'Category Not Added','class' => 'error'));
				    $this->load->view('Admin_header');
					$this->load->view('Addnewcategory');
					$this->load->view('Admin_footer');
													
				}
				
			}
		
		else 
		{
		
		$this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');  
                
		
		}
       
    }
	
	
	public function deletecategory()
    {
        if ($this->session->userdata('logged_in') != "") 
		{
            $id  = $_GET['id'];
            $del['query'] = $this->Model_login->deletecategory($id);
            if ($del) 
			{
					$data['category']  = $this->Model_login->category_view_id();
					$this->session->set_flashdata('item', array('message' => 'Category Deleted Successfully','class' => 'error'));
				    $this->load->view('Admin_header');
					$this->load->view('Addnewcategory',$data);
					$this->load->view('Admin_footer');
            }
        } 
		else 
		{
					$data['category']  = $this->Model_login->category_view_id();
					$this->session->set_flashdata('item', array('message' => 'Category Not Deleted','class' => 'error'));
				    $this->load->view('Admin_header');
					$this->load->view('Addnewcategory',$data);
					$this->load->view('Admin_footer');
            
        }
    }
	


	public function category_view()
    {
        
        if ($this->session->userdata('logged_in') != "") 
		{
            
            $id  = $_GET['id'];
            $data['category_updateview_id'] = $this->Model_login->category_updateview_id($id);
			$this->session->set_flashdata('item', array('message' => 'Category Details','class' => 'error'));
            $this->load->view('Admin_header');
            $this->load->view('Categoryupdateview', $data);
            $this->load->view('Admin_footer');
            
        } 
		else 
		{
            
            $this->load->view('Headerview');
			$this->load->view('Loginview');
			$this->load->view('Footerview');
            
        }
    }
	

	public function edit_categorydetails()
    {
        if ($this->session->userdata('logged_in') != "") {
            
            $id   = $this->input->post('did');
			$date=date('Y-m-d H:i:s');
				
                $data = array(
								'cat_name' => $this->input->post('cname'),
								'cat_id' => $id,
								'cat_time' =>$date
							);
           //print_r($data);
			//die();
            $add=$this->Model_login->update_category($id, $data);
			if($add!=='')
					{ 
				
						$data['category']  = $this->Model_login->category_view_id();
						$this->load->view('Admin_header');
						$this->load->view('Addnewcategory',$data);
						$this->load->view('Admin_footer');
					}
           
        } 
		else 
		{
            
        ?>	
			<script type="text/javascript">
				var back = document.referrer;
				window.location.replace(back);
			</script>  
        <?php
        }
        
    }
    
}
?>
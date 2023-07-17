<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();      
        $this->load->model('main_model');
		$this->load->library('pagination');
		
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		
		if($userid == false){
			redirect(base_url());
		}	
    }
	
	public function index()
	{
	if($this->input->post('searchentry') ==true)
	{
		$data['users'] = $this->main_model->getuserentries($this->input->post('searchentry'));
	}
	else
	{
	$userentriescount = $this->main_model->userpageentriescount();   
	
	$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
	$config['base_url'] = base_url().'user/';
	$config['total_rows'] = $userentriescount;
	$config['per_page'] = 20; 
	$offset = $currentpage ;
	$this->pagination->initialize($config);
	
     $data['users'] = $this->main_model->userpageentries($config['per_page'],$offset); 
	 //echo $this->db->last_query();
	}
	

		$this->load->view('include/headerhome');
		$this->load->view('include/leftside');
		$this->load->view('user/user',$data);
		$this->load->view('include/footerhome');
	}
	public function add()
	{
		
	if($this->input->post('submit') ==true)
	{
		if($this->input->post('status') == true)
			{
				
				$status = '1';
			}
			else{
				$status = '0';
			}
		
			$pass = $this->input->post('password');
            $salt = uniqid(mt_rand(), true);
            $password = sha1($pass.$salt);
            $sha_key = $salt;
            $password = $password;
			
			$data=array('name'=>$this->input->post('name'),
	            'password'=>$password,
				'sha_key'=>$sha_key,
			    'emp_code'=>$this->input->post('emp_code'),
			    'city'=>$this->input->post('city'),
				'zipcode'=>$this->input->post('zipcode'),
                'phone'=>$this->input->post('phone'),
				'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
				'state'=>$this->input->post('state'),
                'gender'=>$this->input->post('gender'),  
				'user_group_id' => '1',
		        'status'=>$status
				 );
				 
		$this->main_model->insert_dataa($data);
        redirect(base_url().'index.php/user?msg=user entry Added Successfully');
	 }	
		$this->load->view('include/headerhome');
		$this->load->view('include/leftside');
		$this->load->view('user/adduser');
		$this->load->view('include/footerhome');
		
	}
	public function edit()
	{
	 $id=$this->uri->segment(3);
    $data['user'] = $this->main_model->getuserbyid($id);
	if($this->input->post('pathtype') == 'edit')
	{
			$pass = $this->input->post('newpassword');
            $salt = uniqid(mt_rand(), true);
            $password = sha1($pass.$salt);
            $sha_key = $salt;
            $password = $password;
			
			if($this->input->post('status') == true)
			{				
				$status = '1';
			}
			else{
				$status = '0';
			}
			
			
			if($this->input->post('cngpassword') == true){
				
			
	 $data = array('name'=>$this->input->post('name'),
	            'password'=>$password,
				'sha_key'=>$sha_key,
				'emp_code'=>$this->input->post('emp_code'),
			    'city'=>$this->input->post('city'),
				'zipcode'=>$this->input->post('zipcode'),
                'phone'=>$this->input->post('phone'),
				'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
				'state'=>$this->input->post('state'),
			    'gender'=>$this->input->post('gender'),
				'status'=>$status
				);  
			}
			else{
				
				$data = array('name'=>$this->input->post('name'), 
				'emp_code'=>$this->input->post('emp_code'),
			    'city'=>$this->input->post('city'),
				'zipcode'=>$this->input->post('zipcode'),
                'phone'=>$this->input->post('phone'),
				'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
				'state'=>$this->input->post('state'),
			    'gender'=>$this->input->post('gender'),
				'status'=>$status
				); 
				
			}
                $id=$this->uri->segment(3);
                $this->main_model->updateuser($data,$id);
		
		redirect(base_url().'index.php/user?msg= User Entry Updated successfully');	
		
	}
	    $this->load->view('include/headerhome');
		$this->load->view('include/leftside');
		$this->load->view('user/adduser',$data);
		$this->load->view('include/footerhome'); 
	}
	
	public function delete()
	{
	
	$id = $this->uri->segment(3);
	$this->main_model->userdelete($id);	

//echo $this->db->last_query();	
	redirect(base_url().'index.php/user?msg= User Entry Deleted Successfully');	
		
		
	
	}
	
	
	
}


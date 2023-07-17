<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();      
        $this->load->model('main_model');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->helper('general');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$userdata = $this->session->userdata('admin_session');
		
    }
	
	public function index()
	{
        $userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		//print_r($userid);die;
		if($userid == false){
			redirect(base_url());
		}
	if($this->input->post('searchentry') ==true)
	{
		$data['users'] = $this->main_model->getuserentries(trim($this->input->post('searchentry')));
	}
	else
	{
	$userentriescount = $this->main_model->userpageentriescount();   
	
	$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
	$config['base_url'] = base_url().'users-list/';
	$config['total_rows'] = $userentriescount;
	$config['per_page'] = 25; 
	// Bootstrap 4, work very fine.
	$config['full_tag_open'] = '<ul class="pagination">';
	$config['full_tag_close'] = '</ul>';
	$config['attributes'] = ['class' => 'page-link'];
	$config['first_link'] = false;
	$config['last_link'] = false;
	$config['first_tag_open'] = '<li class="page-item">';
	$config['first_tag_close'] = '</li>';
	$config['prev_link'] = '&laquo';
	$config['prev_tag_open'] = '<li class="page-item">';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = '&raquo';
	$config['next_tag_open'] = '<li class="page-item">';
	$config['next_tag_close'] = '</li>';
	$config['last_tag_open'] = '<li class="page-item">';
	$config['last_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
	$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
	$config['num_tag_open'] = '<li class="page-item">';
	$config['num_tag_close'] = '</li>';
	$offset = $currentpage ;
	$this->pagination->initialize($config);

     $data['users'] = $this->main_model->userpageentries($config['per_page'],$offset); 
	 //echo $this->db->last_query();
	}
	
	$data['vcount'] = $this->main_model->gettotalverifycount();
	$data['acount'] = $this->main_model->gettotalapprovedcount();
	$this->load->view('include/sidbiheadernew',$data);
	//$this->load->view('include/leftside');
	$this->load->view('user/user',$data);
	$this->load->view('include/sidbifooternew');
	
	}
	public function RemoveSpecialChar($string)
    {
	    $string = str_replace(array('[\', \']'), '', $string);
	    $string = preg_replace('/\[.*\]/U', '', $string);
	    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '', $string);
	    $string = strip_tags($string);
	    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '', $string );
	    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '', $string);
	     
	    return $string;
    }
	
	public function userprofile(){
		
		/*
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		//print_r($userid);die;
		if($userid == false){
			redirect(base_url());
		}
		$this->load->library('form_validation');
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
			*/
			
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
			
	    //echo $this->uri->segment(2);
		if($this->uri->segment(2) == true){
			
			$userid = $this->uri->segment(2);
			
		}
	

	    if($this->input->post('submit') == true)
	    {
			if(!empty($this->input->post('password'))){
			    $this->form_validation->set_rules('fullname', 'Username', 'trim|required|min_length[2]|max_length[100]');
				$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_valid_password['.$this->input->post("password").']');
				$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required|callback_old_password_match['.$this->input->post("oldpassword").', '.$this->input->post("email").']');
				if ($this->form_validation->run() == TRUE){
					//echo 'test';die;
				    $pass = $this->input->post('password');
		            $salt = uniqid(mt_rand(), true);
		            $password = sha1($pass.$salt);
		            $sha_key = $salt;
		            $password = $password;
			        $data=array(
			        	'name'=>trim(addslashes($this->input->post('fullname'))), //$this->RemoveSpecialChar
			            'password'=>$password,
						'sha_key'=>$sha_key,
					    'email'=>$this->input->post('email'),
					    'mobile'=>$this->input->post('mobile'),
		                'phone'=>$this->input->post('mobile'),
						'state'=>$this->input->post('usrstate'),
						'organization'=>$this->input->post('organization'),
						'designation'=>$this->input->post('designation'),
		                'branch'=>$this->input->post('branch'),  
						'nodalofficer'=>$this->input->post('nodalofficer'),  
						'user_group_id' => $this->input->post('usrrole'),  
				        //'status'=>$status
						 );
			        $isupdate = true;
		        } else{
		        	$this->session->set_flashdata('msg', 'Your Old Password not correct Or new password wrong pattern please follow given below pattern');
		            redirect(base_url().'user-profile');
		        } 
		        
	        } else{
			$data=array('name'=>trim(addslashes($this->input->post('fullname'))), //$this->RemoveSpecialChar  
				    'email'=>$this->input->post('email'),
				    'mobile'=>$this->input->post('mobile'),
	                'phone'=>$this->input->post('mobile'),
					'state'=>$this->input->post('usrstate'),
					'organization'=>$this->input->post('organization'),
					'designation'=>$this->input->post('designation'),
					'nodalofficer'=>$this->input->post('nodalofficer'),  
	                'branch'=>$this->input->post('branch'),  
					'user_group_id' => $this->input->post('usrrole'),  
			       // 'status'=>$status
					);
	    }
		$this->main_model->updateuser($data,$userid);
		if($isupdate == true){
		   $this->session->set_flashdata('msg', 'User Password Updated Successfully');
		   header("Refresh: 5; URL=".base_url()."login/logout");
		   //redirect(base_url().'login/logout');
		} else { 
			$this->session->set_flashdata('msg', 'User Updated Successfully');
		   if($this->input->post('isedit') == true){
			   redirect(base_url().'users-list'); 
		   }
		}

	}
	$data['vcount'] = $this->main_model->gettotalverifycount();
	$data['acount'] = $this->main_model->gettotalapprovedcount();
	$data['userdetails'] = $this->main_model->getuserbyid($userid);
	$data['nodalofficers'] = $this->user_model->getnodalofficers();
	
	$this->load->view('include/sidbiheadernew',$data);
	$this->load->view('user/userprofile',$data);
	$this->load->view('include/sidbifooternew');
		
	}
	
	public function changepassword(){
		
		$data= array();
		
		$this->load->view('include/headerhomenew');
		$this->load->view('user/changepassword',$data);
		$this->load->view('include/footerhomenew');
		
	}
	public function validate_captcha($sessionName) {
        
        if ($this->input->post('registercaptcha',true) != $this->session->userdata[$sessionName]) {
            $this->form_validation->set_message('captcha', 'Cpatcha Code is wrong');
            return false;
        } else {
            return true;
        }
    }
	public function register()
	{
		
	$this->load->helper(array('form', 'url'));	
	$this->load->library('form_validation');			
	if($this->input->post('submit') ==true)
	{

		$this->form_validation->set_rules('fullname', 'Username', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_valid_password['.$this->input->post("password").']');
		
		if ($this->form_validation->run() == TRUE){
			
	    $sessionName ='Registreduser'; 	
		
        if ($this->input->post('registercaptcha',true) != $this->session->userdata[$sessionName]) {
			
            $this->form_validation->set_message('captcha', 'Cpatcha Code is wrong');
            $data['captchImage'] = generate_captcha('Registreduser');
            $this->session->set_flashdata('msg', 'Invalid Captcha Image');
			
			redirect(base_url().'register');
			
        } else {
        
		$isexists = $this->main_model->isemailexists($this->input->post('email'));
        if($isexists <= 0){ 
	    if($this->input->post('status') == true)
			{
				
				$status = '1';
			}
			else{
				$status = '1';
			}
		
			$pass = $this->input->post('password');
            $salt = uniqid(mt_rand(), true);
            $password = sha1($pass.$salt);
            $sha_key = $salt;
            $password = $password;
			$data=array(
						'name'    =>html_escape($this->input->post('fullname')),
			            'password'=>$password,
						'sha_key' =>$sha_key,
					    'email'   =>html_escape($this->input->post('email')),
					    'mobile'  =>html_escape($this->input->post('mobile')),
		                'phone'   =>html_escape($this->input->post('mobile')),
						'state'   =>html_escape($this->input->post('usrstate')),
		                'organization'=>html_escape($this->input->post('organization')), 
                        'designation'=>html_escape($this->input->post('designation')),                          						 
						'user_group_id' => '4',
				        'status'  =>$status
						 );
				 
		$this->main_model->insert_dataa($data);
		$this->session->set_flashdata('msg', 'User Registred Successfully');
		
        if($this->session->userdata('admin_session') == false){
                 redirect(base_url());
			}
			else{
				redirect(base_url().'users-list'); 
			}
			
	}

	else 
	{
		$data['captchImage'] = generate_captcha('Registreduser');
        $this->session->set_flashdata('msg', 'Email Id already exists');
		
		redirect(base_url().'register');
	}
    }
	
	}	
	
	}
	    $data['captchImage'] = generate_captcha('Registreduser');
		$this->load->view('user/register', $data);

		
	}
	
	public function captcha_refresh()
    {
       
       echo generate_captcha('Registreduser');
    }
	public function add()
	{
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		//print_r($userid);die;
		if($userid == false){
			redirect(base_url());
		}
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
				'user_group_id' => '4',
		        'status'=>$status
				 );
				 
		$this->main_model->insert_dataa($data);
		$this->session->set_flashdata('msg', 'user entry Added Successfully');
        redirect(base_url().'/user');
	 }	
		$this->load->view('include/headerhome');
		$this->load->view('include/leftside');
		$this->load->view('user/adduser');
		$this->load->view('include/footerhome');
		
	}
	
	
	public function edit()
	{
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		//print_r($userid);die;
		if($userid == false){
			redirect(base_url());
		}
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
		$this->session->set_flashdata('msg', 'User Entry Updated successfully');
		redirect(base_url().'index.php/user');	
		
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

    $this->session->set_flashdata('msg', 'User Entry Deleted Successfullyy');
	redirect(base_url().'index.php/user');	
		
		
	
	}
public function old_password_match($old_pass, $emial){
    $field = array('sha_key');
    $email = explode(',', $emial);
    $match = array('email'=> trim($email[1]));
    $sha = $this->user_model->getuser($field,$match,'','=');
   //print_r($sha);die;
    if($sha){
        $sha = $sha[0]['sha_key'];
        $password = sha1($old_pass.$sha);
        $field = array('id','name','email');
        $match = array('email'=>trim($email[1]),'password'=>$password);
        $udata = $this->user_model->getuser($field, $match,'','=');
    } 
    if(count($udata) > 0){
    	return true;
    } else{
    	$this->form_validation->set_message('old_password_match', 'Please Enter correct Old Password.');
    	return false;
    }

}	
public function valid_password($password = '')
	{
		$password = trim($password);
		//echo $password; die;
		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'Please Enter correct Password. Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', ' Please Enter correct Password. Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'Please Enter correct Password. Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'Please Enter correct Password. Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'Please Enter correct Password. Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long.');

			return FALSE;
		}

		if (!strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'Please Enter correct Password. Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long.');

			return FALSE;
		}

		return TRUE;
	}	
	
	
	
}


<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller {

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
		$data['organizations'] = $this->main_model->getorgaentries($this->input->post('searchentry'));
	}
	else
	{
	$category = '';	
	
	$customerentriescount = $this->main_model->orgapageentriescount($category);   
	
	$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
	$config['base_url'] = base_url().'organization/';
	$config['total_rows'] = $customerentriescount;
	$config['per_page'] = 20; 
	$offset = $currentpage ;
	$this->pagination->initialize($config);
	
     $data['organizations'] = $this->main_model->orgapageentries($config['per_page'],$offset,$category); 
	 //echo $this->db->last_query();
	}

	$this->load->view('include/headerhome');
	$this->load->view('include/leftside');
	$this->load->view('organization/organization',$data);
	$this->load->view('include/footerhome');
	
	}
	
	public function add()
	{		
		
	if($this->input->post('submitdata')==true)
	{
		 
      if($this->input->post('status') == true)
	  {				
				$status = 'valid';
			}
			else{
				$status = 'unvalid';
			}		

  

	$data=array(
	'cert_name'=>trim(addslashes($this->input->post('cert_name'))),
	'cert_number'=>trim(addslashes($this->input->post('cert_number'))),
	'country'=>trim($this->input->post('country')),
	'address'=>trim(addslashes($this->input->post('address'))),
    'cab_name'=>trim(addslashes($this->input->post('cab_name'))),
	'status'=>$status
	
	);
	
	
	$this->main_model->insert_organization($data);
	
	 redirect(base_url().'organization?msg=organization Added Successfully');
	 
	}
	
	$this->load->view('include/headerhome');
	$this->load->view('include/leftside');
	$this->load->view('organization/addorganization');
	$this->load->view('include/footerhome');
	
	
	}
	
	function edit(){
		
		$id = $this->uri->segment(3);		
		$data['ddetail'] = $this->main_model->getorgabyid($id);
		
		if($this->input->post('pathtype') == 'edit'){
		
			if($this->input->post('status') == true){
				
				$status = 'valid';
			}
			else{
				$status = 'invalid';
			}
			
			
			$data=array('cert_name'=>trim($this->input->post('cert_name')),
				'cert_number'=>trim($this->input->post('cert_number')),
				'country'=>trim($this->input->post('country')),
				'address'=>trim($this->input->post('address')),
				'cab_name'=>trim($this->input->post('cab_name')),
				'status'=>$status				
				);
						
			
		$this->main_model->updateorga($data,$id);		
		
		redirect(base_url().'organization?msg=organization Added Successfully');
		
		}
		$this->load->view('include/headerhome');
	    $this->load->view('include/leftside');
	    $this->load->view('organization/addorganization',$data);
	    $this->load->view('include/footerhome');
			
	   }
	   
	function delete(){
	
	   $id = $this->uri->segment(3);
	   $this->main_model->deleteorga($id);		
	   redirect(base_url().'organization?msg=organization Deleted Successfully');	
	
	}
	
	
}
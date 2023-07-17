<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {

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
		$data['certificates'] = $this->main_model->getcertentries($this->input->post('searchentry'));
	}
	else
	{
	$category = '';	
	
	$customerentriescount = $this->main_model->certpageentriescount($category);   
	
	$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
	$config['base_url'] = base_url().'certificate/';
	$config['total_rows'] = $customerentriescount;
	$config['per_page'] = 20; 
	$offset = $currentpage ;
	$this->pagination->initialize($config);
	
     $data['certificates'] = $this->main_model->certpageentries($config['per_page'],$offset,$category); 
	 //echo $this->db->last_query();
	}

	$this->load->view('include/headerhome');
	$this->load->view('include/leftside');
	$this->load->view('certificate/certificate',$data);
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
	'scope'=>trim(addslashes($this->input->post('scope'))),	
	'cab_name'=>trim(addslashes($this->input->post('cab_name'))),
	'standard'=> trim(addslashes($this->input->post('standard'))),
	'status'=>$status
	
	);
	
	
	$this->main_model->insert_certificate($data);
	
	 redirect(base_url().'certificate?msg=Certificate Added Successfully');
	 
	}
	
	$this->load->view('include/headerhome');
	$this->load->view('include/leftside');
	$this->load->view('certificate/addcertificate');
	$this->load->view('include/footerhome');
	
	
	}
	
	function edit(){
		
		$id = $this->uri->segment(3);		
		$data['ddetail'] = $this->main_model->getcertbyid($id);
		
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
				'scope'=>trim($this->input->post('scope')),
				'standard'=>trim($this->input->post('standard')),
				'cab_name'=>trim($this->input->post('cab_name')),
				'status'=>$status				
				);
						
			
		$this->main_model->updatecert($data,$id);		
		
		redirect(base_url().'certificate?msg=Certificate Added Successfully');
		
		}
		$this->load->view('include/headerhome');
	    $this->load->view('include/leftside');
	    $this->load->view('certificate/addcertificate',$data);
	    $this->load->view('include/footerhome');
			
	   }
	   
	function delete(){
	
	   $id = $this->uri->segment(3);
	   $this->main_model->deletecert($id);		
	   redirect(base_url().'certificate?msg=Certificate Deleted Successfully');	
	
	}
	
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();      
        $this->load->model('main_model');
		
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		
		if($userid == false){
			redirect(base_url());
		}
		
    }
	public function index()
	{   
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		
		if($userid == false){
			redirect(base_url());
		}
		
		$data['previousentries']=$this->main_model->frontuserentriesdata();
		$data['workerentries']=$this->main_model->frontuserworkerdata();
		$data['cuttingentries']=$this->main_model->frontusercuttingdata();
		$data['cuttingentrys']=$this->main_model->cuttingdateshow();
		$data['cuttingentry']=$this->main_model->completedateshow();
		$data['workerentrys']=$this->main_model->remainningdatashow();
		$data['workerentry']=$this->main_model->completedatashow();
		$data['totalentries']=$this->main_model->totalentriesshow(); 
		$data['totalstatus']=$this->main_model->totalstatusactive();
		
		$data['delivery']=$this->main_model->deliverydateshow();
		$data['deliverd']=$this->main_model->delivereddateshow();
		$this->load->view('include/headerhome');
		$this->load->view('include/leftside');
		$this->load->view('home',$data);
		$this->load->view('include/footerhome');
	}
	
	public function searchcust()
	{
		
	 $this->main_model->getcustajaxdetail($_POST['query']);
	
	}
	
	public function dashboard()
	{
		
	$data['vcount'] = $this->main_model->gettotalverifycount();
	$data['acount'] = $this->main_model->gettotalapprovedcount();
	$data['getdoc'] = $this->main_model->gethomedocuments();	
	$data['rejectedcount'] = $this->main_model->getrejectcount();
	$data['approvedcount'] = $this->main_model->getapprovecount();
	$data['verifiedcount'] = $this->main_model->getverifiedcount();
	$data['pendingcount'] = $this->main_model->getpendingcount();
	
	$this->load->view('include/sidbiheadernew',$data);
	$this->load->view('dashboard',$data);
	$this->load->view('include/sidbifooternew');		
		
	}
	
	
	public function contactus()
	{
		
	$data['vcount'] = $this->main_model->gettotalverifycount();
	$data['acount'] = $this->main_model->gettotalapprovedcount();
	//$data['getdoc'] = $this->main_model->gethomedocuments();	
	
	$this->load->view('include/sidbiheadernew',$data);
	$this->load->view('contactus',$data);
	$this->load->view('include/sidbifooternew');		
		
	}
	
	
}

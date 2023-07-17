<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Tcbp extends CI_Controller {

    function __construct()
    {
        parent::__construct();      
        $this->load->model('main_model');
		$this->load->library('pagination');
		$this->load->helper(array('form', 'url'));	
	    $this->load->library('form_validation');
	    $this->load->library('session');
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		
		if($userid == false){
			redirect(base_url());
		}
	
    }
	
	public function index()
	{		
		 //echo 'hi';exit;	
		$tcbptype = 'goi';
		
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		
		$data['userdetails'] = $this->main_model->getuserbyid($userid);
		
		if($this->input->post('searchentry') == true)
		{
			$data['tcbps'] = $this->main_model->gettcbpentries($this->input->post('searchentry'),$tcbptype);
		}
		else
		{
		$category = '';	
		
		$tcpcentriescount = $this->main_model->tcpcpageentriescount($category);   
		$data['total_rows'] = $tcpcentriescount;
		$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
		$config['base_url'] = base_url().'task-list/';
		$config['total_rows'] = $tcpcentriescount;
		$config['per_page'] = 20; 
		$offset = $currentpage ;
		$this->pagination->initialize($config);
		
		 $data['tcbps'] = $this->main_model->tcpcpageentries($config['per_page'],$offset,$category); 
		 //echo $this->db->last_query();
		}
		
		$data['vcount'] = $this->main_model->gettotalverifycount();
		$data['acount'] = $this->main_model->gettotalapprovedcount();
			
		//$this->load->view('include/headerhomenew');
		//$this->load->view('include/leftside');
		$this->load->view('include/sidbiheadernew',$data);
		$this->load->view('tasklist/tcbp',$data);
		$this->load->view('include/sidbifooternew');
		//$this->load->view('include/footerhomenew');
	
	}
	
	
	public function getdocumentsbytasks(){
		
		//echo  'It works '.$this->input->post('taskid');
		 $uploaddocs = $this->main_model->getuploadeddocuments($this->input->post('taskid')); 
		 //print_r($uploaddocs);
		  echo '<div  class="col-md-12"><div class="row"><div class="col-md-3"><h6>Uploaded By</h6></div><div class="col-md-3"><h6>Document</h6></div><div class="col-md-2"><h6>Remarks</h6></div><!--div class="col-md-2"><h6>Date/Time</h6></div--><div class="col-md-1"><h6>Status</h6></div></div></div>';
		 foreach($uploaddocs as $uploaddoc){ ?>
			 
			<div  class="col-md-12"><div class="row" style="border-bottom: 1px solid silver;margin-bottom: 2px;"><div class="col-md-3"><?php echo ucfirst($uploaddoc['name']); ?><br/><a href="mailto:<?php echo $uploaddoc['email']; ?>"><?php echo  $uploaddoc['email']; ?></a><br/><a href="callto:<?php echo  $uploaddoc['mobile']; ?>"><?php echo $uploaddoc['mobile']; ?></a></div><div class="col-md-3"><a href="<?php echo base_url().'uploads/documents/'.$uploaddoc['document']; ?>" target="_blank"><?php echo  $uploaddoc['document']; ?></a></div><div class="col-md-2" style="word-wrap: break-word;"><p><?php echo $uploaddoc['remarks']; ?></p></div><!--div class="col-md-2"><?php echo $uploaddoc['lastupdated']; ?></div--><div class="col-md-3"><h6><?php if($uploaddoc['isapproved'] == true){ echo '<b style="color:green;">Approved</b>'; } else if($uploaddoc['isrejected'] == true){  echo '<b style="color:red;">Rejected</b>'; } else if($uploaddoc['isverified'] == true){ echo '<b style="color:orange;">Verified</b>'; }  else { echo '<b style="color:#000;">Pending</b>';  } ?></h6> 		<?php if($uploaddoc['verifydate'] != ''){ echo '<br/><b style="font-weight:bold;color:#ffc107;">Verified Date: '.str_replace('~~',' ',$uploaddoc['verifydate']).'</b>'; } ?>
										
										<?php if($uploaddoc['rejecteddate'] != ''){ echo '<br/><b style="font-weight:bold;color:red;">Reject : '.str_replace('~~',' ',$uploaddoc['rejecteddate']) .'</b>'; } ?>
										
										<?php if($uploaddoc['approvedate'] != ''){ echo '<br/><b style="font-weight:bold;color:green;">Approve : '.str_replace('~~',' ',$uploaddoc['approvedate']) .'</b>'; } ?>
										<?php echo '<br/><b>Last Updated: </b>'.$uploaddoc['lastupdated'];?> </div></div></div>
		<?php  }
	}
	
	public function rejectdoc(){
		$docid = $this->uri->segment(3);	
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];	
		$remarks = $this->RemoveSpecialChar(trim(strip_tags($this->input->post('remark'))));	
		$r = $this->main_model->rejectdoc($docid,$userid,$remarks);
		if($this->input->post('pagetype') == 'verifier'){
		   $this->session->set_flashdata('msg', 'Document has been Rejected!');
		   redirect(base_url().'verifier-manager');
		}else{
			$this->session->set_flashdata('msg', 'Document has been Rejected!');
			redirect(base_url().'approval-manager');
		}
		
	}
	public function doquery()
	{
		$docid = $this->uri->segment(3);	
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];	
		$remarks = $this->RemoveSpecialChar(trim(strip_tags($this->input->post('verifierquery'))));	
		$taskid = $this->input->post('taskid');
		$r = $this->main_model->verifierquery($docid,$userid,$remarks,$taskid);
		$this->session->set_flashdata('msg', 'Query has been Successfully submited!');
		redirect(base_url().'verifier-manager');
		
	}
	public function doapproverquery() {
		$docid = $taskid = $this->input->post('docid');;	
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];	
		$remarks = $this->RemoveSpecialChar(trim(strip_tags($this->input->post('approverquery'))));	
		$taskid = $this->input->post('taskid');
		$r = $this->main_model->approverquery($docid,$userid,$remarks,$taskid);
		$this->session->set_flashdata('msg', 'Query has been Successfully submited!');
		redirect(base_url().'approval-manager');
	}
	public function verifydoc(){
		//echo 'narendra'; die;
		$docid = $this->uri->segment(3);
		$userdata = $this->session->userdata('admin_session');
		$remark = trim(strip_tags($this->input->post('verifyremark')));
		$userid = $userdata['id'];
		$v = $this->main_model->veridfydoc($docid,$userid,$remark);
		$this->session->set_flashdata('msg', 'Document Verify successfully!');
		redirect(base_url().'verifier-manager');
		
	}
	
	public function approvedoc(){
		$remark = trim(strip_tags($this->input->post('remark')));
		$docid = $this->uri->segment(3);
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		$v = $this->main_model->approvedoc($docid,$userid, $remark);
		$this->session->set_flashdata('msg', 'Document Approved successfully!');
		redirect(base_url().'approval-manager');
		
	}
	
	
	public function RemoveSpecialChar($str)
    {
	    $res = preg_replace('/[@\.\>\"\'\\;\""]+/', '', $str);
	     $fres = str_ireplace(array('&lt;b&gt;', '&lt;/b&gt;', '&lt;h2&gt;', '&lt;/h2&gt;'), '',
         htmlspecialchars( $res));
	    return $fres;
    }
	public function taskmanager(){
		
		$tcbptype = 'goi';
		$userdata = $this->session->userdata('admin_session');
		$userid = $userdata['id'];
		//print_r($this->input->post('taskname'));
		$data['parenttasks'] = $this->main_model->allparenttask(); 
		$data['msg'] = '';
		
		if(strip_tags($this->input->post('taskname')) != ''){
		$this->form_validation->set_rules('taskname', 'Task Name', 'trim|required|strip_tags');
		if ($this->form_validation->run() == TRUE){
		$tdata=array('tcbptype'=>$tcbptype,
		'taskname'=>$this->RemoveSpecialChar(trim(strip_tags($this->input->post('taskname')))),
		'parenttask'=>trim(strip_tags($this->input->post('ptask'))),		
		'totalparticipants'=>trim(strip_tags($this->input->post('totalparticipants'))),		
		'tcbp_states'=>trim(strip_tags($this->input->post('usrstate'))),		
		'userid'=>trim($userid),
		'status'=>'1'				
		);
		//$this->RemoveSpecialChar($tdata);
		
		$this->main_model->addtask($tdata);
		$id = $this->db->insert_id();
		
		if($this->input->post('ptask') == '--Parent Task--'){
			
			$id = $this->db->insert_id();
			$this->main_model->updateparenttaskid($id);
			
		}
		 $data['msg'] = 'Task added successfully';
		}
				
		}			
							
		if($this->input->post('searchentry') ==true)
		{
			$data['tcbps'] = $this->main_model->gettcbpentries($this->input->post('searchentry'),$tcbptype);
		}
		else
		{
		$category = '';	
		
		$tcpcentriescount = $this->main_model->tcpcpageentriescount($category);   
		$data['total_rows'] = $tcpcentriescount;
		$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
		$config['base_url'] = base_url().'task-manager/';
		$config['total_rows'] = $tcpcentriescount;
		$config['per_page'] = 500; 
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
		
		 $data['tcbps'] = $this->main_model->tcpcpageentriesall($config['per_page'],$offset,$category); 
		 //echo $this->db->last_query();
		}
	
		$data['vcount'] = $this->main_model->gettotalverifycount();
		$data['acount'] = $this->main_model->gettotalapprovedcount();
		$this->load->view('include/sidbiheadernew',$data);
	    $this->load->view('tasklist/taskmanager',$data);
		$this->load->view('include/sidbifooternew');
		
		
	}
	
	
	public function getalltasks(){
				
		//print_r($this->input->post());		
		$searchtxt = $this->input->post('taskname');
		$searchptask = $this->input->post('ptask');
		$searchusrstate = $this->input->post('usrstate');
				
		$data= array();
		$tcbptype = 'goi';
		//$searchtxt = $this->input->post('textsearch');
		$tcpcentriescount = $this->main_model->tcpcpageentrieschildallcount($searchtxt,$searchptask,$searchusrstate);   
		//echo ($tcpcentriescount); exit;
		
		$data['total_rows'] = $tcpcentriescount;
		$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
		$config['base_url'] = base_url().'alltasks/';
		$config['total_rows'] = $tcpcentriescount;
		$config['per_page'] = 50; 
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
		
		$data['tcbps'] = $this->main_model->tcpcpageentrieschildall($config['per_page'],$offset,$searchtxt,$searchptask,$searchusrstate); 
		// echo $this->db->last_query();//exit;
		 
		$data['parenttasks'] = $this->main_model->allparenttask(); 
		$data['vcount'] = $this->main_model->gettotalverifycount();
		$data['acount'] = $this->main_model->gettotalapprovedcount();
		
		//$this->load->view('include/headerhomenew');
		$this->load->view('include/sidbiheadernew',$data);
		$this->load->view('tasklist/alltasks',$data);
		$this->load->view('include/sidbifooternew');
		//$this->load->view('include/footerhomenew');
		
	} 
	public function approvereport(){
				
		//print_r($this->input->post());		
		$searchtxt = $this->input->post('taskname');
		$searchptask = $this->input->post('ptask');
		$searchusrstate = $this->input->post('usrstate');
				
		$data= array();
		$tcbptype = 'goi';
		//$searchtxt = $this->input->post('textsearch');
		$tcpcentriescount = $this->main_model->approvetcpcpageentrieschildallcount($searchtxt,$searchptask,$searchusrstate);   
		//echo ($tcpcentriescount); exit;
		
		$data['total_rows'] = $tcpcentriescount;
		$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
		$config['base_url'] = base_url().'alltasks/';
		$config['total_rows'] = $tcpcentriescount;
		$config['per_page'] = 50; 
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
		
		$data['tcbps'] = $this->main_model->approvetcpcpageentrieschildall($config['per_page'],$offset,$searchtxt,$searchptask,$searchusrstate); 
		// echo $this->db->last_query();//exit;
		 
		$data['parenttasks'] = $this->main_model->allparenttask(); 
		$data['vcount'] = $this->main_model->gettotalverifycount();
		$data['acount'] = $this->main_model->gettotalapprovedcount();
		
		//$this->load->view('include/headerhomenew');
		$this->load->view('include/sidbiheadernew',$data);
		$this->load->view('tasklist/approvereport',$data);
		$this->load->view('include/sidbifooternew');
		//$this->load->view('include/footerhomenew');
		
	} 
	public function statelist(){
		
		$data= array();
		
		$this->load->view('include/headerhomenew');
		$this->load->view('tasklist/statelist',$data);
		$this->load->view('include/footerhomenew');
		
	}

	public function finalsave(){
		$userdata = $this->session->userdata('admin_session');
		$username = $userdata['name'];
		$useremail = $userdata['useremail'];
	    $userid = $userdata['id'];
	    $taskid = trim(addslashes(strip_tags($this->input->post('utaskid'))));
		$data = []; 
		if($this->input->post('submitfinaldata')==true)
		{
            $redirecturi = $this->input->post('redirecturi');
            $data=array(
				'taskid'=>trim(addslashes(strip_tags($this->input->post('utaskid')))),	
				'userid'=>$userid,
				'querysubmit'=>trim(strip_tags($this->input->post('remark'))),
				'status' => '1'
			);				
			$this->main_model->update_status($data, $taskid);
			$this->main_model->updatetcp($taskid);
		}
		
		$this->session->set_flashdata('msg', 'final submit successfully!');
		/************************** Start Mail **********************/

					$user_name = $username;
                    $email_subject = "SIDBI Add Event Form Notification"; // The Subject of the email
                    $useremail = $useremail;
					$registration_no = '';

                    $eol = "\n";
                    $headers = "MIME-Version: 1.0" . $eol;
                    $headers .= "Content-Type: text/html; charset=UTF-8" . $eol;
                    $headers .= "From: noreply@sidbi.in" . $eol;
                    $headers .= "Reply-To: noreply@jsidbi.in" . $eol;

                    $email_message .= "<table width='100%'  border='0' cellspacing='0' cellpadding='0' align='left'>
					<tr><td colspan='3' align='left' class='text_mail' >Dear  $user_name,</td></tr>
					<tr><td colspan='3' class='text_mail'>&nbsp;</td></tr>
					<tr> <td colspan='3' align='left' class='text_mail'>Your Task /Event Form for  has been submitted successfully. Your Application Number is : <b>$registration_no</b>. Please visit the website for further updates. </td></tr>
					<tr><td  colspan='3'>&nbsp;</td></tr>
					
					<tr><td class='text_mail' colspan='3' align='left'>Regards,</td></tr>
					<tr><td class='text_mail' colspan='3' align='left'>Team SIDBI</td></tr>
					<tr><td  colspan='3'>&nbsp;</td></tr>
					<tr><td  colspan='3'>&nbsp;</td></tr>
					<tr><td class='text_mail' colspan='3' align='left'>This is system generated email do not reply.</td></tr>
					</table>";

                    try {
                        mail($email_to, $email_subject, $email_message, $headers);
                    } catch (Exception $exc) {
                        
					}

					/************************** END Mail ************************/

		redirect(base_url().$redirecturi);
		
	}
	
	public function add()
	{	
	//echo 'hiii'; 
   	$userdata = $this->session->userdata('admin_session');
	$userid = $userdata['id'];
	$data = []; 
	if($this->input->post('submitdata')==true)
	{
    $redirecturi = $this->input->post('redirecturi');
	$cnt_files = count($_FILES['docs']['name']);	
	for($i=0;$i<$cnt_files;$i++){


	if ($_FILES["docs"]["size"][$i] > 10485760) 
	{	//print_r($_FILES);
//die();
	$this->session->set_flashdata("msg","Could not upload document  Maximum 5 Document can upload ad a time .");
		// redirect(base_url().'task-manager');
		  redirect(base_url().$redirecturi);
	}else {
	$ext = pathinfo($_FILES["docs"]["name"][$i], PATHINFO_EXTENSION);
	//if($ext != "jpg" && $ext != "png" && $ext != "jpeg"&& $ext != "gif" ) {
	//$this->session->set_flashdata("error_message","only JPG, JPEG, PNG & GIF files are allowed.");
	// $data['Icon'] = 'Icon Image is required';
	// redirect('admin/edit_user_detail/'.$id);
	if(isset($_FILES["docs"]["name"][$i]) && $_FILES['docs']['error'][$i] == '0' && !empty($_FILES["docs"]["name"][$i]) )
	{
	$name = $_FILES["docs"]["name"][$i];
	$data = move_uploaded_file($_FILES["docs"]["tmp_name"][$i],"./uploads/documents/".$name);
	if(!$data)
	{
	//$error[]= $_FILES["docs"]["name"][$i].' Not Uploaded';
	$this->session->set_flashdata("msg",'Error ! Could not upload document');
	 redirect(base_url().$redirecturi);
	} else
	{
	$data=array(
				'taskid'=>trim(addslashes(strip_tags($this->input->post('utaskid')))),	
				'userid'=>$userid,
				'remarks'=>trim(strip_tags($this->input->post('remark'))),
				'document'=> $name
				
				);				
				
	$this->main_model->insert_taskdoc($data);
	$recentno = (int)$i+1;
	//echo $cnt_files.'  '.$recentno .'<br/>';exit;
	if($cnt_files == $recentno){
	$this->session->set_flashdata("msg","Document uploaded successfully.");
	redirect(base_url().$redirecturi);
	
	}
	
	}
	
	}
	}	

	}
	 
	}
	
	 $this->load->view('include/headerhomenew');
	$this->load->view('tasklist/addtcbp');
	$this->load->view('include/footerhomenew'); 
	
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
		$this->session->set_flashdata("msg","tcbp Added Successfully.");
		redirect(base_url().'tcbp');
		
		}
		$this->load->view('include/headerhomenew');
	    //$this->load->view('include/leftside');
	    $this->load->view('tasklist/addtcbp',$data);
	    $this->load->view('include/footerhomenew');
			
	   }
	   
	function deletedoc(){
	
	   $id = $this->uri->segment(3);
	   $this->main_model->deletedoc($id);	
	   $this->session->set_flashdata("msg","Document Deleted Successfully.");
	   redirect(base_url().'task-list');	
	
	}
	
	function verifierlist(){
		$groupid = $this->session->userdata('admin_session');
	    if($groupid['user_group_id'] == 3 || $groupid['user_group_id'] == 1){
		$searchtxt = $this->input->post('searchentry');
		
		$tcbptype = 'goi';
		//$searchtxt = $this->input->post('textsearch');
		$vmentrycount = $this->main_model->getdocforverifiercount($searchtxt);   
		//echo ($tcpcentriescount); exit;
		
		$data['total_rows'] = $vmentrycount;
		$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
		$config['base_url'] = base_url().'verifier-manager/';
		$config['total_rows'] = $vmentrycount;
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
		
		$data['cdocs'] = $this->main_model->getdocforverifier($offset,$config['per_page'],$searchtxt); 
		//echo $this->db->last_query();
		//$data['cdocs'] = $this->main_model->getdocforverifier(0,250,$searchtxt);
		$data['vcount'] = $this->main_model->gettotalverifycount();
		$data['acount'] = $this->main_model->gettotalapprovedcount();
		//$this->load->view('include/headerhomenew');
	    //$this->load->view('include/leftside');
		$this->load->view('include/sidbiheadernew',$data);
	    $this->load->view('tasklist/verifierlist',$data);
		$this->load->view('include/sidbifooternew');
	} else{
		$this->session->set_flashdata('msg', 'You are not authorization this page open ');
	    redirect('dashboard');
	}
	}
	
	
	function approverlist(){
		$groupid = $this->session->userdata('admin_session');
	    if($groupid['user_group_id'] == 3 || $groupid['user_group_id'] == 2){
		$searchtxt = $this->input->post('searchentry');
		
		$tcbptype = 'goi';
		//$searchtxt = $this->input->post('textsearch');
		$amentrycount = $this->main_model->getdocforapprovalcount($searchtxt);   
		//echo ($tcpcentriescount); exit;
		
		$data['total_rows'] = $amentrycount;
		$currentpage = ($this->uri->segment(2)== false )?'0':$this->uri->segment(2); 
		$config['base_url'] = base_url().'approval-manager/';
		$config['total_rows'] = $amentrycount;
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
		
		$data['cdocs'] = $this->main_model->getdocforapproval($offset,$config['per_page'],$searchtxt); 
		
		//$data['cdocs'] = $this->main_model->getdocforapproval(0,250);
		$data['vcount'] = $this->main_model->gettotalverifycount();
		$data['acount'] = $this->main_model->gettotalapprovedcount();
		$this->load->view('include/sidbiheadernew',$data);
	    //$this->load->view('include/leftside');
	    $this->load->view('tasklist/approverlist',$data);
	    $this->load->view('include/sidbifooternew');
	}  else{
		$this->session->set_flashdata('msg', 'You are not authorization this page open ');
	    redirect('dashboard');
	}
	
	}
	public function documentshow(){
		//$imagepath = $this->input->post();
		$data['ImagePath'] = $this->uri->segment(3);
		$this->load->view('tasklist/imageshow',$data);
	}
        public function download(){
		
		$this->load->view('include/sidbiheadernew');
		$this->load->view('tasklist/download');
		$this->load->view('include/sidbifooternew');

	}
}
<?php
class Main_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = ' ip_clients';
		$this->table_name2 = ' customerentries';
		$this->tcbp = ' tcbp';
        
      
    }
	
	
	public function isemailexists($emailid){
		
		$sql=$this->db->query('SELECT * FROM user WHERE email = "'.$emailid.'"');
		return $sql->num_rows();
	}
	  /*** Front user Entry Table  ***/
	  
	public function frontuserentriesdata()
	{
		$sql=$this->db->query('SELECT * FROM customerentries WHERE entrystatus = "active" ORDER BY deliverydate  ASC ');
		return $sql->result_array();
	}
	/*** Front user worker Table  ***/
	
	public function frontuserworkerdata()
	{
		$sql=$this->db->query('SELECT * FROM  workerentry  ORDER BY wo_uid');
		return $sql->result_array();
	}
	  /*** Front Cutting Entry Table  ***/
	  
	public function frontusercuttingdata()
	{
		$sql=$this->db->query('SELECT * FROM  cuttingentry  ORDER BY cu_uid');
		return $sql->result_array();
	}
	
	/**** get entry edit page details by id ****/
	
	public function getdetailsbyid($id)
	{
		
		$qry = $this->db->query('SELECT * FROM customerentries WHERE ce_id = '.$id);
		return $qry->row_array();
		
	}
	/***  customerentries search **/
	public function getsearchtodayentries($searhcentry)
	{
		$sql=$this->db->query("SELECT * FROM customerentries WHERE ce_custname LIKE '%".$searhcentry."%' OR ce_email LIKE '%".$searhcentry."%' OR ce_mobile LIKE '%".$searhcentry."%' OR deliverydate LIKE '%".$searhcentry."%'");
		return $sql->result_array();
	}
	
	/**** previous entry search ***/
	
	public function getsearchentries($searhcentry)
	{
		$sql=$this->db->query("SELECT * FROM customerentries WHERE ce_custname LIKE '%".$searhcentry."%' OR ce_email LIKE '%".$searhcentry."%' OR ce_mobile LIKE '%".$searhcentry."%' OR deliverydate LIKE '%".$searhcentry."%'");
		return $sql->result_array();
	}
	
	/**** Update entry ***/
	
	
	public function  updatecert($data,$id){		
			
			$this->db->where('cert_id', $id);
			$this->db->update('ukac_certificates', $data);
		
	}
	
	public function getcertbyid($id)
	{
		
		$qry = $this->db->query('SELECT * FROM ukac_certificates WHERE cert_id = '.$id);
		return $qry->row_array();
		
	}

	/**** Delete entry ***/ 	
	
	
	public function deletecert($id){
			$this->db->delete('ukac_certificates', array('cert_id' => $id));			
	}
	
	public function deletedoc($id){
			$this->db->delete('documents', array('docid' => $id));			
	}
	
	/**** List entry today**/
	
	public function listtodaypage()
	{		
		
		$qry = $this->db->query('SELECT * FROM customerentries WHERE ce_date = "'.date('d-m-Y',time()).'" ORDER BY  last_updated DESC');
		return $qry->result_array();
		
	}
	
	  /***** listtodaypagecount ***/
	
	public function listtodaypagecount()
	{		
		
		$qry = $this->db->query('SELECT ce_productscount FROM customerentries WHERE ce_date = "'.date('d-m-Y',time()).'" ORDER BY  last_updated DESC');
	    $res = $qry->result_array();
		
		$totaldatecount = 0;
		 foreach($res as $resdata){
			 
		$ce_productscount =	explode(',',$resdata['ce_productscount']); 		
		 $totaldatecount += array_sum($ce_productscount);
		
		 }
		 
		 return $totaldatecount;		
		
		
	}
	
      /*** Insert Client Entry ***/
	
	public function insertcliententry($data)
	{		
	
	$this->db->insert($this->table_name2, $data);		
		
	}
	
	
	
	
	
    /*
	@Description: Get count of warehouse
	@Author: Shweta Patel
	@Input: -  $src
	@Output: -count of records
	@Date:23-10-2013
	*/
   
    public function getcustajaxdetail($src)
    {
		
		
		 $query = $this->db->query("select * from ip_clients WHERE  customercode like '%".$src."%' OR client_name like '%".$src."%' OR client_mobile  like '%".$src."%' OR client_email like '%".$src."%'  ");
			
		//echo "select * from ip_clients WHERE client_name like '%".$src."%' OR client_mobile  like '%".$src."%' OR client_email like '%".$src."%'  ";		 
		
		$result = $query->result_array();
		$sarr = array();
		//if ($result->num_rows > 0) {
			
		foreach($result as $r){
			
			$sarr[] = $r['client_id'].'~'.$r['customercode'] .' '. $r['client_name'].' / '.$r['client_mobile'].' / '.$r['client_email'];
			
		}
		//}
        echo json_encode($sarr);
     
    }
    
    
    
    /*
	@Description: Get All Information category
	@Author: Shweta Patel
	@Input: -  fileds,condtion,limit
	@Output: -All record
	@Date:23-10-2013
	*/
   
         public function getcategorylist($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='')
    {
         
        $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$this->table_name;
        $where='';
        
        if($match_values)
        {
            $keys = array_keys($match_values);
            $compare_type = $compare_type ? $compare_type : 'like';
            if($condition!='')
                $and_or=$condition;
            else 
                $and_or = ($compare_type == 'like') ? ' OR ' : ' AND '; 
          
            $where = 'WHERE ';
            switch ($compare_type)
            {
                case 'like':
                    $where .= $keys[0].' '.$compare_type .'"%'.$match_values[$keys[0]].'%" ';
                    break;

                case '=':
                default:
                    $where .= $keys[0].' '.$compare_type .'"'.$match_values[$keys[0]].'" ';
                    break;
            }
            $match_values = array_slice($match_values, 1);
            
            foreach($match_values as $key=>$value)
            {                
                $where .= $and_or.' '.$key.' ';
                switch ($compare_type)
                {
                    case 'like':
                        $where .= $compare_type .'"%'.$value.'%"';
                        break;
                    
                    case '=':
                    default:
                        $where .= $compare_type .'"'.$value.'"';
                        break;
                }
            }
        }        
        $orderby = (!$orderby)? ' order by id asc ':$orderby;
       
        if($offset=="" && $num=="")
            $sql .= '  '.$where.$orderby;
        elseif($offset=="")
            $sql .= ' WHERE parent_category = 0 '.$where.$orderby.' '.'limit '.$num;
        else
             $sql .= ' WHERE parent_category = 0 '.$where.$orderby.' '.'limit '.$offset .','.$num;
        
       $query = ($count) ? 'SELECT count(*) FROM '.$this->table_name.' '.$where.$orderby : $sql;  
                 
       $query = $this->db->query($query);     
       
	   //echo $this->db->last_query();
       return $query->result_array();
	}

   function getsubcategories($id){
	   
	   $query = $this->db->get_where('category_master', array('parent_category' => $id));
	   return $query->result_array();
	   
   }
   
   function getcategoryall(){
	   
	   $query = $this->db->get('category_master'); 
	   return $query->result_array();   
	   
   }
   
    function getmaincategories(){
	   
	   $query = $this->db->get_where('category_master', array('parent_category' => '0'));
	   return $query->result_array();
	   
   }
   
   
    function getallchildcategories(){
	   
	   $this->db->select('*');
	   $this->db->from('category_master');
	   $this->db->where('parent_category !=', '0');
	   $query = $this->db->get();
	   return $query->result_array();
	   
   }
    
    /*
    @Description: Function is for Insert Warehouse details
    @Author: Shweta Patel
    @Input:
    @Output: Insert record into DB
    @Date: 23-10-2013
    */
    function insert_category($data)
    {
        $this->db->insert($this->table_name,$data);	
	
    }

     /*
	@Description: Update category Details
	@Author: Shweta Patel
	@Input: id field's value
	@Output: Update Record
	@Date:23-10-2013
	*/
    public function update_category($data)
    {
        $this->db->where('id',$data['id']);
        $query = $this->db->update($this->table_name,$data); 
    }
     /*
	@Description: Delete category detail
	@Author: Shweta Patel
	@Input:id
	@Output: 
	@Date:23-10-2013
	*/
    public function delete_category($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table_name);            
    }

    /*
    @Description: Delete category detail
    @Author: Nivedita Mitra
    @Input:id
    @Output: 
    @Date:26-3-2014
    */
    public function get_category_products($products,$product_master_id)
    {
         $sql = "SELECT * FROM category_products WHERE product_master_id = $product_master_id";
        if (strlen($products) > 0) {
                $sql .= " AND id NOT IN (".$products.")";
            }

        $sql  .= " ORDER BY id";
        $query = $this->db->query($sql);
        return $query->result_array();            
    }
	
	
	/**** get entry edit page details by id ****/
	
	public function getmanagebyid($id)
	{
		
		$sql = $this->db->query('SELECT * FROM dateentries WHERE de_id = '.$id);
		return $sql->row_array();
		
	}
	/*** managedate search ***/
	
	public function getmanagedate($searhcentry)
	   {
		   
	$sql=$this->db->query("SELECT * FROM dateentries WHERE de_title LIKE '%".$searhcentry."%' OR de_date LIKE '%".$searhcentry."%' OR de_status LIKE '%".$searhcentry."%' OR de_uid LIKE '%".$searhcentry."%'");
		return $sql->result_array();
	   }
	
	/**** managedate Update entry ***/
	
	
	public function  updatedate($data,$id){		
			
			$this->db->where('de_id', $id);
			$this->db->update('dateentries', $data);
		
	}

	/**** managedate Delete entry ***/

	
	public function  deleteentr($id)
	{
	  $this->db->where('de_id',$id);
	  $this->db->delete('dateentries'); 	
	
	
	}
	
	/*** get managedate insert page details ***/
		
	public function insert_tcbp($data)
	{
		$this->db->insert('tcbp',$data);
        
   
	}
	
	public function insert_taskdoc($data)
	{
		$this->db->insert('documents',$data);
        
   
	}
	/*** pagination in managedate ***/
	
	 public function managedatepageentries($limit,$offset)
	{
	   $sql = $this->db->query('SELECT * FROM dateentries  ORDER BY  last_update DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();	  
    }
	  
	
	public function managedatepageentriescount()
	{
	   $sql = $this->db->query('SELECT * FROM dateentries  ORDER BY  last_update DESC');
		return $sql->num_rows();	
    }	
	/*** get setting entry insert page details ***/
		
	public function insert_add($data)
	{
		$this->db->insert('settingentries',$data);
        
   
	}
	/***  get setting edit page details **/
	
	
	public function getsettingbyid($id)
	{
		
		$sql = $this->db->query('SELECT * FROM settingentries WHERE se_id = '.$id);
		return $sql->row_array();
		
	}
	
	/**** get setting Update entry ***/
	
	
	public function  updatesetting($data,$id){		
			
			$this->db->where('se_id',$id);
			$this->db->update('settingentries', $data);
		
	}
	/*** get setting pagination entry  ***/
	
    public function settingpageentries($limit,$offset)
	{
	   $sql = $this->db->query('SELECT * FROM settingentries  ORDER BY  last_updated DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();	  
    }
	  
	
	public function settingpageentriescount()
	{
	   $sql = $this->db->query('SELECT * FROM settingentries  ORDER BY  last_updated DESC');
		return $sql->num_rows();	
    }
	/***get setting delete entries  ***/
	/*public function  deleteenter($id)
	{
	  $this->db->where('se_id',$id);
	  $this->db->delete('settingentries'); 	
	
	
	}
	*/
	/*** managedate search ***/
	
	public function getsettingsearch($searhcentry)
	   {
		   
	$sql=$this->db->query("SELECT * FROM settingentries WHERE se_key LIKE '%".$searhcentry."%' OR se_value LIKE '%".$searhcentry."%' OR se_status LIKE '%".$searhcentry."%' OR last_updated LIKE '%".$searhcentry."%'");
		return $sql->result_array();
	   }
	   /*** get maagedate edit entry ***/
	   
	public function getdetailsbylist($id)
	{
		$qry = $this->db->query('SELECT * FROM customerentries WHERE ce_id = '.$id);
		return $qry->row_array();
		
	}
	
	/**** get managedate Update entry ***/
	
	public function  updateentrys($data,$id)
	{		
			$this->db->where('ce_id', $id);
			$this->db->update($this->table_name2, $data);
		
	}

	/**** get managedate Delete entrys ***/
	
	
	public function  deleteentrys($id)
	{
		$this->db->delete($this->table_name2, array('ce_id' => $id));			
	}
	
	/**** List previousentry pagination **/
	
	public function listpreviousentries($limit,$offset)
	{  
	    $sql= $this->db->query('SELECT * FROM customerentries ORDER BY last_updated DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();
		
	} 
	
	public function previouspagecount()
	{		
		
		$qry = $this->db->query('SELECT * FROM customerentries ORDER BY  last_updated DESC');
		return $qry->num_rows();
		
	}
	/*** get worker entry insert page  details ***/
		
	public function insert_ad($data)
	{
		$this->db->insert('workerentry',$data);
        
    }
	/*** get worker edit page details **/
	
	
	public function getworkerbyid($id)
	{
		
		$sql = $this->db->query('SELECT * FROM workerentry WHERE wo_id = '.$id);
		return $sql->row_array();
		
	}
	
	/****get worker Update entry ***/
	
	
	public function  updateworker($data,$id){		
			
			$this->db->where('wo_id',$id);
			$this->db->update('workerentry', $data);
		
	}
	/*** worker pagination  ****/
	
	public function workerpageentries($limit,$offset)
	{
	   $sql = $this->db->query('SELECT * FROM workerentry  ORDER BY  last_updated DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();	  
    }
	  
	
	public function workerpageentriescount()
	{
	   $sql = $this->db->query('SELECT * FROM workerentry  ORDER BY  last_updated DESC');
		return $sql->num_rows();	
    }
	
	
     /*** GET WORKER ENTRY DELETE **/
	
	public function workerdelete($id)
	{
		$this->db->where('wo_id',$id);
		$this->db->delete('workerentry');
	}
	   /*** worker search ***/
	   
     public function getsearchworkerentries($searhcentry)
	 {
		 
	   $sql=$this->db->query("SELECT * FROM workerentry WHERE wo_uid LIKE '%".$searhcentry."%'");
	   /* OR wo_totalpiece LIKE '%".$searhcentry."%' OR wo_complete LIKE '%".  $searhcentry."%' OR wo_remaining LIKE '%".$searhcentry."%'");*/
		 return $sql->result_array();
	 
	 }
	 
	 
	 /*****  get worker assign entry ***/
	 
	  public function getworkerassignentries($id)
	 {
		 
	  // $sql=$this->db->query("SELECT * FROM barcode_entries WHERE wid = '".$id."'");
	   $sql=$this->db->query("SELECT be.*,we.wo_uid as workername,ce.cu_uid as cuttername FROM barcode_entries be LEFT JOIN workerentry we ON be.wid = we.wo_id LEFT JOIN cuttingentry ce ON be.ctid = ce.cu_id WHERE be.wid = '".$id."'");
	  
	  return $sql->result_array();
	 
	 }
	 
	 
	 /*****  get cutting assign entry ***/
	 
	  public function getcuttingassignentries($id)
	 {
		 

		  $sql=$this->db->query("SELECT be.*,we.wo_uid as workername,ce.cu_uid as cuttername FROM barcode_entries be LEFT JOIN workerentry we ON be.wid = we.wo_id LEFT JOIN cuttingentry ce ON be.ctid = ce.cu_id WHERE be.ctid = '".$id."'");
	  
	  return $sql->result_array();
	 
	 }
	
	/*** get cutting entry insert page  details ***/
		
	public function insert_addd($data)
	{
		$this->db->insert('cuttingentry',$data);
        
   
	}
	/*** get cutting edit page details **/
	
	
	public function getcuttingbyid($id)
	{
		
		$sql = $this->db->query('SELECT * FROM cuttingentry WHERE cu_id = '.$id);
		return $sql->row_array();
		
	}
	
	/**** cutting  Update entry ***/
	
	
	public function  updatecutting($data,$id){		
			
			$this->db->where('cu_id',$id);
			$this->db->update('cuttingentry', $data);
		
	}
	
	/*** Cutting pagination  ****/
	
	public function cuttingpageentries($limit,$offset)
	{
	   $sql = $this->db->query('SELECT * FROM cuttingentry  ORDER BY  last_updated DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();	  
    }
	  
	
	public function cuttingpageentriescount()
	{
	   $sql = $this->db->query('SELECT * FROM cuttingentry  ORDER BY  last_updated DESC');
		return $sql->num_rows();	
    }
	/**** cutting  Delete entrys ***/
	
	public function  cuttingdelete($id)
	{
	  $this->db->where('cu_id',$id);
	  $this->db->delete('cuttingentry'); 	
	
	
	}
       
	 /*** cutting search ***/  
	public function getsearchcuttingentries($searhcentry)
	   {
		   
	$sql=$this->db->query("SELECT * FROM cuttingentry WHERE cu_uid LIKE '%".$searhcentry."%'");// OR cu_totalpiece LIKE '%".$searhcentry."%' OR cu_complete LIKE '%".$searhcentry."%' OR cu_remaining LIKE '%".$searhcentry."%'");
		return $sql->result_array();
	   }
	   
	  /****get Key dailylimit***/
   
   
   public function getdailykeylimit(){
	   
	   $sql = $this->db->query('SELECT * FROM settingentries WHERE se_key ="daily_limit_pieces"');
	   return $sql->row_array();
	   
   }
     




/**** get entry edit page details by id Customer ****/
	
	public function getcustomerbyid($id)
	{
		
		$sql = $this->db->query('SELECT * FROM ip_clients WHERE client_id = '.$id);
		return $sql->row_array();
		
	}
	/*** customer search ***/
	
	public function gettcbpentries($searhcentry,$tcbtype)
	{
		
	$userdata = $this->session->userdata('admin_session');		
	$userstate = $userdata['state']; //exit;   
	$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
		
	$sql=$this->db->query("SELECT * FROM tcbp WHERE (taskname LIKE '%".trim($searhcentry)."%' OR pmumanager LIKE '%".trim($searhcentry)."%' OR ba LIKE '%".trim($searhcentry)."%' OR sno LIKE '%".trim($searhcentry)."%'  OR status LIKE '%".trim($searhcentry)."%') AND tcbptype = '".trim($tcbtype)."' AND tcbp_states =  '".$userstate."'");
	
	}
	else{
	
	$sql=$this->db->query("SELECT * FROM tcbp WHERE (taskname LIKE '%".trim($searhcentry)."%' OR pmumanager LIKE '%".trim($searhcentry)."%' OR ba LIKE '%".trim($searhcentry)."%' OR sno LIKE '%".trim($searhcentry)."%'  OR status LIKE '%".trim($searhcentry)."%') AND tcbptype = '".trim($tcbtype)."' ");
		
		
	}
	return $sql->result_array();
		
	   }
	
	/**** customer Update entry ***/
	
	
	public function  updatecustomer($data,$id){		
			
			$this->db->where('client_id', $id);
			$this->db->update('ip_clients', $data);
		
	}

	/**** customer Delete entry ***/

	
	public function  customerdelete($id)
	{
	  $this->db->where('client_id',$id);
	  $this->db->delete('ip_clients'); 	
	
	
	}
	
	/*** get customer insert page details ***/
		
	public function insert_data($data)
	{
		$this->db->insert('ip_clients',$data);
        
   
	}
	/*** pagination in customer WHERE parenttask = '0' ***/
	
	 public function tcpcpageentries($limit,$offset,$category)
	{
		$userdata = $this->session->userdata('admin_session');
		//print_r($userdata);exit;
		$userstate = $userdata['state']; //exit;
		$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
	$sql = $this->db->query("SELECT * FROM tcbp  WHERE (parenttask = '0' OR parenttask = id) AND tcbp_states =  '".$userstate."' ORDER BY  id  ASC LIMIT ".$offset.",".$limit);
	}
	else
	{
	 $sql = $this->db->query("SELECT * FROM tcbp  WHERE (parenttask = '0' OR parenttask = id)  ORDER BY  id  ASC LIMIT ".$offset.",".$limit);   
	}	
	
	return $sql->result_array();	  
    }
	
	public function  updatetcp($id){		
			$data = array('status' => '2');
			$this->db->where('id', $id);
			$this->db->update('tcbp', $data);
		
	}
	
	public function tcpcpageentriesall($limit,$offset,$category)
	{
		$userdata = $this->session->userdata('admin_session');
	    $userstate = $userdata['state']; 
		$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
	$sql = $this->db->query("SELECT * FROM tcbp where status = '1' AND tcbp_states =  '".$userstate."' ORDER BY  id  DESC LIMIT ".$offset.",".$limit);
	}
	else
	{
	 $sql = $this->db->query("SELECT * FROM tcbp where status = '1'  ORDER BY  id  DESC LIMIT ".$offset.",".$limit);
	}	
	   
		return $sql->result_array();	  
    }
	
	public function getpatenttaskname($id){
		
		 $sql = $this->db->query("SELECT taskname FROM tcbp WHERE id = '$id'");
		//echo "SELECT taskname FROM tcbp WHERE id = '$id'";
		return $sql->result_array();
	}
	
	 public function tcpcpageentrieschild($ptaskid)
	{
		
	   $sql = $this->db->query("SELECT * FROM tcbp  WHERE parenttask = '".$ptaskid."' ORDER BY  id ");
		return $sql->result_array();	  
    }
	
	public function tcpcpageentrieschildallcount($searchtxt,$searchptask,$searchusrstate)
	{
		
	   $userdata = $this->session->userdata('admin_session');
	   $userstate = $userdata['state']; 
		$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
		
	   $sql = $this->db->query("SELECT * FROM tcbp  WHERE (parenttask != id AND parenttask != '0' AND taskname LIKE '%$searchtxt' AND parenttask LIKE '%$searchptask' AND tcbp_states LIKE '%$searchusrstate') AND tcbp_states = '".$userstate."' ");
	}
	else
	{
		 $sql = $this->db->query("SELECT * FROM tcbp  WHERE parenttask != id AND parenttask != '0' AND taskname LIKE '%$searchtxt' AND parenttask LIKE '%$searchptask' AND tcbp_states LIKE '%$searchusrstate'");
		
	}
		return $sql->num_rows();	   
    }
	
	
	public function tcpcpageentrieschildall($limit,$offset,$searchtxt,$searchptask,$searchusrstate)
	{
		
		$userdata = $this->session->userdata('admin_session');
	    $userstate = $userdata['state'];
		$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
		
		$sql = $this->db->query("SELECT * FROM tcbp WHERE (parenttask != id AND parenttask != '0' AND taskname LIKE '$searchtxt%' AND parenttask LIKE '%$searchptask' AND tcbp_states LIKE '%$searchusrstate' ) AND tcbp_states = '".$userstate."' ORDER BY  id DESC LIMIT $offset,$limit");
	}
	else{
		
		$sql = $this->db->query("SELECT * FROM tcbp WHERE (parenttask != id AND parenttask != '0' AND taskname LIKE '$searchtxt%' AND parenttask LIKE '%$searchptask' AND tcbp_states LIKE '%$searchusrstate' ) ORDER BY  id DESC LIMIT $offset,$limit");
	}

		return $sql->result_array();	  
    }
    public function approvetcpcpageentrieschildallcount($searchtxt,$searchptask,$searchusrstate)
	{
	   $userdata = $this->session->userdata('admin_session');
	   $userstate = $userdata['state']; 	
	   $user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
		
	   $sql = $this->db->query("SELECT u.*,d.isverified, d.isapproved FROM documents d LEFT JOIN tcbp u ON u.id = d.taskid LEFT JOIN tcbp t ON d.taskid = t.id  WHERE (d.isverified = '1' AND d.isapproved = '1' AND u.parenttask != u.id AND u.parenttask != '0' AND u.taskname LIKE '$searchtxt%' AND u.parenttask LIKE '%$searchptask' AND u.tcbp_states LIKE '%$searchusrstate') AND t.tcbp_states = '".$userstate."'");
	}
	else{
		$sql = $this->db->query("SELECT u.*,d.isverified, d.isapproved FROM documents d LEFT JOIN tcbp u ON u.id = d.taskid LEFT JOIN tcbp t ON d.taskid = t.id  WHERE (d.isverified = '1' AND d.isapproved = '1' AND u.parenttask != u.id AND u.parenttask != '0' AND u.taskname LIKE '$searchtxt%' AND u.parenttask LIKE '%$searchptask' AND t.tcbp_states LIKE '%$searchusrstate')");
		
	}	
		return $sql->num_rows();	  
    }
	
	
	public function approvetcpcpageentrieschildall($limit,$offset,$searchtxt,$searchptask,$searchusrstate)
	{
		
		$userdata = $this->session->userdata('admin_session');
	    $userstate = $userdata['state']; 	
	     $user_group_id = $userdata['user_group_id']; 
	
		if($user_group_id != '3'){
			
			$sql = $this->db->query("SELECT u.*,d.isverified, d.isapproved,d.document  FROM documents d LEFT JOIN tcbp u ON u.id = d.taskid LEFT JOIN tcbp t ON d.taskid = t.id WHERE (d.isverified = '1' AND d.isapproved = '1' AND u.parenttask != u.id AND u.parenttask != '0' AND u.taskname LIKE '$searchtxt%' AND u.parenttask LIKE '%$searchptask' AND u.tcbp_states LIKE '%$searchusrstate') AND t.tcbp_states = '".$userstate."' ORDER BY d.docid desc LIMIT $offset,$limit");
		}
		else{
			
			$sql = $this->db->query("SELECT u.*,d.isverified, d.isapproved,d.document  FROM documents d LEFT JOIN tcbp u ON u.id = d.taskid LEFT JOIN tcbp t ON d.taskid = t.id WHERE (d.isverified = '1' AND d.isapproved = '1' AND u.parenttask != u.id AND u.parenttask != '0' AND u.taskname LIKE '$searchtxt%' AND u.parenttask LIKE '%$searchptask' AND t.tcbp_states LIKE '%$searchusrstate') ORDER BY d.docid desc LIMIT $offset,$limit");
			
		}	
				
		return $sql->result_array();	  
    }
	  
	 public function getnumberuploadedbytask($taskid)
	{
	   $sql = $this->db->query("SELECT * FROM documents WHERE taskid = '".$taskid."'");
		return $sql->result_array();	  
    }
	
	public function getuploadeddocuments($taskid){
		
		 $sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile FROM documents d LEFT JOIN user u ON u.id = d.userid WHERE d.taskid = '".$taskid."'");
		return $sql->result_array();	  
		
	}
	
	
	 public function getnumberparticipantbytask($taskid)
	{
	   $sql = $this->db->query("SELECT * FROM documents WHERE taskid = '".$taskid."'  GROUP BY userid");
		return $sql->result_array();	  
    }
	
	public function tcpcpageentriescount()
	{
	   $userdata = $this->session->userdata('admin_session');
	   $userstate = $userdata['state']; 
		$user_group_id = $userdata['user_group_id']; 
			
			if($user_group_id != '3'){	   
	   $sql = $this->db->query('SELECT * FROM tcbp where status = 1 AND tcbp_states = "'.$userstate.'" ORDER BY  last_updated DESC');
			}
			else{
				 $sql = $this->db->query('SELECT * FROM tcbp where status = 1 ORDER BY  last_updated DESC');
			}
	   return $sql->num_rows();	
	   
    }	

      /*** Customermap Insert data table ****/
	  
	  public function insert_datacustomermap($data)
	  {
		 
		$this->db->insert('ip_client_chart',$data);  
	  }
	  /*** Customermap search entry    ***/
	 
    public function getcustomermap($searhcentry)
	 {
		   
	$sql=$this->db->query("SELECT * FROM ip_client_chart WHERE name LIKE '%".$searhcentry."%' OR mobile LIKE '%".$searhcentry."%' OR email LIKE '%".$searhcentry."%' OR notes LIKE '%".$searhcentry."%'");
		return $sql->result_array();
	 }

  

  public function customermappageentriescount()
	{
	   $sql = $this->db->query('SELECT * FROM ip_client_chart  ORDER BY  cchart_id DESC');
		return $sql->num_rows();	
    }
	/***  Customermap Pagination        ***/

   public function customermappageentries($limit,$offset)
	{
	   $sql = $this->db->query('SELECT * FROM ip_client_chart  ORDER BY  entrydate DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();	  
    }



/**** get entry edit page details by id Customermap ****/
	
	public function getcustomermapbyid($id)
	{
		
		$sql = $this->db->query('SELECT * FROM ip_client_chart WHERE cchart_id = '.$id);
		return $sql->row_array();
		
	}


	/**** customer Update entry ***/
	
	
	public function  updatecustomermap($data,$id){		
			
			$this->db->where('cchart_id', $id);
			$this->db->update('ip_client_chart', $data);
		
	}

  /**** customermap Delete entry ***/
    
    /**** Query Update entry ***/
	
	
	public function  verifierquery($docid,$userid,$remarks,$taskid){		
			$data = array('veryfierquery' => $remarks, 'status' => '1', 'querydate' => date('d-m-Y, h:i:s A'));
			$status = array('status' =>'0');
			$this->db->where('id', $taskid);
			$this->db->update('tcbp', $data);
			$this->db->where('docid', $docid);
			$this->db->update('documents', $status);
		return true;
	}
	public function approverquery($docid,$userid,$remarks,$taskid)
	{
		$data = array('approverquery' => $remarks, 'isverified' => '0', 'querydate' => date('d-m-Y, h:i:s A'));
		$this->db->where('docid', $docid);
		$this->db->update('documents', $data);
	}
	public function  customermapdelete($id)
	{
	  $this->db->where('cchart_id',$id);
	  $this->db->delete('ip_client_chart'); 	
	}

/**** check if worker exists ****/

    public function checkworker($username){
		
		$sql = $this->db->query('SELECT * FROM workerentry WHERE wo_uid = "'.$username.'"');
		return $sql->row_array();
		
	}	

/**** check if cutting exists ****/

    public function checkcutting($username){
		
		$sql = $this->db->query('SELECT * FROM cuttingentry WHERE cu_uid = "'.$username.'"');
		return $sql->row_array();
		
	}	

/****  update worker total pieces ****/
   
    public function updateworker1piecetotal($piece,$id){
		
		 $this->db->query("UPDATE workerentry SET wo_totalpiece = wo_totalpiece + '".$piece."'  WHERE wo_id = '".$id."'");
		 return false;
	}
	
	 
    public function updateworker2piecetotal($piece,$id){
		
		 $this->db->query("UPDATE workerentry SET wo_totalpiece = wo_totalpiece + '".$piece."'  WHERE wo_id = '".$id."'");
		 return false;
	}
	 public function updateworker3piecetotal($piece,$id){
		
		 $this->db->query("UPDATE workerentry SET wo_totalpiece = wo_totalpiece + '".$piece."'  WHERE wo_id = '".$id."'");
		 return false;
	}
	/****  get Update Cutting Entry total pieces in         ***/ 
	 public function updatecutting1piecetotal($piece,$id){
		
		 $this->db->query("UPDATE cuttingentry SET cu_totalpiece = cu_totalpiece + '".$piece."'  WHERE cu_id = '".$id."'");
		 return false;
	}
	 public function updatecutting2piecetotal($piece,$id){
		
		 $this->db->query("UPDATE cuttingentry SET cu_totalpiece = cu_totalpiece + '".$piece."'  WHERE cu_id = '".$id."'");
		 return false;
	}
	/****  get Worker enyry in front page Remainning    ****/
	public function remainningdatashow()
	   {
        $sql = $this->db->query("SELECT * FROM barcode_entries WHERE status = '0' ");
		   
		
	     return $sql->num_rows();
	   }
	/****  get Worker enyry in front page Complete    ****/   
	public function completedatashow()
	   {
		   
        $sql = $this->db->query("SELECT * FROM barcode_entries WHERE status = '2' ");
		
	     return $sql->num_rows();
	   }
	   
	/****  Total entry show in front page    ****/   
	public function totalentriesshow()
	   {
		   
        $sql= $this->db->query("SELECT * FROM customerentries");
		
	     return $sql->num_rows();
	   }
	/****  Total status show in active in front page    ****/
	
	public function totalstatusactive()
	   {
		   
        $sql= $this->db->query("SELECT * FROM customerentries WHERE entrystatus = 'active' ");
		
	     return $sql->num_rows();
	   }
	/****  get Cutting  enyry in front page Remainning    ****/
	
	public function cuttingdateshow()
	   {
		   
        $sql =$this->db->query("SELECT * FROM barcode_entries WHERE status = '0' ");
		
	     return $sql->num_rows();
	   }
	/****  get cutting enyry show  in front page Complete    ****/
	
	public function completedateshow()
	   {
		   
        $sql = $this->db->query("SELECT * FROM barcode_entries WHERE status != '0' ");
		
	     return $sql->num_rows();
	   }
	   /****  get deleverdate enyry show in front page  ****/
	   public function deliverydateshow()
	   {
		   
        $sql= $this->db->query("SELECT *,AVG(deliverydate) AS ce_id  FROM customerentries ");
	
		
	     return $sql->num_rows();
	   }
	   public function delivereddateshow()
	   {
		   
        $sql= $this->db->query("SELECT *,AVG(deliverydate < delivereddate) AS ce_id  FROM customerentries ");
	
		
	     return $sql->num_rows();
	   }
	   
	   /*** Getbarcodelistby entryid**/
	   
	   public function getbarcodebyentryid($id){
		   
		   $sql = $this->db->query("SELECT * FROM barcode_entries WHERE eid = '".$id."' ");
		
	     return $sql->result_array();
	   }
	   
	   /*** Update delivery date while status completed ***/
	   
	   public function updatedeliverydate($id){
		   
		  $this->db->query("UPDATE customerentries SET delivereddate ='".date('d-m-Y',time())."' WHERE ce_id = '".$id."' ");
	   }
	   
	   
	   /**** generatebarcode ****/
	   
	   public function generatebarcode($data){
		   
		   $this->db->insert('barcode_entries', $data);
		   
	   }
	   
	   /*** getbarcode entries ***/
	   
	   public function getbarcodeentries($eid){
		   
		  // $sql = $this->db->get_where('barcode_entries', array('eid' => $eid)); 
		   $sql=$this->db->query("SELECT be.*,we.wo_uid as workername,ce.cu_uid as cuttername FROM barcode_entries be LEFT JOIN workerentry we ON be.wid = we.wo_id LEFT JOIN cuttingentry ce ON be.ctid = ce.cu_id WHERE be.eid = '".$eid."'");
		   return $sql->result_array();   
		   		
	   }
	   
	  public function getworkertotal($wid)
	  {
		  $sql=$this->db->query("SELECT * FROM barcode_entries WHERE wid ='".$wid."' ");
		  return $sql->num_rows();
	  }		

public function getworkercomplete($wid)
	  {
		  $sql=$this->db->query("SELECT * FROM barcode_entries WHERE wid ='".$wid."' AND status = '2' ");
		  return $sql->num_rows();
	  }		

public function getworkerremaining($wid)
	  {
		  $sql=$this->db->query("SELECT * FROM barcode_entries WHERE wid ='".$wid."' AND status = '0' ");
		  return $sql->num_rows();
	  }	
 public function getcuttingtotal($ctid)
	  {
		  $sql=$this->db->query("SELECT * FROM barcode_entries WHERE ctid ='".$ctid."' ");
		  return $sql->num_rows();
	  }		

public function getcuttingcomplete($ctid)
	  {
		  $sql=$this->db->query("SELECT * FROM barcode_entries WHERE ctid ='".$ctid."' AND status != '0' ");
		  return $sql->num_rows();
	  }		

public function getcuttingremaining($ctid)
	  {
		  $sql=$this->db->query("SELECT * FROM barcode_entries WHERE ctid ='".$ctid."' AND status = '0' ");
		  return $sql->num_rows();
	  }		  
	  
	  /**** get total entry count worker per entry ****/
public function getworkerperidcountbarcode($wid,$eid){
	
	 $sql=$this->db->query("SELECT * FROM barcode_entries WHERE wid ='".$wid."' AND eid = '".$eid."' ");
     return $sql->num_rows();
	
}

public function getcuttingperidcountbarcode($ctid,$eid){
	
	 $sql=$this->db->query("SELECT * FROM barcode_entries WHERE ctid ='".$ctid."' AND eid = '".$eid."' ");
     return $sql->num_rows();
	
}

public function  deleteflushbarcode($id)
	{
	  $this->db->where('eid',$id);
	  $this->db->delete('barcode_entries'); 	
	
	
	}
	
	/**** get entry edit page details by id user ****/
	
	public function getuserbyid($id)
	{
		
		$sql = $this->db->query('SELECT * FROM user WHERE id = '.$id);
		return $sql->row_array();
		
	}
	
	public function getuserbydesignation($designation,$state)
	{
		
		$sql = $this->db->query('SELECT name FROM user WHERE state = "'.$state.'" AND  designation = "'.$designation.'" ORDER BY id DESC');
		return $sql->row_array();
		
	}
	/*** user search ***/
	
 	public function getuserentries($searhcentry)
	{
		   
	$sql=$this->db->query("SELECT * FROM user WHERE name LIKE '".$searhcentry."%' OR email LIKE '%".$searhcentry."%' OR phone LIKE '%".$searhcentry."%' OR state LIKE '".$searhcentry."%' LIMIT 0,100");
	
	return $sql->result_array();
		
	}
	
	/**** user Update entry ***/
	 
	public function  updateuser($data,$id){		
			
			$this->db->where('id', $id);
			$this->db->update('user', $data);
		
	}

	/**** user Delete entry ***/
 
	
	public function  userdelete($id)
	{
	  $this->db->where('id',$id);
	  $this->db->delete('user'); 	
	
	
	}
	
	/*** get user insert page details ***/
	 	
	public function insert_dataa($data)
	{
		$this->db->insert('user',$data);
        
   
	}
	/*** pagination in user ***/
	 
	 public function userpageentries($limit,$offset)
	{
	   $sql = $this->db->query('SELECT * FROM user  ORDER BY  last_modified DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();	  
    }
	  
	
	public function userpageentriescount()
	{
	   $sql = $this->db->query('SELECT * FROM user  ORDER BY  last_modified DESC');
		return $sql->num_rows();	
    }
	
	/*** import csv  ***/
	public function insert_csv($data)
	{
		$this->db->insert('ip_clients',$data);
   
	}
	
	public function insert_foundry_payments($data)
	{
		$this->db->insert('foundry_payments',$data);
   
	}
	
	public function  getfoundrypayments($id){
		
		$sql=$this->db->query("SELECT * FROM foundry_payments WHERE sid='".$id."' ORDER BY pid DESC");
		return $sql->result_array();
		
	}
	public function  getfoundrypaymentsall(){
		
		$sql=$this->db->query("SELECT * FROM foundry_payments ORDER BY pid DESC ");
		return $sql->result_array();
		
	}
	public function edit_foundry_payments($id)
	{
		$sql = $this->db->query('SELECT * FROM foundry_payments WHERE pid = '.$id);
		return $sql->row_array();
		
	}
	
	public function getfoundrylabels($id){
		
		$sql = $this->db->query('SELECT * FROM foundry_label WHERE sid = '.$id);
		return $sql->result_array();
		
	}
	
     	/*** Organization  ****/
		/*** get Organization insert page details ***/
		
	public function insert_organization($data)
	{
		$this->db->insert('ukac_organization',$data);
        
   
	}
		/**** Update entry ***/
	
	
	public function  updateorga($data,$id){		
			
			$this->db->where('cert_id', $id);
			$this->db->update('ukac_organization', $data);
		
	}
	
	public function getorgabyid($id)
	{
		
		$qry = $this->db->query('SELECT * FROM ukac_organization WHERE cert_id = '.$id);
		return $qry->row_array();
		
	}

	/**** Delete entry ***/ 	
	
	
	public function deleteorga($id){
			$this->db->delete('ukac_organization', array('cert_id' => $id));			
	}
	/*** organization search ***/
	
	public function getorgaentries($searhcentry)
	   {
		   
	$sql=$this->db->query("SELECT * FROM ukac_organization WHERE cert_name LIKE '%".trim($searhcentry)."%' OR 	
        cert_number LIKE '%".trim($searhcentry)."%' OR status LIKE '%".trim($searhcentry)."%'");
		return $sql->result_array();
	   }
	   /*** pagination in customer ***/
	
	 public function orgapageentries($limit,$offset,$category)
	{
	   $sql = $this->db->query('SELECT * FROM ukac_organization  ORDER BY  cert_id  DESC LIMIT '.$offset.','.$limit);
		return $sql->result_array();	  
    }
	  public function orgapageentriescount()
	{
	   $sql = $this->db->query('SELECT * FROM ukac_organization  ORDER BY  lastupdated DESC');
		return $sql->num_rows();	
    }	

	public function allparenttask()
	{
	 $userdata = $this->session->userdata('admin_session');
	 $userstate = $userdata['state']; 
	 $user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
	if($this->input->get('state') == true){ $userstate = $this->input->get('state');  }		
		$sql = $this->db->query("SELECT * FROM `tcbp` WHERE (parenttask = '0' OR parenttask = id)  AND tcbp_states =  '".$userstate."'");
	}else{
		 if($this->input->get('state') == true){ $userstate = $this->input->get('state');  
		$sql = $this->db->query("SELECT * FROM `tcbp` WHERE (parenttask = '0' OR parenttask = id) AND tcbp_states =  '".$userstate."'");
		 }else{
		$sql = $this->db->query("SELECT * FROM `tcbp` WHERE (parenttask = '0' OR parenttask = id) ");
		 }
		 
		 
	}
	//echo $this->db->last_query();
		return $sql->result_array();	  
		
	}
	
	public function allparenttask2()
	{
		$userdata = $this->session->userdata('admin_session');
	    $userstate = $userdata['state']; 
		$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
		
		$sql = $this->db->query("SELECT * FROM `tcbp` WHERE parenttask = '0'  AND tcbp_states =  '".$userstate."' LIMIT 0,100000");
	}
	else{
		$sql = $this->db->query("SELECT * FROM `tcbp` WHERE parenttask = '0'   LIMIT 0,100000");
		
	}
		return $sql->result_array();	  
		
	}
	public function addtask($tdata){
		
		$this->db->insert('tcbp',$tdata);
		
	}
	
	public function getdocforverifier($offset,$limit,$searchtxt){
		
	$userdata = $this->session->userdata('admin_session');		
	$userstate = $userdata['state']; //exit;   
	$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
		//d.status = '1' AND d.status = '1' AND
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail FROM documents d LEFT JOIN user u ON u.id = d.userid LEFT JOIN user uv ON uv.id = d.rejectedby LEFT JOIN tcbp tc ON tc.id = d.taskid WHERE  (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND tc.tcbp_states =  '".$userstate."' ORDER BY d.isverified ASC,d.isrejected ASC,d.docid ASC LIMIT $offset,$limit");
	}
	else{
		
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail FROM documents d LEFT JOIN user u ON u.id = d.userid LEFT JOIN user uv ON uv.id = d.rejectedby WHERE  (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') ORDER BY d.isverified ASC,d.isrejected ASC,d.docid ASC LIMIT $offset,$limit");
	}
	
	return $sql->result_array();	  
		
	}
	
	
	public function getdocforverifiercount($searchtxt){
		
	$userdata = $this->session->userdata('admin_session');		
	$userstate = $userdata['state']; //exit;   
	$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
	
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail FROM documents d LEFT JOIN user u ON u.id = d.userid LEFT JOIN user uv ON uv.id = d.rejectedby LEFT JOIN tcbp tc ON tc.id = d.taskid WHERE d.status = '1' AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND tc.tcbp_states =  '".$userstate."' ORDER BY d.isverified ASC,d.isrejected ASC,d.docid ASC");
		
	} else{
		
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail FROM documents d LEFT JOIN user u ON u.id = d.userid LEFT JOIN user uv ON uv.id = d.rejectedby WHERE d.status = '1' AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') ORDER BY d.isverified ASC,d.isrejected ASC,d.docid ASC");
		
	}
		return $sql->num_rows();	  
		
	}
	
	
	public function getdocforapproval($offset,$limit,$searchtxt){
		
	$userdata = $this->session->userdata('admin_session');		
	$userstate = $userdata['state']; //exit;   
	$user_group_id = $userdata['user_group_id']; 
	
	   if($user_group_id != '3'){
	   if($userstate=='Gujarat')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'Gujarat'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='Haryana')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'Haryana'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='Rajasthan')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'Rajasthan'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='TamilNadu')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'TamilNadu'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='Karnataka')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'Karnataka'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='UP')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'UP'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='Maharashtra')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'Maharashtra'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='Bihar')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'Bihar'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
	else if($userstate=='AP' || $userstate=='Telangana')
		{


		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  'AP' OR t.tcbp_states =  'Telangana'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");

	}
    else if($userstate==trim('Delhi') || $userstate==trim('MP') ||$userstate==trim('Uttarakhand'))
	{
		
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states ='Delhi' OR t.tcbp_states ='MP' OR t.tcbp_states ='Uttarakhand'   ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");
	}
    else if($userstate==trim('Punjab') || $userstate==trim('JK'))
	{
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '1'  AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND  t.tcbp_states =  'Punjab' OR t.tcbp_states =  'JK'  ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");
	}
	 else if($userstate==trim('WB') || $userstate==trim('Chhattisgarh') ||$userstate==trim('Assam') || $userstate==trim('Jharkhand') || $userstate==trim('Odisha'))
	{
		

		$sql= $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id where d.isverified = 1 AND (t.tcbp_states ='WB' OR t.tcbp_states ='Chhattisgarh' OR t.tcbp_states ='Assam' OR t.tcbp_states ='Jharkhand' OR t.tcbp_states ='Odisha') AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");
	

		
	}}else{
		
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby WHERE d.isverified = '1' OR isrejected = '1' AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') ORDER BY d.isapproved ASC,d.isrejected asc LIMIT $offset,$limit");
		
	}
		
		return $sql->result_array();	  
		
	}
	
	
	public function getdocforapprovalcount($searchtxt){
		
	$userdata = $this->session->userdata('admin_session');		
	$userstate = $userdata['state']; //exit;   
	$user_group_id = $userdata['user_group_id']; 
	
	if($user_group_id != '3'){
		
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.status = '1' AND d.isverified = '1' OR isrejected = '1' AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') AND t.tcbp_states =  '".$userstate."'  ORDER BY d.isapproved ASC,d.isrejected asc ");
	}
	else{
		
		$sql = $this->db->query("SELECT d.*,u.email,u.name,u.mobile,uv.name as vname,uv.mobile as vmobile,uv.email as vemail FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby WHERE d.status = '1' AND d.isverified = '1' OR isrejected = '1' AND (u.name LIKE '%".$searchtxt."%' OR u.email LIKE '%".$searchtxt."%' OR u.mobile LIKE '%".$searchtxt."%') ORDER BY d.isapproved ASC,d.isrejected asc ");
	}
		
		return $sql->num_rows();	  
		
	}
	
	public function rejectdoc($docid,$userid,$remarks)
	{
			
		$sql = $this->db->query("UPDATE `documents` SET isrejected = '1', rejectedby = '".$userid."', `remarks` = '".$remarks."',rejecteddate = '".$remarks.'~~'.date('d-m-Y h:i:s A')."'   WHERE docid = ".$docid."");
		return true;	  
		
	}
	
	public function veridfydoc($docid,$userid, $remark)
	{
		
		$sql = $this->db->query("UPDATE documents SET isverified = '1', `remarks` = '".$remark."',verifyby = '".$userid."',verifydate = '".date('d-m-Y h:i:s A')."' WHERE docid = '".$docid."'");
		return true;	  
		
	}
	
	public function approvedoc($docid,$userid, $remark)
	{
		
		$sql = $this->db->query("UPDATE documents SET isapproved = '1',approvedby = '".$userid."',`remarks` = '".$remark."' ,approvedate = '".date('d-m-Y h:i:s A')."' WHERE docid = '".$docid."'");
		return true;	  
		
	}
	public function update_status($data,$taskid)
	{
		
		$sql = $this->db->query("UPDATE documents SET querysubmit = '".$data['querysubmit']."', status = '".$data['status']."' WHERE taskid = '".$taskid."'");
		return true;	  
		
	}
	public function gettotalverifycount()
	{
		
		$userdata = $this->session->userdata('admin_session');		
		$userstate = $userdata['state'];
		$user_group_id = $userdata['user_group_id'];
		if($user_group_id != '3'){
		$sql = $this->db->query("SELECT d.*,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id =   d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE  t.tcbp_states = '".$userstate."' ");

	}else
	{
	$sql = $this->db->query("SELECT d.*,t.tcbp_states FROM documents d LEFT JOIN tcbp t ON d.taskid = t.id  WHERE d.isverified = '0' OR d.isverified = '1'");	
	}
		return $sql->num_rows();		  
		
	}
	
	public function gettotalapprovedcount()
	{
		
		$userdata = $this->session->userdata('admin_session');		
		$userstate = $userdata['state'];
		$user_group_id = $userdata['user_group_id'];
		if($user_group_id != '3')
		{

		$sql = $this->db->query("SELECT d.*,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE isverified='1' AND t.tcbp_states = '".$userstate."' ");
			
	}else
	{
	$sql = $this->db->query("SELECT d.*,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE isverified=1 ");	
	}
		return $sql->num_rows();	  
		
	}
	
	
	public function updateparenttaskid($id){
		
		$sql = $this->db->query("UPDATE tcbp SET parenttask = '".$id."' WHERE id  = '".$id."'");
		return true;	
		
	}
	
	
	public function gethomedocuments(){
		
		$userdata = $this->session->userdata('admin_session');		
		$userstate = $userdata['state']; //exit;   
		$user_group_id = $userdata['user_group_id']; 
		$id = $userdata['id']; 
	
		if($user_group_id == '3'){
			
		$sql = $this->db->query("SELECT d.*,u.name,u.email,u.mobile,t.taskname,t.veryfierquery,t.tcbp_states FROM documents d LEFT JOIN user u ON d.userid = u.id  LEFT JOIN tcbp t ON d.taskid = t.id   WHERE d.lastupdated <= '".date('Y-m-d',time())."' ORDER BY d.docid DESC LIMIT 0,25");
		
		}else if($user_group_id == '4'){
			
		$sql = $this->db->query("SELECT d.*,u.name,u.email,u.mobile,t.taskname,t.veryfierquery,t.tcbp_states FROM documents d LEFT JOIN user u ON d.userid = u.id  LEFT JOIN tcbp t ON d.taskid = t.id   WHERE d.lastupdated <= '".date('Y-m-d',time())."' AND d.userid = '".$id."' ORDER BY d.docid DESC LIMIT 0,25");
		
		}else{
		
		$sql = $this->db->query("SELECT d.*,u.name,u.email,u.mobile,t.taskname,t.veryfierquery,t.tcbp_states FROM documents d LEFT JOIN user u ON d.userid = u.id  LEFT JOIN tcbp t ON d.taskid = t.id   WHERE d.lastupdated <= '".date('Y-m-d',time())."' AND t.tcbp_states = '".$userstate."' ORDER BY d.docid DESC LIMIT 0,25");
			
			
		}
		
		return $sql->result_array();	  
	}
	
	
	public function getrejectcount()
	{
		
		$userdata = $this->session->userdata('admin_session');		
		$userstate = $userdata['state'];
		$user_group_id = $userdata['user_group_id'];
		if($user_group_id != '3')
		{

		
		$sql = $this->db->query("SELECT d.*,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE isrejected='1' AND t.tcbp_states = '".$userstate."'");
			  
		
	}
	else{
		$sql = $this->db->query("SELECT d.*,uv.name as vname,uv.mobile as vmobile,uv.email as vemail, t.tcbp_states FROM documents d LEFT JOIN user u ON u.id = d.userid  LEFT JOIN user uv ON uv.id = d.verifyby LEFT JOIN tcbp t ON d.taskid = t.id  WHERE isrejected='1'");

	}
	return $sql->num_rows();	  
		
	}
	
	public function getapprovecount()
	{
		
		$sql = $this->db->query("SELECT * FROM `documents` WHERE isapproved = '1'");
		return $sql->num_rows();	  
		
	}
	
	public function getverifiedcount()
	{
		
		$sql = $this->db->query("SELECT * FROM `documents` WHERE isverified = '1'");
		return $sql->num_rows();	  
		
	}
	
	public function getpendingcount()
	{
		
		$sql = $this->db->query("SELECT * FROM `documents` WHERE isverified = '0' AND isrejected = '0' AND isapproved = '0'");
		return $sql->num_rows();	  
		
	}
	
	public function getchartcounttotalentry($enddate,$startdate)
	{
		
		$sql = $this->db->query("select * from documents WHERE lastupdated >= '$startdate' AND lastupdated <= '$enddate'");
		return $sql->num_rows();	  
		
	}
	
	public function getchartcountverifierentry($enddate,$startdate)
	{
		
		$sql = $this->db->query("select * from documents WHERE (lastupdated >= '$startdate' AND lastupdated <= '$enddate') AND isverified = '1'");
		return $sql->num_rows();	  
		
	}
	
	public function getchartcountapprovalentry($enddate,$startdate)
	{
		
		$sql = $this->db->query("select * from documents WHERE (lastupdated >= '$startdate' AND lastupdated <= '$enddate')  AND isapproved = '1'");
		return $sql->num_rows();	  
		
	}
	
	
	
	
	
	
}
?>
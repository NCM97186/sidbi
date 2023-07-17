<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = 'user';
        $this->table_name_group = "user_group";
    }
    
    /*
        @Description: Check Login is valid or not
        @Author     : Kashyap Padh
        @Input      : User Email id and Password
        @Output     : If validate then go to home page else login error
        @Date       : 15-08-2013
    */
    
    public function check_login($email, $password)
    {
        $fields = array('id','email','name');
        $match = array('email'=>$email,'password'=>$password);
        $result = $this->getuser($fields,$match,'','=');
        if(count($result)>0)        
            return true;
        else
            return false;
    }

    /*
        @Description: Check Login is valid or not
        @Author     : Kashyap Padh
        @Input      : Email id and new system generated password
        @Output     : If query execute (password change in DB return 1 else 0
        @Date       : 15-08-2013
    */
    public function forgetpw($email,$gen_pw,$sha)
    {
        $data['password'] = $gen_pw;
        $data['sha_key'] = $sha;
        $this->db->where('email',$email);
        $query = $this->db->update($this->table_name,$data);
        return $s = ($query?1:0);
    }
    
    /*
        @Description: Function for Update Password
        @Author     : Kashyap Padh
        @Input      : User Id and new Password
        @Output     : Updated record
        @Date       : 15-08-2013
    */
    public function updt_pw($data)
    {
        $this->db->where('id',$data['id']);
        $query = $this->db->update($this->table_name,$data); 
        return $query;
    }
    
    /*
    @Description: Function for get User List (Customer)
    @Author: Nirav Chauhan
    @Input: Fieldl list(id,name..), match value(id=id,..), condition(and,or),compare type(=,like),count,limit per page, starting row number
    @Output: User list
    @Date: 22-10-2013
    */
   
    public function getuser($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='')
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
        $orderby = ($orderby !='')?' order by id desc ':'';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.$orderby;
        elseif($offset=="")
            $sql .= ' '.$where.$orderby.' '.'limit '.$num;
        else
             $sql .= ' '.$where.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM '.$this->table_name.' '.$where.$orderby : $sql;
        $query = $this->db->query($query);
				//echo $this->db->last_query()."<br>";//exit;
        return $query->result_array();
    }
				
				/*
    @Description: Function for checking employee code at edit time
    @Author: Swapnil Shah
    @Input: id, emp code
    @Output: id
    @Date: 30-11-2013
    */
    public function geteditcode($uid,$emp_code)
    {
					$this->db->select('id');
					$this->db->where('id !=',$uid);
					$this->db->where('emp_code',$emp_code);
					$query = $this->db->get('user');
					//echo $this->db->last_query()."<br>";//exit;
					return $query->result_array();
    }
    
    /*
    @Description: Function get group type
    @Author: Niral
    @Input: grop_id
    @Output: group type
    @Date: 22-10-2013
    */
    public function getuser_type($id)
    {
        $this->db->select('group_type');
        $this->db->where('id',$id);
        $query = $this->db->get('user_group');
        return $query->result_array();
    }
				
				/*
    @Description: Function get group type
    @Author: Niral
    @Input: grop_id
    @Output: group type
    @Date: 22-10-2013
    */
    public function getuser_id_bytype($type)
    {
        $this->db->select('id');
        $this->db->where('group_type',$type);
        $query = $this->db->get('user_group');
								//echo $this->db->last_query()."<br>";//exit;
        return $query->result_array();
    }
    
				/*
    @Description: Function for get Lists (without admin)
    @Author: Nirav Chauhan
    @Input: 
    @Output: user list
    @Date: 22-10-2013
    */
    public function getuser1()
    {
        $this->db->select('id,name');
        $this->db->where('user_group_id > ',1);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }
    /*
    @Description: Function for get Customer(User) Lists
    @Author: Nirav Chauhan
    @Input: search text,limit per page, starting row number, 
    @Output: user list
    @Date: 22-0-2013
    */
    public function getcustomer($src="",$num,$offset="")
    {
        if($src=="")
        {
            if($offset == "")
                $query = $this->db->query("select u.id,u.profile_img,u.name,u.email,u.address,u.state,u.city,u.status,u.emp_code,ug.group_type from user u left join user_group ug on u.user_group_id=ug.id  order by u.id desc limit ".$num);
            else
                $query = $this->db->query("select u.id,u.profile_img,u.name,u.email,u.address,u.state,u.city,u.status,u.emp_code,ug.group_type from user u left join user_group ug on u.user_group_id=ug.id  order by u.id desc limit ".$offset.",".$num);
        }
        else
        {
            if($offset == "")
                $query = $this->db->query("select u.id,u.profile_img,u.name,u.email,u.address,u.state,u.city,u.status,u.emp_code,ug.group_type from user u left join user_group ug on u.user_group_id=ug.id  AND (u.name like '%".$src."%' OR u.state like '%".$src."%' OR u.city like '%".$src."%' OR u.address like '%".$src."%' OR u.email like '%".$src."%' OR ug.group_type like '%".$src."%' OR u.emp_code like '%".$src."%') order by u.id desc limit ".$num);	
            else
                $query = $this->db->query("select u.id,u.profile_img,u.name,u.email,u.address,u.state,u.city,u.status,u.emp_code,ug.group_type from user u left join user_group ug on u.user_group_id=ug.id  AND (u.name like '%".$src."%' OR u.state like '%".$src."%' OR u.city like '%".$src."%' OR u.address like '%".$src."%' OR u.email like '%".$src."%' OR ug.group_type like '%".$src."%' OR u.emp_code like '%".$src."%') order by u.id desc limit ".$offset.",".$num);
        }
        return $query->result_array();
    }

    /*
    @Description: Function for get total number of Customer(User)
    @Author: Nirav Chauhan
    @Input: search text
    @Output: total number of user
    @Date: 22-10-2013
    */
    public function getcustomer_count($src="")
    {
        if($src=="")
            $query = $this->db->query("select u.id from user u left join user_group ug on u.user_group_id=ug.id ");	
        else
            $query = $this->db->query("select u.id from user u left join user_group ug on u.user_group_id=ug.id  AND (u.name like '%".$src."%' OR u.state like '%".$src."%' OR u.city like '%".$src."%' OR u.address like '%".$src."%' OR u.email like '%".$src."%' OR ug.group_type like '%".$src."%' OR u.emp_code like '%".$src."%')");
        $result = $query->result_array();
        return count($result);
    }
    
    /*
    @Description: Function is for Insert user details
    @Author: Nirav Chauhan
    @Input: Customer details for Insert into DB
    @Output: Insert record into DB
    @Date: 22-10-2013
    */
    function insert_user($data)
    {
        $this->db->insert($this->table_name,$data);	
	
    }

    /*
    @Description: Function is for update user details by Admin
    @Author: Nirav Chauhan
    @Input: Customer details for Update into DB
    @Output: Update Customer detilas into DB
    @Date: 22-10-2013
    */
    public function update_user($data)
    {
        $this->db->where('id',$data['id']);
        $query = $this->db->update($this->table_name,$data); 
    }
	
	
	/*
    @Description: Function is for update user status by Admin
    @Author: Dinky Katwala
    @Input: Customer details for Update into DB
    @Output: Update Customer detilas into DB
    @Date: 21-11-2013
    */
    public function update_user_status($id,$status)
    {
	  	
		if($status == 0)
		{
			$query = "UPDATE ".$this->table_name." SET status='1' WHERE ".$this->table_name.".id =".$id;
			
		}
		if($status == 1)
		{
			 $query = "UPDATE ".$this->table_name." SET status='0' WHERE ".$this->table_name.".id =".$id;
			
		}
		$query = $this->db->query($query);
        return $query;
	 }
	
	
    /*
    @Description: Function for Delete Customer Profile By Admin
    @Author: Nirav Chauhan
    @Input: Customer id which is delete by admin
    @Output: Delete User from DB
    @Date: 22-10-2013
    */
    public function delete_user($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table_name);            
    }
     /*
    @Description: Function for Multiple Delete Customer Profile By Admin
    @Author: Dinky
    @Input: Customer id which is delete by admin
    @Output: Delete User from DB
    @Date: 20-11-2013
    */
     public function delete_multiuser($id)
    {
       $id = str_replace("-",",",$id);  
	  $id = explode(",",$id);
	  $cnt = count($id);
	  foreach ($id as $value) 
	  {
			$this->db->where('id',$value);
           $this->db->delete($this->table_name); 
	  }
	            
    }
        
    /*
    @Description:Function for active user
    @Author: Hima Shah  
    @Input: id
    @Output: 
    @Date: 22-10-2013
    */
    public function active($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }
    
     public function geteditemailid($email,$id)
    {
         $str= "select id from user where email = '".$email."' and id <> $id";
        $query1=$this->db->query($str);
       
        $result1 = $query1->result_array();
        
        return $result1;        
    } 
	
	
	 public function getnodalofficers()
    {
         $str= "select * from user where designation = 'State Nodal Officer'";
         $query1=$this->db->query($str);
       
        $result1 = $query1->result_array();
        
        return $result1;        
    } 
}
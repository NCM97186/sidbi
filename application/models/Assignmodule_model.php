<?php
/*
    @Description: Assignmodule Model
    @Author: Sanjay Moghariya
    @Input: 
    @Output: 
    @Date: 10-05-2013
*/
class Assignmodule_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = 'user_assignment';
    }

    /*
    @Description: Function for get user_assignment Lists
    @Author: Sanjay Moghariya
    @Input: Fieldl list(id,name..), match value(id=id,..), condition(and,or),compare type(=,like),count,limit per page, starting row number
    @Output: Assignmodule list
    @Date: 10-05-2013
    */
    
    public function getassignmodule($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='')
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
        return $query->result_array();
    }
    
    /*
    @Description: Function for get user_assignment Lists
    @Author: Sanjay Moghariya
    @Input: search text,limit per page, starting row number
    @Output: Assignmodule list
    @Date: 10-05-2013
    */
    public function getassignmodule1($src="",$num,$offset="")
    {
        if($src=="")
        {
            if($offset == "")
                $query = $this->db->query("select ua.id,ua.user_id,u.name as username,m.name as modulename from user_assignment ua join user u on u.id=ua.user_id join module m on m.id=ua.module_id group by ua.user_id order by ua.id desc limit ".$num);
            else
                $query = $this->db->query("select ua.id,ua.user_id,u.name as username,m.name as modulename from user_assignment ua join user u on u.id=ua.user_id join module m on m.id=ua.module_id group by ua.user_id order by ua.id desc limit ".$offset.",".$num);
        }
        else
        {
            if($offset == "")
                $query = $this->db->query("select ua.id,ua.user_id,u.name as username,m.name as modulename from user_assignment ua join user u on u.id=ua.user_id join module m on m.id=ua.module_id where username like '%".$src."%' group by ua.user_id order by ua.id desc limit ".$num);
            else
                $query = $this->db->query("select ua.id,ua.user_id,u.name as username,m.name as modulename from user_assignment ua join user u on u.id=ua.user_id join module m on m.id=ua.module_id where username like '%".$src."%' group by ua.user_id order by ua.id desc limit ".$offset.",".$num);
        }
        return $query->result_array();
    }
    /*
    @Description: Function for get user_assignment with group by 
    @Author: Sanjay Moghariya
    @Input: search text
    @Output: Assignmodule list
    @Date: 22-05-2013
    */
    public function getassignmodule_count($src="")
    {
        if($src=="")
                $query = $this->db->query("select ua.id,ua.user_id,u.name as username,m.name as modulename from user_assignment ua join user u on u.id=ua.user_id join module m on m.id=ua.module_id group by ua.user_id");
        else
                $query = $this->db->query("select ua.id,ua.user_id,u.name as username,m.name as modulename from user_assignment ua join user u on u.id=ua.user_id join module m on m.id=ua.module_id where username like '%".$src."%' group by ua.user_id");		
        return $query->result_array();
    }

    /*
    @Description: Function for Insert user_assignment details
    @Author: Sanjay Moghariya
    @Input: user_assignment details for Insert into DB
    @Output: - Inserted record
    @Date: 10-05-2013
    */
    function insert_assignmodule($data)
    {
        $this->db->insert($this->table_name,$data);	
		echo $this->db->last_query();
    }

    /*
    @Description: Function for update user assignment details
    @Author: Sanjay Moghariya
    @Input: user_assignment details for Update into DB
    @Output: - Updated record
    @Date: 10-05-2013
    */
    public function update_assignmodule($data)
    {
        $this->db->where('id',$data['id']);
        $query = $this->db->update($this->table_name,$data); 
    }
    /*
    @Description: Function for Delete user_assignment
    @Author: Sanjay Moghariya
    @Input: - user_assignment id which want to delete
    @Output: - Deleted record
    @Date: 10-05-2013
    */
    public function delete_assignmodule($id='',$user_id = '',$module_id = '')
    {
        if($user_id)
            $this->db->where('user_id',$user_id);
        else
            $this->db->where('id',$id);
        $this->db->delete($this->table_name);
    }
}
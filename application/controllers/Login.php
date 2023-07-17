<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    function __construct() 
    {
        parent::__construct();
        $this->data = array();
        $this->load->library('session');
        $this->load->helper('captcha');
        $this->load->helper('general');
        $this->load->model('user_model');		
        $this->load->model('Assignmodule_model');		
        $this->load->model('usergroup_model');
        $this->load->library('form_validation');
		error_reporting(0);
    }

    public function index() 
    {
        $admin_session = $this->session->userdata('admin_session');        
        if ($admin_session['active'] == TRUE)
        {
           redirect('task-list');
        }
        else 
            $this->doLogin();
    }
    
    /*
        @Description : Check Login is valid or not (Admin login)
        @Author      : Kashyap Padh
        @Input       : useremail, passowrd and / or useremail
        @Output      : true or false
        @Date        : 21-09-2013
    */
    public function validate_captcha($sessionName) {

        if ($this->input->post('captcha') != $this->session->userdata[$sessionName]) {
            $this->form_validation->set_message('captcha', 'Cpatcha Code is wrong');
            return false;
        } else {
            return true;
        }
    }
    public function doLogin() 
    {
        //print_r($this->session->userdata());die;
        $email           = $this->input->post('email', true);
        $password        = $this->input->post('password', true);
        $forgot_password = $this->input->post('forgotpwd', true);
        $captcha_insert  = $this->input->post('captcha',true);
        if($forgot_password)
        {
            $this->forgetpw_action();
        }
        else
        { 
            
                             
            if($email && $password)
            {   
                if (validate_captcha('adminLogin')==false) {
                    $this->data['msg'] = "<span style='color:#ff0000;'>Invalid Captcha Image</span>";
                    $this->data['captchImage'] = generate_captcha('adminLogin');
                    $this->load->view('loginform/loginform', $this->data);
                    return false;
                } 
                $field = array('sha_key');
                $match = array('email'=>$email);
                $sha = $this->user_model->getuser($field,$match,'','=');                
                if($sha)
                {
                    $sha = $sha[0]['sha_key'];
                    $password = sha1($password.$sha);
                    $result = $this->user_model->check_login($email, $password);
                    $field = array('id','name','state','email','profile_img','user_group_id','status', 'login_flag', 'last_modified');
                    $match = array('email'=>strtolower($email),'password'=>$password);
                    $udata = $this->user_model->getuser($field, $match,'','=');
                
                    if(count($udata) > 0)
                    {
                        $convertedTime = date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($udata[0]['last_modified'])));
                        $currentdate = date('Y-m-d H:i:s');
                        if($udata[0]['login_flag']==1 && $convertedTime > $currentdate){
                            $this->data['msg'] = "<span style='color:#ff0000;'>You are already login other device please logout !!</span>";
                            $this->data['captchImage'] = generate_captcha('adminLogin');
                            $this->load->view('loginform/loginform',$this->data);
                            return false;
                        }
                        if($udata[0]['status']==1)
                        {    
                        $user_group = $this->user_model->getuser_type($udata[0]['user_group_id']);
                        $group_type = $user_group[0]['group_type'];
                        $newdata = array(
                                'name'  => $udata[0]['name'],
                                'id' =>$udata[0]['id'],
                                'useremail' =>$udata[0]['email'],
                                'group_type' =>$group_type,
                                'user_group_id'=>$udata[0]['user_group_id'],
				                'profile_pic'=>$udata[0]['profile_img'],												
                                'profile_img' =>$udata[0]['profile_img'],
								'state' =>$udata[0]['state'],
                                'active' => TRUE);
                        $this->session->set_userdata('admin_session', $newdata);
						$fields=array('module_id');
                                                
                        $match=array('user_id'=>$udata[0]['id']);
                        $assmodule=$this->Assignmodule_model->getassignmodule($fields,$match,'','=');
                        $updatedata=array('id'=>$udata[0]['id'], 'login_flag'=>1); 
                        $loginstatus = $this->user_model->update_user($updatedata);
                        if($_POST['remember']) {
                                $month = time() + (60 * 60 * 24 * 30);
                            setcookie('remember', $_POST['email'], $month);
                            setcookie('username', $_POST['email'], $month);
                            setcookie('password',$_POST['password'], $month);
                        }
                        else
                        {
                            if(isset($_COOKIE['username']))
                                  setcookie('username','',1);
                           if(isset($_COOKIE['remember']))
                                  setcookie('remember','',1);
                            if(isset($_COOKIE['password']))
                                  setcookie('password','',1);
                        }    
                        redirect('dashboard');
                        }
                        else
                        {
                         $this->data['msg'] = " Your Account is Inactive";
                        $this->data['captchImage'] = generate_captcha('adminLogin'); 
						$this->load->view('loginform/loginform',$this->data);
                        }   
                    }
                    else
                    {
                        $this->data['msg'] = "Password seems wrong! Or You are not registered please register !";
                        $this->data['captchImage'] = generate_captcha('adminLogin');
                       $this->load->view('loginform/loginform',$this->data);
                    }
                }
                else
                {
                    $this->data['captchImage'] = $this->generate_captcha('adminLogin');
                    $this->data['msg'] = "<span style='color:#ff0000;'>Invalid user name or password</span>";
                    $this->load->view('loginform/loginform',$this->data);
                }
            } 
        
        else{
                $this->data['captchImage'] =$this->generate_captcha('adminLogin');
                $this->load->view('loginform/loginform',$this->data);
		}
              
        }
    }
    public function generate_captcha($sessionName) {
        //print_r($sessionName);die;
      
        $this->load->helper('captcha');
        $this->load->library('session');
        //print_r($CI->session->userdata());die;
        $original_string = array_merge(range(0, 9));
        $original_string = implode("", $original_string);
        $nomBer = substr(str_shuffle($original_string), 0, 6);
       
        $vals = array(
            'word' => $nomBer,
            'img_path' => 'captcha/',
            'img_url' => base_url('captcha'),
            'font_path' => 'assets/fonts/David-Bold.ttf',
            'img_width' => 236,
            'img_height' => 51,
            'font_size' => 25,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(0, 0, 0),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        $this->session->set_userdata($sessionName, $cap['word']);
        $this->session->set_userdata('Narendra');
        //print_r($CI->session->userdata());
        return $cap['image'];
    }   
    public function captcha_refresh()
    {
        $this->load->helper('captcha');
        $this->load->helper('general');
       echo generate_captcha('adminLogin');
    }

    /*
        @Description : Function to generate password and email the same to user
        @Author      : Kashyap Padh
        @Input       : email address
        @Output      : password to the email address
        @Date        : 21-09-2013
    */
    public function forgetpw_action()
    {
        $email = strip_tags($this->input->post('email'));
        if(isset($email))
        {
            $fields=array('id','name');
            $arr=array('email'=> $email);
            $result = $this->user_model->getuser($fields,$arr,'','=');
            if($result)
            {
                $gen_pw = $this->randr(8);
                $sha = uniqid(mt_rand(), true);
                $pass = sha1($gen_pw.$sha);
                $forget_pw = $this->user_model->forgetpw($email,$pass,$sha);

                if($forget_pw == 1)
                {                    
                    $sub = "Amazon API : New Password ";                    
                    $msg = '<body>
                    <table width="750" border="0" cellspacing="0" cellpadding="5" style="border:5px solid #333; background:#f0f0f0;">
                    <tr style="padding-left:5px"><th>
                    <h1 id="logo" style="float:left;">
                    <a href="'.$this->config->item("base_url").'"icons"><img src="'.base_url().'/images/admin/logo1.png" align="logo"  title="Olivenation" alt="logo"></a>
                    </h1>
                    </th></tr>
                    <tr style="padding-left:5px;margin-left:5px">
                    <td align="left"><h2 style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#333;">Hello <span style="color:#990000;">'.ucfirst($result[0]['name']).',</span></h2></td>
                    </tr>
                    
                    <tr style="padding-left:5px;margin-left:5px">
                    <td style="color:#333; font-size:14px; font-family:Arial, Helvetica, sans-serif; text-align:left;">Your New password is : <b>'.$gen_pw.'</b></td>
                    </tr>
                    <tr style="padding-left:5px;margin-left:5px">
                    <td height="20">&nbsp;</td>
                    </tr>
                    <tr style="padding-left:5px;margin-left:5px">
                    <td style="color:#333; font-size:14px; font-family:Arial, Helvetica, sans-serif; text-align:left;">Thanks,<br>Olivenation Admin</td>
                    </tr>
                    <tr>
                    <td height="10">&nbsp;</td>
                    </tr>
                    </table>
                    </body>';

                    unset($config);
                    $this->load->library('email');
                  
                    $config['charset']   =  'utf-8';
                    $config['wordwrap']  = TRUE;
                    $config['protocol']  = 'smtp';
                    $config['smtp_port'] = '587';
                    $config['smtp_host'] = 'smtp.hostinger.in';
                    $config['smtp_user'] = 'test@uniformshop.co.in';  
                    $config['smtp_pass'] = 'Alldone?123';  
                    $config['mailtype']  = 'html';
                    $config['newline']   = "\r\n";
                    $this->load->library('email', $config);

                    $this->email->initialize($config);
                    $this->email->from('info@uniformshop.in',"Administrator");                
                    $this->email->to($email);                
                    $this->email->subject($sub);
                    $this->email->message($msg);	
                    $this->email->send();
                }
                $this->data['msg'] = "Mail sent successfully";                
            }
            else
                $this->data['msg'] = "No such user found";
        }
        else
            $this->data['msg'] = "No such user found";
        
        $this->load->view('loginform/loginform',$this->data);
    }
    
    /*
        @Description : Function to generate random password
        @Author      : Kashyap Padh
        @Input       : length of password 
        @Output      : generated password
        @Date        : 21-09-2013
    */
    public function randr($j = 8)
    {
        $string = "";
        for($i=0;$i < $j;$i++)
        {
            srand((double)microtime()*1234567);
            $x = mt_rand(0,2);
            switch($x)
            {
                case 0:$string.= chr(mt_rand(97,122));break;
                case 1:$string.= chr(mt_rand(65,90));break;
                case 2:$string.= chr(mt_rand(48,57));break;
            }
        }
        return strtoupper($string);
    }
	public function logout()
	{
        $admin_session = $this->session->userdata('admin_session');
        $updatedata=array('id'=>$admin_session['id'], 'login_flag'=>0); 
        $loginstatus = $this->user_model->update_user($updatedata);
		session_destroy();
		redirect('login');
	}
    
}
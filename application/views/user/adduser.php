<?php
 error_reporting(false);

if($this->uri->segment(2) == true){	 

$name=$user['name'];	
$password =$user['password'];
$gender=$user['gender'];
$emp_code=$user['emp_code'];
$city=$user['city'];
$zipcode=$user['zipcode'];
$phone=$user['phone'];
$email=$user['email'];
$address=$user['address'];
$state=$user['state'];
$status=$user['status'];
	echo $pathtype = 'edit';
if($status == '1'){ $status = '1'; } else { $status = '0';  }	
	
}
 
else{
$name=$this->input->post('name');	
$password = $this->input->post('password');
$gender=$this->input->post('gender');
$emp_code=$this->input->post('emp_code');
$city=$this->input->post('city');	
$zipcode = $this->input->post('zipcode');
$phone=$this->input->post('phone');
$email=$this->input->post('email');
$address=$this->input->post('address');	
$state = $this->input->post('state');
$status = '1';	
	$pathtype = 'add';
}
?>
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  User Entry
				 		
                </header>
			
                <div class="panel-body" style="height: 100%;overflow: scroll;">
				<?php if($pathtype ==  'edit'){   ?>
				<!--<div class="col-sm-12"><br>
				  <div class="col-sm-6" style="float:right;margin-right:340px;">
                    <div class="input-group">
                     <input  type="text" name="scan" class="input-sm form-control" size="20" autocomplete="off" placeholder="Scan QR code" style="height:35px;" >
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit" style="height:35px;">Scan!</button>
                      </span>
					   </div>
                    </div>
                  </div><br><br><br>-->
				<?php } ?>
                  
				  <form class="form-horizontal" method="post"  novalidate>
                    
                    <!--<div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Entry Date</label>
                      <div class="col-sm-10">
                        <label style="font-size: 19px;color: #1AAE88;"></label>
						<input type="hidden" name="entrydate"  />
						<input type="hidden" name="pathtype"  />
                      </div>
                    </div>--> 
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Full Name<span style="color:red;">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" value="<?php echo $name;?>" autocomplete="off" required />
					    <input type="hidden" name="pathtype" value="<?php echo $pathtype;?>" />
                      </div>
                    </div>
					
						 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Email<span style="color:red;">*</span></label>
                      <div class="col-sm-4">
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $email;?>" autocomplete="off" required  />
                      </div>
                    </div>
					<?php if($pathtype == 'add'){ ?>
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Password<span style="color:red;">*</span></label>
					<div class="col-sm-4">
                        <input type="password" name="password" id="password" class="form-control" value=""   required />
                    </div>
                    </div>
					
					<div class="line line-dashed b-b line-lg pull-in"></div>  
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Confirm Password <span>*</span></label>
                    <div class="col-sm-4">
                      <input type="password" name="cpassword" id="cpassword"  value="" class="form-control" oninput="check(this)" required />
                    </div>
					</div>
					 
					<?php } else {  ?>
					
					     <div class="form-group">
						<div class="line line-dashed b-b line-lg pull-in"></div>
                      <label class="col-sm-2 control-label"  >For Change Password <span>*</span></label>
                    
						<div class="col-sm-4">
                       <input type="checkbox" style="margin-top:3%; margin-left:2%" onclick="showtd(this.id)"  name="cngpassword" id="cngpassword"  value="1" />
						</div>
					 </div>
					 <div id="managepassword" style="display:none;">  
					<!--<div class="form-group"  >
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                      <label>Old Password <span>*</span></label>
                   
                    <div class="col-sm-4">
                      <!-- <input type="text"  name="Confirm Password" class="emailbox"> --
                      <input type="password"class="form-control" onblur="checkpassword(this.id,this.value);" data-bvalidator="minlength[6],required" name="oldpassword" id="oldpassword"  value="" />
                    </div>
                  </div>-->
  
					<div class="line line-dashed b-b line-lg pull-in" style="display:none"></div>  
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Old Password  <span>*</span></label>
                    
                    <div class="col-sm-4">
                       <!-- <input type="text"  name="Password" class="emailbox"> -->
                       <input type="password" class="form-control" data-bvalidator="minlength[6],required" data-bvalidator-msg="Please enter minimum 6 characters." name="password" id="password" value="" />
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg pull-in" ></div>  
                    <div class="form-group">
                      <label class="col-sm-2 control-label">New Password <span>*</span></label>
                     
                    <div class="col-sm-4">
                      <input type="password" data-bvalidator="equalto[password],minlength[6],required" data-bvalidator-msg="New password value did not match" name="newpassword" id="newpassword"  value="" class="form-control" />
                    </div>
					</div>
					<div class="line line-dashed b-b line-lg pull-in" ></div>  
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Confirm Password <span>*</span></label>
                     
                    <div class="col-sm-4">
                      <input type="password" data-bvalidator="equalto[password],minlength[6],required" data-bvalidator-msg="Confirm password value did not match" name="cpassword" id="cpassword"  value="" class="form-control" oninput="check(this)" required />
                    </div>
					</div>
					</div>
					<?php } ?>
				<!--	<div class="line line-dashed b-b line-lg pull-in"></div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"> Confirm Password</label>
					<div class="col-sm-4">
                        <input type="text" name="confirm" id="confirm" class="form-control" >
                      </div>
                    </div>
-->
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Emp Code</label>
                      <div class="col-sm-4">
                        <input type="text" name="emp_code" id="emp_code" class="form-control" value="<?php echo $emp_code;?>" autocomplete="off"  >
                      </div>
                    </div>
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">City</label>
                      <div class="col-sm-4">
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $city;?>" autocomplete="off"  >
                      </div>
                    </div>
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Zip Code</label>
                      <div class="col-sm-4">
                        <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?php echo $zipcode;?>" autocomplete="off"   >
                      </div>
                    </div>
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Phone<span style="color:red;">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone;?>" autocomplete="off" required />
                      </div>
                    </div>
				
					<!-- <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">User Type</label>
                      <div class="col-sm-4">
                        <input type="text" name="user" id="user" class="form-control" autocomplete="off"   >
                      </div>
                    </div>-->
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-4">
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $address;?>" autocomplete="off"   />
                      </div>
                    </div>
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">State<span style="color:red;">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $state;?>" autocomplete="off"  required />
                      </div>
                    </div>
					<div class="line line-dashed b-b line-lg pull-in"></div>
					<div class="form-group">
					<label class="col-sm-2 control-label">Gender</label>
     				<label><input name="gender" type="radio" value="male" <?php if($gender=='male'){?>checked="checked"<? }?> /> Male</label> 
                   <label><input name="gender" type="radio" value="female" <?php if($gender=='female'){?>checked="checked"<? }?> /> Female</label>
	
			       </div>
					<div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <label class="switch">
                           <input name="status" type="checkbox"  <?php echo ($status == '1')?'checked="checked"':'';  ?> value="<?php echo $status;  ?>">
                          <span></span>
                        </label>
                      </div>
                    </div>
       <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group" style="text-align:center;">
                      <div class="col-sm-12 col-sm-offset-0">
                       <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url() ?>user'" >Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
		<br><br><br>
                  </form>
				    
				
</section>

<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
	function check(input) {
        if (input.value != document.getElementById('newpassword').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
	function validate() {
    if (document.getElementById('cngpassword').checked) {
       // alert("checked"); 
		document.getElementById('managepassword').style.display = "block";
    } else {
		document.getElementById('managepassword').style.display = "none";
        //alert("You didn't check it! Let me check it for you.");
    }
}

document.getElementById('cngpassword').addEventListener('change', validate);
	
</script>
 
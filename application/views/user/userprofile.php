  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>users-list">Users</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
    
	
	
<section>
	<div class="container-fluid">
		<div class="row list-view">
			
			<div class="col-md-12">
				<div class="content content-box">
				<div class="card-header">
				<div class="row">
				<div class="col-md-12">
							<h4 class="m-0"> User Profile</h4>
						</div>												
						</div>
	       </div>
					
		   <center>  <?php if(isset($msg) && $msg !='') echo '<fieldset id="error_fieldset"><label class="error">'.$msg.'</label></fieldset>';?>
			  <?php if($this->input->get('msg') == true){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->input->get('msg').'</label></fieldset>'; }?>
			  	<?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:Green;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
			  </center>
			<?php echo validation_errors(); ?>
		   <form class="row px-4 py-4" method="post">
		   
		   <?php //print_r($userdetails); ?>
		    <input type="hidden" name="isedit"  value="<?php echo $this->uri->segment(2); ?>"  />
		       <div class="col-md-6">
 <div class="form-group mb-3">
    <label for="exampleInputFullName">Full Name</label>
    <input type="text" name="fullname" class="form-control" id="exampleInputFullName" aria-describedby="fullNameHelp" placeholder="Full Name" value="<?php echo $userdetails['name'];?>" required />
	<input type="hidden" name="isupdate" value="<?php echo $this->uri->segment(2); ?>" />
    <small id="fullNameHelp" class="form-text text-danger d-none">Full name is required</small>
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputFullName">Unique ID</label>
    <input type="text" class="form-control" id="exampleInputUniqueID" aria-describedby="UniqueIDHelp" placeholder="Enter Unique ID" value="<?php echo $userdetails['id'];?>" readonly />
    <small id="UniqueIDHelp" class="form-text text-danger d-none">Full name is required</small>
  </div>
 <div class="form-group mb-3">
    <label for="exampleInputMobileNo">Mobile No</label>
    <input type="tel" class="form-control" name="mobile" id="exampleInputMobileNo" aria-describedby="mobileNoHelp" placeholder="Mobile No" value="<?php echo $userdetails['mobile'];?>"  pattern="^\d{10}$" title="Enter 10 Digit Number"  required="required" />
    <small id="mobileNoHelp" class="form-text text-danger d-none">Mobile no required</small>
  </div>

   <div class="form-group mb-3">
    <label for="exampleInputState">State</label>
    <select class="form-select" id="exampleInputState" name="usrstate" aria-describedby="stateHelp" required>
					<option value="">--Select State--</option>
					<option value="AP" <?php echo ($userdetails['state'] == 'AP')?'selected="Selected"':'';?>>Andhra Pradesh</option>	
					<option value="Assam" <?php echo ($userdetails['state'] == 'Assam')?'selected="Selected"':'';?>>Assam</option>	
					<option value="Bihar"  <?php echo ($userdetails['state'] == 'Bihar')?'selected="Selected"':'';?>>Bihar</option>
					<option value="Chhattisgarh"  <?php echo ($userdetails['state'] == 'Chhattisgarh')?'selected="Selected"':'';?>>Chhattisgarh</option>					
					<option value="Delhi" <?php echo ($userdetails['state'] == 'Delhi')?'selected="Selected"':'';?>>Delhi</option>	
					<option value="Gujarat" <?php echo ($userdetails['state'] == 'Gujarat')?'selected="Selected"':'';?>>Gujarat</option>
					<option value="Haryana" <?php echo ($userdetails['state'] == 'Haryana')?'selected="Selected"':'';?> >Haryana</option>
					<option value="JK"  <?php echo ($userdetails['state'] == 'JK')?'selected="Selected"':'';?>>Jammu & Kashmir </option>
					<option value="Jharkhand"  <?php echo ($userdetails['state'] == 'Jharkhand')?'selected="Selected"':'';?>>Jharkhand</option>	
					<option value="Karnataka" <?php echo ($userdetails['state'] == 'Karnataka')?'selected="Selected"':'';?>>Karnataka</option>
					<option value="MP"  <?php echo ($userdetails['state'] == 'MP')?'selected="Selected"':'';?>>Mathya Pradesh</option>	
					<option value="Maharashtra" <?php echo ($userdetails['state'] == 'Maharashtra')?'selected="Selected"':'';?>>Maharashtra</option>
					<option value="Odisha"  <?php echo ($userdetails['state'] == 'Odisha')?'selected="Selected"':'';?>>Odisha</option>
					<option value="Punjab"  <?php echo ($userdetails['state'] == 'Punjab')?'selected="Selected"':'';?>>Punjab</option>
					<option value="Rajasthan" <?php echo ($userdetails['state'] == 'Rajasthan')?'selected="Selected"':'';?>>Rajasthan</option>
					<option value="TamilNadu" <?php echo ($userdetails['state'] == 'TamilNadu')?'selected="Selected"':'';?>>TamilNadu</option>	
					<option value="Telangana"  <?php echo ($userdetails['state'] == 'Telangana')?'selected="Selected"':'';?>>Telangana</option>
					<option value="UP" <?php echo ($userdetails['state'] == 'UP')?'selected="Selected"':'';?>>Uttar Pradesh</option>
					<option value="Uttarakhand" <?php echo ($userdetails['state'] == 'Uttarakhand')?'selected="Selected"':'';?>>Uttarakhand</option>
					<option value="WB"  <?php echo ($userdetails['state'] == 'WB')?'selected="Selected"':'';?>>West Bengal</option> 						
	</select>
	  <small id="stateHelp" class="form-text text-danger d-none">Please select state</small>
  </div>
  
   <div class="col-md-12">
	<label for="yourEmail" class="form-label">Organization</label>                 
	  <select class="form-select" name="organization" id="sel1">
		<option>--Select Organization--</option>
		<option option="Grant Thornton" <?php echo ($userdetails['organization'] == 'Grant Thornton'?'selected="selected"':'');?>>Grant Thornton</option>
		<option option="SIDBI" <?php echo ($userdetails['organization'] == 'SIDBI'?'selected="selected"':'');?>>SIDBI</option>
	  </select>					
    </div>
	
	<div class="col-md-12 mt-3 mb-4">
	<label for="yourEmail" class="form-label">Designation</label>
 
	  <select class="form-select" name="designation" id="sel1">
		<option>--Select Designation--</option>
		<option option="PMU Manager" <?php echo ($userdetails['designation'] == 'PMU Manager'?'selected="selected"':'');?>>PMU Manager</option>
		<option option="Business Analyst" <?php echo ($userdetails['designation'] == 'Business Analyst'?'selected="selected"':'');?>>Business Analyst</option>
		<option option="State Nodal Officer" <?php echo ($userdetails['designation'] == 'State Nodal Officer'?'selected="selected"':'');?>>State Nodal Officer</option>
		<option option="Sidbi Approver" <?php echo ($userdetails['designation'] == 'Sidbi Approver'?'selected="selected"':'');?>>Sidbi Approver</option>
	  </select>
	
   </div>
				   
 </div>
  <div class="col-md-6"> 
  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $userdetails['email'];?>" required readonly />
    <small id="emailHelp" class="form-text text-danger d-none">Email id is required</small>
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" class="form-control"  name="oldpassword" id="oldpassword" placeholder="Old Password" />
	  <small id="emailHelp" class="form-text text-danger d-none">Old Password is required</small>
	  <div class="custom_error" style="color: red"><?php echo form_error('oldpassword'); ?></div>
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control"  name="password" id="password" placeholder="Password" />
	  <small id="emailHelp" class="form-text text-danger d-none">Password is required</small>
	  <div class="custom_error" style="color: red"><?php echo form_error('password'); ?></div>
  </div>
    <div class="form-group mb-3">
    <label for="exampleInputConfirmPassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword"  name="cpassword" onblur="check(this)"  aria-describedby="confirmPasswordHelp" placeholder="Confirm Password" value="">
	  <small id="confirmPasswordHelp" class="form-text text-danger d-none">Confirm password is required</small>
  </div>
 <?php  if($this->session->userdata('admin_session')['user_group_id'] == '3'){ ?>
 <div class="form-group mb-3">
    <label for="exampleInputRole">Role <?php //  echo $userdetails['user_group_id']; ?></label>
    <select class="form-select" id="exampleInputRole" name="usrrole" aria-describedby="roleHelp">
						<option>--Select Role--</option>
						<option value="3" <?php echo ($userdetails['user_group_id'] == '3')?'selected="Selected"':'';?>>Admin </option>
						<option value="4" <?php echo ($userdetails['user_group_id'] == '4')?'selected="Selected"':'';?>>Visitor </option>
						<option value="1" <?php echo ($userdetails['user_group_id'] == '1')?'selected="Selected"':'';?>>Verifier </option>
						<option value="2" <?php echo ($userdetails['user_group_id'] == '2')?'selected="Selected"':'';?>>Approver</option>
					  </select>
	  <small id="roleHelp" class="form-text text-danger d-none">Please select role</small>
  </div>
  
  
	 <div class="form-group mb-3">
    <label for="exampleInputRole">State Nodal Officer <?php  //print_r($nodalofficers); ?></label>
    <select class="form-select" id="exampleInputRole" name="nodalofficer" aria-describedby="roleHelp" required >
	<option>--Select Nodal Officer--</option>
	<?php foreach($nodalofficers as $nodalofficer){ ?>
		
		<option value="<?php echo $nodalofficer['id']; ?>" <?php echo ($userdetails['nodalofficer'] == $nodalofficer['id'])?'selected="Selected"':'';?>><?php echo $nodalofficer['name'].' ('.$nodalofficer['state'].')'; ?></option>
		
		
	<?php } ?>

  </select>
  </div>			   
				   
  <?php  } ?>
   <!--div class="form-group mb-3">
    <label for="exampleInputBranch">Organization</label>
	<select class="form-control" name="branch" id="sel1">
						<option>--Select Branch--</option>
						<option option="Branch A" <?php echo ($userdetails['branch'] == 'Branch A')?'selected="Selected"':'';?> >Branch A</option>
						<option option="Branch B" <?php echo ($userdetails['branch'] == 'Branch B')?'selected="Selected"':'';?> >Branch B</option>
						<option option="Branch C" <?php echo ($userdetails['branch'] == 'Branch C')?'selected="Selected"':'';?> >Branch C</option>
					  </select>
	  <small id="branchHelp" class="form-text text-danger d-none">Please select branch</small>
  </div-->
							</div>
						<div class="col-md-12" style="color: red">Note: Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long</div>
						<div class="col-md-12 text-center mt-4 mb-1">
						<button class="btn btn-primary" type="submit" name="submit" value="Signup" >Submit</button>
						</div>				
				</form>
				</div>
			</div>
		</div>		
	</div>
</section>

    </section>

  </main><!-- End #main -->
  
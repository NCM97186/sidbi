 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <section>
	<div class="container">
		 <form class="form-horizontal" method="post"  >
		<div class="form-box">
			<h1 class="form-title">User Registration</h1>
			
			 <?php if($this->input->get('msg') == true){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->input->get('msg').'</label></fieldset>'; }?>
			<div class="row form-row">
				<div class="input-text-box col-md-6">
					<input class="" type="text" placeholder="Full Name" name="fullname" aria-describedby="fullNameHelp" required />
					 <small id="fullNameHelp" class="form-text text-danger d-none">Full name is required</small>
				</div>
				<div class="input-text-box col-md-6">
					<input class="" type="email" placeholder="Email Id" name="email" required />
					    <small id="emailHelp" class="form-text text-danger d-none">Email id is required</small>
				</div>
				<div class="input-text-box col-md-6">
					<input class="" type="tel" placeholder="Mobile No"  name="mobile" aria-describedby="mobileNoHelp"  pattern="^\d{10}$" title="Enter 10 Digit Number"  required="required"  />
					<small id="mobileNoHelp" class="form-text text-danger d-none">Mobile no required</small>
				</div>
				<div class="input-text-box col-md-6">
					<input class="" type="password" placeholder="Password"  id="password" name="password" required />
				    <small id="emailHelp" class="form-text text-danger d-none">Password is required</small>
				</div>
				<div class="input-text-box col-md-6">
					<input class="" type="password" placeholder="Confirm Password"  id="cpassword"  name="confirmpassword" onblur="check(this)" />
					  <small id="confirmPasswordHelp" class="form-text text-danger d-none">Confirm password is required</small>
				</div>
				<!--div class="input-text-box col-md-6">
					<div class="form-group">
					  <select class="form-control" name="usrrole" id="sel1">
						<option>--Select Role--</option>
						<option value="1">Verifier </option>
						<option value="2">Approver</option>
					  </select>
					</div>
				 <small id="roleHelp" class="form-text text-danger d-none">Please select role</small>
				</div-->
				<div class="input-text-box col-md-6">
					<div class="form-group">
					  <select class="form-control" id="sel1" name="usrstate" required>
						<option value="">--Select State--</option>
						<option value="Haryana">Haryana</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Karnataka">Karnataka</option>
						<option value="UP">Uttar Pradesh</option>
						<option value="Assam">Assam</option>	
						<option value="TamilNadu">TamilNadu</option>	
						<option value="Uttarakhand">Uttarakhand</option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="Delhi">Delhi</option> 
					  </select>
					</div>
					  <small id="stateHelp" class="form-text text-danger d-none">Please select state</small>
				</div>
				<div class="input-text-box col-md-6">
					<div class="form-group">
					  <select class="form-control" name="organization" id="sel1">
						<option>--Select Organization--</option>
						<option option="Grant Thornton">Grant Thornton</option>
						<option option="SIDBI">SIDBI</option>
					  </select>
					</div>
					<small id="branchHelp" class="form-text text-danger d-none">Please select Organization</small>
				</div>
			</div>
			
			<div class="btn-box">
				<button type="submit" name="submit" value="Signup" class="btn">Sign Up</button>
			</div>
			<?php  if(($this->session->userdata('admin_session') == false)){ ?>
			<div class="already-register">
				<span>Already Registered? <a href="<?php echo base_url(); ?>login">Sign In</a></span>
			</div>
			 <?php  } ?>
		</div>
		 </form>
	</div>
</section>

<script language='javascript' type='text/javascript'>
    function check(input) {
		
		//alert(document.getElementById('password').value);
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
			//alert('Password Must be Matching.');
			input.value = '';
			return;
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }

</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIDBI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  
  
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
  </script>

</head>

<body>

  <main>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url();?>newdesign/images/logo.png" style="width:160px!important;max-height:60px!important;" alt="">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-6">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">User Registration</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation"  method="post"  >
				  <?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:Red;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
				  <div class="col-md-12">
				    <label for="yourEmail" class="form-label">Full Name</label>
                  <input  class="form-control" type="text" placeholder="Full Name" name="fullname" value="<?php echo $this->input->post('fullname'); ?>" aria-describedby="fullNameHelp">
                  <div class="custom_error" style="color: red"><?php echo form_error('fullname'); ?></div>
                   </div>
                <div class="col-md-6">
				  <label for="yourEmail" class="form-label"> Email</label>
                  <input type="email" placeholder="Email Id" name="email" required  class="form-control" value="<?php echo $this->input->post('email'); ?>">
                  <div class="custom_error" style="color: red"><?php echo form_error('email'); ?></div>
                </div>
				<div class="col-md-6">
				    <label for="yourEmail" class="form-label">Mobile  Number</label>
                  <input  class="form-control" type="tel" placeholder="Mobile No"  name="mobile" aria-describedby="mobileNoHelp" value="<?php echo $this->input->post('mobile'); ?>" pattern="^\d{10}$" title="Enter 10 Digit Number"  required="required"  />
                  <div class="custom_error" style="color: red"><?php echo form_error('mobile'); ?></div>
                   </div>
                <div class="col-md-6">
				  <label for="yourEmail" class="form-label"> Password</label>
                  <input  type="password" placeholder="Password"  id="password" name="password" required / class="form-control" >
                  <div class="custom_error" style="color: red"><?php echo form_error('password'); ?></div>
                </div>
				<div class="col-md-6">
				    <label for="yourEmail" class="form-label">Confirm  Password</label>
                  <input  class="form-control" class="" type="password" placeholder="Confirm Password"  id="cpassword"  name="confirmpassword" onblur="check(this)" / />
                   </div>
                <div class="col-md-6">
				  <label for="yourEmail" class="form-label"> State</label>
               
					
					  <select class="form-control" id="sel1" name="usrstate" required>
						<option value="">--Select State--</option>
						<option value="AP">Andhra Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Delhi">Delhi</option> 
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="JK">Jammu & Kashmir </option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="MP">Mathya Pradesh</option>	
						<option value="Maharashtra">Maharashtra</option>
						<option value="Odisha">Odisha</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Telangana">Telangana</option>
						<option value="TamilNadu">TamilNadu</option>	
						<option value="UP">Uttar Pradesh</option>
						<option value="Uttarakhand">Uttarakhand</option>
						<option value="WB">West Bengal</option> 
						</select>
					
                </div>
				<div class="col-md-6">
				    <label for="yourEmail" class="form-label">Organization</label>
                 
					  <select class="form-control" name="organization" id="sel1">
						<option>--Select Organization--</option>
						<option option="Grant Thornton">Grant Thornton</option>
						<option option="SIDBI">SIDBI</option>
					  </select>
					
                   </div>
				   <div class="col-md-12">
				    <label for="yourEmail" class="form-label">Designation</label>
                 
					  <select class="form-control" name="designation" id="sel1">
						<option>--Select Designation--</option>
						<option option="PMU Manager">PMU Manager</option>
						<option option="Business Analyst">Business Analyst</option>
						<option option="State Nodal Officer">State Nodal Officer</option>
						<option option="Sidbi Approver">Sidbi Approver</option>
					  </select>
					
                   </div>
				   
                   <div class="col-md-5">
                    <p id="image_captcha"><?php echo $captchImage; ?></p>
                     </div><div class="col-md-1"><a href="javascript:void(0);" class="captcha-refresh1"><img src="<?php echo site_url().'assets/refresh.png'; ?>"/></a></div>
                  
                  <div class="col-md-6">
                    <input type="text"  value=""  placeholder="Captcha" name="registercaptcha" required class="form-control" id="registercaptcha" required>
                    <div class="custom_error" style="color: red"><?php echo form_error('registercaptcha'); ?></div>
                   </div>
                   <div class="col-12" style="color: red">Note: Password must contain One Small Letter, One Capital Letter, One Special Character, One Number.Password should be minimum 8 charcter and maximum 15 charcter long</div>
				   <div class="col-12"  style="text-align:center;">
                      <button class="btn btn-primary " type="submit" name="submit" value="Signup">Sign Up</button>
                    </div>

               

                    <!--div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div-->
					<?php  if(($this->session->userdata('admin_session') == false)){ ?>
                   
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="<?php echo base_url(); ?>login">Log in</a></p>
                    </div>
					 <?php  } ?>
                  </form>
                
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
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
			  <div class="credits" style="text-align:center!important;font-size:14px;"><br/>
				 <div class="copyright">
				 <?php echo date('Y'); ?>	  &copy; Copyright <strong><span>SIDBI</span></strong>. All Rights Reserved
				 </div>
                Developed by <a href="https://www.grantthornton.in/"><img src="<?php echo base_url();?>newdesign/images/logo-2.png" alt="Grant Thornton Logo"/></a> for <a href="https://www.sidbi.in/">SIDBI  </a>
              </div>
			  </main><!-- End #main -->
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="<?php echo base_url('assets/vendor/jquery.min.js'); ?>"></script>
<script>
$(document).ready(function(){
  $('.captcha-refresh1').on('click', function(){
    $.get('<?php echo site_url("register/captcha_refresh"); ?>', function(data){
      $('#image_captcha').html(data);
    });
  });
  
});
</script>

</body>

</html>
 
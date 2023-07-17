<!DOCTYPE html>
<html lang="en">
<head>
  <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>SIDBI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();  ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();  ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url();?>newdesign/images/logo.png" style="width:160px!important;max-height:60px!important;" alt="">
                  
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                 <?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:Red;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
                  <form class="row g-3 needs-validation" action="<?php echo base_url(); ?>login" id="login" method="post"  name="Login_Form">

                    <div class="col-12">
					<?php if(isset($msg) && $msg !='') echo '<fieldset id="error_fieldset"><label class="error">'.$msg.'</label></fieldset>';?>
			  <?php if($this->input->get('msg') == true){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->input->get('msg').'</label></fieldset>'; }?>

                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" value="<?= isset($_COOKIE['username'])?$_COOKIE['username']:'' ?>" placeholder="Email/Username" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" placeholder="Password" value="<?= isset($_COOKIE['password'])?$_COOKIE['password']:'' ?>"  name="password" required class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    
                      <div class="col-md-9">
                    <p id="image_captcha"><?php echo $captchImage; ?></p>
                  </div>
                  <div class="col-md-3">
      <a href="javascript:void(0);" class="captcha-refresh"><img src="<?php echo site_url().'assets/refresh.png'; ?>"/></a></div>
    
  
                    <div class="col-12">
                      
                      <input type="text"  value=""  placeholder="Captcha" name="captcha" required class="form-control" id="captcha" required>
                      <div class="invalid-feedback">Please enter your captcha!</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check1">
                        <!--input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe"-->
                        <label class="form-check-label" for="rememberMe">
						<div class="checkbox">
						<label><input type="checkbox" value="" required="" title="Please accept terms &amp; Condition">&nbsp;Accept Terms &amp; Condition</label>
						</div>
						</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="<?php echo base_url();?>register">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits" style="text-align:center!important;font-size:14px;"><br/><br/>
				 <div class="copyright">
				 <?php echo date('Y'); ?>	  &copy; Copyright <strong><span>SIDBI</span></strong>. All Rights Reserved
				 </div>
                Developed by <a href="https://www.grantthornton.in/"><img src="<?php echo base_url();?>newdesign/images/logo-2.png" alt="Grant Thornton Logo"/></a> for <a href="https://www.sidbi.in/">SIDBI  </a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
 			  
			   </main><!-- End #main -->
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="<?php echo base_url('assets/vendor/jquery.min.js'); ?>"></script>
<script>
$(document).ready(function(){
  $('.captcha-refresh').on('click', function(){
    $.get('<?php echo site_url("login/captcha_refresh"); ?>', function(data){
      $('#image_captcha').html(data);
    });
  });
  
  /*$('#loginBTN').click(function(){
    $('#clientlogin').trigger('click');
  });*/
});
</script>
</body>

</html>
 
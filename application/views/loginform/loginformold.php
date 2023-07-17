<!DOCTYPE html>
<html lang="en">
<head>
<title>NCM Manager</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" id="" href="<?php echo base_url();?>newdesign/css/bootstrap.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo base_url();?>newdesign/css/font-awesome.min.css">
<link rel="stylesheet" id="" href="<?php echo base_url();?>newdesign/css/style.css" type="text/css" media="all">
</head>
<body>

<section class="page-container">
<header>
  <div class="container-fluid">
	<div class="row header-logo">		
		<a href="#" class="logo">
			<img src="<?php echo base_url();?>newdesign/images/logo-2.png" alt="Logo"/>
		</a>
		<a href="#" class="logo">
			<img src="<?php echo base_url();?>newdesign/images/logo.png" alt="Logo"/>
		</a>
	</div>
  </div>
</header>

<section>
	<div class="container">
		<form action="<?php echo base_url(); ?>login" id="login" method="post"  name="Login_Form" class="form-signin"> 		
		<div class="form-box">
			<h1 class="form-title">Login</h1>
			  <?php if(isset($msg) && $msg !='') echo '<fieldset id="error_fieldset"><label class="error">'.$msg.'</label></fieldset>';?>
			  <?php if($this->input->get('msg') == true){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->input->get('msg').'</label></fieldset>'; }?>
			
			<div class="input-container">
				<i class="fa fa-envelope icon"></i>
				 <input type="email" class="input-field" name="email" value="<?= isset($_COOKIE['username'])?$_COOKIE['username']:'' ?>" placeholder="Email/Username" required /><br>
			  
			</div>
			<div class="input-container">
				<i class="fa fa-lock icon"></i>
				<input class="input-field" type="password" placeholder="Password" value="<?= isset($_COOKIE['password'])?$_COOKIE['password']:'' ?>"  name="password" required>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" value="" required title="Please accept terms & Condition">Accept Terms & Condition</label>
			</div>
			<div class="btn-box">
				<!--a href="user-profile.html" class="btn">Log In</a-->
				<button class="btn"  name="login" value="Login" type="Submit">Log In</button>
			</div>
			<div class="form-bottom-link">
				<div class="trouble-login">
					<!--a href="#" data-toggle="modal" data-target="#myModal">Trouble Login In?</a-->
				</div>
				<div class="new-user">
					<span>New User? <a href="<?php echo base_url();?>register">Sign Up</a></span>
				</div>
			</div>
		</div>
		</form>			
	</div>
</section>

<footer id="footer">
    <div class="text-center padder">
      <p>
        <small style="color:#215DAC;">Design & Developed by <a href="#">netCreativemind</a> for NCMProject<br>&copy; <?php echo date('Y',time()); ?> </small>
      </p>
    </div>
  </footer>
</section>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Forgot Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	  <div class="row">
	   <div class="col-md-12">
      <input class="form-control" type="text" placeholder="Please Enter Your Email Id" name="email">				
      </div>
	     </div>
 </div>
      <!-- Modal footer -->
      <div class="modal-footer forgot-btn">
	    <button type="submit" class="btn btn-sbmt">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>newdesign/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>newdesign/js/bootstrap.js"></script>
</body>
</html>

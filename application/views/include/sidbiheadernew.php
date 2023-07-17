<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
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
  <link href="<?php echo base_url();  ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url();  ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <!--link href="<?php echo base_url();  ?>assets/vendor/simple-datatables/style.css" rel="stylesheet"-->
    <link rel="stylesheet" href="<?php echo base_url();?>newdesign/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();  ?>assets/css/style.css" rel="stylesheet">
  		<script type="text/javascript" src="<?php echo base_url();?>newdesign/js/jquery.min.js"></script> 
    <script>(function (e, t, n) { var r = e.querySelectorAll("html")[0]; r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2") })(document, window, 0);</script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php echo base_url();  ?>newdesign/images/logo.png" alt="SIDBI Logo" />
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

 
   <?php  $userdata = $this->session->userdata('admin_session');?>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!--img src="<?php echo base_url();  ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"-->
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $userdata['name'] ; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $userdata['name'] ; ?></h6>
              <span><?php echo ucfirst($userdata['group_type']) ; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>user-profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>user-profile">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

         
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>login/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo $this->uri->segment(1) == 'dashboard'?'':'collapsed'; ?>" href="<?php echo base_url(); ?>dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link  <?php echo stristr($this->uri->segment(1),'task') == true ?'':'collapsed'; ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"  <?php echo stristr($this->uri->segment(1),'task') == true ?'aria-expanded="true"':''; ?> >
          <i class="bi bi-journal-text"></i><span>Events/Tasks</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse <?php echo stristr($this->uri->segment(1),'task') == true ?'show':''; ?>" data-bs-parent="#sidebar-nav">
		 <?php // if($this->session->userdata('admin_session')['user_group_id'] == '3'){ ?>
          <li>
		   <a <?php echo stristr($this->uri->segment(1),'task-list') == true ?'class="active"':''; ?>  href="<?php echo base_url(); ?>task-list">
          
              <i class="bi bi-circle"></i><span>Event/Task List</span>
            </a>
          </li>
		  <?php  //if($this->session->userdata('admin_session')['user_group_id'] == '3' || $this->session->userdata('admin_session')['user_group_id'] == '1' ){ ?>
          <li>
		  <a <?php echo stristr($this->uri->segment(1),'task-manager') == true ?'class="active"':'collapsed'; ?>  href="<?php echo base_url(); ?>task-manager">
           
              <i class="bi bi-circle"></i><span>Add Event/Task</span>
            </a>
          </li>
		  	<?php  //} ?>		  
			
		  <?php  if($this->session->userdata('admin_session')['user_group_id'] == '3' || $this->session->userdata('admin_session')['user_group_id'] == '1' ){ ?>
          <li>
		  <a class="nav-link <?php echo $this->uri->segment(2) == 'alltasks'?'active':'collapsed'; ?> <?php echo $this->uri->segment(1) == 'alltasks'?'active':''; ?>"  href="<?php echo base_url(); ?>alltasks">
            
              <i class="bi bi-circle"></i><span>Search Events</span>
            </a>
          </li>  
<?php // } ?>		  
			<?php  } ?>		  
        </ul>
      </li><!-- End Events Nav -->
					
					
	  <?php  if($this->session->userdata('admin_session')['user_group_id'] == '3' || $this->session->userdata('admin_session')['user_group_id'] == '1' ){ ?>
	  <li class="nav-item">
        <a class="nav-link <?php echo $this->uri->segment(1) == 'verifier-manager'?'':'collapsed'; ?>"  href="<?php echo base_url(); ?>verifier-manager">
          <i class="bi bi-journal-text"></i><span style="width: 75%;">Verifier Manager</span><b style="padding: 3px 10px;background: rgba(188,210,255,0.4);border-radius:100%;font-size: 13px;"><?php echo @$vcount;?></b>&nbsp;&nbsp;
        </a>       
      </li><!-- End Forms Nav -->
	  <?php  } ?>
     
        <?php  if($this->session->userdata('admin_session')['user_group_id'] == '3' || $this->session->userdata('admin_session')['user_group_id'] == '2' ){ ?>
	  <li class="nav-item">
        <a class="nav-link <?php echo $this->uri->segment(1) == 'approval-manager'?'':'collapsed'; ?>"  href="<?php echo base_url(); ?>approval-manager">
          <i class="bi bi-journal-text"></i><span style="width: 75%;">Approval Manager</span><b style="padding: 3px 10px;background: rgba(188,210,255,0.4);border-radius:100%;font-size: 13px;"><?php echo @$acount;?></b>&nbsp;&nbsp;
        </a>       
      </li><!-- End Forms Nav -->
	  <?php  } ?>

     <?php  //if($this->session->userdata('admin_session')['user_group_id'] == '3' || $this->session->userdata('admin_session')['user_group_id'] == '1' ){ ?>
    <li class="nav-item">
        <a class="nav-link <?php echo $this->uri->segment(1) == 'verifier-manager'?'':'collapsed'; ?>"  href="<?php echo base_url(); ?>approvereport">
          <i class="bi bi-journal-text"></i><span style="width: 75%;">Report</span>
        </a>       
      </li><!-- End Forms Nav -->
    <?php // } ?>

      <li class="nav-item">
        <a class="nav-link" <?php echo stristr($this->uri->segment(1),'download') == true ?'class="active"':''; ?> href="<?php echo base_url(); ?>download">
          <i class="bi bi-journal-text"></i><span style="width: 75%;"> Downloads</span>
        </a>       
      </li><!-- End Forms Nav -->

     

      <li class="nav-heading">User</li>

      <li class="nav-item">
        <a class="nav-link <?php //echo $this->uri->segment(1) == 'user-profile'?'':'collapsed'; ?> <?php  if($this->uri->segment(1) == 'user-profile' && ($this->uri->segment(1) == 'user-profile' && $this->uri->segment(2) == false)){  echo ''; } else {  echo 'collapsed'; } ?>" href="<?php echo base_url(); ?>user-profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
	  
	   <li class="nav-item">
        <a class="nav-link <?php echo $this->uri->segment(1) == 'contactus'?'':'collapsed'; ?>" href="<?php echo base_url(); ?>contactus">
          <i class="bi bi-list"></i>
          <span>Contact Us</span>
        </a>
      </li><!-- End Profile Page Nav -->

     <?php  if($this->session->userdata('admin_session')['user_group_id'] == '3'){ ?>
     <li class="nav-item">
        <a class="nav-link  <?php  if($this->uri->segment(1) == 'users-list' || ($this->uri->segment(1) == 'user-profile' && $this->uri->segment(2) == true)){  echo ''; } else {  echo 'collapsed'; } ?>" href="<?php echo base_url(); ?>users-list">
          <i class="bi bi-card-list"></i>
          <span>Users List</span>
        </a>
      </li><!-- End Register Page Nav -->
	  <?php  } ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>login/logout">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->
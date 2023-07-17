<?php error_reporting(true) ?> 
 <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img src="<?php echo base_url(); ?>images/a0.png" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt"><?php $admin_session = $this->session->get_userdata('admin_session'); ?></strong> 
                          <b class="caret">  <?php echo $admin_session['admin_session']['name'];	?> </b>
                        </span>
                        <span class="text-muted text-xs block">.</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                      
                      <li>
                        <span class="arrow top hidden-nav-xs"></span>
                        <a href="<?php echo base_url(); ?>setting" class="auto">Settings</a>
                      </li>
                     <!-- <li>
                        <a href="profile.html">Profile</a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="badge bg-danger pull-right">3</span>
                          Notifications
                        </a>
                      </li>-->
                      <li>
                        <a href="#">Help</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="<?php echo base_url();?>"  >Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                  <ul class="nav nav-main" data-ride="collapse">
				  <li <?php if($this->uri->segment(1) == 'frontuser'){ echo 'class="active"';  }  ?>>
                      <a href="<?php echo base_url(); ?>tcbp" class="auto">
                        <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                        <span class="font-bold">Overview</span>
                      </a>
                    </li>
                    <!--li  <?php if($this->uri->segment(1) == 'certificate'){ echo 'class="active"';  }  ?>>
                      <a href="<?php echo base_url(); ?>" class="auto">
                        <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                        <span class="font-bold">Certificates</span>
                      </a>
                    </li-->
						<li  <?php if($this->uri->segment(1) == 'tcbp'){ echo 'class="active"';  }  ?>>
							<a href="#">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                       
                        <span class="font-bold">Event List</span>
                    
					 </a>
                      <ul class="nav dk">			
				<li  <?php if($this->uri->segment(1) == 'tcbp'){ echo 'class="active"';  }  ?>>
							<a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                       
                        <span class="font-bold">TCBP</span>
                    
					 </a>
                      <ul class="nav dk">					
                       <li>
                         <a href="<?php echo base_url();?>tcbp" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">TCBP to leverage GOI schemes</span>
					    </a>
                       </li>
					   <li>
                         <a href="#"class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">TCBP on SFURTI</span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">TAP on Innovative cluster </span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">TCBP for state schemes</span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">TCBP for on Onboarding to digital platforms /marketing</span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Others</span>
					    </a>
                       </li>
					  
					<!--  <li>
                          <a href="<?php echo base_url();?>index.php/customermap" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Customer Map</span>
                      </a>
					</li>-->
					<li>
                         <a href="#" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Import TCBP Module</span>
                      </a>
					</li>					  
						  </ul>
                    </li>
					
					
					
					<li  <?php if($this->uri->segment(1) == 'customer'){ echo 'class="active"';  }  ?>>
							<a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                       
                        <span class="font-bold">CII GAP Analysis</span>
                    
					 </a>
                      <ul class="nav dk">					
                       <li>
                         <a href="<?php echo base_url();?>" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Evaluated Potential for infrastructure projects for MSMEs in Clusters</span>
					    </a>
                       </li>
					   <li>
                         <a href="#"class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Guidance and Support provided for MSECDP /SFURTI</span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Support provided for CFC </span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Support provided for Cluster Financing</span>
					    </a>
                       </li>
					
					  
					<!--  <li>
                          <a href="<?php echo base_url();?>index.php/customermap" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Customer Map</span>
                      </a>
					</li>-->
					<li>
                         <a href="#" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Import CII GAP Analysis Module</span>
                      </a>
					</li>					  
						  </ul>
                    </li>
					
					
					<li  <?php if($this->uri->segment(1) == 'customer'){ echo 'class="active"';  }  ?>>
							<a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                       
                        <span class="font-bold">Policy & Advocacy </span>
                    
					 </a>
                      <ul class="nav dk">					
                       <li>
                         <a href="<?php echo base_url();?>" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">StatePolicy/Schemes/Product designed for MSME</span>
					    </a>
                       </li>
					   <li>
                         <a href="#"class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Studies on existing framework of schemes / interventions and  suggested modificatiosn</span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Assistance on conducting training sessions on implementation of the interventions planned </span>
					    </a>
                       </li>
					  
					
					<li>
                         <a href="#" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Import Policy & Advocacy</span>
                      </a>
					</li>					  
						  </ul>
                    </li>
					
					
					<li  <?php if($this->uri->segment(1) == 'customer'){ echo 'class="active"';  }  ?>>
							<a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                       
                        <span class="font-bold">Others </span>
                    
					 </a>
                      <ul class="nav dk">					
                       <li>
                         <a href="<?php echo base_url();?>" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Facilitate in development of Model Industry Association</span>
					    </a>
                       </li>
					   <li>
                         <a href="#"class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Any other  programmes/events/activities facilitating state govt</span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Support to organize programmes/events/activities planned by SIDBI </span>
					    </a>
                       </li>
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Repository of work done</span>
					    </a>
                       </li>
					   
					   <li>
                         <a href="#" class="auto">
                        <i class="i i-arrow"></i>
					    <span class="font-bold">Others</span>
					    </a>
                       </li>
					  
					<!--  <li>
                          <a href="<?php echo base_url();?>index.php/customermap" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Customer Map</span>
                      </a>
					</li>-->
					<li>
                         <a href="#" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Import Others Module</span>
                      </a>
					</li>					  
						  </ul>
                    </li>
					
					
					 </ul>
                    </li>
				
				
					<li>
                      <a href="#" class="auto">
                       <i class="fa fa-tasks" aria-hidden="true"></i>
					   <span class="font-bold">Add Events/Tasks Manager</span>
                      </a>
                    </li>
					
					<li>
                      <a href="#" class="auto">
                       <i class="fa fa-user" aria-hidden="true"></i>
					   <span class="font-bold">Change Passsword</span>
                      </a>
                    </li>
					
					<!--li  <?php if($this->uri->segment(1) == 'organization'){ echo 'class="active"';  }  ?>>
                      <a href="<?php echo base_url();?>organization" class="auto">
                       <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
					   <span class="font-bold">Organization</span>
                      </a>
                    </li-->
					<li  <?php if($this->uri->segment(1) == 'user'){ echo 'class="active"';  }  ?>>
                      <a href="<?php echo base_url();?>user" class="auto">
                       <i class="fa fa-user" aria-hidden="true"></i>
					   <span class="font-bold">User</span>
                      </a>
                    </li>
					
					
					<li>
                      <a href="<?php echo base_url(); ?>/login/logout" class="auto">
                       <i class="fa fa-sign-out" aria-hidden="true"></i>
					   <span class="font-bold">Log Out</span>
                      </a>
                    </li>
					 <!--li  <?php if($this->uri->segment(1) == 'Swimminglesson'){ echo 'class="active"';  }  ?>>
							<a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                       
                        <span class="font-bold">Lessons</span>
                    
					 </a>
                      <ul class="nav dk">
					
                        <li >
                         <a href="<?php echo base_url();?>Swimminglesson" class="auto">
                        <i class="i i-dot"></i>
					    <span class="font-bold">Swimming Lessons</span>
					    </a>
                    </li>
					
					<li>
                         <a href="#" class="auto">
                       <i class="i i-dot"></i>
					   <span class="font-bold">Free Trial Lessons</span>
                      </a>
					</li>
					  
						  </ul>
                       
							
							  
					
                      
                    </li>
					
					<li  <?php if($this->uri->segment(1) == 'Parentslogin'){ echo 'class="active"';  }  ?>>
                      <a href="<?php echo base_url();?>Parentslogin" class="auto">
                       <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
					   <span class="font-bold">Parents Login</span>
                      </a>
                    </li>
		
				
					<li <?php if($this->uri->segment(1) == 'Requestinfo'){ echo 'class="active"';  } ?>>
                      <a href="<?php echo base_url()?>Requestinfo" class="auto">
                        <i class="fa fa-calendar" aria-hidden="true"></i>

                        <span class="font-bold">Request Info.</span>
                      </a>
                    </li>
					<li <?php if($this->uri->segment(1) == 'Faq'){ echo 'class="active"';  } ?>>
                      <a href="<?php echo base_url()?>Faq" class="auto">
                        <i class="fa fa-file-text" aria-hidden="true"></i>

                        <span class="font-bold">FAQ</span>
                      </a>
                    </li>
					<li <?php if($this->uri->segment(1) == 'Contactinfo'){ echo 'class="active"';  } ?>>
                      <a href="<?php echo base_url()?>Contactinfo" class="auto">
                       <i class="fa fa-align-justify" aria-hidden="true"></i>



                        <span class="font-bold">Contact info.</span>
                      </a>
                    </li>
					<li <?php if($this->uri->segment(1) == 'notification'){ echo 'class="active"';  } ?>>
                      <a href="<?php echo base_url()?>notification" class="auto">
                        <i class="fa fa-inr" aria-hidden="true"></i>

                        <span class="font-bold">Notificaiton Messages</span>
                      </a>
                    </li-->
					<!--li <?php if($this->uri->segment(1) == 'report'){ echo 'class="active"';  } ?>>
                      <a href="<?php echo base_url()?>report" class="auto">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="font-bold">Reports</span>
                      </a>
                    </li>
					<li <?php if($this->uri->segment(1) == 'user'){ echo 'class="active"';  } ?>>
                      <a href="<?php echo base_url() ?>user" class="auto">
                       <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="font-bold">User</span>
                      </a>
                    </li>
					<li <?php if($this->uri->segment(1) == 'setting'){ echo 'class="active"';  } ?>>
                      <a href="<?php echo base_url() ?>setting" class="auto">
                       <i class="fa fa-cog" aria-hidden="true"></i>
                        <span class="font-bold">Setting</span>
                      </a>
                    </li-->
                  </ul>
                  <div class="line dk hidden-nav-xs"></div>
                 
                
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->	
<section>
	<div class="container-fluid">
		<div class="row list-view">
			<div class="col-md-3">
				<div class="sidebar">
					<ul>
						<li><a href="<?php echo base_url(); ?>user-profile">Profile</a></li>
						<!--li><a href="<?php echo base_url(); ?>state-list">State List</a></li-->
						<li><a href="<?php echo base_url(); ?>task-list">Event List</a></li>
						<li><a href="<?php echo base_url(); ?>task-manager">Add Events/Tasks Manager</a></li>
						<?php  if($this->session->userdata('admin_session')['user_group_id'] != '4'){ ?><li><a href="<?php echo base_url(); ?>users-list">Users List</a></li><?php  } ?>
						<li><a href=" " class="active">Change Password</a></li>
						<li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div class="content content-box change-pass">
				<div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="m-0"> Change Password</h4>
                                </div>
                            </div>
                        </div>
						<div class="row form-row state-list">
						<div class="input-text-box col-md-12">
						<input class="input-field" type="password" placeholder="Old Password" name="password">
						</div>
						<div class="input-text-box col-md-12">
							<input class="input-field" type="password" placeholder="New Password" name="password">
						</div>
						<div class="input-text-box col-md-12">
							<input class="input-field" type="password" placeholder="Confirm Password" name="password">
						</div>	
<div class="input-text-box col-md-12 text-center mb-1">							
							<a href="" class="btn btn-primary">Submit</a>
							<a href="" class="btn btn-danger">Cancel</a>
						</div>						
					</div>		
				</div>
			</div>
		</div>
	</div>
</section>

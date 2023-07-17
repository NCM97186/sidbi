  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item active">Register Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
			<div class="row">
				<div class="col-md-11">
				<h5 class="card-title">Users list</h5>
				</div>
				<div class="col-md-1 mt-4">
					<a href="<?php echo base_url();?>users-list" class="btn-sm btn-info" title="Add Task"><i class="fa fa-refresh"></i></a>&nbsp;
					<a href="<?php echo base_url();?>register" class="btn-sm btn-info" title="Add Task"><i class="fa fa-plus"></i></a>
				</div>	
				<center>  <?php if(isset($msg) && $msg !='') echo '<fieldset id="error_fieldset"><label class="error">'.$msg.'</label></fieldset>';?>
			  <?php if($this->input->get('msg') == true){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->input->get('msg').'</label></fieldset>'; }?>
			  	<?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:Green;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
			  </center>
			<?php echo validation_errors(); ?>
			</div>
						<br/>
						<div class="flex-row row">
						<div class="col-md-8">
						</div>
					<div class="flex-row  search-bar col-md-4 d-flex flex-row-reverse justify-content-end">
				  <form class="justify-content-end search-form d-flex align-items-center" method="POST">
					<input type="text" name="searchentry" placeholder="Search" title="Enter search keyword" value="<?php echo $this->input->post('searchentry'); ?>" required />
					<button type="submit" name="searchbtn" value="Search" title="Search"><i class="bi bi-search"></i></button>
				  </form>
				</div>
				</div>
             <br/>
              <!-- Table with stripped rows -->
              <table id="taskTable" class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email address</th>
                    <th scope="col">State</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Role</th>
					<th scope="col">Last Modified</th>
					<th scope="col-md-4">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
					foreach($users as $user ){ ?>
                  <tr>
                    <td><?php echo $user['name']; ?></td>
						<td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['state']; ?></td>
						<td><?php echo $user['phone']; ?></td>  
						<td><?php if($user['user_group_id'] == '1'){ echo ucfirst('verifier'); } else if($user['user_group_id'] == '2'){ echo ucfirst('approver'); }  else if($user['user_group_id'] == '3'){ echo ucfirst('admin'); }  else if($user['user_group_id'] == '4'){ echo ucfirst('visitor'); } ?></td>
					    <td><?php echo $user['last_modified']; ?></td>
                        <td>
						  <div class="row">
						  <!--button  class="btn btn-sm btn-primary col-md-6" style="padding: 5px 10px 5px 10px;" onclick="window.location='<?php echo base_url().'user-profile/'.$user['id']; ?>'">Edit</button-->
						  <button type="button" class="btn btn-primary btn-sm col-md-5 me-2" title="Edit" onclick="window.location='<?php echo base_url().'user-profile/'.$user['id']; ?>'"><i class="ri-edit-box-line"></i></button>
						  <button type="button" class="btn btn-danger btn-sm col-md-5" title="Delete"  data-bs-toggle="modal" data-bs-target="#myModal_<?php echo $user['id']; ?>"  class="trigger-btn" data-toggle="modal"><i class="ri-chat-delete-line"></i></button>
						  </div>
						
						 </td>
						 <div id="myModal_<?php echo $user ['id']; ?>" class="modal fade">
							<div class="modal-dialog modal-confirm">
								<div class="modal-content">
									<div class="modal-header">
										  										
										<h4 class="modal-title">Are you sure?</h4>	
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>Do you really want to delete these records? This process cannot be undone.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url().'user/delete/'.$user['id']; ?>'">Delete</button>
									</div>
								</div>
							</div>
						</div>			
                  </tr>
					<?php } ?>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
			<?php echo $this->pagination->create_links(); ?>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
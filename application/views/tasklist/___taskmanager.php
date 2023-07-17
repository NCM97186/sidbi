  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Events/Tasks Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Task Manager</li>
          <li class="breadcrumb-item active">Add Events</li>
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
						<h5 class="card-title">Add Events / Task Manager </h5>
						</div>
						<div class="col-md-1 mt-4">
							<a href="<?php echo base_url();?>task-manager" class="btn-sm btn-info" title="Add Task"><i class="fa fa-refresh"></i></a>&nbsp;
						</div>	
						</div>
						<center>
				<?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
			  </center>
				<?php  if($this->session->userdata('admin_session')['user_group_id'] != '4'){ ?>
				<form class="row m-0 pl-2 pr-2" method="post">

				<div class="col-md-3" style="padding-right: 0px;">
				 <div>
					<input type="text" class="form-control" name="taskname" id="exampleInputTask" aria-describedby="taskHelp" placeholder="Task/Event Name" />
					<div class="custom_error" style="color: red"><?php echo form_error('taskname'); ?></div>
				  <small id="taskHelp" class="form-text text-danger d-none">Task/Event name is required</small>
				  </div>       
				</div> 
				<div class="col-md-3">
				<div class="form-group">
				<?php //print_r($parenttasks); ?>
						<select class="form-control" name="ptask" id="ptask">
										<option>--Parent Task/Event--</option>
										<?php foreach($parenttasks as $ptask){ ?>
										<option value="<?php  echo $ptask['id'];?>"><?php  echo ucfirst($ptask['taskname']);?></option>
										<?php } ?>
										
									  </select>
					  <small id="branchHelp" class="form-text text-danger d-none">Please select branch</small>
					   </div>  
				  </div> 
				  
				<div class="col-md-2">
				<div class="form-group">
				<?php //print_r($parenttasks); ?>
				   <select class="form-control" id="sel1" name="usrstate" required="">
										<option value="">--Select State--</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
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
				</div> 

				<div class="col-md-2">
				 <div>
				  <label class="form-text text-danger d-none">Total Participants </label>
					<input type="number" class="form-control" name="totalparticipants" id="totalparticipants" aria-describedby="taskHelp" placeholder="Total Participants" min="1"  required />
				 
				  </div>  
				</div> 

						
				   <div class="col-md-2">
				 <div >
					<button type="submit" name="submitaddtask" class="btn  btn-info">Submit</button>
				  </div>       
				  </div>  
				  </form>
				  <?php  } ?>
						<br/>
						<div class="flex-row row">
						<div class="col-md-8">
						</div>
					<div class="flex-row  search-bar col-md-4 d-flex flex-row-reverse justify-content-end">
				  <form class="justify-content-end search-form d-flex align-items-center" method="POST">
					<input type="text" name="searchentry" value="<?php echo $this->input->post('searchentry'); ?>" placeholder="Search Name/ Email/ Phone" required />
					<button type="submit" name="searchbtn" value="Search" title="Search"><i class="bi bi-search"></i></button>
				  </form>
				</div>
				</div>
             <br/>
			 <?php echo $this->pagination->create_links(); ?>
              <!-- Table with stripped rows -->
              <table id="taskTable" class="table datatable">
                 <thead>
				<tr>
					<th scope="col">Task/Event List Name</th>
					<th scope="col">Parent Tasks/Events</th>
					<th scope="col">State</th>
					<th scope="col">Total Participants</th>
					<th scope="col">Query</th>
					<th scope="col">Action</th>
				</tr>
                </thead>
                <tbody style="overflow-y:auto;">
								<?php 
								
								$CI =&get_instance();
								$CI->load->model('main_model');
							
								foreach($tcbps as $tasklist){ 
								
								$taskname= $CI->main_model->getpatenttaskname($tasklist['parenttask']);
								  
								  ?>
									 <tr>
                     <td><?php echo  $tasklist['taskname'];?></td>
										 <td><?php echo ($tasklist['parenttask'] != 0)?$taskname[0]['taskname']:'';?></td>
										 <td><?php echo $tasklist['tcbp_states'];?></td>
										 <td><?php echo $tasklist['totalparticipants'];?></td>
										 <td style="color: red"><?php echo $tasklist['veryfierquery'];?></td>
                                        <td><a href="" class="btn-action btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#uploadModa<?php echo $tasklist['id'];?>"><i class="fa fa-gear"></i></a>
                                        	<td><a href="" class="btn-action btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#finalsubmit<?php echo $tasklist['id'];?>"><i class="fa fa-share-square-o" aria-hidden="true"></i></a></td>
                                        </td>
                                    </tr>
										<!-- Upload File Modal -->
									<div class="modal fade" id="uploadModa<?php echo $tasklist['id'];?>">
									<form method="post" action="<?php echo base_url();?>task-manager/add" enctype="multipart/form-data">
									<input type="hidden" name="utaskid" value="<?php echo $tasklist['id'];?>">
									<input type="hidden" name="redirecturi" value="<?php echo $this->uri->segment(1);?>">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <!-- Modal Header -->
										  <div class="modal-header">
											<h5 class="modal-title">  Upload Task File </h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										  </div>
										  <!-- Modal body -->
										  <div class="modal-body">
										  <div class="row">
										   <div class="col-md-12">
										   <div class="form-group">
										   <label>Upload Govt. Officials Files</label>
										   <input type="file" name="docs[]"  id='docsupload<?php echo $tasklist['id'];?>'  required multiple />
										    <label style="color:red;font-size:12px;">(Max 5 Doc Allowed ,Document upload Size should be less than 10 mb)</label>
										   </div>				
										  </div>
										  <div class="col-md-12"><br/>
										  <div class="form-group"><br/>
										  <textarea class="form-control" type="text" name="remark" placeholder="Remark"></textarea>
										  </div>
										  </div>
									 </div>
									   </div>
										  <!-- Modal footer -->
										  <div class="modal-footer">
											<button type="submit"  name="submitdata"  id="uploadbtn<?php echo $tasklist['id'];?>"  value="Submit" class="btn btn-success">Upload</button>
											
										  </div>  
									  </div>
									</div>
									</form>
									</div>
									
							<!-- Final submit button Modal -->
									<div class="modal fade" id="finalsubmit<?php echo $tasklist['id'];?>">
									<form method="post" action="<?php echo base_url();?>task-manager/finalsave" enctype="multipart/form-data">
									<input type="hidden" name="utaskid" value="<?php echo $tasklist['id'];?>">
									<input type="hidden" name="redirecturi" value="<?php echo $this->uri->segment(1);?>">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <!-- Modal Header -->
										  <div class="modal-header">
											<h5 class="modal-title">  Final Submmition </h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										  </div>
										  <!-- Modal body -->
										  <div class="modal-body">
										  <div class="row">
										   
										  <div class="col-md-12"><br/>
										  <div class="form-group"><br/>
										  <textarea class="form-control" type="text" name="remark" placeholder="Remark"></textarea>
										  </div>
										  </div>
									 </div>
									   </div>
										  <!-- Modal footer -->
										  <div class="modal-footer">
											<button type="submit"  name="submitfinaldata"  value="Submit" class="btn btn-success">Submit</button>
											
										  </div>  
									  </div>
									</div>
									</form>
									</div>
									<script>
									$("#docsupload<?php echo $tasklist['id'];?>").on("change", function() {	
											if ($("#docsupload<?php echo $tasklist['id'];?>")[0].files.length > 5) {
												alert("You can select only 5 Files");
												document.getElementById("uploadbtn<?php echo $tasklist['id'];?>").disabled = true;
											} else {
											 document.getElementById("uploadbtn<?php echo $tasklist['id'];?>").disabled = false;
											}
										});
									</script>
								<?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
			<?php // echo $this->pagination->create_links(); ?>
            </div>
          </div>

        </div>
      </div>
    </section>

				<div class="modal" id="verifyModal">
					<form method="post" id="vfrm" action="" enctype="multipart/form-data">
					<input type="hidden" name="utaskid" value="">
					<input type="hidden" name="pagetype" value="approver" />
					  <div class="modal-dialog">
						<div class="modal-content">
						  <!-- Modal Header -->
						  <div class="modal-header">
							<h5 class="modal-title"><b id="dtype"></b> Document </h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						  </div>
						  <!-- Modal body -->
						  <div class="modal-body">
						  <div class="row">
						  <input type="hidden" name="docid" id="docid" value=""  />
						  <div class="col-md-12">
						  <div class="form-group">
						  <textarea class="form-control" type="text" name="remark" placeholder="Remark" required></textarea>
						  </div>
						  </div>
					 </div>
					   </div>
						  <!-- Modal footer -->
						  <div class="modal-footer">
							<button type="submit"  name="submitdata" value="Submit" class="btn btn-success">Submit</button>
							
						  </div>  
					  </div>
					</div>
					</form>
				</div>
  </main><!-- End #main -->
  


  
<script>

function doapproved(docid){
	
var r = confirm("Do you want to Approved this Document ?");
if (r == true) {
window.location.href= '<?php echo base_url(); ?>tcbp/approvedoc/'+docid;
} else {
  return false;
}

}


function doreject(docid,type){
 
var r = confirm("Do you want to Reject this Document entry?");
if (r == true) {
	$('#dtype').text(type);
	//$('#docid').value(docid);
	document.getElementById('docid').value = docid;
	$('#verifyModal').modal('show');
	//$('#vfrm').action('<?php echo base_url(); ?>tcbp/rejectdoc/'+docid);
	$('#vfrm').attr('action','<?php echo base_url(); ?>tcbp/rejectdoc/'+docid);
//window.location.href= '<?php echo base_url(); ?>tcbp/rejectdoc/'+docid;
} else {
  return false;
}
}
</script>
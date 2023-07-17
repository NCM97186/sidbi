<style>
@media (min-width: 576px){
.modal-dialog {
    max-width: 950px;
    margin: 1.75rem auto;
}
}
.myCollapse {
    display: none;
}
 .in {
  visibility: visible !important;
}
</style>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Report Events Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Manager</li>
          <li class="breadcrumb-item active">Approve Report</li>
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
						<h5 class="card-title">Approved Report</h5>
						</div>
						<div class="col-md-1 mt-4">
							<a href="<?php echo base_url();?>alltasks" class="btn-sm btn-info" title="All Task"><i class="fa fa-refresh"></i></a>&nbsp;
						</div>	
						</div>
						
						<center>
						<?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
					  </center>
						
					<?php  if($this->session->userdata('admin_session')['user_group_id'] != '4'){ ?>
					<form class="row m-0 pl-2 pr-2 mt-4" method="post">

					<!-- <div class="col-md-3" style="padding-right: 0px;">
					 <div>
						<input type="text" class="form-control" name="taskname" value="<?php echo $this->input->post('taskname'); ?>" id="exampleInputTask" aria-describedby="taskHelp" placeholder="Task/Event Name" />
					  <small id="taskHelp" class="form-text text-danger d-none">Task/Event name is required</small>
					  </div>       
					</div> --> 
					<div class="col-md-3">
					<div class="form-group">
					<?php //print_r($parenttasks); ?>
							<select class="form-select" name="ptask" id="ptask">
											<option value ="">--Parent Task/Event--</option>
											<?php foreach($parenttasks as $ptask){ ?>
											<option value="<?php  echo $ptask['id'];?>" <?php if($this->input->post('ptask') ==  $ptask['id']){ echo 'selected="selected"';   } ?> ><?php  echo ucfirst($ptask['taskname']);?></option>
											<?php } ?>
											
										  </select>
						  <small id="branchHelp" class="form-text text-danger d-none">Please select branch</small>
						   </div>  
					  </div> 
					  
					<div class="col-md-2">
					<div class="form-group">
					<?php //print_r($parenttasks); ?>
					   <select class="form-select" id="sel1" name="usrstate" >
											<option value="">--Select State--</option>
											<option value="Haryana" <?php echo ($this->input->post('usrstate') == 'Haryana')?'selected="selected"':''; ?>>Haryana</option>
											<option value="Rajasthan" <?php echo ($this->input->post('usrstate') == 'Rajasthan')?'selected="selected"':''; ?>>Rajasthan</option>
											<option value="Gujarat" <?php echo ($this->input->post('usrstate') == 'Gujarat')?'selected="selected"':''; ?>>Gujarat</option>
											<option value="Karnataka" <?php echo ($this->input->post('usrstate') == 'Karnataka')?'selected="selected"':''; ?>>Karnataka</option>
											<option value="UP" <?php echo ($this->input->post('usrstate') == 'UP')?'selected="selected"':''; ?>>Uttar Pradesh</option>
											<option value="Assam" <?php echo ($this->input->post('usrstate') == 'Assam')?'selected="selected"':''; ?>>Assam</option>	
											<option value="TamilNadu" <?php echo ($this->input->post('usrstate') == 'TamilNadu')?'selected="selected"':''; ?>>TamilNadu</option>	
											<option value="Uttarakhand" <?php echo ($this->input->post('usrstate') == 'Uttarakhand')?'selected="selected"':''; ?>>Uttarakhand</option>
											<option value="Andhra Pradesh" <?php echo ($this->input->post('usrstate') == 'Andhra Pradesh')?'selected="selected"':''; ?>>Andhra Pradesh</option>
											<option value="Maharashtra" <?php echo ($this->input->post('usrstate') == 'Maharashtra')?'selected="selected"':''; ?>>Maharashtra</option>
											<option value="Delhi" <?php echo ($this->input->post('usrstate') == 'Delhi')?'selected="selected"':''; ?>>Delhi</option> 
											<option value="Bihar" <?php echo ($this->input->post('usrstate') == 'Bihar')?'selected="selected"':''; ?>>Bihar</option> 
											<option value="Chhattisgarh" <?php echo ($this->input->post('usrstate') == 'Chhattisgarh')?'selected="selected"':''; ?>>Chhattisgarh</option> 
											<option value="Jammu & Kashmir" <?php echo ($this->input->post('usrstate') == 'Jammu & Kashmir')?'selected="selected"':''; ?>>Jammu & Kashmir</option> 
											<option value="Jharkhand" <?php echo ($this->input->post('usrstate') == 'Jharkhand')?'selected="selected"':''; ?>>Jharkhand</option> 
											<option value="Madhya Pradesh" <?php echo ($this->input->post('usrstate') == 'Madhya Pradesh')?'selected="selected"':''; ?>>Madhya Pradesh</option> 
											<option value="Odisha" <?php echo ($this->input->post('usrstate') == 'Odisha')?'selected="selected"':''; ?>>Odisha</option> 
											<option value="Punjab" <?php echo ($this->input->post('usrstate') == 'Punjab')?'selected="selected"':''; ?>>Punjab</option> 
											<option value="Telangana" <?php echo ($this->input->post('usrstate') == 'Telangana')?'selected="selected"':''; ?>>Telangana</option> 
											<option value="West Bengal" <?php echo ($this->input->post('usrstate') == 'West Bengal')?'selected="selected"':''; ?>>West Bengal</option> 
											<option value="Other" <?php echo ($this->input->post('usrstate') == 'Other')?'selected="selected"':''; ?>>Other</option> 
										  </select>
					</div>  
					</div> 



							
					   <div class="col-md-2">
					   <div>
					   <button type="submit" name="submitaddtask" class="btn  btn-info" value="Search">Search</button>
					   </div>       
					   </div>  
					  </form>
					  <?php  } ?>
						<br/>
						
             <br/>
			 <?php echo $this->pagination->create_links(); ?>
              <!-- Table with stripped rows -->
              <table id="taskTable" class="table datatable">
                <thead>
				<tr>
					<th scope="col">Task/Event List Name</th>
					<th scope="col">Parent Tasks/Events</th>
					<th scope="col">View</th>
					<th scope="col">State</th>
					<th scope="col">Total Uploads</th>
					<th scope="col">PMU Users</th>
					<th scope="col">Total Participants</th>
				</tr>
                </thead>
                <tbody style="overflow-y:auto;">
							<?php 
								
							$sumtotapuploads = 0;
							
							foreach($tcbps as $tcbp){ 
							
							$CI =&get_instance();
							$CI->load->model('main_model');
							
							$resultp= $CI->main_model->getnumberparticipantbytask($tcbp['id']);
							$result= $CI->main_model->getnumberuploadedbytask($tcbp['id']); 
							$childresult = $CI->main_model->getnumberuploadedbytask($tcbp['id']); 
							$parenttaskname = $CI->main_model->getpatenttaskname($tcbp['parenttask']); 
							//print_r($parenttaskname[0]['taskname']);
							$sumtotapuploads = count($childresult)
							?>
							
							<tr>
							<td><?php echo $tcbp['taskname']; ?></td>
							<td><?php echo isset($parenttaskname[0]['taskname'])?$parenttaskname[0]['taskname']:'';?> <?php //echo $tcbp['parenttask']; ?></td>
							<td class="col-md-2">								 

							<a href="<?php echo base_url().'uploads/documents/'.$tcbp['document']; ?>" target="_blank"><?php echo  '<i class="fa fa-file-pdf-o" style="font-size:30px;color:red"></i>'; ?></a></td>
                                        <td><?php echo $tcbp['tcbp_states']; ?></td>
							<td class="col-md-1" align="center"><b id="totaluploadsum<?php echo $tcbp['id'];?>"><?php echo $sumtotapuploads; ?></b></td>
							<td class="col-md-1" align="center"><b id="totalparticipentsum<?php echo $tcbp['id'];?>"><?php  echo count($resultp);?></b></td>
							<td><b id="sumtotalparticipentcount<?php echo $tcbp['id'];?>"><?php echo $tcbp['totalparticipants'];?></b></td>
							</tr>
							<script>
							$("#docsupload<?php echo $tcbp['id'];?>").on("change", function() {	
									if ($("#docsupload<?php echo $tcbp['id'];?>")[0].files.length > 5) {
										alert("You can select only 5 Files");
										document.getElementById("uploadbtn<?php echo $tcbp['id'];?>").disabled = true;
									} else {
									 document.getElementById("uploadbtn<?php echo $tcbp['id'];?>").disabled = false;
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



  <!-- Modal HTML -->
					  <div id="myModal_test" class="modal fade">
							<div class="modal-dialog modal-confirm">
								<div class="modal-content">
									<div class="modal-header">
																		
										<h4 class="modal-title">Uploaded Documents :</h4>	
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p id="hms_result"></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
										<!--button type="button" class="btn btn-danger"  style="background: red;">Reject</button><!--onclick="window.location='<?php echo base_url().'tcbp/reject/'.$datemanag['id']; ?>'"-->
									</div>
								</div>
							</div>
						</div> 

	  <script>
	  
       /*  $(function(){
            $("input[type = 'submit']").click(function(){
               var $fileUpload = $("input[type='file']");
               if (parseInt($fileUpload.get(0).files.length) > 3){
                  alert("You are only allowed to upload a maximum of 3 files");
               }
            });
         });*/
	  
/*$(".docsupload").on("change", function() {
	
	alert('its here');
	alert(parseInt($("#docsupload")[0].files.length));
    if ($("#docsupload")[0].files.length > 5) {
		
		alert($('#docsupload input[type=file]').get(0).files.length);
        alert("You can select only 5 Files");
		document.getElementById('uploadbtn').disabled = true;
    } else {
     document.getElementById('uploadbtn').disabled = false;
    }
});	*/		


			
			  function gettaskdetails(tid){
			  $('document').ready(function() {
				 // alert(tid);
			  $('#myModal_test').modal('show');
			  
			  
				$.ajax({
					url: "<?php echo base_url() ?>tcbp/getdocumentsbytasks",
					method: "POST",
					data: {taskid:tid},
					success: function(data){
						$('#hms_result').html(data);
						//$('#modal_tableHMS').modal('show');
					}
			 });
	         
			  });
			  }
			  
			  function deldoc(docid){
				  
				var txt;
				var r = confirm("Do you want to Delete this document ?");
				if (r == true) {
				  txt = "You pressed OK!";
				  window.location.href = "<?php  echo base_url().'task-list/deletedoc/'; ?>"+ docid;
				  //  alert(txt);
				} else {
				 // txt = "You pressed Cancel!";
				//    alert(txt);
				}
				  
			  }
			  </script>		
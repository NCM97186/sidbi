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
      <h1>Search Events Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Manager</li>
          <li class="breadcrumb-item active">Search Events</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
	<?php 
	
	$CI =&get_instance();
	$CI->load->model('main_model');
	$PMUmanager = $CI->main_model->getuserbydesignation('PMU Manager',$userdetails['state']);        
	$BusinessAnalyst = $CI->main_model->getuserbydesignation('Business Analyst',$userdetails['state']);    
	$StateNodalOfficer = $CI->main_model->getuserbydesignation('State Nodal Officer',$userdetails['state']);    	
	?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
			<div class="row">
				<div class="col-md-11">
						<h5 class="card-title">Search Events</h5>
						</div>
						<div class="col-md-1 mt-4">
							<a href="<?php echo base_url();?>alltasks" class="btn-sm btn-info" title="All Task"><i class="fa fa-refresh"></i></a>&nbsp;
						</div>	
						</div>
						
						<center>
						<?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
					  </center>
					  <?php //print_r($userdetails); ?>
				   <div class="row m-0 pl-2 pr-2">
						<div class="col-md-3">
						<strong>State: </strong>
						</div>
						<div class="col-md-3">
						<p> <?php echo ucfirst($userdetails['state']); ?></p>
						</div>
						<div class="col-md-3">
						<strong>PMU Manager: </strong>
						</div>
						<div class="col-md-3">
						<p><?php echo isset($PMUmanager['name']) ? $PMUmanager['name'] :''; ?></p>
						</div>
						
						<div class="col-md-3">
						<strong>Business Analyst: </strong>
						</div>
						<div class="col-md-3">
						<p><?php echo isset($BusinessAnalyst['name']) ? $BusinessAnalyst['name'] :''; ?></p>
						</div>						
							<div class="col-md-3">
						<strong>State Nodal Officer: </strong>
						</div>
						<div class="col-md-3">
						<p><?php echo isset($StateNodalOfficer['name']) ? $StateNodalOfficer['name'] :''; ?></p>
						</div>		
						</div>	
						<br/>
						
             <br/>
			 <div class="row m-0 pl-2 pr-2">	
						<div class="col-md-12">
							<table class="table table-bordered table-width dataTable no-footer" id="taskTable">
							  <thead>
								<tr>
								  <th scope="col" class="col-md-8">Event List</th>
								  <th scope="col" class="col-md-2">View</th>
								  <th scope="col" class="col-md-2" align="center" style="text-align:center;">State</th>
								  <th scope="col" class="col-md-2">Total Uploads</th>
								  <th scope="col" class="col-md-2">PMU Users</th>
								  <th scope="col" class="col-md-2">Total Participants</th>
								  <th scope="col" class="col-md-2">Status</th>
								</tr>
							  </thead>
							  <tbody>
							  <?php foreach($tcbps as $tcbp){ //print_r($tcbp);
								$CI =&get_instance();
								$CI->load->model('main_model');
							  $resultp= $CI->main_model->getnumberparticipantbytask($tcbp['id']);
							 $result= $CI->main_model->getnumberuploadedbytask($tcbp['id']); 
							  $chiltasks = $CI->main_model->tcpcpageentrieschild($tcbp['id']);

							  ?>
							  
							    <tr data-toggle="myCollapse<?php echo $tcbp['id'];?>" data-target=".taskid_<?php echo $tcbp['id'];?>" style="cursor:pointer;background-color: rgba(0, 0, 0, 0.05);">
								  <td class="col-md-7"><?php if(count($chiltasks)){ ?><i class="fa fa-angle-double-down"></i>&nbsp;<?php } ?><?php echo $tcbp['taskname'];  ?></td>
								   <td class="col-md-2">								 
								   <!-- <?php //if(count($chiltasks) == 0){ ?><a class="btn-action btn-sm btn-info"  data-toggle="modal" data-bs-target="#uploadModal<?php echo $tcbp['id'];?>"><i class="fa fa-upload"></i></a><?php //} ?> -->
								   	<!-- Upload File Modal -->
									<div class="modal" id="uploadModal<?php echo $tcbp['id'];?>">
									
									<form method="post" id="frm_<?php echo $tcbp['id'];?>" action="<?php echo base_url();?>task-manager/add" enctype="multipart/form-data">
									<input type="hidden" name="utaskid" value="<?php echo $tcbp['id'];?>">
									<input type="hidden" name="redirecturi" value="<?php echo $this->uri->segment(1);?>">
									  <div class="modal-dialog">
										<div class="modal-content">
										
										  <div class="modal-header">
											<h5 class="modal-title">Upload Task File </h5>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										  </div>
										
										  <div class="modal-body">
										  <div class="row">
										   <div class="col-md-12">
										   <div class="form-group">
										   <label>Upload Govt. Officials Files</label>
										   <input type="file" name="docs[]"  id='docsupload<?php echo $tcbp['id'];?>' multiple  required />
										   </div>				
										  </div>
										  <div class="col-md-12">
										  <div class="form-group">
										  <textarea class="form-control" type="text" name="remark" placeholder="Remark"></textarea>
										  </div>
										  </div>
									 </div>
									   </div>
										 
										  <div class="modal-footer">
											<button type="submit"  name="submitdata" id="uploadbtn<?php echo $tcbp['id'];?>" value="Submit" class="btn btn-success">Upload</button>
											
										  </div>  
									  </div>
									</div>
									</form>
									</div>
									<?php if(count($result) > 0){ ?> 	
								   <a  onclick="gettaskdetails(<?php echo $tcbp['id'];?>)" class="btn-action btn-sm btn-info" data-toggle="modal" ><i class="fa fa-eye"></i></a>
								    <?php } ?>
								  </td>
								  <td class="col-md-1" align="center"><b><?php echo $tcbp['tcbp_states'];?></b></td>
								  <td class="col-md-1" align="center"><b id="totaluploadsum<?php echo $tcbp['id'];?>">0</b></td>
								  <td class="col-md-1" align="center"><b id="totalparticipentsum<?php echo $tcbp['id'];?>"><?php  echo count($resultp);?></b> <!--/ <b id="sumtotalparticipentcount<?php echo $tcbp['id'];?>"><?php echo $tcbp['totalparticipants'];?></b--></td>
								  <td class="col-md-1" align="center"><b id="sumtotalparticipentcount<?php echo $tcbp['id'];?>"><?php echo $tcbp['totalparticipants'];?></b></td>
								  <td class="col-md-1">
								<?php if(count($chiltasks) <= 0){  if(count($resultp) > 0){ ?> 	<a  class="btn-action btn-sm btn-success"><i class="fa fa-check-circle"></i></a> <?php } else { ?>
								<a class="btn-action btn-sm btn-danger"><i class="fa fa-times-circle"></i></a>		<?php } } ?>
								  </td>
							
								 </tr>
							
							    <?php
								$sumtotapuploads = 0;
								$sumtotalparticipent = 0;
								$sumtotalparticipentcount = 0;
								 foreach($chiltasks as $chiltask){

								$childresultp= $CI->main_model->getnumberparticipantbytask($chiltask['id']);
								$childresult= $CI->main_model->getnumberuploadedbytask($chiltask['id']); 
								
								?>
									
								<tr id="taskid_<?php echo $tcbp['id'];?>"  class="myCollapse<?php echo $tcbp['id'];?> taskid_<?php echo $tcbp['id'];?>"  style="visibility: collapse;">
								<td class="col-md-7"><?php echo $chiltask['taskname'];  ?></td>
								<td class="col-md-2">								 
								   <a class="btn-action btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#uploadModa<?php echo $chiltask['id'];?>"><i class="fa fa-upload"></i></a>
								   	<!-- Upload File Modal -->
									<div class="modal fade" id="uploadModa<?php echo $chiltask['id'];?>">
									<form method="post" action="<?php echo base_url();?>task-manager/add" enctype="multipart/form-data">
									<input type="hidden" name="utaskid" value="<?php echo $chiltask['id'];?>">
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
										   <input type="file" name="docs[]"  id='docsupload<?php echo $chiltask['id'];?>' multiple   required />
										   <label style="color:red;font-size:12px;">(Max 5 Doc Allowed ,Document upload Size should be less than 10 mb)</label>
										   </div>				
										  </div>
										  <div class="col-md-12">
										  <div class="form-group"><br/>
										  <textarea class="form-control" type="text" name="remark" placeholder="Remark"></textarea>
										  </div>
										  </div>
									 </div>
									   </div>
										  <!-- Modal footer -->
										  <div class="modal-footer">
											<button type="submit"  name="submitdata"  id="uploadbtn<?php echo $chiltask['id'];?>" value="Submit" class="btn btn-success">Upload</button>
											
										  </div>  
									  </div>
									</div>
									</form>
									</div>
									<script>
									$("#docsupload<?php echo $chiltask['id'];?>").on("change", function() {	
											if ($("#docsupload<?php echo $chiltask['id'];?>")[0].files.length > 5) {
												alert("You can select only 5 Files");
												document.getElementById("uploadbtn<?php echo $chiltask['id'];?>").disabled = true;
											} else {
											 document.getElementById("uploadbtn<?php echo $chiltask['id'];?>").disabled = false;
											}
										});
									</script>
									<?php if(count($childresult) > 0){ ?> 	
								   <a onclick="gettaskdetails(<?php echo $chiltask['id'];?>)" class="btn-action btn-sm btn-info" data-toggle="modal" data-target=""><i class="fa fa-eye"></i></a>
								    <?php } ?>
								  </td>
								<td class="col-md-1" align="center"><b><?php echo $chiltask['tcbp_states'];?></b></td>
								<td class="col-md-1" align="center"><b><?php $sumtotapuploads += count($childresult); echo count($childresult); ?></b>
								<td class="col-md-1" align="center"><b><?php $sumtotalparticipent += count($childresultp); $sumtotalparticipentcount += $chiltask['totalparticipants'];  echo count($childresultp);?> <!--/ <?php echo $chiltask['totalparticipants'];?> --></b></td>
								<td class="col-md-1" align="center"><b><?php echo $chiltask['totalparticipants'];?></b></td>
								<td class="col-md-1">
								<?php if(count($childresultp) > 0){ ?> 	<a  class="btn-action btn-sm btn-success"><i class="fa fa-check-circle"></i></a> <?php } else { ?>
								<a  class="btn-action btn-sm btn-danger"><i class="fa fa-times-circle"></i></a>		<?php } ?>
								</td>						 
								 
								 </tr>
									<?php  }
								   ?>
							
								<script>
								$(document).on("click", "#submitdata<?php echo $tcbp['id'];?>", function(event){
									document.getElementById("frm_<?php echo $tcbp['id'];?>").submit();
									    event.preventDefault();


								});
								document.getElementById("totaluploadsum<?php echo $tcbp['id'];?>").innerHTML = '<?php echo $sumtotapuploads; ?>';
								document.getElementById("totalparticipentsum<?php echo $tcbp['id'];?>").innerHTML = '<?php echo $sumtotalparticipent; ?>';
								document.getElementById("sumtotalparticipentcount<?php echo $tcbp['id'];?>").innerHTML = '<?php echo $sumtotalparticipentcount; ?>';
								 $("[data-toggle='myCollapse<?php echo $tcbp['id'];?>']").click(function( ev ) {
									ev.preventDefault();
									var target;
									//alert(this.hasAttribute('data-target'));
									
									if (this.hasAttribute('data-target')) {
										target = $(this.getAttribute('data-target'));
										//document.getElementById("taskid_<?php echo $tcbp['id'];?>").style.display = "block";
									} else {
										target = $(this.getAttribute('href'));
										//document.getElementById("taskid_<?php echo $tcbp['id'];?>").style.display = "none";
									};
									target.toggleClass("in");
									//console.log(target.hasClass('in'));
								});
								 </script>
								
							  <?php } ?>
								
								
							  </tbody>
							</table>
						</div>
						<!--div class="col-md-12 text-center mb-1 pb-3">
						<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#approveRejectModal">Approve/Reject</button>
						</div-->	
						<div class="col-md-12 text-center mb-1 pb-3">
							<br/><br/><br/><br/><br/><br/> 
						</div>	
					
						</div>
              <!-- End Table with stripped rows -->
			<?php // echo $this->pagination->create_links(); ?>
            </div>
          </div>

        </div>
      </div>
    </section>



<!-- Approve/Reject Modal -->
<div class="modal fade" id="approveRejectModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Approve/Reject Remark</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	  <div class="row">
	  <div class="col-md-12">
	  <div class="form-group">
	  <textarea class="form-control" type="text" name="remark" placeholder="Remarks"></textarea>
	  </div>
	  </div>
 </div>
   </div>
      <!-- Modal footer -->
      <div class="modal-footer">
	    <button type="submit" class="btn btn-success">Submit</button>
      </div>  
  </div>
</div>
</div>


<script>
function opensub(id){
	//alert('hii');
	document.getElementById('childtask_'+id).style.display = "block";
}
</script>

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
						$('#modal_tableHMS').modal('show');
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



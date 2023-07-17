  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Verifier Manager</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Manager</li>
          <li class="breadcrumb-item active">Verifier Manager</li>
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
						<h5 class="card-title">Verifier Manager</h5>
						</div>
						<div class="col-md-1 mt-4">
							<a href="<?php echo base_url();?>verifier-manager" class="btn-sm btn-info" title="Add Task"><i class="fa fa-refresh"></i></a>&nbsp;
						</div>	
						</div>
						
						<center>
						<?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:green;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
					  </center>
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
                     <th scope="col">Uploaded By</th>
					<th scope="col">Task ID/Name</th>
					<th scope="col">Document</th>
										                                       
					<th scope="col">Action</th>
					<th scope="col">Acitivity Log/Remarks</th>
                  </tr>
                </thead>
                <tbody style="overflow-y:auto;">
				
				<?php 
								
					$CI =&get_instance();
					$CI->load->model('main_model');
				
					foreach($cdocs as $cdoc){ 
					//print_r($cdoc);
					  $taskname= $CI->main_model->getpatenttaskname($cdoc['taskid']);
					  //print_r($taskname);
					  if(count($taskname) > 0){
						  
						  $taskname = $taskname[0]['taskname'];
					  }
					  else
					  {
						  $taskname = '';
					  }
					  ?>
						 <tr>
							<td><?php echo ucfirst($cdoc['name']); ?><br/><a href="mailto:<?php echo $cdoc['email']; ?>"><?php echo  $cdoc['email']; ?></a><br/><a href="callto:<?php echo  $cdoc['mobile']; ?>"><?php echo $cdoc['mobile']; ?></a></td>
							<td style="word-wrap: break-word;min-width: 160px;max-width: 160px;"><?php echo $cdoc['taskid'].' / '.$taskname; ?></td>
							<td><a href="<?php echo base_url().'uploads/documents/'.$cdoc['document']; ?>" target="_blank"><?php echo  $cdoc['document']; ?></a></td>
              <td style="word-wrap: break-word;min-width: 156px;max-width: 156px;font-size:13px;"><?php  if($cdoc['isverified'] == true){ echo '<b style="color:#FFC107;">Verified</b><br/>'; } if($cdoc['isrejected'] == true ){ echo '<b style="color:red;">Rejected</b>';  }
							if($cdoc['isrejected'] == false && $cdoc['isverified'] == false) { ?> 
							<div class="row">
							<button class="btn btn-warning btn-sm col-md-5 me-2" style="padding: 5px 10px 5px 10px;color:#fff;backgroud:#4154f1;" onclick="doverify(<?php echo $cdoc['docid'] ?>,'Verify')">Verify</button>
							
							<button class="btn btn-danger btn-sm col-md-5" onclick="doreject(<?php echo $cdoc['docid'] ?>,'Reject')">Reject</button>
							<button class="btn btn-success btn-sm col-md-5" style = "margin-top: 10px;" onclick="doquery(<?php echo $cdoc['docid'] ?>,'Query')">Query</button>
							</div>
							<?php } ?>
							</td>
							<td style="min-width:100px;font-size:13px;max-width:220px;">
								<?php if($cdoc['approverquery'] != ''){
                 echo '<br/><b style="font-weight:bold;color:blue;">Query: '.$cdoc['approverquery'].' <br/>Query Date: '.str_replace('~~',' ',$cdoc['querydate']).'</b>';
								}?>
							<?php if($cdoc['verifydate'] != ''){ echo '<br/><b style="font-weight:bold;color:#ffc107;">Verified Date: '.str_replace('~~',' ',$cdoc['verifydate']).'</b>'; } ?>
							
							<?php if($cdoc['rejecteddate'] != ''){ echo '<br/><b style="font-weight:bold;color:red;">Reject : '.str_replace('~~',' ',$cdoc['rejecteddate']) .'</b>'; } ?>
							
							<?php if($cdoc['approvedate'] != ''){ echo '<br/><b style="font-weight:bold;color:green;">Approve : '.str_replace('~~',' ',$cdoc['approvedate']) .'</b>'; } ?>
							
							<?php if($cdoc['isverified'] == true && $cdoc['isrejected'] == true){ echo '<br/><b>Rejected By: </b>'.ucfirst($cdoc['vname']); ?><br/><a href="mailto:<?php echo $cdoc['vemail']; ?>"><?php echo  $cdoc['vemail']; ?></a><br/><a href="callto:<?php echo  $cdoc['vmobile']; ?>"><?php echo $cdoc['vmobile']; ?></a><br/><b>Reason: </b><?php echo  $cdoc['remarks'];?><?php  } ?>
							<?php echo '<br/><b>Last Updated: </b>'.str_replace('~~',' ',$cdoc['lastupdated']);?>
							
							<?php echo '<br/><b>Doc Remarks: </b>'. $cdoc['remarks'];?>
							<?php echo '<br/><b>Remarks: </b>'. $cdoc['querysubmit'];?>

							</td>
							
						</tr>
					<div class="modal fade"  id="QueryModal">
					<form method="post" id="fvfrm" action="<?php echo base_url(); ?>tcbp/doquery/<?php echo $cdoc['docid']; ?>" enctype="multipart/form-data">
					<input type="hidden" name="utaskid" value="">
					<input type="hidden" name="pagetype" value="verifier" />
					  <div class="modal-dialog">
						<div class="modal-content">
						  <!-- Modal Header -->
						  <div class="modal-header">
							<h5 class="modal-title"><b id="dtype"></b>Document</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						  </div>
						  <!-- Modal body -->
						  <div class="modal-body">
						  <div class="row">
						  <input type="hidden" name="docid" id="docid" value=""  />
						  <input type="hidden" name="taskid" id="taskid" value="<?php echo $cdoc['taskid']; ?>"  />
						  <div class="col-md-12">
						  <div class="form-group">
						  <textarea class="form-control" type="text" name="verifierquery" placeholder="Query" required></textarea>
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
								<div class="modal fade"  id="RejectModal">
					<form method="post" id="fvfrm" action="<?php echo base_url(); ?>tcbp/verifydoc/<?php echo $cdoc['docid']; ?>" enctype="multipart/form-data">
					<input type="hidden" name="utaskid" value="">
					<input type="hidden" name="pagetype" value="verifier" />
					  <div class="modal-dialog">
						<div class="modal-content">
						  <!-- Modal Header -->
						  <div class="modal-header">
							<h5 class="modal-title"><b id="dtype"></b> Verify Document </h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						  </div>
						  <!-- Modal body -->
						  <div class="modal-body">
						  <div class="row">
						  <input type="hidden" name="docid" id="docid" value=""  />
						  <div class="col-md-12">
						  <div class="form-group">
						  <textarea class="form-control" type="text" name="verifyremark" placeholder="Remark" required></textarea>
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

				<div class="modal fade"  id="verifyModal">
					<form method="post" id="vfrm" action="" enctype="multipart/form-data">
					<input type="hidden" name="utaskid" value="">
					<input type="hidden" name="pagetype" value="verifier" />
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

function doverify(docid,type){
	
var r = confirm("Do you want to verify this Document ?");
if (r == true) {
  $('#dtype').text(type);
	$('#RejectModal').modal('show');
	$('#fvfrm').attr('action','<?php echo base_url(); ?>tcbp/verifydoc/'+docid);
	//window.location.href= '<?php echo base_url(); ?>tcbp/verifydoc/'+docid;
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
			
			$('#vfrm').attr('action','<?php echo base_url(); ?>tcbp/rejectdoc/'+docid);

		} else {
		  return false;
		}
}
function doquery(docid,type){
 
	var r = confirm("Do you want to Raise Query?");
		if (r == true) {
			$('#dtype').text(type);
			//$('#docid').value(docid);
			document.getElementById('docid').value = docid;
			$('#QueryModal').modal('show');
			//$('#vfrm').attr('action','<?php echo base_url(); ?>tcbp/doquery/'+docid);

		} else {
		  return false;
		}
}
</script>
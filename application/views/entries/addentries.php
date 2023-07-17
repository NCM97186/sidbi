<style>

element.style {
}
.b-b {
    border-bottom: 1px solid #eaeef1;
}
.pull-in {
    margin-left: -15px;
    margin-right: -15px;
}
.line-dashed {
    border-style: dashed !important;
    background-color: transparent;
    border-width: 0;
}
.line-lg {
    margin-top: 7px;
    margin-bottom: 7px;
}
</style>
<?php 
error_reporting(false);
if($this->input->post() != true && $this->uri->segment(3) == false ){
	?>
	<script>
	alert('Please select the customer and date from the top....');
	window.location = '<?php echo base_url(); ?>frontuser';
	</script>
	
	<?php 

}
if($this->uri->segment(3) == true){	    
	//print_r($entrydetails);
	$entrydate = $entrydetails['ce_date'];	
	$entrydetail = $entrydetails['ce_cid'].'~'.$entrydetails['ce_custname'].' / '.$entrydetails['ce_mobile'].' / '.$entrydetails['ce_email'];	
	$prodcount = explode(',',$entrydetails['ce_productscount']);	
	
	$p1 = $prodcount[0];
	$p2 = $prodcount[1];
	$p3 = $prodcount[2];
	$p4 = $prodcount[3];
	$deliverydate = $entrydetails['deliverydate']; 
	$entrystatus = $entrydetails['entrystatus'];
	$worker1 = $entrydetails['worker1'];
	$worker2 = $entrydetails['worker2'];
	$worker3 = $entrydetails['worker3'];
	$cutting1 = $entrydetails['cutting1'];
	$cutting2 = $entrydetails['cutting2'];
	$workerpiece1 = $entrydetails['workerpiece1'];
	$workerpiece2 = $entrydetails['workerpiece2'];
	$workerpiece3 = $entrydetails['workerpiece3'];
	$cuttingpiece1 = $entrydetails['cuttingpiece1'];
	$cuttingpiece2 = $entrydetails['cuttingpiece2'];
	$substartdate = $entrydetails['substartdate'];
	$subenddate = $entrydetails['subenddate'];
	$subctype = $entrydetails['subctype']; 
	$isgargygift = $entrydetails['isgargygift']; 
	$isforeign = $entrydetails['isforeign']; 
	$sub_year = $entrydetails['sub_year']; 
	$sub_month = $entrydetails['sub_month']; 
	$iscomplementary = $entrydetails['iscomplementary']; 
	$pathtype = 'edit';
	if($entrystatus == 'active'){ $entrystatus = 'checked="checked"'; } else { $entrystatus = '';  }
	if($isgargygift == '1'){ $isgargygift = 'checked="checked"'; } else { $isgargygift = '';  }
	if($isforeign == '1'){ $isforeign = 'checked="checked"'; } else { $isforeign = '';  }
	if($iscomplementary == '1'){ $iscomplementary = 'checked="checked"'; } else { $iscomplementary = '';  }
	
	
	}else{	
	
	$pathtype = 'add';
	$entrydate = $this->input->post('entrydate'); 
	$entrydetail = $this->input->post('searchcust');
	$worker1 = $this->input->post('worker1');
	$workerpiece1 = $this->input->post('workerpiece1');
	$p1 = '';
	$p2 = '';
	$p3 = '';
	$p4 = '';
	$substartdate = '';
	$subenddate = '';
	$sub_year = ''; 
	$sub_month = ''; 
	$date = strtotime("+7 day");
	$deliverydate =  date('d-m-Y', $date);
	$entrystatus = 'checked="checked"';
	
}



?>


<div id="generatedModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Subscribe our Newsletter</h4>
            </div>
            <div class="modal-body">
				<p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
<section class="panel panel-default">
                <header class="panel-heading font-bold" style="height: 39px;">
                <div class="col-md-2"> Add Entry</div>
				<div class="col-md-10">
					<div class="col-md-4"><a href="#paymentlist" style="color:#177bbb;" >Payment List >></a>&nbsp;&nbsp;&nbsp;</div>
					<div class="col-md-4"><a href="#labellist" style="color:#177bbb;" >Label List >></a>&nbsp;&nbsp;&nbsp;</div>
					<div class="col-md-4"><a href="#invoicelist" style="color:#177bbb;" >Invoice  List >></a></div>
				</div>
                </header>
				
                <div class="panel-body" style="height: 100%;overflow: scroll;">
                  <form class="form-horizontal" method="post">
                  <?php if($this->input->get('paymentadd') == true){ ?>
				  <div class="alert alert-success" role="alert">
					  Payment Detail added successfully
				  </div> 
				  <?php } ?>
				   <?php if($this->input->get('labelgenerate') == true){ ?>
				  <div class="alert alert-success" role="alert">
					  <b>Label has been generated successfully!</b> make sure print it and send.
				  </div> 
				  <?php } ?>
				   <?php if($this->input->get('generateinvoice') == true){ ?>
				  <div class="alert alert-success" role="alert">
					  <b>Invoice	 has been generated successfully!</b> make sure print it and send.
				  </div> 
				  <?php } ?>
				  
                  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Entry Date</label>
                    <div class="col-sm-10">
                  <label style="font-size: 19px;color: #1AAE88;"><?php echo $entrydate; ?></label>
				  <input type="hidden" name="entrydate" value="<?php echo $entrydate; ?>" />
				  <input type="hidden" name="pathtype" value="<?php echo $pathtype; ?>" />
                    </div>
                    </div> 
				  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Entry Details</label>
                    <div class="col-sm-10">
                  <input type="text" name="custdetails" class="form-control" value="<?php echo $entrydetail; ?>" placeholder="Entry Details" readonly />
                    </div>
                    </div>
				  <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Assign Category</label>
					<div class="col-sm-10">
					<div class="row">
				
                   <div class="col-md-3">
					<div class="form-group">
					 <label class="col-md-5 control-label">GargyGift</label>
					  <div class="col-md-7">
					 <label class="switch">
					 <input name="isgargygift" id="isgargygift" type="checkbox" <?php echo $isgargygift; ?> value="1" />
						<span></span>
					 </label>
                   </div>
                   </div>
                 
                     </div>
                    <div class="col-md-3">
					<div class="form-group">
					 <label class="col-md-5 control-label">Foreign</label>
					  <div class="col-md-7">
					 <label class="switch">
					 <input name="isforeign" id="isforeign" type="checkbox" <?php echo $isforeign; ?> value="1" />
						<span></span>
					 </label>
                   </div>
                   </div>
                     </div>
			        <div class="col-md-3">
					   <div class="form-group">
						 <label class="col-md-5 control-label">Complimentory</label>
						  <div class="col-md-7">
						 <label class="switch">
						 <input name="iscomplementary" id="iscomplementary" type="checkbox" <?php echo $iscomplementary; ?>  value="1" />
							<span></span>
						 </label>
					   </div>
					   </div>
                     </div>
                     </div>
                     </div>
                     </div>
					<!--div class="line line-dashed b-b line-lg pull-in"></div>
					
				    <div class="col-md-12">
					<div class="col-md-6">
					<div class="form-group">
					<label class="col-sm-4 control-label">Start Date</label>
                    <div class="col-sm-8">
					<input class="input-sm datepicker-input form-control" name="substartdate" size="16" autocomplete='substartdate' type="text" value="<?php echo $substartdate ; ?>" data-date-format="dd-mm-yyyy">
                    </div>
                    </div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					<label class="col-sm-4 control-label">End Date</label>
                    <div class="col-sm-8">
					<input class="input-sm datepicker-input form-control" name="subenddate" size="16" type="text" autocomplete='subenddate' value="<?php echo $subenddate ; ?>" data-date-format="dd-mm-yyyy">
                    </div>
                    </div>
					</div>
					</div-->
					
					<?php if($pathtype ==  'edit'){ ?>
					<div class="line line-dashed b-b line-lg pull-in"></div>
					<div class="col-md-12">
					<div class="col-md-2">
					</div>
					<div class="col-md-10">
					<!-- Trigger the modal with a button -->
					
					<button type="button" name="payment" value="Add Payment Invoice" data-toggle="modal" data-target="#myModal" class="btn btn-primary" >Add Payment</button>
					
					<br/>
					</div></div>
					
					
                 <div class="line line-dashed b-b line-lg pull-in" style="border-bottom: 1px solid transparent;"></div>
				 <?php  } ?>
				 <div class="line line-dashed b-b line-lg pull-in"></div>
				 <div class="col-md-12"><br/>
                  <div class="form-group">
                 <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                 <label class="switch">
                 <input name="status" type="checkbox" <?php echo $entrystatus;  ?> value="1">
                    <span></span>
                 </label>
                   </div>
                   </div>
				   </div>
				 <div class="line line-dashed b-b line-lg pull-in"></div>
                  <div class="form-group">
                 <div class="col-sm-4 col-sm-offset-2">
                 <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url() ?>previousentry'" >Cancel</button>
                 <button type="submit" name="Save Entry" value="Save Entry" class="btn btn-primary"><?php echo ($pathtype == 'edit')?'Save Entry':'Confirm and Add Payment'; ?></button>
                  </div>
                  </div>
                  </form>
				  
				
				
                <div class="table-responsive" id="paymentlist">
				<header class="panel-heading font-bold">
                <div style="float:left;">Payments List  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
				<!--button type="button" name="genratelabel" value="Generate Label" class="btn btn-primary" onclick="window.location.href = '<?php echo base_url().'entries/generatelabel?sid='.$this->uri->segment(3); ?>'" style="font-size: 13px;"><i class="fa fa-align-justify" aria-hidden="true"></i>&nbsp;Generate Label</button-->
				<?php if($pathtype ==  'edit'){ ?>
				<div style="float:right;font-weight:bold;color:#1AAE88;">&nbsp;&nbsp;&nbsp;<button type="button" name="generateinvoice" value="Generate Invoice" class="btn btn-primary" onclick="window.location.href = '<?php echo base_url().'entries/generateinvoice?sid='.$this->uri->segment(3); ?>'" style="font-size: 13px;"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Generate Invoice</button></div>
				<?php } ?>
                </header>
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="20">ID</th>
                        <th>Date</th>
						<th>ChequeNo</th>
						<th>Cheque Date</th>						
                        <th>Amount</th>
                        <th>Last Updates</th>	
						<th>Action</th>							
                      </tr>
                    </thead>
                    <tbody>
					
					<?php   //print_r($foundrypayments);
					foreach($foundrypayments as $foundrypayment ){  ?>
						<tr>
                        <td><?php echo $foundrypayment['pid']; ?></td>
                        <td><?php echo $foundrypayment['pdate']; ?></td>
						<td><?php echo $foundrypayment['chequeno']; ?></td>
						<td><?php echo $foundrypayment['chequedate']; ?></td>
                        <td><?php echo $foundrypayment['amount']; ?></td>                       
					    <td><?php echo $foundrypayment['last_updates']; ?></td>	
						<td>
						<button class="btn btn-sm btn-default" onclick="window.location='<?php echo base_url(); ?>payment/edit/<?php echo $foundrypayment['pid']; ?>'">Edit</button>
						<button class="btn btn-sm btn-default" onclick="deletepayment(<?php echo $this->uri->segment(3); ?>,<?php echo $foundrypayment['pid']; ?>)" >Delete</button>
						</td>	
						</tr>
					                      <!-- Modal HTML -->
					  <div id="myModal_<?php echo $todayentrie['ce_id']; ?>" class="modal fade">
							<div class="modal-dialog modal-confirm">
								<div class="modal-content">
									<div class="modal-header">
										<div class="icon-box">
					                   <i class="fa fa-times" aria-hidden="true"></i>
				                          </div>	
                                        										
										<h4 class="modal-title">Are you sure?</h4>	
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										<p>Do you really want to delete these records? This process cannot be undone.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url().'entries/delete/'.$todayentrie['ce_id']; ?>'">Delete</button>
									</div>
								</div>
							</div>
						</div>						
					<?php } ?>
                    </tbody>
                  </table>
                </div>
				
						<div class="table-responsive" id="invoicelist">
				<header class="panel-heading font-bold">
                <div style="float:left;">Invoice List  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
				
                </header>
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="20">ID</th>
						<th>Invoice No.</th>
						<th>Invoice Date</th>
						<th>Total Text</th>						
                        <th>Total</th>
                        <th>Remarks</th>
						<th>Status</th>
						<th>Last Updated</th>	
						<th>Action</th>							
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($foundryinvoices as $foundryinvoice ){  ?>
						<tr>
                        <td><?php echo $foundryinvoice['id_inv']; ?></td>
                        <td><?php echo $foundryinvoice['invoiceno']; ?></td>
						<td><?php echo $foundryinvoice['invoice_date']; ?></td>
						<td><?php echo $foundryinvoice['totaltext']; ?></td>
                        <td><?php echo $foundryinvoice['total']; ?></td>                       
					    <td><?php echo $foundryinvoice['remarks']; ?></td>
						<td><?php echo ucfirst($foundryinvoice['status']); ?></td>
						<td><?php echo $foundryinvoice['last_updates']; ?></td>						
						<td>
						<button class="btn btn-sm btn-default" onclick="window.location='<?php echo base_url(); ?>payment/edit/<?php echo $foundryinvoice['id_inv']; ?>'">Print</button>
						<button class="btn btn-sm btn-default" href="#myModal_10" "="" data-toggle="modal">Delete</button>
						</td>	
						</tr>
					                      <!-- Modal HTML -->
					  <div id="myModal_<?php echo $foundryinvoice['id_inv']; ?>" class="modal fade">
							<div class="modal-dialog modal-confirm">
								<div class="modal-content">
									<div class="modal-header">
										<div class="icon-box">
					                   <i class="fa fa-times" aria-hidden="true"></i>
				                          </div>	
                                        										
										<h4 class="modal-title">Are you sure?</h4>	
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										<p>Do you really want to delete these records? This process cannot be undone.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url().'invoice/delete/'.$foundryinvoice['id_inv']; ?>'">Delete</button>
									</div>
								</div>
							</div>
						</div>						
					<?php } ?>
                    </tbody>
                  </table>
                </div>
							
				<div class="table-responsive" id="labellist">
				<header class="panel-heading font-bold">
                <div style="float:left;">Label List  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
		
                </header>
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="20">ID</th>
                        <th>Label</th>
						<th>Status</th>	
                        <th>Last Updates</th>	
						<th>Action</th>							
                      </tr>
                    </thead>
                    <tbody>
					
					<?php   //print_r($foundrylabels);
					foreach($foundrylabels as $foundrylabel ){ $ccode = explode('(',$foundrylabel['ccode']);  ?>
						<tr>
                        <td><?php echo $foundrylabel['id_label']; ?></td>
                        <td><b style="background-color:#fff;padding:5px;"><?php echo $ccode[0].'('.$foundrylabel['label'].')'; ?></b></td>
						<td><?php echo $foundrylabel['status']; ?></td>                     
					    <td><?php echo $foundrylabel['last_updated']; ?></td>	
						<td>
						<button class="btn btn-sm btn-default" onclick="window.location='<?php echo base_url(); ?>entries/edit/<?php echo $foundrylabel['id_label']; ?>'">Edit</button>
						<button class="btn btn-sm btn-default" href="#myModal_10" "="" data-toggle="modal">Delete</button>
						</td>	
						</tr>
					 
						<!-- Modal HTML -->
						<div id="myModal_<?php echo $foundrylabel['id_label']; ?>" class="modal fade">
							<div class="modal-dialog modal-confirm">
								<div class="modal-content">
									<div class="modal-header">
										<div class="icon-box">
					                   <i class="fa fa-times" aria-hidden="true"></i>
				                          </div>	
                                        										
										<h4 class="modal-title">Are you sure?</h4>	
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										<p>Do you really want to delete these records? This process cannot be undone.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url().'entries/delete/'.$foundrylabel['id_label']; ?>'">Delete</button>
									</div>
								</div>
							</div>
						</div>						
					<?php } ?>
                    </tbody>
                  </table>
                </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Payment</h4>
      </div>
      <div class="modal-body">
	  <form name="addpayment" method="post">
		
		 <div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<label class="col-md-3 control-label" style="font-weight:bold;">Payment Date</label>
		<div class="col-md-9">
		<input class="form-control datepicker-input" name="paymentdate" id="paymentdate" size="16" autocomplete="paymentdate" type="date" placeholder="i.e:11-11-2022"  data-date-format="dd-mm-yyyy" required />
		</div>
		</div>
		</div>
	
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<label class="col-md-3 control-label" style="font-weight:bold;">Cheque/DD/NEFT No.</label>
		<div class="col-md-9">
		<input class="form-control" name="chequeno" size="16" autocomplete="chequeno" id="chequeno" type="text" placeholder="i.e:123456" required />
		</div>
		</div>
		</div>
	    <div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<label class="col-md-3 control-label" style="font-weight:bold;">Cheque/DD/NEFT Date</label>
		<div class="col-md-9">
		<input class="form-control datepicker-input" name="chequedate" id="chequedate" size="16" autocomplete="chequedate" type="date" placeholder="i.e:11-11-2022"  data-date-format="dd-mm-yyyy" required />
		</div>
		</div>
		</div>
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<label class="col-md-3 control-label" style="font-weight:bold;">Drawn On</label>
		<div class="col-md-9">
		<input class="form-control" name="chequeby"  autocomplete="off" id="chequeby"  type="text" placeholder="i.e: XYZ Bank LTD - Branch" required />
		</div>
		</div>
		</div>
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<label class="col-md-3 control-label" style="font-weight:bold;">Amount</label>
		<div class="col-md-9">
		<input class="form-control" name="amount"  autocomplete="off" id="amount"  type="number" min="0" required />
		</div>
		</div>
		</div>
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<label class="col-md-3 control-label" style="font-weight:bold;font-size:14px;">Issue</label>
		<div class="col-md-4">
		<select name="issue" id="issue" class="form-control"  required>
		<option value=""></option>
		<option value="1">JF</option>
		<option value="3">MA</option>
		<option value="5">MJ</option>
		<option value="7">JA</option>
		<option value="9">SO</option>
		<option value="11">ND</option>
		</select>
		</div>
		<label class="col-md-1 control-label" style="font-weight:bold;">Year</label>
		<div class="col-md-4">
		<input class="input-sm form-control" name="year" id="year" size="16" autocomplete="year" type="number" value="<?php echo date('Y', time()); ?>"  required  />
		</div>
		</div>
		</div>
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<div class="col-md-12">	
		<div class="col-md-6">
		<label class="col-md-3 control-label" style="font-weight:bold;padding: 0;">Year</label>
		<input name="sub_year" id="sub_year" class="form-control col-md-9" type="number" min="0"  max="12" value="" placeholder="Year" required />
		</div>
		<div class="col-md-6">
		<label class="col-md-3 control-label" style="font-weight:bold;padding: 0;">Month</label>
		<input name="sub_month" id="sub_month" class="form-control col-md-9" type="number" min="0" max="12" value="0" placeholder="Month"/>
		</div>
		</div>
		</div>
		</div>
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<div class="col-md-3"></div><div class="col-md-6" style="text-align: center;"><b> Last Issue: <?php echo ($lastlabel['label'] == true)?$lastlabel['label']:'NA'; ?> </b></div><div class="col-md-3"></div>
		</div>
		</div>
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="col-md-12">
		<div id="labelres"></div>
		</div>
		</div>
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="row">
		<div class="form-group">
		<label class="col-md-5 control-label" style="font-weight:bold;"></label>
		<div class="col-md-7">
		<button type="submit" name="submitpayment" value="Add Payment"  class="btn btn-primary">Add Payment</button>
		</div>
		</div>
		</div>
	  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</section>




<script type="text/javascript">

$(document).ready(function() {

$('#sub_year').on('input', function() {


var sid = '<?php echo $this->uri->segment(3); ?>';

var chequeno = document.getElementById('chequeno').value;

var chequedate = document.getElementById('chequedate').value;
var chequeby = document.getElementById('chequeby').value;
var amount = document.getElementById('amount').value;
var issue = document.getElementById('issue').value;
var year = document.getElementById('year').value;
	
if(issue == ''){
	alert('Please insert Issue');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeno == ''){
	alert('Please insert Cheue No Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
document.getElementById('sub_month').value = '0';
}
else if(chequedate == ''){
	alert('Please insert Cheue Date');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeby == ''){
	alert('Please insert Cheue By Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(amount == ''){
	alert('Please insert Amount');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else
{


var sub_year = document.getElementById('sub_year').value;
var sub_month = document.getElementById('sub_month').value;
//alert(paymentdate);
 $.ajax({
            type: "post",
            data: {'sub_year':sub_year,
			'sub_month':sub_month,
			'sid':sid,
			'issue':issue,
			'year':year
            },
            url: '<?php echo base_url()."entries/getlabelajax"; ?>',
            success: function(res)
            {
				//alert (res);
				document.getElementById('labelres').innerHTML = res;
				
            }
        })
		
	}
       
    })




$('#sub_month').on('input', function() {
	
var sid = '<?php echo $this->uri->segment(3); ?>';
var chequeno = document.getElementById('chequeno').value;

var chequedate = document.getElementById('chequedate').value;
var chequeby = document.getElementById('chequeby').value;
var issue = document.getElementById('issue').value;
var year = document.getElementById('year').value;
	
if(issue == ''){
	alert('Please insert Issue');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeno == ''){
	alert('Please insert Cheue No Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequedate == ''){
	alert('Please insert Cheue Date');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeby == ''){
	alert('Please insert Cheue By Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(amount == ''){
	alert('Please insert Amount');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else
{

var sub_year = document.getElementById('sub_year').value;
var sub_month = document.getElementById('sub_month').value;

   $.ajax({
            type: "post",
            data: {'sub_year':sub_year,
			'sub_month':sub_month,
			'sid':sid,
			'issue':issue,
			'year':year
            },
            url: '<?php echo base_url()."entries/getlabelajax"; ?>',
            success: function(res)
            {
				//alert (res);
				document.getElementById('labelres').innerHTML = res;
				
            }
        })
}
    })
	

/***** Year ****/

$('#year').on('input', function() {
	
var sid = '<?php echo $this->uri->segment(3); ?>';
var chequeno = document.getElementById('chequeno').value;

var chequedate = document.getElementById('chequedate').value;
var chequeby = document.getElementById('chequeby').value;
var issue = document.getElementById('issue').value;
var year = document.getElementById('year').value;
	
if(issue == ''){
	alert('Please insert Issue');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeno == ''){
	alert('Please insert Cheue No Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequedate == ''){
	alert('Please insert Cheue Date');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeby == ''){
	alert('Please insert Cheue By Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(amount == ''){
	alert('Please insert Amount');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else
{

var sub_year = document.getElementById('sub_year').value;
var sub_month = document.getElementById('sub_month').value;

   $.ajax({
            type: "post",
            data: {'sub_year':sub_year,
			'sub_month':sub_month,
			'sid':sid,
			'issue':issue,
			'year':year
            },
            url: '<?php echo base_url()."entries/getlabelajax"; ?>',
            success: function(res)
            {
				//alert (res);
				document.getElementById('labelres').innerHTML = res;
				
            }
        })
}
    })
	

/**** Issue ***/
$('#issue').on('input', function() {
	
var sid = '<?php echo $this->uri->segment(3); ?>';
var chequeno = document.getElementById('chequeno').value;

var chequedate = document.getElementById('chequedate').value;
var chequeby = document.getElementById('chequeby').value;
var issue = document.getElementById('issue').value;
var year = document.getElementById('year').value;
	
if(issue == ''){
	alert('Please insert Issue');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeno == ''){
	alert('Please insert Cheue No Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequedate == ''){
	alert('Please insert Cheue Date');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(chequeby == ''){
	alert('Please insert Cheue By Detail');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else if(amount == ''){
	alert('Please insert Amount');	
	sub_year = 0;
	sub_month = 0;
	document.getElementById('sub_year').value = '0';
	document.getElementById('sub_month').value = '0';
}
else
{

var sub_year = document.getElementById('sub_year').value;
var sub_month = document.getElementById('sub_month').value;

   $.ajax({
            type: "post",
            data: {'sub_year':sub_year,
			'sub_month':sub_month,
			'sid':sid,
			'issue':issue,
			'year':year
            },
            url: '<?php echo base_url()."entries/getlabelajax"; ?>',
            success: function(res)
            {   
			//alert(res);
				document.getElementById('labelres').innerHTML = res;
				
            }
        })
}
    })
});

function deletepayment(sid,pid){
	var urlredirect = '<?php echo base_url() ?>entries/deletepaymentlabel?sid='+sid+'&pid='+pid;
	//alert(urlredirect);
	
	var r = confirm("Do you want to delete this Payment ? ");
		if (r == true) {
		 window.location.href = urlredirect; 
		} else {
		 
		}
	
	
}

</script>
<?php
error_reporting(false);

if($this->uri->segment(3) == true){	    
$cu_uid=$cuttingentries['cu_uid'];	
$cu_totalpiece =$cuttingentries['cu_totalpiece'];
$cu_complete=$cuttingentries['cu_complete'];
$cu_remaining=$cuttingentries['cu_remaining'];
$cu_status=$cuttingentries['cu_status'];
	$pathtype = 'edit';
if($cu_status == 'active'){ $cu_status = 'checked="checked"'; } else { $cu_status = '';  }	
	
}
else{
$cu_uid=$this->input->post('cu_uid');	
$cu_totalpiece = $this->input->post('cu_totalpiece');
$cu_complete=$this->input->post('cu_complete');
$cu_remaining=$this->input->post('cu_remaining');
$cu_status = 'checked="checked"';	
	$pathtype = 'add';
	
}



?>
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  Cutting Entry
				  	<a href="#barcodes" style="margin-left:900px;color:#177bbb;" >Go To Barcode</a>
                </header>
                <div class="panel-body" style="height: 100%;overflow: scroll;">
				<?php if($pathtype ==  'edit'){   ?>
				<!--<div class="col-sm-12"><br>
				  <div class="col-sm-6" style="float:right;margin-right:340px;">
                    <div class="input-group">
                     <input  type="text" name="scan" class="input-sm form-control" size="20" autocomplete="off" placeholder="Scan QR code" style="height:35px;" >
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit" style="height:35px;">Scan!</button>
                      </span>
					   </div>
                    </div>
                  </div><br><br><br>-->
				<?php } ?>
                  <form class="form-horizontal" method="post">
                    
                    <!--<div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Entry Date</label>
                      <div class="col-sm-10">
                        <label style="font-size: 19px;color: #1AAE88;"></label>
						<input type="hidden" name="entrydate"  />
						<input type="hidden" name="pathtype"  />
                      </div>
                    </div>--> 
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-4">
                        <input type="text" name="username" class="form-control" type="text" value="<?php echo $cu_uid;?>" <?php echo $this->uri->segment(2) == 'edit' ? 'readonly':''; ?> autocomplete="off" placeholder="Username" required>
                        <input type="hidden" name="pathtype" value="<?php echo $pathtype;?>" />
					  </div>
                    </div>
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Total Piece</label>
					<div class="col-sm-4">
                        <input type="number" id="totalpiece" name="totalpiece" class="form-control" type="text"value="<?php echo $cuttingtotal;?>" autocomplete="off" placeholder="Total Piece" onblur="getremaining()"  >
                      </div>
                    </div>
					<div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Complete</label>
                      <div class="col-sm-4">
                        <input type="number" id="complete" name="complete" class="form-control" type="text" value="<?php echo $cuttingcomplete;?>" autocomplete="off" placeholder="Complete Piece" onblur="getremaining()"  >
                      </div>
                    </div>

                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Remaining</label>
                      <div class="col-sm-4">
                        <input type="number" id="remaining" name="remaining" class="form-control" type="text" value="<?php echo $cuttingremaining;?>" autocomplete="off" placeholder="Remaining Piece" >
                      </div>
                    </div>
					<div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <label class="switch">
                           <input name="status" type="checkbox" <?php echo $cu_status;  ?> value="1">
                          <span></span>
                        </label>
                      </div>
                    </div>
	<script type="text/javascript">

function getremaining(){
	
	var total = parseInt(document.getElementById("totalpiece").value);
    var val2 = parseInt(document.getElementById("complete").value);
	
	if(val2 > total){ alert('Completed Piece should not be more than the Total Piece'); } 
	else{
		var ansD = document.getElementById("remaining");
    ansD.value = total - val2;
	}
    
    
}

</script>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                       <!-- <button type="button" class="btn btn-default" onclick="window.location='index.php/todayentries'" >Cancel</button>-->
					   <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url() ?>cuttingentry'" >Cancel</button>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
				  <?php if($pathtype ==  'edit'){   ?>
			
				            <div class="table-responsive" id="barcodes">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                       <th width="20">ID</th>						
                        <th>Entry </th>
                        <th>Worker</th>
                        <th>Barcode</th>
                        <th>Status</th>
						<th>LastUpdates</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php 
					if(count($assignentriess) > 0){
					foreach($assignentriess as $todayentrie ){ ?>
						<tr>
                        <td><?php echo $todayentrie['bid']; ?></td>
                        <td><?php echo $todayentrie['eid']; ?></td>
                        <td><?php echo $todayentrie['workername']; ?></td>
                        <td><?php echo $todayentrie['barcode']; ?></td>
						<td><?php echo ($todayentrie['status']== '2')?'Complete':''; ?>
						<?php echo ($todayentrie['status']== '0')?'Pending':''; ?>
						<?php echo ($todayentrie['status']== '1')?'AtCutting':''; ?></td>
					  
					   <td><?php echo ucfirst($todayentrie['lastupdated']); ?></td>
                      </tr> 
					<?php } ?>
					<?php 	} else { ?>
				
				<tr>
				<td colspan="9">
				No Records Found
				</td>
				</tr>
				<?php } ?>
				
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
				  
				  <br/><br/><br/><br/>
                </div>
</div>
</section>
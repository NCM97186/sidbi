<style>
textarea{ min-height:100px; }
</style><?php
error_reporting(false);

if($this->uri->segment(3) == true){	    
$cert_name=$ddetail['cert_name'];	
$cert_number=$ddetail['cert_number'];
$country=$ddetail['country'];
$scope=$ddetail['scope'];
$address=$ddetail['address'];
$country=$ddetail['country'];
$standard=$ddetail['standard'];
$cab_name=$ddetail['cab_name'];
$status=$ddetail['status'];
$pathtype = 'edit';
if($status == 'valid'){ $status = 'checked="checked"'; } else { $status = '';  }
	
	
}
else{
	
$cert_name=$this->input->post('cert_name');	
$cert_number = $this->input->post('cert_number');
$country = $this->input->post('country');
$scope = $this->input->post('scope');
$address = $this->input->post('address');
$country = $this->input->post('country');
$standard = $this->input->post('standard');
$cab_name = ($this->input->post('cab_name')== '')?"GLOBAL QUALITY CONTROL CERTIFICATION":'';
$status = 'checked="checked"';	
$pathtype = 'add';
	
}

?>
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?php echo ucfirst($this->uri->segment(2)) ?> Training and Capacity Building Programmes to leverage GOI schemes in the state Entry
                </header>
                <div class="panel-body" style="height: 100%;overflow: scroll;">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
				  
				      <div class="line line-dashed b-b line-lg pull-in"></div>
					<div class="form-group">
                      <label class="col-sm-2 control-label">PMU Manager</label>
                      <div class="col-sm-10">
                         <label class="control-label" style="color:#000;font-weight:600;">Prashant Bhatt</label>
                      </div>
					   </div>
					<div class="form-group">
                      <label class="col-sm-2 control-label">Business Analyst</label>
                      <div class="col-sm-10">
                       <label class="control-label" style="color:#000;font-weight:600;">Pavan Singh </label>
                      </div>
					   </div>
					<div class="form-group">
                      <label class="col-sm-2 control-label">State Nodal Officer</label>
                      <div class="col-sm-10">
                        <label class="control-label" style="color:#000;font-weight:600;">Janak Patel</label>
                      </div>
					   </div>
                   
					 
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
					<div class="form-group">
                      <label class="col-sm-2 control-label">State</label>
                      <div class="col-sm-10">
                        <!--input class="col-sm-2 form-control" name="country" size="16" type="text" autocomplete="country" value="<?php echo $country; ?>" required /-->
						
						<select name="state" id="state" class="form-control" required>
						<?php if($pathtype == 'edit'){ ?> <option value="<?php echo $state; ?>" selected="selected"><?php echo $state; ?></option>  <?php }else { ?><?php } ?><option value="">Choose State</option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chandigarh">Chandigarh</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
						<option value="Daman and Diu">Daman and Diu</option>
						<option value="Delhi">Delhi</option>
						<option value="Lakshadweep">Lakshadweep</option>
						<option value="Puducherry">Puducherry</option>
						<option value="Goa">Goa</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Madhya Pradesh">Madhya Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="Manipur">Manipur</option>
						<option value="Meghalaya">Meghalaya</option>
						<option value="Mizoram">Mizoram</option>
						<option value="Nagaland">Nagaland</option>
						<option value="Odisha">Odisha</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Sikkim">Sikkim</option>
						<option value="Tamil Nadu">Tamil Nadu</option>
						<option value="Telangana">Telangana</option>
						<option value="Tripura">Tripura</option>
						<option value="Uttar Pradesh">Uttar Pradesh</option>
						<option value="Uttarakhand">Uttarakhand</option>
						<option value="West Bengal">West Bengal</option>
						</select>
										
                      </div>
                    </div>

					<div class="line line-dashed b-b line-lg pull-in"></div>
					<div class="form-group">
                      <label class="col-sm-2 control-label">Task Name</label>
                      <div class="col-sm-10">
                        <input class="col-sm-2 form-control" name="taskname" size="16" type="text" placeholder="Enter Task Name" autocomplete="taskname	" value="<?php echo $taskname; ?>" required />
						<input type="hidden" name="pathtype" value="<?php echo $pathtype; ?>"/>
                      </div>
					   </div>
					   <div class="line line-dashed b-b line-lg pull-in"></div>
					   
					   	<div class="form-group">
                      <label class="col-sm-2 control-label">Upload Document</label>
                      <div class="col-sm-10">
                        	 <div class="choosefile">
                             <div class="choosefile">
                             
                                <input type="file" name="docname"  />
                            </div>
                          <?php //}?>
                            <span style="margin-top:5px; display:inline;">
                                Upload Your Document
                            </span>
                            </div>
                      </div>
					   </div>
					
				
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <label class="switch">
                           <input name="status" type="checkbox"  value="1" />
                          <span></span>
                        </label>
                      </div>
                    </div>
					
					 <!--div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Assign To</label>
                      <div class="col-sm-3">
                       <select name="assignto" class="form-control" id="assignto">
					   <option>Select user</option>
					   <option>1</option>
					   <option>1</option>
					   <option>1</option>
					   </select>
                      </div>
                    </div-->

                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url();?>'" >Cancel</button>
                        <button type="submit" name="submitdata" value="Submit" class="btn btn-primary" style="margin-left:15px;">Submit</button>
                      </div>
                    </div>
                  </form>
</div>
</section>
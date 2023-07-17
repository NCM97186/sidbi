<?php
error_reporting(false);

if($this->uri->segment(3) == true){	    
$client_name=$customers['client_name'];	
$categorystr = $customers['category'];
$category = explode(',',$categorystr );

$client_gender=$customers['client_gender'];
$client_birthdate=$customers['client_birthdate'];
$client_address_1=$customers['client_address_1'];
$client_address_2=$customers['client_address_2'];
$client_city=$customers['client_city'];
$client_state=$customers['client_state'];
$client_zip=$customers['client_zip'];
$client_phone=$customers['client_phone'];
$client_fax=$customers['client_fax'];
$client_mobile=$customers['client_mobile'];
$client_email=$customers['client_email'];
$client_active=$customers['client_active'];
$customercode=$customers['customercode'];
$pathtype = 'edit';
if($client_active == '1'){ $client_active = 'checked="checked"';$status="1"; } else { $client_active = '';$status="0";  }	
	
}
else{
$client_name=$this->input->post('client_name');	
$category=$this->input->post('category');

$client_gender=$this->input->post('client_gender');
$client_birthdate=$this->input->post('client_birthdate');
$client_address_1=$this->input->post('client_address_1');	
$client_address_2 = $this->input->post('client_address_2');
$client_city=$this->input->post('client_city');
$client_state=$this->input->post('client_state');
$client_zip=$this->input->post('client_zip');	
$client_phone = $this->input->post('client_phone');
$client_fax=$this->input->post('client_fax');
$client_mobile=$this->input->post('client_mobile');
$client_email=$this->input->post('client_email');
$customercode=$this->input->post('customercode');
$status = $this->input->post('status');
$client_active = 'checked="checked"';	
	$pathtype = 'add';
	
}
?>
<section style="height: 100%;overflow: scroll; display:block;">  
<div class="row" >
<form class="form-horizontal" method="post">
            <div class="col-xs-12 col-sm-6">
			<br/>
                <div class="panel panel-default">
                    <div class="panel-heading form-inline clearfix"> Personal Information <div class="pull-right">
                            <label for="client_active" class="control-label">
                                 Customer <input id="client_active" name="client_active" type="radio" value="1" checked="checked">  
                            </label>&nbsp;&nbsp;&nbsp;
                        </div>
					 </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="client_name"> Customer Name   </label>
							<div class="controls">
							<input id="client_name" name="client_name" type="text" class="form-control" value="<?php echo $client_name;?>" placeholder="Client Name" autocomplete="off" required  >
							<input type="hidden" name="pathtype" value="<?php echo $pathtype;?>" />
							</div>
						</div>
					    <div class="form-group">
                            <label for="category">Category</label>
                            <div class="controls">
                                <select name="category" id="category" class="form-control simple-select">
								<option value="">----- Choose Category -----</option>
                                <option value="normal" <?php  echo in_array("normal", $category)?'selected="selected"':'' ;?>>Normal</option>
                                <option value="complimentary" <?php  echo  in_array("complimentary", $category)?'selected="selected"':'' ;?>>Complimentary</option>
                                <option value="foreign" <?php  echo  in_array("foreign", $category)?'selected="selected"':'' ;?>>Foreign</option>
								<option value="special" <?php  echo  in_array("special", $category)?'selected="selected"':'' ;?>>Special</option>
								<option value="gargygift" <?php  echo  in_array("gargygift", $category)?'selected="selected"':'';?>>Gargy Gift</option>
                                </select>
                            </div>
                        </div>
						
						
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <label class="switch">
                           <input name="status" type="checkbox" <?php echo $client_active; ?>  value="<?php echo $status; ?>"/>
                          <span></span>
                        </label>
                      </div>
                    </div>
					
					
					</div>
				</div>
            </div>
			 <div class="col-xs-12 col-sm-6">
<br/>
                <div class="panel panel-default">

                    <div class="panel-heading"> Personal Information </div>

                    <div class="panel-body">
					
					<div class="form-group">
                            <label for="customercode">Customer Code</label>

                            <div class="controls">
                                <input type="text" name="customercode" id="customercode" class="form-control"  value="<?php echo $customercode;?>" autocomplete="customercode">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="client_gender">Pin Code</label>

                            <div class="controls">                              
					         <input name="client_zip" class="form-control"  id="client_zip"  value="<?php echo $client_zip ; ?>" />
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="client_birthdate">Birthdate</label>
                               <div class="input-group">
                                <input type="text" class="input-sm datepicker-input  form-control"  name="client_birthdate" id="client_birthdate"
                                       class="form-control datepicker"
                                       value="<?php echo $client_birthdate;?>" autocomplete="off">
                                <span class="input-group-addon">
                                  <i class="fa fa-calendar fa-fw"></i>
                                 </span>
                            </div>
                        </div>
						
						
                        
              </div>
				</div>
					
            </div>	
      
			 
			


 </div>

		
    <div class="row">
	        
			
			<div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">

                    <div class="panel-heading"> Address  & Contact Information   </div>

                    <div class="panel-body">
					
					<div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="client_address_1">Street Address</label>

                            <div class="controls">
							<textarea name="client_address_1" id="client_address_1" class="form-control" autocomplete="client_address_1" rows="5"  required><?php echo $client_address_1;?></textarea>
                                <!--input type="text" name="client_address_1" id="client_address_1" class="form-control"
                                       value="<?php echo $client_address_1;?>" autocomplete="off"-->
                            </div>
                        </div>
						   <div class="form-group">
                            <label for="client_phone">Phone Number</label>

                            <div class="controls">
                                <input type="text" name="client_phone" id="client_phone" class="form-control"
                                       value="<?php echo $client_phone;?>" autocomplete="off">
                            </div>
                        </div>

                     
						</div>
						
						<div class="col-xs-12 col-sm-6">
						   <div class="form-group">
                            <label for="client_fax">Fax Number</label>

                            <div class="controls">
                                <input type="text" name="client_fax" id="client_fax" class="form-control"
                                       value="<?php echo $client_fax;?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_mobile">Mobile Number</label>

                            <div class="controls">
                                <input type="text" name="client_mobile" id="client_mobile" class="form-control"
                                       value="<?php $client_mobile;?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_email">Email Address</label>

                            <div class="controls">
                                <input type="text" name="client_email" id="client_email" class="form-control"
                                       value="<?php echo $client_email;?>" autocomplete="off">
                            </div>
                        </div>
						</div>

                        <!-- Custom Fields -->
                        </div>

                </div>

            </div>
			
			
			

		
       
			
 </div>

       
		
                    
                    <div class="form-group" style="text-align:center;">
                      <div class="col-sm-12 col-sm-offset-0" style="margin-bottom: 20px;">
                       <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url() ?>customer'" >Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
		
		            
</form>
    </div>


</section>
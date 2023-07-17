<?php
error_reporting(true);

if($this->uri->segment(3) == true){	

//$c_id = $customermaps['c_id'];	
$name = $customermaps['c_id'].'~'.$customermaps['name'].' / '.$customermaps['mobile'].' / '.$customermaps['email'];
//$name = $customermaps['name'];
//$mobile = $customermaps['mobile'];
//$email = $customermaps['email'];
$option1 = $customermaps['option1'];
$option2 = $customermaps['option2'];
$option3 = $customermaps['option3'];
$option4 = $customermaps['option4'];
$optionvalue11 = $customermaps['optionvalue11'];
$optionvalue12 = $customermaps['optionvalue12'];
$optionvalue13 =  explode(',',$customermaps['optionvalue13']);
$optionvalue131 = $optionvalue13[0];
$optionvalue132 = $optionvalue13[1];
$optionvalue133 = $optionvalue13[2];
$optionvalue14 = explode (',',$customermaps['optionvalue14']);
$optionvalue141 = $optionvalue14[0];
$optionvalue142 = $optionvalue14[1];
$optionvalue143 = $optionvalue14[2];
$optionvalue144 = $optionvalue14[3];
$optionvalue145 = $optionvalue14[4];
$optionvalue146 = $optionvalue14[5];
$optionvalue147 = $optionvalue14[6];
$optionvalue148 = $optionvalue14[7];
$optionvalue149 = $optionvalue14[8];
$optionvalue21 = $customermaps['optionvalue21'];
$optionvalue22 = $customermaps['optionvalue22'];
$optionvalue23 = explode(',',$customermaps['optionvalue23']);
$optionvalue231 = $optionvalue23[0];
$optionvalue232 = $optionvalue23[1];
$optionvalue233 = $optionvalue23[2];

$optionvalue24 = explode(',',$customermaps['optionvalue24']);
$optionvalue241 = $optionvalue24[0];
$optionvalue242 = $optionvalue24[1];
$optionvalue243 = $optionvalue24[2];
$optionvalue244 = $optionvalue24[3];
$optionvalue245 = $optionvalue24[4];
$optionvalue246 = $optionvalue24[5];
$optionvalue247 = $optionvalue24[6];
$optionvalue248 = $optionvalue24[7];
$optionvalue249 = $optionvalue24[8];

$optionvalue31 = $customermaps['optionvalue31'];
$optionvalue32 = $customermaps['optionvalue32'];
$optionvalue33 =  explode(',',$customermaps['optionvalue33']);
$optionvalue331 = $optionvalue33[0];
$optionvalue332 = $optionvalue33[1];
$optionvalue333 = $optionvalue33[2];

$optionvalue34 = explode (',',$customermaps['optionvalue34']);
$optionvalue341 = $optionvalue34[0];
$optionvalue342 = $optionvalue34[1];
$optionvalue343 = $optionvalue34[2];
$optionvalue344 = $optionvalue34[3];
$optionvalue345 = $optionvalue34[4];
$optionvalue346 = $optionvalue34[5];
$optionvalue347 = $optionvalue34[6];
$optionvalue348 = $optionvalue34[7];
$optionvalue349 = $optionvalue34[8];
$optionvalue41 = $customermaps['optionvalue41'];
$optionvalue42 = $customermaps['optionvalue42'];
$optionvalue43 =  explode(',',$customermaps['optionvalue43']);
$optionvalue431 = $optionvalue43[0];
$optionvalue432 = $optionvalue43[1];
$optionvalue433 = $optionvalue43[2];

$optionvalue44 = explode (',',$customermaps['optionvalue44']);
$optionvalue441 = $optionvalue44[0];
$optionvalue442 = $optionvalue44[1];
$optionvalue443 = $optionvalue44[2];
$optionvalue444 = $optionvalue44[3];
$optionvalue445 = $optionvalue44[4];
$optionvalue446 = $optionvalue44[5];
$optionvalue447 = $optionvalue44[6];
$optionvalue448 = $optionvalue44[7];
$optionvalue449 = $optionvalue44[8];
$notes= explode (',',$customermaps['notes']);
$notes1 = $notes[0];
$notes2 = $notes[1];
$notes3 = $notes[2];
$notes4 = $notes[3];
$entrydate = $customermaps['entrydate'];	
$pathtype = 'edit';


}
else{
		
$c_id = $this->input->post('c_id');	
$name = $this->input->post('name');
$mobile = $this->input->post('custname[1]');
$email = $this->input->post('custname[2]');
$option1 = $this->input->post('option1');
$option2 = $this->input->post('option2');
$option3 = $this->input->post('option3');
$option4 = $this->input->post('option4');
$optionvalue11 = $this->input->post('optionvalue11');
$optionvalue12 = $this->input->post('optionvalue12');
$optionvalue13 = implode(',',$_POST['optionvalue13']);
$optionvalue14 = implode(',',$_POST['optionvalue14']);
$optionvalue21 = implode(',',$_POST['optionvalue21']);
$optionvalue22 = implode(',',$_POST['optionvalue22']);
$optionvalue23 = implode(',',$_POST['optionvalue23']);
$optionvalue24 = implode(',',$_POST['optionvalue24']);
$optionvalue31 = $this->input->post('optionvalue31');
$optionvalue32 = $this->input->post('optionvalue32');
$optionvalue33 = implode(',',$_POST['optionvalue33']);
$optionvalue34 = implode(',',$_POST['optionvalue34']);
$optionvalue41 = $this->input->post('optionvalue41');
$optionvalue42 = $this->input->post('optionvalue42');
$optionvalue43 = implode(',',$_POST['optionvalue43']);
$optionvalue44 = implode(',',$_POST['optionvalue44']);
$notes = implode(',',$_POST['notes']);	
$entrydate = date('d-m-Y',time());
$pathtype = 'add';

	}
?>        
<section class="panel panel-default" style="height: 100%;overflow: scroll; display:block;">
	<div class="row" >
					  
			<div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading form-inline clearfix">
                        <div style="float:left;">Customer Size Information </div>
						<div style="float:right;"><?php echo 'Date : '.$entrydate; ?> </div>
                    </div>
					<form method="post" action="<?php echo base_url() ?>customermap/add" role="search">
					<div class="panel-body">
				
					<div class="col-xs-12 col-sm-12 personal_info">
						
						<div class="personal_info_left" >
						  <label>Select Customer</label>
						</div>
						<div class="personal_info_right" >
						 
						  <input type="text" name="custname" id="customermapajax"  class="form-control" value="<?php echo $name;?>" required autocomplete="off" placeholder="Search Name/Email/Mobile" autofocus/ >
                          <input type="hidden" name="pathtype" value="<?php echo $pathtype;?>" />
				</div>
						<br/>
						<br/>
						
					</div>
				
					  <div class="col-xs-4 col-sm-4">
					  
					   <div class="form-group">
                            <label for="client_name">
                                Product 1                            </label>
                           <input id="option1" name="option1" type="text" class="form-control"  value="<?php echo $option1;?>" autocomplete="off" placeholder="Pent" /><br/>
						   <textarea class="form-control" name="notes[]"  placeholder="Notes" autocomplete="off"><?php echo $notes1;?></textarea>
					    </div>
					   </div>
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                Information 1                            </label>
							<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue11" name="optionvalue11" type="text" class="form-control" autocomplete="off" value="<?php echo $optionvalue11; ?>" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue12" name="optionvalue12" type="text" class="form-control" autocomplete="off"  value="<?php echo $optionvalue12;?>" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue13" name="optionvalue13[]" type="text" class="form-control" autocomplete="off" value="<?php echo $optionvalue131;?>" />
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue13[]" type="text" class="form-control" autocomplete="off" value="<?php echo $optionvalue132;?>" />
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue13[]" type="text" class="form-control"  value="<?php echo $optionvalue133;?>" autocomplete="off" />
							</div>	
							</div>							
                       </div>
					   </div>
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                 Information 2                            </label>
                           		<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue14" name="optionvalue14[]" type="text" class="form-control"  value="<?php echo $optionvalue141;?>"  autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue14[]" type="text" class="form-control"  value="<?php echo $optionvalue142;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue14[]" type="text" class="form-control"  value="<?php echo $optionvalue143;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue14[]" type="text" class="form-control"  value="<?php echo $optionvalue144;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue14[]" type="text" class="form-control"  value="<?php echo $optionvalue145;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;"> 
							 <input name="optionvalue14[]" type="text" class="form-control"  value="<?php echo $optionvalue146;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue14[]" type="text" class="form-control"  value="<?php echo $optionvalue147;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue14[]"  type="text" class="form-control"  value="<?php echo $optionvalue148;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue14[]"  type="text" class="form-control"  value="<?php echo $optionvalue149;?>" autocomplete="off"/>
							</div>
							</div>
                        </div>
					    </div>
						<hr/>					   
					</div>
					  
					  
					   <div class="panel-body">
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                Product 2                            </label>
                           <input id="option1" name="option2" type="text" class="form-control"  value="<?php echo $option2;?>" placeholder="Shirt" autocomplete="off" /><br/>
						   <textarea name="notes[]" class="form-control" placeholder="Notes" autocomplete="off" ><?php echo $notes2;?></textarea>
					    </div>
					   </div>
					<div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                Information 1                            </label>
							<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue21" name="optionvalue21" type="text" class="form-control"  value="<?php echo $optionvalue21;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue22" name="optionvalue22" type="text" class="form-control"  value="<?php echo $optionvalue22;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue23" name="optionvalue23[]" type="text" class="form-control"  value="<?php echo $optionvalue231;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue23[]" type="text" class="form-control"  value="<?php echo $optionvalue232;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue23[]" type="text" class="form-control"  value="<?php echo $optionvalue233;?>" autocomplete="off" />
							</div>	
							</div>							
                       </div>
					   </div>
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                 Information 2                            </label>
                           		<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue241;?>"autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue242;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue243;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue244;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue245;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;"> 
							 <input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue246;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue247;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue24[]"  type="text" class="form-control"  value="<?php echo $optionvalue248;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							 <input name="optionvalue24[]" type="text" class="form-control"  value="<?php echo $optionvalue249;?>" autocomplete="off" />
							</div>
							</div>
                        </div>
					    </div>	
						<hr/>					   
					</div>
					  
					  
					  
					<div class="panel-body">
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                Product 3                            </label>
                           <input id="option1" name="option3" type="text" class="form-control"  value="<?php echo $option3;?>" placeholder="Shervani"  autocomplete="off"/><br/>
						   <textarea class="form-control" name="notes[]" placeholder="Notes"  autocomplete="off"><?php echo $notes3;?></textarea>
					    </div>
					   </div>
					 <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                Information 1                            </label>
							<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue31" name="optionvalue31" type="text" class="form-control"  value="<?php echo $optionvalue31;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue32" name="optionvalue32" type="text" class="form-control"  value="<?php echo $optionvalue32;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue33" name="optionvalue33[]" type="text" class="form-control"  value="<?php echo $optionvalue331;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue33[]" type="text" class="form-control"  value="<?php echo $optionvalue332;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue33[]" type="text" class="form-control"  value="<?php echo $optionvalue333;?>" autocomplete="off"/>
							</div>	
							</div>							
                       </div>
					   </div>
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                 Information 2                            </label>
                           		<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue341;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue342;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue343;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue344;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue345;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;"> 
							 <input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue346;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue347;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue34[]"  type="text" class="form-control"  value="<?php echo $optionvalue348;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							 <input name="optionvalue34[]" type="text" class="form-control"  value="<?php echo $optionvalue349;?>" autocomplete="off" />
							</div>
							</div>
                        </div>
					    </div>
						<hr/>	
										
					</div>
					  
					  
					<div class="panel-body">
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                Product 4                            </label>
                           <input id="option1" name="option4" type="text" class="form-control"  value="<?php echo $option4;?>" placeholder="Suit" autocomplete="off" /><br/>
						   <textarea class="form-control" name="notes[]" placeholder="Notes" autocomplete="off"><?php echo $notes4;?></textarea>
					    </div>
					   </div>
				<div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                Information 1                            </label>
							<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue41" name="optionvalue41" type="text" class="form-control"  value="<?php echo $optionvalue41;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue42" name="optionvalue42" type="text" class="form-control"  value="<?php echo $optionvalue42;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input id="optionvalue43" name="optionvalue43[]" type="text" class="form-control"  value="<?php echo $optionvalue431;?>" autocomplete="off"/>
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue43[]" type="text" class="form-control"  value="<?php echo $optionvalue432;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue43[]" type="text" class="form-control"  value="<?php echo $optionvalue433;?>" autocomplete="off" />
							</div>	
							</div>							
                       </div>
					   </div>
					  <div class="col-xs-4 col-sm-4">
					   <div class="form-group">
                            <label for="client_name">
                                 Information 2                            </label>
                           		<div class="col-xs-12 col-sm-12">
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue441;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue442;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4">
							 <input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue443;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue444;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue445;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;"> 
							 <input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue446;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue447;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							<input name="optionvalue44[]"  type="text" class="form-control"  value="<?php echo $optionvalue448;?>" autocomplete="off" />
							</div>
							<div class="col-xs-4 col-sm-4" style="margin-top: 18px;">
							 <input name="optionvalue44[]" type="text" class="form-control"  value="<?php echo $optionvalue449;?>" autocomplete="off" />
							</div>
							</div>
                        </div>
					    </div>
					</div>
				</div>
				
		
			</div>

                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group" style="text-align:center;">
                      <div class="col-sm-12 col-sm-offset-0">
                       <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url() ?>customermap'" >Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
					
					
			</form>
			</div>
			</section>
		

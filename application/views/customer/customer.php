<section class="panel panel-default" style="height: 100%;overflow: scroll; display:block;">
                <header class="panel-heading">
             <strong>  Customer Entry</strong>
			   <button onclick="location.href='<?php echo base_url(); ?>customer/add';" class="btn btn-sm btn-default" style="float:right;background-color:#177bbb;color:white !important;padding:3px 22px"><strong>Add Customer</strong></button>
			   <button onclick="location.href='<?php echo base_url(); ?>customer';" class="btn btn-sm btn-default" style="float:right;background-color:#177bbb;color:white !important;padding:3px 22px"><strong><i class="fa fa-refresh" aria-hidden="true"></i></strong></button>
                </header>
				<section class="panel panel-default">
                
				<?php if($this->input->get('msg')){ ?>
				<div class="alert alert-success" id="msg">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="fa fa-ok-sign"></i><strong>Well done!</strong> <?php echo $this->input->get('msg'); ?>
				</div>
				<?php } ?>

				 <div class="col-sm-12"><br>
				  <!--div class="col-sm-6" style="float:right;margin-right:340px;">
                    <div class="input-group">
                     <input  type="text" name="scan" class="input-sm form-control" size="20" autocomplete="off" placeholder="Scan QR code" style="height:35px;" >
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit" style="height:35px;">Scan!</button>
                      </span>
					   </div>
                    </div-->
                  </div><br><br><br>
                <div class="row wrapper">
                <!--  <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control input-s-sm inline v-middle">
                      <option value="0">Bulk action</option>
                      <option value="1">Delete selected</option>
                      <option value="2">Bulk edit</option>
                      <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>                
                  </div>-->
                 <div class="col-sm-9 m-b-xs">
                     <div class="btn-group" data-toggle="buttons">
					  <label class="btn btn-sm btn-default <?php  echo ($this->input->get('category') == '')?'active':''; ?>" onclick="window.location.href = '<?php echo base_url().'customer/?category=' ?>'">
                        <input type="radio" name="options" id="option1"> All
                      </label>
                      <label class="btn btn-sm btn-default" <?php  echo ($this->input->get('category') == 'gargygift')?'active':''; ?> onclick="window.location.href = '<?php echo base_url().'customer/?category=gargygift' ?>'">
                        <input type="radio" name="options" id="option1" > Gargy Gift
                      </label>
                      <label class="btn btn-sm btn-default" <?php  echo ($this->input->get('category') == 'complimentary')?'active':''; ?> onclick="window.location.href = '<?php echo base_url().'customer/?category=complimentary' ?>'">
                        <input type="radio" name="options" id="option2"> Complementary
                      </label>
                      <label class="btn btn-sm btn-default" <?php  echo ($this->input->get('category') == 'foreign')?'active':''; ?>  onclick="window.location.href = '<?php echo base_url().'customer/?category=foreign' ?>'">
                        <input type="radio" name="options" id="option2"> Foreign
                      </label>
                    </div> 
                  </div>
                  <form method="post">
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" name="searchentry" class="input-sm form-control" autocomplete="off" placeholder="Search">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit">Go!</button>
                      </span>
                    </div>
                  </div>
				  </form>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        
						<th>S.Code</th>
                        <th class="th-sortable" data-toggle="class">Client Name
                          <span class="th-sort">
                            <i class="fa fa-sort-down text"></i>
                            <i class="fa fa-sort-up text-active"></i>
                            <i class="fa fa-sort"></i>
                          </span>
                        </th>
						
                        <th>Category</th>
                        <th>Email Address</th>
						<th>Phone Number  </th>
						<th>Pincode  </th>
						<th>Status</th>
                        <th width="13%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php 
					
					foreach($customers as $customer ){ ?>
						<tr>
                        <!--<td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>-->
                       
						 <td><?php echo $customer ['customercode']; ?></td>
						<td><?php echo $customer ['client_name']; ?></td>
						<td style="text-transform:capitalize;"><?php echo $customer ['category']; ?></td>
                        <td><?php echo $customer ['client_email']; ?></td>
						<td><?php echo $customer ['client_mobile']; ?></td>
                        <td><?php echo $customer ['client_zip']; ?></td>
					    <td><?php echo ($customer ['client_active'] == '1'?'Active':'Inactive'); ?></td>
					    
                        <td>
                          <button  class="btn btn-sm btn-default" onclick="window.location='<?php echo base_url().'customer/edit/'.$customer['client_id']; ?>'">Edit</button>
						  <button  class="btn btn-sm btn-default" href="#myModal_<?php echo $customer ['client_id']; ?>"" class="trigger-btn" data-toggle="modal" >Delete</button>
						   
                        </td>
                      </tr>
                      <div id="myModal_<?php echo $customer ['client_id']; ?>" class="modal fade">
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
										<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url().'customer/delete/'.$customer['client_id']; ?>'">Delete</button>
									</div>
								</div>
							</div>
						</div> 
					<?php } ?>
                   
                      
                    </tbody>
                  </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-4 hidden-xs">
                      <select class="input-sm form-control input-s-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                      </select>
                      <button class="btn btn-sm btn-default">Apply</button>                  
                    </div>
                    <div class="col-sm-4 text-center">
                      <!--<small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    --></div>
                    <div class="col-sm-4 text-right text-center-xs"> 
                    <?php echo $this->pagination->create_links(); ?>					
                      <!--<ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>-->
                      </ul>
                    </div>
                  </div>
                </footer>
              </section>
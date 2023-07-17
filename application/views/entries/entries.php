<section class="panel panel-default" style="height: 100%;overflow: scroll; display:block;">
                <header class="panel-heading">
                 <strong> Today's Entry</strong>
				 <button onclick="location.href='<?php echo base_url(); ?>entries';" class="btn btn-sm btn-default" style="float:right;background-color:#177bbb;color:white !important;padding:3px 22px"><strong><i class="fa fa-refresh" aria-hidden="true"></i></strong></button>
				</header>
			
				<?php if($this->input->get('msg')){ ?>
<div class="alert alert-success" id="msg">

                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fa fa-ok-sign"></i><strong>Well done!</strong> <?php echo $this->input->get('msg'); ?>
</div>
<?php } ?>

				<!-- <div class="col-sm-12"><br>
				  <div class="col-sm-6" style="float:right;margin-right:340px;">
                    <div class="input-group">
                     <input  type="text" name="scan" class="input-sm form-control" size="20" autocomplete="off" placeholder="Scan QR code" style="height:35px;" >
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit" style="height:35px;">Scan!</button>
                      </span>
					   </div>
                    </div>
                  </div><br><br><br>
			-->
                 
				 
				
                <div class="row wrapper">
			
                 <!-- <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control input-s-sm inline v-middle">
                      <option value="0">Bulk action</option>
                      <option value="1">Delete selected</option>                    
                      <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>                
                  </div>-->
                   <form method="post">
                  <div class="col-sm-3"  style="float:right;" >
                    <div class="input-group">
                      <input  type="text" name="searchentry" class="input-sm form-control" autocomplete="off" placeholder="Search" >
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit" >Go!</button>
                      </span>
                    </div>
                  </div>
				  </form>
                </div>
				

                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="20"><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox"><i></i></label></th>
                        <th>Customer name</th>
                        <th>Email/Mobile</th>
                        <th>Sub. Start Date</th>
						<th>Sub. End Date</th>
						<th>Status</th>
						<th>Last updated</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php 
					foreach($todayentries as $todayentrie ){ ?>  
						<tr>
                        <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td><?php if($todayentrie['isgargygift'] == true){ ?><i class="fa fa-gift" aria-hidden="true" style="font-size: 14px;color: green;"></i> &nbsp; <?php } ?><?php if($todayentrie['isforeign'] == true){ ?><i class="fa fa-plane" aria-hidden="true"  style="font-size: 14px;color: #177BBB;"></i> &nbsp; <?php } ?><?php if($todayentrie['iscomplementary'] == true){ ?><i class="fa fa-file-text-o" aria-hidden="true"  style="font-size: 14px;color: #E33244;"></i> &nbsp; <?php } ?><?php echo $todayentrie['ce_custname']; ?></td>
                        <td><?php echo $todayentrie['ce_email'].' / '. $todayentrie['ce_mobile']; ?></td>                      
					   <td><?php echo $todayentrie['substartdate']; ?></td>
					   <td><?php echo $todayentrie['subenddate']; ?></td>
					   <td><?php echo ucfirst($todayentrie['entrystatus']); ?></td>
					   <td><?php echo $todayentrie['last_updated']; ?></td>
                        <td>
                           <button  class="btn btn-sm btn-default" onclick="window.location='<?php echo base_url().'entries/edit/'.$todayentrie['ce_id']; ?>'">Edit</button>
						  <button  class="btn btn-sm btn-default" href="#myModal_<?php echo $todayentrie['ce_id']; ?>"" class="trigger-btn" data-toggle="modal" >Delete</button>
						   
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
                <footer class="panel-footer">
				<?php echo $this->pagination->create_links(); ?>
              
                </footer>
              </section>
<section class="panel panel-default"style="height: 100%;overflow: scroll; display:block;">
                <header class="panel-heading">
                <strong>  Certificate </strong>
				  <button onclick="location.href='<?php echo base_url(); ?>certificate/add';" class="btn btn-sm btn-default" style="float:right;background-color:#177bbb;color:white !important;padding:3px 22px">Add Certificate</button>
                <button onclick="location.href='<?php echo base_url(); ?>certificate';" class="btn btn-sm btn-default" style="float:right;background-color:#177bbb;color:white !important;padding:3px 22px"><strong><i class="fa fa-refresh" aria-hidden="true"></i></strong></button>
				<?php if($this->input->get('msg') == true){ ?>
				<br/><br/>
				<div class="alert alert-success" role="alert">
					<b><?php echo $this->input->get('msg'); ?></b>
				</div>
				<?php } ?>
				</header>
                <div class="row wrapper">
                  <form method="post">
                  <div class="col-sm-3" style="float:right;" >
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
                        <th>Id</th>
                        <th>CERTFICATE NO.</th>
                        <th>ORG. NAME</th>
						<!--th>ADDRESS</th-->
						<th>SCOPE</th>
						<th>STANDARD</th>
						<th>CAB NAME</th>						
						<th>STATUS</th>
                        <th width="13%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    
					  
					  <?php 
					
					foreach($certificates as $datemanag ){ ?>
						<tr>
                      <!--  <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>-->
                        <td><?php echo $datemanag['cert_id']; ?></td>
						<td><?php echo $datemanag['cert_number']; ?></td>
                        <td><?php echo $datemanag['cert_name']; ?></td>
                        <!--td><?php echo $datemanag['address']; ?></td-->
						<td><?php echo $datemanag['scope']; ?></td>
						<td><?php echo $datemanag['standard']; ?></td>
						<td><?php echo $datemanag['cab_name']; ?></td>
						<td><?php echo ucfirst($datemanag['status']); ?></td>
                        <td>
                          <button  class="btn btn-sm btn-default" onclick="window.location='<?php echo base_url().'certificate/edit/'.$datemanag['cert_id']; ?>'">Edit</button>
						  <button  class="btn btn-sm btn-default" href="#myModal_<?php echo $datemanag['cert_id']; ?>"" class="trigger-btn" data-toggle="modal" >Delete</button>
						   
                        </td>
                      </tr>
					                           <!-- Modal HTML -->
					  <div id="myModal_<?php echo $datemanag['cert_id']; ?>" class="modal fade">
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
										<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url().'certificate/delete/'.$datemanag['cert_id']; ?>'">Delete</button>
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
                  <!--  <div class="col-sm-4 hidden-xs">
                      <select class="input-sm form-control input-s-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                      </select>
                      <button class="btn btn-sm btn-default">Apply</button>                  
                    </div>-->
                    <div class="col-sm-4 text-center">
                      <!--<small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                   --> </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                     <?php echo $this->pagination->create_links(); ?>
					 <!-- <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>-->
                    </div>
                  </div>
                </footer>
              </section>
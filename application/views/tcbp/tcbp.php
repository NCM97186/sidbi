
<style>
.btn-success {
    color: #fff !important;
    background-color: green;
    border-color: green;
}
</style>

<section class="panel panel-default"style="height: 100%;overflow: scroll; display:block;">
                <header class="panel-heading">
                <strong>  Training and Capacity Building Programmes to leverage GOI schemes in the state </strong>
				  <button onclick="location.href='<?php echo base_url(); ?>tcbp/add';" class="btn btn-sm btn-default" style="float:right;background-color:#3a419a;color:white !important;padding:3px 22px">Add TCBP</button>
                <button onclick="location.href='<?php echo base_url(); ?>tcbp';" class="btn btn-sm btn-default" style="float:right;background-color:#3a419a;color:white !important;padding:3px 22px"><strong><i class="fa fa-refresh" aria-hidden="true"></i></strong></button>
				<?php if($this->input->get('msg') == true){ ?>
				<br/><br/>
				<div class="alert alert-success" role="alert">
					<b><?php echo $this->input->get('msg'); ?></b>
				</div>
				<?php } ?>
				
				</header>
                <div class="row wrapper">
				<div class="col-sm-6" style="float:left;" ><h5><b style="font-size:14px;">State :</b> <?php echo 'Haryana'; ?></h5>
				</div>
                  
                  <div class="row col-sm-6" >
                    <div class="input-group col-sm-6" style="margin-right: 10px;">
                    <h5><b style="font-size:14px;">PMU Manager :</b> <?php echo 'Prashant Bhatt'; ?></h5>
                    </div>
                  </div>
				
                </div>
				    <div class="row wrapper">
				<div class="col-sm-6" style="float:left;" ><h5><b style="font-size:14px;">Business Analyst :</b> <?php echo 'Pavan Singh'; ?></h5>
				</div>
                  
                  <div class="row col-sm-6" >
                    <div class="input-group col-sm-6" style="margin-right: 10px;">
                     <h5><b style="font-size:14px;">Saled Nodal Officer :</b> <?php echo 'Janak Patel'; ?></h5>
                    </div>
                  </div>
				
                </div>
				   <div class="row wrapper">
				<div class="col-sm-6" style="float:left;" ><h5>Total Participants : <b style="font-size:18px;"><?php echo $total_rows; ?></b></h5>
				</div>
                  <form method="post">
                  <div class="row col-sm-6" style="float:right;" >
                    <div class="input-group col-sm-6" style="text-align: right;float: right;margin-right: 10px;">
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
                        <th>State</th>
                        <th>PMU Manager</th>
						<!--th>ADDRESS</th-->
						<th>Business Analyst</th>
						<th>State Nodal Officer</th>
						<th>Task Name</th>
						<th>View/Upload</th>						
						<th>Status</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    
					  
					  <?php 
					
					foreach($tcbps as $datemanag ){ ?>
						<tr>
                      <!--  <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>  onclick="window.location='<?php echo base_url().'tcbp/edit/'.$datemanag['id']; ?>'"-->
                        <td><?php echo $datemanag['id']; ?></td>
						<td><?php echo $datemanag['state']; ?></td>
                        <td><?php echo $datemanag['pmumanager']; ?></td>
                        <!--td><?php echo $datemanag['address']; ?></td-->
						<td><?php echo $datemanag['ba']; ?></td>
						<td><?php echo $datemanag['sno']; ?></td>
						<td><?php echo $datemanag['taskname']; ?><?php echo $datemanag['documentupload']; ?></td>
						
						
						<td><?php if($datemanag['documentupload'] == true){ ?><button title="View" onclick="window.location='<?php echo base_url().'uploads/'.$datemanag['documentupload']; ?>'" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button> &nbsp;&nbsp;<button title="Download"  onclick="window.location='<?php echo base_url().'uploads/'.$datemanag['documentupload']; ?>'"  class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i></button><?php } ?> </td>
						<td><?php if($datemanag['status'] == 0){ ?>   <button title="Approve"  class="btn btn-sm btn-success" ><i class="fa fa-check" aria-hidden="true"></i></button>&nbsp;&nbsp;
						  <button title="Reject" class="btn btn-sm btn-danger" href="#myModal_<?php echo $datemanag['id']; ?>" class="trigger-btn" data-toggle="modal" ><i class="fa fa-times" aria-hidden="true"></i></button> <?php }else{  echo ($datemanag['status'] == '1')?'<b style="color:green">Approved</b>':''; ?><?php echo ($datemanag['status'] == '2')?'<b  style="color:#000">Rejected</b>':''; }?></td>
                        
                      </tr>
					                           <!-- Modal HTML -->
					  <div id="myModal_<?php echo $datemanag['id']; ?>" class="modal fade">
							<div class="modal-dialog modal-confirm">
								<div class="modal-content">
									<div class="modal-header">
										<div class="icon-box" style="border: 3px solid red;">
					                   <i class="fa fa-times" aria-hidden="true" style="color:red;"></i>
				                          </div>	
                                        										
										<h4 class="modal-title">Are you sure?</h4>	
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										<p>Do you really want to reject these records? This process cannot be undone.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger"  style="background: red;">Reject</button><!--onclick="window.location='<?php echo base_url().'tcbp/reject/'.$datemanag['id']; ?>'"-->
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
			  
			  
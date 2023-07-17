        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  <section class="row m-b-md">
                    <div class="col-sm-6">
                      <h3 class="m-b-xs text-black">Dashboard</h3>
                      <small>Welcome back, Nirav , <i class="fa fa-map-marker fa-lg text-primary"></i> Amdavad City</small>
                    </div>
                     <div class="col-sm-6 text-right text-left-xs m-t-md">
                     <!--<div class="btn-group">
                        <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
                        <ul class="dropdown-menu text-left pull-right">
                          <li><a href="#">Notification</a></li>
                          <li><a href="#">Messages</a></li>
                          <li><a href="#">Analysis</a></li>
                          <li class="divider"></li>
                          <li><a href="#">More settings</a></li>
                        </ul>
                      </div>
                      <a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a>
                      --><a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a>
                    </div>
                  </section>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel b-a">
                        <div class="row m-n">
                          <div class="col-md-6 b-b b-r">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                                <i class="i i-plus2 i-1x text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-danger"><?php echo $totalentries; ?></span>
                                <small class="text-muted text-u-c">Total Subscription</small>
                              </span>
                            </a>
                          </div>
                          <div class="col-md-6 b-b">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                                <i class="i i-users2 i-sm text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-success"><?php echo $deliverd;?> <span class="text-sm">%</span></span>
                                <small class="text-muted text-u-c">Bounce date rate</small>
                              </span>
                            </a>
                          </div>
                          <div class="col-md-6 b-b b-r">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                                <i class="i i-location i-sm text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-info"><?php echo $delivery; ?> <span class="text-sm">%</span></span>
                                <small class="text-muted text-u-c">On TIme</small>
                              </span>
                            </a>
                          </div>
                          <div class="col-md-6 b-b">
                            <a href="#" class="block padder-v hover">
                              <span class="i-s i-s-2x pull-left m-r-sm">
                                <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                                <i class="i i-alarm i-sm text-white"></i>
                              </span>
                              <span class="clear">
                                <span class="h3 block m-t-xs text-primary"><?php echo $totalstatus; ?></span>
                                <small class="text-muted text-u-c">On Going </small>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                      <div class="panel b-a">
                        <div class="panel-heading no-border bg-primary lt text-center">
                          <a href="#">
                           <b>Waiting for Invoice</b>
                          </a>
                        </div>
                        <div class="padder-v text-center clearfix">                            
                          <div class="col-xs-6 b-r">
                            <div class="h3 font-bold"><?php echo $workerentrys; ?></div>
						
                            <small class="text-muted">Remaining</small>
                          </div>
                          <div class="col-xs-6">
                            <div class="h3 font-bold"><?php echo $workerentry; ?></div>
                            <small class="text-muted">Done</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                      <div class="panel b-a">
                        <div class="panel-heading no-border bg-info lter text-center">
                          <a href="#">
                           Waiting for Payment
                          </a>
                        </div>
                        <div class="padder-v text-center clearfix">                            
                          <div class="col-xs-6 b-r"> 
                            <div class="h3 font-bold"><?php echo $cuttingentrys;?></div>
                             <small class="text-muted">Remaining</small>
                          </div>
                          <div class="col-xs-6">
                            <div class="h3 font-bold"><?php echo $cuttingentry; ?></div>
                            <small class="text-muted">Done</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3 hide">
                      <section class="panel b-a">
                        <header class="panel-heading b-b b-light">
                          <ul class="nav nav-pills pull-right">
                            <li>
                              <a href="ajax.pie.html" class="text-muted" data-bjax data-target="#b-c">
                                <i class="i i-cycle"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#" class="panel-toggle text-muted">
                                <i class="i i-plus text-active"></i>
                                <i class="i i-minus text"></i>
                              </a>
                            </li>
                          </ul>
                          Connection
                        </header>
                        <div class="panel-body text-center bg-light lter" id="b-c">
                          <div class="easypiechart inline m-b m-t" data-percent="60" data-line-width="4" data-bar-Color="#23aa8c" data-track-Color="#c5d1da" data-color="#2a3844" data-scale-Color="false" data-size="120" data-line-cap='butt' data-animate="2000">
                            <div>
                              <span class="h2 m-l-sm step"></span>%
                              <div class="text text-xs">completed</div>
                            </div>
                          </div>
                        </div>
                      </section>                      
                    </div>
                  </div>
				  	  				
                  <div class="row bg-light dk m-b">
                    <div class="col-md-12 dker">
                      <section style="width:100%;overflow:scroll; height:250px;display:block;">
                        <header class="font-bold padder-v">
						<h4 style="text-align:center;"><strong>Upcoming Delivery</strong> </h4>
						</header>
						 <div class="table-responsive" >
                  <table class="table table-striped b-t b-light">
				  
                    <thead>
                      <tr>
						<div>
						<th>Id</th>
						 <th>Customer name</th>
                        <th>Email/Mobile</th>
                        <th>Pieces</th>
                        <th>Delivery Date</th>
						<th>Status</th>
						
                      </div>
					  </tr>
					  </thead>
					  </section>
                      </div>					  
                      
	<?php 
					foreach($previousentries as $todayentrie ){ ?>
						<tr>
						<td><?php echo $todayentrie['ce_id'];?></td>
                        <td><?php echo $todayentrie['deliverydate']; ?></td>
                        <td><?php echo $todayentrie['ce_email'].' / '. $todayentrie['ce_mobile']; ?></td>
                       <td><?php echo array_sum(explode(',',$todayentrie['ce_productscount'])); ?></td>
					   <td><?php echo $todayentrie['deliverydate']; ?></td>
					   <td><?php echo ucfirst($todayentrie['entrystatus']); ?></td>
					   
                       
						</tr>
					<?php } ?>
						
					  </table>
					  </div>
					  </div>
					  
				  
<div class="row bg-light dk m-b" >
                    <div class="col-md-6 dker">
                      <section style="overflow-y:scroll;overflow-x:hidden; height:250px;">
                        <header class="font-bold padder-v">
						<h4 style="text-align:center;"><strong> Recent Invoice </strong> </h4>
						</header>
						 <div class="table-responsive" >
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
						<div>
						 <th>Customer Name</th>
                        <th>Total</th>
                        <th>Invoice No</th>
                        <th>Invoice</th>
						<th>Date</th>
			          </div>
					   </tr>		
                       </thead>	
					   </section>
					  
                       </div>
 <?php 
					$CI =&get_instance();
					foreach($cuttingentries as $cuttingentry ){ ?>
						<tr>
                       <!-- <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>-->
                        
						<td><?php echo $cuttingentry['cu_uid']; ?></td>
                        <td><?php echo $CI->main_model->getcuttingtotal($cuttingentry['cu_id']); ?></td>
                        <td><?php echo $CI->main_model->getcuttingcomplete($cuttingentry['cu_id']); ?></td>
						<td><?php echo $CI->main_model->getcuttingremaining($cuttingentry['cu_id']);  ?></td> 
					    <td><?php echo $cuttingentry['last_updated']; ?></td>
	</tr>
					<?php } ?>
					</table>
					</div>
						</div>				  
<div class="row bg-light dk m-b">
                    <div class="col-md-6 dker" >
                      <section style="overflow-y:scroll;overflow-x:hidden; height:250px;">
                        <header class="font-bold padder-v">
						<h4 style="text-align:center;"><strong> Recent Payment </strong> </h4>
						</header>
						 <div class="table-responsive" >
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
						<div>
						 <th>Customer Name</th>
                        <th>Total</th>
                        <th>Invoice No</th>
                        <th>Invoice </th>
						<th>Invoice Date</th>
						
						
                      </div>
					  </tr>		
                  </thead>
				  </section>
                 </div>				  

 <?php 
					$CI =&get_instance();
					foreach($workerentries as $workerentry ){ ?>
						<tr>
                       <!-- <td><label class="checkbox m-l m-t-none m-b-none i-checks"><input type="checkbox" name="post[]"><i></i></label></td>-->
                        
						<td><?php echo $workerentry['wo_uid']; ?></td>
                        <td><?php  echo $CI->main_model->getworkertotal($workerentry['wo_id']);  ?></td>
                        <td><?php echo $CI->main_model->getworkercomplete($workerentry['wo_id']);  ?></td>
						<td><?php echo $CI->main_model->getworkerremaining($workerentry['wo_id']);  ?></td>
					    <td><?php echo $workerentry['last_updated']; ?></td>
	</tr>
					<?php } ?>
                     </table>
					</div>
						</div>					
				
					 
                </section>
              </section>              
            </aside>
            
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
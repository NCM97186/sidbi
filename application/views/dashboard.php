<style>
.card-body {
    overflow-y: hidden;
    overflow-x: hidden;
}
</style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <?php if($this->session->flashdata('msg')){ echo '<fieldset id="error_fieldset"><label class="error" style="color:Red;">'.$this->session->flashdata('msg').'</label></fieldset>'; }?>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="<?php echo base_url() ?>verifier-manager" ><i class="bi bi-three-dots"></i></a>
                  <!--ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul-->
                </div>

                <div class="card-body">
                  <h5 class="card-title"> To Be Verify <span>|<br/>Events Entry</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                     <i class="fa fa-list" aria-hidden="true"></i>

                    </div>
                    <div class="ps-3">
                      <h6><?php echo $vcount; ?></h6>
                      <!--span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span-->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="<?php echo base_url() ?>approval-manager" ><i class="bi bi-three-dots"></i></a>
                  <!--ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul-->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Awaiting Approval <span>|<br/> New Verified Entry</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="ps-3">
                     <h6><?php echo $acount; ?></h6>
                      <!--span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span-->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <!--a class="icon" href="<?php echo base_url() ?>approval-manager" ><i class="bi bi-three-dots"></i></a-->
                  <!--ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul-->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Rejected <span>|  Rejected Entries</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    </div>
                    <div class="ps-3">
                      <h6>  <?php  echo $rejectedcount; ?>  </h6>
                      <!--span class="text-danger small pt-1 fw-bold">36%</span> <span class="text-muted small pt-2 ps-1">decrease</span-->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <!--a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a-->
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Last 30 Days</span></h5>
              <?php //print_r($verifiedcount);
					
					$CI =& get_instance();
					$CI->load->model('main_model');

					$ccount1 = $this->main_model->getchartcounttotalentry(date('Y-m-d',strtotime('-25 days')),date('Y-m-d',strtotime('-30 days')));
					$ccount2 = $this->main_model->getchartcounttotalentry(date('Y-m-d',strtotime('-20 days')),date('Y-m-d',strtotime('-25 days')));
					$ccount3 = $this->main_model->getchartcounttotalentry(date('Y-m-d',strtotime('-15 days')),date('Y-m-d',strtotime('-20 days')));
					$ccount4 = $this->main_model->getchartcounttotalentry(date('Y-m-d',strtotime('-10 days')),date('Y-m-d',strtotime('-15 days')));
					$ccount5 = $this->main_model->getchartcounttotalentry(date('Y-m-d',strtotime('-5 days')),date('Y-m-d',strtotime('-10 days')));
					$ccount6 = $this->main_model->getchartcounttotalentry(date('Y-m-d',time()),date('Y-m-d',strtotime('-5 days')));
					//echo $ccount1;
					//echo $this->db->last_query();
					
					$ccountv1 = $this->main_model->getchartcountverifierentry(date('Y-m-d',strtotime('-25 days')),date('Y-m-d',strtotime('-30 days')));
					$ccountv2 = $this->main_model->getchartcountverifierentry(date('Y-m-d',strtotime('-20 days')),date('Y-m-d',strtotime('-25 days')));
					$ccountv3 = $this->main_model->getchartcountverifierentry(date('Y-m-d',strtotime('-15 days')),date('Y-m-d',strtotime('-20 days')));
					$ccountv4 = $this->main_model->getchartcountverifierentry(date('Y-m-d',strtotime('-10 days')),date('Y-m-d',strtotime('-15 days')));
					$ccountv5 = $this->main_model->getchartcountverifierentry(date('Y-m-d',strtotime('-5 days')),date('Y-m-d',strtotime('-10 days')));
					$ccountv6 = $this->main_model->getchartcountverifierentry(date('Y-m-d',time()),date('Y-m-d',strtotime('-5 days')));
					
					$ccounta1 = $this->main_model->getchartcountapprovalentry(date('Y-m-d',strtotime('-25 days')),date('Y-m-d',strtotime('-30 days')));
					$ccounta2 = $this->main_model->getchartcountapprovalentry(date('Y-m-d',strtotime('-20 days')),date('Y-m-d',strtotime('-25 days')));
					$ccounta3 = $this->main_model->getchartcountapprovalentry(date('Y-m-d',strtotime('-15 days')),date('Y-m-d',strtotime('-20 days')));
					$ccounta4 = $this->main_model->getchartcountapprovalentry(date('Y-m-d',strtotime('-10 days')),date('Y-m-d',strtotime('-15 days')));
					$ccounta5 = $this->main_model->getchartcountapprovalentry(date('Y-m-d',strtotime('-5 days')),date('Y-m-d',strtotime('-10 days')));
					$ccounta6 = $this->main_model->getchartcountapprovalentry(date('Y-m-d',time()),date('Y-m-d',strtotime('-5 days')));

			  ?>
                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Total Entries',
                          data: [<?php echo $ccount1; ?>, <?php echo $ccount2; ?>, <?php echo $ccount3; ?>, <?php echo $ccount4; ?>, <?php echo $ccount5; ?>, <?php echo $ccount6; ?>],
                        }, {
                          name: 'Approved',
                          data: [<?php echo $ccounta1; ?>, <?php echo $ccounta2; ?>, <?php echo $ccounta3; ?>, <?php echo $ccounta4; ?>, <?php echo $ccounta5; ?>, <?php echo $ccounta6; ?>]
                        }, {
                          name: 'Varified',
                          data: [<?php echo $ccountv1; ?>, <?php echo $ccountv2; ?>, <?php echo $ccountv3; ?>, <?php echo $ccountv4; ?>, <?php echo $ccountv5; ?>, <?php echo $ccountv6; ?>]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["<?php echo date('Y-m-d',strtotime('-25 days')); ?>T00:00:00.000Z", "<?php echo date('Y-m-d',strtotime('-20 days')); ?>T00:00:00.000Z", "<?php echo date('Y-m-d',strtotime('-15 days')); ?>T00:00:00.000Z", "<?php echo date('Y-m-d',strtotime('-10 days')); ?>T00:00:00.000Z", "<?php echo date('Y-m-d',strtotime('-5 days')); ?>T00:00:00.000Z", "<?php echo date('Y-m-d',strtotime('-0 days')); ?>T00:00:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">

                <div class="filter">
                  <!--a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a-->
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body" style="overflow-x: scroll;">
                  <h5 class="card-title">Recent Entries  </h5>
			<?php // print_r($getdoc); ?>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name/Email/State</th>
                        <th scope="col">Document</th>
                        <th scope="col">Task/Event</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php 
					foreach($getdoc as $gd){ ?>
						
						<tr>
                        <th scope="row"><a href="#">#<?php echo $gd['docid']; ?></a></th>
                        <td><?php echo $gd['name'].'<br/>'.$gd['email'].'<br/>'.$gd['tcbp_states']; ?></td>
                        <td><a href="#" class="text-primary"><a href="<?php echo base_url().'tcbp/documentshow/'.$gd['document']; ?>"><?php echo $gd['document']; ?></a></a></td>
                        <td><?php echo $gd['taskname']; ?></td>
                        <td>
						<?php if($gd['isapproved'] == true){ ?> <span class="badge bg-success">Approved</span><?php } ?>
						<?php if($gd['isrejected'] == true){ ?> <span class="badge bg-danger">Rejected</span><?php } ?>
						<?php if($gd['isverified'] == true){ ?> <span class="badge bg-warning">Verified</span><?php } ?>
            <?php if($gd['isverified'] == false && $gd['isverified'] == false && $gd['isverified'] == false){ ?> <span class="badge bg-warning">Pending</span><?php } ?>
						<?php if($gd['veryfierquery'] != ''){ ?> <span class="badge bg-primary">Query</span><?php } ?>
						</td>
                      </tr>
						
						
					<?php }
					
					?>
                     
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

           

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

      

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>


          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <!--a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a-->
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Entry Details <span>| Alltime</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Enrty Details',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value:   <?php  echo $approvedcount; ?> ,
                          name: 'Approval'
                        },
                        {
                          value: <?php echo $verifiedcount; ?>,
                          name: 'Verified'
                        },
                       
                        {
                          value: <?php echo $pendingcount ?>,
                          name: 'Pending'
                        },
						 {
                          value: <?php  print_r($rejectedcount); ?> ,
                          name: 'Rejected'
                        },
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->



        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  

  <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo base_url(); ?>js/app.js"></script>  
  <script src="<?php echo base_url(); ?>js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/flot/jquery.flot.min.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/flot/jquery.flot.spline.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/flot/jquery.flot.grow.js"></script>
  <script src="<?php echo base_url(); ?>js/charts/flot/demo.js"></script>
  <script src="<?php echo base_url(); ?>js/calendar/bootstrap_calendar.js"></script>
  <script src="<?php echo base_url(); ?>js/calendar/demo.js"></script>
  <script src="<?php echo base_url(); ?>js/sortable/jquery.sortable.js"></script>
  <script src="<?php echo base_url(); ?>js/app.plugin.js"></script>
    <!-- datepicker -->
  <script src="<?php echo base_url(); ?>js/datepicker/bootstrap-datepicker.js"></script>
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/typeahead.js"></script>
  <script>
  var test = jQuery.noConflict();
    test(document).ready(function () {
        test('#txtCountry').typeahead({
            source: function (query, result) {
                test.ajax({
                    url: "<?php echo base_url() ?>searchcustomer",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
           }); 
		
    });
 
     test(document).ready(function () {
        test('#customermapajax').typeahead({
            source: function (query, result) {
                test.ajax({
                    url: "<?php echo base_url() ?>searchcustomer",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
           }); 
		
    });
var date = new Date();
date.setDate(date.getDate());

$('#datetimepicker').datepicker({
  format: "dd-mm-yyyy",
  orientation: "auto",
  startDate: date,
  clearBtn: true
});
 
</script>

</body>
</html>
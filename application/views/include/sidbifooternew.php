 <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SIDBI <?php echo date('Y'); ?></span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Developed by <a href="https://www.grantthornton.in/"><img src="<?php echo base_url();?>newdesign/images/logo-2.png" alt="Grant Thornton Logo"/></a> for <a href="https://www.sidbi.in/">SIDBI  </a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();  ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/vendor/quill/quill.min.js"></script>
  <!--script src="<?php echo base_url();  ?>assets/vendor/simple-datatables/simple-datatables.js"></script-->
  <script src="<?php echo base_url();  ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/vendor/php-email-form/validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url();  ?>newdesign/js/jquery.dataTables.min.js"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo base_url();  ?>assets/js/main.js"></script>
  
  
<script>
/*
const dataTable = new simpleDatatables.DataTable("#taskTable", {
	perPage: 100
})*/
/*
$(document).ready(function () {
$('#example').DataTable({
    "ordering": false
});
});*/


$(document).ready(function () {
  $("#taskTable").DataTable(
{"bInfo": false,
"bPaginate": false,

<?php if($this->uri->segment(1) == 'alltasks' || $this->uri->segment(1) == 'users-list'  || $this->uri->segment(1) == 'task-manager'   || $this->uri->segment(1) == 'users'  || $this->uri->segment(1) == 'verifier-manager' ||  $this->uri->segment(1) == 'approval-manager'){ ?> "searching": false, <?php } ?>
"bSort" : false
} )

/*
$(function(){
    $("input[type='submit']").click(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length)>5){
         alert("You can only upload a maximum of 5 files");
		// break;
		 return false;
        }
    });    
});*/
});

  /*  "bProcessing": true,
    "sAutoWidth": false,
    "bDestroy":true,
    "sPaginationType": "bootstrap", // full_numbers
    "iDisplayStart ": 10,
    "iDisplayLength": 10,
    "bPaginate": false, //hide pagination
    "bFilter": false, //hide Search bar
    "bInfo": false, // hide showing entries
*/

</script>
<script>

</script> 
</body>

</html>
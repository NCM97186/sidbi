   <footer id="footer">
    <div class="text-center padder">
      <p>
        <small style="color:#215DAC;">Design & Developed by <a href="#">netCreativemind</a> for NCMProject<br>&copy; <?php echo date('Y',time()); ?> </small>
      </p>
    </div>
  </footer>
	</section>
   
    <script type="text/javascript" src="<?php echo base_url();?>newdesign/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>newdesign/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>newdesign/js/custom-file-input.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>newdesign/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>newdesign/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function () {
  $("#taskTable").DataTable(
{"bInfo": false,
"bPaginate": false,
<?php if($this->uri->segment(1) == 'alltasks'){ ?> "searching": false, <?php } ?>
"bSort" : false
} )
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
</body>
</html>
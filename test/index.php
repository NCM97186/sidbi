<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from php_interview_questions";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
      <title>PHP MySQL Inline Editing using jQuery Ajax</title>
		<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
			.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
		</style>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "saveedit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
    </head>
    <body>		
	   <table class="tbl-qa">
		  <thead>
			  <tr>
				<th class="table-header" width="10%">Q.No.</th>
				<th class="table-header">Question</th>
				<th class="table-header">Answer</th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  if (is_array($faq)) {
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
				<td><?php echo $k+1; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'question','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["question"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'answer','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["answer"]; ?></td>
			  </tr>
		<?php
		}
		  }
		?>
		  </tbody>
		</table>
    </body>
</html>

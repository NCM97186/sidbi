<body style="margin:0 auto;">
<?php 
//print_r($barcodeentries);

 foreach($barcodeentries as $barcodeentry){ ?>
	 
	 
	 <img alt="<?php echo base64_decode($barcodeentry['barcode']);?>" src="<?php echo base_url();?>library/barcode.php?text=<?php echo $barcodeentry['barcode'];?>" /> <br/>
	 <br/>
	 
	 
 <?php

 }



?>
</body>
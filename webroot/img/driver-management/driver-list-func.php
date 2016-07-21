<?php
include('../../constants.php');
include('../../db.php');
$drivers_table = "drivers";	
$editdriverid = $_POST['editdriverid'];
$editdrivername = $_POST['editdrivername'];
$editdriverzone = serialize($_POST['drivereditzone']);

/*
*	@this query will update record in driver table 
*	@field driver_name
*	@field driver_zone_id
*	@field driver_id
*/
$sql = "UPDATE ".$drivers_table." SET driver_name='".$editdrivername."' ,driver_zone_id ='".$editdriverzone."' WHERE driver_id=".$editdriverid." ";

if ($conn->query($sql) === TRUE) {
   echo "<script>alert('Record Updated !!');</script>";
   echo "<script>parent.jQuery.fancybox.close();</script>";
   echo "<script>parent.location.reload(true);</script>";
  
} else {
	echo "<script>alert('Error while Updating Record !!');</script>";
	echo "<script>parent.jQuery.fancybox.close();</script>";
    echo "<script>parent.location.reload(true);</script>";
}
?>
<?php
include('../../constants.php');
include('../../db.php');
$drivers_table = "drivers";	
$zones_table = "zones";	
$users_sql = "select * from ".$drivers_table." where driver_is_deleted='0' order by driver_id DESC";
$users_records = $conn->query($users_sql);

$info = isset($_GET['info']) ? $_GET['info'] : '';
if ( !empty( $info ) ) {

	if ( $info=="del" ) {
		$delid = $_GET["did"];
		if ( !empty( $delid ) ) {
			/*
			*	@this query will delete the record in driver table 
			*	@field driver_is_deleted
			*	@field driver_id 
			*/
			$sql = "update ".$drivers_table." set driver_is_deleted='1' where driver_id=".$delid." ";

			if ($conn->query($sql) === TRUE) {
			   //echo "<div class='clearb'></div><div class='updated' id='message'><p><strong>Record Deleted</strong></p></div>";
			   echo "<script>alert('Record Deleted !!');</script>";
			   echo "<script>window.location = '".HOME_URL."'</script>";
			  
			} else {
				echo "<script>alert('Error while Deleting Record !!');</script>";
				 echo "<script>window.location = '".HOME_URL."'</script>";
				//echo "<div class='clearb'></div><div class='updated' id='message'><p><strong>Error deleting record.".$conn->error."</strong></p></div>";
			}

		}
	}
	if($info == "delall") {
		if(isset($_POST['delete'])) {
			$delete_id = $_POST['usercodeid'];
			$id = count($delete_id );
			if (count($id) > 0) {
				if(!empty($delete_id)) {
					foreach ($delete_id as $id_d) {
						/*
						*	@this query will delete selected driver from the drivers table
						*	@field driver_is_deleted
						*	@field driver_id 
						*/
						$delete = "update ".$drivers_table." set driver_is_deleted='1' where driver_id=".$id_d." ";
						$conn->query($delete);
					}
				} else {
					echo "<div style='clear:both;'></div><div class='updated' id='message'><p><strong>".__('No records selected.')."</strong></p></div>";
				}
				
			}
			if($delete) {
				//echo "<div style='clear:both;'></div><div class='updated' id='message'><p><strong>Selected Records Deleted</strong></p></div>";
				echo "<script>alert('Selected Records Deleted !!');</script>";
				 echo "<script>window.location = '".HOME_URL."'</script>";
			}
		}
	}
	if($info="edit") {
		$editlid = $_GET["eid"];
		if ( !empty( $editlid ) ) { 
			/*
			*	@this query will select one driver record from the data database
			*	@field driver_id
			*/

			$selected_driver_sql = "select * from ".$drivers_table." where driver_id = ".$editlid." ";
			$selected_driver_records = $conn->query($selected_driver_sql);
			
			if ( $selected_driver_records->num_rows > 0 ) {
				while($selected_driver_record = $selected_driver_records->fetch_assoc()) {	
					
				?>
				<div class="wrap"> 
					<h2>Edit Driver Details</h2>
					<br/>
					 <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/style.css"/>
					 <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/bootstrap.css"/>
					 <script src="<?php echo APP_URL; ?>/js/jquery-1.11.3.min.js"></script>
					 <script src="<?php echo APP_URL; ?>/js/bootstrap.min.js"></script>
					 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
					 <form role="form" action="driver-list-func.php" method="post" id="editdriverform">
					  <div class="form-group">
					    <label for="editid">ID:</label>
					    <input type="text" class="form-control" id="editdriverid" name="editdriverid" readonly value="<?php echo $selected_driver_record['driver_id']; ?>">
					  </div>
					  <div class="form-group">
					    <label for="editdrivername">Driver Name:</label>
					    <input type="text" class="form-control" id="editdrivername" name="editdrivername" value="<?php echo $selected_driver_record['driver_name']; ?>">
					  </div>
					  <div class="form-group">
					  <label for="drivereditzone">Select Zone:</label>
						  <select class="form-control" id="drivereditzone" name="drivereditzone[]" multiple="multiple"  size="20">
						  	<?php
						  	$driverzoneid = $selected_driver_record['driver_zone_id'];
							$related_zoneslistarr = array();
							$related_zoneslistarr = unserialize($driverzoneid);
							// $zones_sql 		  = "select zone_name from ".$zones_table." where zone_id = ".$driverzoneid." ";
							// $zone_records 	  = $conn->query($zones_sql);
							// if ( $zone_records->num_rows > 0 ) {
							// 	while($zone_record = $zone_records->fetch_assoc()) {
							// 		$zone_name = $zone_record['zone_name'];
							// 	}	
							// }



							/*
							*	@this query will select all record from zones table
							*	@field zone_is_deleted
							*/
						  	$all_zones_sql 		  = "select * from ".$zones_table." where zone_is_deleted='0' ";


							$all_zone_records 	  = $conn->query($all_zones_sql);
							if ( $all_zone_records->num_rows > 0 ) {
								while($all_zone_record = $all_zone_records->fetch_assoc()) {
									 if(in_array($all_zone_record['zone_id'],$related_zoneslistarr)) {
									 	$selected_zone = "selected=selected";
									 } else {
									 	$selected_zone = "";
									 }
									 echo "<option id=".$all_zone_record['zone_id']." ".$selected_zone." value=".$all_zone_record['zone_id'].">".$all_zone_record['zone_name']."</option>";
								}	
							}
						  	?>
						  </select>
					 </div>
					  <button type="submit" class="btn btn-default">Update</button>
					</form>
				</div>
				<?php
				}	
			}
		 }
	}
}	
?>
<script>
	jQuery(document).ready(function() {
		 $("#editdriverform").validate();
    });		 
</script>
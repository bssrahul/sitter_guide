<script>
	jQuery(document).ready(function() {
		jQuery("a.iframe").fancybox({
			maxWidth	: 2000,
			maxHeight	: 500,
			width		: '60%',
			height		: '20%',
			autoSize	: true,
			type		: 'iframe',
		});
	});
</script>
<?php
include('db.php');
$drivers_table = "drivers";	
$zones_table = "zones";	



/*
*	@this query will select all record from driver table 
*	@field driver_is_deleted
*/

$users_sql = "select * from ".$drivers_table." where driver_is_deleted='0' order by driver_id DESC";
$users_records = $conn->query($users_sql);
?>
<div class="wrap"> 
	<h2>Drivers Listing</h2>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add-driver">Add New Driver</button>
	<!-- Modal -->
	<div id="add-driver" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add New Driver</h4>
	      </div>
	      <div class="modal-body">
	        <form role="form" action="inc/driver-management/driver-list-add.php" method="post" id="adddriverform">
			  <div class="form-group">
			    <label for="adddrivername">Driver Name:</label>
			    <input type="text" class="form-control required" id="adddrivername" name="adddrivername" value="">
			  </div>
			  <div class="form-group">
			  <label for="driveraddzone">Select Zone:</label>
				  <select class="form-control" id="driveraddzone" name="driveraddzone[]" multiple="multiple"  size="20">
				  	<?php
				  	$all_zones_sql 		  = "select * from ".$zones_table." where zone_is_deleted='0' ";
					$all_zone_records 	  = $conn->query($all_zones_sql);
					if ( $all_zone_records->num_rows > 0 ) {
						while($all_zone_record = $all_zone_records->fetch_assoc()) {
							 echo "<option id=".$all_zone_record['zone_id']." value=".$all_zone_record['zone_id'].">".$all_zone_record['zone_name']."</option>";
						}	
					}
				  	?>
				  </select>
			 </div>
			  <button type="submit" class="btn btn-default">ADD</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<br/>
	<br/>
	<form name="drivers_list" method="post" action="inc/driver-management/driver-list-update.php?info=delall">	
	<table class="" id="userlist" style="width:100%">
		<thead>
			<tr>
				<th width="10px" style="background:none"><input type="checkbox" id="alluser" /></th>
				<th width="14px">ID</th>
				<th>Driver Name</th> 
				<th width="215px">Zone Name</th>                             
				<th style="text-align: center;">Action</th>
			</tr>
		</thead>
		<tbody>				     
			<?php
			$no = 1;
			if ( $users_records->num_rows > 0 ) { ?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery('#userlist').dataTable({ 
							"aaSorting": [[ 0, "desc" ]],
						});
						jQuery('#alluser').click(function(event) {  //on click
						if(this.checked) { // check select status
						    jQuery('.userid').each(function() { //loop through each checkbox
						        this.checked = true;  //select all checkboxes with class "checkbox1"              
						    });
						}else{
						    jQuery('.userid').each(function() { //loop through each checkbox
						        this.checked = false; //deselect all checkboxes with class "checkbox1"                      
						    });        
						}
						});
					});	
				</script>
				<?php
				 while($users_record = $users_records->fetch_assoc()) {
					$id        		  = $users_record['driver_id'];
					$drivername 	  = $users_record['driver_name'];
					$driverzoneid 	  = $users_record['driver_zone_id'];
					
					$related_zoneslistarr = array();
					$related_zoneslistarr = unserialize($driverzoneid);
					if (is_array($related_zoneslistarr) || is_object($related_zoneslistarr))
					{
					    foreach($related_zoneslistarr as $zoneid) {
					    	
					    	/*
							*	@this query will select zone name  from zones table 
							*	@field zone_id
							*/

							$zone_sql 	  = "select zone_name from ".$zones_table." where zone_id = ".$zoneid."  ";
							$zone_records = $conn->query($zone_sql);
							if ( $zone_records->num_rows > 0 ) {
								while($zone_record = $zone_records->fetch_assoc()) {
									$zone_names[] = $zone_record['zone_name'];
								}	
							} else {
								$zone_names = array();
							}
						}
					} else {
						$zone_names = array();
					}



					// if($driverzoneid == "0") {
					// 	$zone_name = "-------";
					// } else {
					// 	$zones_sql 		  = "select zone_name from ".$zones_table." where zone_id = ".$driverzoneid." and zone_is_deleted='0' ";
					// 	$zone_records 	  = $conn->query($zones_sql);
					// 	if ( $zone_records->num_rows > 0 ) {
					// 		while($zone_record = $zone_records->fetch_assoc()) {
					// 			$zone_name = $zone_record['zone_name'];
					// 		}	
					// 	} else {
					// 			$zone_name = "-------";
					// 	}
					// }
					?>
					<tr>
					<th><input class="userid" type="checkbox" name="usercodeid[]" id="usercodeid" value="<?php echo $id; ?>" /></th>
						<td><?php echo $id; ?></td>
						<td nowrap><?php echo $drivername; ?></td>
						<td nowrap><?php if(!empty($zone_names)) { foreach ($zone_names as $value) {  $znames .= $value.", ";  } echo trim($znames,', ');  } else { echo 'No Zone selected!'; } ?></td>                 
						<td style="text-align: center;">							
							<a onclick="javascript:return confirm('Are you sure, want to delete record of <?php echo $drivername; ?>?')" href="inc/driver-management/driver-list-update.php?info=del&did=<?php echo $id;?>">
							<img src="images/delete.png" title="Delete" alt="Delete" />
							</a>
							&nbsp;&nbsp;&nbsp;
							<a href="inc/driver-management/driver-list-update.php?info=edit&eid=<?php echo $id;?>" class="iframe">
							<img src="images/edit.png" title="Edit" alt="Edit" />
							</a>
						</td>             
					</tr>
				<?php $no += 1;							
				}
				$conn->close();
			} else {
				echo '<h3>No Driver Records Found !!</h3>';
			} ?>					
		</tbody>
	</table>
	<p>
		<input type="submit" name="delete" class="add-new-h2 button-secondary" onclick="javascript:return confirm('Are you sure, want to delete all checked record?')" value="Delete">
	</p>
	</form>
</div>
<script>
	jQuery(document).ready(function() {
		 $("#adddriverform").validate();
	});
</script>

<!-- page content -->
	<!-- top tiles -->
	<div class="page-title">
		<div class="title_left">
			<h3>
				<?php echo __("Dashboard"); ?> <small><?php echo __("Control Panel"); ?></small>
			</h3>
		</div>
	</div>
	<div class="row tile_count">
		<!--add new-->
		     <?= $this->element('adminElements/error_msg'); ?>
			  <?= $this->element('adminElements/success_msg'); ?>
			
			 
		<div class="col-md-12 col-sm-12 col-xs-12">
						
			<div class="row top_tiles">
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-laptop"></i>
						</div>
						<div class="count"><?php echo $CmsPagesDetail['total_cms_pages']; ?></div>

						<h3><?php echo __("CMS Pages"); ?></h3>
						<p><i class="green"><b><?php echo $CmsPagesDetail['active']; ?></b> Active Pages</i> | <i class="red"><b><?php echo $CmsPagesDetail['deactive']; ?></b> De-active Pages</i></p>
					</div>
				</div>
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-user"></i>
						</div>
						<div class="count"><?php echo $UsersDetail['total_user'];?></div>

						<h3><?php echo __("Users"); ?></h3>
						<p><i class="green"><b><?php echo $UsersDetail['active_user'];?></b> Active Users</i> | <i class="red"><b><?php echo $UsersDetail['deactive_user'];?></b> De-active Users</i></p>
					</div>
				</div>
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-phone"></i>
						</div>
						<div class="count"><?php echo $ContactRequestDetail['total_contact_request']; ?></div>

						<h3><?php echo __("Contact Requests"); ?></h3>
						<p><i class="green"><b><?php echo $ContactRequestDetail['reply']; ?></b> Reply</i> | <i class="red"><b><?php echo $ContactRequestDetail['no_reply']; ?></b> No Reply</i></p>
					</div>
				</div>
			</div>
			
			<div class="x_panel">
				<div class="x_title">
					<h2> Administrator Detail</h2>
					<div class="clearfix"></div>
				</div>
						
				<div class="x_content table-responsive">
                    <table id="example" class="table table-bordered responsive-utilities jambo_table">
					    <thead>
							<tr class="headings">
								<!--<th>
									 <input type="checkbox" class="tableflat">
								</th>-->
								<th class="column-title"><?php echo $this->Paginator->sort('Admins.name', 'Name')?> </th>
								<th class="column-title"><?php echo $this->Paginator->sort('Admins.username', 'User Name')?></th>
								<th class="column-title"><?php echo $this->Paginator->sort('Admins.email', 'email')?></th>
								<th class="column-title"><?php echo $this->Paginator->sort('Admins.status', 'Status')?></th>
								<th class="column-title"><?php echo $this->Paginator->sort('Admins.last_login', 'Last Login')?></th>
								<th class="column-title"><?php echo $this->Paginator->sort('Admins.date_added', 'Created')?></th>
								<th class="column-title no-link last"><span class="nobr">Action</span>
								</th>
								
							</tr>
						</thead>

						<tbody>
						 <?php if(sizeof($admins_info) > 0) {
						    $i=1;
						 ?>
							<?php foreach($admins_info as $admin_info) { 
							//echo $admin_info->title;
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
							<tr class="<?php echo $class; ?>">
								<!--<td class="a-center "><div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div></td>-->
								<td class=" "><?php echo $admin_info->full_name; ?></td>
								<td class=" "><?php 
											echo $admin_info->username;
								?></td>
								<td class=" "><?php 
											echo $admin_info->email;
								?></td>
								<td><?php echo $admin_info->status == 1?'Active':'Inactive';	?></td>
								<td class=" "><?php 
											echo $admin_info->last_login;
								?></td>
								<td class=" "><?php 
											echo $admin_info->date_added;
								?></td>
							
								<?php $target = ['0'=>'1','1'=>'0'];?>
								<td class=" last">
								   <!--<a title="<?php echo($admin_info->status == 0?'Activate status':'Deactivate Status') ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Users'.'/'.base64_encode(convert_uuencode($admin_info->id)).'/'.$target[$admin_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($admin_info->status ==0?'-o':'') ?>"></span></a>-->
								 
								  <a title="Edit" href="<?php echo HTTP_ROOT."users/admin-edit/".base64_encode(convert_uuencode($admin_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a> | <a title="Change Password" href="<?php echo HTTP_ROOT."users/change-password/".base64_encode(convert_uuencode($admin_info->id));?>"><span> <i class="fa fa-wrench"> </i></span></a>
								  
								   <!--<a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'Users'.'/'.base64_encode(convert_uuencode($admin_info->id));?>" onclick="if(!confirm('Are you sure to delete this User?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>-->
								</td>
							</tr>
							<?php $i++; 
							} 
							} else { ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="8" style=" text-align:center;"> No records found </td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!--end-->
		</div>
	</div>


	<!-- start of weather widget
	<div class="raw">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Daily active users <small>Sessions</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="temperature"><b>Monday</b>, 07:30 AM
								<span>F</span>
								<span><b>C</b>
					</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="weather-icon">
								<span>
						<canvas height="84" width="84" id="partly-cloudy-day"></canvas>
					</span>

							</div>
						</div>
						<div class="col-sm-8">
							<div class="weather-text">
								<h2>Texas
						<br><i>Partly Cloudy Day</i>
					</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="weather-text pull-right">
							<h3 class="degrees">23</h3>
						</div>
					</div>
					<div class="clearfix"></div>


					<div class="row weather-days">
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Mon</h2>
								<h3 class="degrees">25</h3>
								<span>
							<canvas id="clear-day" width="32" height="32">
							</canvas>

					</span>
								<h5>15
						<i>km/h</i>
					</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Tue</h2>
								<h3 class="degrees">25</h3>
								<canvas height="32" width="32" id="rain"></canvas>
								<h5>12
						<i>km/h</i>
					</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Wed</h2>
								<h3 class="degrees">27</h3>
								<canvas height="32" width="32" id="snow"></canvas>
								<h5>14
						<i>km/h</i>
					</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Thu</h2>
								<h3 class="degrees">28</h3>
								<canvas height="32" width="32" id="sleet"></canvas>
								<h5>15
						<i>km/h</i>
					</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Fri</h2>
								<h3 class="degrees">28</h3>
								<canvas height="32" width="32" id="wind"></canvas>
								<h5>11
						<i>km/h</i>
					</h5>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="daily-weather">
								<h2 class="day">Sat</h2>
								<h3 class="degrees">26</h3>
								<canvas height="32" width="32" id="cloudy"></canvas>
								<h5>10
						<i>km/h</i>
					</h5>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

		</div>
	</div>-->
	<!-- end of weather widget -->

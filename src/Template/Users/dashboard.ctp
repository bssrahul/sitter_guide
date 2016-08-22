
<!-- page content -->
	<!-- top tiles -->
	<div class="page-title">
		<div class="title_left">
			<h3>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Dashboard')); ?>  <small><?php echo $this->requestAction('app/get-translate/'.base64_encode('Control Panel')); ?></small>
				
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
				<a href="<?php echo HTTP_ROOT.'cmspages/cms-pages'; ?>" >
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-laptop"></i>
						</div>
						<div class="count"><?php echo $CmsPagesDetail['total_cms_pages']; ?></div>

						<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('CMS Pages')); ?></h3>
						<p><i class="green"><b><?php echo $CmsPagesDetail['active']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Active Pages')); ?></i> | <i class="red"><b><?php echo $CmsPagesDetail['deactive']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('De-active Pages')); ?></i></p>
					</div>
				</a>
				</div>
			
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="<?php echo HTTP_ROOT.'users/users-listing'; ?>">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-user"></i>
						</div>
						<div class="count"><?php echo $UsersDetail['total_user'];?></div>

						<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Users')); ?></h3>
						<p><i class="green"><b><?php echo $UsersDetail['active_user'];?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Active Users')); ?></i> | <i class="red"><b><?php echo $UsersDetail['deactive_user'];?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('De-active Users')); ?></i></p>
					</div>
				</a>
				</div>
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="<?php echo HTTP_ROOT.'cmspages/contact-requests'; ?>">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-phone"></i>
						</div>
						<div class="count"><?php echo $ContactRequestDetail['total_contact_request']; ?></div>

						<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Requests')); ?></h3>
						<p><i class="green"><b><?php echo $ContactRequestDetail['reply']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Reply')); ?></i> | <i class="red"><b><?php echo $ContactRequestDetail['no_reply']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('No Reply')); ?></i></p>
					</div>
				</a>
				</div>
			</div>
			
			<div class="row top_tiles">
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="<?php echo HTTP_ROOT.'cmspages/blogs-listing'; ?>">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-bullhorn"></i>
						</div>
						<div class="count"><?php echo $blogDetail['total_blog']; ?></div>

						<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Blogs')); ?></h3>
						<p><i class="green"><b><?php echo $blogDetail['active']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Active Blogs')); ?></i> | <i class="red"><b><?php echo $blogDetail['deactive']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('De-active Blogs')); ?></i></p>
					</div>
				</a>
				</div>
				
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="<?php echo HTTP_ROOT.'cmspages/subscribes-listing'; ?>">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-users"></i>
						</div>
						<div class="count"><?php echo $subscribesDetail['total_subscribes'];?></div>

						<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Subscribers')); ?></h3>
						<p><i class="green"><b><?php echo $subscribesDetail['active'];?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Active Subscribers')); ?></i> | <i class="red"><b><?php echo $subscribesDetail['deactive'];?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('De-active Subscribers')); ?></i></p>
					</div>
				</a>
				</div>
				
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="<?php echo HTTP_ROOT.'partners/partners-listing'; ?>">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-glass"></i>
						</div>
						<div class="count"><?php echo $partnersDetail['total_partners']; ?></div>

						<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Partners')); ?></h3>
						<p><i class="green"><b><?php echo $partnersDetail['active']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Active Partners')); ?></i> | <i class="red"><b><?php echo $partnersDetail['deactive']; ?></b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('De-active Partners')); ?></i></p>
					</div>
				</a>
				</div>
				
				
			</div>
			
			<div class="x_panel">
				<div class="x_title">
					<h2> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Administrator Detail')); ?></h2>
					<div class="clearfix"></div>
				</div>
						
				<div class="x_content table-responsive">
                    <table id="example" class="table table-bordered responsive-utilities jambo_table">
					    <thead>
							<tr class="headings">
								<!--<th>
									 <input type="checkbox" class="tableflat">
								</th>-->
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('User Name')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Status')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Login')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Created')); ?></th>
								<th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Action')); ?></span>
								</th>
								
							</tr>
						</thead>

						<tbody>
						 <?php 
						 if(sizeof($admins_info) > 0) {
						    $i=1;
							foreach($admins_info as $admin_info) { 
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
									<td><?php echo $admin_info->status == 1? $this->requestAction('app/get-translate/'.base64_encode('Active')): $this->requestAction('app/get-translate/'.base64_encode('Blocked'));	?></td>
									<td class=" "><?php 
												echo date("F j, Y h:i A", strtotime($admin_info->last_login));
									?></td>
									<td class=" ">
										<?php 
												echo date("F j, Y h:i A", strtotime($admin_info->date_added));
												
									?></td>
								
									<?php $target = ['0'=>'1','1'=>'0'];?>
									<td class=" last">
									   <!--<a title="<?php echo($admin_info->status == 0? $this->requestAction('app/get-translate/'.base64_encode('Activate status')): $this->requestAction('app/get-translate/'.base64_encode('Deactivate Status'))) ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Users'.'/'.base64_encode(convert_uuencode($admin_info->id)).'/'.$target[$admin_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($admin_info->status ==0?'-o':'') ?>"></span></a>-->
									 
									  <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit')); ?>" href="<?php echo HTTP_ROOT."users/admin-edit/".base64_encode(convert_uuencode($admin_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a> | <a title="Change Password" href="<?php echo HTTP_ROOT."users/change-password/".base64_encode(convert_uuencode($admin_info->id));?>"><span> <i class="fa fa-wrench"> </i></span></a>
									  
									   <!--<a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'Users'.'/'.base64_encode(convert_uuencode($admin_info->id));?>" onclick="if(!confirm('Are you sure to delete this User?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>-->
									</td>
								</tr>
								<?php $i++; 
								} 
							}else{ ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="8" style=" text-align:center;"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('No Records Found')); ?> </td>
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#act').change(function(){
						
					if($('#act').val()!="")
					{					
						if($('.selectCheck').is(':checked'))
						{
							if($('#act').val()==1)
							{
								var result = confirm("Do you want to Delete records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Users/all_manage/Users';
									document.myform.submit();
								}
							}
							else if($('#act').val()==2)
							{
								var result = confirm("Do you want to show records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Users/all_manage/Users';
									document.myform.submit();
								}
							}
							else if($('#act').val()==3)
							{
								var result = confirm("Do you want to hide records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Users/all_manage/Users';
									document.myform.submit();
								}
							}
						}
						else
						{
							alert('Please select atleast one record.');
							location.reload();
							return false;
						}
					}
				});
			});
		</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="">
 
	
	<div class="row">
	    <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2> <?php echo $this->requestAction('users/get-translate/'.base64_encode('Users Listing')); ?></h2>
					
					<div class="clearfix"></div>
				</div>
                 <?= $this->element("adminElements/success_msg"); ?>
				<div class="x_content table-responsive">
                    
					<table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th>
									 <!--<input type="checkbox" class="tableflat">-->
									 <?php echo $this->requestAction('users/get-translate/'.base64_encode('Sr. No.')); ?>
								</th>
								<th class="column-title"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Name')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Email')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Phone')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Created')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Status')); ?></th>
								<th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Action')); ?></span>
								</th>
								
							</tr>
						</thead>

						<tbody>
						 <?php if(sizeof($users_info) > 0) {
						    $i=1;
						 ?>
							<?php foreach($users_info as $user_info) { 
							//echo $user_info->title;
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
								<tr class="<?php echo $class; ?>">
									<td class="a-center ">
								
									<!--<div class="icheckbox_flat-green" style="position: relative;">
									
									<input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;" />
									
									<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>--></td>
									<td class=" "><?php echo $user_info->first_name." ".$user_info->last_name; ?></td>
									<td class=" "><?php 
												echo $user_info->email;
									?></td>
									<td class=" "><?php 
												echo $user_info->phone;
									?></td>
									<td class=" "><?php 
												echo date("F j,Y h:i A",strtotime($user_info->date_added));
									?></td>
									 <td><?php echo $user_info->status == 1?'Active':'Blocked';	?></td>
									<?php $target = ['0'=>'1','1'=>'0'];?>
									<td class=" last">
									
									   <a title="<?php echo($user_info->status == 0?'Activate status':'Deactivate Status') ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Users'.'/'.base64_encode(convert_uuencode($user_info->id)).'/'.$target[$user_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($user_info->status ==0?'-o':'') ?>"></span></a>
									 
									  <a title="Edit" href="<?php echo HTTP_ROOT."users/edit-user/".base64_encode(convert_uuencode($user_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a>
									   
									   <a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'Users'.'/'.base64_encode(convert_uuencode($user_info->id));?>" onclick="if(!confirm('Are you sure to delete this User?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>
									   
										<!--<a title="Pet View" href="<?php echo HTTP_ROOT."users/user-pet-view/".base64_encode(convert_uuencode($user_info->id));?>"><span><i class="fa fa-paw"></i></span></a>-->
									</td>
								</tr>
							<?php $i++; 
							} 
							} else { ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="8" style=" text-align:center;"> <?php echo $this->requestAction('users/get-translate/'.base64_encode('No Records Found')); ?> </td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<?php // echo $this->element('adminElements/new_paginator'); ?>	
			</div>
			<div id="pager" style="float:left; width:97%; padding-left:7px;">
			</div>
		</div>
	</div>
</div>	
<!-- Datatables -->
<?php echo $this->element("adminElements/data_table"); ?>		
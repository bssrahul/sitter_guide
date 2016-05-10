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
								<th >
									 <!--<input type="checkbox" class="tableflat">-->
									 <?php echo $this->requestAction('users/get-translate/'.base64_encode('Sr. No.')); ?>
								</th>
								<th class="column-title" ><?php echo $this->requestAction('users/get-translate/'.base64_encode('Name')); ?></th>
								<th class="column-title" style="width:100px;"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Email')); ?></th>
								<th class="column-title" ><?php echo $this->requestAction('users/get-translate/'.base64_encode('Created')); ?></th>
								<th class="column-title" ><?php echo $this->requestAction('users/get-translate/'.base64_encode('Status')); ?></th>
								<th class="column-title no-link last" ><span class="nobr"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Action')); ?></span>
								</th>
								
								<th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Badges')); ?></span>
								</th>
								<!--<th class="column-title" ><?php echo $this->requestAction('users/get-translate/'.base64_encode('Skill Documents')); ?></th>-->
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
									<!--<td class=" "><?php 
												//echo $user_info->phone;
									?></td>-->
									<td class=" "><?php 
												echo date("F j,Y ",strtotime($user_info->date_added));
									?></td>
									 <td><?php echo $user_info->status == 1?'Active':'Blocked';	?></td>
									<?php $target = ['0'=>'1','1'=>'0'];?>
									<td class=" last">
									
									   <a title="<?php echo($user_info->status == 0?'Activate status':'Deactivate Status') ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Users'.'/'.base64_encode(convert_uuencode($user_info->id)).'/'.$target[$user_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($user_info->status ==0?'-o':'') ?>"></span></a>
									 
									  <a title="Edit" href="<?php echo HTTP_ROOT."users/edit-user/".base64_encode(convert_uuencode($user_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a>
									   
									  <!-- <a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'Users'.'/'.base64_encode(convert_uuencode($user_info->id));?>" onclick="if(!confirm('Are you sure to delete this record?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>
									   
										<a title="Pet View" href="<?php echo HTTP_ROOT."users/user-pet-view/".base64_encode(convert_uuencode($user_info->id));?>"><span><i class="fa fa-paw"></i></span></a>-->
									</td>
									
									<td style="width:150px;">
										<?php if(($user_info['users_badge'])!= ""){?>
												<a title="<?php echo($user_info['users_badge']->dl_badge == 0?'Fill Driving licence badge':'Unfill Driving licence badge') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='dl_badge'.'/'.$target[$user_info['users_badge']->dl_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->dl_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->pbc_badge == 0?'Fill Police check background badge':'Unfill Police check background badge') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='pbc_badge'.'/'.$target[$user_info['users_badge']->pbc_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->pbc_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->physician_pet_badge == 0?'Fill Physician pets badge':'Unfill Physician pets badge') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='physician_pet_badge'.'/'.$target[$user_info['users_badge']->physician_pet_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->physician_pet_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->physician_people_badge == 0?'Fill Physician people badge':'Unfill Physician people badge') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='physician_people_badge'.'/'.$target[$user_info['users_badge']->physician_people_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->physician_people_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->other_badge == 0?'Fill Other qualification badge':'Unfill Other qualification badge') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='other_badge'.'/'.$target[$user_info['users_badge']->other_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->other_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->cpr_badge == 0?'Fill Knowledge of CRP':'Unfill Knowledge of CRP') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='cpr_badge'.'/'.$target[$user_info['users_badge']->cpr_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->cpr_badge ==0?'-o':'') ?>"></span></a>
												
												<br>
												<a title="<?php echo($user_info['users_badge']->oral_medication_badge == 0?'Fill Knowledge of oral Medication':'Unfill Knowledge of oral Medication') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='oral_medication_badge'.'/'.$target[$user_info['users_badge']->oral_medication_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->oral_medication_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->injected_medication_badge == 0?'Fill Knowledge of injected medication':'Unfill Knowledge of injected medication') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='injected_medication_badge'.'/'.$target[$user_info['users_badge']->injected_medication_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->injected_medication_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->rescue_pets_badge == 0?'Fill Experience of rescue pets':'Unfill Experience of rescue pets') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='rescue_pets_badge'.'/'.$target[$user_info['users_badge']->rescue_pets_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->rescue_pets_badge ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->pet_training == 0?'Fill Expert in pet training':'Unfill Expert in pet training') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='pet_training'.'/'.$target[$user_info['users_badge']->pet_training];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->pet_training ==0?'-o':'') ?>"></span></a>
												
												<a title="<?php echo($user_info['users_badge']->behavioural_problem == 0?'Fill Experience of behavioural problems':'Unfill Experience of behavioural problems') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='behavioural_problem'.'/'.$target[$user_info['users_badge']->behavioural_problem];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->behavioural_problem ==0?'-o':'') ?>"></span></a>
												
												
										<?php }?>			 								  
									</td>
								<!--	<td>
											<a title="Download Skill Documents" href="<?php echo HTTP_ROOT.'users/download-skill-documents'?>"> Download Skill Documents </a>
										
									</td>-->
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

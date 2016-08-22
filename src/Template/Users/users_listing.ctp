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
<!-- Right side column. Contains the navbar & content of the page -->
<div class="">
 
	
	<div class="row">
	    <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Users Listing')); ?></h2>
					
					<div class="clearfix"></div>
				</div>
                 <?= $this->element("adminElements/success_msg"); ?>
				<div class="x_content table-responsive">
                    
					<table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th >
									 <!--<input type="checkbox" class="tableflat">-->
									 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sr. No.')); ?>
								</th>
								<th class="column-title" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?></th>
								<th class="column-title" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name')); ?></th>
								<th class="column-title" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Type')); ?></th>
								<th class="column-title" style="width:100px;"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?></th>
								<th class="column-title" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Created')); ?></th>
								<th class="column-title" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Status')); ?></th>
								<th class="column-title no-link last" ><span class="nobr"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Action')); ?></span>
								</th>
								
								<th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Badges')); ?></span>
								</th>
								<!--<th class="column-title" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Skill Documents')); ?></th>-->
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
										<td class=" ">	
										<?php if($user_info->is_image_uploaded  == 1) {
												
													if(!empty($user_info->image)){ ?>
														<div class="text-centerimage view-first customImg">
																	<img class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT .'img/uploads/'. $user_info->image; ?>" alt="Image not found">
														</div>
														
												<?php }else{?>
													
														<div class="text-centerimage view-first customImg">
																	<img class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" alt="Image not found">
														</div>
														
												<?php } ?>
										
										<?php }else  {
													if(!empty($user_info->image)){ ?>
														
														<div class="text-centerimage view-first customImg">
																	<img class="img-circle profile_img catImg" src="<?php echo $user_info->image; ?>" alt="Image not found">
														</div>
														
													<?php }else{?>
														<div class="text-centerimage view-first customImg">
																	<img class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" alt="Image not found">
														</div>
														
												<?php } ?>
														
														
											<?php } ?>
										</td>
									<!--<div class="icheckbox_flat-green" style="position: relative;">
									
									<input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;" />
									
									<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>--></td>
									<td class=" "><?php echo $user_info->first_name." ".$user_info->last_name . "</br> </br>"; ?>
									
									<?php if(($user_info['users_badge'])!= ""){
											if($user_info['users_badge']->dl_pcb_badge){?>
												
												<img title="This sitter has successfully passed a basic background check by a third party provider." src="<?php echo HTTP_ROOT. 'img/Picture1.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
												
									<?php	}
											if($user_info['users_badge']->cpr_rescue_badge){?>
												<img title="This sitter is a vet nurse, studying vet sciences or has a certificate in animal handling." src="<?php echo HTTP_ROOT. 'img/Picture8.png'; ?>" alt="Dl & PCB Badge"	height="23px" width="23px"/>
									<?php	}
											if($user_info['users_badge']->oral_injucted_badge){?>
												<img title="This sitter is comfortable to administer oral and injected medication." src="<?php echo HTTP_ROOT. 'img/Picture7.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
									<?php	}
											if($user_info['users_badge']->ffo_area_badge){?>
												<img title="This sitter has secure fenced garden or backyard." src="<?php echo HTTP_ROOT. 'img/Picture9.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
									<?php	}
									}?>
									
									</td>
									<td class=" "><?php echo $user_info->user_type ; ?>
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
									
									   <a title="<?php echo($user_info->status == 0?$this->requestAction('app/get-translate/'.base64_encode('Activate status')): $this->requestAction('app/get-translate/'.base64_encode('Deactivate Status'))) ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Users'.'/'.base64_encode(convert_uuencode($user_info->id)).'/'.$target[$user_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($user_info->status ==0?'-o':'') ?>"></span></a>
									 
									  <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit')); ?>" href="<?php echo HTTP_ROOT."users/edit-user/".base64_encode(convert_uuencode($user_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a>
									   
									  <!-- <a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'Users'.'/'.base64_encode(convert_uuencode($user_info->id));?>" onclick="if(!confirm('Are you sure to delete this record?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>
									   
										<a title="Pet View" href="<?php echo HTTP_ROOT."users/user-pet-view/".base64_encode(convert_uuencode($user_info->id));?>"><span><i class="fa fa-paw"></i></span></a>-->
									</td>
									
									<td style="width:150px;">
									<?php
											/* For Driving & Police background*/
										 $UPA_Data=$user_info->user_professional_accreditations;
										 
										$dl=0;
										$pbc=0;
										foreach($UPA_Data as $UPA_data){
																																	
											if($UPA_data->type_professional == 'govt' && $UPA_data->sector_type == 'licence' && $UPA_data->scanned_certification != "")   {
												
												$dl=1;
											}
											if($UPA_data->type_professional == 'check' && $UPA_data->sector_type == 'govt' && $UPA_data->scanned_certification != ""){
												
												$pbc=1;
											}
										
												
																							
										}  
										/* End of Driving & Police background*/
									
									?>
									<?php 
										if(($user_info['users_badge']) !=""){ 
											
											if( $dl == 1 && $pbc == 1 ){
									?>
											
												<a title="<?php echo($user_info['users_badge']->dl_pcb_badge == 0?'Check Driving licence & Police Check BackGround badge':'Uncheck Driving licence & Police Check BackGround badge') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='dl_pcb_badge'.'/'.$target[$user_info['users_badge']->dl_pcb_badge];?>" >
													<span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->dl_pcb_badge ==0?'-o':'') ?>"></span>
												</a>
												
											<?php  
												echo $this->requestAction('app/get-translate/'.base64_encode('Driving licence & Police BackGround Check')). "</br></br>"; 
											}else{
													echo "<em style='color:#1D486E'>".$this->requestAction('app/get-translate/'.base64_encode('DL & Police Background Check documents not uploaded'))."</em><br/>";
											} ?>
											
											<?php 
											if((!empty($user_info->user_professional_accreditations_details[0]->cpr_for)) && (!empty($user_info->user_professional_accreditations_details[0]->ex_rescue_pets )) ){
											?>
											
													<a title="<?php echo($user_info['users_badge']->cpr_rescue_badge == 0?'Check Knowledge of CPR & Experience of rescue pets':'Uncheck Knowledge of CPR & Experience of rescue pets') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='cpr_rescue_badge'.'/'.$target[$user_info['users_badge']->cpr_rescue_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->cpr_rescue_badge ==0?'-o':'') ?>"></span></a>
												
												<?php echo $this->requestAction('app/get-translate/'.base64_encode('Knowledge of CPR & Experience of rescue pets'))." </br></br> "; 
											}else{
											
												echo "<em style='color:#29ABE2'>".$this->requestAction('app/get-translate/'.base64_encode('Knowledge of CPR and rescue pet fields not set'))."</em><br/>";
											
											}?>
													
											<?php 
											if(!empty($user_info->user_professional_accreditations_details[0]->oral_madications) && ($user_info->user_professional_accreditations_details[0]->oral_madications == 1 ) && ($user_info->user_professional_accreditations_details[0]->injected_madications == 1 ) ){
											?>
													
													<a title="<?php echo($user_info['users_badge']->oral_injucted_badge == 0?'Check Knowledge of oral &  injected medication':'Uncheck Knowledge of oral & injected medication') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='oral_injucted_badge'.'/'.$target[$user_info['users_badge']->oral_injucted_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->oral_injucted_badge ==0?'-o':'') ?>"></span></a>
													
													<?php echo $this->requestAction('app/get-translate/'.base64_encode(' Knowledge of oral & injected medication'))." </br></br>"; 
											}else{
													echo "<em style='color:#789E42'>".$this->requestAction('app/get-translate/'.base64_encode('Knowledge of oral & injected medication fields not set'))."</em><br/>";
											}
											?>
											
											
											
											<?php if((!empty($user_info->user_sitter_house->fully_fenced)) && ( $user_info->user_sitter_house->fully_fenced == 'yes')){?>
													
													<a title="<?php echo($user_info['users_badge']->ffo_area_badge == 0?'Check Fully Fence Outdoor Area':'Uncheck  Fully Fence Outdoor Area') ?>" href="<?php echo HTTP_ROOT."users/update-field-status-row/".'UsersBadge'.'/'.base64_encode(convert_uuencode($user_info['users_badge']->id)).'/'.$fieldname='ffo_area_badge'.'/'.$target[$user_info['users_badge']->ffo_area_badge];?>" ><span class="fa fa-fw fa-check-square<?php echo( $user_info['users_badge']->ffo_area_badge ==0?'-o':'') ?>"></span></a>
													
											 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Fully Fence Outdoor Area'))."</br></br>"; 
											}else{
											
												echo "<em style='color:#FC6C2D'>".$this->requestAction('app/get-translate/'.base64_encode('Fully Fence Outdoor Area fields not set'))."</em><br/>";
											
											}?>
										<?php 
										}else{
											
												echo "<em style='color:#F8AC18'>".$this->requestAction('app/get-translate/'.base64_encode('Required fields not set'))."</em><br/>";
											
											}?>			 								  
									</td>
									<!--
									<td>
										<a title="Download Skill Documents" href="<?php echo HTTP_ROOT.'users/download-skill-documents'?>"> Download Skill Documents </a>
										
									</td>-->
								</tr>
							<?php $i++; 
							} 
							} else { ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="8" style=" text-align:center;"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('No Records Found')); ?> </td>
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

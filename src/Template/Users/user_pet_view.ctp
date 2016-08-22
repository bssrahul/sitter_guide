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
									document.myform.action =ajax_url+'admin/Users/all_manage/UserPets';
									document.myform.submit();
								}
							}
							else if($('#act').val()==2)
							{
								var result = confirm("Do you want to show records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Users/all_manage/UserPets';
									document.myform.submit();
								}
							}
							else if($('#act').val()==3)
							{
								var result = confirm("Do you want to hide records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Users/all_manage/UserPets';
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
					<h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pets Listing')); ?></h2>
					<div class="clearfix"></div>
				</div>
                 <?php echo $this->element("adminElements/success_msg"); ?>
				<div class="x_content table-responsive">
                        <table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th>
									 <!--<input type="checkbox" class="tableflat">-->
									 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sr. No.')); ?>
								</th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?> </th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Type')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Breed')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Gender')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Weight')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Ager')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Created')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Status')); ?></th>
								<th class="column-title no-link last"><span class="nobr">Action</span>
								</th>
							</tr>
						</thead>
                        <tbody>
						 <?php if(sizeof($user_pets_info) > 0) {
						    $i=1;
						 ?>
							<?php foreach($user_pets_info as $user_pet_info) { 
							//echo $user_pet_info->title;
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
							<tr class="<?php echo $class; ?>">
								<td class="a-center ">
							
								<!--<div class="icheckbox_flat-green" style="position: relative;">
								
								<input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;" />
								
								<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>--></td>
							    <td class="text-center">
									<div class="text-centerimage view-first customImg">
										<img alt="Image not found" class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/petImages/'.($user_pet_info->pet_image != ''?$user_pet_info->pet_image:'dummy.jpg'); ?>"/>
									</div>
								</td>
								<td class=" "><?php echo $user_pet_info->pet_name; ?></td>
								<td class=" "><?php 
											echo $user_pet_info->pet_type;
								?></td>
								<td class=" "><?php 
											echo $user_pet_info->pet_breed;
								?></td>
								<td class=" "><?php 
											echo $user_pet_info->pet_gender;
								?></td>
								<td class=" "><?php 
											echo $user_pet_info->pet_weight;
								?></td>
								<td class=" "><?php 
											echo $user_pet_info->pet_age;
								?></td>
								<td class=" "><?php 
											echo $user_pet_info->pet_description;
								?></td>
								<td class=" "><?php 
											echo $user_pet_info->date_added;
								?></td>
								 <td><?php echo $user_pet_info->status == 1?'Active':'Blocked';	?></td>
								<?php $target = ['0'=>'1','1'=>'0'];?>
								<td class=" last">
								
								   <a title="<?php echo($user_pet_info->status == 0? $this->requestAction('app/get-translate/'.base64_encode('Activate status')): $this->requestAction('app/get-translate/'.base64_encode('Deactivate Status'))) ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Users'.'/'.base64_encode(convert_uuencode($user_pet_info->id)).'/'.$target[$user_pet_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($user_pet_info->status ==0?'-o':'') ?>"></span></a>
								 
								  <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit')); ?>" href="<?php echo HTTP_ROOT."users/edit-user-pet/".(base64_encode(convert_uuencode($user_pet_info->id))).'/'.base64_encode(convert_uuencode($userId));?>"><span><i class="fa fa-pencil-square"></i></span></a>
								   
								   <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Delete')); ?>" href="<?php echo HTTP_ROOT."users/delete-row/".'Users'.'/'.base64_encode(convert_uuencode($user_pet_info->id));?>" onclick="if(!confirm('Are you sure to delete this User?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>
								</td>
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

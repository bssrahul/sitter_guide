<?php

	//$adminId=$this->Session->read('Admin.id');
	//$adminType=$this->Session->read('Admin.type');
?>
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
									document.myform.action =ajax_url+'admin/Category/all_manage/Categoies';
									document.myform.submit();
								}
							}
							else if($('#act').val()==2)
							{
								var result = confirm("Do you want to show records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Category/all_manage/Categoies';
									document.myform.submit();
								}
							}
							else if($('#act').val()==3)
							{
								var result = confirm("Do you want to hide records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Category/all_manage/Categories';
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
					<h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Partners Listing')); ?></h2><h2 style="float:right"> 
						<?php 
					$languageSession = $this->request->session();
					if($languageSession->read('requestedLanguage')=='en'){ ?>	
						<a style="float:right" href="<?php echo HTTP_ROOT.'partners/add-partner'; ?>"><button class="btn btn-success addUser" type="button"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Partner')); ?></button></a>
						<?php } ?>
						</h2>
				<div class="clearfix"></div>
				</div>
                <?= $this->element("adminElements/success_msg"); ?>
				
				<div class="x_content table-responsive">
                        <table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th class="text-center">
									 <!--<input type="checkbox" class="tableflat">-->
									 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sr.No.')); ?>
								</th>
								<th class="text-center column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?></th>
								<th class="text-center column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Short Description')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Long Description')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Status')); ?></th>
							   <th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Created')); ?></th>
								<th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Action')); ?></span>
								</th>
							</tr>
						</thead>
                        <tbody>
						 <?php if(sizeof(@$partners_info) > 0) {
						    $i=1;
							
						 ?>
							<?php foreach($partners_info as $partner_info) { 
							//echo $category_info->title;
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
							<tr class="<?php echo $class; ?>">
								<td class="text-center a-center ">
								
								<!--<div class="icheckbox_flat-green" style="position: relative;">
								
								<input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;">

								
								<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>-->
								</td>
								<td class="text-center">
									<div class="text-centerimage view-first customImg">
										<img alt="Image not found" class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/uploads/'.($partner_info->image != ''?$partner_info->image:'dummy.jpg'); ?>"/>
									</div>
								</td>
								
								<td class=" "><?php echo $partner_info->title; ?></td>
								<td class=" "><?php 
										echo $partner_info->short_description;
								?></td>
								<td class=" "><?php 
										echo $partner_info->description;
								?></td>
								
								 <td><?php echo $partner_info->status == 1?'Active':'Blocked';	?></td>
								 <td class=" "><?php 
										echo date("F j, Y", strtotime($partner_info->created_date));
								?></td>
								<?php $target = ['0'=>'1','1'=>'0'];?>
								
								<td class=" last">
								   <a title="<?php echo($partner_info->status == 0? $this->requestAction('app/get-translate/'.base64_encode('Activate status')): $this->requestAction('app/get-translate/'.base64_encode('Deactivate Status'))) ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Partners'.'/'.base64_encode(convert_uuencode($partner_info->id)).'/'.$target[$partner_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($partner_info->status ==0?'-o':'') ?>"></span></a>
								 
								  <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit')); ?>" href="<?php echo HTTP_ROOT."partners/edit-partner/".$partner_info->id;?>"><span><i class="fa fa-pencil-square"></i></span></a>
								   
								   <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Delete')); ?>" href="<?php echo HTTP_ROOT."users/delete-row/".'Partners'.'/'.base64_encode(convert_uuencode($partner_info->id));?>" onclick="if(!confirm('<?php echo $this->requestAction('app/get-translate/'.base64_encode('Are you sure to delete this record?')); ?>')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>
								</td>
							</tr>
							<?php $i++;
							} 
							} else { ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="7" style=" text-align:center;"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('No Records Found')); ?> </td>
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

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
									document.myform.action =ajax_url+'admin/Category/all_manage/Services';
									document.myform.submit();
								}
							}
							else if($('#act').val()==2)
							{
								var result = confirm("Do you want to show records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Category/all_manage/Services';
									document.myform.submit();
								}
							}
							else if($('#act').val()==3)
							{
								var result = confirm("Do you want to hide records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Category/all_manage/Services';
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
                   <h2> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Services')); ?></h2>
					<h2 style="float:right">
						<?php 
						$languageSession = $this->request->session();
						if($languageSession->read('requestedLanguage')=='en'){ ?>	
						<!--<a style="float:right" href="<?php echo HTTP_ROOT.'services/add-services'; ?>"><button class="btn btn-success addUser" type="button"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Services')); ?></button></a>-->
						<?php } ?>	
						</h2>
                    <div class="clearfix"></div>
				</div>
				
                   <?= $this->element("adminElements/success_msg"); ?>
				   <?= $this->element("adminElements/error_msg"); ?>
				   
				<div class="x_content table-responsive">
                        <table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th class="text-center">
									 <!--<input type="checkbox" class="tableflat">-->
									 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sr. No.')); ?>
								</th>
								<th style="text-align:center" class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?></th>
								<th style="text-align:left" class="text-center column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?></th>
								<th class="column-title" style="width:300px"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?></th> 
							    <th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Created')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Status')); ?></th>
								<th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Action')); ?></span>
								</th>
							</tr>
						</thead>
                        <tbody>
						 <?php if(sizeof($Services_info) > 0) {
						    $i=1;
							
						 ?>
							<?php foreach($Services_info as $services_info) { 
							
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
							<tr class="<?php echo $class; ?>">
								<td class="text-center a-center ">
								
								</td>
								<td class="text-center">
									<div class="text-centerimage view-first">
										<img alt="Image not found" class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/uploads/services/'.($services_info->image != ''?$services_info->image:'dummy.jpg'); ?>"/>
										
									</div>
								      
								</td>
								<td class=" "><?php echo $services_info->title; ?></td>
								<td class=" "><?php 
										echo $services_info->description;
								?></td>
								<td class=" "><?php 
										echo $services_info->created;
								?></td>
								 <td><?php echo $services_info->status == 1? $this->requestAction('app/get-translate/'.base64_encode('Active')): $this->requestAction('app/get-translate/'.base64_encode('Blocked'));	?></td>
								<?php $target = ['0'=>'1','1'=>'0'];?>
								<td class=" last">
								  <a title="<?php echo($services_info->status == 0? $this->requestAction('app/get-translate/'.base64_encode('Activate status')): $this->requestAction('app/get-translate/'.base64_encode('Deactivate Status'))) ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Services'.'/'.base64_encode(convert_uuencode($services_info->id)).'/'.$target[$services_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($services_info->status ==0?'-o':'') ?>"></span></a>
								
								  <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit')); ?>" href="<?php echo HTTP_ROOT."services/edit-services/".base64_encode(convert_uuencode($services_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a>
								  
								   <a title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Delete')); ?>" href="<?php echo HTTP_ROOT."users/delete-row/".'Services'.'/'.base64_encode(convert_uuencode($services_info->id));?>" onclick="if(!confirm('Are you sure to delete this record?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>
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

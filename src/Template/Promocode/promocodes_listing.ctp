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
									document.myform.action =ajax_url+'admin/Promocode/all_manage/PromoCodes';
									document.myform.submit();
								}
							}
							else if($('#act').val()==2)
							{
								var result = confirm("Do you want to show records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Promocode/all_manage/PromoCodes';
									document.myform.submit();
								}
							}
							else if($('#act').val()==3)
							{
								var result = confirm("Do you want to hide records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Promocode/all_manage/PromoCodes';
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
					<h2> Promo code Listing</h2><h2 style="float:right"> <a style="float:right" href="<?php echo HTTP_ROOT.'promocode/add-promocode'; ?>"><button class="btn btn-success addUser" type="button">Add Promo code</button></a></h2>
					<div class="clearfix"></div>
				</div>
				<?= $this->element('adminElements/validations'); ?>
                  <?= $this->element("adminElements/success_msg"); ?>
				  <?= $this->element("adminElements/error_msg"); ?>
				  
				<div class="x_content table-responsive">
                        <table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th>
									 <!--<input type="checkbox" class="tableflat">-->
									 Sr.No.
								</th>
								<th class="column-title">Codes</th>
								<th class="column-title">Type</th>
								<th class="column-title">Discount</th> 
								<th class="column-title">Start</th>
								<th class="column-title">Expire</th>
								<th class="column-title">Description</th>
								<th class="column-title">Status</th>
								<th class="column-title no-link last"><span class="nobr">Action</span>
								</th>
							</tr>
						</thead>
                        <tbody>
						 <?php if(sizeof($promocodes_info) > 0) {
						    $i=1;
						 ?>
							<?php foreach($promocodes_info as $promocode_info) { 
							//echo $promocode_info->title;
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
							<tr class="<?php echo $class; ?>">
								<td class="a-center ">
								
								<!--<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>--></td>
								<td class=" "><?php echo $promocode_info->promo_code; ?></td>
								<td class=" "><?php 
										echo $promocode_info->discounted_coupon != '' ?'Discounted Coupon':'Fixed Coupon';
								?></td>
								<td class=" ">

								<?php echo $promocode_info->discounted_coupon != ''?($promocode_info->discounted_coupon).'%':($promocode_info->fixed_coupon).'$'; ?> </td>



								<td class=" "><?php echo date("F j, Y", strtotime($promocode_info->start_date));?></td>
								<td class=" "><?php echo date("F j, Y", strtotime($promocode_info->expire_date));?></td>
								
								<td class=" "><?php 
										echo $promocode_info->description;
								?></td>
								
								 <td><?php echo $promocode_info->status == 1?'Active':'Inactive';	?></td>
								<?php $target = ['0'=>'1','1'=>'0'];?>
								<td class=" last">
								   <a title="<?php echo($promocode_info->status == 0?'Activate status':'Deactivate Status') ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'PromoCodes'.'/'.base64_encode(convert_uuencode($promocode_info->id)).'/'.$target[$promocode_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($promocode_info->status ==0?'-o':'') ?>"></span></a>
								 
								  <a title="Edit" href="<?php echo HTTP_ROOT."Promocode/edit-Promocode/".base64_encode(convert_uuencode($promocode_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a>
								   
								   <a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'PromoCodes'.'/'.base64_encode(convert_uuencode($promocode_info->id));?>" onclick="if(!confirm('Are you sure to delete this record?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>
								</td>
							</tr>
							<?php $i++; 
							} 
							} else { ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="10" style=" text-align:center;"> No records found </td>
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

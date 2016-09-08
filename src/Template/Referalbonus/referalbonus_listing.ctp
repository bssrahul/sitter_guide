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
					<h2> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Referal Bonus Listing')); ?></h2><h2 style="float:right"> 
						<?php 
					$languageSession = $this->request->session();
					if($languageSession->read('requestedLanguage')=='en'){ ?>	
						<!--<form action="<?php echo HTTP_ROOT.'referalbonus/transfer'; ?>" method="post">
						<input type="checkbox" class="chkbox" checked name="singlecheck[]" value="ghjghjgj" >
						<a style="float:right" href="<?php echo HTTP_ROOT.'referalbonus/transfer'; ?>"><button class="btn btn-success addUser" id="trans" type="button"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Transfer')); ?></button>
					
						</a>-->
						
						<?php } ?>
						</h2>
					<div class="clearfix"></div>
				</div>
				<?= $this->element('adminElements/validations'); ?>
                  <?= $this->element("adminElements/success_msg"); ?>
				  <?= $this->element("adminElements/error_msg"); ?>
				   <form id="transferAmt" action="<?php echo HTTP_ROOT.'referalbonus/transfer'; ?>" method="post">
				<div class="x_content table-responsive">
                       
						<table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th>
									<input type="checkbox" class=""  id="all"  />
								
								</th>
								<th>
									 <!--<input type="checkbox" class="tableflat">-->
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sr. No.')); ?>
								</th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name')); ?></th>
								<th class="column-title" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Amount')); ?></th> 
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Status')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Created Date')); ?></th> 
								<!--th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Action')); ?></span>-->
								</th>
							</tr>
						</thead>
                        <tbody>
						
						 <?php if(sizeof($UserReferWalletsData) > 0) {
						    $i=1;
						 ?>
							<?php foreach($UserReferWalletsData as $k=>$UserReferWalletsInfo) { 
							
							//echo $UserReferWalletsInfo->title;
							//echo"<pre>"; print_r($UserReferWalletsData);die;		
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
							<tr class="<?php echo $class; ?>">
								
									
								<th>
								   <input type="checkbox"  class="chkbox" name="singlecheck[]" value="<?php echo $UserReferWalletsInfo->user_id; ?>" >
								</th>
								<td class="a-center ">
									<?php echo $i;?>
								</td>
								<td class=" "><?php echo $UserReferWalletsInfo->user->first_name ."  ".$UserReferWalletsInfo->user->last_name ; ?></td>
								<td class=" "><?php echo $UserReferWalletsInfo->user->email ; ?></td>
								<td class=" "><?php 
										echo $UserReferWalletsInfo->amount;
								?></td>
								<td class=" ">
										<?php if($UserReferWalletsInfo->status == 'Pending'){
											echo "<span style='color:red; font-weight:bold;'>".$UserReferWalletsInfo->status."</span>" ;
										}else{
											echo "<span style='color:green;font-weight:bold;'>".$UserReferWalletsInfo->status."</span>" ;
										}
										?>
								</td>
								<td class=" "><?php echo date("F j, Y", strtotime($UserReferWalletsInfo->created_date));?></td>
								
							</tr>
							
							<?php $i++; 
							
							}  } else { ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="10" style=" text-align:center;"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('No Records Found')); ?> </td>
								</tr>
							<?php } ?>
							<input type="submit" name="sub" id="sub" value="Transfer" class="btn btn-success addUser" style="float:right">
							
						</tbody>
					</table>
					
				</div>
				</form>
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

<script>


$(document).ready(function(){
	
	
	
    $('#all').on('click',function() {
		if($(this).is(':checked')) 
		{
			$('.chkbox').prop('checked', true);}
        else 
		{
			$('.chkbox').prop('checked', false);
		}
		
	});
      
	$('#sub').click(function(){
		//alert("hello");
		$("#transferAmt").submit();
        /*var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
		  
        });*/
      });

	
});

</script>

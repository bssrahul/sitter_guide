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
									document.myform.action =ajax_url+'admin/Currency/all_manage/Currencies';
									document.myform.submit();
								}
							}
							else if($('#act').val()==2)
							{
								var result = confirm("Do you want to show records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Currency/all_manage/Currencies';
									document.myform.submit();
								}
							}
							else if($('#act').val()==3)
							{
								var result = confirm("Do you want to hide records?");
								if(result) {
									document.myform.action =ajax_url+'admin/Currency/all_manage/Currencies';
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
					<h2> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Currencies Listing')); ?></h2>
					<div class="clearfix"></div>
				</div>
				<?= $this->element("adminElements/success_msg"); ?>
                <div class="x_content table-responsive">
                    <!--<a style="float:right" href="<?php echo HTTP_ROOT.'currency/add-currency'; ?>"><button class="btn btn-success addUser" type="button">Add Currency</button></a>-->
					<div class="clearfix"></div>
					    <?php 
						   echo $this->Form->create(null,[
							'url' => ['controller' => 'currency', 'action' => 'update-currencies'],
							'id'=>'updatecurrencies',
							'enctype'=>'multipart/form-data']);
						?>
						
                    
					<table id="example" class="table table-bordered responsive-utilities jambo_table">
				
						<thead>
							<tr class="headings">
								<th class="text-center">
									 <!--<input type="checkbox" class="tableflat">-->
									 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sr. No.')); ?>
								</th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Country Name')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Currency Name')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Locale')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Currency Code')); ?></th> 
							    <th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Price')); ?></th>
								<th class="column-title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Status')); ?></th>
							    <th class="column-title no-link last"><span class="nobr"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Action')); ?></span>
								</th>
							</tr>
						</thead>
                        <tbody>
						 <?php if(sizeof($currencies_info) > 0) {
						    $i=1;
						 ?>
							<?php foreach($currencies_info as $currency_info){ 
							//echo $currency_info->title;
								if($i%2==0){$class="even pointer";}else{$class="odd pointer";}
							?>
							<tr class="<?php echo $class; ?>">
								<td class="text-center a-center ">
								<!--<div class="icheckbox_flat-green" style="position: relative;">
								
								<input type="checkbox" name="table_records" class="flat" style="position: absolute; opacity: 0;">

								
								<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>-->
								</td>
								<td class=" "><?php echo $currency_info->country_name; ?></td>
								<td class=" "><?php echo $currency_info->currency_name; ?></td>
								<td class=" "><?php 
										echo $currency_info->locale;
								?></td>
								<td class=" "><?php 
										echo $currency_info->currency;
								?></td>
								<td class=" ">
									  <input type='text'  name='Currencies[<?php echo$currency_info->id; ?>][price][]' value="<?php echo $currency_info->price; ?>" />
								</td>
								 <td><?php echo $currency_info->status == 1? $this->requestAction('app/get-translate/'.base64_encode('Active')): $this->requestAction('app/get-translate/'.base64_encode('Blocked'));	?></td>
								<?php $target = ['0'=>'1','1'=>'0'];?>
								<td class=" last">
								   <a title="<?php echo($currency_info->status == 0? $this->requestAction('app/get-translate/'.base64_encode('Activate status')) : $this->requestAction('app/get-translate/'.base64_encode('Deactivate Status'))) ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'Currencies'.'/'.base64_encode(convert_uuencode($currency_info->id)).'/'.$target[$currency_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($currency_info->status ==0?'-o':'') ?>"></span></a>
								 
								   <!--<a title="Edit" href="<?php echo HTTP_ROOT."category/edit-currency/".base64_encode(convert_uuencode($currency_info->id));?>"><span><i class="fa fa-pencil-square"></i></span></a>-->
								   
								  <!-- <a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'Currencies'.'/'.base64_encode(convert_uuencode($currency_info->id));?>" onclick="if(!confirm('Are you sure to delete this record?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>-->
								</td>
							</tr>
							<?php $i++;
							}
                            }else{ ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="8" style=" text-align:center;"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('No Records Found')); ?></td>
								</tr>
							<?php } ?>
							
						</tbody>
					</table>
					<?php echo $this->form->end(); ?>
				</div>
			</div>
			<div class="row">
				<?php // echo $this->element('adminElements/new_paginator'); ?>	
			</div>
			<div id="pager" style="float:left; width:97%; padding-left:7px;">
			
			
			<div class="form-group" >
				<div class="col-md-6 col-md-offset-3">
					<button  style="float:right" id="submitButton" type="submit" class="btn btn-success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
				</div>
			</div>
			
			</div>
		</div>
	</div>
</div>	

<!-- Datatables -->
		<?php echo $this->Html->script(['datatables/js/jquery.dataTables.js','datatables/tools/js/dataTables.tableTools.js']); ?>
		
       
        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
				
				/*$('#updatecurrencies').submit(function (e){
				
					e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				});*/
						$("#submitButton").click(function(){
						    $("#updatecurrencies" ).submit();
						});
                });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
					"fnRowCallback" : function(nRow, aData, iDisplayIndex){
						$("td:first", nRow).html(iDisplayIndex +1);
					   return nRow;
					},
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
					],
                    'iDisplayLength': 10,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo HTTP_ROOT.'webroot/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'; ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
		<style>
		.catImg{
			height:75px;
			width:60% !important;
		}
		.img-circle.profile_img {
			background: #fff none repeat scroll 0 0;
			border: 1px solid rgba(52, 73, 94, 0.44);
			margin-left: 0px !important;
			margin-top: 0px !important;
			position: inherit;
			z-index: 1000;
		}
		.paging_full_numbers {
			height: 50px !important;
			line-height: 22px;
			width: 400px;
		}
		</style>
		

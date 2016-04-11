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
					<h2>How Works Listing</h2><!--<h2 style="float:right"> <a style="float:right" href="<?php echo HTTP_ROOT.'cmspages/add-works'; ?>"><button class="btn btn-success addUser" type="button">Add Work</button></a></h2>-->
				<div class="clearfix"></div>
				</div>
                <?= $this->element("adminElements/success_msg"); ?>
				
				<div class="x_content table-responsive">
                        <table id="example" class="table table-bordered responsive-utilities jambo_table">
						<thead>
							<tr class="headings">
								<th class="text-center">
									 <!--<input type="checkbox" class="tableflat">-->
									 Sr.No.
								</th>
								<th class="text-center column-title">Image</th>
								<!--<th class="column-title"><?php echo $this->Paginator->sort('Howitworks.category', 'Category')?> </th>-->
								<th class="column-title">Title</th>
								<th class="column-title">Description</th> 
							   <th class="column-title">Howitworks.status</th>
							   <th class="column-title">Created</th>
								<th class="column-title no-link last"><span class="nobr">Action</span>
								</th>
							</tr>
						</thead>
                        <tbody>
						 <?php if(sizeof(@$works_info) > 0) {
						    $i=1;
							
						 ?>
							<?php foreach($works_info as $work_info) { 
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
										<img alt="Image not found" class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/uploads/'.($work_info->image != ''?$work_info->image:'dummy.jpg'); ?>"/>
									</div>
								</td>
								<!--<td class=" "><?php 
							echo strtoupper(str_replace("_"," ",$work_info->category));
								?></td>-->
								<td class=" "><?php echo $work_info->title; ?></td>
								
								<td class=" "><?php 
										echo $work_info->description;
								?></td>
								
								 <td><?php echo $work_info->status == 1?'Active':'Inactive';	?></td>
								 <td class=" "><?php 
										echo date("F  j,Y",strtotime($work_info->created_date));
								?></td>
								<?php $target = ['0'=>'1','1'=>'0'];?>
								<td class=" last">
								   <a title="<?php echo($work_info->status == 0?'Activate status':'Deactivate Status') ?>" href="<?php echo HTTP_ROOT."users/update-status-row/".'HowWorks'.'/'.base64_encode(convert_uuencode($work_info->id)).'/'.$target[$work_info->status];?>" ><span class="fa fa-fw fa-check-square<?php echo($work_info->status ==0?'-o':'') ?>"></span></a>
								 
								  <a title="Edit" href="<?php echo HTTP_ROOT."cmspages/edit-works/".$work_info->id;?>"><span><i class="fa fa-pencil-square"></i></span></a>
								   
								   <!--<a title="Delete" href="<?php echo HTTP_ROOT."users/delete-row/".'HowWorks'.'/'.base64_encode(convert_uuencode($work_info->id));?>" onclick="if(!confirm('Are you sure to delete this User?')){return false;}" ><span class="fa fa-fw fa-trash-o"></span></a>-->
								</td>
							</tr>
							<?php $i++;
							} 
							} else { ?>
								<tr class="even pointer">
									<td class="noRecords" colspan="7" style=" text-align:center;"> No records found </td>
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
		<?php echo $this->Html->script(['datatables/js/jquery.dataTables.js','datatables/tools/js/dataTables.tableTools.js']); ?>
		
       
        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
					"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

						var numStart = 0;

						var index = numStart +  iDisplayIndexFull + 1;
						$("td:first", nRow).html(index);
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
		.text-centerimage img {
			width: 75px !important;
		}
		</style>
		

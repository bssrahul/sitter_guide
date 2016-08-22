<?php 
  echo $this->Html->css(['Front/jquery-ui.css']); 
  echo $this->Html->script(['Front/jquery-ui.js']);
?>

<div class="col-md-9 col-lg-10 col-sm-8  lg-width80" id="content">
	  <div class="cal-wrap">
        <div class="row">
          <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading title-panel"> <span class="title-panel1"><i><img src="<?php echo HTTP_ROOT."img/i-recent.png" ?>" alt="recent"></i>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Recent Activities')); ?>  </span><span class="pull-right"><a href="#"><img src="<?php echo HTTP_ROOT."img/plus.png" ?>" ></a></span> </div>             
                  <div class="col-xs-12 recent-activity-table">
                  <table class="table table-hover">
                  <thead>
                    <tr class="table-row-heading">
                      <th><?php echo $this->requestAction('app/get-translate/'.base64_encode('Activity')); ?></th>
                      <th><?php echo $this->requestAction('app/get-translate/'.base64_encode('User Name')); ?></th>
                      <th><?php echo $this->requestAction('app/get-translate/'.base64_encode('User ID')); ?></th>
                      <th><?php echo $this->requestAction('app/get-translate/'.base64_encode('Notes')); ?></th>
                      <th><?php echo $this->requestAction('app/get-translate/'.base64_encode('Time')); ?></th>
                    </tr>
                  </thead>
                  <tbody class="table-row-text">
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-green.png" ?>" width="11" height="11" alt="green"></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Lorem Ipsum')); ?>  </td>
                      <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name')); ?> </td>
                      <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Mr John Deo')); ?></td>
                      <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Lorem Ipsum  dummy text')); ?></td>
                      <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('15.30  -  06/10/15')); ?> </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-red.png" ?>" width="11" height="11" alt="green"></span> Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-orange.png"?>" width="11" height="11" alt="green"></span>   Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    
                     <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-yellow.png" ?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                   
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="clearfix">
            <div style="margin:10px 0;"></div></div>
            <div class="panel panel-default clearfix">
              <div class="panel-heading title-panel"> <span class="title-panel1"><i><img src="<?php echo HTTP_ROOT."img/i-recent.png" ?>"  alt="recent"></i>&nbsp; Recent Activities </span><span class="pull-right"><a href="#"><img src="<?php echo HTTP_ROOT."img/plus.png" ?>" ></a></span> </div>
            <div class="col-xs-12 recent-activity-table1">
                <table class="table table-hover">
                  <thead>
                    <tr class="table-row-heading">
                      <th>Activity</th>
                      <th>User Name</th>
                      <th>User ID</th>
                      <th>Notes</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody class="table-row-text">
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-green.png" ?>" width="11" height="11" alt="green"></span> Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-red.png" ?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-orange.png"?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                    
                     <tr>
                      <td scope="row"><span class="table-image-pad"><img src="<?php echo HTTP_ROOT."img/t-yellow.png" ?>" width="11" height="11" alt="green"></span>  Lorem Ipsum </td>
                      <td>Name </td>
                      <td>Mr John Deo</td>
                      <td>Lorem Ipsum  dummy text</td>
                      <td>15.30  -  06/10/15 </td>
                    </tr>
                  
                  </tbody>
                </table>
              </div> </div>
          </div>
          <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading title-panel">
			       <span class="title-panel1"><i><img src="<?php echo HTTP_ROOT."img/i-cal.png" ?>"  alt="calender"></i>&nbsp; Calender </span>
			     <span class="pull-right"><a href="#"><img src="<?php echo HTTP_ROOT."img/plus.png" ?>" ></a></span>
			  </div>
              <!--Calendar Box Start-->
			
			<div id="myCalender"><?php echo $this->element('frontElements/profile/calender');?></div>
			
			  <!--Calendar Box End  -->		  
			 
			  </div>
           
          </div>
        </div>
      </div>
	  </div>
	  
	  
  <div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
    <div class="modal-dialog">
       <div class="sitter-quike-view">
         	<div class="sqv-box">
            	<div class="top-close"> 
                <p class="pop-top-pop"><?php  echo $this->requestAction('app/get-translate/'.base64_encode('Edit Availability')); ?></p>
                	<a data-dismiss="modal" title="Close" href="#"><i aria-hidden="true" class="fa fa-times"></i></a>           
                </div>    
                
                
                <!--Additional Services-->          
                	<div class="additional-services">  
                    	  <div class="modal-body">
                               <?php echo $this->Form->create(null,['id'=>'SetAvailablity','enctype'=>'multipart/form-data','url'=>['controller'=>'dashboard','action'=>'set-limit']]); ?>
							
							
								<div class="form-group col-lg-6 col-md-6">
								<label for="start_date"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Started Date ')); ?></label>
									  <?php  
										  echo $this->Form->input('start_date',[               
										  'class'=>'form-control start_date_picker from',
										  'label'=>false,
										  'id'=>'start_date',
										  'readonly' => 'readonly',
										   'templates' => ['inputContainer' => '{{content}}'],
										  'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('DD/MM/YYYY')), 
										  ]);
									  ?> 
								</div>
								<div class="form-group col-lg-6 col-md-6">
								<label for='end_date'><?php echo $this->requestAction('app/get-translate/'.base64_encode('End Date')); ?></label>
									  <?php  
										  echo $this->Form->input('end_date',[               
										  'class'=>'form-control end_date_picker to',
										  'label'=>false,
										  'id'=>'end_date',
										  'readonly' => 'readonly',
										  'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('DD/MM/YYYY')), 
										  ]);
									  ?> 
								</div>
								
								<div class="form-group col-lg-6 col-md-6">
										<label for="day_care"><?php echo $this->requestAction('app/get-translate/'.base64_encode(' Day Care P/day Limit ')); ?></label>
								</div>
								
								<div class="input-group ">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="day_care">
											  <span class="glyphicon glyphicon-minus"></span>
										  </button>
									  </span>
									  <input type="text" name="day_care" class="form-control input-number" value="1" id="day_care">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="day_care">
											  <span class="glyphicon glyphicon-plus"></span>
										  </button>
									  </span>
								</div>
								<div class="form-group col-lg-6 col-md-6">
										<label for="night_care"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Night Care P/day Limit ')); ?></label>
								</div>
								
								<div class="input-group ">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="night_care">
											  <span class="glyphicon glyphicon-minus"></span>
										  </button>
									  </span>
									  <input type="text" name="night_care" class="form-control input-number" value="1" id="night_care1">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="night_care">
											  <span class="glyphicon glyphicon-plus"></span>
										  </button>
									  </span>
								</div>
								<div class="form-group col-lg-6 col-md-6">
										<label for="visit"><?php echo $this->requestAction('app/get-translate/'.base64_encode(' Visits P/day Limit')); ?></label>
								</div>
								
								<div class="input-group ">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="visit">
											  <span class="glyphicon glyphicon-minus"></span>
										  </button>
									  </span>
									  <input type="text" name="visit" class="form-control input-number" value="1"  id="visit1">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="visit">
											  <span class="glyphicon glyphicon-plus"></span>
										  </button>
									  </span>
								</div>
								<div class="form-group col-lg-6 col-md-6">
										<label for="market_place"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place P/Day Limit ')); ?></label>
								</div>
								
								<div class="input-group ">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="market_place">
											  <span class="glyphicon glyphicon-minus"></span>
										  </button>
									  </span>
									  <input type="text" name="market_place" class="form-control input-number" value="1" id="market_place">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="market_place">
											  <span class="glyphicon glyphicon-plus"></span>
										  </button>
									  </span>
								</div>
                    
								
								
								
								<!-- <div class="form-group col-lg-6 col-md-6">
										<input type="checkbox" name="alldate" id="check_all_date"/>
										<label for="calendar['end_date']"><?php //echo $this->requestAction('app/get-translate/'.base64_encode('End Date ')); ?></label>
								</div> -- >
                    <div id='preview-avatar-profile'>
                    </div>
                <!--<div id="thumbs" style="padding:5px; width:600"></div>-->
              
             
            </div>
			</br></br></br>
                 <div class="modal-footer">
				  <button type="submit" id="btn-save" class="btn btn-danger  unavailable" name="unavailable" > <?php echo $this->requestAction('app/get-translate/'.base64_encode('Mark as unavailable')); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Close')); ?></button>
                <button type="button" id="saveLimitSeat" class="btn btn-crop" name="saveLimitSeat" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Save')); ?></button>
            </div>        
                 <?php echo $this->Form->end(); ?>          
                                           	
                    </div> 
                <!--Additional Services-->           
                
            </div>         	
         </div>  
    </div>
  </div>

    <!--model box -->
	  
	  
	  
	<?php echo $this->Html->css('Front/dist/jquery.onoff.css');
		echo $this->Html->script(['Front/dist/jquery.onoff.js']);
?>
<script>
	function show_date_picker_on_start_date(){

		$('#start_date').datepicker(
		{ 
				
			dateFormat: 'yy-mm-dd',
			defaultDate:"",
			beforeShow: function() {
				$(this).datepicker('option', 'maxDate', $('#to').val());
			}
		});
		
		$('#end_date').datepicker(
		{
				dateFormat: 'yy-mm-dd',
				defaultDate: "+1w",
				beforeShow: function() {
					$(this).datepicker('option', 'minDate', $('#start_date').val());
					if ($('#start_date').val() === '') $(this).datepicker('option', 'minDate', 0);                             
				}
		});

	
	}

	/*For on-off button*/
    $(function(){
          $('input[type=checkbox]').onoff();
    });
    /*End of-off button*/
	
	$(document).on('click', '.selectedCheckbox', function(){
           
		$(this).parent().parent().toggleClass("selected");
		var selected_check = $(this).parent().parent().hasClass('selected');
			
		if(selected_check == false){
			
			//$(this).parent().parent().parent().addClass("disable");
			var id=$(this).prop('id');
			var current_start_date=$(this).attr('data-rel');
			//var id2 = $('#limit_data3').children().children().attr('data-rel');
			var day_care= $("#limit_data3 li:nth-child(1)").attr('data-rel');
			var night_care= $("#limit_data3 li:nth-child(2)").attr('data-rel');
			var visit= $("#limit_data3 li:nth-child(3)").attr('data-rel');
			var market_place= $("#limit_data3 li:nth-child(4)").attr('data-rel');
			//alert(day_care+night_care+visit+market_place);
			$('#day_care').val(day_care);
			$('#night_care1').val(night_care);
			$('#visit1').val(visit);
			$('#market_place').val(market_place);
			$('#myModal21').modal('show');
			$('#start_date').val(current_start_date);
			$('#end_date').val(current_start_date);
			$("#start_date").readOnly = true;
			$("#end_date").readOnly = true;
					
			setTimeout(show_date_picker_on_start_date, 1000);
		
		}else{
			$(this).parent().parent().parent().removeClass("disable");
			$('#myModal21').modal('hide');
			
		}
	});
 
	//plus minus
	$( document ).ready(function() {
		$('.btn-number').click(function(e){
			e.preventDefault();
			
			var fieldName = $(this).attr('data-field');
			var type      = $(this).attr('data-type');
			
			var input = $("input[name='"+fieldName+"']");
		
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				if(type == 'minus') {
					var minValue = parseInt(input.attr('min')); 
					if(!minValue) minValue = 0;
					if(currentVal > minValue) {
						input.val(currentVal - 1).change();
					} 
					if(parseInt(input.val()) == minValue) {
						$(this).attr('disabled', true);
					}
		
				} else if(type == 'plus') {
					var maxValue = parseInt(input.attr('max'));
					if(!maxValue) maxValue = 999;
					if(currentVal < maxValue) {
						input.val(currentVal + 1).change();
					}
					if(parseInt(input.val()) == maxValue) {
						$(this).attr('disabled', true);
					}
		
				}
			} else {
				input.val(0);
			}
		});
		$('.input-number').focusin(function(){
		   $(this).data('oldValue', $(this).val());
		});
		$('.input-number').change(function() {
			
			var minValue =  parseInt($(this).attr('min'));
			var maxValue =  parseInt($(this).attr('max'));
			if(!minValue) minValue = 0;
			if(!maxValue) maxValue = 999;
			var valueCurrent = parseInt($(this).val());
			
			var name = $(this).attr('name');
			if(valueCurrent >= minValue) {
				$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
			} else {
				alert('Sorry, the minimum value was reached');
				$(this).val($(this).data('oldValue'));
			}
			if(valueCurrent <= maxValue) {
				$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
			} else {
				alert('Sorry, the maximum value was reached');
				$(this).val($(this).data('oldValue'));
			}
			
			
		});
		$(".input-number").keydown(function (e) {
				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
					 // Allow: Ctrl+A
					(e.keyCode == 65 && e.ctrlKey === true) || 
					 // Allow: home, end, left, right
					(e.keyCode >= 35 && e.keyCode <= 39)) {
						 // let it happen, don't do anything
						 return;
				}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
		});

		$("#start_date").click(function(){ 
		
		  $("#start_date").focus();
		});
		
		$("#end_date").click(function(){ 
		
			$("#end_date").focus();
		});
	   /*End date picker*/
	   //for hide past dates
		
	   
	});
  
</script>
<style>
.disable {
	background: #ccc none repeat scroll 0 0 !important;
}
.center{
	width: 150px;
	margin: 40px auto;
  
}
.btn-number{
	height:35px !important;
	width:35px !important;
}
.input-group {
	width:130px;
	text-align:center;
	padding-left:5px;
	margin-top:5px;

}

#ui-datepicker-div
{
	z-index: 9999999 !important;
}
.unavailable{
	
	float:left;
}
.not_display {
    display: none;
}
.content_disable{
    color:#afafaf  !important;
}
.onoff_hideClass{
	 display: none;
}
</style>

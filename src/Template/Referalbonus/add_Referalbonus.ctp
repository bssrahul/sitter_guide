<?php 
	echo $this->Html->css(['Front/jquery-ui.css']); 
	echo $this->Html->script(['Front/jquery-ui.js']);
?>
<div class="">
                   <div class="row">
					 <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Promo Code')); ?><small></small></h2>
									<div class="clearfix"></div>
							    </div>
								<div class="x_content">
							
							
                                    <?php echo $this->Form->create($promocode, [
										'url' => ['controller' => 'promocode', 'action' => 'add-promocode'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'addpromocode',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										'autocomplete' =>'off',
										
									]);?>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="promo_code"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Promo Code')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
										<?php 
										 echo $this->Form->input('PromoCodes.promo_code',[
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12']);
										 ?>
										 </div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon_type"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Coupon Type')); ?><span class="required">*</span>
										</label>
										<div class='col-md-6 col-sm-6 col-xs-12'>
										 <?php echo $this->Form->input(
												'PromoCodes.coupon_type',[
												"type"=>"select",
												'label' => false,
												"options"=>['discounted_coupon'=>"Discounted Coupon",'fixed_coupon'=>"Fixed Coupon"],
												'class'=>'form-control col-md-7 col-xs-12','id'=>'c_type'
												]);?>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount_rate"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Discount Rate/Fixed')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-11">
										<?php 
										echo $this->Form->input('PromoCodes.discounted_coupon',[
												'label' => false,
												"type"=>"text",
												'class'=>'form-control col-md-7 col-xs-12 discounted_coupon'
												]);
										 
										
										 echo $this->Form->input('PromoCodes.fixed_coupon',[
												'label' => false,
												"type"=>"text",
												'class'=>'form-control col-md-7 col-xs-12 fixed_coupon ct'
											]);
										 ?>
										 </div>
										 <span class="discounted_coupon" >%</span>
										 <span class="fixed_coupon" >$</span>
									</div>
									
									<div class="item form-group dobDiv">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Start Date')); ?><span class="required">*</span>
										</label>
										<?php 
										
										echo $this->Form->input('PromoCodes.start_date',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'readonly' => true,
												'type' => "text",
												'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('YYYY-MM-DD')), 
												'class'=>'form-control col-md-7 col-xs-12',
												]);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="expire_date"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Expire Date')); ?><span class="required">*</span>
										</label>
										<?php 
										
										echo $this->Form->input('PromoCodes.expire_date',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'readonly' => true,
												'type' => "text",
												'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('YYYY-MM-DD')), 
												'class'=>'form-control col-md-7 col-xs-12',
												]);
										 ?>
									</div>
									<!--
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date<span class="required">*</span>
										</label>
										<div class='col-md-6 col-sm-6 col-xs-12'>
										<?php 
										echo $this->Form->input('PromoCodes.start_date',[
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12']);
										 ?>
										 </div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="expire_date">Expire Date<span class="required">*</span>
										</label>
										<div class='col-md-6 col-sm-6 col-xs-12'>
										<?php 
										echo $this->Form->input('PromoCodes.expire_date',[
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12']);
										 ?>
										</div>
									</div>
									-->
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->input('PromoCodes.description',
											 ['type' => "textarea",
											 'label' => false,
											 'class'=>'form-control col-md-7' ]);?>
										</div>
									</div>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
											<input id="send" type="submit" class="btn btn-success" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?>">
										</div>
									</div>
                                    <?php echo $this->form->end(); ?>
                                <!-- end form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<style>
				.ct{
				display:none;
				}
                </style>			
		 <script>
		
		 $(document).ready(function(){
		 
		        $(".fixed_coupon").hide();
		        $( ".fixed_coupon" ).prop( "disabled", true );
				$( "#c_type" ).change(function() {
					
					$(".error").html('');
					 var couponval = $(this).val();
					 //alert(couponval);
					 if(couponval == 'discounted_coupon'){
					 	$(".fixed_coupon").hide();
					 	$( ".fixed_coupon" ).prop( "disabled", true );

                        $(".discounted_coupon").show();
                        $( ".discounted_coupon" ).prop( "disabled",false );
					 }else{
					 	$(".discounted_coupon").hide();
					 	$( ".discounted_coupon" ).prop( "disabled", true );

					 	$(".fixed_coupon").show();
					 	$( ".fixed_coupon" ).prop( "disabled",false );
					 }
				});
				
				/*$('#addpromocode').submit(function (e) {
				
					e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				});
 */
		 
		    
		       //Add date picker
			 /* $('#promocodes-start-date').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4",
				format: 'YYYY-MM-DD'
				}, function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
		       $('#promocodes-expire-date').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4",
				format: 'YYYY-MM-DD'
				}, function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});*/
                 $("#promocodes-start-date").datepicker(
			           {
					     changeMonth: true,
					     changeYear: true,
					     dateFormat: 'yy-mm-dd',
						   onClose: function( selectedDate ) {
	                      $( "#promocodes-expire-date" ).datepicker( "option", "minDate", selectedDate );
	                      }
					   }
					);
				$(".fa-calendar").click(function(){ $("#promocodes-start-date").focus();});
	            $("#promocodes-expire-date").datepicker(
			           {
					     changeMonth: true,
					     changeYear: true,
					     dateFormat: 'yy-mm-dd',
					           onClose: function( selectedDate ) {
                       $( "#promocodes-start-date" ).datepicker( "option", "maxDate", selectedDate );
                         }
					   }
					);
				$(".fa-calendar").click(function(){ $("#promocodes-expire-date").focus();});
				//Submit form
				$('#editcategory').submit(function (e) {
				    e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				});

				
	});
	</script>

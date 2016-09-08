<?php 
	echo $this->Html->css(['Front/jquery-ui.css']); 
	echo $this->Html->script(['Front/jquery-ui.js']);
?>
<div class="">
                   <div class="row">
					
					 <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit Promo Code')); ?><small></small></h2>
									<div class="clearfix"></div>
							    </div>
							
					
							 <div class="x_content">
								<?= $this->element('adminElements/validations'); ?>
								<!--Form edit user -->
							        <?php echo $this->Form->create(null,[
										'url' => ['controller' => 'promocode', 'action' => 'edit-promocode'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'addpromocode',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										'autocomplete' =>'off',
									]);?>
									<?php 
									 //$promocodeId = base64_encode(convert_uuencode($promocodeInfo->id));
									  echo $this->Form->input('PromoCodes.id',[
											'type'=>'hidden',
											'value'=>$promocodeInfo->id]);?>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="promo_code"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Promo Code')); ?> <span class="required">*</span>
										</label>
									  <?php 
										 echo $this->Form->input('PromoCodes.promo_code',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$promocodeInfo->promo_code != '' ?$promocodeInfo->promo_code:'']);
										 ?>
									</div>
									<!--<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon_type">Coupon Type<span class="required">*</span>
										</label>
										<?php 
										echo $this->Form->input('PromoCodes.coupon_type',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-4',
												'id'=>'c_type',
												'value'=>$promocodeInfo->coupon_type != '' ?$promocodeInfo->coupon_type:'']);
										 ?>
									</div>-->
									<?php //echo $promocodeInfo->coupon_type;  die;?>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon_type"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Coupon Type')); ?><span class="required">*</span>
										</label>
										<div class='col-md-6 col-sm-6 col-xs-12'>
										 <?php  echo $this->Form->select(
												'PromoCodes.coupon_type',
												['discounted_coupon'=>"Discounted Coupon",'fixed_coupon'=>"Fixed Coupon"],
												['class'=>'form-control col-md-7 col-xs-12','id'=>'c_type',
												'value'=>$promocodeInfo->coupon_type
												]);?>
										</div>
									</div>
                                    
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount_rate"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Discount Rate/Fixed')); ?><span class="required">*</span>
										</label>
										<!--<?php 
										if($promocodeInfo->discount_coupon != ''){
										echo $this->Form->input('PromoCodes.discount_coupon',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-11">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$promocodeInfo->discount_coupon != '' ?$promocodeInfo->discount_coupon:'']);
										 }else{
										 echo $this->Form->input('PromoCodes.fixed_coupon',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-11">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$promocodeInfo->fixed_coupon != '' ?$promocodeInfo->fixed_coupon:'']);
										 }
										 ?>-->
									<?php
									 if(($promocodeInfo->discounted_coupon) == ''){
                                          $addClass = 'dc';
                                          $addClassFc = '';
									}else{
										$addClass = '';
                                        $addClassFc = 'dc';
                                       
									}
									
                                        
										echo $this->Form->input('PromoCodes.discounted_coupon',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-11">{{content}}</div>'],
												'label' => false,
												'class'=>"form-control col-md-7 col-xs-12 discounted_coupon $addClass",
												'value'=>$promocodeInfo->discounted_coupon != '' ?$promocodeInfo->discounted_coupon:'']);?>

							             <!--<span id="discounted_coupon" class="<?php echo $hideClass; ?>">%</span>
										   <span style="display:none" id="fixed_coupon" class="<?php $hideClass; ?>">$</span>-->
                                           
                                         	<div class="col-xs-1">
										     <span class="discounted_coupon <?php echo $addClass; ?>" >%</span>									     
									
                                           </div>  
                                           
									<?php
									 
                                            echo $this->Form->input('PromoCodes.fixed_coupon',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-11">{{content}}</div>'],
												'label' => false,
												'class'=>"form-control col-md-7 col-xs-12 fixed_coupon $addClassFc",
												'value'=>$promocodeInfo->fixed_coupon != '' ?$promocodeInfo->fixed_coupon:'']);
										 
										 ?>
							   
                                         	<div class="col-xs-1">
										    
										     <span class="fixed_coupon <?php echo $addClassFc; ?>" >$</span>
									
                                    </div>

									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Start Date')); ?><span class="required">*</span>
										</label>
										<?php 
										 $date = date("Y-m-d",strtotime($promocodeInfo->start_date));
										echo $this->Form->input('PromoCodes.start_date',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'readonly' => true,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$date != '' ? $date:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="expire_date"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Expire Date')); ?><span class="required">*</span>
										</label>
										<?php 
										$date = date("Y-m-d",strtotime($promocodeInfo->expire_date));
										echo $this->Form->input('PromoCodes.expire_date',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'readonly' => true,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$date?$date:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->input('PromoCodes.description',
											 ['escape' => false,
											 'type'=>'textarea',
											 'class'=>'form-control col-md-7',
                                              'value'=>$promocodeInfo->description != '' ?$promocodeInfo->description:'']);?>
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
				
		 <script>
		function firstload(){
			var couponval = $("#c_type").val();
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
		}	
		
		 $(document).ready(function(){
			//AT VERY FIRST ON DOCUMENT LOAD
			
			//setTimeout(firstload, 500);


			
			
		   $(".dc").hide();
		 
		   $( ".dc" ).prop( "disabled", true );
		 

				$("#c_type").change(function() {
					
					$("."+$(this).val()).show();
					$("."+$(this).val()).show();
					 var couponval = $(this).val();
					 //alert(couponval);
					 if(couponval == 'discounted_coupon'){
					 	$(".fixed_coupon").hide();
					 	$( ".fixed_coupon" ).prop( "disabled", true );
						$(".error").hide();

                        $(".discounted_coupon").show();
                        $( ".discounted_coupon" ).prop( "disabled",false );
					 }else{
					 	$(".discounted_coupon").hide();
					 	$( ".discounted_coupon" ).prop( "disabled", true );
						$(".error").hide();

					 	$(".fixed_coupon").show();
					 	$( ".fixed_coupon" ).prop( "disabled",false );
					 }
                  });
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
				/*$('#editcategory').submit(function (e) {
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

				
	});
	</script>

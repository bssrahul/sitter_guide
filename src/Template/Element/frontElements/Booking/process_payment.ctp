
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="pay-outside-wrap creditly-wrapper">
							  
				<div class="form-group">
				  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name on Card')); ?>
				  </label>
				  
					<?php 
					echo $this->Form->input('Booking.card_holder_name',[
								'templates' => ['inputContainer' => '{{content}}'],
								'label' => false,
								'type'=>'text',
								'data-rel'=>'card_holder_name_autofill',
								'class'=>'billing-address-name form-control collapseTwo',
								'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Name on Card')),
								'value'=>isset($UserData['Booking']['card_holder_name'])?$UserData['Booking']['card_holder_name']:'',
								
								
					]);
					echo '<span class="signup_error">'.@$formError['card_holder_name'][0].'</span>';
					?>
				</div>
				
				<div class="row">
				  <div class="col-lg-6 col-sm-5 col-md-6 col-xs-12 ">
					<div class="form-group">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Credit Card No')); ?>.
					  </label>
						<?php 
						echo $this->Form->input('Booking.new_card_number',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'text',
									'inputmode'=>"numeric",
									'autocomplete'=>"cc-number",
									'autocompletetype'=>"cc-number",
									'x-autocompletetype'=>"cc-number",
									'class'=>'credit-card-number form-control collapseTwo',
									'maxlength'=>16,
									'data-rel'=>'card_number_autofill',
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Credit Number')),
									'value'=>isset($UserData['Booking']['new_card_number'])?$UserData['Booking']['new_card_number']:'',
									
						]);
						echo '<span class="signup_error">'.@$formError['new_card_number'][0].'</span>';
						?>
					</div>
				  </div>
				  <div class="col-lg-4 col-sm-3 col-md-4 col-xs-12 ">
					<div class="form-group">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Expiration')); ?>
					  </label>
					  <?php 
						echo $this->Form->input('Booking.new_expiary_date',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'text',
									'data-rel'=>'expiry_date_autofill',
									'class'=>'expiration-month-and-year form-control collapseTwo',
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('MM/YY')),
									'value'=>isset($UserData['Booking']['new_expiary_date'])?$UserData['Booking']['new_expiary_date']:'',
									
						]);
						echo '<span class="signup_error">'.@$formError['new_expiary_date'][0].'</span>';
						?>
					</div>
				  </div>
				  <div class="col-lg-2 col-sm-4 col-md-2 col-xs-12 ">
					<div class="form-group">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('CVV')); ?>
					  </label>
					  <?php 
						echo $this->Form->input('Booking.new_cvv_code',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'password',
									'cvv'=>4,
									'class'=>'security-code form-control collapseTwo',
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('CVV')),
									'value'=>isset($UserData['Booking']['new_cvv_code'])?$UserData['Booking']['new_cvv_code']:'',
									
						]);
						echo '<span class="signup_error">'.@$formError['new_cvv_code'][0].'</span>';
						?>
					</div>
				  </div>
				</div>
				
      </div>
    </div>

  </div>

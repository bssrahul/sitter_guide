<div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <h3 class="payment-heading1">Your Payment Methods
      </h3>
      <p class="payment-text">Select your default method for payments on Sitterguide.  
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
      <div class="pay-outside-wrap creditly-wrapper">
			<?php echo $this->Form->create(null, [
					'url' => ['controller' => 'booking', 'action' => 'add-card-details'],
					'id'=>'addCardDetail',
					'autocomplete'=>'off',
				]);?>
				  
				<div class="form-group">
				  <label>Name on Card
				  </label>
				  
					<?php 
					echo $this->Form->input('Booking.card_holder_name',[
								'templates' => ['inputContainer' => '{{content}}'],
								'label' => false,
								'type'=>'text',
								'data-rel'=>'card_holder_name_autofill',
								'class'=>'billing-address-name form-control autoFillCard',
								'placeholder'=>'Name on Card',
								'value'=>isset($UserCardsData['card_holder_name'])?$UserCardsData['card_holder_name']:'',
								
								
					]);
					echo '<span class="signup_error">'.@$formError['card_holder_name'][0].'</span>';
					?>
				</div>
				
				<div class="row">
				  <div class="col-lg-6 col-sm-5 col-md-6 col-xs-12 ">
					<div class="form-group">
					  <label>Credit Card No.
					  </label>
						<?php 
						echo $this->Form->input('Booking.card_number',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'text',
									'inputmode'=>"numeric",
									'autocomplete'=>"cc-number",
									'autocompletetype'=>"cc-number",
									'x-autocompletetype'=>"cc-number",
									'class'=>'credit-card-number form-control autoFillCard',
									'maxlength'=>16,
									'data-rel'=>'card_number_autofill',
									'placeholder'=>"Card Number",
									'value'=>isset($UserCardsData['card_number'])?$UserCardsData['card_number']:'',
									
						]);
						echo '<span class="signup_error">'.@$formError['card_number'][0].'</span>';
						?>
					</div>
				  </div>
				  <div class="col-lg-4 col-sm-3 col-md-4 col-xs-12 ">
					<div class="form-group">
					  <label>Expiration
					  </label>
					  <?php 
						echo $this->Form->input('Booking.expiary_date',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'text',
									'data-rel'=>'expiry_date_autofill',
									'class'=>'expiration-month-and-year form-control autoFillCard',
									'placeholder'=>'MM/YY',
									'value'=>isset($UserCardsData['expiary_date'])?$UserCardsData['expiary_date']:'',
									
						]);
						echo '<span class="signup_error">'.@$formError['expiary_date'][0].'</span>';
						?>
					</div>
				  </div>
				  <div class="col-lg-2 col-sm-4 col-md-2 col-xs-12 ">
					<div class="form-group">
					  <label>CVV
					  </label>
					  <?php 
						echo $this->Form->input('Booking.cvv_code',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'password',
									'cvv'=>4,
									'class'=>'security-code form-control',
									'placeholder'=>'CVV',
									'value'=>isset($UserCardsData['cvv_code'])?$UserCardsData['cvv_code']:'',
									
						]);
						echo '<span class="signup_error">'.@$formError['cvv_code'][0].'</span>';
						?>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-12">
					<div class="pay-tpborder">
					  <i class="card_error"></i>	
					  <ul class="list-inline">
						<li>Step 1 of 2
						</li>
						<li class="pull-right">
						  <input type='button' class="btn paybtnajax paybtn" value="Next" />
						</li>
					  </ul>
					</div>
				  </div>
				</div>
			
			<?php echo $this->Form->end(); ?>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
      <div class="card-credit ">
        <div class="name-on-card">
          <p class="card_holder_name_autofill"><?php echo isset($UserCardsData['card_holder_name'])?$UserCardsData['card_holder_name']:'Name on Card'; ?></p>
        </div>
        <div class="credit-card-no">
          <p class="card_number_autofill"><?php echo isset($UserCardsData['card_number'])?$UserCardsData['card_number']:'XXXX XXXX XXXX XXXX'; ?></p>
          <!-- <ul class="list-inline"><li>1234</li> <li>1234</li> <li>1234</li><li>1234</li></ul>-->
        </div>
        <div class="valid-up-to">
          <p>Valid up to 
            <span class="expiry_date_autofill"><?php echo isset($UserCardsData['expiary_date'])?$UserCardsData['expiary_date']:'MM/YY'; ?>
            </span> 
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

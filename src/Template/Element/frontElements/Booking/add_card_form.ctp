<!-- ADD Payment Method -->
<div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    	<div class="ph-wrap">
        	<div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                	<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your Payment Methods')); ?></h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Select your default method for payments on Sitterguide')); ?>.</p>
                </div>
                
            </div>
      		
		    
        </div> 
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
          <div class="pay-outside-wrap creditly-wrapper">
			<?php echo $this->Form->create(null, [
					'url' => ['controller' => 'booking', 'action' => 'add-card-details'],
					'id'=>'addCardDetail',
					'autocomplete'=>'off',
				]);?>
				  
				<div class="form-group">
				  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name on Card')); ?>
				  </label>
				  
					<?php 
					echo $this->Form->input('Booking.card_holder_name',[
								'templates' => ['inputContainer' => '{{content}}'],
								'label' => false,
								'type'=>'text',
								'data-rel'=>'card_holder_name_autofill',
								'class'=>'billing-address-name form-control autoFillCard',
								'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Name on Card')),
								'value'=>isset($UserCardsData['card_holder_name'])?$UserCardsData['card_holder_name']:'',
								
								
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
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode("Card Number")),
									'value'=>isset($UserCardsData['card_number'])?chunk_split($UserCardsData['card_number'], 4, ' '):'',
									
						]);
						echo '<span class="signup_error">'.@$formError['card_number'][0].'</span>';
						?>
					</div>
				  </div>
				  <div class="col-lg-4 col-sm-3 col-md-4 col-xs-12 ">
					<div class="form-group">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Expiration')); ?>
					  </label>
					  <?php 
						echo $this->Form->input('Booking.expiary_date',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'text',
									'data-rel'=>'expiry_date_autofill',
									'class'=>'expiration-month-and-year form-control autoFillCard',
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('MM/YY')),
									'value'=>isset($UserCardsData['expiary_date'])?$UserCardsData['expiary_date']:'',
									
						]);
						echo '<span class="signup_error">'.@$formError['expiary_date'][0].'</span>';
						?>
					</div>
				  </div>
				  <div class="col-lg-2 col-sm-4 col-md-2 col-xs-12 ">
					<div class="form-group">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('CVV')); ?>
					  </label>
					  <?php 
						echo $this->Form->input('Booking.cvv_code',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'password',
									'cvv'=>4,
									'class'=>'security-code form-control',
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('CVV')),
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
						<li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Step 1 of 2')); ?>
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
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    	<div class="pay-outside-wrap card-img">
      	  <div class="card-credit ">
        <div class="name-on-card">
          <p class="card_holder_name_autofill"><?php echo isset($UserCardsData['card_holder_name'])?$UserCardsData['card_holder_name']:'Name on Card'; ?></p>
        </div>
        <div class="credit-card-no">
          <p class="card_number_autofill"><?php echo isset($UserCardsData['card_number'])?chunk_split($UserCardsData['card_number'], 4, ' '):'XXXX XXXX XXXX XXXX'; ?></p>
          <!-- <ul class="list-inline"><li>1234</li> <li>1234</li> <li>1234</li><li>1234</li></ul>-->
        </div>
        <div class="valid-up-to">
          <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Valid up to')); ?> 
            <span class="expiry_date_autofill"><?php echo isset($UserCardsData['expiary_date'])?$UserCardsData['expiary_date']:'MM/YY'; ?>
            </span> 
          </p>
        </div>
      </div>
      	</div>
    </div>
  </div>
</div>
<!-- /ADD Payment Method -->
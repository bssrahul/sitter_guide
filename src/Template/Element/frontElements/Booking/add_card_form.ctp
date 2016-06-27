<div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img alt="db-profile-home-icon" src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png">&nbsp; Payment Method  
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> You are here : 
        </li>
        <li>
          <a href="#">Home
          </a>
        </li>
        <li class="active">Payment Method
        </li>
      </ol>
    </div>
  </div>
  <div class="communication-wrap">
    <div class="row">
      <div class="col-xs-12 col-sm-12 xol-md-12">
        <h3 class="payment-heading1">Your Payment Methods
        </h3>
        <p class="payment-text">Select your default method for payments on Rover. Rover accepts all major credit and debit cards.</p>
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
							'class'=>'billing-address-name form-control',
							'placeholder'=>'Name on Card',
							
							
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
								'class'=>'credit-card-number form-control',
								'maxlength'=>16,
								'placeholder'=>"Card Number",
								
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
								'class'=>'expiration-month-and-year form-control',
								'placeholder'=>'MM/YY',
								
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
								'type'=>'text',
								'cvv'=>4,
								'class'=>'security-code form-control',
								'placeholder'=>'CVV',
								
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
    </div>
  </div>

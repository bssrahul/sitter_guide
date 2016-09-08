<?php 
$us_states = array(
	'AL'	=>	'Alabama',
	'AK'	=>	'Alaska',
	'AS'	=>	'American Samoa',
	'AZ'	=>	'Arizona',
	'AR'	=>	'Arkansas',
	'AE'	=>	'Armed Forces - Europe',
	'AP'	=>	'Armed Forces - Pacific',
	'AA'	=>	'Armed Forces - USA/Canada',
	'CA'	=>	'California',
	'CO'	=>	'Colorado',
	'CT'	=>	'Connecticut',
	'DE'	=>	'Delaware',
	'DC'	=>	'District of Columbia',
	'FL'	=>	'Florida',
	'GA'	=>	'Georgia',
	'GU'	=>	'Guam',
	'HI'	=>	'Hawaii',
	'ID'	=>	'Idaho',
	'IL'	=>	'Illinois',
	'IN'	=>	'Indiana',
	'IA'	=>	'Iowa',
	'KS'	=>	'Kansas',
	'KY'	=>	'Kentucky',
	'LA'	=>	'Louisiana',
	'ME'	=>	'Maine',
	'MD'	=>	'Maryland',
	'MA'	=>	'Massachusetts',
	'MI'	=>	'Michigan',
	'MN'	=>	'Minnesota',
	'MS'	=>	'Mississippi',
	'MO'	=>	'Missouri',
	'MT'	=>	'Montana',
	'NE'	=>	'Nebraska',
	'NV'	=>	'Nevada',
	'NH'	=>	'New Hampshire',
	'NJ'	=>	'New Jersey',
	'NM'	=>	'New Mexico',
	'NY'	=>	'New York',
	'NC'	=>	'North Carolina',
	'ND'	=>	'North Dakota',
	'OH'	=>	'Ohio',
	'OK'	=>	'Oklahoma',
	'OR'	=>	'Oregon',
	'PA'	=>	'Pennsylvania',
	'PR'	=>	'Puerto Rico',
	'RI'	=>	'Rhode Island',
	'SC'	=>	'South Carolina',
	'SD'	=>	'South Dakota',
	'TN'	=>	'Tennessee',
	'TX'	=>	'Texas',
	'UT'	=>	'Utah',
	'VT'	=>	'Vermont',
	'VI'	=>	'Virgin Islands',
	'VA'	=>	'Virginia',
	'WA'	=>	'Washington',
	'WV'	=>	'West Virginia',
	'WI'	=>	'Wisconsin',
	'WY'	=>	'Wyoming'
);
$canadian_provinces = array(
	'AB'	=>	'Alberta',
	'BC'	=>	'British Columbia',
	'MB'	=>	'Manitoba',
	'NB'	=>	'New Brunswick',
	'NF'	=>	'Newfoundland and Labrador',
	'NT'	=>	'Northwest Territories',
	'NS'	=>	'Nova Scotia',
	'NU'	=>	'Nunavut',
	'ON'	=>	'Ontario',
	'PE'	=>	'Prince Edward Island',
	'QC'	=>	'Quebec',
	'SK'	=>	'Saskatchewan',
	'YT'	=>	'Yukon Territory'
); 
$aussie_states = array(
	'ACT'	=>	'Australian Capital Territory',
	'JBT'	=>	'Jervis Bay Territory',
	'NSW'	=>	'New South Wales',
	'NT'	=>	'Northern Territory',
	'QLD'	=>	'Queensland',
	'SA'	=>	'South Australia',
	'TAS'	=>	'Tasmania',
	'VIC'	=>	'Victoria',
	'WA'	=>	'Western Australia'
);
$statesArray = array_merge($us_states,$canadian_provinces);
$statesArray = array_merge($statesArray ,$aussie_states);
?>

<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon">&nbsp <?php echo $this->requestAction('app/get-translate/'.base64_encode('Billing Details')); ?>  
      </h3>
    </div>
    
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
  
      <ol class="breadcrumb text-right">
        <li> <?php echo $this->requestAction('app/get-translate/'.base64_encode('You are here')); ?> : 
        </li>
        <li>
          <a href="#"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Home')); ?>
          </a>
        </li>
        <li class="active"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Payment Method')); ?>
        </li>
      </ol>
    </div>
  
  </div>
  
  <div class="communication-wrap">
  <div class="ph-wrap">
        	<div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                	<h3 class="payment-heading1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your Payment Methods')); ?>  </h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                	<p class="payment-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Select your default method for payments on Sitter Gudie. Sitter Gudie accepts all major credit and debit cards')); ?>.   </p>
                </div>
                
            </div>
      		
		    
        </div>
  
  
  
    <div class="row">
      <div class="col-xs-12 col-sm-12 xol-md-12">       
        
        <div class="pay-outside-wrap">
          <h5 class="baddress"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Billing Address')); ?> 
          </h5>
			<?php echo $this->Form->create(null, [
				'url' => ['controller' => 'booking', 'action' => 'add-personal-details'],
				'id'=>'addBillingDetail',
				'autocomplete'=>'off',
			]);?>
            
            <div class="form-group">
              <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Address Line 1')); ?> 
              </label>
              <?php 
				echo $this->Form->input('Booking.address_1',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Address line 1')),
							'value'=>isset($UserCardsData['address_1'])?$UserCardsData['address_1']:'',
				]);
				echo '<span class="signup_error">'.@$formError['address_1'][0].'</span>';
				?>
            </div>
           
            <div class="form-group">
              <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Address Line 2')); ?>
              </label>
              <?php 
				echo $this->Form->input('Booking.address_2',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Address line 2')),
							'value'=>isset($UserCardsData['address_2'])?$UserCardsData['address_2']:'',
				]);
				echo '<span class="signup_error">'.@$formError['address_2'][0].'</span>';
				?>
            </div>
           
            <div class="row">
              <div class="col-lg-6 col-sm-4 col-md-6 col-xs-12 ">
                <div class="form-group">
                  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('City')); ?>
                  </label>
                  <?php 
				echo $this->Form->input('Booking.city',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('City')),
							'value'=>isset($UserCardsData['city'])?$UserCardsData['city']:'',
				]);
				echo '<span class="signup_error">'.@$formError['city'][0].'</span>';
				?>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 ">
                <div class="form-group">
                  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('State')); ?>
                  </label>
                  <?php echo $this->Form->input('Booking.state',[
					'templates' => ['inputContainer' => '{{content}}'],
					'label' => false,
					'type'=>'select',
					'options'=>$statesArray,
					'class'=>'form-control selectpicker',
					'value'=>isset($UserCardsData['state'])?$UserCardsData['state']:'',
					]);
					echo '<span class="signup_error">'.@$formError['state'][0].'</span>';
				  ?>               
                 
                </div>
              </div>
              <div class="col-lg-2 col-sm-4 col-md-2 col-xs-12 ">
                <div class="form-group">
                  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Zip Code')); ?>
                  </label>
                  <?php 
				echo $this->Form->input('Booking.zip',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Zip')),
							'value'=>isset($UserCardsData['zip'])?$UserCardsData['zip']:'',
				]);
				echo '<span class="signup_error">'.@$formError['zip'][0].'</span>';
				?>
                </div>
              </div>
            </div>
            <div class="payment-last">
              <div class="checkbox">
                <label>
                  <?php 
				echo $this->Form->input('Booking.save_cards',[
					'templates' => ['inputContainer' => '{{content}}'],
					'label' => $this->requestAction('app/get-translate/'.base64_encode('Save address for future use')),
					'type'=>'checkbox',
					'value'=>isset($UserCardsData['save_cards'])?$UserCardsData['save_cards']:'',
				]);
				?> 
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="pay-tpborder">
                  <ul class="list-inline">
                    <li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Step 2 of 2')); ?>
                    </li>
                    <li class="pull-right">
                      <input type='submit' class="btn paybtn" value="Save Card" />
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
</div>
<style>
.signup_error {
    color: #c82334;
    font-size: 12px;
}
</style>

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
      
$session = $this->request->session();
$cuntry_currency = $session->read("currency.currency");
$cuntry_price = $session->read("currency.price");
$cuntry_sign_code = $session->read("currency.sign_code");

?>
<!--content area Start-->
<main>   
     <!-- Get in Touch starts-->        
    <section>
		<div class="container">
			<div id="payment-box" >
				
				<div class="sitter-quike-view" >
					
					<div class="sqv-box">
						<div class="top-close">
							<p>Reservation Request</p>
						</div>
        
						<div class="row">       
        
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
            
							<div class="full-content-wrap">
							  <div class="best-pract-wrap">
								
								<div class="best-pract-head">
								  <p>Best Practice: We recommend to contact a host before a reservation</p>
								</div>
							   
								<p class="best-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took </p>
								
								<div class="msg-send-text"> <a href="#"> Send a Message to Joile</a></div>
							  </div>
              
							  <div class="bill-info-wrap">
								<div class="bill-info-head">
								  <p>Billing Inofrmation</p>
								</div>
								
								<div class="bill-info-inner">
								  <?php echo $this->Form->create(null, [
										'url' => ['controller' => 'booking', 'action' => 'add-personal-details'],
										'id'=>'addBillingDetail',
										'autocomplete'=>'off',
									]);?>
									
									<div class="form-group">
									  <label>Full Name</label>
									   <?php 
										echo $this->Form->input('Booking.full_name',[
													'templates' => ['inputContainer' => '{{content}}'],
													'label' => false,
													'type'=>'text',
													'class'=>'form-control',
													'placeholder'=>'Full name',
													'value'=>isset($UserCardsData['full_name'])?$UserCardsData['full_name']:'',
										]);
										echo '<span class="signup_error">'.@$formError['full_name'][0].'</span>';
										?>
									</div>
									<div class="row">
									  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
										  <label>Address 1</label>
										   <?php 
											echo $this->Form->input('Booking.address_1',[
														'templates' => ['inputContainer' => '{{content}}'],
														'label' => false,
														'type'=>'text',
														'class'=>'form-control',
														'placeholder'=>'Address line 1',
														'value'=>isset($UserCardsData['address_1'])?$UserCardsData['address_1']:'',
											]);
											echo '<span class="signup_error">'.@$formError['address_1'][0].'</span>';
											?>
										</div>
									  </div>
									  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
										  <label>Address 2</label>
										  <?php 
											echo $this->Form->input('Booking.address_2',[
														'templates' => ['inputContainer' => '{{content}}'],
														'label' => false,
														'type'=>'text',
														'class'=>'form-control',
														'placeholder'=>'Address line 2',
														'value'=>isset($UserCardsData['address_2'])?$UserCardsData['address_2']:'',
											]);
											echo '<span class="signup_error">'.@$formError['address_2'][0].'</span>';
											?>
										</div>
									  </div>
									</div>
									<div class="row">
									  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="row">
										  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
											  <label>City</label>
											  <?php 
												echo $this->Form->input('Booking.city',[
															'templates' => ['inputContainer' => '{{content}}'],
															'label' => false,
															'type'=>'text',
															'class'=>'form-control',
															'placeholder'=>'City',
															'value'=>isset($UserCardsData['city'])?$UserCardsData['city']:'',
												]);
												echo '<span class="signup_error">'.@$formError['city'][0].'</span>';
												?>
											</div>
										  </div>
										  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
											  <label>State</label>
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
										</div>
									  </div>
									  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
										  <label>Country</label>
										 <?php 
											echo $this->Form->input('Booking.country',[
														'templates' => ['inputContainer' => '{{content}}'],
														'label' => false,
														'type'=>'text',
														'class'=>'form-control',
														'placeholder'=>'Country',
														'value'=>isset($UserCardsData['country'])?$UserCardsData['country']:'',
											]);
											echo '<span class="signup_error">'.@$formError['city'][0].'</span>';
											?>
										</div>
									  </div>
									</div>
									<div class="row">
									  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
										  <label>Zip Code</label>
										   <?php 
											echo $this->Form->input('Booking.zip',[
														'templates' => ['inputContainer' => '{{content}}'],
														'label' => false,
														'type'=>'text',
														'class'=>'form-control',
														'placeholder'=>'Zip',
														'value'=>isset($UserCardsData['zip'])?$UserCardsData['zip']:'',
											]);
											echo '<span class="signup_error">'.@$formError['zip'][0].'</span>';
											?>
										</div>
									  </div>
									</div>
								  </form>
							   
						</div>
						
					</div>
              
					<div class="payment-info-wrap">
                
						<div class="payment-info-head">
							<p>Payment</p>
						</div>
               
                <div class="payment-info-inner">
                  
                  <div>
                    
                    <label class="radio-inline">
                      <input type="radio" name="payment_type" data-rel="save_detail" class="payment_type" >
                      Saved Detail 
						<span class="pl20">
							<img alt="paypal" title="paypal" src="<?php echo HTTP_ROOT; ?>img/detail-paypal.png">
						</span> 
					</label>
					<div class="save_detail hideDiv">
						<p>SAVED DETAIL</p>
					</div>
                  </div>
                  
                  <div class="c-card">
                    
                    <label class="radio-inline">
                      <input type="radio" data-rel="new_detail"  name="payment_type" class="payment_type">
                      Debit / Credit Card 
						<span class="pl20">
							<img alt="Credit Card" title="Credit Card" src="<?php echo HTTP_ROOT; ?>img/detail-visacard.png">
						</span> 
					</label>
					
					<div style="display:none" class="hideDiv new_detail">
						<p>SAVED DETAL</p>
					</div>
					
                  </div>
                  
                </div>
              </div>
              
              
              
              <div class="hello-info-wrap">
                <div class="hello-info-head">
                  <p>Intial Message</p>
                </div>
                <div class="hello-info-inner">
                  <div class="hello-info-text">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
            
            
            </div>
          </div>
          
          <div class=" col-xs-12 col-md-4 col-sm-4 col-lg-4  ">
            <div class="right-content-wrap">
              <div class="top-box-wrap">
                <div class="row">
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img width="50" height="50" alt="image" class="img-responsive img-circle text-center center-block" src="<?php echo HTTP_ROOT."img/uploads/".(@$get_booking_requests_to_display['user']['image'] != ""?@$get_booking_requests_to_display['user']['image']:"dm.png"); ?>"> </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <ul class="list-unstyled">
                      <li class="f14"><?php echo @$get_booking_requests_to_display['user']['first_name']; ?></li>
                      <li class="f13"><?php echo @$get_booking_requests_to_display['user']['last_name']; ?></li>
                    </ul>
                  </div>
                </div>
                <div class="night-sitt">
                  <ul class="list-unstyled">
                    <li><?php 
                     $service = str_replace("_"," ",@$get_booking_requests_to_display['required_service']);
                          $service = $service != ""?$service:"_ _ _";
                             
                    echo ucwords(@$service)." ".@$total_days." day"; ?></li>
                    
                    <li><span><?php echo @$get_booking_requests_to_display['booknig_start_date'] != ""?@$get_booking_requests_to_display['booknig_start_date']:"_ _ _"; ?></span> to <span><?php echo @$get_booking_requests_to_display['booking_end_date'] != ""?@$get_booking_requests_to_display['booking_end_date']:"_ _ _"; ?> </span></li>
                  </ul>
                </div>
              </div>
              <div class="table-wrap">
                <table class="table">
                 <tbody>
                    <tr>
                    <td class="tbfont">Number of Pets</td>
                      <td class="tbfont"><?php echo @$pets_count != "" ?@$pets_count:"_ _ _";?></td>
                    </tr>
                    <tr>
                     <td class="tbfont">Cancellation Policy</td>
                      <td class="tbfont"><?php echo @$services_info->cancellation_policy_status == 1?"Flexible":"_ _ _"; ?></td>
                    </tr>
                    <tr>
                      <td class="tbfont">Total Amount</td>
                      <td class="tbfont"> <?php echo $cuntry_currency." ".$cuntry_sign_code." ".$cuntry_price*@$total; ?></td>
                    </tr>
                    <tr>
                      <td class="tbfont">Booking Fee</td>
                      <td class="tbfont"><?php echo @$services_info->booking_status == 1?"Free":"_ _ _"; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="pay-through">
              <h6>Pay through Sitter Guide  for:</h6>
              <ul class="list-unstyled">
              <li> <i class="fa fa-angle-right right-gr"></i>Premium Insurance</li>
              <li><i class="fa fa-angle-right right-gr"></i>100% Satisfection</li>
              <li><i class="fa fa-angle-right right-gr"></i>Money Back</li>
              <li><i class="fa fa-angle-right right-gr"></i>24/support</li>
              <li><i class="fa fa-angle-right right-gr"></i>Daily Photo Update</li>
          
              </ul>
              
              
              </div>
              
            </div>
          </div>
          
          
          
          
        </div>
        
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
        <button class="btn btn-mod-pop-1">Book Now</button>
        </div>
        
        </div>
      </div>
    </div>
    </div>
    
    </div>
    </section>     
    <!-- Get in Touch ends-->  
    <?php 
    echo $this->element('frontElements/guests/why_choose'); 
	echo $this->element('frontElements/guests/fun_and_news');?> 

<script>
$(document).ready(function(){
	$(".payment_type").click(fucntion(){
		var currentSelection =  $(this).attr('data-rel');	
		$("."+currentSelection).show();
		$(".hideDiv").hide();
	});
});
</script>

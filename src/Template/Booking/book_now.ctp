<?php echo $this->Html->script(['Front/booking.js','Front/creditly.js']);?>
<?php 
	$session = $this->request->session();
	$cuntry_currency = $session->read("currency.currency");
	$cuntry_price = $session->read("currency.price");
	$cuntry_sign_code = $session->read("currency.sign_code");
	$bookingID = base64_encode(convert_uuencode($get_booking_requests_to_display['id'])); 

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
              <p>Reservation Request
              </p>
            </div>
			<?php echo $this->Form->create(null, [
				'url' => ['controller' => 'booking', 'action' => 'book_now'],
				'id'=>'charge_card',
				'autocomplete'=>'off',
				]);
			?>
			<?php 
				echo $this->Form->input('Booking.booking_id',[
				'label' => false,
				'type'=>'hidden',
				'value'=>isset($bookingID)?$bookingID:'',
				]);
			
			?>
            <div class="row">       
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
                <div class="full-content-wrap">
                  <div class="best-pract-wrap">
                    
                    <div class="best-pract-head">
                      <p>Best Practice: We recommend to contact a host before a reservation
                      </p>
                    </div>
                   
                    <p class="best-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took 
                    </p>
                  
                    <div class="msg-send-text"> 
                      <a href="#"> Send a Message to Joile
                      </a>
                    </div>
                 
                  </div>


					<?php if(isset($errMsg) && !empty($errMsg)){ ?>
						<div class="alert alert-danger fade in">
							<a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">X</a>
							<strong>Error! </strong> <?php echo $errMsg; ?>
						</div>
					<?php }?>
					
					
					
                  <div class="bill-info-wrap">
                    
                    <div class="bill-info-head">
                      <p>Billing Inofrmation
                      </p>
                    </div>
                    
                    <div class="bill-info-inner">
						
                      <div class="form-group">
                        <label>Full Name
                        </label>
                        <?php 
							echo $this->Form->input('Booking.full_name',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Full name',
							'value'=>isset($UserData['Booking']['first_name'])?$UserData['Booking']['first_name']." ".$UserData['Booking']['last_name']:'',
							]);
							echo '<span class="signup_error">'.@$formError['full_name'][0].'</span>';
						?>
                      </div>
                     
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <label>Address 1
                            </label>
                            <?php 
							echo $this->Form->input('Booking.address_1',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Address line 1',
							'value'=>isset($UserData['Booking']['address'])?$UserData['Booking']['address']:'',
							]);
							echo '<span class="signup_error">'.@$formError['address_1'][0].'</span>';
							?>
                          </div>
                        </div>
                      
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <label>Address 2
                            </label>
                            <?php 
							echo $this->Form->input('Booking.address_2',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Address line 2',
							'value'=>isset($UserData['Booking']['address2'])?$UserData['Booking']['address2']:'',
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
                                <label>City
                                </label>
                                <?php 
									echo $this->Form->input('Booking.city',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'text',
									'class'=>'form-control',
									'placeholder'=>'City',
									'value'=>isset($UserData['Booking']['city'])?$UserData['Booking']['city']:'',
									]);
									echo '<span class="signup_error">'.@$formError['city'][0].'</span>';
									?>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <label>State
                                </label>
                                <?php echo $this->Form->input('Booking.state',[
								'templates' => ['inputContainer' => '{{content}}'],
								'label' => false,
								'type'=>'select',
								'options'=>$statesArray,
								'class'=>'form-control selectpicker',
								'value'=>isset($UserData['Booking']['state'])?$UserData['Booking']['state']:'',
								]);
								echo '<span class="signup_error">'.@$formError['state'][0].'</span>';
								?>     
                              </div>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <label>Country
                            </label>
                            <?php 
							echo $this->Form->input('Booking.country',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Country',
							'value'=>isset($UserData['Booking']['country'])?$UserData['Booking']['country']:'',
							]);
							echo '<span class="signup_error">'.@$formError['country'][0].'</span>';
							?>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
						  
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <label>Zip Code
                            </label>
                            <?php 
							echo $this->Form->input('Booking.zip',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Zip',
							'value'=>isset($UserData['Booking']['zip'])?$UserData['Booking']['zip']:'',
							]);
							echo '<span class="signup_error">'.@$formError['zip'][0].'</span>';
							?>
                          </div>
                          
                        </div>
                        
                      </div>
                      
                    </div>
                    
                  </div>
                  
                  <div class="payment-info-wrap">
                    <div class="payment-info-head">
                      <p>Payment
                      </p>
                    </div>
                    
                    <div class="payment-info-inner">
                      <div>
						<?php if(isset($cardData) && !empty($cardData)){ ?>
                        <label class="radio-inline">
                          <input type="radio" checked value="save_cards" name="payment_type" data-rel="save_detail" class="payment_type" >
                         Faster checkout with saved detail 
                        
                          <span class="pl20">
                           &nbsp;<br/>
                          </span> 
                          
                        </label>
                        
                        <div id="collapseOne" class="card_form_save_card">
						
							  <!-- CREDIT CARD FORM STARTS HERE -->
								<div class="panel panel-default credit-card-box">
									<div class="panel-heading display-table" >
										<div class="row display-tr" >
											<div class="display-td" >                            
												
												<?php 
														$tmp_imgname = isset($cardData['card_type'])?$cardData['card_type']:'visa'; 
														$imgname = strtolower(str_replace(" ","-",$tmp_imgname))."-card.png";
												  ?>
												<img style="margin-right: 15px;" class="img-responsive pull-right" alt="Credit Card" title="Credit Card" src="<?php echo HTTP_ROOT.'/img/'.$imgname; ?>">
											</div>
										</div>                    
									</div>
									<div class="panel-body">
										
											<div class="row">
												<div class="col-xs-12">
													<div class="form-group">
														<label for="cardNumber">CARD NUMBER</label>
														<div class="input-group">
															 <?php 
																echo $this->Form->input('Booking.card_number',[
																'templates' => ['inputContainer' => '{{content}}'],
																'label' => false,
																'readonly' => true,
																'type'=>'text',
																'class'=>'form-control collapseOne',
																'placeholder'=>'Card Number',
																'value'=>isset($cardData['last4'])?"XXXX XXXX XXXX ".$cardData['last4']:'',
																]);
																echo '<span class="signup_error">'.@$formError['card_number'][0].'</span>';
																?>
															<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
														</div>
													</div>                            
												</div>
											</div>
											<div class="row">
												<div class="col-xs-7 col-md-7">
													<div class="form-group">
														<label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
														<?php 
																echo $this->Form->input('Booking.expiary_date',[
																'templates' => ['inputContainer' => '{{content}}'],
																'label' => false,
																'readonly' => true,
																'type'=>'text',
																'class'=>'form-control collapseOne',
																'placeholder'=>'Expiary_date',
																'value'=>isset($cardData['exp_month'])?$cardData['exp_month']."/".$cardData['exp_year']:'',
																]);
																echo '<span class="signup_error">'.@$formError['expiary_date'][0].'</span>';
																?>
													</div>
												</div>
												<div class="col-xs-5 col-md-5 pull-right">
													<div class="form-group">
														<label for="cardCVC">CV CODE</label>
														<?php 
																echo $this->Form->input('Booking.cvv_code',[
																'templates' => ['inputContainer' => '{{content}}'],
																'label' => false,
																'type'=>'text',
																'class'=>'security-code form-control collapseOne',
																'placeholder'=>'CVV Code',
																]);
																echo '<span class="signup_error">'.@$formError['cvv_code'][0].'</span>';
														?>
													</div>
												</div>
											</div>
											
									</div>
								</div>            
								<!-- CREDIT CARD FORM ENDS HERE -->
							 
						</div>
                         <?php } ?>	
                      </div>
                      
                      <div class="c-card">
						  
                        <label class="radio-inline">
							
                          <input type="radio" value="new_cards" data-rel="new_detail"  name="payment_type" class="payment_type">
                          Debit / Credit Card 
                          <span class="pl20">
							  &nbsp;<br/>
                          </span> 
                          
                        </label>
                        
                        <div id="collapseTwo" class="card_form_new_card">
							  <?php echo $this->element('frontElements/Booking/process_payment');?> 
							 <input type="checkbox" value="save_my_card" name="save_my_card">
							 <label for="">Save this card for faster checkout</p>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="hello-info-wrap">
                    <div class="hello-info-head">
                      <p>Initial Message
                      </p>
                    </div>
                    <div class="hello-info-inner">
                      <div class="hello-info-text">
                        <p><?php echo $get_booking_requests_to_display['message']; ?></p>
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
              
              <div class=" col-xs-12 col-md-4 col-sm-4 col-lg-4  ">
                <div class="right-content-wrap">
                  <div class="top-box-wrap">
                    <div class="row">
                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
                        <img width="50" height="50" alt="image" class="img-responsive img-circle text-center center-block" src="<?php echo HTTP_ROOT."img/uploads/".(@$get_booking_requests_to_display['user']['image'] != ""?@$get_booking_requests_to_display['user']['image']:"dm.png"); ?>"> 
                      </div>
                      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <ul class="list-unstyled">
                          <li class="f14">
                            <?php echo @$get_booking_requests_to_display['user']['first_name']; ?>
                          </li>
                          <li class="f13">
                            <?php echo @$get_booking_requests_to_display['user']['last_name']; ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="night-sitt">
                      <ul class="list-unstyled">
                        <li>
                          <?php 
							$service = str_replace("_"," ",@$get_booking_requests_to_display['required_service']);
							$service = $service != ""?$service:"_ _ _";
							echo ucwords(@$service)." ".@$total_days." day"; ?>
                        </li>
                        <li>
                          <span>
                            <strong>
								<?php echo date("F j, Y", strtotime(@$get_booking_requests_to_display['booknig_start_date'])) != ""?date("F j, Y", strtotime(@$get_booking_requests_to_display['booknig_start_date'])):"_ _ _"; ?>
							</strong>	
                          </span> to 
                          <span>
							  <strong>
                            <?php echo date("F j, Y", strtotime(@$get_booking_requests_to_display['booknig_end_date'])) != ""?date("F j, Y", strtotime(@$get_booking_requests_to_display['booknig_end_date'])):"_ _ _"; ?> 
							</strong>	
                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="table-wrap">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="tbfont">Number of Pets
                          </td>
                          <td class="tbfont">
                            <?php echo @$pets_count != "" ?@$pets_count:"_ _ _";?>
                          </td>
                        </tr>
                        <tr>
                          <td class="tbfont">Cancellation Policy
                          </td>
                          <td class="tbfont">
                            <?php echo @$services_info->cancellation_policy_status == 1?"Flexible":"_ _ _"; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="tbfont">Total Amount
                          </td>
                          <td class="tbfont"> 
                            <?php echo $cuntry_currency." ".$cuntry_sign_code." ".$cuntry_price*@$total; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="tbfont">Booking Fee
                          </td>
                          <td class="tbfont">
                            <?php echo @$services_info->booking_status == 1?"Free":"_ _ _"; ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="pay-through">
                    <h6>Pay through Sitter Guide  for:
                    </h6>
                    <ul class="list-unstyled">
                      <li> 
                        <i class="fa fa-angle-right right-gr">
                        </i>Premium Insurance
                      </li>
                      <li>
                        <i class="fa fa-angle-right right-gr">
                        </i>100% Satisfection
                      </li>
                      <li>
                        <i class="fa fa-angle-right right-gr">
                        </i>Money Back
                      </li>
                      <li>
                        <i class="fa fa-angle-right right-gr">
                        </i>24/support
                      </li>
                      <li>
                        <i class="fa fa-angle-right right-gr">
                        </i>Daily Photo Update
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    </div>
    </div>
    </section>     
   
  <script>
		
    $(document).ready(function () {
		
	  expandCollaspe();	
    
      $("input[name='payment_type']").click(function () {
			expandCollaspe();
      });
	
		<?php if(isset($UserData['payment_type']) && $UserData['payment_type'] =='new_cards'){ ?>	
			$("#collapseOne").collapse('hide');
			$("#collapseTwo").collapse('show');
			$(".collapseOne").prop('disabled',true);
			$(".collapseTwo").prop('disabled',false);	
		<?php }else{?>	
			$("#collapseOne").collapse('show');
			$("#collapseTwo").collapse('hide');
			$(".collapseTwo").prop('disabled ',true);
			$(".collapseOne").prop('disabled',false);
		<?php }?>	
    });
    
    function expandCollaspe(){
		var checkedValue = $("input[name='payment_type']:checked").val();
        checkedValue = $.trim(checkedValue)
        
        if (checkedValue == "save_cards") {
          $("#collapseOne").collapse('show');
          $("#collapseTwo").collapse('hide');
          $(".collapseTwo").prop('disabled ',true);
          $(".collapseOne").prop('disabled',false);
        
        }else if (checkedValue =="new_cards") {
          $("#collapseOne").collapse('hide');
          $("#collapseTwo").collapse('show');
		  $(".collapseOne").prop('disabled',true);
          $(".collapseTwo").prop('disabled',false);
        }
	}
  </script>
<style>
.signup_error {
  color: red;
  font-size: 12px;
}
</style>


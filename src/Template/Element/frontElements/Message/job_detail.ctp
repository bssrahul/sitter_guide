<?php       
		$session = $this->request->session();
		$cuntry_currency = $session->read("currency.currency");
		$cuntry_price = $session->read("currency.price");
		$cuntry_sign_code = $session->read("currency.sign_code");
?>
	<div class="job-request-wrapper">
		<p class="job-req"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Job Request Detail')); ?></p>
			<table class="table">
				<tbody>
					<tr>
					  <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('From')); ?> : </td>
					  <td>
						  <?php echo @$get_booking_requests_to_display['booknig_start_date'] != ""?date("F, j Y h:i A",strtotime(@$get_booking_requests_to_display['booknig_start_date'])):"_ _ _"; ?> 
					  </td>
					</tr>
					
                     <tr>
						<td><?php echo $this->requestAction('app/get-translate/'.base64_encode('To')); ?> :</td>
                        <td>
							<?php echo @$get_booking_requests_to_display['booking_end_date'] != ""?date("F, j Y h:i A",strtotime(@$get_booking_requests_to_display['booking_end_date'])):"_ _ _"; ?> 
                         </td>
                     </tr>
                     
                     <tr>
						<td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Service')); ?> :</td>
                          <td>
							  <?php 
                          $service = str_replace("_"," ",@$get_booking_requests_to_display['required_service']);
                          $service = $service != ""?$service:"_ _ _";
                               echo ucwords(@$service); 
                          ?> 
                          </td>
					</tr>
                        
                    <tr>
						<td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pets')); ?> : </td>
                          <td><?php 
                          if(!empty(@$pets)){
							  echo implode(",",@$pets);
						  }else{
							  echo "";
							  }
                          ?>
                          </td>
					</tr>
                    
                    <tr>
                          <td class="width110"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Stay Price')); ?> : </td>
                          <td><?php echo $cuntry_sign_code." ".$cuntry_price*@$total; ?></td>
					</tr>
					
                    <tr>
						<td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place')); ?>:</td>
						<td>
						  <?php 
						  if(!empty(@$get_booking_requests_to_display['additional_services'])){
							   $allAdditionalServices = [];
						       @$additional_services = explode(",",@$get_booking_requests_to_display['additional_services']);
                               foreach(@$additional_services as $single_service){
								   $additionalService = str_replace("_"," ",@$single_service);
								   $allAdditionalServices[] = ucwords(@$additionalService); 
								}
								echo implode(",",$allAdditionalServices);
                          }else{
							  echo "_ _ _";
							  }
                          ?>
						</td>
					</tr>
					
                    <tr>
						<td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Notes')); ?> :</td>
						<td>
							<?php echo (@$get_booking_requests_to_display['message'] !='') ? @$get_booking_requests_to_display['message'] : "_ _ _"; ?> 
						</td>
						
					</tr>
				</tbody>
			</table>
			
			<div class="rate-detail-wrapper">
				
				<div class="rate-pad">
				
					<p class="rate-det"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Rate Details')); ?>: </p>
                    
                        <table class="table">
                          <tbody>
                            <tr>
                              
                              <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Hunter')); ?> : </td>
                              <td><?php echo $cuntry_sign_code." ".$cuntry_price*@$total; ?></td>
                            
                            </tr>
                            
                            <tr>
                              
                              <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay')); ?> :</td>
                              <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('X 1 night')); ?></td>
                            </tr>
                            
                          </tbody>
                        </table>
				</div>
                    
                <div class="sub-total">
             
					<div class="htt">
                          
                          <table class="table ">
                            <tbody>
                              <tr>
                                <td><?php echo $this->requestAction('app/get-translate/'.base64_encode('Subtotal')); ?> : 
                                </td>
                                <td><?php echo $cuntry_sign_code." ".$cuntry_price*@$total; ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          
					</div>
				</div>
				
			</div>
                   
                   <?php  
               //pr($get_booking_requests_to_display['folder_status_sitter']); die;
                   if(strtolower($userActas) == "sitter"){ ?>
                    
                     <?php if($get_booking_requests_to_display['folder_status_sitter'] == "pending"){ ?>
						
                      <p class="click-bok"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Click')); ?> 
                        <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('"Accept Offer"')); ?>
                        </b>
                     <?php echo $this->requestAction('app/get-translate/'.base64_encode('to accept the offer. Each Stay is covered by')); ?> 
                     <a href="#">
                        <u><?php echo $this->requestAction('app/get-translate/'.base64_encode('premium
                          insurance protection')); ?>.
                        </u>
                      </a>
                       </p>
						
						<button class="btn  btn-lg bt-now12 btn-block" type="button" onclick="location.href='<?php echo HTTP_ROOT."booking/book-now/".@base64_encode(convert_uuencode($get_booking_requests_to_display['id']))."/sitter"; ?>'">
						  <i class="fa fa-check-circle-o">
						  </i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept Offer')); ?> 
						</button>
                    <?php }else if($get_booking_requests_to_display['folder_status_sitter'] == "current"){ ?>
						<button disabled class="btn  btn-lg bt-now12 btn-block" type="button">
						  <i class="fa fa-check-circle-o">
						  </i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Offer Accepted')); ?>
						</button>
                    <?php } ?>
                    
                    
                    <?php 
                    } ?>
                   
                    <?php  if(strtolower($userActas) == "guest"){ ?>
                    <p class="click-bok"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Click')); ?> 
                     
						 
							<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('"Book It Now"')); ?>
							</b>
						 
                    
						 
						
                      <?php echo $this->requestAction('app/get-translate/'.base64_encode('to confirm and pay for this stay. Each Stay is covered by')); ?> 
                      <a href="<?php echo HTTP_ROOT."insurance"; ?>">
                        <u><?php echo $this->requestAction('app/get-translate/'.base64_encode('premium
                          insurance protection')); ?>.
                        </u>
                      </a>
                    </p>
                    <?php if($get_booking_requests_to_display['folder_status_sitter'] == "current" && $get_booking_requests_to_display['payment_status'] == "Pending"){ ?>
						
						<button  class="btn  btn-lg bt-now12 btn-block" type="button" onclick="location.href='<?php echo HTTP_ROOT."booking/book-now/".@base64_encode(convert_uuencode($get_booking_requests_to_display['id']))."/guest"; ?>'">
						  <i class="fa fa-check-circle-o">
						  </i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Book It Now')); ?>
						</button>
                    <?php }else{ ?>
						
						<button disabled class="btn  btn-lg bt-now12 btn-block" type="button">
						  <i class="fa fa-check-circle-o">
						  </i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Book It Now')); ?> 
						</button>
                    <?php } ?>
                    
                    
                    <?php 
                    } ?>
                  </div>
                  
                  <div class="mem-sinc-15">
                    <div class="member-since1">
                      <div class="media">
                        <div class="media-left media-middle w-95">
                          <a href="#">
                           <?php if((@$get_booking_requests_to_display['user']['facebook_id']) !="" && (@$get_booking_requests_to_display['user']['is_image_uploaded'])==0){ ?>
			                   <img 
									class="media-object sizei65 img-thumbnail" 
									alt="<?php echo __('Profile Picture'); ?>" 
									src="<?php if(@$get_booking_requests_to_display['user']['image'] != ""){echo @$get_booking_requests_to_display['user']['image'];}else{echo @$get_booking_requests_to_display['user']['image']='prof_photo.png';} ?>"> 
						        <?php }else{ ?>
							    <img 
									class="media-object sizei65 img-thumbnail" 
									alt="<?php echo __('Profile Picture'); ?>" 
									src="<?php echo HTTP_ROOT.'img/uploads/'.(@$get_booking_requests_to_display['user']['image'] != ''?@$get_booking_requests_to_display['user']['image']:'prof_photo.png'); ?>"> 					   
							<?php  } ?>
                          </a>
                        </div>
                        <div class="media-body">
                          <p class="media-heading"><?php echo (@$get_booking_requests_to_display['user']['first_name'] !='')? @$get_booking_requests_to_display['user']['first_name'] : ""; ?> 
							<?php echo (@$get_booking_requests_to_display['user']['last_name'] !='')? ucwords(substr(@$get_booking_requests_to_display['user']['last_name'],0,1)) : ""; ?> 
                          </p>
                          <p class="media-heading-msince">
                           <?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?> Memeber Since :  <?php echo @$get_booking_requests_to_display['user']['date_added'] != ""?date("F, j Y",strtotime(@$get_booking_requests_to_display['user']['date_added'])):"_ _ _"; ?>  
                          </p>
                          <p>
                          </p>
                        </div>
                      </div>
                      <p class="text-mem"><?php echo (@$get_booking_requests_to_display['user']['user_about_sitter']['client_choose_desc'] !='')? @$get_booking_requests_to_display['user']['user_sitter_house']['about_home_desc'] : "No added yet"; ?>
                      </p>
                      <?php 
                      if(!empty($selected_pets)){
                      foreach($selected_pets as $single_guest){ ?>
                     <div class="media">
						<?php 
						if(!empty($single_guest->user_pet_galleries)){
						 ?>
                        <div class="media-left media-middle w-95">
                          <a href="#">
                            <img class="media-object sizei44 img-thumbnail " src="<?php echo HTTP_ROOT.'img/uploads/'.$single_guest->user_pet_galleries[0]->image; ?>" alt="...">
                          </a>
                        </div>
                        <?php } ?>
                        <div class="media-body">
                          <p class="media-heading1"><?php echo ucwords(@$single_guest->guest_name);?>
                          </p>
                          <p class="media-heading-msince">
                            <?php echo ucwords(@$single_guest->guest_gender); ?>
                          </p>
                          <p class="media-heading-msince">
                             <?php echo ucwords(@$single_guest->guest_breed); ?>
                          </p>
                          <p class="media-heading-msince" onclick="<?php 
                             $session = $this->request->session();
                             $session->write('profile','Guest');
                           ?>"> <?php 
                         @$age = explode(",",@$single_guest->guest_age);
                                                               echo @$age[0]." years"." ,".@$age[1]." months";
                                                                      ?>           
                         <p class="edit-d-pro">         
                         <?php  if($get_booking_requests_to_display['user']['user_type'] != "Basic"){ ?>
						
                            <a href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit Dog Profile')); ?>
                            </a>
                         
                         <?php }else{ ?>
							     <a href="">
                            </a>
							 <?php } ?>
                          </p>
                          <p>
                          </p>
                        </div>
                      </div>
                      <?php } 
                      }?>
                      <div class="tip-wrapper">
						<p class="click-bok1">
						  <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitterguide.com Tip')); ?> :
						  </b> <?php echo $this->requestAction('app/get-translate/'.base64_encode("All transactions booked and paid on Sitterguide.com are covered by Sitterguide’s")); ?>
						  <br>
						  <a href="<?php echo HTTP_ROOT."safety"; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Peace of Mind Protection')); ?> 
						  </a>.
						</p>
					  </div>
                      <div class="may-call-wrapper">
                        <p class="maycall-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('You may call jessica\'s permanent Sitter Guide number anytime')); ?>.
                        </p>
                        <p class="may-call-no">
                          <i class="fa fa-circle clgreen">
                          </i>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('(858) 375-4776')); ?>
                        </p>
                        <p class="sitterguide-no"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Jessica may call your Sitterguide number')); ?>:
                        </p>
                        <input type="number" class="form-control ">
                        <p class="sitterguide-no1">
                          <a href="#" class="colorblue"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Change your client setting for new clients')); ?>
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                

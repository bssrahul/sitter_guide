<?php       
		$session = $this->request->session();
		$cuntry_currency = $session->read("currency.currency");
		$cuntry_price = $session->read("currency.price");
		$cuntry_sign_code = $session->read("currency.sign_code");
?>
<div class="job-request-wrapper">
                    <p class="job-req">Job Request Detail
                    </p>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>From : 
                          </td>
                          <td><?php echo @$get_booking_requests_to_display['booknig_start_date'] != ""?@$get_booking_requests_to_display['booknig_start_date']:"_ _ _"; 
                            
                            
                         ?> 
                          </td>
                        </tr>
                        <tr>
                          <td>To :
                          </td>
                          <td><?php echo @$get_booking_requests_to_display['booking_end_date'] != ""?@$get_booking_requests_to_display['booking_end_date']:"_ _ _"; ?> 
                          </td>
                        </tr>
                        <tr>
                          <td>Service :
                          </td>
                          <td><?php 
                          $service = str_replace("_"," ",@$get_booking_requests_to_display['required_service']);
                          $service = $service != ""?$service:"_ _ _";
                               echo ucwords(@$service); 
                          ?> 
                          </td>
                        </tr>
                        <tr>
                          <td>Pets : 
                          </td>
                          <td><?php 
                          if(!empty(@$pets)){
							  echo implode(",",@$pets);
						  }else{
							  echo "_ _ _";
							  }
                          ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="width110">Stay Price : 
                          </td>
                          <td><?php echo $cuntry_sign_code." ".$cuntry_price*@$total; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Market Place:
                          </td>
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
                          <td>Notes :
                          </td>
                          <td><?php echo (@$get_booking_requests_to_display['message'] !='') ? @$get_booking_requests_to_display['message'] : "_ _ _"; ?> 
                          </td>
                          <td>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="rate-detail-wrapper">
                      <div class="rate-pad">
                        <p class="rate-det"> Rate Details: 
                        </p>
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>Hunter : 
                              </td>
                              <td><?php echo $cuntry_sign_code." ".$cuntry_price*@$total; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Extended Stay :
                              </td>
                              <td>X 1 night
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="sub-total">
                        <div class="htt">
                          <table class="table ">
                            <tbody>
                              <tr>
                                <td>Subtotal : 
                                </td>
                                <td><?php echo $cuntry_sign_code." ".$cuntry_price*@$total; ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                   <?php  if($get_booking_requests_to_display['user']['user_type'] != "Basic"){ ?>
                    <p class="click-bok">Click 
                      <a href="<?php echo HTTP_ROOT."booking/book-now".@$sitter_id; ?>">
                        <b>"Book It Now"
                        </b>
                      </a> to confirm and pay for this stay. Each Stay is covered by 
                      <a href="#">
                        <u>premium
                          insurance protection.
                        </u>
                      </a>
                    </p>
                    <button class="btn  btn-lg bt-now12 btn-block" type="button" onclick="location.href='<?php echo HTTP_ROOT."booking/book-now/".@$sitter_id; ?>'">
                      <i class="fa fa-check-circle-o">
                      </i> Book It Now
                    </button>
                    <?php } ?>
                  </div>
                  <div class="tip-wrapper">
                    <p class="click-bok1">
                      <b>Sitterguide.com Tip :
                      </b> All transactions booked and paid on Sitterguide.com are covered by Sitterguide’s
                      <br>
                      <a href=""> Peace of Mind Protection
                      </a>.
                    </p>
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
                            Memeber Since : <?php echo @$get_booking_requests_to_display['user']['date_added']; ?> 
                          </p>
                          <p>
                          </p>
                        </div>
                      </div>
                      <p class="text-mem"><?php echo (@$get_booking_requests_to_display['user']['user_about_sitter']['client_choose_desc'] !='')? @$get_booking_requests_to_display['user']['user_sitter_house']['about_home_desc'] : "No added yet"; ?>
                      </p>
                      <div class="media">
                        <div class="media-left media-middle w-95">
                          <a href="#">
                            <img class="media-object sizei44 img-thumbnail " src="<?php echo HTTP_ROOT; ?>img/profile-pic.png" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <p class="media-heading1">Hunter
                          </p>
                          <p class="media-heading-msince">
                            Male
                          </p>
                          <p class="media-heading-msince">
                            Labrador Retriever
                          </p>
                          <p class="media-heading-msince">1 year, 2 no. old
                          </p>
                          <p class="edit-d-pro">
                            <a href="">Edit Dog Profile
                            </a>
                          </p>
                          <p>
                          </p>
                        </div>
                      </div>
                      <div class="may-call-wrapper">
                        <p class="maycall-text">You may call jessica's permanent Rover number anytime.
                        </p>
                        <p class="may-call-no">
                          <i class="fa fa-circle clgreen">
                          </i>&nbsp; (858) 375-4776
                        </p>
                        <p class="sitterguide-no">Jessica may call your Sitterguide number:
                        </p>
                        <input type="number" class="form-control ">
                        <p class="sitterguide-no1">
                          <a href="#" class="colorblue">Change your client setting for new clients
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                

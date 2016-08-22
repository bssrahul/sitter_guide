<style type="text/css">
  .a,
  .a:visited {
    color: #176bb8;
    text-decoration: none;
  }
  .a:hover {
    text-decoration: underline;
  }
</style>
<!-- [Banner Area Start] -->
              <?php
					$session = $this->request->session();
					$userloginstatus = $session->read("User");
				    $cuntry_currency = $session->read("currency.currency");
					$cuntry_price = $session->read("currency.price");
					$cuntry_sign_code = $session->read("currency.sign_code");
                            
			       @$sh_day_rate = @$userData->user_sitter_services[0]->sh_day_rate != ''?@$userData->user_sitter_services[0]->sh_day_rate:0;
				   @$sh_night_rate = @$userData->user_sitter_services[0]->sh_night_rate != ''?@$userData->user_sitter_services[0]->sh_night_rate:0;
				   @$gh_day_rate = @$userData->user_sitter_services[0]->gh_day_rate != ''?@$userData->user_sitter_services[0]->gh_day_rate:0;
				   @$gh_night_rate = @$userData->user_sitter_services[0]->gh_night_rate != ''?@$userData->user_sitter_services[0]->gh_night_rate:0;
              ?>
<div class="saerch-s-det">
  <section class="banner-sitter-detail" style="background-image:url('<?php echo HTTP_ROOT.'img/uploads/'.($userData->profile_banner != ''?$userData->profile_banner:'sitter-detail-banner.jpg') ; ?>')">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 ">
          <div class="banner-info-wrapper">
            <div class="banner-info-inner">
              <div class="client-image center-block">
                <img src="<?php echo HTTP_ROOT.'img/uploads/'.(@$userData->image != ''?@$userData->image:'dm.png'); ?>" class="img-responsive img-circle" alt="client" > 
              </div>
              <h2 class="name-banner text-center">
                <?php echo @$userData->first_name." ".substr((@$userData->last_name)?@$userData->last_name:"",0,1)."."; ?> 
              </h2>
              <h3 class="punch-line">Reliable & Loving Petsitter 
              </h3>
              <h4 class="city-banner"> 
                <?php echo $userData->city.", ".@$userData->state.", ".@$userData->country; ?>
              </h4>
              <div class="badage-detail">
                <ul class="list-inline text-center">
					  <?php  if(($userData['users_badge'])!= ""){
							if($userData['users_badge']->dl_pcb_badge){?>
							 <li>
								 <a href="javascript:void(0)" data-html="true" title="<b>Sitter Guide Background Check</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter has successfully passed a basic background check by a third party provider." > 
														
									<img src="<?php echo HTTP_ROOT. 'img/Picture1.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
								</a>
							</li>
							<?php	}
							if($userData['users_badge']->cpr_rescue_badge){?>
								 <li>
									 <a href="javascript:void(0)" data-html="true" title="<b>Certificate in animal handling</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is a vet nurse, studying vet sciences or has a certificate in animal handling." > 
										<img src="<?php echo HTTP_ROOT. 'img/Picture8.png'; ?>" alt="Dl & PCB Badge"	height="23px" width="23px"/>
									</a>
								 </li>
							<?php	}
							if($userData['users_badge']->oral_injucted_badge){ ?>
								 <li>
									 <a href="javascript:void(0)" data-html="true" title="<b>Sitter Guide Administer Medication</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is comfortable to administer oral and injected medication." > 
										<img src="<?php echo HTTP_ROOT. 'img/Picture7.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
									</a>	
								 </li>
							<?php	}
							if($userData['users_badge']->ffo_area_badge){?>
								 <li>
									 <a href="javascript:void(0)" data-html="true" title="<b>Fully Fenced Area</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter has secure fenced garden or backyard." > 
										<img src="<?php echo HTTP_ROOT. 'img/Picture9.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
									</a>	
								 </li>
							<?php	}
				}?>
				</ul>
              </div>
              <div class="details-stars starPad">
                <ul class="list-inline text-center">
                  <?php  	$UserRatingData=$userData->user_ratings; 
							$accuracy_sum = 0;
							$comm_sum = 0;
							$clean_sum = 0;
							$location_sum = 0;
							$check_sum = 0;
							$rating_sum = 0;
							$count=0;
							foreach($UserRatingData as $UserRating){
							$count++;
							$accuracy_rating=$UserRating->accuracy_rating;
							$communication_rating=$UserRating->communication_rating;
							$cleanliness_rating=$UserRating->cleanliness_rating;
							$location_rating=$UserRating->location_rating;
							$check_in_rating=$UserRating->check_in_rating;
							$accuracy_sum = $accuracy_sum + $accuracy_rating;
							$comm_sum = $comm_sum + $communication_rating;
							$clean_sum = $clean_sum + $cleanliness_rating;
							$location_sum = $location_sum + $location_rating;
							$check_sum = $check_sum + $check_in_rating;
							}
							if($count > 0){
							$ac=$accuracy_sum/$count;
							$cm=$comm_sum/$count;
							$cl=$clean_sum/$count;
							$lc=$location_sum/$count;
							$ch=$check_sum/$count;
							$rating_sum=($ac+$cm+$cl+$lc+$ch)/5;
							}
						?>
                  <li>
                    <span class="rating mt-1 ">
                      <?php	if(!empty($rating_sum)){ 	
?>
                      <input type='radio'  value='5' 
                             <?php if(!empty($rating_sum)){ if($rating_sum 
                      <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> />
                        <label class = "full" for="star5" title="Awesome - 5 stars">
                        </label>
                        <input type="radio"  value="4.5" 
                               <?php if(!empty($rating_sum)){if($rating_sum 
                        <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> />
                          <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                          </label>
                          <input type="radio"  value="4"  
                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                          <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> />
                            <label class = "full" for="star4" title="Pretty good - 4 stars">
                            </label>
                            <input type="radio"  value="3.5"  
                                   <?php if(!empty($rating_sum)){ if($rating_sum 
                            <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> />
                              <label class="half" for="star3half" title="Meh - 3.5 stars">
                              </label>
                              <input type="radio"  value="3" 
                                     <?php if(!empty($rating_sum)){ if($rating_sum 
                              <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/>
                                <label class = "full" for="star3" title="Meh - 3 stars">
                                </label>
                                <input type="radio"  value="2.5" 
                                       <?php if(!empty($rating_sum)){ if($rating_sum 
                                <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/>
                                  <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                  </label>
                                  <input type="radio"   value="2"  
                                         <?php if(!empty($rating_sum)){ if($rating_sum 
                                  <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/>
                                    <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                    </label>
                                    <input type="radio"  value="1.5" 
                                           <?php if(!empty($rating_sum)){ if($rating_sum 
                                    <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/>
                                      <label class="half" for="star1half" title="Meh - 1.5 stars">
                                      </label>
                                      <input type="radio"  value="1" 
                                             <?php if(!empty($rating_sum)){ if($rating_sum 
                                      <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/>
                                        <label class = "full" for="star1" title="Sucks big time - 1 star">
                                        </label>
                                        <input type="radio"  value="0.5"  
                                               <?php if(!empty($rating_sum)){ if($rating_sum 
                                        <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/>
                                          <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                          </label>
                                          <?php $rating_sum=0;?>
                                          <?php }else{?>
                                          <input type='radio'  value='5' 
                                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                                          <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> />
                                            <label class = "full" for="star5" title="Awesome - 5 stars">
                                            </label>
                                            <input type="radio"  value="4.5" 
                                                   <?php if(!empty($rating_sum)){if($rating_sum 
                                            <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> />
                                              <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                              </label>
                                              <input type="radio"  value="4"  
                                                     <?php if(!empty($rating_sum)){ if($rating_sum 
                                              <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> />
                                                <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                </label>
                                                <input type="radio"  value="3.5"  
                                                       <?php if(!empty($rating_sum)){ if($rating_sum 
                                                <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> />
                                                  <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                  </label>
                                                  <input type="radio"  value="3" 
                                                         <?php if(!empty($rating_sum)){ if($rating_sum 
                                                  <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/>
                                                    <label class = "full" for="star3" title="Meh - 3 stars">
                                                    </label>
                                                    <input type="radio"  value="2.5" 
                                                           <?php if(!empty($rating_sum)){ if($rating_sum 
                                                    <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/>
                                                      <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                      </label>
                                                      <input type="radio"   value="2"  
                                                             <?php if(!empty($rating_sum)){ if($rating_sum 
                                                      <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/>
                                                        <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                        </label>
                                                        <input type="radio"  value="1.5" 
                                                               <?php if(!empty($rating_sum)){ if($rating_sum 
                                                        <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/>
                                                          <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                          </label>
                                                          <input type="radio"  value="1" 
                                                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                                                          <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/>
                                                            <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                            </label>
                                                            <input type="radio"  value="0.5"  
                                                                   <?php if(!empty($rating_sum)){ if($rating_sum 
                                                            <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/>
                                                              <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                              </label>
                                                              <?php $rating_sum=0;?>
                                                              <?php	} ?>
                                                              </span>
                                                            <!--/rating--> 
                                                            </li>
                                                          <li>&nbsp;
                                                          </li>
                                                          <li class="pad-review" >
                                                            <span > 
                                                              <?php if($count != ""){ echo "( ".$count. " reviews )" ;}else{echo "( 0 reviews )" ;} ?> 
                                                            </span>
                                                          </li>
                                                          </ul>
                                                        </div>
                                                      <div class="center-line">
                                                        <div class="col-lg-12 col-xs-12 col-md-12 col-xs-12">
                                                          <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-right0px ">
                                                              <h3 class="rates-detail marginrightminus"> 
                                                                <span>
                                                                  <?php echo "$cuntry_sign_code ".@$sh_day_rate; ?>
                                                                </span> per day
                                                              </h3>
                                                              <p class="rates-detail-caption">(Boarding in sitter)
                                                              </p>
                                                            </div> 
                                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-left0px ">
                                                              <h3 class="rates-detail marginleftminus xs-padt10"> 
                                                                <span>
                                                                  <?php echo "$cuntry_sign_code ".@$gh_day_rate; ?>
                                                                </span> per day
                                                              </h3>
                                                              <p class="rates-detail-caption">(House sitting)
                                                              </p>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-right0px  ">
                                                              <h3 class="rates-detail pad-t10 marginrightminus"> 
                                                                <span>
                                                                  <?php echo "$cuntry_sign_code ".(@$userData->user_sitter_services[0]->gh_drop_in_visit_rate != ''?@$userData->user_sitter_services[0]->gh_drop_in_visit_rate:0); ?>
                                                                </span> per day
                                                              </h3>
                                                              <p class="rates-detail-caption">(Drop visit home)
                                                              </p>
                                                            </div> 
                                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-left0px ">
                                                              <h3 class="rates-detail pad-t10  marginleftminus"> 
                                                                <span>
                                                                  <?php echo "$cuntry_sign_code ".(@$sh_day_rate + @$sh_night_rate); ?>
                                                                </span> per day
                                                              </h3>
                                                              <p class="rates-detail-caption">(D/Nt. care home)
                                                              </p>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <h5 class="additional">
                                                        <a href="#" data-toggle="modal" data-target="#myModal79"> More Services Available 
                                                        </a>
                                                      </h5>
                                                      <div class="text-center">
													     <?php 
				                                            if($userloginstatus){ 
																 if($guests_Info == ""){
																 ?>
																 <button class="btn btn-cont before-booking-request check-user"    data-toggle="modal" data-target="#popPetAddNotification">Book Now
															  </button>
																<?php }else{ ?>
																<button class="btn btn-cont before-booking-request check-user"    data-toggle="modal" data-target="#myModal79">Book Now
															  </button>
														  <?php }
                                                          }else{ ?>
															  <button class="btn btn-cont before-booking-request check-user"    data-toggle="modal" data-target="#alertUserLogin">Book Now
															  </button>
													  <?php } ?>
                                                      </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        <!--[Banner Area End]-->
                                        <!--content area Start-->
                                        <main>
                                          <!-- Get in Touch starts-->
                                          <section class="detail-content">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                  <div class="row spad-top ">
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                      <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                          <div class="spad-top ">   
                                                            <img src="<?php echo HTTP_ROOT.'img/uploads/'.(@$userData->image != ''?@$userData->image:'dm.png'); ?>" title="sitter image" class="img-responsive" alt="sitter"> 
                                                          </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                          <div class="detail-sitter-detail">
                                                            <h4 class="detail-sitter-name"> 
                                                              <?php echo @$userData->first_name." ".substr((@$userData->last_name)?@$userData->last_name:"",0,1)."."; ?>
                                                            </h4>
                                                            <p class="detail-sitter-location">  
                                                              <?php echo @$userData->city." ".@$userData->state.",".@$userData->country  ?>
                                                            </p>
                                                            <p class="detail-sitter-joined">Joined : 
                                                              <?php echo date_format(@$userData->date_added,'F Y');  ?>
                                                            </p>
                                                            <a class="reviews" href="#review-section">
                                                              <?php if($count != ""){ echo "( ".$count. " reviews )" ;}else{echo "( 0 reviews )" ;} ?>
                                                            </a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="btn-group btn-width100 pt15">
														  <?php if($userloginstatus){ 
															  
															  if($guests_Info == "" ){
															  ?>
															   <button class="btn btn-detsil-contact" type="button" data-toggle="modal" data-target="#popPetAddNotification">Contact  
                                                               <?php echo @$userData->first_name; ?>
                                                               </button> 
                                                        
															  <?php }else{ ?>
                                                        <button class="btn btn-detsil-contact" type="button" data-toggle="modal" data-target="#myModal79">Contact  
                                                          <?php echo @$userData->first_name; ?>
                                                        </button>
                                                        <?php }
                                                        
                                                         }else{ ?>
														  <button class="btn btn-detsil-contact" type="button" data-toggle="modal" data-target="#alertUserLogin">Contact  
                                                          <?php echo @$userData->first_name; ?>
                                                        </button>
														<?php } ?>
                                                        <div class="likebox favourite_sitter1"> 
                                                          <?php if(trim($userData->is_favourite)=='yes'){ ?>
                                                          <a data-count="<?php echo $userData->id; ?>" href="javascript:void(0);" class="unlike favouriteSection" data-href="<?php echo HTTP_ROOT.'Search/favorite-sitter/'.base64_encode(convert_uuencode($userData->id)).'/'.base64_encode(convert_uuencode($logedInUserId)); ?>"> 
                                                            <i class="icon-lock fa fa-heart heart-pos">
                                                            </i>
                                                          </a>
                                                          <?php }else{ ?>
                                                          <a data-count="<?php echo $userData->id; ?>" href="javascript:void(0);" class="like favouriteSection" data-href="<?php echo HTTP_ROOT.'Search/favorite-sitter/'.base64_encode(convert_uuencode($userData->id)).'/'.base64_encode(convert_uuencode($logedInUserId)); ?>">
                                                            <i class="icon-unlock fa fa-heart-o heart-pos">
                                                            </i>
                                                          </a>
                                                          <?php } ?>
                                                        </div>
                                                      </div>
                                                      </br>
                                                    </br>
                                                  <div>
                                                    <div class="availability">
                                                      <h5>
                                                        <?php echo @$userData->first_name." ".substr((@$userData->last_name)?@$userData->last_name:"",0,1)."."; ?> is available this Weekend
                                                      </h5>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                  <div class="recent-act-widget">
                                                    <div class="recent-act"> 
                                                      <?php echo @$userData->first_name; ?>'s Recent Activity
                                                    </div>
                                                    <ul class="list-unstyled">
                                                      <li>
                                                        <i class="fa fa-reply icon-width30">
                                                        </i>Response Rate : 
                                                        <b>100%
                                                        </b>
                                                      </li>
                                                      <li>
                                                        <span class="book">
                                                        </span>Average Response Time : 
                                                        <b>With in Hour
                                                        </b>
                                                      </li>
                                                      <li>
                                                        <i class="fa fa-user icon-width30 icon-p15"></i>Last Activity : 
                                                        <b>
                                                          <?php 
															if(@$userData->avail_status == 'Login'){
																echo '<span style="color:green">Available<//span>';
															}else{
																$seconds =  strtotime(date("Y-m-d H:i:s"))-strtotime(@$userData->last_login);
																$days    = floor($seconds / 86400);
																$hours = floor(($seconds - ($days * 86400)) / 3600);
																$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
																$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
																echo $days." days ".$hours." hours ".$minutes." min "."ago";
															}
															?>
                                                        </b>
                                                      </li>
                                                      <li>
                                                        <i class="fa fa-refresh icon-width30 icon-p15">
                                                        </i>Repeat Guest : 
                                                        <b> <?php echo $repeat_client; ?>
                                                        </b>
                                                      </li>
                                                    </ul>
                                                    <div class="border-bot">
                                                    </div>
                                                    <ul class="list-unstyled verified">
                                                      <li>
														<?php if(@$userData->mobile_verification == 1){ ?>  
                                                        <i class="fa fa-check icon-width30 font-size20">
                                                        </i>
                                                        <?php }else{ ?>
														 <i class="fa icon-width30"> <img src="<?php echo HTTP_ROOT. 'img/sms-unverify.png'; ?>" alt="/SMS Unverified" /></i>
														<?php }?>	
                                                         SMS Verified
                                                      </li>
                                                      <li>
													   <?php if(@$userData->status == 1){ ?>  
                                                        <i class="fa fa-check icon-width30 font-size20">
                                                        </i>
                                                        <?php }else{ ?>
															<i class="fa fa-times icon-width30 new-font-size20">
                                                        </i>
													    <?php } ?>
                                                         Email Verified
                                                      </li>
                                                    </ul>
                                                  </div>
                                                </div>
                                              </div>
                                              <h3 class="mid-sec-title border-bot pt30 ">About 
                                                <?php echo @$userData->first_name; ?>
                                              </h3>
                                              <h3 class="mid-sec-title1 ">Reliable & Loving Pet Sitter
                                              </h3>
                                              <p class="detail-text text-justify">
                                                <?php echo @$userData->user_about_sitter->your_self; ?>
                                              </p>
                                              <div class="video-container">
                                                <div class="imgWrap">
                                                  <a data-toggle="modal" href="#" data-target="#myModal2">
                                                    <img src="<?php echo HTTP_ROOT.'img/uploads/'.(@$userData->profile_video_image != ''?@$userData->profile_video_image:'dummy-video.png'); ?>" class="img-responsive" alt="polaroid" />
                                                    <p class="imgDescription">
                                                      <img src="<?php echo HTTP_ROOT; ?>img/detail-play.png" class="play-video-btn" width="90" height="64" alt="play">
                                                    </p>
                                                  </a>
                                                </div>
                                              </div>
                                              <?php if(isset($userData->user_sitter_galleries) && !empty($userData->user_sitter_galleries)){  ?>
                                              <h3 class="mid-sec-title1 pb15 ">
                                                <?php echo @$userData->first_name; ?>'s profile photos
                                              </h3>
                                              <div class="row">
                                                <div class="col-xs-12 col-md-12 col-sm-12 c0l-lg-12">
                                                  <?php	
$total_img=count($userData->user_sitter_galleries);?>
                                                  <div id="myCarousel5" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">
                                                      <div class="item active">
                                                        <div class="row">
                                                          <?php 
$i = 1;
foreach($userData->user_sitter_galleries as $key=>$single_image){ ?>
                                                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                            <?php $fg=1; ?>
                                                            <img src="<?php echo HTTP_ROOT.'img/uploads/'.$single_image->image; ?>" class="img-responsive responsivept15" alt="client1">
                                                          </div>
                                                          <?php 
if($i%4==0 && $i < $total_img){
echo '</div></div><div class="item"><div class="row">';
}
$i++;
} 
//if(count($userData->user_sitter_galleries)<4){echo "</div></div>"; } ?>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <a class="left carousel-control" href="#myCarousel5" role="button" data-slide="prev">
                                                      <span class=" fa fa-chevron-circle-left" aria-hidden="true">
                                                      </span>
                                                      <span class="sr-only">Previous
                                                      </span>
                                                    </a>
                                                    <a class="right carousel-control" href="#myCarousel5" role="button" data-slide="next">
                                                      <span class="fa fa-chevron-circle-right" aria-hidden="true">
                                                      </span>
                                                      <span class="sr-only">Next
                                                      </span>
                                                    </a>
                                                  </div>
                                                  <!-- Left and right controls -->
                                                </div>
                                              </div>
                                              <?php } ?>
                                              
                                               <?php 
                                              if(!empty(@$userData->user_professional_accreditations_details)){
											   /*$skills = ["languages","experience","training_techniques"]; 
												 foreach($petSizesArr as $size_val){
														  if(in_array($size_val, $skills))
														  {
															 $matchaddSkills = "match_found";
															 break;
														  }else{
															 $matchaddSkills = "match_not_found";
														  }
												}
												if($matchaddSkills == "match_found"){	*/
												?>
                                               <div class="one">
                                                <div class="border-bot pt30">
                                                </div>
                                                <h5 class="small-title">Specified Skills &nbsp;
                                                  <span>
                                                    <?php if(($userData['users_badge'])!= ""){
							
															if($userData['users_badge']->dl_pcb_badge){?>
																
															 <i>
																 <a href="javascript:void(0)" data-html="true" title="<b>Sitter Guide Background Check</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter has successfully passed a basic background check by a third party provider." > 
																						
																	<img src="<?php echo HTTP_ROOT. 'img/Picture1.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
																</a>
															</i>
																
															<?php	}
															if($userData['users_badge']->cpr_rescue_badge){?>
																 <i>
																	 <a href="javascript:void(0)" data-html="true" title="<b>Certificate in animal handling</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is a vet nurse, studying vet sciences or has a certificate in animal handling." > 
																		<img src="<?php echo HTTP_ROOT. 'img/Picture8.png'; ?>" alt="Dl & PCB Badge"	height="23px" width="23px"/>
																	</a>
																 </i>
															<?php	}
															
															
															}
														?>
                                                  </span>
                                                </h5>
                                               <?php if(!empty(@$userData->user_professional_accreditations_details[0]->languages) || !empty(@$userData->user_professional_accreditations_details[0]->experience)){ ?>
                                                <div class="row">
											   <?php if(!empty(@$userData->user_professional_accreditations_details[0]->languages)){ ?>
												 <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
													<?php $langArr = array('en'=>'english','fr'=>'french','de'=>'german','hu'=>'hungarian','it'=>'italian','ro'=>'romanian','es'=>'spanish'); ?>
													
                                                    <p class="pt10">
                                                      <span class="speak">
                                                      </span>Can speak
                                                      <?php 
                                                      $selected_langArr = explode(",",@$userData->user_professional_accreditations_details[0]->languages);
                                                    
                                                      $main_lang = "";
                                                      $totalVal = count($selected_langArr);
                                                      $i=1;
                                                      foreach($selected_langArr as $single_lang){
														if(($totalVal-1)==$i){
															$saparated = " & ";
														}else{
															$saparated = ", ";
														}
														  $main_lang .= ucwords($langArr[$single_lang]).$saparated; 
														  $i++;
													  }
													    //echo $main_lang;
													   echo @$main_lang = rtrim($main_lang,",");
													   
													?>
                                                    </p>
                                                  </div>
                                                  <?php } 
                                                  
                                                  if(!empty(@$userData->user_professional_accreditations_details[0]->experience)){
                                                  ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="experience">
                                                      </span>
                                                      <?php echo @$userData->user_professional_accreditations_details[0]->experience;?> + years of experience
                                                    </p>
                                                  </div>
                                                  <?php } ?>
                                                  
                                                </div>
                                                <?php }
                                                if(!empty(@$userData->user_professional_accreditations_details[0]->training_techniques)){ ?>
                                                <div class="row">
												  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="familar">
                                                      </span>Familiar with
                                                      <?php echo @$userData->user_professional_accreditations_details[0]->training_techniques; ?> training techniques 
                                                    </p>
                                                  </div>
                                                </div>
                                                <?php } ?>
                                              </div>
                                              <div class="one">
												<div class="border-bot pt30">
                                                </div>
                                                <h5 class="small-title">I have experience with &nbsp;
                                                  <span>
                                                    
                                                     <?php if(($userData['users_badge'])!= ""){
							
															
															if($userData['users_badge']->cpr_rescue_badge){?>
																	<i>
																	 <a href="javascript:void(0)" data-html="true" title="<b>Certificate in animal handling</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is a vet nurse, studying vet sciences or has a certificate in animal handling." > 
																		<img src="<?php echo HTTP_ROOT. 'img/Picture8.png'; ?>" alt="Dl & PCB Badge"	height="23px" width="23px"/>
																	</a>
																	</i>
																 
															<?php	}
															if($userData['users_badge']->oral_injucted_badge){?>
																	<i>
																	 <a href="javascript:void(0)" data-html="true" title="<b>Sitter Guide Administer Medication</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is comfortable to administer oral and injected medication." > 
																		<img src="<?php echo HTTP_ROOT. 'img/Picture7.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
																	</a>	
																	</i>
															<?php	}
															
													}?>
                                                    
                                                  </span>
                                                </h5>
                                                
                                                <div class="row">
                                                  <?php if(@$userData->user_professional_accreditations_details[0]->ex_behavioural_problems !=''){ ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="behave">
                                                      </span>Experience with Behavioural Problems
                                                    </p>
                                                  </div>
                                                  <?php } ?>
                                                  <?php if(@$userData->user_professional_accreditations_details[0]->ex_rescue_pets !=''){ ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="rescue">
                                                      </span>Rescuing pets
                                                    </p>
                                                  </div>
                                                  <?php }
if((@$userData->user_professional_accreditations_details[0]->ex_behavioural_problems =='') && (@$userData->user_professional_accreditations_details[0]->ex_rescue_pets =='')){ 
?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="rescue">
                                                      </span>Sitter have no experience with medications
                                                    </p>
                                                  </div>
                                                  <?php } ?>
                                                </div>
                                              </div>
                                              <div class="one">
											 <?php } 
											  if(!empty(@$userData->user_sitter_services)){
											 ?>
											 <div class="border-bot pt30">
                                             </div>
                                                <h5 class="small-title">Benefits &nbsp;
                                                  <span>
                                                    
                                                     <?php if(($userData['users_badge'])!= ""){
							
															if($userData['users_badge']->dl_pcb_badge){?>
																
															 <i>
																 <a href="javascript:void(0)" data-html="true" title="<b>Sitter Guide Background Check</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter has successfully passed a basic background check by a third party provider." > 
																						
																	<img src="<?php echo HTTP_ROOT. 'img/Picture1.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
																</a>
															</i>
																
															<?php	}
															if($userData['users_badge']->cpr_rescue_badge){?>
																 <i>
																	 <a href="javascript:void(0)" data-html="true" title="<b>Certificate in animal handling</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is a vet nurse, studying vet sciences or has a certificate in animal handling." > 
																		<img src="<?php echo HTTP_ROOT. 'img/Picture8.png'; ?>" alt="Dl & PCB Badge"	height="23px" width="23px"/>
																	</a>
																 </i>
															<?php	}
															
															
															}?>
                                                   
                                                  </span>
                                                </h5>
                                                <div class="row">
                                                  <?php if(@$userData->user_sitter_services[0]->booking_status =='1'){ ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="book">
                                                      </span>Last minute bookings 
                                                    </p>
                                                  </div>
                                                  <?php }
														if(@$userData->user_sitter_services[0]->cancellation_policy_status =='1'){ 
                                                  ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="cancel">
                                                      </span>Moderate cancellation policy
                                                    </p>
                                                  </div>
                                                  <?php } 
												     if((@$userData->user_sitter_services[0]->booking_status !='1') && (@$userData->user_sitter_services[0]->cancellation_policy_status !='1')){ 
												  ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">No Benefits
                                                    </p>
                                                  </div>
                                                  <?php } ?>
                                                </div>
                                              </div>
                                              <?php } 
                                                 if(!empty(@$userData->user_sitter_house)){
                                              ?>
                                              <div class="one">
                                                <div class="border-bot pt30">
                                                </div>
                                                <h5 class="small-title">About 
                                                  <?php echo $userData->first_name; ?>'s Home&nbsp;
                                                  <span>
                                                    <i>
                                                      <?php if(($userData['users_badge'])!= ""){
							
																if($userData['users_badge']->ffo_area_badge){?>
																	
																		 <a href="javascript:void(0)" data-html="true" title="<b>Fully Fenced Area</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter has secure fenced garden or backyard." > 
																			<img src="<?php echo HTTP_ROOT. 'img/Picture9.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
																		</a>	
																	 
																<?php	}
													}?>
                                                    </i>
                                                    
                                                  </span>
                                                </h5>
                                                <div class="row">
                                                  <?php if(@$userData->user_sitter_house->fully_fenced =='yes'){ ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="fence">
                                                      </span>Has a fenced yard
                                                    </p>
                                                  </div>
                                                  <?php } 
if(@$userData->user_sitter_house->smokers =='no'){ 
?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="smoke">
                                                      </span>Non-Smoking Household 
                                                    </p>
                                                  </div>
                                                  <?php } 
if(@$userData->user_sitter_house->cats_in_home =='yes'){ ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="onecat">
                                                      </span>Has One Cat
                                                    </p>
                                                  </div>
                                                  <?php } 
if(@$userData->user_sitter_house->dogs_in_home =='yes'){ 
?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="onedog">
                                                      </span>Has Two Dogs 
                                                    </p>
                                                  </div>
                                                  <?php } 
if((@$userData->user_sitter_house->fully_fenced =='yes') && (@$userData->user_sitter_house->smokers =='no') && (@$userData->user_sitter_house->cats_in_home =='yes') && (@$userData->user_sitter_house->dogs_in_home =='yes')){ ?>
                                                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                    <p class="pt10">
                                                      <span class="onedog">
                                                      </span>No information added on sitter home.
                                                    </p>
                                                  </div>
                                                  <?php } ?>
                                                </div>
                                              </div>
                                              
                                              <div class="one">
                                                <div class="border-bot pt30">
                                                </div>
                                                <h5 class="small-title">About my home
                                                </h5>
                                                <p class="detail-text text-justify">
                                                  <?php echo @$userData->user_sitter_house->about_home_desc; ?>
                                                </p>
                                              </div>
                                              
                                              <div class="one">
                                                <div class="border-bot pt30">
                                                </div>
                                                <h5 class="small-title">Description of places you will have access to
                                                </h5>
                                                <p class="detail-text text-justify">
                                                  <?php echo @$userData->user_sitter_house->spaces_access_desc; ?>
                                                </p>
                                              </div>
                                             <?php } ?>
                                              <!--<div class="row pt10 ">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<img src="<?php echo HTTP_ROOT; ?>img/detail-space1.jpg" class="img-responsive responsivept15" alt="client1"> </div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<img src="<?php echo HTTP_ROOT; ?>img/detail-space2.jpg" class="img-responsive responsivept15" alt="client1"> </div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<img src="<?php echo HTTP_ROOT; ?>img/detail-space3.jpg" class="img-responsive responsivept15" alt="client1"> </div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<img src="<?php echo HTTP_ROOT; ?>img/detail-space4.jpg" class="img-responsive responsivept15" alt="client1"> </div>
</div>-->  
                                            <?php if(!empty($user_pets->user_pets[0]->user_pet_galleries)){ ?>
                                            
                                              <div class="one">
                                                <div class="border-bot pt30">
                                                </div>
                                                <h5 class="small-title">My Pets
                                                </h5>
                                                <p class="detail-text text-justify">
                                                  <?php echo @$userData->user_sitter_house->home_pets_desc; ?>
                                                </p>
                                              </div>
                                               
                                              
                                              <div class="row pt10 ">
												<?php foreach(@$userData->user_pets[0]->user_pet_galleries as $single_pet){
													
													 ?>
												<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                  <div class="img-thumbnail"> 
                                                    <img  src="<?php echo HTTP_ROOT.'img/uploads/'.$single_pet->image; ?>" class="img-responsive responsivept15" alt="client1">
                                                    <p class="dogname">Jackey
                                                    </p>
                                                    <p class="dogbreed">Dachshund
                                                    </p>
                                                  </div>
                                                </div>
                                                <?php } ?>
                                                <!--<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                  <div class="img-thumbnail"> 
                                                    <img src="<?php echo HTTP_ROOT; ?>img/detail-client4.jpg" class="img-responsive responsivept15" alt="client1">
                                                    <p class="dogname">Harry
                                                    </p>
                                                    <p class="dogbreed">Dachshund
                                                    </p>
                                                  </div>
                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                  <div class="img-thumbnail"> 
                                                    <img src="<?php echo HTTP_ROOT; ?>img/detail-client1.jpg" class="img-responsive responsivept15" alt="client1">
                                                    <p class="dogname">Lina
                                                    </p>
                                                    <p class="dogbreed">Dachshund
                                                    </p>
                                                  </div>
                                                </div>-->
                                                
                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                  <div class="img-thumbnail"> 
                                                    <img src="<?php echo HTTP_ROOT; ?>img/detail-client3.jpg" class="img-responsive responsivept15" alt="client1">
                                                    <p class="dogname">Scooby
                                                    </p>
                                                    <p class="dogbreed">Dachshund
                                                    </p>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                              
                                              <?php } ?>
                                              <div class="row">
                                                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                                  <div class="one">
                                                    <div class="border-bot pt30">
                                                    </div>
                                                    <?php $UserRatingData=$userData->user_ratings; 
													$accuracy_sum = 0;
													$comm_sum = 0;
													$clean_sum = 0;
													$location_sum = 0;
													$check_sum = 0;
													$rating_sum = 0;
													$count=0;
													foreach($UserRatingData as $UserRating){
													$count++;
													$accuracy_rating=$UserRating->accuracy_rating;
													$communication_rating=$UserRating->communication_rating;
													$cleanliness_rating=$UserRating->cleanliness_rating;
													$location_rating=$UserRating->location_rating;
													$check_in_rating=$UserRating->check_in_rating;
													$accuracy_sum = $accuracy_sum + $accuracy_rating;
													$comm_sum = $comm_sum + $communication_rating;
													$clean_sum = $clean_sum + $cleanliness_rating;
													$location_sum = $location_sum + $location_rating;
													$check_sum = $check_sum + $check_in_rating;
													}
													if($count > 0){
													$ac=$accuracy_sum/$count;
													$cm=$comm_sum/$count;
													$cl=$clean_sum/$count;
													$lc=$location_sum/$count;
													$ch=$check_sum/$count;
													$rating_sum=($ac+$cm+$cl+$lc+$ch)/5;
													}
													?>
													 <h3 class="mid-sec-title pt15 ">
                                                      <?php echo $this->requestAction('app/get-translate/'.base64_encode('Testimonials and Reviews')); ?>  &nbsp 
                                                      <span>
                                                        <i>
                                                          <img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-1.png" > 
                                                        </i>
                                                        <i> 
                                                          <img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-2.png">
                                                        </i>
                                                      </span>
                                                    </h3>
                                                    <ul class="list-inline pt15">
                                                      <li  class="reviews-bold prelative">
														  <span style="position:relative; top:-15px;" >
                                                        <?php echo $count." ".$this->requestAction('app/get-translate/'.base64_encode('Reviews')); ?> </span>
                                                      </li>
                                                      <li > 
                                                        <div class="rating-box prelative">
                                                          <span class="rating  ">
                                                            <?php	if(!empty($rating_sum)){ 	
?>
                                                            <input type='radio'  value='5' 
                                                                   <?php if(!empty($rating_sum)){ if($rating_sum 
                                                            <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> />
                                                              <label class = "full" for="star5" title="Awesome - 5 stars">
                                                              </label>
                                                              <input type="radio"  value="4.5" 
                                                                     <?php if(!empty($rating_sum)){if($rating_sum 
                                                              <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> />
                                                                <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                </label>
                                                                <input type="radio"  value="4"  
                                                                       <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> />
                                                                  <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                  </label>
                                                                  <input type="radio"  value="3.5"  
                                                                         <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                  <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> />
                                                                    <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                    </label>
                                                                    <input type="radio"  value="3" 
                                                                           <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                    <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/>
                                                                      <label class = "full" for="star3" title="Meh - 3 stars">
                                                                      </label>
                                                                      <input type="radio"  value="2.5" 
                                                                             <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                      <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/>
                                                                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                        </label>
                                                                        <input type="radio"   value="2"  
                                                                               <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                        <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/>
                                                                          <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                          </label>
                                                                          <input type="radio"  value="1.5" 
                                                                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                          <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/>
                                                                            <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                            </label>
                                                                            <input type="radio"  value="1" 
                                                                                   <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                            <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/>
                                                                              <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                              </label>
                                                                              <input type="radio"  value="0.5"  
                                                                                     <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                              <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/>
                                                                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                </label>
                                                                                <?php $rating_sum=0;?>
                                                                                <?php }else{?>
                                                                                <input type='radio'  value='5' 
                                                                                       <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> />
                                                                                  <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                                  </label>
                                                                                  <input type="radio"  value="4.5" 
                                                                                         <?php if(!empty($rating_sum)){if($rating_sum 
                                                                                  <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> />
                                                                                    <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                                    </label>
                                                                                    <input type="radio"  value="4"  
                                                                                           <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                    <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> />
                                                                                      <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                                      </label>
                                                                                      <input type="radio"  value="3.5"  
                                                                                             <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                      <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> />
                                                                                        <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                                        </label>
                                                                                        <input type="radio"  value="3" 
                                                                                               <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                        <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/>
                                                                                          <label class = "full" for="star3" title="Meh - 3 stars">
                                                                                          </label>
                                                                                          <input type="radio"  value="2.5" 
                                                                                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                          <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/>
                                                                                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                                            </label>
                                                                                            <input type="radio"   value="2"  
                                                                                                   <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                            <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/>
                                                                                              <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                                              </label>
                                                                                              <input type="radio"  value="1.5" 
                                                                                                     <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                              <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/>
                                                                                                <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                                                </label>
                                                                                                <input type="radio"  value="1" 
                                                                                                       <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                                <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/>
                                                                                                  <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                                                  </label>
                                                                                                  <input type="radio"  value="0.5"  
                                                                                                         <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                                  <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/>
                                                                                                    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                                    </label>
                                                                                                    <?php $rating_sum=0;?>
                                                                                                    <?php	} ?>
                                                                                                    </span>
                                                                                                  <!--/rating--> 
                                                                                                  </div>
                                                                                                </li>
                                                                                              </ul>
                                                                                            <div class="row">
                                                                                              <div class="col-xs-12 md-sm-3 col-lg-3 col-sm-3">
                                                                                                <p class="summary">Summary
                                                                                                </p>
                                                                                              </div>
                                                                                              <div class="col-xs-12 md-sm-9 col-lg-8 col-sm-9">
                                                                                                <div class="row">
                                                                                                  <div class=" col-sm-6 col-md-6 col-xs-12 col-lg-6">
                                                                                                    <div class="rewiw-width100">
                                                                                                      <div class="rewiw-width50">
                                                                                                        <p>Accuracy
                                                                                                        </p>
                                                                                                      </div>
                                                                                                      <div class="rewiw-width50">
                                                                                                        <div class="rating-box">
                                                                                                          <!--rating-->
                                                                                                          <!--<div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>-->
                                                                                                          <span class="rating no-topmg mt-1 ">
                                                                                                            <?php	if(!empty($ac)){ 	
?>
                                                                                                            <input type='radio'  value='5' 
                                                                                                                   <?php if(!empty($ac)){ if($ac 
                                                                                                            <= 5 && $ac > 4.5){ echo "checked"; } }?> />
                                                                                                              <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                                                              </label>
                                                                                                              <input type="radio"  value="4.5" 
                                                                                                                     <?php if(!empty($ac)){if($ac 
                                                                                                              <= 4.5 && $ac > 4){ echo "checked"; } } ?> />
                                                                                                                <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                                                                </label>
                                                                                                                <input type="radio"  value="4"  
                                                                                                                       <?php if(!empty($ac)){ if($ac 
                                                                                                                <= 4 && $ac > 3.5){ echo "checked"; }} ?> />
                                                                                                                  <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                                                                  </label>
                                                                                                                  <input type="radio"  value="3.5"  
                                                                                                                         <?php if(!empty($ac)){ if($ac 
                                                                                                                  <= 3.5 && $ac > 3){ echo "checked"; } } ?> />
                                                                                                                    <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                                                                    </label>
                                                                                                                    <input type="radio"  value="3" 
                                                                                                                           <?php if(!empty($ac)){ if($ac 
                                                                                                                    <= 3 && $ac > 2.5){ echo "checked"; } } ?>/>
                                                                                                                      <label class = "full" for="star3" title="Meh - 3 stars">
                                                                                                                      </label>
                                                                                                                      <input type="radio"  value="2.5" 
                                                                                                                             <?php if(!empty($ac)){ if($ac 
                                                                                                                      <= 2.5 && $ac > 2){ echo "checked"; } } ?>/>
                                                                                                                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                                                                        </label>
                                                                                                                        <input type="radio"   value="2"  
                                                                                                                               <?php if(!empty($ac)){ if($ac 
                                                                                                                        <= 2 && $ac > 1.5){ echo "checked"; } } ?>/>
                                                                                                                          <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                                                                          </label>
                                                                                                                          <input type="radio"  value="1.5" 
                                                                                                                                 <?php if(!empty($ac)){ if($ac 
                                                                                                                          <= 1.5 && $ac > 1){ echo "checked"; } } ?>/>
                                                                                                                            <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                                                                            </label>
                                                                                                                            <input type="radio"  value="1" 
                                                                                                                                   <?php if(!empty($ac)){ if($ac 
                                                                                                                            <= 1 && $ac > 0.5){ echo "checked"; } } ?>/>
                                                                                                                              <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                                                                              </label>
                                                                                                                              <input type="radio"  value="0.5"  
                                                                                                                                     <?php if(!empty($ac)){ if($ac 
                                                                                                                              <= 0.5 && $ac >= 0){ echo "checked"; } } ?>/>
                                                                                                                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                                                                </label>
                                                                                                                                <?php $ac=0;?>
                                                                                                                                <?php }else{?>
                                                                                                                                <input type='radio'  value='5' 
                                                                                                                                       <?php if(!empty($ac)){ if($ac 
                                                                                                                                <= 5 && $ac > 4.5){ echo "checked"; } }?> />
                                                                                                                                  <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                                                                                  </label>
                                                                                                                                  <input type="radio"  value="4.5" 
                                                                                                                                         <?php if(!empty($ac)){if($ac 
                                                                                                                                  <= 4.5 && $ac > 4){ echo "checked"; } } ?> />
                                                                                                                                    <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                                                                                    </label>
                                                                                                                                    <input type="radio"  value="4"  
                                                                                                                                           <?php if(!empty($ac)){ if($ac 
                                                                                                                                    <= 4 && $ac > 3.5){ echo "checked"; }} ?> />
                                                                                                                                      <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                                                                                      </label>
                                                                                                                                      <input type="radio"  value="3.5"  
                                                                                                                                             <?php if(!empty($ac)){ if($ac 
                                                                                                                                      <= 3.5 && $ac > 3){ echo "checked"; } } ?> />
                                                                                                                                        <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                                                                                        </label>
                                                                                                                                        <input type="radio"  value="3" 
                                                                                                                                               <?php if(!empty($ac)){ if($ac 
                                                                                                                                        <= 3 && $ac > 2.5){ echo "checked"; } } ?>/>
                                                                                                                                          <label class = "full" for="star3" title="Meh - 3 stars">
                                                                                                                                          </label>
                                                                                                                                          <input type="radio"  value="2.5" 
                                                                                                                                                 <?php if(!empty($ac)){ if($ac 
                                                                                                                                          <= 2.5 && $ac > 2){ echo "checked"; } } ?>/>
                                                                                                                                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                                                                                            </label>
                                                                                                                                            <input type="radio"   value="2"  
                                                                                                                                                   <?php if(!empty($ac)){ if($ac 
                                                                                                                                            <= 2 && $ac > 1.5){ echo "checked"; } } ?>/>
                                                                                                                                              <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                                                                                              </label>
                                                                                                                                              <input type="radio"  value="1.5" 
                                                                                                                                                     <?php if(!empty($ac)){ if($ac 
                                                                                                                                              <= 1.5 && $ac > 1){ echo "checked"; } } ?>/>
                                                                                                                                                <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                                                                                                </label>
                                                                                                                                                <input type="radio"  value="1" 
<?php if(!empty($ac)){ if($ac 
                                                                                                                                                <= 1 && $ac > 0.5){ echo "checked"; } } ?>/>
                                                                                                                                                  <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                                                                                                  </label>
                                                                                                                                                  <input type="radio"  value="0.5"  
<?php if(!empty($ac)){ if($ac 
                                                                                                                                                  <= 0.5 && $ac >= 0){ echo "checked"; } } ?>/>
                                                                                                                                                    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                                                                                    </label>
                                                                                                                                                    <?php $ac=0;?>
                                                                                                                                                    <?php	} ?>
                                                                                                                                                    </span>
                                                                                                                                                  <!--/rating--> 
                                                                                                                                                  </div>
                                                                                                                                                </div>
                                                                                                                                              </div>
                                                                                                                                            <div class="rewiw-width100">
                                                                                                                                              <div class="rewiw-width50">
                                                                                                                                                <p>Communication
                                                                                                                                                </p>
                                                                                                                                              </div>
                                                                                                                                              <div class="rewiw-width50">
                                                                                                                                                <div class="rating-box">
                                                                                                                                                  <span class="rating no-topmg mt-1 ">
                                                                                                                                                    <?php	if(!empty($cm)){ 	
?>
                                                                                                                                                    <input type='radio'  value='5' 
<?php if(!empty($cm)){ if($cm 
                                                                                                                                                    <= 5 && $cm > 4.5){ echo "checked"; } }?> 
<?php if(!empty($cm)){if($cm 
                                                                                                                                                      <= 4.5 && $cm > 4){ echo "checked"; } } ?> />
<label class="half" for="star4half" title="Pretty good - 4.5 stars">
</label>
<input type="radio"  value="4"  
       <?php if(!empty($cm)){ if($cm 
<= 4 && $cm > 3.5){ echo "checked"; }} ?> />
  <label class = "full" for="star4" title="Pretty good - 4 stars">
  </label>
  <input type="radio"  value="3.5"  
         <?php if(!empty($cm)){ if($cm 
  <= 3.5 && $cm > 3){ echo "checked"; } } ?> />
    <label class="half" for="star3half" title="Meh - 3.5 stars">
    </label>
    <input type="radio"  value="3" 
           <?php if(!empty($cm)){ if($cm 
    <= 3 && $cm > 2.5){ echo "checked"; } } ?>/>
      <label class = "full" for="star3" title="Meh - 3 stars">
      </label>
      <input type="radio"  value="2.5" 
             <?php if(!empty($cm)){ if($cm 
      <= 2.5 && $cm > 2){ echo "checked"; } } ?>/>
        <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
        </label>
        <input type="radio"   value="2"  
               <?php if(!empty($cm)){ if($cm 
        <= 2 && $cm > 1.5){ echo "checked"; } } ?>/>
          <label class = "full" for="star2" title="Kinda bad - 2 stars">
          </label>
          <input type="radio"  value="1.5" 
                 <?php if(!empty($cm)){ if($cm 
          <= 1.5 && $cm > 1){ echo "checked"; } } ?>/>
            <label class="half" for="star1half" title="Meh - 1.5 stars">
            </label>
            <input type="radio"  value="1" 
                   <?php if(!empty($cm)){ if($cm 
            <= 1 && $cm > 0.5){ echo "checked"; } } ?>/>
              <label class = "full" for="star1" title="Sucks big time - 1 star">
              </label>
              <input type="radio"  value="0.5"  
                     <?php if(!empty($cm)){ if($cm 
              <= 0.5 && $cm >= 0){ echo "checked"; } } ?>/>
                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                </label>
                <?php $cm=0;?>
                <?php }else{?>
                <input type='radio'  value='5' 
                       <?php if(!empty($cm)){ if($cm 
                <= 5 && $cm > 4.5){ echo "checked"; } }?> />
                  <label class = "full" for="star5" title="Awesome - 5 stars">
                  </label>
                  <input type="radio"  value="4.5" 
                         <?php if(!empty($cm)){if($cm 
                  <= 4.5 && $cm > 4){ echo "checked"; } } ?> />
                    <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                    </label>
                    <input type="radio"  value="4"  
                           <?php if(!empty($cm)){ if($cm 
                    <= 4 && $cm > 3.5){ echo "checked"; }} ?> />
                      <label class = "full" for="star4" title="Pretty good - 4 stars">
                      </label>
                      <input type="radio"  value="3.5"  
                             <?php if(!empty($cm)){ if($cm 
                      <= 3.5 && $cm > 3){ echo "checked"; } } ?> />
                        <label class="half" for="star3half" title="Meh - 3.5 stars">
                        </label>
                        <input type="radio"  value="3" 
                               <?php if(!empty($cm)){ if($cm 
                        <= 3 && $cm > 2.5){ echo "checked"; } } ?>/>
                          <label class = "full" for="star3" title="Meh - 3 stars">
                          </label>
                          <input type="radio"  value="2.5" 
                                 <?php if(!empty($cm)){ if($cm 
                          <= 2.5 && $cm > 2){ echo "checked"; } } ?>/>
                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                            </label>
                            <input type="radio"   value="2"  
                                   <?php if(!empty($cm)){ if($cm 
                            <= 2 && $cm > 1.5){ echo "checked"; } } ?>/>
                              <label class = "full" for="star2" title="Kinda bad - 2 stars">
                              </label>
                              <input type="radio"  value="1.5" 
                                     <?php if(!empty($cm)){ if($cm 
                              <= 1.5 && $cm > 1){ echo "checked"; } } ?>/>
                                <label class="half" for="star1half" title="Meh - 1.5 stars">
                                </label>
                                <input type="radio"  value="1" 
                                       <?php if(!empty($cm)){ if($cm 
                                <= 1 && $cm > 0.5){ echo "checked"; } } ?>/>
                                  <label class = "full" for="star1" title="Sucks big time - 1 star">
                                  </label>
                                  <input type="radio"  value="0.5"  
                                         <?php if(!empty($cm)){ if($cm 
                                  <= 0.5 && $cm >= 0){ echo "checked"; } } ?>/>
                                    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                    </label>
                                    <?php $cm=0;?>
                                    <?php	} ?>
                                    </span>
                                  <!--/rating--> 
                                  </div>
                                </div>
                              </div>
                            <div class="rewiw-width100">
                              <div class="rewiw-width50">
                                <p>Cleanliness
                                </p>
                              </div>
                              <div class="rewiw-width50">
                                <div class="rating-box">
                                  <span class="rating no-topmg mt-1 ">
                                    <?php	if(!empty($cl)){ 	
?>
                                    <input type='radio'  value='5' 
                                           <?php if(!empty($cl)){ if($cl 
                                    <= 5 && $cl > 4.5){ echo "checked"; } }?> />
                                      <label class = "full" for="star5" title="Awesome - 5 stars">
                                      </label>
                                      <input type="radio"  value="4.5" 
                                             <?php if(!empty($cl)){if($cl 
                                      <= 4.5 && $cl > 4){ echo "checked"; } } ?> />
                                        <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                        </label>
                                        <input type="radio"  value="4"  
                                               <?php if(!empty($cl)){ if($cl 
                                        <= 4 && $cl > 3.5){ echo "checked"; }} ?> />
                                          <label class = "full" for="star4" title="Pretty good - 4 stars">
                                          </label>
                                          <input type="radio"  value="3.5"  
                                                 <?php if(!empty($cl)){ if($cl 
                                          <= 3.5 && $cl > 3){ echo "checked"; } } ?> />
                                            <label class="half" for="star3half" title="Meh - 3.5 stars">
                                            </label>
                                            <input type="radio"  value="3" 
                                                   <?php if(!empty($cl)){ if($cl 
                                            <= 3 && $cl > 2.5){ echo "checked"; } } ?>/>
                                              <label class = "full" for="star3" title="Meh - 3 stars">
                                              </label>
                                              <input type="radio"  value="2.5" 
                                                     <?php if(!empty($cl)){ if($cl 
                                              <= 2.5 && $cl > 2){ echo "checked"; } } ?>/>
                                                <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                </label>
                                                <input type="radio"   value="2"  
                                                       <?php if(!empty($cl)){ if($cl 
                                                <= 2 && $cl > 1.5){ echo "checked"; } } ?>/>
                                                  <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                  </label>
                                                  <input type="radio"  value="1.5" 
                                                         <?php if(!empty($cl)){ if($cl 
                                                  <= 1.5 && $cl > 1){ echo "checked"; } } ?>/>
                                                    <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                    </label>
                                                    <input type="radio"  value="1" 
                                                           <?php if(!empty($cl)){ if($cl 
                                                    <= 1 && $cl > 0.5){ echo "checked"; } } ?>/>
                                                      <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                      </label>
                                                      <input type="radio"  value="0.5"  
                                                             <?php if(!empty($cl)){ if($cl 
                                                      <= 0.5 && $cl >= 0){ echo "checked"; } } ?>/>
                                                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                        </label>
                                                        <?php $cl=0;?>
                                                        <?php }else{?>
                                                        <input type='radio'  value='5' 
                                                               <?php if(!empty($cl)){ if($cl 
                                                        <= 5 && $cl > 4.5){ echo "checked"; } }?> />
                                                          <label class = "full" for="star5" title="Awesome - 5 stars">
                                                          </label>
                                                          <input type="radio"  value="4.5" 
                                                                 <?php if(!empty($cl)){if($cl 
                                                          <= 4.5 && $cl > 4){ echo "checked"; } } ?> />
                                                            <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                            </label>
                                                            <input type="radio"  value="4"  
                                                                   <?php if(!empty($cl)){ if($cl 
                                                            <= 4 && $cl > 3.5){ echo "checked"; }} ?> />
                                                              <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                              </label>
                                                              <input type="radio"  value="3.5"  
                                                                     <?php if(!empty($cl)){ if($cl 
                                                              <= 3.5 && $cl > 3){ echo "checked"; } } ?> />
                                                                <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                </label>
                                                                <input type="radio"  value="3" 
                                                                       <?php if(!empty($cl)){ if($cl 
                                                                <= 3 && $cl > 2.5){ echo "checked"; } } ?>/>
                                                                  <label class = "full" for="star3" title="Meh - 3 stars">
                                                                  </label>
                                                                  <input type="radio"  value="2.5" 
                                                                         <?php if(!empty($cl)){ if($cl 
                                                                  <= 2.5 && $cl > 2){ echo "checked"; } } ?>/>
                                                                    <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                    </label>
                                                                    <input type="radio"   value="2"  
                                                                           <?php if(!empty($cl)){ if($cl 
                                                                    <= 2 && $cl > 1.5){ echo "checked"; } } ?>/>
                                                                      <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                      </label>
                                                                      <input type="radio"  value="1.5" 
                                                                             <?php if(!empty($cl)){ if($cl 
                                                                      <= 1.5 && $cl > 1){ echo "checked"; } } ?>/>
                                                                        <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                        </label>
                                                                        <input type="radio"  value="1" 
                                                                               <?php if(!empty($cl)){ if($cl 
                                                                        <= 1 && $cl > 0.5){ echo "checked"; } } ?>/>
                                                                          <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                          </label>
                                                                          <input type="radio"  value="0.5"  
                                                                                 <?php if(!empty($cl)){ if($cl 
                                                                          <= 0.5 && $cl >= 0){ echo "checked"; } } ?>/>
                                                                            <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                            </label>
                                                                            <?php $cl=0;?>
                                                                            <?php	} ?>
                                                                            </span>
                                                                          <!--/rating--> 
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  <div class=" col-sm-6 col-md-6 col-xs-12 col-lg-6">
                                                                    <div class="rewiw-width100">
                                                                      <div class="rewiw-width50">
                                                                        <p>Location
                                                                        </p>
                                                                      </div>
                                                                      <div class="rewiw-width50">
                                                                        <div class="rating-box">
                                                                          <span class="rating no-topmg mt-1 ">
                                                                            <?php	if(!empty($lc)){ 	
?>
                                                                            <input type='radio'  value='5' 
                                                                                   <?php if(!empty($lc)){ if($lc 
                                                                            <= 5 && $lc > 4.5){ echo "checked"; } }?> />
                                                                              <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                              </label>
                                                                              <input type="radio"  value="4.5" 
                                                                                     <?php if(!empty($lc)){if($lc 
                                                                              <= 4.5 && $lc > 4){ echo "checked"; } } ?> />
                                                                                <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                                </label>
                                                                                <input type="radio"  value="4"  
                                                                                       <?php if(!empty($lc)){ if($lc 
                                                                                <= 4 && $lc > 3.5){ echo "checked"; }} ?> />
                                                                                  <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                                  </label>
                                                                                  <input type="radio"  value="3.5"  
                                                                                         <?php if(!empty($lc)){ if($lc 
                                                                                  <= 3.5 && $lc > 3){ echo "checked"; } } ?> />
                                                                                    <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                                    </label>
                                                                                    <input type="radio"  value="3" 
                                                                                           <?php if(!empty($lc)){ if($lc 
                                                                                    <= 3 && $lc > 2.5){ echo "checked"; } } ?>/>
                                                                                      <label class = "full" for="star3" title="Meh - 3 stars">
                                                                                      </label>
                                                                                      <input type="radio"  value="2.5" 
                                                                                             <?php if(!empty($lc)){ if($lc 
                                                                                      <= 2.5 && $lc > 2){ echo "checked"; } } ?>/>
                                                                                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                                        </label>
                                                                                        <input type="radio"   value="2"  
                                                                                               <?php if(!empty($lc)){ if($lc 
                                                                                        <= 2 && $lc > 1.5){ echo "checked"; } } ?>/>
                                                                                          <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                                          </label>
                                                                                          <input type="radio"  value="1.5" 
                                                                                                 <?php if(!empty($lc)){ if($lc 
                                                                                          <= 1.5 && $lc > 1){ echo "checked"; } } ?>/>
                                                                                            <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                                            </label>
                                                                                            <input type="radio"  value="1" 
                                                                                                   <?php if(!empty($lc)){ if($lc 
                                                                                            <= 1 && $lc > 0.5){ echo "checked"; } } ?>/>
                                                                                              <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                                              </label>
                                                                                              <input type="radio"  value="0.5"  
                                                                                                     <?php if(!empty($lc)){ if($lc 
                                                                                              <= 0.5 && $lc >= 0){ echo "checked"; } } ?>/>
                                                                                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                                </label>
                                                                                                <?php $lc=0;?>
                                                                                                <?php }else{?>
                                                                                                <input type='radio'  value='5' 
                                                                                                       <?php if(!empty($lc)){ if($lc 
                                                                                                <= 5 && $lc > 4.5){ echo "checked"; } }?> />
                                                                                                  <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                                                  </label>
                                                                                                  <input type="radio"  value="4.5" 
                                                                                                         <?php if(!empty($lc)){if($lc 
                                                                                                  <= 4.5 && $lc > 4){ echo "checked"; } } ?> />
                                                                                                    <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                                                    </label>
                                                                                                    <input type="radio"  value="4"  
                                                                                                           <?php if(!empty($lc)){ if($lc 
                                                                                                    <= 4 && $lc > 3.5){ echo "checked"; }} ?> />
                                                                                                      <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                                                      </label>
                                                                                                      <input type="radio"  value="3.5"  
                                                                                                             <?php if(!empty($lc)){ if($lc 
                                                                                                      <= 3.5 && $lc > 3){ echo "checked"; } } ?> />
                                                                                                        <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                                                        </label>
                                                                                                        <input type="radio"  value="3" 
                                                                                                               <?php if(!empty($lc)){ if($lc 
                                                                                                        <= 3 && $lc > 2.5){ echo "checked"; } } ?>/>
                                                                                                          <label class = "full" for="star3" title="Meh - 3 stars">
                                                                                                          </label>
                                                                                                          <input type="radio"  value="2.5" 
                                                                                                                 <?php if(!empty($lc)){ if($lc 
                                                                                                          <= 2.5 && $lc > 2){ echo "checked"; } } ?>/>
                                                                                                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                                                            </label>
                                                                                                            <input type="radio"   value="2"  
                                                                                                                   <?php if(!empty($lc)){ if($lc 
                                                                                                            <= 2 && $lc > 1.5){ echo "checked"; } } ?>/>
                                                                                                              <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                                                              </label>
                                                                                                              <input type="radio"  value="1.5" 
                                                                                                                     <?php if(!empty($lc)){ if($lc 
                                                                                                              <= 1.5 && $lc > 1){ echo "checked"; } } ?>/>
                                                                                                                <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                                                                </label>
                                                                                                                <input type="radio"  value="1" 
                                                                                                                       <?php if(!empty($lc)){ if($lc 
                                                                                                                <= 1 && $lc > 0.5){ echo "checked"; } } ?>/>
                                                                                                                  <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                                                                  </label>
                                                                                                                  <input type="radio"  value="0.5"  
                                                                                                                         <?php if(!empty($lc)){ if($lc 
                                                                                                                  <= 0.5 && $lc >= 0){ echo "checked"; } } ?>/>
                                                                                                                    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                                                    </label>
                                                                                                                    <?php $lc=0;?>
                                                                                                                    <?php	} ?>
                                                                                                                    </span>
                                                                                                                  <!--/rating--> 
                                                                                                                  </div>
                                                                                                                </div>
                                                                                                              </div>
                                                                                                            <div class="rewiw-width100">
                                                                                                              <div class="rewiw-width50">
                                                                                                                <p>Check In
                                                                                                                </p>
                                                                                                              </div>
                                                                                                              <div class="rewiw-width50">
                                                                                                                <div class="rating-box">
                                                                                                                  <span class="rating no-topmg mt-1 ">
                                                                                                                    <?php	if(!empty($ch)){ 	
?>
                                                                                                                    <input type='radio'  value='5' 
                                                                                                                           <?php if(!empty($ch)){ if($ch 
                                                                                                                    <= 5 && $ch > 4.5){ echo "checked"; } }?> />
                                                                                                                      <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                                                                      </label>
                                                                                                                      <input type="radio"  value="4.5" 
                                                                                                                             <?php if(!empty($ch)){if($ch 
                                                                                                                      <= 4.5 && $ch > 4){ echo "checked"; } } ?> />
                                                                                                                        <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                                                                        </label>
                                                                                                                        <input type="radio"  value="4"  
                                                                                                                               <?php if(!empty($ch)){ if($ch 
                                                                                                                        <= 4 && $ch > 3.5){ echo "checked"; }} ?> />
                                                                                                                          <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                                                                          </label>
                                                                                                                          <input type="radio"  value="3.5"  
                                                                                                                                 <?php if(!empty($ch)){ if($ch 
                                                                                                                          <= 3.5 && $ch > 3){ echo "checked"; } } ?> />
                                                                                                                            <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                                                                            </label>
                                                                                                                            <input type="radio"  value="3" 
                                                                                                                                   <?php if(!empty($ch)){ if($ch 
                                                                                                                            <= 3 && $ch > 2.5){ echo "checked"; } } ?>/>
                                                                                                                              <label class = "full" for="star3" title="Meh - 3 stars">
                                                                                                                              </label>
                                                                                                                              <input type="radio"  value="2.5" 
                                                                                                                                     <?php if(!empty($ch)){ if($ch 
                                                                                                                              <= 2.5 && $ch > 2){ echo "checked"; } } ?>/>
                                                                                                                                <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                                                                                </label>
                                                                                                                                <input type="radio"   value="2"  
                                                                                                                                       <?php if(!empty($ch)){ if($ch 
                                                                                                                                <= 2 && $ch > 1.5){ echo "checked"; } } ?>/>
                                                                                                                                  <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                                                                                  </label>
                                                                                                                                  <input type="radio"  value="1.5" 
                                                                                                                                         <?php if(!empty($ch)){ if($ch 
                                                                                                                                  <= 1.5 && $ch > 1){ echo "checked"; } } ?>/>
                                                                                                                                    <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                                                                                    </label>
                                                                                                                                    <input type="radio"  value="1" 
                                                                                                                                           <?php if(!empty($ch)){ if($ch 
                                                                                                                                    <= 1 && $ch > 0.5){ echo "checked"; } } ?>/>
                                                                                                                                      <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                                                                                      </label>
                                                                                                                                      <input type="radio"  value="0.5"  
                                                                                                                                             <?php if(!empty($ch)){ if($ch 
                                                                                                                                      <= 0.5 && $ch >= 0){ echo "checked"; } } ?>/>
                                                                                                                                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                                                                        </label>
                                                                                                                                        <?php $ch=0;?>
                                                                                                                                        <?php }else{?>
                                                                                                                                        <input type='radio'  value='5' 
                                                                                                                                               <?php if(!empty($ch)){ if($ch 
                                                                                                                                        <= 5 && $ch > 4.5){ echo "checked"; } }?> />
                                                                                                                                          <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                                                                                          </label>
                                                                                                                                          <input type="radio"  value="4.5" 
                                                                                                                                                 <?php if(!empty($ch)){if($ch 
                                                                                                                                          <= 4.5 && $ch > 4){ echo "checked"; } } ?> />
                                                                                                                                            <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                                                                                            </label>
                                                                                                                                            <input type="radio"  value="4"  
                                                                                                                                                   <?php if(!empty($ch)){ if($ch 
                                                                                                                                            <= 4 && $ch > 3.5){ echo "checked"; }} ?> />
                                                                                                                                              <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                                                                                              </label>
                                                                                                                                              <input type="radio"  value="3.5"  
                                                                                                                                                     <?php if(!empty($ch)){ if($ch 
                                                                                                                                              <= 3.5 && $ch > 3){ echo "checked"; } } ?> />
                                                                                                                                                <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                                                                                                </label>
                                                                                                                                                <input type="radio"  value="3" 
<?php if(!empty($ch)){ if($ch 
                                                                                                                                                <= 3 && $ch > 2.5){ echo "checked"; } } ?>/>
                                                                                                                                                  <label class = "full" for="star3" title="Meh - 3 stars">
                                                                                                                                                  </label>
                                                                                                                                                  <input type="radio"  value="2.5" 
<?php if(!empty($ch)){ if($ch 
                                                                                                                                                  <= 2.5 && $ch > 2){ echo "checked"; } } ?>/>
                                                                                                                                                    <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                                                                                                    </label>
                                                                                                                                                    <input type="radio"   value="2"  
<?php if(!empty($ch)){ if($ch 
                                                                                                                                                    <= 2 && $ch > 1.5){ echo "checked"; } } ?>/>
                                                                                                                                                      <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                                                                                                      </label>
                                                                                                                                                      <input type="radio"  value="1.5" 
<?php if(!empty($ch)){ if($ch 
                                                                                                                                                      <= 1.5 && $ch > 1){ echo "checked"; } } ?>/>
<label class="half" for="star1half" title="Meh - 1.5 stars">
</label>
<input type="radio"  value="1" 
       <?php if(!empty($ch)){ if($ch 
<= 1 && $ch > 0.5){ echo "checked"; } } ?>/>
  <label class = "full" for="star1" title="Sucks big time - 1 star">
  </label>
  <input type="radio"  value="0.5"  
         <?php if(!empty($ch)){ if($ch 
  <= 0.5 && $ch >= 0){ echo "checked"; } } ?>/>
    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
    </label>
    <?php $ch=0;?>
    <?php	} ?>
    </span>
  <!--/rating--> 
  </div>
</div>
                                                                                                                                                      </div>
                                                                                                                                                    </div>
                                                                                                                                                  </div>
                                                                                                                                                </div>
                                                                                                                                              </div>
                                                                                                                                            <div class="review-testimonial-section">
                                                                                                                                              <?php if(!empty($UserRatingData)){
//pr($UserRatingData);
foreach($commentUserData as $commentUser){
foreach($UserRatingData as $UserRating){
//pr($UserRating->id);
if($commentUser->id == $UserRating->user_from){
$accuracy=$UserRating->accuracy_rating;
$communication=$UserRating->communication_rating;
$cleanliness=$UserRating->cleanliness_rating;
$location=$UserRating->location_rating;
$check_in=$UserRating->check_in_rating;
@$rate=($accuracy + $communication + $cleanliness + $location + $check_in)/5;
?>
                                                                                                                                              <div class="row">
                                                                                                                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
                                                                                                                                                  <div class=" center-block pt30">
                                                                                                                                                    <!-- <img alt="client" title="client" class="img-responsive center-block img-circle" src="<?php echo HTTP_ROOT; ?>img/detail-circle-client.png"> --> 
                                                                                                                                                    <?php if($commentUser->image){?>
                                                                                                                                                    <img src="<?php echo HTTP_ROOT.'img/uploads/'.$commentUser->image; ?>" alt="Profile Picture" height="80px" width="80px" class="img-circle"/>
                                                                                                                                                    <?php }else{?>
                                                                                                                                                    <img src="<?php echo HTTP_ROOT.'img/uploads/dm.png'; ?>" alt="Profile Picture" height="80px" width="80px" class="img-circle"/>
                                                                                                                                                    <?php } ?>
                                                                                                                                                  </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
                                                                                                                                                  <div class="review-comments pt30">
                                                                                                                                                    <div>
                                                                                                                                                      <span class="pull-left color999">
<?php if(!empty($UserRating->created_date)){ echo date("F j, Y", strtotime($UserRating->created_date)); }?> 
                                                                                                                                                      </span> 
                                                                                                                                                      <span class="pull-right">
<ul class="list-inline text-center">
  <li>
    <div class="rating-box">
      <span class="rating no-topmg mt-1 ">
        <?php	if(!empty($rate)){ 	
?>
        <input type='radio'  value='5' 
               <?php if(!empty($rate)){ if($rate 
        <= 5 && $rate > 4.5){ echo "checked"; } }?> />
          <label class = "full" for="star5" title="Awesome - 5 stars">
          </label>
          <input type="radio"  value="4.5" 
                 <?php if(!empty($rate)){if($rate 
          <= 4.5 && $rate > 4){ echo "checked"; } } ?> />
            <label class="half" for="star4half" title="Pretty good - 4.5 stars">
            </label>
            <input type="radio"  value="4"  
                   <?php if(!empty($rate)){ if($rate 
            <= 4 && $rate > 3.5){ echo "checked"; }} ?> />
              <label class = "full" for="star4" title="Pretty good - 4 stars">
              </label>
              <input type="radio"  value="3.5"  
                     <?php if(!empty($rate)){ if($rate 
              <= 3.5 && $rate > 3){ echo "checked"; } } ?> />
                <label class="half" for="star3half" title="Meh - 3.5 stars">
                </label>
                <input type="radio"  value="3" 
                       <?php if(!empty($rate)){ if($rate 
                <= 3 && $rate > 2.5){ echo "checked"; } } ?>/>
                  <label class = "full" for="star3" title="Meh - 3 stars">
                  </label>
                  <input type="radio"  value="2.5" 
                         <?php if(!empty($rate)){ if($rate 
                  <= 2.5 && $rate > 2){ echo "checked"; } } ?>/>
                    <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                    </label>
                    <input type="radio"   value="2"  
                           <?php if(!empty($rate)){ if($rate 
                    <= 2 && $rate > 1.5){ echo "checked"; } } ?>/>
                      <label class = "full" for="star2" title="Kinda bad - 2 stars">
                      </label>
                      <input type="radio"  value="1.5" 
                             <?php if(!empty($rate)){ if($rate 
                      <= 1.5 && $rate > 1){ echo "checked"; } } ?>/>
                        <label class="half" for="star1half" title="Meh - 1.5 stars">
                        </label>
                        <input type="radio"  value="1" 
                               <?php if(!empty($rate)){ if($rate 
                        <= 1 && $rate > 0.5){ echo "checked"; } } ?>/>
                          <label class = "full" for="star1" title="Sucks big time - 1 star">
                          </label>
                          <input type="radio"  value="0.5"  
                                 <?php if(!empty($rate)){ if($rate 
                          <= 0.5 && $rate >= 0){ echo "checked"; } } ?>/>
                            <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                            </label>
                            <?php $rate=0;?>
                            <?php }else{?>
                            <input type='radio'  value='5' 
                                   <?php if(!empty($rate)){ if($rate 
                            <= 5 && $rate > 4.5){ echo "checked"; } }?> />
                              <label class = "full" for="star5" title="Awesome - 5 stars">
                              </label>
                              <input type="radio"  value="4.5" 
                                     <?php if(!empty($rate)){if($rate 
                              <= 4.5 && $rate > 4){ echo "checked"; } } ?> />
                                <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                </label>
                                <input type="radio"  value="4"  
                                       <?php if(!empty($rate)){ if($rate 
                                <= 4 && $rate > 3.5){ echo "checked"; }} ?> />
                                  <label class = "full" for="star4" title="Pretty good - 4 stars">
                                  </label>
                                  <input type="radio"  value="3.5"  
                                         <?php if(!empty($rate)){ if($rate 
                                  <= 3.5 && $rate > 3){ echo "checked"; } } ?> />
                                    <label class="half" for="star3half" title="Meh - 3.5 stars">
                                    </label>
                                    <input type="radio"  value="3" 
                                           <?php if(!empty($rate)){ if($rate 
                                    <= 3 && $rate > 2.5){ echo "checked"; } } ?>/>
                                      <label class = "full" for="star3" title="Meh - 3 stars">
                                      </label>
                                      <input type="radio"  value="2.5" 
                                             <?php if(!empty($rate)){ if($rate 
                                      <= 2.5 && $rate > 2){ echo "checked"; } } ?>/>
                                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                        </label>
                                        <input type="radio"   value="2"  
                                               <?php if(!empty($rate)){ if($rate 
                                        <= 2 && $rate > 1.5){ echo "checked"; } } ?>/>
                                          <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                          </label>
                                          <input type="radio"  value="1.5" 
                                                 <?php if(!empty($rate)){ if($rate 
                                          <= 1.5 && $rate > 1){ echo "checked"; } } ?>/>
                                            <label class="half" for="star1half" title="Meh - 1.5 stars">
                                            </label>
                                            <input type="radio"  value="1" 
                                                   <?php if(!empty($rate)){ if($rate 
                                            <= 1 && $rate > 0.5){ echo "checked"; } } ?>/>
                                              <label class = "full" for="star1" title="Sucks big time - 1 star">
                                              </label>
                                              <input type="radio"  value="0.5"  
                                                     <?php if(!empty($rate)){ if($rate 
                                              <= 0.5 && $rate >= 0){ echo "checked"; } } ?>/>
                                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                </label>
                                                <?php $rate=0;?>
                                                <?php	} ?>
                                                </span>
                                              <!--/rating--> 
                                              </div>
                                            </li>
                                          </ul>
                                        </span>
                                      </div>
                                    <br/>
                                    <br/>
                                    <p class="pull-left">
                                      <?php if(!empty($UserRating->comment)){ echo $UserRating->comment; }?> 
                                    </p>
                                    <p class="pull-right color-green">-
                                      <?php if( $commentUser->first_name){echo $commentUser->first_name." ".$commentUser->last_name ;} ?>
                                    </p>
                                    </div>
                                  </div>
                    <!--<div class=" pt30 text-center">
<button class="btn btn-read-more-reviews"> Read more reviews</button>
</div>-->
                                </div>
                              <?php } }
} }else{?>
                              <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
                                  <div class=" center-block pt30">
                                  </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
                                  <div class="review-comments pt30">
                                    <div>
                                      <span class="pull-left color999"> 
                                      </span> 
                                      <span class="pull-right">
                                        <ul class="list-inline text-center">
                                          <li>
                                          </li>
                                        </ul>
                                      </span>
                                    </div>
                                    <br/>
                                    <br/>
                                    <p class="pull-left">
                                      <?php if(empty($UserRating->comment)){ 
										  echo "<h5 class='text-center'>".$this->requestAction('app/get-translate/'.base64_encode('Feedback Not Added Yet'))."<h5>";   }?> 
                                    </p>
                                    <p class="pull-right color-green">
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="banner-offer"> 
                            <a href="#"> 
                              <img src="<?php echo HTTP_ROOT."img/weekend-offer.png";?>"  class="img-responsive" alt="offer"> 
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="price-box"> 
                        <!--Profile Right Start-->
                        <div class="profile-rgt" > 
                          <!--Service Type Start-->
                          <div class="st-outer"  >
							<div class="st-inner"> 
								
                              <!--Service drop-->
                              <div class="s-drop">
                                <div class="form-group"> Services & Rates 
                                </div>
                              </div>
                              <!--/Service drop--> 
                              <!--Service list-->
                              <div class="st-area">
                                <div class="st-list-head">
                                  <p>Per Session
                                  </p>
                                </div>
                                <ul class="care-list">
                                  <li><?php //pr($userData->user_sitter_services[0]);
											
											if((isset($userData->user_sitter_services[0])) && !empty($userData->user_sitter_services[0]))
											{
												$sitterServiceData=$userData->user_sitter_services[0];
											}
												
												
								  ?>                       <img src="<?php echo HTTP_ROOT; ?>img/day-care.png" width="18" height="17" alt=""> Day Care : 
															<span><?php  if(!empty($sitterServiceData->sh_day_rate))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_day_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/night-care.png" width="18" height="17" alt=""> Night Care : 
															<span>
															<?php  if(!empty($sitterServiceData->sh_night_rate))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_night_rate;						
																		}else{
																			
																			echo "$ --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i> 
															</span>
														  </li>
														  <!--
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/lt-care.png" width="18" height="17" alt=""> Long Terms Care : 
															<span>
															<?php  if(!empty($sitterServiceData->sh_day_rates))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_day_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/hourly-care.png" width="18" height="17" alt=""> Hourly Care : 
															<span> 
															<?php  if(!empty($sitterServiceData->sh_day_rates))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_day_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/house-setting.png" width="18" height="17" alt=""> House Setting : 
															<span>
															<?php  if(!empty($sitterServiceData->sh_day_rates))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_day_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/out-about.png" width="18" height="17" alt=""> Out & About : 
															<span> 
																	<?php  if(!empty($sitterServiceData->sh_day_rates))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_day_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>															
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>-->
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/grooming.png" width="18" height="17" alt=""> Grooming : 
															<span>
																<?php  if(!empty($sitterServiceData->mp_grooming_rate))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->mp_grooming_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/training.png" width="18" height="17" alt=""> Training : 
															<span>
																<?php  if(!empty($sitterServiceData->mp_training_rate))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->mp_training_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/drive-upto.png" width="18" height="17" alt=""> Drive(up 10km one way) : 
															<span> 
															<?php  if(!empty($sitterServiceData->mp_driving_rate))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->mp_driving_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/visit-perday.png" width="18" height="17" alt=""> House Setting : 
															<span> 
																<?php  if(!empty($sitterServiceData->sh_day_rate))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_day_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														  <li>
															<img src="<?php echo HTTP_ROOT; ?>img/meet-greet.png" width="18" height="17" alt=""> Meet &amp; Greet: 
															<span> 
																<?php  if(!empty($sitterServiceData->sh_day_rate))
																		{	
																				echo "$cuntry_sign_code ".$sitterServiceData->sh_day_rate;						
																		}else{
																			
																			echo "$cuntry_sign_code --";
																		}																
																	?>
															  <i class="fa fa-exclamation-circle">
															  </i>
															</span>
														  </li>
														</ul>
														<div class="guest-list"> 
															 <?php if($userloginstatus){ 
																 if($guests_Info == ""){
																 ?>
																<a href="javascript:void(0)" data-toggle="modal" data-target="#popPetAddNotification" title="Request Booking" class="r-booking booking-request">Book Now
														     </a> 
																<?php }else{ ?> 
														     <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal79" title="Request Booking" class="r-booking booking-request">Book Now
														     </a> 
														     <?php }
														     }else{ ?>
															    <a href="javascript:void(0)" data-toggle="modal" data-target="#alertUserLogin" title="Request Booking" class="r-booking booking-request">Book Now
														     </a>   	
															 <?php } ?>
														</div>
													  </div>
													  <!--/Service list--> 
							 </div>
                          </div>
                          <!--Service Type End--> 
                         
                        </div>
                        <!--/Profile Right End--> 
                      </div>
                      <div class="responsive    -margin">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h3 class="mid-sec-title pt30  ">Availability
                            </h3>
                            <div class="detail-cal-widget"> 
                            <!--  <img src="<?php echo HTTP_ROOT; ?>img/detail-cal-dummy.png" class="img-responsive" alt="calender"> -->
							  <!--Calendar Box Start-->
			                     <div id="myCalender"><?php echo $this->element('frontElements/Search/calender');?></div>
			                 <!--Calendar Box End  -->		
                            </div>
                           
                          </div>
                           
                        </div>
                         
       <?php
         if(!empty(@$userData->user_about_sitter->sh_pet_sizes)){
			 @$petSizesArr = explode(',',@$userData->user_about_sitter->sh_pet_sizes);
      ?>
               <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="recent-act mgt35">Hosting Preferences
                    </div>
                   
                    <div class="row">
						
				   <?php $addPre = ["0-7","8-18","18-45","45+"]; 
                     foreach($petSizesArr as $size_val){
					          if(in_array($size_val, $addPre))
							  {
							     $matchaddPre = "match_found";
							     break;
							  }else{
							     $matchaddPre = "match_not_found";
							  }
					}
					if($matchaddPre == "match_found"){	
				    ?>
				    
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						   <p class="dog-title1">Dogs
                          </p>
						  <ul class="pet-list">
							 <?php  foreach($petSizesArr as $size_val){
							   if($size_val == '0-7'){
							   ?>
								 <li class="pet-1" > 
				                   <span data-toggle="tooltip" data-placement="top" title="Dog 0-7">
									</span>
									<p class="weight" ><?php echo $size_val; ?>
									</p>
									<p class="pound">kg's / lbs
									</p>
								 </li>
								<?php } 
								else if(@$size_val == '8-18'){
								?>
								<li class="pet-2" > 
				                   <span data-toggle="tooltip" data-placement="top" title="Dog 8-18">
									</span>
									<p class="weight" ><?php echo $size_val; ?>
									</p>
									<p class="pound">kg's / lbs
									</p>
								 </li>
								<?php }
								 else if(@$size_val == '18-45'){
								 ?>
								<li class="pet-3" > 
				                   <span data-toggle="tooltip" data-placement="top" title="Dog 18-45">
									</span>
									<p class="weight" ><?php echo $size_val; ?>
									</p>
									<p class="pound">kg's / lbs
									</p>
								 </li>
								<?php }
								 else if(@$size_val == '45+'){
								 ?>
								<li class="pet-4" > 
				                   <span data-toggle="tooltip" data-placement="top" title="Dog 45+">
									</span>
									<p class="weight" ><?php echo $size_val; ?>
									</p>
									<p class="pound">kg's / lbs
									</p>
								 </li>
								  <?php } 
								  }
								 ?>
							</ul> 
                        
                      </div>
                      <?php }
                     $addPre = ["cat","small_pets","medium_pets"]; 
                     foreach($petSizesArr as $size_val){
					          if (in_array($size_val, $addPre))
							  {
							     $matchaddPre = "match_found";
							     break;
							  }else{
							     $matchaddPre = "match_not_found";
							  }
					}
					if($matchaddPre == "match_found"){	
                      ?>
                      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                        <p class="dog-title1">
                          <b>Additional prefrences
                          </b>
                        </p>
                           <ul class="pet-list">
								<?php  
							   foreach($petSizesArr as $size_val){

								  if($size_val == 'cat'){
								  ?>
								  <li class="pet-5"> 
									<span data-toggle="tooltip" data-placement="top" title="Cat 15-20 pounds ">
									</span>
									<p class="weight">0-15
									</p>
									<p class="pound">kg's / lbs
									</p>
								  </li>
								  <?php }
								   else if($size_val == 'medium_pets'){
								   ?>
								 <li class="pet-6"> 
										<span data-toggle="tooltip" data-placement="top" title="Rabit 15-20 pounds ">
										</span>
										<p class="weight">0-15
										</p>
										<p class="pound">kg's / lbs
										</p>
								   </li>
								  <?php }
								   else if($size_val == 'small_pets'){
								   ?>
								  <li class="pet-7"> 
									    <span data-toggle="tooltip" data-placement="top" title="Bird 15-20 pounds ">
										</span>
										<p class="weight">0-15
										</p>
										<p class="pound">kg's / lbs
										</p>
								  </li>
									<?php } 
								  }
								?>
								  <li class="pet-4">
									  &nbsp;
								  </li>
							   </ul>
                       
                        
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="border-bot pt30">
                            </div>
                            <h3 class="mid-sec-title pt30  ">
                              <?php echo @$userData->first_name; ?> Neighborhood 
                            </h3>
                            <div class="detail-cal-widget">
                              <div style="width:345;height:400px;" id="map">
                              </div>
                              <script>
                                // This example creates circles on the map, representing populations in North
                                // America.
                                // First, create an object containing LatLng and population for each city.
                                var citymap = {
                                  chicago: {
                                    center: {
                                      lat: <?php echo @$userData->latitude;
                                      ?>,
                                      lng: <?php echo @$userData->longitude;
                                      ?>
                                    }
                                    ,
                                    population: 2000000
                                  }
                                  ,
                                };
                                function initMap() {
                                  // Create the map.
                                  var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 6,
                                    zoomControl: true,
                                    mapTypeControl: false,
                                    scaleControl: false,
                                    streetViewControl: false,
                                    rotateControl: false,
                                    fullscreenControl: false,
                                    center: {
                                      lat: <?php echo @$userData->latitude;
                                      ?>,
                                      lng: <?php echo @$userData->longitude;
                                      ?>
                                    }
                                    ,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                  }
                                                               );
                                  // Construct the circle for each value in citymap.
                                  // Note: We scale the area of the circle based on the population.
                                  for (var city in citymap) {
                                    // Add the circle for this city to the map.
                                    var cityCircle = new google.maps.Circle({
                                      strokeColor: '#72A105',
                                      strokeOpacity: 0.8,
                                      strokeWeight: 1,
                                      fillColor: '#72A105',
                                      fillOpacity: 0.35,
                                      map: map,
                                      center: citymap[city].center,
                                      radius: Math.sqrt(citymap[city].population) * 100
                                    }
                                                                           );
                                  }
                                }
                                $(document).ready(function(){
                                  initMap();
                                }
                                                 );
                              </script>
                              <style>
                                div#map {
                                  height: 400px;
                                  width: 345px;
                                }
                              </style>
                            </div>
                          </div>
                              <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
								<p class="report1"><a data-target="#myModal8" data-toggle="modal" href="#"><i class=" fa fa-remove"></i> &nbsp; Report this Profile</a></p>
							  </div>
                        </div>
                       
                      </div>
                    </div>
                    
                    
                    <div class="row">
                      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="insure-wrap">
                          <div class="insur">
                            <p> 
                              <i> &nbsp;
                                All stays booked on Sitter Guide receive premium insurance, 24/7 support, and our reservation guarantee. 
                                </p>
                          </div>
                          </i>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <h3 class="mid-sec-title pt30 ">More sitters near you &nbsp; 
                      </h3>
                      <div class="detail-full-wrapper">
                        <div class="leading-area">
                          <!--more sitter near you-->
                          <div class="more-sitter">
                            <div class="container">
                              <div class="ms-area">
                                <ul>
                                  <?php if(!empty($nearbyUsers)){
foreach($nearbyUsers as $nearbyUser){
$UserRatingData=$nearbyUser->user_ratings; 
//pr($UserRatingData);
$accuracy_sum = 0;
$comm_sum = 0;
$clean_sum = 0;
$location_sum = 0;
$check_sum = 0;
$rating_sum = 0;
$count=0;
foreach($UserRatingData as $UserRating){
$count++;
$accuracy_rating=$UserRating->accuracy_rating;
$communication_rating=$UserRating->communication_rating;
$cleanliness_rating=$UserRating->cleanliness_rating;
$location_rating=$UserRating->location_rating;
$check_in_rating=$UserRating->check_in_rating;
$accuracy_sum = $accuracy_sum + $accuracy_rating;
$comm_sum = $comm_sum + $communication_rating;
$clean_sum = $clean_sum + $cleanliness_rating;
$location_sum = $location_sum + $location_rating;
$check_sum = $check_sum + $check_in_rating;
}
if($count > 0){
$ac=$accuracy_sum/$count;
$cm=$comm_sum/$count;
$cl=$clean_sum/$count;
$lc=$location_sum/$count;
$ch=$check_sum/$count;
$rating_sum=($ac+$cm+$cl+$lc+$ch)/5;
}
?>
                                  <li>
                                    <a href="<?php echo HTTP_ROOT."search/sitter-details/".base64_encode(convert_uuencode(@$nearbyUser->id)); ?>" title="">
                                      <img alt="" src="<?php if(!empty($nearbyUser->image)){ echo HTTP_ROOT."img/uploads/".$nearbyUser->image;}else{ echo HTTP_ROOT."img/uploads/dm.png";}?>" class=" img-responsive img-circle">
                                      <p class="name">
                                        <?php if(!empty($nearbyUser->first_name)){ echo $nearbyUser->first_name." ".$nearbyUser->last_name; }?>
                                      </p>
                                      <p class="loc">
                                        <?php if(!empty($nearbyUser->city)){ echo $nearbyUser->city; }?>
                                      </p>
                                      <p class="r-star rat-wt">
                                        <span class="rating no-topmg mt-1 ">
                                          <?php	if(!empty($rating_sum)){ 	
?>
                                          <input type='radio'  value='5' 
                                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                                          <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> />
                                            <label class = "full" for="star5" title="Awesome - 5 stars">
                                            </label>
                                            <input type="radio"  value="4.5" 
                                                   <?php if(!empty($rating_sum)){if($rating_sum 
                                            <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> />
                                              <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                              </label>
                                              <input type="radio"  value="4"  
                                                     <?php if(!empty($rating_sum)){ if($rating_sum 
                                              <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> />
                                                <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                </label>
                                                <input type="radio"  value="3.5"  
                                                       <?php if(!empty($rating_sum)){ if($rating_sum 
                                                <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> />
                                                  <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                  </label>
                                                  <input type="radio"  value="3" 
                                                         <?php if(!empty($rating_sum)){ if($rating_sum 
                                                  <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/>
                                                    <label class = "full" for="star3" title="Meh - 3 stars">
                                                    </label>
                                                    <input type="radio"  value="2.5" 
                                                           <?php if(!empty($rating_sum)){ if($rating_sum 
                                                    <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/>
                                                      <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                      </label>
                                                      <input type="radio"   value="2"  
                                                             <?php if(!empty($rating_sum)){ if($rating_sum 
                                                      <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/>
                                                        <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                        </label>
                                                        <input type="radio"  value="1.5" 
                                                               <?php if(!empty($rating_sum)){ if($rating_sum 
                                                        <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/>
                                                          <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                          </label>
                                                          <input type="radio"  value="1" 
                                                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                                                          <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/>
                                                            <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                            </label>
                                                            <input type="radio"  value="0.5"  
                                                                   <?php if(!empty($rating_sum)){ if($rating_sum 
                                                            <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/>
                                                              <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                              </label>
                                                              <?php $rating_sum=0;?>
                                                              <?php }else{?>
                                                              <input type='radio'  value='5' 
                                                                     <?php if(!empty($rating_sum)){ if($rating_sum 
                                                              <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> />
                                                                <label class = "full" for="star5" title="Awesome - 5 stars">
                                                                </label>
                                                                <input type="radio"  value="4.5" 
                                                                       <?php if(!empty($rating_sum)){if($rating_sum 
                                                                <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> />
                                                                  <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                                                                  </label>
                                                                  <input type="radio"  value="4"  
                                                                         <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                  <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> />
                                                                    <label class = "full" for="star4" title="Pretty good - 4 stars">
                                                                    </label>
                                                                    <input type="radio"  value="3.5"  
                                                                           <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                    <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> />
                                                                      <label class="half" for="star3half" title="Meh - 3.5 stars">
                                                                      </label>
                                                                      <input type="radio"  value="3" 
                                                                             <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                      <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/>
                                                                        <label class = "full" for="star3" title="Meh - 3 stars">
                                                                        </label>
                                                                        <input type="radio"  value="2.5" 
                                                                               <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                        <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/>
                                                                          <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                                                                          </label>
                                                                          <input type="radio"   value="2"  
                                                                                 <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                          <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/>
                                                                            <label class = "full" for="star2" title="Kinda bad - 2 stars">
                                                                            </label>
                                                                            <input type="radio"  value="1.5" 
                                                                                   <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                            <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/>
                                                                              <label class="half" for="star1half" title="Meh - 1.5 stars">
                                                                              </label>
                                                                              <input type="radio"  value="1" 
                                                                                     <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                              <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/>
                                                                                <label class = "full" for="star1" title="Sucks big time - 1 star">
                                                                                </label>
                                                                                <input type="radio"  value="0.5"  
                                                                                       <?php if(!empty($rating_sum)){ if($rating_sum 
                                                                                <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/>
                                                                                  <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                                                                                  </label>
                                                                                  <?php $rating_sum=0;?>
                                                                                  <?php	} ?>
                                                                                  </span>
                                                                                <!--/rating--> 
                                                                                </p> 
                                                                              </br>
                                                                            <p class="grey">
                                                                              <?php if($count != ""){ echo $count. " reviews" ;}else{echo "0 reviews" ;} ?>
                                                                            </p>
                                                                            </a>
                                                                          </li>
                                                                        <?php }} ?>					
                                                                        </ul>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                <!--more sitter near you-->
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </section>
                                                    <!-- Get in Touch ends-->
                                                    <!--[Fun News]-->
                                                    <?php echo $this->element('frontElements/guests/services_on_footer'); ?>
                                                    <!--<section class="fun-news">
                                                      <div class="fn-bot">
                                                        <ul>
                                                          <li>
                                                            <div class="fn-outer">
                                                              <div class="img-box">
                                                                <img src="<?php echo HTTP_ROOT; ?>img/mn-img-1.png" alt="" />
                                                              </div>
                                                              <div class="ho-box">
                                                                <div class="hb-inner">
                                                                  <p class="txt-head">Sitter Guide
                                                                  </p>
                                                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. 
                                                                  </p>
                                                                  <a href="#" title="Read More" class="btn-2">Read More  
                                                                    <i class="fa fa-chevron-circle-right">
                                                                    </i> 
                                                                  </a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </li>
                                                          <li>
                                                            <div class="fn-outer">
                                                              <div class="img-box">
                                                                <img src="<?php echo HTTP_ROOT; ?>img/mn-img-2.png" alt="" />
                                                              </div>
                                                              <div class="ho-box">
                                                                <div class="hb-inner">
                                                                  <p class="txt-head">Sitter Guide
                                                                  </p>
                                                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. 
                                                                  </p>
                                                                  <a href="#" title="Read More" class="btn-2">Read More  
                                                                    <i class="fa fa-chevron-circle-right">
                                                                    </i> 
                                                                  </a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </li>
                                                          <li>
                                                            <div class="fn-outer">
                                                              <div class="img-box">
                                                                <img src="<?php echo HTTP_ROOT; ?>img/mn-img-3.png" alt="" />
                                                              </div>
                                                              <div class="ho-box">
                                                                <div class="hb-inner">
                                                                  <p class="txt-head">Sitter Guide
                                                                  </p>
                                                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. 
                                                                  </p>
                                                                  <a href="#" title="Read More" class="btn-2">Read More  
                                                                    <i class="fa fa-chevron-circle-right">
                                                                    </i> 
                                                                  </a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </li>
                                                          <li>
                                                            <div class="fn-outer">
                                                              <div class="img-box">
                                                                <img src="<?php echo HTTP_ROOT; ?>img/mn-img-4.png" alt="" />
                                                              </div>
                                                              <div class="ho-box">
                                                                <div class="hb-inner">
                                                                  <p class="txt-head">Sitter Guide
                                                                  </p>
                                                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. 
                                                                  </p>
                                                                  <a href="#" title="Read More" class="btn-2">Read More  
                                                                    <i class="fa fa-chevron-circle-right">
                                                                    </i> 
                                                                  </a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </li>
                                                          <li>
                                                            <div class="fn-outer">
                                                              <div class="img-box">
                                                                <img src="<?php echo HTTP_ROOT; ?>img/mn-img-5.png" alt="" />
                                                              </div>
                                                              <div class="ho-box">
                                                                <div class="hb-inner">
                                                                  <p class="txt-head">Sitter Guide
                                                                  </p>
                                                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. 
                                                                  </p>
                                                                  <a href="#" title="Read More" class="btn-2">Read More  
                                                                    <i class="fa fa-chevron-circle-right">
                                                                    </i> 
                                                                  </a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                    </section>
                                                   
                                                   --> <!--[Fun News]-->
                                                    </main>
                                                  <!--[content area End]-->
                                                  <!--video popup start-->
                                                  <div class="modal fade" id="myModal2" role="dialog">
                                                    <div class="modal-dialog video-box">
                                                      <div class="modal-header bod-bot">
                                                        <button aria-label="Close" data-dismiss="modal" class="close" style="color:#fff; opacity:1;" type="button">
                                                          <span aria-hidden="true">
                                                          </span> 
                                                          <i class="fa fa-close">
                                                          </i>
                                                        </button>
                                                      </div>
                                                      <div id="myCarousel13" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner video-box" role="listbox">
                                                          <div class="item active video-iner">
                                                            <video width="90%" height="530px"  class="header_video" autoplay controls>
                                                              <?php if(@$userData->profile_video != ''){
@$videoPath = HTTP_ROOT.'files/video/'.@$userData->profile_video;
//echo $videoPath; 
}else{
@$videoPath = HTTP_ROOT.'files/video/pdm.mp4';
//echo $videoPath; 
} ?>
                                                              <source class="video_img" type="video/mp4" src="<?php echo $videoPath; ?>">
                                                              </source>
                                                            </video>
                                                        </div>
                                                      </div>
                                                      <!-- Left and right controls -->
                                                      <!-- Left and right controls -->
                                                    </div>
                                                  </div>
                                                  </div>
                                                <!--video popup ends-->
                                                
                                               
													
                                              
                                                
                                              <script>
                                                $(document).ready(function() {
                                                  $('.carousel').carousel({
                                                    pause: true,
                                                    interval: false
                                                  }
                                                                         );
                                                }
                                                                 );
                                              </script>

											  
  
	

<style>
.pre_day_disable{
	background-color:#ffffff !important;
}

.not_display {
    display: none;
	
}
.display_green {
    background-color: #7BAB0D !important;
}

</style>



<!--Additional Services Popup-->
<?php 
  echo $this->Html->css(['Front/jquery-ui.css']); 
  echo $this->Html->script(['Front/jquery-ui.js']);
?>


<div class="modal fade" id="myModal79" role="dialog">
  <div class="modal-dialog">
    <div class="sitter-quike-view">
      <div class="sqv-box">
        <div class="top-close">
          <p>Reservation Request</p>
          <a href="#" title="Close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a> </div>
        <div class="row">
              <?php 
                            
                         echo $this->Form->create(@$booking_data, [
                          'url' => ['controller' => 'search', 'action' => 'sitter-details'],
                          'id'=>'bookingContact',
                        ]);
                        echo $this->Form->input('BookingRequests.sitter_id',[
                            'type' =>'hidden',
                            'value'=>@$sitter_id]);
                        ?>
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 ">
      <!--starts-->
     <div class="sr-area-outer">
        <div class="row st-head-txt">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 visible-lg">
            <p>When you are Away</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 visible-lg">
            <p>while you are at Home</p>
          </div>
        </div>
        <div class="sr-area"> 
          <!--top filter tab-->
          <div class="top-filter-tab">
            <ul class="booking-services">
              <li class="new_active" id="li_boarding"><a class="boarding" data-rel="boarding" href="#boarding" data-toggle="tab" >    <span></span>Boarding<br>
                  <b>in the sitter home</b> </a>
              </li>
              <li id="li_house_sitting"><a class="h-sitting" data-rel="house_sitting" href="#hsitting" data-toggle="tab"><span></span> House Sitting<br>
                <b>in your home</b></a></li>
              <li id="li_drop_in_visit" ><a class="d-visit" data-rel="drop_in_visit" href="#dvisit" data-toggle="tab"><span></span> Drop-in Visit<br>
                <b>in your home</b></a></li>
              <li id="li_day_night"><a class="dn-care" data-rel="day_nigth_care" href="#dncare" data-toggle="tab"><span></span> Day / Night Care<br>
                <b>in the sitter’s home</b></a></li>
              <li id="li_maket_place"><a class="m-place" data-rel="market_place" href="#mplace" data-toggle="tab"><span></span> Market Place<br>
                <b>exercise, groom, train+</b></a></li>
            </ul>
                        <!-- Start Required service-->
                        <?php echo $this->Form->input('BookingRequests.required_service',[
                            'label' => false,
                            'type'=>'hidden',
                            'value'=>'boarding',
                            //'id'=>'required_services'
                            ]);
                            ?>
                        <label class="error service_error" for="bookingrequests-required-service" generated="true"></label>
          </div>
          <!--top filter tab--> 
          <!--Tab Content area -->
          
             <div class="tab-content">
              <div class="tab-pane  in active" id="boarding" >
          <div  class="cont-sitter"> 
                    <div class="cs-mid-cont">
                    <div class="csmc-area">
                      
                      <div class="boardng-rates">
                      <h1 class="">Boarding Rates</h1>
                      <ul class="list-unstyled">
              <li> <i class="fa fa-angle-right right-gr"></i>$20 one night for one guest</li>
              <li><i class="fa fa-angle-right right-gr"></i>20% discount for multiple pets </li>
              <li><i class="fa fa-angle-right right-gr"></i>20% discount for multiple nights (made in some booking) </li>
            
          
              </ul>
                      </div>
                    
                      
                      <!--Date-->      
                      	<div class="hs-date">
                        	<h1 class="hsd-head"> Boarding Dates</h1>
                        	<div class="row">
                            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                               	  <div class="fromto">
                                    	<!--<input type="text"><a title="Calender" href="#"><img width="21" height="21" alt="Calender" src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"></a>-->
                                     <?php  
                                        echo $this->Form->input('BookingRequests.booking_start_date',[               
											'templates' => ['inputContainer' => '{{content}}'],
											'label'=>false,
											'readonly'=>true,
											'type'=>'text',
											'placeholder'=>'YYYY-MM-DD'
                                        ]);
                                      ?>
                                        <a href="javascript:void(0)" title="Calender" class="display-calender1"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png" width="21" height="21" alt="Calender"></a>
                                        <label class="error" for="bookingrequests-booking-start-date" generated="true"></label>
                                    </div>
                                </div>
                            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                	<div class="fromto">
                                    	<!--<input type="text"><a title="Calender" href="#"><img width="21" height="21" alt="Calender" src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"></a>-->
                                     <?php  
                                        echo $this->Form->input('BookingRequests.booking_end_date',[               
											'templates' => ['inputContainer' => '{{content}}'],
											'label'=>false,
											'type'=>'text',
											'readonly'=>true,
											'placeholder'=>'YYYY-MM-DD' 
                                        ]);
                                      ?>
                                        <a href="javascript:void(0)" title="Calender" class="display-calender"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png" width="21" height="21" alt="Calender"></a>
                                        <label class="error" for="bookingrequests-booking-end-date" generated="true"></label>
                                    </div>
                                </div>                                
                            </div>
                            <p>For your safety &amp; security, Rover will not expose your phone number until you've booked your stay. Messages from Agatha will come from 858-914-2079, a number owned by sitter guide. </p>
                        </div>
                      <!--/Date-->  
                      <!--add dog-->
                      <div class="ad-dog"> 
                      		<h2>Dogs</h2>   
                            <div class="row">
                            	<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                                	<div class="dog-list">
                                	<ul id="all-guests">
										
												<?php if(isset($sitter_guests_info) && !empty($sitter_guests_info)){
													$guest_count = 0;
													foreach($sitter_guests_info as $single_guest){
												?>
													<li><input class="guests" checked name="guest_id_for_booking[]"  type="checkbox" value="<?php echo $single_guest['id'];?>"> <?php echo $single_guest['guest_name'];?></li>
													<?php $guest_count++;
												  }
												}else{
												  $guest_count = 1;?>
												 
											<?php	}
									  
										?>
                                    </ul>
                                    </div>
                                    <label class="error" for="guest_id_for_booking[]" generated="true"></label>
                                </div>
                            	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                	<div class="ad">
                                    	<a title="Add Dogs" href="<?php echo HTTP_ROOT.'dashboard/about-guest'; ?>"><i aria-hidden="true" class="fa fa-plus-circle"></i> Add Another Dogs</a>
                                    </div>
                                </div>                                                                
                            </div>
                       </div>    
                      <!--/add dog-->
                      
                      <div class="row">
                      
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="include"> <a href="#" data-toggle="collapse" data-target="#bott"><span class="include-addit"></span> &nbsp; Include additional services from Market place?</a></div>
                      
                      <div id="bott" class="collapse">
                      <!--<ul style="width:100%; float:left">
                      <li  style="width:100%; float:left; display:inline;">about your dog an</li>
                       <li  style="width:100%; float:left; display:inline;">about your dog an</li>
                         <li  style="width:100%; float:left; display:inline;">about your dog an</li>
                       <li  style="width:100%; float:left; display:inline;">about your dog an</li>
                      </ul>-->
                      <div class="container-fluid">
                      <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
						  <input name="additional_services[]" type="checkbox" value="grooming">&nbsp
                          Grooming 
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
						  <input name="additional_services[]" type="checkbox" value="training">&nbsp 
						  Training 
					  </div>
                      </div>
                      <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
						    <input name="additional_services[]" type="checkbox" value="walking">&nbsp Recreation (Walking) 
					  </div>
                         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
							<input name="additional_services[]" type="checkbox" value="driver_service" >&nbsp 
							Driver Service 
					 </div>
                     </div>
                      </div></div>
                      </div>
                      </div>
                      <!--message-->
                      	<div class="msg">
                            <h3>Message</h3>
                            <p class="no-bot">Share a little info about your dog and why they'd have a great time with Agatha. </p>
                             <p>Don't forget if you need to make any changes to your dates you can update these later on.</p>
                           <!--<textarea class="txtarea"></textarea>-->
                            <?php  
                                echo $this->Form->input('BookingRequests.message',[               
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'class'=>'txtarea',
                                'type'=>'textarea' 
                                ]);
                             ?>
                            <p><?php  
                                echo $this->Form->input('BookingRequests.recieved_photo_during_stay',[               
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'type'=>'checkbox',
                                'checked'=>'checked',
                                'hiddenField'=>false 
                                ]);
                              ?> &nbsp I'd like to receive photos of my dog(s) during this stay. </p>
                          
                            <p>All stays booked through Rover are covered by premium insurance. </p>
                        </div>
                      
                      <!--/message-->
                      
                      <div class="row">
                      
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="best-pract1"><p><b>Best Practice :</b> We recommend contacting the sitter before finalizing your reservation.</p></div>
          </div></div>
        		</div></div>
          
          </div>
          </div>
          
          
           <!-- <div class="tab-pane fade" id="hsitting" ></div>
             <div class="tab-pane fade" id="dvisit" ></div>
              <div class="tab-pane fade" id="dncare" ></div>
               <div class="tab-pane fade" id="mplace" ></div>-->
            
          </div>
          
          <!--Tab Content area--> 
          
        </div>
      </div>     
          
          
          
       <!--   ends
          -->
         </div>
          <div class=" col-xs-12 col-md-4 col-sm-4 col-lg-3  ">
            <div class="right-content-wrap">
              <div class="top-box-wrap">
                <div class="row">
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img src="<?php echo HTTP_ROOT.'img/uploads/'.(@$userData->image != ''?@$userData->image:'dm.png'); ?>" width="50" height="50" class="img-responsive img-circle text-center center-block" alt="image"> </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <ul class="list-unstyled">
                      <li class="f14"><?php echo ucfirst(@$userData->first_name); ?></li>
                      <li class="f13"><?php echo ucfirst(@$userData->last_name)." ".date_format(@$userData->date_added,"Y");  ?></li>
                    </ul>
                  </div>
                </div>
                
              </div>
              <div class="booking-summ" id="bookingPetInfo">
                 <h3>Your  Book Summary</h3>
              </div>
             <!--Start pet info-->
              <div class="pet-info-wrap alert appendService">
               <div class="pet-info-inner">
                <ul class="list-unstyled">
                     <li>Boarding for 1 day</li>
                     <li>
					     <?php echo date("d/m/Y"); ?> to <?php echo date("d/m/Y"); ?>
					 </li>
                     <li><?php echo "$cuntry_sign_code ".(@$sh_day_rate)." x 1 day ".@$guest_count." guest @ ".(@$sh_day_rate*@$guest_count)." p/day"; ?>
					 </li><hr>
                     <li>Boarding for 1 night</li>
                     <li>
					     <?php echo date("d/m/Y"); ?> to <?php echo date("d/m/Y"); ?>
					 </li>
                     <li><?php echo "$cuntry_sign_code ".(@$sh_day_rate)." x 1 night x ".@$guest_count." guest @ ".(@$sh_night_rate*@$guest_count)." p/night"; ?></li>
                </ul>
                </div>
                <div class="pet-info-bot">
                  <p>Total  :<span class="pull-right text-right"> <b>
                  <?php echo "$cuntry_sign_code ".@$total_amount = (@$sh_day_rate+@$sh_night_rate)*@$guest_count; ?>
                  </b></span></p>
                </div>
              </div>
              <!--end 
                <li>Boarding for 1 day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(day_rate*total_days*guest_num)+" p/day<hr></li><li>Boarding for 1 night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(night_rate*total_days*guest_num)+" p/night</li>
              -->
             <div class="table-wrap">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="tbfont">Cancellation Policy</td>
                      <td class="tbfont"><?php echo @$userData->user_sitter_services[0]->cancellation_policy_status == 1?'Flexible':'---'; ?></td>
                    </tr>
                    <tr>
                    
                      <td class="tbfont">Total Amount</td>
                    
                      <td class="tbfont" id="show-total-amount"><?php echo @$cuntry_currency." ".@$total_amount; ?></td>
                    </tr>
                    
                    <tr>
                    
                      <td class="tbfont">Booking Fee</td>
                      <td class="tbfont"><?php echo @$userData->user_sitter_services[0]->booking_status == 1?'Free':'---'; ?></td>
                    </tr>
                  </tbody>
                </table>
                <button type="submit" class="btn btn-req-bok btn-block">Request Booking</button>
              </div>
              <?php echo $this->Form->end(); ?>
              
              
              <div class="pay-through">
              <h6 class="pay-head">Booking through Sitter Guide Covers you for:</h6>
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
        
        
      </div>
    </div>
  </div>
</div>
</div>

<!--Report popup starts-->
<div class="modal fade" id="myModal8" role="dialog">
  <div class="modal-dialog">
    <div class="sitter-quike-view">
      <div class="sqv-box">
        <div class="top-close">
          <p>Report This Profile</p>
          <a href="#" title="Close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a> </div>
        <!--Additional Services-->
        <div>
		<?php 
		 echo $this->Form->create(null, [
			  'url' => ['controller' => 'dashboard', 'action' => 'profile-report'],
			  'id'=>'profile-report',
			]);
			echo $this->Form->input('ProfileReport.sitter_id',[
				'type' =>'hidden',
				'value'=>@$sitter_id]);
		?>
          <p class="reson-pad">Reason for reporting (required):</p>
            <?php  
				echo $this->Form->input('ProfileReport.report_reason',[               
				'templates' => ['inputContainer' => '{{content}}'],
				'label'=>false,
				'class'=>'form-control',
				'type'=>'textarea',
				'row'=>'5' 
				]);
		  ?>
          <!--<textarea class="form-control" rows="5"></textarea>-->
           <div class="pull-right bt-pad">
            <button class="btn btn-default" data-dismiss="modal">cancel</button>
            &nbsp;
            <button id="submit-report" type="submit" class="btn btn-success" >Submit</button>
          </div>
          <?php $this->Form->end(); ?>
        </div>
        <!--Additional Services--> 
      </div>
    </div>
  </div>
</div>

<?php
echo $this->element('frontElements/Search/notification_pet_add');
echo $this->element('frontElements/Search/notification_check_login');
 ?>
<input id="boarding_day_rate" type="hidden" value="<?php echo @$sh_day_rate; ?>">
<input id="boarding_night_rate" type="hidden" value="<?php echo @$sh_day_rate; ?>">

<input id="house_sitting_day_rate" type="hidden" value="<?php echo @$gh_day_rate; ?>">
<input id="house_sitting_night_rate" type="hidden" value="<?php echo @$gh_night_rate; ?>">

<input id="dorp_in_visit" type="hidden" value="<?php echo @$userData->user_sitter_services[0]->gh_drop_in_visit_rate != ''?@$userData->user_sitter_services[0]->gh_drop_in_visit_rate:0; ?>">

<input id="day_rate" type="hidden" value="<?php echo @$sh_day_rate; ?>">
<input id="night_rate" type="hidden" value="<?php echo @$sh_night_rate; ?>">

<input id="mp_grooming_rate" type="hidden" value="<?php echo @$userData->user_sitter_services[0]->mp_grooming_rate != ''?@$userData->user_sitter_services[0]->mp_grooming_rate:0; ?>">
<input id="mp_training_rate" type="hidden" value="<?php echo @$userData->user_sitter_services[0]->mp_training_rate != ''?@$userData->user_sitter_services[0]->mp_training_rate:0; ?>">
<input id="mp_recreation_rate" type="hidden" value="<?php echo @$userData->user_sitter_services[0]->mp_recreation_rate != ''?@$userData->user_sitter_services[0]->mp_recreation_rate:0; ?>">
<input id="mp_driving_rate" type="hidden" value="<?php echo @$userData->user_sitter_services[0]->mp_driving_rate != ''?@$userData->user_sitter_services[0]->mp_driving_rate:0; ?>">

<input id="total_days" type="hidden" value="">
<input id="start_date" type="hidden" value="">
<input id="end_date" type="hidden" value="">

<!--Additional Services Popup--> 
<script>
	//SCRIPT FOR ADD DATEPICKER
    $(document).ready(function() {
		$(".display-calender1").click(function() {
            $("#bookingrequests-booking-start-date").focus();

        });
        
         $(".display-calender").click(function() {
            $("#bookingrequests-booking-end-date").focus();

        });
        
		$( "#bookingrequests-booking-start-date" ).datepicker({
		  defaultDate: "+1",
		  changeMonth: true,
		  dateFormat: 'yy-mm-dd', 
		  numberOfMonths: 1,
		  yearRange: "-50:+0",
		  minDate: new Date(),
		  onSelect: function(date){

				var selectedDate = new Date(date);
				var msecsInADay = 86400000;
				var endDate = new Date(selectedDate.getTime() + msecsInADay);
		
			  $( "#bookingrequests-booking-end-date" ).datepicker( "option", "minDate", date );
				
		        var max = $(this).datepicker('getDate'); // Get selected date
				$('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
				var start = $("#bookingrequests-booking-start-date").datepicker("getDate");
				var end = $("#bookingrequests-booking-end-date").datepicker("getDate");
				var days = (end - start) / (1000 * 60 * 60 * 24);
				$("#start_date").val($.datepicker.formatDate('dd/mm/yy',start));
				$("#end_date").val($.datepicker.formatDate('dd/mm/yy',end));
				$("#total_days").val(days);
				if(days >= 0){
					appendService();
				}
			}
		 
		});
		
		//DATE PICKER SCRIPT FOR TO DATE
		$( "#bookingrequests-booking-end-date" ).datepicker({
		  defaultDate: "+1",
		  changeMonth: true,
		  dateFormat: 'yy-mm-dd',
		  numberOfMonths: 1,
		  yearRange: "-50:+0",
		  minDate: new Date(),
		  onClose: function( selectedDate ) {
			//$( "#boardingFrom" ).datepicker( "option", "maxDate", selectedDate );
			
		  },
		   onSelect: function (dateStr) {
				var max = $(this).datepicker('getDate'); // Get selected date
				$('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
				var start = $("#bookingrequests-booking-start-date").datepicker("getDate");
				var end = $("#bookingrequests-booking-end-date").datepicker("getDate");
				var days = (end - start) / (1000 * 60 * 60 * 24);
				$("#start_date").val($.datepicker.formatDate('dd/mm/yy',start));
				$("#end_date").val($.datepicker.formatDate('dd/mm/yy',end));
				$("#total_days").val(days);
				if(days >= 0){
					appendService();
				}
			}
		  
		});
		
		/*Add different services with coma spareate */
        $("ul.booking-services li").click(function(){
            /*if ($(this).hasClass("new_active") == true){
                $(this).removeClass("new_active");
                
                //var id = $(this).attr('id');
                //$('.'+id).hide();
            }else{*/
            var guest_num = 0;
            $('#all-guests li>input').each(function(){
                var guest_checked = $(this).prop("checked");
                if(guest_checked){
					guest_num++;
				}
            });
			   if(guest_num == 0){
				   guest_num = 1;
			   }
               $("ul.booking-services li").each(function(){
				      $(this).removeClass("new_active");
				});
				$(this).addClass("new_active");
                $('.appendService').hide();
                
                var d = new Date();
                var month = d.getMonth()+1;
				var day = d.getDate();

				var current_date = (day<10 ? '0' : '') + day + '/' + (month<10 ? '0' : '') + month + '/' +(d.getFullYear()) ;
				
				 var total_days,from_date,to_date;
				 	 
				 var total_days_date_picker = $("#total_days").val();
				 if(total_days_date_picker != ""){
					   total_days = parseInt(total_days_date_picker)+1;
					   
					   from_date = $("#start_date").val();
				       to_date = $("#end_date").val();
				 }else{
					  total_days = 1;
					  from_date = current_date;
					  to_date = current_date;
				 }
				var service_id = $(this).attr('id');
              
              if(service_id == 'li_boarding'){
				 var day_rate = $("#boarding_day_rate").val();
				 var night_rate = $("#boarding_night_rate").val();
				  
				 var day_total = day_rate*total_days;
				 var night_total = night_rate*total_days;
				 var total = (day_total+night_total)*guest_num;
				  $("#show-total-amount").text("<?php echo @$cuntry_currency; ?> "+total);
				  
				 var main_content = "<li>Boarding for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(day_rate*total_days*guest_num)+" p/day<hr></li><li>Boarding for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(night_rate*total_days*guest_num)+" p/night</li>";
			  }
			  if(service_id == 'li_house_sitting'){
				 var hs_day_rate = $("#house_sitting_day_rate").val();
				 var hs_night_rate = $("#house_sitting_night_rate").val();
				  
				 var day_total = hs_day_rate*total_days;
				 var night_total = hs_night_rate*total_days;
				 
				 var total = (day_total+night_total)*guest_num;
				  $("#show-total-amount").text("<?php echo @$cuntry_currency; ?> "+total);
				  
				 var main_content = "<li>House Sitting for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+hs_day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(hs_day_rate*total_days*guest_num)+" p/day<hr></li><li>House Sitting for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+hs_night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(hs_night_rate*total_days*guest_num)+" p/night</li>";
			  }else
			   if(service_id == 'li_drop_in_visit'){
				 var drop_visit_rate = $("#dorp_in_visit").val();
				  
				  var total = drop_visit_rate*total_days*guest_num;
				  $("#show-total-amount").text("<?php echo @$cuntry_currency; ?> "+total);
				 
				  var main_content = "<li>Drop in visit for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+drop_visit_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(drop_visit_rate*total_days*guest_num)+" p/day";
			   }else
			   if(service_id == 'li_day_night'){
				 var day_rate = $("#day_rate").val();
				 var night_rate = $("#night_rate").val();
				  
				 var day_total = day_rate*total_days;
				 var night_total = night_rate*total_days;
				 
				 var total = (day_total+night_total)*guest_num
				  $("#show-total-amount").text("<?php echo @$cuntry_currency; ?> "+total);
				  
				 var main_content = "<li>Day/Night for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(day_rate*total_days*guest_num)+" p/day<hr></li><li>Day/Night for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(night_rate*total_days*guest_num)+" p/night</li>";
			 }else
			   if(service_id == 'li_maket_place'){
				 var mp_grooming_rate = $("#mp_grooming_rate").val();
				 var mp_training_rate = $("#mp_training_rate").val();
				 var mp_recreation_rate = $("#mp_recreation_rate").val();
				 var mp_driving_rate = $("#mp_driving_rate").val();
				  
				 var mp_grooming_total = mp_grooming_rate*total_days;
				 var mp_training_total = mp_training_rate*total_days;
				 var mp_recreation_total = mp_recreation_rate*total_days;
				 var mp_driving_total = mp_driving_rate*total_days;
				 
				 var total = (mp_grooming_total+mp_training_total+mp_recreation_total+mp_driving_total)*guest_num;
				 
				 $("#show-total-amount").text("<?php echo @$cuntry_currency; ?> "+total);
				  
				 var main_content = "<li>Market Place for "+total_days+" day grooming</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_grooming_rate+" x "+total_days+" grooming x "+guest_num+" guest @ "+(mp_grooming_rate*total_days*guest_num)+" p/grooming<hr></li><li>Market Place for "+total_days+" day training</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_training_rate+" x "+total_days+" training x "+guest_num+" guest @ "+(mp_training_rate*total_days*guest_num)+" p/training</li><hr><li>Market Place for "+total_days+" day recreation</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_recreation_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(mp_recreation_rate*total_days*guest_num)+" p/day<hr></li><li>Market Place for "+total_days+" day driving</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_driving_rate+" x "+total_days+" driving x "+guest_num+" guest @ "+(mp_driving_rate*total_days*guest_num)+" p/driving</li>";
			   }
			  
               $("#bookingPetInfo").append('<div class="pet-info-wrap alert appendService" ><div class="pet-info-inner"><ul class="list-unstyled">'+main_content+'</ul></div><div class="pet-info-bot"><p>Total  :<span class="pull-right text-right"> <b>$'+total+'</b></span></p></div></div>');
            //}
            
            var textArray = $('ul.booking-services li.new_active').find('a:first').map(function() {
                return $(this).attr('data-rel');
            }).get(); // ["boarding", "house_sitting"]
            
            var textString = textArray.join(); // "boarding", "house_sitting"
            $('#bookingrequests-required-service').val(textString);
        });
        //Click on guest
         $("input.guests").click(function(){
          
            var guest_num = 0;
            $('#all-guests li>input').each(function(){
                var guest_checked = $(this).prop("checked");
                if(guest_checked){
					guest_num++;
				}
            });
			   if(guest_num == 0){
				   guest_num = 1;
			   }
			   $('.appendService').hide();
                
                var d = new Date();
                var month = d.getMonth()+1;
				var day = d.getDate();

				var current_date = (day<10 ? '0' : '') + day + '/' + (month<10 ? '0' : '') + month + '/' +(d.getFullYear()) ;
				
				 var total_days,from_date,to_date;
				 	 
				 	 
				 var total_days_date_picker = $("#total_days").val();
				
				 if(total_days_date_picker != ""){
					   total_days = parseInt(total_days_date_picker)+1;
					   
					   from_date = $("#start_date").val();
				       to_date = $("#end_date").val();
				 }else{
					  total_days = 1;
					  from_date = current_date;
					  to_date = current_date;
				 }
				var service_id = $("#bookingrequests-required-service").val();
              if(service_id == 'boarding'){
				 var day_rate = $("#boarding_day_rate").val();
				 var night_rate = $("#boarding_night_rate").val();
				  
				 var day_total = day_rate*total_days;
				 var night_total = night_rate*total_days;
				 var total = (day_total+night_total)*guest_num;
				  $("#show-total-amount").text("AU "+total);
				  
				 var main_content = "<li>Boarding for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(day_rate*total_days*guest_num)+" p/day<hr></li><li>Boarding for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(night_rate*total_days*guest_num)+" p/night</li>";
			  }
			  if(service_id == 'house_sitting'){
				 var hs_day_rate = $("#house_sitting_day_rate").val();
				 var hs_night_rate = $("#house_sitting_night_rate").val();
				  
				 var day_total = hs_day_rate*total_days;
				 var night_total = hs_night_rate*total_days;
				 
				 var total = (day_total+night_total)*guest_num;
				  $("#show-total-amount").text("AU "+total);
				  
				 var main_content = "<li>House Sitting for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+hs_day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(hs_day_rate*total_days*guest_num)+" p/day<hr></li><li>House Sitting for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+hs_night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(hs_night_rate*total_days*guest_num)+" p/night</li>";
			  }else
			   if(service_id == 'drop_in_visit'){
				 var drop_visit_rate = $("#dorp_in_visit").val();
				  
				  var total = drop_visit_rate*total_days*guest_num;
				  $("#show-total-amount").text("AU"+total);
				 
				  var main_content = "<li>Drop in visit for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+drop_visit_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(drop_visit_rate*total_days*guest_num)+" p/day";
			   }else
			   if(service_id == 'day_nigth_care'){
				 var day_rate = $("#day_rate").val();
				 var night_rate = $("#night_rate").val();
				  
				 var day_total = day_rate*total_days;
				 var night_total = night_rate*total_days;
				 
				 var total = (day_total+night_total)*guest_num
				  $("#show-total-amount").text("AU "+total);
				  
				 var main_content = "<li>Day/Night for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(day_rate*total_days*guest_num)+" p/day<hr></li><li>Day/Night for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(night_rate*total_days*guest_num)+" p/night</li>";
			 }else
			   if(service_id == 'market_place'){
				 var mp_grooming_rate = $("#mp_grooming_rate").val();
				 var mp_training_rate = $("#mp_training_rate").val();
				 var mp_recreation_rate = $("#mp_recreation_rate").val();
				 var mp_driving_rate = $("#mp_driving_rate").val();
				  
				 var mp_grooming_total = mp_grooming_rate*total_days;
				 var mp_training_total = mp_training_rate*total_days;
				 var mp_recreation_total = mp_recreation_rate*total_days;
				 var mp_driving_total = mp_driving_rate*total_days;
				 
				 var total = (mp_grooming_total+mp_training_total+mp_recreation_total+mp_driving_total)*guest_num;
				 
				 $("#show-total-amount").text("AU "+total);
				  
				 var main_content = "<li>Market Place for "+total_days+" day grooming</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_grooming_rate+" x "+total_days+" grooming x "+guest_num+" guest @ "+(mp_grooming_rate*total_days*guest_num)+" p/grooming<hr></li><li>Market Place for "+total_days+" training</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_training_rate+" x "+total_days+" training x "+guest_num+" guest @ "+(mp_training_rate*total_days*guest_num)+" p/training</li><hr><li>Market Place for "+total_days+" day recreation</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_recreation_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(mp_recreation_rate*total_days*guest_num)+" p/day<hr></li><li>Market Place for "+total_days+" day driving</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_driving_rate+" x "+total_days+" driving x "+guest_num+" guest @ "+(mp_driving_rate*total_days*guest_num)+" p/driving</li>";
			   }
			  
               $("#bookingPetInfo").append('<div class="pet-info-wrap alert appendService" ><div class="pet-info-inner"><ul class="list-unstyled">'+main_content+'</ul></div><div class="pet-info-bot"><p>Total  :<span class="pull-right text-right"> <b>$'+total+'</b></span></p></div></div>');
           
        });
        //End
        //Click on end datepicker
        function appendService(){
            var guest_num = 0;
            $('#all-guests li>input').each(function(){
                var guest_checked = $(this).prop("checked");
                if(guest_checked){
					guest_num++;
				}
            });
			   if(guest_num == 0){
				   guest_num = 1;
			   }
			   $('.appendService').hide();
                
                var d = new Date();
                var month = d.getMonth()+1;
				var day = d.getDate();

				var current_date = (day<10 ? '0' : '') + day + '/' + (month<10 ? '0' : '') + month + '/' +(d.getFullYear()) ;
				
				 var total_days,from_date,to_date;
				 	 
				 var total_days_date_picker = $("#total_days").val();
				 if(total_days_date_picker != ""){
					   total_days = parseInt(total_days_date_picker)+1;
					   
					   from_date = $("#start_date").val();
				       to_date = $("#end_date").val();
				 }else{
					  total_days = 1;
					  from_date = current_date;
					  to_date = current_date;
				 }
				var service_id = $("#bookingrequests-required-service").val();
              if(service_id == 'boarding'){
				 var day_rate = $("#boarding_day_rate").val();
				 var night_rate = $("#boarding_night_rate").val();
				  
				 var day_total = day_rate*total_days;
				 var night_total = night_rate*total_days;
				 var total = (day_total+night_total)*guest_num;
				  $("#show-total-amount").text("AU"+total);
				  
				 var main_content = "<li>Boarding for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(day_rate*total_days*guest_num)+" p/day<hr></li><li>Boarding for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(night_rate*total_days*guest_num)+" p/night</li>";
			  }
			  if(service_id == 'house_sitting'){
				 var hs_day_rate = $("#house_sitting_day_rate").val();
				 var hs_night_rate = $("#house_sitting_night_rate").val();
				  
				 var day_total = hs_day_rate*total_days;
				 var night_total = hs_night_rate*total_days;
				 
				 var total = (day_total+night_total)*guest_num;
				  $("#show-total-amount").text("AU "+total);
				  
				 var main_content = "<li>House Sitting for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+hs_day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(hs_day_rate*total_days*guest_num)+" p/day<hr></li><li>House Sitting for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+hs_night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(hs_night_rate*total_days*guest_num)+" p/night</li>";
			  }else
			   if(service_id == 'drop_in_visit'){
				 var drop_visit_rate = $("#dorp_in_visit").val();
				  
				  var total = drop_visit_rate*total_days*guest_num;
				  $("#show-total-amount").text("AU"+total);
				 
				  var main_content = "<li>Drop in visit for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+drop_visit_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(drop_visit_rate*total_days*guest_num)+" p/day";
			   }else
			   if(service_id == 'day_nigth_care'){
				 var day_rate = $("#day_rate").val();
				 var night_rate = $("#night_rate").val();
				  
				 var day_total = day_rate*total_days;
				 var night_total = night_rate*total_days;
				 
				 var total = (day_total+night_total)*guest_num
				  $("#show-total-amount").text("AU "+total);
				  
				 var main_content = "<li>Day/Night for "+total_days+" day</li><li>"+from_date+" to "+to_date+"</li><li>$ "+day_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(day_rate*total_days*guest_num)+" p/day<hr></li><li>Boarding for "+total_days+" night</li><li>"+from_date+" to "+to_date+"</li><li>$ "+night_rate+" x "+total_days+" nigh x "+guest_num+" guest @ "+(night_rate*total_days*guest_num)+" p/night</li>";
			 }else
			   if(service_id == 'market_place'){
				 var mp_grooming_rate = $("#mp_grooming_rate").val();
				 var mp_training_rate = $("#mp_training_rate").val();
				 var mp_recreation_rate = $("#mp_recreation_rate").val();
				 var mp_driving_rate = $("#mp_driving_rate").val();
				  
				 var mp_grooming_total = mp_grooming_rate*total_days;
				 var mp_training_total = mp_training_rate*total_days;
				 var mp_recreation_total = mp_recreation_rate*total_days;
				 var mp_driving_total = mp_driving_rate*total_days;
				 
				 var total = (mp_grooming_total+mp_training_total+mp_recreation_total+mp_driving_total)*guest_num;
				 
				 $("#show-total-amount").text("AU "+total);
				  
				 var main_content = "<li>Market Place for "+total_days+" day grooming</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_grooming_rate+" x "+total_days+" grooming x "+guest_num+" guest @ "+(mp_grooming_rate*total_days*guest_num)+" p/grooming<hr></li><li>Market Place for "+total_days+" day training</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_training_rate+" x "+total_days+" training x "+guest_num+" guest @ "+(mp_training_rate*total_days*guest_num)+" p/training</li><hr><li>Market Place for "+total_days+" day recreation</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_recreation_rate+" x "+total_days+" day x "+guest_num+" guest @ "+(mp_recreation_rate*total_days*guest_num)+" p/day<hr></li><li>Market Place for "+total_days+" day driving</li><li>"+from_date+" to "+to_date+"</li><li>$ "+mp_driving_rate+" x "+total_days+" driving x "+guest_num+" guest @ "+(mp_driving_rate*total_days*guest_num)+" p/driving</li>";
			   }
			  
               $("#bookingPetInfo").append('<div class="pet-info-wrap alert appendService" ><div class="pet-info-inner"><ul class="list-unstyled">'+main_content+'</ul></div><div class="pet-info-bot"><p>Total  :<span class="pull-right text-right"> <b>$'+total+'</b></span></p></div></div>');
           
        }
        //End
    });

	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();
	});
</script>

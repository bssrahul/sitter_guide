<?php $session = $this->request->session(); 
      $currency = $session->read("currency");     
?>
<section class="sr-list-wrap">
    <div class="cust-container">
      <div class="sr-list-area">
        <div class="toptext">
          <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Book on Sitter Guide and receive: Free sitter guide Premium Insurance, Local Australian Customer Support and a Booking Guarantee')); ?>.</p>
        </div>
        <div class="ssr-list-area">
          <div class="sl-area"> 
            <!--distance-->
            <div class="distance">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  
                  <div class="sort-by">
                    <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sort By')); ?></p>
                    <?php 
					    echo $this->Form->input(
							'Search.distance',[
							"type"=>"select",
							'label' => false,
							'id' => 'sel1',
							"options"=>$distancearray,
							"value"=>@$searchByDistance,
							'class'=>'form-control searchByDistance',
						]);
					?>
                  </div>
                </div>
              </div>
            </div>
            <!--/distance--> 
            <!--[Sitter Listing Outer Start]-->
            	<div class="sit-list-outer">            
            <!--sitter listing 1-->           
            <div class="all-sitter-listing">
              <?php if(!empty($resultsData)){ ?>
              <ul class="all-sit-list">
					<?php
						$rankNo=1;
						foreach($resultsData as $results){  ?>
							<li>
							  <div class="sld-area">
             <div class="sit-pic-lft">
								  <div class="ppic-area">
									<div class="sitter-pic"> 
										<?php 	$sub_galleries_result=$results->user_sitter_galleries; 
										
									?>
									   <!--Profile Picture Slide area-->
											<div class="sit-pic-area">                      
												<script>
												$(function(){
														$('.customCrousal<?php echo $rankNo; ?>').carousel({
														interval: false
													}); 
														
												})
												</script>	
												
												  <div id="myCarousel" class="carousel customCrousal<?php echo $rankNo; ?> slide" data-interval="false" data-ride="carousel">   
															<div class="small-slider carousel-inner" role="listbox">   
                                                              <?php 
                                                             if(!empty(@$sub_galleries_result)){
																$flag=0;?>
																       <?php 
																        foreach($sub_galleries_result as $sub_galleries){
																			if($sub_galleries->image != "")
																			{
																				if($flag == 0 ){
																				 $flag=1;
																					if(!empty($results->image)){ ?>
																						<div class="item active">
																						<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($results->image != ''?$results->image:'prof_photo.png'); ?>"> 
																						</div>	
																					<?php }
																					?>
																				   <div class="item <?php echo $results->image == ""?"active":"" ?>">
																					<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($sub_galleries->image != ''?$sub_galleries->image:'prof_photo.png'); ?>"> 
																					</div>
																			<?php  	
																			}else{?>
																					<div class="item ">
																					<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($sub_galleries->image != ''?$sub_galleries->image:'prof_photo.png'); ?>"> 
																					</div>
																			 <?php }
																			}
																		}
																 }else{ ?>
																		<div class="item active">
																		<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>"> 
																			</div>
																 <?php } 
																	?>															
															</div>
														   <!-- Left and right controls -->
															<a class="left carousel-control" href=".customCrousal<?php echo $rankNo; ?>" role="button" data-slide="prev">
															  <span class="fa fa-chevron-left" aria-hidden="true"></span>
															  <span class="sr-only"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?></span>
															</a>
															<a class="right carousel-control" href=".customCrousal<?php echo $rankNo; ?>" role="button" data-slide="next">
															  <span class="fa fa-chevron-right" aria-hidden="true"></span>
															  <span class="sr-only"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Next')); ?></span>
															</a>                                        
												</div>                                                    	
											    <!--quick view-->
											        <div class="quick-view">
															<a href="#" data-rel2="<?php echo $results->id; ?>" data-rel="<?php echo $rankNo; ?>" class="qvBtn select-sitter-images" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Quick View')); ?> </span></a>
													</div>
											     <!--/quick view-->                       
											</div>
												<!--/Profile Picture Slide area-->   
										<?php// } ?>   	
									</div>
									<div class="sitter-p-det"> 
									  <!--head-->
									  <div class="sit-p-head">
											<p class="head-txt">
                                              <span><?php echo $rankNo; ?></span>
												<a href="<?php echo HTTP_ROOT."search/sitter-details/".base64_encode(convert_uuencode($results->id)); ?>">
												<?php echo $results->first_name." ".substr(($results->last_name)?$results->last_name:"",0,1)."."; ?> 
											   </a>
											
											   
											   
											   <?php if(($results['users_badge'])!= ""){
													if($results['users_badge']->dl_pcb_badge){?>
														
														<b>
															<a href="javascript:void(0)" data-html="true" title="<b>Sitter Guide Background Check</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter has successfully passed a basic background check by a third party provider." > 
														
																<img src="<?php echo HTTP_ROOT. 'img/Picture1.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
															</a>
														</b>
														
													<?php	}
													if($results['users_badge']->cpr_rescue_badge){?>
														<b>
															<a href="javascript:void(0)" data-html="true" title="<b>Certificate in animal handling</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is a vet nurse, studying vet sciences or has a certificate in animal handling." > 
																<img src="<?php echo HTTP_ROOT. 'img/Picture8.png'; ?>" alt="Dl & PCB Badge"	height="23px" width="23px"/>
															</a>
														</b>
													<?php	}
													if($results['users_badge']->oral_injucted_badge){?>
														<b>
															<a href="javascript:void(0)" data-html="true" title="<b>Sitter Guide Administer Medication</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter is comfortable to administer oral and injected medication." > 
																<img src="<?php echo HTTP_ROOT. 'img/Picture7.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
															</a>	
														</b>
													<?php	}
													if($results['users_badge']->ffo_area_badge){?>
														<b>
															<a href="javascript:void(0)" data-html="true" title="<b>Fully Fenced Area</b>" data-toggle="popover"  data-placement="top" data-trigger="hover" data-content="This sitter has secure fenced garden or backyard." > 
																<img src="<?php echo HTTP_ROOT. 'img/Picture9.png'; ?>" alt="Dl & PCB Badge" height="23px" width="23px"/>
															</a>	
														</b>
													<?php	}
											}?>
											   											   
											</p>
											
											<p class="about-sit"><?php echo (@$results->user_about_sitter->your_self !="")?@$results->user_about_sitter->your_self:"Profile headline not set yet"; ?>  </p>
											
											<p class="away">
												<?php echo ($results->city !="")?ucwords($results->city):""; ?>  
												<?php echo ($results->state !="")?ucwords($results->state).", ":""; ?>
												<?php echo ($results->country !="")?ucwords($results->country):""; ?>
												<span>
													<i class="fa fa-map-marker" aria-hidden="true"></i> 
													<?php echo round($distanceAssociation[$results->id],2); ?><?php echo $this->requestAction('app/get-translate/'.base64_encode('Km Away')); ?> 
												</span>
											</p>
										  </div>
									  
									  <!--/head--> 
									 
									  <!--rating-->
										  <div class="sitter-rating">
											<!--<div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>-->
											<?php $ratingData=$results->user_ratings;
													$sum=0;$count=0;
													foreach($ratingData as $rating){
														
															
															$rate=$rating->rating;
															$sum=$sum+$rate;
															$count++;
													}
													if($count > 0){
														 $avg=$sum/$count;
													}
													//echo $avg; 
													
													?>
													
										<div class="rating-box">
											<span class="rating">
											<?php	if(!empty($avg)){ 	
                                            ?>
													<input type='radio'  value='5' <?php if(!empty($avg)){ if($avg <= 5 && $avg > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
													
													<input type="radio"  value="4.5" <?php if(!empty($avg)){if($avg <= 4.5 && $avg > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
													
													<input type="radio"  value="4"  <?php if(!empty($avg)){ if($avg <= 4 && $avg > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
													
													<input type="radio"  value="3.5"  <?php if(!empty($avg)){ if($avg <= 3.5 && $avg > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
													
													<input type="radio"  value="3" <?php if(!empty($avg)){ if($avg <= 3 && $avg > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
													
													<input type="radio"  value="2.5" <?php if(!empty($avg)){ if($avg <= 2.5 && $avg > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
													
													<input type="radio"   value="2"  <?php if(!empty($avg)){ if($avg <= 2 && $avg > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
													
													<input type="radio"  value="1.5" <?php if(!empty($avg)){ if($avg <= 1.5 && $avg > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
													
													<input type="radio"  value="1" <?php if(!empty($avg)){ if($avg <= 1 && $avg > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
													
													<input type="radio"  value="0.5"  <?php if(!empty($avg)){ if($avg <= 0.5 && $avg >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
													<?php $avg=0;?>
											<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($avg)){ if($avg <= 5 && $avg > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($avg)){if($avg <= 4.5 && $avg > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($avg)){ if($avg <= 4 && $avg > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($avg)){ if($avg <= 3.5 && $avg > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($avg)){ if($avg <= 3 && $avg > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($avg)){ if($avg <= 2.5 && $avg > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($avg)){ if($avg <= 2 && $avg > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($avg)){ if($avg <= 1.5 && $avg > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($avg)){ if($avg <= 1 && $avg > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($avg)){ if($avg <= 0.5 && $avg >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $avg=0;?>
																		
																		
																<?php	} ?> 
											</span>
										</div>
											<div class="sit-review"> <a href="#" title="Review"><?php echo $count; ?> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Reviews')); ?></a> </div>
										  </div>
									  <!--/rating--> 
									  <!--availability-->
									  <div class="sit-available">
										<ul>
										  <li>
											  <a href="#" title="Available this weekend">
												  <?php
												   if($results->weekend_availaibility == "yes"){
												         echo $this->requestAction('app/get-translate/'.base64_encode('Available this weekend')); 
												   }else{
												        echo $this->requestAction('app/get-translate/'.base64_encode('Not available on weekend'));
												   }
												   ?>
											  </a>
										 </li>
										 <li>
										        <a href="#" title="Available on New Year">
											   <?php
												if($results->availaibility_on_new_year == "yes"){ 
												     echo $this->requestAction('app/get-translate/'.base64_encode('Available on New Year')); 
											    }else{
												   echo $this->requestAction('app/get-translate/'.base64_encode('Not available on New Year')); 
												}
											  ?></a>
										</li>
										
										</ul>
									  </div>
									  <!--availability--> 
									  
									</div>
								  </div>
								  <!--sitter list-->
								  <div class="sit-list-del">
									<ul>
									<?php if(@$results->repeatClient > 0){ ?>
									  <li>
										  <img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> 
										  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat Guests')); ?>: <span><?php echo @$results->repeatClient; ?></span>
									  </li>
									  <?php }
									   if(!empty(@$results->last_booking_date)){ 
									   ?>
									  <li>
										  <img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Last booked')); ?>: <span>
											<?php
											   $seconds =  strtotime(date("Y-m-d H:i:s"))-strtotime(@$results->last_booking_date);
												$days    = floor($seconds / 86400);
												$hours = floor(($seconds - ($days * 86400)) / 3600);
												$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
												$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
												$week_ago = floor(($days)/7);
												  if($week_ago >= 1){
													  echo $week_ago." Week "."ago";
												  }else{
												       echo $days." days "."ago";	  
												  }
												
											  
											?>
											  
											 </span>
									  </li>
									  <?php } 
									  ?>
									  <li>
										  <img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Last active')); ?> 
										  <span>
											<?php 
											if(@$results->avail_status != 'Logout'){
																echo '<span style="color:green">'.$results->avail_status.'<//span>';
											}else{
												$seconds =  strtotime(date("Y-m-d H:i:s"))-strtotime(@$results->last_login);
												$days    = floor($seconds / 86400);
												$hours = floor(($seconds - ($days * 86400)) / 3600);
												$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
												$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
												$active_week_ago = floor(($days)/7);
												  if($active_week_ago >= 1){
													  echo $active_week_ago." Week "."ago";
												  }else{
												       echo $days." days "."ago";	  
												  }
											}
								
											?>
											  
											 </span>
									   </li>
									</ul>
								  </div>
								  <!--sitter list--> 
								  <!--sitter feedback-->
								  <div class="sit-feedback"> 
									<?php 
								
									$lastcomment="";
									$userRating=$results->user_ratings;
									foreach($userRating as $rating){
										
											$commentdata=$rating;
										
									}
									//pr($commentdata);
									$lastcomment=isset($commentdata->comment)?$commentdata->comment:'';
									$UserImage=isset($commentdata->user->image)?$commentdata->user->image:'';
									//pr($UserImage);
									if($results->facebook_id !="" && $results->is_image_uploaded==0){
										if($results->image != "")
										{
											$orgImg = $results->image;
										}else{ 
											$orgImg = 'prof_photo.png';
										} 
									?>
									<img Width="52" height="52" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo $orgImg; ?>"> 

									<?php }else{ ?>
									
									<img Width="52" height="52" alt="<?php echo __('Profile Picture'); ?>" src="<?php if(!empty($UserImage)){echo HTTP_ROOT.'img/uploads/'.$UserImage ; }else{ echo HTTP_ROOT.'img/uploads/prof_photo.png' ;} ?>"> 					   
									<?php  } ?>  
									<?php echo (@$lastcomment !="")?"<p>".@$lastcomment."<p>":"<p class='wc'>Client's comments not given yet</p>"; ?>
								  </div>                      
								  <!--sitter feedback--> 
								</div>
								<?php @$commentdata->comment=''; $lastcomment=''; $userRating = array();?>
								<div class="sit-pic-rgt"> 
								  <!--per night-->
								  <div class="per-nite">
									<p>from <br>
									  <span><?php 
									     if(isset($selected_services) && !empty($selected_services)){ 
											if($selected_services == 'house_sitting'){
												 $pet_night = $results->user_sitter_services[0]->gh_night_rate;
											}else if($selected_services == 'drop_visit'){
												$pet_night = $results->user_sitter_services[0]->gh_drop_in_visit_rate;
											}else if($selected_services == 'day_night_care'){
												$pet_night = $results->user_sitter_services[0]->sh_night_rate;
											}else if($selected_services == 'marketplace'){
												if(isset($market_place_type) && !empty($market_place_type)){
												  $var_sum = 0;
												  foreach($market_place_type as $single_type){
												     $var_sum = $var_sum+$results->user_sitter_services[0]->$single_type;
												  }
												  $pet_night = $var_sum;
												  	
												  }else{
													   $pet_night = $results->user_sitter_services[0]->mp_training_rate;
												  }  
											}else{
												 $pet_night = $results->user_sitter_services[0]->sh_night_rate;
											}
										}else{
											$pet_night = $results->user_sitter_services[0]->sh_night_rate;
										}
									  
									  
									  echo $currency['sign_code']." ".ceil($pet_night*$currency['price']);
										
										/*if(!empty($results->user_sitter_services)){ echo $results->user_sitter_services->sh_day_rate;  };*/ ?></span> per night</p>
								  </div>
								  <!--per night--> 
								  <!--facilities-->

                                     <div class="facilities">
                                        <ul>
                                            <?php //IN CASE NO SERVICES PROVIDED BY THIS USER THEN ALL SERVICES ARE UN FILLED 
                                                if(isset($results->user_sitter_services[0]->mp_training_status) && $results->user_sitter_services[0]->mp_training_status == 1){
                                                    echo '<li>Tranining<span><img src="'.HTTP_ROOT.'img/fac-icon.png" alt="Tranining"/></span></li>';
                                                }else{
                                                    echo '<li>Tranining<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png" alt="Tranining"/></span></li>';
                                                }
                                                if(isset($results->user_sitter_services[0]->mp_recreation_status) && $results->user_sitter_services[0]->mp_recreation_status == 1){
                                                    echo '<li>Recreation<span><img src="'.HTTP_ROOT.'img/fac-icon.png" alt="Recreation"/></span></li>';
                                                }else{
                                                    echo '<li>Recreation<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png" alt="Recreation"/></span></li>';
                                                }
                                                if(isset($results->user_sitter_services[0]->mp_driver_service_status) && $results->user_sitter_services[0]->mp_driver_service_status == 1){
                                                    echo '<li>Driver<span><img src="'.HTTP_ROOT.'img/fac-icon.png" alt="Driver"/></span></li>';
                                                }else{
                                                    echo '<li>Driver<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png" alt="Driver"/></span></li>';
                                                }
                                                if(isset($results->user_sitter_services[0]->mp_grooming_status) && $results->user_sitter_services[0]->mp_grooming_status == 1){
                                                    echo '<li>Grooming<span><img src="'.HTTP_ROOT.'img/fac-icon.png" alt="Grooming"/></span></li>';
                                                }else{
                                                    echo '<li>Grooming<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png" alt="Grooming"/></span></li>';
                                                }
                                            ?>
                                        </ul>
                                     </div>
                                 <!--/facilities-->
								  <!--likebox-->
								  <div class="likebox favourite_sitter1"> 
									
										<?php //echo $results->is_favourite; ?>
										<?php if(trim($results->is_favourite)=='yes'){ ?>
											<a data-count="<?php echo $results->id; ?>" href="javascript:void(0);" class="unlike favouriteSection" data-href="<?php echo HTTP_ROOT.'Search/favorite-sitter/'.base64_encode(convert_uuencode($results->id)).'/'.base64_encode(convert_uuencode($logedInUserId)); ?>"> <i class="icon-lock fa fa-heart heart-pos"></i>
											</a>
										<?php }else{ ?>
																	
											<a data-count="<?php echo $results->id; ?>" href="javascript:void(0);" class="like favouriteSection" data-href="<?php echo HTTP_ROOT.'Search/favorite-sitter/'.base64_encode(convert_uuencode($results->id)).'/'.base64_encode(convert_uuencode($logedInUserId)); ?>">
											 <i class="icon-unlock fa fa-heart-o heart-pos"></i>
											</a>
										<?php } ?>
										<div class="Title_sub likeLoader" style="display:none;position: relative; float: right; right: 30px; bottom: 3px;"> 
											<img src="<?php echo HTTP_ROOT; ?>img/ajax_wait.gif"> 
										</div>
																  
								  </div>
								 <!--likebox--> 
								</div>
							  </div>
							</li>
						
						<?php 
						$rankNo++;
						} ?>
			

						<?php //echo $this->element("frontElements/common/static_search_content"); ?>
               
              </ul>
              <?php }else{ ?>
				<div class="noresult-found">
						<p><?php echo $this->requestAction('app/get-translate/'.base64_encode("We couldn't find any sitters that matched your criteria")); ?>.<br>
						<span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Try changing your search criteria or updating your location')); ?>.</span></p>
				 </div>
			  <?php } ?>	  
              
            </div>            
            <!--sitter listing --> 
				
            <!--/sitter listing similar result-->
				<?php //echo $this->element('frontElements/Search/similar_sitter'); ?>
			<!--/sitter listing similar result--> 
          
            <!---loading area
            	<div class="loading-more">
                	<a href="#" title="loading More">   <img src="<?php echo HTTP_ROOT; ?>img/loading-icon.png" width="22" height="22" alt=""/>  </a>
                </div>
            loading area-->
            
                       
            </div>            
            <!--[Sitter Listing Outer End]-->            
                     
          </div>
          
			<!--[Right Map Start]-->
            <div id="sidebar" class="sl-map">            	
            	<!--<div class="enlarge-map">
                	<div class="row">
                    	<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12"> 
                        	<a href="#" title="Enlarge Map">Enlarge map</a>
                        </div>
                    	<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12"> 
                        	<input type="checkbox"> Update  when i move the map 	
                        </div>                        
                    </div>
                </div>-->
                <?php
				  // Override any of the following default options to customize your map
				  $map_options = array(
					'id' => 'map_canvas',
					'width' => '100%',
					'height' => '768px',
					'style' => '',
					'zoom' => 6,
					'type' => 'ROADMAP',
					'custom' => null,
					'localize' => false,
					'latitude' => @$sourceLocationLatitude,
					'longitude' => @$sourceLocationLongitude,
					'marker' => true,
					'markerTitle' => 'Guest current location',
					'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
					'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
					'infoWindow' => true,
					'windowText' => 'Guest current location',
					'draggableMarker' => false
				  );
				
					//INITIAl GOOGLE MAP
					echo $this->GoogleMap->map($map_options); 
				?>
				<?php if(!empty($resultsData)){ 
						$mapInc =1;
						foreach($resultsData as $results){  
							$position['latitude'] = $results->latitude;
							$position['longitude'] = $results->longitude;
							$full_name = $results->first_name." ".$results->last_name;
							
							
							//ADD MARKER ON GOOGLE MAP	
							echo $this->GoogleMap->addMarker('map_canvas',$results->id,$position,
										array(
										'markerTitle'=>$mapInc,
										'windowText'=>$full_name,
										'windowText'=>$full_name,
										//'markerIcon'=>'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld='.$mapInc.'|72A105|FFFFFF',
										'markerIcon'=>HTTP_ROOT.'img/markers/markers_orange/number_'.$mapInc.'.png',
										)
								  ); 
							$mapInc++;
						}
					}		
				?>
           </div>
           <!--[Right Map End]-->
           
        </div>
      </div>
    </div>
  </section>
						
						
						
					<!--info popup-->
			<?php if(!empty($resultsData)){ ?>
				<div role="dialog" id="myModal2" class="modal fade in" style="display: none;">
							    <div class="modal-dialog">    
								   <div data-ride="carousel" class="carousel slide"  data-interval="false"  id="myCarousel2">    
									  <div role="listbox" class="carousel-inner">
									  <?php
									//pr($resultsData);die;
									$qvModal = 1;$innerSlideNO=1;	
									foreach($resultsData as $results){
									?>
										<div class="popUpSlider item qvModal<?php echo $qvModal; ?>">      
										 <div data-id="<?php echo @$results->id; ?>" class="sitter-quike-view">
											<div class="sqv-box">
												<div class="top-close"> 
												    <p>Sitter Quick Details <?php echo @$results->id; ?></p>
													<a data-dismiss="modal" title="Close" href="#"><i aria-hidden="true" class="fa fa-times"></i></a>           
												</div>
												<div class="sit-head">
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8"> 
														  <div class="lft-head">                       	
															<p class="s-name"><?php if(@$results->first_name != ""){ echo $results->first_name."  ".$results->last_name;}?></p>
															<p class="s-det">Special needs is my specialty.</p>
															<p class="s-ads"><?php echo @$results->address." ".@$results->address2." ,".@$results->state." ,".@$results->city.", ".@$results->zip; ?> 
                                                            </p>
															</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
														<div class="rgt-hours">
															<p>
															 from
										                 <span><?php echo $currency['sign_code']." ".((@$results->user_sitter_services[0]->sh_night_rate)*$currency['price']); ?></span>
																	per night
																	</p>
														</div>            
														</div>
													</div>                	
												</div>
												<!--Start carousal for sitter images-->
											    <?php $nextSlider =  @$results->id; ?>
												<div class="quick-slide">                	
												<div id="customCrousalNext<?php echo $nextSlider; ?>" class="carousel slide customCrousalNext<?php echo $nextSlider; ?>" data-ride="carousel">
												
												<div class="carousel-inner" role="listbox" id="getImg<?php echo @$results->id; ?>"> 
												</div>
											    <!-- Left and right controls -->
												<a class="left ajaxSliderPrev carousel-control" href="#customCrousalNext<?php echo $nextSlider; ?>" role="button" data-slide="prev">
												  <span class="fa fa-chevron-left" aria-hidden="true">
												  </span>
												  <span class="sr-only">Previous
												  </span>
												</a>
												<a class="right ajaxSliderNext carousel-control" href="#customCrousalNext<?php echo $nextSlider; ?>" role="button" data-slide="next">
												  <span class="fa fa-chevron-right" aria-hidden="true">
												  </span>
												  <span class="sr-only">Next
												  </span>
												</a>
												</div>               	 
												</div>
												<!--End quick slide-->
												<!--content area Start-->
                                                 <div class="sqv-mid">
													<div class="row">
														<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
														<div class="sqv-mid-lft">
															<p class="md-head"><?php if(@$results->first_name != ""){ echo $results->first_name."  ".$results->last_name;}?></p>    
															<ul>
																<?php if(@$results->user_professional_accreditations_details[0]->experience >0){ ?>
																<li><?php echo @$results->user_professional_accreditations_details[0]->experience; ?> Years Of Experience</li>
																<?php } ?>
																 <?php if(@$results->user_professional_accreditations_details[0]->oral_madications == 1){ ?>
																<li>Oral Medication Administration</li>
																<?php } ?>
																 <?php if(@$results->user_professional_accreditations_details[0]->injected_madications == 1){ ?>
																<li>Injected Medication Administration</li>
																<?php } ?>
																 <?php if(@$results->user_professional_accreditations_details[0]->experience > 1){ ?>
																<li>Senior Dog Experience </li>
																<?php } ?>
															</ul>   
															<p class="md-head"><?php if(@$results->first_name != ""){ echo $results->first_name."  ".$results->last_name;}?>'s Home</p> 
															 <ul>
																<li>House</li>
																 <?php if(@$results->user_sitter_house->fully_fenced == "yes"){ ?>
																<li>Fenced Yard</li>
																<?php } ?>
																<?php if(@$results->user_sitter_house->smokers == "no"){ ?>
																<li>Non-Smoking Household</li>
																<?php } ?>
																<?php if(@$results->user_sitter_house->dogs_in_home == "yes" && @$results->user_sitter_house->birds_in_cages == "no" && @$results->user_sitter_house->cats_in_home == "no"){ ?>
																<li>Has 1 Dog, No Other Pets</li>
																<?php } ?>
																<?php if(!empty(@$results->user_sitter_house->breaks_provided_every)){ ?>
																<li>Potty Breaks Every <?php echo @$results->user_sitter_houses[0]->breaks_provided_every; ?> Hours</li>
																<?php } ?>
															</ul>                                                
														</div>
													</div>
														<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">                 
														<div class="sqv-mid-rgt">
															<div class="sqvmr-btn">
															<a title="Contact Sitter" href="<?php echo HTTP_ROOT."search/sitter-details/".base64_encode(convert_uuencode($results->id)); ?>">Contact Sitter</a>
															<a title="View Full Profile" href="<?php echo HTTP_ROOT."search/sitter-details/".base64_encode(convert_uuencode($results->id)); ?>">View Full Profile</a>
															</div>
															<div class="sqvmd-rt-bot">
																<ul>
																 <li>90% response rate
																 <span> Sitter responds to most requests within 24 hours</span></li>
																 <li>A few minutes <span>Sitter responds in a few minutes</span></li>
																 <li>30% of stays <span>Sitter rarely sends photos through Rover</span></li>
																 <li><?php echo $results->repeatClient; ?> repeat clients <span>Sitter had repeat clients</span></li>
																	</ul>
															</div>
														</div>
													</div>     
													</div>               
												</div>
												
											</div>         	
										 </div>     
									  </div>
								<?php $qvModal++; } ?></div>
								         <!-- Left and right controls -->
											<a data-slide="prev" role="button" href="#myCarousel2" class="left leftPopup myCarousel2next carousel-control ajaxMainSliderPrev">
											  <span aria-hidden="true" class="fa fa-chevron-left"></span>
											  <span data-rel="" class="sr-only">
												  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?>
											  </span>
											</a>
											<a data-slide="next" role="button" href="#myCarousel2" class="right rightPopup myCarousel2next carousel-control ajaxMainSliderNext">
												<span aria-hidden="true" class="fa fa-chevron-right"></span>
												<span data-rel="" class="sr-only">
													<?php echo $this->requestAction('app/get-translate/'.base64_encode('Next')); ?>
												</span>
											</a>
									     <!-- Left and right controls -->
										  </div>   
								</div>
					
				</div> <?php } ?>	
									
								
<!--/info popup--> 
<style>
.searchImg{
		width:163px;
		height:165px;
}

.favouriteSection {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0 !important;
    color: #da6a14;
    font-size: 25px;
    text-decoration:none !important;
    outline:none;
}
.mapIconLabel {
    font-size: 15px;
    font-weight: bold;
    color: #FFFFFF;
    font-family: 'DINNextRoundedLTProMediumRegular';
}
</style>

<script>
	
	
	$(function(){
		
		$(document).on('click',".qvBtn",function(){
		
			if($('#myCarousel2').find("div.popUpSlider").removeClass("active")){
				$('#myCarousel2').find("div.popUpSlider").removeClass("active");
			}
			var qv = $(this).attr('data-rel');
			$(".qvModal"+qv).addClass('active');
		
		});
		
		$('#myCarousel2').bind('slide.bs.carousel', function (e) {
		
			
			
		}); 
	});
</script>
<?php
echo $this->Html->script('Front/for-sticky.js'); ?>

<script>
	 $(document).ready(function(){
	 
	 $("#sidebar").stick_in_parent();
	
	 });
	 //For slider
	 
     $(document).on('click',".quick-view",function(){
		 //alert($(this).find('a.select-sitter-images').attr("data-rel2"));
		 //$('#myCarousel2').find("active").;
         //$( "#myCarousel2" ).hasClass("active")
         
         sitter_images($(this).find('a.select-sitter-images').attr("data-rel2"));
	     
	     
	 });
     $(document).on('click',".rightPopup",function(){
		 if($("#myCarousel2").find("div.active").next().find('div.sitter-quike-view').attr('data-id')){
			sitter_images($("#myCarousel2").find("div.active").next().find('div.sitter-quike-view').attr('data-id'));
	          
	     }else{
		    sitter_images($('.qvModal'+$('#myCarousel2 .popUpSlider').length).find('div.sitter-quike-view').attr('data-id'));
		 } 
	 });
	 $(document).on('click',".leftPopup",function(){
		 if($("#myCarousel2").find("div.active").prev().find('div.sitter-quike-view').attr('data-id')){
			 sitter_images($("#myCarousel2").find("div.active").prev().find('div.sitter-quike-view').attr('data-id'));
		  }else{
			  sitter_images($('.qvModal'+$('#myCarousel2 .popUpSlider').length).find('div.sitter-quike-view').attr('data-id'));
          }
	});
	var sitter;
	function sitter_images(sitter){
		           $.ajax({
						url: "<?php echo HTTP_ROOT."search/sitter-gallery"; ?>",
						data:{sitter:sitter},
						type:"POST",
						
						beforeSend: function(){
						  $('#getImg'+sitter).html('<div class="ajax_overlay"><img class="search-img" src="'+ajax_url+'img/walking.gif"/></div>');
						  $(".ajax_overlay").show();
						},
						
						complete: function(){
						  $('#getImg'+sitter).html('');
						  $(".ajax_overlay").hide();
						},
						success:function(res)
						{
							$('#getImg'+sitter).html("");
							setTimeout(function(){
								$('#getImg'+sitter).html(res);
								$('.ajaxSliderNext').attr('href','#customCrousalNext'+sitter); 
								$('.ajaxSliderPrev').attr('href','#customCrousalNext'+sitter); 
							},1000);

							setTimeout(function(){
								$('.customCrousalNext'+sitter).carousel(); 	
							},1500);
							
						}
					});
	}
</script>

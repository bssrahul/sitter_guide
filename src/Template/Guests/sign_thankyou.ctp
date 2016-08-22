<!--[.innerpage-conent Area start]-->
<?php //echo "<pre>"; print_R($getUsersArr);die; ?>
<main>
  <section>
    <div class="innerpage-conent">
      <div class="thankyou-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
              <h1 class="thankyou-heading"><span ><i></i></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Congrats! Your messages were sent')); ?> </h1>
              <p class="thankyou-title"></p>
              <p class="thankyou-text" ><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact at least one more sitter')); ?></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Messaging more sitters increase your chance of finding a perfect match')); ?>.</p>
            </div>
          </div>
            <?php if(!empty($getUsersArr)){?>
          <div class="wrapper-thankyou ">
           <form id="thankUmail" method="POST">
           <?php foreach($getUsersArr as $key =>$results){ 
			   if(!empty($results['user_sitter_services'])){
				if($key == 0){
			   ?>
			 
                <div class="thankyou1">
                  <div class="row">                  	
                    <div class="thanks-slist"> 
                    
                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        	<div class="tsl-img">
	                            <div class="ck-box">
                                	<input type="checkbox" name="checkboxG3[]" id="<?php echo 'checkboxG3'.$results->id; ?>" class="css-checkbox"    value="<?php echo $results->id; ?>" />
                                    <label for="<?php echo 'checkboxG3'.$results->id; ?>" class="css-label"></label> 
    	                        </div>
                                <div class="img-box">
									<?php
									$UserImage=isset($results->image)?$results->image:'';
										//pr($UserImage);
										if($results->facebook_id !="" && $results->is_image_uploaded==0){
											if($results->image != "")
											{
												$orgImg = $results->image;
											}else{ 
												$orgImg = 'prof_photo.png';
											} 
										?>
										<img  alt="<?php echo __('Profile Picture'); ?>" src="<?php echo $orgImg; ?>"> 

										<?php }else{ ?>
										
										<img  alt="<?php echo __('Profile Picture'); ?>" src="<?php if(!empty($UserImage)){echo HTTP_ROOT.'img/uploads/'.$UserImage ; }else{ echo HTTP_ROOT.'img/uploads/prof_photo.png' ;} ?>"> 					   
										<?php  } ?>
									
									
									
                            		<!--<img src="images/quick-view-image.jpg"  alt="Sitter Guide">-->
                                </div>
                            </div>                        	
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        	<div class="tsl-mid">  
                            	<div class="tsl-name">
                                	<p><?php echo $results['first_name']. "  ". $results['last_name'];?>
                                	<?php if(!empty($results['users_badge'])){
										
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
                                    <!-- <b><img src="images/Picture1.png"  alt="Sitter Guide"></b>
                                     <b><img src="images/Picture8.png"  alt="Sitter Guide"></b>
                                      <b><img src="images/Picture7.png"  alt="Sitter Guide"></b> 
                                      <b><img src="images/Picture9.png"  alt="Sitter Guide"></b> -->
                                    
                                      </p>                                	
                                </div>
                                <?php if(!empty($results['user_ratings'])){
												 $ratingData=$results['user_ratings'];
														$sum=0;$count=0;
														foreach($ratingData as $rating){
															
																
																$rate=$rating->rating;
																
																$sum=$sum+$rate;
																$count++;
																$comment=$rating->comment;
														}
														if($count > 0){
															 $avg=$sum/$count;
														}
														//echo $avg; 
														//echo $count;
														}?>
                                <div class="tsl-details">
                                	<p><?php if(!empty($comment)){ echo $comment; $comment=""; }else { echo "Dummy Details content will be here"; } ?></p>
                                </div>
                                <div class="tsl-ratearea">
                                	<ul>
                                    	<li class="repeat"><a href="#"><?php if(!empty($results['repeatClient'])){ echo $results['repeatClient']." ".$this->requestAction('app/get-translate/'.base64_encode(" Repeat Client"));  }else { echo "0".$this->requestAction('app/get-translate/'.base64_encode(" Repeat Client")) ;} ?></a></li>
                                        <li class="review"><a href="#"><?php if(!empty($count)){ echo $count." Reviews"; $count=0; }else { echo "0 Reviews"; } ?></a></li>
                                        <li>
											
												<!--<img src="images/rating-icons.png"  alt="Sitter Guide">-->
												
														
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
										
											
										</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        	<div class="price-from">
                        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('from')); ?> <span><?php if(!empty($results['user_sitter_services'][0]['gh_night_rate'])){echo "$".$results['user_sitter_services'][0]['gh_night_rate']; } ?></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('per night')); ?></p>
                            </div>
                        </div>
                        
                    </div>
                  </div>
                </div>
            <?php } else{?>
				
				  <div class="thankyou1 margt20">
                  <div class="row">                  	
                    <div class="thanks-slist"> 
                    
                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        	<div class="tsl-img">
	                            <div class="ck-box">
                                	<input type="checkbox" name="checkboxG3[]" id="<?php echo 'checkboxG3'.$results->id; ?>" class="css-checkbox"  value="<?php echo $results->id; ?>" checked/>
                                    <label for="<?php echo 'checkboxG3'.$results->id; ?>" class="css-label"></label> 
    	                        </div>
                                <div class="img-box">
									<?php
									$UserImage=isset($results->image)?$results->image:'';
										//pr($UserImage);
										if($results->facebook_id !="" && $results->is_image_uploaded==0){
											if($results->image != "")
											{
												$orgImg = $results->image;
											}else{ 
												$orgImg = 'prof_photo.png';
											} 
										?>
										<img  alt="<?php echo __('Profile Picture'); ?>" src="<?php echo $orgImg; ?>"> 

										<?php }else{ ?>
										
										<img  alt="<?php echo __('Profile Picture'); ?>" src="<?php if(!empty($UserImage)){echo HTTP_ROOT.'img/uploads/'.$UserImage ; }else{ echo HTTP_ROOT.'img/uploads/prof_photo.png' ;} ?>"> 					   
										<?php  } ?>
									
									
									
                            		<!--<img src="images/quick-view-image.jpg"  alt="Sitter Guide">-->
                                </div>
                            </div>                        	
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        	<div class="tsl-mid">  
                            	<div class="tsl-name">
                                	<p><?php echo $results['first_name']. "  ". $results['last_name'];?>
                                   	<?php if(!empty($results['users_badge'])){
										
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
                                    <!-- <b><img src="images/Picture1.png"  alt="Sitter Guide"></b>
                                     <b><img src="images/Picture8.png"  alt="Sitter Guide"></b>
                                      <b><img src="images/Picture7.png"  alt="Sitter Guide"></b> 
                                      <b><img src="images/Picture9.png"  alt="Sitter Guide"></b> -->
                                    
                                      </p>                                	
                                </div>
                                <?php if(!empty($results['user_ratings'])){
												 $ratingData=$results['user_ratings'];
														$sum=0;$count=0;
														foreach($ratingData as $rating){
															
																
																$rate=$rating->rating;
																
																$sum=$sum+$rate;
																$count++;
																$comment=$rating->comment;
														}
														if($count > 0){
															 $avg=$sum/$count;
														}
														//echo $avg; 
														//echo $count;
														}?>
														
                                <div class="tsl-details">
                                	<p><?php if(!empty($comment)){ echo $comment; $comment=""; }else { echo $this->requestAction('app/get-translate/'.base64_encode("Dummy Details content will be here")); } ?></p>
                                </div>
                                <div class="tsl-ratearea">
                                	<ul>
                                    	<li class="repeat"><a href="#"><?php if(!empty($results['repeatClient'])){ echo $results['repeatClient']." " .$this->requestAction('app/get-translate/'.base64_encode(" Repeat Client"));  }else { echo "0 " .$this->requestAction('app/get-translate/'.base64_encode(" Repeat Client"));} ?> </a></li>
                                        <li class="review"><a href="#"><?php if(!empty($count)){ echo $count." ".$this->requestAction('app/get-translate/'.base64_encode(" Reviews")); $count=0; }else { echo "0 ".$this->requestAction('app/get-translate/'.base64_encode(" Reviews")); } ?></a></li>
                                        <li>
											
												<!--<img src="images/rating-icons.png"  alt="Sitter Guide">-->
												
														
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
										
											
										</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        	<div class="price-from">
                        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('from')); ?> <span><?php if(!empty($results['user_sitter_services'][0]['gh_night_rate'])){echo "$".$results['user_sitter_services'][0]['gh_night_rate']; } ?></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('per night')); ?> </p>
                            </div>
                        </div>
                        
                    </div>
                  </div>
                </div>
				<?php } } }?>    
                
                
               
               
            
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              	<div class="tslist-bot">
                	<textarea class="contact-sit" name="message" required ></textarea>
                <button type="submit" class="btn  btn-block btn-return"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact This Sitter')); ?></button>
                	<p>--or--</p>             
                <button class="btn btn-update btn-block " ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?>... </button>
                </div>
              </div>
            </div>
          </div>
         
        </div>
       </form>
			<?php } ?>
			<hr />
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h5 class="contact-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Connect with us for the  Latest News & Update')); ?></h5>
              <ul class="list-inline text-center thanks-social-icon">
                <li> <a href="#">
                  <div class="thanks-facebook-icon"><i class="fa fa-facebook" ></i></div>
                  </a> </li>
                <li> <a href="#">
                  <div class="thanks-twiter-icon"><i class="fa fa-twitter" ></i></div>
                  </a> </li>
                <li> <a href="#">
                  <div class="thanks-gplus-icon"><i class="fa fa-google-plus" ></i></div>
                  </a> </li>
                <li> <a href="#">
                  <div class="thanks-linked-icon"><i class="fa fa-linkedin" ></i></div>
                  </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

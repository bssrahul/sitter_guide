<!--[leading area]-->
        <section class="leading-area">
        <div class="container">
            <div class="lead-area">
                <!--heading--> 
                    <div class="head-box">
                        <h2> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Leading  Sitting And Walkers In Your Area')); ?></h2>
                            <p> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Meet some of our leading sitters & walkers')); ?> </p>
                            <span class="head-bot"><b></b></span>
                    </div>                              
                <!--/heading-->   
                <div class="lsw-area">
                    <div class="row">
					<?php if(!empty($FavUsersdata)){ $flag=0;
								foreach(@$FavUsersdata as $favourate){ 
									if($flag < 3){?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="lswb-area">
                                <div class="img-area">
                                    <div class="img-box">
									<?php if(!empty($favourate[0]->image)){?>
												
												 <img src="<?php echo HTTP_ROOT.'img/uploads/'.((@$favourate[0]->image) != '' ?(@$favourate[0]->image):'dm.png'); ?>" alt="Profile Picture"/>
									<?php }	?>
                                        
                                    </div>
                                    <div class="img-bot">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-6">                                               
                                                <p class="per-day"><?php $userservices=$favourate[0]->user_sitter_services;
																		if(!empty($userservices[0]->sh_day_rate)){
																		echo $this->requestAction('app/get-translate/'.base64_encode('From $'.$userservices[0]->sh_day_rate.' per day'));
																		}else{
																			echo $this->requestAction('app/get-translate/'.base64_encode('Content not added yet'));
																		}
												?>
												</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-8"> 
                                                <div class="rating-area">
                                                    <div class="like-box">
                                                        <img src="<?php echo HTTP_ROOT; ?>img/heart-icon.png" width="18" height="17" alt="">
                                                    </div>
														<div class="rating-box">
															<!--rating-->
															<!--<div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>-->
															<?php 	
																	$ratingData=$favourate[0]->user_ratings;
																	$sum=0;$count=0;
																	foreach($ratingData as $rating){
																		
																			
																			$rate=$rating->rating;
																			$sum=$sum+$rate;
																			$count++;
																	}
																	if($count > 0){
																		 $avg=$sum/$count;
																	}
																	//echo @$avg; 
																	
																	?>
													
																
																	<span class="rating no-topmg">
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
																

															
															  <!--/rating--> 
														</div>
                                                </div>                                              
                                            </div>                                            
                                        </div>
                                    </div>     
                                </div>
                                <div class="dcl-area">
                                    <p class="head">
									<?php 
											$about_sitter=$favourate[0]->user_about_sitter;
											if(!empty(@$about_sitter->your_self)){
												
													echo @$about_sitter->your_self;
											}
											else{
												
											 echo $this->requestAction('app/get-translate/'.base64_encode(' Dummy Title'));
												
											}
									?>
									 <span>	<?php echo $count; ?><?php echo $this->requestAction('app/get-translate/'.base64_encode(' Reviews')); ?> </span></p>
                                    <p class="txt"><?php echo @$favourate[0]->first_name." ".substr((@$favourate[0]->last_name)?@$favourate[0]->last_name:"",0,1)."."; ?></p>
									
									<?php foreach($distanceAssociation as $key=>$distanceAssociate){
										
										
										if($key == @$favourate[0]->id){
											$distance=explode('.',$distanceAssociate);
											//$distance=implode(',',array_slice($distance, 0));
											
										}
									}?>
									

								   <p class="txt"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Mosman: ')).$distance[0].$this->requestAction('app/get-translate/'.base64_encode(' Km '));?></p>
                                    <p class="txt"><span class="icon"></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Limited availability for limited period')); ?></p>
                                    <p class="txt"><span class="icon2"></span> 
									
									<?php //echo date('Y-m-d h:i:s')-$userData->last_login ; //$userData->avail_status != 'Login'?'Available':$userData->last_login; 
										if(@$favourate[0]->avail_status == 'Login'){
											echo '<span style="color:green">Available<//span>';
										}else{
											$seconds =  strtotime(date("Y-m-d H:i:s"))-strtotime(@$favourate[0]->last_login);
											$days    = floor($seconds / 86400);
											$hours = floor(($seconds - ($days * 86400)) / 3600);
											$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
											$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));

											echo "Last active ".$days." days "."ago";
										}
								   	?>
									</p>
                                  <!--  <p class="txt"><span class="icon2"></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Lat active 1 day ago')); ?> </p>
                                    -->
                                </div>
                                <div class="lswb-bot">
                                    <ul>
                                        <li><a href="" class="night" title="Night"></a></li>
                                        <li><a href="" class="day"></a></li>
                                        <li><a href="">10</a></li>
                                        <li><a href="" class="walking"></a></li>
                                        <li><a href="" class="chat"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
								<?php $flag++;	} }
					}
					 ?>
                     
                                                                   
                    </div> 
                    <div class="bot-btn-area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="#"  title="" class="bot-more"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Find Loving, Trusted, Insured pet sitter near you')); ?></a>
                        </div>
                    </div>
                    </div>
                                    
                </div>         
            </div>
        </div> 
        <!--more sitter near you-->
            <div class="more-sitter">
                <div class="container">
                    <div class="ms-area">
		                   
					  <ul>
                       <?php if(!empty($FavUsersdata)){ 
							foreach(@$FavUsersdata as $favourate){ ?>    
                            <li><a href="" title="">
                              <?php if(!empty($favourate[0]->image)){?>
												
												 <img src="<?php echo HTTP_ROOT.'img/uploads/'.((@$favourate[0]->image) != '' ?(@$favourate[0]->image):'dm.png'); ?>" alt="Profile Picture" height="80px" width="80px" class="img-circle"/>
							<?php }	?>
                                <p class="name"><?php echo @$favourate[0]->first_name." ".substr((@$favourate[0]->last_name)?@$favourate[0]->last_name:"",0,1)."."; ?></p>
                                <p class="loc"><?php if(!empty(@$favourate[0]->city)){ echo @$favourate[0]->city; } ?></p>
                                <p class="r-star rat-wt ">
								
								
											<!--rating-->
															<!--<div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>-->
															<?php 	
																	$ratingData=$favourate[0]->user_ratings;
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
																	//echo $count;
																	?>
													
																																								
																	<span class="rating" >
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
																

															
															  <!--/rating--> 
													
								
									</br></br>
							        <span>	<?php echo $count; ?><?php echo $this->requestAction('app/get-translate/'.base64_encode(' reviews')); ?></span>
                                </p>                                
                            </a></li>
					   <?php } }?>
                        </ul>
                    </div>
                </div>              
            </div>
        <!--more sitter near you-->
            
    </section>
    <!--[/leading area]-->

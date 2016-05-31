<script type="text/javascript" src="js/Front/owl.carousel.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {  
		var owl = $('.owl-carousel-1');
		owl.owlCarousel({
        nav:true,
	    loop:true,
	    margin:0,
	    autoplay:false,
	    autoplayTimeout:1000,
	    autoplayHoverPause:true,
		responsiveClass:true,
	   
	    responsive:{
    	    0:{
        	    items:2,
            	nav:true
	        },
    	    768:{
        	    items:3,
            	nav:true
	        },
    	    1024:{
        	    items:3,
            	nav:true
	        }
			    }
		});
		
});
</script>
<section class="sr-list-wrap">
    <div class="cust-container">
      <div class="sr-list-area">
        <div class="toptext">
          <p>Book on Sitter Guide and receive: Free sitter guide Premium Insurance, Local Australian Customer Support and a Booking Guarantee.</p>
        </div>
        <div class="ssr-list-area">
          <div class="sl-area"> 
            <!--distance-->
            <div class="distance">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="sort-by">
                    <p>Sort By</p>
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="per-page">
                    <p>Per Page</p>
                    <select class="form-control" id="sel1">
                      <option>25</option>
                      <option>35</option>
                      <option>45</option>
                      <option>60</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!--/distance--> 
            <!--[Sitter Listing Outer Start]-->
            	<div class="sit-list-outer">            
            <!--sitter listing 1-->           
            <div class="all-sitter-listing">
              <ul class="all-sit-list">
				<?php if(!empty($resultsData)){// pr($resultsData);die;
				//pr($resultsData);
			//	pr($resultsData[0]['user_sitter_galleries'][0]['image']);die;
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
															<div class="carousel-inner" role="listbox">   
                                                              <?php 
																
																//pr($sub_galleries_result);die;
																if(!empty(@$sub_galleries_result)){
																$flag=0;
																
																		 foreach($sub_galleries_result as $sub_galleries){
																			
																		//if($results->facebook_id !="" && $results->is_image_uploaded==0){
																		
																			if($sub_galleries->image != "")
																			{
																				
																				if($flag == 0 ){ $flag=1;
																					?>
																					<div class="item active">
																					<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($sub_galleries->image != ''?$sub_galleries->image:'prof_photo.png'); ?>"> 
																					</div>
																			<?php	}else{?>
																					<div class="item ">
																					<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($sub_galleries->image != ''?$sub_galleries->image:'prof_photo.png'); ?>"> 
																					</div>
																				
																			<?php	}
																			}
																		}
																 }else{ ?>
																		<div class="item active">
																		<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/XVWVPJniSAYcBo5.png'; ?>"> 
																			</div>
																				
																	<?php } 
																	
																	
																	?>															
															  <!-- <div class="item active">
																<img src="images/profile-pic.png" >       
															  </div>
															 <div class="item">
																<img src="images/profile-pic.png" >        
															  </div>    
															  <div class="item">
																<img src="images/profile-pic.png" >        
															  </div>
															  <div class="item">
																<img src="images/profile-pic.png" >   
																</div> -->																
															</div>
														
															<!-- Left and right controls -->
															<a class="left carousel-control" href=".customCrousal<?php echo $rankNo; ?>" role="button" data-slide="prev">
															  <span class="fa fa-chevron-left" aria-hidden="true"></span>
															  <span class="sr-only">Previous</span>
															</a>
															<a class="right carousel-control" href=".customCrousal<?php echo $rankNo; ?>" role="button" data-slide="next">
															  <span class="fa fa-chevron-right" aria-hidden="true"></span>
															  <span class="sr-only">Next</span>
															</a>                                        
															
															
												</div>                                                    	
											
												<!--quick view-->
											
													<div class="quick-view">
															<a href="#" data-rel="<?php echo $rankNo; ?>" class="qvBtn" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search" aria-hidden="true"></i> Quick View</a>
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
												<b><img src="<?php echo HTTP_ROOT; ?>img/certify-1.png"  alt=""/></b> 
												<b><img src="<?php echo HTTP_ROOT; ?>img/certify-2.png"  alt=""/></b>
											</p>
											
											<p class="about-sit"><?php echo (@$results->user_about_sitter->your_self !="")?@$results->user_about_sitter->your_self:"Profile headline not set yet"; ?>  </p>
											
											<p class="away">
												<?php echo ($results->city !="")?ucwords($results->city):""; ?>  
												<?php echo ($results->state !="")?ucwords($results->state).", ":""; ?>
												<?php echo ($results->country !="")?ucwords($results->country):""; ?>
												<span>
													<i class="fa fa-map-marker" aria-hidden="true"></i> 
													<?php echo round($distanceAssociation[$results->id],2); ?> Km Away
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
												//	echo $avg; 
													
													?>
													
										<div class="rating-box">
											<span class="rating">
											<?php	//if(!empty($avg)){ 	
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
													
											<?php// } ?>
											</span>
										</div>
											<div class="sit-review"> <a href="#" title="Review"><?php echo $count; ?> Reviews</a> </div>
										  </div>
									  <!--/rating--> 
									  
									  <!--availability-->
									  <div class="sit-available">
										<ul>
										  <li><a href="#" title="Available this weekend">Available this weekend</a></li>
										  <li><a href="#" title="Available on New Year">Available on New Year</a></li>
										</ul>
									  </div>
									  <!--availability--> 
									  
									</div>
								  </div>
								  <!--sitter list-->
								  <div class="sit-list-del">
									<ul>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Repeat Guests : <span>2</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last booked: <span>2 week ago</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last active <span>2 day ago</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Response Rate <span>100%</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Average Response <span>2hours</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last Contacted <span>5day ago</span></li>
									</ul>
								  </div>
								  <!--sitter list--> 
								  <!--sitter feedback-->
								  <div class="sit-feedback"> 
									<?php 
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
									
									<img Width="52" height="52" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($results->image != ''?$results->image:'prof_photo.png'); ?>"> 					   
									<?php  } ?>  
									<p><?php echo (@$results->user_about_sitter->client_choose_desc !="")?@$results->user_about_sitter->client_choose_desc:"Why client choose you content not set yet"; ?></p>
								  </div>                      
								  <!--sitter feedback--> 
								</div>
								<div class="sit-pic-rgt"> 
								  <!--per night-->
								  <div class="per-nite">
									<p>from <br>
									  <span>$25</span> per night</p>
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
											<img src="<?php echo HTTP_ROOT.'img/loader.gif' ?>"> 
										</div>
																  
								  </div>
								 <!--likebox--> 
								</div>
							  </div>
							</li>
						
						<?php 
						$rankNo++;
						}
				}else{ ?>
				
					<div class="noresult-found">
								<p>We couldn't find any sitters that matched your criteria.<br>
								<span>Try changing your search criteria or updating your location.</span></p>
					</div>
			<?php } ?>
                
              </ul>
            </div>            
            <!--sitter listing --> 
				
            <!--/sitter listing similar result-->
				<?php //echo $this->element('frontElements/Search/similar_sitter'); ?>
			<!--/sitter listing similar result--> 
          
            <!---loading area-->
            	<div class="loading-more">
                	<a href="#" title="loading More">   <img src="<?php echo HTTP_ROOT; ?>img/loading-icon.png" width="22" height="22" alt=""/>  </a>
                </div>
            <!---loading area-->
            
                       
            </div>            
            <!--[Sitter Listing Outer End]-->            
                     
          </div>
          <!--[Right Map Start]-->
            <div class="sl-map">            	
            	<div class="enlarge-map">
                	<div class="row">
                    	<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12"> 
                        	<a href="#" title="Enlarge Map">Enlarge map</a>
                        </div>
                    	<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12"> 
                        	<input type="checkbox"> Update  when i move the map 	
                        </div>                        
                    </div>
                </div>
                <?php
				  // Override any of the following default options to customize your map
				  $map_options = array(
					'id' => 'map_canvas',
					'width' => '100%',
					'height' => '1180px',
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
										'markerIcon'=>HTTP_ROOT.'img/green_pin.png',
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
				
			//	pr($resultsData);die;
							$qvModal = 1;$innerSlideNO=1;	
							foreach($resultsData as $results){
							?>
																
								
									  <div class="item qvModal<?php echo $qvModal; ?>">      
										 <div class="sitter-quike-view">
											<div class="sqv-box">
												<div class="top-close"> 
												<p>Sitter Quick Details</p>
													<a data-dismiss="modal" title="Close" href="#"><i aria-hidden="true" class="fa fa-times"></i></a>           
												</div>
												<div class="sit-head">
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8"> 
														  <div class="lft-head">                       	
															<p class="s-name"><?php if(@$results->first_name != ""){ echo $results->first_name."  ".$results->last_name;}?></p>
															<p class="s-det">Special needs is my specialty.</p>
															<p class="s-ads">Morningside Heights, New York, NY, 10027</p>
															</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
														<div class="rgt-hours">
															<p>
																  from
																 <span>$35</span>
																	per night
																	</p>
														</div>            
														</div>
													</div>                	
												</div>
												<!--quick slide-->
												<?php 	$sub_galleries_result=$results->user_sitter_galleries; 
												
												if(!empty(@$sub_galleries_result)){  
															//pr($sub_galleries->image);die;
												?>					
													<div class="quick-slide">
														<div class="ms-area">
															<ul class="owl-carousel-1">
																<?php  foreach($sub_galleries_result as $sub_galleries){
																			if($sub_galleries->image != ""){?>
																					<div class="item">
																						 <li>
																								<?php if(@$sub_galleries->image != ''){// echo @$newarr[$index];?>
																										<img width="200" height="200" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($sub_galleries->image != ''?$sub_galleries->image:'prof_photo.png'); ?>">
																									<?php } ?>
																						 </li>
																					</div>
																				
																	<?php		}
																	}	?>
																					
																					
																</ul>
														</div>
												</div>
												<?php	}	?>
												<!--quick slide-->
												
												
												<!--content area Start-->

												
												
												
												
												
												
												
												<div class="sqv-mid">
													<div class="row">
														<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
														<div class="sqv-mid-lft">
															<p class="md-head">About Geraldo</p>    
															<ul>
																<li>27 Years Of Experience</li>
																<li>Oral Medication Administration</li>
																<li>Injected Medication Administration</li>
																<li>Senior Dog Experience </li>
															</ul>   
															<p class="md-head">Geraldo's Home</p> 
															 <ul>
																<li>House</li>
																<li>Fenced Yard</li>
																<li>Non-Smoking Household</li>
																<li>Has 1 Dog, No Other Pets</li>
																<li>No Children Present</li>
																<li>Dogs Allowed On Bed</li>
																<li>Dogs Allowed On Furniture</li>
																<li>Potty Breaks Every 0-2 Hours</li>
															</ul>                                                
														</div>
													</div>
														<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">                 
														<div class="sqv-mid-rgt">
															<div class="sqvmr-btn">
															<a title="Contact Sitter" href="#">Contact Sitter</a>
															<a title="View Full Profile" href="#">View Full Profile</a>
															<a title="Save Sitter" href="#">Save Sitter</a>
															</div>
															<div class="sqvmd-rt-bot">
																<ul>
																 <li>90% response rate
																 <span> Sitter responds to most requests within 24 hours</span></li>
																 <li>A few minutes <span>Sitter responds in a few minutes</span></li>
																 <li>30% of stays <span>Sitter rarely sends photos through Rover</span></li>
																 <li>8 repeat clients <span>Sitter had repeat clients</span></li>
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
											<a data-slide="prev" role="button" href="#myCarousel2" class="left myCarousel2next carousel-control">
											  <span aria-hidden="true" class="fa fa-chevron-left"></span>
											  <span class="sr-only">Previous</span>
											</a>
											<a data-slide="next" role="button" href="#myCarousel2" class="right myCarousel2next carousel-control">
											  <span aria-hidden="true" class="fa fa-chevron-right"></span>
											  <span class="sr-only">Next</span>
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
		
			var qv = $(this).attr('data-rel');
			/*$(".item").removeClass('active');*/
			$(".qvModal"+qv).addClass('active');
			/* setTimeout(function(){
				$(".innnerGallery1").addClass("active");	
			}, 500); */	
		
		});
		$('#myCarousel2').bind('slide.bs.carousel', function (e) {
		
			
			
		}); 
	})
	
	
	

</script>

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
				<?php if(!empty($resultsData)){ 
						$rankNo=1;
						foreach($resultsData as $results){  ?>
							<li>
							  <div class="sld-area">
             <div class="sit-pic-lft">
								  <div class="ppic-area">
									<div class="sitter-pic"> 
										<?php 
										if($results->facebook_id !="" && $results->is_image_uploaded==0){
											if($results->image != "")
											{
												$orgImg = $results->image;
											}else{ 
												$orgImg = 'default-pet-sitter.jpg';
											} 
										?>
										<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo $orgImg; ?>"> 

										<?php }else{ ?>
										
										<img class="searchImg" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($results->image != ''?$results->image:'prof_photo.png'); ?>"> 					   
										<?php  } ?>  
											   
										
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
											<div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>
											<div class="sit-review"> <a href="#" title="Review">105 Reviews</a> </div>
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
										'markerTitle'=>$full_name,
										'windowText'=>$full_name,
										'markerIcon'=>'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld='.$mapInc.'|72A105|FFFFFF',
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
</style>

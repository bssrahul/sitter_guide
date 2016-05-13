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
						echo $this->Form->create(null, [
							'url' => ['controller' => 'search', 'action' => 'search-by-location'],
							'role'=>'form',
							'id'=>'searchBydistance',
							'autocomplete'=>'off',
						]);
						
						echo $this->Form->input(
							'Search.distance',[
							"type"=>"select",
							'label' => false,
							'id' => 'sel1',
							"options"=>$distancearray,
							'class'=>'form-control searchByDistance',
						]);
						
						echo $this->Form->end();
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
												<?php echo $results->first_name." ".substr(($results->last_name)?$results->last_name:"",0,1)."."; ?> 
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
												if(isset($results->training_check)){
													echo '<li>Tranining<span><img src="'.HTTP_ROOT.'img/fac-icon.png"  alt="Tranining"/></span></li>';
												}else{
													echo '<li>Tranining<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png"  alt="Tranining"/></span></li>';
												}
												
												if(isset($results->recreation_check)){
													echo '<li>Recreation<span><img src="'.HTTP_ROOT.'img/fac-icon.png"  alt="Recreation"/></span></li>';
												}else{
													echo '<li>Recreation<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png"  alt="Recreation"/></span></li>';
												}
												
												if(isset($results->driver_service_check)){
													echo '<li>Driver<span><img src="'.HTTP_ROOT.'img/fac-icon.png"  alt="Driver"/></span></li>';
												}else{
													echo '<li>Driver<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png"  alt="Driver"/></span></li>';
												}
												
												if(isset($results->grooming_check)){
													echo '<li>Grooming<span><img src="'.HTTP_ROOT.'img/fac-icon.png"  alt="Grooming"/></span></li>';
												}else{
													echo '<li>Grooming<span><img src="'.HTTP_ROOT.'img/fac-icon-1.png"  alt="Grooming"/></span></li>';
												}
											?>
										</ul>
									  </div>
								  <!--/facilities--> 
								  <!--likebox
								  <div class="likebox"> 
									  <a href="#" title="LIke"><img src="<?php echo HTTP_ROOT; ?>img/like-icon.png" width="16" height="14" alt=""/></a>
								  </div>
								 likebox--> 
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
					//INITIAl GOOGLE MAP
					echo $this->GoogleMap->map(array('width'=>'100%','height'=>'1180px','type'=>'ROADMAP','latitude'=>@$sourceLocationLatitude,	'longitude'=>@$sourceLocationLongitude)); 
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
</style>

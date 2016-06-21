 <?php echo $this->Html->script('Front/bootbag_paginate.js'); ?>
 
<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >

	<div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    
		<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
			
			<h3><img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Favourites</h3>

		</div>
        
        <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
              <ol class="breadcrumb text-right">
                <li> You are here : </li>
                <li><a href="#">Home</a></li>
                <li class="active">Favourites</li>
              </ol>
        </div>
	
	</div>
          
	<div class="favourite-wrap ">
          
		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<h5 class="review1-thead">Search Results Favourites</h5>
					
					<div class="row">
					  
						<?php 
						if(!empty($FavUsersdata)){
						
							foreach($FavUsersdata as $FavUsers){ 
						?>	
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

							<div class="text-center favourites-box"> 
										
								<div class="favourites-box-1">

									<a href="<?php echo HTTP_ROOT."search/sitter-details/".base64_encode(convert_uuencode($FavUsers ['user']['id'])); ?>" title=""> 
										<img src="<?php if(!empty($FavUsers ['user']['image'])){echo HTTP_ROOT.'img/uploads/'.$FavUsers ['user']['image'];}else{ echo HTTP_ROOT.'img/detail-client-title.jpg'; } ?>" class="img-thumbnail img-circle text-center img-w" alt="">
										
										<p class="name"><?php if(!empty($FavUsers ['user']['first_name'])){echo $FavUsers ['user']['first_name']. " " .$FavUsers ['user']['last_name'];}?></p>
										
										<p class="loc"><?php if(!empty($FavUsers ['user']['city'])){echo $FavUsers ['user']['city'];}?></p>
																					
										<p class="r-star">
										
												 <?php  	
												 $UserRatingData= $FavUsers ['user']['user_ratings']; 
												//pr($UserRatingData);
												$accuracy_sum = 0;
												$comm_sum = 0;
												$clean_sum = 0;
												$location_sum = 0;
												$check_sum = 0;
												$rating_sum = 0;
												$count=0;
												foreach($UserRatingData as $UserRating){
													//echo $UserRating['id'];
												$count++;
												$accuracy_rating=$UserRating['accuracy_rating'];
												$communication_rating=$UserRating['communication_rating'];
												$cleanliness_rating=$UserRating['cleanliness_rating'];
												$location_rating=$UserRating['location_rating'];
												$check_in_rating=$UserRating['check_in_rating'];
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
												
												<!--	<p class="r-star rat-wt"> -->
												<span class="rating ">
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
										
										<p class="grey">
											<span><?php if($count != ""){ echo "( ".$count. " reviews )" ;}else{echo "( 0 reviews )" ;} ?></span>
										</p>
									</a>
								
								</div>
																	
							</div>
						
						</div>
							<?php 
							
							} 
						} ?>
					
					</div>
					  
					<div class="row">
          
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

								<div class=" text-center ">
									<div class="review-pagination favPagination ">
										<ul class=" list-inline ">
											<?php 	//echo $this->Paginator->counter('Page {{page}} of {{pages}}');?>
											<?php
												//echo $this->Paginator->first("First");
												if($this->Paginator->hasPrev()){
													echo $this->Paginator->prev("Prev", array('tag' => 'li'), null, array('tag' => 'li','class' => 'nxt'));
												}
												echo $this->Paginator->numbers(array('modulus' =>1));
												if($this->Paginator->hasNext()){
													echo $this->Paginator->next("Next", array('tag' => 'li'), null, array('tag' => 'li','class' => 'nxt'));
												}
												//echo $this->Paginator->last("Last");
												
											?>
											
										
											<!--<li class="nxt"><a href="#">previous</a></li>
											<li class="numbers active"><a href="#">1</a></li>
											<li class="numbers hidden-xs"><a href="#">2</a></li>
											<li class="numbers hidden-xs"><a href="#">3</a></li>
											<li class="numbers"><a href="#">..</a>.</li>
											<li class="nxt"><a href="#">next</a></li>-->
										</ul>
									</div>
								</div>
						</div>

					</div>  
				
        
			</div>
		</div>
	</div>
</div>

<style>
.r-star {
  width: 100% !important;
  padding-top:5px;
}

.rating{
	margin: 0 auto;
    position: relative;
    text-align: center;
    width: 100%;
    top: 0px !important;
}

.rating > label{
    float: none !important;
    overflow:auto;
}

.grey{
    padding-top:15px !important;
}
.img-w {
    height: 100px !important;
    margin-bottom: 15px !important;
    margin-top: 15px !important;
    width: 100px !important;
}
</style>

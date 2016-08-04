<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Review
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> You are here : 
        </li>
        <li>
          <a href="<?php echo HTTP_ROOT; ?>">Home
          </a>
        </li>
        <li class="active">Review
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="transaction-pills">
        <div class="transaction-top">
          <ul class="nav nav-pills nav-justified">
            <li class="active">
              <a href="<?php echo HTTP_ROOT;?>rating/my-rating">Received Ratings</a>
            </li>
            <li>
              <a href="<?php echo HTTP_ROOT;?>rating/shared-rating">Shared Rating</a>
            </li>
          </ul>
        </div>
        <div class="tab-content">
          <div id="receive" >
            <div id="transaction-table">
              <?php 
				if(!empty($ratingsdata)){
				?>	
					<table class="col-md-12  table-condensed cf border1 nopad">
						<thead class="cf">
						  <tr class="title-bg border-bott">
							
							<th class="pad-l20">Member</th>
							
							<th>Rating</th>
							
							<th>Description</th>
							
							<th>Location</th>
							
							<th class="numeric">Time</th>
							<?php if($ratingChangeStatus == 0){ ?>
							  <th class="numeric"></th>
							<?php } ?>
						  </tr>
						</thead>
						<tbody>
				<?php		
					foreach($ratingsdata as $rating){
						?>
						 <tr>
							<td data-title="Member" class="width220">
							  <span class="c-img">
								
								<?php if(($rating['user']['facebook_id']) !="" && ($rating['user']['is_image_uploaded'])==0){?>
									<img  width="45" height="45" class="img-circle"  src="<?php if($rating['user']['image'] != ""){echo $rating['user']['image'];}
									else{ echo $user['image']='prof_photo.png';} ?>"> 
							   <?php }else{ ?>
								<img  width="45" height="45" class="img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.($rating['user']['image'] != ''?$rating['user']['image']:'prof_photo.png'); ?>">
							<?php  } ?>
							  </span> 
							  <span class="c-name"><?php echo isset($rating['user']['first_name'])?$rating['user']['first_name']." ".@$rating['user']['last_name']:''; ?>
							  </span>
							</td>
							<td data-title="Rating">
									<?php  $rating_sum = $myrating  = isset($rating['rating'])?$rating['rating']:'Comment not added'; ?>
									<!-- Rating Start -->
									<p class="r-star">
										<span class="rating ">
											<?php	if(!empty($rating_sum)){
											            if($rating_sum > 1 && $rating_sum < 1.5){
														   $rating_sum = 1.5;
														}else if($rating_sum > 1.5 && $rating_sum < 2){
															$rating_sum = 2;
														}else if($rating_sum > 2 && $rating_sum < 2.5){
														   $rating_sum = 2.5;
														}else if($rating_sum > 2.5 && $rating_sum < 3){
															$rating_sum = 3;
														}else if($rating_sum > 3 && $rating_sum < 3.5){
														   $rating_sum = 3.5;
														}else if($rating_sum > 3.5 && $rating_sum < 4){
															$rating_sum = 4;
														}else if($rating_sum > 4 && $rating_sum < 4.5){
														   $rating_sum = 4.5;
														}else if($rating_sum > 4.5 && $rating_sum < 5){
															$rating_sum = 5;
														}
											$myrating = $rating_sum;
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
									</p>
									<!--Rating End--> 
									<br/><br/><span class="text-center">&nbsp;&nbsp;(<?php echo $myrating." Star"; ?>)</span>
									<span>
										<a href="#" data-html="true"  data-toggle="tooltip" data-placement="top" data-original-title="Accuracy : <?php echo $rating['accuracy_rating']; ?><br> Communication : <?php echo $rating['communication_rating']; ?><br> Cleanliness : <?php echo $rating['cleanliness_rating']; ?><br> Location : <?php echo $rating['location_rating']; ?><br> Check-in : <?php echo $rating['check_in_rating']; ?>">
											<img class="close11" src="http://betasoftdev.com/sitterguide_test/img/close.png">
										</a>
									</span>
							</td>
							<td data-title="Description"><?php echo isset($rating['comment'])?$rating['comment']:'Comment not added'; ?>
							</td>
							<td data-title="Location"><?php echo isset($rating['user']['state'])?$rating['user']['state']:''; ?> <?php isset($rating['user']['country'])?", ".$rating['user']['country']:''; ?>
							</td>
							<td data-title="Time" class="numeric"><?php echo isset($rating['created_date'])?date("F j, Y", strtotime($rating['created_date'])):'-----'; ?>
							</td>
							<?php if($rating['change_to_request'] == 0){ ?>
						    <td>
								   <button type = "button" class = "btn btn-primary" onclick="location.href='<?php echo HTTP_ROOT."rating/my-rating/".base64_encode(convert_uuencode(@$rating['id'])); ?>'">
									  Change To Request 
								   </button>
							 </td>
							 <?php } ?>
						  </tr>
						<?php
					}
				?>
					</tbody>
				</table>
				<?php	
				}else{ ?>
				<div class="col-md-12 col-lg-12 col-sm-12">
					<h5>No rating recieved yet</h5>
				</div>
				<?php	
				}
              ?>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

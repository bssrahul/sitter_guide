<div class="col-md-9 col-lg-10 col-sm-8  lg-width80" >
	<div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
        <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
		  <h3>
			<img src="<?php echo HTTP_ROOT ;?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Review
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
      <div class="review1-wrap ">
		<div class="row">
		  <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h5 class="review1-thead">Your Ratings
				</h5>
			  </div>
			   <?php 
			    echo $this->Form->create(@$reviewData,[
					/*'url' => ['controller' => 'partners', 'action' => 'add-partner'],*/
					'class'=>'form-horizontal form-label-left',
					'id'=>'addrating',
					'enctype'=>'multipart/form-data',
					'novalidate'=>'novalidate',
					'autocomplete' =>'off',
				]);
				echo $this->Form->input('UserRatings.user_to',[
					'label' => false,
					'type'=>'hidden',
					'readonly'=>true,
					'value'=> @$user_to_id,
					'class'=>'userto',
					'id'=>'userto']);
			   echo $this->Form->input('booking_id',[
					'label' => false,
					'type'=>'hidden',
					'readonly'=>true,
					'value'=> @$booking_id,
					'class'=>'userto',
					'id'=>'userto']);
				?>
			<div class=" col-sm-12 col-md-4 col-xs-12 col-lg-4 nopadright">
				<div class="rewiw-width100 rtp">
					<div class="rewiw-width60">
						<p>
						  <i class="fa fa-rocket">
						  </i> &nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Accuracy')); ?>
						</p>
					</div>
				   <div class="rewiw-width40">
					  <span class="rating">
							<input type='radio' id="star5" name='UserRatings[accuracy_rating]' value='5' /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="UserRatings[accuracy_rating]" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="UserRatings[accuracy_rating]" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="UserRatings[accuracy_rating]" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="accuracy_rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="UserRatings[accuracy_rating]" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="UserRatings[accuracy_rating]" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="UserRatings[accuracy_rating]" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="UserRatings[accuracy_rating]" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="UserRatings[accuracy_rating]" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
					</span>
					</div>
				</div>
			 </div>
			 <div class=" col-sm-12 col-md-4 col-xs-12 col-lg-4 nopadright">
				<div class="rewiw-width100 rtp">
				  <div class="rewiw-width60">
					<p> 
					  <i class="fa fa-map-marker">
					  </i> &nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Location')); ?>
					</p>
				  </div>
				  <div class="rewiw-width40">
					<span class="rating">
							<input type='radio' id="l_star5" name='UserRatings[location_rating]' value='5' /><label class = "full" for="l_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="l_star4half" name="UserRatings[location_rating]" value="4.5" /><label class="half" for="l_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="l_star4" name="UserRatings[location_rating]" value="4" /><label class = "full" for="l_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="l_star3half" name="UserRatings[location_rating]" value="3.5" /><label class="half" for="l_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="l_star3" name="UserRatings[location_rating]" value="3" /><label class = "full" for="l_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="l_star2half" name="UserRatings[location_rating]" value="2.5" /><label class="half" for="l_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="l_star2" name="UserRatings[location_rating]" value="2" /><label class = "full" for="l_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="l_star1half" name="UserRatings[location_rating"] value="1.5" /><label class="half" for="l_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="l_star1" name="UserRatings[location_rating]" value="1" /><label class = "full" for="l_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="l_starhalf" name="UserRatings[location_rating]" value="0.5" /><label class="half" for="l_starhalf" title="Sucks big time - 0.5 stars"></label>
					</span>
				  </div>
				</div>
			  </div>
			 <div class=" col-sm-12 col-md-4 col-xs-12 col-lg-4 nopadright">
				<div class="rewiw-width100 rtp">
				  <div class="rewiw-width60">
					<p>
					  <i class="fa fa-level-down">
					  </i> &nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Check In')); ?>
					</p>
				  </div>
				  <div class="rewiw-width40">
					<span class="rating">
							<input type='radio' id="ch_star5" name='UserRatings[check_in_rating]' value='5' /><label class = "full" for="ch_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="ch_star4half" name="UserRatings[check_in_rating]" value="4.5" /><label class="half" for="ch_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="ch_star4" name="UserRatings[check_in_rating]" value="4" /><label class = "full" for="ch_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="ch_star3half" name="UserRatings[check_in_rating]" value="3.5" /><label class="half" for="ch_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="ch_star3" name="UserRatings[check_in_rating]" value="3" /><label class = "full" for="ch_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="ch_star2half" name="UserRatings[check_in_rating]" value="2.5" /><label class="half" for="ch_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="ch_star2" name="UserRatings[check_in_rating]" value="2" /><label class = "full" for="ch_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="ch_star1half" name="UserRatings[check_in_rating]" value="1.5" /><label class="half" for="ch_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="ch_star1" name="UserRatings[check_in_rating]" value="1" /><label class = "full" for="ch_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="ch_starhalf" name="UserRatings[check_in_rating]" value="0.5" /><label class="half" for="ch_starhalf" title="Sucks big time - 0.5 stars"></label>
					</span>
				  </div>
				</div>
			  </div>
			  <div class=" col-sm-12 col-md-4 col-xs-12 col-lg-4 nopadright">
				<div class="rewiw-width100 rtp">
				  <div class="rewiw-width60">
					<p>
					  <i class="fa fa-chain-broken">
					  </i> &nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Cleanliness')); ?>
					</p>
				  </div>
				  <div class="rewiw-width40">
					<span class="rating">
							<input type='radio' id="cl_star5" name='UserRatings[cleanliness_rating]' value='5' /><label class = "full" for="cl_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="cl_star4half" name="UserRatings[cleanliness_rating]" value="4.5" /><label class="half" for="cl_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="cl_star4" name="UserRatings[cleanliness_rating]" value="4" /><label class = "full" for="cl_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="cl_star3half" name="UserRatings[cleanliness_rating]" value="3.5" /><label class="half" for="cl_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="cl_star3" name="UserRatings[cleanliness_rating]" value="3" /><label class = "full" for="cl_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="cl_star2half" name="UserRatings[cleanliness_rating]" value="2.5" /><label class="half" for="cl_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="cl_star2" name="UserRatings[cleanliness_rating]" value="2" /><label class = "full" for="cl_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="cl_star1half" name="UserRatings[cleanliness_rating]" value="1.5" /><label class="half" for="cl_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="cl_star1" name="UserRatings[cleanliness_rating]" value="1" /><label class = "full" for="cl_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="cl_starhalf" name="UserRatings[cleanliness_rating]" value="0.5" /><label class="half" for="cl_starhalf" title="Sucks big time - 0.5 stars"></label>
					</span>
				  </div>
				</div>
			  </div>
			  <div class=" col-sm-12 col-md-4 col-xs-12 col-lg-4 nopadright">
				<div class="rewiw-width100 rtp">
				  <div class="rewiw-width60">
					<p>
					  <i class="fa fa-comments">
					  </i> &nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Communication')); ?>
					</p>
				  </div>
				  <div class="rewiw-width40">
					<span class="rating">
							<input type='radio' id="c_star5" name='UserRatings[communication_rating]' value='5' /><label class = "full" for="c_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="c_star4half" name="UserRatings[communication_rating]" value="4.5" /><label class="half" for="c_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="c_star4" name="UserRatings[communication_rating]" value="4" /><label class = "full" for="c_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="c_star3half" name="UserRatings[communication_rating]" value="3.5" /><label class="half" for="c_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="c_star3" name="UserRatings[communication_rating]" value="3" /><label class = "full" for="c_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="c_star2half" name="UserRatings[communication_rating]" value="2.5" /><label class="half" for="c_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="c_star2" name="UserRatings[communication_rating]" value="2" /><label class = "full" for="c_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="c_star1half" name="UserRatings[communication_rating]" value="1.5" /><label class="half" for="c_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="c_star1" name="UserRatings[communication_rating]" value="1" /><label class = "full" for="c_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="c_starhalf" name="UserRatings[communication_rating]" value="0.5" /><label class="half" for="c_starhalf" title="Sucks big time - 0.5 stars"></label>
					</span>
				  </div>
				</div>
			  </div>
			</div>
		   <div class="row">
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h5 class="review1-thead">Your Feedback
				</h5>
				<div class="clearfix">
				</div>
				<div class="reviw-area ">
					<?php echo $this->Form->input('UserRatings.comment',
						[
							'type' => "textarea",
							'label'=>false,
							'required' => true,
							'placeholder' => 'Type your feedback',
							'class'=>'form-control' ]
						); 
					?>
				</div>
		        <button id="send" type="submit" class="btn btn-comm-save"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
			  </div>
			</div>
		  </div>
		  <?php echo $this->Form->end(); ?>
		<!--Start rating user list-->
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
		  <div class="sitter-balance-wrapper">
			<div class="balace-head">
			  <h5>You are rating to
			  </h5>
			</div>
			<div class="inner-price-wrap">
			   <div class="col-lg-12">
					<?php if(($to_user_info['facebook_id']) !="" && ($to_user_info['is_image_uploaded'])==0){?>
						<img class="img-responsive"  src="<?php if($to_user_info['image'] != ""){echo $to_user_info['image'];}
						else{ echo $to_user_info['image']='prof_photo.png';} ?>"> 
                    <?php }else{ ?>
						<img  class="img-responsive" src="<?php echo HTTP_ROOT.'img/uploads/'.($to_user_info['image'] != ''?$to_user_info['image']:'prof_photo.png'); ?>"> 					   
					<?php  } ?>
				</div>
				<h5 class="text-center review1-thead"><?php echo isset($to_user_info['first_name'])?$to_user_info['first_name']." ".@$to_user_info['last_name']:''; ?></h5>
			</div>
		    <p class="redem-text">You can change the rating within 48 hours after that rating get freezed and you can't be able to do change.
			</p>
			<p class="read-tanda">Read 
			  <a href="<?php echo HTTP_ROOT."terms"; ?>"> Terms &amp; Conditions
			  </a>
			</p>
		  </div>
		</div>
        <!--end-->
		</div>
	  </div>
</div>

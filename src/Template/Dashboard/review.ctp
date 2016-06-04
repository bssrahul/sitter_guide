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
			  <a href="#">Home
			  </a>
			</li>
			<li class="active">Review
			</li>
		  </ol>
		</div>
	  </div>
  
	  <div class="review1-wrap ">
		
		<div class="row">
		  
		  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h5 class="review1-thead">Your Ratings
				</h5>
			  </div>
			   <?php echo $this->Form->create('', [
					/*'url' => ['controller' => 'partners', 'action' => 'add-partner'],*/
					'class'=>'form-horizontal form-label-left',
					'id'=>'addrating',
					'enctype'=>'multipart/form-data',
					'novalidate'=>'novalidate',
					'autocomplete' =>'off',
				]);
				
				 echo $this->Form->input('user_to',[
					'label' => false,
					'type'=>'hidden',
					'readonly'=>true,
					'value'=>38,
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
							<input type='radio' id="star5" name='accuracy_rating' value='5' /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="accuracy_rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="accuracy_rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="accuracy_rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="accuracy_rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="accuracy_rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="accuracy_rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="accuracy_rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="accuracy_rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="accuracy_rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
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
							<input type='radio' id="l_star5" name='location_rating' value='5' /><label class = "full" for="l_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="l_star4half" name="location_rating" value="4.5" /><label class="half" for="l_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="l_star4" name="location_rating" value="4" /><label class = "full" for="l_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="l_star3half" name="location_rating" value="3.5" /><label class="half" for="l_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="l_star3" name="location_rating" value="3" /><label class = "full" for="l_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="l_star2half" name="location_rating" value="2.5" /><label class="half" for="l_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="l_star2" name="location_rating" value="2" /><label class = "full" for="l_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="l_star1half" name="location_rating" value="1.5" /><label class="half" for="l_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="l_star1" name="location_rating" value="1" /><label class = "full" for="l_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="l_starhalf" name="location_rating" value="0.5" /><label class="half" for="l_starhalf" title="Sucks big time - 0.5 stars"></label>
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
							<input type='radio' id="ch_star5" name='check_in_rating' value='5' /><label class = "full" for="ch_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="ch_star4half" name="check_in_rating" value="4.5" /><label class="half" for="ch_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="ch_star4" name="check_in_rating" value="4" /><label class = "full" for="ch_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="ch_star3half" name="check_in_rating" value="3.5" /><label class="half" for="ch_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="ch_star3" name="check_in_rating" value="3" /><label class = "full" for="ch_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="ch_star2half" name="check_in_rating" value="2.5" /><label class="half" for="ch_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="ch_star2" name="check_in_rating" value="2" /><label class = "full" for="ch_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="ch_star1half" name="check_in_rating" value="1.5" /><label class="half" for="ch_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="ch_star1" name="check_in_rating" value="1" /><label class = "full" for="ch_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="ch_starhalf" name="check_in_rating" value="0.5" /><label class="half" for="ch_starhalf" title="Sucks big time - 0.5 stars"></label>
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
							<input type='radio' id="cl_star5" name='cleanliness_rating' value='5' /><label class = "full" for="cl_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="cl_star4half" name="cleanliness_rating" value="4.5" /><label class="half" for="cl_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="cl_star4" name="cleanliness_rating" value="4" /><label class = "full" for="cl_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="cl_star3half" name="cleanliness_rating" value="3.5" /><label class="half" for="cl_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="cl_star3" name="cleanliness_rating" value="3" /><label class = "full" for="cl_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="cl_star2half" name="cleanliness_rating" value="2.5" /><label class="half" for="cl_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="cl_star2" name="cleanliness_rating" value="2" /><label class = "full" for="cl_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="cl_star1half" name="cleanliness_rating" value="1.5" /><label class="half" for="cl_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="cl_star1" name="cleanliness_rating" value="1" /><label class = "full" for="cl_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="cl_starhalf" name="cleanliness_rating" value="0.5" /><label class="half" for="cl_starhalf" title="Sucks big time - 0.5 stars"></label>
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
							<input type='radio' id="c_star5" name='communication_rating' value='5' /><label class = "full" for="c_star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="c_star4half" name="communication_rating" value="4.5" /><label class="half" for="c_star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="c_star4" name="communication_rating" value="4" /><label class = "full" for="c_star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="c_star3half" name="communication_rating" value="3.5" /><label class="half" for="c_star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="c_star3" name="communication_rating" value="3" /><label class = "full" for="c_star3" title="Meh - 3 stars"></label>
							<input type="radio" id="c_star2half" name="communication_rating" value="2.5" /><label class="half" for="c_star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="c_star2" name="communication_rating" value="2" /><label class = "full" for="c_star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="c_star1half" name="communication_rating" value="1.5" /><label class="half" for="c_star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="c_star1" name="communication_rating" value="1" /><label class = "full" for="c_star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="c_starhalf" name="communication_rating" value="0.5" /><label class="half" for="c_starhalf" title="Sucks big time - 0.5 stars"></label>
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
					<?php echo $this->Form->input('comment',
						[
							'type' => "textarea",
							'label'=>false,
							'required' => true,
							'placeholder' => 'Type your feedback',
							'class'=>'form-control' ]
						);?>
				  
				</div>
		   
				
				<button id="send" type="submit" class="btn btn-comm-save"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
			   
			  </div>
			</div>
		  </div>
		
		</div>
	  </div>
  
</div>

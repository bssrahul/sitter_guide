 <style></style><link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"></style>
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
                   <div class="row">
					 <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Review')); ?><small></small></h2>
									<div class="clearfix"></div>
							    </div>
								<div class="x_content">
							
							        <?php echo $this->Form->create($reviewData, [
										/*'url' => ['controller' => 'partners', 'action' => 'add-partner'],*/
										'class'=>'form-horizontal form-label-left',
										'id'=>'editrating',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										'autocomplete' =>'off',
										
									]);?>
								<?php foreach($reviewData as $reviewInfo){ ?>	
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_to"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Rate To')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<select name="user_to" id="userto" class='form-control col-md-7 col-xs-12 userto' 'value'=<?php ($reviewInfo->user_to != '' ?$reviewInfo->user_to:'');?> >
												<option value="">--Select Users--</option>
											<?php if($UserData != ""){
												
												foreach($UserData as $users){?>
												<option value="<?php echo $users->id;?>"><?php echo $users->first_name."  ".$users->last_name;?> </option>
											<?php } } ?>
											</select>
											
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="comment"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<select name="booking_id" id="booking" class='form-control col-md-7 col-xs-12'>
											<?php	// pr($book_id);?>
										
											
											</select>
											
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="comment"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Comment')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->input('comment',
											 ['type' => "textarea",
											 'label'=>false,
											 'required' => true,
											  'class'=>'form-control col-md-7 col-xs-12' ,
											  'value'=>$reviewInfo->comment != '' ?$reviewInfo->comment:'']);?>
											  <label class="error" for="comment" generated="true"></label>
										</div>
									</div>
									<!--<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Rating')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
									
											<fieldset class="rating_review" value="">
												<input type="radio" id="star5" name="rating" value="5" <?php if($reviewInfo->rating == 5){ echo "checked"; } ?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
												<input type="radio" id="star4half" name="rating" value="4.5" <?php if($reviewInfo->rating == 4.5){ echo "checked"; } ?>/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
												<input type="radio" id="star4" name="rating" value="4" <?php if($reviewInfo->rating == 4){ echo "checked"; } ?>/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
												<input type="radio" id="star3half" name="rating" value="3.5" <?php if($reviewInfo->rating == 3.5){ echo "checked"; } ?> /><label class="half" for="star3half" title=" 3.5 stars"></label>
												<input type="radio" id="star3" name="rating" value="3" <?php if($reviewInfo->rating == 3){ echo "checked"; } ?>/><label class = "full" for="star3" title=" 3 stars"></label>
												<input type="radio" id="star2half" name="rating" value="2.5" <?php if($reviewInfo->rating == 2.5){ echo "checked"; } ?>/><label class="half" for="star2half" title=" 2.5 stars"></label>
												<input type="radio" id="star2" name="rating" value="2" <?php if($reviewInfo->rating == 2){ echo "checked"; } ?> /><label class = "full" for="star2" title=" 2 stars"></label>
												<input type="radio" id="star1half" name="rating" value="1.5" <?php if($reviewInfo->rating == 1.5){ echo "checked"; } ?>/><label class="half" for="star1half" title=" 1.5 stars"></label>
												<input type="radio" id="star1" name="rating" value="1" <?php if($reviewInfo->rating == 1){ echo "checked"; } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
												<input type="radio" id="starhalf" name="rating" value="0.5" <?php if($reviewInfo->rating == 0.5){ echo "checked"; } ?> /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
											</fieldset>
										</div>
									</div> -->
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accuracy Rating')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
									
											<span class="rating">
													<input type='radio' id="star5" name='accuracy_rating' value='5' <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 5 && $reviewInfo->accuracy_rating > 4.5){ echo "checked"; } }?>/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
													<input type="radio" id="star4half" name="accuracy_rating" value="4.5" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 4.5 && $reviewInfo->accuracy_rating > 4){ echo "checked"; } }?>/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
													<input type="radio" id="star4" name="accuracy_rating" value="4" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 4 && $reviewInfo->accuracy_rating > 3.5){ echo "checked"; } }?>/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
													<input type="radio" id="star3half" name="accuracy_rating" value="3.5" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 3.5 && $reviewInfo->accuracy_rating > 3){ echo "checked"; } }?>/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
													<input type="radio" id="star3" name="accuracy_rating" value="3" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 3 && $reviewInfo->accuracy_rating > 2.5){ echo "checked"; } }?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
													<input type="radio" id="star2half" name="accuracy_rating" value="2.5" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 2.5 && $reviewInfo->accuracy_rating > 2){ echo "checked"; } }?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
													<input type="radio" id="star2" name="accuracy_rating" value="2" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 2 && $reviewInfo->accuracy_rating > 1.5){ echo "checked"; } }?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
													<input type="radio" id="star1half" name="accuracy_rating" value="1.5" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 1.5 && $reviewInfo->accuracy_rating >1){ echo "checked"; } }?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
													<input type="radio" id="star1" name="accuracy_rating" value="1" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 1 && $reviewInfo->accuracy_rating >0.5){ echo "checked"; } }?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
													<input type="radio" id="starhalf" name="accuracy_rating" value="0.5" <?php if(!empty($reviewInfo->accuracy_rating)){ if($reviewInfo->accuracy_rating <= 0.5&& $reviewInfo->accuracy_rating >0){ echo "checked"; } }?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
											</span>
										</div>
									</div>
								<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Communication Rating')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
									
											<span class="rating">
													<input type='radio' id="c_star5" name='communication_rating' value='5' <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 5 && $reviewInfo->communication_rating > 4.5){ echo "checked"; } }?>/><label class = "full" for="c_star5" title="Awesome - 5 stars"></label>
													<input type="radio" id="c_star4half" name="communication_rating" value="4.5" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 4.5 && $reviewInfo->communication_rating > 4){ echo "checked"; } }?>/><label class="half" for="c_star4half" title="Pretty good - 4.5 stars"></label>
													<input type="radio" id="c_star4" name="communication_rating" value="4" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 4 && $reviewInfo->communication_rating > 3.5){ echo "checked"; } }?>/><label class = "full" for="c_star4" title="Pretty good - 4 stars"></label>
													<input type="radio" id="c_star3half" name="communication_rating" value="3.5" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 3.5 && $reviewInfo->communication_rating > 3){ echo "checked"; } }?>/><label class="half" for="c_star3half" title="Meh - 3.5 stars"></label>
													<input type="radio" id="c_star3" name="communication_rating" value="3" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 3 && $reviewInfo->communication_rating > 2.5){ echo "checked"; } }?>/><label class = "full" for="c_star3" title="Meh - 3 stars"></label>
													<input type="radio" id="c_star2half" name="communication_rating" value="2.5" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 2.5 && $reviewInfo->communication_rating > 2){ echo "checked"; } }?>/><label class="half" for="c_star2half" title="Kinda bad - 2.5 stars"></label>
													<input type="radio" id="c_star2" name="communication_rating" value="2" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 2 && $reviewInfo->communication_rating > 1.5){ echo "checked"; } }?>/><label class = "full" for="c_star2" title="Kinda bad - 2 stars"></label>
													<input type="radio" id="c_star1half" name="communication_rating" value="1.5" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 1.5 && $reviewInfo->communication_rating > 1){ echo "checked"; } }?>/><label class="half" for="c_star1half" title="Meh - 1.5 stars"></label>
													<input type="radio" id="c_star1" name="communication_rating" value="1" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 1 && $reviewInfo->communication_rating > 0.5){ echo "checked"; } }?>/><label class = "full" for="c_star1" title="Sucks big time - 1 star"></label>
													<input type="radio" id="c_starhalf" name="communication_rating" value="0.5" <?php if(!empty($reviewInfo->communication_rating)){ if($reviewInfo->communication_rating <= 0.5 && $reviewInfo->communication_rating > 0){ echo "checked"; } }?>/><label class="half" for="c_starhalf" title="Sucks big time - 0.5 stars"></label>
											</span>
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cleanliness Rating')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
									
											<span class="rating">
													<input type='radio' id="cl_star5" name='cleanliness_rating' value='5'  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 5 && $reviewInfo->cleanliness_rating > 4.5){ echo "checked"; } }?>/><label class = "full" for="cl_star5" title="Awesome - 5 stars"></label>
													<input type="radio" id="cl_star4half" name="cleanliness_rating" value="4.5" <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 4.5 && $reviewInfo->cleanliness_rating > 4){ echo "checked"; } }?>/><label class="half" for="cl_star4half" title="Pretty good - 4.5 stars"></label>
													<input type="radio" id="cl_star4" name="cleanliness_rating" value="4"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 4 && $reviewInfo->cleanliness_rating > 3.5){ echo "checked"; } }?>/><label class = "full" for="cl_star4" title="Pretty good - 4 stars"></label>
													<input type="radio" id="cl_star3half" name="cleanliness_rating" value="3.5"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 3.5 && $reviewInfo->cleanliness_rating > 3){ echo "checked"; } }?>/><label class="half" for="cl_star3half" title="Meh - 3.5 stars"></label>
													<input type="radio" id="cl_star3" name="cleanliness_rating" value="3"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 3 && $reviewInfo->cleanliness_rating >2.5){ echo "checked"; } }?>/><label class = "full" for="cl_star3" title="Meh - 3 stars"></label>
													<input type="radio" id="cl_star2half" name="cleanliness_rating" value="2.5"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 2.5 && $reviewInfo->cleanliness_rating > 2){ echo "checked"; } }?>/><label class="half" for="cl_star2half" title="Kinda bad - 2.5 stars"></label>
													<input type="radio" id="cl_star2" name="cleanliness_rating" value="2"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 2 && $reviewInfo->cleanliness_rating > 1.5){ echo "checked"; } }?>/><label class = "full" for="cl_star2" title="Kinda bad - 2 stars"></label>
													<input type="radio" id="cl_star1half" name="cleanliness_rating" value="1.5"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 1.5 && $reviewInfo->cleanliness_rating > 1){ echo "checked"; } }?>/><label class="half" for="cl_star1half" title="Meh - 1.5 stars"></label>
													<input type="radio" id="cl_star1" name="cleanliness_rating" value="1"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 1 && $reviewInfo->cleanliness_rating > 0.5){ echo "checked"; } }?>/><label class = "full" for="cl_star1" title="Sucks big time - 1 star"></label>
													<input type="radio" id="cl_starhalf" name="cleanliness_rating" value="0.5"  <?php if(!empty($reviewInfo->cleanliness_rating)){ if($reviewInfo->cleanliness_rating <= 0.5 && $reviewInfo->cleanliness_rating > 0){ echo "checked"; } }?>/><label class="half" for="cl_starhalf" title="Sucks big time - 0.5 stars"></label>
											</span>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Location Rating')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
									
											<span class="rating">
													<input type='radio' id="l_star5" name='location_rating' value='5' <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 5 && $reviewInfo->location_rating > 4.5){ echo "checked"; } }?>/><label class = "full" for="l_star5" title="Awesome - 5 stars"></label>
													<input type="radio" id="l_star4half" name="location_rating" value="4.5"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 4.5 && $reviewInfo->location_rating > 4){ echo "checked"; } }?>/><label class="half" for="l_star4half" title="Pretty good - 4.5 stars"></label>
													<input type="radio" id="l_star4" name="location_rating" value="4"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 4 && $reviewInfo->location_rating > 3.5){ echo "checked"; } }?>/><label class = "full" for="l_star4" title="Pretty good - 4 stars"></label>
													<input type="radio" id="l_star3half" name="location_rating" value="3.5"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 3.5 && $reviewInfo->location_rating > 3){ echo "checked"; } }?>/><label class="half" for="l_star3half" title="Meh - 3.5 stars"></label>
													<input type="radio" id="l_star3" name="location_rating" value="3"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 3 && $reviewInfo->location_rating > 2.5){ echo "checked"; } }?>/><label class = "full" for="l_star3" title="Meh - 3 stars"></label>
													<input type="radio" id="l_star2half" name="location_rating" value="2.5"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 2.5 && $reviewInfo->location_rating > 2){ echo "checked"; } }?>/><label class="half" for="l_star2half" title="Kinda bad - 2.5 stars"></label>
													<input type="radio" id="l_star2" name="location_rating" value="2"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 2 && $reviewInfo->location_rating > 1.5){ echo "checked"; } }?>/><label class = "full" for="l_star2" title="Kinda bad - 2 stars"></label>
													<input type="radio" id="l_star1half" name="location_rating" value="1.5"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 1.5 && $reviewInfo->location_rating > 1){ echo "checked"; } }?>/><label class="half" for="l_star1half" title="Meh - 1.5 stars"></label>
													<input type="radio" id="l_star1" name="location_rating" value="1"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 1 && $reviewInfo->location_rating > 0.5){ echo "checked"; } }?>/><label class = "full" for="l_star1" title="Sucks big time - 1 star"></label>
													<input type="radio" id="l_starhalf" name="location_rating" value="0.5"  <?php if(!empty($reviewInfo->location_rating)){ if($reviewInfo->location_rating <= 0.5 && $reviewInfo->location_rating > 0){ echo "checked"; } }?>/><label class="half" for="l_starhalf" title="Sucks big time - 0.5 stars"></label>
											</span>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Check In Rating')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
									
											<span class="rating">
													<input type='radio' id="ch_star5" name='check_in_rating' value='5' <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 5 && $reviewInfo->check_in_rating > 4.5){ echo "checked"; } }?>/><label class = "full" for="ch_star5" title="Awesome - 5 stars"></label>
													<input type="radio" id="ch_star4half" name="check_in_rating" value="4.5"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 4.5 && $reviewInfo->check_in_rating > 4){ echo "checked"; } }?>/><label class="half" for="ch_star4half" title="Pretty good - 4.5 stars"></label>
													<input type="radio" id="ch_star4" name="check_in_rating" value="4"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 4 && $reviewInfo->check_in_rating > 3.5){ echo "checked"; } }?>/><label class = "full" for="ch_star4" title="Pretty good - 4 stars"></label>
													<input type="radio" id="ch_star3half" name="check_in_rating" value="3.5"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 3.5 && $reviewInfo->check_in_rating > 3){ echo "checked"; } }?>/><label class="half" for="ch_star3half" title="Meh - 3.5 stars"></label>
													<input type="radio" id="ch_star3" name="check_in_rating" value="3"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 3 && $reviewInfo->check_in_rating > 2.5){ echo "checked"; } }?>/><label class = "full" for="ch_star3" title="Meh - 3 stars"></label>
													<input type="radio" id="ch_star2half" name="check_in_rating" value="2.5"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 2.5 && $reviewInfo->check_in_rating > 2){ echo "checked"; } }?>/><label class="half" for="ch_star2half" title="Kinda bad - 2.5 stars"></label>
													<input type="radio" id="ch_star2" name="check_in_rating" value="2"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 2 && $reviewInfo->check_in_rating > 1.5){ echo "checked"; } }?>/><label class = "full" for="ch_star2" title="Kinda bad - 2 stars"></label>
													<input type="radio" id="ch_star1half" name="check_in_rating" value="1.5"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 1.5 && $reviewInfo->check_in_rating > 1){ echo "checked"; } }?>/><label class="half" for="ch_star1half" title="Meh - 1.5 stars"></label>
													<input type="radio" id="ch_star1" name="check_in_rating" value="1"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 1 && $reviewInfo->check_in_rating > 0.5){ echo "checked"; } }?>/><label class = "full" for="ch_star1" title="Sucks big time - 1 star"></label>
													<input type="radio" id="ch_starhalf" name="check_in_rating" value="0.5"  <?php if(!empty($reviewInfo->check_in_rating)){ if($reviewInfo->check_in_rating <= 0.5 && $reviewInfo->check_in_rating > 0){ echo "checked"; } }?>/><label class="half" for="ch_starhalf" title="Sucks big time - 0.5 stars"></label>
											</span>
										</div>
									</div>
								<?php } ?>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
											<button id="send" type="submit" class="btn btn-success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
										</div>
									</div>
								</div>
                                    <?php echo $this->form->end(); ?>
                                <!-- end form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<style>
				.ct{
				display:none;
				}
                </style>			
		 <script>
		
		 $(document).ready(function(){
		 
				/* $( "#c_type" ).change(function() {
					$(".ct").hide();
					$("#"+$(this).val()).show();
				}); */
				
		       //Add date picker
		      /*  $( "#promocodes-start-date" ).datepicker({
				  showOtherMonths: true,
				  selectOtherMonths: true,
				  dateFormat: 'yy-mm-dd'
				});
				
				$( "#promocodes-expire-date" ).datepicker({
				  showOtherMonths: true,
				  selectOtherMonths: true,
				  dateFormat: 'yy-mm-dd'
				}); */ 
			   /*$('#promocodes-start-date').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4",
				format: 'YYYY-MM-DD'
				}, function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
		        $('#promocodes-expire-date').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4",
				format: 'YYYY-MM-DD'
				}, function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});*/
				// initialize the validator function
				//validator.message['date'] = 'not a real date';

				// validate a field on "blur" event, a 'select' on 'change' event & a 
			/* 	$('#addrating').submit(function (e) {
				
					e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				}); */
 
				
	});
	</script>
</div></div>

<?php echo "okokoko"; ?>
<?php echo $this->Form->create(null, [
									'url' => ['controller' => 'dashboard', 'action' => 'save-minder-details'],
									'role'=>'form',
									'id'=>'extendedProfileForm',
									'enctype'=>'multipart/form-data'
									]);?>
				        <h2>Transport</h2>
						<h4>Information relating to your travelling rates and emergency transport. You can always tweak the final price of the booking using our "Special Price" functionality.</h4>
						<div class="form-group">
						    <label for="pick_drop">Offer Pick Up/ Drop Off</label>
							<?php
						   echo $this->Form->checkbox('UserExtendedProfiles[pick_drop]', [
								'value' => 'pick_drop',
								'hiddenField' => false,
								'id'=>'pick_drop'
							]);		
										 ?>
							<br><label for="travel_fee_rate">$/one-way trip </label>
							<?php echo $this->Form->input('UserExtendedProfiles[travel_fee_rate]',[
										'class'=>'form-control',
										'label'=>false,
										'style' =>['display:none'],
										'id'=>'travel_fee_rate'
										]);
							?>
						</div>
						<div class="form-group">
						<label for="access_car">
                              Do you have direct access to a car in the case of emergency? *
                        </label><br>
						  <?php
						/*echo $this->Form->radio(
								'UserExtendedProfiles[access_car]',
									[
										['value' => '1', 'text' => 'Yes', 'style' => 'color:green;'],
										['value' => '0', 'text' => 'No', 'style' => 'color:red;'],
									]
						         );*/
				$session = $this->request->session();
						
		                $extendedProfile = $session->read('extendedProfile');
						if($extendedProfile){
						   $accessCar = $extendedProfile['UserExtendedProfiles']['access_car'];
						   $homeType = $extendedProfile['UserExtendedProfiles']['home_type'];
						   $gardenArea = $extendedProfile['UserExtendedProfiles']['garden_area'];
						   $isFanced = $extendedProfile['UserExtendedProfiles']['is_fanced'];
						    $under13Child = $extendedProfile['UserExtendedProfiles']['under_13_child'];
							 $lastMinuteBooking = $extendedProfile['UserExtendedProfiles']['last_minute_booking'];
							 $shortTermType = $extendedProfile['UserExtendedProfiles']['short_term_type'];
							 $cancelPolicy = $extendedProfile['UserExtendedProfiles']['cancel_policy'];
						}else{
						 $accessCar = "";
						 $homeType = "";
						 $gardenArea = "";
						 $isFanced = "";
						 $under13Child = "";
						 $lastMinuteBooking = "";
						 $shortTermType = "";
						 $cancelPolicy = "";
						}
						$options2= ['yes' => 'Yes','no' => 'No'];
						$attributes2 = ['hiddenField'=>false,'value' =>$accessCar,
						];
						echo $this->Form->radio('UserExtendedProfiles[access_car]', $options2, $attributes2);
									?>
						</div>
				       <h1>Accomodation</h1>
					   <div class="form-group">
						<label for="home_type">What type of home do you live? *</label>
						  <?php
						  
						  echo $this->Form->input('UserExtendedProfiles[home_type]',[
											'class'=>'form-control',
											'type'=>'select',
											'options'=>[''=>'---','Apartment/Unit','House','Town House','Vila'],
											'label'=>false,
											'value'=>$homeType
											]);
									 ?>
						</div>
						<div class="form-group">
						<label for="garden_area">
                         What is the size of your outdoor area? *</label>
						  <?php
						  echo $this->Form->input('UserExtendedProfiles[garden_area]',[
											'class'=>'form-control',
											'type'=>'select',
											'options'=>[''=>'---','No Outdoor Area','Small(less then 25m2)','Medium(25-50m2)','Large(greater than 50m2 )'],
											'label'=>false,
											'value'=>$gardenArea]);
									 ?>
						</div>
						<div class="form-group">
						<label for="is_fanced">
                              Is your outdoor area fenced? *
                        </label><br>
						  <?php
				        $attributes2 = ['hiddenField'=>false,'value' =>$isFanced,
						];
						echo $this->Form->radio('UserExtendedProfiles[is_fanced]', $options2, $attributes2);
						  /*echo $this->Form->radio(
									'UserExtendedProfiles[is_fanced]',
									[
										['value' => 'yes', 'text' => 'Yes', 'style' => 'color:green;'],
										['value' => 'no', 'text' => 'No', 'style' => 'color:red;'],
									]
						         );*/
						?>
						</div>
						<div class="form-group">
						<label for="under_13_child">
                             Are there young children under 13 years old in the home? *
                        </label><br>
						  <?php
						$attributes2 = ['hiddenField'=>false,'value' =>$under13Child,
						];
						echo $this->Form->radio('UserExtendedProfiles[under_13_child]', $options2, $attributes2);
				          /*echo $this->Form->radio(
									'UserExtendedProfiles[under_13_child]',
									[
										['value' => 'yes', 'text' => 'Yes', 'style' => 'color:green;'],
										['value' => 'no', 'text' => 'No', 'style' => 'color:red;'],
									]
						         );*/
						?>
						</div>
						<h2>Policy</h2>
						<div class="form-group">
						<label for="last_minute_booking">
                             Will you consider last-minute bookings (less than 24 hours)? *
                        </label><br>
						  <?php
						$attributes2 = ['hiddenField'=>false,'value' =>$lastMinuteBooking,
						];
						echo $this->Form->radio('UserExtendedProfiles[last_minute_booking]', $options2, $attributes2);
				          /*echo $this->Form->radio(
								'UserExtendedProfiles[last_minute_booking]',
									[
										['value' => 'yes', 'text' => 'Yes', 'style' => 'color:green;'],
										['value' => 'no', 'text' => 'No', 'style' => 'color:red;'],
									]
						         );*/
						?>
						</div>
						<div class="form-group">
						<label for="short_term_type">
                             Will you consider short-term stay bookings (more than one month long)? *
                        </label><br>
						  <?php
					   $attributes2 = ['hiddenField'=>false,'value' =>$shortTermType
						];
						echo $this->Form->radio('UserExtendedProfiles[short_term_type]', $options2, $attributes2);
				          /*echo $this->Form->radio(	
								'UserExtendedProfiles[short_term_type]',
									[
										['value' => 'yes', 'text' => 'Yes', 'style' => 'color:green;'],
										['value' => 'no', 'text' => 'No', 'style' => 'color:red;'],
									]
						         );*/
						?>
						</div>
						<div class="form-group">
						<label for="cancel_policy">
                       Please advise your cancellation policy*</label>
						  <?php
			              echo $this->Form->input('UserExtendedProfiles[cancel_policy]',[
											'class'=>'form-control',
											'type'=>'select',
											'options'=>[''=>'---','Strict','Moderate','Flexible'],
											'label'=>false,
											'value'=>$cancelPolicy
											]);
									 ?>
						</div>
					   <!--<a data-toggle="tab" href="#personal"><button  class="btn btn-success">Continue</button></a>-->
					    <input type="submit" class="btn btn-success" id="submitExtended" value="Continue"/>
						
					   <a data-toggle="tab" href="#baseProfile"><button  class="btn btn-success">Back</button></a>
					   
					<?php echo $this->Form->end();
					//echo 'extendedProfile';//include('inc_fund_mat.ctp'); ?>
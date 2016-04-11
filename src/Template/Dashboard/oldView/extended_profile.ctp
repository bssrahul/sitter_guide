<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<ul class="nav nav-tabs">
				<li><a  href="<?php echo HTTP_ROOT."dashboard/sitter-account"; ?>">Dashboard</a></li>
				<li><a href="<?php echo HTTP_ROOT."dashboard/personal-details"; ?>">About</a></li>
				<li class="active"><a href="<?php echo HTTP_ROOT."dashboard/services-and-rates"; ?>">Index</a></li>
				
				<li><a data-toggle="tab" href="#calendar">Calendar</a></li>
			</ul>
			<div class="tab-content">
			
				<div id="dashboard" class="tab-pane fade">
				  
				</div><!-- @vik Overview tab  -->	
				
				<div id="about" class="tab-pane fade in active">
				     <div class="col-md-3 col-sm-3 col-xs-3">
					     <img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($userInfo->image != ''?$userInfo->image:'prof_photo.png'); ?>"/>
						<ul class="list-group">
							  <li class="list-group-item"><a href="<?php echo HTTP_ROOT.'dashboard/personal-details'; ?>">Personal Details</a></li>
							  <li class="list-group-item"><a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates'; ?>">Service and Rates</a></li>
							  <li class="list-group-item"><a href="">Basic Profile</a></li>
							  <li class="list-group-item"><a href="">Extended Profile</a></li>
							  <li class="list-group-item"><a href="">Photos</a></li>
							  <li class="list-group-item"><a href="">Settings</a></li>
						</ul>
					 </div>
					 <div class="col-md-8 col-sm-8 col-xs-8">    <h2><?php echo $userInfo->first_name." ".$userInfo->last_name ?>    </h2>
					    <div><?php echo "Contact Email:".$userInfo->email; ?></div>
						<div><?php echo "Contact Mobile:".$userInfo->phone; ?></div>
					 </div><br>
					 <div class="col-md-8 col-sm-8 col-xs-8">
					  
						  
						 
						   <?php echo $this->Form->create(null, [
									'url' => ['controller' => 'dashboard', 'action' => 'services-and-rates'],
									'role'=>'form',
									'id'=>'personalForm',
									'enctype'=>'multipart/form-data'
									]);?>
			 <h4>Accepted Pet Types</h4>					
			 <label for="pet_type">Select one or more types of pet from below </label>
					<div class="form-group">
						<?php 
						if(isset($userInfo->user_accepted_pets)){
							foreach($userInfo->user_accepted_pets as $key=>$val){
								 $selected[$val->pet_type] = $val->pet_type;
							}
						}else{
							$selected = "";
						}
						$options = ["puppies"=>"puppies","giant"=>"giant","rabbits"=>"rabbits","cat"=>"Cat","bird"=>"bird","large_dog"=>"Large Dog"];
						
						echo $this->Form->input('pet_type', 
						['multiple' => 'checkbox', 'options' => $options, 
						'value' => $selected,
						'hiddenField'=>false,
						'label'=>false
						]);?>
                    </div>
			 <h4>Services You Offer</h4>					
			 <label for="pet_type">Select and modify the service(s) you want to offer here, make sure to Save at the bottom to confirm the changes once you're done!  </label>
					<div class="form-group">
						<?php 
						if(isset($userInfo->user_services)){
							foreach($userInfo->user_services as $key=>$val){
							$selected[$val->service] = $val->service;
							}
						}else{
							$selected = "";
						}
						$options = ["pet_hosting"=>"Pet Hosting","dog_walking"=>"Dog Walking","dog_grooming"=>"Dog Grooming"];
						
						echo $this->Form->input('service', 
						['multiple' => 'checkbox', 'options' => $options, 
						'value' => $selected,
						'class'=>'service',
						'hiddenField'=>false,
						'label'=>false
						]);?>
					</div>
				<div id="mainServiceDiv">
				    <?php 
					if(isset($userInfo->user_services)){
						foreach($userInfo->user_services as $key=>$val){
						//echo "<pre>";print_r($val);
						//echo "<pre>";print_r($val->user_service_details);
						foreach($val->user_service_details as $singleDetail){
						   $singleDetail->additional_rate;
						}
						//echo "<pre>";print_r($singleDetail->additional_rate);
						    $selected[$val->service_price] = $val->service_price;
							?>
							 <?php echo $this->Form->input('user_service_id[]', 
									['value' => $val->id,
									'type'=>'hidden'
									]);?>
						<div class="service-<?php echo $val->service; ?>">
							<h2><?php echo $val->service; ?></h2>
							<label for="service_price">Base Rate</label><br>
							<span>Cost per night for one pet</span>
							<div class="form-group">
								 <?php echo $this->Form->input('service_price[]', 
									['value' => $val->service_price,
									'hiddenField'=>false,
									'label'=>false
									]);?>
					        </div>
							<label for="additional_rate">Additional Pet Rates</label><br>
							<span>Cost per night for each additional pet</span>
							<div class="form-group">
								 <?php echo $this->Form->input('additional_rate[]', 
									[
									'value' => $singleDetail->additional_rate,
									'hiddenField'=>false,
									'label'=>false
									]);?>
					        </div>
							<label for="puppy_pet_rate">Puppy Pet Rates</label><br>
							<span>Cost per night for one puppy</span>
							<div class="form-group">
								 <?php echo $this->Form->input('puppy_pet_rate[]', 
								   [
									'hiddenField'=>false,
									'label'=>false,
									'value' => $singleDetail->puppy_pet_rate,
									]);?>
					        </div>
							<label for="extended_session">Extended Booking Rate</label><br>
							<span>For bookings longer than:</span>
							<div class="form-group">
								 <?php echo $this->Form->input('extended_session[]', 
								[
									'hiddenField'=>false,
									'label'=>false,
									'placeholder'=>'E.g.7 Session',
									'value' => $singleDetail->extended_session,
								]);?>
					        </div>
							<span>Offer a discount rate:</span>
							<div class="form-group">
								 <?php echo $this->Form->input('extended_discount[]', 
								[
									'hiddenField'=>false,
									'label'=>false,
									'placeholder'=>'E.g.15% discount',
									'value' => $singleDetail->extended_discount,
									]);?>
					        </div>
							<label for="spaces_available">Space Available</label><br>
							<span>Maximum number of pets you can take at for this service</span>
							<div class="form-group">
								 <?php echo $this->Form->input('spaces_available[]', 
								   [
									'hiddenField'=>false,
									'label'=>false,
									'value' => $singleDetail->spaces_available,
									]);?>
					        </div>
						</div>
							<?php 
						}
					}else{
						$selected = "";
					} ?>
				</div>					
				    <input type="submit" class="btn btn-success" id="submitPersonal" value="Save"/>
						  <?php echo $this->form->end(); ?>
					  
					 </div>
				</div><!-- @vik Executive Summary tab  -->	
				<div id="index" class="tab-pane fade">
				   index
				</div><!-- @vik Funding Materials tab  -->
               			
				<div id="calendar" class="tab-pane fade">
				    calendar
				</div>
				      
				</div><!-- @vik Funding Materials tab  -->	
				
			</div><!-- @vik tab content --> 	
			
		</div>
	</div>
<style>
ul.nav-tabs li{
    color: #efefef;
    border: 1px solid #ddd;
}
ul.nav-tabs li > a {
    color: #000 !important;
}
</style>
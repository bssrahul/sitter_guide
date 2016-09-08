<!--top filter tab-->
<div class="top-filter-tab">

	<ul class="service_selected">

		<li>
			<a data-rel="bording" class="boarding chooseService"> <span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Boarding')); ?>
				<br>
				<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in the sitter home')); ?></b> 
			</a>
		</li>

		<li>
			<a data-rel="house_sitting" class="h-sitting chooseService"><span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('House Sitting')); ?>
				<br>
				<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in your home')); ?></b>
			</a>
		</li>

		<li>
			<a data-rel="drop_visit" class="d-visit chooseService"><span></span> 
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop-in Visit')); ?>
				<br>
				<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in your home')); ?></b>
			</a>
		</li>

		<li>
			<a data-rel="day_night_care" class="dn-care chooseService"><span></span> 
			<?php echo $this->requestAction('app/get-translate/'.base64_encode('Day / Night Care')); ?><br>
			<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in the sitter’s home')); ?></b>
			</a>
		</li>

		<li >
			<a data-rel="marketplace" class="m-place chooseService"><span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place')); ?><br>
			<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('exercise, groom, train+')); ?></b></a>
		</li>
	</ul>

  </div>
<!--top filter tab-->    
               
	<?php echo $this->Form->create(null, [
		'url' => ['controller' => 'search', 'action' => 'search'],
		'role'=>'form',
		'id'=>'searchParam',
		'autocomplete'=>'off',
	]);?>
	<!-- Search Field SERVICE SELECTED Start-->
	<?php echo $this->Form->input('Search.selected_service',[
	'label' => false,
	'type'=>'hidden',
	'readonly'=>true,
	'value'=>'bording',
	'id'=>'selected_service']);
  
	  echo $this->Form->input('Search.distance',[
		'label' => false,
		'type'=>'hidden',
		'readonly'=>true,
		'value'=>DEFAULT_RADIUS,
		'id'=>'hidden_distance']
		);
	  ?>		
	<!--Tab Content area -->
	<div class="tab-content">

	  <div class="tab-pane fade in active" id="boarding" >
		
		<div class="search-bot-area">
		  
		  <div class="from-to-area">
			
			<ul class="sb-list FirstThreeServices">
			  
					<li class="zipOption"> 
					<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog Walking near')); ?> 
					</label>
					<div class="date-box date-box-1">
					  <?php echo $this->Form->input('Search.zip_code',[
							'label' => false,
							'templates' => ['inputContainer' => '{{content}}'],
							'hiddenField' => false,
							'type'=>'text',
							'class'=>'d-input',
							'placeholder'=>"Zip Code or Address",
							'id'=>'zip_code']);
						?>
					</div>
				  </li>
			 
					<li class="dogOption onLoadHide"> 
					<div class="dog-list">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('How many dogs do you have?')); ?>
					  </label>
						<ul class="pet_count">
						  <li class="dog-in-li ">
							<span data-rel="1">1 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="2">2 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="3">3 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog')); ?></span>
						  </li>
						</ul>
						<!-- Search Field PET COUNT Start-->
							<?php echo $this->Form->input('Search.pet_count',[
							'label' => false,
							'type'=>'hidden',
							'readonly'=>true,
							'id'=>'pet_count']);
						  ?>
					</div>
				  </li>
			 
					<li> 
					<div class="date-picker">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('From')); ?> 
					  </label>
					  <div class="date-box">
						 <!-- Search Field From Date Start-->
						  <?php echo $this->Form->input('Search.from_date',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'d-input',
							'placeholder'=>'From',
							'readonly'=>true,
							'id'=>'boardingFrom']);
						  ?>
						  <div class="dimg"> 
							  <a href="javascript:void(0);" id="cIconFrom">
								  <img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/>
							  </a> 
						  </div>
						  
					  </div>
					</div>
				  </li>
				  
					<li> 
					<div class="date-picker">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('To')); ?> 
					  </label>
					  <div class="date-box">
						
						<!-- Search Field To Date Start-->
						<?php echo $this->Form->input('Search.to_date',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('To')),
							'class'=>'d-input',
							'readonly'=>true,
							'id'=>'boardingTo']);
						  ?>
						  <div class="dimg"> 
							  <a href="javascript:void(0);" id="cIconTo">
								  <img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/>
							  </a> 
						  </div>
						
					  </div>
					</div>
				  </li>
				  
			</ul>
		   
			<!--Last Two START -->
			
			  <div class="row LastTwoServices onLoadHide">
				<div class="from-to-area">
				  
				  <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 LastTwoServices onLoadHide">
					<div class="day-list">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('For which days?')); ?> 
					  </label>
					  <ul class="booking_days">
						  <li class="dog-in-li ">
							<span data-rel="sunday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('S')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="monday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('M')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="tuesday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('T')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="wednessday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('W')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="thursday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('T')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="friday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('F')); ?></span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="saturday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('S')); ?></span>
						  </li>
					</ul>
					<!-- Search Field PET COUNT Start-->
					<?php echo $this->Form->input('Search.booking_days',[
						'label' => false,
						'type'=>'hidden',
						'readonly'=>true,
						'id'=>'booking_days']);
					  ?>
					</div>
				  </div>
				  
				  <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 dnOption">
					<div class="what-time">
					  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('What time?')); ?> 
					  </label>
					  <ul>
						<li class="day"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Day')); ?>
						 <?php echo $this->Form->input('Search.what_time.day_care',[
							'label' => false,
							'templates' => ['inputContainer' => '{{content}}'],
							'hiddenField' => false,
							'type'=>'checkbox',
							'class'=>'',
							'option'=>["day"],
							'id'=>'day']);
						  ?>
						</li>
						<li class="night"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Night')); ?>
						  <?php echo $this->Form->input('Search.what_time.night_care',[
							'label' => false,
							'templates' => ['inputContainer' => '{{content}}'],
							'hiddenField' => false,
							'type'=>'checkbox',
							'class'=>'',
							'option'=>["night"],
							'id'=>'night']);
						  ?>
						</li>
					  </ul>
					</div>
				  </div>
				 
				  
				  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 mpOption onLoadHide">  
					<div class="col-cont">
					  <div class="market-place">
						<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Other Market Place Services Offered')); ?>
						</label>
						 <ul class="marketplace">
							
							<li class="marketplace_li ">
								<a href="javascript:void(0);" class="training" data-rel="training" title="Training">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Training')); ?>
								</a>
							</li>
							
							<li class="marketplace_li ">
								<a href="javascript:void(0);" class="recreation" data-rel="recreation" title="Recreation">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Recreation')); ?>
								</a>
							</li>
							
							<li class="marketplace_li ">
								<a href="javascript:void(0);" class="grooming" data-rel="grooming" title="Grooming">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Grooming')); ?>
								</a>
							</li>
							
							<li class="marketplace_li ">
								<a  href="javascript:void(0);" class="driver" data-rel="driver" title="Driver">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Driver')); ?>
								</a>
							</li>
						  
						 </ul>
						  <!-- Search Field PET COUNT Start-->
							<?php echo $this->Form->input('Search.marketplace',[
								'label' => false,
								'type'=>'hidden',
								'readonly'=>true,
								'id'=>'marketplace']);
							  ?>
						
						
						<!-- Search Field PET COUNT Start-->
						              
					  </div>                  
					</div>
				  </div>
			
				</div>
			  </div>
		  
			<!--Last Two -->
			
		  </div>
		  
		  <div class="sb-area">
			
			<ul>
				  <li>
						<div class="md-size"><label>
							<?php if(isset($sitter_guests_info) && !empty($sitter_guests_info)){ echo 'Your Pets:'; }else{
								echo 'My Dog Size'; 
								}?>
							 </label>
							<ul class="dog_size">
								<?php //pr($sitter_pet_info);
								if(isset($sitter_guests_info) && !empty($sitter_guests_info)){
								foreach($sitter_guests_info as $single_guest){
								 ?>
								    <label style="margin:3px" for="<?php $single_guest['guest_name'];?>">
									<input id="<?php $single_guest['guest_name'];?>" type="checkbox" checked >
									<?php echo $single_guest['guest_name']; ?>
									</label>
								<?php } 
								}else{  ?>		
								
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="0-15" title="Training">
											<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small')); ?></b>
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('0-15lbs')); ?>
										</a>
										
								</li>
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="16-40" title="Training">
											<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Medium')); ?></b>
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('16-40lbs')); ?>
										</a>
										
								</li>
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="41-100" title="Training">
											<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large')); ?></b>
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('41-100lbs')); ?>
										</a>
										
								</li>
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="101+" title="Training">
											<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Giant')); ?></b>
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('101+lbs')); ?>
										</a>
										
								</li>
								<?php } ?>
								
							</ul>	
						</div>
					</li>
					<li>
						  <!-- Search Field PET COUNT Start-->
						<?php echo $this->Form->input('Search.dog_size',[
							'label' => false,
							'type'=>'hidden',
							'readonly'=>true,
							'id'=>'dog_size']);
						?>
						<label>&nbsp;
						</label>
						<button class="btn btn-success sb-btn searchBtn" type="submit" value="Search"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Search')); ?></button>
					 </li>
			  </ul>
			
			
		  </div> 
		</div>
	  </div>
	  
	  
	</div>
	<!--Tab Content area--> 
	<?php echo $this->Form->end(); ?>
                 

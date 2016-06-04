<!--top filter tab-->
<div class="top-filter-tab">

	<ul class="service_selected">

	  <li><a  data-rel="bording" class="boarding chooseService"> <span></span> Boarding<br>
		<b>in the sitter home</b> </a></li>

	  <li><a  data-rel="house_sitting" class="h-sitting chooseService"><span></span> House Sitting<br>
		<b>in your home</b></a></li>

	  <li><a  data-rel="drop_visit" class="d-visit chooseService"><span></span> Drop-in Visit<br>
		<b>in your home</b></a></li>

	  <li><a  data-rel="day_night_care" class="dn-care chooseService"><span></span> Day / Night Care<br>
		<b>in the sitter’s home</b></a></li>

	  <li ><a data-rel="marketplace" class="m-place chooseService"><span></span> Market Place<br>
		<b>exercise, groom, train+</b></a></li>
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
		'value'=>'200',
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
					<label>Dog Walking near 
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
					  <label>How many dogs do you have?
					  </label>
						<ul class="pet_count">
						  <li class="dog-in-li ">
							<span data-rel="1">1 Dog</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="2">2 Dogs</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="3">3 Dogs</span>
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
					  <label>From
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
					  <label>To
					  </label>
					  <div class="date-box">
						
						<!-- Search Field To Date Start-->
						<?php echo $this->Form->input('Search.to_date',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'placeholder'=>'To',
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
					  <label>For which days? 
					  </label>
					  <ul class="booking_days">
						  <li class="dog-in-li ">
							<span data-rel="sunday">S</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="monday">M</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="tuesday">T</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="wednessday">W</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="thursday">T</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="friday">F</span>
						  </li>
						  <li class="dog-in-li ">
							<span data-rel="saturday">S</span>
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
					  <label>What time?
					  </label>
					  <ul>
						<li class="day">Day
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
						<li class="night">Night
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
						<label>Other Market Place Services Offered
						</label>
						 <ul class="marketplace">
							<li class="marketplace_li "><a href="javascript:void(0);" class="training" data-rel="training" title="Training">Training</a></li>
							<li class="marketplace_li "><a href="javascript:void(0);" class="recreation" data-rel="recreation" title="Recreation">Recreation</a></li>
							<li class="marketplace_li "><a href="javascript:void(0);" class="grooming" data-rel="grooming" title="Grooming">Grooming</a></li>
							<li class="marketplace_li "><a  href="javascript:void(0);" class="driver" data-rel="driver" title="Driver">Driver</a></li>
						  </ul>
						  <!-- Search Field PET COUNT Start-->
							<?php echo $this->Form->input('Search.marketplace',[
								'label' => false,
								'type'=>'hidden',
								'readonly'=>true,
								'id'=>'marketplace']);
							  ?>
						
						
						<!-- Search Field PET COUNT Start-->
						<input type="hidden" id="marketplace" readonly name="Search[marketplace]">                        
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
						<div class="md-size"><label>My Dog Size</label>
							<ul class="dog_size">
								
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="0-15" title="Training">
											<b>Small</b>0-15lbs
										</a>
										
								</li>
								
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="16-40" title="Training">
											<b>Medium</b>16-40lbs
										</a>
										
								</li>
								
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="41-100" title="Training">
											<b>Large</b>41-100lbs
										</a>
										
								</li>
								
								<li class="dog_size_li ">
									 <div class="d-size"> 
										<a href="javascript:void(0);" class="training" data-rel="101+" title="Training">
											<b>Giant</b>101+lbs
										</a>
										
								</li>
								
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
						<button class="btn btn-success sb-btn searchBtn" type="submit" value="Search">Search</button>
					 </li>
			  </ul>
			
			
		  </div> 
		</div>
	  </div>
	  
	  
	</div>
	<!--Tab Content area--> 
	<?php echo $this->Form->end(); ?>
                 

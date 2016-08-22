<div class="top-sr-area">
    <div class="cust-container">
      
      <div class="sr-area-outer">
        <div class="row st-head-txt">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('When you are Away')); ?></p>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hide-mob">
            <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('while you are at Home')); ?></p>
          </div>
        </div>
        
        <div class="sr-area"> 
          <!--top filter tab-->
          <div class="top-filter-tab">
            <ul class="service_selected">
              <li><a data-rel="bording" class="boarding ajaxSearch chooseService active"> <span></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Boarding')); ?> <br>
                <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in the sitter home')); ?></b> </a></li>
              <li><a data-rel="house_sitting" class="h-sitting ajaxSearch chooseService"><span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('House Sitting')); ?><br>
                <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in your home')); ?></b></a></li>
              <li><a data-rel="drop_visit" class="d-visit ajaxSearch chooseService"><span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop-in Visit')); ?><br>
                <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in your home')); ?></b></a></li>
              <li><a data-rel="day_night_care" class="dn-care ajaxSearch chooseService"><span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Day / Night Care')); ?><br>
                <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in the sitter’s home')); ?></b></a></li>
              <li ><a data-rel="marketplace" class="m-place ajaxSearch chooseService"><span></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place')); ?> <br>
                <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('exercise, groom, train+')); ?></b></a></li>
            </ul>
          </div>
          <!--top filter tab--> 
          <!--Tab Content area -->
			<?php echo $this->Form->create(null, [
				'url' => ['controller' => 'search', 'action' => 'ajax-search'],
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
          <div class="tab-content">
            <div class="tab-pane fade in active" id="boarding" >
              <div class="search-bot-area">
                <div class="row">
                  <div class="from-to-area">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 FirstThreeServices">
                      <div class="date-picker">
                        <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('From')); ?></label>
                       
                        <div class="date-box">
                          <!-- Search Field From Date Start-->
                          <?php echo $this->Form->input('Search.from_date',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'d-input',
							'placeholder'=>'From',
							'readonly'=>true,
							'id'=>'boardingFromFilter']);
						  ?>
                          <div class="dimg"> <a href="javascript:void(0);" id="cIconFromFilter"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 FirstThreeServices">
                      <div class="date-picker">
                        <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('To')); ?></label>
                        <div class="date-box">
                          <!-- Search Field To Date Start-->
                          <?php echo $this->Form->input('Search.to_date',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'placeholder'=>'To',
							'class'=>'d-input',
							'readonly'=>true,
							'id'=>'boardingToFilter']);
						  ?>
                          <div class="dimg"> <a href="javascript:void(0);" id="cIconToFilter"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png"  alt=""/></a> </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 FirstThreeServices"> 
                      <div class="dog-list onLoadHide dropInOption">
                        <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('How many dogs do you have?')); ?></label>
                        
                        <ul class="pet_count">
                          <li class="dog-in-li ajaxSearch">
                            <span data-rel="1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('1 Dog')); ?></span>
                          </li>
                          <li class="dog-in-li ajaxSearch">
                            <span data-rel="2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('2 Dogs')); ?></span>
                          </li>
                          <li class="dog-in-li ajaxSearch">
                            <span data-rel="3"><?php echo $this->requestAction('app/get-translate/'.base64_encode('3 Dogs')); ?></span>
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
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 LastTwoServices onLoadHide">
                      <div class="day-list">
                        <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('For which days?')); ?> </label>
							<ul class="booking_days">
								  <li class="dog-in-li ajaxSearch">
									<span data-rel="sunday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('S')); ?></span>
								  </li>
								  <li class="dog-in-li ajaxSearch">
									<span data-rel="monday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('M')); ?></span>
								  </li>
								  <li class="dog-in-li ajaxSearch">
									<span data-rel="tuesday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('T')); ?></span>
								  </li>
								  <li class="dog-in-li ajaxSearch">
									<span data-rel="wednessday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('W')); ?></span>
								  </li>
								  <li class="dog-in-li ajaxSearch">
									<span data-rel="thursday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('T')); ?></span>
								  </li>
								  <li class="dog-in-li ajaxSearch">
									<span data-rel="friday"><?php echo $this->requestAction('app/get-translate/'.base64_encode('F')); ?></span>
								  </li>
								  <li class="dog-in-li ajaxSearch">
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
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 LastTwoServices onLoadHide mPlacesOption">
                      <div class="what-time">
                        <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('What time?')); ?></label>
                        <ul>
                          <li class="day"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Day')); ?>
                             <?php echo $this->Form->input('Search.what_time.day_care',[
								'label' => false,
								'templates' => ['inputContainer' => '{{content}}'],
								'hiddenField' => false,
								'type'=>'checkbox',
								'class'=>'ajaxSearch',
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
								'class'=>'ajaxSearch',
								'option'=>["night"],
								'id'=>'night']);
							  ?>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <div class="price-range">
                        <label class="prcRangLbl"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Rate per Day / Night')); ?></label>
                        
                        <div id="slider-range">
                            <?php echo $this->Form->input('Search.start_price',[
								'label' => false,
								'style' => 'border:0; color:#327E04; font-weight:bold;',
								'readonly' => true,
								'templates' => ['inputContainer' => '{{content}}'],
								'hiddenField' => false,
								'type'=>'text',
								'id'=>'startRange']);
							  
							   echo $this->Form->input('Search.end_price',[
								'label' => false,
								'style' => 'border:0; color:#327E04; font-weight:bold;',
								'readonly' => true,
								'templates' => ['inputContainer' => '{{content}}'],
								'hiddenField' => false,
								'type'=>'text',
								'id'=>'endRange']);
							  ?>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="clearfix" style="margin:20px 0 0 0;"></div>
                <!--collapse content-->
                <div class="col-cont">
                  <div id="search-col-1" class="panel-collapse collapse">
                    <div class="row">
                      <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
						  
						 <?php if(isset($guests_Info) && !empty($guests_Info)){
						 ?> 
                        <div class="your-guest">
                          <p class="head-txt"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your Guest')); ?></p>
                          <ul>
							  <?php   foreach($guests_Info as $guest_info){  ?>
                             <li>
								  <?php echo $this->Form->input('Search.your_guest',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'id'=>'hunter',
									'value'=>@$guest_info->guest_name
									]);
								  ?>
								  <label class="unbold" for="hunter"><?php echo @$guest_info->guest_name; ?></label>
                             </li>
                            <?php } ?> 
                          </ul>
                        </div>
                        <?php } ?>
                        <div class="your-guest">
                          <p class="head-txt"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Info')); ?></p>
                          <ul>
                            <li>
								  <?php 
								  echo $this->Form->input('Search.sitter_info.own_pet',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'class'=>'ajaxSearch',
									'option'=>["own_pet"],
									'id'=>'own_pet']);
								  ?>
								  <label class="unbold" for="own_pet"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Doesn’t own a pet')); ?></label>
                            </li>
                            
                            <li>
								<?php 
								  echo $this->Form->input('Search.sitter_info.no_children',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'class'=>'ajaxSearch',
									'option'=>["no_children"],
									'id'=>'no_children']);
								  ?>
								  <label class="unbold" for="no_children"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Has no children')); ?></label>
                            </li>
                            <li>
								<?php 
								  echo $this->Form->input('Search.sitter_info.farm',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'class'=>'ajaxSearch',
									'option'=>["farm"],
									'id'=>'farm']);
								  ?>
								  <label class="unbold" for="farm"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Farm')); ?></label>
                            </li>
                            <li>
								<?php 
								  echo $this->Form->input('Search.sitter_info.flat',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'class'=>'ajaxSearch',
									'option'=>["flat"],
									'id'=>'flat']);
								  ?>
								  <label class="unbold" for="flat"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Flat')); ?></label>
                            </li>
                            <li>
                              <?php 
								  echo $this->Form->input('Search.sitter_info.house',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'class'=>'ajaxSearch',
									'option'=>["house"],
									'id'=>'house']);
								  ?>
								  <label class="unbold" for="house"><?php echo $this->requestAction('app/get-translate/'.base64_encode('House')); ?></label>
                          </ul>
                        </div>
                        <div class="your-guest exp">
                          <p class="head-txt"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience')); ?></p>
                          <ul>
                            <li>
                               <?php 
								  echo $this->Form->input('Search.experience',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'class'=>'ajaxSearch',
									'option'=>["experience"],
									'id'=>'experience']);
								  ?>
								  <label class="unbold" for="experience"><?php echo $this->requestAction('app/get-translate/'.base64_encode('2+ years sitting')); ?></label>
                              </li>
                            <li>
								<?php 
								  echo $this->Form->input('Search.first_aid',[
									'label' => false,
									'templates' => ['inputContainer' => '{{content}}'],
									'hiddenField' => false,
									'type'=>'checkbox',
									'class'=>'ajaxSearch',
									'option'=>["first_aid"],
									'id'=>'first_aid']);
								  ?>
								  <label class="unbold" for="first_aid"><?php echo $this->requestAction('app/get-translate/'.base64_encode('First-aid certified')); ?></label>
                              
                              </li>
                            <li>
                              <div class="form-group">
								  <?php echo $this->Form->input('Search.languages',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label' => false,
									'type'=>'select',
									'class'=>'ajaxSearchDropDown form-control',
									'options'=>['en'=>'English','fr'=>'French','de'=>'German','hu'=>'Hungarian','it'=>'Italian','ro'=>'Romanian','ru'=>'Russian','es'=>'spanish']									
									]);
									?>
                               
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <div class="market-place">
                          <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Other Market Place Services Offered')); ?></label>
                          <ul class="marketplace">
							<li class="marketplace_li ajaxSearch"><a href="javascript:void(0);" class="training" data-rel="training" title="Training"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Training')); ?></a></li>
                            <li class="marketplace_li ajaxSearch"><a href="javascript:void(0);" class="recreation" data-rel="recreation" title="Recreation"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Recreation')); ?></a></li>
                            <li class="marketplace_li ajaxSearch"><a href="javascript:void(0);" class="grooming" data-rel="grooming" title="Grooming"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Grooming')); ?></a></li>
                            <li class="marketplace_li ajaxSearch"><a  href="javascript:void(0);" class="driver" data-rel="driver" title="Driver"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Driver')); ?></a></li>
                          </ul>
                          <!-- Search Field PET COUNT Start-->
							<?php echo $this->Form->input('Search.marketplace',[
								'label' => false,
								'type'=>'hidden',
								'readonly'=>true,
								'id'=>'marketplace']);
							  ?>
                        </div>
                      </div>
                    </div>
                    <!--info popup-->
                    <div class="sitter-info"> <a  data-toggle="modal" class="more-link" data-target="#myModal" href="#" title="Sitter more Info"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter More Info')); ?></a> 
                    
                      <!--Model Popup-->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog"> 
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">X</button>
                              <h4 class="modal-title"><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Info')); ?></span></h4>
                            </div>
                            <div class="modal-body">
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_pet_info.pet_in_home',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'option'=>["pet_in_home"],
											'value'=>isset($data['Search']['sitter_pet_info']['pet_in_home'])?$data['Search']['sitter_pet_info']['pet_in_home']:'',
											'id'=>'pet_in_home']);
										?>
										<label class="unbold" for="pet_in_home"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet in the Home')); ?></label>
                                     </li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo10"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo10" class="in more-drop">
                                  <ul>
                                    <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_pet_info.doesnt_own_dog',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'homePet',
											'option'=>["doesnt_own_dog"],
											'value'=>isset($data['Search']['sitter_pet_info']['doesnt_own_dog'])?$data['Search']['sitter_pet_info']['doesnt_own_dog']:'',
											'id'=>'doesnt_own_dog']);
										?>
										<label class="unbold" for="doesnt_own_dog"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Doesn’t own a dog')); ?></label>
                                      </li>
                                    <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_pet_info.doesnt_own_caged_dog',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'homePet',
											'option'=>["doesnt_own_caged_dog"],
											'value'=>isset($data['Search']['sitter_pet_info']['doesnt_own_caged_dog'])?$data['Search']['sitter_pet_info']['doesnt_own_caged_dog']:'',
											'id'=>'doesnt_own_caged_dog']);
										?>
										<label class="unbold" for="doesnt_own_dog"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Doesn’t own caged pet')); ?></label>
                                    </li>
                                    <li>
                                       <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_pet_info.doesnt_own_cat',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'homePet',
											'option'=>["doesnt_own_cat"],
											'value'=>isset($data['Search']['sitter_pet_info']['doesnt_own_cat'])?$data['Search']['sitter_pet_info']['doesnt_own_cat']:'',
											'id'=>'doesnt_own_cat']);
										?>
										<label class="unbold" for="doesnt_own_cat"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Doesn’t own cat')); ?></label>
									</li>	
                                  </ul>
                                </div>
                              </div>
                              
                               <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                    <li>
                                       <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.housing_condition',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'option'=>["housing_condition"],
											'value'=>isset($data['Search']['sitter_info']['housing_condition'])?$data['Search']['sitter_info']['housing_condition']:'',
											'id'=>'housing_condition']);
										?>
										<label class="unbold" for="housing_condition"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Housing condition')); ?></label>
									</li>	
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo12"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo12" class="in more-drop">
                                  <ul>
                                   <li>
                                       <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.has_house',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'house-condition',
											'option'=>["has_house"],
											'value'=>isset($data['Search']['sitter_info']['has_house'])?$data['Search']['sitter_info']['has_house']:'',
											'id'=>'has_house']);
										?>
										<label class="unbold" for="has_house"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Has house  (excludes apartments)')); ?></label>
									</li>
                                      
                                    <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.outdoor_area_balcony',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'house-condition',
											'option'=>["outdoor_area"],
											'value'=>isset($data['Search']['sitter_info']['outdoor_area_balcony'])?$data['Search']['sitter_info']['outdoor_area_balcony']:'',
											'id'=>'outdoor_area']);
										?>
										<label class="unbold" for="outdoor_area"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Outdoor Play Areas - Balcony')); ?></label>
                                    </li>
                                    
                                     <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.outdoor_area_backyard',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'house-condition',
											'option'=>["outdoor_play_area"],
											'value'=>isset($data['Search']['sitter_info']['outdoor_area_backyard'])?$data['Search']['sitter_info']['outdoor_area_backyard']:'',
											'id'=>'outdoor_play_area']);
										?>
										<label class="unbold" for="outdoor_play_area"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Outdoor Play Areas - Backyard')); ?></label>
                                    </li>
                                    
                                    <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.non_smoker',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'house-condition',
											'option'=>["non_smoker"],
											'value'=>isset($data['Search']['sitter_info']['non_smoker'])?$data['Search']['sitter_info']['non_smoker']:'',
											'id'=>'non_smoker']);
										?>
										<label class="unbold" for="non_smoker"><?php echo $this->requestAction('app/get-translate/'.base64_encode(' Non- smoker home')); ?></label>
                                    </li>
                                    
                                    <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.has_fenced_yard',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'house-condition',
											'option'=>["has_fenced_yard"],
											'value'=>isset($data['Search']['sitter_info']['has_fenced_yard'])?$data['Search']['sitter_info']['has_fenced_yard']:'',
											'id'=>'has_fenced_yard']);
										?>
										<label class="unbold" for="has_fenced_yard"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Has fenced yard')); ?> </label>
                                    </li>
                                    
                                 </ul>
                                </div>
                              </div>
                              <div class="more-sit-info">
                                <div class="msi-head">
                                  <ul>
                                      <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.medical_experience',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'option'=>["medical_experience"],
											'value'=>isset($data['Search']['sitter_info']['medical_experience'])?$data['Search']['sitter_info']['medical_experience']:'',
											'id'=>'medical_experience']);
										?>
										<label class="unbold" for="medical_experience"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Medical Experience')); ?> </label>
                                     </li>
                                  </ul>
                                  <a  data-toggle="collapse" data-target="#demo13"><i class="fa fa-chevron-down" aria-hidden="true"></i></a> </div>
                                <div id="demo13" class="in more-drop">
                                  <ul>
                                   
                                     <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.administer_cpr',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'medical-experience',
											'option'=>["administer_cpr"],
											'value'=>isset($data['Search']['sitter_info']['administer_cpr'])?$data['Search']['sitter_info']['administer_cpr']:'',
											'id'=>'administer_cpr']);
										?>
										<label class="unbold" for="administer_cpr"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Can administer CPR')); ?></label>
                                     </li>
                                     
                                      <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.pet_training_experience',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'medical-experience',
											'option'=>["pet_training_experience"],
											'value'=>isset($data['Search']['sitter_info']['pet_training_experience'])?$data['Search']['sitter_info']['pet_training_experience']:'',
											'id'=>'pet_training_experience']);
										?>
										<label class="unbold" for="pet_training_experience"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Training Experience')); ?></label>
                                     </li>
                                     
                                     <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.administer_injections',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'medical-experience',
											'option'=>["administer_injections"],
											'value'=>isset($data['Search']['sitter_info']['administer_injections'])?$data['Search']['sitter_info']['administer_injections']:'',
											'id'=>'administer_injections']);
										?>
										<label class="unbold" for="administer_injections"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Certified to administer injections')); ?> </label>
                                     </li>
                                  
                                    <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.begavioural_experience',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'medical-experience',
											'option'=>["begavioural_experience"],
											'value'=>isset($data['Search']['sitter_info']['begavioural_experience'])?$data['Search']['sitter_info']['begavioural_experience']:'',
											'id'=>'begavioural_experience']);
										?>
										<label class="unbold" for="begavioural_experience"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Experienced with behavioural problems')); ?> </label>
                                     </li>
                                     
                                      <li>
                                      <!-- Search Field PET COUNT Start-->
										<?php echo $this->Form->input('Search.sitter_info.certified_oral_medication',[
											'label' => false,
											'templates' => ['inputContainer' => '{{content}}'],
											'hiddenField' => false,
											'type'=>'checkbox',
											'class'=>'medical-experience',
											'option'=>["certified_oral_medication"],
											'value'=>isset($data['Search']['sitter_info']['certified_oral_medication'])?$data['Search']['sitter_info']['certified_oral_medication']:'',
											'id'=>'certified_oral_medication']);
										?>
										<label class="unbold" for="certified_oral_medication"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Certified to administer oral medication')); ?>  </label>
                                     </li>

                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-default sitterInfoUncheck" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
                              <button type="button" class="btn btn-success ajaxPopUpSearch" data-dismiss="modal"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Search')); ?></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/Model Popup--> 
                   
                    </div>
                    <!--/info popup--> 
                  </div>
                  <!--collapse button area-->
                  <div class="col-btn-area"> <a data-toggle="collapse" href="#search-col-1" class="col-btn"><i class="fa fa-angle-double-up" aria-hidden="true"></i><b><?php echo $this->requestAction('app/get-translate/'.base64_encode('More Filter')); ?></b> <i class="fa fa-angle-double-up" aria-hidden="true"></i></a> </div>
                  <!--/collapse button area--> 
                </div>
                <!--/collapse content--> 
                
              </div>
            </div>
            
          </div>
          <!--Tab Content area--> 
			<?php // echo $this->Form->submit(); ?>
			<?php echo $this->Form->end(); ?>
        </div>
      </div>
    </div>
  </div>

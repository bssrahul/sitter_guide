 <?= $this->element("adminElements/success_msg"); ?>
<div class="col-lg-10 col-md-9  col-sm-8 col-xs-12  lg-width80">
<div class="container-fluid">
  <div class="row">
  <div class="db-top-bar-header bg-title">

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <h3>
		  <?php $action = $this->request->params['action']; 
   
     $session = $this->request->session();
     $profile = $session->read('profile');?>
     
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> 
        <?php 
        echo  ucfirst($profile)." ". $this->requestAction('app/get-translate/'.base64_encode('Profile'));
       ?>
      </h3>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('You are here')); ?> : 
        </li>
        <li>
          <a href="<?php echo HTTP_ROOT; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Home')); ?> 
          </a>
        </li>
        <li class="active"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile')); ?>
        </li>
      </ol>              
    </div>
  </div>
    </div>
	  </div>
  <div class="row">
	<?php if($profile == 'Sitter'){ ?>
	<div class="col-xs-12 col-sm-6 col-md-12 col-lg-7">
      <div class="row stylish-panel">
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/profile"; ?>'" >
            <h4 class="blue"><?php echo $this->requestAction('app/get-translate/'.base64_encode('General Profile')); ?>
            </h4>
            <!--<div class="gp-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i1.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
				  <?php  
				   if($profile_status['User']['basic_detail'] == 'yes'){ ?>
				 <a href="<?php echo HTTP_ROOT.'dashboard/profile#users-title'; ?>">
				   <li>
					  <span class="check-icon">
					  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Detail')); ?> 
                   </li>
                 </a>  
				 <?php }else{ ?>
					 <a href="<?php echo HTTP_ROOT.'dashboard/profile#users-title'; ?>">
					  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Detail')); ?> 
                      </li>
                      </a>
				<?php } 
				  if($profile_status['User']['contact_detail'] == 'yes'){ ?>
				  
				 <a href="<?php echo HTTP_ROOT.'dashboard/profile#users-country'; ?>">
				  <li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Detail')); ?> 
                  </li></a>
				 <?php }else{ ?>
					  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Detail')); ?> 
                      </li>
				<?php } 
				   if($profile_status['User']['emergency_contact_detail'] == 'yes'){ ?>
				<a href="<?php echo HTTP_ROOT.'dashboard/profile#usersp-re-password'; ?>">
				  <li>
					  <span class="check-icon">
					  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contact Detail')); ?>  
                  </li>
                </a>  
				 <?php }else{ ?>
					 <a href="<?php echo HTTP_ROOT.'dashboard/profile#usersp-re-password'; ?>"> 
					  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contact Detail')); ?>
                      </li>
                     </a> 
				<?php }
				 if($profile_status['User']['media'] == 'yes'){ ?>
				 <a href="<?php echo HTTP_ROOT.'dashboard/profile#users-emergency-who'; ?>">
				  <li>
					  <span class="check-icon">
					  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Media')); ?>  
                  </li>
                 </a> 
				 <?php }else{ ?>
					  <a href="<?php echo HTTP_ROOT.'dashboard/profile#users-emergency-who'; ?>">
					  <li>
						  <span class="cross-icon">
						  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Media')); ?> 
                      </li>
                      </a>
				<?php } ?>
                
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/house"; ?>'" >
            <h4 class="orange"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter House')); ?>
            </h4>
            <!--<div class="sh-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i2.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
				  <?php 
				 if($profile_status['House']['about_property'] == 'yes'){ ?>
			 <a href="<?php echo HTTP_ROOT.'dashboard/house#about-property'; ?>">
                <li>
                  <span class="check-icon">
                  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Property')); ?> 
                </li>
              </a>  
		      <?php }else{ ?>
				<a href="<?php echo HTTP_ROOT.'dashboard/house#about-property'; ?>">  
				   <li>
					  <span class="cross-icon">
					  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Property')); ?> 
                  </li>
                </a>
				 <?php } 
				  if($profile_status['House']['house_description'] == 'yes'){ ?>
			  <a href="<?php echo HTTP_ROOT.'dashboard/house#usersitterhouses-dogs-in-home-no'; ?>">		  
                <li>
                  <span class="check-icon">
                  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?>  
                </li>
              </a>
                <?php }else{?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/house#usersitterhouses-dogs-in-home-no'; ?>">		  	
					 <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?> 
					 </li>
				 </a>	 
				<?php } 
				 if($profile_status['House']['profile_gallery_photo'] == 'yes'){ ?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/house#home_txtarea'; ?>">		 
					<li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?> 
					</li>
				</a>	
                <?php }else{ ?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/house#home_txtarea'; ?>">		
					<li>
					  <span class="cross-icon">
					  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?> 
					</li>
				 </a>	
					<?php } 
				 if($profile_status['House']['pet_in_home'] == 'yes'){ ?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/house#usersitterhouses-breaks-provided-every'; ?>">		 
                  <li>
					  <span class="check-icon">
					  </span>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet in Home')); ?> 
                  </li>
                 </a> 
                <?php }else{ ?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/house#usersitterhouses-breaks-provided-every'; ?>">		
                   <li>
					  <span class="cross-icon">
					  </span>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet in Home')); ?> 
                   </li>
                  </a> 
                <?php } 
				 if($profile_status['House']['smokers'] == 'yes'){ ?>
				<a href="<?php echo HTTP_ROOT.'dashboard/house#usersitterhouses-outdoor-area-size'; ?>">	 
					 <li class="border-none">
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Smokers')); ?>  
					</li>
				 </a>	
					 <?php }else{ ?>
					<a href="<?php echo HTTP_ROOT.'dashboard/house#usersitterhouses-outdoor-area-size'; ?>">	 
						 <li class="border-none">
							  <span class="cross-icon">
							  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Smokers')); ?>  
						 </li>
				   </a>		 
				<?php } ?>	
               
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/about-sitter"; ?>'" >
            <h4 class="green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Sitter')); ?>
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i3.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
				   <?php 
				 if($profile_status['AboutSitter']['sitter_description'] == 'yes'){ ?>
			  <a href="<?php echo HTTP_ROOT.'dashboard/about-sitter#yourself-description'; ?>">			 
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?> 
                </li>
              </a>  
		      <?php }else{ ?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/about-sitter#yourself-description'; ?>">	 
					   <li>
						  <span class="cross-icon">
						  </span>   <?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?>
					  </li>
                 </a> 
				 <?php } 
				  if($profile_status['AboutSitter']['accepted_pet'] == 'yes'){ ?>
			   <a href="<?php echo HTTP_ROOT.'dashboard/about-sitter#client_txtarea'; ?>">	 		  
					<li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Accepted Pet')); ?>
					</li>
               </a>
                <?php }else{?>
				   <a href="<?php echo HTTP_ROOT.'dashboard/about-sitter#client_txtarea'; ?>">		
					 <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Accepted Pet')); ?>
					 </li>
				   </a>	 
				<?php } 
				 if($profile_status['AboutSitter']['preferred_age'] == 'yes'){ ?>
				   <a href="<?php echo HTTP_ROOT.'dashboard/about-sitter#gh_petbreeds'; ?>">		 
					<li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Preferred Age')); ?>
					</li>
				  </a>	
                <?php }else{ ?>
				   <a href="<?php echo HTTP_ROOT.'dashboard/about-sitter#gh_petbreeds'; ?>">			
					<li>
					  <span class="cross-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Preferred Age')); ?>
					</li>
				   </a>	
					<?php } ?>
				 
                
              </ul>
            </div>
          </div>
        </div> 
      </div>
    </div>	
    <div class="col-xs-12 col-sm-6 col-md-12 col-lg-5">
      <div class="row stylish-panel">
        <div class="col-md-4 col-lg-6 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/professional-accreditations"; ?>'" >
            <h4 class="carrot"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Skills & Accriditations')); ?> 
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i4.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                  <?php 
				 if($profile_status['skillsAndAccreditationDetails']['background_check'] == 'yes'){ ?>
			  <a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations#sitter-experience'; ?>">			 
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Background Check')); ?>
                </li>
               </a> 
		      <?php }else{ ?>
				 <a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations#sitter-experience'; ?>">
				   <li>
					  <span class="cross-icon">
					  </span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Background Check')); ?>
                  </li>
                 </a>
				 <?php } 
				  if($profile_status['skillsAndAccreditationDetails']['language'] == 'yes'){ ?>
				   <a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations#sitter-experience'; ?>">		  
						<li>
						  <span class="check-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Language')); ?> 
						</li>
				   </a> 
                <?php }else{?>
					<a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations#sitter-experience'; ?>">
					   <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Language')); ?>
					   </li>
					 </a>
				<?php }
				  if($profile_status['skillsAndAccreditationDetails']['experience'] == 'yes'){ ?>
			   <a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations#sitter-experience'; ?>">		  
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience')); ?>
                </li>
               </a> 
                <?php }else{?>
					<a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations#sitter-experience'; ?>">
						 <li>
							  <span class="cross-icon">
							  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience')); ?>
						 </li>
					</a> 
				<?php } ?>  
              </ul>
            </div>
          </div>
        </div>  
        <div class="col-md-4 col-lg-6 col-sm-12 top-padd20 col-xs-12">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/services-and-rates"; ?>'" >
            <h4 class="pink">  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Services & Rates')); ?>
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i5.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
				   <?php 
				 if($profile_status['servicesAndRates']['terms'] == 'yes'){ ?>
			   <a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#terms'; ?>">		 
                 <li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Terms')); ?>
                 </li>
               </a> 
		      <?php }else{ ?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#terms'; ?>">		
					   <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Terms')); ?>
					  </li>
                  </a>
				 <?php } 
				  if($profile_status['servicesAndRates']['sitter_house_status'] == 'yes'){ ?>
			     <a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-cancellation-policy-status'; ?>">			  
					<li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter House')); ?>
					</li>
				 </a>	
                <?php }else{?>
					<a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-cancellation-policy-status'; ?>">		
					 <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter House')); ?>
					 </li>
					</a> 
				<?php }
				  if($profile_status['servicesAndRates']['guest_house_status'] == 'yes'){ ?>
			<a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-sh-puppy-rate-status'; ?>">				  
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Guest House')); ?>
                </li>
              </a>  
                <?php }else{?>
				<a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-sh-puppy-rate-status'; ?>">	   <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Guest House')); ?>
					 </li>
				 </a>	 
				<?php }  
				if($profile_status['servicesAndRates']['market_place_status'] == 'yes'){ ?>
			 <a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-gh-dv-additional-guest-rate'; ?>">		  <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place')); ?>
                </li>
             </a>   
                <?php }else{?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-gh-dv-additional-guest-rate'; ?>">		
					 <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place')); ?>
					 </li>
				 </a>	 
				<?php } 
			if($profile_status['servicesAndRates']['calender'] == 'yes'){ ?>
			 <a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-mp-ds-holiday-rate'; ?>">		  <li>
						  <span class="check-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Calender')); ?>
                      </li>
             </a>   
                <?php }else{?>
				  <a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates#usersitterservices-mp-ds-holiday-rate'; ?>">	  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Calender')); ?>
					 </li>
				 </a>	 
				<?php } ?> 
              </ul>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <?php }else{ ?>
		<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
      <div class="row stylish-panel">
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/profile"; ?>'" >
            <h4 class="blue"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('General Profile')); ?>
            </h4>
            <!--<div class="gp-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i1.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
				  <?php  
				   if($profile_status['User']['basic_detail'] == 'yes'){ ?>
				  <li>
					  <span class="check-icon">
					  </span>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Detail')); ?>
                  </li>
				 <?php }else{ ?>
					  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Detail')); ?>
                      </li>
				<?php } 
				  if($profile_status['User']['contact_detail'] == 'yes'){ ?>
				  
				  <li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Detail')); ?>
                  </li>
				 <?php }else{ ?>
					  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Detail')); ?>
                      </li>
				<?php } 
				   if($profile_status['User']['emergency_contact_detail'] == 'yes'){ ?>
				  <li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contact Detail')); ?>
                  </li>
				 <?php }else{ ?>
					  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contact Detail')); ?>
                      </li>
				<?php }
				 if($profile_status['User']['media'] == 'yes'){ ?>
				  <li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Media')); ?>
                  </li>
				 <?php }else{ ?>
					  <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Media')); ?>
                      </li>
				<?php } ?>
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/house"; ?>'" >
            <h4 class="orange"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Guest House')); ?>
            </h4>
            <!--<div class="sh-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i2.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
				  <?php 
				 if($profile_status['House']['about_property'] == 'yes'){ ?>
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('About Property')); ?>
                </li>
		      <?php }else{ ?>
				   <li>
					  <span class="cross-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('About Property')); ?>
                  </li>
				 <?php } 
				  if($profile_status['House']['house_description'] == 'yes'){ ?>
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?> 
                </li>
                <?php }else{?>
					 <li>
						  <span class="cross-icon">
						  </span>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?> 
					 </li>
				<?php } 
				 if($profile_status['House']['profile_gallery_photo'] == 'yes'){ ?>
					<li>
					  <span class="check-icon">
					  </span>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?>  
					</li>
                <?php }else{ ?>
					<li>
					  <span class="cross-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?> 
					</li>
					<?php } 
				 if($profile_status['House']['pet_in_home'] == 'yes'){ ?>
                  <li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet in Home')); ?>  
                  </li>
                <?php }else{ ?>
                   <li>
					  <span class="cross-icon">
					  </span>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet in Home')); ?>  
                   </li>
                <?php } 
				 if($profile_status['House']['smokers'] == 'yes'){ ?>
					 <li class="border-none">
					  <span class="check-icon">
					  </span>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Smokers')); ?>  
					</li>
					 <?php }else{ ?>
						 <li class="border-none">
							  <span class="cross-icon">
							  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Smokers')); ?>
						 </li>
				<?php } ?>		 
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/about-guest"; ?>'" >
            <h4 class="green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Guest')); ?>
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i3.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
				   <?php 
				 if($profile_status['UserPets']['guest_basic_detail'] == 'yes'){ ?>
			  <a href="<?php echo HTTP_ROOT.'dashboard/about-guest#basic-details'; ?>">	
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Detail')); ?> 
                </li>
              </a>  
		        <?php }else{ ?>
				 <a href="<?php echo HTTP_ROOT.'dashboard/about-guest#basic-details'; ?>">		
					   <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Detail')); ?> 
					  </li>
                 </a>
				 <?php } 
				 if($profile_status['UserPets']['guest_description'] == 'yes'){ ?>
			    <a href="<?php echo HTTP_ROOT.'dashboard/about-guest#userpets-guest1-guest-breed'; ?>">			 
					 <li>
					  <span class="check-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?> 
					</li>
                </a>
		        <?php }else{ ?>
				 <a href="<?php echo HTTP_ROOT.'dashboard/about-guest#userpets-guest1-guest-breed'; ?>">		
					   <li>
						  <span class="cross-icon">
						  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?> 
					   </li>
                 </a> 
				 <?php } 
				  if($profile_status['UserPets']['guest_photos'] == 'yes'){ ?>
			    <a href="<?php echo HTTP_ROOT.'dashboard/about-guest#userpets-guest1-guest-breed'; ?>">			  
				 <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?>  
                </li>
               </a>
		        <?php }else{ ?>
				<a href="<?php echo HTTP_ROOT.'dashboard/about-guest#userpets-guest1-guest-breed'; ?>">	
				   <li>
					  <span class="cross-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?>  
                  </li>
                </a>  
				 <?php } 
				  if($profile_status['UserPets']['behaviour'] == 'yes'){ ?>
				<a href="<?php echo HTTP_ROOT.'dashboard/about-guest#userpets-guest1-flea-treated-no'; ?>">		   
                <li>
                  <span class="check-icon">
                  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Behaviour')); ?> 
                </li>
                </a>
		        <?php }else{ ?>
				<a href="<?php echo HTTP_ROOT.'dashboard/about-guest#userpets-guest1-flea-treated-no'; ?>">		
				   <li>
					  <span class="cross-icon">
					  </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Behaviour')); ?> 
                  </li>
                </a>  
				 <?php } 
				  ?>
              </ul>
            </div>
          </div>
        </div> 
      </div>
    </div>
		<?php } ?>
  </div>
</div>

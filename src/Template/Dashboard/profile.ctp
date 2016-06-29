<script src='https://www.google.com/recaptcha/api.js'></script>
<?php 
  echo $this->Html->css(['Front/dd.css']); 
  echo $this->Html->script(['Front/jquery.dd.min']);
  echo $this->Html->css(['Front/flags.css']); 
?>
<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" id="content">
        <div class="row">

        <div class="profiletab-section">
        
                <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">
                 <?php  $session = $this->request->session();
				 $profile = $session->read('profile');
			   if($profile == 'sitter'){
				   echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Profile')); 
			   }else{
				    echo $this->requestAction('app/get-translate/'.base64_encode('Guest Profile')); 
			   }  
			  ?>
                  </h3>
               <?php echo $this->element('frontElements/profile/sitter_nav');?>
          
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">


	<div id="home1" class="tab-pane fade in active tab-comm">
            <h2 class="head-font">Tell us a bit about yourself</h2>
			<p class="head-font2 pad-head-foot">Let us step you through setting up your Sitter Guide profile.</p>
			<p class="head-font2 pad-head-foot-bot">This page is just about you in general and allowsyou to update your profile photo's, video, password and contact details</p>
                
                  <!--<form role="form">-->
            <?php echo $this->Form->create(@$userInfo, [
              'url' => ['controller' => 'dashboard', 'action' => 'profile'],
              'role'=>'form',
              'id'=>'generelInfo',
			   'autocomplete'=>'off',
          ]);?>
				<div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                          <label for="title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?></label>
                      <?php 
                      echo $this->Form->input('Users.title',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label'=>false,
                        'options'=>['Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms'],
                        'class' =>'form-control'
                        ]);
                      ?>
                        </div>
                       <div class="form-group col-lg-4 col-md-4">
                           <label for="Users['first_name']"><?php echo $this->requestAction('app/get-translate/'.base64_encode('First Name')); ?></label>
                            <?php 
                                echo $this->Form->input('Users.first_name',[                
                                 'class'=>'form-control',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                          <label for="Users['last_name']"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Name')); ?></label>
                            <?php 
                                echo $this->Form->input('Users.last_name',[                
                                 'class'=>'form-control',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4">
                        <label for="">Email</label>
                          <!--<input type="email" class="form-control" id="">-->
                          <?php 
                                echo $this->Form->input('Users.email',[                
                                 'class'=>'form-control',
                                 'disabled'=>'disabled',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                            <?php if($userInfo['status'] != 1){?>	
                             <a href="javascript:void(0)" id="here_email_verify" style="font-size:12px;color:#72A105">If you din't get an  email then click here</a> 
                             <?php } ?>
                        </div>
                     
                        <div class="col-lg-4 col-md-4">
                          <label for="" class="invisi-no">im-vi </label>
                            <div class="varify-mobile">
								<?php if($userInfo['status'] == 1){?>	
                              <a class="vari" href="#"><img src="<?php echo HTTP_ROOT; ?>img/verify.png"></a>
                              <?php }else{ ?>
                              <a class="unvari" href="#"><img src="<?php echo HTTP_ROOT; ?>img/unverify.png"></a>
                              <?php } ?>
                            </div>
                          </div>
                          <p class="successMessage clr email_success_msg"></p><p class="errorMessage clr email_error_msg"></p>
                        <div class="form-group col-lg-4 col-md-4">
                          <label for="Users['birth_date']"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Date of Birth')); ?></label>
                          <?php  
                              echo $this->Form->input('Users.birth_date',[               
                              'class'=>'form-control dob',
                              'label'=>false,
                              'templates' => ['inputContainer' => '{{content}}'],
                              'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('DD/MM/YYYY')), 
                              ]);
                          ?> 
                        </div>
                    </div>
                    <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Address')); ?>
                      <span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Your address will not be made public. Instead, we use your address to indicate to other members how close they are to you. Example: the proximity map shown on your profile and search results.')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span>
                    </h3>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">

                            <?php 
                                echo $this->Form->input('Users.address',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Address 1')),
                                 'label'=>false,
                                 'type'=>'text',
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.address2',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Address 2')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.city',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('City')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                          </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.zip',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Post / Zip Code')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.state',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('State')),
                                 'label'=>false,
                                 'required'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.country',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Country')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                      </div>
                      
                    </div>
                  <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Details')); ?>
                    </h3>
                    <div class="row">
                    <div class="form-group col-lg-8 col-md-8">
                       <div class="row">
                          <div class="col-lg-3 col-xs-4">
                            <label for="country_code" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Code')); ?></label>
                            <select class='form-control' name="Users[country_code]" id="countries">
								 <?php 
									if(!empty($country_info)){
										foreach($country_info as $cc_key=>$cc_val){
											?>
											<option <?php if($userInfo['country_code']==$cc_key){echo "selected"; }?> value='<?php echo $cc_key; ?>' data-image="<?php echo HTTP_ROOT; ?>img/blank.gif" data-imagecss="flag <?php echo strtolower($cc_val); ?>"><?php echo $cc_key; ?></option>
											<?php
										}
									}
								?>
							</select>    
                         </div>
                         <div class="col-lg-3 col-xs-8">
                              <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Mobile/Cell')); ?><span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('We will send an sms confirmation to this number for verification')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span></label>
                            <?php 
                                echo $this->Form->input('Users.phone',[                
                                 'class'=>'form-control col-lg-10',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                            <?php if($userInfo['mobile_verification'] != 1){?>	
                             <br/><a href="javascript:void(0)" id="num_verify_link" style="font-size:12px;color:#72A105" data-toggle="modal" data-target="#otppopup"> verify you phone</a>   
                            <?php } ?>               
                          </div>
                         
                          <div class="col-lg-6 col-md-6">
                          <label class="invisi-no" for="">im-vi </label>
                            <div class="varify-mobile">
							<?php if($userInfo['mobile_verification'] == 1){?>	
                              <a href="#" class="vari"><img src="<?php echo HTTP_ROOT; ?>img/verify.png"></a>
                              <?php }else{ ?>
                              <a href="#" class="unvari"><img src="<?php echo HTTP_ROOT; ?>img/unverify.png"></a>
                              <?php } ?>
                            </div>
                          </div>


                        </div>
                    </div>
                   
                      <div class="form-group col-lg-4 col-md-4">
                         <label  for="Users[zone_id]"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Time Zone')); ?></label>
                            <?php 
                                echo $this->Form->input('Users.zone_id',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'select',
                                  'label'=>false,
                                  'options'=>$zones_info,
                                  'class' =>'form-control'
                                  ]);
                            ?>
                          </div>
                      
                    </div>
                    <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Password')); ?><span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Alphanumeric & minimum character combination is required')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span></h3>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                           <?php 
                                echo $this->Form->input('Usersp.current_password',[                
                                 'class'=>'form-control',
                                 'type'=>'password',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Cuurent Password')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$error['current_password'][0]).'</em>';
                            ?>
                    </div>
                   
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Usersp.password',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'New Password',
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$error['password'][0]).'</em>';
                            ?>
                      <span class="range-c" id="passwordStatus"></span>
                    </div>

                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Usersp.re_password',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Confirm Password')),
                                 'label'=>false,
                                 'type'=>'password',
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$error['re_password'][0]).'</em>';
                            ?>
                      <!--<span class="pull-right captcha"><img src="<?php echo HTTP_ROOT; ?>img/captcha.jpg"></span>-->

                      <span class="pull-right captcha" >
                        <div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_KEY; ?>"></div>
                        <br/><label generated="true" class="error"><?php echo isset($captchErr)?$captchErr:''; ?></label>
                      </span>
                    
                          </div>
                      
                    </div>
                    <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contacts')); ?> <span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Alphanumeric & minimum character combination is required')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span></h3>
                    <div class="row">
                        <div class="form-group col-lg-4">
                          <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?> </label>
                              <!--<input type="text" placeholder="" id="" class="form-control mzero">-->
                               <?php 
                                echo $this->Form->input('Users.emergency_email',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'label'=>false,
                                  'required'=>false,
                                  'class' =>'form-control'
                                 ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contacts')); ?> </label>
                          <!--<input type="text" placeholder="" id="" class="form-control mzero">-->
                           <?php 
                                echo $this->Form->input('Users.emergency_contacts',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'label'=>false,
                                  'class' =>'form-control mzero'
                                  ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('In emergency, who can speak?')); ?></label>
                          <!--<input type="text" placeholder="" id="" class="form-control mzero">-->
                           <?php 
                                echo $this->Form->input('Users.emergency_who',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'label'=>false,
                                  'class' =>'form-control mzero'
                              ]);
                            ?>
                            
                        </div>
                  </div>
                 <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?></h3>
                
				<!-- ROW ONE START -->	
				<div class="row">

					 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 full-width11">
						   
						   <div class="row d-m2">
							
								 <div class="col-lg-7">
										
										<p class="browse-p"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your profile Photo')); ?></p>
										<p>
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 400x400 pixels.')); ?>
										</p>
							 
										<?php 
											$session = $this->request->session(); 
											$user = $session->read('User');
										?>
								</div>
								
								<div class="col-lg-5">
								
								   <img  class="img-responsive height125"  src="<?php echo HTTP_ROOT.'img/uploads/'.($user['image'] != ''?$user['image']:'prof_photo.png'); ?>" class=" img-responsive" alt="upload-photo">
								   
									<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal21"><i class="fa fa-upload" aria-hidden="true"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Profile Photo')); ?></button>
								</div>

						</div>
					
					</div>
						  
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 full-width11">
					
						<div class="row d-m2">
					
							<div class="col-lg-7">
							
								  <p class="browse-p">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your banner profile photo')); ?>
								  </p>
								  
								  <p  class="min-hh">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 950x250 pixels.')); ?>
									   
								  </p>
							
							</div>

							<div class="col-lg-5">

								<?php 
									if(@$userInfo->profile_banner != ''){
										$pathBanner = HTTP_ROOT.'img/uploads/'.@$userInfo->profile_banner; 
									}else{
										$pathBanner = HTTP_ROOT.'img/img.png'; 
									}
								 ?>
								 
								 <img class="img-responsive height125" id="preview-profile-banner" src="<?php echo @$pathBanner; ?>"><?php echo '<em class="signup_error error clr addBannerError"></em>'; ?>
								
									<button class="btn btn-primary" type="button" id="browseBanner"><i class="fa fa-upload" aria-hidden="true"></i>
										<?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Profile Banner')); ?>
									</button>
							</div>
						
						</div>
					
					</div>

				</div>
				<!-- ROW ONE END -->	
                  
                 
<!-- ROW TWO Start -->	
<div class="row">

	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 full-width11">
		   
		<div class="row d-m2">
				
			<div class="col-lg-7">
                    

                    <p class="browse-p">
                       <?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your profile Video')); ?>
                    </p>
                    <p>
                      <?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended size is 10mb.')); ?>
                    </p>
                    
            </div>
                
			<div class="col-lg-5">
					
				
                      <?php if(@$userInfo->profile_video != ''){
                           $video_path = HTTP_ROOT.'files/video/'.@$userInfo->profile_video; 
                      }else{
                           $video_path = HTTP_ROOT.'files/video/pdm.mp4';
                      }
                      
                     ?>
                    <iframe id="preview-profile-video" src="<?php echo @$video_path; ?>" allowfullscreen>
                    </iframe>
                    <button class="btn btn-primary" type="button" id="browseVideo"><i class="fa fa-upload" aria-hidden="true"></i>
                       <?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Profile Video')); ?>
                          
                    </button>
                   <?php echo '<em class="signup_error error clr addError"></em>'; ?>
			</div>
		
		</div>
	
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 full-width11">
                       
		<div class="row d-m2">
			
			<div class="col-lg-7">
				<p class="browse-p">
					<?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your profile video image')); ?>
				</p>
				
				<p  class="min-hh">
					<?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 950x250 pixels.')); ?>
				</p>
                
                

			</div>
            
            <div class="col-lg-5">
              <span class="videoBanner">&nbsp;</span>
				  <?php if(@$userInfo->profile_video_image != ''){
						  $pathVideoImg = HTTP_ROOT.'img/uploads/'.@$userInfo->profile_video_image; 
					}else{
						 $pathVideoImg = HTTP_ROOT.'img/deta-video.png'; 
					}
				 
					?>
					<img class="img-responsive height125" id="preview-profile-video-image" src="<?php echo @$pathVideoImg; ?>"><?php echo '<em class="signup_error error clr addVideoImgError"></em>'; ?>
					<button class="btn btn-primary" type="button" id="browseVideoImage"><i class="fa fa-upload" aria-hidden="true"></i>
                
					<?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Video Image')); ?>
					
					</button>
			</div>
		</div>
	</div>
</div>
<!-- ROW TWO End --> 
                  <div class="row pull-right sp-tb">
                    <p class="col-lg-12">
                      <input type="submit" class="btn Continue" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?>" >
                      
                    </p>
                  </div>
                  <?php echo $this->Form->end(); ?>

              </div>
             </div>
          </div>
        </div>

        </div>

      </div>

<div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
    <div class="modal-dialog">
       <div class="sitter-quike-view">
         	<div class="sqv-box">
            	<div class="top-close"> 
                <p class="pop-top-pop"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Change Profile Picture')); ?></p>
                	<a data-dismiss="modal" title="Close" href="#"><i aria-hidden="true" class="fa fa-times"></i></a>           
                </div>    
                
                
                <!--Additional Services-->          
                	<div class="additional-services">  
                    	  <div class="modal-body">
                               <?php echo $this->Form->create(null,['id'=>'cropimage','enctype'=>'multipart/form-data','url'=>['controller'=>'dashboard','action'=>'changeAvatar']]); ?>
								<input style="hidden" type="file" name="image" id="image" /> 
								<input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
								<input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
								<input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
								<input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
								<input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
								<input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
								<input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
								<input type="hidden" name="action" value="" id="action" />
								<input type="hidden" name="image_name" value="" id="image_name" />
                    
                    <div id='preview-avatar-profile'>
                    </div>
                <!--<div id="thumbs" style="padding:5px; width:600"></div>-->
              
              <?php echo $this->Form->end(); ?>
            </div>
                 <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Close')); ?></button>
                <button type="button" id="btn-crop" class="btn btn-crop"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Crop Image')); ?></button>
            </div>        
                          
                                           	
                    </div> 
                <!--Additional Services-->           
                
            </div>         	
         </div>  
    </div>
  </div>

    <!--model box -->
  <!--otp popup starts-->
<div class="modal fade" id="otppopup" role="dialog">
  <div class="modal-dialog">
    <div class="sitter-quike-view">
      <div class="sqv-box">
        <div class="top-close">
          <p>Enter OTP</p>
          <a href="#" title="Close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a> </div>
        
        <!--Additional Services-->
        <div>
			<p class="successMessage clr otp_success_msg"></p><p class="errorMessage clr otp_error_msg"></p>
          <p class="reson-pad">To confirm the Mobile/Cell No. Please enter the OTP Sent to your Mobile No.</p><br>

         <div class="row">
         <div class="col-sm-6  col-sm-offset-2">
			           <!-- <input class="form-control" type="text">-->
			         <?php   
			                echo $this->Form->create(null,['id'=>'verify_form',
                               'url'=>['controller'=>'dashboard','action'=>'varification-mobile-number'],
                               ]); 
					   
							echo $this->Form->input('Userverify.otp_verify',[                
							 'class'=>'form-control',
							 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Enter OTP')),
							 'label'=>false,
							 'autocomplete'=>'off',
							 'maxlength'=>6,
							 'type'=>'text',
							 'templates' => ['inputContainer' => '{{content}}']
							  ]);
							 
					 ?>
					 
					 <p class="successMessage clr otp_verify_success_msg"></p><p class="errorMessage clr otp_verify_error_msg"></p>
			  </div>
                  <div class="col-sm-3">  <button id="verify_submit" class="btn btn-success">Submit</button></div>
                  <?php echo $this->Form->end(); ?>
         </div> 
         <br>

         
          <p ><small> * If you didn't received your OTP. Please <a href="javascript:void(0)" id="for_otp_generet" >Click here</a> to resend OTP again</small></p>

        </div>
        <!--Additional Services--> 
        
      </div>
    </div>
  </div>
</div>
<!--otp popup ends
-->  
	
<?php echo $this->Form->create(null,['id'=>'profileVideo','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-video'],
                  'style'=>"visibility: hidden"]); ?>
                <input type="file" name="profile_video" id="profile_video" />
<?php echo $this->Form->end(); ?>
<?php echo $this->Form->create(null,['id'=>'profileBanner','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-banner'],
                  'style'=>"visibility: hidden"]); ?>
                <input type="file" name="profile_banner" id="profile_banner" />
<?php echo $this->Form->end(); ?>
<?php echo $this->Form->create(null,['id'=>'videoImage','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-video-image'],
                  'style'=>"visibility: hidden"]); ?>
                <input type="file" name="profile_video_image" id="profile_video_image" />
<?php echo $this->Form->end(); ?>

      <script>
$(document).ready(function(){
  var host = window.location.host;
  var proto = window.location.protocol;
  var ajax_url = proto+"//"+host+"/<?php echo ROOT_PATH; ?>/"; 

  $('#change_pic').on('click', function(e){ 
      e.preventDefault();
      $('#changePic').show();
        
  });

  $('#image').on('change', function()   
  { 
    $("#preview-avatar-profile").html('');
   $("#preview-avatar-profile").html("<img src='<?php echo HTTP_ROOT."img/search-loader.gif" ?>'>");
    $("#cropimage").ajaxForm(
    {
    target: '#preview-avatar-profile',
    success:    function(data) { 
      //alert(data);
            $('img#photo').imgAreaSelect({
            aspectRatio: '1:1',
            onSelectEnd: getSizes,
        });
        }
    }).submit();
  });
 //call on crop iamge button
  jQuery('#btn-crop').on('click', function(e){
       
      e.preventDefault();
      params = {
              targetUrl: ajax_url,
              action: 'dashboard/save-avatar-tmp',
              x_axis: jQuery('#hdn-x1-axis').val(),
              y_axis : jQuery('#hdn-y1-axis').val(),
              x2_axis: jQuery('#hdn-x2-axis').val(),
              y2_axis : jQuery('#hdn-y2-axis').val(),
              thumb_width : jQuery('#hdn-thumb-width').val(),
              thumb_height:jQuery('#hdn-thumb-height').val()
          };
          saveCropImage(params);
  });


});   
//fucntion for get image cropped co-ordinate
function getSizes(img, obj)
{
    var x_axis = obj.x1;
    var x2_axis = obj.x2;
    var y_axis = obj.y1;
    var y2_axis = obj.y2;
    var thumb_width = obj.width;
    var thumb_height = obj.height;
    if(thumb_width > 0)
        {

            jQuery('#hdn-x1-axis').val(x_axis);
            jQuery('#hdn-y1-axis').val(y_axis);
            jQuery('#hdn-x2-axis').val(x2_axis);
            jQuery('#hdn-y2-axis').val(y2_axis);
            jQuery('#hdn-thumb-width').val(thumb_width);
            jQuery('#hdn-thumb-height').val(thumb_height);
            
        }
    else
        alert("Please select portion..!");
}
//make ajax request to PHP for save image
function saveCropImage(params) {
  //$("#avatar-edit-img").attr('src',ajax_url+'webroot/img/loader.png');
     jQuery.ajax({
        url: params['targetUrl']+params['action'],
        cache: false,
        dataType: "html",
        data: {
        action: params['action'],
            id: jQuery('#hdn-profile-id').val(),
             t: 'ajax',
                                w1:params['thumb_width'],
                                x1:params['x_axis'],
                                h1:params['thumb_height'],
                                y1:params['y_axis'],
                                x2:params['x2_axis'],
                                y2:params['y2_axis']
        },
        type: 'Post',
       success: function (response) {
        //alert(response);
                $('#myModal21').modal('hide');
                location.reload();
                jQuery(".imgareaselect-border1,.imgareaselect-border2,.imgareaselect-border3,.imgareaselect-border4,.imgareaselect-border2,.imgareaselect-outer").css('display', 'none');
                
                jQuery("#avatar-edit-img").attr('src', response);
                jQuery("#preview-avatar-profile").html('');
                jQuery("#image").val();
                //AlertManager.showNotification('Image cropped!', 'Click Save Profile button to save image.', 'success');
        },
        error: function (xhr, ajaxOptions, thrownError){
            alert('status Code:' + xhr.status + 'Error Message :' + thrownError);
        }
    });
    }
    //Verify email
     $(document).on('click','#here_email_verify', function(){
		 //alert("0kook"); 
		 $('.clr').html('');
	    jQuery.ajax({
			    url: ajax_url+"guests/verify-email",
				 beforeSend: function(){
						$(".otp_verify_msg").attr('src',ajax_url+'img/search-loader.gif');
				  },
				success: function (res) {
					var response = res.split(':');
						  if($.trim(response[0]) == 'Success'){
							  $('.clr').html(''); //Emtpy Error MESSAGE
							  $(".email_success_msg").html('<div class="success_msg navbar navbar-custom" role="navigation"><div class="drawer-navbar" role="banner"><div class="response_msg_container drawer-container"><span><i class="fa fa-check-square"></i>'+response[1]+'</span></div></div></div>')
						  }else  if($.trim(response[0]) == 'Error'){
							$('.clr').html(''); //Emtpy Error MESSAGE
							$(".email_error_msg").html('<div class="error_msg navbar navbar-custom" role="navigation"><div class="drawer-navbar" role="banner"><div class="response_msg_container drawer-container"><span><i class="fa fa-check-square"></i>'+response[1]+'</span></div></div></div>')
						   }
				}
      });
	});
	$(document).on('click','#num_verify_link', function(){
		  $('.clr').html('');
	});
    //For otp verify
    $(document).on('click','#for_otp_generet', function(){ 
		 $('.clr').html('');
	    jQuery.ajax({
			    url: ajax_url+"dashboard/varification-mobile-number",
				 beforeSend: function(){
						$(".otp_verify_msg").attr('src',ajax_url+'img/search-loader.gif');
				  },
				success: function (res) {
					var response = res.split(':');
						  if($.trim(response[0]) == 'Success'){
							  $('.clr').html(''); //Emtpy Error MESSAGE
							  $(".otp_success_msg").html(response[1]);
						  }else  if($.trim(response[0]) == 'Error'){
							$('.clr').html(''); //Emtpy Error MESSAGE
							$(".otp_error_msg").html(response[1]);
						   }
				}
      });
	});
	$(document).on('click','#verify_submit', function(){ 
	 $('.clr').html('');
	 $("#verify_form").ajaxForm(
     {
	  beforeSend: function(){
	       $(".otp_verify_msg").attr('src',ajax_url+'img/search-loader.gif');
	  },
     success: function(res){ 
		//alert(res);
		//console.log(res);
        var response = res.split(':');
             //alert(res);
              if($.trim(response[0]) == 'Success'){
				  $('.clr').html(''); //Emtpy Error MESSAGE
                  $(".otp_verify_success_msg").html(response[1]);
                 setTimeout(function(){window.location.href = ajax_url+"dashboard/profile";},1000);
              }else  if($.trim(response[0]) == 'Error'){
				$('.clr').html(''); //Emtpy Error MESSAGE
                $(".otp_verify_error_msg").html(response[1]);
               }
	    }
     }).submit();
    });
    //End
/*For profile video*/

$(document).ready(function(){
	
	
    $("#browseVideo").on('click',function(){
        $("#profile_video").trigger("click");    
        });

  $(document).on('change','#profile_video', function(){ 
	  
    var video_size = Math.ceil(this.files[0].size/1024/1024);
    if(video_size > 10){
	    $('.clr').html(''); //Emtpy Error MESSAGE
		$("#preview-profile-video").attr('src',"<?php echo $video_path; ?>");
		$('.addError').html("File size should be less than 10MB"); //DISPLAY SUCCESS MESSAGE
		
		return false;
	}else{
	   $('.clr').html('');
	}
    $("#profileVideo").ajaxForm(
    {
	  beforeSend: function(){
	  $("#preview-profile-video").attr('src',ajax_url+'img/search-loader.gif');
	},
  /* uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
      //  bar.width(percentVal)
        //percent.html(percentVal);
       // $("#preview-profile-video").contents().html("<html><body><div> Loading...("+percentVal+") </div></body></html>");
        console.log(percentVal);
    },*/
	/*complete: function(){
	  $(".videoBanner").hide();
	  $(".videoBanner").html('');
	},	*/
    //target: '#preview-profile-video',
    success: function(res){ 
		//alert(res);
		//console.log(res);
        var response = res.split('::');
              if($.trim(response[0]) == 'Success'){
                  $("#preview-profile-video").attr('src',response[1]);
              }else  if($.trim(response[0]) == 'Error'){
                $('.clr').html(''); //Emtpy Error MESSAGE
                $("#preview-profile-video").attr('src',"<?php echo $video_path; ?>");
                $('.addError').html(response[1]); //DISPLAY SUCCESS MESSAGE
                
              }
	 }
      
       
    }).submit();
  });
  /*End profile video*/
  /*Start profile banner*/
  $("#browseBanner").on('click',function(){


         $("#profile_banner").trigger("click");    
  });

  $(document).on('change','#profile_banner', function(){ 
    $("#profileBanner").ajaxForm(
    {
      beforeSend: function(){
		  $("#preview-profile-banner").attr('src',ajax_url+'img/search-loader.gif');
		},
	success: function(res) { 
          var response = res.split('::');
              if($.trim(response[0]) == 'Success'){
                  $('.clr').html(''); //Emtpy Error MESSAGE
                  $("#preview-profile-banner").attr('src',response[1]);
              }
              if($.trim(response[0]) == 'Error'){
                
                $('.clr').html(''); //Emtpy Error MESSAGE
                $('.addBannerError').html(response[1]); //DISPLAY SUCCESS MESSAGE
                $("#preview-profile-banner").attr('src','<?php echo @$pathBanner; ?>');
              }
            }
      
       
    }).submit();
  });
  /*Start profile video image*/
  $("#browseVideoImage").on('click',function(){
    $("#profile_video_image").trigger("click");    
        });

  $(document).on('change','#profile_video_image', function(){ 
        $("#videoImage").ajaxForm(
    {
    //target: '#preview-profile-video',
      beforeSend: function(){
      $("#preview-profile-video-image").attr('src',ajax_url+'img/search-loader.gif');
    },
    success: function(res) { 
             var response = res.split('::');
              if($.trim(response[0]) == 'Success'){
                  $('.clr').html(''); //Emtpy Error MESSAGE
                  $("#preview-profile-video-image").attr('src',response[1]);
              }
              if($.trim(response[0]) == 'Error'){
                $('.clr').html(''); //Emtpy Error MESSAGE
                $('.addVideoImgError').html(response[1]); //DISPLAY SUCCESS MESSAGE
                $("#preview-profile-video-image").attr('src','<?php echo @$pathVideoImg; ?>');
              }
            }
      
       
    }).submit();
  });
});
  $(document).ready(function(){
    /*For datepicker*/ 
    $("#users-birth-date").datepicker(
           {
         changeMonth: true,
         changeYear: true,
         maxDate: new Date(),
         yearRange: "-50:-18",
			dateFormat: 'dd-mm-yy',
			defaultDate: '01-01-1998'

       }
      );
    $("#users-birth-date").click(function(){ 
      $("#users-birth-date").focus();
    });
   /*End date picker*/
 });

	$(document).ready(function() {
		$("#countries").msDropdown();
	})
</script>

<style>
.videoBanner {
    display: block;
    float: left !important;
    height: 20px !important;
    margin: 0 0 0 22px;
    opacity: 0.5;
    position: relative;
    top: 25px;
    width: 93% !important;
    z-index: 10035;
	text-align:center;
}
.padT5{
padding-top:15px !important;	
}
.height125{height:125px !important;width:100% !important;}
</style>

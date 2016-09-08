<link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/Front/tokenfield-typeahead.min.css"/>
<link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/Front/bootstrap-tokenfield.min.css"/>
<script src="<?php echo HTTP_ROOT; ?>js/Front/bootstrap-tokenfield.js"></script>
<?php echo $this->Html->css('Front/dist/jquery.onoff.css');
      echo $this->Html->script(['Front/dist/jquery.onoff.js']);
 ?>
<script>
	$(document).ready(function(){
		//For multiple language
		$('#userprofessionalsdetails-languages').tokenfield({
				  autocomplete: {
				  source: <?php echo json_encode($all_languages); ?>,
				  delay: 100
				},
				  showAutocompleteOnFocus: true,

				});
				$('#userprofessionalsdetails-languages').on('tokenfield:createtoken', function (event){
				  var existingTokens = $(this).tokenfield('getTokens');
				  $.each(existingTokens, function(index, token) {
					  if (token.value === event.attrs.value)
						  event.preventDefault();
				 });
				});
	});
</script>
   <div class="col-md-9 col-lg-10 col-sm-8 lg-width80" id="content">
		<div class="row">
        	<div class="container-fluid">
				<div class="profiletab-section">
            	<div class="db-top-bar-header bg-title">
             	<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                <h3>
					<img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">
					<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Profile')); ?>
				</h3>
                </div>
                </div>
				<?php echo $this->element('frontElements/profile/sitter_nav');?>
				<div class="tab-sectioninner book-pro">
					<div class="tab-content">
                    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<div id="menu3" class="tab-pane fade tab-comm active in">
							
							<div class="tc-head tc-head-5">
								<h2 id="sitter-experience">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Update us on your Skill and Accreditations')); ?>
								</h2>
								<p>
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('We will give you individual badges which increase your search results ranking for each of these updates')); ?>
								</p> 
								</div>
                            <?php echo $this->Form->create(null, [
								'url' => ['controller' => 'dashboard', 'action' => 'professional-accreditations'],
								'role'=>'form',
								'id'=>'skillsAccreditations',
								'autocomplete'=>'off',
							]);?>
                            <!----NEW CHANGES ASK BY CLIENT START -->
							<div class="row">
                    			<div class="col-lg-4" >
									<label for="">
										<?php echo $this->requestAction('app/get-translate/'.base64_encode('Years of Sitting Experience')); ?> 
									</label>
                                     <?php echo $this->Form->input('UserProfessionalsDetails.experience',[
										'templates' => ['inputContainer' => '{{content}}'],
										'label' => false,
										'type'=>'select',
										'options'=>['0'=>'0','1'=>'1 year','2'=>'2 years','3'=>'3 years','4'=>'4 years','5'=>'5 years','5+'=>'5 years +'],
										'class'=>'form-control',
										'value'=>@$professional['user_professional_accreditations_details']->experience !=''?@$professional['user_professional_accreditations_details']->experience:'']);
									  ?>
								</div>
                    
								<div class="col-lg-4">
									<label for="">
										<?php echo $this->requestAction('app/get-translate/'.base64_encode('Languages')); ?>
									</label>
								      <?php  
								           if(!empty($professional['user_professional_accreditations_details']->languages)){
										   
										   $selected_languages=array();
												$selected_languages = explode(",",trim($professional['user_professional_accreditations_details']->languages)); 
												$selected_lang =array();
												foreach($all_languages as $key=> $arr)
												{ 
													$value=$arr['value'];
													$label=$arr['label'];
													if(in_array($value,$selected_languages) )
													{
														$selected_lang[]=array("value"=>$value,"label"=>$label);
													}
												}
												  $selected_lang =json_encode($selected_lang);	
											?>
                                          <script>
											$(document).ready(function() {
                                                    $('#userprofessionalsdetails-languages').tokenfield('setTokens',<?php echo $selected_lang; ?>);
											});
										 </script>
										 <?php } ?>
										    <input class="form-control required" id="userprofessionalsdetails-languages" type="text" name="UserProfessionalsDetails[languages]" value="" >
              
								    <!--<?php echo $this->Form->input('UserProfessionalsDetails.languages',[
											'templates' => ['inputContainer' => '{{content}}'],
											'label' => false,
											'type'=>'select',
											'options'=>['en'=>'English','fr'=>'French','de'=>'German','hu'=>'Hungarian','it'=>'Italian','ro'=>'Romanian','ru'=>'Russian','es'=>'spanish'],
											'class'=>'form-control',
											'value'=>@$professional['user_professional_accreditations_details']->languages !=''?@$professional['user_professional_accreditations_details']->languages:'']);
									?>-->
								</div>
                    
							</div>
							<!----NEW CHANGES ASK BY CLIENT END -->
							<h3></h3>
							<!--<div class="row">
								
								<div class="form-group col-lg-4">
									<h6><strong class="f17">Drivers Licence<small> (Your photo ID will not be displayed on your profile)</small></strong></h6>
									 
									 <span><a href="#" data-toggle="tooltip" data-placement="right" title="Your photo ID will not be displayed on your profile."><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span>
									 
									<div class="brow-inner">
										<?php echo $this->Form->input('UserProfessionals.govt.licence.scanned_certification',[
										'class'=>'form-control',
										'templates' => ['inputContainer' => '{{content}}'],
										'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Government Proof')),
										'readonly'=>true,
										'label'=>false,
										'value'=>@$professional['UserProfessionals']['govt']['licence']['scanned_certification'] !=''?@$professional['UserProfessionals']['govt']['licence']['scanned_certification']:''
										]); ?>
										<button class="uploaddoc btn btn-secondary" type="button">Browse</button>
									</div>
								
								</div>
								
								<div class="form-group col-lg-4">
									<h6><strong class="f17">Police Background Check</strong><small> (Government Issued Police Check) </small></h6>
									
									<span><a href="#" data-toggle="tooltip" data-placement="right" title="Your photo ID will not be displayed on your profile."><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span>
									
									<div class="brow-inner">
										<?php echo $this->Form->input('UserProfessionals.check.govt.scanned_certification',[
											 'class'=>'form-control',
											 'templates' => ['inputContainer' => '{{content}}'],
											 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Government Proof')),
											 'readonly'=>true,
											 'label'=>false,
											  'value'=>@$professional['UserProfessionals']['check']['govt']['scanned_certification'] !=''?@$professional['UserProfessionals']['check']['govt']['scanned_certification']:''
										]); ?>
										<button type="button" class="uploaddoc btn btn-secondary">Browse</button>
									</div>
								
								</div>
								
								
							</div>-->
				<div class="row">
                    <div class="form-group col-lg-4">
                    <div class="mb10">
                    <strong class="f17"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Drivers Licence')); ?></strong><small class="color-green-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('( Your Photo ID will not be displayed on your profile )')); ?>  </small><span><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title=<?php echo $this->requestAction('app/get-translate/'.base64_encode('This will appear at the top of your profile page and on search results')); ?>><img src="<?php echo HTTP_ROOT; ?>img/close.png" class="close11"></a></span></div>
                   
                    <div class="brow-inner">
                        <?php echo $this->Form->input('UserProfessionals.govt.licence.scanned_certification',[
										'class'=>'form-control',
										'templates' => ['inputContainer' => '{{content}}'],
										'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Government Proof')),
										'readonly'=>true,
										'label'=>false,
										'value'=>@$professional['UserProfessionals']['govt']['licence']['scanned_certification'] !=''?@$professional['UserProfessionals']['govt']['licence']['scanned_certification']:''
					    ]); ?>
					    <button class="uploaddoc btn btn-secondary" type="button"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Browse')); ?></button>
                        <label class="error" for="userprofessionals-govt-licence-scanned-certification" generated="true"></label>                          


                      </div>
                    </div>
                    
                    
                    <div class="form-group col-lg-4">
                    <div class="mb10"> <strong class="f17"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Police Background Check')); ?></strong><small class="color-green-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('( Government Issued Police Check )')); ?>  </small><span><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title=<?php echo $this->requestAction('app/get-translate/'.base64_encode('This will appear at the top of your profile page and on search results')); ?>><img src="<?php echo HTTP_ROOT; ?>img/close.png" class="close11"></a></span></div>
                   
                    <div class="brow-inner ">
                      <!--<input type="text" class="form-control" id="" placeholder="Upload Government Proof">
                      <button class="btn btn-secondary" type="button">Browse</button>-->
                      <div class="brow-inner">
								<?php echo $this->Form->input('UserProfessionals.check.govt.scanned_certification',[
									 'class'=>'form-control',
									 'templates' => ['inputContainer' => '{{content}}'],
									 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Government Proof')),
									 'readonly'=>true,
									 'label'=>false,
									  'value'=>@$professional['UserProfessionals']['check']['govt']['scanned_certification'] !=''?@$professional['UserProfessionals']['check']['govt']['scanned_certification']:''
								]); ?>
								<button type="button" class="uploaddoc btn btn-secondary"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Browse')); ?></button>
                      </div>
                    </div>
                </div>
						<div class="col-xs-12">	<h3><strong><?php echo $this->requestAction('app/get-translate/'.base64_encode('Physician (Pets)')); ?></strong><small> <?php echo $this->requestAction('app/get-translate/'.base64_encode(' (Certificate/Degree)')); ?>  </small></h3></div>
							<div class="">
								<div class="form-group col-lg-4">
									<?php echo $this->Form->input('UserProfessionals.pets.private.qualification_title',[
									'class'=>'form-control',
									'templates' => ['inputContainer' => '{{content}}'],
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Issuing Institution')),
									'label'=>false,
									'value'=>@$professional['UserProfessionals']['pets']['private']['qualification_title'] !=''?@$professional['UserProfessionals']['pets']['private']['qualification_title']:''
									]); ?>

								</div>
								<div class="form-group col-lg-4">
									<?php echo $this->Form->input('UserProfessionals.pets.private.qualification_date',[
											   'class'=>'form-control addDateCalendar',
											   'templates' => ['inputContainer' => '{{content}}'],
											   'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Date Issued')),
											   'type' => 'text',
											   'label'=>false,
											   'readonly'=>true,
												'value'=>@$professional['UserProfessionals']['pets']['private']['qualification_date'] !=''?date("Y-m-d",strtotime(@$professional['UserProfessionals']['pets']['private']['qualification_date'])):''
									]); ?>
								</div>
								<div class="form-group col-lg-4">
								  <?php echo $this->Form->input('UserProfessionals.pets.private.expiry_date',[
										 'class'=>'form-control addDateCalendar',
										 'type' => 'text',
										 'templates' => ['inputContainer' => '{{content}}'],
										 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
											'label'=>false,
											'readonly'=>true,
											 'value'=>@$professional['UserProfessionals']['pets']['private']['expiry_date'] !=''?date("Y-m-d",strtotime(@$professional['UserProfessionals']['pets']['private']['expiry_date'])):''
								  ]); ?>
								</div>
							</div>

							<div class="">
								<div class="form-group col-lg-4">
									<div class="brow-inner">
									  <?php echo $this->Form->input('UserProfessionals.pets.private.scanned_certification',[
											 'class'=>'form-control',
											 'templates' => ['inputContainer' => '{{content}}'],
											 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Scanned Certificate')),
											 'readonly'=>true,
											 'label'=>false,
												 'value'=>@$professional['UserProfessionals']['pets']['private']['scanned_certification'] !=''?@$professional['UserProfessionals']['pets']['private']['scanned_certification']:''
									  ]); ?>
										<button type="button" class="uploaddoc btn btn-secondary"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Browse')); ?></button>
									</div>
								</div>
							</div>

							<div class="col-xs-12"><h3><strong><?php echo $this->requestAction('app/get-translate/'.base64_encode('Physician (People)')); ?></strong><small><?php echo $this->requestAction('app/get-translate/'.base64_encode('(Certificate/Degree)')); ?>    </small></h3> </div>
						
							<div class="">
								<div class="form-group col-lg-4">
									<?php echo $this->Form->input('UserProfessionals.people.private.qualification_title',[
										 'class'=>'form-control',
										 'templates' => ['inputContainer' => '{{content}}'],
										 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
										 'label'=>false,
										 'value'=>@$professional['UserProfessionals']['people']['private']['qualification_title'] !=''?@$professional['UserProfessionals']['people']['private']['qualification_title']:''
									]); ?>
								</div>
								<div class="form-group col-lg-4">
									<?php echo $this->Form->input('UserProfessionals.people.private.qualification_date',[
										   'class'=>'form-control addDateCalendar',
										   'templates' => ['inputContainer' => '{{content}}'],
										   'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduadation Date')),
										   'type' => 'text',
										   'readonly'=>true,
										  'label'=>false,
										 'value'=>@$professional['UserProfessionals']['people']['private']['qualification_date'] !=''?date("Y-m-d",strtotime(@$professional['UserProfessionals']['people']['private']['qualification_date'])):''
								]); ?>
							</div>
							<div class="form-group col-lg-4">
							  <?php echo $this->Form->input('UserProfessionals.people.private.expiry_date',[
									 'class'=>'form-control addDateCalendar',
									 'type' => 'text',
									 'templates' => ['inputContainer' => '{{content}}'],
									 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
									 'label'=>false,
									 'readonly'=>true,
										 'value'=>@$professional['UserProfessionals']['people']['private']['expiry_date'] !=''?date("Y-m-d",strtotime(@$professional['UserProfessionals']['people']['private']['expiry_date'])):''
							  ]); ?>
							</div>
						  </div>

						  <div class="">
							<div class="form-group col-lg-4">
							<div class="brow-inner">
							 <?php echo $this->Form->input('UserProfessionals.people.private.scanned_certification',[
									 'class'=>'form-control',
									 'templates' => ['inputContainer' => '{{content}}'],
									 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Scanned Certificate')),
									 'readonly'=>true,
									'label'=>false,
										 'value'=>@$professional['UserProfessionals']['people']['private']['scanned_certification'] !=''?@$professional['UserProfessionals']['people']['private']['scanned_certification']:''
							  ]); ?>
							  <button type="button" class="uploaddoc btn btn-secondary"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Browse')); ?></button>
							  </div>
							</div>
						</div>
						
							<!--<h3><strong>Other Qualifications & Specific Skills</strong><small>(Certificate/Degree)</small><span id="addMore" class="pull-right add-more-n"><i class="fa fa-plus-circle"></i> Add More</span></h3>-->
							
							
							
							
							
					    <div class="">
                          <div class="form-group col-lg-4">
                            <div class="brow-inner pull-left">
                               <span id="addMore" class="pull-right add-more-n"> <i class="fa fa-plus-circle"></i>
                              <?php echo $this->requestAction('app/get-translate/'.base64_encode('Add More')); ?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12"><h3></h3></div>
					
					<?php 
					//CONDITION FOR 
					if(!empty($professional['UserProfessionals']['other'])){ ?>
							<?php $o=1; 
							foreach($professional['UserProfessionals']['other'] as $otherValue){ ?>
								<div class="clearfix"></div>
								  <div id="ajaxAdd<?php echo $o; ?>" class="ajaxAdd">
                    
										<div class="form-group col-lg-4">
										   <?php echo $this->Form->input('qualification_title[]',[
													 'class'=>'form-control',
													 'templates' => ['inputContainer' => '{{content}}'],
													 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
													 'label'=>false,
													 'value'=>@$otherValue['other']['qualification_title'] !=''?@$otherValue['other']['qualification_title']:''
										  ]); ?>
										</div>
										
										<div class="form-group col-lg-4">
										  <?php echo $this->Form->input('qualification_date[]',[
													   'class'=>'form-control addDateCalendar',
													   'type' => 'text',
													   'id' => "start_date_picker_".$o,
													   'templates' => ['inputContainer' => '{{content}}'],
													   'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduadation Date')),
													  'label'=>false,
													  'readonly'=>true,
													 'value'=>@$otherValue['other']['qualification_date'] !=''?date("Y-m-d",strtotime(@$otherValue['other']['qualification_date'])):''
										  ]); ?>

										</div>
										
										<div class="form-group col-lg-4" >
										  <?php echo $this->Form->input('expiry_date[]',[
												 'class'=>'form-control addDateCalendar',
												 'type' => 'text',
												 'id' => "end_date_picker_".$o,
												 'templates' => ['inputContainer' => '{{content}}'],
												 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
												'label'=>false,
												'readonly'=>true,
												 'value'=>@$otherValue['other']['expiry_date'] !=''?date("Y-m-d",strtotime(@$otherValue['other']['expiry_date'])):''
										  ]); ?>

										</div>
								 

									  <div class="" >
										<div class="form-group col-lg-4">
											<div class="brow-inner input-mleft0">
												<?php echo $this->Form->input('scanned_certification[]',[
													 'class'=>'form-control',
													 'id'=>'scanned_certification_'.$o,
													 'templates' => ['inputContainer' => '{{content}}'],
													 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Scanned Certificate')),
													 'readonly'=>true,
													 'label'=>false,
														 'value'=>@$otherValue['other']['scanned_certification'] !=''?@$otherValue['other']['scanned_certification']:''
											  ]); ?>
											  <button type="button" class="uploaddoc btn btn-secondary"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Browse')); ?></button>
											</div>
										</div>
									</div>
									
								</div>
							<?php $o++;	
							} //END FOREACH LOOP FOR DISPLAY MULTIPLE OTHER FIELD WHEN USER SELECT MULTIPLE FROM ADD OTHER ?>
				<?php }else{ ?>
					    <div class="clearfix"></div>
						<div id="ajaxAdd1"  class="ajaxAdd">
							
                    
							<div class="form-group col-lg-4">
							   <?php echo $this->Form->input('qualification_title[]',[
										 'class'=>'form-control',
										 'templates' => ['inputContainer' => '{{content}}'],
										 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
										 'label'=>false
							  ]); ?>
							</div>
							<div class="form-group col-lg-4">
							  <?php echo $this->Form->input('qualification_date[]',[
										   'class'=>'form-control addDateCalendar',
										   'type' => 'text',
										   'templates' => ['inputContainer' => '{{content}}'],
										   'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduadation Date')),
										   'readonly'=>true,
										  'label'=>false
							  ]); ?>

							</div>
							<div class="form-group col-lg-4" >
							  <?php echo $this->Form->input('expiry_date[]',[
									 'class'=>'form-control addDateCalendar',
									 'type' => 'text',
									 'templates' => ['inputContainer' => '{{content}}'],
									 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
									 'readonly'=>true,
									'label'=>false
							  ]); ?>

							</div>
                             <div class="clearfix"></div>

							<div class="" >
								<div class="form-group col-lg-4">
									<div class="brow-inner input-mleft0">
										<?php echo $this->Form->input('scanned_certification[]',[
											 'class'=>'form-control',
											 'id'=>'scanned_certification_1',
											 'templates' => ['inputContainer' => '{{content}}'],
											 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Upload Scanned Certificate')),
											 'readonly'=>true,
											 'label'=>false
									  ]); ?>
									  <button type="button" class="uploaddoc btn btn-secondary"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Browse')); ?></button>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					<?php } //END IF CONDITION FOR OTHER FIELDS ?>
                  
                 <div class=col-xs-12> <h3 id="addAfter"></h3></div>

                  <!--<div class="row">
                    
						<div class="col-lg-4">
						  <label for="">Do you know CPR for </label>
						  
						  <?php echo $this->Form->input('UserProfessionalsDetails.cpr_for',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'select',
							'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
							'class'=>'form-control',
							'value'=>@$professional['user_professional_accreditations_details']->cpr_for !=''?@$professional['user_professional_accreditations_details']->cpr_for:'']);
						  ?>
						</div>

						<div class="col-lg-4">
						   <label for="">I can administer Oral Medications</label>
						  
						  <?php echo $this->Form->input('UserProfessionalsDetails.oral_madications',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'select',
							'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
							'class'=>'form-control',
							'value'=>@$professional['user_professional_accreditations_details']->oral_madications !=''?@$professional['user_professional_accreditations_details']->oral_madications:'']);
						  ?>
						</div>
						
					 <div class="col-lg-4">
						 <label for="">I can administer Injected Medications</label>
						  
						  <?php echo $this->Form->input('UserProfessionalsDetails.injected_madications',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'select',
							'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
							'class'=>'form-control',
							'value'=>@$professional['user_professional_accreditations_details']->injected_madications !=''?@$professional['user_professional_accreditations_details']->injected_madications:'']);
						  ?>
						</div>
                    </div>-->

                    <!--<div class="row">
                   
                   
                    <div class="col-lg-4">
                       <label for="">Experience with Behavioural Problems</label>
                         
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_behavioural_problems',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>@$professional['user_professional_accreditations_details']->ex_behavioural_problems !=''?@$professional['user_professional_accreditations_details']->ex_behavioural_problems:'']);
                      ?>
                    </div>
                           

                
                    
                    <div class="col-lg-4">
                         <label for="">Experience with Rescue Pets  </label>
                          
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_rescue_pets',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>@$professional['user_professional_accreditations_details']->ex_rescue_pets !=''?@$professional['user_professional_accreditations_details']->ex_rescue_pets:'']);
                      ?>
                    </div>
                   
					<div class="col-lg-4">
                     <label for="">Familiar with Pet Training Techniques</label>
                          
                      <?php echo $this->Form->input('UserProfessionalsDetails.training_techniques',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>@$professional['user_professional_accreditations_details']->training_techniques !=''?@$professional['user_professional_accreditations_details']->training_techniques:'']);
                      ?>

                    </div>
                    

                    </div>-->
                    <div class="clearfix"></div>
                    <div class="">
	                    <div class="col-lg-4">
	                       <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Do you know CPR for')); ?>  </label>
	                          <?php echo $this->Form->input('UserProfessionalsDetails.cpr_for',[
								'templates' => ['inputContainer' => '{{content}}'],
								'label' => false,
								'type'=>'select',
								'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
								'class'=>'form-control',
								'value'=>@$professional['user_professional_accreditations_details']->cpr_for !=''?@$professional['user_professional_accreditations_details']->cpr_for:'']);
							?>
	                      
	                    </div>

	                    <div class="col-lg-4  la1">
							
							<div class="row">
								<div class="col-lg-7 col-md-7 col-xs-7 ">  
								<label  for="">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('I can administer Oral Medications')); ?>
								</label>
								</div>
	                        
								<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
									<div class="chek-main-lat">
									 <?php
										 
									  if(@$professional['user_professional_accreditations_details']->oral_madications ==1){
										 $checked = 'checked';
									  }else{
										 $checked = '';
									  }
									   echo $this->Form->input('UserProfessionalsDetails.oral_madications',[
											 'templates' => ['inputContainer' => '{{content}}'],
											 'type'=>'checkbox',
											 'label' =>false,
											 'checked' =>$checked,
											 'class'=>'selectedCheckbox',
											 'hiddenField' => false
											 ]);
									  ?>
									</div>
								</div>
	                  
							</div>
	                    </div>
                        <div class="col-lg-4  la1">
							
							<div class="row">
								<div class="col-lg-7 col-md-7 col-xs-7 ">  
								<label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('I can administer Injected Medications')); ?></label>
	                       </div>
	                          <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
	                        <div class="chek-main-lat">
	                         <?php
	                              if(@$professional['user_professional_accreditations_details']->injected_madications ==1){
	                                 $checked = 'checked';
	                              }else{
	                                 $checked = '';
	                              }
	                               echo $this->Form->input('UserProfessionalsDetails.injected_madications',[
										 'templates' => ['inputContainer' => '{{content}}'],
		                                 'type'=>'checkbox',
		                                 'label' =>false,
		                                 'checked' =>$checked,
		                                 'class'=>'selectedCheckbox',
		                                 'hiddenField' => false
		                                 ]);
						      ?>
	                     </div>
	                        </div> </div>
	                    </div>
                    </div>
                    <div class="">
                        <div class="col-lg-4 mt10">
	                          <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience with Behavioural Problems')); ?></label>
	                          <?php echo $this->Form->input('UserProfessionalsDetails.ex_behavioural_problems',[
			                        'templates' => ['inputContainer' => '{{content}}'],
			                        'label' => false,
			                        'type'=>'select',
			                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
			                        'class'=>'form-control',
			                        'value'=>@$professional['user_professional_accreditations_details']->ex_behavioural_problems !=''?@$professional['user_professional_accreditations_details']->ex_behavioural_problems:'']);
                              ?>
	                    </div>
	                    <div class="col-lg-4 mt10">
	                         <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience with Rescue Pets')); ?>  </label>
	                         <?php echo $this->Form->input('UserProfessionalsDetails.ex_rescue_pets',[
		                        'templates' => ['inputContainer' => '{{content}}'],
		                        'label' => false,
		                        'type'=>'select',
		                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','other'=>'Other (specify)'],
		                        'class'=>'form-control',
		                        'value'=>@$professional['user_professional_accreditations_details']->ex_rescue_pets !=''?@$professional['user_professional_accreditations_details']->ex_rescue_pets:'']);
                            ?>

	                    </div>
	                    <div class="form-group col-lg-4 mt10">
	                     <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Familiar with Pet Training Techniques')); ?></label>
	                        <?php echo $this->Form->input('UserProfessionalsDetails.training_techniques',[
			                        'templates' => ['inputContainer' => '{{content}}'],
			                        'label' => false,
			                        'type'=>'select',
			                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','other'=>'Other (specify)'],
			                        'class'=>'form-control',
			                        'value'=>@$professional['user_professional_accreditations_details']->training_techniques !=''?@$professional['user_professional_accreditations_details']->training_techniques:'']);
                            ?>
                        </div>
                    </div>
                   <div class="">
                    <p class="col-lg-12 sp-tb"><a href="<?php echo HTTP_ROOT.'dashboard/about-sitter'; ?>"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?></button></a>
                      <input class="pull-right btn Continue" type="submit" value="Continue" ></p>
                    </div>
                     
                     
                  </form>
                
                
                
               
              </div>




              </div>
        
          </div>
          </div>
        </div>

        </div>
            </div> 
      </div>

	<?php /* echo $this->Form->create(null, [
		  'url' => ['controller' => 'dashboard', 'action' => 'upload-documents'],
		  'id'=>'uploaddocument',
		  'method'=>'post',
		  'enctype'=>"multipart/form-data",
		  '
	  ]);*/?>
	<form id="imageform"  style="visibility: hidden" method="post" enctype="multipart/form-data" action='<?php echo HTTP_ROOT."dashboard/upload-documents"; ?>'>  
	<input type="hidden" name="valuefor" value="" id="valuefor" />
	<input type="file" name="document" id="documentControl" />
	</form>      

<script>
	$( document ).ready(function() {
		
		//open document selector window script
		$(document).on('click', ".uploaddoc", function(){
			$("#valuefor").val($(this).prev().attr('id').replace("[]", "")); //ADD TEXT box id to hidden form value
			$("#documentControl").trigger("click");	
		});
		
		//Document upload using ajax and return document name insert into releted text box
		$(document).on('change', '#documentControl', function() 
		{  
			$("#"+$("#valuefor").val()).next().after('<img class="wait-img" src="<?php echo HTTP_ROOT."img/ajax-loader.gif"; ?>"/>');
			$("#imageform").ajaxForm(
			{
				success: function(res)
				{
					var response = res.split(':');
					$(".wait-img").remove();
					$(".inline-error").remove();
					if($.trim(response[0]) == 'Success'){
						$('#'+response[1]).val(response[2]);	//DISPLAY SUCCESS MESSAGE
						$('#uploaddocument').reset();
					}else{
						
						$('#'+response[1]).next(".uploaddoc").after("<em class='inline-error'>"+response[2]+"</em>");	//DISPLAY RESPONSE ERRORS
						
					}
					
			
				
				}
			}).submit();
		});
		
		//DELETE ROW
		$(document).on('click', '.deleteOtherRow', function() 
		{
			$('#'+$(this).attr('data-rel')).remove();
		});	
		
		//SCRIPT FOR ADD DATEPICKER
		$(".addDateCalendar").datepicker(
        {
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
		$(".fa-calendar").click(function(){ $(".addDateCalendar").focus();});

		var i = $(".ajaxAdd").length;
		
		//For append other qualification
		$("#addMore").on('click',function(){
			
			
			i = parseInt(i)+1;
			
			$("#addAfter").append('<div id="ajaxAdd'+i+'" style="padding:15px" class="ajaxAdd row "><div class="row"> <div class="form-group col-lg-4"><input class="form-control" type="text" placeholder="Qualification Title" name="qualification_title[]"> </div><div class="form-group col-lg-4"><input readonly id="start_date_picker_'+i+'" class="form-control addDateCalendar" type="text" placeholder="Date Issued" name="qualification_date[]"> </div><div class="form-group col-lg-4"><input readonly id="end_date_picker_'+i+'" class="form-control addDateCalendar" type="text" placeholder="Expiry Date of Certification" name="expiry_date[]"> </div></div><div class="row"> <div class="form-group col-lg-4" style="padding-left:0px;"><div class="brow-inner" > <input class="form-control" id="scanned_certification_'+i+'" readonly name="scanned_certification[]" type="text" placeholder="Upload Scanned Certificate "> <button class="uploaddoc  btn btn-secondary" type="button">Browse </button></div></div><div class="col-lg-4"><button data-rel="ajaxAdd'+i+'" class=" deleteOtherRow pull-lg-right btn btn-danger" type="button">Delete </button></div></div></div>');
	
			/*SET FOCUS ON NEWLY ADDED BLOCK START*/
			  var $this = $(this),
			  $toElement      = '#addMore',
			  $focusElement   = '#ajaxAdd'+i,
			  $offset         = 0,
			  $speed          = 50 * 1 || 500;

			  $('html, body').animate({
				scrollTop: $($toElement).offset().top + $offset
			  }, $speed);
		  
			if ($focusElement) $($focusElement).focus();
			/*SET FOCUS ON NEWLY ADDED BLOCK END*/
			
            setTimeout(function(){ 
				$(".addDateCalendar").datepicker(
				{
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd'
				});
			}, 500);
			
		}); 
		
	});
	</script>
	<style>
		.brow-inner > img {
			float: left;
			left: 330px;
			position: relative;
			top: -30px;
		}
		.inline-error{
			color:red;
			font-size:12px;	
		}
		.ajaxAdd .col-lg-4 .brow-inner {
			margin-left: 15px;
		}
		
		.input-mleft0 { margin-left:0px !important; }
		
	</style>

<script>
  $(document).ready(function (){
      $('.selectedCheckbox').click(function(){
            $(this).parent().parent().toggleClass("selected");
        });
   
    })
   /*For on-off button*/
    $(function(){
          $('input[type=checkbox]').onoff();
    });
       /*End of-off button*/
  
</script>

<?php 
  echo $this->Html->css(['Front/jquery-ui.css']); 
  echo $this->Html->script(['Front/jquery-ui.js']);
?>
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
                <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">Sitter Profile</h3>
               
                <?php echo $this->element('frontElements/profile/sitter_nav');?>
          
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">

  <div id="menu3" class="tab-pane fade tab-comm active in">
                
                <!--<form role="form">-->
                  <?php echo $this->Form->create(null, [
                      'url' => ['controller' => 'dashboard', 'action' => 'professional-accreditations'],
                      'role'=>'form',
                      'id'=>'generelInfo'
                  ]);?>
                  <h3><strong>Police Check</strong><small>( Government Issued Police Check ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                     <?php echo $this->Form->input('UserProfessionals.check.govt.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Qualification Title',
                                 'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['check']['govt']['qualification_title'] !=''?@$professional['UserProfessionals']['check']['govt']['qualification_title']:''
                      ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                     <?php echo $this->Form->input('UserProfessionals.check.govt.qualification_date',[
                                 'class'=>'form-control addDateCalendar',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Date Issued',
                                 'type' => 'text',
                                 'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['check']['govt']['qualification_date'] !=''?@$professional['UserProfessionals']['check']['govt']['qualification_date']:''
                      ]); ?>

                    </div>
                    <div class="form-group col-lg-4">
                     <?php echo $this->Form->input('UserProfessionals.check.govt.expiry_date',[
                             'class'=>'form-control addDateCalendar',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Expiry Date of Certification',
                             'type' => 'text',
                             'label'=>false,
                             'value'=>@$professional['UserProfessionals']['check']['govt']['expiry_date'] !=''?@$professional['UserProfessionals']['check']['govt']['expiry_date']:''
                      ]); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                      <?php echo $this->Form->input('UserProfessionals.check.govt.scanned_certification',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Upload Scanned Certificate',
                             'readonly'=>true,
                             'label'=>false,
                              'value'=>@$professional['UserProfessionals']['check']['govt']['scanned_certification'] !=''?@$professional['UserProfessionals']['check']['govt']['scanned_certification']:''
                      ]); ?>
                      
                      
                      <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    
                   
                  </div>

                  <h3><strong>Physician (Pets)</strong><small>   ( Medical Certificate ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
						<?php echo $this->Form->input('UserProfessionals.pets.private.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Qualification Title',
								  'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['pets']['private']['qualification_title'] !=''?@$professional['UserProfessionals']['pets']['private']['qualification_title']:''
                      ]); ?>

                    </div>
                    <div class="form-group col-lg-4">
                        <?php echo $this->Form->input('UserProfessionals.pets.private.qualification_date',[
                                   'class'=>'form-control addDateCalendar',
                                   'templates' => ['inputContainer' => '{{content}}'],
                                   'placeholder'=>'Date Issued',
                                   'type' => 'text',
                                   'label'=>false,
									'value'=>@$professional['UserProfessionals']['pets']['private']['qualification_date'] !=''?@$professional['UserProfessionals']['pets']['private']['qualification_date']:''
                        ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <?php echo $this->Form->input('UserProfessionals.pets.private.expiry_date',[
                             'class'=>'form-control addDateCalendar',
                             'type' => 'text',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Expiry Date of Certification',
								'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['pets']['private']['expiry_date'] !=''?@$professional['UserProfessionals']['pets']['private']['expiry_date']:''
                      ]); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                      <?php echo $this->Form->input('UserProfessionals.pets.private.scanned_certification',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Upload Scanned Certificate',
                             'readonly'=>true,
                             'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['pets']['private']['scanned_certification'] !=''?@$professional['UserProfessionals']['pets']['private']['scanned_certification']:''
                      ]); ?>
                      <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
                      </div>
                    </div>
                   
                   
                  </div>

                  <h3><strong>Physician (People)</strong><small>   ( Medical Certificate ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <?php echo $this->Form->input('UserProfessionals.people.private.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Qualification Title',
                                 'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['people']['private']['qualification_title'] !=''?@$professional['UserProfessionals']['people']['private']['qualification_title']:''
                      ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <?php echo $this->Form->input('UserProfessionals.people.private.qualification_date',[
                                   'class'=>'form-control addDateCalendar',
                                   'templates' => ['inputContainer' => '{{content}}'],
                                   'placeholder'=>'Date Issued',
                                   'type' => 'text',
                                  'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['people']['private']['qualification_date'] !=''?@$professional['UserProfessionals']['people']['private']['qualification_date']:''
                        ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <?php echo $this->Form->input('UserProfessionals.people.private.expiry_date',[
                             'class'=>'form-control addDateCalendar',
                             'type' => 'text',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Expiry Date of Certification',
                             'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['people']['private']['expiry_date'] !=''?@$professional['UserProfessionals']['people']['private']['expiry_date']:''
                      ]); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                     <?php echo $this->Form->input('UserProfessionals.people.private.scanned_certification',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Upload Scanned Certificate',
                             'readonly'=>true,
                            'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['people']['private']['scanned_certification'] !=''?@$professional['UserProfessionals']['people']['private']['scanned_certification']:''
                      ]); ?>
                      <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    
                   
                  </div>
                    <h3><strong>drivers licence / Government issued ID<small>( Your photo ID will not be displayed on your profile )</small></strong></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                     <?php echo $this->Form->input('UserProfessionals.govt.licence.scanned_certification',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Upload Scanned Certificate',
                             'readonly'=>true,
                             'label'=>false,
                                 'value'=>@$professional['UserProfessionals']['govt']['licence']['scanned_certification'] !=''?@$professional['UserProfessionals']['govt']['licence']['scanned_certification']:''
                      ]); ?>
                      
                      <button class="uploaddoc btn btn-secondary" type="button">Browse</button>
                      </div>
                    </div>
                    
                   
                  </div>
                  <h3><strong>Other Qualifications & Specific Skills</strong><small>( Please specify )</small><span id="addMore" class="pull-right add-more-n"><i class="fa fa-plus-circle"></i>
 Add More</span></h3>
                <?php 
					//CONDITION FOR 
					if(!empty($professional['UserProfessionals']['other'])){ ?>
							<?php $o=1; 
							foreach($professional['UserProfessionals']['other'] as $otherValue){ ?>
								  <div id="ajaxAdd<?php echo $o; ?>" class="row ajaxAdd">
                    
										<div class="form-group col-lg-4">
										   <?php echo $this->Form->input('qualification_title[]',[
													 'class'=>'form-control',
													 'templates' => ['inputContainer' => '{{content}}'],
													 'placeholder'=>'Qualification Title',
													 'label'=>false,
													 'value'=>@$otherValue['other']['qualification_title'] !=''?@$otherValue['other']['qualification_title']:''
										  ]); ?>
										</div>
										<div class="form-group col-lg-4">
										  <?php echo $this->Form->input('qualification_date[]',[
													   'class'=>'form-control addDateCalendar',
													   'type' => 'text',
													   'templates' => ['inputContainer' => '{{content}}'],
													   'placeholder'=>'Date Issued',
													  'label'=>false,
													 'value'=>@$otherValue['other']['qualification_date'] !=''?@$otherValue['other']['qualification_date']:''
										  ]); ?>

										</div>
										<div class="form-group col-lg-4" >
										  <?php echo $this->Form->input('expiry_date[]',[
												 'class'=>'form-control addDateCalendar',
												 'type' => 'text',
												 'templates' => ['inputContainer' => '{{content}}'],
												 'placeholder'=>'Expiry Date of Certification',
												'label'=>false,
												 'value'=>@$otherValue['other']['expiry_date'] !=''?@$otherValue['other']['expiry_date']:''
										  ]); ?>

										</div>
								 

								  <div class="row" >
									<div class="form-group col-lg-4">
										<div class="brow-inner">
											<?php echo $this->Form->input('scanned_certification[]',[
												 'class'=>'form-control',
												 'id'=>'scanned_certification_'.$o,
												 'templates' => ['inputContainer' => '{{content}}'],
												 'placeholder'=>'Upload Scanned Certificate',
												 'readonly'=>true,
												 'label'=>false,
													 'value'=>@$otherValue['other']['scanned_certification'] !=''?@$otherValue['other']['scanned_certification']:''
										  ]); ?>
										  <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
										</div>
									</div>
								  </div>
								   </div>
							<?php $o++;	
							} //END FOREACH LOOP FOR DISPLAY MULTIPLE OTHER FIELD WHEN USER SELECT MULTIPLE FROM ADD OTHER ?>
				<?php }else{ ?>
					  <div id="ajaxAdd1"  class="row ajaxAdd">
                    
						<div class="form-group col-lg-4">
						   <?php echo $this->Form->input('qualification_title[]',[
									 'class'=>'form-control',
									 'templates' => ['inputContainer' => '{{content}}'],
									 'placeholder'=>'Qualification Title',
									 'label'=>false,
									 'value'=>@$professional['UserProfessionals']['check']['govt']['qualification_title'] !=''?@$professional['UserProfessionals']['check']['govt']['qualification_title']:''
						  ]); ?>
						</div>
						<div class="form-group col-lg-4">
						  <?php echo $this->Form->input('qualification_date[]',[
									   'class'=>'form-control addDateCalendar',
									   'type' => 'text',
									   'templates' => ['inputContainer' => '{{content}}'],
									   'placeholder'=>'Date Issued',
									  'label'=>false,
									 'value'=>@$professional['UserProfessionals']['check']['govt']['qualification_title'] !=''?@$professional['UserProfessionals']['check']['govt']['qualification_title']:''
						  ]); ?>

						</div>
						<div class="form-group col-lg-4" >
						  <?php echo $this->Form->input('expiry_date[]',[
								 'class'=>'form-control addDateCalendar',
								 'type' => 'text',
								 'templates' => ['inputContainer' => '{{content}}'],
								 'placeholder'=>'Expiry Date of Certification',
								'label'=>false,
								 'value'=>@$professional['UserProfessionals']['check']['govt']['qualification_title'] !=''?@$professional['UserProfessionals']['check']['govt']['qualification_title']:''
						  ]); ?>

						</div>
                 

                  <div class="row" >
                    <div class="form-group col-lg-4">
						<div class="brow-inner">
							<?php echo $this->Form->input('scanned_certification[]',[
								 'class'=>'form-control',
								 'id'=>'scanned_certification_1',
								 'templates' => ['inputContainer' => '{{content}}'],
								 'placeholder'=>'Upload Scanned Certificate',
								 'readonly'=>true,
								 'label'=>false,
									 'value'=>@$professional['UserProfessionals']['check']['govt']['qualification_title'] !=''?@$professional['UserProfessionals']['check']['govt']['qualification_title']:''
						  ]); ?>
						  <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
						</div>
                    </div>
                  </div>
                   </div>
					<?php } //END IF CONDITION FOR OTHER FIELDS ?>
                  
                  <h3 id="addAfter"></h3>

                  <div class="row">
                    <div class="col-lg-4">
                       <label for="">Do you know First Aid for </label>
                      
                      <?php echo $this->Form->input('UserProfessionalsDetails.first_aid_for',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>@$professional['user_professional_accreditations_details']->first_aid_for !=''?@$professional['user_professional_accreditations_details']->first_aid_for:'']);
                      ?>
                    </div>

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

                    </div>

                    <div class="row">
                    <div class="col-lg-4">
                     <label for="">I canadminister Injected Medications</label>
                      
                      <?php echo $this->Form->input('UserProfessionalsDetails.injected_madications',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>@$professional['user_professional_accreditations_details']->injected_madications !=''?@$professional['user_professional_accreditations_details']->injected_madications:'']);
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
                    </div>

                    <div class="row">
                   

                
                    <div class="col-lg-4">
                         <label for="">Experience as Volunteer with Animal Welfare</label>
                          
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_volunteer',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>['yes'=>'Yes','no'=>'No'],
                        'class'=>'form-control',
                        'value'=>@$professional['user_professional_accreditations_details']->ex_volunteer !=''?@$professional['user_professional_accreditations_details']->ex_volunteer:'']);
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
                      <label for="">Languages</label>
                          
                      <?php echo $this->Form->input('UserProfessionalsDetails.languages',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>['en'=>'English','fr'=>'French','de'=>'German','hu'=>'Hungarian','it'=>'Italian','ro'=>'Romanian','ru'=>'Russion','es'=>'spanish'],
                        'class'=>'form-control',
                        'value'=>@$professional['user_professional_accreditations_details']->languages !=''?@$professional['user_professional_accreditations_details']->languages:'']);
                      ?>
                    </div>


                    </div>
                   <div class="row">
                    <p class="col-lg-12 sp-tb"><a href="<?php echo HTTP_ROOT.'dashboard/about-sitter'; ?>"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i>Previous</button></a>
                      <input class="pull-right btn Continue" type="submit" value="Continue" ></p>
                    </div>
                     
                     
                  </form>
                
                
                
               
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

		var i=$( ".ajaxAdd" ).length;
		//For append other qualification
		$("#addMore").on('click',function(){
			i = parseInt(i)+1;
			$("#addAfter").append('<div id="ajaxAdd'+i+'" style="padding:15px" class="row ajaxAdd"><div class="row"> <div class="form-group col-lg-4"><input class="form-control" type="text" placeholder="Qualification Title" name="qualification_title[]"> </div><div class="form-group col-lg-4"><input class="form-control addDateCalendar" type="text" placeholder="Date Issued" name="qualification_date[]"> </div><div class="form-group col-lg-4"><input class="form-control addDateCalendar" type="text" placeholder="Expiry Date of Certification" name="expiry_date[]"> </div></div><div class="row"> <div class="form-group col-lg-4"><div class="brow-inner"> <input class="form-control" id="scanned_certification_'+i+'" readonly name="scanned_certification[]" type="text" placeholder="Upload Scanned Certificate "> <button class="uploaddoc btn btn-secondary" type="button">Browse </button></div></div><button data-rel="ajaxAdd'+i+'" class="deleteOtherRow pull-lg-right btn btn-danger" type="button">Delete </button></div></div>');

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
	</style>

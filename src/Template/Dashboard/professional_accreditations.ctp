 
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
                      <!--<input type="text" placeholder="Issuing Institution" id="" class="form-control">-->
                       <?php echo $this->Form->input('UserProfessionals.check.govt.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Qualification Title',
                                 'label'=>false/*,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title']:''*/
                      ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <!--<input type="text" placeholder="Date Issued" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.check.govt.qualification_date',[
                                 'class'=>'form-control addDateCalendar',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Date Issued',
                                 'label'=>false/*,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date']:''*/
                      ]); ?>

                    </div>
                    <div class="form-group col-lg-4">
                     <!-- <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.check.govt.expiry_date',[
                             'class'=>'form-control addDateCalendar',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Expiry Date of Certification',
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
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
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
                      ]); ?>
                      
                      
                      <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    <!--<div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>-->
                   
                  </div>

                  <h3><strong>Physician (Pets)</strong><small>   ( Medical Certificate ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">-->
                       <?php echo $this->Form->input('UserProfessionals.pets.private.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Qualification Title',
                                 'label'=>false/*,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title']:''*/
                      ]); ?>

                    </div>
                    <div class="form-group col-lg-4">
                        <!--<input type="text" placeholder="Graduation Date" id="" class="form-control">-->
                        <?php echo $this->Form->input('UserProfessionals.pets.private.qualification_date',[
                                   'class'=>'form-control addDateCalendar',
                                   'templates' => ['inputContainer' => '{{content}}'],
                                   'placeholder'=>'Date Issued',
                                   'label'=>false/*,
                                   'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date']:''*/
                        ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <!--<input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.pets.private.expiry_date',[
                             'class'=>'form-control addDateCalendar',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Expiry Date of Certification',
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
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
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
                      ]); ?>
                      <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
                      </div>
                    </div>
                   <!--<div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>-->
                   
                  </div>

                  <h3><strong>Physician (People)</strong><small>   ( Medical Certificate ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.people.private.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Qualification Title',
                                 'label'=>false/*,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title']:''*/
                      ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                     <!-- <input type="text" placeholder="Graduation Date" id="" class="form-control">-->
                        <?php echo $this->Form->input('UserProfessionals.people.private.qualification_date',[
                                   'class'=>'form-control addDateCalendar',
                                   'templates' => ['inputContainer' => '{{content}}'],
                                   'placeholder'=>'Date Issued',
                                   'label'=>false/*,
                                   'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date']:''*/
                        ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <!--<input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.people.private.expiry_date',[
                             'class'=>'form-control addDateCalendar',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Expiry Date of Certification',
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
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
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
                      ]); ?>
                      <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    <!--<div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>-->
                   
                  </div>
                    <h3><strong>drivers licence / Government issued ID<small>( Your photo ID will not be displayed on your profile )</small></strong></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                     <?php echo $this->Form->input('UserProfessionals.govt.licence.scanned_certification',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Upload Scanned Certificate',
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
                      ]); ?>
                      
                      <button class="uploaddoc btn btn-secondary" type="button">Browse</button>
                      </div>
                    </div>
                    <!--<div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>-->
                   
                  </div>
                  <h3><strong>Other Qualifications & Specific Skills</strong><small>( Please specify )</small><span id="addMore" class="pull-right add-more-n"><i class="fa fa-plus-circle"></i>
 Add More</span></h3>
                  <div class="row ajaxAdd">
                    <div class="form-group col-lg-4">
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">-->
                       <?php echo $this->Form->input('qualification_title[]',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>'Qualification Title',
                                 'label'=>false/*,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title']:''*/
                      ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <!--<input type="text" placeholder="Graduation Date" id="" class="form-control">-->
                      <?php echo $this->Form->input('qualification_date[]',[
                                   'class'=>'form-control addDateCalendar',
                                   'templates' => ['inputContainer' => '{{content}}'],
                                   'placeholder'=>'Date Issued',
                                   'label'=>false/*,
                                   'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date']:''*/
                      ]); ?>

                    </div>
                    <div class="form-group col-lg-4" >
                      <!--<input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                      <?php echo $this->Form->input('expiry_date[]',[
                             'class'=>'form-control addDateCalendar',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Expiry Date of Certification',
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
                      ]); ?>

                    </div>
                  </div>

                  <div class="row" >
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                      <?php echo $this->Form->input('scanned_certification[]',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>'Upload Scanned Certificate',
                             'label'=>false/*,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''*/
                      ]); ?>
                      <button type="button" class="uploaddoc btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    <!--<div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>-->
                   
                  </div>
                  <h3 id="addAfter"></h3>

                  <div class="row">
                    <div class="col-lg-4">
                       <label for="">Do you know First Aid for </label>
                          <!--<select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.first_aid_for',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>
                    </div>

                    <div class="col-lg-4">
                      <label for="">Do you know CPR for </label>
                          <!--<select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.cpr_for',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>
                    </div>

                    <div class="col-lg-4">
                       <label for="">I can administer Oral Medications</label>
                          <!--<select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.oral_medications',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>
                    </div>

                    </div>

                    <div class="row">
                    <div class="col-lg-4">
                     <label for="">I canadminister Injected Medications</label>
                          <!--<select id="sel1" class="form-control">
                        <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.injected_medications',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>
                          </div>
                      
                   

              
                    <div class="col-lg-4">
                     <label for="">Familiar with Pet Training Techniques</label>
                          <!--<select id="sel1" class="form-control">
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.training_techniques',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','other'=>'Other (specify)'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>

                    </div>
                    

                   
                    <div class="col-lg-4">
                       <label for="">Experience with Behavioural Problems</label>
                          <!--<select id="sel1" class="form-control">
                            <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_behavioural_problems',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>
                    </div>
                    </div>

                    <div class="row">
                   

                
                    <div class="col-lg-4">
                         <label for="">Experience as Volunteer with Animal Welfare</label>
                          <!--<select id="sel1" class="form-control">
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_volunteer',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>['yes'=>'Yes','no'=>'No'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>
                    </div>
                    <div class="col-lg-4">
                         <label for="">Experience with Rescue Pets  </label>
                          <!--<select id="sel1" class="form-control">
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_rescue_pets',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','other'=>'Other (specify)'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:''*/]);
                      ?>
                    </div>
                    <div class="col-lg-4">
                      <label for="">Languages</label>
                          <!--<select id="sel1" class="form-control">
                            <option>English</option>
                            <option>Chinese</option>
                            <option>Czech</option>
                            <option>Danish</option>
                            <option>Dutch</option>
                            <option>Finnish</option>
                            <option>French</option>
                            <option>German</option>
                            <option>Italian</option>
                            <option>Japanese</option>
                            <option>Maori</option>
                            <option>Norwegian</option>
                            <option>Portugese</option>
                            <option>Russian</option>
                            <option>Spanish</option>
                            <option>Swedish</option>
                            <option>Other</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.language',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>['en'=>'English','fr'=>'French','de'=>'German','hu'=>'Hungarian','it'=>'Italian','ro'=>'Romanian','ru'=>'Russion','es'=>'spanish'],
                        'class'=>'form-control'/*,
                        'value'=>$professional['UserProfessionalsDetails']['language'] !=''?$professional['UserProfessionalsDetails']['language']:''*/]);
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
			$("#valuefor").val($(this).prev().attr('id'));
			$("#documentControl").trigger("click");	
		});
		
		//Document upload using ajax and return document name insert into releted text box
		$(document).on('change', '#documentControl', function() 
		{ 
			$(".uploaddoc").next().html('<img src="<?php echo HTTP_ROOT."img/ajax-loader.gif"; ?>"/>');
			$("#imageform").ajaxForm(
			{
				success: function(res)
				{
					var response = res.split(':');
					if($.trim(response[0]) == 'Success'){
						$('#'+response[1]).val(response[2]);	//DISPLAY SUCCESS MESSAGE
						$('#uploaddocument')[0].reset();
					}else{
						$('#'+response[1]).next("<em>"+response[2]+"</em>");	//DISPLAY RESPONSE ERRORS
					}
				}
			}).submit();
		});
		
		//DELETE ROW
		$(document).on('click', '.deleteOtherRow', function() 
		{
			alert($(this).attr('data-rel'));
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
		
		var i=2;
		//For append other qualification
		$("#addMore").on('click',function(){
			$("#addAfter").append('<div id="ajaxAdd'+i+'" style="padding:15px" class="row ajaxAdd"><div class="row"> <div class="form-group col-lg-4"><input class="form-control" type="text" placeholder="Qualification Title" name="qualification_title[]"> </div><div class="form-group col-lg-4"><input class="form-control addDateCalendar" type="text" placeholder="Date Issued" name="qualification_date[]"> </div><div class="form-group col-lg-4"><input class="form-control addDateCalendar" type="text" placeholder="Expiry Date of Certification" name="expiry_date[]"> </div></div><div class="row"> <div class="form-group col-lg-4"><div class="brow-inner"> <input class="form-control" id="scanned_certification_'+i+'[]" name="scanned_certification[]" type="text" placeholder="Upload Scanned Certificate "> <button class="uploaddoc btn btn-secondary" type="button">Browse </button></div></div><button data-rel="ajaxAdd'+i+'" class="deleteOtherRow pull-lg-right btn btn-danger" type="button">Delete </button></div></div>');

			setTimeout(function(){ 
				$(".addDateCalendar").datepicker(
				{
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd'
				});
			}, 500);
			i = parseInt(i)+1;
		}); 
	});
</script>

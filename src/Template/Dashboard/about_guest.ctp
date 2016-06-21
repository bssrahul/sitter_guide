
<?php 
echo $this->Html->css(['Front/tokenfield-typeahead.min.css','Front/bootstrap-tokenfield.min.css']);
echo $this->Html->script('Front/bootstrap-tokenfield.js');?>

<script>
	
  $(document).ready(function(){
		$('.dogBreeds').tokenfield({
		  autocomplete: {
		  source: <?php echo $allBreed = json_encode($dog_breeds); ?>,
		  delay: 100,
		  minHeight:200
		},
		  showAutocompleteOnFocus: true,

		});
		$('.dogBreeds').on('tokenfield:createtoken', function (event){
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
    <div class="profiletab-section">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png"> 
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

  <div id="menu2" class="tab-pane fade tab-comm active in">
        
        <h2 id="basic-details" class="head-font">Now let us know who the sitter will be looking after.
        </h2>
        <p class="head-font2 pad-head-foot pad-22t">Your guest preferences are managed here
        </p>
       <?php echo $this->Form->create(null,[
                      'url' => ['controller' => 'dashboard', 'action' => 'about-guest'],
                      'role'=>'form',
                      'id'=>'about_guest'
              ]);
        ?>
        <?php if(!empty($guest_data) && isset($guest_data) || isset($guest1) && !empty($guest1)){ 

                echo $this->Form->input('UserPets.Guest1.user_pet_id',[
                  'type'=>'hidden',
                  'value'=>@$guest_data['id'] !=''?@$guest_data['id']:''
              ]);
         
          ?>
         
        <div id="ajaxAdd1" class="row ajaxAdd">
           <div class="row">
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Guest Name
              </label>
              <?php echo $this->Form->input('UserPets.Guest1.guest_name',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_name'] !=''?@$guest_data['guest_name']:''
                      ]);
              ?>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Type
              </label>
              <?php echo $this->Form->input('UserPets.Guest1.guest_type',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'data-rel'=>"showHideBreed1",
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','horse'=>'Horse','rabbit'=>'Rabbit','guinee_pig'=>'Guinne Pig','ferret'=>'Ferret','bird'=>'Bird','reptile'=>'Reptile','farm_animal'=>'Farm Animal'],
                        'class'=>'form-control required selectPetType',
                        'value'=>@$guest_data['guest_type'] !=''?@$guest_data['guest_type']:''
                        ]);
                ?>
            </div>
            <?php if(@$guest_data['guest_type'] == 'dog'){ ?>
				 <div class="form-group col-lg-4 col-md-6 showHideBreed1" style="display:block">
                 <label for="">Breed
                 </label>
                 <?php  if(!empty($guest_data['guest_breed'])){
							$breeds = explode(",",$guest_data['guest_breed']); 
							
							$selectedBreed =array();
							 foreach($dog_breeds as $key=> $arr)
								{ 
									$value=$arr['value'];
									$label=$arr['label'];
									if(in_array($value,$breeds) )
									{
										$selectedBreed[]=array("value"=>$value,"label"=>$label);
									}
								}
								$selectedBreed=json_encode($selectedBreed);	
						   
				   ?>
                 <script>
					$(document).ready(function() {

					  $('#userpets-guest1-guest-breed').tokenfield('setTokens',<?php echo $selectedBreed; ?>);
					});
				 </script>
				 <?php  } ?>
                 <input class="form-control required dogBreeds" id="userpets-guest1-guest-breed" type="text" name="UserPets[Guest1][guest_breed]" value="" >
              
               <!--<?php echo $this->Form->input('UserPets.Guest1.guest_breed',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','afgan'=>'Afghan Hound','affen'=>'Affenpinscher','african'=>'Africans','aidi'=>'Aidi'],
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_breed'] !=''?@$guest_data['guest_breed']:''
                        ]);
                ?>-->
              </div>
				<?php }else{ ?>
					 <div class="form-group col-lg-4 col-md-6 showHideBreed1" style="display:none">
              <label for="">Breed
              </label>
              <input class="form-control required dogBreeds" id="userpets-guest1-guest-breed" type="text" name="UserPets[Guest1][guest_breed]" value="" >
              
               <!-- <?php echo $this->Form->input('UserPets.Guest1.guest_breed',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','afgan'=>'Afghan Hound','affen'=>'Affenpinscher','african'=>'Africans','aidi'=>'Aidi'],
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_breed'] !=''?@$guest_data['guest_breed']:''
                        ]);
                ?> -->


            </div>
					<?php } ?>
           
          </div>
          <div class="row">
            <div class="form-group col-lg-4 col-md-6">
              <div class="row">
				  <?php if(@$guest_data['guest_type'] == 'dog'){ ?>
					  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 showHideBreed1" style="display:block">
						 <label for="">Size
                        </label>
					<?php echo $this->Form->input('UserPets.Guest1.guest_weight',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label' => false,
                        'required' => false,
                        'options'=>[""=>"---","0-7"=>"Small(0-7kg)","8-18"=>"Medium(8-18kg)","18-45"=>"Large(18-45kg)","45+"=>"Giant(45+kg)",'aidi'=>'Aidi'],
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_weight'] !=''?@$guest_data['guest_weight']:''
                      ]);
                  ?> 
                </div>
					  <?php }else{ ?>
						 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 showHideBreed1" style="display:none">
                  <label for="">Size
                  </label>
                         
                         
                  <?php echo $this->Form->input('UserPets.Guest1.guest_weight',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label' => false,
                        'required' => false,
                        'options'=>[""=>"---","0-7"=>"Small(0-7kg)","8-18"=>"Medium(8-18kg)","18-45"=>"Large(18-45kg)","45+"=>"Giant(45+kg)",'aidi'=>'Aidi'],
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_weight'] !=''?@$guest_data['guest_weight']:''
                      ]);
                  ?>
                </div>
				<?php } ?>
                
                <?php if(@$guest_data['guest_age'] != ''){
                  $guest_age_arr = explode(",",$guest_data['guest_age']);
                } ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">Age
                      </label>
                      <?php echo $this->Form->input('UserPets.Guest1.guest_years',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control required number',
                        'value'=>@$guest_age_arr[0]
                        ]);
                      ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">&nbsp 
                      </label>
                      <?php echo $this->Form->input('UserPets.Guest1.guest_months',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control number required',
                        'value'=>@$guest_age_arr[1]
                        ]);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label for="">Gender
                  </label>
                  
                    <div class="row">
                     <?php  
                      if(@$guest_data['guest_gender'] == 'male'){
                          $mchecked = 'checked';    
                      }else if(@$guest_data['guest_gender'] == 'female'){
                          $fchecked = 'checked';
                      }else{
						  $mchecked = 'checked';
					  } ?>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <input  <?php echo @$mchecked; ?> value="male" name="UserPets[Guest1][guest_gender]" type="radio" aria-label="...">
                          </span>
                          <input  type="text" class="form-control" value="Male" aria-label="..." disabled>
                        </div>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="input-group"> 
                          <span class="input-group-addon">
                            <input <?php echo @$fchecked; ?> value="female" name="UserPets[Guest1][guest_gender]" type="radio" aria-label="...">
                          </span>
                          <input type="text" class="form-control" value="Female" aria-label="..." disabled>
                        </div>
                      </div>

                    </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-4 col-md-12">
              <label  for="">Short Description
              </label>
              <?php echo $this->Form->input('UserPets.Guest1.guest_description',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'textarea',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control height-area required about_txtarea',
                        'value'=>@$guest_data['guest_description'] !=''?@$guest_data['guest_description']:''
                        ]);
              ?>
              <?php $max=75; if(!empty($guest_data['guest_description'])){ $rem = $max-str_word_count ($guest_data['guest_description']);} ?>
                          <p class="w-limit" id="userpets-guest1-guest-description_text"><?php if(!empty($rem)){echo $rem ;}else{echo "75";} echo $this->requestAction('app/get-translate/'.base64_encode(' words remainings')); ?></p>
            </div>
            
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Photo Library
              </label>
              <div class="row" id="images_preview_1" >
				  
                <?php 
                 if(@$guest_images != 'no_image'){
					 echo @$guest_images;
				 }else{ ?>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
					  <img src="<?php echo HTTP_ROOT.'img/profile-dummy.png'?>" class="img-responsive center-block text-center thumbnail" alt="img">
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
					  <img src="<?php echo HTTP_ROOT.'img/profile-dummy.png'?>" class="img-responsive center-block text-center" alt="img">
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
					  <img src="<?php echo HTTP_ROOT.'img/profile-dummy.png'?>" class="img-responsive center-block text-center" alt="img">
					</div>
					
				<?php }
                 ?>
              </div>
            </div>
            <div class="form-group col-lg-4 col-md-12">
              <p class="upload-txt">It is a long established fact that a reader will be by the page when looking at its layout. 
              </p>
              <button type="button" class="btn btn-prof-upload browseImg" data-rel="1"> 
                <i class="fa fa-upload ">
                </i> &nbsp;&nbsp; Upload Image
              </button>
              <div class="row" id="show-all-errors_1">
                 
              </div>
            </div>

          </div>
          <h3>Extended Profile
          </h3>
          <div class="extend">  
            <div class="row">
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Microchipped
                </label>
                <div class=" m-rights">
                    <?php echo $this->Form->input(
                              'UserPets.Guest1.microchipped',
                               ['type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                'options'=>[
										[
											'value'=>'unknow',
											'text'=>'Unknown',
											'class'=>'ma2'
										],
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['microchipped'] !=''?@$guest_data['microchipped']:'no'

                    ]); ?>
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Spayed / Neuted
                </label>
                <div class=" m-rights">
                    <?php echo $this->Form->input(
                              'UserPets.Guest1.spayed_or_neuted',
                               [
                                'type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                'options'=>[
										[
											'value'=>'unknow',
											'text'=>'Unknown',
											'class'=>'ma2'
										],
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['spayed_or_neuted'] !=''?@$guest_data['spayed_or_neuted']:'no'
                    ]); ?>
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Flea Treated
                </label>
                <div class=" m-rights">
                     <?php echo $this->Form->input(
                              'UserPets.Guest1.flea_treated',
                               [
                                'type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['flea_treated'] !=''?@$guest_data['flea_treated']:'no'
                    ]); 
                  ?> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Vaccinated
                </label>
                <div class=" m-rights"> 
                  <?php echo $this->Form->input(
                              'UserPets.Guest1.vaccinated',
                               [
                                'type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['vaccinated'] !=''?@$guest_data['vaccinated']:'no'
                    ]); 
                  ?> 
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">House Trained
                </label>
                <div class=" m-rights">
                  <?php echo $this->Form->input(
                        'UserPets.Guest1.house_trained',
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										],
										[
											'value'=>'addition_detail_needed',
											'text'=>'Additional detail if needed',
											'class'=>'ma2'
										]
									],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['house_trained'] !=''?@$guest_data['house_trained']:'no'
                    ]); 
                  ?>  
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Mediacation
                </label>
                <div class=" m-rights">
                  <?php echo $this->Form->input(
                        'UserPets.Guest1.mediacation',
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['mediacation'] !=''?@$guest_data['mediacation']:'no'
                    ]); 
                  ?> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Veterinary Name and Contact Info
                </label>
                <?php echo $this->Form->input(
                        'UserPets.Guest1.veterinary_name',
                         [
                          'type'=>"text",
                          'label'=>false,
                          'required'=>false,
                          'class'=>'form-control input-rt required',
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['veterinary_name'] !=''?@$guest_data['veterinary_name']:''
                    ]); 
                ?> 
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Friendly with
                </label>
                <div class=" m-rights">
                  <?php echo $this->Form->input(
                        'UserPets.Guest1.friendly_with',
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          "options"=>["dog"=>"Dog","cat"=>"Cat","-10yrs"=>"Kids -10yrs","+10yrs"=>"Kids +10yrs"],
                          'options'=>[
										[
											'value'=>'dog',
											'text'=>'Dog',
											'class'=>'ma2'
										],
										[
											'value'=>'cat',
											'text'=>'Cat',
											'class'=>'ma2'
										],
										[
											'value'=>'-10yrs',
											'text'=>'Kids -10yrs',
											'class'=>'ma2'
										],
										[
											'value'=>'+10yrs',
											'text'=>'Kids +10yrs',
											'class'=>'ma2'
										]
									],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['friendly_with'] !=''?@$guest_data['friendly_with']:'dog'
                    ]); 
                  ?> 
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Add care instructions for "guests name"  
                </label>
                <?php echo $this->Form->input(
                        'UserPets.Guest1.care_instructions',
                         [
                          'type'=>"text",
                          'label'=>false,
                          'required'=>false,
                          'class'=>'form-control input-rt required',
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['care_instructions'] !=''?@$guest_data['care_instructions']:''
                    ]); 
                ?>
              </div>
            </div>
           </div>
          </div>
          <?php }else{ 
               $o = 1; 
                foreach($guests_data as $guest_data){ 
                 echo $this->Form->input('UserPets.Guest1.user_pet_id',[
                  'type'=>'hidden',
                  'value'=>@$guest_data['id'] !=''?@$guest_data['id']:''
                ]);
                $guest = 'Guest'.$o;
          ?>
          <div id="ajaxAdd1" class="row ajaxAdd">
           <?php 
            if($o != '1'){ 
				?> 
            <h3><strong>Guest Info</strong><button onclick="if(confirm('Are you sure to delete this record?') == true){location.href='<?php echo HTTP_ROOT.'dashboard/delete-guest/'.base64_encode(convert_uuencode(@$guest_data->id)); ?>'}else {return false;}" 
              data-rel="ajaxAdd<?php $o; ?>" class="deleteOtherRecord pull-lg-right btn btn-danger" type="button" style="float:right">Delete </button></h3>
              <div class="clearfix"></div>
          <?php } ?>
           <div class="row">
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Guest Name
              </label>
              <?php echo $this->Form->input("UserPets.$guest.guest_name",[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_name'] !=''?@$guest_data['guest_name']:''
                      ]);
              ?>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Type
              </label>
              <?php echo $this->Form->input("UserPets.$guest.guest_type",[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'data-rel'=>"showHideBreed".$o,
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','horse'=>'Horse','rabbit'=>'Rabbit','guinee_pig'=>'Guinne Pig','ferret'=>'Ferret','bird'=>'Bird','reptile'=>'Reptile','farm_animal'=>'Farm Animal'],
                        'class'=>'form-control required selectPetType',
                        'value'=>@$guest_data['guest_type'] !=''?@$guest_data['guest_type']:''
                        ]);
                ?>
            </div>
           <?php if($guest_data['guest_type'] == "dog"){ ?>
			       <div class="form-group col-lg-4 col-md-6 showHideBreed<?php echo $o; ?>" style="display:block">
              <label for="">Breed
              </label>
                 <?php  if(!empty($guest_data['guest_breed'])){
							$breeds = explode(",",$guest_data['guest_breed']); 
							
							$selectedBreed =array();
							 foreach($dog_breeds as $key=> $arr)
								{ 
									$value=$arr['value'];
									$label=$arr['label'];
									if(in_array($value,$breeds) )
									{
										$selectedBreed[]=array("value"=>$value,"label"=>$label);
									}
								}
								$selectedBreed=json_encode($selectedBreed);	
						}      
				   ?>
                 <script>
					$(document).ready(function() {
                        $('#userpets-<?php echo $guest; ?>-guest-breed').tokenfield('setTokens', <?php echo @$selectedBreed;?>);
					});
				 </script>
                 <input class="form-control required dogBreeds" id="userpets-<?php echo $guest; ?>-guest-breed" type="text" name="UserPets[<?php echo $guest ?>][guest_breed]" value="" >
                 
               
            </div>
			<?php }else{ ?>
				<div class="form-group col-lg-4 col-md-6 showHideBreed<?php echo $o; ?>" style="display:none">
              <label for="">Breed
              </label>
              <input class="form-control required dogBreeds" id="userpets-<?php echo $guest; ?>-guest-breed" type="text" name="UserPets[<?php echo $guest ?>][guest_breed]" value="" >
              
               
            </div>
				<?php } ?>  
            
            
          </div>
          <div class="row">
			  
            <div class="form-group col-lg-4 col-md-6">
              <div class="row">
				  <?php if($guest_data['guest_type'] == "dog"){ ?>
			    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 showHideBreed<?php echo $o; ?>" style="display:block">
                  <label for="">Size
                  </label>
                  <?php echo $this->Form->input("UserPets.$guest.guest_weight",[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label' => false,
                        'required' => false,
                        'options'=>[""=>"---","0-7"=>"Small(0-7kg)","8-18"=>"Medium(8-18kg)","18-45"=>"Large(18-45kg)","45+"=>"Giant(45+kg)",'aidi'=>'Aidi'],
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_weight'] !=''?@$guest_data['guest_weight']:''
                        ]);
                  ?>
                </div>
                <?php }else{?>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 showHideBreed<?php echo $o; ?>" style="display:none">
                  <label for="">Size
                  </label>
                  <?php echo $this->Form->input("UserPets.$guest.guest_weight",[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label' => false,
                        'required' => false,
                        'options'=>[""=>"---","0-7"=>"Small(0-7kg)","8-18"=>"Medium(8-18kg)","18-45"=>"Large(18-45kg)","45+"=>"Giant(45+kg)",'aidi'=>'Aidi'],
                        'class'=>'form-control required',
                        'value'=>@$guest_data['guest_weight'] !=''?@$guest_data['guest_weight']:''
                        ]);
                  ?>
                </div>
				<?php } ?>
				
                <?php if(@$guest_data['guest_age'] != ''){
                  $guest_age_arr = explode(",",$guest_data['guest_age']);
                } ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">Age
                      </label>
                      <?php echo $this->Form->input("UserPets.$guest.guest_years",[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control required number',
                        'value'=>@$guest_age_arr[0]
                        ]);
                      ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">&nbsp 
                      </label>
                      <?php echo $this->Form->input("UserPets.$guest.guest_months",[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control required number',
                        'value'=>@$guest_age_arr[1]
                        ]);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label for="">Gender
                  </label>
                  
                    <div class="row">
                     <?php  
                      if(@$guest_data['guest_gender'] == 'male'){
                          $mchecked = 'checked';    
                      }else if(@$guest_data['guest_gender'] == 'female'){
                          $fchecked = 'checked';
                      }else{
						 $mchecked = 'checked'; 
						  } ?>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <input <?php echo @$mchecked; ?> value="male" name="UserPets[<?php echo $guest; ?>][guest_gender]" type="radio" aria-label="...">
                          </span>
                          <input  type="text" class="form-control" value="Male" aria-label="..." disabled>
                        </div>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="input-group"> 
                          <span class="input-group-addon">
                            <input <?php echo @$fchecked; ?> value="female" name="UserPets[<?php echo $guest; ?>][guest_gender]" type="radio" aria-label="...">
                          </span>
                          <input type="text" class="form-control" value="Female" aria-label="..." disabled>
                        </div>
                      </div>

                    </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-4 col-md-12">
              <label  for="">Short Description
              </label>
              <?php echo $this->Form->input("UserPets.$guest.guest_description",[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'textarea',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control height-area required about_txtarea',
                        'value'=>@$guest_data['guest_description'] !=''?@$guest_data['guest_description']:''
                        ]);
              ?>
               <?php $max=75; if(!empty($guest_data['guest_description'])){ $rem = $max-str_word_count ($guest_data['guest_description']);} ?>
                          <p class="w-limit" id="<?php echo 'userpets-'.$guest.'-guest-description_text' ?>" ><?php if(!empty($rem)){echo $rem ;}else{echo "75";} echo $this->requestAction('app/get-translate/'.base64_encode(' words remainings')); ?></p>
                           
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Photo Library
              </label>
              <div class="row" id="images_preview_<?php echo $o; ?>" >
                 <?php 
                 if(isset($guest_data['user_pet_galleries']) && !empty($guest_data['user_pet_galleries'])){
                 foreach((@$guest_data['user_pet_galleries']) as $single_image){
				 ?>
			    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
                  <img  src="<?php echo HTTP_ROOT.'img/uploads/'.$single_image->image?>" class="img-responsive center-block text-center thumbnail" alt="img">
                </div>
				 <?php }
				 }else{ ?>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
					  <img src="<?php echo HTTP_ROOT.'img/profile-dummy.png'?>" class="img-responsive center-block text-center" alt="img">
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
					  <img src="<?php echo HTTP_ROOT.'img/profile-dummy.png'?>" class="img-responsive center-block text-center" alt="img">
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
					  <img src="<?php echo HTTP_ROOT.'img/profile-dummy.png'?>" class="img-responsive center-block text-center" alt="img">
					</div>
					
				<?php }
                 ?>
              </div>
            </div>
            <div class="form-group col-lg-4 col-md-12">
              <p class="upload-txt">It is a long established fact that a reader will be by the page when looking at its layout. 
              </p>
              <button type="button" class="btn btn-prof-upload browseImg" data-rel="<?php echo $o; ?>"> 
                <i class="fa fa-upload ">
                </i> &nbsp;&nbsp; Upload Image
              </button>
              <div class="row" id="show-all-errors_<?php echo $o; ?>">
                 
              </div>
            </div>

          </div>
          <h3>Extended Profile
          </h3>
          <div class="extend">  
            <div class="row">
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Microchipped
                </label>
                <div class=" m-rights">
                    <?php echo $this->Form->input(
                              "UserPets.$guest.microchipped",
                               ['type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                //"options"=>["unknow"=>"Unknown","yes"=>"Yes","no"=>"No"],
                                'options'=>[
										[
											'value'=>'unknow',
											'text'=>'Unknow',
											'class'=>'ma2'
										],
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'class'=>'ma2',
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['microchipped'] !=''?@$guest_data['microchipped']:'no'

                    ]); ?>
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Spayed / Neuted
                </label>
                <div class=" m-rights">
                    <?php echo $this->Form->input(
                              "UserPets.$guest.spayed_or_neuted",
                               [
                                'type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                //"options"=>["unknow"=>"Unknown","yes"=>"Yes","no"=>"No"],
                                'options'=>[
										[
											'value'=>'unknow',
											'text'=>'Unknow',
											'class'=>'ma2'
										],
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['spayed_or_neuted'] !=''?@$guest_data['spayed_or_neuted']:'no'
                    ]); ?>
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Flea Treated
                </label>
                <div class=" m-rights">
                     <?php echo $this->Form->input(
                              "UserPets.$guest.flea_treated",
                               [
                                'type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['flea_treated'] !=''?@$guest_data['flea_treated']:'no'
                    ]); 
                  ?> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Vaccinated
                </label>
                <div class=" m-rights"> 
                  <?php echo $this->Form->input(
                              "UserPets.$guest.vaccinated",
                               [
                                'type'=>"radio",
                                'label'=>false,
                                'required'=>false,
                                'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                                'default' => 'no',
                                'hiddenField'=>false,
                                'templates' => ['inputContainer' => '{{content}}'],
                                'value'=>@$guest_data['vaccinated'] !=''?@$guest_data['vaccinated']:'no'
                    ]); 
                  ?> 
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">House Trained
                </label>
                <div class=" m-rights">
                  <?php echo $this->Form->input(
                        "UserPets.$guest.house_trained",
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          //"options"=>["yes"=>"Yes","no"=>"No","addition_detail_needed"=>"Additional detail if needed"],
                          'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										],
										[
											'value'=>'addition_detail_needed',
											'text'=>'Additional detail if needed',
											'class'=>'ma2'
										]
									],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['house_trained'] !=''?@$guest_data['house_trained']:'no'
                    ]); 
                  ?>  
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Mediacation
                </label>
                <div class=" m-rights">
                  <?php echo $this->Form->input(
                        "UserPets.$guest.mediacation",
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          'options'=>[
										[
											'value'=>'yes',
											'text'=>'Yes',
											'class'=>'ma2'
										],
										[
											'value'=>'no',
											'text'=>'No',
											'class'=>'ma2'
										]
									],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['mediacation'] !=''?@$guest_data['mediacation']:'no'
                    ]); 
                  ?> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Veterinary Name and Contact Info
                </label>
                <?php echo $this->Form->input(
                        "UserPets.$guest.veterinary_name",
                         [
                          'type'=>"text",
                          'label'=>false,
                          'required'=>false,
                          'class'=>'form-control input-rt',
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['veterinary_name'] !=''?@$guest_data['veterinary_name']:''
                    ]); 
                ?> 
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Friendly with
                </label>
                <div class=" m-rights">
                  <?php echo $this->Form->input(
                        "UserPets.$guest.friendly_with",
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          'options'=>[
										[
											'value'=>'dog',
											'text'=>'dog',
											'class'=>'ma2'
										],
										[
											'value'=>'cat',
											'text'=>'cat',
											'class'=>'ma2'
										],
										[
											'value'=>'-10yrs',
											'text'=>'Kids -10yrs',
											'class'=>'ma2'
										],
										[
											'value'=>'+10yrs',
											'text'=>'Kids +10yrs',
											'class'=>'ma2'
										]
									],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['friendly_with'] !=''?@$guest_data['friendly_with']:'dog'
                    ]); 
                  ?> 
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-12">
                <label class="pp-w" for="">Add care instructions for "guests name"  
                </label>
                <?php echo $this->Form->input(
                        "UserPets.$guest.care_instructions",
                         [
                          'type'=>"text",
                          'label'=>false,
                          'required'=>false,
                          'class'=>'form-control input-rt',
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['care_instructions'] !=''?@$guest_data['care_instructions']:''
                    ]); 
                ?>
              </div>
            </div>
           </div>
          </div><h3></h3>
           <?php 
                 $o++;
                }
              }
            ?>
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="add-multiple">
                  <h4>
                    <a href="javascript:void(0)" id="addMultipleGuest">
                      <i class="fa fa-plus-circle font-fa">
                      </i>&nbsp; Add Multiple Guest
                    </a>
                  </h4>
                </div>
              </div>
            </div>
            <div  id="addAfter">
            </div>
            <div class="row">
                    <p class="col-lg-12 sp-tb">
                    <a href="<?php   echo HTTP_ROOT.'dashboard/house'; ?>"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?></button></a>
                    <input class="pull-right btn Continue" type="submit" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?>" /></p>
            </div>
          
        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!--Form for upload Photo Library-->

<script>
	
  $(document).on('click','.browseImg',function(){
    $("#guest_images").trigger("click"); 
    var j = $(this).attr('data-rel');
            $('#browseImgDataRel').val(j);
  });
  $(document).ready(function(){
	  
	  
     //For browse images and save guest images
      $('#guest_images').on('change',function(){
        var j = $("#browseImgDataRel").val();
        
        var guest_images = $('#images_preview_'+j).html();
        
        jQuery('#multiple_upload_form').ajaxForm({
        //display the uploaded images
        //target:'#images_preview',
        beforeSubmit:function(e){
          $('.uploading').show();
        },
        success:function(res){
			//alert(res);
          console.log(res);
        
        var data = jQuery.parseJSON(res);
        if($.trim(data[0]) != ''){
		  $('#show-all-errors_'+j).html("");	
          $('#show-all-errors_'+j).html(data[0]); //DISPLAY SUCCESS MESSAGE

        }
        if($.trim(data[1]) != ""){
		  $('#show-all-errors_'+j).html("");	
          $('#images_preview_'+j).html(data[1]); //DISPLAY SUCCESS MESSAGE

        }
        /*if($.trim(data[1]) != 'no_upload'){
			$('#images_preview_'+j).html(guest_images);
		}*/
           $('.uploading').hide();
        },
        error:function(e){
        }
      }).submit();
    });
    
    //DELETE Guest Record
    $(document).on('click', '.deleteOtherRecord', function() 
    {
      $('#'+$(this).attr('data-rel')).remove();
    });
    /*End*/
     $("#addMultipleGuest").on('click',function(){
		 var i=$( ".ajaxAdd" ).length;
        i = parseInt(i)+1;
       
					
                /* <select id="userpets-guest'+i+'-guest-breed" class="form-control required" name="UserPets[Guest'+i+'][guest_breed]"><option value="">---</option><option value="afgan">Afghan Hound</option><option value="affen">Affenpinscher</option><option value="african">Africans</option><option value="aidi">Aidi</option></select>*/
					
				 
                 
      
      $("#addAfter").append('<div id="ajaxAdd'+i+'" class="ajaxAdd"><h3><strong>Guest Info</strong><button data-rel="ajaxAdd'+i+'" class="deleteOtherRecord pull-lg-right btn btn-danger" type="button" style="float:right">Delete </button></h3><div class="clearfix"></div><div class="row"> <div class="form-group col-lg-4 col-md-6"> <label for="userpets-guest'+i+'-guest-name">Guest Name </label> <input type="text" id="userpets-guest'+i+'-guest-name" class="form-control required" name="UserPets[Guest'+i+'][guest_name]"> </div><div class="form-group col-lg-4 col-md-6"> <label for="userpets-guest'+i+'-guest-type">Type </label> <select data-rel="showHideBreed'+i+'" id="userpets-guest'+i+'-guest-type" class="selectPetType form-control required" name="UserPets[Guest'+i+'][guest_type]"><option value="">---</option><option value="dog">Dog</option><option value="cat">Cat</option><option value="horse">Horse</option><option value="rabbit">Rabbit</option><option value="guinee_pig">Guinne Pig</option><option value="ferret">Ferret</option><option value="bird">Bird</option><option value="reptile">Reptile</option><option value="farm_animal">Farm Animal</option></select> </div><div class="form-group col-lg-4 col-md-6 showHideBreed'+i+'" style="display:none"> <label for="userpets-guest'+i+'-guest-breed">Breed </label><input class="form-control required" id="userpets-guest'+i+'-guest-breed" type="text" name="UserPets[Guest'+i+'][guest_breed]" value="" ></div></div><div class="row"> <div class="form-group col-lg-4 col-md-6"> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 showHideBreed'+i+'" style="display:none"> <label for="userpets-guest'+i+'-guest-weight">Size </label><select id="userpets-guest'+i+'-guest-weight" class="form-control required" name="UserPets[Guest'+i+'][guest_weight]"><option selected="selected" value="">---</option><option value="0-7">Small(0-7kg)</option><option value="8-18">Medium(8-18kg)</option><option value="18-45">Large(18-45kg)</option><option value="45+">Giant(45+kg)</option><option value="aidi">Aidi</option></select></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <label for="userpets-guest'+i+'-guest-years">Age </label> <input type="text" id="userpets-guest'+i+'-guest-years" class="form-control required number" name="UserPets[Guest'+i+'][guest_years]"> </div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <label for="userpets-guest'+i+'-guest-months">&nbsp; </label> <input type="text" id="userpets-guest'+i+'-guest-months" class="form-control required number" name="UserPets[Guest'+i+'][guest_months]"> </div></div></div></div></div><div class="form-group col-lg-4 col-md-6"> <div class="row"> <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <label for="">Gender </label> <div class="row"> <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> <div class="input-group"> <span class="input-group-addon"> <input checked type="radio" aria-label="..." name="UserPets[Guest'+i+'][guest_gender]" value="male"> </span> <input type="text" disabled="" aria-label="..." value="Male" class="form-control"> </div></div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> <div class="input-group"> <span class="input-group-addon"> <input type="radio" aria-label="..." name="UserPets[Guest'+i+'][guest_gender]" value="female"> </span> <input type="text" disabled="" aria-label="..." value="Female" class="form-control"> </div></div></div></div></div></div></div><div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="userpets-guest'+i+'-guest-description">Short Description </label> <textarea rows="5" id="userpets-guest'+i+'-guest-description" class="form-control height-area about_txtarea" name="UserPets[Guest'+i+'][guest_description]"></textarea><p id="userpets-guest'+i+'-guest-description_text" class="w-limit">74 words remainings</p></div><div class="form-group col-lg-4 col-md-6"> <label for="images_preview_'+i+'">Photo Library </label> <div id="images_preview_'+i+'" class="row"> <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img alt="img" class="img-responsive center-block text-center" src="<?php echo HTTP_ROOT; ?>/img/profile-dummy.png"> </div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img alt="img" class="img-responsive center-block text-center" src="<?php echo HTTP_ROOT; ?>/img/profile-dummy.png"> </div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img alt="img" class="img-responsive center-block text-center" src="<?php echo HTTP_ROOT; ?>/img/profile-dummy.png"> </div></div></div><div class="form-group col-lg-4 col-md-12"> <p class="upload-txt">It is a long established fact that a reader will be by the page when looking at its layout. </p><button type="button" class="btn btn-prof-upload browseImg" data-rel="'+i+'"> <i class="fa fa-upload "> </i> &nbsp;&nbsp; Upload Image </button> <div id="show-all-errors_'+i+'" class="row"> </div></div></div><h3>Extended Profile </h3> <div class="extend"> <div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Microchipped </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-microchipped-unknow"><input class="ma2" type="radio" id="userpets-guest'+i+'-microchipped-unknow" value="unknow" name="UserPets[Guest'+i+'][microchipped]">Unknown</label><label for="userpets-guest'+i+'-microchipped-yes"><input type="radio" class="ma2" id="userpets-guest'+i+'-microchipped-yes" value="yes" name="UserPets[Guest'+i+'][microchipped]">Yes</label><label for="userpets-guest'+i+'-microchipped-no"><input class="ma2" type="radio" checked="checked" id="userpets-guest'+i+'-microchipped-no" value="no" name="UserPets[Guest'+i+'][microchipped]">No</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Spayed / Neuted </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-spayed-or-neuted-unknow"><input class="ma2" type="radio" id="userpets-guest'+i+'-spayed-or-neuted-unknow" value="unknow" name="UserPets[Guest'+i+'][spayed_or_neuted]">Unknown</label><label for="userpets-guest'+i+'-spayed-or-neuted-yes"><input type="radio" class="ma2" id="userpets-guest'+i+'-spayed-or-neuted-yes" value="yes" name="UserPets[Guest'+i+'][spayed_or_neuted]">Yes</label><label for="userpets-guest'+i+'-spayed-or-neuted-no"><input type="radio" class="ma2" checked="checked" id="userpets-guest'+i+'-spayed-or-neuted-no" value="no" name="UserPets[Guest'+i+'][spayed_or_neuted]">No</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Flea Treated </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-flea-treated-yes"><input type="radio" class="ma2" id="userpets-guest'+i+'-flea-treated-yes" value="yes" name="UserPets[Guest'+i+'][flea_treated]">Yes</label><label for="userpets-guest'+i+'-flea-treated-no"><input type="radio" class="ma2" checked="checked" id="userpets-guest'+i+'-flea-treated-no" value="no" name="UserPets[Guest'+i+'][flea_treated]">No</label> </div></div></div><div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Vaccinated </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-vaccinated-yes"><input type="radio" class="ma2" id="userpets-guest'+i+'-vaccinated-yes" value="yes" name="UserPets[Guest'+i+'][vaccinated]">Yes</label><label for="userpets-guest'+i+'-vaccinated-no"><input class="ma2" type="radio" checked="checked" id="userpets-guest'+i+'-vaccinated-no" value="no" name="UserPets[Guest'+i+'][vaccinated]">No</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">House Trained </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-house-trained-yes"><input type="radio" class="ma2" id="userpets-guest'+i+'-house-trained-yes" value="yes" name="UserPets[Guest'+i+'][house_trained]">Yes</label><label for="userpets-guest'+i+'-house-trained-no"><input type="radio" class="ma2" checked="checked" id="userpets-guest'+i+'-house-trained-no" value="no" name="UserPets[Guest'+i+'][house_trained]">No</label><label for="userpets-guest'+i+'-house-trained-addition_detail_needed"><input class="ma2" type="radio" id="userpets-guest'+i+'-house-trained-addition_detail_needed" value="addition_detail_needed" name="UserPets[Guest'+i+'][house_trained]">Additional detail if needed</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Mediacation </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-mediacation-yes"><input type="radio" class="ma2" id="userpets-guest'+i+'-mediacation-yes" value="yes" name="UserPets[Guest'+i+'][mediacation]">Yes</label><label for="userpets-guest'+i+'-mediacation-no"><input type="radio" checked="checked" class="ma2" id="userpets-guest'+i+'-mediacation-no" value="no" name="UserPets[Guest'+i+'][mediacation]">No</label> </div></div></div><div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Veterinary Name and Contact Info </label> <input type="text" id="userpets-guest'+i+'-veterinary-name" class="form-control input-rt required" name="UserPets[Guest'+i+'][veterinary_name]"> </div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Friendly with </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-friendly-with-dog"><input checked type="radio" class="ma2" id="userpets-guest'+i+'-friendly-with-dog" value="dog" name="UserPets[Guest'+i+'][friendly_with]">Dog</label><label for="userpets-guest'+i+'-friendly-with-cat"><input type="radio" class="ma2" id="userpets-guest'+i+'-friendly-with-cat" value="cat" name="UserPets[Guest'+i+'][friendly-with]">Cat</label><label for="userpets-guest'+i+'-friendly-with--10yrs"><input type="radio" class="ma2" id="userpets-guest'+i+'-friendly-with--10yrs" value="-10yrs" name="UserPets[Guest'+i+'][friendly-with]">Kids -10yrs</label><label for="userpets-guest'+i+'-friendly-with-+10yrs"><input type="radio" class="ma2" id="userpets-guest'+i+'-friendly-with-+10yrs" value="+10yrs" name="UserPets[Guest'+i+'][friendly-with]">Kids +10yrs</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Add care instructions for "guests name" </label> <input type="text" id="userpets-guest'+i+'-care-instructions" class="form-control input-rt required" name="UserPets[Guest'+i+'][care_instructions]"></div></div></div><h3></h3></div>');
      
      setTimeout(function(){
				$('#userpets-guest'+i+'-guest-breed').tokenfield({
				  autocomplete: {
				  source: <?php echo $allBreed = json_encode($dog_breeds); ?>,
				  delay: 100
				},
				  showAutocompleteOnFocus: true,

				});
				$('#userpets-guest'+i+'-guest-breed').on('tokenfield:createtoken', function (event){
				  var existingTokens = $(this).tokenfield('getTokens');
				  $.each(existingTokens, function(index, token) {
					  if (token.value === event.attrs.value)
						  event.preventDefault();
				 });
				});
		  
	  },200);

      
    }); 
  });
  
	$(document).on('change','.selectPetType',function(){
		
        var data_rel = $(this).attr('data-rel');
        var type_val = $(this).val();
        if(type_val == "dog"){
		    $("."+data_rel).show();
			//$("#userpets-guest1-guest-breed").css('display','none');
		}else{
			$("."+data_rel).hide();
		}
      });
      //Word count
   function wprdCount(textClass){
		var regex = /\s+/gi;
		var maxWords = 75;
		
		var value = $(textClass).val();
        var id = $(textClass).next().attr('id');
        console.log(id);
        if (value.length == 0) {
			$("#"+id).text(  75+" words remainings" );  
			return ;
		}
      var wordCount = value.trim().replace(regex, ' ').split(' ').length;
		
		if( wordCount < 76 ){
		    $("#"+id).text(maxWords - wordCount+" words remainings");
		}
		else{
			alert("You've reached the maximum allowed words. Extra words removed.");
			return false;
			
		}
	 }
	$(document).on('keyup','.about_txtarea',function(){
		  wprdCount(this);
	});
	
</script>



<!--<script>
$(document).ready(function() {

  $('#userpets-guest1-guest-breed').tokenfield('setTokens', [{"value":"1","label":"Small pets(0-7kg)"}]);
});
</script>-->


<!--Start multiple upload-->
                  <?php echo $this->Form->create(@$sitter_info, [
                      'url' => ['controller' => 'dashboard', 'action' => 'add-pets'],
                      'name'=>'multiple_upload_form',
                      'id'=>'multiple_upload_form',
                      'enctype'=>"multipart/form-data",
                      'style'=>'display:none'
                  ]);?>

                      <input type="hidden" name="image_form_submit" value="1"/>

                      <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Choose Image')); ?></label>
                      <input type="file" name="images[]" id="guest_images" multiple >
                      <input type="hidden" name="guest" value="" id="browseImgDataRel">
                      <div class="uploading none">
                          <label>&nbsp;</label>
                          <img src="uploading.gif" alt="uploading......"/>
                      </div>
                      <?php echo $this->Form->end(); ?>
<!--end form photo library-->

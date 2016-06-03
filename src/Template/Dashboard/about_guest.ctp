<?php //echo "<pre>";print_r($guest_data);?>
<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" id="content">
  <div class="row">
    <div class="profiletab-section">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png"> 
        <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Profile')); ?>
      </h3>
      <?php echo $this->element('frontElements/profile/sitter_nav');?>
      <div class="tab-sectioninner book-pro">
            <div class="tab-content">

  <div id="menu2" class="tab-pane fade tab-comm active in">
        
        <h2 class="head-font">Now let us know who the sitter will be looking after.
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
                        'class'=>'form-control',
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
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','horse'=>'Horse','rabbit'=>'Rabbit','guinee_pig'=>'Guinne Pig','ferret'=>'Ferret','bird'=>'Bird','reptile'=>'Reptile','farm_animal'=>'Farm Animal'],
                        'class'=>'form-control',
                        'value'=>@$guest_data['guest_type'] !=''?@$guest_data['guest_type']:''
                        ]);
                ?>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Breed
              </label>
              
               <?php echo $this->Form->input('UserPets.Guest1.guest_breed',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','afgan'=>'Afghan Hound','affen'=>'Affenpinscher','african'=>'Africans','aidi'=>'Aidi'],
                        'class'=>'form-control',
                        'value'=>@$guest_data['guest_breed'] !=''?@$guest_data['guest_breed']:''
                        ]);
                ?>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-4 col-md-6">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="">Weight
                  </label>
                  <?php echo $this->Form->input('UserPets.Guest1.guest_weight',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control',
                        'value'=>@$guest_data['guest_weight'] !=''?@$guest_data['guest_weight']:''
                        ]);
                  ?>
                </div>
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
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control',
                        'value'=>@$guest_age_arr[0]
                        ]);
                      ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">&nbsp 
                      </label>
                      <?php echo $this->Form->input('UserPets.Guest1.guest_months',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control',
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
                      }
                      if(@$guest_data['guest_gender'] == 'female'){
                          $fchecked = 'checked';
                      } ?>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <input <?php echo @$mchecked; ?> value="male" name="UserPets[Guest1][guest_gender]" type="radio" aria-label="...">
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
                        'class'=>'form-control height-area',
                        'value'=>@$guest_data['guest_description'] !=''?@$guest_data['guest_description']:''
                        ]);
              ?>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Photo Library
              </label>
              <div class="row" id="images_preview_1" >
                 <?php echo @$pet_images; ?>
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
                                "options"=>["unknow"=>"Unknown","yes"=>"Yes","no"=>"No"],
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
                                "options"=>["unknow"=>"Unknown","yes"=>"Yes","no"=>"No"],
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
                                "options"=>["yes"=>"Yes","no"=>"No"],
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
                                "options"=>["yes"=>"Yes","no"=>"No"],
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
                          "options"=>["yes"=>"Yes","no"=>"No","addition_detail_needed"=>"Additional detail if needed"],
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
                          "options"=>["yes"=>"Yes","no"=>"No"],
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
                        'UserPets.Guest1.friendly_with',
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          "options"=>["dog"=>"Dog","cat"=>"Cat","-10yrs"=>"Kids -10yrs","+10yrs"=>"Kids +10yrs"],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['friendly_with'] !=''?@$guest_data['friendly_with']:''
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
                          'class'=>'form-control input-rt',
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
          ?>
          <div id="ajaxAdd1" class="row ajaxAdd">
           <?php 
            if($o != '1'){ ?> 
            <h3><strong>Guest Info</strong><button onclick="location.href='<?php echo HTTP_ROOT.'dashboard/delete-guest/'.base64_encode(convert_uuencode(@$guest_data->id)); ?>'" data-rel="ajaxAdd<?php $o; ?>" class="deleteOtherRecord pull-lg-right btn btn-danger" type="button" style="float:right">Delete </button></h3>
          <?php } ?>
           <div class="row">
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Guest Name
              </label>
              <?php echo $this->Form->input('UserPets.Guest1.guest_name',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control',
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
                        'options'=>[''=>'---','dog'=>'Dog','cat'=>'Cat','horse'=>'Horse','rabbit'=>'Rabbit','guinee_pig'=>'Guinne Pig','ferret'=>'Ferret','bird'=>'Bird','reptile'=>'Reptile','farm_animal'=>'Farm Animal'],
                        'class'=>'form-control',
                        'value'=>@$guest_data['guest_type'] !=''?@$guest_data['guest_type']:''
                        ]);
                ?>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Breed
              </label>
                <?php echo $this->Form->input('UserPets.Guest1.guest_breed',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','afgan'=>'Afghan Hound','affen'=>'Affenpinscher','african'=>'Africans','aidi'=>'Aidi'],
                        'class'=>'form-control',
                        'value'=>@$guest_data['guest_breed'] !=''?@$guest_data['guest_breed']:''
                        ]);
                ?>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-4 col-md-6">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="">Weight
                  </label>
                  <?php echo $this->Form->input('UserPets.Guest1.guest_weight',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control',
                        'value'=>@$guest_data['guest_weight'] !=''?@$guest_data['guest_weight']:''
                        ]);
                  ?>
                </div>
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
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control',
                        'value'=>@$guest_age_arr[0]
                        ]);
                      ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="">&nbsp 
                      </label>
                      <?php echo $this->Form->input('UserPets.Guest1.guest_months',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'number',
                        'label' => false,
                        'required' => false,
                        'class'=>'form-control',
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
                      }
                      if(@$guest_data['guest_gender'] == 'female'){
                          $fchecked = 'checked';
                      } ?>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <input <?php echo @$mchecked; ?> value="male" name="UserPets[Guest1][guest_gender]" type="radio" aria-label="...">
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
                        'class'=>'form-control height-area',
                        'value'=>@$guest_data['guest_description'] !=''?@$guest_data['guest_description']:''
                        ]);
              ?>
            </div>
            <div class="form-group col-lg-4 col-md-6">
              <label for="">Photo Library
              </label>
              <div class="row" id="images_preview_1" >
                 <?php echo @$pet_images; ?>
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
                                "options"=>["unknow"=>"Unknown","yes"=>"Yes","no"=>"No"],
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
                                "options"=>["unknow"=>"Unknown","yes"=>"Yes","no"=>"No"],
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
                                "options"=>["yes"=>"Yes","no"=>"No"],
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
                                "options"=>["yes"=>"Yes","no"=>"No"],
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
                          "options"=>["yes"=>"Yes","no"=>"No","addition_detail_needed"=>"Additional detail if needed"],
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
                          "options"=>["yes"=>"Yes","no"=>"No"],
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
                        'UserPets.Guest1.friendly_with',
                         [
                          'type'=>"radio",
                          'label'=>false,
                          'required'=>false,
                          "options"=>["dog"=>"Dog","cat"=>"Cat","-10yrs"=>"Kids -10yrs","+10yrs"=>"Kids +10yrs"],
                          'default' => 'no',
                          'hiddenField'=>false,
                          'templates' => ['inputContainer' => '{{content}}'],
                          'value'=>@$guest_data['friendly_with'] !=''?@$guest_data['friendly_with']:''
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
                    <a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?></button></a>
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

   
    //////////////////////////////
     //For browse images and save guest images
      $('#guest_images').on('change',function(){
        var j = $("#browseImgDataRel").val();
         
        jQuery('#multiple_upload_form').ajaxForm({
        //display the uploaded images
        //target:'#images_preview',
        beforeSubmit:function(e){
          $('.uploading').show();
        },
        success:function(res){
          console.log(res);
          //alert(res);
        var data = jQuery.parseJSON(res);
        //alert(data);
        if($.trim(data[0]) != ''){
          $('#show-all-errors_'+j).html(data[0]); //DISPLAY SUCCESS MESSAGE

        }
        if($.trim(data[1]) != ' '){
          $('#images_preview_'+j).html(data[1]); //DISPLAY SUCCESS MESSAGE

        }
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
    //////////////////////////////
         
    $("#addMultipleGuest").on('click',function(){
      var i=$( ".ajaxAdd" ).length;
      i = parseInt(i)+1;
      $("#addAfter").append('<div id="ajaxAdd'+i+'" class="ajaxAdd"><h3><strong>Guest Info</strong><button data-rel="ajaxAdd'+i+'" class="deleteOtherRecord pull-lg-right btn btn-danger" type="button" style="float:right">Delete </button></h3><div class="row"> <div class="form-group col-lg-4 col-md-6"> <label for="userpets-guest'+i+'-guest-name">Guest Name </label> <input type="text" id="userpets-guest'+i+'-guest-name" class="form-control" name="UserPets[Guest'+i+'][guest_name]"> </div><div class="form-group col-lg-4 col-md-6"> <label for="userpets-guest'+i+'-guest-type">Type </label> <select id="userpets-guest'+i+'-guest-type" class="form-control" name="UserPets[Guest'+i+'][guest_type]"><option value="">---</option><option value="dog">Dog</option><option value="cat">Cat</option><option value="horse">Horse</option><option value="rabbit">Rabbit</option><option value="guinee_pig">Guinne Pig</option><option value="ferret">Ferret</option><option value="bird">Bird</option><option value="reptile">Reptile</option><option value="farm_animal">Farm Animal</option></select> </div><div class="form-group col-lg-4 col-md-6"> <label for="userpets-guest'+i+'-guest-breed">Breed </label> <select id="userpets-guest'+i+'-guest-breed" class="form-control" name="UserPets[Guest'+i+'][guest_breed]"><option value="">---</option><option value="afgan">Afghan Hound</option><option value="affen">Affenpinscher</option><option value="african">Africans</option><option value="aidi">Aidi</option></select> </div></div><div class="row"> <div class="form-group col-lg-4 col-md-6"> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <label for="userpets-guest'+i+'-guest-weight">Weight </label> <input type="number" id="userpets-guest'+i+'-guest-weight" class="form-control" name="UserPets[Guest'+i+'][guest_weight]"> </div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <label for="userpets-guest'+i+'-guest-years">Age </label> <input type="number" id="userpets-guest'+i+'-guest-years" class="form-control" name="UserPets[Guest'+i+'][guest_years]"> </div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <label for="userpets-guest'+i+'-guest-months">&nbsp; </label> <input type="number" id="userpets-guest'+i+'-guest-months" class="form-control" name="UserPets[Guest'+i+'][guest_months]"> </div></div></div></div></div><div class="form-group col-lg-4 col-md-6"> <div class="row"> <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <label for="">Gender </label> <div class="row"> <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> <div class="input-group"> <span class="input-group-addon"> <input type="radio" aria-label="..." name="UserPets[Guest'+i+'][guest_gender]" value="male"> </span> <input type="text" disabled="" aria-label="..." value="Male" class="form-control"> </div></div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> <div class="input-group"> <span class="input-group-addon"> <input type="radio" aria-label="..." name="UserPets[Guest'+i+'][guest_gender]" value="female"> </span> <input type="text" disabled="" aria-label="..." value="Female" class="form-control"> </div></div></div></div></div></div></div><div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="userpets-guest'+i+'-guest-description">Short Description </label> <textarea rows="5" id="userpets-guest'+i+'-guest-description" class="form-control height-area" name="UserPets[Guest'+i+'][guest_description]"></textarea> </div><div class="form-group col-lg-4 col-md-6"> <label for="images_preview_'+i+'">Photo Library </label> <div id="images_preview_'+i+'" class="row"> <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img alt="img" class="img-responsive center-block text-center" src="http://localhost/sitter_guide/img/uploads/v6b3490M9BpsfeS.png"> </div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img alt="img" class="img-responsive center-block text-center" src="http://localhost/sitter_guide/img/uploads/QSmtcaJhh8HyndR.png"> </div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img alt="img" class="img-responsive center-block text-center" src="http://localhost/sitter_guide/img/uploads/nCWdo0zAJjivvCF.jpeg"> </div></div></div><div class="form-group col-lg-4 col-md-12"> <p class="upload-txt">It is a long established fact that a reader will be by the page when looking at its layout. </p><button type="button" class="btn btn-prof-upload browseImg" data-rel="'+i+'"> <i class="fa fa-upload "> </i> &nbsp;&nbsp; Upload Image </button> <div id="show-all-errors_'+i+'" class="row"> </div></div></div><h3>Extended Profile </h3> <div class="extend"> <div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Microchipped </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-microchipped-unknow"><input type="radio" id="userpets-guest'+i+'-microchipped-unknow" value="unknow" name="UserPets[Guest'+i+'][microchipped]">Unknown</label><label for="userpets-guest'+i+'-microchipped-yes"><input type="radio" id="userpets-guest'+i+'-microchipped-yes" value="yes" name="UserPets[Guest'+i+'][microchipped]">Yes</label><label for="userpets-guest'+i+'-microchipped-no"><input type="radio" checked="checked" id="userpets-guest'+i+'-microchipped-no" value="no" name="UserPets[Guest'+i+'][microchipped]">No</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Spayed / Neuted </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-spayed-or-neuted-unknow"><input type="radio" id="userpets-guest'+i+'-spayed-or-neuted-unknow" value="unknow" name="UserPets[Guest'+i+'][spayed_or_neuted]">Unknown</label><label for="userpets-guest'+i+'-spayed-or-neuted-yes"><input type="radio" id="userpets-guest'+i+'-spayed-or-neuted-yes" value="yes" name="UserPets[Guest'+i+'][spayed_or_neuted]">Yes</label><label for="userpets-guest'+i+'-spayed-or-neuted-no"><input type="radio" checked="checked" id="userpets-guest'+i+'-spayed-or-neuted-no" value="no" name="UserPets[Guest'+i+'][spayed_or_neuted]">No</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Flea Treated </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-flea-treated-yes"><input type="radio" id="userpets-guest'+i+'-flea-treated-yes" value="yes" name="UserPets[Guest'+i+'][flea_treated]">Yes</label><label for="userpets-guest'+i+'-flea-treated-no"><input type="radio" checked="checked" id="userpets-guest'+i+'-flea-treated-no" value="no" name="UserPets[Guest'+i+'][flea_treated]">No</label> </div></div></div><div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Vaccinated </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-vaccinated-yes"><input type="radio" id="userpets-guest'+i+'-vaccinated-yes" value="yes" name="UserPets[Guest'+i+'][vaccinated]">Yes</label><label for="userpets-guest'+i+'-vaccinated-no"><input type="radio" checked="checked" id="userpets-guest'+i+'-vaccinated-no" value="no" name="UserPets[Guest'+i+'][vaccinated]">No</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">House Trained </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-house-trained-yes"><input type="radio" id="userpets-guest'+i+'-house-trained-yes" value="yes" name="UserPets[Guest'+i+'][house_trained]">Yes</label><label for="userpets-guest'+i+'-house-trained-no"><input type="radio" checked="checked" id="userpets-guest'+i+'-house-trained-no" value="no" name="UserPets[Guest'+i+'][house_trained]">No</label><label for="userpets-guest'+i+'-house-trained-addition_detail_needed"><input type="radio" id="userpets-guest'+i+'-house-trained-addition_detail_needed" value="addition_detail_needed" name="UserPets[Guest'+i+'][house_trained]">Additional detail if needed</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Mediacation </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-mediacation-yes"><input type="radio" id="userpets-guest'+i+'-mediacation-yes" value="yes" name="UserPets[Guest'+i+'][mediacation]">Yes</label><label for="userpets-guest'+i+'-mediacation-no"><input type="radio" checked="checked" id="userpets-guest'+i+'-mediacation-no" value="no" name="UserPets[Guest'+i+'][mediacation]">No</label> </div></div></div><div class="row"> <div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Veterinary Name and Contact Info </label> <input type="text" id="userpets-guest'+i+'-veterinary-name" class="form-control input-rt" name="UserPets[Guest'+i+'][veterinary_name]"> </div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Friendly with </label> <div class=" m-rights"> <label for="userpets-guest'+i+'-friendly-with-dog"><input type="radio" id="userpets-guest'+i+'-friendly-with-dog" value="dog" name="UserPets[Guest'+i+'][friendly_with]">Dog</label><label for="userpets-guest'+i+'-friendly-with-cat"><input type="radio" id="userpets-guest'+i+'-friendly-with-cat" value="cat" name="UserPets[Guest'+i+'][friendly-with]">Cat</label><label for="userpets-guest'+i+'-friendly-with--10yrs"><input type="radio" id="userpets-guest'+i+'-friendly-with--10yrs" value="-10yrs" name="UserPets[Guest'+i+'][friendly-with]">Kids -10yrs</label><label for="userpets-guest'+i+'-friendly-with-+10yrs"><input type="radio" id="userpets-guest'+i+'-friendly-with-+10yrs" value="+10yrs" name="UserPets[Guest'+i+'][friendly-with]">Kids +10yrs</label> </div></div><div class="form-group col-lg-4 col-md-12"> <label for="" class="pp-w">Add care instructions for "guests name" </label> <input type="text" id="userpets-guest'+i+'-care-instructions" class="form-control input-rt" name="UserPets[Guest'+i+'][care_instructions]"></div></div></div><h3></h3></div>');

      
    }); 
  });
</script>
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
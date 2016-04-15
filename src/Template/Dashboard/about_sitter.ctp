
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
                <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">Sitter Profile</h3>
                
                 <?php echo $this->element('frontElements/profile/sitter_nav');?>
          
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">

<div id="menu2" class="tab-pane fade tab-comm active in">
             
                  <!--<form role="form">-->
                   <?php echo $this->Form->create(@$sitter_info, [
                      'url' => ['controller' => 'dashboard', 'action' => 'about-sitter'],
                      'role'=>'form',
                      'id'=>'aboutSitter'
                  ]);?>

                     <?php echo $this->Form->input('UserAboutSitters.id',[
                             'type'=>'hidden'
                        ]);
                      ?>

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Accepted Pet Sizes</label>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserAboutSitters.accepted_pet_size',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','small_pets'=>'I accept small pets(0-7kg)','medium_pets'=>'I accept Medium pets (8-18kg)','large_pets'=>'I accept Large dogs (18-45kg)','gaint_dogs'=>'I accept Giant dogs (45+kg)','cats'=>'I accept cats','puppies_under_1_year'=>'I accept puppies under 1 year','kittens_under_1_year'=>'I accept kittens under 1 year','ferrets'=>'I accept ferrets','small_animals'=>'I accept small animals (rodents, rabbits birds…)','other'=>'Other (specify)','any'=>'Any'],
                        'class'=>'form-control'
                        ]);
                      ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Preferred Guest Ages  </label>
                         <!-- <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserAboutSitters.preferred_age',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','<1'=>'<1 year','1-3'=>'1-3 years','4-8'=>'4-8 years','9+'=>'9+ years','Any'=>'Any'],
                        'class'=>'form-control']);
                      ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Cancellation Policy</label>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserAboutSitters.cancellation_policy',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flexible'=>'Flexible','moderate'=>'Moderate','strict'=>'Strict'],
                        'class'=>'form-control']);
                      ?>
                    </div>

                  </div>
                  
                   <form role="form">

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Toilet Breaks provided - every  </label>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserAboutSitters.breaks_provided_every',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','0-2'=>'0-2 hours','2-4'=>'2-4 hours','4-8'=>'4-8 hours','8+'=>'8+ hours'],
                        'class'=>'form-control'
                        ]);
                      ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Years of Sitting Experience </label>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                          <?php echo $this->Form->input('UserAboutSitters.sitting_experience',['class'=>'form-control', 'templates' => ['inputContainer' => '{{content}}']/*,
                        'value'=>$sitter_property['Users']['sitting_experience'] !=''?$sitter_property['Users']['sitting_experience']:''*/]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Mixed Familes </label>
                      <!--<input type="text" class="form-control mzero" id="" placeholder="I look after pets from different families">-->
                       <?php echo $this->Form->input('UserAboutSitters.mixed_familes',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>['yes'=>'Yes','no'=>'No'],
                        'class'=>'form-control']);
                      ?>
                       
                    </div>
                  </div>
                  
                  <div class="row">
                        <div class="form-group col-lg-4">
                          <label for="">Describe yourself in 35 characters  </label>
                          <!--<textarea></textarea>-->
                          <?php echo $this->Form->input('UserAboutSitters.your_self',[
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea',
                                 'label'=>false/* ,
                                 'value'=>$sitter_property['Users']['your_self'] !=''?$sitter_property['Users']['your_self']:''
                          */]); ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="">Why should you take care of their guest?    </label>
                          <!--<textarea></textarea>-->
                          <?php echo $this->Form->input('UserAboutSitters.take_care_desc',[
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea',
                                  'label'=>false/*,
                                   'value'=>$sitter_property['Users']['take_care_desc'] !=''?$sitter_property['Users']['take_care_desc']:'' */
                                 ]); ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="">Sitter Guide Carers Package </label>
                          <!--<textarea></textarea>-->
                               <?php echo $this->Form->input('UserAboutSitters.carers_description',[
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea',
                                  'label'=>false/* ,
                                 'value'=>$sitter_property['Users']['carers_description'] !=''?$sitter_property['Users']['carers_description']:''*/
                          ]); ?>
                        </div>

                    
                  </div>

                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Accept Un-Neutered Pets  </label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                     <span class="pull-right m-rights">
                     <?php echo $this->Form->radio(
                              'UserAboutSitters.un_neutered_pets',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']/* ,
                               'value'=>$house_details['Houses']['sitter']['un_neutered_pets'] !=''?$house_details['Houses']['sitter']['un_neutered_pets']:''                        */    
                            ]); ?></span>
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Accept un-spayed females </label>
                   <!-- <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                   <span class="pull-right m-rights">
                     <?php echo $this->Form->radio(
                              'UserAboutSitters.un_spayed_females',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']/* ,
                               'value'=>$house_details['Houses']['sitter']['un_neutered_pets'] !=''?$house_details['Houses']['sitter']['un_neutered_pets']:''                        */    
                            ]); ?></span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Birds in cages?</label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->radio(
                              'UserAboutSitters.birds_in_cages',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  /* ,
                        'value'=>$sitter_property['UserProperties']['birds_in_cages'] !=''?$sitter_property['UserProperties']['birds_in_cages']:''    */                       ]
                    ); ?>
                    </span>
                    </div>
                    
                  </div>


                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Accept females on heat </label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                     <span class="pull-right m-rights">
                     <?php echo $this->Form->radio(
                              'UserAboutSitters.females_on_heat',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] /* ,
                        'value'=>$house_details['Houses']['sitter']['females_on_heat'] !=''?$house_details['Houses']['sitter']['females_on_heat']:'' */                           
                      ]); ?> 
                    </span>
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Accept un-toilet trained pets   </label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span>-->
                     <span class="pull-right m-rights">
                      <?php echo $this->Form->radio(
                              'UserAboutSitters.un_trained_pets',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']/* ,
                        'value'=>$house_details['Houses']['sitter']['un_trained_pets'] !=''?$house_details['Houses']['sitter']['un_trained_pets']:''*/                             
                        ]); ?>  
                        </span>
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Dogs in home?</label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                     <span class="pull-right m-rights">
                     <?php echo $this->Form->radio(
                              'UserAboutSitters.dogs_in_home',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  /* ,
                        'value'=>$sitter_property['UserProperties']['dogs_in_home'] !=''?$sitter_property['UserProperties']['dogs_in_home']:''                   */        ]
                          ); ?>
                     </span> 
                    </div>
                    
                  </div>

                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Last Minute Bookings  </label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                     <span class="pull-right m-rights">
                     <?php echo $this->Form->radio(
                              'UserAboutSitters.last_minute_booking',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']/* ,
                        'value'=>$house_details['Houses']['sitter']['last_minute_booking'] !=''?$house_details['Houses']['sitter']['last_minute_booking']:'' */                           
                     ]); ?> 
                     </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Longer than 1 week stays  </label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                     <span class="pull-right m-rights">
                     <?php echo $this->Form->radio(
                              'UserAboutSitters.longer_than_week',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] /*,
                        'value'=>$house_details['Houses']['sitter']['longer_than_week'] !=''?$house_details['Houses']['sitter']['longer_than_week']:''           */               
                          ]); ?>     
                  </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Cats in home?</label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                     <span class="pull-right m-rights">
                     <?php echo $this->Form->radio(
                              'UserAboutSitters.cats_in_home',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] /* ,
                        'value'=>$sitter_property['UserProperties']['cats_in_home'] !=''?$sitter_property['UserProperties']['cats_in_home']:''         */                  
                         ]); ?>
                  </span> 
                    </div>
                    
                  </div>
                    <?php echo $this->Form->end(); ?>
                  <h3>Photo</h3>
                  <!--Upload multiple images-->
                  <!--<form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">-->
                    <?php echo $this->Form->create(@$sitter_info, [
                      'url' => ['controller' => 'dashboard', 'action' => 'sitter-gallery'],
                      'name'=>'multiple_upload_form',
                      'id'=>'multiple_upload_form',
                      'enctype'=>"multipart/form-data"
                  ]);?>

                      <input type="hidden" name="image_form_submit" value="1"/>

                      <label>Choose Image</label>
                      <input type="file" name="images[]" id="images" multiple >
                      <div class="uploading none">
                          <label>&nbsp;</label>
                          <img src="uploading.gif" alt="uploading......"/>
                      </div>
                      <?php echo $this->Form->end(); ?>
                  <!--</form>-->
                  <div id="images_preview"></div>
                  <!--End upload images-->
                  <p class="browse-p">Add your profile photo<button type="button" class="btn btn-primary">Browse Photo</button></p>

                  <div class="row">
                    <!--<div class="col-lg-1 col-md-2 col-xs-3">
                        <div class="sitter-gal">
                        <img src="<?php echo HTTP_ROOT; ?>img/s1.jpg">
                        <a href="#"><i class="fa fa-minus-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-xs-3">
                        <div class="sitter-gal">
                        <img src="<?php echo HTTP_ROOT; ?>img/s2.jpg">
                        <a href="#"><i class="fa fa-minus-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-xs-3">
                      <div class="sitter-gal">
                      <img src="<?php echo HTTP_ROOT; ?>img/s3.jpg">
                      <a href="#"><i class="fa fa-minus-circle"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-1 col-md-2 col-xs-3">
                      <div class="sitter-gal">
                      <img src="<?php echo HTTP_ROOT; ?>img/c4.jpg">
                      <a href="#"><i class="fa fa-minus-circle"></i></a>
                      </div>
                    </div>

                    <div class="col-lg-1 col-md-2 col-xs-3">
                    <div class="sitter-gal">
                    <img src="<?php echo HTTP_ROOT; ?>img/c5.png">
                    <a href="#"><i class="fa fa-minus-circle"></i></a>
                      
                    </div>
                      
                    </div>
                    <div class="col-lg-1 col-md-2 col-xs-3">
                    <div class="sitter-gal">
                    <img src="<?php echo HTTP_ROOT; ?>img/c6.jpg">
                    <a href="#"><i class="fa fa-minus-circle"></i></a>
                      
                    </div>
                      
                    </div>-->
                    
                  </div>
                  <div class="row">
                    <p class="col-lg-12 sp-tb"><button type="button" class="btn previous pull-left"><i class="fa fa-chevron-left"></i>Previous</button>
                    <input type="submit" class="pull-right btn Continue" value="Continue"></p>
                    </div>

              </div>




              </div>
        
          </div>
        </div>

        </div>
      </div>

<script type="text/javascript">
$(document).ready(function(){
    $('#images').on('change',function(){
      //alert("okokok");
        jQuery('#multiple_upload_form').ajaxForm({
            //display the uploaded images
            //alert("okokok");
            target:'#images_preview',
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
              alert(e);
                $('.uploading').hide();
            },
            error:function(e){
            }
        }).submit();
    });
});
</script>
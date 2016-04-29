
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
                             'type'=>'hidden',
                             'value'=>@$aboutSitterId
                        ]);
                      ?>

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Accepted Pet Sizes</label>
                         <?php echo $this->Form->input('UserAboutSitters.accepted_pet_size',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','small_pets'=>'I accept small pets(0-7kg)','medium_pets'=>'I accept Medium pets (8-18kg)','large_pets'=>'I accept Large dogs (18-45kg)','gaint_dogs'=>'I accept Giant dogs (45+kg)','cats'=>'I accept cats','puppies_under_1_year'=>'I accept puppies under 1 year','kittens_under_1_year'=>'I accept kittens under 1 year','ferrets'=>'I accept ferrets','small_animals'=>'I accept small animals (rodents, rabbits birds…)','other'=>'Other (specify)','any'=>'Any'],
                        'class'=>'form-control',
                        'multiple'=>"true"
                        ]);
                      ?>
                    </div>
                   
                    

                  </div>
                  <div class="row">
                     <div class="form-group col-lg-4">
                      <label for="">Preferred Guest Ages  </label>
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
                      <label for="">Years of Sitting Experience </label>
                          <?php echo $this->Form->input('UserAboutSitters.sitting_experience',['class'=>'form-control', 'templates' => ['inputContainer' => '{{content}}'],
                             'required'=>false
                          ]); ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Mixed Familes </label>
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
                          <?php echo $this->Form->input('UserAboutSitters.your_self',[
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea',
                                 'label'=>false
                          ]); ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="">Why should you take care of their guest?    </label>
                          <?php echo $this->Form->input('UserAboutSitters.take_care_desc',[
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea',
                                  'label'=>false
                                 ]); ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="">Sitter Guide Carers Package </label>
                          <?php echo $this->Form->input('UserAboutSitters.carers_description',[
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea',
                                  'label'=>false
                          ]); ?>
                        </div>

                    
                  </div>

                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Accept Un-Neutered Pets  </label>
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                          'UserAboutSitters.un_neutered_pets',
                          [
                            'type'=>"radio",
                             'label'=>false,
                             'required'=>false,
                             "options"=>["yes"=>"Yes","no"=>"No"],
                              'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                    </span>
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Accept un-spayed females </label>
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                          'UserAboutSitters.un_spayed_females',
                          [
                            'type'=>"radio",
                             'label'=>false,
                             'required'=>false,
                             "options"=>["yes"=>"Yes","no"=>"No"],
                              'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                    </span> 
                    </div>
                    <div class="form-group col-lg-4">
                    <label>Longer than 1 week stays  </label>
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                          'UserAboutSitters.longer_than_week',
                          [
                            'type'=>"radio",
                             'label'=>false,
                             'required'=>false,
                             "options"=>["yes"=>"Yes","no"=>"No"],
                              'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>    
                  </span> 
                    </div>
                   </div>


                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Accept females on heat </label>
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                          'UserAboutSitters.females_on_heat',
                          [
                            'type'=>"radio",
                             'label'=>false,
                             'required'=>false,
                             "options"=>["yes"=>"Yes","no"=>"No"],
                              'templates' => ['inputContainer' => '{{content}}']
                    ]); ?> 
                    </span>
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Accept un-toilet trained pets   </label>
                     <span class="pull-right m-rights">
                     <?php echo $this->Form->input(
                          'UserAboutSitters.un_trained_pets',
                          [
                            'type'=>"radio",
                             'label'=>false,
                             'required'=>false,
                             "options"=>["yes"=>"Yes","no"=>"No"],
                              'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                        </span>
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Last Minute Bookings  </label>
                      <span class="pull-right m-rights">
                       <?php echo $this->Form->input(
                          'UserAboutSitters.last_minute_booking',
                          [
                            'type'=>"radio",
                             'label'=>false,
                             'required'=>false,
                             "options"=>["yes"=>"Yes","no"=>"No"],
                              'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                       </span> 
                    </div>
                    
                  </div>
                  <div class="row">
                    <p class="col-lg-12 sp-tb"><a href="<?php echo HTTP_ROOT.'dashboard/sitter-house'; ?>"><button type="button" class="btn previous pull-left"><i class="fa fa-chevron-left"></i>Previous</button></a>
                    <input type="submit" class="pull-right btn Continue" value="Continue"></p>
                    </div>

              </div>
              <?php echo $this->Form->end(); ?>



              </div>
        
          </div>
        </div>

        </div>
      </div>

<script type="text/javascript">
  /*For add multiple profile photos*/
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
/*End multiple profile photos*/
</script>
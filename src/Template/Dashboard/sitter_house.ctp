    <?php //echo "<pre>";print_r($houseInfo); die;?>
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
                <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">Sitter Profile</h3>

                <?php echo $this->element('frontElements/profile/sitter_nav');?>
          
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">

 <div id="menu11" class="tab-pane fade tab-comm active in">
          
                  <!--<form role="form">-->
                  <?php echo $this->Form->create(@$sitterHouseData, [
                      'url' => ['controller' => 'dashboard', 'action' => 'sitter-house'],
                      'role'=>'form',
                      'id'=>'generelInfo'
                  ]);?>
                  <?php
                 

                      if(@$sitterHouseId != ''){
                           echo $this->Form->input('UserSitterHouses.id',[
                                'type'=>'hidden',
                                'value'=>@$sitterHouseId
                              ]);
                      }     
                  ?>

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for=""> Property Type</label>
                        <?php echo $this->Form->input('UserSitterHouses.property_type',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flat'=>'Flat','house'=>'House','farm'=>'Farm'],
                        'class'=>'form-control']);
                      ?>
                    </div>

                    <div class="form-group col-lg-4 text-italic">
                      <label for="">Outdoor Area</label>
                      <?php echo $this->Form->input('UserSitterHouses.outdoor_area',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','balcony'=>'Balcony','backyard'=>'Backyard'],
                        'class'=>'form-control']);
                      ?>
                    </div>

                    <div class="form-group col-lg-4">
                      <label for="">Outdoor Area Size</label>
                      <?php echo $this->Form->input('UserSitterHouses.outdoor_area_size',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','small'=>'Small','medium'=>'Medium','large'=>'Large'],
                        'class'=>'form-control']);
                      ?>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Outing Area (allow multiple)  </label>
                      <?php echo $this->Form->input('UserSitterHouses.outing_allow_multiple',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','urban_streets'=>'Urban Streets','beach'=>'Beach','city_park'=>'City Park','country_side'=>'Country Side','bush'=>'Bush'],
                        'class'=>'form-control']);
                      ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Toilet Breaks provided - every  </label>
                      <?php echo $this->Form->input('UserSitterHouses.breaks_provided_every',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','0-2'=>'0-2 hours','2-4'=>'2-4 hours','4-8'=>'4-8 hours','8+'=>'8+ hours'],
                        'class'=>'form-control']);
                      ?>
                    </div>

                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                    <label>Fully Fenced Outdoor Area</label>
                    <span class="pull-right m-rights">
   


                         <?php echo $this->Form->input(
                              'UserSitterHouses.fully_fenced',
                               [
                                //'label'=>['class'=>'radio-inline'],
                                'type'=>"radio",
                                 'label'=>false,
                                 'required'=>false,
                                "options"=>["yes"=>"Yes","no"=>"No"],
                                'templates' => ['inputContainer' => '{{content}}']
                        ]); ?>
                          
                        </span>
                    </div>

                  <div class="form-group col-lg-4">
                    <label>Smokers</label>
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                              'UserSitterHouses.smokers',
                              [
                                //'label'=>['class'=>'radio-inline'],
                                'type'=>"radio",
                                 'label'=>false,
                                 'required'=>false,
                                "options"=>["yes"=>"Yes","no"=>"No"],
                                  'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                        </span>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Birds in cages?</label>
                   <!-- <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                              'UserSitterHouses.birds_in_cages',
                              [
                                //'label'=>['class'=>'radio-inline'],
                                'type'=>"radio",
                                 'label'=>false,
                                 'required'=>false,
                                "options"=>["yes"=>"Yes","no"=>"No"],
                                  'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                        </span>
                  </div>
                    <!--<div class="form-group col-lg-4 noned">
                    </div>-->
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4">
                    <label>Dogs in home?</label>
                   <!-- <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                              'UserSitterHouses.dogs_in_home',
                              [
                                //'label'=>['class'=>'radio-inline'],
                                'type'=>"radio",
                                 'label'=>false,
                                 'required'=>false,
                                "options"=>["yes"=>"Yes","no"=>"No"],
                                  'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                        </span>
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Cats in home?</label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                              'UserSitterHouses.cats_in_home',
                              [
                                //'label'=>['class'=>'radio-inline'],
                                'type'=>"radio",
                                 'label'=>false,
                                 'required'=>false,
                                "options"=>["yes"=>"Yes","no"=>"No"],
                                  'templates' => ['inputContainer' => '{{content}}']
                    ]); ?>
                        </span>
                    </div>
                      <div class="form-group col-lg-4 noned">
                    </div>
                  </div>
               
                  <h3>Photo</h3>
                  <p class="browse-p">Add your profile photo<button id="browseImg" type="button" class="btn btn-primary">Browse Photo</button></p>

                  <div class="row" id="images_preview">
                        <?php echo @$sitter_images; ?>
                    <!--<div class="col-lg-1 col-md-2 col-xs-3">
                      <div class="sitter-gal">
                      <img src="<?php echo HTTP_ROOT; ?>img/uploads/abB07k823wyTRsI.png">
                      <a href="#"><i class="fa fa-minus-circle"></i></a>
                      </div>
                    </div>-->

                    <!--<div class="col-lg-1 col-md-2 col-xs-3">
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
                    <p class="col-lg-12 sp-tb">
                    <a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i>Previous</button></a>
                    <input class="pull-right btn Continue" type="submit" value="Continue" /></p>
                    </div>


<!--</form>-->
                  <?php echo $this->Form->end(); ?>

              </div>

              <!--Start multiple upload-->
                  <?php echo $this->Form->create(@$sitter_info, [
                      'url' => ['controller' => 'dashboard', 'action' => 'sitter-gallery'],
                      'name'=>'multiple_upload_form',
                      'id'=>'multiple_upload_form',
                      'enctype'=>"multipart/form-data",
                      'style'=>'display:none'
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
                  <!--<div id="images_preview"></div>-->
                 <!--End multiple upload-->

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
             // alert(e);
              //console.log(e);
               $('.uploading').hide();
            },
            error:function(e){
            }
        }).submit();
    });
    $("#browseImg").on('click',function(){
        $("#images").trigger("click");    
        });
});
/*End multiple profile photos*/
</script>
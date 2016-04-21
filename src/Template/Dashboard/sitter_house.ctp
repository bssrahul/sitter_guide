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
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->input(
                              'UserSitterHouses.smokers',
                              [
                                //'label'=>['class'=>'radio-inline'],
                                'type'=>"radio",
                                 'label'=>false,
                                 'required'=>false,
                                "options"=>["yes"=>"Yes","no"=>"No"],
                                  'templates' => ['inputContainer' => '{{content}}']/*
                        'value'=>$sitter_property['UserProperties']['smokers'] !=''?$sitter_property['UserProperties']['smokers']:''   */                    
                         ]); ?>
                        </span>
                    </div>

                     <div class="form-group col-lg-4 noned">
                    
                    </div>
                      
                    </div>

                    <div class="row">
                    <p class="col-lg-12 sp-tb">
                    <a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i>Previous</button></a>
                    <input class="pull-right btn Continue" type="submit" value="Continue" /></p>
                    </div>


<!--</form>-->
                  <?php echo $this->Form->end(); ?>

              </div>



              </div>
        
          </div>
        </div>

        </div>
      </div>
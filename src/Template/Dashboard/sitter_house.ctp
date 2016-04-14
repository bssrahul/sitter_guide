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
                  <?php echo $this->Form->create($sitterHouseData, [
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
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserSitterHouses.property_type',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flat'=>'Flat','house'=>'House','farm'=>'Farm'],
                        'class'=>'form-control'/*,
                         'value'=>$sitter_property['UserProperties']['property_type'] !=''?$sitter_property['UserProperties']['property_type']:''*/]);
                      ?>
                    </div>

                    <div class="form-group col-lg-4 text-italic">
                      <label for="">Outdoor Area</label>
                      <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserSitterHouses.outdoor_area',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','balcony'=>'Balcony','backyard'=>'Backyard'],
                        'class'=>'form-control'/*,
                        'value'=>$sitter_property['SitterHouse']['outdoor_area'] !=''?$sitter_property['UserProperties']['outdoor_area']:''*/]);
                      ?>
                    </div>

                    <div class="form-group col-lg-4">
                      <label for="">Outdoor Area Size</label>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserSitterHouses.outdoor_area_size',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','small'=>'Small','medium'=>'Medium','large'=>'Large'],
                        'class'=>'form-control'/*,
                        'value'=>$sitter_property['SitterHouse']['outdoor_area_size'] !=''?$sitter_property['UserProperties']['outdoor_area_size']:''*/]);
                      ?>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Outing Area (allow multiple)  </label>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('UserSitterHouses.outing_allow_multiple',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','urban_streets'=>'Urban Streets','beach'=>'Beach','city_park'=>'City Park','country_side'=>'Country Side','bush'=>'Bush'],
                        'class'=>'form-control'/*,
                        'value'=>$sitter_property['UserProperties']['outing_allow_multiple'] !=''?$sitter_property['UserProperties']['outing_allow_multiple']:''*/]);
                      ?>
                    </div>

                    


                    <div class="form-group col-lg-4">
                      <label for="">Cancellation Policy</label>
                     <!-- <input type="text" class="form-control mzero" id="" placeholder="New Password">-->
                      <?php echo $this->Form->input('UserSitterHouses.cancellation_policy',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flexible'=>'Flexible','moderate'=>'Moderate','strict'=>'Strict'],
                        'class'=>'form-control mzero'/*,
                        'value'=>$house_details['Houses']['sitter']['cancellation_policy'] !=''?$house_details['Houses']['sitter']['cancellation_policy']:''*/]);
                      ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Toilet Breaks provided - every  </label>
                      <!--<input type="text" class="form-control mzero" id="" placeholder="New Password">-->
                       <?php echo $this->Form->input('UserSitterHouses.breaks_provided_every',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','0-2'=>'0-2 hours','2-4'=>'2-4 hours','4-8'=>'4-8 hours','8+'=>'8+ hours'],
                        'class'=>'form-control'/*,
                        'value'=>$house_details['Houses']['sitter']['breaks_provided_every'] !=''?$house_details['Houses']['sitter']['breaks_provided_every']:''*/]);
                      ?>
                    </div>

                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                    <label>Fully Fenced Outdoor Area</label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->

                         <span class="pull-right m-rights">
                         <?php echo $this->Form->radio(
                              'UserSitterHouses.fully_fenced',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] /* ,
                              'value'=>$sitter_property['UserProperties']['fully_fenced'] !=''?$sitter_property['UserProperties']['fully_fenced']:''               */             ]
                                ); ?>
                        </span>
                    </div>

                     <div class="form-group col-lg-4">
                    <label>Smokers</label>
                    <!--<span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> -->
                    <span class="pull-right m-rights">
                    <?php echo $this->Form->radio(
                              'UserSitterHouses.smokers',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  /*   ,
                        'value'=>$sitter_property['UserProperties']['smokers'] !=''?$sitter_property['UserProperties']['smokers']:''                      */   ]
                          ); ?>
                        </span>
                    </div>

                     <div class="form-group col-lg-4 noned">
                    
                    </div>
                      
                    </div>

                    <div class="row">
                    <p class="col-lg-12 sp-tb">
                    <button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i>Previous</button>
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
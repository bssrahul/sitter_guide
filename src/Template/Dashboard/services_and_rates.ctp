
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
  <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">Sitter Profile</h3>

          <?php echo $this->element('frontElements/profile/sitter_nav');?>

          </div>
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">
              


              <div class="tab-pane fade tab-comm active in" id="menu4">
             
                  <!--<form role="form">-->
                   <?php echo $this->Form->create(null, [
                        'url' => ['controller' => 'dashboard', 'action' => 'services-and-rates'],
                        'role'=>'form',
                        'id'=>'generelInfo'
                    ]);?>

                  <h3><strong>All services for Sitters house and Guests House</strong></h3>
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                          <h4>Day Care</h4>
                          <div class="radio-main">
                            <!--<label><span class="custom-checkbox">
                              <input type="checkbox" value="football" name="sport[]">
                            </span> Day Care For Sitters house</label>-->
                            <label><span class="custom-checkbox">
                              <?php 
                                  echo $this->Form->input('SitterServices.day_care_sitters',[
                                    'templates' => ['inputContainer' => '{{content}}'],
                                    'type'=>'checkbox',
                                    'label' =>false,
                                    'class'=>'selectedCheckbox',
                                    'hiddenField' => false,
                                    'value' =>'1'
                                   ]);
                              ?>
                               </span> Day Care For Sitters house</label>
                          </div>
                          <div class="radio-main">
                            <!--<label><span class="custom-checkbox">
                              <input type="checkbox" value="football" name="sport[]"></span> Day Care For Guests house</label>
                                <label><span class="custom-checkbox">-->
                              <label><span class="custom-checkbox">
                              <?php 
                                  echo $this->Form->input('SitterServices.day_care_guests',[
                                    'templates' => ['inputContainer' => '{{content}}'],
                                    'type'=>'checkbox',
                                    'label' =>false,
                                    'class'=>'selectedCheckbox',
                                    'hiddenField' => false,
                                    'value' =>'1'
                                   ]);
                              ?>
                               </span>Day Care For Guests house</label>
                          </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                          <h4>Visits</h4>
                          <div class="radio-main">
                              <!--<label><span class="custom-checkbox">
                              <input type="checkbox" value="football" name="sport[]"></span> Visit For Sitters house</label>-->
                               <label><span class="custom-checkbox">
                              <?php 
                                  echo $this->Form->input('SitterServices.visits_sitters',[
                                    'templates' => ['inputContainer' => '{{content}}'],
                                    'type'=>'checkbox',
                                    'label' =>false,
                                      'class'=>'selectedCheckbox',
                                    'hiddenField' => false,
                                    'value' =>'1'
                                   ]);
                              ?>
                               </span>Visits For Sitters house</label>
                          </div>
                          <div class="radio-main">
                             <!-- <label><span class="custom-checkbox">
                              <input type="checkbox" value="football" name="sport[]"></span> Visit For Guests house</label>-->
                                <label><span class="custom-checkbox">
                              <?php 
                                  echo $this->Form->input('SitterServices.visits_guests',[
                                    'templates' => ['inputContainer' => '{{content}}'],
                                    'type'=>'checkbox',
                                    'label' =>false,
                                     'class'=>'selectedCheckbox',
                                    'hiddenField' => false,
                                    'value' =>'1'
                                          ]);
                              ?>
                               </span>Visits For Guests house</label>
                          </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                          <h4>Night Care</h4>
                          <div class="radio-main">
                            <!--<label><span class="custom-checkbox">
                              <input type="checkbox" value="football" name="sport[]"></span> Night Care For Sitters house</label>-->
                               <label><span class="custom-checkbox">
                              <?php 
                                  echo $this->Form->input('SitterServices.night_care_sitters',[
                                    'templates' => ['inputContainer' => '{{content}}'],
                                    'type'=>'checkbox',
                                    'label' =>false,
                                     'class'=>'selectedCheckbox',
                                    'hiddenField' => false,
                                    'value'=>'1'
                                   ]);
                              ?>
                               </span>Night Care For Sitters house</label>
                          </div>
                          <div class="radio-main">
                            <!--<label><span class="custom-checkbox">
                              <input type="checkbox" value="football" name="sport[]"></span> Night Care For Guests house</label>-->
                              <label><span class="custom-checkbox">
                              <?php 
                                  echo $this->Form->input('SitterServices.night_care_guests',[
                                    'templates' => ['inputContainer' => '{{content}}'],
                                    'type'=>'checkbox',
                                    'label' =>false,
                                    'class'=>'selectedCheckbox',
                                    'hiddenField' => false,
                                    'value' =>'1'
                                   ]);
                              ?>
                               </span>Night Care For Guests house</label>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <h4 class="top-sh">Hourly</h4>
                          <!--<select id="" class="form-control">
                            <option>Sitting for Sitters house</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                          <?php 
                              echo $this->Form->input('SitterServices.hourly_service',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'select',
                                'label'=>false,
                                'options'=>[''=>'---','sitting_for_sitter_house'=>'Sitting For Sitter House','sitting_for_guest_house'=>'Sitting For Guest House','grooming'=>'Grooming','outdoor_recreaption'=>'Outdoor Recreaption','driver_service'=>'Driver Service','training'=>'Training'],
                                'class' =>'form-control'
                                ]);
                          ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <h4 class="top-sh">Cancellation Policy</h4>
                          <!--<select id="" class="form-control">
                            <option>Sitting for Sitters house</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                      <?php echo $this->Form->input('SitterServices.cancellation_policy',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                         'required' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flexible'=>'Flexible','moderate'=>'Moderate','strict'=>'Strict'],
                        'class'=>'form-control']);
                      ?>
                    </div>
                    <div class="form-group col-lg-8 noned"></div>
                  </div>
                  <h3><strong>Boarding At Sitters Home</strong></h3>
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> (Service load - member activated. Not automated)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_holiday_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                                ]);
                          ?>
                        </div>
                        </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Holiday Rate: % </div> 
                      <div class="col-lg-6 col-md-6">  
                       <!--<input type="text"></input>--> 
                        <?php 
                              echo $this->Form->input('SitterServices.sh_holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                      </div></div>
                              
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Puppy or Kitten (under 1 year old) Rate<br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_puppy_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                                ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Puppy Rate:% </div> 
                      <div class="col-lg-6 col-md-6"> 
                        <!--<input type="text"></input> -->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_puppy_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                         </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cat Rate <br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_cat_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                                ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Cate Rate:% </div> 
                      <div class="col-lg-6 col-md-6"> 
                        <!--<input type="text"></input> -->
                          <?php 
                              echo $this->Form->input('SitterServices.sh_cat_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                      </div></div>
                        
                      </div>
                    </div>
                   

                    
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Horse  Rate <br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_horse_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                                ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Horse Rate:% </div> 
                      <div class="col-lg-6 col-md-6">  
                       <!--<input type="text"></input>-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_horse_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>  
                         </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Reptiles  Rate<br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_reptiles_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                                ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Reptiles Rate:%</div> 
                      <div class="col-lg-6 col-md-6">  
                       <!--<input type="text"></input> -->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_reptiles_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                        </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Pets  - other than cats & dogs<br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_small_pets_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                                ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Small Pets Rate:% </div> 
                      <div class="col-lg-6 col-md-6">   
                        <!--<input type="text"></input> -->
                       <?php 
                              echo $this->Form->input('SitterServices.sh_small_pets_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                         </div></div>
                        
                      </div>
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                       <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Day Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_day_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                           <?php 
                              echo $this->Form->input('SitterServices.sh_dc_additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_dc_repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <!--<div class="row"><div class="col-lg-9 col-sm-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-6 col-md-6">1st Guest Rate: $ </div> 
                      <div class="col-lg-6 col-md-6">  
                      <!-- <input type="text"></input> -->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_dc_holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                        </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Night Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_night_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_nc_additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_nc_repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                     <!-- <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">    <?php 
                              echo $this->Form->input('SitterServices.sh_nc_holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>    </div></div>-->
                      <div class="row"><div class="col-lg-6 col-md-6">1st Guest Rate: $</div> 
                      <div class="col-lg-6 col-md-6">   
                        <!--<input type="text"></input>-->  
                        <?php 
                              echo $this->Form->input('SitterServices.sh_nc_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                         </div></div>
                      </div>
                    </div>

                    
                    
                  

                   
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Hourly Care</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_hc_hourly_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_hc_additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_hc_repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                     <!--<div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/hour   </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-7 col-md-7">1st Guest Rate p/hour: $</div> 
                      <div class="col-lg-5 col-md-5">   
                        <!--<input type="text"></input> --> 
                         <?php 
                              echo $this->Form->input('SitterServices.sh_hc_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                      </div></div>
                        
                      </div>
                    
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Long Term Care</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('SitterServices.sh_ltc_long_term_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_ltc_additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('SitterServices.sh_ltc_repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <!--<div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/night (after 1st night)  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-12 col-md-12">1st Guest Rate p/night (after 1st night): $</div> 
                      <div class="col-lg-6 col-md-6 guestRate" >   
                        <!--<input type="text"></input>--> 
                         <?php 
                              echo $this->Form->input('SitterServices.sh_ltc_.guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                         </div></div>
                        
                      </div>
                    </div>
                     </div>

                    <h3><strong>Home Sitting At Guests Home</strong></h3>


                    <div class="row">
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> (Service load - member activated. Not automated)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.holiday_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Holiday Rate: % </div> 
                      <div class="col-lg-6 col-md-6">   
                       <!-- <input type="text"></input> -->
                            <?php 
                              echo $this->Form->input('GuestsHome.holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                      </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Puppy or Kitten (under 1 year old) Rate <br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.puppy_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                                 ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Puppy Rate: % </div> 
                      <div class="col-lg-6 col-md-6">  
                       <!--<input type="text"></input> --> 
                        <?php 
                              echo $this->Form->input('GuestsHome.puppy_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                     </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cat Rate <br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.cat_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Cat Rate: % </div> 
                      <div class="col-lg-6 col-md-6"> 
                        <!--<input type="text"></input> -->
                        <?php 
                              echo $this->Form->input('GuestsHome.cat_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                         </div></div>
                        
                      </div>
                    </div>
                   

                    
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Horse  Rate <br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.horse_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Horse Rate: % </div> 
                      <div class="col-lg-6 col-md-6">  
                       <!--<input type="text"></input>  -->
                          <?php 
                              echo $this->Form->input('GuestsHome.horse_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>  
                     </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Reptiles  Rate  <br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.reptiles_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Reptiles Rate: % </div> 
                      <div class="col-lg-6 col-md-6">   
                        <!--<input type="text"></input>  -->
                          <?php 
                              echo $this->Form->input('GuestsHome.reptiles_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                      </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Pets  - other than cats & dogs<br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                       <!-- <input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('GuestsHome.small_pets_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-6 col-md-6">Pets Rate: % </div> 
                      <div class="col-lg-6 col-md-6">   
                        <!--<input type="text"></input> -->
                          <?php 
                              echo $this->Form->input('GuestsHome.small_pets_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                         </div></div>
                        
                      </div>
                    </div>
                    
                 


                  
                    <div class="form-group col-lg-4 col-md-12">
                       <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Day Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.day_care.day_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.day_care.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.day_care.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <!--<div class="row"><div class="col-lg-9 col-sm-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-6 col-md-6">1st Guest Rate: $ </div> 
                      <div class="col-lg-6 col-md-6">   
                        <!--<input type="text"></input>  -->
                        <?php 
                              echo $this->Form->input('GuestsHome.day_care.guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                      </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Night Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                       <!-- <input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.night_care.night_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.night_care.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.night_care.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <!--<div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-6 col-md-6">1st Guest Rate: $</div> 
                      <div class="col-lg-6 col-md-6">   
                        <!--<input type="text"></input> -->
                        <?php 
                              echo $this->Form->input('GuestsHome.night_care.guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                         </div></div>
                        
                      </div>
                    </div>

                  
                    
                  

                   
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Hourly Care</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.hourly_care.hourly_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.hourly_care.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.hourly_care.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <!--<div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/hour   </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-7 col-md-7">1st Guest Rate p/hour: $ </div> 
                      <div class="col-lg-5 col-md-5">  
                       <!--<input type="text"></input>  -->
                       <?php 
                              echo $this->Form->input('GuestsHome.hourly_care.guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                     </div></div>
                        
                      </div>
                    
                    </div>
                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Long Term Care</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.long_term_care.long_term_care',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                       <!-- <input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.long_term_care.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.long_term_care.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                                'value'=>'repeat_client_only'
                              ]);
                          ?>
                        </div>   </div></div>
                      <!--<div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/night (after 1st night)  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-12 col-md-12">1st Guest Rate p/night (after 1st night): $ </div> 
                      <div class="col-lg-6 col-md-6 guestRate">  
                       <!--<input type="text"></input> --> 
                       <?php 
                              echo $this->Form->input('GuestsHome.long_term_care.guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                     </div></div>
                        
                      </div>
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Visits Per Day</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.visits_pr_day.visits_pr_day',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.visits_pr_day.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('GuestsHome.visits_pr_day.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                      <!--<div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/hour   </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>-->
                      <div class="row"><div class="col-lg-7 col-md-7">1 Visit Per Day: $ </div> 
                      <div class="col-lg-5 col-md-5">  
                       <!--<input type="text"></input>  -->
                       <?php 
                              echo $this->Form->input('GuestsHome.visits_pr_day.1_visit_pr_day',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                     </div></div>
                      <div class="row"><div class="col-lg-7 col-md-7">2 Visit Per Day: $ </div> 
                      <div class="col-lg-5 col-md-5">  
                       <!--<input type="text"></input>  -->
                       <?php 
                              echo $this->Form->input('GuestsHome.visits_pr_day.2_visit_pr_day',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                     </div></div>
                        
                      </div>
                    
                    </div>
                     </div>


                     <h3>Hourly Products</h3>

                     <div class="row">
                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Grooming</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.grooming.grooming',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode   </div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.grooming.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.grooming.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                                'value'=>'repeat_client_only'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-6 col-md-6">1st Guest Rate: $</div> 
                        <div class="col-lg-6 col-md-6 num">   
                         <?php 
                              echo $this->Form->input('HourlyProducts.grooming.guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>    </div></div>
                      </div>
                        
                      </div>

                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Training</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.training.training',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode   </div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.training.aditional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.training.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                                'value'=>'repeat_client_only'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-6 col-md-6">1st Guest Rate: $</div> 
                        <div class="col-lg-6 col-md-6 num">  
                          <?php 
                              echo $this->Form->input('HourlyProducts.training.guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                            </div></div>
                      </div>
                        
                      </div>

                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Outdoors Recreation (walking)  </div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.outdoors_recreation.outdoors_recreation',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.outdoors_recreation.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.outdoors_recreation.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-7 col-md-7">1 Per Day, 1 Guest: $</div> 
                        <div class="col-lg-5 col-md-5 num">  
                         <?php 
                              echo $this->Form->input('HourlyProducts.outdoors_recreation.1_day_1_guest',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>   
                        </div></div>
                        <div class="row"><div class="col-lg-7 col-md-7"> 2 Per Day, 1 Guest: $</div> 
                        <div class="col-lg-5 col-md-5 num">   
                         <?php 
                              echo $this->Form->input('HourlyProducts.outdoors_recreation.2_day_1_guest',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?> 
                           </div></div>
                        
                      </div>
                        
                      </div>

                       <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Driver Service</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.driver_service.driver_service',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Away Mode</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.driver_service.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                                'value'=>'repeat_client_only'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('HourlyProducts.driver_service.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-6 col-md-6">  Pick-up: $</div> 
                        <div class="col-lg-6 col-md-6 num">  <?php 
                              echo $this->Form->input('HourlyProducts.driver_service.pick_up',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>   </div></div>
                        <div class="row"><div class="col-lg-6 col-md-6">Drop-off: $</div> 
                        <div class="col-lg-6 col-md-6 num"> 
                         <?php 
                              echo $this->Form->input('HourlyProducts.driver_service.drop_off',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>    </div></div>
                        <div class="row"><div class="col-lg-6 col-md-6">Return: $</div> 
                        <div class="col-lg-6 col-md-6 num">  
                          <?php 
                              echo $this->Form->input('HourlyProducts.driver_service.return',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false
                              ]);
                          ?>    </div></div>
                      </div>
                        
                      </div>

                     <!-- <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Outdoors Recreation (walking)  </div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />
                         <?php 
                              echo $this->Form->input('HourlyProducts.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                                'value'=>'repeat_client_only'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <input type="checkbox" checked />
                         <?php 
                              echo $this->Form->input('HourlyProducts.additional_mode',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                                'value'=>'additional_mode'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />
                         <?php 
                              echo $this->Form->input('HourlyProducts.repeat_client_only',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label'=>false,
                                'checked'=>'checked',
                                'value'=>'repeat_client_only'
                              ]);
                          ?>
                        </div>   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">1 Per Day, 1 Guest: </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9"> 1 Per Day, 1 Guest: </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        
                      </div>
                        
                      </div>-->





                       
                     </div>

                   <h3><i>Below <strong>4 features</strong> update the calendar to show how many spaces are availble for booking for each product </i>     
</h3>
                  <div class="row img-rightsp">
                  <div class="form-group col-lg-4">
                      <label for="">1. Day Care P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/daym1.png"> </label>
                      <!--<input type="text" placeholder="New Password" id="" class="form-control mzero">-->
                       <?php 
                              echo $this->Form->input('SitterServices.day_care_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                 'type'=>'number',
                                 'min'=>'1',
                                'class'=>'form-control mzero'
                              ]);
                          ?> 
                       
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">2. Night Care P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/nightm1.png"> </label>
                      <!--<input type="text" placeholder="New Password" id="" class="form-control mzero">-->
                        <?php 
                              echo $this->Form->input('SitterServices.night_care_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                 'type'=>'number',
                                 'min'=>'1',
                                'class'=>'form-control mzero'
                              ]);
                          ?> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">3. Visits P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/visitm1.png"> </label>
                      <!--<input type="text" placeholder="New Password" id="" class="form-control mzero">-->
                        <?php 
                              echo $this->Form->input('SitterServices.visits_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                 'type'=>'number',
                                 'min'=>'1',
                                'class'=>'form-control mzero'
                              ]);
                          ?> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">4. Hourly Services P/Day Limit <img src="<?php echo HTTP_ROOT; ?>img/hourlym1.png"> </label>
                      <!--<input type="text" placeholder="New Password" id="" class="form-control mzero">-->
                        <?php 
                              echo $this->Form->input('SitterServices.hourly_services_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'type'=>'number',
                                'min'=>'1',
                                'class'=>'form-control mzero'
                              ]);
                          ?> 
                    </div>
                    
                  </div>
<div class="row">
                    <p class="col-lg-12 sp-tb"><button type="button" class="btn previous pull-left"><i class="fa fa-chevron-left"></i>Previous</button>
                      <input type="submit" class="pull-right btn Continue" value="Submit" /></p>
                    </div>


                  <!--</form>-->
                  <?php echo $this->Form->end(); ?>

                  </div>

                </div>
        
          </div>
        </div>

        </div>
      </div>
<?php echo $this->Html->css('Front/dist/jquery.onoff.css');
      echo $this->Html->script(['Front/dist/jquery.onoff.js']);
 ?>
<script>
   /*Checkbox show*/
   /*function customCheckbox(checkboxName){
    //alert(checkboxName);
        var checkBox = $('input[name="'+ checkboxName +'"]');
        $(checkBox).each(function(){
            $(this).wrap( "<span class='custom-checkbox'></span>" );
            if($(this).is(':checked')){
                $(this).parent().parent().addClass("selected");
            }
        });
        
    }*/
    $(document).ready(function (){
      $('.selectedCheckbox').click(function(){
            //alert('checkboxName');
            $(this).parent().parent().toggleClass("selected");
        });
   
    })
/*For on-off button*/
    $(function(){
          $('input[type=checkbox]').onoff();
    });
       /*End of-off button*/
  
</script>

 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
  <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Profile')); ?></h3>

          <?php echo $this->element('frontElements/profile/sitter_nav');?>

          </div>
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">
                <div class="tab-pane fade tab-comm active in" id="menu4">

                <h2 class="head-font">Which service and rates would you like to offer? </h2>
                <p class="head-font2 pad-head-foot pad-head-foot-bot">You can select and modify your settings in this central control panel</p>
                
             
             <h4><i><img src="<?php echo HTTP_ROOT; ?>img/calendar-with-a-clock-time-tools.png" width="22" height="22" alt="calender"></i> Going away on leave? <a href="#" class="color-green">Click here</a> to update your callender settings</h4>
             
             <h3></h3>
                 <?php 
                    echo $this->Form->create(@$sitter_service_info, [
                        'url' => ['controller' => 'dashboard', 'action' => 'services-and-rates'],
                        'role'=>'form',
                        'id'=>'servicesAndRates',
                        'autocomplete'=>'off',
                    ]);
                    echo $this->Form->input('UserSitterServices.id',[
                          'type'=>'hidden',
                          'value'=>@$sitterServiceId
                                                   ]);
                    ?>
                  <div class="row">
                  
                  <div class="col-md-4">
                  <p><b>Will you accept last minute</b></p>
                  <div class="row"><div class="col-lg-8 col-md-9 col-xs-8 col-lg-offset-1 mt10 "><b>Cancellation</b><small class="color-green-text"> (Under 24 hours) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                              echo $this->Form->input('UserSitterServices.cancellation_policy_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        <div class="row"><div class="col-lg-8 col-md-9 col-xs-8 col-lg-offset-1 mt10 "><b>Booking</b><small class="color-green-text"> (Under 24 hours) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php  echo $this->Form->input('UserSitterServices.booking_status',[
                                    'templates' => ['inputContainer' => '{{content}}'],
                                    'type'=>'checkbox',
                                    'label' =>false,
                                    'class'=>'selectedCheckbox',
                                    'hiddenField' => false
                                 ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                  
                  
                  
                  </div>
                  
                  </div>
                  
                  
                  
                  <h3></h3>
<div class="row">
 <div class="form-group col-lg-4 col-md-12">
 <div class="row"><div class="col-lg-9 col-md-9 col-xs-8"><h2 class="f22">Sitting at Sitter House 
   </h2></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">

                        <div class="onoffswitch">
                          <?php 
							               echo $this->Form->input('UserSitterServices.sitter_house_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                          ]);?>
                              </div>
                        </div>
                        </div>
  </div>
 </div>
 
 <div class="form-group col-lg-4 col-md-12">
 
 <p>Set-up and modify your settings for when you have guests at your house service loads for non-standard services</p>
 
 
 
 
 </div>
 
 <div class="form-group col-lg-4">
 
 
 <div class="row">
 
 <div class="col-lg-4">  <label for="" class="f14 color-green">Holiday Rate % </label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.sh_holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                          ?>
                        </div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Small Guest Rate %</label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_small_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                          ?>
                          </div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Large Guest Rate %</label>
                           <?php 
                              echo $this->Form->input('UserSitterServices.sh_large_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                           ?>
                        </div>
 </div>
 
                   

                    </div>



</div>


<div class="row">

<div class="form-group col-lg-4 col-md-12">
 
  <label for="" class="f14 color-green">Day Rate </label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_day_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control',
                                'placeholder'=>"$"
                              ]);
                           ?>
 
 
 
 </div>
 
 <div class="form-group col-lg-4 col-md-12">
 
  <label for="" class="f14 color-green">Night Rate </label>
                        <?php 
                              echo $this->Form->input('UserSitterServices.sh_night_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control',
                                'placeholder'=>"$"
                              ]);
                        ?>
 </div>
 
 <div class="form-group col-lg-4">
 
 
 <div class="row">
 
 <div class="col-lg-4">  <label for="" class="f14 color-green">Cat Rate %</label>
                           <?php 
                              echo $this->Form->input('UserSitterServices.sh_cat_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                        ?>
                        </div>
                          
                          <div class="col-lg-8">  <label for="" class="f14 color-green">Puppy &kitten Rate %</label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_puppy_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                        ?>
                        </div>
                          
                          
 </div>
 
                   

                    </div>

</div>
                  

                
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-12 mt10">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Day Care
                       </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <?php 
                          echo $this->Form->input('UserSitterServices.sh_day_care_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          
                          <?php 
                           echo $this->Form->input('UserSitterServices.sh_dc_extended_stay_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          
                          <?php 
                            echo $this->Form->input('UserSitterServices.sh_dc_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                          echo $this->Form->input('UserSitterServices.sh_dc_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                       </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                        <?php 
                              echo $this->Form->input('UserSitterServices.sh_dc_additional_guest_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Extended Stay Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                      <?php 
                              echo $this->Form->input('UserSitterServices.sh_dc_extended_stay_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                      
                        <?php 
                              echo $this->Form->input('UserSitterServices.sh_dc_additional_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_dc_holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12 mt10">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Night Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_night_care_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                         <?php 
                           echo $this->Form->input('UserSitterServices.sh_nc_extended_stay_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                           <?php 
                              echo $this->Form->input('UserSitterServices.sh_nc_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_nc_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit  </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                        <?php 
                              echo $this->Form->input('UserSitterServices.sh_nc_additional_guest_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Extended Stay Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                        <?php 
                              echo $this->Form->input('UserSitterServices.sh_nc_extended_stay_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                        <?php 
                              echo $this->Form->input('UserSitterServices.sh_nc_additional_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_nc_holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12 ">
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> <small class="color-green-text"> ( for site or member nominate holiday periods )</small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                         <?php 
                             echo $this->Form->input('UserSitterServices.sh_holiday_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Guest Rate<br/> <small class="color-green-text"> ( other than cats and dogs ) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                            echo $this->Form->input('UserSitterServices.sh_small_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Large Guest Rate<br/> <small class="color-green-text">other than cats and dogs </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                         <?php 
                             echo $this->Form->input('UserSitterServices.sh_large_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cats Rate<br/> </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                              echo $this->Form->input('UserSitterServices.sh_cat_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Puppy and Kitten Rate<br/> <small class="color-green-text"> 12 months and younger </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                         <?php 
                             echo $this->Form->input('UserSitterServices.sh_puppy_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                      
                    </div>
                   

                  
                     </div>

                  

   
                  <h3></h3>
                  
<div class="row">
 <div class="form-group col-lg-4 col-md-12">
 
 <div class="row"><div class="col-lg-9 col-md-9 col-xs-8"><h2 class="f22">Sitting at Guests House</h2></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                          <?php 
                             echo $this->Form->input('UserSitterServices.guest_house_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        
                      
                        </div>
 
 
 
 
 
 </div>
 
 <div class="form-group col-lg-4 col-md-12">
 
 <p>Set-up and modify your settings for when you have guests at your house service loads for non-standard services</p>
 
 
 
 
 </div>
 
 <div class="form-group col-lg-4">
 
 
 <div class="row">
 
 <div class="col-lg-4">  <label for="" class="f14 color-green">Holiday Rate %</label>
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false
                               ]);
                          ?></div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Small Guest Rate %</label>
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_small_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false
                               ]);
                          ?></div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Large Guest Rate %</label>
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_large_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false
                               ]);
                          ?></div>
 </div>
 
                   

                    </div>



</div>


<div class="row">

<div class="form-group col-lg-4 col-md-12">
 
 
 <div class="row">
 <div class="col-lg-6"> <label for="" class="f14 color-green">Day Rate </label>
                         <?php 
                              echo $this->Form->input('UserSitterServices.gh_day_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false,
                                'placeholder'=>"$"
                               ]);
                          ?>
 </div>
 
 <div class="col-lg-6"> <label for="" class="f14 color-green">Drop-in visit Rate </label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.gh_drop_in_visit_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false,
                                'placeholder'=>"$"
                               ]);
                          ?>
 </div>
 
 </div>
 
 
 
 
 
 </div>
 
 <div class="form-group col-lg-4 col-md-12">
 <label for="" class="f14 color-green">Night Rate </label>
                            <?php 
                                echo $this->Form->input('UserSitterServices.gh_night_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false,
                                  'placeholder'=>"$"
                                 ]);
                              ?>
 </div>
 <div class="form-group col-lg-4">
 <div class="row">
 <div class="col-lg-4">  <label for="" class="f14 color-green">Cat Rate %</label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_cat_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                          ?>
                        </div>
                          
                          <div class="col-lg-8">  <label for="" class="f14 color-green">Puppy &kitten Rate %</label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_puppy_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
                        </div>
                          
                          
 </div>
 
                   

                    </div>

</div>
                  

                
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-12 mt10">
                    
                    <div class="row">
                    
                    <div class="col-lg-12">
                    
                    <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Day Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                            <?php 
                              echo $this->Form->input('UserSitterServices.gh_day_care_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                             ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                            <?php 
                              echo $this->Form->input('UserSitterServices.gh_dc_extended_stay_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                            echo $this->Form->input('UserSitterServices.gh_dc_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                         <?php 
                              echo $this->Form->input('UserSitterServices.gh_dc_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_dc_additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Extended Stay Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_dc_extended_stay_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                        <?php 
                                echo $this->Form->input('UserSitterServices.gh_dc_additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.gh_dc_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    
                    </div>
                    
                    
                    <div class="col-lg-12 mt10">
                    
                    <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Drop-in visit</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                         <?php 
                              echo $this->Form->input('UserSitterServices.gh_drop_in_visit_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                         ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                        <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                              echo $this->Form->input('UserSitterServices.gh_dv_extended_stay_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                             echo $this->Form->input('UserSitterServices.gh_dv_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                              echo $this->Form->input('UserSitterServices.gh_dv_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                        </div>
                        </div>
                        </div></div>
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit  </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_dv_additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Extended Stay Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_dv_extended_stay_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                      <?php 
                                echo $this->Form->input('UserSitterServices.gh_dv_additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_dv_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    
                    </div>
                    </div>
                    
                      
                    </div>

                    <div class="form-group col-lg-4 col-md-12 mt10">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Night Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_night_care_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                             echo $this->Form->input('UserSitterServices.gh_nc_extended_stay_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate
                          <small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_nc_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                            echo $this->Form->input('UserSitterServices.gh_nc_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                              ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit  </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.gh_nc_additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Extended Stay Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_nc_extended_stay_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>    
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.gh_nc_additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.gh_nc_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12 ">
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> <small class="color-green-text"> ( for site or member nominate holiday periods )</small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                            echo $this->Form->input('UserSitterServices.gh_holiday_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Guest Rate<br/> <small class="color-green-text"> ( other than cats and dogs ) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                             echo $this->Form->input('UserSitterServices.gh_small_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Large Guest Rate<br/> <small class="color-green-text">other than cats and dogs </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                         <?php 
                              echo $this->Form->input('UserSitterServices.gh_large_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cats Rate<br/> </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_cat_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Puppy and Kitten Rate<br/> <small class="color-green-text"> 12 months and younger </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_puppy_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                      
                    </div>
                   

                  
                     </div>
                    


                 
                  <h3></h3>
<div class="row">
 <div class="form-group col-lg-4 col-md-12">
 
 <div class="row"><div class="col-lg-9 col-md-9 col-xs-8"><h2 class="f22">Market Place</h2></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                           <?php 
                              echo $this->Form->input('UserSitterServices.market_place_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                           ?>
                        </div>
                        </div>
                        
                      
                        </div>
 
 
 
 
 
 </div>
 
 <div class="form-group col-lg-4 col-md-12">
 
 <p>Set-up and modify your settings for when you have guests at your house service loads for non-standard services</p>
 
 
 
 
 </div>
 
 <div class="form-group col-lg-4">
 
 
 <div class="row">
 
 <div class="col-lg-4">  <label for="" class="f14 color-green">Holiday Rate %</label>
                        <?php 
                                echo $this->Form->input('UserSitterServices.mp_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?></div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Small Guest Rate %</label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_small_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
                        </div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Large Guest Rate %</label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_large_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                 'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
                         </div>
 </div>
 
                   

                    </div>



</div>


<div class="row">

<div class="form-group col-lg-4 col-md-12">
 
 
 <div class="row">
 <div class="col-lg-6"> <label for="" class="f14 color-green">Grooming Rate </label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_grooming_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                 'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
 </div>
 
 <div class="col-lg-6"> <label for="" class="f14 color-green">Recreation Rate </label>
                           <?php 
                                echo $this->Form->input('UserSitterServices.mp_recreation_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
 </div>
 
 </div>
 
 
 
 
 
 </div>
 
 <div class="form-group col-lg-4 col-md-12">
 <div class="row">
 <div class="col-lg-6"> <label for="" class="f14 color-green">Training Rate </label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_training_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
 </div>
 
 <div class="col-lg-6"> <label for="" class="f14 color-green">Driving Rate </label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_driving_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
 </div>
 
 </div>
 
 
 </div>
 
 <div class="form-group col-lg-4">
 
 
 <div class="row">
 
 <div class="col-lg-4">  <label for="" class="f14 color-green">Cat Rate %</label>
                        <?php 
                                echo $this->Form->input('UserSitterServices.mp_cat_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?></div>
                          
                          <div class="col-lg-8">  <label for="" class="f14 color-green">Puppy &kitten Rate %</label>
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_puppy_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
                        </div>
                          
                          
 </div>
 
                   

                    </div>

</div>
                  

                
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-12 mt10">
                    
                    <div class="row">
                    
                    <div class="col-lg-12">
                    
                    <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Grooming</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <?php 
                           echo $this->Form->input('UserSitterServices.mp_grooming_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Premium Grooming Rate<small class="color-green-text"> (more than wash and blow dry) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                             echo $this->Form->input('UserSitterServices.mp_gr_premium_grooming_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                              echo $this->Form->input('UserSitterServices.mp_gr_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_gr_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                       <?php 
                                echo $this->Form->input('UserSitterServices.mp_gr_additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Premium Grooming Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                           <?php 
                                echo $this->Form->input('UserSitterServices.mp_gr_premium_grooming_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_gr_additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_gr_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    
                    </div>
                    
                    
                    <div class="col-lg-12 mt10">
                    
                    <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Recreation (Walking)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_recreation_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Premium Recreation Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_rc_premium_recreation_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                           <?php 
                             echo $this->Form->input('UserSitterServices.mp_rc_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                            <?php 
                              echo $this->Form->input('UserSitterServices.mp_rc_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                            ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.mp_rc_additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Premium Recreation Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.mp_rc_premium_recreation_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.mp_rc_additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.mp_rc_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
                        </div>
                      <div class="col-lg-3 col-md-6 text-right">
                      <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    
                    </div>
                    </div>
                    
                      
                    </div>

                    <div class="form-group col-lg-4 col-md-12 mt10">
                    
                    <div class="row">
                    
                    <div class="col-lg-12">
                    
                    <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Training</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <?php 
                            echo $this->Form->input('UserSitterServices.mp_training_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Premium Training Rate<small class="color-green-text"> (advanced or show dog training) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                         <?php 
                             echo $this->Form->input('UserSitterServices.mp_tr_premium_training_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                            echo $this->Form->input('UserSitterServices.mp_tr_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                              echo $this->Form->input('UserSitterServices.mp_tr_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.mp_tr_additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Premium Training Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                           <?php 
                                echo $this->Form->input('UserSitterServices.mp_tr_premium_training_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
                      </div>
                      <div class="col-lg-3 col-md-6 text-right">
                         <label >$00.00</label>
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_tr_additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_tr_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                          ?>
                      </div>
                      <div class="col-lg-3 col-md-6 text-right">
                        <label >$00.00</label>
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    
                    </div>
                    
                    
                    <div class="col-lg-12 mt10">
                    
                    <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Driver Service</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_driver_service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Return Trip<small class="color-green-text"> (pick up & drop off) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                            echo $this->Form->input('UserSitterServices.mp_ds_return_trip_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                            ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Additional Guest Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <?php 
                              echo $this->Form->input('UserSitterServices.mp_ds_additional_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Repeat client only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_ds_repeat_client_only_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>
                        </div>
                        </div></div>
                        
                        
                        
                        
                        
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Limit </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_ds_additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                          ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label ></label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Premium Driver Service Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                          <?php 
                                echo $this->Form->input('UserSitterServices.mp_ds_premium_driver_service_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Additional Guest Rate% </div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                            <?php 
                                echo $this->Form->input('UserSitterServices.mp_ds_additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12">Holiday Rate% <small class="color-green-text"> ( override ) </small></div> 
                      
                      
                      <div class="col-lg-4 col-md-6">
                           <?php 
                                echo $this->Form->input('UserSitterServices.mp_ds_holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'text',
                                  'label' =>false,
                                  'class'=>'form-control h32',
                                  'hiddenField' => false,
                                  'placeholder'=>" % "
                                 ]);
                            ?>
 
 
 

                      
                      </div>
                      
                      <div class="col-lg-3 col-md-6 text-right">
                      
                     
 

                         <label >$00.00</label>
 
 
 
 

                      
                      </div>
                      
                      
                      </div>
                              
                      </div>
                    
                    </div>
                    </div>
                    
                      
                    </div>

                    <div class="form-group col-lg-4 col-md-12 ">
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> <small class="color-green-text"> ( for site or member nominate holiday periods )</small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_holiday_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Guest Rate<br/> <small class="color-green-text"> ( other than cats and dogs ) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_small_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Large Guest Rate<br/> <small class="color-green-text">other than cats and dogs </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                              echo $this->Form->input('UserSitterServices.mp_large_guest_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cats Rate<br/> </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                             echo $this->Form->input('UserSitterServices.mp_cat_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                    
                    <div class="row mt10 ">
                    <div class="col-lg-12"><div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Puppy and Kitten Rate<br/> <small class="color-green-text"> 12 months and younger </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      
                      <label class="pull-right text-right mb2">$ 00.00</label><br>

                       <div class="chek-main-lat">
                        <?php 
                              echo $this->Form->input('UserSitterServices.mp_puppy_rate_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                        ?>
                        </div>   </div></div>
                      
                        
                      </div></div>
                    </div>
                      
                    </div>
                   

                  
                     </div>
                   <h3>
                   
                      
</h3>

<h2 class="f22 mb10">Calander<br>

<small class="color-green f14"> (Daily booking limits for your sitter booking. Show how many spaces are available for each service) </small>
</h2>
                  <div class="row img-rightsp mt10">
                  <div class="form-group col-lg-4">
                      <label for="">1. Day Care P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/daym1.png"> </label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.day_care_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                 'required'=>false,
                                 'class'=>'form-control mzero'
                              ]);
                          ?> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">2. Night Care P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/nightm1.png"> </label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.night_care_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                 'required'=>false,
                                'class'=>'form-control mzero'
                              ]);
                          ?>
                       
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">3. Visits P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/visitm1.png"> </label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.visits_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'required'=>false,
                                'class'=>'form-control mzero'
                              ]);
                          ?>
                    </div>
                  </div>
                  <div class="row img-rightsp mt10">
                    <div class="form-group col-lg-4">
                      <label for="">4. Hourly Services P/Day Limit <img src="<?php echo HTTP_ROOT; ?>img/hourlym1.png"> </label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.hourly_services_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'required'=>false,
                                'class'=>'form-control mzero'
                              ]);
                          ?> 
                    </div>
                    
                  </div>
                 <div class="row">
                    <p class="col-lg-12 sp-tb"><a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations'; ?>"><button type="button" class="btn previous pull-left"><i class="fa fa-chevron-left"></i>Previous</button></a>
                      <input type="submit" class="pull-right btn Continue" value="Submit" /></p>
                    </div>
                  <?php echo $this->Form->end(); ?>

                  </div>
                

              

            </div>
        
          </div>
        </div>

        </div>
      
<?php echo $this->Html->css('Front/dist/jquery.onoff.css');
      echo $this->Html->script(['Front/dist/jquery.onoff.js']);
 ?>
<script>
  $(document).ready(function (){
      $('.selectedCheckbox').click(function(){
            $(this).parent().parent().toggleClass("selected");
        });
   
    })
   /*For on-off button*/
    $(function(){
          $('input[type=checkbox]').onoff();
    });
       /*End of-off button*/
  
</script>

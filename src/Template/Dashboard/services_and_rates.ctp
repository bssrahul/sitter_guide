
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
                  <!--<form role="form">-->
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
                          <!--<input type="checkbox" checked="" class="onoffswitch-checkbox" id="onoffswitch1">-->
                          <?php 
                              echo $this->Form->input('UserSitterServices.cancellation_policy',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                          ?>
                          <!--<label for="onoffswitch1" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        </div>
                        </div>
                        </div></div>
                        <div class="row"><div class="col-lg-8 col-md-9 col-xs-8 col-lg-offset-1 mt10 "><b>Booking</b><small class="color-green-text"> (Under 24 hours) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" checked="" class="onoffswitch-checkbox" id="onoffswitch1">
                          <label for="onoffswitch1" class="onoffswitch-label"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserSitterServices.booking',[
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
 <div class="row"><div class="col-lg-9 col-md-9 col-xs-8"><h2 class="f22">Sitting at Sitter House</h2></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.service_for_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                               echo $this->Form->input('UserServiceDetail.sh.service_for',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'hidden',
                                'value'=>'sitter_house'
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
                          <!--<input type="number" class="form-control">-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                          ?>
                        </div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Small Guest Rate %</label>
                          <!--<input type="number" class="form-control">--> 
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.small_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                          ?>
                          </div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Large Guest Rate %</label>
                          <!--<input type="number" class="form-control">-->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.sh.large_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                          <!--<input type="number" class="form-control" placeholder="$"> -->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.day_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label'=>false,
                                'class'=>'form-control',
                                'placeholder'=>"$"
                              ]);
                           ?>
 
 
 
 </div>
 
 <div class="form-group col-lg-4 col-md-12">
 
  <label for="" class="f14 color-green">Night Rate </label>
                          <!--<input type="number" class="form-control" placeholder="$">--> 
                        <?php 
                              echo $this->Form->input('UserServiceDetail.sh.night_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label'=>false,
                                'class'=>'form-control',
                                'placeholder'=>"$"
                              ]);
                        ?>
 </div>
 
 <div class="form-group col-lg-4">
 
 
 <div class="row">
 
 <div class="col-lg-4">  <label for="" class="f14 color-green">Cat Rate %</label>
                          <!--<input type="number" class="form-control">-->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.sh.cat_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                        ?>
                        </div>
                          
                          <div class="col-lg-8">  <label for="" class="f14 color-green">Puppy &kitten Rate %</label>
                          <!--<input type="number" class="form-control">-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.puppy_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Day Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.service_type',[
                                'type'=>'hidden',
                                'value' =>'day_care'
                               ]);
                          ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.extended_stay_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.repeat_client_only_status',[
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
                      
                     
 

                         <!-- <input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.additional_guest_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.extended_stay_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                      
                     
 

                         <!-- <input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.additional_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                      <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.sh.sd.dc.holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                           <!--<input type="checkbox" checked />-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                               echo $this->Form->input('UserServiceDetail.sh.nc.service_type',[
                                'type'=>'hidden',
                                'value' =>'night_care'
                               ]);
                          ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.extended_stay_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.repeat_client_only_status',[
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                             <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.additional_guest_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " >--> 
                             <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.extended_stay_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.additional_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.sh.nc.holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                         <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.sh.holiday_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.sh.small_guest_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.sh.large_guest_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.sh.cats_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.sh.puppy_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.service_for_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                               echo $this->Form->input('UserServiceDetail.gh.service_for',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'hidden',
                                'value'=>'guests_house'
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
                          <!--<input type="number" class="form-control">-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.holiday_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false
                               ]);
                          ?></div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Small Guest Rate %</label>
                          <!--<input type="number" class="form-control">-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.small_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false
                               ]);
                          ?></div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Large Guest Rate %</label>
                          <!--<input type="number" class="form-control">-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.large_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                         <!--<input type="number" class="form-control" placeholder="$"> -->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.gh.day_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false,
                                'placeholder'=>"$"
                               ]);
                          ?>
 </div>
 
 <div class="col-lg-6"> <label for="" class="f14 color-green">Drop-in visit Rate </label>
                          <!--<input type="number" class="form-control" placeholder="$">--> 
                             <?php 
                              echo $this->Form->input('UserServiceDetail.gh.drop_visit_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'number',
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
                          <!--<input type="number" class="form-control" placeholder="$"> -->
                              <?php 
                                echo $this->Form->input('UserServiceDetail.gh.night_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                          <!--<input type="number" class="form-control">-->
                             <?php 
                                echo $this->Form->input('UserServiceDetail.gh.cat_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                              ?>
                        </div>
                          
                          <div class="col-lg-8">  <label for="" class="f14 color-green">Puppy &kitten Rate %</label>
                          <!--<input type="number" class="form-control">-->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.puppy_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dc.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              echo $this->Form->input('UserServiceDetail.gh.dc.service_type',[
                                'type'=>'hidden',
                                'value' =>'day_care'
                               ]);
                          ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dc.extended_stay_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dc.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dc.repeat_client_only_status',[
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
                      <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                            <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dc.additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dc.extended_stay_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                       <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dc.additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dc.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dv.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              echo $this->Form->input('UserServiceDetail.gh.dv.service_type',[
                                'type'=>'hidden',
                                'value' =>'drop_visit'
                              ]);
                          ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dv.extended_stay_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dv.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.gh.dv.repeat_client_only_status',[
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
                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dv.additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dv.extended_stay_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dv.additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                         <!-- <input type="number" class="form-control h32  " placeholder=" % " >--> 
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.dv.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.nc.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                               echo $this->Form->input('UserServiceDetail.gh.nc.service_type',[
                                'type'=>'hidden',
                                'value' =>'night_care'
                               ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Extended Stay Rate<small class="color-green-text"> (2nd consecutive stay onwards) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.nc.extended_stay_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.nc.additional_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.nc.repeat_client_only_status',[
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " >--> 
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.nc.additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.nc.extended_stay_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " >--> 
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.nc.additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.gh.nc.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.holiday_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.gh.small_guest_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.gh.large_guest_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.cats_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.gh.puppy_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.mp.service_for_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                               echo $this->Form->input('UserServiceDetail.mp.service_for',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'hidden',
                                'value'=>'market_place'
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
                          <!--<input type="number" class="form-control">-->
                         <?php 
                                echo $this->Form->input('UserServiceDetail.mp.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?></div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Small Guest Rate %</label>
                          <!--<input type="number" class="form-control">-->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.small_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false,
                                 'placeholder'=>" % "
                                 ]);
                            ?>
                        </div>
                          
                          <div class="col-lg-4">  <label for="" class="f14 color-green">Large Guest Rate %</label>
                         <!-- <input type="number" class="form-control">-->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.mp.large_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                         <!-- <input type="number" class="form-control"> -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.mp.grooming_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
 </div>
 
 <div class="col-lg-6"> <label for="" class="f14 color-green">Recreation Rate </label>
                         <!-- <input type="number" class="form-control"> -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.recreation_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                          <!--<input type="number" class="form-control"> -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.training_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?>
 </div>
 
 <div class="col-lg-6"> <label for="" class="f14 color-green">Driving Rate </label>
                          <!--<input type="number" class="form-control"> -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.driving_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                         <!-- <input type="number" class="form-control">-->
                        <?php 
                                echo $this->Form->input('UserServiceDetail.mp.cat_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
                                  'label' =>false,
                                  'class'=>'form-control',
                                  'hiddenField' => false
                                 ]);
                            ?></div>
                          
                          <div class="col-lg-8">  <label for="" class="f14 color-green">Puppy &kitten Rate %</label>
                          <!--<input type="number" class="form-control">-->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.puppy_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.gr.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              echo $this->Form->input('UserServiceDetail.mp.gr.service_type',[
                                'type'=>'hidden',
                                'value' =>'grooming'
                              ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Premium Grooming Rate<small class="color-green-text"> (more than wash and blow dry) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.mp.gr.grooming_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.gr.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.gr.repeat_client_only_status',[
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.mp.gr.additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.gr.premium_grooming_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                            <?php 
                                echo $this->Form->input('UserServiceDetail.mp.gr.additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                         <!-- <input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.gr.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.re.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              echo $this->Form->input('UserServiceDetail.mp.re.service_type',[
                                'type'=>'hidden',
                                'value' =>'recreation'
                              ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Premium Recreation Rate<small class="color-green-text"> (more than one guest) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.re.premium_recreation_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.mp.re.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.mp.re.repeat_client_only_status',[
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
                      
                     
 

                         <!-- <input type="number" class="form-control h32  " placeholder=" % " > -->
                            <?php 
                                echo $this->Form->input('UserServiceDetail.mp.re.additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                         <!-- <input type="number" class="form-control h32  " placeholder=" % " > -->
                         <?php 
                                echo $this->Form->input('UserServiceDetail.mp.re.premium_recreation_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.re.additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.re.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.mp.pt.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              echo $this->Form->input('UserServiceDetail.mp.pt.service_type',[
                                'type'=>'hidden',
                                'value' =>'training'
                              ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Premium Training Rate<small class="color-green-text"> (advanced or show dog training) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                          <?php 
                              echo $this->Form->input('UserServiceDetail.mp.pt.premium_training_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.pt.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                           <?php 
                              echo $this->Form->input('UserServiceDetail.mp.pt.repeat_client_only_status',[
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
                            <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                            <?php 
                                echo $this->Form->input('UserServiceDetail.mp.pt.additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      <!-- <input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.pt.premium_training_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                          <!-- <input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.pt.additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.mp.pt.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.ds.service_status',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'checkbox',
                                'label' =>false,
                                'class'=>'selectedCheckbox',
                                'hiddenField' => false
                               ]);
                              echo $this->Form->input('UserServiceDetail.mp.ds.service_type',[
                                'type'=>'hidden',
                                'value' =>'driver_service'
                              ]);
                        ?>
                        </div>
                        </div></div>
                        
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  ">Return Trip<small class="color-green-text"> (pick up & drop off) </small></div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                        <div class="chek-main-lat">
                        <div class="onoffswitch">
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.ds.return_trip',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                            <?php 
                              echo $this->Form->input('UserServiceDetail.mp.ds.additional_guest_rate_status',[
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
                          <!--<input type="checkbox" id="onoffswitch1" class="onoffswitch-checkbox" checked=""><label class="onoffswitch-label" for="onoffswitch1"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>-->
                            <?php 
                              echo $this->Form->input('UserServiceDetail.mp.ds.repeat_client_only_status',[
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " >--> 
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.ds.additional_guest_limit',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                          <?php 
                                echo $this->Form->input('UserServiceDetail.mp.ds.premium_driverservice_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                      
                     
 

                          <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.ds.additional_guest_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                           <!--<input type="number" class="form-control h32  " placeholder=" % " > -->
                           <?php 
                                echo $this->Form->input('UserServiceDetail.mp.ds.holiday_rate',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'number',
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
                        <!--<input type="checkbox" checked />-->
                         <?php 
                              echo $this->Form->input('UserServiceDetail.mp.holiday_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.small_guest_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.large_guest_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.cats_rate_status',[
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
                        <!--<input type="checkbox" checked />-->
                        <?php 
                              echo $this->Form->input('UserServiceDetail.mp.puppy_rate_status',[
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
                      <!--<input type="text" placeholder="New Password" id="" class="form-control mzero">-->
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
                      <!--<input type="text" placeholder="New Password" id="" class="form-control mzero">-->
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
                     <!-- <input type="text" placeholder="New Password" id="" class="form-control mzero">-->
                        <?php 
                              echo $this->Form->input('UserSitterServices.visits_limit',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'required'=>false,
                                'class'=>'form-control mzero'
                              ]);
                          ?>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">4. Hourly Services P/Day Limit <img src="<?php echo HTTP_ROOT; ?>img/hourlym1.png"> </label>
                     <!-- <input type="text" placeholder="New Password" id="" class="form-control mzero">-->
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
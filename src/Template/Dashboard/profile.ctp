 <?php 
  echo $this->Html->css(['Front/jquery-ui.css']); 
  echo $this->Html->script(['Front/jquery-ui.js']);
?>
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
                <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">Sitter Profile</h3>

                <?php echo $this->element('frontElements/profile/sitter_nav');?>
          
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">


 <div id="home1" class="tab-pane fade in active tab-comm">
                
                  <!--<form role="form">-->
            <?php echo $this->Form->create(@$userInfo, [
              'url' => ['controller' => 'dashboard', 'action' => 'profile'],
              'role'=>'form',
              'id'=>'generelInfo'
          ]);?>
                  <div class="row">
                        <div class="form-group col-lg-4 col-md-4">
                      <?php 
                      echo $this->Form->input('Users.title',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'options'=>['Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms'],
                        'class' =>'form-control'
                        ]);
                      ?>
                        </div>

                        <div class="form-group col-lg-8 noned">
                       
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4">
                          <label for="">Date of Birth</label>
                          <?php  
                              echo $this->Form->input('Users.birth_date',[               
                              'class'=>'form-control dob',
                              'label'=>false,
                              'templates' => ['inputContainer' => '{{content}}'],
                              'placeholder'=>'DD/MM/YYYY', 
                              ]);
                          ?> 
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.first_name',[                
                                 'class'=>'form-control',
                                 'required'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.last_name',[                
                                 'class'=>'form-control',
                                 'required'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                        </div>
                    </div>
                    <h3>Address</h3>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.address',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'Address 1',
                                 'label'=>false,
                                 'type'=>'text',
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.address2',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'Address 2',
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.city',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'city',
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                          </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.zip',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'Post / Zip Code',
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.state',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'state',
                                 'label'=>false,
                                 'required'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.country',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'country',
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                      </div>
                      
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                     
                      <div class="row">
                          
                          <div class="col-lg-6 col-xs-6">
                            <?php 
                                echo $this->Form->input('Users.county_code',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'select',
                                  'label'=>false,
                                  'options'=>['44'=>'UK (+44)','1'=>'USA (+1)'],
                                  'class' =>'form-control'
                                  ]);
                            ?>

                        </div>
                          <div class="col-lg-6 col-xs-6">
                            <?php 
                                echo $this->Form->input('Users.phone',[                
                                 'class'=>'form-control col-lg-10',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                          </div></div>
                    </div>
                   
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.zone_id',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'select',
                                  'label'=>false,
                                  'options'=>$zones_info,
                                  'class' =>'form-control'
                                  ]);
                            ?>
                          </div>
                      
                    </div>
                    <h3>Change Password</h3>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                           <?php 
                                echo $this->Form->input('Usersp.current_password',[                
                                 'class'=>'form-control',
                                 'type'=>'password',
                                 'placeholder'=>'Cuurent Password',
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$error['current_password'][0]).'</em>';
                            ?>
                    </div>
                   
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Usersp.password',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'New Password',
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$error['password'][0]).'</em>';
                            ?>
                      <span class="range-c" id="passwordStatus"></span>
                    </div>

                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Usersp.re_password',[                
                                 'class'=>'form-control',
                                 'placeholder'=>'Confirm Password',
                                 'label'=>false,
                                 'type'=>'password',
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$error['re_password'][0]).'</em>';
                            ?>
                      <span class="pull-right captcha"><img src="<?php echo HTTP_ROOT; ?>img/captcha.jpg"></span>

                      <!--<span class="pull-right captcha">
                        <div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_KEY; ?>"></div>
                        <br/><label generated="true" class="error"><?php echo isset($captchErr)?$captchErr:''; ?></label>
                      </span>-->
                    
                          </div>
                      
                    </div>
                 
                    <div class="row pull-right sp-tb">
                    <p class="col-lg-12">
                      <input type="submit" class="btn Continue" value="Continue" ></p>
                    </div>
                   <!--</form>-->
                   <?php echo $this->Form->end(); ?>
              </div>


              </div>
        
          </div>
        </div>

        </div>
      </div>
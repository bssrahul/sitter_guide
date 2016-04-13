 <?php 
  echo $this->Html->css(['Front/jquery-ui.css']); 
  echo $this->Html->script(['Front/jquery-ui.js']);
?>
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
  <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">Sitter Profile</h3>
            <ul class="nav nav-pills">
              <li class="active gen"><a data-toggle="pill" href="#home1"><img src="<?php echo HTTP_ROOT; ?>img/ic1.png">General</a></li>
              <li class="hou"><a data-toggle="pill" href="#menu11"><img src="<?php echo HTTP_ROOT; ?>img/ic2.png">Sitter House</a></li>
              <li class="sitt"><a data-toggle="pill" href="#menu2"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png">Sitter</a></li>
              <li class="proa"><a data-toggle="pill" href="#menu3"><img src="<?php echo HTTP_ROOT; ?>img/ic4.png">Professional Accreditations</a></li>
              <li class="serv"><a data-toggle="pill" href="#menu4"><img src="<?php echo HTTP_ROOT; ?>img/ic5.png">Services & Rates</a></li>


            </ul>
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">
              <div id="home1" class="tab-pane fade in active tab-comm">
                
                  <!--<form role="form">-->
            <?php echo $this->Form->create($userInfo, [
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
                      <span class="range-c"><img id="password_line" src="<?php echo HTTP_ROOT; ?>img/weak.jpg"> <small class="pull-right">Weak</small></span>
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
              <div id="menu11" class="tab-pane fade tab-comm">
          
                  <form role="form">

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for=""> Property Type</label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>

                    <div class="form-group col-lg-4 text-italic">
                      <label for="">Outdoor Area</label>
                      <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>

                    <div class="form-group col-lg-4">
                      <label for="">Outdoor Area Size</label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Outing Area (allow multiple)  </label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>

                    


                    <div class="form-group col-lg-4">
                      <label for="">Cancellation Policy</label>
                      <input type="text" class="form-control mzero" id="" placeholder="New Password">
                          
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Toilet Breaks provided - every  </label>
                      <input type="text" class="form-control mzero" id="" placeholder="New Password">
                       
                    </div>

                    </div>

                    <div class="row">
                    <div class="form-group col-lg-4">
                    <label>Fully Fenced Outdoor Area</label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>

                     <div class="form-group col-lg-4">
                    <label>Smokers</label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>

                     <div class="form-group col-lg-4 noned">
                    
                    </div>
                      
                    </div>

                    <div class="row">
                    <p class="col-lg-12 sp-tb"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i>Previous</button><button class="pull-right btn Continue" type="button">Continue</button></p>
                    </div>


</form>

              </div>
              <div id="menu2" class="tab-pane fade tab-comm">
             
                  <form role="form">

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Accepted Pet Sizes</label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Preferred Guest Ages  </label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Cancellation Policy</label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>

                  </div>
                  
                   <form role="form">

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="">Toilet Breaks provided - every  </label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Years of Sitting Experience </label>
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">Mixed Familes </label>
                      <input type="text" class="form-control mzero" id="" placeholder="I look after pets from different families">
                       
                    </div>
                  </div>
                  
                  <div class="row">
                        <div class="form-group col-lg-4">
                          <label for="">Describe yourself in 35 characters  </label>
                          <textarea></textarea>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="">Why should you take care of their guest?    </label>
                          <textarea></textarea>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="">Sitter Guide Carers Package </label>
                          <textarea></textarea>
                        </div>

                    
                  </div>

                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Accept Un-Neutered Pets  </label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Accept un-spayed females </label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Birds in cages?</label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                    
                  </div>


                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Accept females on heat </label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Accept un-toilet trained pets   </label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Dogs in home?</label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                    
                  </div>

                  <div class="row">
                     <div class="form-group col-lg-4">
                    <label>Last Minute Bookings  </label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Longer than 1 week stays  </label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                     <div class="form-group col-lg-4">
                    <label>Cats in home?</label>
                    <span class="pull-right m-rights"><label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> </span> 
                    </div>
                    
                  </div>
                  <h3>Photo</h3>
                  <p class="browse-p">Add your profile photo<button type="button" class="btn btn-primary">Browse Photo</button></p>

                  <div class="row">
                    <div class="col-lg-1 col-md-2 col-xs-3">
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
                      
                    </div>
                    
                  </div>

                    

                    


        
                    
                  
                    

                   <div class="row">
                    <p class="col-lg-12 sp-tb"><button type="button" class="btn previous pull-left"><i class="fa fa-chevron-left"></i>Previous</button><button type="button" class="pull-right btn Continue">Continue</button></p>
                    </div>
</form>
              </div>
              <div id="menu3" class="tab-pane fade tab-comm">
                
                <form role="form">
                  <h3><strong>Physician (Pets)</strong><small>( Government Issued Medical Certificate ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Issuing Institution" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Date Issued" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                      <input type="text" placeholder="Upload Scanned Certificate " id="" class="form-control">
                      <button type="button" class="btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    <div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>
                   
                  </div>

                  <h3><strong>Physician (Pets)</strong><small>   ( Medical Certificate ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Qualification Title" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                      <input type="text" placeholder="Upload Scanned Certificate " id="" class="form-control">
                      <button type="button" class="btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    <div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>
                   
                  </div>

                  <h3><strong>Physician (People)</strong><small>   ( Medical Certificate ) </small></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Qualification Title" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                      <input type="text" placeholder="Upload Scanned Certificate " id="" class="form-control">
                      <button type="button" class="btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    <div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>
                   
                  </div>

                  <h3><strong>Other Qualifications & Specific Skills</strong><small>   ( Please specify ) </small> <span class="pull-right add-more-n"> <i class="fa fa-plus-circle"></i>
 Add More</span></h3>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Qualification Title" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                    <div class="brow-inner">
                      <input type="text" placeholder="Upload Scanned Certificate " id="" class="form-control">
                      <button type="button" class="btn btn-secondary">Browse</button>
                      </div>
                    </div>
                    <div class="form-group col-lg-2">
                      <button class="btn btn-primary upload-side" type="button">Upload</button>
                    </div>
                   
                  </div>


                  <div class="row">
                    <div class="col-lg-4">
                       <label for="">Do you know CPR for  </label>
                          <select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>
                      
                    </div>

                    <div class="col-lg-4">
                      <label for="">Do you know CPR for </label>
                          <select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>
                    </div>

                    <div class="col-lg-4">
                       <label for="">I can administer Oral Medications</label>
                          <select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>
                    </div>

                    </div>

                    <div class="row">
                    <div class="col-lg-4">
                     <label for="">I canadminister Injected Medications</label>
                          <select id="sel1" class="form-control">
                        <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>
                          </div>
                      
                   

              
                    <div class="col-lg-4">
                     <label for="">Familiar with Pet Training Techniques</label>
                          <select id="sel1" class="form-control">
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>

                    </div>
                    

                   
                    <div class="col-lg-4">
                       <label for="">Experience with Behavioural Problems</label>
                          <select id="sel1" class="form-control">
                            <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>
                    </div>
                    </div>

                    <div class="row">
                   

                
                    <div class="col-lg-4">
                         <label for="">Experience with Rescue Pets  </label>
                          <select id="sel1" class="form-control">
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>

                    </div>
                    <div class="col-lg-4">
                      <label for="">Languages</label>
                          <select id="sel1" class="form-control">
                            <option>English</option>
                            <option>Chinese</option>
                            <option>Czech</option>
                            <option>Danish</option>
                            <option>Dutch</option>
                            <option>Finnish</option>
                            <option>French</option>
                            <option>German</option>
                            <option>Italian</option>
                            <option>Japanese</option>
                            <option>Maori</option>
                            <option>Norwegian</option>
                            <option>Portugese</option>
                            <option>Russian</option>
                            <option>Spanish</option>
                            <option>Swedish</option>
                            <option>Other</option>
                          </select>
                    </div>


                    </div>
                   <div class="row">
                    <p class="col-lg-12 sp-tb"><button class="btn previous pull-left" type="button"><i class="fa fa-chevron-left"></i>Previous</button><button class="pull-right btn Continue" type="button">Continue</button></p>
                    </div>
                     
                     
                  </form>
                
                
                
               
              </div>


              <div class="tab-pane fade tab-comm" id="menu4">
             
                  <form role="form">
                  <h3><strong>All services for Sitters house and Guests House</strong></h3>
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <h4>Day Care</h4>
                      <div class="radio-main">
                        <label><span class="custom-checkbox"><input type="checkbox" value="football" name="sport[]"></span> Day Care For Sitters house</label>
                      </div>
                      <div class="radio-main">
                        <label><span class="custom-checkbox"><input type="checkbox" value="football" name="sport[]"></span> Day Care For Guests house</label>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <h4>Visits</h4>
                      <div class="radio-main">
                        <label><span class="custom-checkbox"><input type="checkbox" value="football" name="sport[]"></span> Day Care For Sitters house</label>
                      </div>
                      <div class="radio-main">
                        <label><span class="custom-checkbox"><input type="checkbox" value="football" name="sport[]"></span> Day Care For Guests house</label>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <h4>Night Care</h4>
                      <div class="radio-main">
                        <label><span class="custom-checkbox"><input type="checkbox" value="football" name="sport[]"></span> Night Care For Sitters house</label>
                      </div>
                      <div class="radio-main">
                        <label><span class="custom-checkbox"><input type="checkbox" value="football" name="sport[]"></span> Night Care For Guests house</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-4">
                      <h4 class="top-sh">Hourly</h4>
                          <select id="" class="form-control">
                            <option>Sitting for Sitters house</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>
                    <div class="form-group col-lg-8 noned"></div>
                  </div>

                  <h3><strong>Boarding At Sitters Home</strong></h3>
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> (Service load - member activated. Not automated)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cat Rate <br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Cat Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Pets  - other than cats & dogs<br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>
                   

                    
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> (Service load - member activated. Not automated)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cat Rate <br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Cat Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Pets  - other than cats & dogs<br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>
                    
                 


                  
                    <div class="form-group col-lg-4 col-md-12">
                       <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Day Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-sm-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Night Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Long Term Care</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/night (after 1st night)  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>
                    
                  

                   
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Hourly Care</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/hour   </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    
                    </div>
                     </div>

                    <h3><strong>Home Sitting At Guests Home</strong></h3>


                    <div class="row">
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> (Service load - member activated. Not automated)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cat Rate <br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Cat Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Pets  - other than cats & dogs<br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>
                   

                    
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Holiday Rate<br/> (Service load - member activated. Not automated)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Cat Rate <br/>(Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Cat Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Small Pets  - other than cats & dogs<br/> (Service load)</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>
                    
                 


                  
                    <div class="form-group col-lg-4 col-md-12">
                       <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Day Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-sm-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                       <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Night Care</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3 col-xs-3 pull-right">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate:  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Long Term Care</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/night (after 1st night)  </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    </div>
                    
                  

                   
                    <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Hourly Care</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                      <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                      <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate p/hour   </div> 
                      <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      <div class="row"><div class="col-lg-5 col-md-5">Holiday Rate </div> 
                      <div class="col-lg-7 col-md-7">   <input type="text"></input>  </div></div>
                        
                      </div>
                    
                    </div>
                     </div>


                     <h3>Hourly Products</h3>

                     <div class="row">
                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Grooming</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode   </div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate   </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      </div>
                        
                      </div>

                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Training</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode   </div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">1st Guest Rate   </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      </div>
                        
                      </div>

                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Outdoors Recreation (walking)  </div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">1 Per Day, 1 Guest: </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9"> 1 Per Day, 1 Guest: </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        
                      </div>
                        
                      </div>

                       <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Driver Service</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Away Mode</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">  Pick-up:  </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">Drop-off:  </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">Return:  </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                      </div>
                        
                      </div>

                      <div class="form-group col-lg-4 col-md-12">
                      <div class="rules_main">
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Outdoors Recreation (walking)  </div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Additional Guest Rate Away Mode  </div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/on.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9 col-xs-8">Repeat Clients Only</div> 
                        <div class="col-lg-3 col-md-3">   <img src="<?php echo HTTP_ROOT; ?>img/off.png">   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9">1 Per Day, 1 Guest: </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        <div class="row"><div class="col-lg-9 col-md-9"> 1 Per Day, 1 Guest: </div> 
                        <div class="col-lg-3 col-md-3 num">   $ 00.00   </div></div>
                        
                      </div>
                        
                      </div>





                       
                     </div>

                   <h3><i>Below <strong>4 features</strong> update the calendar to show how many spaces are availble for booking for each product </i>     
</h3>
                  <div class="row img-rightsp">
                  <div class="form-group col-lg-4">
                      <label for="">1. Day Care P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/daym1.png"> </label>
                      <input type="text" placeholder="New Password" id="" class="form-control mzero">
                       
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">2. Night Care P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/nightm1.png"> </label>
                      <input type="text" placeholder="New Password" id="" class="form-control mzero">
                       
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">3. Visits P/day Limit <img src="<?php echo HTTP_ROOT; ?>img/visitm1.png"> </label>
                      <input type="text" placeholder="New Password" id="" class="form-control mzero">
                       
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="">4. Hourly Services P/Day Limit <img src="<?php echo HTTP_ROOT; ?>img/hourlym1.png"> </label>
                      <input type="text" placeholder="New Password" id="" class="form-control mzero">
                       
                    </div>
                    
                  </div>



                     
<div class="row">
                    <p class="col-lg-12 sp-tb"><button type="button" class="btn previous pull-left"><i class="fa fa-chevron-left"></i>Previous</button><button type="button" class="pull-right btn Continue">Submit</button></p>
                    </div>


                  </form>

                  </div>













            </div>
        
          </div>
        </div>

        </div>
      </div>
      <script> 
      function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();

$(document).ready(function(){
  $("#flip").click(function(){
        $("#panel").slideDown("slow");
    });
  $("#close").click(function(){
        $("#panel").slideUp("slow");
    });
    $("#dro plog").click(function(){
        $("#dr opcont").toggle("slow");
    });
  $("#drop log2").click(function(){
        $("#dropcont2").toggle("slow");
    });
    $("#dro plog3").click(function(){
        $("#dropcont3").toggle("slow");
    }); 
  $(".one").click(function() {
    $("#one").toggle("slow");
});
    $(".add-more-expand").click(function(){
            $(".add-more-expand i").toggleClass("fa-plus-circle fa-minus-circle");
            });
            

 //For add datepicker
    $("#users-birth-date").datepicker(
           {
         changeMonth: true,
         changeYear: true
       }
      );
    $(".fa-calendar").click(function(){ $("#users-birth-date").focus();});
 
  
});



 function customCheckbox(checkboxName){
        var checkBox = $('input[name="'+ checkboxName +'"]');
        $(checkBox).each(function(){
            $(this).wrap( "<span class='custom-checkbox'></span>" );
            if($(this).is(':checked')){
                $(this).parent().addClass("selected");
            }
        });
        $(checkBox).click(function(){
            $(this).parent().toggleClass("selected");
        });
    }
    $(document).ready(function (){
        customCheckbox("sport[]");
        customCheckbox("car[]");
        customCheckbox("confirm");
    })


</script> 
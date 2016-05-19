<script src='https://www.google.com/recaptcha/api.js'></script>
<?php 
  echo $this->Html->css(['Front/jquery-ui.css']); 
  echo $this->Html->script(['Front/jquery-ui.js']);
?>

 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
                <h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png">
                  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Profile')); ?></h3>

                <?php echo $this->element('frontElements/profile/sitter_nav');?>
          
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">


 <div id="home1" class="tab-pane fade in active tab-comm">
                
                  <!--<form role="form">-->
            <?php echo $this->Form->create(@$userInfo, [
              'url' => ['controller' => 'dashboard', 'action' => 'profile'],
              'role'=>'form',
              'id'=>'generelInfo',
			   'autocomplete'=>'off',
          ]);?>

                  <div class="row">
                    <h3><i aria-hidden="true" class="fa fa-hand-pointer-o cir-o"></i>
                    <?php echo $this->requestAction('app/get-translate/'.base64_encode('Tell us a bit about yourself')); ?> 
                <span class="pull-right hed-0">
                  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Let us step you through setting up your Sitter Guide profile.')); ?></span>
                   <p class="sub-title"><small>
      <?php echo $this->requestAction('app/get-translate/'.base64_encode('This page is just about you in general and allows you to update your
profile photo’s, video, password and contact details.')); ?></small></p>
                </h3>
                        <div class="form-group col-lg-4 col-md-4">
                          <label for="title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?></label>
                      <?php 
                      echo $this->Form->input('Users.title',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label'=>false,
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
                          <label for="Users['birth_date']"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Date of Birth')); ?></label>
                          <?php  
                              echo $this->Form->input('Users.birth_date',[               
                              'class'=>'form-control dob',
                              'label'=>false,
                              'templates' => ['inputContainer' => '{{content}}'],
                              'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('DD/MM/YYYY')), 
                              ]);
                          ?> 
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                           <label for="Users['first_name']"><?php echo $this->requestAction('app/get-translate/'.base64_encode('First Name')); ?></label>
                            <?php 
                                echo $this->Form->input('Users.first_name',[                
                                 'class'=>'form-control',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                          <label for="Users['last_name']"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Name')); ?></label>
                            <?php 
                                echo $this->Form->input('Users.last_name',[                
                                 'class'=>'form-control',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                        </div>
                    </div>
                    <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Address')); ?>
                      <span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Your address will not be made public. Instead, we use your address to indicate to other members how close they are to you. Example: the proximity map shown on your profile and search results.')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span>
                    </h3>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">

                            <?php 
                                echo $this->Form->input('Users.address',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Address 1')),
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
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Address 2')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                      <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.city',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('City')),
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
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Post / Zip Code')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-4">
                            <?php 
                                echo $this->Form->input('Users.state',[                
                                 'class'=>'form-control',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('State')),
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
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Country')),
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                      </div>
                      
                    </div>
                  <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Details')); ?>
                    </h3>
                    <div class="row">
                    <div class="form-group col-lg-8 col-md-8">
                     
                      <div class="row">
                          
                          <div class="col-lg-3 col-xs-3">
                            <label for="county_code" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Code')); ?></label>
                            <?php 
                                echo $this->Form->input('Users.county_code',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'select',
                                  'label'=>false,
                                  'options'=>@$counry_info,
                                  'class' =>'form-control'
                                  ]);
                            ?>

                        </div>
                          <div class="col-lg-3 col-xs-9">
                              <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Mobile/Cell')); ?><span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('We will send an sms confirmation to this number for verification')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span></label>
                            <?php 
                                echo $this->Form->input('Users.phone',[                
                                 'class'=>'form-control col-lg-10',
                                 'required'=>false,
                                 'label'=>false,
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                            ?>
                          </div>
                        <div class="col-lg-3 col-md-3">
                          <label class="invisi-no" for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('im-vi')); ?></label>
                            <div class="varify-mobile">
                              
                              <a href="#" class="unvari"><img src="<?php echo HTTP_ROOT; ?>img/unverify.png"></a>
                                 
                            </div>
                          </div>


                        </div>
                    </div>
                   
                      <div class="form-group col-lg-4 col-md-4">
                         <label class="invisi-no" for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Time Zone')); ?></label>
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
                    <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Password')); ?><span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Alphanumeric & minimum character combination is required')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span></h3>
                    <div class="row">
                    <div class="form-group col-lg-4 col-md-4">
                           <?php 
                                echo $this->Form->input('Usersp.current_password',[                
                                 'class'=>'form-control',
                                 'type'=>'password',
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Cuurent Password')),
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
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Confirm Password')),
                                 'label'=>false,
                                 'type'=>'password',
                                 'templates' => ['inputContainer' => '{{content}}']
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$error['re_password'][0]).'</em>';
                            ?>
                      <!--<span class="pull-right captcha"><img src="<?php echo HTTP_ROOT; ?>img/captcha.jpg"></span>-->

                      <span class="pull-right captcha" >
                        <div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_KEY; ?>"></div>
                        <br/><label generated="true" class="error"><?php echo isset($captchErr)?$captchErr:''; ?></label>
                      </span>
                    
                          </div>
                      
                    </div>
                    <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contacts')); ?> <span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Alphanumeric & minimum character combination is required')); ?>"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></a></span></h3>
                    <div class="row">
                        <div class="form-group col-lg-4">
                          <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?> </label>
                              <!--<input type="text" placeholder="" id="" class="form-control mzero">-->
                               <?php 
                                echo $this->Form->input('Users.email',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'label'=>false,
                                  'required'=>false,
                                  'class' =>'form-control',
                                  'disabled'=>'disabled'
                                  ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Emergency Contacts')); ?> </label>
                          <!--<input type="text" placeholder="" id="" class="form-control mzero">-->
                           <?php 
                                echo $this->Form->input('Users.emergency_contacts',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'label'=>false,
                                  'class' =>'form-control mzero'
                                  ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('In emergency, who can speak?')); ?></label>
                          <!--<input type="text" placeholder="" id="" class="form-control mzero">-->
                           <?php 
                                echo $this->Form->input('Users.emergency_who',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'label'=>false,
                                  'class' =>'form-control mzero'
                              ]);
                            ?>
                            
                        </div>
                  </div>
                 <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo')); ?></h3>
                 <div class="row">
                     <div class="col-lg-5">
                     <div class="row d-m2">
                     <div class="col-lg-7">
                    <p class="browse-p"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your profile Photo')); ?></p>
                    <p>
                      <?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 400x400 pixels.')); ?>
                         
                    </p>
                 
               <?php 
                       $session = $this->request->session(); 
                       $user = $session->read('User');
                    ?>
             <!--<button id="change_pic" class="btn "></button>-->
               <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal21"><i class="fa fa-upload" aria-hidden="true"></i>
                <?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Profile Photo')); ?>
                         
               </button>
              <!--<button type="button" class="btn btn-upload center-block" data-toggle="modal" data-target="#myModal21">
                Upload photo
              </button>-->
                    

</div>
                   <div class="col-lg-5">
                      <!--<img src="<?php echo HTTP_ROOT; ?>img/dm.png">-->
                       <img  id="avatar-edit-img" src="<?php echo HTTP_ROOT.'img/uploads/'.($user['image'] != ''?$user['image']:'prof_photo.png'); ?>" class=" img-responsive" alt="upload-photo">

                    </div>

</div>
           </div>
              


                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 full-width11">
                       <div class="row d-m2">
                       <div class="col-lg-7">
                      <p class="browse-p">
                        <?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your banner profile banner')); ?>
                        <!-- <button type="button" class="btn btn-primary pull-right">Browse Photo</button> --></p>
                      <p  class="min-hh">
                        <?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 950x250 pixels.')); ?>
                           
                      </p>
                      <button class="btn btn-primary" type="button" id="browseBanner"><i class="fa fa-upload" aria-hidden="true"></i>
                        <?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Profile Banner')); ?>
                        </button>

                        </div>
                        <div class="col-lg-5">
                          <?php if(@$userInfo->profile_banner != ''){
                                  $pathBanner = HTTP_ROOT.'img/uploads/'.@$userInfo->profile_banner; 
                            }else{
                                 $pathBanner = HTTP_ROOT.'img/img.png'; 
                            }
                         
                            ?>
                                <img id="preview-profile-banner" class="img-responsive" src="<?php echo @$pathBanner; ?>">
                                 <?php echo '<em class="signup_error error clr addBannerError"></em>'; ?>
                        </div>
                        </div>
                     </div>
                </div>
                <div class="row">
                  <div class="col-lg-7">
                    <div class="row d-m2">
                    <div class="col-lg-6">
                    <p class="browse-p">
                       <?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your profile Video')); ?>
                      <!-- <button type="button" class="btn btn-primary pull-right">Browse Video</button> --></p>
                    <p>
                      <?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended size is 50mb.')); ?>
                       </p>
                    <button class="btn btn-primary" type="button" id="browseVideo"><i class="fa fa-upload" aria-hidden="true"></i>
                       <?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Profile Video')); ?>
                          
                    </button>
                    </div>
                    <div class="col-lg-6">
					<span class="videoBanner">&nbsp;</span>
                      <?php if(@$userInfo->profile_video != ''){
                           $path = HTTP_ROOT.'files/video/'.@$userInfo->profile_video; 
                      }else{
                           $path ='https://www.youtube.com/embed/GF60Iuh643I';
                      }
                      
                     ?>
                    <iframe id="preview-profile-video" width="" height="" src="<?php echo @$path; ?>" frameborder="0" allowfullscreen>
                    </iframe>
                   <?php echo '<em class="signup_error error clr addError"></em>'; ?>
                       </div>
                        </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 full-width11">
                       <div class="row d-m2">
                       <div class="col-lg-7">
                      <p class="browse-p">
                        <?php echo $this->requestAction('app/get-translate/'.base64_encode('Add your profile video image')); ?>
                        <!-- <button type="button" class="btn btn-primary pull-right">Browse Photo</button> --></p>
                      <p  class="min-hh">
                        <?php echo $this->requestAction('app/get-translate/'.base64_encode('In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 950x250 pixels.')); ?>
                           
                      </p>
                      <button class="btn btn-primary" type="button" id="browseVideoImage"><i class="fa fa-upload" aria-hidden="true"></i>
                        <?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Video Image')); ?>
                        </button>

                        </div>
                        <div class="col-lg-5">
                          <?php if(@$userInfo->profile_video_image != ''){
                                  $pathVideoImg = HTTP_ROOT.'img/uploads/'.@$userInfo->profile_video_image; 
                            }else{
                                 $pathVideoImg = HTTP_ROOT.'img/deta-video.png'; 
                            }
                         
                            ?>
                                <img id="preview-profile-video-image" class="img-responsive" src="<?php echo @$pathVideoImg; ?>">
                                 <?php echo '<em class="signup_error error clr addVideoImgError"></em>'; ?>
                              </div>
                        </div>
                     </div>
                </div>
                  <div class="row pull-right sp-tb">
                    <p class="col-lg-12">
                      <input type="submit" class="btn Continue" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?>" >
                      
                    </p>
                  </div>
                  <?php echo $this->Form->end(); ?>

              </div>
             </div>
          </div>
        </div>

        </div>

      </div>





  <div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
    <div class="modal-dialog">
       <div class="sitter-quike-view">
         	<div class="sqv-box">
            	<div class="top-close"> 
                <p class="pop-top-pop"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Change Profile Picture')); ?></p>
                	<a data-dismiss="modal" title="Close" href="#"><i aria-hidden="true" class="fa fa-times"></i></a>           
                </div>    
                
                
                <!--Additional Services-->          
                	<div class="additional-services">  
                    	  <div class="modal-body">
               <!-- <form id="cropimage" method="post" enctype="multipart/form-data" action="profile.php">-->
                  <?php echo $this->Form->create(null,['id'=>'cropimage','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'changeAvatar']]); ?>
                  <b> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Crop your image')); ?> </b> <br/> <br/> 

                    <input style="hidden" type="file" name="image" id="image" />

                    <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
                    <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
                    <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
                    <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
                    <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
                    <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
                    <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                    <input type="hidden" name="action" value="" id="action" />
                    <input type="hidden" name="image_name" value="" id="image_name" />
                    
                    <div id='preview-avatar-profile'>
                    </div>
                <div id="thumbs" style="padding:5px; width:600"></div>
              <!--  </form>-->
              <?php echo $this->Form->end(); ?>
            </div>
                 <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Close')); ?></button>
                <button type="button" id="btn-crop" class="btn btn-crop"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Crop & Save')); ?></button>
            </div>        
                          
                                           	
                    </div> 
                <!--Additional Services-->           
                
            </div>         	
         </div>  
    </div>
  </div












    <!--model box -->
	
<?php echo $this->Form->create(null,['id'=>'profileVideo','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-video'],
                  'style'=>"visibility: hidden"]); ?>
                <input type="file" name="profile_video" id="profile_video" />
<?php echo $this->Form->end(); ?>
<?php echo $this->Form->create(null,['id'=>'profileBanner','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-banner'],
                  'style'=>"visibility: hidden"]); ?>
                <input type="file" name="profile_banner" id="profile_banner" />
<?php echo $this->Form->end(); ?>
<?php echo $this->Form->create(null,['id'=>'videoImage','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-video-image'],
                  'style'=>"visibility: hidden"]); ?>
                <input type="file" name="profile_video_image" id="profile_video_image" />
<?php echo $this->Form->end(); ?>

      <script>
$(document).ready(function(){
  var host = window.location.host;
  var proto = window.location.protocol;
  var ajax_url = proto+"//"+host+"/<?php echo ROOT_PATH; ?>/"; 

  $('#change_pic').on('click', function(e){ 
      e.preventDefault();
      $('#changePic').show();
        
  });

  $('#image').on('change', function()   
  { 
    $("#preview-avatar-profile").html('');
   $("#preview-avatar-profile").html("<img src='<?php echo HTTP_ROOT."img/search-loader.gif" ?>'>");
    $("#cropimage").ajaxForm(
    {
    target: '#preview-avatar-profile',
    success:    function(data) { 
      //alert(data);
            $('img#photo').imgAreaSelect({
            aspectRatio: '1:1',
            onSelectEnd: getSizes,
        });
        }
    }).submit();
  });
 //call on crop iamge button
  jQuery('#btn-crop').on('click', function(e){
       
      e.preventDefault();
      params = {
              targetUrl: ajax_url,
              action: 'dashboard/save-avatar-tmp',
              x_axis: jQuery('#hdn-x1-axis').val(),
              y_axis : jQuery('#hdn-y1-axis').val(),
              x2_axis: jQuery('#hdn-x2-axis').val(),
              y2_axis : jQuery('#hdn-y2-axis').val(),
              thumb_width : jQuery('#hdn-thumb-width').val(),
              thumb_height:jQuery('#hdn-thumb-height').val()
          };
          saveCropImage(params);
  });


});   
//fucntion for get image cropped co-ordinate
function getSizes(img, obj)
{
    var x_axis = obj.x1;
    var x2_axis = obj.x2;
    var y_axis = obj.y1;
    var y2_axis = obj.y2;
    var thumb_width = obj.width;
    var thumb_height = obj.height;
    if(thumb_width > 0)
        {

            jQuery('#hdn-x1-axis').val(x_axis);
            jQuery('#hdn-y1-axis').val(y_axis);
            jQuery('#hdn-x2-axis').val(x2_axis);
            jQuery('#hdn-y2-axis').val(y2_axis);
            jQuery('#hdn-thumb-width').val(thumb_width);
            jQuery('#hdn-thumb-height').val(thumb_height);
            
        }
    else
        alert("Please select portion..!");
}
//make ajax request to PHP for save image
function saveCropImage(params) {
  //$("#avatar-edit-img").attr('src',ajax_url+'webroot/img/loader.png');
     jQuery.ajax({
        url: params['targetUrl']+params['action'],
        cache: false,
        dataType: "html",
        data: {
        action: params['action'],
            id: jQuery('#hdn-profile-id').val(),
             t: 'ajax',
                                w1:params['thumb_width'],
                                x1:params['x_axis'],
                                h1:params['thumb_height'],
                                y1:params['y_axis'],
                                x2:params['x2_axis'],
                                y2:params['y2_axis']
        },
        type: 'Post',
       success: function (response) {
        //alert(response);
                $('#myModal21').modal('hide');
                location.reload();
                jQuery(".imgareaselect-border1,.imgareaselect-border2,.imgareaselect-border3,.imgareaselect-border4,.imgareaselect-border2,.imgareaselect-outer").css('display', 'none');
                
                jQuery("#avatar-edit-img").attr('src', response);
                jQuery("#preview-avatar-profile").html('');
                jQuery("#image").val();
                //AlertManager.showNotification('Image cropped!', 'Click Save Profile button to save image.', 'success');
        },
        error: function (xhr, ajaxOptions, thrownError){
            alert('status Code:' + xhr.status + 'Error Message :' + thrownError);
        }
    });
    }
/*For profile video*/
$(document).ready(function(){
    $("#browseVideo").on('click',function(){
        $("#profile_video").trigger("click");    
        });

  $(document).on('change','#profile_video', function(){ 

    //$("#preview-avatar-profile").html('');
    //$("#preview-avatar-profile").html('Uploading....');
    $("#profileVideo").ajaxForm(
    {
	beforeSend: function(){
	  $(".videoBanner").show();
	  $(".videoBanner").html('<img class="search-img" src="'+ajax_url+'img/search-loader.gif"/>');
	},
	
	complete: function(){
	  $(".videoBanner").hide();
	  $(".videoBanner").html('');
	},	
    //target: '#preview-profile-video',
    success: function(res) { 
        var response = res.split('::');
              if($.trim(response[0]) == 'Success'){
                //alert(response[1]);
                  $("#preview-profile-video").attr('src',response[1]);
              }else  if($.trim(response[0]) == 'Error'){
                $('.clr').html(''); //Emtpy Error MESSAGE
                $('.addError').html(response[1]); //DISPLAY SUCCESS MESSAGE
              }
			   // $('.clr').html(''); //Emtpy Error MESSAGE
            }
      
       
    }).submit();
  });
  /*End profile video*/
  /*Start profile banner*/
  $("#browseBanner").on('click',function(){
        $("#profile_banner").trigger("click");    
        });

  $(document).on('change','#profile_banner', function(){ 

    //$("#preview-avatar-profile").html('');
    //$("#preview-avatar-profile").html('Uploading....');
    $("#profileBanner").ajaxForm(
    {
		beforeSend: function(){
		  $(".profileBanner").show();
		  $(".profileBanner").html('<img class="search-img" src="'+ajax_url+'img/search-loader.gif"/>');
		},
	
		complete: function(){
		  $(".profileBanner").hide();
		  $(".profileBanner").html('');
		},	
    //target: '#preview-profile-video',
    success: function(res) { 
      //alert(res);
        var response = res.split('::');
              if($.trim(response[0]) == 'Success'){
                //alert(response[1]);
                 $('.clr').html(''); //Emtpy Error MESSAGE
                  $("#preview-profile-banner").attr('src',response[1]);
              }
              if($.trim(response[0]) == 'Error'){
                $('.clr').html(''); //Emtpy Error MESSAGE
                $('.addBannerError').html(response[1]); //DISPLAY SUCCESS MESSAGE
              }
            }
      
       
    }).submit();
  });
  /*Start profile video image*/
  $("#browseVideoImage").on('click',function(){
    $("#profile_video_image").trigger("click");    
        });

  $(document).on('change','#profile_video_image', function(){ 

    //$("#preview-avatar-profile").html('');
    //$("#preview-avatar-profile").html('Uploading....');
    $("#videoImage").ajaxForm(
    {
    //target: '#preview-profile-video',
    success: function(res) { 
      //alert(res);
        var response = res.split('::');
              if($.trim(response[0]) == 'Success'){
                //alert(response[1]);
                 $('.clr').html(''); //Emtpy Error MESSAGE
                  $("#preview-profile-video-image").attr('src',response[1]);
              }
              if($.trim(response[0]) == 'Error'){
                $('.clr').html(''); //Emtpy Error MESSAGE
                $('.addVideoImgError').html(response[1]); //DISPLAY SUCCESS MESSAGE
              }
            }
      
       
    }).submit();
  });
});

 
</script>
<style>
.videoBanner {
    background: #e17f59 none repeat scroll 0 0;
    display: none;
    float: left !important;
    height: 20px !important;
    margin: 0 0 0 22px;
    opacity: 0.5;
    position: relative;
    top: 25px;
    width: 93% !important;
    z-index: 10035;
	text-align:center;
}

</style>

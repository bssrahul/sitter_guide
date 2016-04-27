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
                 <h3>Photo</h3>
                 <div class="row">
                     <div class="col-lg-5">
                     <div class="row d-m2">
                     <div class="col-lg-7">
                    <p class="browse-p">Add your profile Photo</p>
                    <p>
                        In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 400x400 pixels. 
                    </p>
                 
               <?php 
                       $session = $this->request->session(); 
                       $user = $session->read('User');
                    ?>
             <!--<button id="change_pic" class="btn "></button>-->
               <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload" aria-hidden="true"></i>
                         Upload Profile Photo
               </button>
              <!--<button type="button" class="btn btn-upload center-block" data-toggle="modal" data-target="#myModal">
                Upload photo
              </button>-->
                    

</div>
                   <div class="col-lg-5">
                      <!--<img src="<?php echo HTTP_ROOT; ?>img/dm.png">-->
                       <img  id="avatar-edit-img" src="<?php echo HTTP_ROOT.'img/uploads/'.($user['image'] != ''?$user['image']:'prof_photo.png'); ?>" class=" img-responsive" alt="upload-photo">

                    </div>

</div>
           </div>
                <div class="col-lg-7">
                    <div class="row d-m2">
                    <div class="col-lg-6">
                    <p class="browse-p">Add your profile Video<!-- <button type="button" class="btn btn-primary pull-right">Browse Video</button> --></p>
                    <p>In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended size is 50mb. </p>
                    <button class="btn btn-primary" type="button" id="browseVideo"><i class="fa fa-upload" aria-hidden="true"></i>
                          Upload Profile Video
                    </button>
                    </div>
                    <div class="col-lg-6">
                <iframe id="preview-profile-video" width="" height="" src="https://www.youtube.com/embed/GF60Iuh643I" frameborder="0" allowfullscreen>
                </iframe>
</div>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                        <div class="form-group col-lg-4">
                          <label for="">Email </label>
                              <!--<input type="text" placeholder="" id="" class="form-control mzero">-->
                               <?php 
                                echo $this->Form->input('Users.email',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'label'=>false,
                                  'required'=>false,
                                  'class' =>'form-control'
                                  ]);
                            ?>
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="">Emergency Contacts </label>
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
                          <label for="">In emergency, who can speak?</label>
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
                  <div class="row pull-right sp-tb">
                    <p class="col-lg-12">
                      <input type="submit" class="btn Continue" value="Continue" >
                      
                    </p>
                  </div>
                  <?php echo $this->Form->end(); ?>

              </div>
             </div>
          </div>
        </div>

        </div>

      </div>



    <!--model box -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h3>Change Profile Picture</h3>
            </div>
            <div class="modal-body">
               <!-- <form id="cropimage" method="post" enctype="multipart/form-data" action="profile.php">-->
                  <?php echo $this->Form->create(null,['id'=>'cropimage','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'changeAvatar']]); ?>
                    Upload your image 

                    <input type="file" name="photoimg" id="photoimg" />

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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn-crop" class="btn btn-primary">Crop & Save</button>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->create(null,['id'=>'profileVideo','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-video']]); ?>
                <input type="file" name="profile_video" id="profile_video" />
<?php echo $this->Form->end(); ?>

      <script>
$(document).ready(function(){
  var host = window.location.host;
  var proto = window.location.protocol;
  var ajax_url = proto+"//"+host+"/sitter_guide/"; 

  $('#change_pic').on('click', function(e){ 
      e.preventDefault();
      $('#changePic').show();
        
  });

  $('#photoimg').on('change', function()   
  { 
    $("#preview-avatar-profile").html('');
    $("#preview-avatar-profile").html('Uploading....');
    $("#cropimage").ajaxForm(
    {
    target: '#preview-avatar-profile',
    success:    function(data) { 
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
                $('#myModal').modal('hide');
                location.reload();
                jQuery(".imgareaselect-border1,.imgareaselect-border2,.imgareaselect-border3,.imgareaselect-border4,.imgareaselect-border2,.imgareaselect-outer").css('display', 'none');
                
                jQuery("#avatar-edit-img").attr('src', response);
                jQuery("#preview-avatar-profile").html('');
                jQuery("#photoimg").val();
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
    //target: '#preview-profile-video',
    success: function(data) { 
      alert(data);
      
      $("#preview-profile-video").attr('src','');
       
        }
    }).submit();
  });
});
/*End profile video*/
 
</script>
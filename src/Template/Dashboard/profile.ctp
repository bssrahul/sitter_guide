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
              'id'=>'generelInfo',
			   'autocomplete'=>'off',
          ]);?>

                  <div class="row">
                    <h3><i aria-hidden="true" class="fa fa-hand-pointer-o cir-o"></i> Tell us a bit about yourself
                <span class="pull-right hed-0">Let us step you through setting up your Sitter Guide profile.</span>
                   <p class="sub-title"><small>This page is just about you in general and allows you to update your
profile photo’s, video, password and contact details.</small></p>
                </h3>
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
                  <h3>Contact Details<span class="hint--right" data-hint="Contact Details!"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></span></h3>
                    <div class="row">
                    <div class="form-group col-lg-8 col-md-8">
                     
                      <div class="row">
                          
                          <div class="col-lg-2 col-xs-3">
                            <label for="county_code" >Code</label>
                            <?php 
                                echo $this->Form->input('Users.county_code',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'select',
                                  //'multiple'=>'multiple',
                                  'label'=>false,
                                  'options'=>['44'=>'UK','1'=>'USA','213'=>'Algeria','376'=>'Andorra','244'=>'Angola','1264'=>'Anguilla','1268'=>'Antigua &amp; Barbuda','54'=>'Argentina',
'374'=>'Armenia','297'=>'Aruba','61'=>'Australia','43'=>'Austria','994'=>'Azerbaijan','1242'=>'Bahamas','973'=>'Bahrain','880'=>'Bangladesh',
'1246'=>'Barbados','375'=>'Belarus','32'=>'Belgium','501'=>'Belize','229'=>'Benin','1441'=>'Bermuda','975'=>'Bhutan','591'=>'Bolivia',
'387'=>'Bosnia Herzegovina','267'=>'Botswana','55'=>'Brazil','673'=>'Brunei','359'=>'Bulgaria','226'=>'Burkina Faso ','257'=>'Burundi','855'=>'Cambodia',
'237'=>'Cameroon','1'=>'Canada','238'=>'Cape Verde Islands ','1345'=>'Cayman Islands ','236'=>'Central African Republic','56'=>'Chile','86'=>'China','57'=>'Colombia',
'269'=>'Comoros','242'=>'Congo','682'=>'Cook Islands','506'=>'Costa Rica ','385'=>'Croatia','53'=>'Cuba','90392'=>'Cyprus North','357'=>'Cyprus South',
'42'=>'Czech Republic','45'=>'Denmark','253'=>'Djibouti','1809'=>'Dominica','1809'=>'Dominican Republic','593'=>'Ecuador','20'=>'Egypt','503'=>'El Salvador',
'240'=>'Equatorial Guinea','291'=>'Eritrea','372'=>'Estonia','251'=>'Ethiopia','500'=>'Falkland Islands','298'=>'Faroe Islands','679'=>'Fiji','358'=>'Finland',
'33'=>'France','594'=>'French Guiana','689'=>'French Polynesia','241'=>'Gabon','220'=>'Gambia','7880'=>'Georgia','49'=>'Germany','233'=>'Ghana',
'350'=>'Gibraltar','30'=>'Greece','299'=>'Greenland','1473'=>'Grenada','590'=>'Guadeloupe','671'=>'Guam','502'=>'Guatemala','224'=>'Guinea',
'245'=>'Guinea - Bissau','592'=>'Guyana','509'=>'Haiti','504'=>'Honduras','852'=>'Hong Kong','36'=>'Hungary','354'=>'Iceland','91'=>'India',
'62'=>'Indonesia','98'=>'Iran','964'=>'Iraq','353'=>'Ireland','972'=>'Israel','39'=>'Italy','1876'=>'Jamaica','81'=>'Japan',
'962'=>'Jordan','7'=>'Kazakhstan','254'=>'Kenya','686'=>'Kiribati','850'=>'Korea North','82'=>'Korea South ','965'=>'Kuwait','996'=>'Kyrgyzstan',
'856'=>'Laos','371'=>'Latvia','961'=>'Lebanon','266'=>'Lesotho','231'=>'Liberia','218'=>'Libya','417'=>'Liechtenstein','370'=>'Lithuania',
'352'=>'Luxembourg','853'=>'Macao','389'=>'Macedonia','261'=>'Madagascar','265'=>'Malawi','60'=>'Malaysia','960'=>'Maldives','223'=>'Mali',
'356'=>'Malta','692'=>'Marshall Islands','596'=>'Martinique','222'=>'Mauritania','269'=>'Mayotte','52'=>'Mexico','691'=>'Micronesia','373'=>'Moldova',
'377'=>'Monaco','976'=>'Mongolia','1664'=>'Montserrat','212'=>'Morocco','258'=>'Mozambique','95'=>'Myanmar','264'=>'Namibia','674'=>'Nauru',
'977'=>'Nepal','31'=>'Netherlands','687'=>'New Caledonia','64'=>'New Zealand','505'=>'Nicaragua','227'=>'Niger','234'=>'Nigeria','683'=>'Niue',
'672'=>'Norfolk Islands','670'=>'Northern Marianas','47'=>'Norway','968'=>'Oman','680'=>'Palau','507'=>'Panama','675'=>'Papua New Guinea','595'=>'Paraguay',
'51'=>'Peru','63'=>'Philippines','48'=>'Poland','351'=>'Portugal','1787'=>'Puerto Rico','974'=>'Qatar','262'=>'Reunion','40'=>'Romania',
'7'=>'Russia','250'=>'Rwanda','378'=>'San Marino','239'=>'Sao Tome &amp; Principe','966'=>'Saudi Arabia','221'=>'Senegal','381'=>'Serbia','248'=>'Seychelles',
'232'=>'Sierra Leone','65'=>'Singapore','421'=>'Slovak Republic','386'=>'Slovenia','677'=>'Solomon Islands ','252'=>'Somalia','27'=>'South Africa','34'=>'Spain',
'94'=>'Sri Lanka','290'=>'St. Helena ','1869'=>'St. Kitts','1758'=>'St. Lucia','249'=>'Sudan','597'=>'Suriname','268'=>'Swaziland','46'=>'Sweden',
'41'=>'Switzerland','963'=>'Syria','886'=>'Taiwan','7'=>'Tajikstan','66'=>'Thailand','228'=>'Togo','676'=>'Tonga','1868'=>'Trinidad &amp; Tobago',
'216'=>'Tunisia','90'=>'Turkey','7'=>'Turkmenistan','993'=>'Turkmenistan','1649'=>'Turks &amp; Caicos Islands ','688'=>'Tuvalu','256'=>'Uganda','44'=>'UK',
'380'=>'Ukraine','971'=>'United Arab Emirates','598'=>'Uruguay','1'=>'USA','7'=>'Uzbekistan','678'=>'Vanuatu','379'=>'Vatican City','58'=>'Venezuela',
'84'=>'Vietnam','1284'=>'Virgin Islands - British','1340'=>'Virgin Islands - US','681'=>'Wallis &amp; Futuna','969'=>'Yemen (North)','967'=>'Yemen (South)','260'=>'Zambia','263'=>'Zimbabwe'],
                                  'class' =>'form-control'
                                  ]);
                            ?>

                        </div>
                          <div class="col-lg-4 col-xs-9">
                              <label for="">Mobile/Cell <span class="hint--right" data-hint="Mobile/Cell!"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></span></label>
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
                          <label class="invisi-no" for="">im-vi </label>
                            <div class="varify-mobile">
                              
                              <a href="#" class="unvari"><img src="<?php echo HTTP_ROOT; ?>img/unverify.png"></a>

                            </div>
                          </div>


                        </div>
                    </div>
                   
                      <div class="form-group col-lg-4 col-md-4">
                         <label class="invisi-no" for="">Time Zone</label>
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
                    <h3>Password<span class="hint--right" data-hint="Password!"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></span></h3>
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
                    <h3>Emergency Contacts <span class="hint--right" data-hint="Emergency Contacts!"><img class="close11" src="<?php echo HTTP_ROOT; ?>img/close.png"></span></h3>
                    <div class="row">
                        <div class="form-group col-lg-4">
                          <label for="">Email </label>
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
              


                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 full-width11">
                       <div class="row d-m2">
                       <div class="col-lg-7">
                      <p class="browse-p">Add your banner profile banner<!-- <button type="button" class="btn btn-primary pull-right">Browse Photo</button> --></p>
                      <p  class="min-hh">
                          In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended dimensions are 950x250 pixels. 
                      </p>
                      <button class="btn btn-primary" type="button" id="browseBanner"><i class="fa fa-upload" aria-hidden="true"></i>
                        Upload Profile Banner</button>

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
                    <p class="browse-p">Add your profile Video<!-- <button type="button" class="btn btn-primary pull-right">Browse Video</button> --></p>
                    <p>In your profile photo, we recommend a high-resolution, well-lit photo of your smiling face (without sunglasses). Recommended size is 50mb. </p>
                    <button class="btn btn-primary" type="button" id="browseVideo"><i class="fa fa-upload" aria-hidden="true"></i>
                          Upload Profile Video
                    </button>
                    </div>
                    <div class="col-lg-6">
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
<?php echo $this->Form->create(null,['id'=>'profileBanner','enctype'=>'multipart/form-data',
                  'url'=>['controller'=>'dashboard','action'=>'save-profile-banner']]); ?>
                <input type="file" name="profile_banner" id="profile_banner" />
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
   // $("#preview-avatar-profile").html('Uploading....');
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
        alert(response);
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
    success: function(res) { 
        var response = res.split('::');
              if($.trim(response[0]) == 'Success'){
                alert(response[1]);
                  $("#preview-profile-video").attr('src',response[1]);
              }
              if($.trim(response[0]) == 'Error'){
                $('.clr').html(''); //Emtpy Error MESSAGE
                $('.addError').html(response[1]); //DISPLAY SUCCESS MESSAGE
              }
            }
      
       
    }).submit();
  });
  /*End profile video*/
  /*End profile banner*/
  $("#browseBanner").on('click',function(){
        $("#profile_banner").trigger("click");    
        });

  $(document).on('change','#profile_banner', function(){ 

    //$("#preview-avatar-profile").html('');
    //$("#preview-avatar-profile").html('Uploading....');
    $("#profileBanner").ajaxForm(
    {
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
});

 
</script>
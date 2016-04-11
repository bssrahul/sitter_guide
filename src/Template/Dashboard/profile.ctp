 <div class="col-md-9 col-lg-10 col-sm-8 topsixty ">
        <div class="row">
         <div class="bg-white"> 
          <div class="col-sm-12 col-md-12 col-lg-5 ">
         
            <div id="upload-photo-container"> 
       <div class="widget1">
       <div class="clearfix"></div>
       <div class="row">
            <div class="col-md-5 col-sm-4">
              <div class="upload-image">
                <?php 
                       $session = $this->request->session(); 
                       $user = $session->read('User');
                    ?>
              <img  id="avatar-edit-img" src="<?php echo HTTP_ROOT.'img/uploads/'.($user['image'] != ''?$user['image']:'prof_photo.png'); ?>" class=" img-responsive" alt="upload-photo">
                
              <!--<button id="change_pic" class="btn "></button>-->
              <button type="button" class="btn btn-upload center-block" data-toggle="modal" data-target="#myModal">
                Upload photo
              </button>

  <!--<div>
    <img class="img-circle" id="avatar-edit-img" height="128" data-src="default.jpg"  data-holder-rendered="true" style="width: 140px; height: 140px;" src="default.jpg"/>
    <a type="button" class="btn btn-primary" id="change-pic">Change Image</a>
</div>-->
              </div>


            </div>
            <div class="col-md-7 col-sm-8">
              <h3 class="for-right-center" >Sitter.<span class="color-green">Guide</span> Balance</h3>
              <h4 class="for-right-center1  price">$0.00</h4>
              <div class="for-right-center2">
                <button class="btn veiwpaymentbtn">View Payment</button>
              </div>
            </div>
        </div>
            </div>
            <div class="clearfix"></div>
            <div class="widget2">
                  <div class="row"> 
            <div class="col-sm-6">
              <h3>Your Sitter.<span class="color-green">Guide</span></h3>
            <h4 >Balance :</h4>
          
            
            </div>
            
             <div class="col-sm-6">
              <h5 class=" price">$0.00</h5>
            
            </div>
            </div>
            
            </div>
            
       <div class="widget2">
                  <div class="row"> 
            <div class="col-sm-6">
              <h3>Your Sitter.<span class="color-green">Guide</span></h3>
            <h4 >Balance :</h4>
          
            
            </div>
            
             <div class="col-sm-6">
              <h5 class=" price">$0.00</h5>
            
            </div>
            </div>
            
            </div>
            
            <div class="widget3">
                  <div class="row"> 
            <div class="col-sm-12">
               <div class="clearfix"><h3><span class="color-green pull-left">Your Pets </span><a href="" class=" pull-right addpets"><img src="<?php echo HTTP_ROOT; ?>img/add-pets.png" width="15" height="15" alt="add-pet"> Add pets</a></h3>
         </div>
          <p >You still need to Add your pets to Sitter.Guide to find a sitter for your critter and to organise your pet's information such as vet history! </p>
            
            </div>
            
             
            </div>
            
            </div>
            
            <div class="widget3">
                  <div class="row"> 
            <div class="col-sm-12">
               <div class="clearfix"><h3><span class="color-green pull-left">Refer a friend, get $20 </span><a href="#"  data-toggle="modal" data-target="#squarespaceModal" class=" pull-right addpets"> Invite Friend</a></h3>
         </div>
          <p >For every friend that books a stay, we'll give you a $20 credit  loreumipum towards towards your next booking.  </p>
            
            </div>
            
             
            </div>
            
            </div>
            </div>
            </div>
            
          </div>
          <div class="col-sm-12 col-md-12 col-lg-7">
          <div id="createyourprofile">
          
          <div class="clearfix"></div>
          
         
              <div class="panel-heading"> <span class=""><i><img src="<?php echo HTTP_ROOT; ?>img/createprofile.png"  alt="calender"></i>&nbsp; Create Your Profile </span> </div>
              
              
            <div style="background:#fff;">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    
                    
                    <ul class="list-inline nav-justified text-center"><li><img src="<?php echo HTTP_ROOT; ?>img/timeline-1.png"  alt="one">
                    <h4>Create your <a href="#" >guest profile</a> </h4> 
                   
                    <p>Lorem ipsum adipisc dolor sit amet, consec adipiscing adipisc elLorem adipisc ipsamet,  </p>
                    
                    
                    </li>
                    <li><img src="<?php echo HTTP_ROOT; ?>img/timeline-2.png"  alt="one">
                    <h4>Upload photo </h4>
                    <p>Lorem ipsum dolor adipisc amet, consectetur adipiscing elLorem adipisc dolor sit amet,  </p>
                    </li>
                    <li><img src="<?php echo HTTP_ROOT; ?>img/timeline-3.png"  alt="one">
                    
                    <h4>Add Pet </h4>
                    
                    </li>
                    </ul>
                    
                    
                    
                    
                    <hr />

   

                  <div class="box-outer">  
                   <div class="box center-block">
                   <h5>Create your sitter profile </h5>
                   
                   <p>Lorem ipsum dolor sit amet, ctetur ading elLorem ipsum dolor</p>
                   
                  <a href="<?php echo HTTP_ROOT.'dashboard/sitter-profile'; ?>"> <h6> Create Profile</h6></a>
                   
                   </div>
                    </div>
                    
                    
                    
                     <hr />
                    
                    
                  <div class="box-outer">  
                   <div class="box center-block">
                   <h5>Update your generic profile </h5>
                   
                   <p>Lorem ipsum dolor sit amet, ctetur ading elLorem ipsum dolor</p>
                   
                  <a href="#"> <h6> Update Profile</h6></a>
                   
                   </div>
                    </div>
                    
                    
                    
                  </div>
                  
             
             
               </div>
            
           
  
               
               </div>
               
            </div>
          </div>
        </div>
      </div>



<!--
refer afriend modal popup stars-->
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">
              <img src="<?php echo HTTP_ROOT; ?>img/pop-cross.png" alt="cross">
            </span><span class="sr-only">Close</span></button>
            <h2><span>Refer Friends & Get $10</span></h2>
        </div>  <?php echo $this->Form->create(null, [
              'url' => ['controller' => 'dashboard', 'action' => 'reference'],
              'class'=>'form-horizontal',
              'id'=>'referForm'
          ]);?>
        <div class="modal-body">
                    <!-- content goes here -->
                    <div class="row">
                    <div class="col-sm-12">
                    <div class="to-from">
                    <div class="popup-form">
        <!--<form class="form-horizontal">-->
        
          <div class="form-group">
            <label for="referEmail" class="col-sm-2 col-lg-1 text-left no-padding-right control-label">To:</label>
            <div class="col-sm-6">
              <!--<input type="email" class="form-control" id="inputEmail3" placeholder="Enter Email">-->
              <?php echo $this->Form->input('email',[
                  'type'=>'email',
                  'class'=>'form-control',
                  'id'=>'referEmail',
                  'placeholder'=>'Enter Email',
                  'label'=>false,
                   'templates' => [
                  'inputContainer' => '{{content}}'
                  ]
                ]);
              ?>
              <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="signup-or-separator"> <p class="successMessage clr"></p><p class="errorMessage clr"></p>
                </div>
              </div>
            </div>
            </div>
            
          </div>
          <div class="form-group">
            <label for="input" class="col-sm-2 col-lg-1 no-padding-right control-label">From:</label>
            <div class="col-sm-6  ">
              <!--<input type="email" class="form-control" id="inputPassword3" placeholder="friend@mobilyte.com">-->
               <?php echo $this->Form->input('from_email',[
                  'type'=>'email',
                  'class'=>'form-control',
                  'id'=>'inputPassword3',
                  'placeholder'=>'friend@mobilyte.com',
                  'label'=>false,
                   'templates' => [
                  'inputContainer' => '{{content}}'
                  ]
                ]);
              ?>
            </div>
          </div>
       
      
                    </div>
                    </div>
                    
                    
                    <div class="col-sm-12 col-md-12">
                    <div class="pop-content">
                    <div class="col-sm-7">
                    
                    <p>"I thought you would like $10 to use on
        Sitter Guide.</p><br>
        <p>Sitter Guide is the all-in-one home for
        thousands of people <b>sitting for pets,
        people, plants & properties.</b></p>
        <br>
        <p>It’s really easy to search and find a sitter, conect in-person, book and stay through Sitter Guide.</p><br>

                    
           <p>Also, check out the market place for <b>traniers, groomers, drivers </b>& people who want to share <b>recreation time</b> with you too..."</p>         
                    </div>
                    
                    
                    <div class="col-sm-5 no-padding-left no-padding-right">
                    <div class="box"><img src="<?php echo HTTP_ROOT; ?>img/pop-logo.png"  class="img-responsive text-center center-block">
                    
                    <p class="box-text">Give $10 to your firends to use on their first stay</p>
                    <p class="box-text">You'll also get $10 when they complete their first booking.</p><br><br>

                    <div class="pop-dog"><img src="<?php echo HTTP_ROOT; ?>img/pop-dog.png" class="img-responsive" alt="dog"></div>
                    </div>
                       
                    </div>
                    
                    </div>
                    
                    </div>
                    <div class="col-sm-12 icon-stripe no-padding-left no-padding-right">
                    
                    <div class="col-sm-6"><ul class="list-inline icons-social">
                    <li><img src="<?php echo HTTP_ROOT; ?>img/popi1.png" width="31" height="31" alt="facebook"></li>
                    <li><img src="<?php echo HTTP_ROOT; ?>img/popi2.png" width="31" height="31" alt="twitter"></li>
                    <li><img src="<?php echo HTTP_ROOT; ?>img/popi3.png" width="31" height="31" alt="message"></li>
                    
                    </ul></div>
                    <div class="col-sm-6 pull-right text-right">
                    <!--<button type="submit" id="refer-btn" class="btn btn-send ">Send Mail</button>-->
                    <input type="submit" id="refer-btn" class="btn btn-send" value="<?php echo __('Submit'); ?>">
                     
            </div>
        
               </div>
                 
                    </div>
             <?php echo $this->Form->end(); ?>       
                    <div class="col-sm-12">
                    <div class="link">
                    <div class="input-group">
                     <span class="input-group-addon green" id="basic-addon2"><img src="<?php echo HTTP_ROOT; ?>img/pop-chain.png"  alt="chain">  Copy your link</span>
        <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
         
        </div>
        </div>
                    
                    </div>
                    
                    
                    <div class="col-sm-12">
                    <p class="email">Your rewards will baerich@gmail.com</p>
                    
                    
                    </div>
                   
                    <div class="col-sm-12">
                    <div class="pop-footer">
                    
                   <ul class="list-inline">
                   <li> &copy;2014,All Right Reserved</li>
                    <li>|</li>
                     <li>Terms and Conditions</li>
                      <li>|</li>
                      <li>Privacy Policy</li>
                   
                   </ul></div>
                    
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
<script>
$(document).ready(function(){
  var host = window.location.host;
  var proto = window.location.protocol;
  var ajax_url = proto+"//"+host+"/sitterguide/"; 

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
 
</script>
<!--
refer afriend modal popup ends-->


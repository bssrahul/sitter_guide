<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon">&nbsp Dashboard 
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> You are here : 
        </li>
        <li>
          <a href="<?php echo HTTP_ROOT; ?>">Home
          </a>
        </li>
        <li class="active">Profile
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
	 <?php  if(@$profile_status == 'sitter_update'){
		 $addStyle = "style='text-align:center'";
	  }else{
		  $addStyle = "";
	  }
	  ?> 
    <div <?php echo $addStyle; ?> class="col-xs-12 col-sm-12 col-md-12 col-lg-<?php echo $profile_status != 'sitter_update'?'6':'12' ?>">
      <a href="<?php echo HTTP_ROOT.'dashboard/home/sitter'; ?>"> 
        <div class="create-sitter-wrapper">
          <div class="s-left"> 
            <span>
            </span>
            <h1><?php 
                 if($profile_status == 'sitter_update'){
					echo 'Update your Sitter Profile'; 
				 }else if($profile_status == 'both_create'){
				    echo 'Create your Sitter Profile'; 
				 }else if($profile_status == 'guest_update'){
					 echo 'Create your Sitter Profile';
				 }else{
					 echo 'Create your Sitter Profile'; 
				 }
            
             ?>
            </h1> 
            <p>Lorem ipsum dolor sit amet, ctetur ctetur ading elLorem ipsum dolor
            </p>
          </div>
        </div> 
      </a>
    </div>
	  <?php  
	  
	  if($profile_status != 'sitter_update'){
	  ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <a href="<?php echo HTTP_ROOT.'dashboard/home/guest'; ?>">    
        <div class="create-sitter-wrapper1">
          <div class="s-left1"> 
            <span>
            </span>
            <h1>
		    <?php if($profile_status == 'both_create'){
				echo 'Create your Guest Profile '; 
			 }else if($profile_status == 'guest_update'){
				 echo 'Update your Guest Profile';
			 }else{
				 echo 'Create your Guest Profile'; 
			 } ?>
            </h1> 
            <p>Lorem ipsum dolor sit amet, ctetur ctetur ading elLorem ipsum dolor
            </p>
          </div>
        </div>
      </a> 
    </div>
    <?php } ?>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="easy-step-wrapper">
        <div class="easy-head">
          <h5> Easy Step to Create your all Profile
          </h5>
        </div>
        <div class="easy-body">
          <div class="create-easy-step-green">
            <h3>Create your sitter profile with esay step
            </h3>
            <p>Lorem Lorem ipsum adipisc dolor sit amet, consec adipiscing adipisc elLorem adipisc ipsamet, ipsum adipisc
              dolor sit amet, consec adipiscing adipisc 
            </p>
          </div>
          <div class="create-easy-step-grey">
            <h3>
              <a href="#">Upload photos 
              </a>
            </h3>
            <p>Lorem Lorem ipsum adipisc dolor sit amet, consec adipiscing adipisc elLorem adipisc ipsamet, ipsum adipisc
              dolor sit amet, consec adipiscing adipisc 
            </p>
          </div>
          <div class="create-easy-step-grey">
            <h3>
				<?php 
			if($profile_status != 'sitter_update'){ ?>
				<a href="<?php echo HTTP_ROOT,'dashboard/home/guest'; ?>">Add a Pet </a>
		    <?php }else{
	  
				if(@$dog_in_home == 'yes'){ ?>
				    <a href="<?php echo HTTP_ROOT,'dashboard/home/sitter'; ?>">Add a Pet </a>
				<?php }else{ ?>
				  	<a data-toggle="modal" data-target="#dogInHomeStatusAlert" href="javascript:void(0)">Add a Pet </a>
				<?php } 
			}?>
              
              
            </h3>
            <p>Lorem Lorem ipsum adipisc dolor sit amet, consec adipiscing adipisc elLorem adipisc ipsamet, ipsum adipisc
              dolor sit amet, consec adipiscing adipisc 
            </p>
          </div>
        </div>
        <!--Model pop up -->
        <!-- Modal -->
		<div id="dogInHomeStatusAlert" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Notification</h4>
			  </div>
			  <div class="modal-body">
				<p>Dear Sitter, your dog in home status currently disabled,if you still want to add pet then you need to enable the pet status.</p><br>
				<p>Are you enable pet status then click on continue?</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" ="location.href = '<?php echo HTTP_ROOT."dashboard/about-guest"; ?>'" >Continue</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
			</div>

		  </div>
		</div>
        <!--end pop up-->
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">    
      <div class="easy-step-wrapper">
        <div class="easy-head">
          <h5> Refer a Friend
          </h5>
        </div>
        <div class="easy-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
              <h2 class="referafriend">Refer a Friend, get $20
              </h2>
              <p class="refer-text">
                For every friend that books a stay, we'll give you 
                a $20 credit towards your next booking. 
              </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
              <div class=" text-center">
                <button class="btn btn-invite12"> Invite Friends 
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="easy-step-wrapper mgb30">
        <div class="easy-head">
          <h5>Become a Pet Sitter or Dog Walker on Siter Guide
          </h5>
        </div>
        <div class="easy-body wrap-height">
          <ul class="list-unstyled">
            <li>
              <span class="icon-right-s">
              </span>Freedom to set your schedule and choose your rates 
            </li>
            <li class="li-pa1">
              <span class="icon-right-s">
              </span>Premium insurance with every booking 
            </li>
            <li class="li-pa1">
              <span class="icon-right-s">
              </span>Access to 24/7 support, including vet assistance 
            </li>
            <li class="li-pa1">
              <span class="icon-right-s">
              </span>Resources to help you build your business  
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

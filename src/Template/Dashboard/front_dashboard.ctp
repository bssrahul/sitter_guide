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
	 <?php  if(@$profileStatus == 'sitter_update'){
		 
		 $addStyle = "style='text-align:center'";
	  }else{
		  $addStyle = "";
	  }
	  ?> 
    <div <?php echo $addStyle; ?> class="col-xs-12 col-sm-12 col-md-12 col-lg-<?php echo @$profileStatus != 'sitter_update'?'6':'12' ?>">
      <a href="<?php echo HTTP_ROOT.'dashboard/home/sitter'; ?>"> 
        <div class="create-sitter-wrapper">
          <div class="s-left"> 
            <span>
            </span>
            <h1><?php 
                 if(@$profileStatus == 'sitter_update'){
					echo 'Update your Sitter Profile'; 
				 }else if(@$profileStatus == 'both_create'){
				    echo 'Create your Sitter Profile'; 
				 }else if(@$profileStatus == 'guest_update'){
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
	  
	  if($profileStatus != 'sitter_update'){
	  ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <a href="<?php echo HTTP_ROOT.'dashboard/home/guest'; ?>">    
        <div class="create-sitter-wrapper1">
          <div class="s-left1"> 
            <span>
            </span>
            <h1>
		    <?php if(@$profileStatus == 'both_create'){
				echo 'Create your Guest Profile '; 
			 }else if(@$profileStatus == 'guest_update'){
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
			if($profileStatus != 'sitter_update'){ ?>
				<a href="<?php echo HTTP_ROOT,'dashboard/about-guest'; 
				$session = $this->request->session();
				$session->write("profile","guest");
				?>">Add a Pet </a>
		    <?php }else{
				$session = $this->request->session();
				$session->write("profile","sitter");
	             if(@$dog_in_home == 'yes'){ 
					?>
				    <a href="<?php echo HTTP_ROOT,'dashboard/house#usersitterhouses-outdoor-area-size'; ?>">Add a Pet </a>
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
				<button type="button" class="btn btn-primary" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/house#usersitterhouses-outdoor-area-size"; ?>'" >Continue</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
				<button class="btn btn-invite12"  data-toggle="modal" data-target="#squarespaceModal"> Invite Friend
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
<!--
refer afriend modal popup stars-->
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">
            <img src="<?php echo HTTP_ROOT; ?>img/pop-cross.png" alt="cross">
          </span>
          <span class="sr-only">Close
          </span>
        </button>
        <h2>
          <span>Refer Friends & Get $10
          </span>
        </h2>
      </div>
      <div class="modal-body">
        <!-- content goes here -->
        <div class="row">
          <div class="col-sm-12">
            <div class="to-from">
              <div class="popup-form">
                <!--<form class="form-horizontal">-->
					 <?php echo $this->Form->create(@$userInfo, [
						  'url' => ['controller' => 'dashboard', 'action' => 'refer-friend'],
						  'class'=>'form-horizontal',
						  'id'=>'referFriend',
					 ]);?>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-lg-1 text-left no-padding-right control-label">To:
                    </label>
                    <div class="col-sm-6  ">
                     <!-- <input type="email" class="form-control" id="inputEmail3" placeholder="Enter Email">-->
                       <?php 
							  echo $this->Form->input('UserReferences.refer_email',[
								'templates' => ['inputContainer' => '{{content}}'],
								'label'=>false,
								'class' =>'form-control'
								]);
                       ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="input" class="col-sm-2 col-lg-1 no-padding-right control-label">From:
                    </label>
                    <div class="col-sm-6  ">
                     <!-- <input type="email" class="form-control" id="inputPassword3" placeholder="friend@mobilyte.com">-->
                       <?php 
							  echo $this->Form->input('UserReferences.refer_by_email',[
								'templates' => ['inputContainer' => '{{content}}'],
								'label'=>false,
								'class' =>'form-control'
								]);
                       ?>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12">
            <div class="pop-content">
              <div class="col-sm-7">
                <p>"I thought you would like $10 to use on
                  Sitter Guide.
                </p>
                <br>
                <p>Sitter Guide is the all-in-one home for
                  thousands of people 
                  <b>sitting for pets,
                    people, plants & properties.
                  </b>
                </p>
                <br>
                <p>It’s really easy to search and find a sitter, conect in-person, book and stay through Sitter Guide.
                </p>
                <br>
                <p>Also, check out the market place for 
                  <b>traniers, groomers, drivers 
                  </b>& people who want to share 
                  <b>recreation time
                  </b> with you too..."
                </p>         
              </div>
              <div class="col-sm-5 no-padding-left no-padding-right">
                <div class="box">
                  <img src="<?php echo HTTP_ROOT; ?>img/pop-logo.png"  class="img-responsive text-center center-block">
                  <p class="box-text">Give $10 to your firends to use on their first stay
                  </p>
                  <p class="box-text">You'll also get $10 when they complete their first booking.
                  </p>
                  <br>
                  <br>
                  <div class="pop-dog">
                    <img src="<?php echo HTTP_ROOT; ?>img/pop-dog.png" class="img-responsive" alt="dog">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 icon-stripe no-padding-left no-padding-right">
            <div class="col-sm-6 col-xs-7">
              <ul class="list-inline icons-social">
                <li>
                  <img src="<?php echo HTTP_ROOT; ?>img/popi1.png" width="31" height="31" alt="facebook">
                </li>
                <li>
                  <img src="<?php echo HTTP_ROOT; ?>img/popi2.png" width="31" height="31" alt="twitter">
                </li>
                <li>
                  <img src="<?php echo HTTP_ROOT; ?>img/popi3.png" width="31" height="31" alt="message">
                </li>
              </ul>
            </div>
            <div class="col-sm-6 col-xs-5 pull-right text-right">
              <button class="btn btn-send ">Send Mail
              </button>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="link">
              <div class="input-group">
                <span class="input-group-addon green" id="basic-addon2">
                  <img src="<?php echo HTTP_ROOT; ?>img/pop-chain.png"  alt="chain">  Copy your link
                </span>
                <input type="text" class="form-control" value="http://refer.rover.com/v2/share" aria-describedby="basic-addon2">
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <p class="email">Your rewards will baerich@gmail.com
            </p>
          </div>
          <div class="col-sm-12">
            <div class="pop-footer">
              <ul class="list-inline">
                <li> &copy;2014,All Right Reserved
                </li>
                <li>|
                </li>
                <li>Terms and Conditions
                </li>
                <li>|
                </li>
                <li>Privacy Policy
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
refer afriend modal popup ends-->

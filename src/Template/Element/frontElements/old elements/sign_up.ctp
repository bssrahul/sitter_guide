  <div class="modal-dialog oter-sign-up" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        <h4 class="modal-title search-title-1"><?php echo __('Sign Up'); ?></h4>
      </div>
      <div class="modal-body">
        <div class="main_area_signup">
          <div class="signup_wrap">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="facebook">
                  <p><a href="#" class="btn btn-primary" role="button"><i class="fa fa-facebook"></i><?php echo __('Sign Up With Facebook'); ?></a></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="signup-or-separator"> <span class="h6 signup-or-separator--text">or</span>
                  <hr>
                </div>
              </div>
            </div>
            <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="facebook mar-top-msg">

                  <p><a href="javascript:void(0)" class="signupBtn btn btn-primary msg_box" data-toggle="collapse" data-target="#signup-drop"  role="button"><i class="fa fa-envelope-o"></i><?php echo __('Sign up with Email'); ?></a></p>
				  <p class="successMessage"></p>
                  <!--Signup with email drop content Start-->
                  <?php if(@$totalError > 0){ ?>
					<div id="signup-drop" class="collapse in" aria-expanded="true">
				  <?php }else{ ?>
					<div id="signup-drop" class="collapse">
				  <?php } ?>
				  
                     <?php echo $this->Form->create('Users', [
							'url' => ['controller' => 'Guests', 'action' => 'signup'],
							'context' => [
							'validator' => [
								'Users' => 'register',
								'Comments' => 'default'
							  ]
							],
							'class'=>'form-horizontal form-label-left',
							'id'=>'addUsers',
							'enctype'=>'multipart/form-data',
							'novalidate'=>'novalidate'
							
						]);?>
                      <div class="form-group">
                        <?php 
							echo $this->Form->input('Users.first_name',[								
								'label' => false,
								'placeholder' => __("First Name"),
								'class'=>'form-control',
								'value'=>(@$_POST['data']['Users']['first_name'] ? $_POST['data']['Users']['first_name'] : (@$signupdata['Users']['first_name'] ? $signupdata['Users']['first_name'] : ''))
								]);
								echo '<em class="signup_error error">'.__(@$loginerror['first_name'][0]).'</em>';
						 ?>
                      </div>
                      <div class="form-group">
                       <?php 
							echo $this->Form->input('Users.last_name',[								
								'label' => false,
								'class'=>'form-control',
								'placeholder' => __("Last Name"),
								'value'=>(@$_POST['data']['Users']['last_name'] ? $_POST['data']['Users']['last_name'] : (@$signupdata['Users']['last_name'] ? $signupdata['Users']['last_name'] : ''))
							]);
							echo '<em class="signup_error error">'.__(@$loginerror['last_name'][0]).'</em>';
						 ?>
                      </div>
                      <div class="form-group">
                        <?php 
							echo $this->Form->input('Users.email',[								
								'label' => false,
								'class'=>'form-control',
								'placeholder' => __("Email"),
								'value'=>(@$_POST['data']['Users']['email'] ? $_POST['data']['Users']['email'] : (@$signupdata['Users']['email'] ? $signupdata['Users']['email'] : ''))
							]);
							echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
						 ?>
                      </div>
                      <div class=" form-group">
                        <?php 
							echo $this->Form->input('Users.password',[								
								'label' => false,
								'class'=>'form-control',
								'placeholder' => __("Password"),
								'value'=>(@$_POST['data']['Users']['password'] ? $_POST['data']['Users']['password'] : (@$signupdata['Users']['password'] ? $signupdata['Users']['password'] : ''))
							]);
							echo '<em class="signup_error error">'.__(@$loginerror['password'][0]).'</em>';
						 ?>
                      </div>
                      <div class=" form-group">
                       <?php 
							echo $this->Form->input('Users.re_password',[								
								'label' => false,
								'type' => "password",
								'class'=>'form-control',
								'placeholder' => __("Repeat Password"),
								'value'=>(@$_POST['data']['Users']['re_password'] ? $_POST['data']['Users']['re_password'] : (@$signupdata['Users']['re_password'] ? $signupdata['Users']['re_password'] : ''))
							]);
							echo '<em class="signup_error error">'.__(@$loginerror['re_password'][0]).'</em>';
						 ?>
                      </div>
					  <div class=" form-group">
                       <?php 
							echo $this->Form->input('Users.reference_code',[								
								'label' => false,
								'type' => "text",
								'class'=>'form-control',
								'placeholder' => __("Have A Reference Code ?"),
								'value'=>''
							]);
							echo '<em class="signup_error error">'.__(@$loginerror['reference_code'][0]).'</em>';
						 ?>
                      </div>
                      <input type="submit" id="sign-up" class="btn btn-primary msg_box" value="Sign Up">
                     <?php echo $this->Form->end(); ?>
                  </div>
                  <!--Signup with email drop content End--> 
                  
                </div>
              </div>
				</div>
				<div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="member small_text">
					  <p> <?php echo __("By signing up, I agree to Airbnb's"); ?> <span><?php echo __("Terms of Service"); ?></span>, <span><?php echo __("Privacy Policy"); ?></span>, <span><?php echo __("Guest Refund Policy"); ?></span>, <?php echo __("and"); ?><span> <?php echo __("Host Guarantee Terms"); ?></span>.</p>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="fotrborder"> </div>
				  </div>
				</div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="member">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


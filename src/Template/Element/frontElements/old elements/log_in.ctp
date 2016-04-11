<!--Login with facebook Modal Start-->
<div class="modal fade" id="myModal_log_in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog oter-sign-up" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        <h4 class="modal-title search-title-1"><?php echo __('Log In'); ?></h4>
      </div>
      <div class="modal-body">
        <div class="signup_wrap">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="facebook">
                <p><a href="#" class="btn btn-primary" role="button"><i class="fa fa-facebook"></i><?php echo __('Log in With Facebook'); ?></a></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="signup-or-separator"> <span class="h6 signup-or-separator--text"><?php echo __('or'); ?></span>
                <hr>
              </div>
            </div>
          </div>
		  <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="signup-or-separator"> <p class="successMessage clr"></p><p class="errorMessage clr"></p>
              </div>
            </div>
          </div>
		   
		  <?php echo $this->Form->create('Users', [
				'url' => ['controller' => 'Guests', 'action' => 'login'],
				'context' => [
				'validator' => [
					'Users' => 'register',
					'Comments' => 'default'
				  ]
				],
				'class'=>'form-horizontal form-label-left',
				'id'=>'loginUser',
				'enctype'=>'multipart/form-data',
				'novalidate'=>'novalidate'
				
			]);?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
				<?php 
					echo $this->Form->input('Users.email',[								
						'label' => false,
						'class'=>'email_icon',
						'placeholder' => __("E-mail Address"),
						'value'=>(@$_POST['data']['Users']['email'] ? $_POST['data']['Users']['email'] : (@$signupdata['Users']['email'] ? $signupdata['Users']['email'] : ''))
					]);
					echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
				
					echo $this->Form->input('Users.password',[								
						'label' => false,
						'class'=>'password_icon',
						'placeholder' => __("Password"),
						'value'=>(@$_POST['data']['Users']['password'] ? $_POST['data']['Users']['password'] : (@$signupdata['Users']['password'] ? $signupdata['Users']['password'] : ''))
					]);
					echo '<em class="signup_error error">'.__(@$loginerror['password'][0]).'</em>';
				?>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="checkin">
                <input type="checkbox" name="Email" checked="unchecked">
                <p><?php echo __('Remember me'); ?></p>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="paswrd">
                <!--<p><a href="#">Forgot password?</a></p>-->
				 <p><a class="page-scroll" id="forgotPassword" href="#" data-toggle="modal" data-target="#myModal_forgot_password"><?php echo __('Forgot Password'); ?></a></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="facebook mar-top-msg">
					<input type="submit" id="log_in_btn" class="btn btn-primary msg_box" value="<?php echo __('Log In'); ?>">
			    </div>
            </div>
          </div>
		  <?php echo $this->Form->end(); ?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="fotrborder border_top_sign"> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="member">
                <p> <?php echo __("Don’t have an account?"); ?> <span>
				<!--<a href="#">Sign Up</a>-->
				 <a class="page-scroll" id="sign_Up" href="#" data-toggle="modal" data-target="#myModal_sign"><?php echo __("Sign Up"); ?></a></span>
				</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Login with facebook Modal End--> 
<script>
$(document).ready(function(){
    $("#forgotPassword").click(function(){
	     $('#myModal_log_in').modal('hide');
	});
	$("#sign_Up").click(function(){
	     $('#myModal_log_in').modal('hide');
	});
});
</script>
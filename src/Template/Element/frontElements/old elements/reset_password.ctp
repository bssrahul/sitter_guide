<!--Login with facebook Modal Start-->
<div class="modal fade" id="myModal_reset_pwd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog oter-sign-up" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        <h4 class="modal-title search-title-1">Log In</h4>
      </div>
      <div class="modal-body">
        <div class="signup_wrap">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="facebook">
                <p><a href="#" class="btn btn-primary" role="button">Reset Password</a></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="signup-or-separator"> 
				
						<p class="successMessage"></p>
						<p class="errorMessage"></p>
				
				</div>
            </div>
          </div>
			<?php 
				 echo $this->Form->create('Users', [
				'url' => ['controller' => 'Guests', 'action' => 'resetPassword'],
				'context' => [
				'validator' => [
					'Users' => 'register',
					'Comments' => 'default'
				  ]
				],
				'class'=>'form-horizontal form-label-left',
				'id'=>'resetPasswordForm',
				'enctype'=>'multipart/form-data',
				'novalidate'=>'novalidate'
				
			]);
			?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
				<?php 
					echo $this->Form->input('Users.email',[								
						'label' => false,
						'type' => 'hidden',
						'value' => $email
						//'value'=>(@$_POST['data']['Users']['email'] ? $_POST['data']['Users']['email'] : (@$signupdata['Users']['email'] ? $signupdata['Users']['email'] : ''))
					]);
					echo $this->Form->input('Users.key',[								
						'label' => false,
						'type' => 'hidden',
						'value' => $key
						//'value'=>(@$_POST['data']['Users']['key'] ? $_POST['data']['Users']['key'] : (@$signupdata['Users']['key'] ? $signupdata['Users']['key'] : ''))
					]);
					echo $this->Form->input('Users.password',[								
						'label' => false,
						'class'=>'form-control',
						'id'=>'reset_pwd_field',
						'placeholder' => __("Password"),
						'value'=>(@$_POST['data']['Users']['password'] ? $_POST['data']['Users']['password'] : (@$signupdata['Users']['password'] ? $signupdata['Users']['password'] : ''))
					]);
					echo '<em class="signup_error error">'.__(@$loginerror['password'][0]).'</em>';
				
					echo $this->Form->input('Users.re_password',[								
						'label' => false,
						'type' => "password",
						'class'=>'form-control',
						'id'=>'reset_re_pwd_field',
						'placeholder' => __("Repeat Password"),
						'value'=>(@$_POST['data']['Users']['re_password'] ? $_POST['data']['Users']['re_password'] : (@$signupdata['Users']['re_password'] ? $signupdata['Users']['re_password'] : ''))
					]);
					echo '<em class="signup_error error">'.__(@$loginerror['re_password'][0]).'</em>';
				 ?>
			</div>
          </div>
          
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="facebook mar-top-msg">
                <input type="submit" id="change-pwd" class="btn btn-primary msg_box" value="<?php echo __("Reset Password"); ?>">
              </div>
            </div>
          </div>
		  <?php echo $this->Form->end();?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="fotrborder border_top_sign"> </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--Login with facebook Modal End-->
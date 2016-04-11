

 <div class="dropdown-menu login-drop" style="display:none" id="dropcontForgot">
      <div class="form-group">
             <?php echo $this->Form->create(null,[
                  'url' => ['controller' => 'guests', 'action' => 'forgotPassword'],
                  'role'=>'form',
                  'id'=>'forgotPasswordForm',
                  'enctype'=>'multipart/form-data'
              ]);
              echo $this->Form->input('Users.email',[                
                     'class'=>'form-control',
                     'placeholder'=>__('Enter your email'),
                     'value'=>(@$_POST['data']['Users']['email'] ? $_POST['data']['Users']['email'] : (@$signupdata['Users']['email'] ? $signupdata['Users']['email'] : ''))
              ]);
               
              echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
          ?>
          <input type="submit" id="reset-pwd" class="btn btn-success" value="<?php echo __('Submit'); ?>">
          <?php echo $this->Form->end(); ?>

              <p class="forget"><a href="#" id="loginBack" title="Login"><?php echo __('Want to login back?'); ?></a><br>
             <?php echo __('Not a member?'); ?>
             <a href="#" title="Sign up Now"><?php echo __('Sign up Now'); ?></a></p>
      </div>
             <p>- or -</p>
            <a href="#" title="Login With Faceook" class="lwfb"><i class="fa fa-facebook-square"></i> <?php echo __('Sign In with Facebook'); ?></a> 

  </div> 

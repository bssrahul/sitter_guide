

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
                     'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Enter your email')),
                     'value'=>(@$_POST['data']['Users']['email'] ? $_POST['data']['Users']['email'] : (@$signupdata['Users']['email'] ? $signupdata['Users']['email'] : ''))
              ]);
               
              echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
          ?>
          <input type="submit" id="reset-pwd" class="btn btn-success" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?>">
          <?php echo $this->Form->end(); ?>

              <p class="forget"><a href="#" id="loginBack" title="Login"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Want to login back?')); ?></a><br>
             <?php echo $this->requestAction('app/get-translate/'.base64_encode('Not a member ?')); ?>
             <a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign up now')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign up now')); ?></a></p>
      </div>
             <p>- or -</p>
            <a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Login with Facebook')); ?>" class="lwfb"><i class="fa fa-facebook-square"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Login with Facebook')); ?></a> 

  </div> 

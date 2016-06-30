<!--[.innerpage-conent Area start]-->
<div class="innerpage-conent">
    <!--[.signin-wrapper Area start]-->
    <div class="signin-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-sm-offset-2 col-md-offset-2 col-xs-offset-0 col-lg-8 col-sm-8 col-md-8 col-xs-12">
                    <div class="signup-container">
                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign In for Sitter Guide'));?></h2>

   <?php echo $this->Form->create(null, [
                        'role'=>'form',
                        'id'=>'login_user',
                        'autocomplete'=>'off',
    ]);?>

  <div class="form-group">
    <label for="email"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?></label>
    <div class="icon-input">
	
       <?php 
        echo $this->Form->input('Users.email',[
              'class' =>'form-control ',
              'label'=>false
              
          ]);
       ?>
      
    </div>
  </div>
  <div class="form-group">
    <label for="password"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Password')); ?></label>
    <div class="icon-input">
	
       <?php 
        echo $this->Form->input('Users.password',[
              'class' =>'form-control',
              'label'=>false

          ]);
       ?>
     
    </div>
      
  </div>
 
  <button type="submit" class="btn btn-default"  id="logInBtn"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
  <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Forgot your password?')); ?> <span class="c-red"><a href="<?php echo HTTP_ROOT.'guests/forgot-password' ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Click Here')); ?></a></span></p>
     <?php echo $loginWithFacebook; ?>
  

  <p class="line-signin"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Not a Member?')); ?> <span class="signup-color"><a href="<?php echo HTTP_ROOT.'guests/signup'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign Up Now')); ?></a></span></p>

</form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--[.signin-wrapper Area start]-->
</div>
<!--[.innerpage-conent Area end]-->

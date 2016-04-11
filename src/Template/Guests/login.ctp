<!--[.innerpage-conent Area start]-->
<div class="innerpage-conent">
    <!--[.signin-wrapper Area start]-->
    <div class="signin-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-3 col-sm-offset-2 col-md-offset-2 col-xs-offset-0 col-lg-6 col-sm-8 col-md-8 col-xs-12">
                    <div class="signup-container">
                    <h2><?php echo __('Sign In for Sitter Guide');?></h2>

   <?php echo $this->Form->create(null, [
                        'role'=>'form',
                        'id'=>'login_user'
                        
    ]);?>

  <div class="form-group">
    <label for="email"><?php echo __('Email');?></label>
    <div class="icon-input">
       <?php 
        echo $this->Form->input('Users.email',[
              'class' =>'form-control',
              'label'=>false
              
          ]);
       ?>
      <i class="fa fa-envelope"></i>
    </div>
  </div>
  <div class="form-group">
    <label for="password"><?php echo __('Password');?></label>
    <div class="icon-input">
       <?php 
        echo $this->Form->input('Users.password',[
              'class' =>'form-control',
              'label'=>false

          ]);
       ?>
      <i class="fa fa-key"></i>
    </div>
      
  </div>
 
  <button type="submit" class="btn btn-default"  id="logInBtn"><?php echo __('Submit'); ?></button>
  <p><?php echo __('Forgot your password?'); ?> <span class="c-red"><a href="<?php echo HTTP_ROOT.'guests/forgot-password' ?>"><?php echo __('Click Here'); ?></a></span></p>
     <?php echo $loginWithFacebook; ?>
  <!-- <a href="#" class="signup-fb">
      <i class="fa fa-facebook-square"></i><?php echo __('Sign Up with Facebook'); ?>
    </a>-->

  <p class="line-signin"><?php echo __('Not a Member?'); ?> <span class="signup-color"><a href="<?php echo HTTP_ROOT.'guests/signup'; ?>"><?php echo __('Sign Up Now'); ?></a></span></p>

</form>
                       <!--  <h2>Sign Up for Sitter Guide</h2>
                        <div class="signup-email">
                           <a href="#"> <i class="fa fa-envelope"></i>Sign Up with Email</a>
                        </div>
                        <div>
                            <span>- or -</span>
                        </div>
                        <div class="signup-facebook">
                            <a href="#"><i class="fa fa-facebook-square"></i>Sign Up with Facebook</a>
                        </div>
                        <p><span class="signup-line">By signing up, I agree to Rover.com's Terms of Service and <br/> confirm that I am 18 years of age or older.</span></p>
                        <p>Already a member? <span class="signup-color">Sign In Now</span></p> -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--[.signin-wrapper Area start]-->
</div>
<!--[.innerpage-conent Area end]-->

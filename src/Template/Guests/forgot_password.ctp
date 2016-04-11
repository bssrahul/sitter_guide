<!--[.innerpage-conent Area start]-->
<div class="innerpage-conent">
    <!--[.signin-wrapper Area start]-->
    <div class="signin-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-3 col-sm-offset-2 col-md-offset-2 col-xs-offset-0 col-lg-6 col-sm-8 col-md-8 col-xs-12">
                   <div class="signup-container">
                    <h2><?php echo __('Forgot Password');?></h2>

                         <?php echo $this->Form->create(null, [
                                              'url' => ['controller' => 'guests', 'action' => 'forgot-password'],
                                              'role'=>'form',
                                              'id'=>'forgotPasswordForm'
                                              
                          ]);?>
                       <p class="successMessage clr" style="color:#4f9709"></p>
                        <div class="form-group">
                          <label for="email"><?php echo __('Email');?></label>
                          <div class="icon-input">
                             <?php 
                              echo $this->Form->input('Users.email',[
                                  'class' =>'form-control',
                                  'label'=>false
                              ]);
                              echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
                             ?>
                            <i class="fa fa-envelope"></i>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-default" id="reset-pwd"><?php echo __('Submit');?></button>

                        <p><?php echo __("Want to go back at "); ?><a href="javascript:void(0)"><span onclick="window.history.back()" class="c-red"><?php echo __("Click Here"); ?></span></a></p>
                          <!--<a href="#" class="signup-fb"><i class="fa fa-facebook-square"></i>Sign Up with Facebook</a>
                        <p class="line-signin">Not a Member? <span class="signup-color"><a href="<?php echo HTTP_ROOT.'guests/signup'; ?>">Sign Up Now</a></span></p>-->

                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--[.signin-wrapper Area start]-->
</div>
<!--[.innerpage-conent Area end]-->

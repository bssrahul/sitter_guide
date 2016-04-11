<!--[.innerpage-conent Area start]-->
<div class="innerpage-conent">
    <!--[.signin-wrapper Area start]-->
    <div class="signin-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-3 col-sm-offset-2 col-md-offset-2 col-xs-offset-0 col-lg-6 col-sm-8 col-md-8 col-xs-12">
                    <div class="signup-container">
                    <h2><?php echo __('Reset Password');?></h2>

   <?php echo $this->Form->create(null, [
                        'role'=>'form',
                        'id'=>'resetPasswordForm'
                        
    ]);

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

    ?>

  <div class="form-group">
    <label for="password"><?php echo __('Password');?></label>
    <div class="icon-input">
       <?php 
        echo $this->Form->input('Users.password',[
              'class' =>'form-control',
              'label'=>false,
              'id'=>'reset_pwd_field'
              
          ]);
       ?>
      <i class="fa fa-key"></i>
    </div>
  </div>
  <div class="form-group">
    <label for="re_password"><?php echo __('Re-Password');?></label>
    <div class="icon-input">
       <?php 
        echo $this->Form->input('Users.re_password',[
              'class' =>'form-control',
              'label'=>false,
              'type'=>'password'
              
          ]);
        
       ?>
      <i class="fa fa-key"></i>
    </div>
  </div>
 
  <button type="submit" class="btn btn-default"  id="change-pwd"><?php echo __('Submit'); ?></button>
  <p><?php echo __('Sign In Now?'); ?> <span class="c-red"><a href="<?php echo HTTP_ROOT.'guests/login' ?>"><?php echo __('Click Here'); ?></a></span></p>
<?php echo $this->Form->end(); ?>
                      


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--[.signin-wrapper Area start]-->
</div>
<!--[.innerpage-conent Area end]-->

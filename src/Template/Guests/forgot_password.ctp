<!--[.innerpage-conent Area start]-->
<div class="innerpage-conent">
    <!--[.signin-wrapper Area start]-->
    <div class="signin-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-sm-offset-2 col-md-offset-2 col-xs-offset-0 col-lg-8 col-sm-8 col-md-8 col-xs-12">
                   <div class="signup-container">
                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Forgot Password')); ?></h2>

                         <?php echo $this->Form->create(null, [
                                              'url' => ['controller' => 'guests', 'action' => 'forgot-password'],
                                              'role'=>'form',
                                              'id'=>'forgotPasswordForm',
											   'autocomplete'=>'off',
                                              
                          ]);?>
                       <p class="successMessage clr" style="color:#4f9709"></p>
                        <div class="form-group">
                          <label for="email"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email'));?></label>
                          <div class="icon-input">
                             <?php 
                              echo $this->Form->input('Users.email',[
                                  'class' =>'form-control',
                                  'label'=>false
                              ]);
                              echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
                             ?>
                         
                          </div>
                        </div>
                        <button type="submit" class="btn btn-default" id="processing"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>

                        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Want to go back at ')); ?><span onclick="window.history.back()" class="c-red"><a href="javascript:void(0)"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Click Here')); ?></a></span></p>
                          
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--[.signin-wrapper Area start]-->
</div>
<!--[.innerpage-conent Area end]-->
<style>
#processing:hover, #processing:focus , #processing:active{
	background:#72a105  !important;
	color:#fff  !important;
}
</style>

<!--Login with facebook Modal Start-->
<div class="modal fade" id="myModal_forgot_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog oter-sign-up" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
        <h4 class="modal-title search-title-1"><?php echo __("Forgot Password"); ?></h4>
      </div>
      <div class="modal-body">
        <div class="signup_wrap">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="facebook">
                <p><a href="#" class="btn btn-primary" role="button"><?php echo __("Forgot Password"); ?></a></p>
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
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
			<?php 
				 echo $this->Form->create('Users', [
				'url' => ['controller' => 'Guests', 'action' => 'forgotPassword'],
				'context' => [
				'validator' => [
					'Users' => 'register',
					'Comments' => 'default'
				  ]
				],
				'class'=>'form-horizontal form-label-left',
				'id'=>'forgotPasswordForm',
				'enctype'=>'multipart/form-data',
				'novalidate'=>'novalidate'
				
			]);
			?>
			
			  <?php
			    echo $this->Form->input('Users.email', [
						'label' => false,
						'placeholder'=>__('Enter your email'),
						'class'=>'email_icon',
						'value'=>(@$_POST['data']['Users']['email'] ? $_POST['data']['Users']['email'] : (@$signupdata['Users']['email'] ? $signupdata['Users']['email'] : ''))
					]
				);
				echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
		      ?>
            </div>
          </div>
         
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="facebook mar-top-msg">
                <input type="submit" id="reset-pwd" class="btn btn-primary msg_box" value="<?php echo __("Reset Password"); ?>">
              </div>
            </div>
          </div>
		  <?php echo $this->Form->end();?>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="fotrborder border_top_sign"> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="member">
                <p> 
				<?php echo __("Want to go back at "); ?> <span> 
				<a id="logIn"  class="page-scroll" id="forgotPassword" href="#" data-toggle="modal" data-target="#myModal_log_in"><?php echo __("Log In"); ?></a></span>
				
			
				
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
	
    $("#logIn").click(function(){
	    $('#myModal_forgot_password').modal('hide');
	});
	$("#sign_up").click(function(){
	    $('#myModal_forgot_password').modal('hide');
	});
	
    //Submit form
    /*$("#formsubmit").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			$("#formsubmit").submit();
		}
	});
	$("#submit").click(function(){
		$( "#formsubmit" ).submit();
	});*/
});
</script>
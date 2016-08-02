<?php ?>
<!--[.innerpage-conent Area start]-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php 
	echo $this->Html->css(['Front/jquery-ui.css']); 
	echo $this->Html->script(['Front/jquery-ui.js']);
?>
<div class="innerpage-conent">
    <!--[.signup-wrapper Area start]-->
    <div class="signup-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-sm-offset-2 col-md-offset-2 col-xs-offset-0 col-lg-8 col-sm-8 col-md-8 col-xs-12">
                    <div class="signup-container">
                        <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign Up for Sitter Guide'));?></h2>
                        <div class="signup-email">
                           <a href="javascript:void(0)" id="signUpEmail"> <i class="fa fa-envelope"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign Up with Email')); ?></a>
                        </div>
                        
                        <!--START SINGN UP Form--> 
						
						  <?php echo $this->Form->create(null, [

							'url' => ['controller' => 'guests', 'action' => 'signup'],
							'id'=>'addUsers',
							'enctype'=>'multipart/form-data',
							'role'=>'form',
							'style'=>'display:none'
						  ]);
						  ?>
						  <div class="form-group">
						  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label><?php
						  echo $this->Form->input('Users.title',[
							'templates' => ['inputContainer' => '{{content}}'],
							'type'=>'select',
							'label'=>false,
							'options'=>[''=>'Choose Title','Mr'=>$this->requestAction('app/get-translate/'.base64_encode('Mr')),'Mrs'=>$this->requestAction('app/get-translate/'.base64_encode('Mrs')),'Ms'=>$this->requestAction('app/get-translate/'.base64_encode('Ms'))],
							'class' =>'form-control'
							]);
							/*if(@$loginerror['first_name'][0] != ""){
							 echo '<em class="signup_error error">'.__(@$loginerror['first_name'][0]).'</em>';
						    }*/
						 ?>

						 </div>
                        <div class="form-part">
                        	<div class="form-group">
							<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('First Name')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							<?php 
								echo $this->Form->input('Users.first_name',[                
								 'class'=>'form-control',
								 'label'=>false,
								 'templates' => ['inputContainer' => '{{content}}']
								  ]);
								//pr($loginerror['first_name'][0]);
								if(@$loginerror['first_name'][0] != ""){
								    echo '<em class="signup_error error">'.__(@$loginerror['first_name'][0]).'</em>';
							    }
								  ?>
							</div>	  
							<div class="form-group">
							
								<?php 
								 echo $this->Form->input('Users.last_name',[               
								  'class'=>'form-control',
								  'label'=>$this->requestAction('app/get-translate/'.base64_encode('Last Name')),
								   'templates' => ['inputContainer' => '{{content}}']
								]);
								if(@$loginerror['last_name'][0] != ""){
								  echo '<em class="signup_error error">'.__(@$loginerror['last_name'][0]).'</em>';
							    }
							    
							?>
							
						    </div>
                         </div>
                         <div class="form-part">
                      
                              <div class="form-group">	
						 <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Country')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                         <?php 
                                echo $this->Form->input('Users.country',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'select',
                                  'label'=>false,
                                  'options'=>[''=>'Choose Country','Australia'=>'Australia','New Zealand'=>'New Zealand','UK'=>'UK','USA'=>'United State America'],
                                  'class' =>'form-control'
                                  ]);
                                if(@$loginerror['country'][0] != ""){
                                 echo '<em class="signup_error error">'.__(@$loginerror['country'][0]).'</em>';
							   }
                            ?>
                         </div>	
                         					<div class='form-group'>
							<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Post/Zip Code')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							 <?php  
								echo $this->Form->input('Users.zip',[
								'templates' => ['inputContainer' => '{{content}}'],               
									'class'=>'form-control',
									'label'=>false,
									]);
								if(@$loginerror['zip'][0] != ""){
									echo '<em class="signup_error error">'.__(@$loginerror['zip'][0]).'</em>';
								}
								?>
							</div>
                            
                       
                        </div>
                       
                       <div class='form-group'>
					   <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<?php 
							echo $this->Form->input('Users.email',[
							'templates' => ['inputContainer' => '{{content}}'],
							'class' =>'form-control',
							'label'=>false,
							]);
							if(@$loginerror['email'][0] != ""){
							    echo '<em class="signup_error error">'.__(@$loginerror['email'][0]).'</em>';
						    }
						?>
					   </div>
                        <div class="form-part">
                            <div class="form-group">
							<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Create Password')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							<?php 
                              echo $this->Form->input('Users.create_password',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'password',
                                  'label'=>false,
                                  'class' =>'form-control'
                                ]);
                              if(@$loginerror['create_password'][0] != ""){  
                              echo '<em class="signup_error error">'.__(@$loginerror['create_password'][0]).'</em>';
						  }
                             ?>
                       
                             </div>
							  <div class="form-group">
							  <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat Password')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							   <?php 
									echo $this->Form->input('Users.re_password',[
										'label'=>false,
										'type'=>'password',
										'class' =>'form-control'
									  ]);
									 if(@$loginerror['re_password'][0] != ""){    
									echo '<em class="signup_error error">'.__(@$loginerror['re_password'][0]).'</em>';
								}
								   ?>
								    
							   </div>
                        </div>
                        <div class="form-group">
						<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Where did you hear about us?')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							   <?php 
									echo $this->Form->input('Users.hear_from',[
									  'type'=>'select',
									  'label'=>false,
									  'options'=>['Radio'=>'Radio','TV'=>'TV','earch eg. Google or Bing'=>'earch eg. Google or Bing','Someone told me about Sitter Guide'=>'Someone told me about Sitter Guide','YouTube'=>'YouTube','Facebook'=>'Facebook','Twitter'=>'Twitter','Instagram'=>'Instagram','Pinterest'=>'Pinterest','Sitter Guide Posts'=>'Sitter Guide Posts','Other'=>'Other'],
									  'class' =>'form-control'
									  ]);
								?>
							</div>
                        
                        <div class="form-part">
							<div class='form-group dobDiv pddtop'>
							<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Date of Birth')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							 <?php  
								echo $this->Form->input('Users.birth_date',[               
								'class'=>'form-control dob',
								'label'=>false,
								'readonly'=>true,
								'div'=>false,
								'placeholder'=>'DD-MM-YYYY', 
								]);
								?> 
								<?php echo '<em class="signup_error error">'.__(@$loginerror['birth_date'][0]).'</em>'; ?>
								<i class="fa fa-calendar"></i>
							</div>
                           <div class="form-group pddtop">
						   <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Have A Reference Code?')); ?> </label>
							  <?php 
								echo $this->Form->input('Users.reference_code',[								
								'label' => false,
								'type' => "text",
								'class'=>'form-control',
							]);
							echo '<em class="signup_error error">'.__(@$loginerror['reference_code'][0]).'</em>';
								?>
							</div>
							 
                      </div> 
                         
                            
                        <div class="form-group">
						<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Verification')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                    
                          
							<span class="cap-img">
								<div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_KEY; ?>"></div>
								<br/><label generated="true" class="error"><?php echo isset($captchErr)?$captchErr:''; ?></label>
							</span>
						

                        </div>
                        
                        <div class="checkbox">

                         <!--<label><input type="checkbox" name="Users[term_condition]"><?php echo __('Terms & Conditions');?></label>
                          <label for="Users[term_condition]" generated="true" class="error"></label>-->
                           <div class="checkbox">
								<label>
								  <?php
											echo $this->Form->input('Users.term_condition',[			
												//'label'=>'Terms & Conditions',
												 'templates' => [
													'inputContainer' => '{{content}}'
												],
												'label'=>false,
												'type' => "checkbox"
											]);
										   ?> 
										   <?php echo $this->requestAction('app/get-translate/'.base64_encode('I agree to the ')); ?>
										    <span class="signup-color">
											<a target="_blank"  href=<?php echo HTTP_ROOT.'terms'?>>
										  
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('Terms & Conditions')); ?>
											
										   </a>
										   </span>
										   <label class="error" style="float:right" for="Users[term_condition]" generated="true"></label>
										   <i class="fa fa-asterisk" aria-hidden="true"></i>  
								
								</label>
							</div>

                        <!--<label for="users-term-condition" style="position:relative"></label> --> 
                        </div>
 
                       <?php
                            echo $this->Form->submit('Sign Up',[
                                'name'=>'signup-submit',			
                            	'label'=>false,
                            	'class'=>'signup-submit btn btn-default',
                            	'id'=>'processing',
                            	'type' => 'submit'
                            	
							]);
						?>
                        <!--<input type="submit" value="Sign Up" id="processing" class="signup-submit btn btn-default" name="signup-submit">-->
						<p><span class="c-red c-red-bar"><?php echo $this->requestAction('app/get-translate/'.base64_encode('OR')); ?></span></p>
                        <a href="<?php echo @$facebookUrl; ?>" class="signup-fb"><i class="fa fa-facebook-square"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign Up with Facebook')); ?></a>
                            <p class="line-signin"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Not a Member?')); ?> 
							<span class="signup-color">
							  <a href="<?php echo HTTP_ROOT.'guests/login'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign In')); ?> </a>
							 </span>
                         </p>
                    
                    <?php echo $this->Form->end(); ?>
                         <!--END SIGN UP FORM-->
                     <div id="loginFacebook">
                        <div class="top-sp">
                            <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('- or -')); ?></span>
                        </div>
                        <div class="signup-facebook">
                           <?php 
                           echo @$signupWithFacebook; ?> 
                        </div>
                        <p>
							<span class="signup-line">
								<?php echo $this->requestAction('app/get-translate/'.base64_encode('By signing up, I agree to Sitter Guide')); ?> 
								
									<a class="signup-color" href=<?php echo HTTP_ROOT.'terms'?>>
										<?php echo $this->requestAction('app/get-translate/'.base64_encode('Terms of Service')); ?>
									</a><br/>
								
								<?php echo $this->requestAction('app/get-translate/'.base64_encode('and confirm that I am 18 years of age or older.')); ?>
							</span>
						</p>
                        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Already a member?')); ?> <span class="signup-color"><a href="<?php echo HTTP_ROOT.'guests/login'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign In Now')); ?></a></span></p>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--[.signup-wrapper Area start]-->
</div>
<!--[.innerpage-conent Area end]-->

<?php 
	if(isset($captchErr) && $captchErr !=""){
		
?>
<script>
	$( document ).ready(function() {
		setTimeout(
			function(){
				$('#signUpEmail').trigger('click');
			},100
		);
		
		
	});
</script>


<?php 
}
?>
<script>
	$( document ).ready(function() {
		$("#users-birth-date").datepicker(
           {
		     changeMonth: true,
		     changeYear: true,
	         maxDate: new Date(),
	         yearRange: "-50:-18",
			 dateFormat: 'dd-mm-yy',
			 defaultDate: '01-01-1998'

		   }
			);
		$(".fa-calendar").click(function(){ $("#users-birth-date").focus();});
	});
</script>
<style>
label .fa.fa-asterisk {
    font-size: 6px;
    left: 2px;
    position: relative;
    top: -5px;
	color:red
}
a.signup-color {
    font-size: 14px  !important;
    background: #fff !important;
    color: #3CB3EE  !important;
}

#processing:hover, #processing:focus , #processing:active{
	background:#72a105  !important;
	color:#fff  !important;
}
</style>



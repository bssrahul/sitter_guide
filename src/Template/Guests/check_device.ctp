<?php if($detect=='desktop'){ ?>
	
  <li  class="dropdown hideLogin">
   <a id="droplog" href="#" data-toggle="dropdown"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Login')); ?></a>
   <div class="dropdown-menu login-drop" id="dropcont">
	<div class="form-group">
		   <?php echo $this->Form->create(null,[
				'url' => ['controller' => 'guests', 'action' => 'login'],
				'role'=>'form',
				'id'=>'loginUser',
				'autocomplete'=>'off',
				
			]);
			echo $this->Form->input('Users.email',[                
				   'class'=>'form-control',
				   'label'=>$this->requestAction('app/get-translate/'.base64_encode('Email'))
			]);
			 echo $this->Form->input('Users.password',[                
				   'class'=>'form-control',
				   'type'=>'password',
				   'label'=>$this->requestAction('app/get-translate/'.base64_encode('Password'))
			]);
		?>
		<input type="submit" id="log_in_btn" class="btn btn-success" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?>">
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="signup-or-separator"> <p class="successMessage clr"></p><p class="errorMessage clr"></p>
			</div>
		  </div>
		</div>
		<?php echo $this->Form->end(); ?>

			<p class="forget">
		   
				<a id="droplogForgot" href="<?php echo HTTP_ROOT.'guests/forgot-password'; ?>" >
				 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Forgot Your Password')); ?> </a>
			  <br>
		  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Not a Member ?')); ?>
		   <a href="<?php echo HTTP_ROOT.'guests/signup'; ?>" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign up now')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign up now')); ?></a></p>
	</div>
	 

   </div> 
  
</li>

<?php }else{ ?>
	 <li><a href="<?php echo HTTP_ROOT.'guests/login'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Login')); ?></a></li>
	
<?php }?>
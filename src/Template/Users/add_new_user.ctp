<div class="">
   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Add New User')); ?><small></small></h2>
					<div class="clearfix"></div>
				</div>
				<?= $this->element('adminElements/error_msg'); ?>
				<div class="x_content">
			<?= $this->element('adminElements/validations'); ?>
			
					<?php echo $this->Form->create('Users', [
						'url' => ['controller' => 'users', 'action' => 'add-new-user'],
						'context' => [
						'validator' => [
							'Users' => 'register',
							'Comments' => 'default'
						  ]
						],
						'class'=>'form-horizontal form-label-left',
						'id'=>'adduser',
						'enctype'=>'multipart/form-data',
						'novalidate'=>'novalidate',
						'autocomplete' =>'off',
						
					]);?>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->requestAction('app/get-translate/'.base64_encode('First Name')); ?> <span class="required">*</span>
						</label>
						<?php 
						//echo "<pre>"; print_r($admininfo);
						 echo $this->Form->input('Users.first_name',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
						
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Name')); ?><span class="required"></span>
						</label>
						<?php 
						//echo "<pre>"; print_r($admininfo);
						echo $this->Form->input('Users.last_name',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?><span class="required">*</span>
						</label>
						<?php 
						//echo "<pre>"; print_r($admininfo);
						echo $this->Form->input('Users.email',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Phone')); ?><span class="required">*</span>
						</label>
						<?php 
						//echo "<pre>"; print_r($admininfo);
						echo $this->Form->input('Users.phone',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="country"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Country')); ?><span class="required">*</span>
						</label>
						<?php 
						echo $this->Form->input('Users.country',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city"><?php echo $this->requestAction('app/get-translate/'.base64_encode('City')); ?><span class="required">*</span>
						</label>
						<?php 
						echo $this->Form->input('Users.city',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="state"><?php echo $this->requestAction('app/get-translate/'.base64_encode('State')); ?><span class="required">*</span>
						</label>
						<?php 
						echo $this->Form->input('Users.state',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Address')); ?><span class="required">*</span>
						</label>
						<?php 
						echo $this->Form->input('Users.address',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Zip')); ?><span class="required">*</span>
						</label>
						<?php 
						echo $this->Form->input('Users.zip',[
								'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
								'label' => false,
								'class'=>'form-control col-md-7 col-xs-12']);
						 ?>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile Picture')); ?><span class="required">*</span>
						</label>
						 <div class="col-md-6 col-sm-6 col-xs-12">
						   <?php 
								echo $this->Form->file('image',[
								  'label' => false,
								  'class'=>'form-control col-md-7 col-xs-12']);
							?>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
							<button id="send" type="submit" class="btn btn-success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
						</div>
					</div>
					<?php echo $this->form->end(); ?>
				<!-- end form -->
				</div>
			</div>
		</div>
	</div>
</div>
				
		 <script>
		
		 $(document).ready(function(){
				// initialize the validator function
				validator.message['date'] = 'not a real date';

				// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
				$('form')
					.on('blur', 'input[required], input.optional, select.required', validator.checkField)
					.on('change', 'select.required', validator.checkField)
					.on('keypress', 'input[required][pattern]', validator.keypress);

				$('.multi.required')
					.on('keyup blur', 'input', function () {
						validator.checkField.apply($(this).siblings().last()[0]);
					});

				// bind the validation to the form submit event
				//$('#send').click('submit');//.prop('disabled', true);

				$('#adduser').submit(function (e) {
				
					e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				});

				/* FOR DEMO ONLY */
				$('#vfields').change(function () {
					$('form').toggleClass('mode2');
				}).prop('checked', false);

				$('#alerts').change(function () {
					validator.defaults.alerts = (this.checked) ? false : true;
					if (this.checked)
						$('form .alert').remove();
				}).prop('checked', false);
				
				/*$("#send").click(function(){
				   //$("#profileform").submit();  
				});*/
	});
	</script>

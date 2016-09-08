<div class="">
                
                    <div class="row">
					
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Change Password')); ?></h2>
                                    <div class="clearfix"></div>
                                </div>
								<?php @$errrVal = $this->request->session()->read("error"); 
								if($errrVal !=""){ ?>
											  <?= $this->element('adminElements/error_msg'); ?>
								<?php }
								?>
								<?php @$successVal = $this->request->session()->read("success"); 
								if($successVal !=""){ ?>
											 <?= $this->element('adminElements/success_msg'); ?>
											
								<?php }
								?>
                                <div class="x_content">
								
                                  <!--site settings form-->
								    <?php echo $this->Form->create(null, [
										'url' => ['controller' => 'users', 'action' => 'change-password'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'changepassform',
										'novalidate'=>'novalidate',
										'autocomplete' =>'off',
									]);?>
								   
								   
								   <div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Current Password')); ?><span class="required">*</span>
										</label>
										<?php echo $this->Form->input('Admin.current_password',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'type'=>'password',
												'class'=>'form-control col-md-7 col-xs-12']);
										 ?>
									</div>
								   
								   <div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"><?php echo $this->requestAction('app/get-translate/'.base64_encode('New Password')); ?><span class="required">*</span>
										</label>
										<?php echo $this->Form->input('Admin.password',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Confirm Password')); ?> <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('Admin.confirm_password',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'id'=>'password2',
												'type'=>'password',
												'class'=>'form-control col-md-7 col-xs-12',
												'data-validate-linked' => 'password']);
										 ?>
									</div>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="button" class="btn btn-primary" onclick="window.history.go(-1);"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
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

				$('#changepassform').submit(function (e) {
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
				
				$("#send").click(function(){
				   $("#profileform").submit();  
				});
	});
    </script>

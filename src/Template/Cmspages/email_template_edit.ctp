<?php echo $this->element('adminElements/main_editor');
   
?>
<div class="">
              <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email Template Edit')); ?></h2>
									<div class="clearfix"></div>
							    </div>
								<?= $this->element('adminElements/error_msg'); ?>
								<div class="x_content">
								
								<?= $this->element('adminElements/validations');?>
								
                                  <!--site settings form-->
								    <?php echo $this->Form->create(null, [
										'url' => ['controller' => 'cmspages', 'action' => 'email-template-edit'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'templateedit',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										 'autocomplete'=>'off',
										
									]);?>
									      <?php 
                                       echo $this->Form->input('EmailTemplates.id',[
										        'type'=>'hidden',
												'value'=>$emailTemp->id]);
										?>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?> <span class="required">*</span>
										</label>
										<?php 
										//echo "<pre>"; print_r($admininfo);
										 echo $this->Form->input('EmailTemplates.title',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$emailTemp->title != ''?$emailTemp->title:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Subjects')); ?><span class="required">*</span>
										</label>
										<?php 
										//echo "<pre>"; print_r($admininfo);
										echo $this->Form->input('EmailTemplates.subject',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$emailTemp->subject != ''?$emailTemp->subject:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="allowed_vars"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Short Codes (Note: Don\'t change short codes in description)')); ?><span class="required">*</span>
										</label>
										<?php 
										//echo "<pre>"; print_r($admininfo);
										echo $this->Form->input('EmailTemplates.allowed_vars',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$emailTemp->allowed_vars != ''?$emailTemp->allowed_vars:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_from"><?php echo $this->requestAction('app/get-translate/'.base64_encode('From Email')); ?><span class="required">*</span>
										</label>
										<?php 
										//echo "<pre>"; print_r($admininfo);
										echo $this->Form->input('EmailTemplates.email_from',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$emailTemp->email_from != ''?$emailTemp->email_from:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_name"><?php echo $this->requestAction('app/get-translate/'.base64_encode('From Name')); ?><span class="required">*</span>
										</label>
										<?php 
										//echo "<pre>"; print_r($admininfo);
										echo $this->Form->input('EmailTemplates.email_name',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$emailTemp->email_name != ''?$emailTemp->email_name:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->textarea('EmailTemplates.description',
											 ['escape' => false,
											 'value'=>$emailTemp->description != ''?$emailTemp->description:'',
											 'class'=>'form-control col-md-7 col-xs-12 tinymce', 'id'=>'elm1']);?>
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

				$('#templateedit').submit(function (e) {
				
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

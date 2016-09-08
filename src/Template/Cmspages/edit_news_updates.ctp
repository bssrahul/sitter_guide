<div class="">
                   <div class="row">
					
					
					 <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit News Updates')); ?><small></small></h2>
									<div class="clearfix"></div>
							 </div>
							 <?= $this->element('adminElements/error_msg'); ?>
							 <div class="x_content">
								<?= $this->element('adminElements/validations'); ?>
								<!--Form edit user -->
							        <?php echo $this->Form->create($work_info, [
										'class'=>'form-horizontal form-label-left',
										//'id'=>'editcategory',
										'enctype'=>'multipart/form-data',
										 'autocomplete'=>'off',
									]);?>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?> <span class="required">*</span>
										</label>
										<?php 
                                         //$howId = base64_encode(convert_uuencode($Howitwork->id)); 
										//echo $howId; die;
										echo $this->Form->input('HowWorks.id',[
										        'type'=>'hidden'
										        ]);
								        echo $this->Form->input('HowWorks.category',[
								        'type'=>'hidden',
								        'value'=>'news_updates'
										        ]);?>


									    <div class="col-md-6 col-sm-6 col-xs-12">
										<?php 
										 echo $this->Form->input('HowWorks.title',[
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12'/*,
												'value'=>$categoryInfo->title != '' ?$categoryInfo->title:''*/]);
										 ?>
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->input('HowWorks.description',
											 ['type' => 'textarea',
											 'label'=>false,
											 'class'=>'form-control col-md-7',
                                              /* 'value'=>$categoryInfo->description != '' ?$categoryInfo->description:'' */]);


                                              ?>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->input('HowWorks.works_image',[
												  'label' => false,
												  'type' => 'file',
												  ]);
											?>
											<div class="text-centerimage view-first editImg customImg">
												<img class="img-circle profile_img catImg"  src="<?php  echo HTTP_ROOT.'img/uploads/'.($work_info->image != ''?$work_info->image:'prof_photo.png'); ?>"/> 	
											</div>	
											
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
				/*validator.message['date'] = 'not a real date';

				// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
				$('form')
					.on('blur', 'input[required], input.optional, select.required', validator.checkField)
					.on('change', 'select.required', validator.checkField)
					.on('keypress', 'input[required][pattern]', validator.keypress);

				$('.multi.required')
					.on('keyup blur', 'input', function () {
						validator.checkField.apply($(this).siblings().last()[0]);
					});*/

				// bind the validation to the form submit event
				//$('#send').click('submit');//.prop('disabled', true);

			/*	$('#editcategory').submit(function (e) {
				
					e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				});*/

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

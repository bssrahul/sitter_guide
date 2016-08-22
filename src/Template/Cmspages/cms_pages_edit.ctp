<?php echo $this->element('adminElements/main_editor');
   //pr($page); die;
?>
<div class="">
                   <div class="row">
					    <div class="col-md-12 col-sm-12 col-xs-12">
						  <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('CMS Page Edit')); ?></h2>
									<div class="clearfix"></div>
							    </div>
								<?php echo $this->element('adminElements/error_msg');?>
								<div class="x_content">
								
								<?= $this->element('adminElements/validations'); ?>
								
                                  <!--site settings form-->
								    <?php echo $this->Form->create(null, [
										'url' => ['controller' => 'cmspages', 'action' => 'cms-pages-edit'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'cmspageedit',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										 'autocomplete'=>'off',
										
									]);?>
                                   <?php 
                                       echo $this->Form->input('CmsPages.id',[
										        'type'=>'hidden',
												'value'=>$page->id]);?>
								
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pagename"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Page Name')); ?> <span class="required">*</span>
										</label>
										<?php 
										 echo $this->Form->input('CmsPages.pagename',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$page->pagename != ''?$page->pagename:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pageurl"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Page URL')); ?><span class="required">*</span>
										</label>
										<?php 
										//echo "<pre>"; print_r($admininfo);
										echo $this->Form->input('CmsPages.pageurl',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'readonly' => true,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$page->pageurl != ''?$page->pageurl:'']);
										 ?>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pageheading')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->textarea('CmsPages.pageheading',
											 ['escape' => false,
											 'class'=>'form-control col-md-7' ,
											 'value'=>$page->pageheading != ''?$page->pageheading:'']);?>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pagecontent"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Page Content')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->textarea('CmsPages.pagecontent',
											 ['escape' => false,
											 'value'=>$page->pagecontent != ''?$page->pagecontent:'',
											 'class'=>'form-control col-md-7 col-xs-12 tinymce', 'id'=>'elm1']);?>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('CmsPages.banner_image',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
											<div class="text-centerimage view-first editImg customImg">
												<img class="img-circle profile_img catImg"  src="<?php echo HTTP_ROOT.'img/uploads/'.($page->banner_image != ''?$page->banner_image:'no-image.png'); ?>"/>
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

				$('#cmspageedit').submit(function (e) {
				
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

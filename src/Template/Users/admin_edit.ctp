<div class="">
                 <div class="row">
					   <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2>Edit Admin Detail</h2>
									<div class="clearfix"></div>
							    </div>
								
								<?= $this->element("adminElements/error_msg"); ?>
								
                                <div class="x_content">
								
								<?= $this->element('adminElements/validations');?>
								
                                  <!--site settings form-->
								    <?php echo $this->Form->create(null, [
										'url' => ['controller' => 'Users', 'action' => 'admin-edit'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'profileform',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate'
										
									]);?>
									<span class="section">Profile Settings</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name">Full name <span class="required">*</span>
										</label>
										<?php 
										echo $this->Form->input('Admins.full_name',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$admininfo->full_name != ''?$admininfo->full_name:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User name <span class="required">*</span>
										</label>
										<?php 
										echo $this->Form->input('Admins.username',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$admininfo->username != ''?$admininfo->username:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email Address <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('Admins.email',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$admininfo->email != ''?$admininfo->email:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_img">Profile Picture<span class="required">*</span>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('admin_img',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
											
											<img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($admininfo->admin_img != ''?$admininfo->admin_img:'prof_photo.png'); ?>"/>
										</div>
									</div>
									<span class="section">Main Settings</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_name">Site Name <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.site_name',[
												'templates' => [
													'inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->site_name != '' ?$siteinfo->site_name:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Site Contact Email <span class="required">*</span>
										</label>
										  <?php echo $this->Form->input('SiteConfigurations.site_contact_email',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'type'=>'email',
												'id'=>'email',
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->site_contact_email != ''?$siteinfo->site_contact_email:'']);
										  ?>
									</div>
                                    <span class="section">Logo, Banner & Footer Settings</span>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_logo">Site Logo <span class="required">*</span>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('site_logo',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
											
											<img  style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($siteinfo->site_logo != ''?$siteinfo->site_logo:'logo_demo.jpg'); ?>"/>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_favicon">Favicon <span class="required">*</span>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('site_favicon',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
										   <img  style="margin:5px" height="50px"; width="50px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($siteinfo->site_favicon != ''?$siteinfo->site_favicon:'favicon_demo.png'); ?>"/>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_footer">Footer Content <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->textarea('SiteConfigurations.site_footer',
											 ['escape' => false,
											 'class'=>'form-control col-md-7 col-xs-12',
											 'value'=>$siteinfo->site_footer]); ?>
										</div>
									</div>
									<span class="section">SEO Settings</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_title">Meta Title <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.meta_title',[
												'templates' => [
													'inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->meta_title != ''?$siteinfo->meta_title:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_keyword">Meta Keywords <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.meta_keyword',[
												'templates' => [
													'inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->meta_keyword != ''?$siteinfo->meta_keyword:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_description">Meta Description <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.meta_description',[
												'templates' => [
													'inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->meta_description != ''?$siteinfo->meta_description:'']);
										 ?>
									</div>
									<span class="section">Social Settings</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_link">Facebook URL <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.facebook_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->facebook_link !='' ?$siteinfo->facebook_link:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_link">Twitter URL<span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.twitter_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->twitter_link != ''?$siteinfo->twitter_link:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_link">Google+ URL <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.google_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->google_link != ''?$siteinfo->google_link:'']);
										 ?>
									</div>
									<!--<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin_link">LinkedIn URL<span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.linkedin_link',[
												'templates' => [
													'inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->linkedin_link != '' ?$siteinfo->linkedin_link:'']);
										 ?>
									</div>-->
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram_link">Instagram URL<span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.instagram_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->instagram_link != '' ?$siteinfo->instagram_link:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="youtube_link">Youtube URL<span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.youtube_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->youtube_link != ''?$siteinfo->youtube_link:'']);
										 ?>
									</div>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  >Cancel</button>
											<button id="send" type="submit" class="btn btn-success">Submit</button>
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

				$('#profileform').submit(function (e) {
				
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

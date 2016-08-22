<div class="">
                 <div class="row">
					   <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit Admin Detail')); ?></h2>
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
										'novalidate'=>'novalidate',
										'autocomplete' =>'off',
										
									]);?>
									<span class="section"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile Settings')); ?></span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Full Name')); ?></span> <span class="required">*</span>
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
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"><?php echo $this->requestAction('app/get-translate/'.base64_encode('User Name')); ?></span> <span class="required">*</span>
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
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email Address')); ?></span> <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('Admins.email',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$admininfo->email != ''?$admininfo->email:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_img"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile Picture')); ?></span><span class="required">*</span>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('admin_img',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
											<div class="text-centerimage view-first customImg">
												<img class="img-circle profile_img catImg"src="<?php echo HTTP_ROOT.'img/uploads/'.($admininfo->admin_img != ''?$admininfo->admin_img:'prof_photo.png'); ?>"/>
											</div>
									
										</div>
									</div>
									<span class="section"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Main Settings')); ?></span></span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_name"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Site Name')); ?></span> <span class="required">*</span>
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
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Site Contact Email')); ?></span> <span class="required">*</span>
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
                                    <span class="section"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Logo, Banner & Footer Settings')); ?></span></span>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_logo"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Site Logo')); ?> <span class="required">*</span>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('site_logo',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
											<div class="text-centerimage view-first customImg">
												<img class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/uploads/'.($siteinfo->site_logo != ''?$siteinfo->site_logo:'logo_demo.jpg'); ?>"/>
											</div>
											
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_favicon"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Favicon')); ?> <span class="required">*</span>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('site_favicon',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
											<div class="text-centerimage view-first customImg">
												<img class="img-circle profile_img catImg"  src="<?php echo HTTP_ROOT.'img/uploads/'.($siteinfo->site_favicon != ''?$siteinfo->site_favicon:'favicon_demo.png'); ?>"/>
											</div>
											</div>
										  
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_footer"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Footer Content')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->textarea('SiteConfigurations.site_footer',
											 ['escape' => false,
											 'class'=>'form-control col-md-7 col-xs-12',
											 'value'=>$siteinfo->site_footer]); ?>
										</div>
									</div>
									<span class="section"><?php echo $this->requestAction('app/get-translate/'.base64_encode('SEO Settings')); ?></span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_title"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Meta Title')); ?> <span class="required">*</span>
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
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_keyword"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Meta Keywords')); ?> <span class="required">*</span>
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
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Meta Description')); ?> <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.meta_description',[
												'templates' => [
													'inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}</div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->meta_description != ''?$siteinfo->meta_description:'']);
										 ?>
									</div>
									<span class="section"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Social Settings')); ?></span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_link"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Facebook URL')); ?> <span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.facebook_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}<em>eg : <b>https://facebook.com</b></em></div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->facebook_link !='' ?$siteinfo->facebook_link:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_link"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Twitter URL')); ?><span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.twitter_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}<em>eg : <b>https://twitter.com</b></em></div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->twitter_link != ''?$siteinfo->twitter_link:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="google_link"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Google+ URL')); ?> <span class="required">*</span>
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
													'inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}<em>eg : <b>https://linkedin.com</b></em></div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->linkedin_link != '' ?$siteinfo->linkedin_link:'']);
										 ?>
									</div>-->
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram_link"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Instagram URL')); ?><span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.instagram_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}<em>eg : <b>https://instagram.com</b></em></div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->instagram_link != '' ?$siteinfo->instagram_link:'']);
										 ?>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="youtube_link"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Youtube URL')); ?><span class="required">*</span>
										</label>
										<?php echo $this->Form->input('SiteConfigurations.youtube_link',[
												'templates' => ['inputContainer' => '<div class="col-md-6 col-sm-6 col-xs-12">{{content}}<em>eg : <b>https://youtube.com</b></em></div>'],
												'label' => false,
												'class'=>'form-control col-md-7 col-xs-12',
												'value'=>$siteinfo->youtube_link != ''?$siteinfo->youtube_link:'']);
										 ?>
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
				
		
	<style>
		.customImg {
			width: 100px;
			top: 10px;
			bottom: 10px;
			margin-bottom: 10px;
			clear: both;
			position: relative;
		}
		
		em {
			float: left;
			position: absolute;
			width: 100%;
			margin-left: 5px;
			margin-top: 7px;
		}		
	</style>

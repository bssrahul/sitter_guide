<div class="x_panel">
	
	<div class="x_title">
		<h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit User')); ?><small></small></h2>
		<div class="clearfix"></div>
	</div>
    <div class="x_content">
		<?= $this->element('adminElements/validations'); ?>
		<?= $this->element('adminElements/error_msg'); ?>
		
		<!--Form edit user -->
			<?php echo $this->Form->create(null, [
				'url' => ['controller' => 'users', 'action' => 'edit-user'],
				'class'=>'form-horizontal form-label-left input_mask',
				'id'=>'edituser',
				'style'=>'margin-top: 10px !important;float: left;',
				'enctype'=>'multipart/form-data',
				'novalidate'=>'novalidate',
				'autocomplete' =>'off',
			]);?>
			<div class="x_title">
				<h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Info')); ?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				
				<?php 
				 //$userId = base64_encode(convert_uuencode($userInfo->id));
				echo $this->Form->input('Users.id',[
						'type'=>'hidden',
						'value'=>$userInfo->id]);?>
				
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('First Name')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<?php 
				 echo $this->Form->input('Users.first_name',[
						'class'=>'form-control',
						'label'=>false,
						'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('First Name')),
						'value'=>$userInfo->first_name != '' ?$userInfo->first_name:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Name')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<?php 
				echo $this->Form->input('Users.last_name',[
						'class'=>'form-control',
						'label'=>false,
						'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Last Name')),
						'value'=>$userInfo->last_name != '' ?$userInfo->last_name:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Gender')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<?php 
				echo $this->Form->input('Users.gender',[
						'class'=>'form-control',
						'type'=>'select',
						'label'=>false,
						'options'=>['Male'=>'Male','Female'=>'Female','Other'=>'Other'],
						'value'=>$userInfo->gender != '' ?$userInfo->gender:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<?php 
				echo $this->Form->input('Users.email',[
						'class'=>'form-control',
						'label'=>false,
						'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('email')),
						'value'=>$userInfo->email != '' ?$userInfo->email:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Phone')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<?php 
				echo $this->Form->input('Users.phone',[
						'class'=>'form-control',
						'label'=>false,
						'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Phone')),
						'value'=>$userInfo->phone != '' ?$userInfo->phone:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Zone id')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<?php 
				echo $this->Form->input('Users.zone_id',[
						'class'=>'form-control',
						'label'=>false,
						'type'=>'select',
						'options'=>$zonesData,
						'value'=>$userInfo->zone_id]);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Country')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				
				<?php 
                                echo $this->Form->input('Users.country',[
                                  'templates' => ['inputContainer' => '{{content}}'],
                                  'type'=>'select',
                                  'label'=>false,
                                  'options'=>[''=>'Choose Country','Australia'=>'Australia','Austria'=>'Austria','Belbium'=>'Belbium','Canada'=>'Canada','Denmark'=>'Denmark','Finland'=>'Finland','France'=>'France','Germany'=>'Germany','Hong Kong S.A.R., China'=>'Hong Kong S.A.R., China','Ireland'=>'Ireland','Italy'=>'Italy','Japan'=>'Japan','india'=>'India'],
                                  'class' =>'form-control',
                                  'value'=>$userInfo->country,
                                  ]);
                                 echo '<em class="signup_error error">'.__(@$loginerror['country'][0]).'</em>';
                ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label>
				<?php echo $this->requestAction('app/get-translate/'.base64_encode('Zip Code')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<?php  
								echo $this->Form->input('Users.zip',[
								'templates' => ['inputContainer' => '{{content}}'],               
									'class'=>'form-control',
									'label'=>false,
									'value'=>$userInfo->zip,
									]);
									echo '<em class="signup_error error">'.__(@$loginerror['zip'][0]).'</em>';
								?>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
			<label  class="control-label" for="about_user"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About User')); ?></label>
				<?php 
					echo $this->Form->textarea('Users.about_user',['rows' => '8', 'cols' => '15',
					'placeholder'=>'About User',
					'class'=>'form-control ',
					'value'=>$userInfo->about_user != '' ?$userInfo->about_user:'']);
				?>
				
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile Image')); ?> </label>
				<?php 
				echo $this->Form->file('Users.image',[
						'class'=>'form-control']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				
				<div class="text-centerimage view-first editImg customImg">
					<img class="img-circle profile_img catImg" src="<?php echo HTTP_ROOT.'img/uploads/'.($userInfo->image != ''?$userInfo->image:'prof_photo.png'); ?>"/>
				</div>
				
				
			</div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
				<button id="adminUserEdit" type="submit" class="btn btn-success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
			</div>
			<?php echo $this->form->end(); ?>
			
		<!-- end form -->
	</div>
</div>
<!-- @vik Code for Add/Edit/Del User Team Members End-->
<script>
$(document).ready(function(){
   $('#adminUserEdit').click(function(){
      $('#edituser').submit();
   });
});
</script>	

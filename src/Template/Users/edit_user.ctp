<div class="x_panel">
	
	<div class="x_title">
		<h2>Edit User<small></small></h2>
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
				'novalidate'=>'novalidate'
			]);?>
			<div class="x_title">
				<h2>Basic Info</h2>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				
				<?php 
				 //$userId = base64_encode(convert_uuencode($userInfo->id));
				echo $this->Form->input('Users.id',[
						'type'=>'hidden',
						'value'=>$userInfo->id]);?>
				<?php 
				 echo $this->Form->input('Users.first_name',[
						'class'=>'form-control',
						'placeholder'=>'First Name',
						'value'=>$userInfo->first_name != '' ?$userInfo->first_name:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<?php 
				echo $this->Form->input('Users.last_name',[
						'class'=>'form-control',
						'placeholder'=>'Last Name',
						'value'=>$userInfo->last_name != '' ?$userInfo->last_name:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				
				<?php 
				echo $this->Form->input('Users.gender',[
						'class'=>'form-control',
						'type'=>'select',
						'options'=>['Male'=>'Male','Female'=>'Female','Other'=>'Other'],
						'value'=>$userInfo->gender != '' ?$userInfo->gender:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<?php 
				echo $this->Form->input('Users.email',[
						'class'=>'form-control',
						'placeholder'=>'email',
						'value'=>$userInfo->email != '' ?$userInfo->email:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				
				<?php 
				echo $this->Form->input('Users.phone',[
						'class'=>'form-control',
						'placeholder'=>'Phone',
						'value'=>$userInfo->phone != '' ?$userInfo->phone:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				
				<?php 
				echo $this->Form->input('Users.zone_id',[
						'class'=>'form-control',
						'type'=>'select',
						'options'=>$zonesData,
						'value'=>$userInfo->zone_id]);
				 ?>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
			<label  class="control-label" for="about_user">About User</label>
				<?php 
					echo $this->Form->textarea('Users.about_user',['rows' => '8', 'cols' => '15',
					'placeholder'=>'About User',
					'class'=>'form-control ',
					'value'=>$userInfo->about_user != '' ?$userInfo->about_user:'']);
				?>
				
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="image">Profile Image </label>
				<?php 
				echo $this->Form->file('Users.image',[
						'class'=>'form-control']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($userInfo->image != ''?$userInfo->image:'prof_photo.png'); ?>"/>
			</div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  >Cancel</button>
				<button id="adminUserEdit" type="submit" class="btn btn-success">Submit</button>
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

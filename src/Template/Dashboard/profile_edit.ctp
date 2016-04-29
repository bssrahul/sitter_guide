
<div class="review-head">
<div class="container">
  <h2>Edit Profile</h2><h3> <a href="">+Add Pet</a></h3>
  <!--<form role="form">-->
  <?php echo $this->Form->create(null, [
				'url' => ['controller' => 'guests', 'action' => 'profile-edit'],
				'role'=>'form',
				'id'=>'profileedit',
				'enctype'=>'multipart/form-data',
				 'autocomplete'=>'off',
				]);?>
  
    <div class="form-group">
     <?php
	  echo $this->Form->input('Users.first_name',[
						'class'=>'form-control',
						'placeholder'=>'First Name',
						'value'=>$userInfo->first_name != ''?$userInfo->first_name:'']);
				 ?>
    </div>
	<div class="form-group">
    <?php
	  echo $this->Form->input('Users.last_name',[
						'class'=>'form-control',
						'placeholder'=>'Last Name',
						'value'=>$userInfo->last_name != ''?$userInfo->last_name:'']);
				 ?>
	</div>
	<div class="form-group">
    <label for="gender">I Am</label>
    <?php  echo $this->Form->select(
					'Users.gender',
					['Male'=>'Male','Female'=>'Female','Other'=>'Other'],
					['empty' => 'Gender','class'=>'form-control']
				);?>
	</div>
    <div class="form-group">
      <?php
	  echo $this->Form->input('Users.email',[
						'class'=>'form-control',
						'placeholder'=>'Email',
						'value'=>$userInfo->email != ''?$userInfo->email:'']);
				 ?>
    </div>
	<div class="form-group">
      <?php
	  echo $this->Form->input('Users.phone',[
						'class'=>'form-control',
						'placeholder'=>'Phone',
						'value'=>$userInfo->phone != ''?$userInfo->phone:'']);
				 ?>
    </div>
    <div class="form-group">
      <?php
	  echo $this->Form->input('Users.birth_date',[
						'class'=>'form-control',
						'placeholder'=>'YYYY-MM-DD',
						'value'=>$userInfo->birth_date != ''?$userInfo->birth_date:'']);
				 ?>
    </div>
	<div class="form-group">
	<label for="about_user">About You</label>
	<?php echo $this->Form->textarea('Users.about_user',
		 [
		 'label'=>false,
		 'class'=>'form-control',
		 'value'=>$userInfo->about_user != ''?$userInfo->about_user:'']); ?>
	</div>
	<div class="form-group">
	<label for="zone_id">Time Zone</label>
      <?php
	  echo $this->Form->input('Users.zone_id',[
						'class'=>'form-control',
						'label'=>false,
						'type'=>'select',
						'options'=>$zonesData,
						'value'=>$userInfo->zone_id]);
				 ?>
    </div>
	<div class="form-group">
	<label for="image">Profile Pic</label>
			<?php 
				echo $this->Form->file('image',[
				  'class'=>'form-control']);
			?>
			<img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($userInfo->image != ''?$userInfo->image:'prof_photo.png'); ?>"/>
			
	</div>
    <button type="submitUserDetails" class="btn btn-success">Submit</button>
 <?php echo $this->form->end(); ?>
</div>
</div>

<script>
$(document).ready(function(){
   $('#submitUserDetails').click(function(){
      $('#profileedit').submit();
   });
});
</script>
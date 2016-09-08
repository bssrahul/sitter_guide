<div class="x_panel">
	
	<div class="x_title">
		<h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit Pet')); ?><small></small></h2>
		<div class="clearfix"></div>
	</div>
    <div class="x_content">
		<?= $this->element('adminElements/validations'); 
		
		   
		?>
		<?php echo $this->element('adminElements/error_msg');
			   //@$this->request->session()->write("error","");
		 ?>
		
		<!--Form edit user -->
			<?php echo $this->Form->create(null,[
				'url' => ['controller' => 'users', 'action' => 'edit-user-pet'],
				'class'=>'form-horizontal form-label-left input_mask',
				'id'=>'edituserpet',
				'style'=>'margin-top: 10px !important;float: left;',
				'enctype'=>'multipart/form-data',
				'novalidate'=>'novalidate',
				'autocomplete' =>'off',
			]);?>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="pet_name"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name')); ?></label>
				<?php 
                echo $this->Form->input('UserPets.id',[
						'type'=>'hidden',
						'value'=>$petInfo->id]);
					//echo $userId;	
				echo $this->Form->input('UserPets.user_id',[
						'type'=>'hidden',
						'value'=>$userId]);		
				?>
				<?php 
				 echo $this->Form->input('UserPets.pet_name',[
						'class'=>'form-control',
						'label'=>false,
						'value'=>$petInfo->pet_name != '' ?$petInfo->pet_name:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="pet_type"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Type')); ?></label>
				<?php 
				echo $this->Form->input('UserPets.pet_type',[
						'class'=>'form-control',
						'label'=>false,
						'type'=>'select',
						'options'=>['Small Dog','Medium Dog','Large Dog','Giant Dog','Puppies','Cat','Bird','Rabbits','Others'],
						'value'=>$petInfo->pet_type != '' ?$petInfo->pet_type:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="pet_breed"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Breed')); ?></label>
		    <?php echo $this->Form->input('UserPets.pet_breed',[
						'class'=>'form-control',
						'label'=>false,
						'type'=>'select',
						'options'=>['South Russion Ovcharka','Southern Honda','Spanish Mastiff','Spanish Water Dog','St. Bernard','Stabyhoun','Steinbracke'],
						'value'=>$petInfo->pet_breed != '' ?$petInfo->pet_breed:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
			<label class="control-label" for="gender"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Gender')); ?></label>
				<?php echo $this->Form->input('UserPets.gender',[
						'class'=>'form-control',
						'type'=>'select',
						
						'label'=>false,
						'options'=>['Male'=>'Male','Female'=>'Female','Other'=>'Other'],
						'value'=>$petInfo->gender != '' ?$petInfo->gender:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="years"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Age(Years)')); ?></label>
				<?php 
				if(!empty($petInfo->pet_age)){
				  $pet_age = explode(",",$petInfo->pet_age);
				}else{
				 $pet_age[0] = "";
				 $pet_age[1] = "";
				}
                
				//echo "<pre>";print_r($pet_age); 
				echo $this->Form->input('years',[
						'class'=>'form-control',
						'label'=>false,
						'value'=>$pet_age[0] != '' ?$pet_age[0]:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="months"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Age(Months)')); ?></label>
				<?php 
				echo $this->Form->input('months',[
						'class'=>'form-control',
						'label'=>false,
						'value'=>$pet_age[1] != '' ?$pet_age[1]:'']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="pet_type"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Weight')); ?></label>
				<?php echo $this->Form->input('UserPets.pet_weight',[
						'class'=>'form-control',
						'label'=>false,
						'value'=>$petInfo->pet_weight != '' ?$petInfo->pet_weight:'']);
				 ?>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
			<label  class="control-label" for="pet_description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?></label>
				<?php 
					echo $this->Form->textarea('UserPets.pet_description',['rows' => '8', 'cols' => '15',
					'class'=>'form-control ',
					'value'=>$petInfo->pet_description != '' ?$petInfo->pet_description:'']);
				?>
				
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<label class="control-label" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?></label>
				<?php 
				echo $this->Form->file('UserPets.pet_image',[
						'class'=>'form-control']);
				 ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/petImages/'.($petInfo->pet_image != ''?$petInfo->pet_image:'dummy.jpg'); ?>"/>
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
   $('#adminUserPetEdit').click(function(){
      $('#edituserpet').submit();
   });
});
</script>	

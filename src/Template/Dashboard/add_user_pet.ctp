
<div class="review-head">
<div class="container">
  <h2>Add a New Pet</h2>
  <!--<form role="form">-->
  <?php echo $this->Form->create(null, [
				'url' => ['controller' => 'guests', 'action' => 'add-user-pet'],
				'role'=>'form',
				'id'=>'adduserpet',
				'enctype'=>'multipart/form-data'
				]);?>
  
    <div class="form-group">
	<label for="pet_name">Name<span>*</span></label>
     <?php echo $this->Form->input('UserPets.pet_name',[
						'class'=>'form-control',
						'placeholder'=>'Name',
						'label'=>false]);
				 ?>
    </div>
	<div class="form-group">
	<label for="pet_name">Type of Pet<span>*</span></label>
    <?php
	  echo $this->Form->input('UserPets.pet_type',[
						'class'=>'form-control',
						'label'=>false,
						'type'=>'select',
						'options'=>['Small Dog','Medium Dog','Large Dog','Giant Dog','Puppies','Cat','Bird','Rabbits','Others']
						]);
				 ?>
	</div>
	<div class="form-group">
    <label for="pet_breed">Breeds<span>*</span></label>
     <?php echo $this->Form->input('UserPets.pet_breed',[
						'class'=>'form-control',
						'label'=>false,
						'type'=>'select',
						'options'=>['South Russion Ovcharka','Southern Honda','Spanish Mastiff','Spanish Water Dog','St. Bernard','Stabyhoun','Steinbracke']
						]);
				 ?>
	</div>
	<div class="form-group">
    <label for="gender">Gender</label>
    <?php  echo $this->Form->select(
					'UserPets.gender',
					['Male'=>'Male','Female'=>'Female'],
					['empty' => 'Gender','class'=>'form-control']
				);?>
	</div>
    <div class="form-group">
	<label for="pet_weight">Weight</label>
      <?php echo $this->Form->input('UserPets.pet_weight',[
						'class'=>'form-control',
						'label'=>false]);
				 ?>
    </div>
	<div class="form-group">
	<label for="years">Years</label>
      <?php echo $this->Form->input('years',[
						'class'=>'form-control',
						'label'=>false]);
	  ?>
    </div>
	<div class="form-group">
	<label for="months">Months</label>
      <?php echo $this->Form->input('months',[
						'class'=>'form-control',
						'label'=>false]);
	  ?>
    </div>
	<div class="form-group">
	<label for="pet_description">Description</label>
	<?php echo $this->Form->textarea('UserPets.pet_description',
		 [
		 'label'=>false,
		 'class'=>'form-control']); ?>
	</div>
	<div class="form-group">
	<label for="pet_image">Pet Image</label>
			<?php 
				echo $this->Form->file('pet_image',[
				  'class'=>'form-control',
				  'label'=>false]);
			?>
	</div>
    <button type="submitUserPet" class="btn btn-success">Submit</button>
 <?php echo $this->form->end(); ?>
</div>
</div>

<script>
$(document).ready(function(){
   $('#submitUserPet').click(function(){
      $('#adduserpet').submit();
   });
});
</script>
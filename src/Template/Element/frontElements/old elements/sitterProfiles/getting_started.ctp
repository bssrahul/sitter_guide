<div class="container">
	<?php echo $this->Form->create(null, [
		'url' => ['controller' => 'dashboard', 'action' => 'save-minder-details'],
		'role'=>'form',
		'id'=>'gettingStartedForm',
		'enctype'=>'multipart/form-data'
		]);?>
	<h2>Service You Offer*</h2>
	<div class="form-group">
	<label for="pet_hosting">Pet Hosting (In Your Home)</label>
	<?php
		echo $this->Form->checkbox('service[]', [
		'value' => 'pet_hosting',
		'id'=>'pet_hosting',
		'hiddenField' => false
		]);		
	?>
	<br><label for="night1">$/night</label>
	<?php echo $this->Form->input('service_price[]',[
		'class'=>'form-control',
		'label'=>false,
		'div'=>false,
		'type'=>'number',
		'id'=>'night1',
		'style'=>['display:none'],
		'hiddenField' => false,
		'disabled'=>'disabled'
		]);
		?>
	<label for="dog_walking">Dog Walking</label>
	<?php
	echo $this->Form->checkbox('service[]', [
			'value' => 'dog_walking',
			'id'=>'dog_walking',
			'hiddenField' => false,
			]);					
	?>
	<br><label for="session1">$/session</label>
	<?php echo $this->Form->input('service_price[]',[
		'class'=>'form-control',
		'label'=>false,
		'div'=>false,
		'type'=>'number',
		'id'=>'session1',
		'style'=>['display:none'],
		'hiddenField' => false,
		'disabled'=>'disabled'
		]);
	?>
	<label for="dog_grooming">Dog Grooming</label>
	<?php
    echo $this->Form->checkbox('service[]', [
		'value' => 'dog_grooming',
		'id'=>'dog_grooming',
		'hiddenField' => false,
		]);					
	?>

	<br><label for="session2">$/session</label>
	<?php echo $this->Form->input('service_price[]',[
		'class'=>'form-control',
		'label'=>false,
		'div'=>false,
		'type'=>'number',
		'id'=>'session2',
		'style'=>['display:none'],
		'disabled'=>'disabled'
		]);
	?>
	</div>
	<h2>Accepted pet Types*</h2>
	<div class="form-group">
	<?php
	$session = $this->request->session();
	$gettingStarted = $session->read('gettingStarted');
	$selectedServices = array();
	if($gettingStarted){
	foreach($gettingStarted['pet_type'] as $key=>$val){
	     $selectedServices[$val] = $val;
	 }
	}else{
	     $selectedServices = "";
	}
	$options = ["puppies"=>"puppies","giant"=>"giant","rabbits"=>"rabbits","cat"=>"Cat","bird"=>"bird","large_dog"=>"Large Dog"];
	$selected = $selectedServices;

	echo $this->Form->input('pet_type', 
		['multiple' => 'checkbox', 'options' => $options, 
		'value' => $selected,
		'hiddenField'=>false
		]);
	?>
	</div>
	<div class="form-group">
	<?php $session = $this->request->session();
	$gettingStarted = $session->read('gettingStarted');
	$selectedServices = array();
	if($gettingStarted){
	foreach($gettingStarted['day_name'] as $key=>$val){
	     $selectedDay[$val] = $val;
	}
	}else{
	    $selectedDay = "";
	}
	$options = ["sunday"=>"Sunday","monday"=>"Monday","tuesday"=>"Tuesday","wednesday"=>"Wednesday","thursday"=>"thursday","friday"=>"Friday","saturday"=>"Saturday"];
	$selected = $selectedDay;

	echo $this->Form->input('day_name', 
	['multiple' => 'checkbox', 'options' => $options, 
	'value' => $selected,
	'hiddenField'=>false
	]);?>

</div>
<input type="submit" class="btn btn-success" id="submitGetting" value="Continue"/>

<?php echo $this->form->end(); ?>
</div>



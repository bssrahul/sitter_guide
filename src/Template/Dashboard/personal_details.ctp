<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<ul class="nav nav-tabs">
				<li><a  href="<?php echo HTTP_ROOT."dashboard/sitter-account"; ?>"">Dashboard</a></li>
				<li class="active"><a data-toggle="tab" href="#about"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About')); ?></a></li>
				<li><a data-toggle="tab" href="#index"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Index')); ?></a></li>
				<li><a data-toggle="tab" href="#calendar"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Calendar')); ?></a></li>
			</ul>
			<div class="tab-content">
			
				<div id="dashboard" class="tab-pane fade">
				  
				</div><!-- @vik Overview tab  -->	
				
				<div id="about" class="tab-pane fade in active">
				     <div class="col-md-3 col-sm-3 col-xs-3">
					     <img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($userInfo->image != ''?$userInfo->image:'prof_photo.png'); ?>"/>
						<ul class="list-group">
							   <li class="list-group-item"><a href="<?php echo HTTP_ROOT.'dashboard/personal-details'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Personal Details')); ?></a></li>
							  <li class="list-group-item"><a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Service and Rates')); ?></a></li>
							  <li class="list-group-item"><a href="<?php echo HTTP_ROOT.'dashboard/basic-profile'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Basic Profile')); ?></a></li>
							  <li class="list-group-item"><a href="<?php echo HTTP_ROOT.'dashboard/extended-profile'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Profile')); ?></a></li>
							  <li class="list-group-item"><a href=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Photos')); ?></a></li>
							  <li class="list-group-item"><a href=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Settings')); ?></a></li>
						</ul>
					 </div>
					 <div class="col-md-8 col-sm-8 col-xs-8">    <h2><?php echo $userInfo->  first_name." ".$userInfo->last_name ?>    </h2>
					    <div><?php echo "Contact Email:".$userInfo->email; ?></div>
						<div><?php echo "Contact Mobile:".$userInfo->phone; ?></div>
					 </div><br>
					 <div class="col-md-8 col-sm-8 col-xs-8">
					  
						  <h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Information')); ?></h4>
						  <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your contact details are not visible to the public. They are shared once a pet minder accepts the booking. It is used for system notifications and emergency situations')); ?> </p>
						   <?php echo $this->Form->create(null, [
									'url' => ['controller' => 'dashboard', 'action' => 'personal-details'],
									'role'=>'form',
									'id'=>'personalForm',
									'enctype'=>'multipart/form-data',
									 'autocomplete'=>'off',
									]);?>
						  <div class="form-group">
					      <label for="phone">
						  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Mobile')); ?>*</label>
					<?php echo $this->Form->input(   'Users[phone]',[
						      'class'=>'form-control',
							  'label'=>false,
							  'id'=>'phone',
							  'value'=>$userInfo->phone
	                           ]);
								?>
						  </div>
						  <div class="form-group">
								<label for="email">
									  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?> *</label>
								  <?php
								  echo $this->Form->input('Users[email]',[
								  'class'=>'form-control',
								  'label'=>false,
								  'value'=>$userInfo->email
								 ]);
											 ?>
						  </div>
						  <h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Neighbourhood')); ?></h4>
						  <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your address details are not visible to the public. It is used so pet owners can find pet minders or so that pet minders know how far they need to travel before accepting a booking')); ?></p>
						  <div class="form-group">
								<label for="address">
									  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Street Address')); ?> *</label>
								  <?php
								  echo $this->Form->input('Users[address]',[
								  'class'=>'form-control',
								  'label'=>false,
								  'value'=>$userInfo->address
								 ]);
											 ?>
						  </div>
						  <div class="form-group">
								<label for="city">
									    <?php echo $this->requestAction('app/get-translate/'.base64_encode('Suburb')); ?>*</label>
								  <?php
								  echo $this->Form->input('Users[city]',[
								  'class'=>'form-control',
								  'label'=>false,
								  'value'=>$userInfo->city
								 ]);
											 ?>
						  </div>
						  <div class="form-group">
								<label for="zip">
									     <?php echo $this->requestAction('app/get-translate/'.base64_encode('Postcode')); ?> *</label>
								  <?php
								  echo $this->Form->input('Users[zip]',[
								  'class'=>'form-control',
								  'label'=>false,
								  'value'=>$userInfo->zip
								 ]);
											 ?>
						  </div>
						  <div class="form-group">
								<label for="state">
									  <?php echo $this->requestAction('app/get-translate/'.base64_encode('State')); ?> *</label>
								  <?php
								  echo $this->Form->input('Users[state]',[
								  'class'=>'form-control',
								  'label'=>false,
								  'value'=>$userInfo->state
								 ]);
											 ?>
						  </div>
						  <h4> <?php echo $this->requestAction('app/get-translate/'.base64_encode('More')); ?></h4>
						  <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('These details are not visible to the public. It is used so we can understand our users better and make sure we build a product that meets your needs')); ?>.</p>
						  <div class="form-group">
								<label for="about_user">
									   <?php echo $this->requestAction('app/get-translate/'.base64_encode('About You')); ?>*</label>
								  <?php
								  echo $this->Form->input('Users[about_user]',[
								  'class'=>'form-control',
								  'type'=>'textarea',
								  'label'=>false,
								  'value'=>$userInfo->about_user
								 ]);
											 ?>
						  </div>
						  <div class="form-group">
								<label for="address">
									    <?php echo $this->requestAction('app/get-translate/'.base64_encode('oko Birth Date')); ?>*</label>
								  <?php
								  echo $this->Form->input('Users[birth_date]',[
								  'class'=>'form-control',
								  'label'=>false,
								  'value'=>$userInfo->birth_date
								 ]);
											 ?>
						  </div>
						  <div class="form-group">
								<label for="gender">
							<?php echo $this->requestAction('app/get-translate/'.base64_encode('Gender')); ?> *</label>
								  <?php
								  
								  echo $this->Form->input('Users[gender]',[
								  'class'=>'form-control',
								  'label'=>false,
								  'type'=>'select',
								  'options'=>[''=>'Select your gender','Male'=>'Male','Female'=>'Female'],
								  'value'=>$userInfo->gender
								 ]);
											 ?>
						  </div>
						  <input type="submit" class="btn btn-success" id="submitPersonal" value="Save"/>
						  <?php echo $this->form->end(); ?>
					  
					 </div>
				</div><!-- @vik Executive Summary tab  -->	
				<div id="index" class="tab-pane fade">
				   <?php echo $this->requestAction('app/get-translate/'.base64_encode('index')); ?>
				</div><!-- @vik Funding Materials tab  -->
               			
				<div id="calendar" class="tab-pane fade">
				      <?php echo $this->requestAction('app/get-translate/'.base64_encode('calendar')); ?>
				</div>
				      
				</div><!-- @vik Funding Materials tab  -->	
				
			</div><!-- @vik tab content --> 	
			
		</div>
	</div>
<style>
ul.nav-tabs li{
    color: #efefef;
    border: 1px solid #ddd;
}
ul.nav-tabs li > a {
    color: #000 !important;
}
</style>

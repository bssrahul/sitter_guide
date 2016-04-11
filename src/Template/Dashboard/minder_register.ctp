<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#gettingStarted">Getting Started</a></li>
				<li><a data-toggle="tab" href="#baseProfile">Base Profile</a></li>
				<li><a data-toggle="tab" href="#extendedProfile">Extended Profile</a></li>
				<li><a data-toggle="tab" href="#personal">Personal</a></li>
			</ul>
			<div class="tab-content">
			
				<div id="gettingStarted" class="tab-pane fade in active">
					<?php echo $this->element("frontElements/sitterProfiles/getting_started"); ?>
				</div><!-- @vik Overview tab  -->	
				<?php $session = $this->request->session();
				$gettingStarted = $session->read('gettingStarted'); 
				
				if($gettingStarted){
				?>
				<div id="baseProfile" class="tab-pane fade">
				      <?php echo $this->element("frontElements/sitterProfiles/basic_profile"); ?>  
				</div><!-- @vik Executive Summary tab  -->	
				<?php } 
				 $basicProfile = $session->read('basicProfile');
				 
				if($basicProfile){
				?>
				<div id="extendedProfile" class="tab-pane fade">
				    <?php echo $this->element("frontElements/sitterProfiles/extended_profile"); ?> 
				</div><!-- @vik Funding Materials tab  -->
                <?php } 
				$extendedProfile = $session->read('extendedProfile');
				if($extendedProfile){
				?>				
				<div id="personal" class="tab-pane fade">
				<?php echo $this->Form->create(null, [
									'url' => ['controller' => 'dashboard', 'action' => 'save-minder-details'],
									'role'=>'form',
									'id'=>'personalForm',
									'enctype'=>'multipart/form-data'
									]);?>
				  <h1>Personal Details</h1>
				<?php 	  
				 $personal = $session->read('personal');
			    ?>
				  <div class="form-group">
						<label for="address">
                       What is your street address? *</label>
						  <?php
					
						  
						  echo $this->Form->input('Users[address]',[
											'class'=>'form-control',
											'label'=>false,
											'id'=>'address'
											/*,
										'options'=>$zonesData,
											'value'=>$userInfo->zone_id*/]);
									 ?>
				  </div>
				  <div class="form-group">
						<label for="city">
                               Suburb *</label>
						  <?php
						  echo $this->Form->input('Users[city]',[
											'class'=>'form-control',
											'label'=>false
											/*,
											'options'=>$zonesData,
											'value'=>$userInfo->zone_id*/]);
									 ?>
				  </div>
				  <div class="form-group">
						<label for="city">
                               State*</label>
						  <?php
						  echo $this->Form->input('Users[state]',[
											'class'=>'form-control',
											'label'=>false
											/*,
											'options'=>$zonesData,
											'value'=>$userInfo->zone_id*/]);
									 ?>
				  </div>
				  <div class="form-group">
						<label for="zip">
                               Postcode*</label>
						  <?php
						  echo $this->Form->input('Users[zip]',[
											'class'=>'form-control',
											'label'=>false
											/*,
											'options'=>$zonesData,
											'value'=>$userInfo->zone_id*/]);
									 ?>
				  </div>
				  <div class="form-group">
						<label for="zip">
                               Phone*</label>
						  <?php
						  echo $this->Form->input('Users[phone]',[
											'class'=>'form-control',
											'label'=>false
											/*,
											'options'=>$zonesData,
											'value'=>$userInfo->zone_id*/]);
									 ?>
				  </div>
				       <!--<a data-toggle="tab" href="#personal"><button  class="btn btn-success">Continue</button></a> -->
					   <input type="submit" class="btn btn-success" id="submitPersonal" value="Continue"/>
					   
				       <a data-toggle="tab" href="#extendedProfile"><button  class="btn btn-success">Back</button></a>
					<?php 
					echo $this->form->end();
					//echo 'Personal';//include('inc_fund_mat.ctp'); ?>
				</div><!-- @vik Funding Materials tab  -->	
				<?php } ?>
			</div><!-- @vik tab content --> 	
			
		</div>
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
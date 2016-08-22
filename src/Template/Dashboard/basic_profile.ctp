<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<ul class="nav nav-tabs">
				<li><a  href="<?php echo HTTP_ROOT."dashboard/sitter-account"; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Dashboard')); ?></a></li>
				<li><a href="<?php echo HTTP_ROOT."dashboard/personal-details"; ?>">About</a></li>
				<li class="active"><a href="<?php echo HTTP_ROOT."dashboard/services-and-rates"; ?>">Index</a></li>
				
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
					 <div class="col-md-8 col-sm-8 col-xs-8">    <h2><?php echo $userInfo->first_name." ".$userInfo->last_name ?>    </h2>
					    <div><?php echo "Contact Email:".$userInfo->email; ?></div>
						<div><?php echo "Contact Mobile:".$userInfo->phone; ?></div>
					 </div><br>
					 <div class="col-md-8 col-sm-8 col-xs-8">
					    <?php echo $this->Form->create(null, [
									'url' => ['controller' => 'dashboard', 'action' => 'basic-profile'],
									'role'=>'form',
									'id'=>'personalForm',
									'enctype'=>'multipart/form-data',
									 'autocomplete'=>'off',
									]);?>
			        <h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Headline')); ?></h4>					
			        <label for="pet_type"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Give your profile an awesome title. First impression counts, and this is the first thing people read when they visit your profile')); ?>. </label>
					<div class="form-group">
								 <?php echo $this->Form->input('Users.awesome_title', 
								   [
									'label'=>false,
									'value' => $userInfo->awesome_title,
									]);?>
					</div>
					<h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your Story')); ?></h4>					
			        <label for="pet_type"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Try to convince people that you are the best pet minder for the job. Talk about things like, what makes you different and why you love animals')); ?>.  </label>
					<div class="form-group">
								 <?php echo $this->Form->input('Users.your_story', 
								   [
									'label'=>false,
									'value' => $userInfo->your_story,
									]);?>
					</div>
					<h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cover Photo')); ?></h4>					
			        <label for="pet_type"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Your profile image allows people to recognise you, but your cover photo allows people to remember you.Upload a cover photo to show something that represents what is important to you')); ?>.</label>
					<div class="form-group">
								 <?php echo $this->Form->input('Users.image', 
								   [
								     'type'=>'file',
									'label'=>false,
									'value' => $userInfo->your_story,
									]);?>
					</div>
					 <img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($userInfo->image != ''?$userInfo->image:'prof_photo.png'); ?>"/>
								
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

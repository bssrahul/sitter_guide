<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#dashboard"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Dashboard')); ?></a></li>
				<li ><a  href="<?php echo HTTP_ROOT."dashboard/personal-details"; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About')); ?></a></li>
				<li><a data-toggle="tab" href="#index"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Index')); ?></a></li>
				<li><a data-toggle="tab" href="#calendar"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Calendar')); ?></a></li>
			</ul>
			<div class="tab-content">
			
				<div id="dashboard" class="tab-pane fade in active">
				  <div class="row">
		<?php $session = $this->request->session();
 		           $userimage = $session->read('User.image');
                   $username = $session->read('User.name');
				   ?>
				     <div class="col-md-3 col-sm-3 col-xs-3">   
					     <img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($userimage != ''?$userimage:'prof_photo.png'); ?>"/>
						 <h2><?php echo $username != ""?$username:""; ?> </h2>
					 </div>
					 <div class="col-md-8 col-sm-8 col-xs-8"> 
                   <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode("Thank you! Your profile's been submitted for approval")); ?>.</h3>

                     <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('We are now reviewing your profile and will get back to you by email shortly')); ?>	</p>				 
					 </div>
				  </div>
				</div><!-- @vik Overview tab  -->	
				
				<div id="about" class="tab-pane fade">
				     
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

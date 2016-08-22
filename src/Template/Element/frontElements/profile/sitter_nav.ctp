  <?php 
     $action = $this->request->params['action']; 
    //For show active tab
     if($action == 'house'){
          $activeHou = 'active'; 
     }elseif($action == 'aboutSitter'){
             $activeSitt = 'active'; 
     }elseif($action == 'professionalAccreditations'){
           $activeProa = 'active'; 
    
     }elseif($action == 'aboutGuest'){
           $activeAboutGuest = 'active'; 
    
     }elseif($action == 'servicesAndRates'){
         $activeServ = 'active';
    
     }else{
          $active = 'active';
     }
     $session = $this->request->session();
     $profile = $session->read('profile');
     $dog_in_home_status = $session->read('dog_in_home_status');

     ?>
	 <ul class="nav nav-pills <?php echo ($dog_in_home_status == "yes") && ($profile == "Sitter")?"six-tab":""; echo ($profile != "Sitter")?"three-tab":"";   ?>">
     <?php
   if($profile == 'Sitter'){ ?>
   
	   <li class="<?php echo @$active; ?> gen"><a href="<?php echo HTTP_ROOT."dashboard/profile"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic1.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('General')); ?></a></li>
      <li class="<?php echo @$activeHou; ?> hou"><a  href="<?php echo HTTP_ROOT."dashboard/house"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic2.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter House')); ?></a></li>
      <?php if($dog_in_home_status == 'yes'){ ?>
		 <li class="<?php echo @$activeAboutGuest; ?> mid"><a  href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Pet')); ?></a></li>
    <?php } ?>
	  <li class="<?php echo @$activeSitt; ?> sitt"><a  href="<?php echo HTTP_ROOT."dashboard/about-sitter"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Sitter')); ?></a></li>
      <li class="<?php echo @$activeProa; ?> proa"><a  href="<?php echo HTTP_ROOT."dashboard/professional-accreditations"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic4.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Skills & Accreditations')); ?></a></li>
      <li class="<?php echo @$activeServ; ?> serv"><a  href="<?php echo HTTP_ROOT."dashboard/services-and-rates"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic5.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Services & Rates')); ?></a></li>
   <?php }
   
   else{ ?>
	   <li class="<?php echo @$active; ?> gen"><a href="<?php echo HTTP_ROOT."dashboard/profile"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic1.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('General')); ?></a></li>
      <li class="<?php echo @$activeHou; ?> hou"><a  href="<?php echo HTTP_ROOT."dashboard/house"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic2.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Guest House')); ?></a></li>
      <li class="<?php echo @$activeAboutGuest; ?> mid"><a  href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Guest')); ?></a></li>
   <?php }
    
    ?>
      
</ul>

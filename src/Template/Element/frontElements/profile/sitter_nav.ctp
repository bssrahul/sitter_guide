 
 
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
	 <ul class="nav nav-pills <?php echo $dog_in_home_status == "yes"?"six-tab":"" ?>">
     <?php
   if($profile == 'Sitter'){ ?>
   
	   <li class="<?php echo @$active; ?> gen"><a href="<?php echo HTTP_ROOT."dashboard/profile"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic1.png">General</a></li>
      <li class="<?php echo @$activeHou; ?> hou"><a  href="<?php echo HTTP_ROOT."dashboard/house"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic2.png">Sitter House</a></li>
      <?php if($dog_in_home_status == 'yes'){ ?>
		 <li class="<?php echo @$activeAboutGuest; ?> mid"><a  href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png">About Pet</a></li>
    <?php } ?>
	  <li class="<?php echo @$activeSitt; ?> sitt"><a  href="<?php echo HTTP_ROOT."dashboard/about-sitter"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png">About Sitter</a></li>
      <li class="<?php echo @$activeProa; ?> proa"><a  href="<?php echo HTTP_ROOT."dashboard/professional-accreditations"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic4.png">Skills & Accreditations</a></li>
      <li class="<?php echo @$activeServ; ?> serv"><a  href="<?php echo HTTP_ROOT."dashboard/services-and-rates"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic5.png">Services & Rates</a></li>
   <?php }
   
   else{ ?>
	   <li class="<?php echo @$active; ?> gen"><a href="<?php echo HTTP_ROOT."dashboard/profile"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic1.png">General</a></li>
      <li class="<?php echo @$activeHou; ?> hou"><a  href="<?php echo HTTP_ROOT."dashboard/house"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic2.png">Guest House</a></li>
      <li class="<?php echo @$activeAboutGuest; ?> mid"><a  href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png">About Guest</a></li>
   <?php }
    
    ?>
      
</ul>

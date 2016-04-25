 
 <ul class="nav nav-pills">
    <?php $action = $this->request->params['action']; 
   // print_r($action);
     if($action == 'sitterHouse'){
          $activeHou = 'active'; 
     }elseif($action == 'aboutSitter'){
             $activeSitt = 'active'; 
     }elseif($action == 'professionalAccreditations'){
           $activeProa = 'active'; 
    
     }elseif($action == 'servicesAndRates'){
         $activeServ = 'active';
    
     }else{
          $active = 'active';
     }
    ?>
      <li class="<?php echo @$active; ?> gen"><a href="<?php echo HTTP_ROOT."dashboard/profile"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic1.png">General</a></li>
      <li class="<?php echo @$activeHou; ?> hou"><a  href="<?php echo HTTP_ROOT."dashboard/sitter-house"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic2.png">Sitter House</a></li>
      <li class="<?php echo @$activeSitt; ?> sitt"><a  href="<?php echo HTTP_ROOT."dashboard/about-sitter"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic3.png">About Sitter</a></li>
      <li class="<?php echo @$activeProa; ?> proa"><a  href="<?php echo HTTP_ROOT."dashboard/professional-accreditations"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic4.png">Skills & Accreditations</a></li>
      <li class="<?php echo @$activeServ; ?> serv"><a  href="<?php echo HTTP_ROOT."dashboard/services-and-rates"; ?>"><img src="<?php echo HTTP_ROOT; ?>img/ic5.png">Services & Rates</a></li>
</ul>
<!--Start mob country-->               
	 <?php 
		$cont = $this->request->params['controller'];
		$act = $this->request->params['action'];
	  ?>
	   <div class="mob-country-drop">
		  <ul>
			<li class="dd-country last-drop"><a href="#"  data-toggle="dropdown"> <img src="<?php echo HTTP_ROOT; ?>img/flag-icon.png" alt=""> </a>
			 <div class="dropdown-menu country-drop">
					   <!-- <ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Country')); ?> </a></li>
						  <li><a data-toggle="tab" href="#menu1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Currency')); ?></a></li>
						</ul>-->
						<div class="tab-content">
						  <!--<div id="home" class="tab-pane fade in active">
							  <ul class="c-list"> 
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('FRENCH')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('GERMAN')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('HUNGARIAN')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('ITALIAN')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('ROMANIAN')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('SPANISH')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('ENGLISH')); ?></a></li>  
							  </ul>
						  </div>  -->
						  
						  <div id="menu1" class="tab-pane fade fade in active">
							<ul class="c-list"> 
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('EUR')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('EUR')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('HUF')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('EURO')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('RON')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('EUR')); ?></a></li>
								<li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('USD')); ?></a></li>  
							  </ul>
						  </div>                                          
						</div>
						</div>
		   </li>
		</ul>
	  </div>
	<!--end -->
	




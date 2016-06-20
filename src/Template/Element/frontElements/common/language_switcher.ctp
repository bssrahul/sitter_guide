  <div class="dropdown-menu country-drop">
			<?php 
			if(isset($this->request->params['pass'][0]) && !empty($this->request->params['pass'][0]))
			{
				  $prms = $this->request->params['pass'][0];
			}else{
				$prms = "";	
			}
			   $cont = $this->request->params['controller'];
			   $act = $this->request->params['action'];
			?>
           
          <ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#country"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Country')); ?> </a></li>

			<li><a data-toggle="tab" href="#currency"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Currency')); ?></a></li>
          </ul>                                        
		  <div class="tab-content">
			 <div id="country" class="tab-pane fade in active">
				  <ul class="c-list"> 
					  <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt="">FRENCH</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt="">GERMAN</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt="">HUNGARIAN</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt="">ITALIAN</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt="">ROMANIAN</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">SPANISH</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">ENGLISH</a></li>  
				  </ul>
			</div>
			<div id="currency" class="tab-pane fade">
				  <ul class="c-list"> 
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/fr_FR/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt="">EUR</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/de_DE/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt="">EUR</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/hu_HU/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt="">HUF</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/it_IT/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt="">EURO</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/ro_RO/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt="">RON</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/sn_SN/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">EUR</a></li>
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/en_EN/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">USD</a></li>  
					  <li><a href="<?php echo HTTP_ROOT.'app/setCurrency/en_AU/'.$cont.'/'.$act.'/'.$prms;?>"><img src="<?php echo HTTP_ROOT.'img/flags/au.png';?>"  alt="">AUD</a></li>  
				  </ul>
			</div>                                          
		  </div>

	</div>

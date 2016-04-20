<header>
<div class="head-wrap">
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">         
      <!--Logo Area-->
          <div class="logo-area">
                          <div class="desk-logo">
                              <a href="<?php echo HTTP_ROOT; ?>" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"><img src="<?php echo HTTP_ROOT; ?>img/logo.jpg"  alt="<?php echo __('Sitter Guide'); ?>"></a>
                            </div>
                          <div class="mob-logo">
                              <a class="logo" href="<?php echo HTTP_ROOT; ?>" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide'));?>"><img src="<?php echo HTTP_ROOT; ?>img/create_logo.png"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
                            </div>                                
                        </div>                        
         <!--Logo End--> 
             <div class="top-search">
                          <div class="search-box">
                              <input class="search-input" type="text" value="" placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Search Home Sitter')); ?>" />
                            </div>
                        </div> 
        </div>
      <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
          <div class="topnav-area"> 
                        <nav class="navbar"> 
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                              </button>                              
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                              <ul class="nav navbar-nav">
                                <li class="active"><a href="#"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Get Free Sitting or Minding')); ?></a></li>                                
                                <li  class="dropdown"><a  id="droplog3" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile')); ?></a>
                                  <div class="dropdown-menu currency-drop drop-profile" id="dropcont3">                                       
									<ul class="c-list c-list-2">  
										<li>
											<a href="<?php echo HTTP_ROOT.'dashboard/home' ?>"><i class="fa fa-dashboard"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dashboard')); ?>
										</li>
										
										<li><a href="#"><i class="fa fa-question-circle"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Tracker')); ?></a></li>
										
										<li><a href="#"><i class="fa fa-envelope"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Inbox')); ?></a></li>
										<li><a href="#"><i class="fa fa-book"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking')); ?></a></li>
										<li><a href="#"><i class="fa fa-calendar"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Calender')); ?></a></li>
										<li><a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"><i class="fa fa-user"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile')); ?></a></li>
										<li><a href="<?php echo HTTP_ROOT ;?>guests/logout"><i class="fa fa-power-off"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Logout')); ?></a></li>
                                    
                                    </ul>
                                  </div>
                                </li>
                                <li ><a href="#" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Message')); ?>  <span class="badge">10</span></a>
                                    
                                
                                </li>
                                 <li><a href="#"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Help')); ?> </a></li>
                                  
                                 <li class="dd-country last-drop"><a href="#"  data-toggle="dropdown"> <img src="<?php echo HTTP_ROOT.'img/flags/'.$currentLocal.'.png' ;?>" alt=""> </a>
                                <div class="dropdown-menu country-drop">
                                            <?php 
                                                $cont = $this->request->params['controller'];
                                                $act = $this->request->params['action'];
                                            ?>
                                          <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Country')); ?> </a></li>
                                            <li><a data-toggle="tab" href="#menu1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Currency')); ?></a></li>
                                          </ul>                                        
                                          <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                  <ul class="c-list"> 
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt="">FRENCH</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt="">GERMAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt="">HUNGARIAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt="">ITALIAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt="">ROMANIAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ru/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ru.png';?>"  alt="">RUSSIAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">SPANISH</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">ENGLISH</a></li>  
                                                  </ul>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                                  <ul class="c-list"> 
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt="">FRENCH1</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt="">GERMAN2</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt="">HUNGARIAN3</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt="">ITALIAN4</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt="">ROMANIAN5</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ru/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ru.png';?>"  alt="">RUSSIAN6</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">SPANISH7</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">ENGLISH8</a></li>  
                                                  </ul>
                                            </div>                                          
                                          </div>
                                    </div>
                                 </li>
                              </ul> 
                                                                                                  
                            </div> 
                      </nav>
                      </div>        
        </div>        
    </div>
</div>
                  
</div>
</header>

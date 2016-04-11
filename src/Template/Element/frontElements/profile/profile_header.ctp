<header>
<div class="head-wrap">
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">         
      <!--Logo Area-->
          <div class="logo-area">
                          <div class="desk-logo">
                              <a href="<?php echo HTTP_ROOT; ?>" title="<?php echo __('Sitter Guide'); ?>"><img src="<?php echo HTTP_ROOT; ?>img/logo.jpg"  alt="<?php echo __('Sitter Guide'); ?>"></a>
                            </div>
                          <div class="mob-logo">
                              <a class="logo" href="<?php echo HTTP_ROOT; ?>" title="<?php echo __('Sitter Guide');?>"><img src="<?php echo HTTP_ROOT; ?>img/create_logo.png"  alt="<?php echo __('Sitter Guide'); ?>"></a>
                            </div>                                
                        </div>                        
         <!--Logo End--> 
             <div class="top-search">
                          <div class="search-box">
                              <input class="search-input" type="text" value="" placeholder="<?php echo __('Search Home Sitter'); ?>" />
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
                                <li class="active"><a href="#"> <?php echo __('Get Free Sitting or Minding'); ?></a></li>                                
                                <li  class="dropdown"><a  id="droplog3" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Profile'); ?></a>
                                  <div class="dropdown-menu currency-drop drop-profile" id="dropcont3">                                       
                                        <ul class="c-list c-list-2">  
                                    <li><a href="<?php echo HTTP_ROOT.'dashboard/home' ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                    <li><a href="#"><i class="fa fa-question-circle"></i> <?php echo __('Tracker'); ?></a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> <?php echo __('Inbox'); ?></a></li>
                                    <li><a href="#"><i class="fa fa-book"></i><?php echo __('Booking'); ?></a></li>
                                    <li><a href="#"><i class="fa fa-calendar"></i> <?php echo __('Calender'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"><i class="fa fa-user"></i> <?php echo __('Profile'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT ;?>guests/logout"><i class="fa fa-power-off"></i> <?php echo __('Logout'); ?></a></li>
                                    
                                    </ul>
                                  </div>
                                </li>
                                <li ><a href="#" ><?php echo __('Message'); ?>  <span class="badge">10</span></a>
                                    
                                
                                </li>
                                 <li><a href="#"> <?php echo __('Help'); ?> </a></li>
                                  <!--<li  class="dropdown">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo HTTP_ROOT.'img/flags/'.$currentLocal.'.png' ;?>" alt=""> </a>

                                    <?php 
                                       $cont = $this->request->params['controller'];
                                       $act = $this->request->params['action'];
                                    ?>
                                  <div class="dropdown-menu currency-drop" id="dropcont2">
                                      <div class="cd-box">
                                            <ul>  
                                                  <li class="current"><a href="#"><?php echo ('Currency'); ?></a></li>
                                                  <li><a href="#"><?php echo __('Country'); ?></a></li>                                                
                                               </ul>                                          
                                        </div>
                                        <ul class="c-list"> 
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt=""><?php echo __('FRENCH'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt=""><?php echo __('GERMAN'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt=""><?php echo __('HUNGARIAN'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt=""><?php echo __('ITALIAN'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt=""><?php echo __('ROMANIAN'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ru/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ru.png';?>"  alt=""><?php echo __('RUSSIAN'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt=""><?php echo __('SPANISH'); ?></a></li>
                                    <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt=""><?php echo __('ENGLISH'); ?></a></li>  
                                    </ul>
                                  </div>                                  
                                 </li>-->
                                 <li class="dd-country last-drop"><a href="#"  data-toggle="dropdown"> <img src="<?php echo HTTP_ROOT.'img/flags/'.$currentLocal.'.png' ;?>" alt=""> </a>
                                <div class="dropdown-menu country-drop">
                                            <?php 
                                                $cont = $this->request->params['controller'];
                                                $act = $this->request->params['action'];
                                            ?>
                                          <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">Currency </a></li>
                                            <li><a data-toggle="tab" href="#menu1">Currency</a></li>
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

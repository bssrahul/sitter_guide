<!--[Header Area Start]-->
<header>
  <?php if($currentLocal == 'ru'){?>
     <div class="rus-wrap"> 
     <?php } ?> 
<div class="head-wrap">
  <div class="container-fluid">
  <div class="row">
      <div class="col-lg-<?php echo $currentLocal == 'ru'?'4':'5'; ?> col-md-<?php echo $currentLocal == 'ru'?'3':'4'; ?> col-sm-12 col-xs-12">               
          <div class="logo-area">
                          <div class="desk-logo">
                              <a href="<?php echo HTTP_ROOT; ?>" title="Sitter Guide"><img src="<?php echo HTTP_ROOT ?>img/logo.jpg"  alt="Sitter Guide"></a>
                            </div>
                          <div class="mob-logo">
                              <a class="logo" href="#" title="Sitter Guide"><img src="img/create_logo.png"  alt="Sitter Guide"></a>
                            </div>                                
                        </div>   
                        <div class="top-search">
                          <div class="search-box">
                              <input class="search-input" type="text" value="" placeholder="<?php echo __('Search home sitter for your loving dog') ?>" />
                            </div>
                        </div> 
        </div>
      <div class="col-lg-<?php echo $currentLocal == 'ru'?'8':'7'; ?> col-md-<?php echo $currentLocal == 'ru'?'9':'8'; ?> col-sm-12 col-xs-12">
         <div class="topnav-area"> 
                        <nav class="navbar"> 
                            <div class="navbar-header">
                               <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed"> MENU </button>
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                              </button>                              
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                              <ul class="nav navbar-nav nav-logout">
                                <li class="active"><a href="#"> <?php echo __('Get Free Sitting or Minding'); ?></a></li>
                                <li class="select"> <a  href="#"><?php echo __('Become a sitter'); ?></a></li>

                                <li><a href="<?php echo HTTP_ROOT.'guests/signup'; ?>"><?php echo __('Sign Up'); ?></a></li>

                                <li  class="dropdown hideLogin">
                                   <a id="droplog" href="#" data-toggle="dropdown"> <?php echo __('Login'); ?></a>
                                   <div class="dropdown-menu login-drop" id="dropcont">
                                    <div class="form-group">
                                           <?php echo $this->Form->create(null,[
                                                'url' => ['controller' => 'guests', 'action' => 'login'],
                                                'role'=>'form',
                                                'id'=>'loginUser'
                                            ]);
                                            echo $this->Form->input('Users.email',[                
                                                   'class'=>'form-control'
                                            ]);
                                             echo $this->Form->input('Users.password',[                
                                                   'class'=>'form-control',
                                                   'type'=>'password'
                                            ]);
                                        ?>
                                        <input type="submit" id="log_in_btn" class="btn btn-success" value="<?php echo __('Submit'); ?>">
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="signup-or-separator"> <p class="successMessage clr"></p><p class="errorMessage clr"></p>
                                            </div>
                                          </div>
                                        </div>
                                        <?php echo $this->Form->end(); ?>

                                            <p class="forget">
                                           
                                                <a id="droplogForgot" href="<?php echo HTTP_ROOT.'guests/forgot-password'; ?>" >
                                                 <?php echo __('Forgot your Password?'); ?> </a>
                                              <br>
                                           <?php echo __('Not a member?'); ?>
                                           <a href="<?php echo HTTP_ROOT.'guests/signup'; ?>" title="Sign up Now"><?php echo __('Sign up Now'); ?></a></p>
                                    </div>
                                          <!-- <p>- or -</p>-->
                                           <?php
                                          /* $fb = new \Facebook\Facebook([
											'app_id' => FACEBOOK_APP_ID, // Replace {app-id} with your app id
											'app_secret' => FACEBOOK_SECRET,
											'default_graph_version' => 'v2.2',
											]);

											$helper = $fb->getRedirectLoginHelper();

											$permissions = ['email']; // Optional permissions
											$loginUrl = $helper->getLoginUrl(HTTP_ROOT.'guests/signup-with-facebook', $permissions);
										

											echo '<a title="Login With Faceook" class="lwfb" href="' . htmlspecialchars($loginUrl) . '"><i class="fa fa-facebook-square"></i>'.__("Login with Facebook").'</a>';*/
                                            ?> 
                                          <!--<a href="#" title="Login With Faceook" class="lwfb"><i class="fa fa-facebook-square"></i> <?php echo __('Sign In with Facebook'); ?></a> -->

                                   </div> 
                                   <?php //echo $this->element('frontElements/guests/forgot_password'); ?>
                                </li>
                                 
                                <li><a href="#"> <?php echo __('Help'); ?> </a></li>

                                 <!--<li  class="dropdown dd-country">
                                  <a id="droplog2" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo HTTP_ROOT.'img/flags/'.$currentLocal.'.png' ;?>" alt=""> </a>
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
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">SPANISH</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">ENGLISH</a></li>  
                                                  </ul>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                                  <ul class="c-list"> 
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/fr.png'?>"  alt="">FRENCH</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/de.png'; ?>"  alt="">GERMAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/hu.png'; ?>"  alt="">HUNGARIAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/it.png';?>"  alt="">ITALIAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/ro.png';?>"  alt="">ROMANIAN</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/es.png';?>"  alt="">SPANISH</a></li>
                                                      <li><a href="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>"><img src="<?php echo HTTP_ROOT.'img/flags/us.png';?>"  alt="">ENGLISH</a></li>  
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

<?php if($currentLocal == 'ru'){?>
     </div> 
     <?php } ?>

</header>

<!--[Header Area End]-->

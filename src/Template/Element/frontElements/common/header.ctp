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
                              <a href="<?php echo HTTP_ROOT; ?>" title="Sitter Guide"><img src="<?php echo HTTP_ROOT ?>img/logo.jpg"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
                            </div>
                          <div class="mob-logo">
                              <a class="logo" href="#" title="Sitter Guide"><img src="img/create_logo.png"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
                            </div>                                
                        </div>   
                        <div class="top-search">
                          <div class="search-box">
                              <input class="search-input" type="text" value="" placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Search home sitter for your loving dog')); ?>" />
                            </div>
                        </div> 
        </div>
      <div class="col-lg-<?php echo $currentLocal == 'ru'?'8':'7'; ?> col-md-<?php echo $currentLocal == 'ru'?'9':'8'; ?> col-sm-12 col-xs-12">
         <div class="topnav-area"> 
                        <nav class="navbar"> 
                            <div class="navbar-header">
                               <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Menu')); ?> </button>
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                              </button>                              
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                              <ul class="nav navbar-nav nav-logout">
                                <li class="active"><a href="#"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Get Free Sitting or Minding')); ?></a></li>
                                <li class="select"> <a  href="#"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Become a sitter')); ?></a></li>

                                <li><a href="<?php echo HTTP_ROOT.'guests/signup'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign Up')); ?></a></li>

                                <li  class="dropdown hideLogin">
                                   <a id="droplog" href="#" data-toggle="dropdown"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Login')); ?></a>
                                   <div class="dropdown-menu login-drop" id="dropcont">
                                    <div class="form-group">
                                           <?php echo $this->Form->create(null,[
                                                'url' => ['controller' => 'guests', 'action' => 'login'],
                                                'role'=>'form',
                                                'id'=>'loginUser'
                                                
                                            ]);
                                            echo $this->Form->input('Users.email',[                
                                                   'class'=>'form-control',
                                                   'label'=>$this->requestAction('app/get-translate/'.base64_encode('Email'))
                                            ]);
                                             echo $this->Form->input('Users.password',[                
                                                   'class'=>'form-control',
                                                   'type'=>'password',
                                                   'label'=>$this->requestAction('app/get-translate/'.base64_encode('Password'))
                                            ]);
                                        ?>
                                        <input type="submit" id="log_in_btn" class="btn btn-success" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?>">
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="signup-or-separator"> <p class="successMessage clr"></p><p class="errorMessage clr"></p>
                                            </div>
                                          </div>
                                        </div>
                                        <?php echo $this->Form->end(); ?>

                                            <p class="forget">
                                           
                                                <a id="droplogForgot" href="<?php echo HTTP_ROOT.'guests/forgot-password'; ?>" >
                                                 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Forgot Your Password')); ?> </a>
                                              <br>
                                          <?php echo $this->requestAction('app/get-translate/'.base64_encode('Not a Member ?')); ?>
                                           <a href="<?php echo HTTP_ROOT.'guests/signup'; ?>" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign up now')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign up now')); ?></a></p>
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
                                  
                                </li>
                                 
                                <li><a href="#"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Help')); ?> </a></li>

                              
                                <li class="dd-country last-drop"><a href="#"  data-toggle="dropdown"> <img src="<?php echo HTTP_ROOT.'img/flags/'.$currentLocal.'.png' ;?>" alt=""> </a>
									 <?php echo $this->element('frontElements/common/language_switcher'); ?>
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

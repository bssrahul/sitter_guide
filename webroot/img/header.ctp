<!--[Header Area Start]-->
<header  class="smaller">
<?php 
if($currentLocal == 'ru'){?>
	<div class="rus-wrap"> 
<?php } ?> 
	<div class="head-wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-<?php echo $currentLocal == 'ru'?'4':'5'; ?> col-md-<?php echo $currentLocal == 'ru'?'3':'4'; ?> col-sm-12 col-xs-12">
					<div class="logo-area">
                         <div class="desk-logo">
							  <?php if($sitelogo != null){ ?>
								  <a href="<?php echo HTTP_ROOT; ?>" title="Sitter Guide"><img src="<?php echo HTTP_ROOT; ?>img/uploads/<?php echo $sitelogo;?>"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
							  <?php }else{ ?>
									 <a href="<?php echo HTTP_ROOT; ?>" title="Sitter Guide"><img src="<?php echo HTTP_ROOT; ?>img/logo.jpg"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
							  <?php } ?>
                          </div>                          
                          <div class="mob-logo">
                              <a class="logo" href="#" title="Sitter Guide"><img src="<?php echo HTTP_ROOT; ?>img/create_logo.png"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
                          </div>                                
                    </div>                       
                    <div class="top-search">
						<div class="search-box">
							  <?php echo $this->element('frontElements/Search/header_search_form'); ?>
                        </div>
                    </div> 
                    <?php echo $this->element('frontElements/common/mob_language_switcher'); ?>
				</div>
				
				<div class="col-lg-<?php echo $currentLocal == 'ru'?'8':'7'; ?> col-md-<?php echo $currentLocal == 'ru'?'9':'8'; ?> col-sm-12 col-xs-12">
					
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
								<ul class="nav navbar-nav nav-logout">
									<!--<li class="active">
										<a data-toggle="modal" href="#referanceModal"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Get Free Sitting or Minding')); ?></a>
									</li>-->
									<li class="select"> 
										<a  href="<?php echo HTTP_ROOT.'become-a-sitter' ;?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Become a sitter')); ?></a>
									</li>

									<li>
										<a href="<?php echo HTTP_ROOT.'guests/signup'; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sign Up')); ?></a>
									</li>

									<?php echo $this->requestAction('guests/check-device'); ?>
                                 
									<li><a href="<?php echo HTTP_ROOT.'help'; ?>"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Help')); ?> </a></li>

                              
									<li class="dd-country last-drop">
										<a href="#"  data-toggle="dropdown"> 
											<img src="<?php echo HTTP_ROOT.'img/flags/'.$currentLocal.'.png' ;?>" alt=""> <span class="lang-txt"> <?php echo ucwords($currentLocal); ?></span>
										</a>
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

<header>
<div class="head-wrap">
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">         
      <!--Logo Area-->
          <div class="logo-area">
                          <div class="desk-logo">
                             <?php if($sitelogo != null){?>
                              <a href="<?php echo HTTP_ROOT; ?>" title="Sitter Guide"><img src="<?php echo HTTP_ROOT; ?>img/uploads/<?php echo $sitelogo;?>"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
								<?php }else{?>
								 <a href="<?php echo HTTP_ROOT; ?>" title="Sitter Guide"><img src="<?php echo HTTP_ROOT; ?>img/logo.jpg"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
								<?php } ?>
							</div>
                          <div class="mob-logo">
                              <a class="logo" href="<?php echo HTTP_ROOT; ?>" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide'));?>"><img src="<?php echo HTTP_ROOT; ?>img/create_logo.png"  alt="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?>"></a>
                            </div>                                
                        </div>                        
         <!--Logo End--> 
             <div class="top-search">
				<div class="search-box">
					<?php echo $this->element('frontElements/Search/header_search_form'); ?>
				</div>
              </div> 
              <?php echo $this->element('frontElements/common/mob_language_switcher'); ?>
                        
        </div>
        <!--/Mobile country Dropdown-->
        <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
          <div class="topnav-area">
            <nav class="navbar">
              <div class="navbar-header">
          
                 <?php 
                        $cont = $this->request->params['controller'];
                        $act = $this->request->params['action'];
                 if(($cont != 'Guests') || ($cont != 'guests' && $act != 'home')){
               
                  ?>
                <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed" style="float:left"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('MENU')); ?> </button>
                <?php } ?>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                 <ul class="nav navbar-nav">
                       <li class="active">
						   <a href="#"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Get Free Sitting or Minding')); ?></a>
                       </li>                                
                       
                       <li  class="dropdown">
						   <a  id="droplog3" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile')); ?>
						   </a>
						
						<div class="dropdown-menu currency-drop drop-profile" id="dropcont3">                                       
							  <ul class="c-list c-list-2">  
								
								<li>
								  <a href="<?php echo HTTP_ROOT.'dashboard/home' ?>"><i class="fa fa-dashboard"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dashboard')); ?></a>
								</li>
								
								<li>
									<a href="#"><i class="fa fa-question-circle"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Tracker')); ?></a>
								</li>
								
								<li>
									<a href="#"><i class="fa fa-envelope"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Inbox')); ?></a>
								</li>
								
								<li>
									<a href="#"><i class="fa fa-book"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking')); ?></a>
								</li>
								
								<li>
									<a href="#"><i class="fa fa-calendar"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Calender')); ?></a>
								</li>
								
								<li>
									<a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"><i class="fa fa-user"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Profile')); ?></a>
								</li>
								
								<li>
									<a href="<?php echo HTTP_ROOT ;?>guests/logout"><i class="fa fa-power-off"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Logout')); ?></a>
								</li>
												
							</ul>
                         </div>
                      </li>
                       <!--MESSAGE LI START -->
                     <li  class="dropdown">
						  <a  id="droplog3" href="#" class="dropdown-toggle" data-toggle="dropdown">Message  
							<span class="badge">10
							</span>
						  </a>
						</a>
						<div class="dropdown-menu currency-drop drop-profile message-width  hidden-xs " id="dropcont3">
						  <ul class="c-list c-list-2">
							<li>
							  <a href="#">
								<div class="book-now-setion-inner li-p ">
								  <div class="row">
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
									  <div class="book-now-img ">
										<img alt="img" class="img-responsive img-circle text-center center-block mCS_img_loaded" src="images/detail-client.png"> 
									  </div>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 message-pad-left-0 message-pad-right-0">
									  <div class="book-now-name">
										<div class="new-badge">NEW
										</div>
										<p>Jassica A
										</p>
										<p>Today
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0 message-pad-right-0 ">
									  <div class="book-now-name">
										<p>Hi Steves
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0">
									  <div class="book-now-name">
										<p class="text-right">Apr 1
										</p>
									  </div>
									</div>
								  </div>
								</div>
							  </a>
							</li>         
							<li>
							  <a href="#">
								<div class="book-now-setion-inner li-p ">
								  <div class="row">
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
									  <div class="book-now-img ">
										<img alt="img" class="img-responsive img-circle text-center center-block mCS_img_loaded" src="images/detail-client.png"> 
									  </div>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 message-pad-left-0 message-pad-right-0">
									  <div class="book-now-name">
										<div class="new-badge">NEW
										</div>
										<p>Jassica A
										</p>
										<p>Today
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0 message-pad-right-0 ">
									  <div class="book-now-name">
										<p>Hi Steves
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0">
									  <div class="book-now-name">
										<p class="text-right">Apr 1
										</p>
									  </div>
									</div>
								  </div>
								</div>
							  </a>
							</li>
							<li>
							  <a href="#">
								<div class="book-now-setion-inner li-p ">
								  <div class="row">
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
									  <div class="book-now-img ">
										<img alt="img" class="img-responsive img-circle text-center center-block mCS_img_loaded" src="images/detail-client.png"> 
									  </div>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 message-pad-left-0 message-pad-right-0">
									  <div class="book-now-name">
										<div class="new-badge">NEW
										</div>
										<p>Jassica A
										</p>
										<p>Today
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0 message-pad-right-0 ">
									  <div class="book-now-name">
										<p>Hi Steves
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0">
									  <div class="book-now-name">
										<p class="text-right">Apr 1
										</p>
									  </div>
									</div>
								  </div>
								</div>
							  </a>
							</li>
							<li class="text-center pad10">
							  <a href="#" class="colr-grn">See more
							  </a>
							</li>
						  </ul>
						</div>
						</li>  <!--MESSAGE LI CLOSED -->

                      
                      <li><a href="#"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Help')); ?> </a></li>
                                  
                      <li class="dd-country last-drop">
						  <a href="#"  data-toggle="dropdown"> <img src="<?php echo HTTP_ROOT.'img/flags/'.$currentLocal.'.png' ;?>" alt=""> </a>
							<?php echo $this->element('frontElements/common/language_switcher'); ?>
                       </li>
                  </ul> 
              </div>
            </nav>
          </div>
        </div>
                        <!--end-->



    </div>
</div>
                  
</div>
</header>


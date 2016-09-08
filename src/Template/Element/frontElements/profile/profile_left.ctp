  <?php $action = $this->request->params['action'];
  $session=$this->request->session();
   
   $calendar_limits =$session->read('calendar_limits','yes');
   $user_type = $session->read('User.user_type');
   $requestController = $this->request->controller; 
   $requestAction = $this->request->action;
  ?>
 <div class="col-md-3 col-lg-2 col-sm-4  lg-width20">
        <div class="custom">
          <div class="sidebar">
            <div class=""> 
              <!-- uncomment code for absolute positioning tweek see top comment in css --> 
              <!-- Menu -->
              <div class="side-menu">
                <nav class="navbar navbar-inverse" role="navigation"> 
                  <!-- Main Menu -->
                  <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                      
                      <?php if($requestAction=='dashboardDetails'){
						  
						  $dashboard_class='class="active"';
					  }else{
						  $dashboard_class='class=""';
						  
					  }?>
					  
					  
					   <?php if($requestAction=='promote'){
						  
						  $promote_class='class="active"';
					  }else{
						  $promote_class='class=""';
						  
					  }?>
					  
					  <?php if($requestAction=='tracker'){
						  
						  $tracker_class='class="active"';
					  }else{
						  $tracker_class='class=""';
						  
					  }?>
					  
                      <li <?php echo $dashboard_class; ?>><a href="<?php echo HTTP_ROOT.'dashboard/dashboard-details'; ?>"><span class="fa fa-user"></span><span class="side-list"><?php echo __('Dashboard'); ?></span></a></li>
                      
                      
                      <li <?php echo $promote_class; ?>><a href="<?php echo HTTP_ROOT.'dashboard/promote'; ?>"><span class="fa fa-smile-o"></span><span class="side-list"><?php echo __('Promote'); ?></span></a></li>
                      
                      <li <?php echo $tracker_class; ?>><a href="<?php echo HTTP_ROOT.'tracker'; ?>"><span class="fa fa-question-circle"></span><span class="side-list"><?php echo __('Sitter Guide GPS'); ?></span></a></li>
                      
                      <li class="panel panel-default <?php if(trim($requestController)=='Message'){echo 'active msg-bg-white';}else{echo '';}?>" id="dropdown">
							<a data-toggle="collapse" href="#dropdown-lvl1">
								<span class="fa fa-envelope"></span><span class="side-list"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Inbox & Bookings')); ?> </span> <span class="badge myNewCount"></span>
							</a>

						
							<div id="dropdown-lvl1" class="panel-collapse <?php if(trim($requestController)=='Message'){echo 'in';}else{echo '';}?> collapse">
								<div class="panel-body">
									<ul class="nav navbar-nav">
										<li>
											<a href="<?php echo HTTP_ROOT.'Message/get-messages/pending' ?>" class="<?php if(trim(@$this->request->params['pass'][0])=='' || @$this->request->params['pass'][0]=='pending'){echo 'active';}else{echo '';}?>">
											<span class="fa fa-angle-double-right"></span>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pending')); ?>
											</a>
										</li>
										
										<li>
											<a href="<?php echo HTTP_ROOT.'Message/get-messages/current' ?>" class="<?php if(trim(@$this->request->params['pass'][0])=='current'){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Current')); ?></a>
										</li>
										
										<li>
											<a href="<?php echo HTTP_ROOT.'Message/get-messages/past' ?>" class="<?php if(trim(@$this->request->params['pass'][0])=='past'){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Past')); ?></a>
										</li>
										
										<li >
											<a href="<?php echo HTTP_ROOT.'Message/get-messages/archieved' ?>" class="<?php if(trim(@$this->request->params['pass'][0])=='archieved'){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Archive')); ?></a>
										</li>
								
										
									</ul>
								</div>
							</div>
						</li>
						
						<li class="panel panel-default <?php if((trim($requestController)=='Dashboard' && (trim($requestAction)=='searchResultsFavourites')) || (trim($requestController)=='Favclient' && (trim($requestAction)=='favouriteClients'))){echo 'active msg-bg-white';}else{echo '';}?>" id="dropdown">
							<a data-toggle="collapse" href="#dropdown-lvl2">
								<span class="fa fa-thumbs-up"></span><span class="side-list"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Favourites')); ?> </span>
							</a>

						
							<div id="dropdown-lvl2" class="panel-collapse <?php if((trim($requestController)=='Dashboard' && (trim($requestAction)=='searchResultsFavourites')) || (trim($requestController)=='Favclient' && (trim($requestAction)=='favouriteClients'))){echo 'in';}else{echo '';}?> collapse">
								<div class="panel-body">
									<ul class="nav navbar-nav">
										<li ><a href="<?php echo HTTP_ROOT.'dashboard/search-results-favourites'?>" class="<?php if(trim($requestController)=='Dashboard' && (trim($requestAction)=='searchResultsFavourites')){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Search Results Favourites')); ?></a></li>
										
										<li><a href="<?php echo HTTP_ROOT.'favclient/favourite-clients'?>" class="<?php if(trim($requestController)=='Favclient' && (trim($requestAction)=='favouriteClients')){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Favourite Clients')); ?> </a></li>
									</ul>
								</div>
							</div>
						</li>
                      
        
                      
                      <?php 
						$actions = array("home","frontDashboard","aboutSitter", "professionalAccreditations", "aboutGuest","profile","house");
						if (in_array($action, $actions)){
							$profile_class = 'class="active"';
						}else{
						   $profile_class = 'class=""';
						}
						?>
                    
					  <li <?php echo $profile_class; ?>><a href="<?php echo HTTP_ROOT.'dashboard/front-dashboard' ?>"><span class=" fa fa-user"></span> <span class="side-list"><?php echo __('Profile'); ?></span></a></li>
					 <?php if($requestAction=='calendar'){
						  
						  $calendar_class='class="active"';
					  }else{
						  $calendar_class='class=""';
						  
					  }
					  if($user_type == 'Sitter'){ 
						  
						  ?>
						  <li <?php echo $calendar_class; ?>><a href="<?php echo HTTP_ROOT.'dashboard/calendar' ?>"><span class="fa fa-calendar"></span> <span class="side-list"><?php echo __('Calendar'); ?></span></a></li>
						   <?php if($requestAction=='servicesAndRates'){
							  
							  $service_class='class="active"';
						  }else{
							  $service_class='class=""';
							  
						  }?>
						  <li <?php echo $service_class; ?>><a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates' ?>"><span class=" fa fa-list"></span> <span class="side-list"><?php echo __('Services').' $ '.__('rates'); ?></span></a></li>
					  <?php } ?>
					  
					     <?php if($requestController=='Transaction'){
						  
						  $transaction_class='class="active"';
					  }else{
						  $transaction_class='class=""';
						  
					  }?>
					  
					  
					  <li <?php echo $transaction_class; ?>><a href="<?php echo HTTP_ROOT.'Transaction/paid-transaction' ?>"><span class="fa fa-usd"></span> <span class="side-list"><?php echo __('Transactions'); ?></span></a></li>
					  
                      <?php if($requestAction=='myRating' || $requestAction=='sharedRating'){
						  
						  $review_class='class="active"';
					  }else{
						  $review_class='class=""';
						  
					  }?>
					  
                      <li <?php echo $review_class; ?>><a href="<?php echo HTTP_ROOT.'rating/my-rating' ?>"><span class="fa fa-comment"></span> <span class="side-list"><?php echo __('Review'); ?></span></a></li>
                       <?php if($requestAction=='communication'){
						  
						  $communication_class='class="active"';
					  }else{
						  $communication_class='class=""';
						  
					  }?>
                      <li <?php echo $communication_class; ?>><a href="<?php echo HTTP_ROOT.'dashboard/communication' ?>"><span class="fa fa-group"></span> <span class="side-list"><?php echo __('Communication'); ?></span></a></li>
                      
                      <!-- Dropdown--> 
               
                      
                    </ul>
                  </div>
                  <!-- /.navbar-collapse --> 
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
<style>
.msg-bg-white{background:#fff !important;}
.msg-bg-white a{color:#75a30b !important;}

.msg-bg-white div.panel-body { background:#fff !important;}
.msg-bg-white div.panel-body ul li a{background:#fff !important; }
.msg-bg-white ul li a{color:#404040 !important;}
</style>

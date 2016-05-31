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
                      <li ><a href="#"><span class="fa fa-user"></span><span class="side-list"><?php echo __('Dashboard'); ?></span></a></li>
                      <li><a href="#"><span class="fa fa-smile-o"></span><span class="side-list"><?php echo __('Promote'); ?></span></a></li>
                      <li><a href="#"><span class="fa fa-question-circle"></span><span class="side-list"><?php echo __('Tracker'); ?></span></a></li>
                      
                      <?php 
                      if(trim($this->request->action)=='chats'){$inbox_class='active';}else{$inbox_class='';}
					  ?>
                       <li class="panel panel-default <?php echo $inbox_class; ?>" id="dropdown">
							<a data-toggle="collapse" href="#dropdown-lvl1">
								<span class="fa fa-envelope"></span><span class="side-list">Inbox & Bookings </span> <span class="badge">10</span>
							</a>

						
							<div id="dropdown-lvl1" class="panel-collapse <?php if(trim($this->request->controller)=='Message'){echo 'in';}else{echo '';}?> collapse">
								<div class="panel-body">
									<ul class="nav navbar-nav">
										<li>
											<a href="#" class="<?php if(trim($this->request->action)=='chats'){echo 'active';}else{echo '';}?>">
											<span class="fa fa-angle-double-right"></span>&nbsp;Pending
											</a>
										</li>
										
										<li>
											<a href="#" class="<?php if(trim($this->request->action)=='upcomings'){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp;Upcoming</a>
										</li>
										
										<li>
											<a href="#" class="<?php if(trim($this->request->action)=='past'){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp;Past</a>
										</li>
										
										<li >
											<a href="#" class="<?php if(trim($this->request->action)=='archieved'){echo 'active';}else{echo '';}?>"><span class="fa fa-angle-double-right"></span>&nbsp;Archive</a>
										</li>
								
										
									</ul>
								</div>
							</div>
						</li>
						
						<li class="panel panel-default" id="dropdown">
							<a data-toggle="collapse" href="#dropdown-lvl2">
								<span class="fa fa-thumbs-up"></span><span class="side-list">Favourites </span>
							</a>

						
							<div id="dropdown-lvl2" class="panel-collapse collapse">
								<div class="panel-body">
									<ul class="nav navbar-nav">
										<li ><a href="#" class=""><span class="fa fa-angle-double-right"></span>&nbsp; Search Results Favourites</a></li>
										<li><a href="#"><span class="fa fa-angle-double-right"></span>&nbsp; Favourite Clients</a></li>
									</ul>
								</div>
							</div>
						</li>
                      
                      
                      
                      <li><a href="#"><span class="fa fa-calendar"></span> <span class="side-list"><?php echo __('Calendar'); ?></span></a></li>
                      <?php if($this->request->action=='profile' || $this->request->action=='sitterHouse' || $this->request->action=='aboutSitter' || $this->request->action=='professionalAccreditations'){
						  
						  $profile_class='class="active"';
					  }else{
						  $profile_class='class=""';
						  
					  }?>
					  <li <?php echo $profile_class; ?>><a href="profile"><span class=" fa fa-user"></span> <span class="side-list"><?php echo __('Profile'); ?></span></a></li>
                       <?php if($this->request->action=='servicesAndRates'){
						  
						  $service_class='class="active"';
					  }else{
						  $service_class='class=""';
						  
					  }?>
					  <li <?php echo $service_class; ?>><a href="services-and-rates"><span class=" fa fa-list"></span> <span class="side-list"><?php echo __('Services').' $ '.__('rates'); ?></span></a></li>
                      
					  <li><a href="#"><span class="fa fa-usd"></span> <span class="side-list"><?php echo __('Transections'); ?></span></a></li>
                      <li><a href="review"><span class="fa fa-comment"></span> <span class="side-list"><?php echo __('Review'); ?></span></a></li>
                      <li><a href="#"><span class="fa fa-group"></span> <span class="side-list"><?php echo __('Communication'); ?></span></a></li>
                      
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

<div class="col-md-3 left_col">
	<div class="left_col scroll-view">

		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo HTTP_ROOT."users/dashboard"; ?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?></span></a>
		</div>
		<div class="clearfix"></div>

		<!-- menu prile quick info -->
		<div class="col-lg-12  profile">
			<div class="col-lg-4">
					
						<?php @$adminVal = $this->request->session()->read("Admin"); 
						if($adminVal !=""){
							if($adminVal['admin_img'] != '' ){
								$adminImg = $adminVal['admin_img']; 
							}else{
								$adminImg = 'prof_photo.png';
							}
							?>
							<img style="padding:1px;width: 50px;height: 50px;position: relative;top: 25px;" src="<?php echo HTTP_ROOT ;?>img/uploads/<?php echo $adminImg; ?>" alt="..." class="img-circle profile_img">
					
				</div>	
				<div class="col-lg-8">
					<div style="width:100% !important"  class="profile_info">
						<span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Welcome')); ?>, <h2> <?php if($adminVal['full_name'] !=''){
							   echo $adminVal['full_name'];
						 }else{
							echo "Admin";
						 }  
					}?>
						</h2>
						</span>
					</div>
				</div>	
		</div>
		<!-- /menu prile quick info -->

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

			<div class="menu_section">
				<h3>&nbsp;</h3>
				
				<ul class="nav side-menu">
				    <li>
					<a href="<?php echo HTTP_ROOT."users/dashboard" ?>"><i class="fa fa-dashboard"></i><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Dashboard')); ?></span></a>
					</li>
					
					<li>
                        <a><i class="fa fa-home"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Home Blocks')); ?> <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" style="display: none">
							<li><a href="<?php echo HTTP_ROOT."cmspages/works-listing" ?>"><i class="fa fa-cogs"></i>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('How It Works')); ?></a></li>
                            <li><a href="<?php echo HTTP_ROOT."cmspages/choose-us-listing" ?>"><i class="fa fa-hand-lizard-o"></i>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Why Choose Us')); ?></a></li>
                            <li><a href="<?php echo HTTP_ROOT."cmspages/news-updates-listing" ?>"><i class="fa fa-newspaper-o"></i>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('News & Updates')); ?></a></li>
						</ul>
                    </li>
					
					<li>
                        <a><i class="fa fa-sliders"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Modules')); ?> <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" style="display: none">
							<li>
							   <a href="<?php echo HTTP_ROOT."users/users-listing" ?>"><i class="fa fa-user"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Users')); ?> </span></a>
							</li>
							<li>
							  <a href="<?php echo HTTP_ROOT."category/categories-listing" ?>"><i class="fa fa-cubes"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Categories')); ?> </span></a>
							</li>
							<li>
							  <a href="<?php echo HTTP_ROOT."promocode/promocodes-listing" ?>"><i class="fa fa-ticket"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Promocode')); ?> </span></a>
							</li>
							<li>
							  <a href="<?php echo HTTP_ROOT."currency/currencies-listing" ?>"><i class="fa fa-usd"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Currency')); ?> </span></a>
							</li>
							<li>
							   <a href="<?php echo HTTP_ROOT."slider/sliders-listing" ?>"><i class="fa fa-video-camera"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Slider')); ?></span></a>
							</li>
							<li>
								<a href="<?php echo HTTP_ROOT."cmspages/strings-listing" ?>"><i class="fa fa-plus-circle"></i>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Strings')); ?></a>
							</li> 
							<li>
							   <a href="<?php echo HTTP_ROOT."cmspages/blogs-listing" ?>"><i class="fa fa-bullhorn"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Blog')); ?> </span></a>
							</li>
							<li>
							   <a href="<?php echo HTTP_ROOT."services/services-listing" ?>"><i class="fa fa-pie-chart"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Services')); ?> </span></a>
							</li>
						</ul>
                    </li>
					
					<li>
                        <a><i class="fa fa-laptop"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('CMS Management')); ?><span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" style="display: none">
							<li><a href="<?php echo HTTP_ROOT."cmspages/cms-pages" ?>"><i class="fa fa-file-text-o"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Content Management')); ?> </a></li>
							<li><a href="<?php echo HTTP_ROOT."cmspages/email-templates" ?>"><i class="fa fa-envelope-o"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Email Template')); ?></a></li>
							<li><a href="<?php echo HTTP_ROOT."cmspages/contact-requests" ?>"><i class="fa fa-phone"></i>  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Requests')); ?></a></li>
						</ul>
                    </li>
                    
                    
					
                   
                    <li>
                       <a href="<?php echo HTTP_ROOT."cmspages/subscribes-listing" ?>"><i class="fa fa-envelope"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Subscribers')); ?>  </span></a>
                    </li>
                    <li>
                       <a href="<?php echo HTTP_ROOT."partners/partners-listing" ?>"><i class="fa fa-glass"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Manage Partners')); ?>  </span></a>
                    </li>
					<li>
					  <a href="<?php echo HTTP_ROOT."faqs/faqs-listing" ?>"><i class="fa fa-question"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Faqs')); ?> </span></a>
                      
                    </li>
                    <li>
					  <a href="<?php echo HTTP_ROOT."referalbonus/referalbonus-listing" ?>"><i class="fa fa-question"></i> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Referal Bonus')); ?> </span></a>
                      
                    </li>
                    
				</ul>
			</div>
			

		</div>
		<!-- /sidebar menu -->
	</div>
</div>

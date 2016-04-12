<div class="col-md-3 left_col">
	<div class="left_col scroll-view">

		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo HTTP_ROOT."users/dashboard"; ?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo __(SITE_TITLE); ?></span></a>
		</div>
		<div class="clearfix"></div>

		<!-- menu prile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<?php @$adminVal = $this->request->session()->read("Admin"); 
				 if($adminVal !=""){
					if($adminVal['admin_img'] != '' ){
					   $adminImg = $adminVal['admin_img']; 
					}else{
					   $adminImg = 'prof_photo.png';
					}
				?>
                <img src="<?php echo HTTP_ROOT ;?>img/uploads/<?php echo $adminImg; ?>" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span><?php echo __("Welcome"); ?>, <h2> <?php if($adminVal['full_name'] !=''){
							   echo $adminVal['full_name'];
						 }else{
							echo "Admin";
						 }  
					}?>
				</h2></span>
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
					<a href="<?php echo HTTP_ROOT."users/dashboard" ?>"><i class="fa fa-dashboard"></i><span><?php echo __("Dashboard"); ?></span></a>
					</li>
					
					<li>
                        <a><i class="fa fa-home"></i> <?php echo __("Home Blocks"); ?> <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" style="display: none">
							<li><a href="<?php echo HTTP_ROOT."cmspages/works-listing" ?>"><i class="fa fa-cogs"></i>  <?php echo __("How It Works"); ?></a></li>
                            <li><a href="<?php echo HTTP_ROOT."cmspages/choose-us-listing" ?>"><i class="fa fa-hand-lizard-o"></i>  <?php echo __("Why Choose Us"); ?></a></li>
                            <li><a href="<?php echo HTTP_ROOT."cmspages/news-updates-listing" ?>"><i class="fa fa-newspaper-o"></i>  <?php echo __("News & Updates"); ?></a></li>
						</ul>
                    </li>
					
					<li>
                        <a><i class="fa fa-sliders"></i> <?php echo __("Manage Modules"); ?> <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" style="display: none">
							<li>
							   <a href="<?php echo HTTP_ROOT."users/users-listing" ?>"><i class="fa fa-user"></i> <span><?php echo __("Manage Users"); ?> </span></a>
							</li>
							<li>
							  <a href="<?php echo HTTP_ROOT."category/categories-listing" ?>"><i class="fa fa-cubes"></i> <span>Manage Categories </span></a>
							</li>
							<li>
							  <a href="<?php echo HTTP_ROOT."promocode/promocodes-listing" ?>"><i class="fa fa-ticket"></i> <span>Manage Promocode </span></a>
							</li>
							<li>
							  <a href="<?php echo HTTP_ROOT."currency/currencies-listing" ?>"><i class="fa fa-usd"></i> <span><?php echo __("Manage Currency"); ?> </span></a>
							</li>
							<li>
							   <a href="<?php echo HTTP_ROOT."slider/sliders-listing" ?>"><i class="fa fa-video-camera"></i> <span><?php echo __("Manage Slider"); ?> </span></a>
							</li>
							<li>
								<a href="<?php echo HTTP_ROOT."cmspages/strings-listing" ?>"><i class="fa fa-plus-circle"></i>  <?php echo __("Manage  Strings"); ?></a>
							</li> 
						</ul>
                    </li>
					
					<li>
                        <a><i class="fa fa-laptop"></i> <?php echo __("CMS Management"); ?> <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" style="display: none">
							<li><a href="<?php echo HTTP_ROOT."cmspages/cms-pages" ?>"><i class="fa fa-file-text-o"></i> <?php echo __("Content Management"); ?> </a></li>
							<li><a href="<?php echo HTTP_ROOT."cmspages/email-templates" ?>"><i class="fa fa-envelope-o"></i> <?php echo __("Email Template"); ?></a></li>
							<li><a href="<?php echo HTTP_ROOT."cmspages/contact-requests" ?>"><i class="fa fa-phone"></i>  <?php echo __("Contact Requests"); ?></a></li>
						</ul>
                    </li>
                    
                    
					
                   
                    <li>
                       <a href="<?php echo HTTP_ROOT."cmspages/subscribes-listing" ?>"><i class="fa fa-envelope"></i> <span><?php echo __("Subscribers"); ?> </span></a>
                    </li>
                    <li>
                       <a href="<?php echo HTTP_ROOT."partners/partners-listing" ?>"><i class="fa fa-glass"></i> <span><?php echo __("Partner"); ?> </span></a>
                    </li>
                    <li>
					   <a href="<?php echo HTTP_ROOT."cmspages/blogs-listing" ?>"><i class="fa fa-bullhorn"></i> <span><?php echo __("Blogs"); ?> </span></a>
					</li>
				</ul>
			</div>
			

		</div>
		<!-- /sidebar menu -->

		<!-- 
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a href="<?php echo HTTP_ROOT."Users/sleep"; ?>" data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a href="<?php echo HTTP_ROOT."Users/logout"; ?>" data-toggle="tooltip" data-placement="top" title="Logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		 /menu footer buttons -->
	</div>
</div>

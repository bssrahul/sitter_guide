<a href="<?php echo HTTP_ROOT."admin/Users/dashboard"; ?>" class="logo adminHeader">
	<!-- Add the class icon to your logo image or logo icon to add the margining -->
	<?php echo __(SITE_TITLE); ?> 
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top adminNav" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	
	
	<div class="navbar-right">
		<ul class="nav navbar-nav">
			 <li class="dropdown user user-menu">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="glyphicon glyphicon-user"></i>
					<span><?php echo ucwords($this->Session->read('Admin.username'));?> <i class="caret"></i></span>
				</a>
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header bg-light-blue">
						<?php if($adminImg !=''){ ?>
							<img alt="User Image" class="img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.@$adminImg; ?>">
						<?php }else{ ?>
							<img alt="User Image" class="img-circle" src="<?php echo $this->webroot; ?>/img/Admin/avatar5.png">
						<?php } ?>
						
						
						
						<p>
							<?php echo ucwords($this->Session->read('Admin.username'));?> - <?php if($this->Session->read('Admin.type')==0)echo 'Administrator'; else echo "Client"; ?>
							<small>Member since <?php echo date('F Y',strtotime($this->Session->read('Admin.join_date'))); ?></small>
						</p>
					</li>
					
					<li class="user-body">
						<!--<div class="col-xs-4 text-center">
							<a href="#">Followers</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="#">Sales</a>
						</div>-->
						<div class="col-xs-8 text-center">
							<a href="<?php echo HTTP_ROOT; ?>">View WebSite</a>
						</div>
					</li>
					
					<li class="user-footer">
						<div class="pull-left">
							<a class="btn btn-default btn-flat" href="<?php echo HTTP_ROOT."admin/Users/adminedit/".base64_encode(convert_uuencode(1)).'/type:0';?>">Profile</a>
						</div>
						
						<div class="pull-right">
							<a class="btn btn-default btn-flat" href="<?php echo HTTP_ROOT."admin/Users/logout"; ?>">Sign out</a>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>

</nav>
       
<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav class="" role="navigation">
			
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
				  
			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<?php @$adminVal = $this->request->session()->read("Admin"); 
						 if($adminVal !=""){
							if($adminVal['admin_img'] != '' ){
							   $adminImg = $adminVal['admin_img']; 
							}else{
							   $adminImg = 'prof_photo.png';
							}
						   
							?>
							<img src="<?php echo HTTP_ROOT ;?>img/uploads/<?php echo $adminImg; ?>" alt="">
							<?php 
							if($adminVal['full_name'] !=''){
								   echo $adminVal['full_name'];
							}else{
								echo "Admin";
							} 
						}?>	 
						<span class=" fa fa-angle-down"></span>
					</a>

					<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
						<li>
							<?php
								echo $this->Html->link($this->requestAction('app/get-translate/'.base64_encode('View Website')),
								HTTP_ROOT
								);
							?>
						</li>
						<li>
							<?php
								echo $this->Html->link($this->requestAction('app/get-translate/'.base64_encode('Profile')),
								['controller' => 'users', 'action' => 'admin-edit', '_full' => true]
							);
							?>
						</li>
						<li>
							<?php
								echo $this->Html->link(
								$this->requestAction('app/get-translate/'.base64_encode('Change Password')),
								['controller' => 'users', 'action' => 'change-password', '_full' => true],
								['escape' => false]
							);
							?>
						</li>
						<li>
							<?php
								echo $this->Html->link(
								$this->requestAction('app/get-translate/'.base64_encode('Screen Lock')),
								['controller' => 'users', 'action' => 'sleep', '_full' => true],
								['escape' => false]
							);
							?>
						</li>
						<li>
							<?php
								echo $this->Html->link(
								'<i class="fa fa-sign-out pull-right"></i> '.$this->requestAction('app/get-translate/'.base64_encode('Logout')),
								['controller' => 'users', 'action' => 'logout', '_full' => true],
								['escape' => false]
							);
							?>
						</li>
					</ul>
				</li>

				<!--<li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green">6</span>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
						<li>
							<a>
								<span class="image">
							<img src="<?php echo HTTP_ROOT ?>img/admin/img.jpg" alt="Profile Image" />
						</span>
								<span>
							<span>John Smith</span>
								<span class="time">3 mins ago</span>
								</span>
								<span class="message">
							Film festivals used to be do-or-die moments for movie makers. They were where... 
						</span>
							</a>
						</li>
						<li>
							<div class="text-center">
								<a>
									<strong><a href="inbox.html">See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>-->
				
				<li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"><i style="font-size:18px;" class="fa fa-globe"></i> 
						<?php 
							$languageArray = array("fr"=>"French","de"=>"German","hu"=>"Hungarian","it"=>"Italian","ro"=>"Romanian","ru"=>"Russian","es"=>"Spanish","en"=>"English");
							$languageSession = $this->request->session();
							echo $languageArray[$languageSession->read('requestedLanguage')]; 
							$cont = $this->request->params['controller'];
							$act = $this->request->params['action'];
						?>
					</a>
					<ul id="menu1" class="langMenu dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
						<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/fr.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('French',["controller"=>'Users',"action"=>"set_your_store/fr/$cont/$act"]);
							?>
						</li>
						<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/de.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('German',["controller"=>'Users',"action"=>"set_your_store/de/$cont/$act"]);
							?>
						</li>
						<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/hu.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('Hungarian',["controller"=>'Users',"action"=>"set_your_store/hu/$cont/$act"]);
							?>
						</li>
						<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/it.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('Italian',["controller"=>'Users',"action"=>"set_your_store/it/$cont/$act"]);
							?>
						</li>
						<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/ro.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('Romanian',["controller"=>'Users',"action"=>"set_your_store/ro/$cont/$act"]);
							?>
						</li>
						<!--<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/ru.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('Russian',["controller"=>'Users',"action"=>"set_your_store/ru/$cont/$act"]);
							?>
						</li>-->
						<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/es.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('Spanish',["controller"=>'Users',"action"=>"set_your_store/es/$cont/$act"]);
							?>
						</li>
						<li>
							<img src="<?php echo HTTP_ROOT ?>img/flags/us.png" alt="Profile Image" /> 
							<?php
								echo $this->Html->link('English',["controller"=>'Users',"action"=>"set_your_store/en/$cont/$act"]);
							?>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- /top navigation -->
<style>
ul.msg_list li:last-child {
    padding: 5px !important;
}	
ul.langMenu li a {
    width: 90% !important;
    padding: 12px 20px;
    float: left;
}
</style>		 

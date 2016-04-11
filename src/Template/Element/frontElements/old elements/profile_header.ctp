<!-- profile_headeter.ctp -->
<header class="head-wrap"> 
    <div class="outer-head"> 

      <div class="top-nav inner-top-head">
        <div class="navbar navbar-custom navbar-fixed-top" role="navigation">
          <header class="drawer-navbar" role="banner">
            <div class="drawer-container">
              <div class="drawer-navbar-header">
                <div class="drawer-brand" href="#">	
                 <a href=""> <img class="desk-logo" src="<?php echo HTTP_ROOT; ?>img/inner-head-logo.png" alt="logo"></a>               
                  </div>
                <div class="inner-mob-search">                
                 <div class="nav-search-mob">
                	<input type="text" value="" placeholder="Where are you going?" class="nav-input" />
                </div>
                 </div>
                <button type="button" class="drawer-toggle drawer-hamburger"> <span class="sr-only">toggle navigation</span> <span class="drawer-hamburger-icon"></span> </button>
              </div>
               <div class="nav-search">
                	<input type="text" value="" placeholder="Where are you going?" class="nav-input" />
                </div>
                  
              <nav class="drawer-nav" role="navigation">
                <ul class="drawer-menu drawer-menu-2">                  
                  <li><a href="#" class="become" title="">Become a sitter</a></li>                  	
                  <li><a href="#" title="" >Message  <span> <img  alt="" src="<?php echo HTTP_ROOT; ?>img/top-chat-icon.png" title="">  <b class="badge">5</b></span></a>                  
                  		<div class="nav-drop-cont">                     	                   	
                        	<div class="msg-cont">
                            	<ul>
                                  <li>
                                    	<div class="msg-box">
                                       		<div class="img-box">
                                            	<img src="<?php echo HTTP_ROOT; ?>img/msg-img.png" width="50" height="50" alt="">
                                            </div> 
                                            <div class="txt-box">   
                                        		<p class="postedon">30 min ago</p>
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry text of the printing and.</p>
                                            </div>
                                        </div>                                    	
                                  </li>
                                  <li>
                                    	<div class="msg-box">
                                       		<div class="img-box">
                                            	<img src="<?php echo HTTP_ROOT; ?>img/msg-img.png" width="50" height="50" alt="">
                                            </div> 
                                            <div class="txt-box">   
                                        		<p class="postedon">30 min ago</p>
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry text of the printing and.</p>
                                            </div>
                                        </div>                                    	
                                  </li>
                                  <li>
                                    	<div class="msg-box">
                                       		<div class="img-box">
                                            	<img src="<?php echo HTTP_ROOT; ?>img/msg-img.png" width="50" height="50" alt="">
                                            </div> 
                                            <div class="txt-box">   
                                        		<p class="postedon">30 min ago</p>
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry text of the printing and.</p>
                                            </div>
                                        </div>                                    	
                                  </li>
                                  <li>
                                    	<div class="msg-box">
                                       		<div class="img-box">
                                            	<img src="<?php echo HTTP_ROOT; ?>img/msg-img.png" width="50" height="50" alt="">
                                            </div> 
                                            <div class="txt-box">   
                                        		<p class="postedon">30 min ago</p>
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry text of the printing and.</p>
                                            </div>
                                        </div>                                    	
                                  </li>
                                   <li>
                                    	<div class="msg-box">
                                       		<div class="img-box">
                                            	<img src="<?php echo HTTP_ROOT; ?>img/msg-img.png" width="50" height="50" alt="">
                                            </div> 
                                            <div class="txt-box">   
                                        		<p class="postedon">30 min ago</p>
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry text of the printing and.</p>
                                            </div>
                                        </div>                                    	
                                  </li>
                                   <li>
                                    	<div class="msg-box">
                                       		<div class="img-box">
                                            	<img src="<?php echo HTTP_ROOT; ?>img/msg-img.png" width="50" height="50" alt="">
                                            </div> 
                                            <div class="txt-box">   
                                        		<p class="postedon">30 min ago</p>
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry text of the printing and.</p>
                                            </div>
                                        </div>                                    	
                                  </li>
                                   <li>
                                    	<div class="msg-box">
                                       		<div class="img-box">
                                            	<img src="<?php echo HTTP_ROOT; ?>img/msg-img.png" width="50" height="50" alt="">
                                            </div> 
                                            <div class="txt-box">   
                                        		<p class="postedon">30 min ago</p>
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry text of the printing and.</p>
                                            </div>
                                        </div>                                    	
                                  </li>
                                </ul>
                                <a href="#" class="view-all-msg"> <i class="fa fa-envelope-o"></i> View all messages</a>                            	
                            </div>
	                    </div>                  		
                  </li>  

				  <?php @$userVal = $this->request->session()->read("User"); 
						 if($userVal !=""){
							if($userVal['image'] != '' ){
							   $userImg = $userVal['image']; 
							}else{
							   $userImg = 'prof_photo.png';
							}
							 if($userVal['name'] !=''){
								   $name = $userVal['name'];
							}else{
								$name = "User";
							}
						}?>	
                  <li class="profile-img"><a href="#" title="" >
				  <?php echo strtolower($name); ?>
				  <span> <img  alt="" src="<?php echo HTTP_ROOT.'img/uploads/'.$userImg;?>" title=""> </span></a>
                  		<div class="nav-drop-cont nav-drop-cont-2">                     	                   	
                        	<div class="msg-cont">
                            	<ul class="user-list">
                                  <li>
                                    	<div class="msg-box">   
                                        	<a href="<?php echo HTTP_ROOT.'dashboard'.'/'.'profile';?>" title="Profile"> <?php echo __("Profile"); ?><i class="fa fa-user"></i></a>                                        	
                                        </div>                                    	
                                  </li>
                                  <li>
                                    	<div class="msg-box">
                                        	<a href="<?php echo HTTP_ROOT.'dashboard'.'/'.'profile_edit';?>" title="Setting"><?php echo __("Setting"); ?>  <i class="fa fa-cog"></i></a>
										</div>
								  </li>
								  <li>
                                    <div class="msg-box">
                                        	<a href="<?php echo HTTP_ROOT.'dashboard'.'/'.'minder-register';?>" title="Setting"><?php echo __("Create your sitter profile"); ?><i class="fa fa-cog"></i></a>
										</div>
								  </li>
								  <li>
                                    	<div class="msg-box">
                                        	<a href="<?php echo HTTP_ROOT.'dashboard'.'/'.'add-user-pet';?>" title="Setting"><?php echo __("+Add Pet"); ?>  <i class="fa fa-cog"></i></a>
										</div>
								  </li>
									<li>
										<div class="msg-box">									
										<a class="page-scroll" href="javascript:void(0);" data-toggle="modal" data-target="#referanceModal">
											<?php echo __("Refer Friends & Get $20"); ?>  <i class="fa fa-users"></i>
										</a>
										</div>
									</li>
                                  <li>
                                    	<div class="msg-box">
                                        	<a href="<?php echo HTTP_ROOT.'Guests'.'/'.'logout'; ?>" title="Logout"> <?php echo __("Logout"); ?> <i class="fa fa-sign-out"></i></a>
										</div>
									</li>                                 
                                </ul>                               
                            </div>
	                    </div> 
                  </li>                  	
                  <li><a href="#" title="" >Help <span> <img  alt="" src="<?php echo HTTP_ROOT; ?>img/top-help-icon.png" title=""></span></a></li>                  	
                </ul>
              </nav>
            </div>
          </header>
        </div>
      </div>
		<?php /*ELEMENTS FOR DISPLAY SESSION ERROR AND SUCCESS MSGS */
		echo $this->element('frontElements/response_msg');?>	  
      <!--inner head-->
      <div class="inner-banner">
      	 <div class="video-area head_video_play">
		  <video width="1400" height="auto" controls class="header_video" autoplay>
			<source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.mp4" type="video/mp4" class="video_img">
		  </video>
		</div>
      </div>      
      <!--/inner head-->
  </div>
  
</header>
<!--[/Header]--> 
<!-- profile_headeter.ctp -->
<header class="head-wrap"> 
    <div class="outer-head"> 
     <!--inner head-->
      <div class="inner-banner">
		<div class="video-area head_video_play">
		  <video width="1400" height="auto" controls class="header_video" autoplay>
			<source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.mp4" type="video/mp4" class="video_img">
		  </video>
		</div>
      </div>      
      <!--/inner head-->
	 <div class="main-head"> 
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
                  <li class="profile-img"><a href="#" title="" ><?php echo $name; ?> <span> <img  alt="" src="<?php echo HTTP_ROOT.'img/uploads/'.$userImg; ?>" title=""> </span></a>
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
	   <!--Banner Text-->
      <div class="banner-txt">
        <div class="auto-cont">
          <div class="ban-txt-area">
            <h1>Worry Free Pet Sitting</h1>
            <p>& Dog Boarding Services</p>
            <div id="flip">
              <div class="sm-btn-hide"><a href="#" title="" class="ban-link">How it works</a></div>
            </div>
          </div>
        </div>
      </div>
      <!--Banner Text--> 
	  </div>
	  <!--Banner Text-->
      <div class="banner-txt">
        <div class="auto-cont">
          <div class="ban-txt-area">
            <h1>Worry Free Pet Sitting</h1>
            <p>& Dog Boarding Services</p>
            <div id="flip">
              <div class="sm-btn-hide"><a href="#" title="" class="ban-link">How it works</a></div>
            </div>
          </div>
        </div>
      </div>
      <!--Banner Text--> 
    </div>
    <!--/main-header--> 
    <!--Search start-->
    <div class="hide-dektop ">
      <div class="search-wrap">
        <div class="auto-cont">
          <div class="col-sm-12">
            <div class="custom-container pad-left">
              <div class="sm-show-mob"> <span class="input-stem input-large fake-search-field"> Where do you want to go? </span>
                <div class="input-suffix btn btn-primary icon icon-full icon-search"> <img src="<?php echo HTTP_ROOT; ?>img/new-search-icon-2.png" alt="" class="img-responsive"> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hide_mobile">
      <div class="search-wrap">
        <div class="auto-cont">
          <div class="hero__content-footer hide-sm">            
            <div class="custom-container">
            <!--New Search Bar-->
            	<div class="new-search">
                	<form role="form"> 
                		<ul class="form-group">
                    	<li class="search">                       
                           	<input type="" placeholder="Where do you want to go?" class="form-control" id="">
                         </li>
                        <li class="drop"> <input type="" placeholder="Droo Off" class="form-control" id=""> </li>
                        <li class="pick"> <input type="" placeholder="Pick Up" class="form-control" id=""></li>
                        <li class="size"> <select class="form-control" id="sel1">
                                       		 <option value="Pet Size">Pet Size</option>
                                            <option value="saab">Saab</option>
                                            <option value="mercedes">Mercedes</option>
                                            <option value="audi">Audi</option>
                                      </select>
 						</li>	
                        <li class="search-btn"> <button type="submit" class="btn">Submit</button></li>
                        
                        </ul>                      
                    </ul>
                     </form> 
                </div>
            <!--/New Search Bar-->
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!--/Search End--> 
  </div>
  
</header>
<!--[/Header]--> 
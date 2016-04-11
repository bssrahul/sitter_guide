<!--  header -->
<header class="head-wrap">
  <div class="outer-head"> 
    <!--video area-->
    <div class="video-area head_video_play">
      <video width="1400" height="auto" controls class="header_video" autoplay>
          <source src="<?php echo HTTP_ROOT.'files/video/'.($sliderVideo->media != ''?$sliderVideo->media:'default_slider.mp4'); ?>" type="video/mp4" class="video_img">
      </video>
    </div>
    <!--/video area--> 
    <!--main-header-->
    <div class="main-head"> 
      <!--Top Navigation-->
      <div class="top-nav">
        <div class="navbar navbar-custom navbar-fixed-top" role="navigation">
          <header class="drawer-navbar" role="banner">
            <div class="drawer-container">
			
              <div class="drawer-navbar-header">
			  
                <div class="drawer-brand" href="#">
				      <a href=""> <img class="desk-logo" src="<?php echo HTTP_ROOT; ?>img/header_logo.png" alt="logo"></a> <a href="#"><img class="mob-logo" src="<?php echo HTTP_ROOT; ?>img/mobile_nav_logo.png" alt="logo"></a>
				</div>
				<div class="mob-search"> <a href="#"><img height="inherit" width="inherit" alt="" src="<?php echo HTTP_ROOT; ?>img/new-search-icon-1.png" title=""></a></div>
                <button type="button" class="drawer-toggle drawer-hamburger"> <span class="sr-only">toggle navigation</span> <span class="drawer-hamburger-icon"></span> </button>
              </div>
			  
              <nav class="drawer-nav" role="navigation">
                <ul class="drawer-menu">
                  <li><a href="#">Get <span class="free">Free</span> Sitting or Minding</a></li>
                  <li><a href="#" class="become">Become a sitter</a></li>
                  <li class="mobile-hide"><a href="#">Help</a></li>
                  <li> <a class="page-scroll" href="javascript:void(0);" data-toggle="modal" data-target="#myModal_sign">Sign Up</a></li>
                  <li><a class="page-scroll" href="javascript:void(0);" data-toggle="modal" data-target="#myModal_log_in">Log In</a></li>
                  <li class="menu-hide" ><a title="" href="#" data-toggle="modal" data-target="#myModal_search">Search</a></li>
                  <li class="menu-hide" ><a title="" href="#"> How it works</a></li>
                  <li class="menu-hide" ><a href="#">Help</a></li>
                </ul>
              </nav>
            </div>
          </header>
        </div>
      </div>
      <!--/Top Navigation--> 
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
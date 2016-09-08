<!--[Banner Area Start]-->
<section class="banner-area">
		<!--Banner text-->
      <div class="ban-txt">
          <div class="container">             
			<h1><?php echo $this->requestAction('app/get-translate/'.base64_encode('Worry Free Pet SItting')); ?></h1>
			<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('& Dog Boarding Services')); ?></p>
			<!--<a href="#" id="flip" class="hworks" title="How its Works"><i class="fa fa-chevron-circle-right"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('How It Works')); ?></a>-->
            <a href="#"   id="myBtnv" class="hworks" title="How its Works"><i class="fa fa-chevron-circle-right"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('How It Works')); ?></a>
            
          
            
          </div>
      </div>       
      <!--/Banner text-->
  <div class="ban-search-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"> &nbsp; 
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
          <div class="bs-box">
            <div class="sr-area"> 
              <!--[Search result page]-->
              <div class="top-sr-area">    
                <div class="sr-area-outer">
                  <div class="row st-head-txt">
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                      <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('When you are Away')); ?>
                      </p>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 hide-mob">
                      <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('while you are at Home')); ?>
                      </p>
                    </div>
                  </div>
                  <div class="sr-area">
					<?php echo $this->element('frontElements/Search/banner_search_form_for_home'); ?>
                  </div>
               
                </div>   
              </div>
              <!--[Search result page]-->
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"> 
        </div>
      </div>
    </div>
  </div>
  <!--/Banner Search--> 
</section>
<!--[Banner Area End]--> 

	

<!--[if lt IE 9]>
<script>
$(document).ready(function() {
	$('.control').hide();
	$('.loading').fadeOut(500);
	$('.caption').fadeOut(500);
});
</script>
<![endif]-->

  <div class="modal fade" id="myModalv" role="dialog">
    <div class="modal-dialog">  
   
    <section id="vid-wrap">	
      <button type="button" class="close" data-dismiss="modal">&times;</button>  
<div class="videoContainer">	
	<video class="responsive-video"  id="myVideo" controls preload="auto" poster="poster.png" >
	  <source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.mp4" type="video/mp4" />	 
	</video>
	<!--<div class="caption" style="display:none !important;"> &nbsp </div>-->
	<div class="control">
    
    <!--Top Control-->
    
    <div class="topControl">
			<div class="progress">
				<span class="bufferBar"></span>
				<span class="timeBar"></span>
			</div>
			<div class="time">
				<span class="current"></span> / 
				<span class="duration"></span> 
			</div>
		</div>	
    
    <!--Top Control-->    
        
    <!--Button Control-->    	
		<div class="btmControl">
			<div class="btnPlay btn" title="Play/Pause video"></div>
			<div class="btnStop btn" title="Stop video"></div>
			<div class="spdText btn"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Speed')); ?>: </div>
			<div class="btnx1 btn text selected" title="Normal speed">x1</div>
			<div class="btnx3 btn text" title="Fast forward x3">x3</div>
			<div class="btnFS btn" title="Switch to full screen"></div>
			<div class="btnLight lighton btn" title="Turn on/off light"></div>
			<div class="volume" title="Set volume">
				<span class="volumeBar"></span>
			</div>
			<div class="sound sound2 btn" title="Mute/Unmute sound"></div>
		</div>
	<!--/Button Control-->    		
	</div>
	<div class="loading"></div>
</div>
	
</section>
    </div>
  </div> 




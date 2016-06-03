<!--[Banner Area Start]-->
<section class="banner-area">
		<!--Banner text-->
      <div class="ban-txt">
          <div class="container">             
			<h1><?php echo $this->requestAction('app/get-translate/'.base64_encode('Worry Free Pet SItting')); ?></h1>
			<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('& Dog Boarding Services')); ?></p>
			<a href="#" id="flip" class="hworks" title="How its Works"><i class="fa fa-chevron-circle-right"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('How It Works')); ?></a>
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
                      <p>When you are Away
                      </p>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 hide-mob">
                      <p>while you are at Home
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

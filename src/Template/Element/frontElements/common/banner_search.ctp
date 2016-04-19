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
         <!--Banner Search-->
          <div class="ban-search-area">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                          &nbsp;
                        </div>
                      <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                          <div class="bs-box">
                              <!--top search-->
                              <div class="top-srch">
                                  <div class="ts-lft">
                                      <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('For When You’re Away')); ?></p>
                                        <ul class="search-list">
                                          <li><a href="#">
                                              <span class="nc"></span>
                                                <?php echo $this->requestAction('app/get-translate/'.base64_encode('Night Care')); ?>
                                                
                                            </a></li>
                                            <li><a href="#">
                                              <span class="db"></span>
												<?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog Boarding')); ?>
                                            </a></li>
                                            <li><a href="#">
                                              <span class="div"></span>
                                                <?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop-in-Visit')); ?>
                                            </a></li>
                                        </ul> 
                                    </div>
                                    <div class="ts-rgt">
                                      <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('For When You’re At Work')); ?></p>
                                        <ul class="search-list search-list-2">
                                          <li><a href="#">
                                              <span class="dc"></span>
                                                <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog Care')); ?>
                                            </a></li>
                                            <li><a href="#">
                                              <span class="dw"></span>
                                                 <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog Walking')); ?>
                                            </a></li>
                                            
                                        </ul>                                        
                                    </div>                                                                    
                                </div>           
                                <!--top search--> 
                                <!--bot search-->
                                  <div class="bot-search">
                                      <ul class="form-group">                                                                                
                                          <li class="search"><input type="text" class="form-control" placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Where do you want to go?')); ?>" /></li>
                                            <li class="drop"><input type="text" class="form-control" placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop Off')); ?>" /></li>
                                            <li class="pick"><input type="text" class="form-control" placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Pick Up')); ?>" /></li>
                                            <li class="size"> <select class="form-control" id="sel1"><option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Size')); ?></option><option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small')); ?></option><option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Medium')); ?></option><option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large')); ?></option></select></li>
                                            <li class="search-btn"><button type="button" class="btn btn-success"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?> </button></li>                                            
                                        </ul>                                                                           
                                    </div>
                                <!--bot search-->
                                                  
                            </div>
                        </div>
                      <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                        </div>                                                
                    </div>                
                </div>            
            </div>
         <!--/Banner Search-->
</section>
<!--[Banner Area End]-->

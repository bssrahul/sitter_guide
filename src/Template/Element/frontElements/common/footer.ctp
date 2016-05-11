<!--[Footer Start]-->
  <footer class="foot-wrap">
      <!--top foot-->
      <div class="top-foot">
          <div class="container">
              <div class="fb-area">
                  <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                          <div class="foot-box">
                          <p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Sitter Guide')); ?></p>          
								<ul>
									<li><a href="<?php echo HTTP_ROOT.'about-us'; ?>" title="About Us"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('About Us')); ?></a> </li>
									<li><a href="#" title="Partners">  <?php echo $this->requestAction('app/get-translate/'.base64_encode('Partner')); ?></a> </li>
									<li><a href="<?php echo HTTP_ROOT.'news'; ?>" title="In the News"><?php echo $this->requestAction('app/get-translate/'.base64_encode('In the News')); ?></a>
									</li>
									<li><a href="<?php echo HTTP_ROOT.'privacy'; ?>" title="Privacy Policy"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Privacy Policy')); ?></a> </li>
									<li><a href="<?php echo HTTP_ROOT.'terms'; ?>" title="Terms & Conditions"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Terms & Conditions')); ?></a> </li>
                                </ul>
                               
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                          <div class="foot-box">
                          <p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Top Pet Sitting Cities')); ?></p>            
         
                              <ul>
                                  <li><a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Sydney')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Sydney')); ?></a> </li>
                                    <li><a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Melbourne')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Melbourne')); ?></a> </li>
                                    <li><a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Brisbane')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Brisbane')); ?></a> </li>
                                    <li><a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Perth')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Perth')); ?></a> </li>
                                    <li><a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Adelaide')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Adelaide')); ?></a> </li>
                                    <li><a href="#" title="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Canberr')); ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Sitters Canberr')); ?></a> </li>
                                </ul>
                               
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                          <div class="foot-box">
                          <p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Learn More')); ?></p>          
                              <ul>                   

                                  <li><a href="#" title="How does Sitter Guide Work"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('How does Sitter Guide Work')); ?></a> </li>
                                    <li><a href="#" title=" Insurance & Refunds"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Insurance & Refunds')); ?></a> </li>
                                    
                                    
                                    <li><a href="#" title="House Rules"><?php echo $this->requestAction('app/get-translate/'.base64_encode('House Rules')); ?></a> </li>
                                    <li><a href="<?php echo HTTP_ROOT.'safety'; ?>" title="Safety"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Safety')); ?></a> </li>
                                    <li><a href="#" title="Benefits of sittings"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Benefits of sittings')); ?></a> </li>
                                   
                                </ul>
                               
                        </div>
                      </div>
                      <?php echo $this->Form->create(null,[
                                    'url' => ['controller' => 'guests', 'action' => 'subscribe'],
                                     'id'=>'subscribeForm',
                                     'enctype'=>'multipart/form-data',
                                     'style'=>'display:block'
                                ]);?>
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                          <div class="foot-box fb-last">
                          <p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Need Help?')); ?></p>          
                            <ul>
								<li>
									<a href="<?php echo HTTP_ROOT.'help'; ?>" title="Help Center"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Help Center')); ?></a>
								</li>
								<li><a href="<?php echo HTTP_ROOT.'contact-us'; ?>" title="Contact Us"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Us')); ?></a> </li>
							</ul>
                                
                            <div class="news-let">
                                <p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Subscribe on News Letter')); ?></p>
                                 <div class="input email">
                                  <p class="successMessage clr"></p>
                                  <p class="errorMessage clr"></p>
                                    <?php echo $this->Form->input('Subscribes.email',['class'=>'nwlt-input','placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Enter Your Email')),'label'=>false, 'templates' => [
                                                 'inputContainer' => '{{content}}'
                                                  ]]); 

                                    ?>                               
                                  <input id="subscribe-btn"  type="submit" class="sb-btn" value="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Subscribe')); ?>" />
                                  <label class="error" for="subscribes-email" generated="true"></label>
                                 </div> 
                            </div>
                        </div>
                      </div>
                      
                     <?php echo $this->Form->end(); ?>
                </div>
                </div>
            </div>
        </div>    
        <!--/top foot-->            
        <!--bot foot-->
        <div class="bot-foot">
          <div class="container">
              <div class="bf-area">
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                      
                          <div class="bot-social">
                              <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Join The Sitter Guide Pack')); ?></p>
                              <ul>
									<li>
										<a href="<?php echo isset($siteConfiguration->facebook_link)? "http://".$siteConfiguration->facebook_link:""; ?>" title=""><i class="fa fa-facebook"></i></a>
									</li>
                                    <li>
										<a href="<?php echo isset($siteConfiguration->google_link)? "http://".$siteConfiguration->google_link:""; ?>" title=""><i class="fa fa-google-plus"></i></a>
									</li>
                                    <li>
										<a href="<?php echo isset($siteConfiguration->twitter_link)? "http://".$siteConfiguration->twitter_link:""; ?>" title=""><i class="fa fa-twitter"></i></a>
									</li>
                                    <li>
										<a href="<?php echo isset($siteConfiguration->instagram_link)? "http://".$siteConfiguration->instagram_link:""; ?>" title=""><i class="fa fa-instagram"></i></a>
									</li>
                                    <li>
										<a href="<?php echo isset($siteConfiguration->youtube_link)? "http://".$siteConfiguration->youtube_links:""; ?>" title=""><i class="fa fa-youtube"></i></a>
									</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="drop-area">
                              <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                      <div class="form-group">
                                        

										  <?php 
											$cont = $this->request->params['controller'];
											$act = $this->request->params['action'];
										  ?>     
                  <select class="form-control"  id="multiLingual"> 
                    <option value="">CHOOSE LANGUAGE</option>                 
                       <option value="<?php echo HTTP_ROOT.'app/setGuestStore/en/'.$cont.'/'.$act;?>">ENGLISH</option>                                          
                       <option value="<?php echo HTTP_ROOT.'app/setGuestStore/fr/'.$cont.'/'.$act;?>">FRENCH</option> 
                       <option value="<?php echo HTTP_ROOT.'app/setGuestStore/de/'.$cont.'/'.$act;?>">GERMAN</option>  
                       <option value="<?php echo HTTP_ROOT.'app/setGuestStore/hu/'.$cont.'/'.$act;?>">HUNGARIAN</option>  
                       <option value="<?php echo HTTP_ROOT.'app/setGuestStore/it/'.$cont.'/'.$act;?>">ITALIAN</option>  
                       <option value="<?php echo HTTP_ROOT.'app/setGuestStore/ro/'.$cont.'/'.$act;?>">ROMANIAN</option>  
                       <!--<option value="<?php echo HTTP_ROOT.'app/setGuestStore/ru/'.$cont.'/'.$act;?>">RUSSIAN</option>  -->
                       <option value="<?php echo HTTP_ROOT.'app/setGuestStore/es/'.$cont.'/'.$act;?>">SPANISH</option>   
                  </select>              
             </div>                      
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group">
                     <select class="form-control" id="">                                          
						  <option value="AED">USD</option>
						
						  <option value="ARS">ARS</option>
						
						  <option value="AUD">AUD</option>
						
						  <option value="BGN">BGN</option>
						
						  <option value="BRL">BRL</option>
						
						  <option value="CAD">CAD</option>
						
						  <option value="CHF">CHF</option>
						
						  <option value="CLP">CLP</option>
						
						  <option value="CNY">CNY</option>
						
						  <option value="COP">COP</option>
						
						  <option value="CRC">CRC</option>
						
						  <option value="CZK">CZK</option>
						
						  <option value="DKK">DKK</option>
						
						  <option value="EUR">EUR</option>
						
						  <option value="GBP">GBP</option>
						
						  <option value="HKD">HKD</option>
						
						  <option value="HRK">HRK</option>
						
						  <option value="HUF">HUF</option>
						
						  <option value="IDR">IDR</option>
						
						  <option value="ILS">ILS</option>
						
						  <option value="INR">INR</option>
						
						  <option value="JPY">JPY</option>
						
						  <option value="KRW">KRW</option>
						
						  <option value="MAD">MAD</option>
						
						  <option value="MXN">MXN</option>
						
						  <option value="MYR">MYR</option>
						
						  <option value="NOK">NOK</option>
						
						  <option value="NZD">NZD</option>
						
						  <option value="PEN">PEN</option>
						
						  <option value="PHP">PHP</option>
						
						  <option value="PLN">PLN</option>
						
						  <option value="RON">RON</option>
						
						  <option value="RUB">RUB</option>
						
						  <option value="SAR">SAR</option>
						
						  <option value="SEK">SEK</option>
						
						  <option value="SGD">SGD</option>
						
						  <option value="THB">THB</option>
						
						  <option value="TRY">TRY</option>
						
						  <option value="TWD">TWD</option>
						
						  <option value="UAH">UAH</option>
						
						  <option selected="" value="USD">USD</option>
						
						  <option value="UYU">UYU</option>
						
						  <option value="VND">VND</option>
						
						  <option value="ZAR">ZAR</option>
						
					  </select>             
                                          </div> 
                                    </div>                                    
                                </div>
                            </div>
                              <p class="crgt"><?php echo isset($siteConfiguration->site_footer)?$siteConfiguration->site_footer:""?></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--bot foot-->
    </footer>
<!--[Footer End]-->
<!----------------------------------header resize------------------------------------------>
 <?php
     echo $this->Html->script(['Front/classie.js','Admin/bootstrap.min.js','Front/custom.js']);
 ?>
<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
/*header resize*/
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideDown("slow");
    });
  $("#close").click(function(){
        $("#panel").slideUp("slow");
    });
    $("#dro plog").click(function(){
        $("#dr opcont").toggle("slow");
    });
  $("#drop log2").click(function(){
        $("#dropcont2").toggle("slow");
    });
    $("#dro plog3").click(function(){
        $("#dropcont3").toggle("slow");
    }); 
    //$(".cake-error").css('display','none')
  
});
</script>

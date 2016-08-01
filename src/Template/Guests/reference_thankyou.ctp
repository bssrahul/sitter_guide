<!--[.innerpage-conent Area start]-->
<main>
  <section>
    <div class="innerpage-conent">
      <div class="thankyou-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
              <h1 class="thankyou-heading">
                <span>
                  <i>
                  </i>
                </span> 
                <?php echo $this->requestAction('app/get-translate/'.base64_encode('Thank you submit your claim request, its been added into your record!'));?>
              </h1>
              <p class="thankyou-text" >
                <?php echo $this->requestAction('app/get-translate/'.base64_encode('You will get $20 discount on you first booking with Sitter Guide'));?>
              </p>
            </div>
          </div>
        </div>
        <hr />
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h5 class="contact-text">
                <?php echo $this->requestAction('app/get-translate/'.base64_encode('Connect with us for the  Latest News & Update'));?>
              </h5>
              <?php 
              if(!empty($siteConfigurationData)){
				  foreach($siteConfigurationData as $siteConfiguration){?>
				  <ul class="list-inline text-center thanks-social-icon">
					<li>
					  <a href="<?php if(!empty(@$siteConfiguration->facebook_link)) {echo $siteConfiguration->facebook_link ;} ?>">
						<div class="thanks-facebook-icon">
						  <i class="fa fa-facebook" >
						  </i>
						</div>
					  </a>
					</li>
					<li>
					  <a href="<?php if(!empty(@$siteConfiguration->twitter_link)) { echo $siteConfiguration->twitter_link ; }?>">
						<div class="thanks-twiter-icon">
						  <i class="fa fa-twitter" >
						  </i>
						</div>
					  </a>
					</li>
					<li>
					  <a href="<?php if(!empty(@$siteConfiguration->google_link)) { echo $siteConfiguration->google_link ;} ?>">
						<div class="thanks-gplus-icon">
						  <i class="fa fa-google-plus" >
						  </i>
						</div>
					  </a>
					</li>
					<li>
					  <a href="<?php if(!empty(@$siteConfiguration->instagram_link)) { echo $siteConfiguration->instagram_link ;} ?>">
						<div class="thanks-linked-icon">
						  <i class="fa fa-linkedin" >
						  </i>
						</div>
					  </a>
					</li>
				  </ul>
              <?php }
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

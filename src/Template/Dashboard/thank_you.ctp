<!--[.innerpage-conent Area start]-->
<main>
  <section>
    <div class="innerpage-conent">
      <div class="thankyou-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
              <h1 class="thankyou-heading">
                <span >
                  <i>
                  </i>
                </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Congrats! Your payment has been recieved ')); ?>
              </h1>
              <p class="thankyou-title">
              </p>
              <p class="thankyou-text" >
                <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('What happens now')); ?>
                </span>
               <?php echo $this->requestAction('app/get-translate/'.base64_encode('A few tips for enjoying a great stay with Sitter Guide')); ?> 
              </p>
            </div>
          </div>
          <div class="wrapper-thankyou ">
            <div class="thankyou1">
              <div class="thankyou-icon">
                <span class="icon-1">
                </span>
              </div>
              <div class="thankyou-icon-righttext">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitters will bound to give his best service to you')); ?>
                </h3>
                <p><?php echo $this->requestAction('app/get-translate/'.base64_encode("The sitters you've contacted are likely to respond in under half an hour")); ?>
                </p>
              </div>
            </div>
           
           <div class="thankyou1 margt20">
              <div class="thankyou-icon">
                <span class="icon-3">
                </span>
              </div>
              <div class="thankyou-icon-righttext">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking will be  start as per scheduled date')); ?>
                </h3>
                <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your pet will be covered by our')); ?>
                  <a href="<?php echo HTTP_ROOT;?>insurance"><?php echo $this->requestAction('app/get-translate/'.base64_encode('premium pet insurance')); ?>
                  </a>.
                </p>
              </div>
            </div>
            <div class="thankyou1 margt20">
              <div class="thankyou-icon">
                <span class="icon-4">
                </span>
              </div>
              <div class="thankyou-icon-righttext">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode("Don't forgot to leave your rating along with valudable feedback")); ?>
                </h3>
                <p><?php echo $this->requestAction('app/get-translate/'.base64_encode("Your sitter wants to know about his services! We also curious to get more information about your booking, for making better your dog's stay will be next deal")); ?>.
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                <button class="btn  btn-block btn-return" onclick="location.href='<?php echo HTTP_ROOT; ?>" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Return to home page')); ?>
                </button>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h5 class="contact-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Connect with us for the  Latest News & Update'));?></h5>
				<?php foreach($siteConfigurationData as $siteConfiguration){?>
							  
				<ul class="list-inline text-center thanks-social-icon">
				<li>
				<a href="<?php if(!empty(@$siteConfiguration->facebook_link)) {echo $siteConfiguration->facebook_link ;} ?>">
				<div class="thanks-facebook-icon"><i class="fa fa-facebook" ></i></div>
				</a>
				</li>

				<li>
				<a href="<?php if(!empty(@$siteConfiguration->twitter_link)) { echo $siteConfiguration->twitter_link ; }?>">
				<div class="thanks-twiter-icon"><i class="fa fa-twitter" ></i></div>
				</a>
				</li>

				<li>
				<a href="<?php if(!empty(@$siteConfiguration->google_link)) { echo $siteConfiguration->google_link ;} ?>">
				<div class="thanks-gplus-icon"><i class="fa fa-google-plus" ></i></div>
				</a>
				</li>

				<li>
				<a href="<?php if(!empty(@$siteConfiguration->instagram_link)) { echo $siteConfiguration->instagram_link ;} ?>">
				<div class="thanks-linked-icon"><i class="fa fa-linkedin" ></i></div>
				</a>
				</li>


				</ul>
				<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

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
                </span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Congrats! Your messages were sent')); ?> 
              </h1>
              <p class="thankyou-title">
              </p>
              <p class="thankyou-text">
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
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode(' Sitters will respond soon')); ?>
                </h3>
                <p><?php echo $this->requestAction('app/get-translate/'.base64_encode("The sitters you've contacted are likely to respond in under half an hour")); ?>
                </p>
              </div>
            </div>
            <div class="thankyou1 margt20">
              <div class="thankyou-icon">
                <span class="icon-2">
                </span>
              </div>
              <div class="thankyou-icon-righttext">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Schedule a Meet & Greet')); ?>
                </h3>
                <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('After your sitter contacts you, schedule a Meet & Greet. This is a great chance for you, your dog and your sitter to all get to know each other')); ?>
                </p>
              </div>
            </div>
            <div class="thankyou1 margt20">
              <div class="thankyou-icon">
                <span class="icon-3">
                </span>
              </div>
              <div class="thankyou-icon-righttext">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Book Through Rover')); ?>
                </h3>
                <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pay for your stay through Rover and your pet will be covered by our')); ?> 
                  <a href="#"><?php echo $this->requestAction('app/get-translate/'.base64_encode('premium pet insurance')); ?>
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
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode("Fill out your dog's profile")); ?>
                </h3>
                <p>
					<?php echo $this->requestAction('app/get-translate/'.base64_encode("Your sitter wants to know all about your amazing dog! The more information your sitter has, the 
                  better your dog's stay will be.")); ?>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button class="btn  btn-block btn-return" onclick="location.href='<?php echo HTTP_ROOT.'search/search-by-location/'; ?>'" ><?php echo $this->requestAction('app/get-translate/'.base64_encode("Return to search")); ?>
                </button>
              </div>
              <!--
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <button class="btn btn-update btn-block ">UPDATE YOUR DOG PROFILE 
                </button>
              </div>
              -->
            </div>
          </div>
        </div>
        <hr />
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h5 class="contact-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Connect with us for the  Latest News & Update')); ?>
              </h5>
              <ul class="list-inline text-center thanks-social-icon">
                <li>
                  <a href="#">
                    <div class="thanks-facebook-icon">
                      <i class="fa fa-facebook" >
                      </i>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="thanks-twiter-icon">
                      <i class="fa fa-twitter" >
                      </i>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="thanks-gplus-icon">
                      <i class="fa fa-google-plus" >
                      </i>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="thanks-linked-icon">
                      <i class="fa fa-linkedin" >
                      </i>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

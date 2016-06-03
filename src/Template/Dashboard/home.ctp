<div class="col-lg-10 col-md-9  col-sm-8 col-xs-12  lg-width80">
  <div class="row db-top-bar-header no-padding-left no-padding-right">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <h3>
		  <?php $action = $this->request->params['action']; 
   
     $session = $this->request->session();
     $profile = $session->read('profile');?>
     
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> 
        <?php if($profile == 'sitter'){ echo "Sitter Profile Status"; }else{ 'Guest Profile Status'; }?>
      </h3>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li>  You are here : 
        </li>
        <li>
          <a href="<?php echo HTTP_ROOT; ?>">Home
          </a>
        </li>
        <li class="active">Profile
        </li>
      </ol>              
    </div>
  </div>
  <div class="row">
	<?php if($profile == 'sitter'){ ?>
	<div class="col-xs-12 col-sm-6 col-md-12 col-lg-7">
      <div class="row stylish-panel">
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/profile"; ?>'" >
            <h4 class="blue">General Profile
            </h4>
            <!--<div class="gp-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i1.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="check-icon">
                  </span> Photos
                </li>
                <li>
                  <span class="cross-icon">
                  </span> Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/house"; ?>'" >
            <h4 class="orange">Sitter House
            </h4>
            <!--<div class="sh-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i2.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="cross-icon">
                  </span>  Photos
                </li>
                <li>
                  <span class="check-icon">
                  </span> Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/about-sitter"; ?>'" >
            <h4 class="green">About Sitter
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i3.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="cross-icon">
                  </span>  Photos
                </li>
                <li>
                  <span class="check-icon">
                  </span>Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div> 
      </div>
    </div>	
    <div class="col-xs-12 col-sm-6 col-md-12 col-lg-5">
      <div class="row stylish-panel">
        <div class="col-md-4 col-lg-6 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/professional-accreditations"; ?>'" >
            <h4 class="carrot"> Skills & Accriditations
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i4.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="cross-icon">
                  </span>  Photos
                </li>
                <li>
                  <span class="check-icon">
                  </span> Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div>  
        <div class="col-md-4 col-lg-6 col-sm-12 top-padd20 col-xs-12">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/services-and-rates"; ?>'" >
            <h4 class="pink">Services & Rates
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i5.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="cross-icon">
                  </span>  Photos
                </li>
                <li>
                  <span class="check-icon">
                  </span> Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <?php }else{ ?>
		<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
      <div class="row stylish-panel">
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/profile"; ?>'" >
            <h4 class="blue">General Profile
            </h4>
            <!--<div class="gp-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i1.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="check-icon">
                  </span> Photos
                </li>
                <li>
                  <span class="cross-icon">
                  </span> Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/house"; ?>'" >
            <h4 class="orange">Guest House
            </h4>
            <!--<div class="sh-icon">
</div>-->
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i2.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="cross-icon">
                  </span>  Photos
                </li>
                <li>
                  <span class="check-icon">
                  </span> Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div> 
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 top-padd20">
          <div class="full-box" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/about-guest"; ?>'" >
            <h4 class="green">About Guest
            </h4>
            <img src="<?php echo HTTP_ROOT; ?>img/db-profile-i3.png" alt="General Profile" class=" img-thumbnail">
            <div class="border-top" >
              <ul class="list-unstyled text-left">
                <li>
                  <span class="check-icon">
                  </span> Details
                </li>
                <li>
                  <span class="cross-icon">
                  </span>  Photos
                </li>
                <li>
                  <span class="check-icon">
                  </span>Testimonials
                </li>
                <li>
                  <span class="check-icon">
                  </span> Safety
                </li>
                <li class="border-none">
                  <span class="check-icon">
                  </span> Background
                </li>
              </ul>
            </div>
          </div>
        </div> 
      </div>
    </div>
		<?php } ?>
  </div>
</div>

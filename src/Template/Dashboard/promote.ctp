<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Promote
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> You are here : 
        </li>
        <li>
          <a href="#">Home
          </a>
        </li>
        <li class="active">Promote
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
      <div class="earn-more"> Earn More, Play More
      </div>
      <div class="earnmor2wrapper">
        <p class="text-earn ">Attract new clients and their dogs by  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since thesharing your Siter Guide profile link and promo code. Your promo code gives pet owners new to Siterguide $20 off their first booking—while you’ll still earn your full rate.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the pet owners new to Siterguide $20 off their first booking—while you’ll still earn your full rate.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the Lorem Ipsum is simply dummy text of Lorem Ipsum has been .
        </p>
        <p class="generate-promo">Generate your promocode
        </p>
        <div class="generate-wrap">
           <?php echo $this->Form->create(null,[
						  'url' => ['controller' => 'dashboard', 'action' => 'generate-promocode'],
						  'class'=>'form-inline',
						  'id'=>'referFormPromocode',
					 ]);?>
			 <div class="row">
				<div class="col-sm-6" style="margin-left:40px">
				 <p class="successMessage clr otp_success_msg"></p>
				 <p class="errorMessage clr otp_error_msg"></p>
			   </div>  
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12" style="vertical-align: middle; position: relative; top: 25px; float: left; text-align: right; font-size: 14px;">
					  <?php echo $refer_url; ?>
					  </div>
					  <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
						<!--<input type="text" class="form-control generat-field" style="width:100%;">-->
						 <?php 
							  echo $this->Form->input('UserPromocode.promocode',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label'=>false,
									'class' =>'form-control generat-field',
									'style'=>'width:100%',
									'value'=>@$reference_code
							 ]);
                       ?>
					  </div>
					  <?php if(empty(@$reference_code)){ ?>
					  <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
						<button class="btn btn-primary btn-block generat-btn" id="refer-promocode-btn" >Generate
						</button>
					  </div>
					  <?php } ?>
				</div>
            </div>
          <?php echo $this->Form->end(); ?>
        </div>
        <p class="text-earn1 ">Attract new clients and their dogs by  Lorem Ipsum is simply dummy text of the printing and typesetting their dogs by  Lorem Ipsum is simply dummy text of the printing and typesetting  industry. Lorem Ipsum has been the industry's standard dummy text ever since thesharing your Siter Guide profile link and promo code. Your promo code gives pet owners new to Siterguide $20 off their first booking—while you’ll still earn your full rate.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standaand typesetting industry. Lorem Ipsum has been Lorem Ipsum has been the industry's standaand Ipsum has been Lorem Ipsum has been the industry's standaand typesetting has been . 
        </p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
      <div class="sitter-balance-wrapper">
        <div class="balace-head">
          <h5>Promote Your Business
          </h5>
        </div>
        <div class="promote-wrap1">  
          <p class="para">Share In Person: Order custom items, like business cards, that include your link and code. Then, share them with friends, neighbors, and family to spread the word. 
          </p>
          <h5>Share online
          </h5>
          <p class="top10p">
            Share your profile online to attract new clients. 
          </p>
          <ul class=" list-unstyled prom-social">
            <li>
              <a href="#">
                <i class="fa fa-facebook-square">
                </i> Post On Facebook 
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-twitter">
                </i> Post On Twitter 
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-pencil">
                </i> Post On Craigslist 
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-linkedin-square">
                </i> Post On Linkedin 
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-map-marker">
                </i>&nbsp; Post On Google Places 
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-arrow-up">
                </i> Post On NextDoor 
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-envelope">
                </i> Email your Profile 
              </a>
            </li>
          </ul>
          <p class="prom-visit"> 
            <a href="#">Visit our Sitter Resources Center for more advice on growing your business.
            </a> 
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

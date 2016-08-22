<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Promote')); ?>
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> <?php echo $this->requestAction('app/get-translate/'.base64_encode('You are here')); ?> : 
        </li>
        <li>
          <a href="#"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Home')); ?>
          </a>
        </li>
        <li class="active"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Promote')); ?>
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
      <div class="earn-more"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Earn More, Play More')); ?>
      </div>
      <div class="earnmor2wrapper">
        <p class="text-earn "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Attract new clients and their dogs by  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since thesharing your Siter Guide profile link and promo code. Your promo code gives pet owners new to Siterguide $20 off their first booking—while you’ll still earn your full rate.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the pet owners new to Siterguide $20 off their first booking—while you’ll still earn your full rate.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the Lorem Ipsum is simply dummy text of Lorem Ipsum has been')); ?> .
        </p>
        <p class="generate-promo">
			 <?php if(empty(@$reference_code)){ echo $this->requestAction('app/get-translate/'.base64_encode("Generate your promocode")); }else{ echo $this->requestAction('app/get-translate/'.base64_encode("Your Promotion Link")); }?>
        </p>
        <div class="generate-wrap">
           <?php echo $this->Form->create(null,[
						  'url' => ['controller' => 'dashboard', 'action' => 'generate-promocode'],
						  'class'=>'form-inline',
						  'id'=>'referFormPromocode',
					 ]);?>
			 <div class="row">
				
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					 <?php if(empty(@$reference_code)){ ?>
					  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					  <?php echo $refer_url; ?>
					  </div>
					<?php }else{ ?>  
					    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					  <?php echo $refer_url.@$reference_code; ?>
					   </div>
					<?php } ?>
			 <?php if(empty(@$reference_code)){ ?>
					  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
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
                       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						 <p class="successMessage clr otp_success_msg"></p>
						 <p class="errorMessage clr otp_error_msg"></p>
						</div>  
					  </div>
					  <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
						<button type="submit" class="btn btn-primary btn-block generat-btn" id="refer-promocode-btn" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Generate')); ?>
						</button>
					  </div>
					  <?php } ?>
				</div>
            </div>
          <?php echo $this->Form->end(); ?>
        </div>
        <p class="text-earn1 "><?php echo $this->requestAction('app/get-translate/'.base64_encode("Attract new clients and their dogs by  Lorem Ipsum is simply dummy text of the printing and typesetting their dogs by  Lorem Ipsum is simply dummy text of the printing and typesetting  industry. Lorem Ipsum has been the industry's standard dummy text ever since thesharing your Siter Guide profile link and promo code. Your promo code gives pet owners new to Siterguide $20 off their first booking—while you’ll still earn your full rate.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standaand typesetting industry. Lorem Ipsum has been Lorem Ipsum has been the industry's standaand Ipsum has been Lorem Ipsum has been the industry's standaand typesetting has been")); ?> . 
        </p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
      <div class="sitter-balance-wrapper">
        <div class="balace-head">
          <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Promote Your Business')); ?>
          </h5>
        </div>
        <div class="promote-wrap1">  
          <p class="para"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Share In Person: Order custom items, like business cards, that include your link and code. Then, share them with friends, neighbors, and family to spread the word')); ?>. 
          </p>
          <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Share online')); ?>
          </h5>
          <p class="top10p">
            <?php echo $this->requestAction('app/get-translate/'.base64_encode('Share your profile online to attract new clients')); ?>. 
          </p>
          <ul class=" list-unstyled prom-social">
            <li>
            
				<a href="javascript:void(0)"
				    onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=<?php echo @$promotion_url; ?>')">
				  <i class="fa fa-facebook-square">
                  </i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Post On Facebook')); ?>
               </a>   
			   
			</li>
            <li>
			<a href="javascript:void(0)"
              onclick="javascript:genericSocialShare('http://twitter.com/share?text=<?php echo @$promotion_url; ?>')">
                <i class="fa fa-twitter">
                </i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Post On Twitter')); ?> 
              </a>
            </li>
            <li>
			<a href="javascript:void(0)"
              onclick="javascript:genericSocialShare('http://pinterest.com/pin/create/button/?url=<?php echo @$promotion_url; ?>')">
                <i class="fa fa-pinterest">
                </i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Post On Craigslist')); ?> 
              </a>
            </li>
           <!-- <li>
              <a href="javascript:void(0)"
                onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>')">
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
            </li>-->
          </ul>
          <p class="prom-visit"> 
            <a href="#"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Visit our Sitter Resources Center for more advice on growing your business')); ?>.
            </a> 
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
}
</script>

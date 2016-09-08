<!--[Banner Area Start]-->

<section class="banner-area-partners">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <div class="ibc-outer">
      	<div class="inner-ban-cont">
        <h3 ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Community Directory')); ?></h3>
        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Meet some of your friendly neighbourhood partners')); ?> </p>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--[Banner Area End]--> 


<!--content area Start-->
<main > 
  
  <!-- Get in Touch starts-->
  
  <section >
<!--Pet Shop Wrap-->
<section class="pet-shop-wrap">
	<div class="container">
    	<div class="row">
        		 <div class="col-xs-12 col-md-12 col-sm-12">
           <div class="head-box">                    	
                        	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('We invite you to contact any of our Community Directory partners')); ?> .<span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('They’re here for you')); ?> .</span> </p>
                            <span class="head-bot"><b></b></span>
                    </div>
          </div>
        </div>
    </div>
    
    <div class="ps-area">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div class="ps-box">
                	<ul>
                    	<li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?> </li>
						<li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                        <li><span><img src="<?php echo HTTP_ROOT; ?>img/pet-shop-icon.png"  alt="Pet Shop"/></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Pet Shop')); ?></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    </section>
    
<!--/Pet Shop Wrap-->
  
    <div class="container">
      <div class="row privacy-top">         
    </div>
      <div id="partners-content">
        <div class="row">
         
        </div>
        <div class="row">
			 <?php if(!empty($partnersData)){
			   foreach($partnersData as $single_partner){	 
			 ?>	
			  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="partner-outer-box">
				  <div class="media">
					<div class="media-left"> <img src="<?php echo HTTP_ROOT."img/uploads/".($single_partner->image != ""?$single_partner->image:"prof_photo.png"); ?>" class="partner-img" width="98" height="98" alt="dummy"></div>
					<div class="media-body">
					  <h4 class="media-heading"><?php echo $single_partner->title; ?></h4>
					  <h6 class="parter-heading-small"><?php echo $single_partner->short_description."."; ?></h6>
					</div>
				  </div>
				  <p class="partner-lower-text"><?php echo $single_partner->description."."; ?> </p>
				  <div class="text-right"> <a href="#"  ><i class="fa fa-arrow-circle-right partner-right-arrow"></i></a> </div>
				</div>
			  </div>
			  <?php }
			  } ?>
         </div>
         <div class="row">
		   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			  <div class=" text-center btn-padding">
					<div class="review-pagination favPagination ">
						<ul class="list-inline">
							<?php
								if($this->Paginator->hasPrev()){
									echo $this->Paginator->prev("Prev", array('tag' => 'li'), null, array('tag' => 'li','class' => 'nxt'));
								}
								echo $this->Paginator->numbers(array('modulus' =>1));
								if($this->Paginator->hasNext()){
									echo $this->Paginator->next("Next", array('tag' => 'li'), null, array('tag' => 'li','class' => 'nxt'));
								}
							?>
						</ul>
					</div>
				</div>
			</div>
         </div>
      </div>
    </div>
  </section>
  
  <!-- Get in Touch ends--> 
  <!--[Fun News]-->
  <?php echo $this->element('frontElements/guests/fun_and_news'); ?>
  <!--[Fun News]--> 
  
</main>
<!--[content area End]--> 

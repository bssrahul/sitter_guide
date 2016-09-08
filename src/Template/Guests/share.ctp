<!--[Banner Area Start]-->
<section class="refer-banner"> 
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
<h3 class="refer-big-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode("You've received a $20 gift* from a friend"));?></h3>
<p class="refer-text-small"><?php echo $this->requestAction('app/get-translate/'.base64_encode("Create your free sitterguide account and the $20 credit will be automatically deposited into your account"));?>.</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
<div class="referform-outer">
                 <h4 class="claim-top-heading">
                       <?php echo $this->requestAction('app/get-translate/'.base64_encode("Claim My $20"));?> 
                    </h4>
                 <div>       
            <?php echo $this->Form->create(@$userData,[
              'url' => ['controller' => 'guests', 'action' => 'share'],
              'id'=>'shareSignUpInfo',
              'autocomplete'=>'off'
			]);
			echo $this->Form->input('Users.reference_promocode',[                
			 'type'=>'hidden',
			 'value'=>@$rf_token
			]);
			echo $this->Form->input('Users.reference_type',[                
			 'type'=>'hidden',
			 'value'=>@$token
			]);
			?>
		   <?php 
			echo $this->Form->input('Users.first_name',[                
			 'required'=>false,
			 'label'=>false,
			 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('First Name')),
			 'templates' => ['inputContainer' => '{{content}}']
			  ]);
		
			echo $this->Form->input('Users.last_name',[                
			 'required'=>false,
			 'label'=>false,
			 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Last Name')),
			 'templates' => ['inputContainer' => '{{content}}']
			  ]);
			
			echo $this->Form->input('Users.zip',[                
				 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Post / Zip Code')),
				 'label'=>false,
				 'templates' => ['inputContainer' => '{{content}}']
			  ]);
			 echo $this->Form->input('Users.email',[                
				 'label'=>false,
				 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Email Address')),
				 'templates' => ['inputContainer' => '{{content}}'],
				 'required'=>false
			  ]);
			  echo $this->Form->input('Users.password',[                
				 'type'=>'password',
				 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Password')),
				 'label'=>false,
				 'templates' => ['inputContainer' => '{{content}}']
			  ]);
			 echo '<em class="signup_error error">'.__(@$error['current_password'][0]).'</em>';
        ?>
      
      <button class="btn btn-claim btn-block" type="submit"> <?php echo $this->requestAction('app/get-translate/'.base64_encode("Claim My $20"));?></button>
      
    <?php echo $this->Form->end(); ?>
    
     <p class="prvacy-guranted"> <?php echo $this->requestAction('app/get-translate/'.base64_encode("100% Privacy Guaranteed"));?> .</p>
          </div>

</div>

</div></div></div>
</section>
<!--[Banner Area End]--> 


<main>
<section class="howworks-refer">
<div class="container">
<div class="row">



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="head-box mar80top">
          <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode("How it Works?"));?></h3>
          <p><?php echo $this->requestAction('app/get-translate/'.base64_encode("Find how sitterguide works to meets your expectations"));?>.</p>
          <span class="head-bot"><b></b></span> </div>

</div>


</div>


<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="referhowitworks">
<i><img src="<?php echo HTTP_ROOT; ?>img/ref1-1.png" class="img-responsive center-block" alt=""/></i>
<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode("Start Your Search"));?></h3>
<p><?php echo $this->requestAction('app/get-translate/'.base64_encode("Search by zip code to find pet sitters and dog walkers in your neighborhood"));?>.</p>


</div>

</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="referhowitworks">
<i><img src="<?php echo HTTP_ROOT; ?>img/ref2-1.png" class="img-responsive center-block" alt=""/></i>
<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode("Meet In-Person"));?></h3>
<p><?php echo $this->requestAction('app/get-translate/'.base64_encode("Connect with a dog walker who's a good fit for you, your dog, and your lifestyle"));?>.</p>


</div>

</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

<div class="referhowitworks">
<i><img src="<?php echo HTTP_ROOT; ?>img/ref3-1.png" class="img-responsive center-block" alt=""/></i>
<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode("Book and Pay"));?></h3>
<p><?php echo $this->requestAction('app/get-translate/'.base64_encode("All payments are processed through Rover's secure platform—just like that!"));?></p>


</div>

</div>


</div>


<div></div>
</div>


</section>
<style>
label.error, div.error-message {
  color: #ff5a5f !important;
  float: right !important;
  font-size: 12px !important;
  font-weight: normal !important;
  position: relative !important;
  text-align: right !important;
  top: -7px !important;
}
</style>
<!--

<section class="why-choose-us bg-white">
    <div class="container">
      <div class="wcu-area"> 
        <!--heading
        <div class="head-box">
          <h3>Why Choose us?</h3>
          <p>Find some of the funniest pet pics & videos along with news updates here</p>
          <span class="head-bot"><b></b></span> </div>
        <!--/heading
        <div class="wcub-area refer-marginbot80px">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="wcu-box">
                <div class="img-box"> </div>
                <p class="txt-head">Great for your pet</p>
                <p>Caring, personalized attention <b> No kennels, no cages</b> <b>Stay locally in the community</b> <b>Retain familiar items (bed, toys,</b> treats, etc.) </p>
                <a href="#"  title="Read More" class="btn-1">READ MORE <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="wcu-box">
                <div class="img-box img-box-2"> </div>
                <p class="txt-head">Great for you</p>
                <p>Caring, personalized attention <b> No kennels, no cages</b> <b>Stay locally in the community</b> <b>Retain familiar items (bed, toys,</b> treats, etc.) </p>
                <a href="#"  title="Read More" class="btn-1">READ MORE <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="wcu-box">
                <div class="img-box img-box-3"> </div>
                <p class="txt-head">Trust and Safety</p>
                <p>Caring, personalized attention <b> No kennels, no cages</b> <b>Stay locally in the community</b> <b>Retain familiar items (bed, toys,</b> treats, etc.) </p>
                <a href="#"  title="Read More" class="btn-1">READ MORE <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="wcu-box">
                <div class="img-box img-box-4"> </div>
                <p class="txt-head">Trust and Safety</p>
                <p>Caring, personalized attention <b> No kennels, no cages</b> <b>Stay locally in the community</b> <b>Retain familiar items (bed, toys,</b> treats, etc.) </p>
                <a href="#"  title="Read More" class="btn-1">READ MORE <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
</main>-->
	<?php 
		echo $this->element('frontElements/guests/why_choose'); 
		echo $this->element('frontElements/guests/fun_and_news');
	?>

<!--<section class="fun-news refer-padding0px">
    <div class="container">
    </div>
    <div class="fn-bot refer-margin0px">
      <ul>
        <li>
          <div class="fn-outer">
            <div class="img-box"> <img src="<?php echo HTTP_ROOT; ?>img/mn-img-1.png"  alt="" /> </div>
            <div class="ho-box">
              <div class="hb-inner">
                <p class="txt-head">Sitter Guide</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                <a href="#" title="Read More" class="btn-2">Read More <i class="fa fa-chevron-circle-right"></i> </a> </div>
            </div>
          </div>
        </li>
        <li>
          <div class="fn-outer">
            <div class="img-box"> <img src="<?php echo HTTP_ROOT; ?>img/mn-img-2.png"  alt="" /> </div>
            <div class="ho-box">
              <div class="hb-inner">
                <p class="txt-head">Sitter Guide</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                <a href="#" title="Read More" class="btn-2">Read More <i class="fa fa-chevron-circle-right"></i> </a> </div>
            </div>
          </div>
        </li>
        <li>
          <div class="fn-outer">
            <div class="img-box"> <img src="<?php echo HTTP_ROOT; ?>img/mn-img-3.png"  alt="" /> </div>
            <div class="ho-box">
              <div class="hb-inner">
                <p class="txt-head">Sitter Guide</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                <a href="#" title="Read More" class="btn-2">Read More <i class="fa fa-chevron-circle-right"></i> </a> </div>
            </div>
          </div>
        </li>
        <li>
          <div class="fn-outer">
            <div class="img-box"> <img src="<?php echo HTTP_ROOT; ?>img/mn-img-4.png"  alt="" /> </div>
            <div class="ho-box">
              <div class="hb-inner">
                <p class="txt-head">Sitter Guide</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                <a href="#" title="Read More" class="btn-2">Read More <i class="fa fa-chevron-circle-right"></i> </a> </div>
            </div>
          </div>
        </li>
        <li>
          <div class="fn-outer">
            <div class="img-box"> <img src="<?php echo HTTP_ROOT; ?>img/mn-img-5.png"  alt="" /> </div>
            <div class="ho-box">
              <div class="hb-inner">
                <p class="txt-head">Sitter Guide</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                <a href="#" title="Read More" class="btn-2">Read More <i class="fa fa-chevron-circle-right"></i> </a> </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>-->

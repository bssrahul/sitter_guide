<?php echo $this->Html->css('Front/dist/jquery.onoff.css');
		echo $this->Html->script(['Front/dist/jquery.onoff.js']);
?>
<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT."img/db-profile-home-icon.png" ;?>" alt="db-profile-home-icon">&nbsp<?php echo $this->requestAction('app/get-translate/'.base64_encode('Communication')); ?> 
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> <?php echo $this->requestAction('app/get-translate/'.base64_encode('You are here :')); ?>  
        </li>
        <li>
          <a href="#"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Home')); ?>  
          </a>
        </li>
        <li class="active"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Communication')); ?>  
        </li>
      </ol>
    </div>
  </div>
  <div class="communication-wrap">
    <div class="row">
	 <?php 
					echo $this->Form->create(@$communication_info, [
					'url' => ['controller' => 'dashboard', 'action' => 'communication'],
					'role'=>'form',
					'id'=>'communication_data',
					'autocomplete'=>'off',
					]);
					echo $this->Form->input('Communication.id',[
							  'type'=>'hidden',
							  'value'=>@$communication_id
					]);
					?>
		
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="comm-text">
          <h5>	<?php echo $this->requestAction('app/get-translate/'.base64_encode('Which Phone Would you prefer to use for yexy notifications')); ?>	 	
          </h5>
		  <?php 
                      echo $this->Form->input('Communication.phone_notification',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label'=>false,
                        'options'=>@$phoneArr,
                        'class' =>'form-control',
                        ]);
                      ?>
       </div>
        <div class="comm-box1">
          <div class="row">
           
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6>	<?php echo $this->requestAction('app/get-translate/'.base64_encode('Quite Time')); ?> 		
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch ">
                  <?php  echo $this->Form->input('Communication.quite_time',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay delivery of nighttime text messages until the following morning.')); ?>
          </p>
          <div id="box1" class="collapse">
            <div class="row box-padt">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="box-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Start of quiet hours')); ?>
                </p>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <select id="sel1" class="form-control">
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                </select>
              </div>
            </div>
            <div class="row box-padt">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="box-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Start of quiet hours')); ?>
                </p>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <select id="sel1" class="form-control">
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                  <option><?php echo $this->requestAction('app/get-translate/'.base64_encode('Delay text message after this time')); ?>
                  </option>
                </select>
              </div>
            </div>
          </div>     
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('New Enquiries')); ?>	
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch">
                   <?php  echo $this->Form->input('Communication.new_enquiries',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Text me when I receive a new message or request.')); ?>
          </p>
          <!--<div id="box2" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->     
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('New Message')); ?>	
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch">
					<?php  echo $this->Form->input('Communication.new_message',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Text me all my Sitter Guide messages after the initial request.

')); ?>
          </p>
          <!--<div id="box3" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div></div>-->
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('New Booking Request')); ?>	
              </h6>
            </div>
            <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch">
                   <?php  echo $this->Form->input('Communication.new_booking_request',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Text me when I have a new Sitter Guide booking request.

')); ?>
          </p>
          <!--<div id="box4" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking Declined')); ?>	
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch">
                   <?php  echo $this->Form->input('Communication.booking_declined',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Text me when a Sitter Guide booking is declined.

')); ?>
          </p>
          <!--<div id="box5" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking Confirmed')); ?>
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch">
                   <?php  echo $this->Form->input('Communication.booking_confirmed',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Text me when a Sitter Guide booking is confirmed.

')); ?>
          </p>
          <!--<div id="box6" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->  
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('Send MMS')); ?>
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch">
                   <?php  echo $this->Form->input('Communication.send_mms',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Send me an MMS for a notification containing a media file.')); ?>
          </p>
          <!--<div id="box6" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->     
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="comm-text">
          <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Other may call my anonymized Sitter Guide number when')); ?> 		
          </h5>			     
					 <?php 
						echo $this->Form->input('Communication.phone_call',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'type'=>'select',
                        'label'=>false,
                        'options'=>@$phoneArr,
                        'class' =>'form-control',
                        ]);
                      ?>


	
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-9"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode("I'd prefer not to have my rates adjusted by Sitter Guide. I understand that by doing so, 
                I may make less for my services than similarly situated sitters in my area.")); ?>
              </h6>
            </div>
            <div class="col-xs-4 col-sm-8 col-md-8 col-lg-3">
              <div class="chek-main-lat">
                <div class="onoffswitch">
                   <?php  echo $this->Form->input('Communication.in_area',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <!--<div id="box9" class="collapse">
<p class="box-small-text">sdfk lkdfj k lkfv s lkd flskd dk kdf sldfk lksd</p>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->     
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('Marketing')); ?>
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch in">
                   <?php  echo $this->Form->input('Communication.marketing',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide may use your public profile to help drive awareness of your services and Sitter Guide.')); ?>
          </p>
          <!--<div id="box8" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->     
        </div>
        <div class="comm-box1">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
              <h6><?php echo $this->requestAction('app/get-translate/'.base64_encode('Hide Stay Images')); ?>
              </h6>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="chek-main-lat">
                <div class="onoffswitch">
                  <?php  echo $this->Form->input('Communication.hide_stay_image',[
						'templates' => ['inputContainer' => '{{content}}'],
						'type'=>'checkbox',
						'label' =>false,
						'class'=>'selectedCheckbox',
						'hiddenField' => false
						]);
					?>
                </div>
              </div>
            </div>
          </div>
          <p class="box-small-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode("Check this if you don't want photos you take during a booking to be publicly visible on your profile.")); ?>
          </p>
          <!--<div id="box9" class="collapse">
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
<div class="row box-padt">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<p class="box-text">Start of quiet hours</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<select id="sel1" class="form-control">
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
<option>Delay text message after this time</option>
</select>
</div>
</div>
</div>-->     
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button class="btn btn-comm-save"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Save')); ?>
        </button>
        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function (){
      $('.selectedCheckbox').click(function(){
            $(this).parent().parent().toggleClass("selected");
        });
   
    })
   /*For on-off button*/
    $(function(){
          $('input[type=checkbox]').onoff();
    });
       /*End of-off button*/
  
</script>

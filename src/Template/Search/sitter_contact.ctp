<?php 
  echo $this->Html->css(['Front/jquery-ui.css']); 
  echo $this->Html->script(['Front/jquery-ui.js']);
?>
<!--[Inner Content]-->
<section class="inner-cont">
  <!--[Contact Sitter Start]-->  
      <section class="cont-sitter">
          <div class="cs-ban-area">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="csb-cont">
                               <img src="<?php echo HTTP_ROOT; ?>img/profile-pic.png" alt="Profile Picture" /> 
                                 <h1 class="name"> Contact  - <span>Alyce B</span></h1>
                                  <p>Dog Loving Family</p>
                                    <p class="ads">Woolloomooloo, New South Wales, Sydney</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs-mid-cont">
              <div class="csmc-area">
                <?php //echo $this->request->pass; ?>
                <div class="sr-area"> 
                      <!--top filter tab-->
                       <?php echo $this->Form->create(@$booking_data, [
                          'url' => ['controller' => 'search', 'action' => 'sitter-contact'],
                          'id'=>'bookingContact',
                        ]);
                        ?>
                      <div class="top-filter-tab">
                        <ul>
                          <li><a class="boarding" href="#boarding" data-toggle="tab"> 
                            <span data-rel="boarding"></span> Boarding<br>
                            <b>in the sitter home</b> </a>
                          </li>
                          <li><a class="h-sitting" href="#hsitting" data-toggle="tab">
                            <span data-rel="house_sitting"></span> House Sitting<br>
                            <b>in your home</b></a>
                          </li>
                          <li class=""><a class="d-visit" href="#dvisit" data-toggle="tab" aria-expanded="false">
                            <span data-rel="drop_in_visit"></span> Drop-in Visit<br>
                            <b>in your home</b></a>
                          </li>                         
                        </ul>
                        <!-- Start Required service-->
                            <?php echo $this->Form->input('BookingRequests.required_services',[
                            'label' => false,
                            'type'=>'hidden',
                            'readonly'=>true,
                            'id'=>'required_services']);
                            ?>
                      </div>
                      <!--End reqired service-->   
                      
                      <!--Date-->      
                        <div class="hs-date">
                          <h1 class="hsd-head">House Boarding Dates</h1>
                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <div class="fromto">
                                     <!-- <input type="text">-->
                                      <?php  
                                        echo $this->Form->input('BookingRequests.booking_start_date',[               
                                        'templates' => ['inputContainer' => '{{content}}'],
                                        'label'=>false,
                                        'readonly'=>true,
                                        'placeholder'=>'DD-MM-YYYY', 
                                        ]);
                                      ?>
                                      <a href="javascript:void(0)" title="Calender" class="display-calender1"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png" width="21" height="21" alt="Calender"></a>
                                    </div>
                                </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <div class="fromto">
                                      <!--<input type="text">-->
                                     <?php  
                                        echo $this->Form->input('BookingRequests.booking_end_date',[               
                                        'templates' => ['inputContainer' => '{{content}}'],
                                        'label'=>false,
                                        'readonly'=>true,
                                        'placeholder'=>'DD-MM-YYYY', 
                                        ]);
                                      ?>
                                      <a href="javascript:void(0)" title="Calender" class="display-calender"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png" width="21" height="21" alt="Calender"></a>
                                    </div>
                                </div>                                
                            </div>
                            <p>For your safety & security, Rover will not expose your phone number until you've booked your stay. Messages from Agatha will come from 858-914-2079, a number owned by sitter guide. </p>
                        </div>
                      <!--/Date-->  
                      <!--add dog-->
                      <div class="ad-dog"> 
                          <h2>Dogs</h2>   
                            <div class="row">
                              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                  <div class="dog-list">
                                  <ul>
                                      <li><input type="checkbox"> Dog Name</li>
                                        <li><input type="checkbox"> Dog Name</li>
                                    </ul>
                                    </div>
                                </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <div class="ad">
                                      <a href="#" title="Add Dogs"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Another Dogs</a>
                                    </div>
                                </div>                                                                
                            </div>
                       </div>    
                      <!--/add dog-->
                      <!--message-->
                        <div class="msg">
                          <h3>Message</h3>
                            <p>Share a little info about your dog and why they'd have a great time with Agatha. </p>
                            <!--<textarea class="txtarea"></textarea>-->
                             <?php  
                                echo $this->Form->input('BookingRequests.message',[               
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'class'=>'txtarea',
                                'type'=>'textarea' 
                                ]);
                              ?>
                            <p>
                              <!--<input type="checkbox"> -->
                               <?php  
                                echo $this->Form->input('BookingRequests.recieved_photo_during_stay',[               
                                'templates' => ['inputContainer' => '{{content}}'],
                                'label'=>false,
                                'type'=>'checkbox',
                                'hiddenField'=>false 
                                ]);
                              ?>
                              I'd like to receive photos of my dog(s) during this stay. </p>
                            <button type="submit" class="btn btn-success send-msg">SEND MESSAGE</button>
                            <p>All stays booked through Rover are covered by premium insurance. </p>
                        </div>
                        <?php echo $this->Form->end(); ?>
                      <!--/message-->
          
            </div>
                </div>
            </div>
        </section>
    <!--[Contact Sitter End]-->  
  
</section>
<!--[Inner Content]--> 
<script> 
//SCRIPT FOR ADD DATEPICKER
$( document ).ready(function() {
    $("#bookingrequests-booking-start-date").datepicker(
           {
         changeMonth: true,
         changeYear: true,
           maxDate: new Date(),
           yearRange: "-50:-18",
       dateFormat: 'dd-mm-yy',
       defaultDate: '01-01-1998'
    });
    $(".display-calender1").click(function(){ $("#bookingrequests-booking-start-date").focus(); 
           
  });
    $("#bookingrequests-booking-end-date").datepicker(
           {
         changeMonth: true,
         changeYear: true,
           maxDate: new Date(),
           yearRange: "-50:-18",
       dateFormat: 'dd-mm-yy',
       //defaultDate: '01-01-1998'
    });
    $(".display-calender").click(function(){ $("#bookingrequests-booking-end-date").focus(); 
          
  });
});   
</script>
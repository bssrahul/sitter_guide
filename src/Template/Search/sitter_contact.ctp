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
                            <img src="<?php echo HTTP_ROOT.'img/uploads/'.((@$userData->image) != '' ?(@$userData->image):'dm.png'); ?>" alt="Profile Picture" />
                            <h1 class="name"> Contact  - <span><?php echo @$userData->first_name." ".@$userData->last_name; ?> </span></h1>
                            <p><?php echo (@$userData->user_about_sitter->your_self !="")?@$userData->user_about_sitter->your_self:"Profile headline not set yet"; ?></p>
                            <p class="ads">
                            <?php echo @$userData->city.", ".@$userData->state.", ".@$userData->country; ?>
                              </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs-mid-cont">
            <div class="csmc-area">
                <?php //echo $this->request->data; ?>
                <div class="sr-area">
                    <!--top filter tab-->
                    <?php echo $this->Form->create(@$booking_data, [
                          'url' => ['controller' => 'search', 'action' => 'sitter-contact'],
                          'id'=>'bookingContact',
                        ]);
                        echo $this->Form->input('BookingRequests.sitter_id',[
                            'type' =>'hidden',
                            'value'=>@$sitter_id]);
                        ?>
                    <div class="top-filter-tab">
                        <ul class="booking-services">
                            <li class="new_active">
                                <a class="boarding" href="#boarding" data-toggle="tab" data-rel="boarding">
                                    <span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Boarding')); ?><br>
                                    <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in the sitter home')); ?></b> </a>
                            </li>
                            <li class="">
                                <a class="h-sitting" href="#hsitting" data-toggle="tab" data-rel="house_sitting">
                                    <span></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('House Sitting')); ?><br>
                                    <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in your home')); ?></b></a>
                            </li>
                            <li class="">
                                <a class="d-visit" href="#dvisit" data-toggle="tab" aria-expanded="false" data-rel="drop_in_visit">
                                    <span></span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop-in Visit')); ?> <br>
                                    <b><?php echo $this->requestAction('app/get-translate/'.base64_encode('in your home')); ?></b></a>
                            </li>
                        </ul>
                        <!-- Start Required service-->
                        <?php echo $this->Form->input('BookingRequests.required_services',[
                            'label' => false,
                            'type'=>'hidden',
                            'value'=>'boarding',
                            //'id'=>'required_services'
                            ]);
                            ?>
                        <label class="error service_error" for="bookingrequests-required-services" generated="true"></label>
                    </div>
                    <!--End reqired service-->

                    <!--Date-->
                    <div class="hs-date">
                        <h1 class="hsd-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('House Boarding Dates')); ?></h1>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="fromto">
                                    <!-- <input type="text">-->
                                    <?php  
                                        echo $this->Form->input('BookingRequests.booking_start_date',[               
                                        'templates' => ['inputContainer' => '{{content}}'],
                                        'label'=>false,
                                        'readonly'=>true,
                                        'type'=>'text',
                                        'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('YYYY-MM-DD')), 
                                        ]);
                                      ?>
                                    <a href="javascript:void(0)" title="Calender" class="display-calender1"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png" width="21" height="21" alt="Calender"></a>
                                    <label class="error" for="bookingrequests-booking-start-date" generated="true"></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="fromto">
                                    <!--<input type="text">-->
                                    <?php  
                                        echo $this->Form->input('BookingRequests.booking_end_date',[               
                                        'templates' => ['inputContainer' => '{{content}}'],
                                        'label'=>false,
                                        'type'=>'text',
                                        'readonly'=>true,
                                        'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('YYYY-MM-DD')),
                                        ]);
                                      ?>
                                    <a href="javascript:void(0)" title="Calender" class="display-calender"><img src="<?php echo HTTP_ROOT; ?>img/calender-icon.png" width="21" height="21" alt="Calender"></a>
                                    <label class="error" for="bookingrequests-booking-end-date" generated="true"></label>
                                </div>
                            </div>
                        </div>
                        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode("For your safety & security, Rover will not expose your phone number until you've booked your stay. Messages from Agatha will come from 858-914-2079, a number owned by sitter guide")); ?>. </p>
                    </div>
                    <!--/Date-->
                    <!--add dog-->
                    <div class="ad-dog">
                        <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Dogs')); ?></h2>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="dog-list">
                                    <ul>
                                        <li><input type="checkbox"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog Name')); ?></li>
                                        <li><input type="checkbox"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Dog Name')); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="ad">
                                    <a href="#" title="Add Dogs"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Another Dogs')); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->input('BookingRequests.guest_id_for_bookinig',[
                            'type' =>'hidden',
                            'value'=>'41,37,15,51'
                            ]); ?>
                    </div>
                    <!--/add dog-->
                    <!--message-->
                    <div class="msg">
                        <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Message')); ?></h3>
                        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode("Share a little info about your dog and why they'd have a great time with Agatha")); ?>. </p>
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
                              ?> <?php echo $this->requestAction('app/get-translate/'.base64_encode("I'd like to receive photos of my dog(s) during this stay")); ?>. </p>
                        <button type="submit" class="btn btn-success send-msg"><?php echo $this->requestAction('app/get-translate/'.base64_encode('SEND MESSAGE')); ?></button>
                        <p><?php echo $this->requestAction('app/get-translate/'.base64_encode('All stays booked through Rover are covered by premium insurance')); ?>. </p>
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
    $(document).ready(function() {
        $("#bookingrequests-booking-start-date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
             minDate: 0,
            onClose: function(selectedDate) {
                $("#bookingrequests-booking-end-date").datepicker("option", "minDate", selectedDate);
            }
        });
        $(".display-calender1").click(function() {
            $("#bookingrequests-booking-start-date").focus();

        });
        $("#bookingrequests-booking-end-date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            onClose: function(selectedDate) {
                $("#bookingrequests-booking-start-date").datepicker("option", "maxDate", selectedDate);
            }

        });
        $(".display-calender").click(function() {
            $("#bookingrequests-booking-end-date").focus();

        });
        /*Add different services with coma spareate */
        $("ul.booking-services li").click(function() {
            if ($(this).hasClass("new_active") == true) {
                $(this).removeClass("new_active");
            } else {
                $(this).addClass("new_active");
            }
            var textArray = $('ul.booking-services li.new_active').find('a:first').map(function() {
                return $(this).attr('data-rel');
            }).get(); // ["boarding", "house_sitting"]

            var textString = textArray.join(); // "boarding", "house_sitting"
            $('#bookingrequests-required-services').val(textString);

        });
    });
</script>

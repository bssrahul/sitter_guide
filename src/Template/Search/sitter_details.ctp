<?php echo $this->Html->css(['Front/dist/jquery.datepicker.css','Front/dist/jquery.datepicker.min.css']); 
echo $this->Html->script(['Front/dist/jquery.datepicker.js','Front/dist/jquery.datepicker.min.js']); ?>
<script type="text/javascript">
        // Localization

       /* jQueryDatepicker.day_names_short = {
            1: 'Mon',
            2: 'Tue',
            3: 'Wed',
            4: 'Thu',
            5: 'Fri',
            6: 'Sat',
            7: 'Sun'
        };

        jQueryDatepicker.day_names = {
            1: 'Monday',
            2: 'Tuesday',
            3: 'Wednesday',
            4: 'Thursday',
            5: 'Friday',
            6: 'Saturday',
            7: 'Sunday'
        };

        jQueryDatepicker.month_names = {
            1: 'January',
            2: 'February',
            3: 'March',
            4: 'Apri',
            5: 'May',
            6: 'June',
            7: 'July',
            8: 'Agust',
            9: 'September',
            10: 'October',
            11: 'November',
            12: 'December'
        };*/
        $(document).ready(function () {
            var $selected = $('.selected');

            $some_datepicker = $('.some_datepicker');
            
            $some_datepicker.datepicker({
                next_button: '&gt;',
                prev_button: '&lt;'
            });

            $some_datepicker.setStartDate({
                year: 2016,
                // jquery.datepicker accepts first month as 1
                // (built-in Date() class accepts first month as 0)
                month: 5,
                day: 10
            });


             
  
            /*  
            $some_datepicker.on('date_selected.datepicker', function (event, date) {
                $selected.show().html('Selected date is: '+date.date.toString());
                //alert(date.date.toString());
            }); */
        });
    </script>
    <style type="text/css">
        .a,
        .a:visited {
            color: #176bb8;
            text-decoration: none;
        }

        .a:hover {
            text-decoration: underline;
        }
    </style>

<!--[Banner Area Start]-->
	<div class="saerch-s-det">
		<section class="banner-sitter-detail" style="background-image:url('<?php echo HTTP_ROOT.'img/uploads/'.($userData->profile_banner != ''?$userData->profile_banner:'sitter-detail-banner.jpg') ; ?>')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 ">
						<div class="banner-info-wrapper">
							<div class="banner-info-inner">
								<div class="client-image center-block">
									<img src="<?php echo HTTP_ROOT.'img/uploads/'.(@$userData->image != ''?@$userData->image:'dm.png'); ?>" class="img-responsive img-circle" alt="client"> 
								</div>
								<h2 class="name-banner text-center">
									<?php echo @$userData->first_name." ".substr((@$userData->last_name)?@$userData->last_name:"",0,1)."."; ?> 
								</h2>
								
								<h3 class="punch-line">Reliable & Loving Petsitter </h3>
								<h4 class="city-banner"> <?php echo $userData->city.", ".@$userData->state.", ".@$userData->country; ?></h4>
								<div class="badage-detail">
									<ul class="list-inline text-center">
										<li><img alt="" src="<?php echo HTTP_ROOT; ?>img/certify-1.png"></li>
										<li><img alt="" src="<?php echo HTTP_ROOT; ?>img/certify-2.png"></li>
									</ul>
								</div>
								
								<div class="details-stars">
									<ul class="list-inline text-center">
										<li><img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-stars.png"></li>
										<li><img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-stars.png"></li>
										<li><img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-stars.png"></li>
										<li><img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-stars.png"></li>
										<li><img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-stars.png"></li>
										<li>&nbsp;</li>
										<li class="pad-review" ><span >(Reviews 20)</span></li>
									</ul>
								</div>

								<div class="center-line">

									<div class="col-lg-12 col-xs-12 col-md-12 col-xs-12">

										<div class="row">
											
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-right0px ">

												<h3 class="rates-detail marginrightminus"> 
													<span><?php echo '$'.@$userData->user_sitter_services[0]->sh_day_rate; ?></span> per day</h3>
													<p class="rates-detail-caption">(Boarding in sitter)</p>

											</div> 
											
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-left0px ">

												<h3 class="rates-detail marginleftminus xs-padt10"> <span><?php echo '$'.@$userData->user_sitter_services[0]->gh_day_rate; ?></span> per day</h3>
												<p class="rates-detail-caption">(House sitting)</p>

											</div>

										</div>
										
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-right0px  ">

												<h3 class="rates-detail pad-t10 marginrightminus"> 
													<span>
														<?php echo '$'.@$userData->user_sitter_services[0]->gh_drop_in_visit_rate; ?></span> per day
												</h3>
												<p class="rates-detail-caption">(Drop visit home)</p>
											</div> 
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-left0px ">
    <h3 class="rates-detail pad-t10  marginleftminus"> <span><?php echo '$'.((@$userData->user_sitter_services[0]->sh_day_rate)+(@$userData->user_sitter_services[0]->sh_night_rate)); ?></span> per day</h3>

    <p class="rates-detail-caption">(D/Nt. care home)</p>

</div>
</div>
</div>
</div>

<h5 class="additional"><a href="#" data-toggle="modal" data-target="#myModal7"> Additional Services & Rates </a></h5>
<div class="text-center">
    <button class="btn btn-cont" onclick="location.href='<?php echo HTTP_ROOT.'search/sitter-contact/'.base64_encode(convert_uuencode(@$userData->id)); ?>'">
 
  Contact</button>
</div>
</div>

</div>
</div>

</div>

</div>



</section>
<!--[Banner Area End]-->

<!--content area Start-->
<main>





    <!-- Get in Touch starts-->



    <section class="detail-content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                    <h3 class="mid-sec-title border-bot pt30 ">About <?php echo @$userData->first_name; ?></h3>


                    <h3 class="mid-sec-title1 ">Reliable & Loving Pet Sitter</h3>
                    <p class="detail-text text-justify">
                        <?php echo @$userData->user_about_sitter->your_self; ?>

                        <!--ABout Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of
 animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer. I treat my four legged clients like family. I can help you train your pup while you are away or Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer.<span id="search-col-1" class="panel-collapse collapse " aria-expanded="true">work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer. I treat my four legged clients like family. I can help you train your pup while you are away or Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog</span>


<br>

<a  href="#search-col-1" data-toggle="collapse" onclick="javascript:changeText(1)" id="element1">More.. 
                 </a>-->


                    </p>

                    <div class="video-container">





                        <div class="imgWrap">
                            <a data-toggle="modal" href="#" data-target="#myModal2">

         
  <img src="<?php echo HTTP_ROOT.'img/uploads/'.(@$userData->profile_video_image != ''?@$userData->profile_video_image:'dummy-video.png'); ?>" class="img-responsive" alt="polaroid" />
  <p class="imgDescription"><img src="<?php echo HTTP_ROOT; ?>img/detail-play.png" class="play-video-btn" width="90" height="64" alt="play"></p></a>
                        </div>


                    </div>

                    <h3 class="mid-sec-title1 pb15 "><?php echo @$userData->first_name; ?>'s profile photos</h3>


                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12 c0l-lg-12">

                            <div id="myCarousel5" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <?php if(isset($userData->user_sitter_galleries)){ 
    
    ?>
                                    <div class="item active">
                                        <div class="row">
                                            <?php 
         $i = 1;
        foreach($userData->user_sitter_galleries as $key=>$single_image){ ?>

                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                <img src="<?php echo HTTP_ROOT.'img/uploads/'.$single_image->image; ?>" class="img-responsive responsivept15" alt="client1">
                                            </div>
                                            <?php 
           if($i%4==0){
           
            echo '</div></div>';
            }

            if($i%4==0 && (count($userData->user_sitter_galleries) != $i))
            {
              $continue;
             echo '<div class="item"><div class="row">'; 
            }

         $i++;
        
        }
        if(count($userData->user_sitter_galleries)<4){echo "</div></div>"; }
        ?>

                                            <?php 
     } ?>
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel5" role="button" data-slide="prev">
                                            <span class=" fa fa-chevron-circle-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel5" role="button" data-slide="next">
                                            <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>




                            <div class="one">
                                <div class="border-bot pt30"></div>

                                <h5 class="small-title">Specified Skills &nbsp;<span>
<i><img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-1.png" > </i>
<i> <img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-2.png"></i>
</span></h5>




                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <?php $langArr = array('en'=>'english','fr'=>'french','de'=>'german','hu'=>'hungarian','it'=>'italian','ro'=>'romanian','es'=>'spanish'); ?>
                                        <p class="pt10"><span class="speak"></span>Can speak
                                            <?php echo @$langArr[$userData->user_professional_accreditations_details[0]->languages]; ?>
                                        </p>


                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="experience"></span>
                                            <?php echo @$userData->user_professional_accreditations_details[0]->experience;?> + years of experience</p>


                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="familar"></span>Familiar with
                                            <?php echo @$userData->user_professional_accreditations_details[0]->training_techniques; ?> training techniques </p>


                                    </div>


                                </div>
                            </div>




                            <div class="one">
                                <div class="border-bot pt30"></div>

                                <h5 class="small-title">I have experience with &nbsp;<span>
<i><img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-1.png" > </i>
<i> <img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-2.png"></i>
</span></h5>




                                <div class="row">
                                    <?php if(@$userData->user_professional_accreditations_details[0]->ex_behavioural_problems !=''){ ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="behave"></span>Experience with Behavioural Problems</p>


                                    </div>
                                    <?php } ?>
                                    <?php if(@$userData->user_professional_accreditations_details[0]->ex_rescue_pets !=''){ ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="rescue"></span>Rescuing pets</p>


                                    </div>
                                    <?php }

      if((@$userData->user_professional_accreditations_details[0]->ex_behavioural_problems =='') && (@$userData->user_professional_accreditations_details[0]->ex_rescue_pets =='')){ 
   
   ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="rescue"></span>Sitter have no experience with medications</p>


                                    </div>
                                    <?php } ?>
                                </div>


                            </div>




                            <div class="one">
                                <div class="border-bot pt30"></div>

                                <h5 class="small-title">Benefits &nbsp;<span>
<i><img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-1.png" > </i>
<i> <img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-2.png"></i>
</span></h5>


                                <div class="row">
                                    <?php if(@$userData->user_sitter_services[0]->booking_status =='1'){ ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="book"></span>Last minute bookings </p>
                                    </div>
                                    <?php }
   if(@$userData->user_sitter_services[0]->cancellation_policy_status =='1'){ 
    ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="cancel"></span>Moderate cancellation policy</p>


                                    </div>
                                    <?php } 
   if((@$userData->user_sitter_services[0]->booking_status !='1') && (@$userData->user_sitter_services[0]->cancellation_policy_status !='1')){ 
   ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10">No Benefits</p>


                                    </div>

                                    <?php } ?>

                                </div>




                            </div>


                            <div class="one">
                                <div class="border-bot pt30"></div>

                                <h5 class="small-title">About <?php echo $userData->first_name; ?>'s Home&nbsp;<span>
<i><img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-1.png" > </i>
<i> <img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-2.png"></i>
</span></h5>


                                <div class="row">
                                    <?php if(@$userData->user_sitter_house->fully_fenced =='yes'){ ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="fence"></span>Has a fenced yard</p>
                                    </div>
                                    <?php } 
      if(@$userData->user_sitter_house->smokers =='no'){ 
     ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="smoke"></span>Non-Smoking Household </p>
                                    </div>
                                    <?php } 
      if(@$userData->user_sitter_house->cats_in_home =='yes'){ ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="onecat"></span>Has One Cat</p>
                                    </div>
                                    <?php } 
       if(@$userData->user_sitter_house->dogs_in_home =='yes'){ 
     ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="onedog"></span>Has Two Dogs </p>
                                    </div>
                                    <?php } 
     if((@$userData->user_sitter_house->fully_fenced =='yes') && (@$userData->user_sitter_house->smokers =='no') && (@$userData->user_sitter_house->cats_in_home =='yes') && (@$userData->user_sitter_house->dogs_in_home =='yes')){ ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <p class="pt10"><span class="onedog"></span>No information added on sitter home.</p>
                                    </div>
                                    <?php } ?>

                                </div>


                            </div>


                            <div class="one">
                                <div class="border-bot pt30"></div>

                                <h5 class="small-title">About my home</h5>


                                <p class="detail-text text-justify">
                                    <?php echo @$userData->user_sitter_house->about_home_desc; ?>

                                    <!-- Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of
 animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer. I treat my four legged clients like family. I can help you train your pup while you are away or Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer.<span id="search-col-2" class="panel-collapse collapse " aria-expanded="true">work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer. I treat my four legged clients like family. I can help you train your pup while you are away or Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog</span>
<br>
<a  href="#search-col-2" data-toggle="collapse" onclick="javascript:changeText(1)" id="element1">More.. 
                 </a>-->


                                </p>




                            </div>

                            <div class="one">
                                <div class="border-bot pt30"></div>

                                <h5 class="small-title">Description of places you will have access to</h5>


                                <p class="detail-text text-justify">
                                    <?php echo @$userData->user_sitter_house->spaces_access_desc; ?>
                                    <!--Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of
 animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer. I treat my four legged clients like family. I can help you train your pup while you are away or Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer.<span id="search-col-3" class="panel-collapse collapse " aria-expanded="true">work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer. I treat my four legged clients like family. I can help you train your pup while you are away or Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog</span>
<br>
<a  href="#search-col-3" data-toggle="collapse" onclick="javascript:changeText(1)" id="element1">More.. 
                 </a>-->


                                </p>




                            </div>

                            <!--<div class="row pt10 ">
   
   
   
   
   <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
     <img src="<?php echo HTTP_ROOT; ?>img/detail-space1.jpg" class="img-responsive responsivept15" alt="client1"> </div>
     
     <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
     <img src="<?php echo HTTP_ROOT; ?>img/detail-space2.jpg" class="img-responsive responsivept15" alt="client1"> </div>
     
     <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
     <img src="<?php echo HTTP_ROOT; ?>img/detail-space3.jpg" class="img-responsive responsivept15" alt="client1"> </div>
     
     <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
     <img src="<?php echo HTTP_ROOT; ?>img/detail-space4.jpg" class="img-responsive responsivept15" alt="client1"> </div>
   
   </div>-->


                            <div class="one">
                                <div class="border-bot pt30"></div>

                                <h5 class="small-title">My Pets</h5>


                                <p class="detail-text text-justify">
                                    <?php echo @$userData->user_sitter_house->home_pets_desc; ?>
                                    <!-- Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of f situation, all types of f situation,all types of f situation, we will make it work. I have worked with all types of
 animals and love and can care for them all.  pet supply customer service call center and shadowed as a dog trainer.<span id="search-col-4" class="panel-collapse collapse " aria-expanded="true">work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog trainer. I treat my four legged clients like family. I can help you train your pup while you are away or Willing to work with any dogs, regardless of situation, we will make it work. I have worked with all types of animals and love and can care for them all. I have previously worked at a pet store, dog daycare, two animal shelters, pet supply customer service call center and shadowed as a dog</span>
<br>
<a  href="#search-col-4" data-toggle="collapse" onclick="javascript:changeText(1)" id="element1">More.. 
                 </a>-->


                                </p>




                            </div>

                            <div class="row pt10 ">




                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="img-thumbnail"> <img src="<?php echo HTTP_ROOT; ?>img/detail-client2.jpg" class="img-responsive responsivept15" alt="client1">
                                        <p class="dogname">Jackey</p>
                                        <p class="dogbreed">Dachshund</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="img-thumbnail"> <img src="<?php echo HTTP_ROOT; ?>img/detail-client4.jpg" class="img-responsive responsivept15" alt="client1">
                                        <p class="dogname">Harry</p>
                                        <p class="dogbreed">Dachshund</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="img-thumbnail"> <img src="<?php echo HTTP_ROOT; ?>img/detail-client1.jpg" class="img-responsive responsivept15" alt="client1">
                                        <p class="dogname">Lina</p>
                                        <p class="dogbreed">Dachshund</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="img-thumbnail"> <img src="<?php echo HTTP_ROOT; ?>img/detail-client3.jpg" class="img-responsive responsivept15" alt="client1">
                                        <p class="dogname">Scooby</p>
                                        <p class="dogbreed">Dachshund</p>
                                    </div>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">

                                    <div class="one">
                                        <div class="border-bot pt30"></div>
											<?php $UserRatingData=$userData->user_ratings; 
												//pr($UserRatingData);
												$accuracy_sum = 0;
												$comm_sum = 0;
												$clean_sum = 0;
												$location_sum = 0;
												$check_sum = 0;
												$rating_sum = 0;
												$count=0;
												foreach($UserRatingData as $UserRating){
													$count++;
													$accuracy_rating=$UserRating->accuracy_rating;
													$communication_rating=$UserRating->communication_rating;
													$cleanliness_rating=$UserRating->cleanliness_rating;
													$location_rating=$UserRating->location_rating;
													$check_in_rating=$UserRating->check_in_rating;
													$accuracy_sum = $accuracy_sum + $accuracy_rating;
													$comm_sum = $comm_sum + $communication_rating;
													$clean_sum = $clean_sum + $cleanliness_rating;
													$location_sum = $location_sum + $location_rating;
													$check_sum = $check_sum + $check_in_rating;
												}
												if($count > 0){
												$ac=$accuracy_sum/$count;
												$cm=$comm_sum/$count;
												$cl=$clean_sum/$count;
												$lc=$location_sum/$count;
												$ch=$check_sum/$count;
												$rating_sum=($ac+$cm+$cl+$lc+$ch)/5;
												}
											?>
		

                                        <h3 class="mid-sec-title pt15 "><?php echo $this->requestAction('users/get-translate/'.base64_encode('Testimonials and Reviews')); ?>  &nbsp <span>
										<i><img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-1.png" > </i>
										<i> <img alt="badge" title="badge" src="<?php echo HTTP_ROOT; ?>img/certify-2.png"></i>
										</span></h3>

                                        <ul class="list-inline pt15">
                                            <li class="reviews-bold"><?php echo $count. " ";?> <?php echo $this->requestAction('users/get-translate/'.base64_encode('Reviews')); ?></li>
                                            <li> <div class="rating-box">
																								
																
																	<span class="rating no-topmg">
																	<?php	if(!empty($rating_sum)){ 	
																	?>
																			<input type='radio'  value='5' <?php if(!empty($rating_sum)){ if($rating_sum <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($rating_sum)){if($rating_sum <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($rating_sum)){ if($rating_sum <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($rating_sum)){ if($rating_sum <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($rating_sum)){ if($rating_sum <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($rating_sum)){ if($rating_sum <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($rating_sum)){ if($rating_sum <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($rating_sum)){ if($rating_sum <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($rating_sum)){ if($rating_sum <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($rating_sum)){ if($rating_sum <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $rating_sum=0;?>
																			
																	<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($rating_sum)){ if($rating_sum <= 5 && $rating_sum > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($rating_sum)){if($rating_sum <= 4.5 && $rating_sum > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($rating_sum)){ if($rating_sum <= 4 && $rating_sum > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($rating_sum)){ if($rating_sum <= 3.5 && $rating_sum > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($rating_sum)){ if($rating_sum <= 3 && $rating_sum > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($rating_sum)){ if($rating_sum <= 2.5 && $rating_sum > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($rating_sum)){ if($rating_sum <= 2 && $rating_sum > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($rating_sum)){ if($rating_sum <= 1.5 && $rating_sum > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($rating_sum)){ if($rating_sum <= 1 && $rating_sum > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($rating_sum)){ if($rating_sum <= 0.5 && $rating_sum >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $rating_sum=0;?>
																		
																		
																<?php	} ?>
																	</span>
																

															
															  <!--/rating--> 
														</div>
													</li>
                                        </ul>

                                        <div class="row">
                                            <div class="col-xs-12 md-sm-3 col-lg-3 col-sm-3">
                                                <p class="summary">Summary</p>

                                            </div>
											
                                            <div class="col-xs-12 md-sm-9 col-lg-8 col-sm-9">
                                                <div class="row">
                                                    <div class=" col-sm-6 col-md-6 col-xs-12 col-lg-6">

                                                        <div class="rewiw-width100">

                                                            <div class="rewiw-width50">
                                                                <p>Accuracy</p>
                                                            </div>
                                                            <div class="rewiw-width50">
															<div class="rating-box">
															<!--rating-->
															<!--<div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>-->
																									
																
																	<span class="rating no-topmg">
																	<?php	if(!empty($ac)){ 	
																	?>
																			<input type='radio'  value='5' <?php if(!empty($ac)){ if($ac <= 5 && $ac > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($ac)){if($ac <= 4.5 && $ac > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($ac)){ if($ac <= 4 && $ac > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($ac)){ if($ac <= 3.5 && $ac > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($ac)){ if($ac <= 3 && $ac > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($ac)){ if($ac <= 2.5 && $ac > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($ac)){ if($ac <= 2 && $ac > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($ac)){ if($ac <= 1.5 && $ac > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($ac)){ if($ac <= 1 && $ac > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($ac)){ if($ac <= 0.5 && $ac >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $ac=0;?>
																			
																	<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($ac)){ if($ac <= 5 && $ac > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($ac)){if($ac <= 4.5 && $ac > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($ac)){ if($ac <= 4 && $ac > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($ac)){ if($ac <= 3.5 && $ac > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($ac)){ if($ac <= 3 && $ac > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($ac)){ if($ac <= 2.5 && $ac > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($ac)){ if($ac <= 2 && $ac > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($ac)){ if($ac <= 1.5 && $ac > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($ac)){ if($ac <= 1 && $ac > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($ac)){ if($ac <= 0.5 && $ac >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $ac=0;?>
																		
																		
																<?php	} ?>
																	</span>
																

															
															  <!--/rating--> 
														</div>
                                                            </div>

                                                        </div>
                                                        <div class="rewiw-width100">

                                                            <div class="rewiw-width50">
                                                                <p>Communication</p>
                                                            </div>
                                                            <div class="rewiw-width50">
                                                                <div class="rating-box">

													
																
																	<span class="rating no-topmg">
																	<?php	if(!empty($cm)){ 	
																	?>
																			<input type='radio'  value='5' <?php if(!empty($cm)){ if($cm <= 5 && $cm > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($cm)){if($cm <= 4.5 && $cm > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($cm)){ if($cm <= 4 && $cm > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($cm)){ if($cm <= 3.5 && $cm > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($cm)){ if($cm <= 3 && $cm > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($cm)){ if($cm <= 2.5 && $cm > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($cm)){ if($cm <= 2 && $cm > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($cm)){ if($cm <= 1.5 && $cm > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($cm)){ if($cm <= 1 && $cm > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($cm)){ if($cm <= 0.5 && $cm >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $cm=0;?>
																			
																	<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($cm)){ if($cm <= 5 && $cm > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($cm)){if($cm <= 4.5 && $cm > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($cm)){ if($cm <= 4 && $cm > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($cm)){ if($cm <= 3.5 && $cm > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($cm)){ if($cm <= 3 && $cm > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($cm)){ if($cm <= 2.5 && $cm > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($cm)){ if($cm <= 2 && $cm > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($cm)){ if($cm <= 1.5 && $cm > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($cm)){ if($cm <= 1 && $cm > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($cm)){ if($cm <= 0.5 && $cm >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $cm=0;?>
																		
																		
																<?php	} ?>
																	</span>
																

															
															  <!--/rating--> 
														</div>
                                                            </div>

                                                        </div>
                                                        <div class="rewiw-width100">

                                                            <div class="rewiw-width50">
                                                                <p>Cleanliness</p>
                                                            </div>
                                                            <div class="rewiw-width50">
                                                               <div class="rating-box">
																	
																
																	<span class="rating no-topmg">
																	<?php	if(!empty($cl)){ 	
																	?>
																			<input type='radio'  value='5' <?php if(!empty($cl)){ if($cl <= 5 && $cl > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($cl)){if($cl <= 4.5 && $cl > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($cl)){ if($cl <= 4 && $cl > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($cl)){ if($cl <= 3.5 && $cl > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($cl)){ if($cl <= 3 && $cl > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($cl)){ if($cl <= 2.5 && $cl > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($cl)){ if($cl <= 2 && $cl > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($cl)){ if($cl <= 1.5 && $cl > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($cl)){ if($cl <= 1 && $cl > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($cl)){ if($cl <= 0.5 && $cl >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $cl=0;?>
																			
																	<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($cl)){ if($cl <= 5 && $cl > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($cl)){if($cl <= 4.5 && $cl > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($cl)){ if($cl <= 4 && $cl > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($cl)){ if($cl <= 3.5 && $cl > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($cl)){ if($cl <= 3 && $cl > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($cl)){ if($cl <= 2.5 && $cl > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($cl)){ if($cl <= 2 && $cl > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($cl)){ if($cl <= 1.5 && $cl > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($cl)){ if($cl <= 1 && $cl > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($cl)){ if($cl <= 0.5 && $cl >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $cl=0;?>
																		
																		
																<?php	} ?>
																	</span>
																

															
															  <!--/rating--> 
														</div>
                                                            </div>

                                                        </div>



                                                    </div>
                                                    <div class=" col-sm-6 col-md-6 col-xs-12 col-lg-6">

                                                        <div class="rewiw-width100">

                                                            <div class="rewiw-width50">
                                                                <p>Location</p>
                                                            </div>
                                                            <div class="rewiw-width50">
                                                               <div class="rating-box">
																															
																	<span class="rating no-topmg">
																	<?php	if(!empty($lc)){ 	
																	?>
																			<input type='radio'  value='5' <?php if(!empty($lc)){ if($lc <= 5 && $lc > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($lc)){if($lc <= 4.5 && $lc > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($lc)){ if($lc <= 4 && $lc > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($lc)){ if($lc <= 3.5 && $lc > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($lc)){ if($lc <= 3 && $lc > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($lc)){ if($lc <= 2.5 && $lc > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($lc)){ if($lc <= 2 && $lc > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($lc)){ if($lc <= 1.5 && $lc > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($lc)){ if($lc <= 1 && $lc > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($lc)){ if($lc <= 0.5 && $lc >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $lc=0;?>
																			
																	<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($lc)){ if($lc <= 5 && $lc > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($lc)){if($lc <= 4.5 && $lc > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($lc)){ if($lc <= 4 && $lc > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($lc)){ if($lc <= 3.5 && $lc > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($lc)){ if($lc <= 3 && $lc > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($lc)){ if($lc <= 2.5 && $lc > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($lc)){ if($lc <= 2 && $lc > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($lc)){ if($lc <= 1.5 && $lc > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($lc)){ if($lc <= 1 && $lc > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($lc)){ if($lc <= 0.5 && $lc >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $lc=0;?>
																		
																		
																<?php	} ?>
																	</span>
																

															
															  <!--/rating--> 
														</div>
                                                            </div>

                                                        </div>
                                                        <div class="rewiw-width100">

                                                            <div class="rewiw-width50">
                                                                <p>Check In</p>
                                                            </div>
                                                            <div class="rewiw-width50">
                                                                <div class="rating-box">
																					
																
																	<span class="rating no-topmg">
																	<?php	if(!empty($ch)){ 	
																	?>
																			<input type='radio'  value='5' <?php if(!empty($ch)){ if($ch <= 5 && $ch > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($ch)){if($ch <= 4.5 && $ch > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($ch)){ if($ch <= 4 && $ch > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($ch)){ if($ch <= 3.5 && $ch > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($ch)){ if($ch <= 3 && $ch > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($ch)){ if($ch <= 2.5 && $ch > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($ch)){ if($ch <= 2 && $ch > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($ch)){ if($ch <= 1.5 && $ch > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($ch)){ if($ch <= 1 && $ch > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($ch)){ if($ch <= 0.5 && $ch >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $ch=0;?>
																			
																	<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($ch)){ if($ch <= 5 && $ch > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($ch)){if($ch <= 4.5 && $ch > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($ch)){ if($ch <= 4 && $ch > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($ch)){ if($ch <= 3.5 && $ch > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($ch)){ if($ch <= 3 && $ch > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($ch)){ if($ch <= 2.5 && $ch > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($ch)){ if($ch <= 2 && $ch > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($ch)){ if($ch <= 1.5 && $ch > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($ch)){ if($ch <= 1 && $ch > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($ch)){ if($ch <= 0.5 && $ch >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $ch=0;?>
																		
																		
																<?php	} ?>
																	</span>
																

															
															  <!--/rating--> 
														</div>
                                                            </div>

                                                        </div>
                                                       



                                                    </div>


                                                </div>

                                            </div>

                                        </div>


                                        <div class="review-testimonial-section">
										<?php if(!empty($UserRatingData)){
											
											//pr($UserRatingData);
											foreach($commentUserData as $commentUser){
												
											foreach($UserRatingData as $UserRating){
												//pr($UserRating->id);
												if($commentUser->id == $UserRating->user_from){
													$accuracy=$UserRating->accuracy_rating;
													$communication=$UserRating->communication_rating;
													$cleanliness=$UserRating->cleanliness_rating;
													$location=$UserRating->location_rating;
													$check_in=$UserRating->check_in_rating;
													@$rate=($accuracy + $communication + $cleanliness + $location + $check_in)/5;
													
													
													?>
                                            <div class="row">



                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">

                                                    <div class=" center-block pt30">

														
                                                       <!-- <img alt="client" title="client" class="img-responsive center-block img-circle" src="<?php echo HTTP_ROOT; ?>img/detail-circle-client.png"> --> 
														<?php if($commentUser->image){?>
																											  
																	<img src="<?php echo HTTP_ROOT.'img/uploads/'.$commentUser->image; ?>" alt="Profile Picture" height="80px" width="80px" class="img-circle"/>
														 <?php }else{?>
																	<img src="<?php echo HTTP_ROOT.'img/uploads/dm.png'; ?>" alt="Profile Picture" height="80px" width="80px" class="img-circle"/>
														 <?php } ?></div>
                                                </div>

                                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
                                                    <div class="review-comments pt30">
                                                        <div><span class="pull-left color999"><?php if(!empty($UserRating->created_date)){ echo date("F j, Y", strtotime($UserRating->created_date)); }?> </span> <span class="pull-right"><ul class="list-inline text-center">
																<li>
																
																<div class="rating-box">
														
																	<span class="rating no-topmg">
																	<?php	if(!empty($rate)){ 	
																	?>
																			<input type='radio'  value='5' <?php if(!empty($rate)){ if($rate <= 5 && $rate > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($rate)){if($rate <= 4.5 && $rate > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($rate)){ if($rate <= 4 && $rate > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($rate)){ if($rate <= 3.5 && $rate > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($rate)){ if($rate <= 3 && $rate > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($rate)){ if($rate <= 2.5 && $rate > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($rate)){ if($rate <= 2 && $rate > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($rate)){ if($rate <= 1.5 && $rate > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($rate)){ if($rate <= 1 && $rate > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($rate)){ if($rate <= 0.5 && $rate >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $rate=0;?>
																			
																	<?php }else{?>
																		<input type='radio'  value='5' <?php if(!empty($rate)){ if($rate <= 5 && $rate > 4.5){ echo "checked"; } }?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																			
																			<input type="radio"  value="4.5" <?php if(!empty($rate)){if($rate <= 4.5 && $rate > 4){ echo "checked"; } } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																			
																			<input type="radio"  value="4"  <?php if(!empty($rate)){ if($rate <= 4 && $rate > 3.5){ echo "checked"; }} ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																			
																			<input type="radio"  value="3.5"  <?php if(!empty($rate)){ if($rate <= 3.5 && $rate > 3){ echo "checked"; } } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																			
																			<input type="radio"  value="3" <?php if(!empty($rate)){ if($rate <= 3 && $rate > 2.5){ echo "checked"; } } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
																			
																			<input type="radio"  value="2.5" <?php if(!empty($rate)){ if($rate <= 2.5 && $rate > 2){ echo "checked"; } } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																			
																			<input type="radio"   value="2"  <?php if(!empty($rate)){ if($rate <= 2 && $rate > 1.5){ echo "checked"; } } ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																			
																			<input type="radio"  value="1.5" <?php if(!empty($rate)){ if($rate <= 1.5 && $rate > 1){ echo "checked"; } } ?>/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																			
																			<input type="radio"  value="1" <?php if(!empty($rate)){ if($rate <= 1 && $rate > 0.5){ echo "checked"; } } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																			
																			<input type="radio"  value="0.5"  <?php if(!empty($rate)){ if($rate <= 0.5 && $rate >= 0){ echo "checked"; } } ?>/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
																			<?php $rate=0;?>
																		
																		
																<?php	} ?>
																	</span>
																

															
															  <!--/rating--> 
														</div>
																
																
																
																
																
																</li>
																</ul></span></div>
														<br/><br/>
                                                        <p class="pull-left"><?php if(!empty($UserRating->comment)){ echo $UserRating->comment; }?> </p>
                                                        <p class="pull-right color-green">-<?php if( $commentUser->first_name){echo $commentUser->first_name." ".$commentUser->last_name ;} ?></p>
                                                    </div>

                                                </div>
												<!--<div class=" pt30 text-center">
													<button class="btn btn-read-more-reviews"> Read more reviews</button>
												</div>-->
                                            </div>
											<?php } }
										} }else{?>
											
											   <div class="row">



                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">

                                                    <div class=" center-block pt30">

														

														 </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
                                                    <div class="review-comments pt30">
                                                        <div><span class="pull-left color999"> </span> <span class="pull-right"><ul class="list-inline text-center">
																<li>
																

																
																
																
																
																
																</li>
																</ul></span></div>
														<br/><br/>
                                                        <p class="pull-left"><?php if(empty($UserRating->comment)){ echo "<h2>".$this->requestAction('users/get-translate/'.base64_encode('No Any Feedback'))."<h2>";   }?> </p>
                                                        <p class="pull-right color-green"></p>
                                                    </div>

                                                </div>

                                            </div>
											
											
										<?php } ?>
                                       




                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="responsive-margin">
                                <div class="row">
									        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<div class="insure-wrap">
          <div class="insur">
            <p> <i> &nbsp;
              All stays booked on Sitter Guide receive premium insurance, 24/7 support, and our reservation guarantee. </p>
          </div></i>
        </div>
      </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                                        <div class=" pt30">
                                            <img src="<?php echo HTTP_ROOT.'img/uploads/'.(@$userData->image != ''?@$userData->image:'dm.png'); ?>" title="sitter image" class="img-responsive" alt="sitter"> </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                        <div class="detail-sitter-detail">
                                            <h4 class="detail-sitter-name"> <?php echo @$userData->first_name." ".substr((@$userData->last_name)?@$userData->last_name:"",0,1)."."; ?> </h4>
                                            <p class="detail-sitter-location">
                                                <?php echo @$userData->city." ".@$userData->state.",".@$userData->country  ?> </p>
                                            <p class="detail-sitter-joined">Joined :
                                                <?php echo date_format(@$userData->date_added,'F Y');  ?>
                                            </p>
                                            <a class="reviews" href="#">( 20 reviews )</a></div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <div class="recent-act-widget">
                                            <div class="recent-act">
                                                <?php echo @$userData->first_name; ?>'s Recent Activity</div>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-reply icon-width30"></i>Response Rate : <b>100%</b></li>
                                                <li><span class="book"></span>Average Response Time : <b>With in Hour</b></li>
                                                <li><i class="fa fa-user icon-width30 icon-p15"></i>Last Activity : <b>
        <?php //echo date('Y-m-d h:i:s')-$userData->last_login ; //$userData->avail_status != 'Login'?'Available':$userData->last_login; 
        if(@$userData->avail_status == 'Login'){
            echo '<span style="color:green">Available<//span>';
        }else{
            $seconds =  strtotime(date("Y-m-d H:i:s"))-strtotime(@$userData->last_login);
            $days    = floor($seconds / 86400);
            $hours = floor(($seconds - ($days * 86400)) / 3600);
            $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
            $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));

            echo $days." days ".$hours." hours ".$minutes." min "."ago";
        }
       

        ?>
        </b></li>
                                                <li><i class="fa fa-refresh icon-width30 icon-p15"></i>Repeat Guest : <b> 15</b></li>
                                            </ul>


                                            <div class="border-bot"></div>
                                            <ul class="list-unstyled verified">
                                                <li><i class="fa fa-check icon-width30 font-size20"></i> SMS Verified</li>
                                                <li><i class="fa fa-check icon-width30 font-size20"></i> Email Verified</li>

                                            </ul>
                                            <div class="border-bot"></div>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                                        <div class="btn-group btn-width100 pt15">
                                            <button type="button" class="btn btn-detsil-contact">Contact <?php echo @$userData->first_name; ?></button>
                                            <!-- <button type="button" class="btn btn-heart"><i class="fa fa-heart-o heart-pos"></i></button>-->
                                            <button type="button" class="btn btn-heart lock">
    <i class="icon-unlock fa fa-heart-o heart-pos"></i>
    <i class="icon-lock fa fa-heart heart-pos"></i>
</button>
                                        </div>



                                    </div>




                                </div>


                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <h3 class="mid-sec-title  ">Hosting Preferences</h3>

                                        <p class="dog-title1">Dogs</p>

                                        <div class="row">




                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <?php
         @$petSizesArr = explode(',',@$userData->user_about_sitter->sh_pet_sizes);
         if(!empty(@$petSizesArr)){
      ?>

                                                    <ul class="pet-list">
                                                        <?php  foreach($petSizesArr as $size_val){
          //if(isset($size_val == '0-7')){ 
           //echo 'ok'.$size_val;
           if($size_val == '0-7'){
           ?>
                                                        <li class="pet-1">
                                                            <span></span>
                                                            <p class="weight">
                                                                <?php echo $size_val; ?>
                                                            </p>
                                                            <p class="pound">Kg</p>
                                                        </li>
                                                        <?php } 
            else if(@$size_val == '8-18'){
            ?>
                                                        <li class="pet-2">
                                                            <span></span>
                                                            <p class="weight">
                                                                <?php echo $size_val; ?>
                                                            </p>
                                                            <p class="pound">Kg</p>
                                                        </li>
                                                        <?php }
             else if(@$size_val == '18-45'){
             ?>
                                                        <li class="pet-3">
                                                            <span></span>
                                                            <p class="weight">
                                                                <?php echo $size_val; ?>
                                                            </p>
                                                            <p class="pound">Kg</p>
                                                        </li>
                                                        <?php }
             else if(@$size_val == '45+'){
             ?>
                                                        <li class="pet-4">
                                                            <span></span>
                                                            <p class="weight">
                                                                <?php echo $size_val; ?>
                                                            </p>
                                                            <p class="pound">Kg</p>
                                                        </li>
                                                        <?php } 
          }
        } ?>
                                                    </ul>
                                            </div>



                                            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">

                                                <p class="dog-title1"><b>Additional prefrences</b></p>

                                                <ul class="pet-list">
                                                    <?php  
    if(!empty(@$petSizesArr)){
        foreach($petSizesArr as $size_val){

          if($size_val == 'cat'){
          ?>
                                                    <li class="pet-5">
                                                        <span></span>
                                                        <p class="weight">0-15</p>
                                                        <p class="pound">Pounds</p>
                                                    </li>
                                                    <?php }
           else if($size_val == 'small_animals'){
           ?>
                                                    <li class="pet-6">
                                                        <span></span>
                                                        <p class="weight">0-15</p>
                                                        <p class="pound">Pounds</p>
                                                    </li>
                                                    <?php }
           else if($size_val == 'small_animals'){
           ?>
                                                    <li class="pet-7">
                                                        <span></span>
                                                        <p class="weight">0-15</p>
                                                        <p class="pound">Pounds</p>
                                                    </li>
                                                    <?php } 
          }
        } ?>
                                                    <li class="pet-4">
                                                        &nbsp;
                                                    </li>
                                                </ul>


                                            </div>

                                        </div>


                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="border-bot pt30"></div>
                                        <h3 class="mid-sec-title pt30  ">Availability</h3>
                                        <div class="detail-cal-widget">

                                            <!--<img src="<?php echo HTTP_ROOT; ?>img/detail-cal-dummy.png" class="img-responsive" alt="calender">
                                         -->
                                          <div class="some_datepicker">
                                          </div>
                                        </div>

                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="border-bot pt30"></div>
                                        <h3 class="mid-sec-title pt30  "><?php echo @$userData->first_name; ?> Neighborhood </h3>
                                        <div class="detail-cal-widget">

                                            <div style="width:345;height:400px;" id="map"></div>
                                            <script>
                                                // This example creates circles on the map, representing populations in North
                                                // America.

                                                // First, create an object containing LatLng and population for each city.
                                                var citymap = {
                                                    chicago: {
                                                        center: {
                                                            lat: <?php echo @$userData->latitude; ?>,
                                                            lng: <?php echo @$userData->longitude; ?>
                                                        },
                                                        population: 2000000
                                                    },
                                                };

                                                function initMap() {

                                                    // Create the map.
                                                    var map = new google.maps.Map(document.getElementById('map'), {
                                                        zoom: 6,
                                                        zoomControl: true,
                                                        mapTypeControl: false,
                                                        scaleControl: false,
                                                        streetViewControl: false,
                                                        rotateControl: false,
                                                        fullscreenControl: false,
                                                        center: {
                                                            lat: <?php echo @$userData->latitude; ?>,
                                                            lng: <?php echo @$userData->longitude; ?>
                                                        },
                                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                                    });

                                                    // Construct the circle for each value in citymap.
                                                    // Note: We scale the area of the circle based on the population.
                                                    for (var city in citymap) {
                                                        // Add the circle for this city to the map.
                                                        var cityCircle = new google.maps.Circle({
                                                            strokeColor: '#72A105',
                                                            strokeOpacity: 0.8,
                                                            strokeWeight: 1,
                                                            fillColor: '#72A105',
                                                            fillOpacity: 0.35,
                                                            map: map,
                                                            center: citymap[city].center,
                                                            radius: Math.sqrt(citymap[city].population) * 100
                                                        });
                                                    }
                                                }
                                                
                                                $(document).ready(function(){
													initMap();
                                                });
                                            </script>
                                           
                                            <style>
                                                div#map {
                                                    height: 400px;
                                                    width: 345px;
                                                }
                                            </style>
                                        </div>


                                    </div>

                                </div>


                            </div>





                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <h3 class="mid-sec-title pt30 ">More sitters near you &nbsp; </h3>




                                <div class="detail-full-wrapper">

                                    <div class="leading-area">

                                        <!--more sitter near you-->
                                        <div class="more-sitter">
                                            <div class="container">
                                                <div class="ms-area">
                                                    <ul>
                                                        <li><a title="" href="">

                              <img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-dummy-sitter1.png">
                              <p class="name">Lex</p>
                                <p class="loc">Newyork</p>
                                 <p class="r-star"><img alt="Rating" src="<?php echo HTTP_ROOT; ?>img/rating-icons.png">
                                 <p class="grey">( 20 reviews )</p>
                            </a></li>
                                                        <li><a title="" href="">
                              <img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-dummy-sitter2.png">
                              <p class="name">Lex</p>
                                <p class="loc">Newyork</p>
                                 <p class="r-star"><img alt="Rating" src="<?php echo HTTP_ROOT; ?>img/rating-icons.png">
                                 <p class="grey">( 20 reviews )</p>
                            </a></li>
                                                        <li><a title="" href="">
                              <img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-dummy-sitter3.png">
                            <p class="name">Lex</p>
                                <p class="loc">Newyork</p>
                                 <p class="r-star"><img alt="Rating" src="<?php echo HTTP_ROOT; ?>img/rating-icons.png">
                                 <p class="grey">( 20 reviews )</p>                             
                            </a></li>
                                                        <li><a title="" href="">
                              <img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-dummy-sitter1.png">
                              <p class="name">Lex</p>
                                <p class="loc">Newyork</p>
                                 <p class="r-star"><img alt="Rating" src="<?php echo HTTP_ROOT; ?>img/rating-icons.png">
                                 <p class="grey">( 20 reviews )</p>
                            </a></li>
                                                        <li><a title="" href="">
                              <img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-dummy-sitter2.png">
                              <p class="name">Lex</p>
                                <p class="loc">Newyork</p>
                                 <p class="r-star"><img alt="Rating" src="<?php echo HTTP_ROOT; ?>img/rating-icons.png">
                                 <p class="grey">( 20 reviews )</p>
                            </a></li>
                                                        <li><a title="" href="">
                              <img alt="" src="<?php echo HTTP_ROOT; ?>img/detail-dummy-sitter3.png">
                            <p class="name">Lex</p>
                                <p class="loc">Newyork</p>
                                 <p class="r-star"><img alt="Rating" src="<?php echo HTTP_ROOT; ?>img/rating-icons.png">
                                 <p class="grey">( 20 reviews )</p>                             
                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--more sitter near you-->
                                    </div>
                                </div>





                            </div>


                        </div>





                    </div>
    </section>



    <!-- Get in Touch ends-->


    <!--[Fun News]-->
    <section class="fun-news">


        <div class="fn-bot">
            <ul>
                <li>
                    <div class="fn-outer">
                        <div class="img-box">
                            <img src="<?php echo HTTP_ROOT; ?>img/mn-img-1.png" alt="" />
                        </div>
                        <div class="ho-box">
                            <div class="hb-inner">
                                <p class="txt-head">Sitter Guide</p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                                <a href="#" title="Read More" class="btn-2">Read More  <i class="fa fa-chevron-circle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fn-outer">
                        <div class="img-box">
                            <img src="<?php echo HTTP_ROOT; ?>img/mn-img-2.png" alt="" />
                        </div>
                        <div class="ho-box">
                            <div class="hb-inner">
                                <p class="txt-head">Sitter Guide</p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                                <a href="#" title="Read More" class="btn-2">Read More  <i class="fa fa-chevron-circle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fn-outer">
                        <div class="img-box">
                            <img src="<?php echo HTTP_ROOT; ?>img/mn-img-3.png" alt="" />
                        </div>
                        <div class="ho-box">
                            <div class="hb-inner">
                                <p class="txt-head">Sitter Guide</p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                                <a href="#" title="Read More" class="btn-2">Read More  <i class="fa fa-chevron-circle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fn-outer">
                        <div class="img-box">
                            <img src="<?php echo HTTP_ROOT; ?>img/mn-img-4.png" alt="" />
                        </div>
                        <div class="ho-box">
                            <div class="hb-inner">
                                <p class="txt-head">Sitter Guide</p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                                <a href="#" title="Read More" class="btn-2">Read More  <i class="fa fa-chevron-circle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fn-outer">
                        <div class="img-box">
                            <img src="<?php echo HTTP_ROOT; ?>img/mn-img-5.png" alt="" />
                        </div>
                        <div class="ho-box">
                            <div class="hb-inner">
                                <p class="txt-head">Sitter Guide</p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum. </p>
                                <a href="#" title="Read More" class="btn-2">Read More  <i class="fa fa-chevron-circle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--[Fun News]-->




</main>
<!--[content area End]-->
<!--video popup start-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog video-box">
        <div class="modal-header bod-bot">
            <button aria-label="Close" data-dismiss="modal" class="close" style="color:#fff; opacity:1;" type="button"><span aria-hidden="true"></span> <i class="fa fa-close"></i></button>

        </div>

        <div id="myCarousel13" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner video-box" role="listbox">
                <div class="item active video-iner">
                    <video width="80%" height="auto" autoplay class="header_video">
        <?php if(@$userData->profile_video != ''){
          @$videoPath = HTTP_ROOT.'files/video/'.@$userData->profile_video;
        }else{
         @$videoPath = HTTP_ROOT.'files/video/pdm.mp4';
        } ?>
        <source class="video_img" type="video/mp4" src="<?php echo $videoPath; ?>"></source>
      </video>
                </div>


            </div>
            <!-- Left and right controls -->

            <!-- Left and right controls -->
        </div>
    </div>
</div>
<!--video popup ends-->
<!--Additional Services Popup-->
<div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog">
        <div class="sitter-quike-view">
            <div class="sqv-box">
                <div class="top-close">
                    <p>Geraldo Rates</p>
                    <a href="#" title="Close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>


                <!--Additional Services-->
                <div class="additional-services">
                    <div class="as-area">
                        <div class="h-box">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <p><b></b>House Sitting <br> in your home </p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <span><?php echo '$'.$userData->user_sitter_services[0]->gh_night_rate; ?> <b>per night</b></span>
                                </div>
                            </div>





                        </div>
                        <ul>
                            <li>
                                <div class="cate">
                                    <p><b>Holiday Rate</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->gh_holiday_rate; ?> </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Additional Dog Rate</b> per night per additional dog
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->gh_nc_additional_guest_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Stays of 4 Nights or More</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>$40</p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Puppy Rate</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->gh_puppy_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Cat Care</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->gh_cat_rate; ?>
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="as-area">
                        <div class="h-box h-box-2">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <p><b></b>Dog Boarding<br> the sitter's home</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <span><?php echo '$'.$userData->user_sitter_services[0]->sh_night_rate; ?>  <b>per night</b></span>
                                </div>
                            </div>





                        </div>
                        <ul>
                            <li>
                                <div class="cate">
                                    <p><b>Holiday Rate</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->sh_holiday_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Additional Dog Rate</b> per night per additional dog
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->sh_nc_additional_guest_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Stays of 4 Nights or More</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>$40</p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Puppy Rate</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->sh_puppy_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b> Pick-Up and Drop-Off</b> per round trip
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->mp_ds_premium_driver_service_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Cat Care</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->sh_cat_rate; ?>
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="as-area">
                        <div class="h-box h-box-3">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <p><b></b>Drop-In Visits<br> 30-minute check-ins </p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <span><?php echo '$'.$userData->user_sitter_services[0]->gh_drop_in_visit_rate; ?>  <b>per visit</b></span>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <div class="cate">
                                    <p><b>Holiday Rate</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->gh_drop_in_visit_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Additional Dog Rate</b> per night per additional dog
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>
                                        <?php echo '$'.$userData->user_sitter_services[0]->gh_nc_additional_guest_rate; ?>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <p><b>Stays of 4 Nights or More</b> per night
                                    </p>
                                </div>
                                <div class="prce">
                                    <p>$40</p>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="as-area">
                        <div class="h-box h-box-3">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <p><b></b>Doggy Day Care <br> n the sitter's home </p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <span><?php echo '$'.$userData->user_sitter_services[0]->sh_day_rate; ?>  <b>per day</b></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Additional Services-->

            </div>
        </div>
    </div>
</div>

<!--Additional Services Popup-->

</div>
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            pause: true,
            interval: false
        });
    });
</script>

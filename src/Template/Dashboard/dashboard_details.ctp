<?php       
      $session = $this->request->session();
	  $userType = $session->read("User.user_type");
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
          <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
              <h3><img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Dashboard</h3>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
              <ol class="breadcrumb text-right">
                <li> You are here : </li>
                <li><a href="<?php echo HTTP_ROOT; ?>">Home</a></li>
                <li class="active">Profile</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 col-cust-6">
              <div class="outer-db-box">
              <div class=" top-box">
                <div class="revenue-icon"></div>
                <div class="topbox-text">
                  <h4>9.586</h4>
                  <p>Earning this month</p>
                </div>
              </div>
              <div class="below-top-box">
                <p>Earning this month for (User Name)</p>
              </div>
              <div class="second-box-header">
                <div class="col-xs-7 col-sm-6 col-md-6 col-lg-6">
                  <h5>Earning This Year</h5>
                </div>
                <div class="col-xs-5 col-sm-6 col-md-6 col-lg-6 no-padding-right setting-arrows ">
                  <ul class="list-inline pull-right ">
                    <li><a href="#">
                      <div class="setting-icon"></div>
                      </a></li>
                    <li>
                      <div type="button"  data-toggle="collapse" data-target="#revenue1" class="cursor-pointer">
                        <div class="down-icon"></div>
                      </div>
                    </li>
                    <!--<li><a href="#"    class="close" data-dismiss="alert" aria-label="close" ><div class="cancel-icon"></div></a></li>-->
                    
                  </ul>
                </div>
              </div>
              <div class="below-second-box collapse in" id="revenue1">
                <div class="revenue-graph"  > 
                  <!--<img src="<?php echo HTTP_ROOT; ?>img/calender-big.png" class="img-responsive" style="max-height:200px; width:100%;" alt="calender"> -->
                  
                  <div id="columnchart_values" style="width: 100%; height: 200px;"></div>
                </div>
                <div class="clearfix"></div>
                <div>
                  <h4 class="text-center cal-caption"><i class="fa fa-circle-o color-blue"></i> &nbsp;Earning for year 2015</h4>
                  <hr />
                 <!-- <h1 class="revenue-price-bold text-center">$15.235</h1>-->
                  <p class="revenue-month text-center">Earning this month </p>
                   <div class="revenue-small-text text-center"><p>Earningsi shown are after Sitter Guide
 commission and service costs </p></div>
                </div>
              </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 col-cust-6 ">
              <div class="outer-db-box">
              <div class=" top-box">
                <div class="client-icon"></div>
                <div class="topbox-text">
                  <h4><?php echo @$client_stay_status["new_clients"]; ?></h4>
                  <p>New clients</p>
                </div>
              </div>
              <div class="below-top-box">
                <p>You have <?php echo @$client_stay_status["new_clients"]; ?> new clients</p>
              </div>
              <div class="second-box-header">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <h5>Clients</h5>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding-right setting-arrows">
                  <ul class="list-inline pull-right ">
                    <li><a href="#">
                      <div class="setting-icon"></div>
                      </a></li>
                    <li>
                      <div type="button"  data-toggle="collapse" data-target="#client1" class="cursor-pointer">
                        <div class="down-icon"></div>
                      </div>
                    </li>
                    <!--<li><a href="#"><div class="cancel-icon"></div></a></li>-->
                    
                  </ul>
                </div>
              </div>
              <div class="below-second-box collapse in" id="client1" >
                <div class="padd-left-15 padd-right-15">
                  <p class="client-text text-justify"><span class="client-truncate">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </span></p>
                  <div>
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>Boarding Stay</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="text-right"><?php echo @$client_stay_status['boarding']; ?>% - <span class="numberclient"><?php echo $client_stay_status["boarding_clients"]; ?> clients</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div class="progress-bar overnight-bg" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo @$client_stay_status['boarding']; ?>%"> <span class="sr-only"><?php echo @$client_stay_status['boarding']; ?>% Complete</span></div>
                        </div>
                      </div>
                    </div>
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>House Sitting Stay</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="text-right"><?php echo @$client_stay_status['house_sitting']; ?>% - <span class="numberclient"><?php echo $client_stay_status["house_sitting_clients"]; ?> clients</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div class="progress-bar daystay-bg" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  @$client_stay_status['house_sitting']; ?>%"> <span class="sr-only"><?php echo  @$client_stay_status['house_sitting']; ?>% Complete</span> </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>Drop in visit</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="text-right"><?php echo @$client_stay_status['drop_in_visit']; ?>% - <span class="numberclient"><?php echo $client_stay_status["drop_in_visit_clients"]; ?> clients</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div class="progress-bar dayboarding-bg" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo @$client_stay_status['drop_in_visit']; ?>%"> <span class="sr-only"><?php echo @$client_stay_status['drop_in_visit']; ?>% Complete</span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>Day/Night care</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="text-right"><?php echo @$client_stay_status['day_nigth_care']; ?>% - <span class="numberclient"><?php echo $client_stay_status["day_nigth_care_clients"]; ?> clients</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div class="progress-bar coupons-bg" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo @$client_stay_status['day_nigth_care']; ?>%"> <span class="sr-only"><?php echo @$client_stay_status['day_nigth_care']; ?>% Complete</span> </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>Market Place</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <p class="text-right"><?php echo @$client_stay_status['market_place']; ?>% - <span class="numberclient"><?php echo $client_stay_status["market_place_clients"]; ?> clients</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div class="progress-bar market-bg" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo @$client_stay_status['market_place']; ?>%"> <span class="sr-only"><?php echo @$client_stay_status['market_place']; ?>% Complete</span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row progress-helpers">
                    <div class="col-xs-12 col-sm-6">
                      <p ><i class="fa fa-circle-o color-blue overnight-color"></i> &nbsp;Boarding Stay</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <p><i class="fa fa-circle-o color-blue daystay-color"></i> &nbsp;House Sitting Stay</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <p><i class="fa fa-circle-o color-blue dayboarding-color"></i> &nbsp;Drop in visit</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <p><i class="fa fa-circle-o color-blue coupons-color"></i> &nbsp;Day/Night care</p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <p><i class="fa fa-circle-o color-blue market-color"></i> &nbsp;Market Place</p>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 col-cust-6">
            <div class="outer-db-box">
              <div class=" top-box">
                <div class="event-icon"></div>
                <div class="topbox-text">
                  <h4><?php echo @$client_stay_status["events"]; ?></h4>
                  <p>Events</p>
                </div>
              </div>
              <div class="below-top-box">
                <p>You have currently <?php echo @$client_stay_status["events"]; ?> new events</p>
              </div>
              <div class="second-box-header">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <h5>Calendar</h5>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding-right setting-arrows">
                  <ul class="list-inline pull-right ">
                    <li><a href="#">
                      <div class="setting-icon"></div>
                      </a></li>
                    <li>
                      <div class="cursor-pointer" data-target="#event1" data-toggle="collapse" type="button">
                        <div class="down-icon"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div  id="event1" class="below-second-box collapse in" aria-expanded="true">
                <div class="">
					 <div id="myCalender"><?php echo $this->element('frontElements/Search/calender');?>
					  </div>
					 
					 </div>
		   <!--Start -->
		   <?php if(!empty($booking_requests_info)){ ?>
		     <div id="myCarousel-detail" class="carousel slide" data-ride="carousel">
						  <!-- Wrapper for slides -->
			              <div class="carousel-inner" role="listbox">
							      <?php
							       $k = "active";
							      $sount = count($booking_requests_info);
							      foreach($booking_requests_info as $booking_request){ 
									   ?>
									   <div class="padd-left-15 padd-right-15 border-top item <?php echo @$k; ?>">
										  <div class="row calender-widget">
											<div class="col-md-6 col-sm-6 col-xs-6">
											  <h4><span><img class="img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.(@$booking_request['user']['image'] != ''?@$booking_request['user']['image']:'dm.png'); ?>" width="27" height="27" alt="user-pic"></span> <?php echo $booking_request['user']['first_name']." ".$booking_request['user']['last_name']; ?></h4>
											  <p>
												<label><?php echo $booking_request['user']['city'].", ".$booking_request['user']['country']; ?></label>
											  </p>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
											  <p class="text-right"><?php 
											  date_default_timezone_set("Asia/Kolkata"); 
											  echo date("Y/m/d H:i A",strtotime($booking_request['booknig_start_date'])); ?></p>
											</div>
										  </div>
										  <div class="btn-paddin">
											<button class="btn  btn-green btn-block mtb-15" onclick="location.href='<?php echo HTTP_ROOT.'dashboard/change-booking-status/'.base64_encode(convert_uuencode(@$booking_request['id'])); ?>'">Accept</button>
										  </div>
										  <div> </div>
										</div>
									
									 <?php
									 $k = "";
									  } ?>
							</div>

						  <!-- Left and right controls -->
						  <?php if($sount >1){?>
						  <a class="left carousel-control" href="#myCarousel-detail" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel-detail" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						  <?php } ?>
               </div>
                <?php }else{ ?>
							<div class="padd-left-15 padd-right-15 border-top item">
								  <div class="row calender-widget pad-bottom-12">
									<div class="col-md-6 col-sm-6 col-xs-12">
									  <h4><span>
										  <!--<img class="img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.(@$booking_request['user']['image'] != ''?@$booking_request['user']['image']:'dm.png'); ?>" width="27" height="27" alt="user-pic">-->
										  </span> No Booking Request</h4>
									 
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6">
									  <!--<p class="text-right">Time 2:30 pm</p>-->
									</div>
								  </div>
								 
								  <div> </div>
							 </div>
			    <?php } ?>
                <!--end-->
              </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 col-cust-6">
              <div class="outer-db-box">
              <div class=" top-box">
                <div class="alerts-icon"></div>
                <div class="topbox-text">
                  <h4><?php echo $client_stay_status['alerts']; ?></h4>
                  <p>Alerts</p>
                </div>
              </div>
              <div class="below-top-box">
                <p><?php echo $client_stay_status['alerts']; ?> Unread message</p>
              </div>
              <?php if(!empty($booking_requests_info)){ ?>
              <div class="second-box-header">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <h5>Message</h5>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding-right setting-arrows">
                  <ul class="list-inline pull-right ">
                    <li><a href="#">
                      <div class="setting-icon"></div>
                      </a></li>
                    <li>
                      <div type="button" data-toggle="collapse" data-target="#message1" class="cursor-pointer" aria-expanded="true">
                        <div class="down-icon"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
              <div  id="message1" class="below-second-box collapse in" aria-expanded="true" >
                <div class="padd-left-15 padd-right-15 border-top message-widget" >
				  <?php  
					foreach($booking_requests_info as $single_request){   
				 ?>	
                  <div class="pad-t30"> 
					  <a class="media-left" href="<?php echo HTTP_ROOT.'message/get-messages/pending/'.base64_encode(convert_uuencode(@$single_request['user']['image'])); ?>"> <img width="75px" height="75px" class="media-object img-circle img-thumbnail" src="<?php echo HTTP_ROOT.'img/uploads/'.(@$single_request['user']['image'] != ''?@$single_request['user']['image']:'dm.png'); ?>" alt="Generic placeholder image"> 
					  </a>
                      <div class="media-body">
						  <div class="grey-inner">
							 <p> <?php echo $single_request['message']; ?>
							 </p>
						   </div>
                           <label class="font12 media text-right pull-right"><?php echo $single_request['booknig_start_date']; ?></label>
                     </div>
                  </div>
                 <?php }
                 ?>             
                </div>
              </div>
              <!--Second-widget starts-->
              <div class="below-top-box">
                <p><?php echo @$client_stay_status['alerts']; ?> Unread message</p>
              </div>
              <?php } ?>
              
              <div class="second-box-header">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <h5>Outstanding Tasks</h5>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding-right setting-arrows">
                  <ul class="list-inline pull-right ">
                    <li><a href="#">
                      <div class="setting-icon"></div>
                      </a></li>
                    <li>
                      <div type="button" data-toggle="collapse" data-target="#outstanding1" class="cursor-pointer">
                        <div class="down-icon"></div>
                      </div>
                    </li>
                    <!--<li><a href="#"><div class="cancel-icon"></div></a></li>-->
                    
                  </ul>
                </div>
              </div>
              <div  id="outstanding1" class="below-second-box mb-15 collapse in" aria-expanded="true"  >
                <div class="padd-left-15 padd-right-15 " >
                  <div>
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6 col-lg-7">
                        <p>Main Profile Setup</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 col-lg-5">
                        <p class="text-right"><?php echo $profile_percentage['User']; ?> - <span class="numberclient">Completed</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div style="width:<?php echo $profile_percentage['User']; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar overnight-bg"> <span class="sr-only"><?php echo $profile_percentage['User']; ?>% Complete</span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6 col-lg-7">
                        <p>Sitter Profile Setup</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 col-lg-5">
                        <p class="text-right"><?php echo $profile_percentage['servicesAndRates']; ?>% - <span class="numberclient">Completed</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div style="width:<?php echo $profile_percentage['servicesAndRates']; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar daystay-bg"> <span class="sr-only"><?php echo $profile_percentage['servicesAndRates']; ?>% Complete</span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row progress-section">
                      <div class="col-md-6 col-sm-6 col-xs-6 col-lg-7">
                        <p>Holiday Calender Setup</p>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 col-lg-5">
                        <p class="text-right"><?php echo $profile_percentage['calendar_setup']; ?>% - <span class="numberclient">Completed</span></p>
                      </div>
                      <div class="col-xs-12">
                        <div class="progress">
                          <div style="width:<?php echo $profile_percentage['calendar_setup']; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar dayboarding-bg"> <span class="sr-only"><?php echo $profile_percentage['calendar_setup']; ?>% Complete</span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div> </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          
          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="profile-status-wrapper">
          <h3>Profile Status<i class=" fa fa-question-circle topicon-ques" data-toggle="tooltip" data-placement="bottom" title="Profile @ Sitters"></i></h3>
          <div class="row">
			  <?php if($userType == "Sitter"){ 
				   $session->write("profile","Sitter");
				   
				  ?>
			   <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12 ">
                  <ul class="list-inline blue-wrap wid100">
                  <li class="wid10"><div class="blue40"><?php echo $profile_percentage['User']."%"; ?></div></li>
                    <li class="wid80"><input type="text" class="form-control" placeholder="General Profile"></li>
                       <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $profile_percentage['User'] == 100?'Edit your profile':'Complete your profile'; ?>" type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
                  </ul>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12 ">
                  <ul class="list-inline blue-wrap wid100">
                  <li class="wid10"><div class="blue40-1"><?php echo $profile_percentage['House']."%"; ?></div></li>
                    <li class="wid80"><input type="text" class="form-control" placeholder="Sitter House"></li>
                       <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/house'; ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $profile_percentage['House'] == 100?'Edit your profile':'Complete your profile'; ?>" type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
                  </ul>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
                  <ul class="list-inline blue-wrap wid100">
                  <li class="wid10"><div class="blue40-2"><?php echo $profile_percentage['AboutSitter']."%"; ?></div></li>
                    <li class="wid80"><input type="text" class="form-control" placeholder="About Sitter"></li>
                       <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/about-sitter'; ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $profile_percentage['AboutSitter'] == 100?'Edit your profile':'Complete your profile'; ?>" type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
                  </ul>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
                  <ul class="list-inline blue-wrap wid100">
                  <li class="wid10"><div class="blue40-3"><?php echo $profile_percentage['skillsAndAccreditationDetails']."%"; ?></div></li>
                    <li class="wid80"><input type="text" class="form-control" placeholder="Skills & Accriditation"></li>
                       <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations'; ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $profile_percentage['skillsAndAccreditationDetails'] == 100?'Edit your profile':'Complete your profile'; ?>" type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
                  </ul>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
                  <ul class="list-inline blue-wrap wid100">
					<li class="wid10"><div class="blue40-4"><?php echo $profile_percentage['servicesAndRates']."%"; ?></div></li>
                    <li class="wid80"><input type="text" class="form-control" placeholder="Services & Rates"></li>
                        <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/services-and-rates'; ?>"  data-toggle="tooltip" data-placement="bottom" 
                        title="<?php echo $profile_percentage['servicesAndRates'] == 100?'Edit your profile':'Complete your profile'; ?>
                       " type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
                  </ul>
                  </div>  
                  <?php }else{ 
					  
					  $session->write("profile","Guest");
					  ?>
				      <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12 ">
						  <ul class="list-inline blue-wrap wid100">
						  <li class="wid10"><div class="blue40"><?php echo $profile_percentage['User']."%"; ?></div></li>
							<li class="wid80"><input type="text" class="form-control" placeholder="General Profile"></li>
							   <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/profile'; ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $profile_percentage['User'] == 100?'Edit your profile':'Complete your profile'; ?>" type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
						  </ul>
					 </div>
					 <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12 ">
						  <ul class="list-inline blue-wrap wid100">
						  <li class="wid10"><div class="blue40-1"><?php echo $profile_percentage['House']."%"; ?></div></li>
							<li class="wid80"><input type="text" class="form-control" placeholder="Sitter House"></li>
							   <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/house'; ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $profile_percentage['House'] == 100?'Edit your profile':'Complete your profile'; ?>" type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
						  </ul>
					  </div>
					  <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
					  <ul class="list-inline blue-wrap wid100">
					  <li class="wid10"><div class="blue40-2"><?php echo $profile_percentage['AboutSitter']."%"; ?></div></li>
						<li class="wid80"><input type="text" class="form-control" placeholder="About Sitter"></li>
						   <li class="wid10"><a href="<?php echo HTTP_ROOT.'dashboard/about-sitter'; ?>"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $profile_percentage['AboutSitter'] == 100?'Edit your profile':'Complete your profile'; ?>" type="submit"><div class="question"><i class=" fa fa-question-circle icon-question"></i></div></a></li>
					  </ul>
					  </div>
				  <?php } ?>
                </div>
          </div>
          </div>
          
          </div>
          
          
        </div>
<style>
.font12{font-size:12px !important}

#myCarousel-detail .carousel-control.left {
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0) 100%) !important;
    background-repeat: repeat-x;
}

#myCarousel-detail .carousel-control.right { background-image:none !important;}
.btn-paddin { padding-top:20px !important;}

#myCarousel-detail .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-prev, .carousel-control .icon-next {
    font-size: 30px;
    height: 30px;
    margin-top: -5px !important;
    width: 30px;
}
</style>
<script>
	$(document).ready(function(){
	$('.carousel').carousel({
    pause: true,
    interval: false
}); 
//For chart
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');
      data.addColumn('number', 'Energy Level');

      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1, .25],
        [{v: [9, 0, 0], f: '9 am'}, 2, .5],
        [{v: [10, 0, 0], f:'10 am'}, 3, 1],
        [{v: [11, 0, 0], f: '11 am'}, 4, 2.25],
        [{v: [12, 0, 0], f: '12 pm'}, 5, 2.25],
        [{v: [13, 0, 0], f: '1 pm'}, 6, 3],
        [{v: [14, 0, 0], f: '2 pm'}, 7, 4],
        [{v: [15, 0, 0], f: '3 pm'}, 8, 5.25],
        [{v: [16, 0, 0], f: '4 pm'}, 9, 7.5],
        [{v: [17, 0, 0], f: '5 pm'}, 10, 10],
      ]);

      var options = {
        title: 'Motivation and Energy Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('columnchart_values'));

      chart.draw(data, options);
    }

});
</script>

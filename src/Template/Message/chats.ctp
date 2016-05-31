<?php 

	echo $this->Html->css(['Front/jquery-ui.css','Front/search-result.css']); 
	echo $this->Html->script(['Front/jquery-ui.js','Front/search-filter.js']); 
	echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true');
	echo $this->Html->script(['Front/messages.js']); 

?>

<div class="col-md-9 col-lg-10 col-sm-8 " id="content">
  <div class="row db-top-bar-header no-padding-left no-padding-right">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Inbox
      </h3>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> You are here : 
        </li>
        <li>
          <a href="#">Home
          </a>
        </li>
        <li class="active">Inbox
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="message-full-wrapper">
        <div class="top-message-strip">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
              <ul class="list-inline display-block">
                <li>
                  <p class="head-inbox">
                    <span> 
                      <i class="fa fa-inbox">
                      </i>
                    </span> Inbox
                  </p>
                </li>
                <li>
                  <form class="form-inline sort">
                    <div class="form-group">
                      <label for="exampleInputName2">Sort by
                      </label> &nbsp;
                      <select class="form-control">
                        <option>Sort -1
                        </option>
                        <option>Sorting -2
                        </option>
                        <option>Sorting -3
                        </option>
                      </select>
                    </div>
                  </form>
                </li>
                <li>
                  <p class="message-inbox">
                    <span> 
                      <img src="<?php echo HTTP_ROOT; ?>img/message-openletter.png"  alt="letter">
                    </span> Message
                  </p>
                </li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="input-group s-top-width">
                <input type="text" class="form-control " placeholder="Search Mail...">
                <span class="input-group-btn">
                  <button class="btn  btn-sr" type="button">
                    <i class="fa fa-search">
                    </i>
                  </button>
                </span>
              </div>
              <!-- /input-group -->
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 message-pad-right-0 message-pad-left-0">
              <div id="content-md" class="cscroll">
                
                <div class="book-now-setion-wrapper ">
					<?php
					if(!empty($get_requests)){
						foreach($get_requests as $req_data){
						$req_id = $req_data['id'];
						if(isset($req_data['booking_chats']) && !empty($req_data['booking_chats'])){
							$activeClass = '';
							$badges ='';
						}else{
							$activeClass = 'active-book';
							$badges ='<div class="new-badge">NEW</div>';
						}
					?>
                  <div id="tr_<?php echo $req_id; ?>"  onclick="get_req_data(<?php echo $req_id;?>);" class="book-now-setion-inner <?php echo $activeClass; ?>">
                    <div class="row">
                      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
                        <div class="book-now-img ">
                          
                          <?php if(($req_data['user']['facebook_id']) !="" && ($req_data['user']['is_image_uploaded'])==0){ ?>
							  
								<img 
									class="img-responsive img-circle text-center center-block" 
									alt="<?php echo __('Profile Picture'); ?>" 
									src="<?php if($req_data['user']['image'] != ""){echo $req_data['user']['image'];}else{echo $req_data['user']['image']='prof_photo.png';} ?>"> 
						   
						   <?php }else{ ?>
							
								<img 
									class="img-responsive img-circle text-center center-block"  
									alt="<?php echo __('Profile Picture'); ?>" 
									src="<?php echo HTTP_ROOT.'img/uploads/'.($req_data['user']['image'] != ''?$req_data['user']['image']:'prof_photo.png'); ?>"> 					   
							<?php  } ?>
							
                        </div>
                        
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 message-pad-left-0 message-pad-right-0">
                        <div class="book-now-name"> <?php echo $badges; ?>
                          <p><?php echo $req_data['user']['first_name']." ".substr($req_data['user']['last_name'],0,1);?>
                          </p>
                          <span style="color:#7D7D7D;font-size:11px">
							  <?php echo date("h:i A",strtotime($req_data['created_date'])); ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-5 message-pad-left-0 message-pad-right-0 ">
                        <div class="book-now-name">
                          <p><?php echo substr($req_data['message'],0.20)."..."; ?>
                            <br>
                            <span>Guests Hunter
                            </span>
                          </p>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0">
                        <div class="book-now-name">
                          <p class="text-right"><?php echo date("M d",strtotime($req_data['created_date'])); ?>
                          </p>
                          <button class="btn  btn-block bt-now">
                            <i class="fa fa-calendar">
                            </i>
                            Book Now          
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <?php } ?>
                  
                  <?php 
                  }else{ ?>
					<div class="book-now-setion-inner ">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="book-now-name">
								  <p>
									  No chat found!
								  </p>
								</div>
							</div>
						</div>
					</div>		
				  <?php } ?>
                  
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 border-left1px">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="mess-pad-top">
                    <ul class="list-inline">
                      <li> 
                        <button class="btn btn-ref">
                          <i class="fa fa-refresh">
                          </i>
                        </button>
                      </li>
                      <li> 
                        <button class="btn btn-ref">
                          <i class="fa fa-trash">
                          </i>
                        </button>
                      </li>
                      <li> 
                        <select class="form-control moveto select-1">
                          <option>Move to
                          </option>
                          <option>Move to
                          </option>
                          <option>Move to
                          </option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="img-step img-step-pad">
                    <img src="<?php echo HTTP_ROOT; ?>img/message-step1.png" class="img-responsive" alt="message">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="img-step img-step-pad">
                    <img src="<?php echo HTTP_ROOT; ?>img/message-step2.png" class="img-responsive" alt="message">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="img-step img-step-pad">
                    <img src="<?php echo HTTP_ROOT; ?>img/message-step3.png" class="img-responsive" alt="message">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="img-step img-step-pad">
                    <img src="<?php echo HTTP_ROOT; ?>img/message-step4.png" class="img-responsive" alt="message">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="img-step img-step-pad">
                    <img src="<?php echo HTTP_ROOT; ?>img/message-step5.png" class="img-responsive" alt="message">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <div class="img-step img-step-pad">
                    <img src="<?php echo HTTP_ROOT; ?>img/message-step6.png" class="img-responsive" alt="message">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 message-pad-left-0">
                  <div class="chat-wrapper">
                    <div class="chat-title1">To : 
                      <span> 
                        <b>Jassica A
                        </b>
                      </span>
                    </div>
                    <div id="content-m" class="chatscroll">
                      <div class="chat-wrapper-inner positi ">
                        <div class="container-fluid list_chat_ul">
							
						 <?php echo $this->element('frontElements/Message/ajax_chat_response'); ?>
                      
                        </div>
                      </div>
                    </div>
                    <div class="message-wrap">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <div class="camera1">
                              <a href="#">
                                <i class=" fa fa-camera pull-right">
                                </i>
                              </a>
                            </div>
                          </div>
                          <form id="chat_form" >
							
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<div class="mess-area">
							
									<input type = "hidden" id="booking_message_id" name="booking_message_id" value="<?php echo @$booking_id; ?>" />
									<input type = "hidden" id="user_type" name="user_type" value="<?php echo @$userType; ?>" />
									<input type = "hidden" id="user_id" name="user_id" value="<?php echo @$userId; ?>" />
									<textarea id="chat_text" rows="5" placeholder="Send a new message" name="chat_text" class="form-control"></textarea>
									
								
								</div>
								
								<div class="media">
									<div class="media-left media-middle w-95">
										<input class="btn bt-now1" type="button" name="submit" value="Send" onclick="send_chat_msg(this);" />
									</div>
									<div class="media-body ">
										<p class="mess-tesxt1"> 
											<i class="fa fa-clock-o">
											</i> Stays booked through Sitterguide are covered by free 
											<a href="#" class="colorblue">premium insurance.
											</a>
										</p>
									</div>
								</div>
								
                          </div>
                          
                          </form>		
                          
                        </div>
                      </div>
                    </div>
                    <div class="text-wrap-bottom">
                      <p>Sitterguide is committed to a safe community. Stays booked outside of sitterguide are not covered by insurance. For your safety, never share your contact information, and report any requests to pay outside the sitter platform.
                      </p>
                    </div>
                    <p class="report">
                      <a href="#">
                        <i class=" fa fa-remove">
                        </i> &nbsp; Report this conversation
                      </a>
                    </p>
                  </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                  <div class="job-request-wrapper">
                    <p class="job-req">Job Request Detail
                    </p>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>From : 
                          </td>
                          <td>Aprl 1st, 2016
                          </td>
                          <td>
                            <a href="#">Edit
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>To :
                          </td>
                          <td>Aprl 2nd, 2016
                          </td>
                          <td>
                            <a href="#">Edit
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Where :
                          </td>
                          <td>Jesica A’s Home
                          </td>
                          <td>
                            <a href="#">Edit
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Pets : 
                          </td>
                          <td>Hunter
                          </td>
                          <td>
                            <a href="#">Edit
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td class="width110">Stay Price : 
                          </td>
                          <td>$25.00
                          </td>
                          <td>
                            <a href="#">Edit
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Market Place:
                          </td>
                          <td>NIL
                          </td>
                          <td>
                            <a href="#">Edit
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Notes :
                          </td>
                          <td>Please come over not later than 10
                          </td>
                          <td>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="rate-detail-wrapper">
                      <div class="rate-pad">
                        <p class="rate-det"> Rate Details: 
                        </p>
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>Hunter : 
                              </td>
                              <td>$ 25
                              </td>
                            </tr>
                            <tr>
                              <td>Extended Stay :
                              </td>
                              <td>X 1 night
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="sub-total">
                        <div class="htt">
                          <table class="table ">
                            <tbody>
                              <tr>
                                <td>Subtotal : 
                                </td>
                                <td>$ 25
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <p class="click-bok">Click 
                      <a href="#">
                        <b>"Book It Now"
                        </b>
                      </a> to confirm and pay for this stay. Each Stay is covered by 
                      <a href="#">
                        <u>premium
                          insurance protection.
                        </u>
                      </a>
                    </p>
                    <button class="btn  btn-lg bt-now12 btn-block" type="button">
                      <i class="fa fa-check-circle-o">
                      </i> Book It Now
                    </button>
                  </div>
                  <div class="tip-wrapper">
                    <p class="click-bok1">
                      <b>Sitterguide.com Tip :
                      </b> All transactions booked and paid on Sitterguide.com are covered by Sitterguide’s
                      <br>
                      <a href=""> Peace of Mind Protection
                      </a>.
                    </p>
                  </div>
                  <div class="mem-sinc-15">
                    <div class="member-since1">
                      <div class="media">
                        <div class="media-left media-middle w-95">
                          <a href="#">
                            <img class="media-object sizei65 img-thumbnail" src="<?php echo HTTP_ROOT; ?>img/profile-pic.png" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <p class="media-heading">Jessica R
                          </p>
                          <p class="media-heading-msince">
                            Memeber Since : 01 Aug 2015
                          </p>
                          <p>
                          </p>
                        </div>
                      </div>
                      <p class="text-mem">Hello, my name is jessica, Im 27 years-old and the boy next to me in the picture in my 5 year-old son Givanni. I am a military veteran-formerly worked for the Navy as an aircraft mechanic for 8 years. Currently I am studying Human Rigths in Columbia University and my...
                      </p>
                      <div class="media">
                        <div class="media-left media-middle w-95">
                          <a href="#">
                            <img class="media-object sizei44 img-thumbnail " src="<?php echo HTTP_ROOT; ?>img/profile-pic.png" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <p class="media-heading1">Hunter
                          </p>
                          <p class="media-heading-msince">
                            Male
                          </p>
                          <p class="media-heading-msince">
                            Labrador Retriever
                          </p>
                          <p class="media-heading-msince">1 year, 2 no. old
                          </p>
                          <p class="edit-d-pro">
                            <a href="">Edit Dog Profile
                            </a>
                          </p>
                          <p>
                          </p>
                        </div>
                      </div>
                      <div class="may-call-wrapper">
                        <p class="maycall-text">You may call jessica's permanent Rover number anytime.
                        </p>
                        <p class="may-call-no">
                          <i class="fa fa-circle clgreen">
                          </i>&nbsp; (858) 375-4776
                        </p>
                        <p class="sitterguide-no">Jessica may call your Sitterguide number:
                        </p>
                        <input type="number" class="form-control ">
                        <p class="sitterguide-no1">
                          <a href="#" class="colorblue">Change your client setting for new clients
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php       
		$session = $this->request->session();
		$cuntry_currency = $session->read("currency.currency");
		$cuntry_price = $session->read("currency.price");
		$cuntry_sign_code = $session->read("currency.sign_code");
?>
<!--content area Start-->
<main>   
     <!-- Get in Touch starts-->        
    <section>
    <div class="container">
    <div id="payment-box" >
      <div class="sitter-quike-view" >
      <div class="sqv-box">
        <div class="top-close">
          <p>Reservation Request</p>
          </div>
        <div class="row">       
        
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ">
            <div class="full-content-wrap">
              <div class="best-pract-wrap">
                <div class="best-pract-head">
                  <p>Best Practice: We recommend to contact a host before a reservation</p>
                </div>
                <p class="best-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took </p>
                <div class="msg-send-text"> <a href="#"> Send a Message to Joile</a></div>
              </div>
              <div class="bill-info-wrap">
                <div class="bill-info-head">
                  <p>Billing Inofrmation</p>
                </div>
                <div class="bill-info-inner">
                  <form>
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" placeholder="" class="form-control">
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label>Address 1</label>
                          <input type="text" placeholder="" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label>Address 2</label>
                          <input type="text" placeholder="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" placeholder="" class="form-control">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label>State</label>
                              <input type="text" placeholder="" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label>Country</label>
                          <input type="text" disabled="" placeholder="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label>Zip Code</label>
                          <input type="text" placeholder="" class="form-control">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="payment-info-wrap">
                <div class="payment-info-head">
                  <p>Payment</p>
                </div>
                <div class="payment-info-inner">
                  <div>
                    <label class="radio-inline">
                      <input type="radio">
                      Paypal <span class="pl20"><img alt="paypal" title="paypal" src="images/detail-paypal.png"></span> </label>
                  </div>
                  <div class="c-card">
                    <label class="radio-inline">
                      <input type="radio">
                      Credit Card <span class="pl20"><img alt="Credit Card" title="Credit Card" src="images/detail-visacard.png"></span> </label>
                  </div>
                </div>
              </div>
              <div class="pet-info-wrap">
                <div class="pet-info-head">
                  <p>Pet</p>
                </div>
                <div class="pet-info-inner">
                  <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                      <div class="pet-image-wrap "><img width="70" height="70" alt="upload" class="img-responsive center-block text-center pdb10 img-circle" src="images/detail-pet-upload.png"></div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                      <ul class="list-unstyled">
                        <li>
                          <input type="text" class=" form-control">
                        </li>
                        <li class="pdt10">
                          <input type="text" class=" form-control">
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hello-info-wrap">
                <div class="hello-info-head">
                  <p>Say Hello</p>
                </div>
                <div class="hello-info-inner">
                  <div class="hello-info-text">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class=" col-xs-12 col-md-4 col-sm-4 col-lg-4  ">
            <div class="right-content-wrap">
              <div class="top-box-wrap">
                <div class="row">
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <img width="50" height="50" alt="image" class="img-responsive img-circle text-center center-block" src="<?php echo HTTP_ROOT."img/uploads/".(@$get_booking_requests_to_display['user']['image'] != ""?@$get_booking_requests_to_display['user']['image']:"dm.png"); ?>"> </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <ul class="list-unstyled">
                      <li class="f14"><?php echo @$get_booking_requests_to_display['user']['first_name']; ?></li>
                      <li class="f13"><?php echo @$get_booking_requests_to_display['user']['last_name']; ?></li>
                    </ul>
                  </div>
                </div>
                <div class="night-sitt">
                  <ul class="list-unstyled">
                    <li><?php 
                     $service = str_replace("_"," ",@$get_booking_requests_to_display['required_service']);
                          $service = $service != ""?$service:"_ _ _";
                             
                    echo ucwords(@$service)." ".@$total_days." day"; ?></li>
                    
                    <li><span><?php echo @$get_booking_requests_to_display['booknig_start_date'] != ""?@$get_booking_requests_to_display['booknig_start_date']:"_ _ _"; ?></span> to <span><?php echo @$get_booking_requests_to_display['booking_end_date'] != ""?@$get_booking_requests_to_display['booking_end_date']:"_ _ _"; ?> </span></li>
                  </ul>
                </div>
              </div>
              <div class="table-wrap">
                <table class="table">
                 <tbody>
                    <tr>
                    <td class="tbfont">Number of Pets</td>
                      <td class="tbfont"><?php echo @$pets_count != "" ?@$pets_count:"_ _ _";?></td>
                    </tr>
                    <tr>
                     <td class="tbfont">Cancellation Policy</td>
                      <td class="tbfont"><?php echo @$services_info->cancellation_policy_status == 1?"Flexible":"_ _ _"; ?></td>
                    </tr>
                    <tr>
                      <td class="tbfont">Total Amount</td>
                      <td class="tbfont"> <?php echo $cuntry_currency." ".$cuntry_sign_code." ".$cuntry_price*@$total; ?></td>
                    </tr>
                    <tr>
                      <td class="tbfont">Booking Fee</td>
                      <td class="tbfont"><?php echo @$services_info->booking_status == 1?"Free":"_ _ _"; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="pay-through">
              <h6>Pay through Sitter Guide  for:</h6>
              <ul class="list-unstyled">
              <li> <i class="fa fa-angle-right right-gr"></i>Premium Insurance</li>
              <li><i class="fa fa-angle-right right-gr"></i>100% Satisfection</li>
              <li><i class="fa fa-angle-right right-gr"></i>Money Back</li>
              <li><i class="fa fa-angle-right right-gr"></i>24/support</li>
              <li><i class="fa fa-angle-right right-gr"></i>Daily Photo Update</li>
          
              </ul>
              
              
              </div>
              
            </div>
          </div>
          
          
          
          
        </div>
        
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
        <button class="btn btn-mod-pop-1">Book Now</button>
        </div>
        
        </div>
      </div>
    </div>
    </div>
    
    </div>
    </section>     
    <!-- Get in Touch ends-->    

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
                          
                          <!-- CHAT FORM START -->
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
										<input class="btn bt-now1" type="button" name="submit" value="Send" id="submit_chat" onclick="send_chat_msg(this);" />
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
                          <!-- CHAT FORM END -->
                          
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
                    

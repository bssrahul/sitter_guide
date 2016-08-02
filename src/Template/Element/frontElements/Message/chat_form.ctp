
<div class="message-wrap">						
                      <div class="container-fluid">                        
                        <div class="row"> 
                        <!--
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <div class="camera1">
                              <a href="#">
                                <i class=" fa fa-camera pull-right">
                                </i>
                              </a>
                            </div>
                          </div>                          
                          -->                         
                          <!-- CHAT FORM START -->
                          <form id="chat_form" >							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="mess-area">							
									<input type = "hidden" id="booking_message_id" name="booking_message_id" value="<?php echo @$booking_id; ?>" />
									<input type = "hidden" id="user_type" name="user_type" value="<?php echo @$userType; ?>" />
									<input type = "hidden" id="user_id" name="user_id" value="<?php echo @$userId; ?>" />									
									<?php 
										$user_guest = $get_requests[0]['user_id'];
										$user_sitter = $get_requests[0]['sitter_id'];
										if($userId==$user_guest){
											$userTo = $user_sitter;
										}else{
											$userTo = $user_guest;
										}									
									?>

									<input type ="hidden" id="user_to" name="user_to" value="<?php echo @$userTo; ?>" />									
									<textarea <?php if($booking_id==''){echo "disabled";} ?> id="chat_text" rows="5" placeholder="Send a new message" name="chat_text" class="form-control"></textarea>								
								

								</div>
								<div class="row ">
                                	<div class="send-msg">
										<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
										<input <?php if($booking_id==''){echo "disabled";} ?> class="btn bt-now1" type="button" name="submit" value="Send" id="submit_chat" onclick="send_chat_msg(this);" />
									</div>
										<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
										<p class="mess-tesxt1"> 
											<i class="fa fa-clock-o">
											</i> Stays booked through Sitterguide are covered by free 
											<a href="<?php echo HTTP_ROOT."insurance"; ?>" class="colorblue">premium insurance.
											</a>
										</p>
									</div>
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
                    <?php if(!empty(@$userTo)){ ?>
						<p class="report">
						  <a href="javascript:void(0)" data-target="#myModal8" data-toggle="modal">
							<i class=" fa fa-remove">
							</i> &nbsp; Report this conversation
						  </a>
						</p>
                    <?php } ?>


<!--Report popup starts-->
<div class="modal fade" id="myModal8" role="dialog">
  <div class="modal-dialog">
    <div class="sitter-quike-view">
      <div class="sqv-box">
        <div class="top-close">
          <p>Report This Profile </p>
          <a href="javascript:void(0)" title="Close" data-target="#myModal8" data-toggle="modal" ><i class="fa fa-times" aria-hidden="true"></i></a> </div>
        
        <!--Additional Services-->
        <div>
		<?php 
		  echo $this->Form->create(null, [
			  'url' => ['controller' => 'dashboard', 'action' => 'profile-report'],
			  'id'=>'profile-report',
			]);
		  echo $this->Form->input('ProfileReport.sitter_id',[
				'type' =>'hidden',
				'value'=> base64_encode(convert_uuencode(@$userTo))
		 ]);
		 echo $this->Form->input('ConversesionReport',[
				'type' =>'hidden'
		 ]);	
		?>
          <p class="reson-pad">Reason for reporting (required):</p>
            <?php  
				echo $this->Form->input('ProfileReport.report_reason',[               
				'templates' => ['inputContainer' => '{{content}}'],
				'label'=>false,
				'class'=>'form-control',
				'type'=>'textarea',
				'row'=>'5' 
				]);
		  ?>
          <!--<textarea class="form-control" rows="5"></textarea>-->
           <div class="pull-right bt-pad">
            <button class="btn btn-default" data-dismiss="modal">cancel</button>
            &nbsp;
            <button id="submit-report" type="submit" class="btn btn-success" >Submit</button>
          </div>
          <?php $this->Form->end(); ?>
        </div>
        <!--Additional Services--> 
      </div>
    </div>
  </div>
</div>

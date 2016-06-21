<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" id="content">
    <div class="row">
        <div class="profiletab-section">
			<h3><img src="<?php echo HTTP_ROOT; ?>img/sitter-img.png"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Profile')); ?></h3>
				<?php echo $this->element('frontElements/profile/sitter_nav');?>

        </div>
        <div class="tab-sectioninner book-pro">
            <div class="tab-content">
                <div class="tab-pane fade tab-comm active in" id="menu4">

					<h2 class="head-font"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Which service and rates would you like to offer?')); ?> </h2>
					<p class="head-font2 pad-head-foot pad-head-foot-bot"><?php echo $this->requestAction('app/get-translate/'.base64_encode('You can select and modify your settings in this central control panel')); ?></p>
								
					<h4 id="terms" ><i><img src="<?php echo HTTP_ROOT; ?>img/calendar-with-a-clock-time-tools.png" width="22" height="22" alt="calender"></i> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Going away on leave?')); ?>  <a href="#" class="color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Click here')); ?></a><?php echo $this->requestAction('app/get-translate/'.base64_encode('  to update your calendar settings')); ?> </h4>
				 
				 <h3></h3>
					 <?php 
						echo $this->Form->create(@$sitter_service_info, [
							'url' => ['controller' => 'dashboard', 'action' => 'services-and-rates'],
							'role'=>'form',
							'id'=>'servicesAndRates',
							'autocomplete'=>'off',
						]);
						echo $this->Form->input('UserSitterServices.id',[
							  'type'=>'hidden',
							  'value'=>@$sitterServiceId
													   ]);
						?>
					<div class="row">
                  
						<div class="col-md-4">
							<p><b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Will you accept last minute')); ?></b></p>
									<div class="row">
										<div class="col-lg-8 col-md-9 col-xs-8 col-lg-offset-1 mt10 ">
											<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancellation')); ?></b>
											<small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode(' Under 24 hours')); ?> )</small>
										</div> 
										<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
											<div class="chek-main-lat">
												<div class="onoffswitch">
												  <?php 
													  echo $this->Form->input('UserSitterServices.cancellation_policy_status',[
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
							<div class="row">
								<div class="col-lg-8 col-md-9 col-xs-8 col-lg-offset-1 mt10 ">
									<b><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking')); ?></b><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('Under 24 hours')); ?> ) </small></div> 
									<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
										<div class="chek-main-lat">
											<div class="onoffswitch">
												  <?php  echo $this->Form->input('UserSitterServices.booking_status',[
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
                     </div>
                  
                  </div>
                  
                  
                  
                  <h3></h3>
				<div class="row">
					<div class="form-group col-lg-4 col-md-12">
							<div class="row"><div class="col-lg-9 col-md-9 col-xs-8"><h2 class="f22">
								<?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitting at Sitter House')); ?> 
								</h2></div> 
									<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
											<div class="chek-main-lat">
												<div class="onoffswitch">
													  <?php 
																	   echo $this->Form->input('UserSitterServices.sitter_house_status',[
															'templates' => ['inputContainer' => '{{content}}'],
															'type'=>'checkbox',
															'label' =>false,
															'class'=>'selectedCheckbox',
															'hiddenField' => false
													  ]);?>
												</div>
											</div>
									</div>
							</div>
					</div>
 
				<div class="form-group col-lg-4 col-md-12">
 
						<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Set-up and modify your settings for when you have guests at your house service loads for non-standard services')); ?> </p>
				</div>
 
				<div class="form-group col-lg-4">
					<div class="row">
						<div class="col-lg-4">  
							<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate %')); ?>  <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							  <?php 
									echo $this->Form->input('UserSitterServices.sh_holiday_rate',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label'=>false,
									'class'=>'form-control'
								  ]);
							  ?>
                        </div>
                          
                        <div class="col-lg-4">  
							<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small Guest Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
							  <?php 
								  echo $this->Form->input('UserSitterServices.sh_small_guest_rate',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label'=>false,
									'class'=>'form-control'
								  ]);
							  ?>
                        </div>
                          
                        <div class="col-lg-4">  
							<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large Guest Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
                           <?php 
                              echo $this->Form->input('UserSitterServices.sh_large_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
                           ?>
                        </div>
					</div>
				</div>
			</div>


			<div class="row">
					<div class="form-group col-lg-4 col-md-12">
						<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Day Rate')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </label>
                          <?php 
                              echo $this->Form->input('UserSitterServices.sh_day_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control',
                                'placeholder'=>"$"
                              ]);
                           ?>
					</div>
 
				 <div class="form-group col-lg-4 col-md-12">
				 
				  <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Night Rate')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </label>
										<?php 
											  echo $this->Form->input('UserSitterServices.sh_night_rate',[
												'templates' => ['inputContainer' => '{{content}}'],
												'type'=>'text',
												'label'=>false,
												'class'=>'form-control',
												'placeholder'=>"$"
											  ]);
										?>
				 </div>
 
				<div class="form-group col-lg-4">
					<div class="row">
						<div class="col-lg-4">  
							<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cat Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
                           <?php 
                              echo $this->Form->input('UserSitterServices.sh_cat_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label'=>false,
                                'class'=>'form-control'
                              ]);
							?>
                        </div>
                          
                        <div class="col-lg-8">  
							<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Puppy &kitten Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
							  <?php 
								  echo $this->Form->input('UserSitterServices.sh_puppy_rate',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label'=>false,
									'class'=>'form-control'
								  ]);
								?>
                        </div>
					</div>
                </div>
			</div>
                  

                
            <div class="row clearfix">
                <div class="form-group col-lg-4 col-md-12 mt10 clearfix">
                     <div class="rules_main">
							<div class="row">
								<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Day Care')); ?>
								</div> 
								<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
										<div class="chek-main-lat">
											<?php 
											  echo $this->Form->input('UserSitterServices.sh_day_care_status',[
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
                        
                        <div class="row">
						   <div class="col-lg-9 col-md-9 col-xs-8 ">
								
								<?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate')); ?>
								 
								<small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('2nd consecutive stay onwards')); ?>)</small>
							</div>	
						
						<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
							<div class="chek-main-lat">
									<div class="onoffswitch">
										  <?php 
										   echo $this->Form->input('UserSitterServices.sh_dc_extended_stay_rate_status',[
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
                        
                    <div class="row">
						<div class="col-lg-9 col-md-9 col-xs-8  ">
							<?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode(' more than one guest')); ?> )</small>
						</div> 
						<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
								<div class="chek-main-lat">
									<div class="onoffswitch">
										 <?php 
											echo $this->Form->input('UserSitterServices.sh_dc_additional_guest_rate_status',[
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
                        
                    <div class="row">
							<div class="col-lg-9 col-md-9 col-xs-8  ">
							<?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?>
							</div> 
						<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
							<div class="chek-main-lat">
								<div class="onoffswitch">
									  <?php 
									  echo $this->Form->input('UserSitterServices.sh_dc_repeat_client_only_status',[
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
                    <div class="row">
						<div class="col-lg-5 col-md-12">
								<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						</div> 
						<div class="col-lg-4 col-md-6">
							<?php 
								  echo $this->Form->input('UserSitterServices.sh_dc_additional_guest_limit',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label' =>false,
									'class'=>'form-control h32',
									'hiddenField' => false,
									'placeholder'=>" % "
								   ]);
							  ?>
						</div>
						<div class="col-lg-3 col-md-6 text-right">
							 <label ></label>
						</div>
                    </div>
                      
						<div class="row">
							<div class="col-lg-5 col-md-12">
							<label>	<?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
							</div> 
							<div class="col-lg-4 col-md-6">
								  <?php 
										  echo $this->Form->input('UserSitterServices.sh_dc_extended_stay_rate',[
											'templates' => ['inputContainer' => '{{content}}'],
											'type'=>'text',
											'label' =>false,
											'class'=>'form-control h32',
											'hiddenField' => false,
											'placeholder'=>" % "
										   ]);
									?>
						   </div>
						   <div class="col-lg-3 col-md-6 text-right">
								<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
						   </div>
						</div>
                    <div class="row"><div class="col-lg-5 col-md-12"><label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label> </div> 
                      	<div class="col-lg-4 col-md-6">
                            <?php 
                              echo $this->Form->input('UserSitterServices.sh_dc_additional_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control h32',
                                'hiddenField' => false,
                                'placeholder'=>" % "
                               ]);
							?>
                       </div>
                       <div class="col-lg-3 col-md-6 text-right">
                             <label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
                       </div>
                    </div>
                      
                    <div class="row">
							<div class="col-lg-5 col-md-12">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
									<small class=	"color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode(' override ')); ?>  )
									</small>
							</div> 
							<div class="col-lg-4 col-md-6">
								<?php 
									 echo $this->Form->input('UserSitterServices.sh_dc_holiday_rate',[
										'templates' => ['inputContainer' => '{{content}}'],
										'type'=>'text',
										'label' =>false,
										'class'=>'form-control h32',
										'hiddenField' => false,
										'placeholder'=>" % "
									   ]);
								  ?>
							</div>
							  
							<div class="col-lg-3 col-md-6 text-right">
									<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
							</div>
					</div>
                    </div>          
               
            </div>

            <div class="form-group col-lg-4 col-md-12 mt10 clearfix">
                <div class="rules_main">
                     <div class="row"><div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Night Care')); ?> </div> 
							<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
								<div class="chek-main-lat">
								  <?php 
									  echo $this->Form->input('UserSitterServices.sh_night_care_status',[
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
                    <div class="row">
							<div class="col-lg-9 col-md-9 col-xs-8  ">
								<?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate')); ?> <small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('2nd consecutive stay onwards')); ?>)  </small>
							</div> 
							<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
									<div class="chek-main-lat">
											<div class="onoffswitch">
												 <?php 
												   echo $this->Form->input('UserSitterServices.sh_nc_extended_stay_rate_status',[
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
                        
                    <div class="row">
						<div class="col-lg-9 col-md-9 col-xs-8  ">
							<?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?>
								<small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?> )
								</small>
						</div> 
						<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
							<div class="chek-main-lat">
								<div class="onoffswitch">
									   <?php 
										  echo $this->Form->input('UserSitterServices.sh_nc_additional_guest_rate_status',[
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
                        
                    <div class="row"><div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?> </div> 
						<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
							<div class="chek-main-lat">
								<div class="onoffswitch">
									  <?php 
										  echo $this->Form->input('UserSitterServices.sh_nc_repeat_client_only_status',[
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
                        
                    <div class="row">
							<div class="col-lg-5 col-md-12">
							<label>	<?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit'));  ?>  <i class="fa fa-asterisk" aria-hidden="true"></i></label>
							</div> 
							<div class="col-lg-4 col-md-6">
								<?php 
									  echo $this->Form->input('UserSitterServices.sh_nc_additional_guest_limit',[
										'templates' => ['inputContainer' => '{{content}}'],
										'type'=>'text',
										'label' =>false,
										'class'=>'form-control h32',
										'hiddenField' => false,
										'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')), 
									   ]);
								  ?>
							</div>
                      
							<div class="col-lg-3 col-md-6 text-right">
								<label ></label>
							</div>
                      
                      
                    </div>
                      
                    <div class="row">
						<div class="col-lg-5 col-md-12">
													<label>	<?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate%'));  ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						</div> 
                        <div class="col-lg-4 col-md-6">
							<?php 
								  echo $this->Form->input('UserSitterServices.sh_nc_extended_stay_rate',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label' =>false,
									'class'=>'form-control h32',
									'hiddenField' => false,
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')), 
								   ]);
							  ?>
						</div>
						<div class="col-lg-3 col-md-6 text-right">
							<label >
								<?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?>
							</label>
						</div>
                      
                      
                    </div>
                      
                      
                    <div class="row">
						  <div class="col-lg-5 col-md-12">
							<label>	<?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></label></i>
						  </div> 
						  <div class="col-lg-4 col-md-6">
								<?php 
									  echo $this->Form->input('UserSitterServices.sh_nc_additional_guest_rate',[
										'templates' => ['inputContainer' => '{{content}}'],
										'type'=>'text',
										'label' =>false,
										'class'=>'form-control h32',
										'hiddenField' => false,
										'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
									   ]);
								  ?>
						  </div>
						  
						  <div class="col-lg-3 col-md-6 text-right">
							<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
						  </div>
					</div>
                    
					<div class="row">
							<div class="col-lg-5 col-md-12">
															<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
															<small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('override ')); ?>)  </small>
							</div> 
                      
                      
						  <div class="col-lg-4 col-md-6">
							  <?php 
								  echo $this->Form->input('UserSitterServices.sh_nc_holiday_rate',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label' =>false,
									'class'=>'form-control h32',
									'hiddenField' => false,
									'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
								   ]);
							  ?>
						  </div>
                          <div class="col-lg-3 col-md-6 text-right">
								<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
						  </div>
                    </div>
                              
                </div>
            </div>
			<div class="form-group col-lg-4 col-md-12 clearfix">
                <div class="row mt10 ">
                    <div class="col-lg-12">
						<div class="rules_main">
							<div class="row">
									<div class="col-lg-9 col-md-9 col-xs-8">
										<?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate')); ?><br/> <small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode(' for site or member nominate holiday periods ')); ?> )</small>
									</div> 
									<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
										<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>
											<div class="chek-main-lat">
												 <?php 
													 echo $this->Form->input('UserSitterServices.sh_holiday_rate_status',[
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
					</div>
                </div>
                    
                <div class="row mt10 ">
                    <div class="col-lg-12">
						<div class="rules_main">
							<div class="row">
								<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small Guest Rate')); ?><br/> 			<small	 class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode(' other than cats and dogs  ')); ?>) </small>
								</div> 
								<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
									   <label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>
											<div class="chek-main-lat">
												<?php 
														echo $this->Form->input('UserSitterServices.sh_small_guest_rate_status',[
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
					</div>
                </div>
                <div class="row mt10 ">
                    <div class="col-lg-12">
						<div class="rules_main">
							<div class="row">
								<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large Guest Rate')); ?><br/> <small class="color-green-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('other than cats and dogs')); ?></small>
								</div> 
								<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
									   <label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>

										<div class="chek-main-lat">
											 <?php 
												 echo $this->Form->input('UserSitterServices.sh_large_guest_rate_status',[
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
					</div>
				</div>
                    
                <div class="row mt10 ">
                    <div class="col-lg-12">
						<div class="rules_main">
								<div class="row">
										<div class="col-lg-9 col-md-9 col-xs-8">
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('Cats Rate')); ?><br/>
										</div> 
										<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
                      								<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>

												   <div class="chek-main-lat">
													<?php 
														  echo $this->Form->input('UserSitterServices.sh_cat_rate_status',[
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
					</div>
                </div>
                    
                <div class="row mt10 ">
                    <div class="col-lg-12">
						<div class="rules_main">
							<div class="row">
								<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Puppy and Kitten Rate')); ?><br/> <small class="color-green-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('12 months and younger')); ?>  </small>
								</div> 
								<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
										<label class="pull-right text-right mb2">
											<?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?>
										</label><br>
										<div class="chek-main-lat">
											 <?php 
												 echo $this->Form->input('UserSitterServices.sh_puppy_rate_status',[
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
					</div>
                </div>
                      
            </div>
		</div>
		<h3></h3>
		<div class="clearfix"></div>
       <div class="row">
			<div class="form-group col-lg-4 col-md-12">
					<div class="row">
						<div class="col-lg-9 col-md-9 col-xs-8">
							<h2 class="f22"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitting at Guests House')); ?></h2>
						</div> 
						<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
							<div class="chek-main-lat">
							  <?php 
								 echo $this->Form->input('UserSitterServices.guest_house_status',[
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
 
			 <div class="form-group col-lg-4 col-md-12">
			 	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Set-up and modify your settings for when you have guests at your house service loads for non-standard services')); ?></p>
			 </div>
 
			<div class="form-group col-lg-4">
				<div class="row">
					<div class="col-lg-4">  
							<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
							<?php 
								  echo $this->Form->input('UserSitterServices.gh_holiday_rate',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label' =>false,
									'class'=>'form-control',
									'hiddenField' => false
								   ]);
							  ?>
					</div>
                          
                    <div class="col-lg-4">  
						<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small Guest Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
                        <?php 
                              echo $this->Form->input('UserSitterServices.gh_small_guest_rate',[
                                'templates' => ['inputContainer' => '{{content}}'],
                                'type'=>'text',
                                'label' =>false,
                                'class'=>'form-control',
                                'hiddenField' => false
                               ]);
                          ?>
					</div>
                          
                    <div class="col-lg-4">  
							<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large Guest Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i>
							</label>
							<?php 
								  echo $this->Form->input('UserSitterServices.gh_large_guest_rate',[
									'templates' => ['inputContainer' => '{{content}}'],
									'type'=>'text',
									'label' =>false,
									'class'=>'form-control',
									'hiddenField' => false
								   ]);
							  ?>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="form-group col-lg-4 col-md-12">
				<div class="row">
					<div class="col-lg-6"> 
						<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Day Rate')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </label>
								 <?php 
									  echo $this->Form->input('UserSitterServices.gh_day_rate',[
										'templates' => ['inputContainer' => '{{content}}'],
										'type'=>'text',
										'label' =>false,
										'class'=>'form-control',
										'hiddenField' => false,
										'placeholder'=> $this->requestAction('app/get-translate/'.base64_encode('$')),
									   ]);
								  ?>
					</div>
		 
					<div class="col-lg-6"> <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop-in visit Rate')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </label>
								  <?php 
									  echo $this->Form->input('UserSitterServices.gh_drop_in_visit_rate',[
										'templates' => ['inputContainer' => '{{content}}'],
										'type'=>'text',
										'label' =>false,
										'class'=>'form-control',
										'hiddenField' => false,
										'placeholder'=> $this->requestAction('app/get-translate/'.base64_encode('$')),
									   ]);
								  ?>
					</div>
				</div>
			</div>
			<div class="form-group col-lg-4 col-md-12">
					<label for="" class="f14 color-green">
							<?php echo $this->requestAction('app/get-translate/'.base64_encode('Night Rate')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
					</label>
									<?php 
										echo $this->Form->input('UserSitterServices.gh_night_rate',[
										  'templates' => ['inputContainer' => '{{content}}'],
										  'type'=>'text',
										  'label' =>false,
										  'class'=>'form-control',
										  'hiddenField' => false,
										  'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('$')),
										 ]);
									  ?>
			</div>
			<div class="form-group col-lg-4">
				<div class="row">
					<div class="col-lg-4">  
							<label for="" class="f14 color-green">
									<?php echo $this->requestAction('app/get-translate/'.base64_encode('Cat Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i>
							</label>
									  <?php 
											echo $this->Form->input('UserSitterServices.gh_cat_rate',[
											  'templates' => ['inputContainer' => '{{content}}'],
											  'type'=>'text',
											  'label' =>false,
											  'class'=>'form-control',
											  'hiddenField' => false
											 ]);
									  ?>
					</div>
									  
					<div class="col-lg-8">  <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Puppy &kitten Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<?php 
								echo $this->Form->input('UserSitterServices.gh_puppy_rate',[
									  'templates' => ['inputContainer' => '{{content}}'],
									  'type'=>'text',
									  'label' =>false,
									  'class'=>'form-control',
									  'hiddenField' => false
									 ]);
						?>
					</div>
				 </div>
			</div>
		</div>
                  
        <div class="row">
            <div class="form-group col-lg-4 col-md-12 mt10 clearfix">
                 <div class="row">
						<div class="col-lg-12">
                               <div class="rules_main">
									  <div class="row">
											<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Day Care')); ?>
											</div> 
										  <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
													<?php 
													  echo $this->Form->input('UserSitterServices.gh_day_care_status',[
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
                        
										<div class="row">
												<div class="col-lg-9 col-md-9 col-xs-8  ">
														<?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('2nd consecutive stay onwards')); ?>)  </small>
												</div> 
												  <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
														<div class="chek-main-lat">
																<div class="onoffswitch">
																	<?php 
																	  echo $this->Form->input('UserSitterServices.gh_dc_extended_stay_rate_status',[
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
                        
										<div class="row">
											<div class="col-lg-9 col-md-9 col-xs-8  ">
													<?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?> ) </small>
											</div> 
											<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
													<div class="chek-main-lat">
															<div class="onoffswitch">
																  <?php 
																	echo $this->Form->input('UserSitterServices.gh_dc_additional_guest_rate_status',[
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
                        
									<div class="row">
											<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?></div> 
										  <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
													<div class="onoffswitch">
													 <?php 
														  echo $this->Form->input('UserSitterServices.gh_dc_repeat_client_only_status',[
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
                        
                        
                        
                        
                        
                      <div class="row">
							<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit')); ?><i class="fa fa-asterisk" aria-hidden="true"></i>
							</div> 
							<div class="col-lg-4 col-md-6">
								  <?php 
										echo $this->Form->input('UserSitterServices.gh_dc_additional_guest_limit',[
										  'templates' => ['inputContainer' => '{{content}}'],
										  'type'=>'text',
										  'label' =>false,
										  'class'=>'form-control h32',
										  'hiddenField' => false,
										 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('%')),  
										 ]);
									?>
							</div>
							<div class="col-lg-3 col-md-6 text-right">
									<label ></label>
							</div>
                      
                      
                      </div>
                      
                      <div class="row"><div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </div> 
                      
                      
							  <div class="col-lg-4 col-md-6">
									  <?php 
											echo $this->Form->input('UserSitterServices.gh_dc_extended_stay_rate',[
											  'templates' => ['inputContainer' => '{{content}}'],
											  'type'=>'text',
											  'label' =>false,
											  'class'=>'form-control h32',
											  'hiddenField' => false,
											 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('%')),
											 ]);
										?>
							  </div>
							  
							  <div class="col-lg-3 col-md-6 text-right">
									<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
							  </div>
                      </div>
                      
                    <div class="row">
								<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
								</div> 
							<div class="col-lg-4 col-md-6">
									<?php 
											echo $this->Form->input('UserSitterServices.gh_dc_additional_guest_rate',[
											  'templates' => ['inputContainer' => '{{content}}'],
											  'type'=>'text',
											  'label' =>false,
											  'class'=>'form-control h32',
											  'hiddenField' => false,
											 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('%')),
											 ]);
										?>
							</div>
						  
							<div class="col-lg-3 col-md-6 text-right">
									<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
							</div>
                    </div>
                      
						<div class="row">
								<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> <small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode(' override ')); ?> )</small>
								</div> 
								<div class="col-lg-4 col-md-6">
										<?php 
											echo $this->Form->input('UserSitterServices.gh_dc_holiday_rate',[
											  'templates' => ['inputContainer' => '{{content}}'],
											  'type'=>'text',
											  'label' =>false,
											  'class'=>'form-control h32',
											  'hiddenField' => false,
											 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('%')),
											 ]);
										?>
								</div>
							  
								<div class="col-lg-3 col-md-6 text-right">
									<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
								</div>
						</div>
                              
					</div>
                    
				</div>
                <div class="col-lg-12 mt10">
                       <div class="rules_main">
							  <div class="row">
										<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop-in visit')); ?>
										</div> 
										<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
												 <?php 
													  echo $this->Form->input('UserSitterServices.gh_drop_in_visit_status',[
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
								
							<div class="row">
									<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('2nd consecutive stay onwards')); ?> ) </small>
									</div> 
									<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
											<div class="chek-main-lat">
												<div class="onoffswitch">
												  <?php 
													  echo $this->Form->input('UserSitterServices.gh_dv_extended_stay_rate_status',[
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
								
							<div class="row">
									<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?><small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?>) </small>
									</div> 
									<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
											<div class="chek-main-lat">
													<div class="onoffswitch">
													  <?php 
														 echo $this->Form->input('UserSitterServices.gh_dv_additional_guest_rate_status',[
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
								
							<div class="row">
									<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?>
									</div> 
									<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
											<div class="chek-main-lat">
													<div class="onoffswitch">
													<?php 
													echo $this->Form->input('UserSitterServices.gh_dv_repeat_client_only_status',[
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
							<div class="row">
										<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit')); ?><i class="fa fa-asterisk" aria-hidden="true"></i>  
										</div> 

										<div class="col-lg-4 col-md-6">
												<?php 
												echo $this->Form->input('UserSitterServices.gh_dv_additional_guest_limit',[
												'templates' => ['inputContainer' => '{{content}}'],
												'type'=>'text',
												'label' =>false,
												'class'=>'form-control h32',
												'hiddenField' => false,
												'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
												]);
												?>
										</div>

										<div class="col-lg-3 col-md-6 text-right">
												<label ></label>
										</div>

							</div>
							  
							<div class="row">
										<div class="col-lg-5 col-md-12">
												<?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
										</div> 
										<div class="col-lg-4 col-md-6">
												<?php 
												echo $this->Form->input('UserSitterServices.gh_dv_extended_stay_rate',[
												'templates' => ['inputContainer' => '{{content}}'],
												'type'=>'text',
												'label' =>false,
												'class'=>'form-control h32',
												'hiddenField' => false,
												'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
												]);
												?>
										</div>

										<div class="col-lg-3 col-md-6 text-right">
												<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
										</div>


							</div>
							  
							  
							  <div class="row">
										<div class="col-lg-5 col-md-12"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> 
										</div> 
										<div class="col-lg-4 col-md-6">
											  <?php 
														echo $this->Form->input('UserSitterServices.gh_dv_additional_guest_rate',[
														  'templates' => ['inputContainer' => '{{content}}'],
														  'type'=>'text',
														  'label' =>false,
														  'class'=>'form-control h32',
														  'hiddenField' => false,
														 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
														 ]);
													?>
										</div>
							  
										<div class="col-lg-3 col-md-6 text-right">
											<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
										</div>
							  </div>
							  
							  <div class="row">
									<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate% ')); ?><i class="fa fa-asterisk" aria-hidden="true"></i><small class="color-green-text">( <?php echo $this->requestAction('app/get-translate/'.base64_encode(' override ')); ?>) </small>
									</div> 
									<div class="col-lg-4 col-md-6">
										  <?php 
												echo $this->Form->input('UserSitterServices.gh_dv_holiday_rate',[
												  'templates' => ['inputContainer' => '{{content}}'],
												  'type'=>'text',
												  'label' =>false,
												  'class'=>'form-control h32',
												  'hiddenField' => false,
												 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
												 ]);
											?>
									</div>
							  
									<div class="col-lg-3 col-md-6 text-right">
											<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
									</div>
							  </div>
									  
					</div>
							
                </div>
			</div>
		</div>

			<div class="form-group col-lg-4 col-md-12 mt10 clearfix">
					<div class="rules_main">
								<div class="row"><div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Night Care')); ?></div> 
										<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
														<?php 
														echo $this->Form->input('UserSitterServices.gh_night_care_status',[
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

								<div class="row">
										<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate')); ?><small class="color-green-text"> ( <?php echo $this->requestAction('app/get-translate/'.base64_encode('2nd consecutive stay onwards')); ?> )</small>
										</div> 
										<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
														<div class="onoffswitch">
																<?php 
																echo $this->Form->input('UserSitterServices.gh_nc_extended_stay_rate_status',[
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

								<div class="row">
										<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?>
												<small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?>) </small>
										</div> 
										<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
														<div class="onoffswitch">
																<?php 
																echo $this->Form->input('UserSitterServices.gh_nc_additional_guest_rate_status',[
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

								<div class="row">
										<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?>
										</div> 
										<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
														<div class="onoffswitch">
															<?php 
															echo $this->Form->input('UserSitterServices.gh_nc_repeat_client_only_status',[
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

								<div class="row">
										<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit')); ?><i class="fa fa-asterisk" aria-hidden="true"></i>  </div> 
												<div class="col-lg-4 col-md-6">
														<?php 
														echo $this->Form->input('UserSitterServices.gh_nc_additional_guest_limit',[
														'templates' => ['inputContainer' => '{{content}}'],
														'type'=>'text',
														'label' =>false,
														'class'=>'form-control h32',
														'hiddenField' => false,
														'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
														]);
														?>
												</div>

												<div class="col-lg-3 col-md-6 text-right">
														<label ></label>
												</div>


								</div>

								<div class="row">
									<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Extended Stay Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></div> 
										<div class="col-lg-4 col-md-6">
												<?php 
												echo $this->Form->input('UserSitterServices.gh_nc_extended_stay_rate',[
												'templates' => ['inputContainer' => '{{content}}'],
												'type'=>'text',
												'label' =>false,
												'class'=>'form-control h32',
												'hiddenField' => false,
												'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
												]);
												?>    
										</div>
										<div class="col-lg-3 col-md-6 text-right">
												<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
										</div>
								</div>


								<div class="row">
										<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> 
										</div> 
										<div class="col-lg-4 col-md-6">
												<?php 
												echo $this->Form->input('UserSitterServices.gh_nc_additional_guest_rate',[
												'templates' => ['inputContainer' => '{{content}}'],
												'type'=>'text',
												'label' =>false,
												'class'=>'form-control h32',
												'hiddenField' => false,
												'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
												]);
												?>
										</div>

										<div class="col-lg-3 col-md-6 text-right">
												<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
										</div>
								</div>

								<div class="row">
										<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> <small class=		"color-green-text">( <?php echo $this->requestAction('app/get-translate/'.base64_encode(' override ')); ?> )</small>
										</div> 
										<div class="col-lg-4 col-md-6">
													<?php 
													echo $this->Form->input('UserSitterServices.gh_nc_holiday_rate',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'text',
													'label' =>false,
													'class'=>'form-control h32',
													'hiddenField' => false,
													'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
													]);
													?>
										</div>

										<div class="col-lg-3 col-md-6 text-right">
												<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
										</div>

								</div>

					</div>
			</div>

                    <div class="form-group col-lg-4 col-md-12 ">
                            <div class="row mt10 ">
									<div class="col-lg-12">
										<div class="rules_main">
											<div class="row">
													<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate')); ?><br/> <small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode(' for site or member nominate holiday periods ')); ?>)</small>
													</div> 
													<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
													  
															<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>

														   <div class="chek-main-lat">
															<?php 
																echo $this->Form->input('UserSitterServices.gh_holiday_rate_status',[
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
									</div>
							</div>
                    
						<div class="row mt10 ">
								<div class="col-lg-12">
									<div class="rules_main">
										  <div class="row">
												<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small Guest Rate')); ?><br/> <small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode(' other than cats and dogs ')); ?>) </small>
												</div> 
											   <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
											  
													<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>

													   <div class="chek-main-lat">
														<?php 
															 echo $this->Form->input('UserSitterServices.gh_small_guest_rate_status',[
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
								</div>
						</div>
                    
                    <div class="row mt10 ">
						<div class="col-lg-12">
								<div class="rules_main">
									  <div class="row">
												<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large Guest Rate')); ?><br/> 	<small class="color-green-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('other than cats and dogs')); ?> 	</small>
												</div> 
											  <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
														<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>

													   <div class="chek-main-lat">
														 <?php 
															  echo $this->Form->input('UserSitterServices.gh_large_guest_rate_status',[
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
						  </div>
                    </div>
                    
                    <div class="row mt10 ">
								<div class="col-lg-12">
										<div class="rules_main">
											<div class="row">
													<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cats Rate')); ?><br/> </div> 
												  <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												  
														  <label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>

														   <div class="chek-main-lat">
															<?php 
																  echo $this->Form->input('UserSitterServices.gh_cat_rate_status',[
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
								</div>
                    </div>
                    
                    <div class="row mt10 ">
							<div class="col-lg-12">
									<div class="rules_main">
											  <div class="row">
													  <div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Puppy and Kitten Rate')); ?><br/> <small class="color-green-text"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('12 months and younger')); ?> </small>
													  </div> 
													  <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
													  
															<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label><br>

															   <div class="chek-main-lat">
																		<?php 
																			  echo $this->Form->input('UserSitterServices.gh_puppy_rate_status',[
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
							</div>
                    </div>
                      
              </div>
        </div>
				<h3></h3>
				<div class="row">
						<div class="form-group col-lg-4 col-md-12">
								<div class="row">
										<div class="col-lg-9 col-md-9 col-xs-8"><h2 class="f22"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place')); ?></br>
										<small class="color-green f14">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('services charged at an hourly rate')); ?> ) </small></h2>
										</div> 
									  <div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
												<div class="chek-main-lat">
												   <?php 
													  echo $this->Form->input('UserSitterServices.market_place_status',[
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
				 
					 <div class="form-group col-lg-4 col-md-12">
					 
							<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Set-up and modify your settings for your market place / hourly charged services. include service loads for non-standard services.')); ?></p>
					 </div>
					 
					 <div class="form-group col-lg-4">
							 <div class="row">
										<div class="col-lg-4">  
												<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
												<?php 
														echo $this->Form->input('UserSitterServices.mp_holiday_rate',[
														  'templates' => ['inputContainer' => '{{content}}'],
														  'type'=>'text',
														  'label' =>false,
														  'class'=>'form-control',
														  'hiddenField' => false,
														 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
														 ]);
													?>
										</div>
											  
										<div class="col-lg-4">  
												<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small Guest Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
												  <?php 
														echo $this->Form->input('UserSitterServices.mp_small_guest_rate',[
														  'templates' => ['inputContainer' => '{{content}}'],
														  'type'=>'text',
														  'label' =>false,
														  'class'=>'form-control',
														  'hiddenField' => false,
														  'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
														 ]);
													?>
										</div>
											  
										<div class="col-lg-4">  
													<label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large Guest Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
													  <?php 
															echo $this->Form->input('UserSitterServices.mp_large_guest_rate',[
															  'templates' => ['inputContainer' => '{{content}}'],
															  'type'=>'text',
															 'label' =>false,
															  'class'=>'form-control',
															  'hiddenField' => false,
															 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
															 ]);
														?>
										</div>
									</div>
						</div>
				</div>


					<div class="row">

							<div class="form-group col-lg-4 col-md-12">


									<div class="row">
											<div class="col-lg-6"> <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Grooming Rate')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </label>
													<?php 
													echo $this->Form->input('UserSitterServices.mp_grooming_rate',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'text',
													'label' =>false,
													'class'=>'form-control',
													'hiddenField' => false
													]);
													?>
											</div>

											<div class="col-lg-6"> <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Recreation Rate')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></label>
													<?php 
													echo $this->Form->input('UserSitterServices.mp_recreation_rate',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'text',
													'label' =>false,
													'class'=>'form-control',
													'hiddenField' => false
													]);
													?>
											</div>
										</div>
							</div>

							<div class="form-group col-lg-4 col-md-12">
									<div class="row">
											<div class="col-lg-6"> <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Training Rate')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </label>
													<?php 
													echo $this->Form->input('UserSitterServices.mp_training_rate',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'text',
													'label' =>false,
													'class'=>'form-control',
													'hiddenField' => false
													]);
													?>
											</div>

											<div class="col-lg-6"> <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Driving Rate')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </label>
													<?php 
													echo $this->Form->input('UserSitterServices.mp_driving_rate',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'text',
													'label' =>false,
													'class'=>'form-control',
													'hiddenField' => false
													]);
													?>
											</div>

									</div>
							</div>

							<div class="form-group col-lg-4">

									<div class="row">

											<div class="col-lg-4">  <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cat Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
													<?php 
													echo $this->Form->input('UserSitterServices.mp_cat_rate',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'text',
													'label' =>false,
													'class'=>'form-control',
													'hiddenField' => false
													]);
													?>
											</div>

											<div class="col-lg-8">  <label for="" class="f14 color-green"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Puppy &kitten Rate %')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></label>
													<?php 
													echo $this->Form->input('UserSitterServices.mp_puppy_rate',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'text',
													'label' =>false,
													'class'=>'form-control',
													'hiddenField' => false
													]);
													?>
											</div>
									</div>
							</div>

					</div>
                  


				<div class="row">
						<div class="form-group col-lg-4 col-md-12 mt10 clearfix">
							<div class="row">
									<div class="col-lg-12">
										<div class="rules_main">
												<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Grooming')); ?>
															</div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																	<div class="chek-main-lat">
																			<?php 
																			echo $this->Form->input('UserSitterServices.mp_grooming_status',[
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

												<div class="row">
														<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Premium Grooming Rate')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than wash and blow dry')); ?> ) </small>
														</div> 
														<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																<div class="chek-main-lat">
																		<div class="onoffswitch">
																		<?php 
																		echo $this->Form->input('UserSitterServices.mp_gr_premium_grooming_rate_status',[
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

												<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?> )</small>
															</div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																	<div class="chek-main-lat">
																			<div class="onoffswitch">
																					<?php 
																					echo $this->Form->input('UserSitterServices.mp_gr_additional_guest_rate_status',[
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

												<div class="row">
														<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?>
														</div> 
														<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
															<div class="chek-main-lat">
																	<div class="onoffswitch">
																			<?php 
																			echo $this->Form->input('UserSitterServices.mp_gr_repeat_client_only_status',[
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
											<div class="row">
													<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit')); ?> 
													<i class="fa fa-asterisk" aria-hidden="true"></i></div> 
													<div class="col-lg-4 col-md-6">
															<?php 
															echo $this->Form->input('UserSitterServices.mp_gr_additional_guest_limit',[
															'templates' => ['inputContainer' => '{{content}}'],
															'type'=>'text',
															'label' =>false,
															'class'=>'form-control h32',
															'hiddenField' => false,
															'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
															]);
															?>
													</div>

													<div class="col-lg-3 col-md-6 text-right">
															<label ></label>
													</div>
											</div>

											<div class="row">
													<div class="col-lg-5 col-md-12">
														<?php echo $this->requestAction('app/get-translate/'.base64_encode('Premium Grooming Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
													</div> 
													<div class="col-lg-4 col-md-6">
															<?php 
															echo $this->Form->input('UserSitterServices.mp_gr_premium_grooming_rate',[
															'templates' => ['inputContainer' => '{{content}}'],
															'type'=>'text',
															'label' =>false,
															'class'=>'form-control h32',
															'hiddenField' => false,
															'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
															]);
															?>
													</div>

													<div class="col-lg-3 col-md-6 text-right">
															<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
													</div>
											</div>


											<div class="row">
													<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </div> 
													<div class="col-lg-4 col-md-6">
														<?php 
																echo $this->Form->input('UserSitterServices.mp_gr_additional_guest_rate',[
																'templates' => ['inputContainer' => '{{content}}'],
																'type'=>'text',
																'label' =>false,
																'class'=>'form-control h32',
																'hiddenField' => false,
																'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																]);
														?>
													</div>

													<div class="col-lg-3 col-md-6 text-right">
															<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
													</div>
											</div>

											<div class="row">
													<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode(' override ')); ?>) </small>
													</div> 
													<div class="col-lg-4 col-md-6">
															<?php 
															echo $this->Form->input('UserSitterServices.mp_gr_holiday_rate',[
															'templates' => ['inputContainer' => '{{content}}'],
															'type'=>'text',
															'label' =>false,
															'class'=>'form-control h32',
															'hiddenField' => false,
															'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
															]);
															?>
													</div>

													<div class="col-lg-3 col-md-6 text-right">
															<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
													</div>
											</div>

										</div>
								</div>


								<div class="col-lg-12 mt10">

											<div class="rules_main">
														<div class="row">
																<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Recreation (Walking)')); ?></div> 
																<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																		<div class="chek-main-lat">
																				<?php 
																				echo $this->Form->input('UserSitterServices.mp_recreation_status',[
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

														<div class="row">
																<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Premium Recreation Rate')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?>) </small>
																</div> 
																<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																		<div class="chek-main-lat">
																				<div class="onoffswitch">
																						<?php 
																						echo $this->Form->input('UserSitterServices.mp_rc_premium_recreation_rate_status',[
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

														<div class="row">
																<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?><small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?> ) </small>
																</div> 
																<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																		<div class="chek-main-lat">
																				<div class="onoffswitch">
																						<?php 
																						echo $this->Form->input('UserSitterServices.mp_rc_additional_guest_rate_status',[
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

														<div class="row">
																<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?></div> 
																<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																		<div class="chek-main-lat">
																				<div class="onoffswitch">
																						<?php 
																						echo $this->Form->input('UserSitterServices.mp_rc_repeat_client_only_status',[
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
														<div class="row">
																<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></div> 
																<div class="col-lg-4 col-md-6">
																		<?php 
																		echo $this->Form->input('UserSitterServices.mp_rc_additional_guest_limit',[
																		'templates' => ['inputContainer' => '{{content}}'],
																		'type'=>'text',
																		'label' =>false,
																		'class'=>'form-control h32',
																		'hiddenField' => false,
																		'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																		]);
																		?>
																</div>

																<div class="col-lg-3 col-md-6 text-right">
																	<label ></label>
																</div>
														</div>

														<div class="row">
																<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Premium Recreation Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></div> 
																<div class="col-lg-4 col-md-6">
																		<?php 
																		echo $this->Form->input('UserSitterServices.mp_rc_premium_recreation_rate',[
																		'templates' => ['inputContainer' => '{{content}}'],
																		'type'=>'text',
																		'label' =>false,
																		'class'=>'form-control h32',
																		'hiddenField' => false,
																		'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																		]);
																		?>
																</div>

																<div class="col-lg-3 col-md-6 text-right">
																		<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
																</div>


														</div>


														<div class="row">
																<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
																</div> 
																<div class="col-lg-4 col-md-6">
																		<?php 
																		echo $this->Form->input('UserSitterServices.mp_rc_additional_guest_rate',[
																		'templates' => ['inputContainer' => '{{content}}'],
																		'type'=>'text',
																		'label' =>false,
																		'class'=>'form-control h32',
																		'hiddenField' => false,
																		'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																		]);
																		?>
																</div>

																<div class="col-lg-3 col-md-6 text-right">
																		<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
																</div>
														</div>

														<div class="row">
																<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i><small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode(' override ')); ?>  )</small></div> 
																<div class="col-lg-4 col-md-6">
																		<?php 
																		echo $this->Form->input('UserSitterServices.mp_rc_holiday_rate',[
																		'templates' => ['inputContainer' => '{{content}}'],
																		'type'=>'text',
																		'label' =>false,
																		'class'=>'form-control h32',
																		'hiddenField' => false,
																		'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																		]);
																		?>
																</div>
																<div class="col-lg-3 col-md-6 text-right">
																		<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
																</div>
														</div>
												</div>
											</div>
							</div>
					</div>

					<div class="form-group col-lg-4 col-md-12 mt10 clearfix">
							<div class="row">
									<div class="col-lg-12">
											<div class="rules_main">
													<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Training')); ?></div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																	<div class="chek-main-lat">
																	<?php 
																	echo $this->Form->input('UserSitterServices.mp_training_status',[
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

													<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Premium Training Rate')); ?><small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('advanced or show dog training')); ?>)  </small>
															</div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																	<div class="chek-main-lat">
																			<div class="onoffswitch">
																			<?php 
																			echo $this->Form->input('UserSitterServices.mp_tr_premium_training_rate_status',[
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

												<div class="row">
														<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?><small class="color-green-text">( <?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?> )</small>
														</div> 
														<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																<div class="chek-main-lat">
																		<div class="onoffswitch">
																				<?php 
																				echo $this->Form->input('UserSitterServices.mp_tr_additional_guest_rate_status',[
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

												<div class="row">
														<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?>
														</div> 
														<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																<div class="chek-main-lat">
																		<div class="onoffswitch">
																				<?php 
																				echo $this->Form->input('UserSitterServices.mp_tr_repeat_client_only_status',[
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
												<div class="row">
															<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></div> 
															<div class="col-lg-4 col-md-6">
																	<?php 
																	echo $this->Form->input('UserSitterServices.mp_tr_additional_guest_limit',[
																	'templates' => ['inputContainer' => '{{content}}'],
																	'type'=>'text',
																	'label' =>false,
																	'class'=>'form-control h32',
																	'hiddenField' => false,
																	'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																	]);
																	?>
															</div>

															<div class="col-lg-3 col-md-6 text-right">
																	<label ></label>
															</div>


												</div>

												<div class="row">
															<div class="col-lg-5 col-md-12"> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Premium Training Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></div> 


															<div class="col-lg-4 col-md-6">
																	<?php 
																	echo $this->Form->input('UserSitterServices.mp_tr_premium_training_rate',[
																	'templates' => ['inputContainer' => '{{content}}'],
																	'type'=>'text',
																	'label' =>false,
																	'class'=>'form-control h32',
																	'hiddenField' => false,
																	'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																	]);
																	?>
															</div>
															<div class="col-lg-3 col-md-6 text-right">
																	<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
															</div>


												</div>


												<div class="row">
																<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i></div> 
															<div class="col-lg-4 col-md-6">
																	<?php 
																	echo $this->Form->input('UserSitterServices.mp_tr_additional_guest_rate',[
																	'templates' => ['inputContainer' => '{{content}}'],
																	'type'=>'text',
																	'label' =>false,
																	'class'=>'form-control h32',
																	'hiddenField' => false,
																	'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																	]);
																	?>
															</div>

															<div class="col-lg-3 col-md-6 text-right">
																	<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
															</div>
												</div>

												<div class="row">
															<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i><small class="color-green-text">( <?php echo $this->requestAction('app/get-translate/'.base64_encode(' override  ')); ?>)</small></div> 


															<div class="col-lg-4 col-md-6">
																	<?php 
																	echo $this->Form->input('UserSitterServices.mp_tr_holiday_rate',[
																	'templates' => ['inputContainer' => '{{content}}'],
																	'type'=>'text',
																	'label' =>false,
																	'class'=>'form-control h32',
																	'hiddenField' => false,
																	'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																	]);
																	?>
															</div>
															<div class="col-lg-3 col-md-6 text-right">
																	<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
															</div>
												</div>

											</div>

									</div>


								<div class="col-lg-12 mt10">

										<div class="rules_main">
												<div class="row">
														<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Driver Service')); ?></div> 
														<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																<div class="chek-main-lat">
																		<?php 
																		echo $this->Form->input('UserSitterServices.mp_driver_service_status',[
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

												<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Return Trip')); ?><small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode('pick up & drop off')); ?> )</small>
															</div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																	<div class="chek-main-lat">
																			<div class="onoffswitch">
																					<?php 
																					echo $this->Form->input('UserSitterServices.mp_ds_return_trip_status',[
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

												<div class="row">
														<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate')); ?><small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('more than one guest')); ?> ) </small>
														</div> 
														<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																<div class="chek-main-lat">
																		<div class="onoffswitch">
																				<?php 
																				echo $this->Form->input('UserSitterServices.mp_ds_additional_guest_rate_status',[
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

												<div class="row">
														<div class="col-lg-9 col-md-9 col-xs-8  "><?php echo $this->requestAction('app/get-translate/'.base64_encode('Repeat client only')); ?>
														</div> 
														<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  
																<div class="chek-main-lat">
																		<div class="onoffswitch">
																				<?php 
																				echo $this->Form->input('UserSitterServices.mp_ds_repeat_client_only_status',[
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

											<div class="row">
													<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Limit ')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </div> 
													<div class="col-lg-4 col-md-6">
															<?php 
															echo $this->Form->input('UserSitterServices.mp_ds_additional_guest_limit',[
															'templates' => ['inputContainer' => '{{content}}'],
															'type'=>'text',
															'label' =>false,
															'class'=>'form-control h32',
															'hiddenField' => false,
															'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
															]);
															?>
													</div>

													<div class="col-lg-3 col-md-6 text-right">
															<label ></label>
													</div>
											</div>

											<div class="row">
													<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Premium Driver Service Rate% ')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> </div> 
													<div class="col-lg-4 col-md-6">
															<?php 
															echo $this->Form->input('UserSitterServices.mp_ds_premium_driver_service_rate',[
															'templates' => ['inputContainer' => '{{content}}'],
															'type'=>'text',
															'label' =>false,
															'class'=>'form-control h32',
															'hiddenField' => false,
															'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
															]);
															?>
													</div>

													<div class="col-lg-3 col-md-6 text-right">
															<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$00.00')); ?></label>
													</div>
											</div>


											<div class="row">
															<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Additional Guest Rate% ')); ?><i class="fa fa-asterisk" aria-hidden="true"></i></div> 
															<div class="col-lg-4 col-md-6">
																	<?php 
																	echo $this->Form->input('UserSitterServices.mp_ds_additional_guest_rate',[
																	'templates' => ['inputContainer' => '{{content}}'],
																	'type'=>'text',
																	'label' =>false,
																	'class'=>'form-control h32',
																	'hiddenField' => false,
																	'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode(' % ')),
																	]);
																	?>
															</div>
															<div class="col-lg-3 col-md-6 text-right">
																	<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$ 00.00')); ?></label>
															</div>
											</div>

											<div class="row">
													<div class="col-lg-5 col-md-12"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate%')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> <small class="color-green-text"> (<?php echo $this->requestAction('app/get-translate/'.base64_encode(' override ')); ?>) </small></div> 


													<div class="col-lg-4 col-md-6">
															<?php 
															echo $this->Form->input('UserSitterServices.mp_ds_holiday_rate',[
															'templates' => ['inputContainer' => '{{content}}'],
															'type'=>'text',
															'label' =>false,
															'class'=>'form-control h32',
															'hiddenField' => false,
															'placeholder'=> $this->requestAction('app/get-translate/'.base64_encode(' % ')),
															]);
															?>
													</div>

													<div class="col-lg-3 col-md-6 text-right">
															<label ><?php echo $this->requestAction('app/get-translate/'.base64_encode('$ 00.00')); ?></label>
													</div>
											</div>
										</div>
									</div>
							</div>
					</div>

					<div class="form-group col-lg-4 col-md-12 clearfix">

							<div class="row mt10 ">
									<div class="col-lg-12">
											<div class="rules_main">
													<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Holiday Rate')); ?><br/> <small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode(' for site or member nominate holiday periods ')); ?>) </small>
															</div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  

																	<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$ 00.00')); ?></label><br>

																	<div class="chek-main-lat">
																			<?php 
																			echo $this->Form->input('UserSitterServices.mp_holiday_rate_status',[
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
									</div>
							</div>

							<div class="row mt10 ">
									<div class="col-lg-12">
											<div class="rules_main">
													<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Small Guest Rate')); ?><br/> <small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode(' other than cats and dogs ')); ?> ) </small>
															</div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  

																	<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$ 00.00')); ?></label><br>

																	<div class="chek-main-lat">
																			<?php 
																			echo $this->Form->input('UserSitterServices.mp_small_guest_rate_status',[
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
									</div>
							</div>

							<div class="row mt10 ">
									<div class="col-lg-12">
											<div class="rules_main">
													<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Large Guest Rate')); ?><br/> <small class="color-green-text">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('other than cats and dogs ')); ?>)</small>
															</div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  

																	<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$ 00.00')); ?></label><br>

																	<div class="chek-main-lat">
																			<?php 
																			echo $this->Form->input('UserSitterServices.mp_large_guest_rate_status',[
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
									</div>
							</div>

							<div class="row mt10 ">
									<div class="col-lg-12">
											<div class="rules_main">
													<div class="row">
															<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cats Rate')); ?><br/> </div> 
															<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  

																	<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$ 00.00')); ?></label><br>

																	<div class="chek-main-lat">
																			<?php 
																			echo $this->Form->input('UserSitterServices.mp_cat_rate_status',[
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
									</div>
							</div>

							<div class="row mt10 ">
									<div class="col-lg-12">
											<div class="rules_main">
											<div class="row">
													<div class="col-lg-9 col-md-9 col-xs-8"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Puppy and Kitten Rate')); ?><br/> <small class="color-green-text"><?php echo $this->requestAction('app/get-translate/'.base64_encode('12 months and younger')); ?>  </small>
													</div> 
													<div class="col-lg-3 col-md-3 col-xs-3 pull-right">  

															<label class="pull-right text-right mb2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('$ 00.00')); ?></label><br>

															<div class="chek-main-lat">
																	<?php 
																	echo $this->Form->input('UserSitterServices.mp_puppy_rate_status',[
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
									</div>
							</div>

					</div>



				</div>
					<h3>	</h3>

					<h2 class="f22 mb10">
							<?php echo $this->requestAction('app/get-translate/'.base64_encode('Calendar')); ?><br>
							<small class="color-green f14">(<?php echo $this->requestAction('app/get-translate/'.base64_encode('Daily booking limits for your sitter booking. Show how many spaces are available for each service')); ?> ) </small>
					</h2>
					<div class="row img-rightsp mt10">
							<div class="form-group col-lg-4">
									<label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('1. Day Care P/day Limit')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i><img src="<?php echo HTTP_ROOT; ?>img/daym1.png"> </label>
									<?php 
									echo $this->Form->input('UserSitterServices.day_care_limit',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label'=>false,
									'required'=>false,
									'class'=>'form-control mzero'
									]);
									?> 
							</div>
							<div class="form-group col-lg-4">
									<label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('2. Night Care P/day Limit')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> <img src="<?php echo HTTP_ROOT; ?>img/nightm1.png"> </label>
									<?php 
									echo $this->Form->input('UserSitterServices.night_care_limit',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label'=>false,
									'required'=>false,
									'class'=>'form-control mzero'
									]);
									?>

							</div>
							<div class="form-group col-lg-4">
									<label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('3. Visits P/day Limit')); ?> <i class="fa fa-asterisk" aria-hidden="true"></i><img src="<?php echo HTTP_ROOT; ?>img/visitm1.png"> </label>
									<?php 
									echo $this->Form->input('UserSitterServices.visits_limit',[
									'templates' => ['inputContainer' => '{{content}}'],
									'label'=>false,
									'required'=>false,
									'class'=>'form-control mzero'
									]);
									?>
							</div>
					</div>
						<div class="row img-rightsp mt10">
								<div class="form-group col-lg-4">
										<label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('4. Market Place P/Day Limit')); ?><i class="fa fa-asterisk" aria-hidden="true"></i> <img src="<?php echo HTTP_ROOT; ?>img/hourlym1.png"> </label>
										<?php 
										echo $this->Form->input('UserSitterServices.hourly_services_limit',[
										'templates' => ['inputContainer' => '{{content}}'],
										'label'=>false,
										'required'=>false,
										'class'=>'form-control mzero'
										]);
										?> 
								</div>
						</div>
						<div class="row">
									<p class="col-lg-12 sp-tb"><a href="<?php echo HTTP_ROOT.'dashboard/professional-accreditations'; ?>"><button type="button" class="btn previous pull-left"><i class="fa fa-chevron-left"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?></button></a>
									<input type="submit" class="pull-right btn Continue" value="Submit" /></p>
						</div>
					
						<?php echo $this->Form->end(); ?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $this->Html->css('Front/dist/jquery.onoff.css');
		echo $this->Html->script(['Front/dist/jquery.onoff.js']);
?>
<style>
label .fa.fa-asterisk {
    font-size: 6px;
    left: 2px;
    position: relative;
    top: -5px;
    color: red;
}
.fa.fa-asterisk {
    font-size: 6px;
    left: 2px;
    position: relative;
    top: -5px;
    color: red;
}

</style>



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

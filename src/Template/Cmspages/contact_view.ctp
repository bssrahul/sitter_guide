<div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    <?php echo $this->requestAction('app/get-translate/'.base64_encode('Contact Request View')); ?>
                </h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>
			    <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                               <div class="x_content">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th><?php echo $this->requestAction('app/get-translate/'.base64_encode('Name')); ?></th>
												<td class="col-md-9 col-sm-9 col-xs-9">
												<?php echo $contactRequest->name?></td>
											</tr>
											<tr>
                                                <th><?php echo $this->requestAction('app/get-translate/'.base64_encode('Email')); ?></th>
												<td class="col-md-9 col-sm-9 col-xs-9"><?php echo $contactRequest->email?></td>
											</tr>
											<tr>	
												<th><?php echo $this->requestAction('app/get-translate/'.base64_encode('Phone')); ?></th>
												<td class="col-md-9 col-sm-9 col-xs-9"><?php echo $contactRequest->phone_no?></td>
											</tr>
											<tr>	
												<th><?php echo $this->requestAction('app/get-translate/'.base64_encode('Message')); ?></th>
												<td class="col-md-9 col-sm-9 col-xs-9"><?php echo $contactRequest->message?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                    </div>
			    </div>		
</div>			

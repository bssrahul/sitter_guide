

<!--[Database Nav Wrapper Start]-->
  <div class="dbnav-wrap">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-6 col-md-6 col-xs-12 col-xs-12">
              <div class="dbprofile-area">
                <div class="dbprofile-pic">
                   <?php 
                       $session = $this->request->session(); 
                       $user = $session->read('User');
					?>
					
					<?php if(($user['facebook_id']) !="" && ($user['is_image_uploaded'])==0){?>
						<img class="img-circle" alt="<?php echo __('Profile Picture'); ?>" src="<?php if($user['image'] != ""){echo $user['image'];}
						else{ echo $user['image']='prof_photo.png';} ?>"> 
                   
				   <?php }else{ ?>
					<img class="img-circle" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($user['image'] != ''?$user['image']:'prof_photo.png'); ?>"> 					   
					    
					   
				 <?php  } ?>

                     <p><?php echo $user['name'] != ''?$user['name']:'Guest'; ?></p>
                </div> 
                  <div class="status-box">
					
					<ul>
                          <li class="stat"><?php echo __('Status'); ?></li>
                            
                            <li class="input"> <input id="display_status" type="text" class="form-control" value="<?php echo __('Online'); ?>" ></li>
                            <!--
                            <li class="stat-drop">
                           
                            <a href="#" data-toggle="dropdown">
                            
                             <img id="status_dropdown" src="<?php echo HTTP_ROOT; ?>img/up-down.png" alt="<?php echo __('Select Status'); ?>"></a>
									
									<ul class="dropdown-menu">
                                      
										<li>
											<a data-img-name="online.png" data-display-status='<?php echo __('Online'); ?>'  data-rel="Available" class="status_dropdown" href="javascript:void(0)">
												<?php echo __('Online'); ?>
											</a>
										</li>
										
										<li>
											<a data-img-name="away.png" data-display-status='<?php echo __('Away'); ?>'  data-rel="Idle" class="status_dropdown" href="javascript:void(0)">
												<?php echo __('Away'); ?>
											</a>
										</li>
										
										<li>
											<a data-img-name="dnd.png" data-display-status='<?php echo __('Do not disturb'); ?>' data-rel="Dnd" class="status_dropdown" href="javascript:void(0)">
												<?php echo __('Do not disturb'); ?>
											</a>
										</li>
										
                                    </ul>
                           
                            </li> -->
                        </ul>  
                                       
                  </div>                        
                </div>
                
            </div>
          <div class="col-lg-6 col-md-6 col-xs-12 col-xs-12">
              <div class="rgt-bal-area">
                  <ul>
                      <li>
                          <ul class="user-bal">
                              <li><?php echo __('Account Balance'); ?></li>
                                <li>
										<?php 
										if(!empty($user_avail_bal)){
											echo isset($user_avail_bal->amount)?"$ ".$user_avail_bal->amount." AUD":0;
										}else{
											echo "$ 0 AUD";
										} ?>
								</li>
                            </ul>                         
                        </li>
                        <!--<li><a href="#" title="Guest"> <i class="fa fa-user"></i> <?php echo __('Guest'); ?></a></li>-->
                                 <?php 
                                 $session = $this->request->session();
								$userId = $session->read('User.id'); ?>
                        <li><a href="<?php echo HTTP_ROOT.'view-profile/'.base64_encode(convert_uuencode($userId)); ?>" title="Profile"><i class="fa fa-home"></i> <?php echo __('View Profile'); ?></a></li>
                    </ul>                                 
                </div>
            </div>            
        </div>
    </div>
  </div>
<!--[Database Nav Wrapper End]-->

<!--[Mobile status area Start]-->
<div class="ms-wrap">
  <div class="mob-status">
        <ul>
          <li class="p-pic"><a href="#" title="<?php echo __('Profile Picture'); ?>"><img class="img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.($user['image'] != ''?$user['image']:'prof_photo.png'); ?>" alt="<?php echo __('Profile Picture'); ?>" title=""></a></li>
            <li class="status">
            <a href="#" title="<?php echo __('Status'); ?>"> 
                    <select class="form-control">
                        <option data-rel="Available"  value="Available"><?php echo __('Online'); ?></option>
                        <option data-rel="Idle"  value="Idle"><?php echo __('Away'); ?></option>
                        <option data-rel="Dnd"  value="Dnd"><?php echo __('Do not disturb'); ?></option>
                    </select>
            </a>
  </li>
            <li class="bal">
										<a href="javascript:void(0)" style="cursor:default" title="<?php __('Balance'); ?>">
										<?php 
										if(!empty($user_avail_bal)){
											echo isset($user_avail_bal->amount)?"$ ".$user_avail_bal->amount." AUD":0;
										}else{
											echo "$ 0 AUD";
										} ?>
										</a>
			</li>
            <li class="user" ><a href="#" title="User"><i class="fa fa-user"></i></a></li>
            <li class="home"><a href="#" title="Home"><i class="fa fa-home"></i></a></li>
        </ul>    
    </div>
</div>  
<!--[Mobile status area End]-->

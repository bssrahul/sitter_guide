

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
						<img class="img-circle" style="width:52px" alt="<?php echo __('Profile Picture'); ?>" src="<?php if($user['image'] != ""){echo $user['image'];}
						else{ echo $user['image']='prof_photo.png';} ?>"> 
                   
				   <?php }else{ ?>
					<img class="img-circle" style="width:52px" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($user['image'] != ''?$user['image']:'prof_photo.png'); ?>"> 					   
					    
					   
				 <?php  } ?>

                     <p><?php echo $user['name'] != ''?$user['name']:'Guest'; ?></p>
                </div> 
                  <div class="status-box">
              <ul>
                          <li class="stat"><?php echo __('Status'); ?></li>
                            <li class="input"> <input type="text" class="form-control" placeholder="<?php echo __('Status'); ?>" ></li>
                            <li class="stat-drop">
                            <a href="#" data-toggle="dropdown">
                             <img src="<?php echo HTTP_ROOT; ?>img/up-down.png" alt="<?php echo __('Select Status'); ?>"></a>
                                <ul class="dropdown-menu">
                                      <li><a href="#"><?php echo __('Visible'); ?></a></li>
                                      <li><a href="#"><?php echo __('Invisible'); ?></a></li>
                                      <li><a href="#"><?php echo __('Idle'); ?></a></li>
                                    </ul>
                            </li>
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
                                <li><?php echo __('$200 aud'); ?></li>
                            </ul>                         
                        </li>
                        <li><a href="#" title="Guest"> <i class="fa fa-user"></i> <?php echo __('Guest'); ?></a></li>
                        <li><a href="#" title="Profile"><i class="fa fa-home"></i> <?php echo __('View Profile'); ?></a></li>
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
                        <option><?php echo __('Online'); ?></option>
                        <option><?php echo __('Invisible'); ?></option>
                        <option><?php echo __('Offline'); ?></option>
                    </select>
            </a>
  </li>
            <li class="bal"><a href="#" title="<?php __('Balance'); ?>">$240 aud</a></li>
            <li class="user" ><a href="#" title="User"><i class="fa fa-user"></i></a></li>
            <li class="home"><a href="#" title="Home"><i class="fa fa-home"></i></a></li>
        </ul>    
    </div>
</div>  
<!--[Mobile status area End]-->

 <?php 
	if(count($get_chats) > 0){
  ?>
  <ul class="list-unstyled chat-postioning">
   <?php 
		foreach($get_chats as $chat_data){	
		if($chat_data['user_id']==$loggedin_user){ ?>
			<li>
			  <div class="chat-me">
				<div class="row">
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 col-lg-offset-4  col-md-offset-4 col-sm-offset-4">
					
					<div class=" my-tex-msg-area">
					  <i class="msg-orange-arrow1">
						<img src="<?php echo HTTP_ROOT; ?>img/message-chat-arrow-orrange1.png" width="19" height="17" alt="arrow">
					  </i>
					   <p><?php echo $chat_data['message'];?></p>
					  
					</div>
					<em style="color:#7D7D7D;font-size:11px"><?php echo date("M d, h:i:s A",strtotime($chat_data['created_at'])); ?></em>
				  </div>
				  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 pull-right">
					<div class="my-img-chat1">
					 <?php if(($chat_data['user']['facebook_id']) !="" && ($chat_data['user']['is_image_uploaded'])==0){ ?>
					  
						<img 
							class="img-responsive img-circle text-center center-block" 
							alt="<?php echo __('Profile Picture'); ?>" 
							src="<?php if($chat_data['user']['image'] != ""){echo $chat_data['user']['image'];}else{echo $chat_data['user']['image']='prof_photo.png';} ?>"> 
				   
				   <?php }else{ ?>
					
						<img 
							class="img-responsive img-circle text-center center-block"  
							alt="<?php echo __('Profile Picture'); ?>" 
							src="<?php echo HTTP_ROOT.'img/uploads/'.($chat_data['user']['image'] != ''?$chat_data['user']['image']:'prof_photo.png'); ?>"> 					   
					<?php  } ?>
					</div>
				  </div>
				</div>
			  </div>
			</li>
	<?php }else{ ?>
		<li>
		  <div class="chat-user">
			
			<div class="row">
			  
			  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
				<div class="user-img-chat">
				
				   <?php if(($chat_data['user']['facebook_id']) !="" && ($chat_data['user']['is_image_uploaded'])==0){ ?>
					  
						<img 
							class="img-responsive img-circle text-center center-block" 
							alt="<?php echo __('Profile Picture'); ?>" 
							src="<?php if($chat_data['user']['image'] != ""){echo $chat_data['user']['image'];}else{echo $chat_data['user']['image']='prof_photo.png';} ?>"> 
				   
				   <?php }else{ ?>
					
						<img 
							class="img-responsive img-circle text-center center-block"  
							alt="<?php echo __('Profile Picture'); ?>" 
							src="<?php echo HTTP_ROOT.'img/uploads/'.($chat_data['user']['image'] != ''?$chat_data['user']['image']:'prof_photo.png'); ?>"> 					   
					<?php  } ?>
				</div>
			  </div>
			 
			  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
				
				<div class=" user-tex-msg-area">
				  <i class="msg-green-arrow">
					<img src="<?php echo HTTP_ROOT; ?>img/message-chat-arrow-green1.png" width="19" height="17" alt="arrow">
				  </i>
				   <p><?php echo $chat_data['message'];?></p>
				   
				</div>
				 <em style="color:#7D7D7D;font-size:11px"><?php echo date("M d, h:i:s A",strtotime($chat_data['created_at'])); ?></em>
			  </div>
			  
			</div>
			
		  </div>
		  
		</li>
	
	<?php } ?>
	
	<?php } ?>
	
  </ul>
<?php } ?>

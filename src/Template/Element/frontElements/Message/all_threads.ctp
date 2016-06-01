
	<?php
	
	if(!empty($get_requests)){
		foreach($get_requests as $req_data){
		$req_id = $req_data['id'];
		$folder_status = $req_data['folder_status_'.$fieldname];
		
		if(isset($req_data['booking_chats']) && !empty($req_data['booking_chats'])){
			$activeClass = '';
		
		}else{
			$activeClass = 'active-book';
		
		}
		
		if(isset($req_data['read_status']) && ($req_data['read_status'] =='unread' && $req_data['read_status_posted_by'] !=$userType)){
		
			$badges ='<div class="new-badge">NEW</div>';
			$activeClass = 'active-book';
		
		}else{
		
			$badges ='';
			$activeClass = '';
		}
	?>
  <div id="tr_<?php echo $req_id; ?>"  onclick="get_req_data(<?php echo "'".$folder_status."','".base64_encode(convert_uuencode($req_id))."'";?>);" class="book-now-setion-inner <?php echo $activeClass; ?>">
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
	  
	  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0 message-pad-right-0">
		<div class="book-now-name"> <?php echo $badges; ?>
		  <p><?php echo $req_data['user']['first_name']." ".substr($req_data['user']['last_name'],0,1);?>
		  </p>
		  <span style="color:#7D7D7D;font-size:11px">
			  <?php echo date("h:i A",strtotime($req_data['created_date'])); ?>
		  </span>
		</div>
	  </div>
	  
	  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 message-pad-left-0 message-pad-right-0 ">
		<div class="book-now-name">
		  <p><?php 
				if(isset($req_data['booking_chats']) && !empty($req_data['booking_chats'])){
					echo substr($req_data['booking_chats'][0]['message'],0.20)."..."; 
				}else{
					echo substr($req_data['message'],0.20)."..."; 
				}
				
				
			?>
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
  

              

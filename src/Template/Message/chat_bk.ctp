<?php echo $this->Html->css(['Front/jquery-ui.css','Front/search-result.css']);  ?>
<?php echo $this->Html->script(['Front/jquery-ui.js','Front/search-filter.js']);  ?>
<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true');
echo $this->Html->script(['Front/messages.js']); ?>
<!--[Inner Content]-->
<section class="inner-cont"> 
<div class="left_div">
<h2>Requests Listing</h2>

<table class="req_table">
	<?php
	foreach($get_requests as $req_data){
		$req_id = $req_data['id'];
		?>
		
<tr id="tr_<?php echo $req_id; ?>" class="req_tr" onclick="get_req_data(<?php echo $req_id;?>);"><td>
	
	<div class="message_req_div">
	<?php if(($req_data['user']['facebook_id']) !="" && ($req_data['user']['is_image_uploaded'])==0){?>
			<img class="img-circle" style="width:52px" alt="<?php echo __('Profile Picture'); ?>" src="<?php if($req_data['user']['image'] != ""){echo $req_data['user']['image'];}
			else{ echo $req_data['user']['image']='prof_photo.png';} ?>"> 
	   
	   <?php }else{ ?>
		<img class="img-circle" style="width:52px" alt="<?php echo __('Profile Picture'); ?>" src="<?php echo HTTP_ROOT.'img/uploads/'.($req_data['user']['image'] != ''?$req_data['user']['image']:'prof_photo.png'); ?>"> 					   
			
		   
	 <?php  } ?> - <?php echo $req_data['message']; ?>	
		
		
	
	
	</div>
	<span class="date_span"><?php echo $req_data['created_date']; ?></span>
	
	
	</td></tr>
<?php } ?>
</table>
</div>
<div class="right_div">
<?php 
if(count($get_chats) > 0){
	?>
	<div>
		<ul class="list_chat_ul">
		<?php
			foreach($get_chats as $chat_data){			
				echo "<li 
				class='li_".$chat_data['user_role']."'><span>".$chat_data['message']."-".$chat_data['created_at']."</span></li>";			
			}

			?>
		</ul>
	</div>
<div>
<form id="chat_form" >
<input type = "hidden" id="booking_message_id" name="booking_message_id" value="<?php echo $booking_id; ?>" />
<input type = "hidden" id="user_type" name="user_type" value="<?php echo $userType; ?>" />
<input type = "hidden" id="user_id" name="user_id" value="<?php echo $userId; ?>" />
<textarea id="chat_text" name="chat_text" maxlength="300"></textarea>
<input type="button" name="submit" value="Send" onclick="send_chat_msg(this);" />
</form>
</div>
<?php } ?>
</div>
</section>
<style>
.req_table {
  border: 1px solid green
}
.req_table td {
	border-bottom: 1px solid;
	}
.message_req_div {
	background: lightblue;
	display:inline-block;
	width:250px;
	float:left;
	}
.date_span {
	float:right;
	font-size: 12px;
	}
tr.req_tr:hover {
	cursor: pointer;
	}
.right_div {
	display: inline-block;
	margin-left: 100px;
	margin-top: 60px;
	border: 1px solid;
	}
.left_div {
	float: left;
	}
.list_chat_ul {
	width: 300px;
	}
.list_chat_ul li{
	 word-wrap: break-word;
	 display: inline-block;
	}

.li_Basic > span {
	padding: 5px;
    display: inline-block;
    float: left;
	background: lightblue;
    width: 60%;
}
.li_Sitter > span {
	padding: 5px;
    display: inline-block;
    float: right;
    background: lightgreen;
    width: 60%;
}
</style>

<!--[Inner Content]-->  

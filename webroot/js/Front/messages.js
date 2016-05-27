	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/sitterguide_test/"; 
	
function get_req_data(id){
//	var actionURL = ajax_url+"/message/bookingchat/";
	var actionURL = ajax_url+"/message/chat/";
	var formData = id;
	window.location.href = actionURL+formData;
	
		// alert(id);
		
		/*$.ajax({
			url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
			data:{"id":formData},//ALL SUBMITTED DATA FROM THE FORM
			 
			success:function(res)
			{
				$(".right_div").html(res);
			}
		});*/
	}
	
function send_chat_msg(e){
	alert('eee');
//	var actionURL = ajax_url+"/message/bookingchat/";
	var actionURL = ajax_url+"/message/sendmessage/";
	var formData = $(e).parents('form#chat_form').serialize();
	
	
		 alert(actionURL);
		var chat_msg = $("#chat_text").val();
		if(chat_msg !=''){
			alert('ajax');
		$.ajax({
			url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
			data:formData,//ALL SUBMITTED DATA FROM THE FORM
			 
			success:function(res)
			{
				if(res == 'success'){
					$("#chat_text").val('');
				//$(".right_div").find('ul').append('<li>'+chat_msg+'</li>');
				var li_chat_content = '<li><div class="chat-user"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"><div class="user-img-chat"><img src="" class="img-responsive" alt="pic"> </div></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-8"><div class=" user-tex-msg-area"><i class="msg-green-arrow"><img src="" width="19" height="17" alt="arrow"></i><p>'+chat_msg+'</p></div></div></div></div></li>';
				$('ul.chat_ul').append(li_chat_content);
				
				}
			}
		});
		}
	}

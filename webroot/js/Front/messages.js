	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/sitterguide_test/"; 
	
	function get_req_data(id){
	
		var actionURL = ajax_url+"/message/chats/";
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
		var actionURL = ajax_url+"/message/sendmessage/";
		var formData = $(e).parents('form#chat_form').serialize();
	
	

		var chat_msg = $("#chat_text").val();
	
		if(chat_msg !=''){

			$.ajax({
				url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
				data:formData,//ALL SUBMITTED DATA FROM THE FORM
					 
				success:function(res)
				{
					$("#chat_text").val('');
					$('div.list_chat_ul').html(res);
					
				}
			});
		}
	}

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
					$("#content-m").mCustomScrollbar({theme:"minimal-dark"});	
					$("#content-md").mCustomScrollbar({theme:"minimal-dark"});				
				}
			});
		}
	}
	

	(function($){
		$(window).load(function(){
			
			$.mCustomScrollbar.defaults.scrollButtons.enable=true; //enable scrolling buttons by default
			$.mCustomScrollbar.defaults.axis="yx"; //enable 2 axis scrollbars by default
			
		
			
			$("#content-m").mCustomScrollbar({theme:"minimal"});
			
			
			$(".all-themes-switch a").click(function(e){
				e.preventDefault();
				var $this=$(this),
					rel=$this.attr("rel"),
					el=$(".content");
				switch(rel){
					case "toggle-content":
						el.toggleClass("expanded-content");
						break;
				}
			});
			
		});
	})(jQuery);
	
	$(function(){
		
		$('#chat_text').keydown(function (e) {

		  if (e.ctrlKey && e.keyCode == 13) {
			$("#submit_chat").trigger('click');
		  }
		});
		
	});

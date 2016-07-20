	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/sitter_guide/"; 
	
	function get_req_data(folder_status,id){
	
		var actionURL = ajax_url+"message/get-messages/";
		var formData = folder_status+'/'+id;
		window.location.href = actionURL+formData;
	
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
	
	//DISPLAY JQUERY SCROLL FUNCTIONALITY
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
	})(jQuery);//END
	
	//RUN SCRIPT ON LOAD TIME
	$(function(){
		
		//SEND CHAT MESSAGE ON CLICK CTRL+ENTER
		$('#chat_text').keydown(function (e) {

		  if (e.ctrlKey && e.keyCode == 13) {
			$("#submit_chat").trigger('click');
		  }
		});//END
		
		//REFRESH CHAT ON CLICK ON REFRESH BUTTON
		$('#refresh_chat').click(function() {
			var btnObj = $(this);
			var booking_id = btnObj.attr("data-rel");
			var refreshOrgHtml = btnObj.html();
			
			if(booking_id !=''){
				$.ajax({
				
					url:ajax_url+"/message/auto-load-chat/",//AJAX URL WHERE THE LOGIC HAS BUILD
					data:{booking_id,booking_id},//ALL SUBMITTED DATA FROM THE FORM
					
					beforeSend: function(){
					  $("#content-m").addClass("chat_overlay");
					  btnObj.html('<img style="height:21px;width:21px" class="search-img" src="'+ajax_url+'img/refresh.gif"/>');
					},
					
					complete: function(){
					   $("#content-m").removeClass("chat_overlay");
					   btnObj.html(refreshOrgHtml);
					},	 
					
					success:function(res)
					{
						$('div.list_chat_ul').html(res);
						$("#content-m").mCustomScrollbar({theme:"minimal"});		
					}
				});
			}
			
			
		});//END
		
		//Change location of folder
		$('.move_to_folder').change(function() {
			var btnObj = $(this);
			var booking_id = btnObj.attr("data-rel");
			var folder_status = btnObj.val();
			
			$.ajax({
				
				url:ajax_url+"/message/move-folder/",//AJAX URL WHERE THE LOGIC HAS BUILD
				data:{booking_id:booking_id,folder_status,folder_status},//ALL SUBMITTED DATA FROM THE FORM
				
				beforeSend: function(){
				  $("#move_to_folder").show();
				},
				
				complete: function(){
					$("#move_to_folder").hide();
				},	 
				
				success:function(res)
				{
					window.location.reload();
					$("#content-md").mCustomScrollbar({theme:"minimal"});		
				}
			});
			
		});//END
		
		//GET USER MESSAGES COUNT
		setInterval(function(){
				var actionURL = ajax_url+"message/get-user-message-count/";
				
				$.ajax({
					url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
							 
					success:function(res)
					{
						
						if($.trim(res)>0){
							$('.myNewCount').html(res);
						}
						if($.trim(res)==0){
							$('.myNewCount').hide();
						}
						
					}
				});
				
		}, 10000);//END
			
		
	});// DOCUMENT READY END

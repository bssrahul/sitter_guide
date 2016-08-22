var host = window.location.host;
var proto = window.location.protocol;
var ajax_url = proto+"//"+host+"/sitterguide/";

	$(function(){
		
		$('body').on('click','.customQueueItem',function(){	
			var ajaxHitURL = $(this).attr('data-rel');
			
			$.ajax({
				url: ajaxHitURL ,
				cache: false,
				success: function(html){		
					$(".autoRefreshFeature").html(html); //Insert chat log into the #chatbox div	
								
				}
			});
			
		});
	
		$('body').on('mouseenter','.suggested_channels_ul img',function(){	
				$(".suggested_channel_overlay").hide(500);
				$(this).next().show(500);	
		});
		
		$('body').on('mouseleave','.suggested_channel_overlay',function(){	
				$(".suggested_channel_overlay").hide(500);
		});
	
		$('#buildChannelForm').validate();
		$('#sellItemForm').validate();
		
		//SCRIPT FOR HIDE/SHOW FIELDS ON BUILD A CHANNEL PAGE 
		$('input[type="radio"]').click(function(){
            if($(this).attr("value")=="embedlivefeed"){
                $(".upload").hide();
                $(".embed").show();
            }
			
            if($(this).attr("value")=="video"){
                $(".embed").hide();
                $(".upload").show();
            }
            
        });
		
		if($("input[type='radio'].typeData").is(':checked')) {
			var c_type = $("input[type='radio'].typeData:checked").val();
			if(c_type=="embedlivefeed"){
                $(".upload").hide();
                $(".embed").show();
            }
			
            if(c_type=="video"){
                $(".embed").hide();
                $(".upload").show();
            }
		}
		//CODE FOR HEADER FLASH ERROR show/Hide
		var focusElement = $(".response-msg");
		$(focusElement).focus();
		ScrollToTop(focusElement);
		
		$('.response-msg').on('click',function(){
				$(this).slideUp(1000);
		});
		setInterval(function() {
		   $('.response-msg').slideUp();
		}, 10000);
		
		$(window).scroll(function()
		{
			if($(window).scrollTop() < 0)
			{
				$('#scc_ovrly_shw').css({'position':'absolute', 'top':'50px'});
				$('#err_ovrly_shw').css({'position':'absolute', 'top':'50px'});
			}
			else
			{
				$('#scc_ovrly_shw').css({'position':'fixed', 'top':'0px'});
				$('#err_ovrly_shw').css({'position':'fixed', 'top':'0px'});
			}
		});	
		
		$('#facebookReg').on('click',function(e){

			$.oauthpopup({
				path: 'fb_login',
				width:600,
				height:300,
				callback: function(){
					//window.location.reload();
				}
			});
			e.preventDefault();
		});
		
		// upload cover image
		if($('#coverPic').length>0)
		{
			var userID = $('#coverPic').attr('data-rel');
			
			myaction = ajax_url+'Members/upload_cover_image/website/'+userID;
			var btnUpload=$('#coverPic');
			
			var loadingImgSrc = ajax_url+'img/loader.gif';
			new AjaxUpload(btnUpload, {
				action: myaction,
				name: 'cover_image_input',
				onSubmit: function(file, ext)
				{
					
					$(".waitLoader").html('<img src="'+loadingImgSrc+'" >');
					
					if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext)))
					 { 
						// extension is not allowed 
						alert("Only JPG, PNG, or GIF files are allowed");
						$(".waitLoader").html('');
					
						return false;	
					}
				},
				onComplete: function(file, response)
				{
				
					//Add uploaded file to list
					html=response.split(":");
					
					if($.trim(html[0])==="success")
					{
						$("#coverData").attr('value',html[1]);
						$(".waitLoader").text("("+html[1]+")");
					}
					else
					{
						overlayMessageShow('error','There was some error in uploading.Try again!');
						$(".waitLoader").html('');
					
					}
				}
			});
		}
		
		// upload profile image
		/*if($('#selectImage').length>0)
		{
			var userID = $('#selectImage').attr('data-rel');
			
			myaction = ajax_url+'Members/upload_image/website/'+userID;
			var btnUpload=$('#selectImage');
			var curImgSrc = $('#selectImage').attr('src');
			var loadingImgSrc = ajax_url+'img/loader.gif';
			new AjaxUpload(btnUpload, {
				action: myaction,
				name: 'uploadfile',
				onSubmit: function(file, ext)
				{
					$('#selectImage').addClass('centerLoader');
					$("#selectImage").attr('src',loadingImgSrc);
					
					if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext)))
					 { 
						// extension is not allowed 
						alert("Only JPG, PNG, or GIF files are allowed");
						$('#selectImage').removeClass('centerLoader');
						$("#selectImage").attr('src',curImgSrc);
						return false;	
					}
				},
				onComplete: function(file, response)
				{
				
					//Add uploaded file to list
					html=response.split(":");
					
					if($.trim(html[0])==="success")
					{
						$("#selectImage").attr('src',ajax_url+'img/Front/memberImages/'+html[1]);
						window.location.reload()
					}
					else
					{
						overlayMessageShow('error','There was some error in uploading.Try again!');
						$('#selectImage').removeClass('centerLoader');
						$("#selectImage").attr('src',curImgSrc);
					}
				}
			});
		}*/
        // upload profile image
		if($('#userPic').length>0)
		{
			var userID = $('#userPic').attr('data-rel');
			
			myaction = ajax_url+'Members/upload_cover_image/website/'+userID;
			var btnUpload=$('#userPic');
			
			var loadingImgSrc = ajax_url+'img/loader.gif';
			new AjaxUpload(btnUpload, {
				action: myaction,
				name: 'image_input',
				onSubmit: function(file, ext)
				{
					
					$(".waitLoader").html('<img src="'+loadingImgSrc+'" >');
					
					if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext)))
					 { 
						// extension is not allowed 
						alert("Only JPG, PNG, or GIF files are allowed");
						$(".waitLoader").html('');
					
						return false;	
					}
				},
				onComplete: function(file, response)
				{
				
					//Add uploaded file to list
					html=response.split(":");
					
					if($.trim(html[0])==="success")
					{
						$("#coverData").attr('value',html[1]);
						$(".waitLoader").text("("+html[1]+")");
					}
					else
					{
						overlayMessageShow('error','There was some error in uploading.Try again!');
						$(".waitLoader").html('');
					
					}
				}
			});
		}
		
		$(".edit_pic").on("click",function(){
			
			$("input[name = 'uploadfile']").trigger("click");
		});
		
		$(".editBtn").on("click",function(){
		
			$(".editProfile").trigger("click");
		});
		
		$(".cancelBtn").on("click",function(){
			var redURl = $(this).attr('id');
			$(".error").html('');
			$("."+redURl).trigger("click");
		});
		
		//ADD NEW RULE ON VALIDATOR
		jQuery.validator.addMethod("phoneno", function(phone_number, element) {
    	    phone_number = phone_number.replace(/\s+/g, "");
    	    return this.optional(element) || phone_number.length > 9 && 
    	    phone_number.match(/^\[0-9]$/);
    	}, "Please specify 10 in digit");
		
			
		$('#settingform').validate({
			rules: {
						"data[Member][email]":
						{
							remote: ajax_url+"App/validSignupEmail"
						},
						"data[Member][password]":
						{
							minlength: '6'
						},
						"data[Member][confirm_password]":
						{
							equalTo: '#newpswrd',
						},
						"data[Member][confirm_email]":
						{
							equalTo: '#newemail',
						},
						"data[Member][address]":
						{
							required:true
						},
						"data[Member][city]":
						{
							required:true
						},
						"data[Member][state]":
						{
							required:true
						},
						"data[Member][zip]":
						{
							required:true
						},
						"data[Member][phone]":
						{
							required:true,
							number:true,
							minlength: '10',
							maxlength: '10'
							
						}
					},
			messages: {
						"data[Member][email]":
						{
							remote: 'Email Id Already Exists'
						},
						"data[Member][password]":
						{
							minlength: 'Please enter minimum 6 characters.'
						},
						"data[Member][confirm_password]":
						{
							equalTo: 'Password does not match',
						},
						"data[Member][confirm_email]":
						{
							equalTo: 'Email does not match',
						},
						"data[Member][phone]":
						{
							number: 'Phone should be numeric.',
							minlength: 'Phone should be 10 characters.',
							maxlength: 'Phone should be 10 characters.'
						}
					},
				submitHandler: function(form) {
					var orgBtnVal=$("#updateProfile").val();//GET BUTTON VALUE
					var actionURL = $('#settingform').attr('action');
					$("#updateProfile").attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
					$("#updateProfile").val('Processing');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
					var formData = $('#settingform').serialize();//BIND THE FORM VALUE INTO A VARIABLE
					
					$.ajax({
						url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
						data:formData,//ALL SUBMITTED DATA FROM THE FORM
						 
						success:function(res)
						{
							var responce = res.split(':');
							//CODE FOR DYNAMIC SCROLLING FUNCTIONALITY 
							if(responce[0] == 'Error')
							{
								$('#err_ovrly_shw').html(responce[1]);//DISPLAY RESPONSE ERRORS							
								$('#err_ovrly_shw').show();//DISPLAY RESPONSE ERRORS				
								
							}else if(responce[0] == 'Success'){
								
								$('.succ_ovrly_shw').html(responce[1]);//DISPLAY RESPONSE ERRORS							
								$('.succ_ovrly_shw').show();//DISPLAY RESPONSE ERRORS			
								window.location.reload();
							}
							
							$("#updateProfile").attr('disabled',false);
							$("#updateProfile").val(orgBtnVal);	
						}
					});
				}
		});
		
		
		$('#seller_signup_form').validate({
			rules: {
						"data[Member][first_name]":
						{
							required:true
						},
						"data[Member][address]":
						{
							required:true
						},
						"data[Member][city]":
						{
							required:true
						},
						"data[Member][state]":
						{
							required:true
						},
						"data[Member][zip_code]":
						{
							required:true
						},
						"data[Member][card_number]":
						{
							required:true
						},
						"data['Member']['expiary_year']":
						{
							required:true
						},
						"data['Member'][calculated_price]":
						{
							required:true
						},
						"data[Member][cvv_code]":
						{
							required:true
						},
						
						"data[Member][email]":
						{
							required:true,
							remote: ajax_url+"App/validSignupEmail"
						},
						"data[Member][password]":
						{
							required:true,
							minlength: '6'
						},
						"data[Member][confirm_pass]":
						{
							required:true,
							equalTo: '#MemberPassword',
						}
					},
			messages: {
						"data[Member][email]":
						{
							remote: 'Email Id Already Exists'
						},
						"data[Member][password]":
						{
							minlength: 'Please enter minimum 6 characters.'
						},
						"data[Member][confirm_password]":
						{
							equalTo: 'Password does not match',
						},
						"data[Member][confirm_email]":
						{
							equalTo: 'Email does not match',
						}
					}
		});
		
		$('#MemberSignupForm').validate({
			rules: {
						"data[Member][first_name]":
						{
							required:true
						},
						"data[Member][address]":
						{
							required:true
						},
						"data[Member][city]":
						{
							required:true
						},
						"data[Member][state]":
						{
							required:true
						},
						"data[Member][zip_code]":
						{
							required:true
						},
						"data[Member][captcha]":
						{
							required:true
						},
						"data[Member][phone]":
						{
							required:true,
							minlength: '10',
							maxlength: '10'
						},
						"data[Member][email]":
						{
							required:true,
							remote: ajax_url+"App/validSignupEmail"
						},
						"data[Member][password]":
						{
							required:true,
							minlength: '6'
						},
						"data[Member][confirm_pass]":
						{
							required:true,
							equalTo: '#MemberPassword',
						}
					},
			messages: {
						"data[Member][email]":
						{
							remote: 'Email Id Already Exists'
						},
						"data[Member][password]":
						{
							minlength: 'Please enter minimum 6 characters.'
						},
						"data[Member][phone]":
						{
							minlength: 'Phone should be 10 characters long.',
							maxlength: 'Phone should be 10 characters long.'
						},
						"data[Member][confirm_password]":
						{
							equalTo: 'Password does not match',
						},
						"data[Member][confirm_email]":
						{
							equalTo: 'Email does not match',
						}
					}
		});
		
		$('#contactId').validate({
			rules: {
						"data[ContactRequest][name]":
						{
							required:true
						},
					
						"data[ContactRequest][email]":
						{
							required:true,
						}
					},
			messages: {
					"data[Member][name]":
					{
						required: 'Name is required'
					},
					"data[Member][email]":
					{
						required: 'Email is required'
					}
			}		
		});
		
		$('#MemberForgotPasswordForm').validate({
			rules: {
						"data[Member][email]":
						{
							required:true,
						}
					},
			messages: {
					
					"data[Member][email]":
					{
						required: 'Email is required'
					}
			}		
		});
		
		
		
	});	
	
	function overlayShow(){
		$('#loading_overlay').show();
		$('#loading_overlay').children().show();
	}
	
	function overlayHide(){
		$('#loading_overlay').hide();
		$('#loading_overlay').children().hide();
	}
	
	function ScrollToTop(el) {
		 $( "html, body" ).animate({
			scrollTop: 0,
			});
	}
	
	function postComment(formID,actionURL, btnID){ 
		var error=0;
		
		if($.trim($('#comment_box').val())==''){
			$('#comment_box').css('border','1px solid red');
			error++;
		}else{
			$('#comment_box').css('border','1px solid #ccc');	
		}
		if(error>0){
			return false;
		}else{
			var orgBtnVal=$("#"+btnID).val();//GET BUTTON VALUE
			$("#"+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
			$("#"+btnID).val('Processing');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
			var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
			
			$.ajax({
				url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
				data:formData,//ALL SUBMITTED DATA FROM THE FORM
				 
				success:function(res)
				{
					var responce = res.split(':');
					if(responce[0] == 'Error')
					{
						$('#err_ovrly_shw').html(responce[1]);//DISPLAY RESPONSE ERRORS							
						$('#err_ovrly_shw').show();//DISPLAY RESPONSE ERRORS						
					}else if(responce[0] == 'Success'){
						
						$('#succ_ovrly_shw').html(responce[1]);//DISPLAY RESPONSE ERRORS							
						$('#succ_ovrly_shw').show();//DISPLAY RESPONSE ERRORS		
						$('#'+formID)[0].reset();//RESET THE FORM AFTER UPDATION	
						
						$.ajax({
							url:  ajax_url+'Members/getLeaveNoteContent/'+responce[2],//AJAX URL WHERE THE LOGIC HAS BUILD
							success:function(res)
							{
								$(".showLeaveNoteContent").html(res);
							}
						});	
					}
					$("#"+btnID).attr('disabled',false);
					$("#"+btnID).val(orgBtnVal);	
				}
			});
			
		}	
	}
	
	function countChar(val) {
        var len = val.value.length;
        if (len > 50) {
          val.value = val.value.substring(0, 50);
        } else {
			var remaining = 50 - len;
			var str='*Comment not more than 50 chars, Your remaining chars is '
			$('#charNum').text(str+remaining);
		  
        }
    }
	 function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test( $email );
	}
	function blogComment(formID,actionURL, btnID){ 
		var error=0;
		
		if($.trim($('#comment_box').val())==''){
			$('#comment_box').css('border','1px solid red');
			error++;
		}else{
			$('#comment_box').css('border','1px solid #ccc');	
		}
		
		if($.trim($('#comment_name').val())==''){
			$('#comment_name').css('border','1px solid red');
			error++;
		}else{
			$('#comment_name').css('border','1px solid #ccc');	
		}
		
		if($.trim($('#comment_email').val())==''){
			$('#comment_email').css('border','1px solid red');
			error++;
		}else{
			if( !validateEmail($.trim($('#comment_email').val()))) {
				$('#comment_email').css('border','1px solid red');
				error++;
			}else{
				$('#comment_email').css('border','1px solid #ccc');	
			}
			
		}
		if(error>0){
			return false;
		}else{
			var orgBtnVal=$("#"+btnID).val();//GET BUTTON VALUE
			$("#"+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
			$("#"+btnID).val('Processing');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
			var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
			
			$.ajax({
				url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
				data:formData,//ALL SUBMITTED DATA FROM THE FORM
				 
				success:function(res)
				{
					var responce = res.split(':');
					if(responce[0] == 'Error')
					{
						$('#err_ovrly_shw').html(responce[1]);//DISPLAY RESPONSE ERRORS							
						$('#err_ovrly_shw').show();//DISPLAY RESPONSE ERRORS						
					}else if(responce[0] == 'Success'){
						
						$('#succ_ovrly_shw').html(responce[1]);//DISPLAY RESPONSE ERRORS							
						$('#succ_ovrly_shw').show();//DISPLAY RESPONSE ERRORS		
						$('#'+formID)[0].reset();//RESET THE FORM AFTER UPDATION	
						
						$.ajax({
							url:  ajax_url+'home/getBlogComment/'+responce[2],//AJAX URL WHERE THE LOGIC HAS BUILD
							success:function(res)
							{
								$(".showGetBlogComment").html(res);
							}
						});	
					}
					$("#"+btnID).attr('disabled',false);
					$("#"+btnID).val(orgBtnVal);	
				}
			});
			
		}	
	}
	
	
	
	
	
	$(document).ready(function(){
		//AJAX INTEGRATION FOR RE-QUEUE FNCTIONALITY START
		$(".req_btn").on("click",function(){
		
			$(".cwrap").addClass('op');
			$(".cwrap").append('<img src="'+ajax_url+'img/ajax-loader1.gif" class="loading"/>');
			var orderType = $(this).attr("data-rel");
			$.ajax({
				url: ajax_url+'home/getSellItemByAjax/'+orderType,
				 
				success:function(res)
				{
					if(orderType=="Desc"){
						$(".req_btn").attr("data-rel","Asc");	
					}else{
						$(".req_btn").attr("data-rel","Desc");	
					}
					$(".loading").remove();
					$(".cwrap").removeClass('op');
					$(".cwrap").html(res);
				}
			});
		});
		//ONKEYUP ON PAYPAL FORM VALUE INSERTED ON IDE FORM
		$(".paypalEnter").keyup(function(){
				
			$("."+$(this).attr("id")).val($("#"+$(this).attr("id")).val());
		});
		
		
		//DISPLAY POPUP ON CLICK ON WHAT IS THIS CVV ?
		$(".submitPaypalButton").click(function(){
			
			if ($('#seller_signup_form').valid()) {
				var serializeData = $("#submitPaypalForm").serialize();
				$.ajax({
					
					url: ajax_url+'home/setUserSession/'+selectedTickets,
					data: serializeData, 
					success:function(res)
					{
						var response = res.split(":");
						if(response[0]=="true"){
							
							$(".subscriptionAmt").val(response[0]);
							$("#submitPaypalForm").submit();
						}
						
					}
				});
			}
		
		});
		//FORM SUBMIT ON CLICK ON PAYPAL BUTTON
		$(".submitPaypalButtonForChannel").click(function(){
			$("#submitPaypalFormChannel").submit();
		});
		
		//DISPLAY POPUP ON CLICK ON WHAT IS THIS CVV ?
		$(".cvvPopUP").click(function(){
			$("#myModal").modal('show');
		});
		
		$(".statusPopUP").click(function(){
			$("#myModal").modal('show');
		});
		
		var selectedTickets = $( "#myTickets option:selected" ).val();
		if(selectedTickets !=''){
			$.ajax({
				url: ajax_url+'home/ticketprice/'+selectedTickets,
				 
				success:function(res)
				{
					$(".calPrice").val(res);	
					$(".calPriceSpan").text(res);	
				}
			});
		}
		
		$( "#myTickets" ).change(function(){
			var myTickets = $(this).val();
			if(myTickets !=''){
				$.ajax({
					url: ajax_url+'home/ticketprice/'+myTickets,
					 
					success:function(res)
					{
						
						$(".calPrice").val(res);	
						$(".calPriceSpan").text(res);	
					}
				});
			}
		});
		
		$( "#myTickets-paypal" ).change(function(){
			var myTickets = $(this).val();
			if(myTickets !=''){
				$.ajax({
					url: ajax_url+'home/ticketprice/'+myTickets,
					 
					success:function(res)
					{
						
						$(".calPrice-paypal").val(res);	
						$(".calPrice").val(res);	
						$(".token_qty").val(myTickets);	
						$(".itmnumber").val(myTickets+" Razz Tokens");	
						$("#calPrice-paypal-span").text(res);	
					}
				});
			}
		});
		
		$('.cvvPopUP').on({
			mousemove: function(e) {
				$(this).next('img').css({
					top: e.pageY - 260,
					left: e.pageX + 10
				});
			},
			mouseenter: function() {
				var big = $('<img />', {'class': 'big_img', src: this.src});
				$(this).after(big);
			},
			mouseleave: function() {
				$('.big_img').remove();
			}
		});
		
		$('body').on('click','.chooseStatusOption',function(){
			var selectedSt = $(this).val();
			if(selectedSt=='Sold') {
				$('#myModal').find('#customStatus').val(selectedSt);
				$("#myModal").modal('show');
				var selctedSellItemId =  $(this).attr('data-item');
				$(".checkedSellItem").val(selctedSellItemId);
				//alert(selctedSellItemId);
			}else if(selectedSt=='Returned') {
				var sureToReturn = confirm('Are you sure to return this item?');
				if(sureToReturn==true){
					var sellItemId =  $(this).attr('data-item');
					var channelItemID =  $("#requestedChannelitemID").val();
				
					$.ajax({
							url:  ajax_url+'Members/cancel_item/'+sellItemId+'/'+selectedSt+'/'+channelItemID,
							success:function(html)
							{
								window.location.reload();
							
							}
						});	
				}else{
					$('.chooseStatusOption').attr('checked',false);
					$('.chooseStatusOption').eq(0).attr('checked',true);
					$('.mainCheck').html($('.mainCheck').html());
				}
			}
		});
		
		$('body').on('click','.delSellItem',function(){
			var clickedBtnId = $(this).attr('id');
			if(clickedBtnId=='delSellItem') {
				
				var sureToReturn = confirm('Are you sure to delete this item?');
				
				if(sureToReturn==true){
					var sellItemId =  $(this).attr('deleted-id');
					
					$.ajax({
							url:  ajax_url+'Members/delete_sell_item/'+sellItemId,
							success:function(html)
							{
								var response = html.split(':');
								if(response[0] == 'Error'){
									alert(response[1]);
									return false;
								}else{
									window.location.reload();
								}
							}
						});	
				}else{
					return false;
				}
			}
		});
		
		$('#myModal').on('hidden.bs.modal', function () {
			$('.chooseStatusOption').attr('checked',false);
			$('.chooseStatusOption').eq(0).attr('checked',true);
			$('.mainCheck').html($('.mainCheck').html());
		});
		
		$('.enterTracking').click(function(){
			$(this).next('.trackingDiv').show();
			$(this).hide();
		});
		
		$('.cancelTrack').click(function(){
			$(this).parent('.trackingDiv').hide();
			$(this).parent('.trackingDiv').prev().show();
		});
		
		$('.saveTrack').click(function(e){
		var trackingNumInput = $(this).parent('div.trackingDiv').find('#tracking_number');
		var trackingNum = trackingNumInput.val();
			if(trackingNum !=''){
				var trackingNum =  trackingNum;
				var postCarrier =  $('#postal_carrier').val();
				var sellItemId =  $(this).attr('data-item');
				var _obj = $(this);
				$.ajax({
						url:  ajax_url+'Members/save_track/'+sellItemId+'/'+trackingNum+'/'+postCarrier,
						success:function(html)
						{
							if($.trim(html)=='true') {
								_obj.parents('.mainTracking').html('<label>Tracking No: #'+trackingNum+' | '+postCarrier+'</label>');
								overlayMessageShow('success','Tracking Number updated successfully');
							}else{
								overlayMessageShow('error','Some problem occur. Please try again');
							}
							
						}
					});	
			}else{
				trackingNumInput.css('border','1px solid red');
			}
		
		
			trackingNumInput.keyup(function(){
				if($(this).val().length>0){
					$(this).css('border','1px solid #ccc');
				}
			});
		});
	
	});
	
	
	function overlayMessageShow(msgType, msg)
	{
		if(msgType == 'success')
		{
			$('#succMsgLay').html(msg);
			$('#succ_ovrly_shw').show();
		}
		else if(msgType == 'error')
		{
			$('#errMsgLay').html(msg);
			$('#err_ovrly_shw').show();
		}
	}
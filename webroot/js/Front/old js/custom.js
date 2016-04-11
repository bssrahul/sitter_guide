	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/sitterguide/"; 
	
	/*FUNCTION FOR VALIDATION*/
	$(document).ready(function(){
		
		//SLIDEUP MESSAGES FUNCTIONALITY START
		$('.success_msg, .error_msg').on('click',function(){
				$(this).slideUp(1000);
		});
		setInterval(function() {
		   $('.success_msg, .error_msg').slideUp();
		}, 10000);
		//SLIDEUP MESSAGES FUNCTIONALITY START
		
		//CODE SNIPPET FOR SIGN UP
		$('#addUsers').validate({
			rules: {
				"Users[first_name]":
				{
					required:true,
				},
				"Users[last_name]":
				{
					required:true,
				},
				"Users[email]":
				{
					required: true,
					email: true,
					remote: ajax_url+"App/isUniqueEmailAjax"
				},
				"Users[password]":
				{
					required: true,
					minlength: '6'
				},
				"Users[re_password]":
				{
					required: true,
					minlength: '6',
					equalTo: '#users-password'
				}
			},
			messages: {
				"Users[first_name]":
				{
					required : "This field is required"
					
				},
				"Users[last_name]":
				{
					required : "This field is required"
					
				},
				"Users[email]":
				{
					required : "This field is required",
					email: 'Kindly use valid email address',
					remote: "Email address already exists"
					
				},
				"Users[password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.'
				},
				"Users[re_password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.',
					equalTo: 'Password does not match'
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#addUsers').attr('action');
				signup("addUsers","sign-up",actionURL);
				return false;
			}
			
		});
		//CODE SNIPPET FOR EDIT PROFILE
		$('#profileedit').validate({
			rules: {
				"Users[first_name]":
				{
					required:true,
				},
				"Users[last_name]":
				{
					required:true,
				},
				/*"Users[email]":
				{
					required: true,
					email: true,
					remote: ajax_url+"App/isUniqueEmailAjax"
				},*/
				"Users[phone]":
				{
					required: true,
					minlength: '10'
				}/*,
				"Users[re_password]":
				{
					required: true,
					minlength: '6',
					equalTo: '#users-password'
				}*/
			},
			messages: {
				"Users[first_name]":
				{
					required : "This field is required"
					
				},
				"Users[last_name]":
				{
					required : "This field is required"
					
				},
				/*"Users[email]":
				{
					required : "This field is required",
					email: 'Kindly use valid email address',
					remote: "Email address already exists"
					
				},*/
				"Users[phone]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 10 characters.'
				}/*,
				"Users[re_password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.',
					equalTo: 'Password does not match'
				}*/
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#addUsers').attr('action');
				signup("addUsers","sign-up",actionURL);
				return false;
			}*/
			
		});
		//CODE SNIPPET FOR FORGOT PASSWORD
		$('#forgotPasswordForm').validate({
			rules: {
				"Users[email]":
				{
					required: true,
					email: true,
					remote: ajax_url+"App/isEmailExists"
				}
			},
			messages: {				
				"Users[email]":
				{
					required : "This field is required",
					email: 'Kindly use valid email address',
					remote: "Email address not exists in our database"
					
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#forgotPasswordForm').attr('action');
				process_form("forgotPasswordForm","reset-pwd",actionURL);
				return false;
			}
			
		});
		
		//CODE SNIPPET FOR RESET PASSWORD
		$('#resetPasswordForm').validate({
			rules: {
				"Users[password]":
				{
					required: true,
					minlength: '6'
				},
				"Users[re_password]":
				{
					required: true,
					minlength: '6',
					equalTo: '#reset_pwd_field'
				}
			},
			messages: {				
				"Users[password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.'
				},
				"Users[re_password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.',
					equalTo: 'Password does not match'
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#resetPasswordForm').attr('action');
				process_form("resetPasswordForm","change-pwd",actionURL);
				return false;
			}
			
		});
		
		//CODE SNIPPET FOR LOGIN
		$('#loginUser').validate({
			rules: {
				"Users[email]":
				{
					required: true,
					email: true
				},
				"Users[password]":
				{
					required: true,
					minlength: '6'
				}
			},
			messages: {				
				"Users[email]":
				{
					required : "This field is required",
					email: 'Kindly use valid email address'
				},
				"Users[password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.'
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#loginUser').attr('action');
				process_form("loginUser","log_in_btn",actionURL);
				return false;
			}
			
		});
		
		//Start Getting Started
		$('#gettingStartedForm').validate({
			rules: {
				"service[]":
				{
					required: true,
					
				},
				"service_price[]":
				{
					required: true,
					
				},
				"day_name[]":
				{
					required: true,
					
				},
				"pet_type[]":
				{
					required: true,
					
				}
			},
			messages: {				
				"service[]":
				{
					 required: "Please select at least one type of service.",
				},
				"service_price[]":
				{
					 required: "This field is required.",
					
				},
				"day_name[]":
				{
					 required: "Please select at least one type of day.",
					
				},
				"pet_type[]":
				{
					 required: "Please select at least one type of pet.",
					
				}
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#gettingStartedForm').attr('action');
				gettingstarted("gettingStartedForm","submitGetting",actionURL);
				return false;
			}*/
			
		});
		//Start base profile form
		$('#baseProfileForm').validate({
			rules: {
				"awesome_title":
				{
					required: true,
					
				},
				"your_story":
				{
					required: true,
					
				}
			},
			messages: {				
				"service[]":
				{
					 required: "This field id required.",
					
				},
				"day_name[]":
				{
					 required: "This field id required.",
					
				}
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#baseProfileForm').attr('action');
				gettingstarted("baseProfileForm","submitGetting",actionURL);
				return false;
			}*/
			
		});
		///////////
		//Start Extended profile form
		$('#extendedProfileForm').validate({
			rules: {
				"UserExtendedProfiles[travel_fee_rate]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[access_car]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[home_type]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[garden_area]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[is_fanced]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[under_13_child]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[last_minute_booking]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[short_term_type]":
				{
					required: true,
					
				},
				"UserExtendedProfiles[cancel_policy]":
				{
					required: true,
					
				}
			},
			messages:{		
			    "UserExtendedProfiles[travel_fee_rate]":
				{
					 required: "This field id required.",
					
				},		
				"UserExtendedProfiles[access_car]":
				{
					 required: "This field id required.",
					
				},
				"UserExtendedProfiles[home_type]":
				{
					 required: "This field id required.",
					
				},
				"UserExtendedProfiles[garden_area]":
				{
					 required: "This field id required.",
					
				},
				"UserExtendedProfiles[is_fanced]":
				{
					 required: "This field id required.",
					
				},
				"UserExtendedProfiles[under_13_child]":
				{
					 required: "This field id required.",
					
				},
				"UserExtendedProfiles[last_minute_booking]":
				{
					 required: "This field id required.",
					
				},
				"UserExtendedProfiles[short_term_type]":
				{
					 required: "This field id required.",
					
				},
				"UserExtendedProfiles[cancel_policy]":
				{
					 required: "This field id required.",
					
				}
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#extendedProfileForm').attr('action');
				gettingstarted("extendedProfileForm","submitGetting",actionURL);
				return false;
			}*/
			
		});
		//Start Personal form
		$('#personalForm').validate({
			rules: {
				"Users[address]":
				{
					required: true,
					
				},
				"Users[city]":
				{
					required: true,
					
				},
				"Users[state]":
				{
					required: true,
					
				},
				"Users[zip]":
				{
					required: true,
					
				},
				"Users[phone]":
				{
					required: true,
					
				}
			},
			messages:{				
				"Users[address]":
				{
					 required: "This field is required.",
					
				},
				"Users[city]":
				{
					 required: "This field is required.",
					
				},
				"Users[state]":
				{
					 required: "This field is required.",
					
				},
				"Users[zip]":
				{
					 required: "This field is required.",
					
				},
				"Users[phone]":
				{
					 required: "Please enter a valid 10-digit mobile number (04XX XXX XXX).",
					
				}
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#personalForm').attr('action');
				gettingstarted("personalForm","submitGetting",actionURL);
				return false;
			}*/
			
		});
		///////////
	 
	//Hide and Show functionality for Getting Started form
        $('#pet_hosting').click(function(){
		    if ( $('#pet_hosting').is( ":checked" ) ){
				   $('#night1').show();
				   $( "#night1" ).prop( "disabled", false );
			  }else{
				   $('#night1').hide();
				   $( "#night1" ).prop( "disabled", true );
			  }
		});
		 $('#dog_walking').click(function(){
		    if ( $('#dog_walking').is( ":checked" ) ){
				   $('#session1').show();
				   $( "#session1" ).prop( "disabled", false );
			  }else{
				   $('#session1').hide();
				   $( "#session1" ).prop( "disabled", true );
			  }
		});
		$('#dog_grooming').click(function(){
		    if ( $('#dog_grooming').is( ":checked" ) ){
				   $('#session2').show();
				   $( "#session2" ).prop( "disabled", false );
			  }else{
				   $('#session2').hide();
				   $( "#session2" ).prop( "disabled", true );
			  }
		});
		///////////////////
		$('input[name="service[]"]').click(function(){
		    var serviceId = $(this).attr("id");
			//alert(serviceId);
			  if ( $('#'+serviceId).is( ":checked" ) ){
				   $('.'+serviceId).show();
				   $('.'+serviceId).prop( "disabled", false );
				   class=""
				   $( "#mainServiceDiv" ).append(
				   "<strong 'class="+serviceId+"'>Hello</strong>" );
				   
				   //////////////////////////////
			  }else{
				   $('.'+serviceId).hide();
				   $('.'+serviceId).prop( "disabled", true );
				    $('#mainServiceDiv').remove('.'+serviceId);
			  }
		});
		
		///////////////////
		//End Getting Started 
	 //Hide and Show functionality for Extended profile form
		$('#pick_drop').click(function(){
			 // alert("okokoko");
				if ( $('#pick_drop').is( ":checked" ) ){
					   $('#travel_fee_rate').show();
					   $( "#travel_fee_rate" ).prop( "disabled", false );
				  }else{
					   $('#travel_fee_rate').hide();
					   $( "#travel_fee_rate" ).prop( "disabled", true );
				  }
		});
	});
		//End base profile
	function gettingstarted(formID,btnID,actionURL){
		var orgBtnVal=$("#"+btnID).val();//GET BUTTON VALUE
		$("#"+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
		$("#"+btnID).val('Processing...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
		var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
		
		$.ajax({
			url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
			data:formData,//ALL SUBMITTED DATA FROM THE FORM
			 
			success:function(res)
			{
				//CODE FOR CHANGE THE BUTTON STYLE AND TEXT
				$("#"+btnID).attr('disabled',false);
				$("#"+btnID).val(orgBtnVal);	
				//alert('okokk');
			}
		});
	}
	
	/*FUNCTION FOR SUBMIT THE SIGNUP FORM AND DISPLAYING THERE REPOSNSE*/
	function signup(formID,btnID,actionURL){
		
		var orgBtnVal=$("#"+btnID).val();//GET BUTTON VALUE
		$("#"+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
		$("#"+btnID).val('Processing...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
		var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
		
		$.ajax({
			url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
			data:formData,//ALL SUBMITTED DATA FROM THE FORM
			 
			success:function(res)
			{
				var response = res.split(':');
				if(response[0] == 'Success'){
					$('.successMessage').html(response[1]);	//DISPLAY SUCCESS MESSAGE
					$('#'+formID)[0].reset();
					setTimeout(function(){window.location.reload();},2000);
				}else{
					$('#myModal_sign').html(res);	//DISPLAY RESPONSE ERRORS
				}
				
				//CODE FOR CHANGE THE BUTTON STYLE AND TEXT
				$("#"+btnID).attr('disabled',false);
				$("#"+btnID).val(orgBtnVal);	
			}
		});
		
	}
	
	/*FUNCTION FOR SUBMIT THE FORGOT FORM AND DISPLAYING THERE REPOSNSE*/
	function process_form(formID,btnID,actionURL){
		
		var orgBtnVal=$("#"+btnID).val();//GET BUTTON VALUE
		$("#"+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
		$("#"+btnID).val('Processing...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
		var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
		
		$.ajax({
			url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
			data:formData,//ALL SUBMITTED DATA FROM THE FORM
			 
			success:function(res)
			{
				var response = res.split(':');
				if($.trim(response[0]) == 'Success'){
					$('.clr').html('');	//Emtpy Error MESSAGE
					$('.successMessage').html(response[1]);	//DISPLAY SUCCESS MESSAGE
					$('#'+formID)[0].reset();
					setTimeout(function(){window.location.href = ajax_url;},2000);
				}if($.trim(response[0]) == 'Error'){
					$('.clr').html('');	//Emtpy Error MESSAGE
					$('.errorMessage').html(response[1]);	//DISPLAY SUCCESS MESSAGE
				}
				
				//CODE FOR CHANGE THE BUTTON STYLE AND TEXT
				$("#"+btnID).attr('disabled',false);
				$("#"+btnID).val(orgBtnVal);	
			}
		});
		
	}
	
	
	$(document).ready(function(e){
		
		// submiting email for reference for invitaion using ajax 
		$('#referForm').submit(function( event ) {
			event.preventDefault();
			var inputEmail = $('#referEmail').val();

			$.ajax({
				method: "POST",
				url: "dashboard/reference",
				data: { email: inputEmail },
				success : function (result) {
				
					var jsonResult = JSON.parse(result);
					if (jsonResult.type=='success') {
						msgAlert = '<div class="alert alert-success" role="alert">'+jsonResult.message+'</div>';
					} else {
						msgAlert = '<div class="alert alert-danger" role="alert">'+jsonResult.message+'</div>';
					}
					$('.successMessage').html(msgAlert);
					setInterval(function(){ $('.successMessage').html(''); }, 3000);

				},
				error : function () {

				}
			});
		});
		
	});
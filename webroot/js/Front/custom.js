	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/sitter_guide/"; 
	
	/*FUNCTION FOR VALIDATION*/
	$(document).ready(function(){
		
		//SLIDEUP MESSAGES FUNCTIONALITY START
		
		$('.success_msg, .error_msg').on('click',function(){
				$(this).slideUp(1000);
		});
		setInterval(function() {
		   $('.success_msg, .error_msg').slideUp();
		}, 10000);
		//DROP DOWN TOGGEL
		$('#droplogForgot').click(function () {
			$('#dropcont').hide();
            $('#dropcontForgot').fadeToggle();
            setTimeout(function(){$("#droplog").trigger("click");},500);

        });

        $('#loginBack').click(function () {
			$('#dropcontForgot').hide();
            $('#dropcont').fadeToggle();
            setTimeout(function(){$("#droplog").trigger("click");},500);

        });
		//SLIDEUP MESSAGES FUNCTIONALITY START
		
		//CODE SNIPPET FOR SIGN UP
		$('#addUsers').validate({
			rules: {
				"Users[title]":
				{
					required:true
				},
				"Users[first_name]":
				{
					required:true
				},
				"Users[email]":
				{
					required: true,
					email: true,
					remote: ajax_url+"App/isUniqueEmailAjax"
				},
				"Users[create_password]":
				{
					required: true,
					minlength: '6'
				},
				"Users[re_password]":
				{
					required: true,
					minlength: '6',
					equalTo: '#users-create-password'
				},
				"Users[zip]":
				{
					required:true
				},
				"Users[birth_date]":
				{
					required:true
				},
				"Users[country]":
				{
					required:true
				},
				"Users[term_condition]":
				{
					required:true
				}
			},
			messages: {
				"Users[title]":
				{
					required : "This field is required"
					
				},
				"Users[first_name]":
				{
					required : "This field is required"
					
				},
				"Users[email]":
				{
					required : "This field is required",
					email: 'Kindly use valid email address',
					remote: "Email address already exists"
					
				},
				"Users[create_password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.'
				},
				"Users[re_password]":
				{
					required : "This field is required",
					minlength: 'Please enter minimum 6 characters.',
					equalTo: 'Password does not match'
				},
				"Users[zip]":
				{
					required : "This field is required"
					
				},
				"Users[birth_date]":
				{
					required : "This field is required"
					
				},
				"Users[country]":
				{
					required : "This field is required"
					
				},
				"Users[term_condition]":
				{
					required : "This field is required"
					
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
		//END RESET PASSWORD
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
			//CODE SNIPPET FOR LOGIN
		$('#login_user').validate( {
			//alert("okokoko");
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
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#loginUser').attr('action');
				process_form("loginUser","logInBtn",actionURL);
				return false;
			}*/
			
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
		//CODE SNIPPET FOR REFERE FRIEND
		$('#referForm').validate({
			rules: {
				"email":
				{
					required: true,
					email: true,
					remote: ajax_url+"App/isUniqueEmailAjax"
				}
			},
			messages: {				
				"email":
				{
					required : "This field is required",
					email: 'Kindly use valid email address',
				    remote: 'Email id already registered.'
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#referForm').attr('action');
				process_form("referForm","refer-btn",actionURL);
				return false;
			}
			
		});
		//END REFER FRIEND
		//CODE SNIPPET FOR SUBSCRIBE
		$('#subscribeForm').validate({
			rules: {
				"Subscribes[email]":
				{
					required: true,
					email: true,
					//remote: ajax_url+"guests/subscriberEmailExists"
				}
			},
			messages: {				
				"Subscribes[email]":
				{
					required : "This field is required",
					email: 'Kindly use valid email address',
					//remote: "Email id already subscribed."
					
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#subscribeForm').attr('action');
				//alert('okokokoko');
				process_form("subscribeForm","subscribe-btn",actionURL);
				return false;
			}
			
		});
		//CODE SNIPPET FOR SUBSCRIBE
		$('#addpartners').validate({
			rules: {
				"Partners[title]":
				{
					required: true
				},
				"Partners[short_description]":
				{
					required: true
				},
				"Partners[description]":
				{
					required: true
				},
				"Partners[image]":
				{
					required: true
				}
			},
			messages: {				
				"Partners[title]":
				{
					required : "This field is required"
				},
				"Partners[short_description]":
				{
					required : "This field is required"
				},
				"Partners[description]":
				{
					required : "This field is required"
				},
				"Partners[image]":
				{
					required : "This field is required"
				}
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#subscribeForm').attr('action');
				//alert('okokokoko');
				process_form("subscribeForm","subscribe-btn",actionURL);
				return false;
			}*/
			
		});
		/*For Services and Rates form*/
		//CODE SNIPPET FOR SUBSCRIBE
		$('#servicesAndRates').validate({
			rules: {
				"UserSitterServices[sh_holiday_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_puppy_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_cat_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_horse_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_reptiles_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_small_pets_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_dc_holiday_rate]":
				{
					 number: true  
				},
				"UserSitterServices[sh_nc_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_hc_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[sh_ltc_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_holiday_rate]":
				{
					 number: true  
				},
				"UserSitterServices[gh_puppy_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_cat_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_horse_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_reptiles_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_small_pets_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_dc_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_nc_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_hc_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_ltc_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[gh_vpd_1_visit_pr_day]":
				{
					 number: true 
				},
				"UserSitterServices[gh_vpd_2_visit_pr_day]":
				{
					 number: true 
				},
				"UserSitterServices[hp_gm_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[hp_tr_guest_rate]":
				{
					 number: true 
				},
				"UserSitterServices[hp_or_1_day_1_guest]":
				{
					 number: true 
				},
				"UserSitterServices[hp_or_2_day_1_guest]":
				{
					 number: true 
				},
				"UserSitterServices[hp_ds_pick_up]":
				{
					 number: true 
				},
				"UserSitterServices[hp_ds_drop_off]":
				{
					 number: true 
				},
				"UserSitterServices[hp_ds_return]":
				{
					 number: true 
				},
				"UserSitterServices[day_care_limit]":
				{
					 number: true 
				},
				"UserSitterServices[visits_limit]":
				{
					 number: true 
				},
				"UserSitterServices[night_care_limit]":
				{
					 number: true 
				},
				"UserSitterServices[hourly_services_limit]":
				{
					 number: true 
				}
			},
			messages: {				
				"UserSitterServices[sh_holiday_rate]":
				{
					required : "Number only please"
				}
			}/*,
			submitHandler: function(form) {
				var actionURL = $('#subscribeForm').attr('action');
				//alert('okokokoko');
				process_form("subscribeForm","subscribe-btn",actionURL);
				return false;
			}*/
			
		});
		/*End service and rates*/
	
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
				//console.log(res);
				var response = res.split(':');
				if(response[0] == 'Success'){
					$('.successMessage').html(response[1]);	//DISPLAY SUCCESS MESSAGE
					$('#'+formID)[0].reset();
					setTimeout(function(){window.location.href = ajax_url;},2000);
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

		//alert(formID+btnID+'url='+actionURL);
		var orgBtnVal=$("#"+btnID).val();//GET BUTTON VALUE
		$("#"+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
		$("#"+btnID).val('Processing...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
		var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
		//console.log(formData);
		$.ajax({
			url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
			data:formData,//ALL SUBMITTED DATA FROM THE FORM
			 
			success:function(res)
			{
				console.log(res);
				//alert(res);
				var response = res.split(':');
				if($.trim(response[0]) == 'Success'){
					$('.clr').html('');	//Emtpy Error MESSAGE
					//alert(response[1]);
					
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
	
	
	/*$(document).ready(function(e){
		
		// submiting email for reference for invitaion using ajax 
		$('#referForm').submit(function( event ) {
			event.preventDefault();
			var inputEmail = $('#referEmail').val();
           //alert(inputEmail);
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
		
	});*/
/*For sign up*/
$( document ).ready(function() {
    $('#signUpEmail').click(function(){
      $('#addUsers').slideToggle();
      $('#loginFacebook').toggle();
    });

   $('#googleChapcha').click(function(){
    
    	
	});

   $('#multiLingual').change(function(){
   var languagePath = $(this).val();
	  window.location.href = languagePath;
    });

   $(document)
	.on( 'click', '.dropdown-menu', function (e){
	    e.stopPropagation();
	});

/*End sign up*/
/*Last Drop down country- currency listing*/


 /*====For password fair line====*/
   /* $( "#usersp-password" ).keyup(function() {
    		
        var value = $(this).val();
       
        if((value.length) == 6){
               alert(value.length);

            $('#password_line').attr("src", ajax_url+'fair.jpg');
             
        }/*elseif((value.length) > '6'){
           $('#password_line').attr("src", '<?php echo HTTP_ROOT; ?>img/good.jpg');
        }else{
        	$('#password_line').attr("src", '<?php echo HTTP_ROOT; ?>img/good.jpg');
        }*/
  /* });*/
     
 /*====End fair line====*/
 });




/*Last Drop down country- currency listing*/
$(function () {
  	$('.navbar-toggle-sidebar').click(function () {
  		$('.navbar-nav').toggleClass('slide-in');
  		$('.side-body').toggleClass('body-slide-in');
  		$('#search').removeClass('in').addClass('collapse').slideUp(200);
  	});

  	$('#search-trigger').click(function () {
  		$('.navbar-nav').removeClass('slide-in');
  		$('.side-body').removeClass('body-slide-in');
  		$('.search-input').focus();
  	});
  });
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
		//DROP DOWN TOGGEL
		//$('#dropcontForgot').hide();
		/*$('#droplogForgot').click(function () {
			$('#dropcont').hide();
            $('#dropcontForgot').fadeToggle();
            setTimeout(function(){$("#droplog").trigger("click");},500);

        });

        $('#loginBack').click(function () {
			$('#dropcontForgot').hide();
            $('#dropcont').fadeToggle();
            setTimeout(function(){$("#droplog").trigger("click");},500);

        });*/
		//SLIDEUP MESSAGES FUNCTIONALITY START
		
		//CODE SNIPPET FOR SIGN UP
		$('#addUsers').validate({
			rules: {
				"Users[title]":
				{
					required:true,
				},
				"Users[first_name]":
				{
					required:true,
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
					required:true,
				},
				"Users[birth_date]":
				{
					required:true,
				},
				"Users[country]":
				{
					required:true,
				},
				"Users[term_condition]":
				{
					required:true,
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
		
		//Booking Products
		$('#bookingproducts').validate({
			rules: {
				
				"UserBookingProducts[day_care_limit]":
				{
					required: true
					
				},
				"UserBookingProducts[night_care_limit]":
				{
					required: true
					
				},
				"UserBookingProducts[visits_limit]":
				{
					required: true
					
				},
				"UserBookingProducts[hourly_services_limit]":
				{
					required: true
					
				}
			},
			messages: {				
				"UserBookingProducts[day_care_limit]":
				{
					required : "This field is required"
					
				},
				"UserBookingProducts[night_care_limit]":
				{
					required : "This field is required"
					
				},
				"UserBookingProducts[visits_limit]":
				{
					required : "This field is required"
					
				},
				"UserBookingProducts[hourly_services_limit]":
				{
					required : "This field is required"
					
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#bookingproducts').attr('action');
				gettingstarted("bookingproducts","booking-btn",actionURL);
				//$('#booking-active').addClass('active');
				//$("#sitter-guest-house").trigger("click");
				return false;
			}
		});
			//Sitter/Guest House
		$('#userHouse').validate({
			rules: {
				
				"Houses[sitter][accepted_pet_size]":
				{
					required: true
					
				},
				"Houses[sitter][mixed_familes]":
				{
					required: true
					
				},
				"Houses[sitter][preferred_age]":
				{
					required: true
					
				},
				"Houses[sitter][cancellation_policy]":
				{
					required: true
					
				},
				"Houses[sitter][un_neutered_pets]":
				{
					required: true
					
				},
				"Houses[sitter][un_spayed_females]":
				{
					required: true
					
				},
				"Houses[sitter][females_on_heat]":
				{
					required: true
					
				},
				"Houses[sitter][un_trained_pets]":
				{
					required: true
					
				},
				"Houses[sitter][last_minute_booking]":
				{
					required: true 
					
				},
				"Houses[sitter][longer_than_week]":
				{
					required: true
					
				},
				"Houses[sitter][breaks_provided_every]":
				{
					required: true
					
				},
				"Houses[guest][accepted_pet_size]":
				{
					required: true
					
				},
				"Houses[guest][maximum_distance]":
				{
					required: true
					
				},
				"Houses[guest][preferred_age]":
				{
					required: true
					
				},
				"Houses[guest][cancellation_policy]":
				{
					required: true
					
				},
				"Houses[guest][un_neutered_pets]":
				{
					required: true
					
				},
				"Houses[guest][un_spayed_females]":
				{
					required: true
					
				},
				"Houses[guest][females_on_heat]":
				{
					required: true
					
				},
				"Houses[guest][un_trained_pets]":
				{
					required: true
					
				},
				"Houses[guest][last_minute_booking]":
				{
					required: true 
					
				},
				"Houses[guest][longer_than_week]":
				{
					required: true
					
				},
				"Houses[guest][cancellation_policy_visits]":
				{
					required: true
					
				},
				"Houses[guest][breaks_provided_every]":
				{
					required: true
					
				}
			},
			messages: {				
				"Houses[sitter][accepted_pet_size]":
				{
					required : "This field is required"
					
				},
				"Houses[sitter][mixed_familes]":
				{
					required : "This field is required"
					
				},
				"Houses[sitter][preferred_age]":
				{
					required : "This field is required"
					
				},
				"Houses[sitter][cancellation_policy]":
				{
					required : "This field is required"
					
				},
				"Houses[sitter][un_neutered_pets]":
				{
					rrequired : "This field is required"
					
				},
				"Houses[sitter][un_spayed_females]":
				{
					required : "This field is required"
				},
				"Houses[sitter][females_on_heat]":
				{
					required : "This field is required"
				},
				"Houses[sitter][un_trained_pets]":
				{
					required : "This field is required"
				},
				"Houses[sitter][last_minute_booking]":
				{
					required : "This field is required"
				},
				"Houses[sitter][longer_than_week]":
				{
					required : "This field is required"
				},
				"Houses[sitter][breaks_provided_every]":
				{
					required : "This field is required"
				},
				"Houses[guest][accepted_pet_size]":
				{
					required : "This field is required"
				},
				"Houses[guest][maximum_distance]":
				{
					required : "This field is required"
				},
				"Houses[guest][preferred_age]":
				{
					required : "This field is required"
				},
				"Houses[guest][cancellation_policy]":
				{
					required : "This field is required"
				},
				"Houses[guest][un_neutered_pets]":
				{
					required : "This field is required"
				},
				"Houses[guest][un_spayed_females]":
				{
					required : "This field is required"
				},
				"Houses[guest][females_on_heat]":
				{
					required : "This field is required"
				},
				"Houses[guest][un_trained_pets]":
				{
					required : "This field is required"
				},
				"Houses[guest][last_minute_booking]":
				{
					required : "This field is required"
				},
				"Houses[guest][longer_than_week]":
				{
					required : "This field is required"
				},
				"Houses[guest][cancellation_policy_visits]":
				{
					required : "This field is required"
				},
				"Houses[guest][breaks_provided_every]":
				{
					required : "This field is required"
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#userHouse').attr('action');
				gettingstarted("userHouse","house-details-btn",actionURL);
				return false;
			}
			
		});
		//Start Sitter property form
		$('#sitterProperty').validate({
			rules: {
				"UserProperties[property_type]":
				{
					required: true
				},
				"UserProperties[outdoor_area]":
				{
					required: true
				},
				"UserProperties[outdoor_area_size]":
				{
					required: true
				},
				"UserProperties[outing_allow_multiple]":
				{
					required: true
				},
				"UserProperties[fully_fenced]":
				{
					required: true 
				},
				"UserProperties[smokers]":
				{
					required: true
				},
				"UserProperties[dogs_in_home]":
				{
					required: true
				},
				"UserProperties[cats_in_home]":
				{
					required: true
				},
				"UserProperties[birds_in_cages]":
				{
					required: true
				},
				"UserProperties[children]":
				{
					required: true
				},
				"Users[sitting_experience]":
				{
					required: true
				},
				"Users[take_care_desc]":
				{
					required: true
				},
				"Users[your_self]":
				{
					required: true
				},
				"Users[carers_description]":
				{
					required: true
				}
			},
			messages: {				
				"UserProperties[property_type]":
				{
					required: "This field id required."
				},
				"UserProperties[outdoor_area]":
				{
					 required: "This field id required."
				},
				"UserProperties[outdoor_area_size]":
				{
					 required: "This field id required."
				},
				"UserProperties[outing_allow_multiple]":
				{
					 required: "This field id required."
				},
				"UserProperties[fully_fenced]":
				{
					 required: "This field id required."
				},
				"UserProperties[smokers]":
				{
					 required: "This field id required."
				},
				"UserProperties[dogs_in_home]":
				{
					 required: "This field id required."
				},
				"UserProperties[cats_in_home]":
				{
					 required: "This field id required."
				},
				"UserProperties[birds_in_cages]":
				{
					 required: "This field id required."
				},
				"UserProperties[children]":
				{
					 required: "This field id required."
				},
				"Users[sitting_experience]":
				{
					required: "This field id required."
				},
				"Users[take_care_desc]":
				{
					required: "This field id required." 
				},
				"Users[your_self]":
				{
					required: "This field id required."
				},
				"Users[carers_description]":
				{
					required: "This field id required."
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#sitterProperty').attr('action');
				gettingstarted("sitterProperty","property-btn",actionURL);
				return false;
			}
			
		});
		///////////
		//Start User professional form
		$('#userProfessionals').validate({
			rules: {
				"UserProfessionals[pets][govt][expert][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][govt][expert][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][govt][expert][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][govt][student][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][govt][student][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][govt][student][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][private][expert][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][private][expert][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][private][expert][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][private][student][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][private][student][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[pets][private][student][expiry_date]":
				{
					required: true
					
				},"UserProfessionals[people][govt][expert][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[people][govt][expert][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[people][govt][expert][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionals[people][govt][student][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[people][govt][student][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[people][govt][student][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionals[people][private][expert][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[people][private][expert][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[people][private][expert][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionals[people][private][student][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[people][private][student][qualification_date]":
				{
					required: true
					
				},
				 "UserProfessionals[people][private][student][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionals[other][other][other][qualification_title]":
				{
					required: true
					
				},
				 "UserProfessionals[other][other][other][qualification_date]":
				{
					required: true 
					
				},
				 "UserProfessionals[other][other][other][expiry_date]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[first_aid_for]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[cpr_for]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[oral_medications]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[injected_medications]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[training_techniques]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[ex_behavioural_problems]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[ex_rescue_pets]":
				{
					required: true 
					
				},
				 "UserProfessionalsDetails[language]":
				{
					required: true
					
				},
				 "UserProfessionalsDetails[ex_volunteer]":
				{
					required: true
					
				}
			},
			messages:{		
			    "UserProfessionals[pets][govt][expert][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][govt][expert][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][govt][expert][expiry_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][govt][student][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][govt][student][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][govt][student][expiry_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][private][expert][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][private][expert][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][private][expert][expiry_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][private][student][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][private][student][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[pets][private][student][expiry_date]":
				{
					required: "This field id required."
					
				},"UserProfessionals[people][govt][expert][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][govt][expert][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][govt][expert][expiry_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][govt][student][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][govt][student][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][govt][student][expiry_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][private][expert][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][private][expert][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][private][expert][expiry_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][private][student][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][private][student][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[people][private][student][expiry_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[other][other][other][qualification_title]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[other][other][other][qualification_date]":
				{
					required: "This field id required."
				},
				 "UserProfessionals[other][other][other][expiry_date]":
				{
					required: "This field id required."
				}		
				,
				 "UserProfessionalsDetails[first_aid_for]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[cpr_for]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[oral_medications]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[injected_medications]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[training_techniques]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[ex_behavioural_problems]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[ex_rescue_pets]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[language]":
				{
					required: "This field id required."
				},
				 "UserProfessionalsDetails[ex_volunteer]":
				{
					required: "This field id required."
				}
			},
			submitHandler: function(form) {
				var actionURL = $('#userProfessionals').attr('action');
				gettingstarted("userProfessionals","professional-btn",actionURL);
				return false;
			}
			
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
				  // class=""
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
		//alert(formID+btnID+actionURL);
		var orgBtnVal=$("#"+btnID).val();//GET BUTTON VALUE
		$("#"+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
		$("#"+btnID).val('Processing...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
		var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
		
		$.ajax({
			url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
			data:formData,//ALL SUBMITTED DATA FROM THE FORM
			 
			success:function(res)
			{
				 console.log(res);
				//CODE FOR CHANGE THE BUTTON STYLE AND TEXT
				$("#"+btnID).attr('disabled',false);
				$("#"+btnID).val(orgBtnVal);	
				
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

/*End sign up*/
/*Last Drop down country- currency listing*/

$(document)
.on( 'click', '.dropdown-menu', function (e){
    e.stopPropagation();
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
 /*For personal accordian Add More*/
      //$(document).ready(function(){
          $("#flip").click(function(){
          $("#panel").slideDown("slow");
            });
          $("#close").click(function(){
                $("#panel").slideUp("slow");
            });
            $("#dro plog").click(function(){
                $("#dr opcont").toggle("slow");
            });
          $("#drop log2").click(function(){
                $("#dropcont2").toggle("slow");
            });
            $("#dro plog3").click(function(){
                $("#dropcont3").toggle("slow");
            }); 
          $(".one").click(function() {
            $("#one").toggle("slow");
        });
       $(".add-more-expand").click(function(){
            $(".add-more-expand i").toggleClass("fa-plus-circle fa-minus-circle");
            });
     //});
	/********FOR CHANGE PROFILE PIC*******************/
	
      
 });
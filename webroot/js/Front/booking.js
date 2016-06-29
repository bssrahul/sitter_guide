	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/sitter_guide/"; 
	

	function reportError(msg) {
		// Show the error in the form:
		$('#payment-errors').text(msg).addClass('alert alert-error');
		// re-enable the submit button:
		$('#submitBtn').prop('disabled', false);
		return false;
	}


	$(document).ready(function() {
		
		
		
		// Watch for a form submission:
		$("#payment-form").submit(function(event) {

			// Flag variable:
			var error = false;

			// disable the submit button to prevent repeated clicks:
			$('#submitBtn').attr("disabled", "disabled");

			// Get the values:
			var ccNum = $('.card-number').val(), cvcNum = $('.card-cvc').val(), expMonth = $('.card-expiry-month').val(), expYear = $('.card-expiry-year').val();

			// Validate the number:
			if (!Stripe.card.validateCardNumber(ccNum)) {
				error = true;
				reportError('The credit card number appears to be invalid.');
			}

			// Validate the CVC:
			if (!Stripe.card.validateCVC(cvcNum)) {
				error = true;
				reportError('The CVC number appears to be invalid.');
			}

			// Validate the expiration:
			if (!Stripe.card.validateExpiry(expMonth, expYear)) {
				error = true;
				reportError('The expiration date appears to be invalid.');
			}

			// Validate other form elements, if needed!

			// Check for errors:
			if (!error) {

				// Get the Stripe token:
				Stripe.card.createToken({
					number: ccNum,
					cvc: cvcNum,
					exp_month: expMonth,
					exp_year: expYear
				}, stripeResponseHandler);

			}

			// Prevent the form from submitting:
			return false;

		}); // Form submission

	}); // Document ready.

	// Function handles the Stripe response:
	function stripeResponseHandler(status, response) {

		// Check for an error:
		if (response.error) {

			reportError(response.error.message);

		} else { // No errors, submit the form:

		  var f = $("#payment-form");

		  // Token contains id, last4, and card type:
		  var token = response['id'];

		  // Insert the token into the form so it gets submitted to the server
		  f.append("<input type='hidden' name='stripeToken' value='" + token + "' />");

		  // Submit the form:
		  f.get(0).submit();

		}

	} // End of stripeResponseHandler() function.



	
	 $(function() {
		 
		 
		 	var creditly = Creditly.initialize(
			  '.creditly-wrapper .expiration-month-and-year',
			  '.creditly-wrapper .credit-card-number',
			  '.creditly-wrapper .security-code',
			  '.creditly-wrapper .card-type');

		  $(document).on('click',"#addCardDetail .paybtnajax", function(e) {
			 
			$(".signup_error").text('');
			  
			e.preventDefault();
			var output = creditly.validate();
			
			if (output) {
			
			  // Your validated credit card output
				var orgBtnVal = $(".paybtnajax").val();
				$(".card_error").text('');
				
				$.ajax({
					url: $('#addCardDetail').attr('action'),//AJAX URL WHERE THE LOGIC HAS BUILD
					data:$('#addCardDetail').serialize(),//ALL SUBMITTED DATA FROM THE FORM
					
					beforeSend: function(){
						$(".paybtnajax").attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
						$(".paybtnajax").val('Wait...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
					},
					
					complete: function(){
					  $(".paybtnajax").attr('disabled',false);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
					  $(".paybtnajax").val(orgBtnVal);//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
					},
					success:function(res)
					{
						var response = res.split(":");
						if($.trim(response[0])=='success'){
						
							window.location.href=ajax_url+'booking/'+response[1];
						
						}else if($.trim(response[0])=='error'){
						
							$(".card_error").text(response[1]);
						
						}else{
							$("#ajax_response").html(res);
							
							var creditly = Creditly.initialize(
							  '.creditly-wrapper .expiration-month-and-year',
							  '.creditly-wrapper .credit-card-number',
							  '.creditly-wrapper .security-code',
							  '.creditly-wrapper .card-type');
						}
					}
				  });
			}
		  });
    });
    
    
    $(document).on('keyup','.autoFillCard',function(){
		var cardElement = $(this).attr("data-rel");	
		
		$('.'+cardElement).text($(this).val());
	});

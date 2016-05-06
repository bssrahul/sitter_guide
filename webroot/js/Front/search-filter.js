	var host = window.location.host;
	var proto = window.location.protocol;
	var ajax_url = proto+"//"+host+"/sitter_guide/"; 
	
$(function(){

	$( "#boardingFrom" ).datepicker({
      defaultDate: "+1",
      changeMonth: true,
      numberOfMonths: 1,
      yearRange: "-50:+0",
      onClose: function( selectedDate ) {
        $( "#boardingTo" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    
    $( "#boardingTo" ).datepicker({
      defaultDate: "+1",
      changeMonth: true,
      numberOfMonths: 1,
      yearRange: "-50:+0",
      onClose: function( selectedDate ) {
        $( "#boardingFrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });

    $('#cIconFrom').click(function(){
        $( "#boardingFrom" ).focus();

    })

    $('#cIconTo').click(function(){
        $( "#boardingTo" ).focus();

    })

    $('.chooseService').click(function(){
        $('.chooseService').removeClass('active');
        $(this).addClass('active');
        $('.dropInOption').addClass('onLoadHide');
        $('.FirstThreeServices').removeClass('onLoadHide');
        $('.LastTwoServices').addClass('onLoadHide');
        $('.mPlacesOption').children().removeClass('onLoadHide');

        if($(this).hasClass('d-visit')){
            $('.dropInOption').removeClass('onLoadHide');
        }

        if($(this).hasClass('dn-care')){
            $('.FirstThreeServices').addClass('onLoadHide');
            $('.LastTwoServices').removeClass('onLoadHide');
        }

        if($(this).hasClass('m-place')){
            $('.FirstThreeServices').addClass('onLoadHide');
            $('.LastTwoServices').removeClass('onLoadHide');
            $('.mPlacesOption').children().addClass('onLoadHide');
        }


    });

    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 200 ],
      slide: function( event, ui ) {
        $( "#startRange" ).val( "$" + ui.values[ 0 ]);
        $( "#endRange" ).val( "$" + ui.values[ 1 ]);
        
      }
    });
    
    $( "#startRange" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ));
   
    $( "#endRange" ).val( "$" + $( "#slider-range" ).slider( "values", 1 ));
    
    /*Search JS ADD ON FORM START By Rahul jain dated on 5th May*/
	$("ul.pet_count li.dog-in-li").click(function() {
        $("ul.pet_count li").removeClass('active');
        $(this).addClass("active");
        $('#pet_count').val($("ul.pet_count li.active span").attr('data-rel'));
        
	});
	
	$("ul.booking_days li.dog-in-li").click(function() {
        
        if($(this).hasClass("active")==true){
			$(this).removeClass("active");
		}else{
			$(this).addClass("active");
		}
		
		var textArray = $('ul.booking_days li.active').find('span:first').map(function(){
			return $(this).attr('data-rel');
		}).get(); // ["sunday", "monday"]

		var textString = textArray.join(); // "sanday, monday"
		$('#booking_days').val(textString);
        
	});
	
	$("ul.marketplace li.marketplace_li").click(function() {
        
        if($(this).hasClass("active")==true){
			$(this).removeClass("active");
		}else{
			$(this).addClass("active");
		}
		
		var textArray = $('ul.marketplace li.active').find('a:first').map(function(){
			return $(this).attr('data-rel');
		}).get(); // ["sunday", "monday"]

		var textString = textArray.join(); // "sanday, monday"
		$('#marketplace').val(textString);
        
	});
		
		
	$(".ajaxSearch").click(function(){
		$.ajax({
			url: $('#searchParam').attr('action'),//AJAX URL WHERE THE LOGIC HAS BUILD
			data:$('#searchParam').serialize(),//ALL SUBMITTED DATA FROM THE FORM
			
			beforeSend: function(){
				$(".search-overlay").show();
				$(".search-overlay").html('<img class="search-img" src="'+ajax_url+'img/search-loader.gif"/>');
			},
			
			complete: function(){
				$(".search-overlay").hide();
				$(".search-overlay").html('');
			},
			success:function(res)
			{
				
			}
		});
	});		
    
});

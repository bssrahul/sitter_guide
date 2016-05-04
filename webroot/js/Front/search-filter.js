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
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#startRange" ).val( "$" + ui.values[ 0 ]);
        $( "#endRange" ).val( "$" + ui.values[ 1 ]);
        
      }
    });
    $( "#startRange" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ));
    $( "#endRange" ).val( "$" + $( "#slider-range" ).slider( "values", 1 ));
    
});
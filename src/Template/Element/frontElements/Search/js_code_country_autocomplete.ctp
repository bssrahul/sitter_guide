<script>
var input = document.getElementById('location_autocomplete');

var options = {
        types: ['(cities)'],
        componentRestrictions: {
            country: 'au'
        }
    };
    

var autocomplete = new google.maps.places.Autocomplete(input, options);

autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
    var latlong = place.geometry.location;
	$("#location_autocomplete_lat_long").val(latlong);
	var data = $("#search_by_location").serialize();
	$("#search_by_location").submit();
});


</script>

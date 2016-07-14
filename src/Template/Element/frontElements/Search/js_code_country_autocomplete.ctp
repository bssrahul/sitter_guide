<script>	
		function initialize_location_autocomplete() {
			var input = document.getElementById('location_autocomplete');
			var autocomplete = new google.maps.places.Autocomplete(input);
			
			autocomplete.addListener('place_changed', function() {
				var place = autocomplete.getPlace();
				var latlong = place.geometry.location;
				$("#location_autocomplete_lat_long").val(latlong);
				var data = $("#search_by_location").serialize();
				$("#search_by_location").submit();
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize_location_autocomplete);				
</script>

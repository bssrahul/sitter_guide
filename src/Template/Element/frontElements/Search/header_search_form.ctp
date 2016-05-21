<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAC9Ygt1oslhl8rB58NlsiwgP05bjUsfHQ"></script>-->

<?php echo $this->Form->create(null, [
		'url' => ['controller' => 'search', 'action' => 'search-by-location'],
		'role'=>'form',
		'id'=>'search_by_location',
]);
?>
	<input  name="location_autocomplete" value="<?php echo isset($headerSearchVal)?$headerSearchVal:""; ?>" class="search-input" id="location_autocomplete" type="text" placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Search home sitter for your loving dog')); ?>" />
	
	<input name="location_autocomplete_lat_long" id="location_autocomplete_lat_long" type="hidden" />
<?php echo $this->Form->end(); ?>
<?php echo $this->element('frontElements/Search/js_code_country_autocomplete'); ?>

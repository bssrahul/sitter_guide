<?php echo $this->Html->script(['Front/google_country_autocomplete']); ?>
<?php echo $this->Form->create(null, [
		'url' => ['controller' => 'search', 'action' => 'search-by-location'],
		'role'=>'form',
		'id'=>'search_by_location',
]);
?>
	<input  name="location_autocomplete" value="<?php echo isset($headerSearchVal)?$headerSearchVal:""; ?>" class="search-input" id="location_autocomplete" type="text" placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Search home sitter for your loving dog')); ?>" />
	<input name="location_autocomplete_lat_long" id="location_autocomplete_lat_long" type="hidden" />
<?php echo $this->Form->end(); ?>

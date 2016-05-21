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
<style>
.pac-container{
    border-bottom-right-radius: 6px;
    border-bottom-left-radius: 6px;
    box-shadow: none;
    box-shadow: 0px 2px 4px -2px rgba(161, 161, 161, 0.47);
}
.pac-container:after {
    background-image: none !important;
    display: none;

}
.pac-item{
    padding: 1em;
    background-color: #F9F9F9;
}
.pac-item:hover{
    background-color: #fff;
}
.pac-item:first-child{
    border-top: none;
}
.pac-matched{
    font-weight: normal;
}
.pac-icon{
    display: none;
}
</style>

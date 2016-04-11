<style>
form li span
{
	width:100%;
}
tr.mceLast
{
	display:none;
}
#elm1_ifr{height:400px !important;}
</style>
<?php  echo $this->Html->script('newadmin/tinymce/tiny_mce.js'); ?>
<script type="text/javascript">
tinymce.init({
		// General options
		mode : "specific_textareas",
		theme : "advanced",
		editor_selector : "tinymce",
		plugins : "style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,phpimage,autosave,ccSimpleUploader,safari,pagebreak",
		
		
		
    toolbar: "insertfile link image",
    menubar: false,

				// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,phpimage",
		theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,undo,redo,|,link,unlink,anchor,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "<?php echo HTTP_ROOT ?>css/content.css",

		
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		relative_urls : false,
		file_browser_callback: "ccSimpleUploader",
		plugin_ccSimpleUploader_upload_path: '../../uploads',                 
		plugin_ccSimpleUploader_upload_substitute_path: '<?php echo HTTP_ROOT ?>js/newadmin/tinymce/uploads/',
		plugin_css_File:'../../upload/',
		
		// Style formats
		style_formats : [
		{title : "Bold text", inline : "b"},
			{title : "Red text", inline : "span", styles : {color : "#ff0000"}},
			{title : "Red header", block : "h1", styles : {color : "#ff0000"}},
			{title : "Example 1", inline : "span", classes : "example1"},
			{title : "Example 2", inline : "span", classes : "example2"},
			{title : "Table styles"},
			{title : "Table row 1", selector : "tr", classes : "tablerow1"}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
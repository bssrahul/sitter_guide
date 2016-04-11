
$(document).ready(function() {
						   
	// Navigation menu
	$('ul#navigation').superfish({ 
		delay:       1000,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast',
		autoArrows:  true,
		dropShadows: false
	});
	$('ul#navigation li').hover(function(){
		$(this).addClass('sfHover2');
	},
	function(){
		$(this).removeClass('sfHover2');
	});	



	// Live Search
	$('#search-bar input[name="q"]').liveSearch({url: 'live_search.php@q='});

	//Hover states on the static widgets
	$('.ui-state-default').hover(
		function() { $(this).addClass('ui-state-hover'); }, 
		function() { $(this).removeClass('ui-state-hover'); }
	);



	//Sortable portlets
	$('.sortable .column').sortable({
		cursor: "move",
		connectWith: '.sortable .column',
		dropOnEmpty: false
	});
	$(".column").disableSelection();
	
	//Sidebar only sortable boxes

	$(".side_sort").sortable({
		axis: 'y',
		cursor: "move",
		connectWith: '.side_sort'
	});


	//Close/Open portlets
	$(".portlet-header").hover(function() {
		$(this).addClass("ui-portlet-hover");
	},

	function(){
		$(this).removeClass("ui-portlet-hover");
	});

	$(".portlet-header .ui-icon").click(function() {
		$(this).toggleClass("ui-icon-circle-arrow-n");
		$(this).parents(".portlet:first").find(".portlet-content").toggle();
	});

	// Sidebar close/open (with cookies)

	function close_sidebar() {
		$("#sidebar").addClass('closed-sidebar').animate({"speed":"1500"});
		//$("#sidebar").animate("speed",500);
		$("#page_wrapper #page-content #page-content-wrapper").addClass("no-bg-image wrapper-full");
		$("#open_sidebar").show();
		$("#close_sidebar, .hide_sidebar").hide();
	}

	function open_sidebar() {
		$("#sidebar").removeClass('closed-sidebar').animate(1500);
		//$("#sidebar").removeClass('closed-sidebar').animate({"speed":"500"});
		$("#page_wrapper #page-content #page-content-wrapper").removeClass("no-bg-image wrapper-full");
		$("#open_sidebar").hide();
		$("#close_sidebar, .hide_sidebar").show();
		}

	$('#close_sidebar').click(function(){
    //$('.btn ui-state-default full-link ui-corner-all').toggle();
		close_sidebar();
		$(".content-box").css("width","96%");

		$(".inner-page-title").css("width","98%");

		var sidebarHeight = $("#sidebar").height();
		//alert(sidebarHeight);
		$("#page-content-wrapper").css({"minHeight" : sidebarHeight });
		/*if(jQuery.browser.safari) {
		    location.reload();
		}*/
		$.cookie('sidebar', 'closed' );
			$(this).addClass("active");
	});

	$('#open_sidebar').click(function(){
		open_sidebar();
		$(".content-box").css("width","98%");
		$(".inner-page-title").css("width","100%");
			var sidebarHeight = $("#sidebar").height();
			//salert(sidebarHeight);
	$("#page-content-wrapper").css({"minHeight" : sidebarHeight });
/*
		if(jQuery.browser.safari) {
		    location.reload();
		}*/
		$.cookie('sidebar', 'open' );
	});

	var sidebar = $.cookie('sidebar');
		if (sidebar == 'closed') {
			close_sidebar();
	    };
		if (sidebar == 'open') {
			open_sidebar();
	    };

	/* Tooltip */
	$(function() {
		$('.tooltip').tooltip({
			track: true,
			delay: 0,
			showURL: false,
			showBody: " - ",
			fade: 250
			});
		});


	/* Theme changer - set cookie */

    $(function() {
        $('a.set_theme').click(function() {
           	var theme_name = $(this).attr("id");
			$('body').append('<div id="theme_switcher" />');
			$('#theme_switcher').fadeIn('fast');
			setTimeout(function () { 
				$('#theme_switcher').fadeOut('fast');
			}, 1000);
			setTimeout(function () { 
			$("link[title='style']").attr("href","css/themes/" + theme_name + "/ui.css");
			}, 500);			
			$.cookie('theme', theme_name );
			$('a.set_theme').removeClass("active");
			$(this).addClass("active");
        });

		var theme = $.cookie('theme');
       //alert(theme);
		$("a.set_theme[id="+ theme +"]").addClass("active");
		
		if (theme == 'black_rose') {
	        $("link[title='style']").attr("href","css/themes/black_rose/ui.css");
	    };

		if (theme == 'gray_standard') {
	        $("link[title='style']").attr("href","css/themes/gray_standard/ui.css");
	    };
		
		if (theme == 'gray_lightness') {
	        $("link[title='style']").attr("href","css/themes/gray_lightness/ui.css");
	    };

		if (theme == 'blueberry') {
	        $("link[title='style']").attr("href","css/themes/blueberry/ui.css");
	    };

		if (theme == 'apple_pie') {
	        $("link[title='style']").attr("href","css/themes/apple_pie/ui.css");
	    };

		if(theme == 'blue_sky'){
			$("link[title='style']").attr("href","css/themes/blue_sky/ui.css");
		};		

		if(theme == 'turquoise'){
			$("link[title='style']").attr("href","css/themes/turquoise/ui.css");
		};

		if (theme == 'salmon') {
	        $("link[title='style']").attr("href","css/themes/salmon/ui.css");
	    };
    });



    



	/* Layout option - Change layout from fluid to fixed with set cookie */

    $(function() {

		$('.layout-options a').click(function(){
			var lay_id = $(this).attr("id");
			$('body').attr("class",lay_id);
			$("#page-layout, #page-header-wrapper, #sub-nav,#page_wrapper").addClass("fixed");
			$.cookie('layout', lay_id );
			$('.layout-options a').removeClass("active");
			$(this).addClass("active");
		})
	    var lay_cookie = $.cookie('layout');
     // alert(lay_cookie);
		$(".layout-options a[id="+ lay_cookie +"]").addClass("active");
		if (lay_cookie == 'layout100') {
			$('body').attr("class","");
			$("#page-layout, #page-header-wrapper, #sub-nav","#page-header","#navigation","#page_wrapper").removeClass("fixed");
	    };
		if (lay_cookie == 'layout90') {
			// alert(lay_cookie);
			$('body').attr("class","layout90");
			$("#page-layout, #page-header-wrapper, #sub-nav","#page-header","#navigation","#page_wrapper").addClass("fixed");
	    };

		if (lay_cookie == 'layout75') {
 //alert(lay_cookie);
			$('body').attr("class","layout75");
			$("#page-layout, #page-header-wrapper, #sub-nav","#page-header","#navigation","#page_wrapper").addClass("fixed");
	    };
		if (lay_cookie == 'layout980') {
			$('body').attr("class","layout980");
			$("#page-layout, #page-header-wrapper, #sub-nav","#page-header","#navigation","#page_wrapper").addClass("fixed");
	    };
		if (lay_cookie == 'layout1280') {
			$('body').attr("class","layout1280");
			$("#page-layout, #page-header-wrapper, #sub-nav","#page-header","#navigation","#page_wrapper").addClass("fixed");
		};
		if (lay_cookie == 'layout1400') {
			$('body').attr("class","layout1400");
			$("#page-layout, #page-header-wrapper, #sub-nav","#page-header","#navigation","#page_wrapper").addClass("fixed");
	    };
		if (lay_cookie == 'layout1600') {
			$('body').attr("class","layout1600");
			//$('#bdylay').attr("class","layout1600");
			$("#page-layout, #page-header-wrapper, #sub-nav","#page-header","#navigation","#page_wrapper").addClass("fixed");
	    };

    });







	// Dialog			

	$('#dialog').dialog({
		autoOpen: false,
		width: 600,
		bgiframe: false,
		modal: true,
			zIndex: 9999,
		buttons: {
			"Ok": function() { 
				$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close");
			} 
		}
	});

	// Modal Confirmation
		$("#modal_confirmation").dialog({
			autoOpen: false,
			bgiframe: true,
			resizable: false,
			width:500,
			modal: true,
			zIndex: 9999,
			overlay: {
				backgroundColor: '#000',
				opacity: 0.5
			},
			buttons: {
				'Delete all items in recycle bin': function() {
					$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});
		
	// Dialog Link

	$('#dialog_link').click(function(){
		$('#dialog').dialog('open');
		return false;
	});


	// Modal Confirmation Link
	
	$('#modal_confirmation_link').click(function(){
		$('#modal_confirmation').dialog('open');
		return false;
		});
	// Same height
	var sidebarHeight = $("#sidebar").height();
	$("#page-content-wrapper").css({"minHeight" : sidebarHeight });



	// Simple drop down menu

	var myIndex, myMenu, position, space=20;
	$("div.sub").each(function(){
		$(this).css('left', $(this).parent().offset().left);
		$(this).slideUp('fast');
		});
	
	$(".drop-down li").hover(function(){
		$("ul",this).slideDown('fast');
		//get the index, set the selector, add class
		myIndex = $(".main1").index(this);
		myMenu = $(".drop-down a.btn:eq("+myIndex+")");
	}, function(){
		$("ul",this).slideUp('fast');
	});
	//count money in add new look
	$('.how_much_input').keyup(function()
	{
		var total = 0;
		$('.how_much_input').each(function(){
			if(($(this).val()=='') || isNaN($(this).val()))
			{
				total = total + 0;
			}
			else
			{
				total = total + parseFloat($(this).val());
			}
		});
		$('.total').val(total.toFixed(2));
	});
	//upload image
	if($('#selectlookImage').length>0)
	{
		var btnUpload=$('#selectlookImage');
		new AjaxUpload(btnUpload, {
		
			action: ajax_url+'Home/upload_image/'+btnUpload.attr('rel'),
			name: 'uploadfile',
			onSubmit: function(file, ext)
			{
				$(".mylookLoader").attr('src',ajax_url+'img/ajax-loader.gif');	
				$(".mylookLoader").show();
				if (! (ext && /^(jpg|png|jpeg|gif|bmp)$/.test(ext)))
				 { 
					// extension is not allowed 
					//$("#status").html('Only JPG, PNG or GIF files are allowed');
					alert("Only JPG, PNG, BMP or GIF files are allowed");
					$(".overlay").hide();
					$("#loading").hide();
					$(".mylookLoader").hide();
					return false;	
				}
				//$("#status").html('<img src="'+ajax_url+'img/front/ajax-loader.gif">');
			},
			onComplete: function(file, response)
			{
				$(".overlay").hide();
				$("#loading").hide();
				//On completion clear the status
				$("#status").html('');
				//Add uploaded file to list
				
				html=response.split(":");
				
				
				if($.trim(html[0])==="success")
				{
					$(".locallookImg").attr('src',ajax_url+'img/front/lookImages/'+html[1]);
					//$(".myLoader").hide();
					$('#myImage').val(html[1]);
					$(".locallookImg").show();
					$(".mylookLoader").hide();
					$('.imgErr').html('');
					if(html[2] == 'resize')
					{
						alert('Uploaded image is not consistent with the Size dimensions. Please check the image preview, and if the image is distorted, then load another image that meets the Size dimensions');
					}
					
				}
				else if($.trim(html[0])==="size")
				{
					$(".mylookLoader").hide();
					alert($.trim(html[1]));
				}	
				else
				{
					$(".mylookLoader").hide();
					alert("There was some error in uploading.Try again");
				}
				$('.signup_logo_change').css('background-color', '#FFF');
			}
		});
	}
	
});
//function to validate add new look  in admin panel
//validate add look page
function validateAddLook()
{
	var i = 0;
	/*start validate*/ 
		/*validate title*/
		if($('#titl_req').val() == '')
		{
			$('#titl_req').parent('div').next('span.addlook_error').html("Please enter a title ");
			i++;	
		}
		else 
		{
			$('#titl_req').parent('div').next('span.addlook_error').html('');
		}
		/*validate location*/
		if($('#loca_req').val() == '')
		{
			$('#loca_req').parent('div').next('span.addlook_error').html(" Please enter a location ");
			i++;
		}
		else 
		{
			var temp = $('#loca_req').val();
			var word = temp.split(",");
			if(word.length > 2)
			{
				$('#loca_req').parent('div').next('span.addlook_error').html('Please enter a valid location');
				i++;
			}
			else
			{
				$('#loca_req').parent('div').next('span.addlook_error').html('');
			}
		}
	//head part1 
	if(($('#head_describe1').val() == '' && $('#head_bought1').val() == '' && $('#head_price1').val() == '') || ($('#head_describe1').val() != '' && $('#head_bought1').val() != '' && $('#head_price1').val() != ''))
	{
		if(($('#head_describe1').val() != '') && ($('#head_bought1').val() != '') && ($('#head_price1').val() != ''))
		{
			if(isNaN($('#head_price1').val()))
			{
				$('#head_price1').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#head_price1').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#head_price1').parent('div').next('span.addlook_error').html('');
		}
	}
	
	else
	{
		$('#head_price1').parent('div').next('span.addlook_error').html("Please fill all fields\n");
		i++;
	}
	//head part2
	if(($('#head_describe2').val() == '' && $('#head_bought2').val() == '' && $('#head_price2').val() == '') || ($('#head_describe2').val() != '' && $('#head_bought2').val() != '' && $('#head_price2').val() != ''))
	{
		if(($('#head_describe2').val() != '') && ($('#head_bought2').val() != '') && ($('#head_price2').val() != ''))
		{
			if(isNaN($('#head_price2').val()))
			{
				$('#head_price2').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#head_price2').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#head_price2').parent('div').next('span.addlook_error').html('');
		}
	}
	
	else
	{
		$('#head_price2').parent('div').next('span.addlook_error').html("Please fill all fields\n");
		i++;
	}
	//top part1
	if(($('#top_describe1').val() == '' && $('#top_bought1').val() == '' && $('#top_price1').val() == '') || ($('#top_describe1').val() != '' && $('#top_bought1').val() != '' && $('#top_price1').val() != ''))
	{
		if(($('#top_describe1').val() != '') && ($('#top_bought1').val() != '') && ($('#top_price1').val() != ''))
		{
			if(isNaN($('#top_price1').val()))
			{
				$('#top_price1').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#top_price1').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#top_price1').parent('div').next('span.addlook_error').html('');
		}
	}
	
	else
	{
		$('#top_price1').parent('div').next('span.addlook_error').html("Please fill all fields\n");
		i++;
	}
	
	//top part2
	if(($('#top_describe2').val() == '' && $('#top_bought2').val() == '' && $('#top_price2').val() == '') || ($('#top_describe2').val() != '' && $('#top_bought2').val() != '' && $('#top_price2').val() != ''))
	{
		if(($('#top_describe2').val() != '') && ($('#top_bought2').val() != '') && ($('#top_price2').val() != ''))
		{
			if(isNaN($('#top_price2').val()))
			{
				$('#top_price2').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#top_price2').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#top_price2').parent('div').next('span.addlook_error').html('');
		}
	}
	
	else
	{
		$('#top_price2').parent('div').next('span.addlook_error').html("Please fill all fields\n");
		i++;
	}
	//bottom part1
	if(($('#bottom_describe1').val() == '' && $('#bottom_bought1').val() == '' && $('#bottom_price1').val() == '') || ($('#bottom_describe1').val() != '' && $('#bottom_bought1').val() != '' && $('#bottom_price1').val() != ''))
	{
		if(($('#bottom_describe1').val() != '') && ($('#bottom_bought1').val() != '') && ($('#bottom_price1').val() != ''))
		{
			if(isNaN($('#bottom_price1').val()))
			{
				$('#bottom_price1').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#bottom_price1').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#bottom_price1').parent('div').next('span.addlook_error').html('');
		}
	
	}
	else
	{
		$('#bottom_price1').parent('div').next('span.addlook_error').html("Please fill all fields\n");
		i++;
	}
	//bottom par2
	if(($('#bottom_describe2').val() == '' && $('#bottom_bought2').val() == '' && $('#bottom_price2').val() == '') || ($('#bottom_describe2').val() != '' && $('#bottom_bought2').val() != '' && $('#bottom_price2').val() != ''))
	{
		if(($('#bottom_describe2').val() != '') && ($('#bottom_bought2').val() != '') && ($('#bottom_price2').val() != ''))
		{
			if(isNaN($('#bottom_price2').val()))
			{
				$('#bottom_price2').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#bottom_price2').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#bottom_price2').parent('div').next('span.addlook_error').html('');
		}
	
	}
	else
	{
		$('#bottom_price2').parent('div').next('span.addlook_error').html("Please fill all fields\n");
		i++;
	}
	//feet part1 
	if(($('#feet_describe1').val() == '' && $('#feet_bought1').val() == '' && $('#feet_price1').val() == '') || ($('#feet_describe1').val() != '' && $('#feet_bought1').val() != '' && $('#feet_price1').val() != ''))
	{
		if(($('#feet_describe1').val() != '') && ($('#feet_bought1').val() != '') && ($('#feet_price1').val() != ''))
		{
			if(isNaN($('#feet_price1').val()))
			{
				$('#feet_price1').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#feet_price1').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#feet_price1').parent('div').next('span.addlook_error').html('');
		}
	}
	else
	{
		$('#feet_price1').parent('div').next('span.addlook_error').html("Please fill all fields\n");
			i++;
	}
	//feet part2 
	if(($('#feet_describe2').val() == '' && $('#feet_bought2').val() == '' && $('#feet_price2').val() == '') || ($('#feet_describe2').val() != '' && $('#feet_bought2').val() != '' && $('#feet_price2').val() != ''))
	{
		if(($('#feet_describe2').val() != '') && ($('#feet_bought2').val() != '') && ($('#feet_price2').val() != ''))
		{
			if(isNaN($('#feet_price2').val()))
			{
				$('#feet_price2').parent('div').next('span.addlook_error').html("Please enter a valid amount.\n");
				i++;
			}
			else
			{
				$('#feet_price2').parent('div').next('span.addlook_error').html('');
			}
		}
		else
		{
			$('#feet_price2').parent('div').next('span.addlook_error').html('');
		}
	}
	else
	{
		$('#feet_price2').parent('div').next('span.addlook_error').html("Please fill all fields\n");
			i++;
	}
	//validate image upload
	if($('#myImage').val() == '')
	{
		$('.imgErr').html("Please upload one image");
			i++;
	}
	else 
	{
		$('.imgErr').html('');
	}
	//validate radi button
	if ($('.radio_visible').is(':checked')) 
	{
		$('.radi_vis').next('span.addlook_error').html('');
	}
	else
	{
		$('.radi_vis').next('span.addlook_error').html('Please select one option ');
			i++;
	}
//end validate	
	if(i != 0)
	{
		return false;
	}
}
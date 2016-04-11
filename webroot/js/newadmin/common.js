var host = window.location.host;
var proto = window.location.protocol;
var ajax_url = proto+"//"+host+"/sitter_guide/";
$(document).ready(function(){
	
	$('.chk_hear_optn').click(function(){
		if($(this).val() == 1)
		{
			$('.get_hear').show();
		}
		else
		{
			$('.get_hear').hide();
		}
	});
	
	//add member
	$('#addMemberform').validate(
	{
		rules: 
			{						
				"data[Member][email]":
				{							
					remote: ajax_url+"Users/chkEmail"
				},
				"data[Member][password]":
				{							
					remote: ajax_url+"App/checkalphaNumeric"
				},
				"data[Member][cpassword]":
				{
					equalTo: $('#MemberSignupPassword')
				},
				"data[Member][captchamatch]":
				{
					remote: ajax_url+"App/checkCaptcha" 
				},
				"data[Member][phone_part]":
				{
					remote: ajax_url+"App/checkNumeric"
				},
				"data[Member][phone]":
				{
					remote: ajax_url+"App/checkNumeric"  
				},
				"chkCats":
				{
					required:true
				}
			},
		messages: 
			{
				"data[Member][email]":
				{
					remote: 'This email address is already registered on Sponsable'
				},
				"data[Member][password]":
				{
					remote: 'Password should be 8 characters in length and contains a combination letters. eg{jk8&L7!a}'
				},
				"data[Member][cpassword]":
				{
					equalTo: "Passwords do not match"
				},
				"data[Member][captchamatch]":
				{
					remote: "The code you have entered is not correct"
				},
				"data[Member][phone_part]":
				{
					remote: "Phone number should be numeric, with no spaces or characters"
				},
				"data[Member][phone]":
				{
					remote: "Phone number should be numeric, with no spaces or characters"
				},
				"chkCats":
				{
					required:"Please add category and type on which your sponsorship opportunities fits"
				}
			}
	});
	
	$('#countryId').change(function() {   
	   var country = $('#countryId').val();
	   $('#city').html('<option>Loading</option>');
	   $.ajax({
					url:ajax_url+"CmsPages/get_city/"+country,
					data:"",
					success:function(html)
					{
						$('#city').html(html);
						$('#city').trigger('change');
					}
			  });	
	});
	
	$('#city').live('change', function() {   
	   var city = $('#city').val();
	   $('#suburb').html('<option>Loading</option>');
	   $.ajax({
					url:ajax_url+"CmsPages/get_suburb/"+city,
					data:"",
					success:function(html)
					{
						$('#suburb').html(html);
					}
			  });	
	});
	
	
	
	$("#addNewsform").validate({			 
		rules: {						
				"data[ImportNeighborhood][postal_code]":
				{
					required:true,							
					remote: ajax_url+"CmsPages/check_postal_name"
				},
				"data[ImportNeighborhood][title]":
				{
					required:true,	
				}
	   },
	   messages: {
				"data[ImportNeighborhood][postal_code]":
				{
					required:'This field required',
					remote: 'Postal code already exist'
				},
				"data[ImportNeighborhood][title]":
				{
					required:'This field required'
				}
			}
	});	
		
		
			$("#addAdminform").validate({			 
		rules: {						
				"data[Admin][username]":
				{							
					remote: ajax_url+"Users/check_subadmin"
				},
				"data[Admin][confirm_pass]":
				{
					equalTo: $('#confirm')
				}
	   },
	   messages: {
				"data[Admin][username]":
				{
					remote: 'Username already exist'
				},
				"data[Admin][confirm_pass]":
				{
					equalTo: "Passwords do not match"
				}
			}
	});	
	
	$("#myform1").validate({
		
		rules: {
				"data[Review][set_limit]":
				{
					digits:true,
					remote: ajax_url+"CmsPages/check_limit"
				}
	   },
	   messages: {
		   		"data[Review][set_limit]":
				{
					message: 'please enter only ',
					remote: 'Max limit allow 10.'
				}
			}
		
		});
	
	$("#passwordform").validate({
					 
		rules: {
				"data[Member][password]":
				{
					minlength: 6
				},
				"data[Member][confirm_password]":
				{
					equalTo: $('#confirm')
				}
	   },
	   messages: {
		   		"data[Member][password]":
				{
					minlength: 'Maximum character limit is 6.'
				},
				"data[Member][confirm_password]":
				{					
					equalTo: "Passwords do not match."
				}
			}
	});	
	   
	$('.validateForm').submit(function(){
		var flag = 0;
		$('.required').each(function(){
			if($.trim($(this).val())=='')
			{
				flag = 1;
				$(this).parent('td').children('label.err').html('This field is required.');
				return false;
			}
			else
			{
				flag = 0;
				$(this).parent('td').children('label.err').html('');
			}
		});
		if(flag == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	});
	
	
	
 	$('#searchMember').live('click',function(){
		$('#searchMember').hide();
		$('#hide').show();										
		$('.Searchdiv').slideToggle('slow');
		return false;
	});
	 $('#hide').live('click',function(){
		$('#hide').hide();
		$('#searchMember').show();
		$('.Searchdiv').slideToggle('slow');
	 });
	if($('.succ_msg').length>0)
	{
		$('.succ_msg').fadeOut(5000);
	}
	
	if($("select#ad_area").length>0)
	{
		$("label[id=ad_area"+$("select#ad_area").val()+"]").show();
		$("select#ad_area").change(function(){
			$("label[id^=ad_area]").hide();
			$("label[id=ad_area"+$("select#ad_area").val()+"]").show();
		});	
	}

	
	$('#perPage').live('change',function(){									 
			overlay();
			loc = document.location.toString();
			loc = loc.split('?');
			var url = loc[0]+'/limit:'+$("#perPage").val()+'?'+loc[1];
			
			$(".three-col-mid").load(unescape(url),function(){ $(".overlay").fadeOut(); });
		});
	
	$("div.paging a").live("click",function(){
							
		overlay();
		$(".three-col-mid").load(unescape($(this).attr("href")),function(){ $(".overlay").fadeOut(); });
		return false;
   });
   $("input[name=page]").change(function(){
		overlay();
		var url = document.location+'/page:'+$(this).val();
		$(".three-col-mid").load(unescape(url),function(){ $(".overlay").fadeOut(); });
		
	});
	
	
	
})



function overlay()
{
	if($("#overlay").length!=0)
	{
		position=$("#overlay").offset();
		$(".overlay").css("width",$("#overlay").width());
		$(".overlay").css("height",$("#overlay").height());
		$(".overlay").css(position);
		$("#new_loading").css("top",($("#overlay").height())/2);
		$("#new_loading").css("left",($("#overlay").width())/2);
	}
	$(".overlay").show();
	
}
function overlay_map()
{
	$("#new_loading1").css("top",'40%');
	$("#new_loading1").css("left",'50%');
	$(".overlay1").show();
	$("#new_loading1").show();	
}

function show_overlay()
{
	
	if($(".black_overlay").length != '0')
	{
		if (window.innerHeight) 
		{// Firefox
			if(window.scrollMaxY)
			{
				yWithScroll = window.innerHeight + window.scrollMaxY;
				xWithScroll = window.innerWidth + window.scrollMaxX;
			}
			else
			{
				yWithScroll = window.innerHeight;
				xWithScroll = window.innerWidth ;
			}
		} 
		else if (document.body.scrollHeight > document.body.offsetHeight)
		{ // all but Explorer Mac
			yWithScroll = document.body.scrollHeight;
			xWithScroll = document.body.scrollWidth;
		}
		else 
		{ // works in Explorer 6 Strict, Mozilla (not FF) and Safari
			yWithScroll = document.body.offsetHeight;
			xWithScroll = document.body.offsetWidth;
		}
		$(".black_overlay").css('height',$(document).height());
		$(".black_overlay").show();
		
	}
}

function showDivAtCenter(divid) 
{
	var scrolledX, scrolledY;
	if( self.pageYoffset )
	{
		scrolledX = self.pageXoffset;
		scrolledY = self.pageYoffset;
	} 
	else if( document.documentElement && document.documentElement.scrollTop ) 
	{
		scrolledX = document.documentElement.scrollLeft;
		scrolledY = document.documentElement.scrollTop;
	} 
	else if( document.body ) 
	{
		scrolledX = document.body.scrollLeft;
		scrolledY = document.body.scrollTop;
	}
	var centerX, centerY;
	if( self.innerHeight ) 
	{
		centerX = self.innerWidth;
		centerY = self.innerHeight;
	} 
	else if( document.documentElement && document.documentElement.clientHeight ) 
	{
		centerX = document.documentElement.clientWidth;
		centerY = document.documentElement.clientHeight;
	}
	else if( document.body ) 
	{
		centerX = document.body.clientWidth;
		centerY = document.body.clientHeight;
	}
	Xwidth=$('#'+divid).width();
	Yheight=$('#'+divid).height();
	
	var leftoffset = scrolledX + (centerX - Xwidth) / 2;
	var topoffset = scrolledY + (centerY - Yheight) / 2;
	
	leftoffset=(leftoffset<0)?0:leftoffset;
	topoffset=(topoffset<0)?0:topoffset;	
	var o=document.getElementById(divid);
	var r=o.style;
	r.top = topoffset + 'px';
	r.left = leftoffset + 'px';
	r.display = "block";  
}

function hidePopUp(trgt)
{
	$("#"+trgt).fadeOut("slow");
	$(".black_overlay").hide();
}

$(document).keypress(function(e){

		if(e.keyCode==27)//Disable popup on pressing `ESC`
		{
			$('#documentViewDiv').hide();
			$('#documentViewDivfront').hide();
			$('#documentViewDivlarge').hide();
			hidePopUp('showpopup'); 	
		}
	
	});

/* Check all table rows */

var checkflag = "false";
function check(field) {}		

  
$("#checkAll").live('click',function(){
	
		if($(this).is(":checked")){
			$(".selectCheck").each(function(){
					$(this).attr("checked","checked");
		  });
	   }else{
			$(".selectCheck").each(function(){
					 $(this).attr("checked",false);
			});        
			}
	   });
	   
$("#checkAll1").live('click',function(){
	
		if($(this).is(":checked")){
			$(".selectCheck1").each(function(){
					$(this).attr("checked","checked");
		  });
	   }else{
			$(".selectCheck1").each(function(){
					 $(this).attr("checked",false);
			});        
			}
	   });
	   
$("#checkAll2").live('click',function(){

if($(this).is(":checked")){
	$(".selectCheck2").each(function(){
			$(this).attr("checked","checked");
  });
}else{
	$(".selectCheck2").each(function(){
			 $(this).attr("checked",false);
	});        
	}
});


$("#checkAll3").live('click',function(){

if($(this).is(":checked")){
	$(".selectCheck3").each(function(){
			$(this).attr("checked","checked");
  });
}else{
	$(".selectCheck3").each(function(){
			 $(this).attr("checked",false);
	});        
	}
});


$("#checkAll4").live('click',function(){

if($(this).is(":checked")){
	$(".selectCheck4").each(function(){
			$(this).attr("checked","checked");
  });
}else{
	$(".selectCheck4").each(function(){
			 $(this).attr("checked",false);
	});        
	}
});

	   
function ajax_form(form,site_url,link_id){   
	var form = form;
	if($("form[id="+form+"] #loading").length>0)
	{
		$("#loading").html('<img src="'+ajax_url+'img/front/ajax-loader.gif">');
	}
	else if($("#overlay").length>0)
	{
			overlay();
	}
	var req = $.post
	( 
		ajax_url+site_url, 
		$('#' + form).serialize(), 
		function(html){
			
			$("#loading").html("");	
			if($("div.errorcontainer").length>0)
			{
				$("div.errorcontainer").hide();
			}
			 if($("#overlay").length>0)
			 {
				 $(".overlay").hide();
			 }
			var explode = html.split("\n");
			var shown = false;
			var msg = '<div class="errorTopheadingText">You have errors in your form. Please check and try again.</div><br /><br /><div class="errorlist"><ol>';
			for ( var i in explode )
			{
				var explode_again = explode[i].split("|");
				if ($.trim(explode_again[0])=='error')
				{
					if ( ! shown ) {
						$('#' + link_id).show();
						}
					shown = true;
					$('#err_' + explode_again[1]).show();
					add_remove_class('ok','error',explode_again[1]);
					if($('#err_' + explode_again[1]).length>0)
					{
						$('#err_' + explode_again[1]).html(explode_again[2]);
					}
					msg += "<li>" + explode_again[2] + "</li>";
				}
				else if ($.trim(explode_again[0])=='ok') {
					add_remove_class('error','ok',explode_again[1]);
					$('#err_' + explode_again[1]).hide();
				}
			}
			
			if ( ! shown )
			{
				$('#'+form).submit();
				add_remove_class('error','success',link_id);
				$('#' + link_id).show();
				
			}
			else {
				add_remove_class('success','error',link_id);
				$('#' + link_id).html(msg + "</ol></div>");
			}
			
			req = null;
		}
		
	);
	return false;
}
function add_remove_class(search,replace,element_id)
{
	if ($('#' + element_id).hasClass(search)){
		$('#' + element_id).removeClass(search);
	}
	$('#' + element_id).addClass(replace);
}
function overlay()
{
	if($("#overlay").length!=0)
	{
		
		position=$("#overlay").offset();
		$(".overlay").css("width",$("#overlay").width());
		$(".overlay").css("height",$("#overlay").height());
		$(".overlay").css(position);
		$("#new_loading").css("top",($("#overlay").height())/2);
		$("#new_loading").css("left",($("#overlay").width())/2);
	}
	$(".overlay").show();
}



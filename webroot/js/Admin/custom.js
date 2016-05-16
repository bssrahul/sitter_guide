var host = window.location.host;
var proto = window.location.protocol;
var ajax_url = proto+"//"+host+"/sitter_guide/"; 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/** ******  left menu  *********************** **/
$(function () {
	
	$('#sidebar-menu li ul').slideUp();
    $('#sidebar-menu li').removeClass('active');

    $('#sidebar-menu li').click(function () {
        if ($(this).is('.active')) {
            $(this).removeClass('active');
            $('ul', this).slideUp();
            $(this).removeClass('nv');
            $(this).addClass('vn');
        } else {
            $('#sidebar-menu li ul').slideUp();
            $(this).removeClass('vn');
            $(this).addClass('nv');
            $('ul', this).slideDown();
            $('#sidebar-menu li').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('#menu_toggle').click(function () {
        if ($('body').hasClass('nav-md')) {
            $('body').removeClass('nav-md');
            $('body').addClass('nav-sm');
            $('.left_col').removeClass('scroll-view');
            $('.left_col').removeAttr('style');
            $('.sidebar-footer').hide();

            if ($('#sidebar-menu li').hasClass('active')) {
                $('#sidebar-menu li.active').addClass('active-sm');
                $('#sidebar-menu li.active').removeClass('active');
            }
        } else {
            $('body').removeClass('nav-sm');
            $('body').addClass('nav-md');
            $('.sidebar-footer').show();

            if ($('#sidebar-menu li').hasClass('active-sm')) {
                $('#sidebar-menu li.active-sm').addClass('active');
                $('#sidebar-menu li.active-sm').removeClass('active-sm');
            }
        }
    });
});

/* Sidebar Menu active class */
$(function () {
    var url = window.location;
    $('#sidebar-menu a[href="' + url + '"]').parent('li').addClass('current-page');
    $('#sidebar-menu a').filter(function () {
        return this.href == url;
    }).parent('li').addClass('current-page').parent('ul').slideDown().parent().addClass('active');
});

/** ******  /left menu  *********************** **/



/** ******  tooltip  *********************** **/
$(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    /** ******  /tooltip  *********************** **/
    /** ******  progressbar  *********************** **/
if ($(".progress .progress-bar")[0]) {
    $('.progress .progress-bar').progressbar(); // bootstrap 3
}
/** ******  /progressbar  *********************** **/
/** ******  switchery  *********************** **/
if ($(".js-switch")[0]) {
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function (html) {
        var switchery = new Switchery(html, {
            color: '#26B99A'
        });
    });
}
/** ******  /switcher  *********************** **/
/** ******  collapse panel  *********************** **/
// Close ibox function
$('.close-link').click(function () {
    var content = $(this).closest('div.x_panel');
    content.remove();
});

// Collapse ibox function
$('.collapse-link').click(function () {
    var x_panel = $(this).closest('div.x_panel');
    var button = $(this).find('i');
    var content = x_panel.find('div.x_content');
    content.slideToggle(200);
    (x_panel.hasClass('fixed_height_390') ? x_panel.toggleClass('').toggleClass('fixed_height_390') : '');
    (x_panel.hasClass('fixed_height_320') ? x_panel.toggleClass('').toggleClass('fixed_height_320') : '');
    button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
    setTimeout(function () {
        x_panel.resize();
    }, 50);
});
/** ******  /collapse panel  *********************** **/
/** ******  iswitch  *********************** **/
if ($("input.flat")[0]) {
    $(document).ready(function () {
        $('input.flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
}
/** ******  /iswitch  *********************** **/
/** ******  star rating  *********************** **/
// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function ($, window) {
    var Starrr;

    Starrr = (function () {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function (e, value) {}
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'span', function (e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function () {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'span', function (e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function () {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function (rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function (rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function () {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function () {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function () {
    return $(".starrr").starrr();
});

$(document).ready(function () {

    $('#stars').on('starrr:change', function (e, value) {
        $('#count').html(value);
    });


    $('#stars-existing').on('starrr:change', function (e, value) {
        $('#count-existing').html(value);
    });

});
/** ******  /star rating  *********************** **/
/** ******  table  *********************** **/
$('table input').on('ifChecked', function () {
    check_state = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('table input').on('ifUnchecked', function () {
    check_state = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});

var check_state = '';
$('.bulk_action input').on('ifChecked', function () {
    check_state = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('.bulk_action input').on('ifUnchecked', function () {
    check_state = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
$('.bulk_action input#check-all').on('ifChecked', function () {
    check_state = 'check_all';
    countChecked();
});
$('.bulk_action input#check-all').on('ifUnchecked', function () {
    check_state = 'uncheck_all';
    countChecked();
});

function countChecked() {
        if (check_state == 'check_all') {
            $(".bulk_action input[name='table_records']").iCheck('check');
        }
        if (check_state == 'uncheck_all') {
            $(".bulk_action input[name='table_records']").iCheck('uncheck');
        }
        var n = $(".bulk_action input[name='table_records']:checked").length;
        if (n > 0) {
            $('.column-title').hide();
            $('.bulk-actions').show();
            $('.action-cnt').html(n + ' Records Selected');
        } else {
            $('.column-title').show();
            $('.bulk-actions').hide();
        }
    }
    /** ******  /table  *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******  Accordion  *********************** **/

$(function () {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

/** ******  Accordion  *********************** **/
/** ******  scrollview  *********************** **/
$(document).ready(function () {
  
	 $.validator.addMethod("nourl", 
      function(value, element) {
			return !/http\:\/\/|www\.|link\=|url\=/.test(value);
        
            }, 
         "Kindly provide valid url"
      );


		$(".scroll-view").niceScroll({
			touchbehavior: true,
			cursorcolor: "rgba(42, 63, 84, 0.35)"
		});



        //CODE SNIPPET FOR Add Choose Us
        $('#addChooseUs').validate({
            rules: {
                "HowWorks[category]":
                {
                    required: true
                }
            },
            messages: {             
                "HowWorks[category]":
                {
                    required : "Please select at least one Subscriber."
                }
            }
        });
        //CODE SNIPPET FOR SUBSCRIBER EMAIL
        $('#sendNewsForm').validate({
            rules: {
                "email[]":
                {
                    required: true
                }
            },
            messages: {             
                "email[]":
                {
                    required : "Please select at least one Subscriber."
                }
            }
        });
        //CODE SNIPPET FOR Add Patners
        $('#addpartners').validate({
            //alert("called");
            ignore: [],
            debug: false,
            //onclick: false,
            rules: {
                 "Partners[title]":
                {
                    required: true
                },
                "Partners[short_description]":
                {
                    required: true
                },
                "Partners[description]":
                {
                    required: true
                },
                "Partners[image]":
                {
                    required: true
                }
            },
            messages: { 
                "Partners[title]":
                {
                    required : "Title field is required."
                },
                 "Partners[short_description]":
                {
                    required : "Short description field is required."
                },
                "Partners[description]":
                {
                    required : "Description field is required."
                },
                "Partners[image]":
                {
                    required : "Image field is required."
                }
            }/*,
             errorPlacement: function (error, element) {
                   // alert(error.text());
            } */
        });
        //CODE SNIPPET FOR EDIT SLIDER
       $('#editslider').validate({
            ignore: [],
            debug: false,
            rules: {
                "Sliders[title]":
                {
                    required: true
                },
                 "Sliders[description]":
                {
                    required: true
                }
            },
            messages: {             
                "Sliders[title]":
                {
                    required : "Title field is required."
                },
                "Sliders[description]":
                {
                    required : "Description field is required."
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });


     //CODE SNIPPET FOR ADMIN CHANGE PASSWORD
       $('#changepassform').validate({
            ignore: [],
            debug: false,
            rules: {
                "Admin[current_password]":
                {
                    required: true,
                    minlength: '6'
                },
                "Admin[password]":
                {
                    required: true,
                    minlength: '6'
                },
                 "Admin[confirm_password]":
                {
                    required: true,
                    minlength: '6',
                    equalTo: '#admin-password'
                }
            },
            messages: {             
               "Admin[current_password]":
                {
                   required : "This field is required",
                   minlength: 'Please enter minimum 6 characters.'
                },
                "Admin[password]":
                {
                   required : "This field is required",
                   minlength: 'Please enter minimum 6 characters.'
                },
                "Admin[confirm_password]":
                {
                    required : "This field is required",
                    minlength: 'Please enter minimum 6 characters.',
                    equalTo: 'Password does not match'
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
 //CODE SNIPPET FOR ADMIN EDIT
       $('#profileform').validate({
            ignore: [],
            debug: false,
            rules: {
                "Admins[full_name]":
                {
                    required: true
                   
                },
                 "Admins[username]":
                {
                    required: true
                },
                 "Admins[email]":
                {
                    required: true,
                    email: true
                },
                 "SiteConfigurations[site_name]":
                {
                    required: true
                },
                 "SiteConfigurations[site_contact_email]":
                {
                    required: true,
                    email: true
                },
                 "SiteConfigurations[site_footer]":
                {
                    required: true
                },
                 "SiteConfigurations[meta_title]":
                {
                    required: true
                },
                 "SiteConfigurations[meta_keyword]":
                {
                    required: true
                },
                 "SiteConfigurations[meta_description]":
                {
                    required: true
                },
                 "SiteConfigurations[facebook_link]":
                {
                    required: true,
                    nourl: true
                },
                 "SiteConfigurations[twitter_link]":
                {
                    required: true,
					url: true,
                    nourl: true
                },
                 "SiteConfigurations[google_link]":
                {
                    required: true,
					url: true,
                    nourl: true
                },
                 "SiteConfigurations[linkedin_link]":
                {
                    required: true,
					url: true,
                    nourl: true
                },
                 "SiteConfigurations[instagram_link]":
                {
                    required: true,
					url: true,
                    nourl: true
                },
                 "SiteConfigurations[youtube_link]":
                {
                    required: true,
					url: true,
                    nourl: true
                },
                 "admin_img":
                {
                   accept: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF"
                },
                 "site_logo":
                {
                   accept: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF"
                },
                 "site_favicon":
                {
                   accept: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF"
                }
            },
            messages: {             
                "Admins[full_name]":
                {
                    required : "This field is required"
                },
                 "Admins[username]":
                {
                    required : "This field is required"
                },
                 "Admins[email]":
                {
                    required : "This field is required",
                    email: 'Kindly use valid email address'
                },
                 "SiteConfigurations[site_name]":
                {
                   required : "This field is required"
                },
                 "SiteConfigurations[site_contact_email]":
                {
                   required : "This field is required",
                   email: 'Kindly use valid email address'
                },
                 
                 "SiteConfigurations[site_footer]":
                {
                    required : "This field is required"
                },
                 "SiteConfigurations[meta_title]":
                {
                    required : "This field is required"
                },
                 "SiteConfigurations[meta_keyword]":
                {
                   required : "This field is required"
                },
                 "SiteConfigurations[meta_description]":
                {
                   required : "This field is required"
                },
                 "SiteConfigurations[facebook_link]":
                {
                    required : "This field is required"
                },
                 "SiteConfigurations[twitter_link]":
                {
                   required : "This field is required"
                },
                 "SiteConfigurations[google_link]":
                {
                    required : "This field is required"
                },
                 "SiteConfigurations[linkedin_link]":
                {
                    required : "This field is required"
                },
                 "SiteConfigurations[instagram_link]":
                {
                   required : "This field is required"
                },
                 "SiteConfigurations[youtube_link]":
                {
                    required : "This field is required"
                },
                 "admin_img":
                {
                   accept: "Only png, jpg, jpeg, gif files allowed"
                },
                 "site_logo":
                {
                   accept: "Only png, jpg, jpeg, gif files allowed"
                },
                 "site_favicon":
                {
                   accept: "Only png, jpg, jpeg, gif files allowed"
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
       //CODE SNIPPET FOR EDIT USER
       $('#edituser').validate({
            ignore: [],
            debug: false,
            rules: {
                "Users[first_name]":
                {
                    required: true
                },
                 "Users[last_name]":
                {
                    required: true
                },
                 "Users[gender]":
                {
                    required: true
                },
                 "Users[email]":
                {
                    required: true,
                    email: true
                },
                 "Users[phone]":
                {
                    required: true,
                    number:true,
                    minlength: '10',
                    maxlength: '10',
                    
                },
                "Users[zip]":
				{
					required:true,
					number:true,
										
				},
				"Users[country]":
				{
					required:true
				},
                 "Users[zone_id]":
                {
                    required: true
                },
				 "Users[image]":
                {
                   accept: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF"
                }
            },
            messages: {             
               "Users[first_name]":
                {
                    required : "This field is required"
                },
                 "Users[last_name]":
                {
                    required : "This field is required"
                },
                 "Users[gender]":
                {
                   required : "This field is required"
                },
                 "Users[email]":
                {
                    required : "This field is required",
                    email: 'Kindly use valid email address'
                },
                 "Users[phone]":
                {
					required : "This field is required",
					number : "Phone should be in numbers",
                    minlength: 'Phone number should be 10 in numbers',
                    maxlength: 'Phone number should be 10 in numbers'
                },
                "Users[zip]":
				{
					required : "This field is required",
					number:"Zip Code should be Numbers.",
				},
				"Users[country]":
				{
					required : "This field is required"
					
				},
                 "Users[zone_id]":
                {
                    required : "This field is required"
                },
				 "Users[image]":
                {
                   accept: "Only png, jpg, jpeg, gif files allowed"
                }
					 
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
  //CODE SNIPPET FOR CMS PAGE EDIT
       $('#cmspageedit').validate({
            ignore: [],
            debug: false,
            rules: {
                "CmsPages[pagename]":
                {
                    required: true
                },
				"CmsPages[pageheading]":
                {
                    required: true
                },
                 "CmsPages[pageurl]":
                {
                    required: true
                }/*,
                "pagecontent": {
                    required: function() 
                    {
                        CKEDITOR.instances.pagecontent.updateElement();
                    }
                }*/
            },
            messages: {             
                "CmsPages[pagename]":
                {
                    required : "This field is required."
                },
                "CmsPages[pageurl]":
                {
                    required : "This field is required."
                },
                "pagecontent":
                {
                    required : "This field is required."
                }
            },/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
            /*errorPlacement: function(error, element) 
                {
                    if (element.attr("name") == "pagecontent") 
                   {
                    error.insertBefore("textarea#pagecontent");
                    } else {
                    error.insertBefore(element);
                    }
                }*/
        });
//CODE SNIPPET FOR EMAIL TEMPLATE EDIT
       $('#templateedit').validate({
            ignore: [],
            debug: false,
            rules: {
                "EmailTemplates[title]":
                {
                    required: true
                },
                 "EmailTemplates[subject]":
                {
                    required: true
                },
                "EmailTemplates[allowed_vars]":
                {
                    required: true
                },
                 "EmailTemplates[email_from]":
                {
                    required: true,
                },
                "EmailTemplates[email_name]":
                {
                    required: true
                },
                "EmailTemplates[description]":
                {
                    required: true
                }
            },
            messages: {             
               "EmailTemplates[title]":
                {
                    required : "This field is required."
                },
                 "EmailTemplates[subject]":
                {
                   required : "This field is required."
                },
                "EmailTemplates[allowed_vars]":
                {
                    required : "This field is required."
                },
                 "EmailTemplates[email_from]":
                {
                    required : "This field is required."
                },
                "EmailTemplates[email_name]":
                {
                    required : "This field is required."
                },
                "EmailTemplates[description]":
                {
                    required : "This field is required."
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
       //CODE SNIPPET FOR Contact Reply
       $('#contactReply').validate({
            ignore: [],
            debug: false,
            rules: {
                "ContactRequests[email]":
                {
                    required: true,
                    email:true
                },
                 "ContactRequests[reply]":
                {
                    required: true
                }
            },
            messages: {             
                "ContactRequests[email]":
                {
                    required : "This field is required.",
                    email: 'Kindly use valid email address'
                },
                "ContactRequests[reply]":
                {
                    required : "This field is required."
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
       //CODE SNIPPET FOR Edit Works
       $('#editworks').validate({
            ignore: [],
            debug: false,
            rules: {
                "HowWorks[title]":
                {
                    required: true
                },
                 "HowWorks[description]":
                {
                    required: true
                }
            },
            messages: {             
                 "HowWorks[title]":
                {
                    required : "This field is required."
                },
                "HowWorks[description]":
                {
                    required : "This field is required."
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
       //CODE SNIPPET FOR Edit Blogs
       $('#editblog').validate({
            ignore: [],
            debug: false,
            rules: {
                "UserBlogs[description]":
                {
                    required: true
                },
				"UserBlogs[title]":
                {
                    required: true
                },
                 "UserBlogs[image]":
                {
                   accept: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF"
                }
            },
            messages: {             
                 "UserBlogs[description]":
                {
                    required : "This field is required."
                },
                 "UserBlogs[image]":
                {
                    accept : "Only png, gif, jpg files are allowed."
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
      
     //CODE SNIPPET FOR Add category
       $('#addcategory').validate({
            ignore: [],
            debug: false,
            rules: {
                "Categories[title]":
                {
                    required: true
                },
                "Categories[slug]":
                {
                    required: true
                },
				"Categories[description]":
                {
                    required: true
                },
				"Categories[image]":
                {
                   accept: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF"
                },
            },
            messages: {             
               "Categories[title]":
                {
                    required : "This field is required."
                },
                "Categories[slug]":
                {
                   required : "This field is required."
                },
				"Categories[description]":
                {
                    required : "This field is required."
                },
				"Categories[image]":
                {
                    accept : "Only png, gif, jpg files are allowed."
                },
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
	
	 //CODE SNIPPET FOR Edit category
       $('#editcategory').validate({
            ignore: [],
            debug: false,
            rules: {
                "Categories[title]":
                {
                    required: true
                },
                "Categories[slug]":
                {
                    required: true
                },
				"Categories[description]":
                {
                    required: true
                },
				"Categories[image]":
                {
                   accept: "png|PNG|jpg|JPG|jpeg|JPEG|gif|GIF"
                },
            },
            messages: {             
               "Categories[title]":
                {
                    required : "This field is required."
                },
                "Categories[slug]":
                {
                   required : "This field is required."
                },"Categories[description]":
                {
                    required : "This field is required."
                },
				"Categories[image]":
                {
                    accept : "Only png, gif, jpg files are allowed."
                },
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
     //CODE SNIPPET FOR UPDATE CURRENCY
       $('#updatecurrencies').validate({
            ignore: [],
            debug: false,
            rules: {
                "Currencies[1][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[2][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[3][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[4][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[5][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[6][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[7][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[8][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                },
                "Currencies[9][price][]":
                {
                    required: true,
                    number:true,
                    min:1
                }
                
            },
            messages: {             
               "Currencies[1][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                    
                },
                "Currencies[2][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                },
                "Currencies[3][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                },
                "Currencies[4][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                },
                "Currencies[5][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                },
                "Currencies[6][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                },
                "Currencies[7][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                },
                "Currencies[8][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                },
                "Currencies[9][price][]":
                {
                    required: "This field is required",
                    number:"Price should be in number",
                    min:"Price should be greater than 1"
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
        
          
        
        //CODE SNIPPET FOR PROMOCODE
       $('#editpromocode').validate({
            ignore: [],
            debug: false,
            rules: {
                "PromoCodes[promo_code]":
                {
                    required: true,
                },
                "PromoCodes[coupon_type]":
                {
                    required: true,
                },
                "PromoCodes[start_date]":
                {
                    required: true,
                },
                "PromoCodes[end_date]":
                {
                    required: true,
                },
                "PromoCodes[discount_rate]":
                {
                    required: true,
                    number:true,
                    min:1,
                }
                
            },
            messages: {             
                "PromoCodes[promo_code]":
                {
                    required: "This field is required",
                },
                "PromoCodes[coupon_type]":
                {
                    required: "This field is required",
                },
                "PromoCodes[discount_rate]":
                {
                    required: "This field is required",
                    number:"Discounted value should be in numbers",
                    min:"Discounted value should be greater then 0",
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
        
       $('#addpromocode').validate({
            ignore: [],
            debug: false,
            rules: {
                "PromoCodes[promo_code]":
                {
                    required: true,
                },
                "PromoCodes[coupon_type]":
                {
                    required: true,
                },
                "PromoCodes[start_date]":
                {
                    required: true,
                },
                "PromoCodes[end_date]":
                {
                    required: true,
                },
                "PromoCodes[discounted_coupon]":
                {
                    required: true,
                    number:true,
                    min:1,
                    max:100
                },
                "PromoCodes[fixed_coupon]":
                {
                    required: true,
                    number:true,
                    min:1
                }
                
            },
            messages: {             
                "PromoCodes[promo_code]":
                {
                    required: "This field is required",
                },
                "PromoCodes[coupon_type]":
                {
                    required: "This field is required",
                },
                "PromoCodes[discounted_coupon]":
                {
                    required: "This field is required",
                    number:"Discounted value should be in numbers",
                    min:"Discounted value should be greater then 0",
                    max:"Discounted value should be less then 100"
                },
                "PromoCodes[fixed_coupon]":
                {
                    required: "This field is required",
                    number:"Discount rate should be in numbers",
                    min:"Discount rate should be greater then 0"
                }
            }/*,
             errorPlacement: function (error, element) {
                    alert(error.text());
            } */
        });
});

$(document).ready(function(){
	$('div.success, div.error').on('click',function(){
			//$(this).slideUp(1000); 
	});
	setInterval(function() {
	
	  // $('div.success, div.error').slideUp();
	}, 5000);
	
	
	setInterval(function() {
	
	   $('div.error_msg').slideUp();
	}, 5000);
	
	
	setInterval(function() {
		$.ajax({
			url: ajax_url+"users/routineCheckup",//AJAX URL WHERE THE LOGIC HAS BUILD
			success:function(res)
			{
				var response = res.split(':');
				if($.trim(response[0]) == 'Success'){
					setTimeout(function(){window.location.href = ajax_url+"/users/login";},2000);
				}
			}
		});
	}, 5000);
});
/** ******  /scrollview  *********************** **/

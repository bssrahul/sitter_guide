<!--[Inner Content]-->
<section class="inner-cont"> 
	
  <!--[Search result page]-->
    <?php echo $this->element('frontElements/Search/search_filters'); ?>

  <!--[Search result page]--> 
  <!--[Search result Listing]-->
  <div class='searchRes'>
		
  <?php echo $this->element('frontElements/Search/search_results'); ?>  
  </div>
  <!--[/Search result Listing]--> 
  
</section>
<style>

.search-overlay .search-img {
    position: relative;
    top: 100px;
}
.search-overlay {
    background: #fff none repeat scroll 0 0;
    display: block;
    left: 0;
    min-height: 100%;
    position: relative;
    text-align: center;
    top: 0;
    transition: all 0.3s ease 0s;
    width: 100%;
    z-index: 1002;
}

.sl-map{
	height:768px;
}
.leftsidebarfixed {
    position: sticky;
    top: 50px !important;
    right:59px;
}

</style>

<!--[Inner Content]-->  
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
    
$(function () {
  
  var msie6 = $.browser == 'msie' && $.browser.version < 7;
  
  if (!msie6 && $('.leftsidebar').offset()!=null) {
    var top = $('.leftsidebar').offset().top - parseFloat($('.leftsidebar').css('margin-top').replace(/auto/, 0));
	var height = $('.leftsidebar').height();
	var winHeight = $(window).height();	
	var footerTop = $('#footer').offset().top - parseFloat($('#footer').css('margin-top').replace(/auto/, 0));
	var gap = 7;

	console.log('top:'+top+'--height:'+height+'--winHeight:'+winHeight+'--FooterTop:'+footerTop+'--gap:'+gap);
    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();
      console.log('top:'+top+'--height:'+height+'--winHeight:'+winHeight+'--FooterTop:'+footerTop+'--gap:'+gap);

      // whether that's below the form
      if (y+winHeight >= top+height-y && y+winHeight<=footerTop) {

        // if so, ad the fixed class
        $('.leftsidebar').addClass('leftsidebarfixed').css('top',winHeight-height-gap +'px');
      } 
	  else if (y+winHeight>footerTop) {

        // if so, ad the fixed class
       $('.leftsidebar').addClass('leftsidebarfixed').css('top',footerTop-height-y-gap+'px');
      } 
	  else 	  
	  {
        // otherwise remove it
        $('.leftsidebar').removeClass('leftsidebarfixed').css('top','0px');
      }
    });
  }  
});
</script>

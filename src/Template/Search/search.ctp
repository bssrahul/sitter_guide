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


</style>

<!--[Inner Content]-->  
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

    /*function init() {
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
    }*/
    window.onload = init();
    

</script>

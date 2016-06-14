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
</style>
<!--[Inner Content]-->  

<!--[Inner Content]-->
<section class="inner-cont"> 
<span class="search-overlay"></span>	
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
.search-overlay {
  background: #fff none repeat scroll 0 0;
  height: 100%;
  left: 0;
  position: fixed;
  top: 0;
  transition: all 0.3s ease 0s;
  width: 100%;
  z-index: 1000;
  text-align:center;
  display:none;
}
.search-img {
    position: relative;
    top: 300px;
}
</style>
<!--[Inner Content]-->  

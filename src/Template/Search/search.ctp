<?php echo $this->Html->css(['Front/jquery-ui.css','Front/search-result.css']);  ?>
<?php echo $this->Html->script(['Front/jquery-ui.js','Front/search-filter.js']);  ?>
<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true'); ?>

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
  background: rgba(0, 0, 0, 0.9) none repeat scroll 0 0;
  height: 100%;
  left: 0;
  opacity: 0.5;
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

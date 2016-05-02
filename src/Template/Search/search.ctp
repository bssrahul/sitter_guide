<?php echo $this->Html->css(['Front/jquery-ui.css','Front/search-result.css']);  ?>
<?php echo $this->Html->script(['Front/jquery-ui.js','Front/search-filter.js']);  ?>


<!--[Inner Content]-->
<section class="inner-cont"> 
  <!--[Search result page]-->
    <?php echo $this->element('frontElements/Search/search_filters'); ?>

  <!--[Search result page]--> 
  <!--[Search result Listing]-->
  <?php echo $this->element('frontElements/Search/search_results'); ?>  
  <!--[/Search result Listing]--> 
  
</section>
<!--[Inner Content]-->  
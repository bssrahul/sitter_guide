	<?php $nextSlider = rand(5,15); ?>
	<script>
	$(function(){
		$('.customCrousalNext<?php echo $nextSlider; ?>').carousel({
		   interval: false
	    }); 
	})
	</script>	
	<?php //$sub_galleries_result=$results->user_sitter_galleries; 
	//if(!empty(@$sub_galleries_result)){ ?>
	<div class="quick-slide">                	
	<div id="myCarousel3" class="carousel slide getImg<?php echo @$results->id; ?> customCrousalNext<?php echo $nextSlider; ?>" data-ride="carousel">
	<div class="carousel-inner" role="listbox" id="show_sitter_images">
		
	<!-- <div class="item active">
		<div class="row">      
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		</div>                  
	  </div>
	  <div class="item">
		<div class="row">      
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		</div>  
	  </div>
	  
	  <div class="item">
		<div class="row">      
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
		  </div>
		</div>  
	  </div>-->
	  
	</div>
	<!-- Left and right controls -->
	<a class="left carousel-control" href=".customCrousalNext<?php echo $nextSlider; ?>" role="button" data-slide="prev">
	  <span class="fa fa-chevron-left" aria-hidden="true">
	  </span>
	  <span class="sr-only"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?>
	  </span>
	</a>
	<a class="right carousel-control" href=".customCrousalNext<?php echo $nextSlider; ?>" role="button" data-slide="next">
	  <span class="fa fa-chevron-right" aria-hidden="true">
	  </span>
	  <span class="sr-only"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Next')); ?>
	  </span>
	</a>
	</div>               	 
	</div>
	<!--End quick slide-->

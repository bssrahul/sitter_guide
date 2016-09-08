 <div class="padtt-20">
	  <h4 class="popularpost"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Category Tags')); ?>
	  </h4> 
	</div>
	<div class="btgs">
	  <a href="<?php echo HTTP_ROOT.'blog-listing'; ?>">
		<span class="label label-info"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitters')); ?> &amp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Guests')); ?>
		</span>
	  </a>
	  <a href="<?php echo HTTP_ROOT.'blog-listing/timeout'; ?>">
		<span class="label label-info"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Time Out')); ?>
		</span>
	  </a>
	  <a href="<?php echo HTTP_ROOT.'blog-listing/news_desk'; ?>">
		<span class="label label-info"><?php echo $this->requestAction('app/get-translate/'.base64_encode('News Desk')); ?>
		</span>
	  </a>
	  <a href="<?php echo HTTP_ROOT.'blog-listing/event'; ?>">
		<span class="label label-info"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Events')); ?>
		</span>
	  </a>
	</div>   
          

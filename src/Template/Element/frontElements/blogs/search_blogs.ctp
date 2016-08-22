<h4 class="popularpost"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Search')); ?></h4>

<div class="padtt-20">
  <input placeholder="<?php echo $this->requestAction('app/get-translate/'.base64_encode('Search')); ?>..." class="form-control">
</div>

<div class="searchby">
  <div class="media">
	<div class="media-left mw75">
	  <small><?php echo $this->requestAction('app/get-translate/'.base64_encode('Search by')); ?> :
	  </small>
	</div>
	<div class="media-body">
	  <ul class="list-inline">
		<li>
		  <a href="#"> 
			<small><?php echo $this->requestAction('app/get-translate/'.base64_encode('post date')); ?>,
			</small> 
		  </a>
		</li>
		<li> 
		  <a href="#">
			<small><?php echo $this->requestAction('app/get-translate/'.base64_encode('topic (category)')); ?>,
			</small>
		  </a>
		</li>
		<li> 
		  <a href="#">
			<small><?php echo $this->requestAction('app/get-translate/'.base64_encode('keyword')); ?>,
			</small>
		  </a>
		</li>
		<li> 
		  <a href="#">
			<small><?php echo $this->requestAction('app/get-translate/'.base64_encode('author')); ?>
			</small>
		  </a>
		</li>
	  </ul>
	</div>
  </div>
</div>
            

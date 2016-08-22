<div class="blog-b-searchdrop">
					  
  <form class="form-horizontal"> 
	<div class="form-group mbt0px"> 
	  <label for="inputEmail3" class="col-xs-4 control-label"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Filter by')); ?> :
	  </label> 
	  <div class="col-xs-8 "> 
		<div>
		  <select id="filterbycategory" class="form-control">
			<option <?php if(@$category=='all'){ echo "selected='selected'"; } ?> value="all"><?php echo $this->requestAction('app/get-translate/'.base64_encode('All')); ?>
			</option>
			<option <?php if(@$category=='sitter_guest'){ echo "selected='selected'"; } ?> value="sitter_guest"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitters')); ?> &amp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Guests')); ?>
			</option>
			<option <?php if(@$category=='timeout'){ echo "selected='selected'"; } ?> value="timeout"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Time Out')); ?>
			</option>
			<option <?php if(@$category=='news_desk'){ echo "selected='selected'"; } ?> value="news_desk"><?php echo $this->requestAction('app/get-translate/'.base64_encode('News Desk')); ?>
			</option>
			<option <?php if(@$category=='event'){ echo "selected='selected'"; } ?> value="event"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Events')); ?>
			</option>
		  </select> 
		</div> 
	  </div> 
	</div>    
 
  </form>

</div>
<script>
$(function(){
	$("#filterbycategory").change(function(){
		window.location.href="<?php echo HTTP_ROOT; ?>blog-listing/"+$(this).val();
	});	
});
</script>

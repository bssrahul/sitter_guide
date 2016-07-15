<div class="blog-b-searchdrop">
					  
  <form class="form-horizontal"> 
	<div class="form-group mbt0px"> 
	  <label for="inputEmail3" class="col-xs-4 control-label">Filter by :
	  </label> 
	  <div class="col-xs-8 "> 
		<div>
		  <select id="filterbycategory" class="form-control">
			<option <?php if(@$category=='all'){ echo "selected='selected'"; } ?> value="all">All
			</option>
			<option <?php if(@$category=='sitter_guest'){ echo "selected='selected'"; } ?> value="sitter_guest">Sitters &amp; Guests
			</option>
			<option <?php if(@$category=='timeout'){ echo "selected='selected'"; } ?> value="timeout">Time Out
			</option>
			<option <?php if(@$category=='news_desk'){ echo "selected='selected'"; } ?> value="news_desk">News Desk
			</option>
			<option <?php if(@$category=='event'){ echo "selected='selected'"; } ?> value="event">Events
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

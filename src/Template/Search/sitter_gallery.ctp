<div class="item active">
	  <div class="row"> 
 <?php 
	$img =1;
	if(!empty($sitter_gallery)){
	 foreach($sitter_gallery as $single_img){
			?>
			  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<li>
				  <img src="<?php echo HTTP_ROOT.'img/uploads/'.$single_img; ?>" width="200" height="200" alt="">
				</li>
			  </div>
		 <?php
			if($img%3==0){
				if(count($sitter_gallery) == $img){
				   echo '</div></div>';
				}else{
				   echo '</div></div><div class="item"><div class="row">';
				}
			}
		$img++;
	} 
  }else{ ?>
	    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<li>
			  <img src="<?php echo HTTP_ROOT.'img/uploads/prof_photo.png'; ?>" width="200" height="200" alt="">
			</li>
	    </div>
<?php }
?>
	</div>
</div>


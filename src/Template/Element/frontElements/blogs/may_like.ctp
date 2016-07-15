<?php 
if(count($you_may_also_like) > 0){
	foreach($you_may_also_like as $u_m_a_l_blogs){
	?>	
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
	  <div class="yo-may-wrapper">
		<div>
			<a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($u_m_a_l_blogs['id'])); ?>"><img style="max-height:155px"  src="<?php echo HTTP_ROOT.'img/uploads/'.$u_m_a_l_blogs['image']; ?>" class="img-responsive"/></a>
		</div>
		<a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($u_m_a_l_blogs['id'])); ?>"><h6 class="blogb-head"><?php echo $u_m_a_l_blogs['title']; ?></a>
		</h6>
	  </div>
	</div>
<?php }
} 
?>	
   
	
     


<div class="padtt-20">
	<h4 class="popularpost">Recent Articles</h4> 
</div>
        
<div class="recent-article-wrap">
  <div class="container-fluid">
	<ul class="list-unstyled">
	
	  
	  <?php 
		if(!empty($latest__blogs_info)){
			foreach($latest__blogs_info as $l_blogs){
			?>	
				<li>
					<a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($l_blogs['id'])); ?>">
						<div class="row">
				
							<div class="col-xs-12 col-sm-12  "><h5 class="recent-b-head"><?php echo $l_blogs['title']; ?></h5>

							<p class="recent-b-text"><?php echo limit_text($l_blogs['description'],15); ?></p>

						</div>

					</div> 
				
					</a>
				</li>
					
				

				
			<?php	
			}
	?>
	<?php 	
		}else{
	?>
		<li>
			<div class="row">
				<div class="col-xs-12 col-sm-12 plft0 ">
					<h5 class="recent-b-head">No Records Found</h5>
				</div>
			</div> 
			
		</li>	 
	<?php		
		}
	?>
	 
	</ul>
  </div>
</div>
         

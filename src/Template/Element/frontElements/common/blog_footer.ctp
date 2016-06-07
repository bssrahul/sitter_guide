 <!--[Fun News]-->
    	<section class="fun-news">
			<?php if(!empty($servicesInfo)){ ?>
				<div class="fn-bot">
					<ul>  
						<?php 
							foreach($servicesInfo as $single_services){ 
								if($single_services->image !=''){
									$services_img = HTTP_ROOT.'img/uploads/services/'.$single_services->image;
								}else{
									$services_img = HTTP_ROOT.'img/default-pet-sitter.jpg';	
								}	
						?>
						<li>     	
							<div class="fn-outer">
								 <div class="img-box">		                    	
									<img src="<?php echo $services_img; ?>"  alt="" />         	                
								 </div>   
								<div class="ho-box">
									<div class="hb-inner">
										<p class="txt-head"><?php echo $single_services->title; ?></p>
											<p><?php echo $single_services->description; ?></p>
											<a href="<?php echo HTTP_ROOT.$single_services->read_more_url; ?>" title="Read More" class="btn-2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?>  <i class="fa fa-chevron-circle-right"></i> </a>
									</div>                            	
								</div>
							 </div>                   
						</li>
						<?php } ?>
					</ul>        
				</div>     	
				<?php } ?>
		</section>

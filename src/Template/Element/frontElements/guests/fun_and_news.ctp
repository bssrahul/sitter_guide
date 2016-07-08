	<!--[Fun News]-->
    	<section class="fun-news">
             
        	<div class="container">
				<?php if(!empty($blogsInfo)){ ?>
            	<div class="fn-area"> 
                	<!--heading--> 
                	<div class="head-box">
                    	<h4> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Fun & News')); ?> </h4>
                        	<p> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Find some of the funniest pet pics & videos along with news updates here')); ?> </p>
                            <span class="head-bot"><b></b></span>
                    </div>                           	
					<!--/heading--> 
                	<div class="fnb-area">
                    	<?php 
							foreach($blogsInfo as $single_blog){ 
						?>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div style="min-height:420px" class="fnb-outer">
									<div class="imgb-area">
										<div class="date">
											<p><?php echo __( date("l jS M Y", strtotime($single_blog->created_date))); ?></p>
										</div>
										<div class="img">
											<img src="<?php echo HTTP_ROOT.'img/uploads/'.$single_blog->image; ?>" width="937" height="527" alt=""> 
										</div>                                  
									</div>
									
									<div class="p-area">
								
										<ul>
											
										</ul> 
										<div class="p-img">
										  
											  
										</div>
										<h5 class="recent-b-head"><?php echo $single_blog->title; ?></h5>									
										<!--<p class="txt-head"><?php echo $single_blog->title; ?></p>-->
										<p><?php 
												$text = $single_blog->description;
												$limit = 30; 
												if(str_word_count($text, 0) > $limit)
												{ 
													$words = str_word_count($text, 2); 
													$pos = array_keys($words); 
													echo $text = substr($text, 0, $pos[$limit]) . '...';
												}  
											?> 
										</p>                                                                  
										<a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($single_blog->id)); ?>" title="Read More" class="btn-1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?> <i class="fa fa-chevron-circle-right"></i></a>
									</div>
									
								</div>
							</div>
						<?php 
							} 
						?>
                                               
                    </div>                               	
                    
                </div>
                <?php } ?> 
                
                 <div class="bot-btn-area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="<?php echo HTTP_ROOT.'blog-listing'; ?>"  title="" class="bot-more"><?php echo $this->requestAction('app/get-translate/'.base64_encode('More News & Updates')); ?></a>
                        </div>
                    </div>
                    </div>
				</div>  
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
		<!--[Fun News]--> 

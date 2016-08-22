
 <section class="news-wrap">
  <?php  if(empty($blogs_info)){?><div class="col-md-3 col-md-offset-5"><h4><?php echo $this->requestAction('app/get-translate/'.base64_encode("Record Not Found"));?><h4></div> <?php	 }
		else{	
			 foreach($blogs_info as $blog_info) { ?>
						<div class="container">
							<div class="row privacy-top">
							</div>
							<div class="row">
								<div class=" col-lg-12 col-md-12 col-xs-12 col-xs-12">								
										<div class="row">
                                        	<div class="news-outer">
											<div id="news">
												<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
                                                	<div class="news-lft">													
                                                       <img src="<?php echo HTTP_ROOT.'img/uploads/'.($blog_info->image != ''?$blog_info->image:'dummy.jpg'	); ?>" class="img-responsive" alt="logo">
                                                    </div>   
													 
												</div>																	
												<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                <div class="news-rgt">													
														<h4><?php echo $blog_info->title; ?></h4>
														<h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Modified Date:')); ?>  
														<span><?php echo date("F  j,Y",strtotime($blog_info->modified_date)); ?></span></h5>
														<p class="text-justify">
														<?php $string=$blog_info->description;
														echo $descdata=substr($string,0,250).'...';	?></p>
														<a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($blog_info->id)); ?>"><button class="btn btn-success news-btn"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read more')); ?></button></a>                                                       
                                                   </div>
												</div>
											</div>
                                            </div>
															
										</div>
									</div>
								</div>
							</div>
						</div>
			<?php } } ?>
    
    </section>
	
	

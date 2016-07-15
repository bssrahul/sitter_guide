
 <section>
  <?php  if(empty($blogs_info)){?><div class="col-md-3 col-md-offset-5"><h4><?php echo "Record Not Found";?><h4></div> <?php	 }
		else{	
			 foreach($blogs_info as $blog_info) { ?>
						<div class="container">
							<div class="row privacy-top">
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="news-box" >
										<div class="row grid-divider">
											<div id="news">
												<div class="col-xs-12 col-md-3 padding-right0px bord-right1px">
													<div class="news-dummy-logo"><img src="<?php echo HTTP_ROOT.'img/uploads/'.($blog_info->image != ''?$blog_info->image:'dummy.jpg'	); ?>" class="img-responsive text-center center-block" alt="logo">
													</div>
												</div>
																	
												<div class="col-xs-12 padding-right0px col-md-9">
													<div class="box-lr-padd">
														<h4><?php echo $blog_info->title; ?></h4>
														<h5><?php echo $this->requestAction('users/get-translate/'.base64_encode('Modified Date:')); ?>  
														<span><?php echo date("F  j,Y",strtotime($blog_info->modified_date)); ?></span></h5>
														<p class="text-justify">
														<?php $string=$blog_info->description;
														echo $descdata=substr($string,0,250).'...';	?></p>
														<a href="news-detail"><button class="btn readmorebtn"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Read more')); ?></button></a>
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
	
	
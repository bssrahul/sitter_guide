<?php if($this->request->action=='help' || $this->request->action=='helpListing' || $this->request->action=='helpSearchListing'){?>
	
	<!--[Banner Area Start]-->


					<div class="help-ban-wrap">
						<div class="outer">
								<div class="inner">
									<div class="container">
										<div class="row">
											<div class="col-xs-12">
												<form action="<?php echo HTTP_ROOT."help-search-listing";?>" method="post">
													<div class="input-group help-input">
															
																<input type="text" name="search" class="form-control" placeholder="Enter your search terms"  value="<?php if(!empty($search)){echo $search ;}?>">
																<input type="hidden" name="cat_id" class="form-control" value="<?php if(!empty($cat_id)){echo $cat_id ;}?>">
																<input type="hidden" name="type_id" class="form-control" value="<?php if(!empty($type_id)){echo $type_id ;}?>">
																<span class="input-group-btn">
																	<button class="btn btn-default" type="submit" ><img src="images/help-search.png"  alt="search"></button>
																</span>
															
													</div><!-- /input-group -->
											</form>
												<div class="text-center">
													<p><b>Popular Topics  :</b>  <span>Getting started,</span> <span>How taxes works,</span> <span>Payments,</span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
<!--[Banner Area End]-->
	
	
	
<?php }else{ ?>
	
		<!--[Banner Area Start]-->
		<section class="banner-area-terms" style="background-image:url('<?php echo HTTP_ROOT.'img/uploads/'.($CmsPageData->banner_image != ''?$CmsPageData->banner_image:'default_banner.jpg'); ?>')">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="text-center"><?php echo isset($CmsPageData->pagename)?$CmsPageData->pagename:$this->requestAction('app/get-translate/'.base64_encode('Content not added yet')); ?></h3>
						<p><?php echo isset($CmsPageData->pageheading)?$CmsPageData->pageheading:$this->requestAction('app/get-translate/'.base64_encode('Content not added yet'));; ?></p>
					</div>
				</div>
			</div>
		</section>
		<!--[Banner Area End]-->
	
	
<?php } ?>


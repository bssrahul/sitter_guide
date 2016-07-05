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
																	<button class="btn btn-default" type="submit" ><img src="<?php echo HTTP_ROOT; ?>img/help-search.png"  alt="search"></button>
																</span>
															
													</div><!-- /input-group -->
											</form>
												<div class="text-center">
													<p>
														<b>
															<?php echo $this->requestAction('app/get-translate/'.base64_encode('Popular Topics')); ?> :
														</b>  
														<span>
															<?php echo $this->requestAction('app/get-translate/'.base64_encode('Getting started')); ?>,
														</span> 
														<span>
															<?php echo $this->requestAction('app/get-translate/'.base64_encode('How taxes works')); ?>,
														</span> 
														<span>
															<?php echo $this->requestAction('app/get-translate/'.base64_encode('Payments')); ?>,
														</span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
<!--[Banner Area End]-->
	
	
	
<?php }else if($this->request->action=='becomeASitter'){ ?>
<section class="becomesitter-banner" style="background-image:url('<?php echo HTTP_ROOT.'img/uploads/'.($CmsPageData->banner_image != ''?$CmsPageData->banner_image:'default_banner.jpg'); ?>')"> 
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
        
        <h3 class="refer-big-text"><?php echo isset($CmsPageData->pagename)?$CmsPageData->pagename:$this->requestAction('app/get-translate/'.base64_encode('Content not added yet')); ?></h3>
        
        <p class="refer-text-small"><?php echo isset($CmsPageData->pageheading)?$CmsPageData->pageheading:$this->requestAction('app/get-translate/'.base64_encode('Content not added yet')); ?>
        </p>
        <div class="center-block text-center">
          
          <a href="<?php echo HTTP_ROOT.'guests/signup'; ?>">
			<button class="btn btn-bsitter"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Apply Now')); ?></button>
          </a>
          
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
      </div>
    </div>
  </div>
</section>
<?php }else{ ?>
	
		<!--[Banner Area Start]-->
		<section class="banner-area-terms" style="background-image:url('<?php echo HTTP_ROOT.'img/uploads/'.($CmsPageData->banner_image != ''?$CmsPageData->banner_image:'default_banner.jpg'); ?>')">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="text-center"><?php echo isset($CmsPageData->pagename)?$CmsPageData->pagename:$this->requestAction('app/get-translate/'.base64_encode('Content not added yet')); ?></h3>
						<p><?php echo isset($CmsPageData->pageheading)?$CmsPageData->pageheading:$this->requestAction('app/get-translate/'.base64_encode('Content not added yet')); ?></p>
					</div>
				</div>
			</div>
		</section>
		<!--[Banner Area End]-->
	
	
<?php } ?>


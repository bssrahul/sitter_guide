<?php if($CmsPageData->pageurl=="house-rules" || $CmsPageData->pageurl=="benefits"){ ?>
	<section id="benefits-content">
		<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
	</section>
<?php }else{ ?>
	
	<section>
		<div class="container">
			<div class="row privacy-top"></div>
		
		<!-- Get in Touch starts-->
		<?php if($CmsPageData->pageurl=="safety"){ ?>
				<div id="<?php echo $CmsPageData->pageurl; ?>">
					<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
				<div>
		<?php }else if($CmsPageData->pageurl=="about-us"){ ?>
				
					<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
				
			
			 <?php }else{ ?>
				<div id="privacy">
	   
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div class="outer-one box-marg">
								<p class="text-right"><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Updated')); ?> <b><?php echo isset($CmsPageData->created)?date("F j, Y",strtotime($CmsPageData->created)):date("F j, Y"); ?></b>.</span></p>
							</div> 
							
							<div class="outer-one ">
							<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
							</div>
						</div>
					</div>
				</div>	
		<?php } ?>
			</div>
		</div>
	</section>
		

<?php } ?>

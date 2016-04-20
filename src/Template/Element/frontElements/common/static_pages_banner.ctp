<!--[Banner Area Start]-->
<section class="banner-area-terms" style="background-image:url('<?php echo HTTP_ROOT.'img/uploads/'.($CmsPageData->banner_image != ''?$CmsPageData->banner_image:'prof_photo.png'); ?>')">
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

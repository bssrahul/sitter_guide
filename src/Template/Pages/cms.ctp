
	<!-- Get in Touch starts-->
    <section>
		<div class="container">
			<div class="row privacy-top"></div>
      
			<div id="privacy">
   
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="outer-one box-marg">
							<p class="text-right"><span>Last Updated <b><?php echo isset($CmsPageData->created)?date("F j, Y",strtotime($CmsPageData->created)):date("F j, Y"); ?></b>.</span></p>
						</div> 
						
						<div class="outer-one ">
						<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
						</div>
					</div>
    			</div>
    			
    			
			</div>
		</div>
   </section>
    

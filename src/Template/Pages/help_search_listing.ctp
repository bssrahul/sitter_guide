<section class="tab-section1" >
		<div class="container">
			<div class="help-listing1">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<h2 class="pt22"><?php if(!empty($title)){echo $title;}?></h2>
						<?php  if(empty($faqsData)){?><div class="col-md-3 col-md-offset-5"><h4><?php echo "Record Not Found";?><h4></div> <?php	 }
							else{
									$count=1;
									foreach($faqsData as $faqs) { ?>
										
																									
															<div>
																	<h3><?php echo $count++.".      ".$faqs->question;?></h3>
																	<p class="text-justify" >	<?php echo $faqs->answer;?>	</p>
																										 
															</div>
													<?php	
													
												}
								}?>
					</div>
    			</div>
			</div>
       </div>
</section>

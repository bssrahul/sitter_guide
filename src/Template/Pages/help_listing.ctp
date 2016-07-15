<section class="tab-section1" >
		<div class="container">
			<div class="help-listing1">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<?php  if(empty($categoriesData)){?><div class="col-md-3 col-md-offset-5"><h4><?php echo "Record Not Found";?><h4></div> <?php	 }
							else{	$count=1;
									foreach($categoriesData as $categoryData) { 
										?><h2 class="pt22"><?php echo $categoryData->title;?></h2>	<?php
											if(empty($questionData)){ 
												
												if(is_array($categoryData->faqs)){ 
													foreach($categoryData->faqs as $categoryQue) { 
														
															?>
															
															<div>
																	<h3><?php echo $count++.".      ".$categoryQue->question;?></h3>
																	<p class="text-justify" >	<?php echo $categoryQue->answer;?>	</p>
																										 
															</div>
													<?php	
													
												}
											}
										}else{
													//pr($questionData);die;
													foreach($questionData as $categoryQue) { 
													//pr($categoryQue);die;	
															?>
															
															<div>
																	<h3><?php echo $count++.".      ".$categoryQue->question;?></h3>
																	<p class="text-justify" >	<?php echo $categoryQue->answer;?>	</p>
																										 
															</div>
													<?php	
													
												}
											
											} 
									}
								}?>
					</div>
    			</div>
			</div>
       </div>
</section>

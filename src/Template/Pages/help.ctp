<section class="tab-section" >
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-lg-2 col-sm-3 col-xs-12 help-icon-tab">
				 <ul class="nav  nav-pills nav-stacked">              
					   <li class="active"> <a data-toggle="pill" href="#menu2"  class="first"  ><span><i class="hidden-xs"></i></span></a></li>
						<li><a data-toggle="pill" href="#menu3" class="second" ><span><i class="hidden-xs"></i></span></a></li>
			    </ul>
			</div>
			<div class="col-md-9 col-md-offset-1 col-lg-9 col-lg-offset-1 col-sm-9 col-xs-12 mid-section">
				<div class="tab-content">
					<?php  if(empty($categoriesData)){?><div class="col-md-3 col-md-offset-5"><h4><?php echo "Record Not Found";?><h4></div> <?php	 }
							else{	
									foreach($categoriesData as $categoryData) { ?>
										<div id="menu2" class="tab-pane fade in active">
											<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
												<h5 class="pt22"><span><?php echo $categoryData->title;?></span></h5>
												<ul class=" list-unstyled tab-text">
													<?php 
													if(is_array($categoryData->faqs)){ 
															foreach($categoryData->faqs as $categoryQue) { ?>
																<li><?php echo $categoryQue->question;?></li>
																
															<?php } ?>
																										
													<?php }  ?>
													<li class="pad-bottom10"><a href="#" class="color-green"><b>See all articles</b></a></li>
												</ul>
											</div>             
										</div>
							<?php } } ?>
				</div>
			</div>
			<hr class="hr-pd" />
			<div class="container">
				<div class="row">
					<div class="col-xs-12  col-sm-12  col-md-12col-lg-12">
							<h2 class="text-center help-looking-title">Looking for something else ?</h2>
							<ul class="list-inline center-block text-center">
								<li><button class="btn help-view-btn">View all Articles</button></li>
								<li><button class="btn help-contact-btn">Contact Support</button></li>
							</ul>
							<h3 class="text-center"><span class="helpqa"><a href="#" class="helpqa">Q & A Community</a></span></h3>
					</div>
				</div>
			</div>
    </section>
    
    
    
    <!-- Get in Touch ends-->
    

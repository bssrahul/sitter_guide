<section class="tab-section" >
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-lg-2 col-sm-3 col-xs-12 help-icon-tab">
				 <ul class="nav  nav-pills nav-stacked">              
					   
					   <li class="active"> 
						   <a data-toggle="pill" href="#menu2"  class="first"  >
								<span><i class="hidden-xs"></i></span>
						   </a>
						</li>
						
						<li>
							<a data-toggle="pill" href="#menu3" class="second" >
								<span><i class="hidden-xs"></i></span>
							</a>
						</li>
			    </ul>
			</div>
			<div class="col-md-9 col-md-offset-1 col-lg-9 col-lg-offset-1 col-sm-9 col-xs-12 mid-section">
				<div class="tab-content">
					
					<!-- For Show Guide Question-->
					<?php  if(empty($guest)){?><div class="col-md-3 col-md-offset-5"><h4><?php echo "Record Not Found";?><h4></div> <?php	 }
							else{ //pr($guest);die;?>
										
								<div id="menu2"  class="tab-pane fade in active">
								
									<?php foreach($guest as $guestData) { $count=0;?>
												
										<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 customHeight">
											<h5 class="pt22">
												<span><?php if(!empty($guestData)){echo $guestData['title'][0];}?></span>
											</h5>
											
											<ul class=" list-unstyled tab-text">
												<?php foreach($guestData as $que_value) 
												{ $count++; 
														//pr($que_value->id);
														if($count <  5){
															$linkid=isset($que_value->id)?$que_value->id:"";
															$catid=isset($que_value->category_id)?$que_value->category_id:"";
												?>
																		
												<li>
													<a href="<?php echo HTTP_ROOT."Pages/help-listing/".base64_encode(convert_uuencode(2))."/".base64_encode(convert_uuencode($catid))."/".base64_encode(convert_uuencode($linkid));?>"><?php echo isset($que_value->question)?$que_value->question:'';?>
													</a>
												</li>
																
												<?php 
															} 
												} ?>
												
												
												<li class="pad-bottom10">
													<a href="<?php echo HTTP_ROOT."Pages/help-listing/".base64_encode(convert_uuencode(3))."/".base64_encode(convert_uuencode($que_value->category_id));?>"><b>See all articles</b></a>
												</li> 
											</ul>
										</div> 
											<?php } ?>            
									</div>
							<?php }  ?>
					
					<!-- For Show sitter Question-->
					
					<?php  if(empty($sitter)){?><div class="col-md-3 col-md-offset-5"><h4><?php echo "Record Not Found";?><h4></div> <?php	 }
							else{ //pr($sitter);die;?>
										<div id="menu3" class="tab-pane fade in">
											<?php foreach($sitter as $sitterData) { $count=0;?>
												<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 customHeight">
													<h5 class="pt22"><span><?php if(!empty($sitterData)){echo $sitterData['title'][0];}?></span></h5>
															<ul class=" list-unstyled tab-text">
																<?php foreach($sitterData as $que_value) { $count++;
																	if($count <  5){
																		$linkid=isset($que_value->id)?$que_value->id:"";
																		$catid=isset($que_value->category_id)?$que_value->category_id:"";
																		?>
																		
																	<li><a href="<?php echo HTTP_ROOT."Pages/help-listing/".base64_encode(convert_uuencode(2))."/".base64_encode(convert_uuencode($catid))."/".base64_encode(convert_uuencode($linkid));?>"><?php echo isset($que_value->question)?$que_value->question:'';?></a></li>
																
																<?php } } ?>
														
												
												<li class="pad-bottom10"><a href="<?php echo HTTP_ROOT."Pages/help-listing/".base64_encode(convert_uuencode(1))."/".base64_encode(convert_uuencode($que_value->category_id));?>"><b>See all articles</b></a></li> 
												</ul>
												
											</div> 
											<?php } ?>            
										</div>
							<?php }  ?>
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
    
<style>
.customHeight {
    min-height: 175px;
}

</style>    
    
    <!-- Get in Touch ends-->
   

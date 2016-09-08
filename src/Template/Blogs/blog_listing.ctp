

<section class="sev-type">
	<div class="container">
		<h4><?php echo $heading; ?></h4>
    </div>
</section>
  
<section>
	<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
          
				<div class="left-side-tabs">
					<?php 
						//echo $this->element('frontElements/blogs/search_blogs');
						echo $this->element('frontElements/blogs/latest_blogs');
					?>
				</div>
          
				<div class=" click-area hidden-xs">

					<?php echo $this->element('frontElements/blogs/blog_advertisement');?>

				</div>
        
			</div>
        
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
          
			  <div class="right-side-tabs1">
				<div class="row">
				  <div class="col-xs-12 col-sm-12">
					
					<?php 
						echo $this->element('frontElements/blogs/filter_blogs');
					?>
					
				  </div>   
				</div>
				<div class="tab-content">
				  <div class="tab-pane fade in active">
					<div class="row">
					<?php 
						if($blog_count > 0){
							foreach($blogs_info as $blogs){
							?>	
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 ">
									<div class="blog-profile">
									  <div class="img-thumbnail">
										<div class="img-box">
										  
										  <img style="max-height:136px" src="<?php echo HTTP_ROOT.'img/uploads/'.$blogs['image']; ?>" class="img-responsive center-block"
										  > 
										  <ul class="text-center">
											<a class="btn btn-green" href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($blogs['id'])); ?>">read more
											</a>
										  </ul>
										</div>
										
										
										<p><?php 
												$text = $blogs['description']; 
												$limit = 20; 
												if(str_word_count($text, 0) > $limit)
												{ 
													$words = str_word_count($text, 2); 
													$pos = array_keys($words); 
													echo $text = substr($text, 0, $pos[$limit]) . '...';
												}    
											?> 
										</p>    
										<p> 
										  <a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($blogs['id'])); ?>">[ <?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?> ... ]
										  </a>
										</p> 
										<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Posted by')); ?> 
										  <a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($blogs['id'])); ?>"><?php echo SITE_OWNER; ?>
										  </a> 
										  <span class=" pull-right"><?php echo __( date("M Y", strtotime($blogs['created_date']))); ?>
										  </span> 
										</p>
									  </div>
									</div> 
								  </div>
							<?php	
							}
					?>
					<?php 	
						}else{
					?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
							<div class="blog-profile">
								<h5 style=" background: #a1cc3f none repeat scroll 0 0;color: #fff;padding: 15px;text-align: center;"><?php echo $this->requestAction('app/get-translate/'.base64_encode('No Records Found')); ?> </h5>
							</div>	 
						</div>	 	
					<?php		
					
						}
					?>
					  
					
					</div>
				  </div>
				</div>
				<div class="col-xs-12">
						<div class="row">
								  
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

										<div class=" text-center ">
											<div class="review-pagination favPagination ">
												<ul class=" list-inline ">
													<?php 	//echo $this->Paginator->counter('Page {{page}} of {{pages}}');?>
													<?php
														//echo $this->Paginator->first("First");
														if($this->Paginator->hasPrev()){
															echo $this->Paginator->prev("Prev", array('tag' => 'li'), null, array('tag' => 'li','class' => 'nxt'));
														}
														echo $this->Paginator->numbers(array('modulus' =>1));
														if($this->Paginator->hasNext()){
															echo $this->Paginator->next("Next", array('tag' => 'li'), null, array('tag' => 'li','class' => 'nxt'));
														}
														//echo $this->Paginator->last("Last");
														
													?>
											
												</ul>
											</div>
										</div>
								</div>

							</div>  
					</div>
			  </div>
			  
			  <div class=" click-area visible-xs">
				<?php echo $this->element('frontElements/blogs/blog_advertisement');?>
			  </div>
			
        </div>
      </div>
    </div>
  </section>
  
 
  <!-- Get in Touch starts-->
  <!-- Get in Touch ends-->

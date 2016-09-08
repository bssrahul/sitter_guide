<div class="padtt-20">
              <h4 class="popularpost"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Popular Posts')); ?>
              </h4> 
            </div>

            <div class="recent-article-wrap">
              <div class="container-fluid">
                <ul class="list-unstyled">
                   <?php 
						if(!empty($popular__blogs_info)){
							foreach($popular__blogs_info as $p_blogs){
							?>	
								<li>
									<a href="<?php echo HTTP_ROOT.'blog-details/'.base64_encode(convert_uuencode($p_blogs['id'])); ?>">
										<div class="row">
								
											<div class="col-xs-12 col-sm-12  "><h5 class="recent-b-head"><?php echo $p_blogs['title']; ?></h5>

											
											<p class="recent-b-text"><?php 
													$text = $p_blogs['description']; 
													$limit = 15; 
													if(str_word_count($text, 0) > $limit)
													{ 
														$words = str_word_count($text, 2); 
														$pos = array_keys($words); 
														echo $text = substr($text, 0, $pos[$limit]) . '...';
													}    
												?> 
											</p>    
										</div>

									</div> 
								
									</a>
								</li>
									
								

								
							<?php	
							}
					?>
					<?php 	
						}else{
					?>
						<li>
							<div class="row">
								<div class="col-xs-12 col-sm-12 plft0 ">
									<h5 class="recent-b-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('No Records Found')); ?></h5>
								</div>
							</div> 
							
						</li>	 
					<?php		
						}
					?>
                </ul>
              </div>
            </div>
            

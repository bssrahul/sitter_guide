<section class="sr-list-wrap">
    <div class="cust-container">
      <div class="sr-list-area">
        <div class="toptext">
          <p>Book on Sitter Guide and receive: Free sitter guide Premium Insurance, Local Australian Customer Support and a Booking Guarantee.</p>
        </div>
        <div class="ssr-list-area">
          <div class="sl-area"> 
            <!--distance-->
            <div class="distance">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="sort-by">
                    <p>Sort By</p>
                    <select class="form-control" id="sel1">
                      <option>Distance</option>
                      <option>2 mile</option>
                      <option>3 miles</option>
                      <option>4 miles</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="per-page">
                    <p>Per Page</p>
                    <select class="form-control" id="sel1">
                      <option>25</option>
                      <option>35</option>
                      <option>45</option>
                      <option>60</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!--/distance--> 
            <!--[Sitter Listing Outer Start]-->
            	<div class="sit-list-outer">            
            <!--sitter listing 1-->           
            <div class="all-sitter-listing">
              <ul class="all-sit-list">
				<?php if(!empty($resultsData)){ 
						foreach($resultsData as $results){ ?>
							<li>
							  <div class="sld-area">
								<div class="sit-pic-lft">
								  <div class="ppic-area">
									<div class="sitter-pic"> 
										<img src="<?php echo HTTP_ROOT; ?>img/profile-pic.png"  alt=""/>
									</div>
									<div class="sitter-p-det"> 
									  <!--head-->
									  <div class="sit-p-head">
										<p class="head-txt"><span>1</span>Alyce B <b><img src="<?php echo HTTP_ROOT; ?>img/certify-1.png"  alt=""/></b> <b><img src="<?php echo HTTP_ROOT; ?>img/certify-2.png"  alt=""/></b>
										</p>
										<p class="about-sit">Dog Loving Family</p>
										<p class="away">Woolloomooloo, New South Wales <span><i class="fa fa-map-marker" aria-hidden="true"></i> 9Km Away</span></p>
									  </div>
									  <!--/head--> 
									  <!--rating-->
									  <div class="sitter-rating">
										<div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>
										<div class="sit-review"> <a href="#" title="Review">105 Reviews</a> </div>
									  </div>
									  <!--/rating--> 
									  <!--availability-->
									  <div class="sit-available">
										<ul>
										  <li><a href="#" title="Available this weekend">Available this weekend</a></li>
										  <li><a href="#" title="Available on New Year">Available on New Year</a></li>
										</ul>
									  </div>
									  <!--availability--> 
									  
									</div>
								  </div>
								  <!--sitter list-->
								  <div class="sit-list-del">
									<ul>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Repeat Guests : <span>2</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last booked: <span>2 week ago</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last active <span>2 day ago</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Response Rate <span>100%</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Average Response <span>2hours</span></li>
									  <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last Contacted <span>5day ago</span></li>
									</ul>
								  </div>
								  <!--sitter list--> 
								  <!--sitter feedback-->
								  <div class="sit-feedback"> <img src="<?php echo HTTP_ROOT; ?>img/sit-feedback-img.png" width="52" height="52" alt=""/>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has  dummy text of the as  Ipsum has been the industry's <a href="#"> read more... </a></p>
								  </div>                      
								  <!--sitter feedback--> 
								</div>
								<div class="sit-pic-rgt"> 
								  <!--per night-->
								  <div class="per-nite">
									<p>from <br>
									  <span>$25</span> per night</p>
								  </div>
								  <!--per night--> 
								  <!--facilities-->
								  <div class="facilities">
									<ul>
									  <li>Grooming <span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon-1.png"  alt="Grooming"/></span></li>
									  <li>Trainning<span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon.png"  alt="Grooming"/></span></li>
									  <li>Driver<span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon.png"     alt="Grooming"/></span></li>
									  <li>Recreation<span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon.png" alt="Grooming"/></span></li>
									</ul>
								  </div>
								  <!--/facilities--> 
								  <!--likebox-->
								  <div class="likebox"> 
									  <a href="#" title="LIke"><img src="<?php echo HTTP_ROOT; ?>img/like-icon.png" width="16" height="14" alt=""/></a>
								  </div>
								  <!--/likebox--> 
								</div>
							  </div>
							</li>
              
						<?php 
						}
				} ?>
                
              </ul>
            </div>            
            <!--sitter listing --> 
            <!--/sitter listing similar result-->
				<div class="all-sitter-listing">
              <div class="other-similar-result">
                <p>See  alos sitters who offers house sitting</p>
              </div>
              <ul class="all-sit-list">
                <li>
                  <div class="sld-area">
                    <div class="sit-pic-lft">
                      <div class="ppic-area">
                        <div class="sitter-pic"> <img src="<?php echo HTTP_ROOT; ?>img/profile-pic.png"  alt=""/> </div>
                        <div class="sitter-p-det"> 
                          <!--head-->
                          <div class="sit-p-head">
                            <p class="head-txt"><span>1</span>Alyce B <b><img src="<?php echo HTTP_ROOT; ?>img/certify-1.png"  alt=""/></b> <b><img src="<?php echo HTTP_ROOT; ?>img/certify-2.png"  alt=""/></b><br>
                            </p>
                            <p class="about-sit">Dog Loving Family</p>
                            <p class="away">Woolloomooloo, New South Wales <span><i class="fa fa-map-marker" aria-hidden="true"></i> 9Km Away</span></p>
                          </div>
                          <!--/head--> 
                          <!--rating-->
                          <div class="sitter-rating">
                            <div class="rating-box"><img src="<?php echo HTTP_ROOT; ?>img/rating-icons.png"  alt=""/> </div>
                            <div class="sit-review"> <a href="#" title="Review">105 Reviews</a> </div>
                          </div>
                          <!--/rating--> 
                          <!--availability-->
                          <div class="sit-available">
                            <ul>
                              <li><a href="#" title="Available this weekend">Available this weekend</a></li>
                              <li><a href="#" title="Available on New Year">Available on New Year</a></li>
                            </ul>
                          </div>
                          <!--availability--> 
                          
                        </div>
                      </div>
                      <!--sitter list-->
                      <div class="sit-list-del">
                        <ul>
                          <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Repeat Guests : <span>2</span></li>
                          <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last booked: <span>2 week ago</span></li>
                          <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last active <span>2 day ago</span></li>
                          <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Response Rate <span>100%</span></li>
                          <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Average Response <span>2hours</span></li>
                          <li><img src="<?php echo HTTP_ROOT; ?>img/right-arrow.png"  alt=""/> Last Contacted <span>5day ago</span></li>
                        </ul>
                      </div>
                      <!--sitter list--> 
                      <!--sitter feedback-->
                      <div class="sit-feedback"> <img src="<?php echo HTTP_ROOT; ?>img/sit-feedback-img.png" width="52" height="52" alt=""/>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum has  dummy text of the as  Ipsum has been the industry's <a href="#"> read more... </a></p>
                      </div>
                      
                      <!--sitter feedback--> 
                    </div>
                    <div class="sit-pic-rgt"> 
                      <!--per night-->
                      <div class="per-nite">
                        <p>from <br>
                          <span>$25</span> per night</p>
                      </div>
                      <!--per night--> 
                      <!--facilities-->
                      <div class="facilities">
                        <ul>
                          <li>Grooming <span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon-1.png"  alt="Grooming"/></span></li>
                          <li>Trainning<span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon.png"  alt="Grooming"/></span></li>
                          <li>Driver<span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon.png"     alt="Grooming"/></span></li>
                          <li>Recreation<span><img src="<?php echo HTTP_ROOT; ?>img/fac-icon.png" alt="Grooming"/></span></li>
                        </ul>
                      </div>
                      <!--/facilities--> 
                      <!--likebox-->
                      <div class="likebox"> <a href="#" title="LIke"><img src="<?php echo HTTP_ROOT; ?>img/like-icon.png" width="16" height="14" alt=""/></a> </div>
                      <!--/likebox--> 
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!--/sitter listing similar result--> 
            
            <!---loading area-->
            	<div class="loading-more">
                	<a href="#" title="loading More">   <img src="<?php echo HTTP_ROOT; ?>img/loading-icon.png" width="22" height="22" alt=""/>  </a>
                </div>
            <!---loading area-->
            
                       
            </div>            
            <!--[Sitter Listing Outer End]-->            
                     
          </div>
          <!--[Right Map Start]-->
            <div class="sl-map">            	
            	<div class="enlarge-map">
                	<div class="row">
                    	<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12"> 
                        	<a href="#" title="Enlarge Map">Enlarge map</a>
                        </div>
                    	<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12"> 
                        	<input type="checkbox"> Update  when i move the map 	
                        </div>                        
                    </div>
                </div>
             <!--<img src="<?php echo HTTP_ROOT; ?>img/search-map.png" alt=""/> -->
              <?php echo $this->GoogleMap->map(array('width'=>'100%','height'=>'1180px','type'=>'ROADMAP')); ?>
           </div>
           <!--[Right Map End]-->
        </div>
      </div>
    </div>
  </section>

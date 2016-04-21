<!--[Fun News]-->
    	<?php if(!empty($blogsInfo)){ 
       
            ?>
        <section class="fun-news">
             <?php //echo "<pre>";print_r($blogsInfo);?>
        	<div class="container">

            	<div class="fn-area"> 
                	<!--heading--> 
                	<div class="head-box">
                    	<h4> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Fun & News')); ?> </h4>
                        	<p> <?php echo $this->requestAction('app/get-translate/'.base64_encode('Find some of the funniest pet pics & videos along with news updates here')); ?> </p>
                            <span class="head-bot"><b></b></span>
                    </div>                           	
            	<!--/heading--> 
                	<div class="fnb-area">
                    	
                <?php 
                

                   foreach($blogsInfo as $single_blog){ 
                   //echo $single_blog->created_date;
                   
                        
                            $proPic ="prof_photo.png";
                       
                    
                    
             ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="fnb-outer">
                                <div class="imgb-area">
                                    <div class="date">
                                        <p><?php echo __( date("l jS M Y", strtotime($single_blog->created_date))); ?></p>
                                    </div>
                                    <div class="img">
                                <img src="<?php echo HTTP_ROOT.'img/uploads/'.$single_blog->image; ?>" width="937" height="527" alt=""> 
                                    </div>                                  
                                </div>
                                <div class="p-area">
							
                                    
										
                                  <ul>
                                        <li><a href="#"><i class="fa fa-user"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('By user')); ?></a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Comments')); ?></a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i>40</a></li>
                                    </ul> 
<div class="p-img">
                                      
                                          
                                    </div>
	<p class="txt-head"><?php echo $single_blog->title; ?></p>									
                                    <p><?php echo $single_blog->description; ?> </p>                                                                  
                                    <a href="" title="Read More" class="btn-1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?> <i class="fa fa-chevron-circle-right"></i></a>
                                </div>
                                
                            </div>
                        </div>
                        <?php }
                         ?>
                    	                                          
                    </div>                               	
                </div>
                 <div class="bot-btn-area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a href="#"  title="" class="bot-more"><?php echo $this->requestAction('app/get-translate/'.base64_encode('More News & Updates')); ?></a>
                        </div>
                    </div>
                    </div>
            </div>  
            
            <div class="fn-bot">
            	<ul>  
                 <li>     	
                    	<div class="fn-outer">
                        	 <div class="img-box">		                    	
    	                		<img src="<?php echo HTTP_ROOT; ?>img/mn-img-1.png"  alt="" />         	                
                             </div>   
                            <div class="ho-box">
                            	<div class="hb-inner">
                                	<p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?></p>
                                    	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum')); ?></p>
                                        <a href="#" title="Read More" class="btn-2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?>  <i class="fa fa-chevron-circle-right"></i> </a>
                                </div>                            	
                            </div>
                         </div>                   
                   </li>
                  <li>     	
                    	<div class="fn-outer">
                        	 <div class="img-box">		                    	
    	                		<img src="<?php echo HTTP_ROOT; ?>img/mn-img-2.png"  alt="" />         	                
                             </div>   
                            <div class="ho-box">
                            	<div class="hb-inner">
                                	<p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?></p>
                                    	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum')); ?></p>
                                        <a href="#" title="Read More" class="btn-2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?>  <i class="fa fa-chevron-circle-right"></i> </a>
                                </div>                            	
                            </div>
                         </div>                   
                   </li>      
                   <li>     	
                    	<div class="fn-outer">
                        	 <div class="img-box">		                    	
    	                		<img src="<?php echo HTTP_ROOT; ?>img/mn-img-3.png"  alt="" />         	                
                             </div>   
                            <div class="ho-box">
                            	<div class="hb-inner">
                                	<p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?></p>
                                    	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum')); ?></p>
                                        <a href="#" title="Read More" class="btn-2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?>  <i class="fa fa-chevron-circle-right"></i> </a>
                                </div>                            	
                            </div>
                         </div>                   
                   </li>      
                   <li>     	
                    	<div class="fn-outer">
                        	 <div class="img-box">		                    	
    	                		<img src="<?php echo HTTP_ROOT; ?>img/mn-img-4.png"  alt="" />         	                
                             </div>   
                            <div class="ho-box">
                            	<div class="hb-inner">
                                	<p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?></p>
                                    	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum')); ?></p>
                                        <a href="#" title="Read More" class="btn-2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?>  <i class="fa fa-chevron-circle-right"></i> </a>
                                </div>                            	
                            </div>
                         </div>                   
                   </li>      
                   <li>     	
                    	<div class="fn-outer">
                        	 <div class="img-box">		                    	
    	                		<img src="<?php echo HTTP_ROOT; ?>img/mn-img-5.png"  alt="" />         	                
                             </div>   
                            <div class="ho-box">
                            	<div class="hb-inner">
                                	<p class="txt-head"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?></p>
                                    	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('It has survived not only five centuries, but also the leap into electronic typesetting, remaining Ipsum')); ?></p>
                                        <a href="#" title="Read More" class="btn-2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Read More')); ?>  <i class="fa fa-chevron-circle-right"></i> </a>
                                </div>                            	
                            </div>
                         </div>                   
                   </li>      
                 </ul>        
            </div>     	
  </section>
  <?php } ?>
    <!--[Fun News]--> 

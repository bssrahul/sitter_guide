<!--[Why Choose Us]-->
    	<section class="why-choose-us">
        	<div class="container">
            	<div class="wcu-area">  
                	<!--heading--> 
                	<div class="head-box">
                    	<h3><?php echo __('Why Choose us?') ;?></h3>
                        	<p><?php echo __('Find some of the funniest pet pics & videos along with news updates here') ;?></p>
                            <span class="head-bot"><b></b></span>
                    </div>                           	
            	<!--/heading-->   
                <div class="wcub-area">
                	<div class="row">
                        <?php 
                       if(!empty($choose_data)){
                      $imgArray  =array('0'=>'','1'=>'img-box-2','2'=>'img-box-3','3'=>'img-box-4');
                      $i = 0;
                         foreach($choose_data as $single_data){ 
                         
                        ?>
                    	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">                        	
                        	<div class="wcu-box">
                            	<div class="img-box <?php echo $imgArray[$i]; ?>">                                	
                                </div>
                                <p class="txt-head"><?php echo $single_data->title; ?></p>
                                  <p><?php 
                                        echo $single_data->description;?>
                                  </p>
                                                <a href="#"  title="Read More" class="btn-1"><?php echo __('READ MORE')  ;?><i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>

                       
                        <?php  $i++;} 
                          }?>
                    	<!--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">                        	
                        	<div class="wcu-box">
                            	<div class="img-box img-box-2">                                	
                                </div>
                                <p class="txt-head"><?php echo __('Great for you') ;?></p>
                                  <p><?php echo __('Caring, personalized attention') ;?>
                                      <b>  <?php echo __('No kennels, no cages') ;?></b>
                                        <b><?php echo __('Stay locally in the community') ;?></b>
                                        <b><?php echo __('Retain familiar items (bed, toys,') ;?></b>
                                         <?php echo __('treats, etc.)') ;?>
                                                </p>
                                                <a href="#"  title="Read More" class="btn-1"><?php echo __('READ MORE') ;?> <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        	<div class="wcu-box">
                            	<div class="img-box img-box-3">                                	
                                </div>
                                <p class="txt-head"><?php echo __('Trust and Safety') ;?></p>
                                  <p><?php echo __('Caring, personalized attention') ;?>
                                      <b>  <?php echo __('No kennels, no cages') ;?></b>
                                        <b><?php echo __('Stay locally in the community') ;?></b>
                                        <b><?php echo __('Retain familiar items (bed, toys,') ;?></b>
                                         <?php echo __('treats, etc.)') ;?>
                                                </p>
                                                <a href="#"  title="Read More" class="btn-1"><?php echo __('READ MORE') ;?> <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        	<div class="wcu-box">
                            	<div class="img-box img-box-4">                                	
                                </div>
                                <p class="txt-head"><?php echo __('Trust and Safety') ;?></p>
                                  <p><?php echo __('Caring, personalized attention') ;?>
                                      <b>  <?php echo __('No kennels, no cages') ;?></b>
                                        <b><?php echo __('Stay locally in the community') ;?></b>
                                        <b><?php echo __('Retain familiar items (bed, toys,') ;?></b>
                                         <?php echo __('treats, etc.)') ;?>
                                                </p>
                                                <a href="#"  title="Read More" class="btn-1"><?php echo __('READ MORE') ;?> <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div> -->                                                                       
                    </div>
                   
                </div>           	
                </div>            	
			</div>
          <div class="wcu-bot">
          	<div class="container">
            	<div class="row">
                    <?php 
                       if(!empty($news_data)){
                      $imgArray  =array('0'=>'','1'=>'img-box-2','2'=>'img-box-3');
                      $i = 0;
                         foreach($news_data as $single_data){ 
                        ?>
                	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    	<div class="wcub-box <?php echo $i == 2?'no-bdr':''; ?>">
                        	<div class="img-box <?php echo $imgArray[$i]; ?>">
                            </div>
                            <p class="txt-head"><?php echo $single_data->title;?></p>
                            	<p><!--<?php echo __('Trusted sitters will treat your') ;?> <span><?php echo __('pet like family') ;?></span>-->
                                 <?php echo $single_data->description; ?>
                                </p>
                        </div>
                    </div>
                    <?php $i++; }
                    }?>
                	<!--<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    	<div class="wcub-box">
                        	<div class="img-box img-box-2">                            	
                            </div>
                            <p class="txt-head"><?php echo __('Insurance Included') ;?></p>
                            	<p><?php echo __('Trusted sitters will treat your') ;?> <span><?php echo __('pet like family') ;?></span></p>
                        </div>
                    </div>
                	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    	<div class="wcub-box no-bdr">
                        	<div class="img-box img-box-3">                            	
                            </div>
                            <p class="txt-head"><?php echo __('Peace of Mind'); ?></p>
                            	<p> <?php echo __('Trusted sitters will treat your') ;?> <span><?php echo __('pet like family') ;?></span></p>
                        </div>
                    </div> -->                                       
                </div>
                 
            </div>
          </div>  
            
        </section>
    <!--[/Why Choose Us]-->
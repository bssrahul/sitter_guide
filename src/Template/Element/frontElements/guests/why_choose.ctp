<!--[Why Choose Us]-->
    	<section class="why-choose-us">
        	<div class="container">
            	<div class="wcu-area">  
                	<!--heading--> 
                	<div class="head-box">
                    	<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Why Choose us?')); ?></h3>
                        	<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Find some of the funniest pet pics & videos along with news updates here')); ?></p>
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
                                  <a href="<?php echo HTTP_ROOT.str_replace(" ","-",str_replace(" ","-",strtolower($single_data->title))); ?>"  title="Read More" class="btn-1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('READ MORE')); ?><i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                     <?php  $i++;} 
                          } ?>
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
                            	<p>
                                 <?php echo $single_data->description; ?>
                                </p>
                        </div>
                    </div>
                    <?php $i++; }
                    }?>
                	
                </div>
                 
            </div>
          </div>  
            
        </section>
    <!--[/Why Choose Us]-->

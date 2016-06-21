
<section class="sev-type">
    
	<div class="container"><h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Why Choose Us')); ?></h4></div>

</section>


<section>
  <div class="container">
    
    <div class="row">
      
      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4">
        
        <div class="left-side-tabs">
          
          <div class="s-tabs"> 
            
            <ul class="nav nav-pills nav-stacked">
				<?php 
				if(!empty($works_data)){
					foreach($works_data as $work_val){ ?>
						<li <?php if($pageurl==str_replace(" ","-",strtolower($work_val->title))){echo "class='active'";}?>> 
							<a href="<?php echo HTTP_ROOT.str_replace(" ","-",str_replace(" ","-",strtolower($work_val->title))); ?>" > <?php echo $work_val->title; ?>
							</a>
						  </li>
					<?php }
				}
				?>
              
              
              
                  
            </ul>
            
          </div> 
          
        </div>
        
        <div class=" click-area hidden-xs">
          <ul class="list-unstyled">
            <li>
              <div class="img-thumbnail">
                <a href="#">
                  <img alt="Search Best Sitter" class="img-responsive" src="<?php echo HTTP_ROOT; ?>img/service-click1.png">
                </a> 
              </div>
            </li>
            <li>
              <div class="img-thumbnail">
                <a href="#">
                  <img alt="Search Best Sitter" class="img-responsive" src="<?php echo HTTP_ROOT; ?>img/service-click2.png">
                </a> 
              </div>
            </li>
          </ul>
        </div>
        
      </div>
      
      <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
        
        <div class="right-side-tabs">
          
          <div class="tab-content">
            
            <div class="tab-pane fade in active" id="boarding">
              <h5 class="boarding-heading"><?php echo isset($CmsPageData->pagename)?$CmsPageData->pagename:__("Content not added yet"); ?>
              </h5>
              
              <?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
              
            </div>
            
            
          </div>
          
        </div>
        
        <div class=" click-area visible-xs">
          <ul class="list-unstyled text-center">
            <li>
              <div class="img-thumbnail">
                <a href="#">
                  <img alt="Search Best Sitter" class="img-responsive" src="<?php echo HTTP_ROOT; ?>img/service-click1.png">
                </a> 
              </div>
            </li>
            <li>
              <div class="img-thumbnail">
                <a href="#">
                  <img alt="Search Best Sitter" class="img-responsive " src="<?php echo HTTP_ROOT; ?>img/service-click2.png">
                </a> 
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

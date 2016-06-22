
<section class="sev-type">
    
	<div class="container"><h4><?php echo $this->requestAction('app/get-translate/'.base64_encode('Services Type')); ?></h4></div>

</section>


<section>
  <div class="container">
    
    <div class="row">
      
      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4">
        
        <div class="left-side-tabs">
          
          <div class="s-tabs"> 
            
            <ul class="nav nav-pills nav-stacked">
              
              <li <?php if($pageurl=='boarding'){echo "class='active'";}?>> 
                <a href="<?php echo HTTP_ROOT.'boarding'; ?>" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Boarding')); ?> 
                </a>
              </li>
              
              <li <?php if($pageurl=='house-sitting'){echo "class='active'";}?>> 
                <a href="<?php echo HTTP_ROOT.'house-sitting'; ?>" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('House Sitting')); ?> 
                </a>
              </li>
              
              <li <?php if($pageurl=='drop-in-visit'){echo "class='active'";}?>> 
                <a href="<?php echo HTTP_ROOT.'drop-in-visit'; ?>" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Drop-in Visit')); ?> 
                </a>
              </li>
              
              <li <?php if($pageurl=='day-night-care'){echo "class='active'";}?>> 
                <a href="<?php echo HTTP_ROOT.'day-night-care'; ?>" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Day & Night Care')); ?>
                </a>
              </li>
              
              <li <?php if($pageurl=='marketplace'){echo "class='active'";}?>> 
                <a href="<?php echo HTTP_ROOT.'marketplace'; ?>" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Market Place')); ?>
                </a>
              </li>      
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

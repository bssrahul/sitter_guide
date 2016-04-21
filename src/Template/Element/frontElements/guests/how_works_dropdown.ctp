<!--How it work dropdown-->
<div id="panel">
  <div class="container">
      <div class="topdrop-area">
          <div class="close"><a href="#" title="Close" id="close"><i class="fa fa-times-circle"></i></a></div>      
        <div class="row">
		<?php foreach($works_data as $work) {?>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="td-box">
                  <div class="td-img">                      
                    </div>
                  <p class="txt-head"><?php echo $work->title;?></p>
                    <p><?php echo $work->description;?></p>                    
                </div>
            </div>
		<?php } ?>
                  
        </div> 
          <a href="#" title="Learn More" class="td-more"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Learn more About Sitter')); ?></a>    
        </div>
</div>
</div>
<!--How it work dropdown-->

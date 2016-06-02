<!--How it work dropdown-->
<div id="panel" class="panel-pop">
  <div class="container">
      <div class="topdrop-area">
          <div class="close"><a href="#" title="Close" id="flipclose"><i class="fa fa-times-circle"></i></a></div>      
        <div class="row">
		<?php $i=1; foreach($works_data as $work) { if($i==1){$boxclass="";$newclass="";}else{$newclass="td-img-".$i;$boxclass="td-box-".$i;}?>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="td-box <?php echo $boxclass; ?>">
                  <div class="td-img <?php echo $newclass; ?>">                      
                    </div>
                  <p class="txt-head"><?php echo $work->title;?></p>
                    <p><?php echo $work->description;?></p>                    
                </div>
            </div>
		<?php $i++;} ?>
                  
        </div> 
          <a href="#" title="Learn More" class="td-more"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Learn more About Sitter')); ?></a>    
        </div>
</div>
</div>
<!--How it work dropdown-->

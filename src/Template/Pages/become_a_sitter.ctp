<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:$this->requestAction('app/get-translate/'.base64_encode('Content not added yet')); ?>

<section class="why-choose-us bg-white becommargin-bot">
  <div class="container">
    <div class="wcu-area"> 
      <!--heading-->
      <div class="head-box">
        <h3>How it Works ?
        </h3>
        <p>Find some of the funniest pet pics &amp; videos along with news updates here
        </p>
        <span class="head-bot">
          <b>
          </b>
        </span> 
      </div>
      <!--/heading-->
      
      <div class="become-howitworks">
      
        <div class="row">
           <?php 
			   if(!empty($choose_data)){
				$i = 1;
				?>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">  
				<?php
				foreach($choose_data as $single_data){ 
				 
				?>
				  
					<div class="media"> 
					  <div class="media-left become-padr"> 
						<img height="80" width="81" src="<?php echo HTTP_ROOT; ?>img/becom-<?php echo $i; ?>.png" alt="icon1">
					  </div> 
					  <div class="media-body"> 
						<h4 class="media-heading"><?php echo $i.". "; ?><?php echo $single_data->title; ?>
						</h4>
						<p><?php echo $single_data->description;?></p>
					  </div> 
					</div>
			  
					
				  
				
        <?php if($i%2==0){echo '</div><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">';}
				$i++;
        } ?>
        </div>
		<?php } ?>
      </div>
    </div>
  </div>
</section>

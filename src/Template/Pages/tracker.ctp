<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" ">
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img alt="db-profile-home-icon" src="<?php echo HTTP_ROOT; ?>img/tracker-ticon.png">&nbsp; <?php echo $this->requestAction('app/get-translate/'.base64_encode('Tracker ')); ?> 
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> <?php echo $this->requestAction('app/get-translate/'.base64_encode('You are here')); ?> : 
        </li>
        <li>
          <a href="#"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Home')); ?>
          </a>
        </li>
        <li class="active"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Tracker')); ?>
        </li>
      </ol>
    </div>
  </div>
  	<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
</div>

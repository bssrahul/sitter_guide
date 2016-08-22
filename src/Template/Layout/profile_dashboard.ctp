<!DOCTYPE html>
<?php $languageSession = $this->request->session(); ?>
<html lang="<?php echo $languageSession->read('requestedLanguage')."-".strtoupper($languageSession->read('requestedLanguage')); ?>">
   <head>
		
		<meta charset="utf-8">
		<meta http-equiv="content-language" content="<?php echo $languageSession->read('requestedLanguage'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<meta name="description" content="Give $20 to your firends to use on their first stay You\'ll also get $0 when they complete their first booking." />
		<!-- Twitter Card data -->
		<meta name="twitter:card" value="summary">
		<!-- Open Graph data -->
		<meta property="fb:app_id" content="<?php echo FACEBOOK_APP_ID; ?>" />
		<meta property="og:title" content="Refer Friends & Get $10" />
		<meta property="og:type"  content="website" />
		<meta property="og:url"   content="<?php echo "http://".$_SERVER['HTTP_HOST'].@$this->request->here; ?>" />
		<meta property="og:image" content="<?php echo HTTP_ROOT; ?>img/bg-family.png" />
		<meta property="og:description" content="Give $20 to your firends to use on their first stay You\'ll also get $20 when they complete their first booking." />
		
		<title><?php echo SITE_TITLE; ?></title>
		<?php echo isset($metaTag)?$metaTag:''; ?>
		<!-- Bootstrap Core CSS -->
		<?php 
			echo $this->Html->css(['font/fonts/css/font-awesome.min.css','Front/lang/'.$languageSession->read('requestedLanguage').'.css','Front/bootstrap.min.css','Front/style.css','Front/dist/imageselect.css','Front/hint.css','Front/jquery-ui.css','Front/search-result.css','Front/calendar.css','Front/developer.css']); 
			
			echo $this->Html->script(['Front/jquery.min.js','Front/dist/jquery.imgareaselect.js','Front/dist/jquery.form.js','Front/jquery-ui.js','Front/jquery.validate.js','Front/search-filter.js']);
		
			if($sitefavicon != null){ ?>
				<link rel=icon href="<?php echo HTTP_ROOT.'img/uploads/'.$sitefavicon; ?>" type="image/png">
			<?php } else {?>
				<link rel=icon href="<?php echo HTTP_ROOT; ?>img/create_logo.png" type="image/png">
			<?php }?>
	      
	<!-- Script for jquery UI slider issue resolved on mobile device-->		
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    
    </head>
    <body id="page-top" data-spy="scroll" class="drawer drawer--left">
          
		<!--[content area Start]-->
		<?php //echo $this->Flash->render();
			echo $this->element('frontElements/common/response_msg');
            /*ELEMENTS FOR DISPLAY SESSION ERROR AND SUCCESS MSGS */

			echo $this->element('frontElements/profile/profile_header');
			echo $this->element('frontElements/profile/profile_nav');?>
			 <?php 
				//echo $this->request->action; die;
				if($this->request->action=='review' || $this->request->action=='searchResultsFavourites' || $this->request->action=='communication' || $this->request->action=='tracker' || $this->request->action=='favouriteClients'){
					$bgClass='bg-fff';
				}else{
					$bgClass='addBgColor';
				}
			?>
					  
			<div class="container-fluid main-container <?php echo $bgClass; ?>">
            	<div class="row">
				   <div class=" main-container-outer">
			      <div class="table-row" id="internalProfile">
                  	<div id="contentHolder">
	                  <?php 
                      echo $this->element('frontElements/profile/profile_left');
	                  echo $this->fetch('content');?>
                      </div>
			      </div>
			  </div>
                </div>
			</div>	

        <?php echo $this->element('frontElements/common/footer');
		?>
		 <?php echo $this->element('frontElements/common/reference'); ?>
		<!--[content area end]-->
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'> 
    </body>
</html>

<script>
/*spinner in navsecond start*/
$(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + 1);
      } else {
        btn.next("disabled", true);
      }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - 1);
      } else {
        btn.prev("disabled", true);
      }
    });

})

/*spinner in navsecond ends*/
/*Tooltip*/

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
/*Tooltip ends*/
</script>

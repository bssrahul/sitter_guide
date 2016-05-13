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
		<title><?php echo SITE_TITLE; ?></title>
		
		<!-- Bootstrap Core CSS -->
		<?php 
			echo $this->Html->css(['fonts/css/font-awesome.min.css','Front/style.css','Front/developer.css','Front/lang/'.$languageSession->read('requestedLanguage').'.css','Front/bootstrap.min.css','Front/dist/imageselect.css','Front/hint.css']); 
			echo $this->Html->script(['Front/jquery.min.js','Front/jquery.validate.js','Front/dist/jquery.imgareaselect.js','Front/dist/jquery.form.js']);
		
			if($sitefavicon != null){ ?>
				<link rel=icon href="<?php echo HTTP_ROOT.'img/uploads/'.$sitefavicon; ?>" type="image/png">
			<?php } else {?>
				<link rel=icon href="<?php echo HTTP_ROOT; ?>img/create_logo.png" type="image/png">
			<?php }?>
	      
          
    </head>
    <body id="page-top" data-spy="scroll" class="drawer drawer--left">
          
		<!--[content area Start]-->
		<?php 
			echo $this->element('frontElements/common/response_msg');
            /*ELEMENTS FOR DISPLAY SESSION ERROR AND SUCCESS MSGS */

			echo $this->element('frontElements/profile/profile_header');
			echo $this->element('frontElements/profile/profile_nav');?>
			 <?php echo $this->Flash->render(); ?>
			<div class="container-fluid main-container addBgColor">
			   <div class=" main-container-outer">
			      <div class="table-row">
	                  <?php 
                      echo $this->element('frontElements/profile/profile_left');
	                  echo $this->fetch('content');?>
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

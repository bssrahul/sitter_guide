<!DOCTYPE html>
<?php $languageSession = $this->request->session(); ?>
<html lang="<?php echo $languageSession->read('requestedLanguage'); ?>" xml:lang="<?php echo $languageSession->read('requestedLanguage'); ?>">
   <head>
		
		<meta charset="utf-8">
		<meta http-equiv="content-language" content="<?php echo $languageSession->read('requestedLanguage'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?php echo "Sitter Guide";//echo @$title_for_layout; ?></title>
		
		<!-- Bootstrap Core CSS -->
		<?php 
			echo $this->Html->css(['font/fonts/font-awesome/css/font-awesome.min.css','Front/style.css','Front/developer.css','Front/lang/'.$languageSession->read('requestedLanguage').'.css']); 
    	echo $this->Html->script(['Admin/jquery.min.js','Front/jquery.validate.js','Front/custom.js']);
		?>
	       <link rel=icon href="<?php echo HTTP_ROOT; ?>images/create_logo.png" type="image/png">
          <?php //echo $this->request->action; die;?>
    </head>
    <body class="<?php echo ($this->request->action=='blogListing')?"privacy":'' ?>-page">
		<!--[content area Start]-->
		
		<?php 
			$session = $this->request->session();
             $session = $session->read('User');
            /*ELEMENTS FOR DISPLAY SESSION ERROR AND SUCCESS MSGS */
             echo $this->element('frontElements/common/response_msg');
             if($session){
             	 echo $this->element('frontElements/profile/profile_header');
             }else{
			    echo $this->element('frontElements/common/header');	
             }
             
             if($this->request->action=='blogListing'){
				echo $this->element('frontElements/common/static_pages_banner');		
			 }
            
         ?>
          <!--content area Start-->
		<main >  
			<?php  
				echo $this->fetch('content');	
				echo $this->element('frontElements/common/blog_footer');
			?>
		</main>		
		<?php 	
			echo $this->element('frontElements/common/footer');
		?>
		
		<!--[content area end]-->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'> 
    </body>
</html>

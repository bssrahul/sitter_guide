<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo SITE_TITLE; ?> | </title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css(['Admin/bootstrap.min.css','Admin/animate.min.css','Admin/custom.css','Admin/icheck/flat/green.css']); ?>

	<?php echo $this->Html->script(['Admin/jquery.min.js']); ?>
	

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<?php 
$bg = array("wall","wall1","wall2","wall3");
$bk = array_rand($bg);
$bv = $bg[$bk];

?>
<body class="<?php echo $bv; ?>">
	 <?php echo $this->Flash->render(); ?>
   <?= $this->fetch('content');?>

</body>
<style>
div.message {
	top: 10px !important;
	
}
div.success {
	background: #4f9709 none repeat scroll 0 0;
    border-radius: 5px;
    top: 10px !important;
    color: #fff !important;
    cursor: pointer !important;
    float: right !important;
    height: 30px;
    opacity: 0.9 !important;
    padding: 5px 15px;
    position: fixed !important;
    right: 7px;
    text-align: center !important;
    z-index: 9999 !important;
    content: none !important;
}
</style>
<script>
$(document).ready(function(){
	$('div.success, div.error').on('click',function(){
			$(this).slideUp(1000);
	});
	setInterval(function() {
		
	   $('div.success, div.error').slideUp();
	}, 5000);
});
</script>
</html>

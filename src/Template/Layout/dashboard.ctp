<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<?php
		/*echo $this->Html->script('Admin/jquery.min.js');*/
        if($siteConfiguration->site_favicon!='')
		{
			$favUrl = 'img/uploads/'.$siteConfiguration->site_favicon;
		}
		else
		{
			$favUrl = 'img/favicon.png';
		}
		echo $this->Html->meta('favicon.ico',"$favUrl",array('type' => 'icon'));
		?>
		<title><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide')); ?></title>
		<link rel=icon href="<?php echo HTTP_ROOT;?>img/create_logo.png" type="image/png">

		<!-- Bootstrap Core CSS -->
	    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<?php 
			echo $this->Html->css(['Front/bootstrap.min.css','Front/grayscale.css','Front/font-awesome/css/font-awesome.min.css','Front/style.css','Front/Helvetica-Regular.css','Front/Helvetica-Bold.css','Front/owl.carousel.css','Front/custom-style.css','Front/header.css','Front/default.css','Front/component.css','Front/developer.css','Front/flexslider.css']); 
		?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		  <![endif]-->
	<!-- jQuery -->
	</head>
	<body id="page-top" data-spy="scroll" class="drawer drawer--left">
	<!--inner content start here-->	
	       <?php echo $this->element('frontElements/profile_header');?> 
		<section class="inner-cont">
				<?php echo $this->fetch('content');?>     	
		</section>
		
		<section class="section-intro text-center row-space-top-8 text-contrast">
		    <?php echo $this->element('frontElements/profile_footer'); ?>
		</section>	
		<!--inner content end here-->
		
		
<!-- Download Section --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <?php 
		echo $this->Html->script(['Front/grayscale.js','Front/owl.carousel.min.js','Front/bootstrap.min.js','Front/jquery.flexslider.js','Front/dist/js/drawer.min.js','Front/js2/classie.js','Front/jquery.validate.js','Front/custom.js']); 
	?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script> 
<script src="https://cdn.rawgit.com/ungki/bootstrap.dropdown/3.3.5/dropdown.min.js"></script> 

<script> 
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();
	  
		$("#flip").click(function(){
		  $("#panel").slideDown("slow");
		});
		
		$("#flipclose").click(function(){
		  $("#panel").slideUp("slow");
		});
		
		var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				body = document.body;

			showLeft.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeft' );
			};
		$('.drawer').drawer();
		
	});
	  
	$(window).scroll(function() {

		if ($(this).scrollTop()>810)
		{		
			$('.panel-pop').hide("slow");
		}
 	});	  
  </script> 

<script src="js2/classie.js"></script> 
<script>
			
			
			function disableOther( button ) {
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );
				}
				
			}
		</script> 
 
<script>
document.onscroll = function() {
    if (window.innerHeight + window.scrollY > document.body.clientHeight) {
        document.getElementById('N_fixedBottom').style.display='none';
    }
}
</script>
<script>
 if(window.innerWidth <= 768 ) {
	  $("div.cont > span").slice(0, 1).show(); // select the first ten
    $("#load").click(function(e){ // click event for load more
        e.preventDefault();
        $("div.cont > span:hidden").slice(0, 1).show(); // select next 10 hidden divs and show them
        if($("div.cont > span:hidden").length == 0){ // check if any hidden divs still exist
            alert("No more News"); // alert if there are none left
        }
    });
   } else {
	  $("div.cont span").show(); // select the first ten
   }
</script> 

<script>
	function green(){
		var x = document.getElementById('green-col');
		x.style.color = "white";
		x.style.background = "Green";
		}	
</script> 
<script type="text/javascript">

    (function() {

      // store the slider in a local variable
      var $window = $(window),
          flexslider = { vars:{} };

      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 767) ? 1 :
               (window.innerWidth < 900) ? 3 : 3;
      }

      $(function() {
        SyntaxHighlighter.all();
      });

      $window.load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: false,
          itemWidth: 210,
          itemMargin: 5,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            $('body').removeClass('loading');
            flexslider = slider;
          }
        });
      });

      // check grid size on resize event
      $window.resize(function() {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
      });
    }());

  </script>
	</body>
</html>	

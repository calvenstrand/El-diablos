<?php
session_start();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php
		include_once ('includes/head.php');
	?>
</head>
<body>

	<div id="container">
		<?php
            include_once ('includes/header.php');
        ?>
    
        <div class="main" role="main">
            <div class="slider-wrapper theme-default">
            	<div class="ribbon"></div>
                    <div id="slider" class="nivoSlider">
                        <img src="img/bild1.jpg" />
                        <img src="img/bild2.jpg" />
                        <img src="img/bild3.jpg" />
                        <img src="img/bild4.jpg" />
                        <img src="img/bild5.jpg" />
                    </div>
            </div>
        
        	<div class="main-child">
                <?php 

                    if(isset($_GET['loggedin'])){
                        if($_GET['loggedin'] == 'true'){
                        	echo 'Thank you for logging in!';
                    	}else if ($_GET['loggedin'] == 'false'){
                        	echo 'Something went wrong, did you mistype? NOT LOGGED IN';
                    	}
                    }
                 ?>
          </div>
        
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
        <script type="text/javascript" src="js/script.js"></script>
	</div>
</body>
</html>

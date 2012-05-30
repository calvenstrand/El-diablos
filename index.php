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
                        <img src="img/bild6.jpg" />
                    </div>
            </div>
        
        	<div class="main-child">
            
            	<div class="left"> 
                    <b>Get Diablofy today. It's free!</b>
                    <p>Create your account by choosing your username and password.</p> 
                    <p>No need to download and install anything, its all here on diablofy.com. Works on all platforms.</p>                
                    <img src="img/logobanner.png">
           		</div>
                 
				<div class="right">
                 <?php 

                    if(isset($_GET['loggedin'])){
                        if($_GET['loggedin'] == 'true'){
                        	echo '<img src="img/r1.png">Hi there ' . $_SESSION['username'] .'. Welcome to the magic world of diablofy!<br><br> How are you doing? My Name is Rasmus.';
                    	}else if ($_GET['loggedin'] == 'false'){
                        	echo '<h3>Something went wrong, did you mistype? Idiot...</h3>';
                    	}
                    } else {
						echo '<a href="register.php"><img src="img/register.png"></a>';	
					}
                 ?>
                 </div>
          </div>
        
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
	</div>
</body>
</html>

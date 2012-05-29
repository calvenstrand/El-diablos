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
            <h2 style="text-align:center">About us</h2>
            <p>We are three incredebly handsome guys that runs El-diablo AB wich drives the development of diablofy. We're based in Stockholm, Sweden and we love to fight little girls at night. We also have great individual qualities that makes us the perfect team, Rasmus is the ultimate party dj and is also a talanted ice skater and will compete in the next winter olympics. Eric is the teams master chef, we often say that he is a woman trapped in a mans body. And then there is Christoffer, the purest definition of awesomeness.</p>
            <p>And whatever you do, don't press the red button.</p>
            
            <div  class="aboutimg">
            	<img src="img/we.jpg">
            </div>
            
            <button id="buttonOfDeath">
            Button of Death
            </button>
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
	</div>
	<script src="js/death.js"></script>
    <script type="text/javascript" src="js/libs/fool.min.js"></script>
</body>
</html>
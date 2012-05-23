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
    	<h2 style="text-align:center">Feel free to contact us if you have any questions</h2>

        <div class="main" role="main">
            <div class="contact">
                <form name="form" method="post" action="send_form_email.php">
                    <div class="cont">
                        <label for="name">Namn </label>
                        <input type="text" name="name" id="name" required="required" />
                    </div>
                    
                    <div class="cont">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required="required" />
                    </div>
                
                    <div class="cont">
                        <label for="meddelande">Ditt Meddelande</label>
                        <textarea name="meddelande" required="required"></textarea>
                    </div>
                
                    <div class="submit">
                        <input type="submit" value="Skicka" />
                    </div>
                </form>
            </div>
        
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
	</div>
</body>
</html>

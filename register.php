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
		<h2 style="text-align:center">Fill out this form to register</h2>
    <div class="main" role="main">
			<div class="contact">
				<form name="registerform" method="post" action="includes/userActions/register.php">
					<div class="cont">
					<?php
					if (isset($_GET['error'])) {	
						if ($_GET['error'] == 1) {
					?>
						<label for="name">Username - <span style="color:#FF0000">Already taken</span></label>
					<?php 
						}} else {
					?>
						<label for="name">Username</label>	
					<?php
						}
					
					?>
						<input type="text" name="username" id="name" required />
					</div>
					<div class="cont">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" required />
					</div>
					<div class="cont">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" required />
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

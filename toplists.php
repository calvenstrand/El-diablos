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
        	<h2 style="text-align:center">Rasmus top5</h2>
					<table border="5" style="text-align: center">
						<tr>
							<th>Rank</th>
							<th>Song</th>
							<th>Artist</th>
						</tr>
						<tr>
							<td>1</td>
							<td>Rosa Helikopter</td>
							<td>Peaches</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Barbie Girl</td>
							<td>Aqua</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Friday</td>
							<td>Rebecka Black</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Boom Boom Boom</td>
							<td>Vengaboys</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Who Let The Dogs Out?</td>
							<td>Baha Men</td>
						</tr>
					</table>

					<h2 style="text-align:center">Christoffers top5</h2>
					<table border="5" style="text-align: center">
						<tr>
							<th>Rank</th>
							<th>Song</th>
							<th>Artist</th>
						</tr>
						<tr>
							<td>1</td>
							<td>Sean Den Förste Banan</td>
							<td>Sean Banan</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Sean Den Förste Banan</td>
							<td>Sean Banan</td>
						<tr>
							<td>3</td>
							<td>Sean Den Förste Banan</td>
							<td>Sean Banan</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Sean Den Förste Banan</td>
							<td>Sean Banan</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Sean Den Förste Banan</td>
							<td>Sean Banan</td>
						</tr>
					</table>

					<h2 style="text-align:center">Erics top5</h2>
					<table border="5" style="text-align: center">
						<tr>
							<th>Rank</th>
							<th>Song</th>
							<th>Artist</th>
						</tr>
						<tr>
							<td>1</td>
							<td>Jag blöder!</td>
							<td>Eric E</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Dansa din djävul</td>
							<td>Tomas Di leva</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Shake that ass bitch</td>
							<td>?</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Boten Anna</td>
							<td>Basshunter</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Paparazzi</td>
							<td>Lady GaGa</td>
						</tr>
					</table>
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
	</div>
</body>
</html>

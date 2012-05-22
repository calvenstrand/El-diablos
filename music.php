<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php
		include_once ('includes/head.php');
        include('includes/classes/playlist.php');
        $pList = new Playlist();
	?>
</head>
<body>

	<div id="container">
		<?php
            include_once ('includes/header.php');
        ?>
    
        <div class="main" role="main">
			<table id="table">
                <thead>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Length</th>
                    <th>Year</th>
                    <th>Add</th>
                </thead>
                <tbody>
                    <?php
                    $pList->showAllSongs();
                    ?>
                </tbody>
            </table>
        
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
	</div>
</body>
</html>
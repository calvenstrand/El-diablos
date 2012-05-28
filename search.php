<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php
		session_start();
		include_once ('includes/head.php');
	?>
</head>
<body>

	<div id="container">
		<?php
            include_once ('includes/header.php');
            include('includes/classes/playlist.php');
        $pList = new Playlist();
        ?>
    
        <div class="main" role="main">

			<table id="table">
                    <thead>
                        <?php  
                        
                         echo'<th>Song</a></th>
                            <th>Artist</a></th>
                            <th>Album</a></th>
                            <th>Year</a></th>
                        ';?>
                        <th>Add</th>
                    </thead>
                    <tbody>
                    <tbody>

			<?php
				$mysqli = new mysqli("localhost", "root", "", "diablofy");
				$stmt = $mysqli->prepare(
				"SELECT artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
				LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
				LEFT JOIN artists ON (artists_songs.artistid=artists.id)
				LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
				LEFT JOIN albums ON (albums.id=albums_songs.albumid)
				WHERE (songs.name LIKE ?) OR (albums.name LIKE ?) OR (artists.name LIKE ?)");

				$nyh = '%'.$_POST['q'].'%';
				$stmt->bind_param( "sss", $nyh, $nyh, $nyh); 

		   
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($artistname, $songname, $songlength, $albumname, $albumyear, $songid);
			   
				while ($row = $stmt->fetch()) {

				
				
                        
							echo '<tr><td>'
							.$songname
							.'</td><td>'
							.$artistname
							.'</td><td>'
							.$albumname
							.'</td><td>'
							.$albumyear
							.'</td><td>'	
							.'<div class="size">
								<input type="text" name="noobChristoffer" value="Choose a Playlist" class="field" readonly="readonly" />
								<input type="hidden" name="select" value="" class="fest"/>
								<input type="hidden" name="id" value="'.$songid.'" class="finid"/>
							 	<ul class="list">';
								$pList->addablePlaylists();
								echo'
								</ul>
								</div>'
						.'</td>'
						.'</tr>';
						}

						
						?>
                    </tbody>
            	</table>

            <?php
							if($stmt->num_rows == 0) {
							echo 'We couldnt find what you were looking for';
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

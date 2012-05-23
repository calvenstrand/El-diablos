<?php

class Playlist
{

	public function createPlaylist(){
	$mysqli = new mysqli("localhost", "root", "", "diablofy");
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	$value2 = 30;
	$name = "Christoffers Playlist";
	$length = "02:30";
	

	$stmt = $mysqli->prepare("INSERT INTO playlists (name) VALUES (?)");
	$stmt->bind_param("s", $name); 
	// "ss' is a format string, each "s" means string
	$stmt->execute();

	//New stuff

	$stmt = $mysqli->prepare("INSERT INTO users_playlists (userid, playlistid, owner) VALUES (?, ?, ?)");
	$stmt->bind_param("iii", $userid, $playlistid, $owner); 
	// "ss' is a format string, each "s" means string
	$userid = 1;
	$playlistid = $mysqli->insert_id;
	$owner = 1;

	$stmt->execute();


	echo 'inserted playlist: '.$name. 'id is: '.$mysqli->insert_id;



	

$mysqli->close();
		
}	
	

public function sendSongToPlaylist(){
	$mysqli = new mysqli("localhost", "root", "", "diablofy");
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	$value2 = 30;
	$name = "Christoffers Playlist";
	$length = "02:30";
	

	$stmt = $mysqli->prepare("INSERT INTO playlists_songs (playlistid, songid) VALUES (?, ?)");
	$stmt->bind_param("ii", $playlistid, $songid); 
	// "ss' is a format string, each "s" means string
	

	// "ss' is a format string, each "s" means string
	$playlistid = 0;
	$songid = 24;
	$stmt->execute();
	


	echo 'inserted songid: '.$songid. 'playlistid is: '.$playlistid;



	

$mysqli->close();
		
}




public function showPlaylist(){
		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	$value2 = 1;
	$name = "Erics Life";
	$length = "02:30";
	

		$stmt = $mysqli->prepare(
		  "SELECT playlists.name, artists.name, songs.name, songs.length,albums.name, albums.year, songs.id FROM songs
		  LEFT JOIN playlists_songs ON (playlists_songs.songid=songs.id)
		  LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
		  LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN playlists ON (playlists.id= ?)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			WHERE playlists_songs.playlistid = ?

		  ");
		$stmt->bind_param( "ii", $value2, $value2); 
		// "ss' is a format string, each "s" means string
		$stmt->execute();

		$stmt->bind_result($col1, $col2, $col3, $col4, $col5, $col6, $songid);
		// then fetch and close the statement

		while ($row = $stmt->fetch()) {


echo '<table><tr><td>'
.$col1
.'</td><td>'
.$col2
.'</td><td>'
.$col3
.'</td><td>'
.$col4
.'</td><td>'
.$col5
.'</td><td>'
.$col6
.'</td>'
.'<td><a href="includes/userActions/deleteSongFromPlaylistAction.php?songid='.$songid.'&playlistid='.$value2.'">Delete track from Playlist</a></td>'
.'</tr></table>';



}

}

}



public function showAllSongs($sortMode){
	if(isset($_SESSION['lastWay'])){

	$way = $_SESSION['lastWay'];

	}else{

		$way = 'ASC';
	}
		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{

	if(isset($_SESSION['lastSort'])){

		if($_SESSION['lastSort'] == $sortMode){

			
			if($way == 'ASC'){
			
				$way = 'DESC';
				
			}else{
				$way = 'ASC';
			}
			$_SESSION['lastWay'] = $way;

		}

	}
	
	
		if(isset($_GET['album'])){
		$stmt = $mysqli->prepare(
			"SELECT artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			WHERE albums.name LIKE ?
			ORDER BY $sortMode $way
			");
		 $stmt->bind_param( "s", $_GET['album']); 
		// "ss' is a format string, each "s" means string
		}else if(isset($_GET['artist'])){
			$stmt = $mysqli->prepare(
			"SELECT artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			WHERE artists.name LIKE ?
			ORDER BY $sortMode $way
			");
		 $stmt->bind_param( "s", $_GET['artist']); 

		}



		else{
			$stmt = $mysqli->prepare(
			"SELECT artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			ORDER BY $sortMode $way
			");
		

		}




		$stmt->execute();

		$stmt->bind_result($artistname, $songname, $songlength, $albumname, $albumyear, $songid);
		// then fetch and close the statement

		while ($row = $stmt->fetch()) {


	echo '<tr><td>'
	.$songname
	.'</td><td>'
	.'<a href="?artist='.$artistname.'">'.$artistname.'</a>'
	.'</td><td>'
	.'<a href="?album='.$albumname.'">'.$albumname.'</a>'
	.'</td><td>'
	.$songlength
	.'</td><td>'
	.$albumyear
	.'</td>'
	.'<td><a href="includes/userActions/addSongToPlaylistAction.php?songid='.$songid.'">Add to Plist</a></td>'
	.'</tr>';


	}
	$_SESSION['lastSort'] = $sortMode;
	}

}

// End class
	}	
	


?>
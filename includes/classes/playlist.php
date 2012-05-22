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



public function showAllSongs(){
		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	$value2 = 1;
	$name = "Erics Life";
	$length = "02:30";
	echo "The connection worked perfectly<br />";

		$stmt = $mysqli->prepare(
		  "SELECT artists.name, songs.name, songs.length,albums.name, albums.year, songs.id FROM songs
		  LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
		  LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			");
		 
		// "ss' is a format string, each "s" means string
		$stmt->execute();

		$stmt->bind_result($artistname, $songname, $songlength, $albumname, $albumyear, $songid);
		// then fetch and close the statement

		while ($row = $stmt->fetch()) {


echo '<tr><td>'
.$songname
.'</td><td>'
.$artistname
.'</td><td>'
.$albumname
.'</td><td>'
.$songlength
.'</td><td>'
.$albumyear
.'</td>'
.'<td><a href="includes/userActions/addSongToPlaylistAction.php?songid='.$songid.'">Add to Plist</a></td>'
.'</tr>';


}

}

}

// End class
	}	
	


?>
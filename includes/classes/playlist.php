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
	$playlistid = 4;
	$songid = 3;
	$stmt->execute();
	


	echo 'inserted songid: '.$songid. 'playlistid is: '.$playlistid;



	

$mysqli->close();
		
}




public function showPlaylist(){
		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	$value2 = 4;
	$name = "Erics Life";
	$length = "02:30";
	echo "The connection worked perfectly<br />";

		$stmt = $mysqli->prepare(
		  "SELECT playlists.name, artists.name, songs.name, songs.length FROM songs
		  LEFT JOIN playlists_songs ON (playlists_songs.songid=songs.id)
		  LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
		  LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN playlists ON (playlists.id=?)
			WHERE playlists_songs.playlistid = 4

		  ");
		$stmt->bind_param( "i", $value2); 
		// "ss' is a format string, each "s" means string
		$stmt->execute();

		$stmt->bind_result($col1, $col2, $col3, $col4);
		// then fetch and close the statement

		while ($row = $stmt->fetch()) {


echo 'playlistName: '.$col1.'
';
echo 'artist: '.$col2.'
';
echo 'songname: '.$col3.'
';
echo 'length: '.$col4.'
<br />';

}

}

}

// End class
	}	
	


?>
<?php
$songid = $_GET['songid'];
$playlistid = $_GET['plid'];

$mysqli = new mysqli("localhost", "root", "", "diablofy");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$stmt = $mysqli->prepare("INSERT INTO playlists_songs (playlistid, songid) VALUES (?, ?)");
$stmt->bind_param("ii", $playlistid, $songid); 
// "ss' is a format string, each "s" means string	

$stmt->execute();

echo 'inserted songid: '.$songid. 'playlistid is: '.$playlistid;

$mysqli->close();
header("Location: ../../music.php")

?>

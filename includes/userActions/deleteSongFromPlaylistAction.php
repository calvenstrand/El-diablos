<?php
$songid = $_GET['songid'];
$playlistid = $_GET['playlistid'];


	$mysqli = new mysqli("localhost", "root", "", "diablofy");
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	
	
//(playlistid, songid) VALUES (?, ?)");
	$stmt = $mysqli->prepare("DELETE FROM playlists_songs WHERE playlistid = ? AND songid = ?");
	$stmt->bind_param("ii", $playlistid, $songid); 
	// "ss' is a format string, each "s" means string
	

	// "ss' is a format string, each "s" means string
	//$playlistid = 1;
	
	$stmt->execute();
	


	echo 'inserted songid: '.$songid. 'playlistid is: '.$playlistid;



	

$mysqli->close();

header('Location: ../../myplaylists.php?plist='.$playlistid);
return false;

		?>

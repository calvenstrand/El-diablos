<?php 

class Db{
var $mysqli;
public function connector(){
	$mysqli = new mysqli("localhost", "root", "", "diablofy");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
}


public function select1(){
	$mysqli = new mysqli("localhost", "root", "", "diablofy");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}else{
		$value2 = 30;
		$name = "Erics Life";
		$length = "02:30";
		echo "The connection worked perfectly<br />";

		$stmt = $mysqli->prepare(
			"SELECT songs.id,songs.name,songs.length,artists.name FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			RIGHT JOIN artists ON (artists_songs.artistid=artists.id)
			WHERE artists_songs.songid <= ?");
			$stmt->bind_param( "i", $value2); 
			// "ss' is a format string, each "s" means string
			$stmt->execute();
	
			$stmt->bind_result($col1, $col2, $col3, $col4);
			// then fetch and close the statement
	
			while ($row = $stmt->fetch()) {

				echo 'songId: '.$col1.'
				';
				echo 'name: '.$col2.'
				';
				echo 'length: '.$col3.'
				';
				echo 'artist: '.$col4.'
				<br />';
				
			}
		}
	}


	public function insert1(){
		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}else{
			$value2 = '2';
			$name = "Erics Life";
			$length = "02:30";
			echo "The connection worked perfectly";

				$stmt = $mysqli->prepare(
		  			"INSERT INTO songs ('name', 'id') VALUES ()
		   		");
				
			$stmt->bind_param( "i", $value2); 
			// "ss' is a format string, each "s" means string
			$stmt->execute();
	
			$stmt->bind_result($col1, $col2, $col3);
			// then fetch and close the statement
	
			while ($row = $stmt->fetch()) {


				echo 'songId: '.$col1.'
				';
				echo 'name: '.$col2.'
				';
				echo 'length: '.$col3.'
				';
			}
		}
	}
}
?>
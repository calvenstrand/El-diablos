<?php 

class Db{
var $mysqli;
	public function select1(){
		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	$value2 = 1;
	$name = "Erics Life";
	$length = "02:30";
	echo "The connection worked perfectly";

		$stmt = $mysqli->prepare(
		  "SELECT * FROM songs WHERE id = ?");
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

	

$mysqli->close();
		
}

	}


		public function insert1(){
		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	$value2 = 1;
	$name = "Erics Life";
	$length = "02:30";
	echo "The connection worked perfectly";

		$stmt = $mysqli->prepare(
		  "INSERT INTO songs WHERE id = ?");
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

	

$mysqli->close();
		
}

	}





}




 ?>
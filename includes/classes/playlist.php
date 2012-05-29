<?php

class Playlist
{
	var $activePlistName;
	var $activePlistId;
	var $plistid;
	var $genreid;
	public function createPlaylist ($userid, $plist) {
	$mysqli = new mysqli("localhost", "root", "", "diablofy");
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	$stmt = $mysqli->prepare("INSERT INTO playlists (name) VALUES (?)");
	$stmt->bind_param("s", $plist); 
	// "ss' is a format string, each "s" means string
	$stmt->execute();

	//New stuff
	$stmt = $mysqli->prepare("INSERT INTO users_playlists (userid, playlistid, owner) VALUES (?, ?, ?)");
	$stmt->bind_param("iii", $userid, $playlistid, $owner); 
	// "ss' is a format string, each "s" means string
	$playlistid = $mysqli->insert_id;
	$owner = 1;
	$stmt->execute();
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



public function myPlaylists(){
$userid = $_SESSION['userid'];
$mysqli = new mysqli("localhost", "root", "", "diablofy");
	$stmt = $mysqli->prepare(
		  "SELECT playlists.name, playlists.id FROM playlists
		  LEFT JOIN users_playlists ON (users_playlists.playlistid=playlists.id)
		  WHERE users_playlists.userid=?
		  ");
		$stmt->bind_param( "i", $userid); 
		$stmt->execute();
		$stmt->bind_result($playlistName, $plistId);
		while($row1 = $stmt->fetch()) {
			echo '<li value="'.$plistId.'" name="plistID">'.$playlistName.'</li>';
		}

}

public function addablePlaylists(){
$userid = $_SESSION['userid'];
$mysqli = new mysqli("localhost", "root", "", "diablofy");
	$stmt = $mysqli->prepare(
		  "SELECT playlists.name, playlists.id FROM playlists
		  LEFT JOIN users_playlists ON (users_playlists.playlistid=playlists.id)
		  WHERE users_playlists.userid=? AND users_playlists.owner=1
		  ");
		$stmt->bind_param( "i", $userid); 
		$stmt->execute();
		$stmt->bind_result($playlistName, $plistId);
		while($row1 = $stmt->fetch()) {
			echo '<li value="'.$plistId.'" name="plistID">'.$playlistName.'</li>';
		}

}

public function plistidfix ($id) {
	$this->plistid = $id;
}

public function genreidfix ($id) {
	$this->genreid = $id;
}

public function playlistnamefix ($id) {
	$mysqliprep = new mysqli("localhost", "root", "", "diablofy");
	$pliststmt = $mysqliprep->prepare("SELECT playlists.name FROM playlists WHERE playlists.id = ?");
	$pliststmt->bind_param("i", $id);
	$pliststmt->execute();
	$pliststmt->bind_result($plistname);
	$pliststmt->fetch();
	$this->activePlistName = $plistname;
}

public function plistownercheck ($plid, $userid) {
	$mysqlipre = new mysqli("localhost", "root", "", "diablofy");
	$pstmt = $mysqlipre->prepare("
	SELECT users_playlists.owner FROM users_playlists
	WHERE users_playlists.userid=? 
	AND users_playlists.playlistid=?
	AND users_playlists.owner=1
	");
	$pstmt->bind_param("ii", $userid, $plid); 
	$pstmt->execute();
	$pstmt->bind_result($owner);
	$pstmt->fetch();
	return $owner;
}

public function showPlaylist($playlistId, $sortMode){

		$mysqli = new mysqli("localhost", "root", "", "diablofy");
		if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	if(isset($_SESSION['lastWay'])){

	$way = $_SESSION['lastWay'];

	}else{

		$way = 'ASC';
	}
	if(isset($_SESSION['lastSort'])){

		if($_SESSION['lastSort'] == $sortMode){

			
			if($way == 'ASC'){
			
				$way = 'DESC';
				
			}else{
				$way = 'ASC';
			}
			$_SESSION['lastWay'] = $way;

		}

	
		$newStmt = $mysqli->prepare(
		  "SELECT users_playlists.owner  FROM users_playlists
			WHERE users_playlists.userid = ?
			AND users_playlists.playlistid = ?
		  ");
		$newStmt->bind_param( "ii", $_SESSION['userid'], $playlistId); 
		
		
		$newStmt->execute();

		$newStmt->bind_result($owner);
		while ($row = $newStmt->fetch()) {
			$dunder = $owner;
		}

			
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

		$stmt->bind_param( "ii", $playlistId, $playlistId); 
		
		
		$stmt->execute();

		$stmt->bind_result($col1, $col2, $col3, $col4, $col5, $col6, $songid);
		// then fetch and close the statement

		echo '
		<thead>
		<th><a href="?sortMode=song&plist='.$this->plistid.'">Song</a></th>
		<th><a href="?sortMode=artist&plist='.$this->plistid.'">Artist</a></th>
		<th><a href="?sortMode=album&plist='.$this->plistid.'">Album</a></th>
		<th><a href="?sortMode=length&plist='.$this->plistid.'">Length</a></th>
		<th><a href="?sortMode=year&plist='.$this->plistid.'">Year</a></th>';
		if ($dunder == 1) {
		echo '
		<th>Delete</th>
		';
		}
		echo '</thead>
		<tbody>
		';

		$this->playlistnamefix($playlistId);
		$fetched = false;
		while ($row = $stmt->fetch()) {
			$fetched = true;
			$this->activePlistName = $col1;
			$this->activePlistId = $playlistId;
			echo '<tr><td>'
			.$col3
			.'</td><td>'
			.$col2
			.'</td><td>'
			.$col5
			.'</td><td>'
			.$col4
			.'</td><td>'
			.$col6
			.'</td>';
			if($dunder == 1){
				echo '<td><a href="includes/userActions/deleteSongFromPlaylistAction.php?songid='.$songid.'&playlistid='.$playlistId.'"><img alt="Delete" src="img/cross.png" /></a></td>';
			}else{
				echo '<td></td>';
			}
			echo '</tr>';
		}
		if ($fetched == false) {
			echo '
			<tr>
				<td>No</td>
				<td>songs</td>
				<td>in</td>
				<td>this</td>
				<td>playlist</td>
				<td>!</td>
			</tr>
			';
		}
		
}

$_SESSION['lastSort'] = $sortMode;
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
			$_SESSION['selected'] = 'album='.$_GET['album'];
			$stmt = $mysqli->prepare(
			"SELECT artists.genreid AS genreid, genres.name AS genre, artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			LEFT JOIN genres ON (genres.id=artists.genreid)
			WHERE albums.name LIKE ?
			ORDER BY $sortMode $way
			");
		 	$stmt->bind_param( "s", $_GET['album']);
			
			$stmt1 = $mysqli->prepare(
			"SELECT artists.name, genres.id, albums.name FROM artists
			LEFT JOIN genres ON (artists.genreid=genres.id)
			LEFT JOIN artists_albums ON (artists.id=artists_albums.artistid)
			LEFT JOIN albums ON (artists_albums.albumid=albums.id)
			WHERE artists.genreid LIKE ?
			");
			$stmt1->bind_param("i", $_GET['genreid']);
			$stmt1->execute();
			$stmt1->bind_result($theartistname, $thegenreid, $thealbumname);
			echo 'Similar artists: ';
			$arr = array();
			while ($row = $stmt1->fetch()) {
				if ($thealbumname == $_GET['album']) {} else {
					if ($theartistname == $_GET['artist']) {} else {
						$arr[] = '<a href="?artist='.$theartistname.'&genreid='.$thegenreid.'">'.$theartistname.'</a>';
					}
				}
			}

			$uniquearr = array_unique($arr);
			for ($i = 0; $i < sizeof($uniquearr); $i++) {
				echo $uniquearr[$i] . ' ';
			}

		// "ss' is a format string, each "s" means string
		}else if(isset($_GET['artist'])){
			$_SESSION['selected'] = 'artist='.$_GET['artist'];
			$stmt = $mysqli->prepare(
			"SELECT artists.genreid AS genreid, genres.name AS genre, artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			LEFT JOIN genres ON (genres.id=artists.genreid)
			WHERE artists.name LIKE ?
			ORDER BY $sortMode $way
			");
		 	$stmt->bind_param( "s", $_GET['artist']); 

			$stmt1 = $mysqli->prepare(
			"SELECT artists.name, genres.id FROM artists
			LEFT JOIN genres ON (artists.genreid=genres.id)
			WHERE artists.genreid LIKE ?
			");
			$stmt1->bind_param("i", $_GET['genreid']);
			$stmt1->execute();
			$stmt1->bind_result($theartistname, $thegenreid);
			echo 'Similar artists: ';
			while ($row = $stmt1->fetch()) {
				if ($theartistname == $_GET['artist']) {} else {
			    echo '<span><a href="?artist=' . $theartistname . '&genreid=' . $thegenreid . '">' . $theartistname . '</a><span>';
					echo ' ';
				}
			}


		}else if(isset($_GET['search'])){
			//Searchgrej
			//$_SESSION['selected'] = 'album='.$_GET['album'];
			if(isset($_GET['search'])){
			$searchQuote = '%'.$_GET['search'].'%';
			}
			$stmt = $mysqli->prepare(
			"SELECT artists.genreid AS genreid, genres.name AS genre, artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			LEFT JOIN genres ON (genres.id=artists.genreid)
			WHERE (songs.name LIKE ?) OR (albums.name LIKE ?) OR (artists.name LIKE ?)
			ORDER BY $sortMode $way
			");
		 	$stmt->bind_param( "sss", $searchQuote, $searchQuote, $searchQuote);
			
			$stmt1 = $mysqli->prepare(
			"SELECT artists.name, genres.id, albums.name FROM artists
			LEFT JOIN genres ON (artists.genreid=genres.id)
			LEFT JOIN artists_albums ON (artists.id=artists_albums.artistid)
			LEFT JOIN albums ON (artists_albums.albumid=albums.id)
			WHERE artists.genreid LIKE ?
			");
			$stmt1->bind_param("i", $_GET['genreid']);
			$stmt1->execute();
			$stmt1->bind_result($theartistname, $thegenreid, $thealbumname);
			//echo 'Similar artists: ';
			$arr = array();
			while ($row = $stmt1->fetch()) {
				if ($thealbumname == $_GET['album']) {} else {
					if ($theartistname == $_GET['artist']) {} else {
						$arr[] = '<a href="?artist='.$theartistname.'&genreid='.$thegenreid.'">'.$theartistname.'</a>';
					}
				}
			}

			$uniquearr = array_unique($arr);
			for ($i = 0; $i < sizeof($uniquearr); $i++) {
				echo $uniquearr[$i] . ' ';
			}








		}



		else{
			$_SESSION['selected'] = '';
			$stmt = $mysqli->prepare(
			"SELECT artists.genreid AS genreid, genres.name AS genre, artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
			LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
			LEFT JOIN artists ON (artists_songs.artistid=artists.id)
			LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
			LEFT JOIN albums ON (albums.id=albums_songs.albumid)
			LEFT JOIN genres ON (genres.id=artists.genreid)
			ORDER BY $sortMode $way
			");
		

		}




		$stmt->execute();

		$stmt->bind_result($genreid, $genre, $artistname, $songname, $songlength, $albumname, $albumyear, $songid);
		// then fetch and close the statement
		
		while ($row = $stmt->fetch()) {

	echo '<tr><td>'
	.$songname
	.'</td><td>'
	.'<a href="?artist='.$artistname.'&genreid='.$genreid.'">'.$artistname.'</a>'
	.'</td><td>'
	.'<a href="?artist='.$artistname.'&album='.$albumname.'&genreid='.$genreid.'">'.$albumname.'</a>'
	.'</td><td>'
	.$genre
	.'</td><td>'
	.$songlength
	.'</td><td>'
	.$albumyear
	.'</td>'
	.'<td>';
	if(isset($_SESSION['userid'])){
	echo '<div class="size">
            <input type="text" name="noobChristoffer" value="Choose a Playlist" class="field" readonly="readonly" />
            <input type="hidden" name="select" value="" class="fest"/>
            <input type="hidden" name="id" value="'.$songid.'" class="finid"/>
         <ul class="list">
            ';
            $this->addablePlaylists();
            echo'
            </ul>
            </div>';}
	echo '</td>'
	.'</tr>';
//<a href="includes/userActions/addSongToPlaylistAction.php?songid='.$songid.'">Add to Plist</a>

	}
	$_SESSION['lastSort'] = $sortMode;
	}

}








public function showUsers(){
	$actualid = $_SESSION['userid'];
	$mysqli = new mysqli("localhost", "root", "", "diablofy");
	$stmt = $mysqli->prepare("SELECT users.id, users.username FROM users
		WHERE (users.id != '$actualid')");
		$stmt->execute();
		$stmt->bind_result($usersId, $username);
			while($row1 = $stmt->fetch()) {
			echo '<li value="'.$usersId.'" name="plistID"><span>'.$username.'</span> <input type="checkbox" name="option" id="owner" /><a href="#" id="blueButton" class="button blue">ADD</a></li>';
		}

}


public function inviteToPlaylist($userToInvite, $playlistid, $owner){
$mysqli = new mysqli("localhost", "root", "", "diablofy");
	$stmt = $mysqli->prepare(
		  "INSERT INTO users_playlists (userid, playlistid, owner) VALUES (?, ?, ?)
		  ");
		 $stmt->bind_param( "iii", $userToInvite, $playlistid, $owner); 
		$stmt->execute();
		
		}

// End class
	}	
	


?>

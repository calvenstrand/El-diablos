<?php

include('includes/dbClass.php');
include('includes/classes/playlist.php');
$db = new Db();
$pList = new Playlist();
//$db->connector();
//$pList->createPlaylist();


//$pList->sendSongToPlaylist();
//$pList->showPlaylist();
$pList->showAllSongs();

?>

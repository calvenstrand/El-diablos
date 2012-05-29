<?php  
	include('includes/dbClass.php');
	include('includes/classes/playlist.php');
	$db = new Db();
	$pList = new Playlist();
	$pList->showPlaylist();
?>
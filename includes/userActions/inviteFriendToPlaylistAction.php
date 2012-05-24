<?php

session_start();
include('../classes/playlist.php');

$playlistid = $_GET['plid'];
$userid = $_GET['userid'];
$owner = $_GET['owner'];

$playlist = new Playlist();
$playlist->inviteToPlaylist($userid, $playlistid, $owner);

//header('Location: ../../myplaylists.php');
//exit;
?>
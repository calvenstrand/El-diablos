<?php

session_start();
include('../classes/playlist.php');

$playlistid = $_GET['plid'];
$userid = $_GET['userid'];

$playlist = new Playlist();
$playlist->inviteToPlaylist($userid, $playlistid);

//header('Location: ../../myplaylists.php');
//exit;
?>
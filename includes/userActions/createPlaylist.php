<?php

session_start();
include('../classes/playlist.php');

$playlistname = $_POST['playlistname'];
$userid = $_SESSION['userid'];

$playlist = new Playlist();
$playlist->createPlaylist($userid, $playlistname);

header('Location: ../../myplaylists.php');
exit;

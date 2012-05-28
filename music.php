<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php
    session_start();
		include_once ('includes/head.php');
        include('includes/classes/playlist.php');
        $pList = new Playlist();
        if(isset($_GET['sortMode'])){
            $sortMode = $_GET['sortMode'];
        }else{
            $_SESSION['selected'] = '';
            $sortMode = 'artist';

        }

        if(isset($_GET['album'])){
            $_SESSION['selected'] = 'album='.$_GET['album'];}
            if(isset($_GET['artist'])){
            $_SESSION['selected'] = 'artist='.$_GET['artist'];}


        if(isset($_SESSION['selected'])){
            $argument = '&'.$_SESSION['selected'];
        }else{
            $argument = '';
        }

	?>
</head>
<body>

	<div id="container">
		<?php
            include_once ('includes/header.php');
           

        ?>
    
        <div class="main" role="main">
        
			<table id="table">
                <thead>
                    <?php  
                    
                     echo'<th><a href="?sortMode=song'.$argument.'">Song</a></th>
                        <th><a href="?sortMode=artist'.$argument.'">Artist</a></th>
                        <th><a href="?sortMode=album'.$argument.'">Album</a></th>
                        <th><a href="?sortMode=length'.$argument.'">Length</a></th>
                        <th><a href="?sortMode=year'.$argument.'">Year</a></th>
                    ';?>
                    <th>
                        <?php if (isset($_SESSION['userid'])){
                            echo 'Add';
                        } ?>
                        </th>
                </thead>
                <tbody>
                    <?php
                    $pList->showAllSongs($sortMode);
                    ?>
                </tbody>
            </table>
        
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
        <script type="text/javascript" src="js/scriptMusic.js"></script>
	</div>
</body>
</html>
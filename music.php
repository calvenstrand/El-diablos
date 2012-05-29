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
            $_SESSION['selected'] = 'album='.$_GET['album'];
		}
		
        if(isset($_GET['artist'])){
            $_SESSION['selected'] = 'artist='.$_GET['artist'];
		}


        if(isset($_SESSION['selected'])){
            $argument = '&'.$_SESSION['selected'];
        }else{ 
            $argument = '';
        }

        if(isset($_GET['search'])){
            if(isset($_POST['q'])){
            	$_GET['search'] = $_POST['q'];   
            }
            $arg2 = '&search='.$_GET['search'];
			
        }else{
            $arg2='';
        }

		if (isset($_GET['genreid'])) {
			$pList->genreidfix($_GET['genreid']);
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
                    if (isset($_GET['genreid'])) {
                     echo'<th><a href="?sortMode=song'.$argument.$arg2.'&genreid='.$pList->genreid.'">Song</a></th>
                        <th><a href="?sortMode=artist'.$argument.$arg2.'&genreid='.$pList->genreid.'">Artist</a></th>
                        <th><a href="?sortMode=album'.$argument.$arg2.'&genreid='.$pList->genreid.'">Album</a></th>
                        <th><a href="?sortMode=genre'.$argument.$arg2.'&genreid='.$pList->genreid.'">Genre</a></th>
                        <th><a href="?sortMode=length'.$argument.$arg2.'&genreid='.$pList->genreid.'">Length</a></th>
                        <th><a href="?sortMode=year'.$argument.$arg2.'&genreid='.$pList->genreid.'">Year</a></th>
                    ';
										} else {
                     echo'<th><a href="?sortMode=song'.$argument.$arg2.'">Song</a></th>
                        <th><a href="?sortMode=artist'.$argument.$arg2.'">Artist</a></th>
                        <th><a href="?sortMode=album'.$argument.$arg2.'">Album</a></th>
                        <th><a href="?sortMode=genre'.$argument.$arg2.'">Genre</a></th>
                        <th><a href="?sortMode=length'.$argument.$arg2.'">Length</a></th>
                        <th><a href="?sortMode=year'.$argument.$arg2.'">Year</a></th>
                    ';
										}
										?>

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
	</div>
</body>
</html>

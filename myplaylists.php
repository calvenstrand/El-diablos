<?php
session_start();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php
		include_once ('includes/head.php');
        include('includes/classes/playlist.php');
        $pList = new Playlist();
        if(isset($_GET['sortMode'])){
            $sortMode = $_GET['sortMode'];
        }else{
            $sortMode = 'artist';

        }
        if(isset($_POST['select'])){
            $_GET['plist'] = $_POST['select'];

        }
        if(isset($_GET['plist'])){
            $plistChosen = 1;
            $playlistId = $_GET['plist'];
        }else{
            $plistChosen = 0;
        }

	?>
</head>
<body>

	<div id="container">
		<?php
        
            include_once ('includes/header.php');
            
        ?>
    
        <div class="main" role="main">
        	<h2 style="text-align:center">My Playlists</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="size">
            <input type="text" name="noobChristoffer" value="Choose a Playlist" class="field" readonly="readonly" />
            <input type="hidden" name="select" value="" class="fest"/>
         <ul class="list">
            <?php $pList->myPlaylists(); ?>
            </ul>
            </div>


            
                <?php
                    


                    

                   /* <select name="select">
                <option>-- Välj Spellista --</option>  
        	</select>*/



            ?>
            <input type="submit" value="Change pList" name="send">
            </form>

          	<table id="table">

                <thead>
                    <?php 
                    echo '<th><a href="?sortMode=song&plist='.$plistChosen.'">Song</a></th>
                    <th><a href="?sortMode=artist&plist='.$plistChosen.'">Artist</a></th>
                    <th><a href="?sortMode=album&plist='.$plistChosen.'">Album</a></th>
                    <th><a href="?sortMode=length&plist='.$plistChosen.'">Length</a></th>
                    <th><a href="?sortMode=year&plist='.$plistChosen.'">Year</a></th>
                    <th>Delete</th>';
                    ?>
                </thead>
                <tbody>
                    <?php
                    if($plistChosen == 1){
                    $pList->showPlaylist($playlistId, $sortMode);
                    }
                    ?>
                </tbody>
            </table>  
        active list: <?php echo $pList->activePlistName; ?>
        <a href="">Skapa en ny spellista</a>
        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>
<script type="text/javascript" src="js/script.js"></script>
        </div>
</body>
</html>

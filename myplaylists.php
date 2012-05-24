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
					<div class="size">
						<form id="addlist" action="includes/userActions/createPlaylist.php" method="post">
          		<input id="addplist" type="text" name="playlistname" placeholder="Add a Playlist" class="field" style="margin-bottom:5px;" />
						</form>
          </div>


							<form id="chooseplist" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="size">
            <input id="lolboll" type="text" name="noobChristoffer" value="Choose a Playlist" class="field" readonly="readonly" />
            <input id="chooseplist" type="hidden" name="select" value="" class="fest"/>
         <ul id="list" class="list">
            <?php $pList->myPlaylists(); ?>
            </ul>
            </div>


            
                <?php
                    


                    

                   /* <select name="select">
                <option>-- Välj Spellista --</option>  
        	</select>*/



            ?>
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

        <?php
				if ($pList->activePlistName) {
					echo 'Active list: ' . $pList->activePlistName; 
				}
				?>

        </div>
    
        <?php
            include_once ('includes/footer.php');
        ?>

	</div>
	<script type="text/javascript" src="js/playlist.js"></script>=
	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>

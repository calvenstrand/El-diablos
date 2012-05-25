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
	?>
</head>
<body>

	<div id="container">
		<?php
            include_once ('includes/header.php');
        ?>
    
        <div class="main" role="main">

			<?php

            $mysqli = new mysqli("localhost", "root", "", "diablofy");
             $stmt = $mysqli->prepare(
            "SELECT artists.name AS artist, songs.name AS song, songs.length AS length,albums.name AS album, albums.year AS year, songs.id FROM songs
            LEFT JOIN artists_songs ON (artists_songs.songid=songs.id)
            LEFT JOIN artists ON (artists_songs.artistid=artists.id)
            LEFT JOIN albums_songs ON (songs.id = albums_songs.songid)
            LEFT JOIN albums ON (albums.id=albums_songs.albumid)
            WHERE songs.name LIKE ?
            
            ");
         $stmt->bind_param( "s", $nyh); 
         $nyh = '%'.$_POST['q'].'%';
       
        $stmt->execute();

        $stmt->bind_result($artistname, $songname, $songlength, $albumname, $albumyear, $songid);
           
            while ($row = $stmt->fetch()) {

                echo $songname.'<br />';
            }
            
            
           
            
            ?>
            
            <form action="search.php" method="get" name="search">
                <div align="center">
                    <input name="q" type="text" value=”<?php echo $var;?>" size="15">
                    <input name="search" type="submit" value="Search">
                </div>
            </form>
            
            <?php
            
            // display what the person searched for.
            if( isset ($resultmsg)) {
                echo $resultmsg;
                exit();
            } else{
                echo "Search results for: " . $var;
            }
            
            foreach($newarr as $value){
                // EDIT HERE and specify your table and field names for the SQL query
                $query_value = "SELECT * FROM artists WHERE id = ‘$value’";
                $num_value = mysql_query($query_value);
                $row_linkcat = mysql_fetch_array($num_value);
                $row_num_links = mysql_num_rows($num_value);
                
                //now let’s make the keywods bold. To do that we will use preg_replace function.
                //EDIT parts of the lines below that have fields names like $row_linkcat[ 'field1' ]
                //This script assumes you are searching only 3 fields. If you are searching more fileds make sure that add appropriate line.
                $name = preg_replace ( "‘($var)’si" , "<b>\\1</b>" , $row_linkcat[ 'name' ] );
            
                foreach($trimmed_array as $trimm){
                    if($trimm != ‘b’ ){
                        //IF you added more fields to search make sure to add them below as well.
                        $name = preg_replace( "‘($trimm)’si" ,  "<b>\\1</b>" , $name);
                    } //end highlight
					
					?>                    
                        <p>
                            <?php echo $name; ?><br>
                        </p>                    
                    <?php
            
                }   //end foreach $trimmed_array
            
                if($row_num_links_main > $limit){
                    // next we need to do the links to other search result pages
                    if ($s>=1) { 
						// do not display previous link if ‘s’ is ’0′
                        $prevs=($s-$limit);
                        echo "<div align=’left’><a href=’$PHP_SELF?s=$prevs&q=$var&catid=$catid’>Previous " .$limit. "</a></div>";
                    }
            
                    // check to see if last page
                    $slimit =$s+$limit;
                    if (!($slimit >= $row_num_links_main) && $row_num_links_main!=1) {
                        // not last page so display next link
                        $n=$s+$limit;
                        echo "<div align=’right’><a href=’$PHP_SELF?s=$n&q=$var&catid=$catid’>Next " .$limit. "</a></div>";
                    
                    }
            
                }
            
            }  //end foreach $newarr
            
            ?>
			
		</div>
	</div>
        <?php
            include_once ('includes/footer.php');
        ?>
        
        <script type="text/javascript" src="js/script.js"></script>
	</div>
</body>
</html>

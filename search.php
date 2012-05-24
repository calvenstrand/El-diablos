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
            $hostname_logon = "localhost" ;
            $database_logon = "diablofy" ;
            $username_logon = "chippen1989" ;
            $password_logon = "hest" ;
            
            //open database connection
            $connections = mysql_connect($hostname_logon, $username_logon, $password_logon) or die ( "Unable to connect to the database" );
            
            //select database
            mysql_select_db($database_logon) or die ( "Unable to select database!" );
            
            //specify how many results to display per page
            $limit = 10;
            
            // Get the search variable from URL
            $var = @$_GET['q'] ;
            
            //trim whitespace from the stored variable
            $trimmed = trim($var);
            
            //separate key-phrases into keywords
            $trimmed_array = explode(" ",$trimmed); // check for an empty string and display a message.
            
            if ($trimmed == "") {
                $resultmsg =  "<p>Search Error</p><p>Please enter a search…</p>" ;
            }
			
			// check for a search parameter
            if (!isset($var)){
                $resultmsg =  "<p>Search Error</p><p>We don’t seem to have a search parameter! </p>" ;
            }
            
            // Build SQL Query for each keyword entered
            foreach ($trimmed_array as $trimm){
            
            // EDIT HERE and specify your table and field names for the SQL query
            $query = "SELECT * FROM songs AND artists AND albums WHERE name LIKE \"%$trimm%\" ORDER BY name DESC" ;
            
            // Execute the query to  get number of rows that contain search kewords
            $numresults = mysql_query($query);
            $row_num_links_main = mysql_num_rows($numresults);     
            
            // next determine if ‘s’ has been passed to script, if not use 0.
            // ‘s’ is a variable that gets set as we navigate the search result pages.
            if (empty($s)) {
                $s=0;
            }     
            
            // now let’s get results.
            $query .= " LIMIT $s,$limit" ;
            $numresults = mysql_query ($query) or die ( "Couldn’t execute query" );
            $row= mysql_fetch_array ($numresults);
            
            //store record id of every item that contains the keyword in the array we need to do this to avoid display of duplicate search result.
            do {
                //EDIT HERE and specify your field name that is primary key
                $adid_array[] = $row[ 'customer_id' ];
            }
            
            while( $row= mysql_fetch_array($numresults));
            } //end foreach
            
            if($row_num_links_main == 0 && $row_set_num == 0){
                $resultmsg = "<p>Search results for: $trimmed </p><p>Sorry, your search returned zero results</p>" ;
            }
            
            //delete duplicate record id’s from the array. To do this we will use array_unique function
            $tmparr = array_unique($adid_array);
            $i=0;
            foreach ($tmparr as $v) {
                $newarr[$i] = $v;
                $i++;
            } // now you can display the results returned. But first we will display the search form on the top of the page
            
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
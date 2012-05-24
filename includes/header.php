<header>
				
	<div class="login-bar" />
    	<div class="search">			
            <form name="form" action="search.php" method="get">
                Search for your favorite song: 
                <input type="text" name="q" />
                <input type="submit" name="Submit" value="Search" class="submit" />
            </form>
        </div>
    	<ul>
				<?php
				if (!isset($_SESSION['username'])) {
				?>
            <li id="login">
                <a id="login-trigger" href="#">
                	Log in<span>▼</span>
                </a>
                <div id="login-content">
                    <form action="includes/login/login.php" method="post">
                        <fieldset id="inputs">
                            <input id="username" type="username" name="username" placeholder="Your Username" required>
                            <input id="password" type="password" name="password" placeholder="Password" required>
                        </fieldset>
                        <fieldset id="actions">
                            <input type="submit" id="submit" value="Log in">
                        </fieldset>
                    </form>
                </div>
            </li>
            <li id="signup">
                    <a href="register.php">Register</a>
            </li>
						<?php
						} else {
						?>
						<li id="myplaylists">
							<a href="myplaylists.php">My playlists</a>
						</li>
						<li id="signup">
							<a href="includes/login/logout.php">Log out</a>
						</li>
						<?php
						}
						?>
        </ul>
    </div>
    
    <nav>
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="music.php">Music</a></li>
            <li><a href="toplists.php">Top Lists</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    
	<a href="index.php"><img src="img/logo.jpg" /></a>
    
</header>

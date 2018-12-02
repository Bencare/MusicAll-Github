<?php
$logout = "'?section=" . $section . "&sectionlog=";
	echo "<h1>A bientôt ";
	if (!empty($_SESSION['username'])) {
	echo $_SESSION['username'] . "</h1>" ; 
		
	} else {
		echo "</h1>";
	}
    echo "<h2><a href=" .$logout . "''>Se connecter</a></h2>";





      ?>
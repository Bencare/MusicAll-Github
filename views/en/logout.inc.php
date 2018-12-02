<?php
$logout = "'?section=" . $section . "&sectionlog=";
	echo "<h1>Goodbye ";
	if (!empty($_SESSION['username'])) {
	echo $_SESSION['username'] . "</h1>" ; 
		
	} else {
		echo "</h1>";
	} 
    echo "<h2><a href=" . $logout . "''>Log in</a></h2>";
    





      ?>
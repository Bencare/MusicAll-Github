<?php
if($debug == "1")
	{
	echo "<div id=\"debug\">";
		
	echo "<h2>Paramètres GET</h2>";
	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
	
	echo "<h2>Paramètres POST</h2>";
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	echo "</div>";
	}
?>
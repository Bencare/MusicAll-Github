<?php

echo "<h2>List of albums by artist</h2>
<table>";

$i = 0;

foreach($records as $record)
	{
		switch ($i) {
			case 0: echo "<tr>"; break;

			case 5: echo "<tr>"; break;
			case 11: echo "<tr>"; break;
			case 17: echo "<tr>"; break;
			
			default:
				
				break;
		}
	
	echo "<td><a href='?section=fichealbum&id=" . $record["ID"] . "'>" . $record["Titre"] ."</a><br />";
	echo $record["Anneeparution"] ."<br />";
	//echo "<td>". $record["description"] . "</td>";
	 if (file_exists("data/images/" . $record['image'])) {
    echo "<img height='300px' src=\"data/images/" . $record['image'] . "\">";    
	} 

	echo "</td>";
	switch ($i) {
			

			case 4: echo "</tr>"; break;
			case 11: echo "</tr>"; break;
			case 17: echo "</tr>"; break;
			
			default:
				
				break;
		}
		$i++;

}
echo "</table> <br />
	<form action=\"?\" method=\"get\"> 
	<INPUT TYPE=\"button\" VALUE=\"Back\" onClick=\"history.go(-1);\">
    <input type=\"submit\" value=\"Cancel\" name=\"section\"></form>";


?>
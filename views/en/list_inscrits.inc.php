<h2>List of guests for this event :</h2>
<table >
	<tr>
		<th>Last name</th>
		<th>First name</th>
		<?php if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok" && $_SESSION["grade"] < 4)
   		{ 
			echo "<th>Mail</th>";
	 		} ?>
		
		<th>Tickets ordered</th>
	</tr>

<?php

foreach($records as $record)
	{
	echo "<tr>";
	echo "<td>" . $record["nom"] ."</td>";
	echo "<td>". $record["prenom"] ."</td>";




	if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok" && $_SESSION["grade"] < 4)
   { 
	echo "<td>". $record["email"] ."</td>";
	 }

	echo "<td>". $record["places"] ."</td>";

	echo "</tr>";

	}
?>
</table><br />

<form method="GET" action="?">
	<input type='hidden' name='section' value='list_inscrits'/>
	<input type='hidden' name='id' value='<?php echo $_GET["id"]; ?>' >

	Search :<input type="text" name="motcle"><input type="submit" name="submotcle" value="Search"></form>

	<?php if(isset($_GET["submotcle"])){
	
	echo "<form action=\"?\" method=\"GET\">
	<input type='hidden' name='section' value='list_inscrits'/>
	<input type='hidden' name='id' value='". $_GET["id"] . "'
	<input type=\"submit\" value=\"Back to the list of guests\" >
</form>";
}

?>



<form action="?" method="get"> 
	<input type="hidden" name="section" value="list_concerts">

    <input type="submit" value="Back to the list of events">

 </form>
<h2>Liste des inscrits à l'évènement :</h2>
<table >
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<?php if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok" && $_SESSION["grade"] < 4)
   		{ 
			echo "<th>Email</th>";
	 		} ?>
		
		<th>Nombre de places réservées</th>
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

	Rechercher :<input type="text" name="motcle"><input type="submit" name="submotcle" value="Rechercher"></form>

	<?php if(isset($_GET["submotcle"])){
	
	echo "<form action=\"?\" method=\"GET\">
	<input type='hidden' name='section' value='list_inscrits'/>
	<input type='hidden' name='id' value='". $_GET["id"] . "'
	<input type=\"submit\" value=\"Retour à la liste des inscrits\" >
</form>";
}

?>



<form action="?" method="get"> 
	<input type="hidden" name="section" value="list_concerts">

    <input type="submit" value="Retour à la liste des concerts">

 </form>
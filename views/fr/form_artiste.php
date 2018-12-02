<?php	

if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok")
   { 


echo "<form action=\"?\" method=\"post\" enctype=\"multipart/form-data\">
	<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"800000\" />	
	
	<input type='hidden' name='section' value='form_artist'/>

	Entrez un nom d'artiste : <input type=\"text\" name=\"nom\"> <br />
	Entrez un prénom d'artiste : <input type=\"text\" name=\"prenom\"> <br />
	Entrez un surnom d'artiste : <input type=\"text\" name=\"surnom\"><br />
	Entrez le lieu de naissance : <input type=\"text\" name=\"lieuNaissance\"><br />
	Entrez une date de naissance : <input type=\"date\" name=\"dateNaissance\"><br />
	Entrez le site web : <input type=\"text\" name=\"site\"><br />
	Entrez la biographie : <textarea name=\"bio\" rows=\"5\" cols=\"40\"></textarea><br />

	Entrez le style de musique de l'artiste : <select name=\"liaisonCat\" size=\"1\">";

				
		foreach($records as $record)
			{
			echo "<option value=\"". $record["ID"] . "\">";
			echo $record['categorie'];
			echo "</option>";

			}
		


	echo "
		</select> <br />




    Selectionnez une image pour l'artiste:
    <input type=\"file\" name=\"fileToUpload\"><br />
    <input type=\"submit\" value=\"Envoyer\" name=\"submitartiste\">
</form> 

     
 <form action=\"?\" method=\"get\"> 
    <input type=\"submit\" value=\"Annuler\" name=\"section\"></form>";

    } else {

    echo "<h2> Vous devez être connecté pour ajouter un artiste.</h2>";
}

    ?>
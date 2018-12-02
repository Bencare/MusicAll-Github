<?php


echo "<form action=\"?\" method=\"post\" enctype=\"multipart/form-data\">
	<input type='hidden' name='section' value='form_album'/>
	Selectionnez l'artiste : <select name=\"liaisonArtist\" size=\"1\">";
				
		foreach($records as $record)
			{
			echo "<option value=\"". $record["ID"] . "\">";
			echo $record["Surnom"];
			echo "</option>";

			}
		


			echo "
		</select> <br />

	Entrez le style de musique de cet album : <select name=\"liaisonCat\" size=\"1\">";

				
		foreach($records2 as $record)
			{
			echo "<option value=\"". $record["ID"] . "\">";
			echo $record['categorie'];
			echo "</option>";

			}
		


	echo "
		</select> <br />	
	
	Entrez le titre de l'album: <input type=\"text\" name=\"titrealbum\"><br />
	Entrez l'année de parution : <input type=\"date\" name=\"dateParution\"><br />
	Entrez la cote : <input type=\"text\" name=\"cote\"><br />
	Entrez la description : <textarea name=\"description\" rows=\"5\" cols=\"40\"></textarea><br />




    Selectionnez une image pour cet album:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"><br />
    <input type=\"submit\" value=\"Envoyer\" name=\"submitalbum\">
</form> 
     
    <form action=\"?\" method=\"get\"> 
    <input type=\"submit\" value=\"Annuler\" name=\"section\"></form>.";


    ?>
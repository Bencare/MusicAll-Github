<?php	

if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok")
   { 


echo "<form action=\"?\" method=\"post\" enctype=\"multipart/form-data\">
	<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"800000\" />	
	
	<input type='hidden' name='section' value='form_artist'/>

	Enter artist last name : <input type=\"text\" name=\"nom\"> <br />
	Enter artist first name : <input type=\"text\" name=\"prenom\"> <br />
	Enter artist nickname : <input type=\"text\" name=\"surnom\"><br />
	Enter artist birthplace : <input type=\"text\" name=\"lieuNaissance\"><br />
	Enter artist birthday : <input type=\"date\" name=\"dateNaissance\"><br />
	Enter artist website : <input type=\"text\" name=\"site\"><br />
	Enter artist biography : <textarea name=\"bio\" rows=\"5\" cols=\"40\"></textarea><br />

	Enter artist music style : <select name=\"liaisonCat\" size=\"1\">";

				
		foreach($records as $record)
			{
			echo "<option value=\"". $record["ID"] . "\">";
			echo $record['categorie'];
			echo "</option>";

			}
		


	echo "
		</select> <br />




    Choose an image for this artist:
    <input type=\"file\" name=\"fileToUpload\"><br />
    <input type=\"submit\" value=\"Submit\" name=\"submitartiste\">
</form> 

     
 <form action=\"?\" method=\"get\"> 
    <input type=\"submit\" value=\"Cancel\" name=\"section\"></form>";

    } else {

    echo "<h2> You have to be logged in to add an artist.</h2>";
}

    ?>
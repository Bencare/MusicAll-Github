<?php


echo "<form action=\"?\" method=\"post\" enctype=\"multipart/form-data\">
	<input type='hidden' name='section' value='form_album'/>
	Select artist : <select name=\"liaisonArtist\" size=\"1\">";
				
		foreach($records as $record)
			{
			echo "<option value=\"". $record["ID"] . "\">";
			echo $record["Surnom"];
			echo "</option>";

			}
		


			echo "
		</select> <br />

	Select album style : <select name=\"liaisonCat\" size=\"1\">";

				
		foreach($records2 as $record)
			{
			echo "<option value=\"". $record["ID"] . "\">";
			echo $record['categorie'];
			echo "</option>";

			}
		


	echo "
		</select> <br />	
	
	Enter album's title: <input type=\"text\" name=\"titrealbum\"><br />
	Enter release date : <input type=\"date\" name=\"dateParution\"><br />
	Enter rating : <input type=\"text\" name=\"cote\"><br />
	Enter a description : <textarea name=\"description\" rows=\"5\" cols=\"40\"></textarea><br />




    Upload an image for this album :
    <input type=\"file\" name=\"fileToUpload\" value=\"Choose a file\" id=\"fileToUpload\"><br />
    <input type=\"submit\" value=\"Submit\" name=\"submitalbum\">
</form> 
     
    <form action=\"?\" method=\"get\"> 
    <input type=\"submit\" value=\"Cancel\" name=\"section\"></form>.";


    ?>
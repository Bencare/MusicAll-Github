<?php


		

			$path = "data/concerts.xml";
			if (file_exists($path)) {
				
					echo "<div class='flexbox-container'>";


				$root = simplexml_load_file($path);
				foreach ($root as $concert) {
					echo "<div class=\"card\" >";
					echo "<div class=\"card-body\">";

					
					echo "<h5 class=\"card-title\">" . $concert->nom . "</h5>" . "\n";
					echo "<h4>" . $concert->artiste . "</h4>" . "\n";
					echo "<p class=\"card-text\">" . $concert->date . "<p>" . "\n";
					echo "<p class=\"card-text\">" . $concert->lieu . "<p>" . "\n";
					echo "<p class=\"card-text\">" . $concert->note . "<p>" . "\n";
					echo "<a href='?section=list_inscrits&nom=" . $concert->name . "&id=" . $concert->id .  "' class=\"btn btn-primary\">Liste des inscrits</a><br />";
					echo "<a href='?section=form_concerts&nom=" . $concert->name . "&id=" . $concert->id .  "' class=\"btn btn-primary\">Réservation</a>";
					echo "</div>";
					echo "</div>";


				}
					echo "</div>";


			}


echo "<div class='container' ><form action=\"?\" method=\"get\"> 
	
    <input type=\"submit\" value=\"Annuler\" class='btn btn-primary btn-large' name=\"section\">

    </form></div>"

/*<INPUT TYPE=\"button\" VALUE=\"Retour\" onClick=\"history.go(-1);\">*/
?>







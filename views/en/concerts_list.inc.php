<?php


		

			$path = "data/concerts.xml";
			if (file_exists($path)) {
				
				$xml = simplexml_load_file($path);

				$lang = "'".$_SESSION['lang']."'";

				$id = $xml->xpath("//*[@lang=$lang]");
				
				$id2 = $xml->xpath("//*[@id]");
				
				
					
				$zero = 0; $trois = 3; $quatre = 4; $cinq = 5; $six = 6;
				$deux = 2; $un = 1;

					echo "<div class='flexbox-container'>";

				foreach ($id2 as $concert) {
					
					
					echo "<div class=\"card\" >";
					/*<img class=\"card-img-top\" src=\"...\" alt=\"Card image cap\">*/
					echo "<div class=\"card-body\">";
					echo "<h5 class=\"card-title\">" . $id[$zero] . "</h5>" . "\n";
					echo "<h4>" . $id[$deux] . "</h4>" . "\n";
					echo "<p class=\"card-text\">" . $id[$trois] . "<p>" . "\n";
					echo "<p class=\"card-text\">" . $id[$quatre] . "<p>" . "\n";
					echo "<p class=\"card-text\">" . $id[$cinq] . "<p>" . "\n";
					echo "<a href='?section=list_inscrits&nom=" . $id[$un] . "&id=" . $id[$six] .  "' class=\"btn btn-primary\">Show list of guests</a><br />";
					echo "<a href='?section=form_concerts&nom=" . $id[$un] . "&id=" . $id[$six] .  "' class=\"btn btn-primary\">Book your ticket online</a>";
					echo "</div>";
					echo "</div>";


					$zero += 7; $trois += 7; $quatre += 7; $cinq += 7; $six += 7;
					$deux += 7; $un += 7;

					
					
				}
					echo "</div>";

				/*echo "<div class=\"card\" style=\"width: 18rem;\">
  <img class=\"card-img-top\" src=\"...\" alt=\"Card image cap\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">Card title</h5>
    <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href=\"#\" class=\"btn btn-primary\">Go somewhere</a>
  </div>
</div>";*/

			}


echo "<div class='container' ><form action=\"?\" method=\"get\"> 
	
    <input type=\"submit\" value=\"Cancel\" class='btn btn-primary btn-large' name=\"section\">

    </form></div>"

/*<INPUT TYPE=\"button\" VALUE=\"Retour\" onClick=\"history.go(-1);\">*/
?>







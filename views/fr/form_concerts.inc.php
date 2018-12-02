<?php


		

			$path = "data/concerts.xml";
			if (file_exists($path)) {
				

						$xml = simplexml_load_file($path);
						if(empty($_GET["id"])){
						$idget = $_POST["id"];

						} else {
						$idget = $_GET["id"];

						}
						$id = $xml->xpath("//*[@id=$idget]");
						/*var_dump($id);*/
						

						foreach ($id as $concert) {
					echo "<div class='formconcerts'>";
					echo "<h5> Formulaire d'inscription à : </h5>";
					echo "<div class='concert'>";
					echo "<h2>" . $concert->nom . "</h2>" . "\n";
					echo "<h4>" . $concert->artiste . "</h4>" . "\n";
					echo "<p>" . $concert->date . "<p>" . "\n";
					echo "<p>" . $concert->lieu . "<p>" . "\n";
					echo "<p>" . $concert->note . "<p>" . "\n";
					echo "</div>";

					

					echo "<form action=\"?\" method=\"post\" >
						<input type='hidden' name='section' value='form_concerts'/>
						<input type='hidden' name='id' value='". $idget . "'/>

													
						
						Entrez votre nom: <input type=\"text\" name=\"nom\"><br />
						Entrez votre prénom : <input type=\"text\" name=\"prenom\"><br />
						Entrez votre adresse email: <input type=\"text\" name=\"email\"><br />
						Entrez votre date de naissance : <input type=\"date\" name=\"datenaissance\"><br />


						
						Sélectionnez le nombre de places que vous souhaitez réserver : <select name=\"places\" size=\"1\">";
						for ($i=1; $i < 11; $i++) { 
							echo "<option>";
							echo $i;
							echo "</option>";
						}


						echo " </select>
					    <input type=\"submit\" value=\"Envoyer\" name=\"submitconcert\">
						</form> ";
					     
					  echo "<p><em> Attention actuellement nous n'acceptons que l'argent cash donné discrètement en classe</em></p>";

					echo "</div>";

				}


						/*foreach ($xml->concert[1]->attributes() as $a => $b)
						{
						    echo $a . '=' . $b . "<br />";	
						    echo $a->name;					}*/




				/*$root = simplexml_load_file($path);
				foreach ($root as $concert) {
					echo "<div class='concert'>";
					echo "<h2>" . $concert->nom . "</h2>" . "\n";
					echo "<h4>" . $concert->artiste . "</h4>" . "\n";
					echo "<p>" . $concert->date . "<p>" . "\n";
					echo "<p>" . $concert->lieu . "<p>" . "\n";
					echo "<p>" . $concert->note . "<p>" . "\n";
					echo "<a href='?section=form_concert&nom=" . $concert->name .  "'>Commandez votre ticket en ligne</a>";







					echo "</div>";

				}*/

			}

if (!isset($_POST['submitconcert'])){
echo "<form action=\"?\" method=\"get\"> 
	<INPUT TYPE=\"button\" VALUE=\"Retour\" onClick=\"history.go(-1);\">

    </form>";
}

?>







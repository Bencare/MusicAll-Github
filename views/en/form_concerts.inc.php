<?php


		

			$path = "data/concerts.xml";
			if (file_exists($path)) {
				

						$xml = simplexml_load_file($path);
						if(empty($_GET["id"])){
						$idget = $_POST["id"];

						} else {
						$idget = $_GET["id"];
						$sesslang = $_SESSION['lang'];
						}
						$id = $xml->xpath("//concert[@id=$idget] //* [@lang='en']");
						/*var_dump($id);*/
						

						/*foreach ($id as $concert) {*/
					echo "<div class='formconcerts'>";
					echo "<h5> Registration form to : </h5>";
					echo "<div class='concert'>";
					echo "<h2>" . $id[0] . "</h2>" . "\n";
					echo "<h4> " . $id[2] . "</h4>" . "\n";
					echo "<p> " . $id[3] . "<p>" . "\n";
					echo "<p> " . $id[4] . "<p>" . "\n";
					echo "<p>" . $id[5] . "<p>" . "\n";
					echo "</div>";

					

					echo "<form action=\"?\" method=\"post\" >
						<input type='hidden' name='section' value='form_concerts'/>
						<input type='hidden' name='id' value='". $idget . "'/>

													
						
						Enter your last name: <input type=\"text\" name=\"nom\"><br />
						Enter your first name : <input type=\"text\" name=\"prenom\"><br />
						Enter your mail: <input type=\"text\" name=\"email\"><br />
						Enter your birth date : <input type=\"date\" name=\"datenaissance\"><br />


						
						Select how many tickets you need : <select name=\"places\" size=\"1\">";
						for ($i=1; $i < 11; $i++) { 
							echo "<option>";
							echo $i;
							echo "</option>";
						}


						echo " </select>
					    <input type=\"submit\" value=\"Envoyer\" name=\"submitconcert\">
						</form> ";
					     
					  echo "<p><em> Actually we only accept cash directly in class</em></p>";

					echo "</div>";

				/*}*/


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
	<INPUT TYPE=\"button\" VALUE=\"Back\" onClick=\"history.go(-1);\">

    </form>";
}

?>







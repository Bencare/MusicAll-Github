<?php
	

if($exec == true)
	{	
	echo "<div class=\"container text-center\">
		<p class='success'><b>Confirmation:</b> les informations ont bien été enregistrées sur le serveur.</p>
		<p>Nous vous remercions pour votre confiance et votre participation.<br/>
		</p>
		";
		if ($section == "form_album") {
			echo "<a href='?section=list_album'>Retour à la liste des albums</a></div>";
		} elseif ($section == "form_artist"){
			echo "<a href='?section=list_artist'>Retour à la liste des artistes</a></div>";

		} else {
			echo "<a href='?section=list_concerts'>Retour à la liste des concerts</a></div>";

		}
	}
else
	{
	echo "<p class='alert'>Une erreur est survenue lors de l'enregistrement! Prenez-contact avec notre service support.</p></div>";	
	}

?>

<form action="?" method="get"> 
    <input type="submit" value="Annuler" class="btn btn-primary" name="section"></form>
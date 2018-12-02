



<?php $recorded = "'data/images/" . $record['image'] . "'"; ?>

<div class="albumfiche">

	<div class="card" >
		<h2 class="card-title" id="cardtit">Fiche d'artiste</h2>
		<img class="card-img-top" src=<?php echo $recorded ?> alt=\"Card image cap\">
		<div class="card-body">
  <h3 class="card-title"><?php echo $record["Surnom"] ?></h3>
  <p class="card-text"><?php echo $record["Prenom"] . " " . $record["Nom"] ?></p>
  <p class="card-text"><?php echo $record["Lieunaissance"] ?></p>
  <p class="card-text"><?php echo $record["Datenaissance"] ?></p>


  

  <!-- if (file_exists("data/images/" . $record['image'])) {
    echo "<img height='300px' src=\"data/images/" .$record['image'] . "\">";
    }--><?php
    $biographie =  $_SESSION['lang'] . 'Biographie';
 ?>
  
  

<p class="card-text"><?php echo $record[$biographie] ?></p>
<p><a class='btn btn-primary'  href='<?php echo $record["Siteweb"] ?>'/>Site web de l'artiste</a></p> 

<p><a class='btn btn-primary' href='?section=list_artist_albums&id=<?php echo $_GET["id"]; ?>'/>Voir tous les albums de l'artiste.</a></p>

</div>

</div>

</div>
</div>

<div class='container'>
<form action="?" method="get"> 
	<INPUT TYPE="button" VALUE="Retour" class='btn btn-primary btn-large' onClick="history.go(-1);">
    </form></div>



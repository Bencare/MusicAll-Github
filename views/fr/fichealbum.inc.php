
<?php $recorded = "'data/images/" . $record['image'] . "'"; ?>

<div class="albumfiche">

	<div class="card" >
		<h2 class="card-title" id="cardtit">Fiche d'album</h2>
		<img class="card-img-top" src=<?php echo $recorded ?> alt=\"Card image cap\">
		<div class="card-body">
  <h3 class="card-title"><?php echo $record["Titre"] ?></h3>
  <p class="card-text"><?php echo $record["Anneeparution"] ?></p>
  <p class="card-text"><?php echo $record["cote"] ?></p>
  

  <!-- if (file_exists("data/images/" . $record['image'])) {
    echo "<img height='300px' src=\"data/images/" .$record['image'] . "\">";
    }--><?php
    $description =  $_SESSION['lang'] . 'description';
 ?>
  
  

<p class="card-text"><?php echo $record[$description] ?></p>

</div>

</div>

</div>
</div>

<div class='container'>
<form action="?" method="get"> 
	<INPUT TYPE="button" VALUE="Retour" class='btn btn-primary btn-large' onClick="history.go(-1);">
    </form></div>




<div class="albumfiche">

	<div class="card" >
		<h2 class="card-title" id="cardtit">Category card</h2>
		
		<div class="card-body">
  <h3 class="card-title"><?php echo $record["categorie"] ?></h3>
  <p class="card-text"><?php echo $record["autre"] ?></p>

  <?php
    $definition =  $_SESSION['lang'] . 'definition';
 ?>

  <p class="card-text"><?php echo $record[$definition] ?></p>
 
<p><a class='btn btn-primary' href='?section=list_art&cat=<?php echo $record["categorie"] ?>'/>All artists for that category</a></p>
<p><a class='btn btn-primary' href='?section=list_alb&cat=<?php echo $record["categorie"] ?>'/>All albums for that category</a></p>

  

  
  



</div>

</div>

</div>
</div>

<div class='container'>
<form action="?" method="get"> 
	<INPUT TYPE="button" VALUE="Retour" class='btn btn-primary btn-large' onClick="history.go(-1);">
    </form></div>









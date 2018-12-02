<?php
	

if($exec == true)
	{	
	echo "<div class=\"container text-center\">
		<p class='success'><b>Confirmation:</b> The data has been registered on the server.</p>
		";
		if ($section == "form_album") {
			echo "<a href='?section=list_album'>Back to the list of albums</a></div>";
		} elseif ($section == "form_artist"){
			echo "<a href='?section=list_artist'>Back to the list of artists</a></div>";

		} else {
			echo "<a href='?section=list_concerts'>Back to the list of events</a></div>";

		}
	}
else
	{
	echo "<p class='alert'>An error occured during the process. Please contact the support team.</p></div>";	
	}

?>
<div class="container">
<form action="?" method="get"> 
    <input type="submit" class="btn btn-primary" value="Cancel" name="section"></form></div>
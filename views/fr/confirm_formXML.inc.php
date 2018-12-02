<?php

$path = "data/messages.xml";
			if (file_exists($path)) {
				

						$xml = simplexml_load_file($path);
						
						$id = $xml->xpath("//*[@lang=$_SESSION["lang"] and @id='welcome']");
							
						echo $id[0];
						
}




























						?>
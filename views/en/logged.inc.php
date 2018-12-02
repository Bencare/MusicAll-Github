<?php
  

$logout = "'?section=" . $section . "&sectionlog=logout&seclog=off";
	

		$path = "data/messages.xml";
			if (file_exists($path)) {
				

						$xml = simplexml_load_file($path);
						$langsess = $_SESSION['lang'];
						$id = $xml->xpath("//*[@lang='$langsess' and @id='welcome']");
							
						echo "<h2>" . $id[0] . $_SESSION['username'] . "</h2>";

						
			}
  
       switch ($_SESSION['lang']) {
       	case 'fr':
      		echo "<h2><a href=" . $logout . "#login1'>Se déconnecter</a></h2>";
       		
       		break;
       	
       	case 'en':
     		 echo "<h2><a href=" . $logout . "#login1'>Log out</a></h2>";
       		break;	

       	default:
       		# code...
       		break;
       }

   
   
?>
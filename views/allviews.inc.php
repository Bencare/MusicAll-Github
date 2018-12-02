<?php

include("views/". $_SESSION['lang']  . "/header-inc.php");

/*switch ($lang) {
      case 'fr':

         $_SESSION['lang'] = 'fr';
         if (isset($_GET["lang"])) {
            
         
            
         }
         break;

      case 'en':
         $_SESSION['lang'] = 'en';
         if (isset($_GET["lang"])) {
         
         header('location:  ');
         
            
         }

         break;

      default:
                  
         break;
   }*/

   if (isset($_GET['sign']) OR isset($_GET['signin'])) {
   		header('location: #login1');
   }

switch ($section) {
	case 'form_artist':

		if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok" && $_SESSION["grade"] < 4)
         { 
			if (isset($_POST["submitartiste"])) {
				include("./views/". $_SESSION['lang']  . "/confirm_form.php");
			} else {
			include("./views/". $_SESSION['lang']  . "/form_artiste.php");

			}	
		} else {
			include("views/". $_SESSION['lang']  . "/loginrequired.inc.php");
		}
		

		break;
	case 'form_album':


		if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok" && $_SESSION["grade"] < 4)
         { 
			if (isset($_POST["submitalbum"])) {
			include("./views/". $_SESSION['lang']  . "/confirm_form.php");
			}
			 else {
			include("./views/". $_SESSION['lang']  . "/form_album.php");
			 	
			 }	
		} else {
			include("views/". $_SESSION['lang']  . "/loginrequired.inc.php");
		} 
		break;


	case 'about':
			include("views/". $_SESSION['lang']  . "/about.inc.php");
			break;	

	case 'home':
			include("views/". $_SESSION['lang']  . "/accueil.html");
			break;			

	case 'chillpill':

			include("views/". $_SESSION['lang']  . "/chillpill.html");

		

		
		break;

	case 'list_artist':
		include("views/". $_SESSION['lang']  . "/list_artist.html");
		break;

	case 'list_artist_albums':
		include("views/". $_SESSION['lang']  . "/list_artist_albums.inc.php");
		break;	
	/*case 'effacerartiste':*/
		

	case 'list_art':
		include("views/". $_SESSION['lang']  . "/list_art.html");
		break;	

	case 'list_alb':
		include("views/". $_SESSION['lang']  . "/list_alb.html");
		break;	

	case 'list_album':
		include("views/". $_SESSION['lang']  . "/list_album.html");
		break;	
	
	case 'list_categories':
		include("views/". $_SESSION['lang']  . "/list_categories.html");
		break;	

	case "ficheartiste":
		include("views/". $_SESSION['lang']  . "/ficheartiste.inc.php");
		break;

	case "fichecategorie":
		include("views/". $_SESSION['lang']  . "/fichecategorie.inc.php");
		break;

	case "fichealbum":
		include("views/". $_SESSION['lang']  . "/fichealbum.inc.php");
		break;	

	case "Annuler"	:	
		include("views/". $_SESSION['lang']  . "/accueil.html");
		break;

	case "list_concerts" :
	
		include("views/". $_SESSION['lang']  . "/concerts_list.inc.php");	
		break;

	case "list_inscrits" :
	
		include("views/". $_SESSION['lang']  . "/list_inscrits.inc.php");	
		break;	

	case "form_concerts" :
		if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok")
         { 
         	if (isset($_POST["submitconcert"]) AND !empty($_POST["nom"]) OR !empty($_POST["prenom"]) OR !empty($_POST["email"]) OR !empty($_POST["datenaissance"]) ) 
					{ 
						if ($count == 0) {
							
							include("views/". $_SESSION['lang']  . "/confirm_formXML.inc.php");

							/*include("views/confirm_form.php");*/

						} 
			} else {
				
				include("views/". $_SESSION['lang']  . "/form_concerts.inc.php");	
				if (isset($_POST["submitconcert"]) AND $exec == false ) {
					include("views/". $_SESSION['lang']  . "/confirm_form.php");
				}
				


			}
		} else {
			if (empty($_SESSION['lang'])) {
			include("views/fr/loginrequired.inc.php");
				
			} else {
			include("views/". $_SESSION['lang']  . "/loginrequired.inc.php");
		}
		}

		break;	

	default:
		include("views/". $_SESSION['lang'] . "/accueil.html");
		break;
}

/*switch ($sectionlog) {
	case 'logout':
		include("views/logout.inc.php");
		break;

	case 'loggedin':

        include("views/welcome.php");
		break;

	case 'login':

		
		if ($error != ' ') {
		include("views/login.inc.php");
			
		}
		break;
	
	default:
		include("views/login.inc.php");
		
		
		break;
}¨*/


include("lib/debug.inc.php");


include("views/". $_SESSION['lang']  . "/footer-inc.php");



?>
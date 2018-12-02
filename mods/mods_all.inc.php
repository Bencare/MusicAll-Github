<?php






try {
	$dbh = new PDO($dbdsn, $dbusername, $dbpassword, $options);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$dbh2 = new PDO($dbdsn2, $dbusername, $dbpassword, $options);
	$dbh2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


	switch($section2) {

			case 'effaceralbum' :
		
			$sql = "DELETE FROM liaison_artistes_albums WHERE liaison_artistes_albums.ID_albums =:id; 
					DELETE FROM liaison_categories_albums WHERE liaison_categories_albums.ID_albums =:id;
					DELETE FROM albums WHERE ID=:id;
					";
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue("id", $_GET["id"]);
			$exec = $stmt->execute();
			break;
			
		case 'effacerartiste' :
		
			$sql = "DELETE FROM liaison_artistes_albums WHERE liaison_artistes_albums.ID_artistes =:id;
					DELETE FROM liaison_artistes_categories WHERE liaison_artistes_categories.ID_artistes =:id;
					DELETE FROM ficheartistes WHERE id=:id;
			";
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue("id", $_GET["id"]);
			$exec = $stmt->execute();
			break;
		

		default:	
		break;	
		}


		if (isset($_POST['signin']) OR isset($_POST['sign']) OR isset($_POST['log']) OR $sectionlog == "logout") {
			
      switch ($section) {
      case 'ficheartiste':
         $section = "list_artist";
         break;

      case 'fichealbum' :  
         $section = "list_album";
         break;

      case 'fichecategorie':
         $section = "list_categories";
         
         break;

      case 'list_art':
         $section = "list_categories";
         break; 

      case 'list_alb':
         $section = "list_categories";
         break; 
         
      case 'list_artist_albums':
         $section = "list_artist";
         break;   

      case 'form_concerts':
         $section = "list_concerts";
         break; 

      case 'list_inscrits':
         $section = "list_concerts";
         break;              

      default:
         # code...
         break;
   }



   }

	switch ($section) {
		case 'form_artist':

			$sql = "SELECT ID, categorie FROM categories";
			
			$stmt = $dbh->prepare($sql);
			
			$stmt->execute();
			$records = $stmt->fetchAll();
			

			if (isset($_POST["submitartiste"]) AND !empty($_POST["nom"]) OR !empty($_POST["prenom"]) OR !empty($_POST["surnom"]) OR !empty($_POST["surnom"]) ) {


				include("mods/uploadimage.php");
				$sql = "INSERT INTO ficheartistes (Nom, Prenom, Surnom, Lieunaissance, Datenaissance, Siteweb, Biographie, image)  
				VALUES (:Nom, :Prenom, :Surnom, :Lieunaissance, :Datenaissance, :Siteweb, :Biographie, :image)";
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue("Nom", $_POST["nom"]);
				$stmt->bindValue("Prenom", $_POST["prenom"]);
				$stmt->bindValue("Surnom", $_POST["surnom"]);
				$stmt->bindValue("Lieunaissance", $_POST["lieuNaissance"]);
				$stmt->bindValue("Datenaissance", $_POST["dateNaissance"]);
				$stmt->bindValue("Siteweb", $_POST["site"]);
				$stmt->bindValue("Biographie", $_POST["bio"]);
				$stmt->bindValue("image", $target_name);
				$exec = $stmt->execute();

				$sql = "INSERT INTO liaison_artistes_categories(ID_artistes, ID_categories) 
				VALUES (LAST_INSERT_ID(), :ID_categories);";
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue("ID_categories", $_POST["liaisonCat"]);
				
				$exec = $stmt->execute();

				} else {
					$exec = false;
				}
			
			
			break;

		case 'form_album':

			$sql = "SELECT ID, Surnom FROM ficheartistes;";
			
			$stmt = $dbh->prepare($sql);
			
			$stmt->execute();
			$records = $stmt->fetchAll();

			$sql2 = "SELECT ID, categorie FROM categories";
			
			$stmt2 = $dbh->prepare($sql2);
			
			$stmt2->execute();
			$records2 = $stmt2->fetchAll();

			if (isset($_POST["submitalbum"]) AND !empty($_POST["titrealbum"]) OR !empty($_POST["dateParution"]) OR !empty($_POST["cote"]) OR !empty($_POST["description"]) ) {
				include("mods/uploadimage.php");

				$sql = "INSERT INTO albums (Titre, Anneeparution, cote, description, image)
				VALUES (:Titre, :Anneeparution, :cote, :description, :image)";
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue("Titre", $_POST["titrealbum"]);
				$stmt->bindValue("Anneeparution", $_POST["dateParution"]);
				$stmt->bindValue("cote", $_POST["cote"]);
				$stmt->bindValue("description", $_POST["description"]);
				$stmt->bindValue("image", $target_name);

				

				$exec = $stmt->execute();


				$sql = "INSERT INTO liaison_artistes_albums(ID_artistes, ID_albums) 
				VALUES (:ID_artistes, LAST_INSERT_ID());";
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue("ID_artistes", $_POST["liaisonArtist"]);
				/*$stmt->bindValue("ID_albums", LAST_INSERT_ID());*/
				$exec = $stmt->execute();

				$sql = "INSERT INTO liaison_categories_albums(ID_albums, ID_categories) 
				VALUES (LAST_INSERT_ID(), :ID_categories);";
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue("ID_categories", $_POST["liaisonCat"]);
				
				$exec = $stmt->execute();
				/*$sql = "INSERT INTO liaison_categories_albums(ID_categories, ID_albums) 
				VALUES (:ID_categories, ID_albums);
				SELECT ID FROM ficheartistes WHERE Nom = $_POST["liaisonArtist"]";
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue("ID_categories", $_POST["liaisonArtist"]);*/
				/*$stmt->bindValue("ID_albums", LAST_INSERT_ID());*/
				/*$exec = $stmt->execute();*/


				} else { 
				 $exec = false;
				}
			
			
			break;	

		case 'form_concerts':




				if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok")
         		{ 
					

						if (isset($_POST["submitconcert"]) AND !empty($_POST["nom"]) OR !empty($_POST["prenom"]) OR !empty($_POST["email"]) OR !empty($_POST["datenaissance"]) ) 
					{	



						$sql = "SELECT * FROM inscriptions WHERE email = :email ";  
                      
			               $stmt = $dbh2->prepare($sql);
			               $exec = $stmt->execute(
			                  array(
			                     'email' => $_POST["email"])
			                  );

			               
			               $count = $stmt->rowCount();
			                    

			               
			                if ($count > 0) {
			                        
			                  
			                  echo "Vous êtes déjà inscrit avec cette adresse mail";
			                  echo "<form action=\"?\" method=\"get\"> 
									<INPUT TYPE=\"button\" VALUE=\"Retour\" onClick=\"history.go(-1);\">

								    </form>";
									


			                   } else {





						$idconcert = $_POST["id"];

						
						
					$sql = "INSERT INTO  inscriptions (ID_concert, nom, prenom, email,  datenaissance, places) 
						VALUES (" . $idconcert . ", '" . $_POST["nom"] . "', '" 
						. $_POST["prenom"] . "', '" . $_POST["email"] . "', '" 
						. $_POST["datenaissance"] ."', '"  . $_POST["places"] . "')";
					$stmt = $dbh2->prepare($sql);
					$exec = $stmt->execute();



				} 
					}
				
				 }


			break;	

		case "ficheartiste":
			$sql = "SELECT * FROM ficheartistes WHERE id=:id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue("id", $_GET["id"]);
			$stmt->execute();
			$record = $stmt->fetch();
			break;	

		case "fichealbum":
			$sql = "SELECT * FROM albums WHERE id=:id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue("id", $_GET["id"]);
			$stmt->execute();
			$record = $stmt->fetch();
			break;	

		case "fichecategorie":
			$sql = "SELECT * FROM categories WHERE id=:id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue("id", $_GET["id"]);
			$stmt->execute();
			$record = $stmt->fetch();
			break;	

		case 'list_artist':

			$sql = "SELECT * FROM ficheartistes";
			if(!empty($_GET["motcle"])) $sql .= " WHERE Nom LIKE :filter";
			$stmt = $dbh->prepare($sql);
			if(!empty($_GET["motcle"])) $stmt->bindValue("filter", "%" . $_GET["motcle"] . "%");
			$stmt->execute();
			$records = $stmt->fetchAll();
			break;

		case 'list_inscrits':
			

			if(empty($_GET["id"])){
						$idget = $_POST["id"];

						} else {
						$idget = $_GET["id"];

						}
			$sql = "SELECT * FROM inscriptions WHERE ID_concert = $idget";	
			if (!empty($_GET["motcle"])) $sql .= " AND nom LIKE :filter OR prenom LIKE :filter";
			$stmt = $dbh2->prepare($sql);
			if (!empty($_GET["motcle"])) $stmt->bindValue("filter", "%" . $_GET["motcle"] . "%");
			$stmt->execute();
			$records = $stmt->fetchAll();
			break;
				

		case 'list_album':

			$sql = "SELECT * FROM albums";
			if(!empty($_GET["motcle"])) $sql .= " WHERE Titre LIKE :filter OR Anneeparution LIKE :filter";
			$stmt = $dbh->prepare($sql);
			if(!empty($_GET["motcle"])) $stmt->bindValue("filter", "%" . $_GET["motcle"] . "%");
			$stmt->execute();
			$records = $stmt->fetchAll();
			break;	

		/*case 'list_artist_albums':
			
			$sql = "SELECT * FROM"


			break;	*/

		case 'list_categories' :
			$sql = "SELECT * FROM categories";
			if(!empty($_GET["motcle"])) $sql .= " WHERE categorie LIKE :filter";
			$stmt = $dbh->prepare($sql);
			if(!empty($_GET["motcle"])) $stmt->bindValue("filter", "%" . $_GET["motcle"] . "%");
			$stmt->execute();
			$records = $stmt->fetchAll();
			break;	

		case 'list_artist_albums':

			$sql = "SELECT ficheartistes.Nom, ficheartistes.Prenom, ficheartistes.Surnom, albums.Titre, albums.image, albums.cote, albums.Anneeparution, albums.ID FROM ficheartistes, liaison_artistes_albums, albums WHERE liaison_artistes_albums.ID_artistes = ficheartistes.ID AND liaison_artistes_albums.ID_albums = albums.ID
				"
			;
			
			$stmt = $dbh->prepare($sql);
			
			$stmt->execute();
			$records = $stmt->fetchAll();
			break;

		case 'list_art':
			
			
			$getid = "SELECT ID FROM categories WHERE categorie = \"$cat\" limit 1  ";
			$result = $dbh->query($getid);
			while ($row = $result->fetch(PDO::FETCH_NUM)) {
				$value = $row[0];
			}
			;
			
			$idout = $value;


			$sql = "SELECT ficheartistes.ID, ficheartistes.Nom, ficheartistes.Prenom, ficheartistes.Surnom FROM ficheartistes, liaison_artistes_categories WHERE liaison_artistes_categories.ID_artistes = ficheartistes.ID AND liaison_artistes_categories.ID_categories = $idout
				";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$records = $stmt->fetchAll();

			break;	

		case 'list_alb':
			
			$getid = "SELECT ID FROM categories WHERE categorie = \"$cat\" limit 1  ";
			$result = $dbh->query($getid);
			while ($row = $result->fetch(PDO::FETCH_NUM)) {
				$value = $row[0];
			}
			;
			
			$idout = $value;


			$sql = "SELECT  albums.Titre, albums.cote, albums.ID FROM albums, liaison_categories_albums WHERE liaison_categories_albums.ID_albums = albums.ID AND liaison_categories_albums.ID_categories = $idout 
				";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$records = $stmt->fetchAll();

			break;	

		

			

			

		default:
		break;




		
		
	}

		
	
	} catch (PDOException $e) 
		{
		echo $e->getMessage();
	
		}








?>

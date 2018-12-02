<?php

 


   if(isset($_GET['sectionlog'])){
      switch ($sectionlog) {
         /*case 'login':
            include("mods/login.php");
            break;*/

         case 'logout' :

            if (!empty($_SESSION['username'])) {
            include("mods/logout.php");

               
            }
           
            
            
            
         /*session_destroy();*/
         break;   
         
         default:
            
            break;
      }}

   
      
   
   
   if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok")
   {  
      

      if ($sectionlog == "logout") {
      include("views/". $_SESSION['lang']  . "/logout.inc.php");
      
      

      } else 
      {
      include("views/". $_SESSION['lang']  . "/logged.inc.php");


         
      }


      

   /*include("mods/movies.inc.php");
   include("views/movies.inc.php");*/
   }
else
   {
      
      
      if (empty($_SESSION['lang'])) {
         
        

         if (empty($lang)  OR $lang == '') {

            $lang = 'fr';
            $_SESSION['lang'] = $lang;
           
         } else {
            
            $_SESSION['lang'] = $lang;
           
         }
      }


      if (isset($_GET['seclog'])) {
         
         
         if ($_GET['seclog'] == 'off') {
      include("views/". $_SESSION['lang']  . "/logout.inc.php");
            $seclog='';
         }
      }

    if (isset($_POST["sign"])) {

         if ($_SESSION['lang'] == 'en') {
            if ($section == '') {
                  $section = "home";
               }
            
            echo "<form method='post' action='?'>";
         echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";
         echo "Enter username : <input type='text' name='loginsign'/>    ";
         echo "Enter password : <input type='password' name='passwordsign'/> ";
         echo "Enter your mail : <input type='text' name='email'/> ";

         echo "<input type='submit' name='signin' value='Submit'/>";
         echo "<INPUT TYPE=\"button\" VALUE=\"Back\" onClick=\"history.go(-1);\">";
         echo "</form>";


         } else {
            if ($section == '') {
                  $section = "home";
               }
         echo "<form method='post' action='?'>";
         echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";
         echo "Entrez un login : <input type='text' name='loginsign'/>    ";
         echo "Entrez un mot de passe : <input type='password' name='passwordsign'/> ";
         echo "Entrez une adresse email : <input type='text' name='email'/> ";

         echo "<input type='submit' name='signin' value='Valider'/>";
         echo "<INPUT TYPE=\"button\" VALUE=\"Retour\" onClick=\"history.go(-1);\">";
         echo "</form>";}
       }  elseif (isset($_POST["signin"])) {
          
               if (empty($_POST["loginsign"]) || empty($_POST["passwordsign"])) {


                  if ($_SESSION['lang'] == 'en') {


                     if ($section == '') {
                           $section = "home";
                        }

                     echo "<form method='post' action='?'>";
                     echo  "<input type='hidden' name='section' value='" . $section . "'/>";
                     echo "Enter username : <input type='text' name='loginsign'/>    ";
                     echo "Enter password : <input type='password' name='passwordsign'/> ";
                     echo "<input type='submit' name='signin' value='Submit'/>";
                     echo "<INPUT TYPE=\"button\" VALUE=\"Back\" onClick=\"history.go(-1);\">";
                     echo "</form>";
                     echo "You must enter a username AND a password.";
                              $signedin = false; 

                  } else {

                                 if ($section == '') {
                              $section = "home";
                           }
                         echo "<form method='post' action='?'>";
                        echo  "<input type='hidden' name='section' value='" . $section . "'/>";
                        echo "Entrez un login : <input type='text' name='loginsign'/>    ";
                        echo "Entrez un mot de passe : <input type='password' name='passwordsign'/> ";
                        echo "<input type='submit' name='signin' value='Valider'/>";
                        echo "<INPUT TYPE=\"button\" VALUE=\"Retour\" onClick=\"history.go(-1);\">";
                        echo "</form>";
                        echo "Il faut entrer un utilisateur ET un mot de passe.";
                                 $signedin = false; 
                  }


            } else {
               $sql = "SELECT * FROM users WHERE username = :username ";  
                      
               $stmt = $dbh->prepare($sql);
               $exec = $stmt->execute(
                  array(
                     'username' => $_POST["loginsign"])
                  );

               
               $count = $stmt->rowCount();
                     $signedin = false;

               
                if ($count > 0) {

                  if ($_SESSION['lang'] == 'en') {
                     if ($section == '') {
                     $section = "home";
                     }

                       echo "<form method='post' action='?'>";
                     echo  "<input type='hidden' name='section' value='" . $section . "'/>";
                     echo "Enter username : <input type='text' name='loginsign'/>    ";
                     echo "Enter password : <input type='password' name='passwordsign'/> ";
                     echo "<input type='submit' name='signin' value='Submit'/>";
                     echo "<INPUT TYPE=\"button\" VALUE=\"Back\" onClick=\"history.go(-1);\">";
                     echo "</form>";
                     echo "This username is already in use.";
                        $signedin = false;
                  } else {

                     if ($section == '') {
                      $section = "home";
                     }
                        
                     echo "<form method='post' action='?'>";
                     echo  "<input type='hidden' name='section' value='" . $section . "'/>";
                     echo "Entrez un login : <input type='text' name='loginsign'/>    ";
                     echo "Entrez un mot de passe : <input type='password' name='passwordsign'/> ";
                     echo "<input type='submit' name='signin' value='Valider'/>";
                     echo "<INPUT TYPE=\"button\" VALUE=\"Retour\" onClick=\"history.go(-1);\">";
                     echo "</form>";
                     echo "Ce nom d'utilisateur est déjà pris";
                        $signedin = false;
                  }

                   } 



                   else {

                        $sql = "INSERT INTO users (username, password, email)
                        VALUES (:username, :password, :email)";
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindValue("username", $_POST["loginsign"]);
                        $stmt->bindValue("password", $_POST["passwordsign"]);
                        $stmt->bindValue("email", $_POST["email"]);

                                       
                        $exec = $stmt->execute();
                        $signedin = true;

                        $sectionhead = "?section=" . $section;
                        $signedhead = "&signedin=true";
                        header("location: index.php" . $sectionhead . $signedhead . "#login1");


                   }


                }
             }

             elseif (isset($_GET['signedin']) AND $_GET['signedin'] == "true") {
                  if ($_SESSION['lang'] == 'en') {

                        echo "<h2> The account has been created. </h2>";
                        $logina = "?section=" . $section;
                        $signedin ='';
                        
                        echo "<h2><a href='" . $logina . "#login1'>Log in</a></h2>";

                  } else {
                     echo "<h2> Le compte a été créé </h2>";
                     $logina = "'?section=" . $section;
                        $signedin ='';
                     echo "<h2><a href='" . $logina . "#login1'>Se connecter</a></h2>"; }
         }
         else {

         if(isset($_POST["log"])){
      $user = $_POST['login'];
      

      

      if (empty($_POST["login"]) || empty($_POST["password"])) {

            if ($_SESSION['lang'] == 'en') {
               if ($section == '') {
                  $section = "home";
               }
               echo "<form method='post' action='?'>";
               echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";

               echo "Username <input type='text' name='login'/> ";
               echo "Password <input type='password' name='password'/> ";
               echo "<input type='submit' name='log' value='Log in'/>";
               echo "<input type='submit' name='sign' value='Create account'/>";
               echo "</form>";
               echo "You must enter a username AND a password.";

            } else {
               if ($section == '') {
                  $section = "home";
               }
                echo "<form method='post' action='?'>";
               echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";

               echo "Login <input type='text' name='login'/> ";
               echo "Mot de passe <input type='password' name='password'/> ";
               echo "<input type='submit' name='log' value='connecter'/>";
               echo "<input type='submit' name='sign' value='Créer un compte'/>";
               echo "</form>";
               echo "Il faut entrer un utilisateur ET un mot de passe.";
             }  

      } else {
         $sql = "SELECT * FROM users WHERE username = :username AND password = :password";  
                
         $stmt = $dbh->prepare($sql);
         $exec = $stmt->execute(
            array(
               'username' => $_POST["login"],
               'password' => $_POST["password"])
         );
         $records = $stmt->fetchAll();
         
         


         $count = $stmt->rowCount();

         
      if ($count > 0) {
         
         foreach ($records as $record) {
            $rank = $record["grade"];
         }
         



         $_SESSION["username"] = $_POST["login"];
         $_SESSION["access"] = "ok";
         $_SESSION["grade"] = $rank;
          
         $sectionhead = "?section=" . $section;
         header("location: index.php" . $sectionhead . "#login1");

         /*header($sectionhead);
         echo $sectionhead; */
      /*header("Location: index.php");*/

      } else {
         
          if ($_SESSION['lang'] == 'en') {
               if ($section == '') {
                  $section = "home";
               }
              echo "<form method='post' action='?'>";
               echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";
               echo "Username <input type='text' name='login'/> ";
               echo "Password <input type='password' name='password'/> ";
               echo "<input type='submit' name='log' value='Log in'/>";
               echo "<input type='submit' name='sign' value='Create account'/>";
               echo "</form>";
               echo "Incorrect username or password. ";

          } else {
            if ($section == '') {
                  $section = "home";
               }
                  echo "<form method='post' action='?'>";
               echo "Login <input type='text' name='login'/> ";
               echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";

               echo "Mot de passe <input type='password' name='password'/> ";
               echo "<input type='submit' name='log' value='connecter'/>";
               echo "<input type='submit' name='sign' value='Créer un compte'/>";
               echo "</form>";
               echo "L'utilisateur et/ou le mot de passe sont incorrects. ";
        } 
      }

      }
      
   } else {

          if ($_SESSION['lang'] == 'en') {
            if ($section == '') {
                  $section = "home";
               }

            echo "<form method='post' action='?'>";
            echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";

            echo "Username <input type='text' name='login'/> ";

            echo "Password <input type='password' name='password'/> ";
            echo "<input type='submit' name='log' value='Log in'/>";
            echo "<input type='submit' name='sign' value='Create account'/>";
            echo "</form>";

         }else {
            if ($section == '') {
                  $section = "home";
               }
      
            echo "<form method='post' action='?'>";
            echo  "<input type='hidden' name='section' value='" . $section . "#login1'/>";

            echo "Login <input type='text' name='login'/> ";

            echo "Mot de passe <input type='password' name='password'/> ";
            echo "<input type='submit' name='log' value='connecter'/>";
            echo "<input type='submit' name='sign' value='Créer un compte'/>";
            echo "</form>";
      
             }
            }

       }


   }
   




   
?>
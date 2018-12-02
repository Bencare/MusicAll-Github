<?php
$section = (isset($_REQUEST["section"])? $_REQUEST["section"]:'');
$section2 = (isset($_REQUEST["section2"])? $_REQUEST["section2"]:'');
$message = (isset($_REQUEST["message"])? $_REQUEST["message"]:'');
$signedin = (isset($_REQUEST["signedin"])? $_REQUEST["signedin"]: '');
$exec = (isset($_REQUEST["exec"])? $_REQUEST["exec"]: '');
$sectionlog = (isset($_REQUEST["sectionlog"])? $_REQUEST["sectionlog"]:'');

if (empty($_SESSION['lang']) AND empty($lang) AND !isset($_GET['lang'])) {
	$lang = 'fr';
}

if (empty($_SESSION['lang'])) 
		{
			
			
			if (isset($_GET['sectionlog'])) {
				
				if ($_GET['sectionlog'] == "logout") {
					
						if (isset($_GET['lang'])) {
							$_SESSION['lang'] = $_GET['lang'];
							
						
						/*$_SESSION['lang'] = $_GET['lang'];*/


						} else{
								
								$lang = 'fr';
								$_SESSION['lang'] = $lang;
								
								}

				
					$sectionlog = '';
					
					
				}
			} else{
				
				if (empty($lang)) {
					$lang = 'fr';
				$_SESSION['lang'] = $lang;

					
				} else {
					if ($lang == 'fr' OR $lang == 'en') {
							$_SESSION['lang'] = $lang;
						
					} else {
						$_SESSION['lang'] = 'fr';

					}
			/*header('location: index.php');*/
				}
			}

		} 

		
		/*if(($_SESSION['lang'] == 'fr')){
	$lang =(isset($_REQUEST["lang"])? $_REQUEST["lang"]: 'fr');
	} elseif ($_SESSION['lang'] == 'en') {
	$lang =(isset($_REQUEST["lang"])? $_REQUEST["lang"]: 'en');*/

	/*elseif (isset($_GET['lang']) && isset($_GET['sectionlog'])) {
		var_dump($_SESSION);
		echo "issetlang";
		$_SESSION['lang'] = $_GET['lang'];
		if (isset($_GET['sectionlog'])) {
				
				if ($_GET['sectionlog'] == "logout") {
					

						if (isset($_GET['lang'])) {
							$_SESSION['lang'] = $_GET['lang'];
						var_dump($_SESSION);
						echo "issetlang";
						/*$_SESSION['lang'] = $_GET['lang'];


						}

					var_dump($_SESSION);
					$sectionlog = '';
					
					
				}
			}*/ 
		/*$_SESSION['lang'] = $_GET['lang'];*/


	 
 	
else {
	

	if (isset($_GET['lang'])) {
							$_SESSION['lang'] = $_GET['lang'];
							
						
						/*$_SESSION['lang'] = $_GET['lang'];*/


						} else{
								if (!empty($_SESSION['lang'])) {
									$lang = $_SESSION['lang'];
										
									}
								
								}


	
	/*
	$lang = $_SESSION['lang'];*/
	
}

	 

	







if (isset($_SESSION['access'])) {
	/*$sectionlog = "loggedin";*/
	
} else {

}
$cat = (isset($_REQUEST["cat"])? $_REQUEST["cat"]:'');
/*
$error = (isset($_REQUEST["error"])? $_REQUEST["error"]:'');
*/




?>
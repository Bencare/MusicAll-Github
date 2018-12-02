<html>
<!DOCTYPE html>
<meta charset="UTF-8">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MusicAll</title>

	<link rel="shortcut icon" href="assets/images/favicon.ico">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" > 
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	
</head>


	<?php  if(isset($_SESSION["access"])  && $_SESSION["access"] == "ok" && $sectionlog == 'logout')
   {  
			$urllogout = "&sectionlog=" . $_GET['sectionlog'];
			
	}else {
		$urllogout ='';
	}  ?>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" id="nav_bar">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="MusicAll logo"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="?section=">Home</a></li>
					<li><a href="?section=about">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Discover<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="?section=list_artist">List of artists</a></li>
							<li><a href="?section=list_album">List of albums</a></li>
							<li><a href="?section=list_categories">List of categories</a></li>
							<li><a href="?section=list_concerts">List of events</a></li>
							</li>
						</ul>
					</li>
					<li><a class="btn" href="#login1">SIGN IN</a></li>
					<li class="flag"><a href="?lang=fr<?php echo $urllogout; ?>"><img src="data/images/french.png" height="35px"/></a></li>
					<li class="flag"><a href="?lang=en<?php echo $urllogout; ?>"><img src="data/images/english.png" height="35px" /></a></li>

				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<?php 

if($section !== ''){
	echo "<div id='upspace'></div>";
}
?>

	




















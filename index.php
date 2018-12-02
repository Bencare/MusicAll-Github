<?php
ob_start();
session_start();


include("lib/init.inc.php");
include("config/main.inc.php");






include("mods/mods_all.inc.php");
include("views/allviews.inc.php");





ob_end_flush();


?>
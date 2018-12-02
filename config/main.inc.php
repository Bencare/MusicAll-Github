<?php
$debug = 0;
$dbusername = "httpinsert";
$dbpassword = "insertmysql1234";
$dbdsn = "mysql:host=localhost;dbname=mediadb";
$dbdsn2 = "mysql:host=localhost;dbname=musicfans";

//$dbdsn = "mysql:host=localhost;dbname=filhebdo";
$app_title = "Labo_Web";
$css_file = "design/css/style.css";
$separator = "|";
$newline = "\n";
$options = array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
?>
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "redhat";
$dbname="packetspy";

$con=mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname,$con) or die(mysql_error());

session_start();
?>

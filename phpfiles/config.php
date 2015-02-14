<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "db_salon360";
	$con = mysql_connect($host,$user,$password) or die(mysql_error());
	mysql_select_db($db);
?>
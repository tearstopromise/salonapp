<?php


date_default_timezone_set('Asia/Manila');
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_ilinda";

	
	$conn = @mysqli_connect ($host,$user,$pass,$db) OR die ('Could not connect to MySQL: ' . mysqli_connect_error( ) );



?>
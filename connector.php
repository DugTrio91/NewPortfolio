<?php

	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "markportfolio";

	$dbconnect = mysqli_connect($host, $user, $pass, $db);

	if (mysqli_connect_errno()){
		echo "Failed to connect to database, MySQL: " . mysqli_connect_error();
	}
    
?>
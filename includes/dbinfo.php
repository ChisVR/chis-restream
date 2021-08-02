<?php
			$sqlservername = "localhost";



$sqlusername = "";



$sqlpassword = "";



$sqldatabase = "restream";
	$dbconnect = mysqli_connect($sqlservername, $sqlusername, $sqlpassword, $sqldatabase);

	if ($dbconnect->connect_error) {
		die("Database connection failed: " . $dbconnect->connect_error);
	}

?>

<?php
//Database Configuration//
$hostname = "hawkoverflow.db.11996728.hostedresource.com";
$user = "hawkoverflow";
$password = "Codelife1472@";
$database = "hawkoverflow";
$prefix = "";

//Set the number of results to show at one time//
$resultsPerPage = 5;

//Connect to the database with the credentials//
$bd = mysqli_connect($hostname, $user, $password) or die("Failed to connect to database");
mysqli_select_db($bd, $database) or die("Database Not Found");
?>
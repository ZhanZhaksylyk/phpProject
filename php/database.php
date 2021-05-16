<?php
	if(!isset($_SESSION)){session_start();}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$connError=mysqli_connect_error();
	if (!is_null($connError)) {
	    die("Connection failed: " . $connError);
	}
?>
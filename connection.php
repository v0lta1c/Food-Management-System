<?php

function Connect()
{
	$dbhost = "localhost";
	$dbuser = "id13709370_hungrykya123";
	$dbpass = "Mann61099@db";
	$dbname = "id13709370_hungrykya";

	//Create Connection
	$conn = new mysqli($dbhost ,$dbuser ,$dbpass, $dbname) or die($conn->connect_error);

	return $conn;
}
?>
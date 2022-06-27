<!DOCTYPE html>
<html>
    <body>
        <a href="view.php"> Εμφάνιση </a><br>
        <a href="insert.php"> Καταχώριση </a><br>
    </body>
</html>


<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	$tabname = "ics21073";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);


	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	
	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

	if (mysqli_query($conn, $sql)) {
		echo "Database created successfully <br>";
	} else {
		echo "Error creating database: " . mysqli_error($conn) . "<br>";
	}


	$conn = mysqli_connect($servername, $username, $password, $dbname);

	
	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS $tabname (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(50) NOT NULL
	)";

	if (mysqli_query($conn, $sql)) {
		echo "Table $tabname created successfully <br>";
	} else {
	 	echo "Error creating table: " . mysqli_error($conn) . "<br>";
	}

	mysqli_close($conn);
?> 
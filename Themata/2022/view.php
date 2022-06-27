<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	$tabname = "ics21073";


    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Outputs all database entries for $tabname
	$sql = "SELECT id, email FROM $tabname";
	$result = mysqli_query($conn, $sql);

	echo "<br>";
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "id: " . $row["id"]. " - Email: " . $row["email"].
			"<br>";
		}
	} else {
		echo "0 results";
	} 


    mysqli_close($conn);
?> 
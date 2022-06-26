<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ics22135";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, names, website FROM dai17098";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Names: " . $row["names"]. " - Website: " . $row["website"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Εξέταση</title>
	<link rel="stylesheet" href="ics22135.css"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Web Development - June 2022- PHP">
    <meta name="ics22135" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
</head>
<body>
<nav>

<button type="button" onclick="location.href = 'index.php'">Return to index.</button>



</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM MyGuests WHERE id=6";

   // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
	
    echo $stmt->rowCount() . " record(s) deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
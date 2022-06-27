<!DOCTYPE html>
<html>
<body>
<style>
.error {color: #FF0000;}
</style>
</body>
</html>

<?php
    $emailErr = "";
    $email = "";
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $tabname = "ics21073";
    

    $conn = mysqli_connect($servername, $username, $password, $dbname);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputIsValid = false;


        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $inputIsValid = false;
        } else {
            $inputIsValid = true;
        }
    

        if($inputIsValid == true){
            // Inserts user info to database
            $sql = "INSERT INTO $tabname (email)
            VALUES ('$email')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully <br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
            } 

            mysqli_close($conn);
        }
    }
?>   


<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">   
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
    <input type="submit" name="submit" value="Υποβολή">
</form>
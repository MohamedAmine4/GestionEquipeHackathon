<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!empty($_POST))
{
    //var_dump($_POST["monFichier"]);
    $file = fopen($_POST["monFichier"], "r");
    //Output lines until EOF is reached
    while(! feof($file)) {
        $line = fgets($file);
        $line = strtolower($line);
        $line = test_input($line);
        $line = explode(";", $line);
        //echo $line[0] ." ". $line[1] ." ". $line[2]. "<br>";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Hackathon";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO etudiant (firstname, lastname, class)
            VALUES (:firstname, :lastname, :class)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':class', $class);

            // set parameters and execute
            $firstname = $line[1];
            $lastname = $line[0];
            $class = $line[2];
            $stmt->execute();
            echo "New records created successfully";
        } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
fclose($file);
}

?>

<html>
<body>

<form action="test.php" method="post">

    <input type="file" name="monFichier">
    <input type="submit">

</form>

</body>
</html> 

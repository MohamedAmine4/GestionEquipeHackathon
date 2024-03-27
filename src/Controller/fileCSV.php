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
function afficherContenuFichierCSV($nomFichier)
{
    // Vérifier si le nom du fichier est non vide
    if (!empty($nomFichier)) {
        echo "<table border='1'>";
        // Ouvrir le fichier CSV
        $file = fopen($nomFichier, "r");
        // Lire chaque ligne du fichier
        while (!feof($file)) {
            $line = fgets($file);
            // Vérifier si la ligne n'est pas vide
            if (!empty($line)) {
                // Diviser la ligne en colonnes en utilisant le délimiteur approprié (ici ";")
                $columns = explode(";", $line);
                echo "<tr>";
                // Afficher chaque colonne dans une cellule de tableau
                foreach ($columns as $column) {
                    echo "<td>" . htmlspecialchars($column) . "</td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";
        fclose($file);
    }
}

// Utilisation de la fonction
if (!empty($_POST["monFichier"])) {
    afficherContenuFichierCSV($_POST["monFichier"]);
}

?>
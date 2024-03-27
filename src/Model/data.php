<?php
// Se connecter à la base de données (ajustez selon votre configuration)
$conn = new mysqli("localhost", "root", "", "hackathon");

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Écrire la requête SQL
$sql = "SELECT * FROM etudiant;";

// Exécuter la requête SQL et récupérer le résultat
$result = $conn->query($sql);

// Vérifier s'il y a un résultat
if ($result->num_rows > 0) {
  // Créer un tableau vide pour stocker les données
  $data = array();

  // Parcourir le résultat et ajouter chaque ligne au tableau
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  // Aucun résultat trouvé
  $data = null;
}

// Fermer la connexion à la base de données
$conn->close();
?>
    <?php
// Convertir le tableau en JSON
$json = json_encode($data);
?>
<?php
// Afficher le JSON
echo $json;
?>
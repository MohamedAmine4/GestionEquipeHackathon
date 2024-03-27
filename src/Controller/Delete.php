<?php

try {

  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}

if(isset($_POST['teamexistingdelete'])){
  $teamexisting = $_POST['teamexistingdelete'];
  $query = $connection->prepare('DELETE FROM `lienequipeetudiant` WHERE `id` = ?');
  $query->execute(array($teamexisting));
  $query = $connection->prepare('DELETE FROM `equipe` WHERE `id` = ?');
  $query->execute(array($teamexisting));
  
  if ($query->rowCount() > 0) {
    echo "<center><h1>Team successfully deleted !!</h1></center>";
  } else {
    echo "No team found with that ID.";
  }
}
else{
  echo "erreur de connexion";
}

?>
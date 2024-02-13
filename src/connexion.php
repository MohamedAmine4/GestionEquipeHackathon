<?php
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}

//////////////////////////////////////////////////Insertion student skills and email and password
if (
  isset($_POST['lname']) && isset($_POST['fname']) &&
  isset($_POST['skills']) && isset($_POST['password']) && isset($_POST['email'])
) {
  if (
  (  !empty($_POST['lname']) && !empty($_POST['fname']) &&
    !empty($_POST['skills']) && !empty($_POST['password']) && !empty($_POST['email']))||  ( !empty($_POST['lname']) && !empty($_POST['fname']) &&
    !empty($_POST['skills']) && empty($_POST['password']) && !empty($_POST['email']))
  ) {

    $lname = htmlspecialchars($_POST['lname']);
    $fname = htmlspecialchars($_POST['fname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $skills = htmlspecialchars($_POST['skills']);

    $insertionEtudiant = $connection->prepare('UPDATE `etudiant` SET `email`=?, `skills`=?, `password`=? WHERE `lastname`=?');
    $insertionEtudiant->execute(array($email, $skills, $password, $lname));

    echo '<center><h1>les informations sont bien ajouté !!</h1></center>';
  } else {
    echo 'Attention, Tous Les Champs Sont Obligatoires !!';
  }
}
?>
<?php
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}

//////////////////////////////////////////////////Insert Team Nam
if (
  isset($_POST['Teamname']) && isset($_POST['l3name']) &&
  isset($_POST['m1name']) && isset($_POST['m2name'])

) {
  

  if (
    !empty($_POST['Teamname']) && !empty($_POST['l3name']) &&
    !empty($_POST['m1name']) && !empty($_POST['m2name'])
  ) {

    $Teamname = htmlspecialchars($_POST['Teamname']);
    $l3name = htmlspecialchars($_POST['l3name']);
    $m1name = htmlspecialchars($_POST['m1name']);
    $m2name = htmlspecialchars($_POST['m2name']);
    $l3="L3";
    $m1="M1";
    $m2="M2"; 
    // Vérifier si le nom d'équipe existe déjà
    $checkTeamExistence = $connection->prepare('SELECT COUNT(*) FROM `equipe` WHERE `teamname` = ?');
    $checkTeamExistence->execute(array($Teamname));

    // Récupérer le résultat de la requête
    $teamExistenceResult = $checkTeamExistence->fetchColumn();

    if ($teamExistenceResult > 0) {
        echo '<center><h1>Le nom d\'équipe existe déjà. Veuillez choisir un autre nom.</h1></center>';
    } else {
        // Insérer le nom d'équipe seulement si le nom n'existe pas déjà
        $insertionTeamName = $connection->prepare('INSERT INTO `equipe` (`teamname`) VALUES (?)');
        $insertionTeamName->execute(array($Teamname));
    $TeamID = $connection->prepare('SELECT id FROM equipe WHERE  teamname=?');
    $TeamID->execute(array($Teamname));

    // Récupérez le résultat de la requête SELECT
    $teamIDResult = $TeamID->fetch(PDO::FETCH_ASSOC);

    // Assurez-vous que le résultat existe avant de l'utiliser
    if ($teamIDResult) {
      $teamID = $teamIDResult['id'];

      $insertionLienEquipe = $connection->prepare('INSERT INTO `lienequipeetudiant` (`teamID`, `etudaintID`,`class`) VALUES (?, ?,?)');
      $insertionLienEquipe->execute(array($teamID, $l3name,$l3));
      
      $m1insert = $connection->prepare('INSERT INTO `lienequipeetudiant` (`teamID`, `etudaintID`,`class`) VALUES (?, ?,?)');
      $m1insert->execute(array($teamID, $m1name,$m1));
      
      $m2insert = $connection->prepare('INSERT INTO `lienequipeetudiant` (`teamID`, `etudaintID`,`class`) VALUES (?, ?,?)');
      $m2insert->execute(array($teamID, $m2name,$m2));
      

      echo "<center><h1>équipe a été bien ajouté !!</h1></center>";
    }}
  } else {
    echo 'Attention, Tous Les Champs Sont Obligatoires !!';
  }
}
?>

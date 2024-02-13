<?php
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}
if (
  isset($_POST['Teamname']) && isset($_POST['l3name']) &&
  isset($_POST['m1name']) && isset($_POST['m2name'])&& isset($_POST['teamexisting'])

) {


  if (
    !empty($_POST['Teamname']) && !empty($_POST['l3name']) &&
    !empty($_POST['m1name']) && !empty($_POST['m2name']) && !empty($_POST['teamexisting'])
  ) {

    $teamexisting = htmlspecialchars($_POST['teamexisting']); //id de equipe
    $Teamname = htmlspecialchars($_POST['Teamname']);   //id de equipe
    $l3name = htmlspecialchars($_POST['l3name']);
    $m1name = htmlspecialchars($_POST['m1name']);
    $m2name = htmlspecialchars($_POST['m2name']);
    $l3class='L3';
    $m1class='M1';
    $m2class='M2'; 
     
    //modifier le nom de equipe dans la table equipe
    $nameteam = $connection->prepare('UPDATE `equipe` SET  `teamname`=? WHERE `id`=?');
    $nameteam->execute(array($Teamname,$teamexisting));

      $l3 = $connection->prepare('UPDATE `lienequipeetudiant` SET  `etudaintID`=? WHERE `teamID`=? AND `class`=?');
      $l3->execute(array($l3name,$teamexisting,$l3class));
      
      $m1 = $connection->prepare('UPDATE `lienequipeetudiant` SET  `etudaintID`=? WHERE `teamID`=? AND `class`=?');
      $m1->execute(array($m1name,$teamexisting,$m1class));
  
      $m2 =  $connection->prepare('UPDATE `lienequipeetudiant` SET  `etudaintID`=? WHERE `teamID`=? AND `class`=?');
      $m2->execute(array($m2name,$teamexisting,$m2class));
      

      echo "<center><h1>équipe a été bien modifier !!</h1></center>";
    
  } else {
    echo 'Attention, Tous Les Champs Sont Obligatoires !!';
  }}
  else {
    echo 'erreur de connexion';
  }
  
  
  
  ?>
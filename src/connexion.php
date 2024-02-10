<?php
try {
$connection=new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8",'root','');
}
catch(Exception $e){
echo"erreur de connexion $e->$getMessage()";
}

//////////////////////////////////////////////////Insertion d'adherent 
if (
  isset($_POST['lname']) && isset($_POST['fname']) &&
 isset($_POST['skills']) && isset($_POST['password']) && isset($_POST['email']) 
) {
 if (
     !empty($_POST['lname']) && !empty($_POST['fname']) &&
     !empty($_POST['skills']) && !empty($_POST['password']) && !empty($_POST['email'])
 ) {
   
     $lname = htmlspecialchars($_POST['lname']);
     $fname = htmlspecialchars($_POST['fname']);
     $email = htmlspecialchars($_POST['email']);
     $password = htmlspecialchars($_POST['password']);
     $skills = htmlspecialchars($_POST['skills']);

     $insertionEtudiant = $connection->prepare('UPDATE `etudiant` SET `email`=?, `skills`=?, `password`=? WHERE `lastname`=?');
     $insertionEtudiant->execute(array($email,$skills,$password,$lname));

     echo '<center><h1>etudiant a été bien ajouté !!</h1></center>';
   }else{
     echo 'Attention, Tous Les Champs Sont Obligatoires !!';
   }
 }
?>
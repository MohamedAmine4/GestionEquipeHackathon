<!-- c'est la page de connexion  -->


<?php
session_start();
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}
if(isset($_POST['valider'])){
  if(!empty($_POST['lastname'])){

    $recupUser=$connection->prepare('SELECT * FROM etudiant WHERE lastname=?');
    $recupUser->execute(array($_POST['lastname']));
   if($recupUser->rowCount()>0){
    $user=$recupUser->fetch();
    $_SESSION['id']=$user['id'];
    $_SESSION['lastname']=$user['lastname'];
    header('Location:UserContact.php');
   }
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form action="" method="post">
  <label for="pseudo">Pseudo</label>
  <Input type="text" name="lastname"></Input>
</br>
<label for="passeword">Passeword</label>
  <Input type="passeword" name="passeword"></Input>
</br>
<button type="submit" name="valider">Envoyer</button>
  </form>
</body>
</html>
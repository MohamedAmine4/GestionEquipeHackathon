<?php
session_start();
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}
if(!$_SESSION['lastname']){
  header('Location: Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Users</title>
</head>
<body>
  <?php
    $recupUser=$connection->query('SELECT * FROM etudiant ');
    while($user=$recupUser->fetch()){
      ?>
      <a href="MessageContent.php?id=<?php echo $user['id']; ?>" ><p><?php echo $user['lastname'] ?></p></a>
      <?php
    }
  ?>
</body>
</html>
